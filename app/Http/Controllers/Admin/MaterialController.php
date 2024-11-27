<?php

namespace App\Http\Controllers\Admin;

use App\Marca;
use App\Banner;
use App\Produto;
use App\Parceiro;
use App\Vantagem;
use App\Categoria;
use App\LinkProduto;

use App\TaskPlatform;
use App\Traits\Acentos;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProdutoRequest;
use App\Providers\FirebaseServiceProvider;
use App\Http\Requests\UpdateProdutoRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\MassDestroyProdutoRequest;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{
    use Acentos;

    private $database;

    public function __construct()
    {
        $this->database = FirebaseServiceProvider::connect();
    }

    public function index()
    {
        abort_if(Gate::denies('produto_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $produtos = Produto::all();

        return view('admin.produtos.index', compact('produtos'));
    }

    public function create()
    {
        abort_if(Gate::denies('produto_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $marcas = Marca::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $parceiros = Parceiro::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vantagens = Vantagem::all()->pluck('descricao', 'id');

        $categorias = Categoria::all()->pluck('nome', 'id');

        return view('admin.produtos.create', compact('marcas','parceiros','vantagens','categorias'));
    }

    public function store(StoreProdutoRequest $request)
    {

        $produto = Produto::create($request->all());
        $produto->vantagens()->sync($request->input('vantagens', []));
        $produto->categorias()->sync($request->input('categorias', []));

        if ($request->file('imagem')) {

            $this->validate($request, [
                'imagem' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $image = $request->file('imagem');

            $imageContent = file_get_contents($image);

            $destinationPath = public_path('/images/produtos');

            $input['imagename'] = $this->retira_acentos(Str::slug($produto->descricao,'-')).'-'.$produto->id.'.'.$image->getClientOriginalExtension();

            $image->move($destinationPath, $input['imagename']); 
        
            $produto->imagem = $input['imagename'];
    
            $produto->save();

            $disk = Storage::disk('gcs');

            $disk->put('newtukofertas/produtos/'.$input['imagename'], $imageContent);

            $url_imagem = $disk->url('newtukofertas/produtos/'.$input['imagename']);

            $produto->url_imagem = $url_imagem;
    
            $produto->save();
    
        }

        $database = $this->database->database();
        $collectionReference = $database->collection('produtos');
        $documentReference = $collectionReference->document($produto->id);
        $snapshot = $documentReference->set($produto->toArray()); 

        return redirect()->route('admin.produtos.edit',$produto->id);
    }

    public function edit(Produto $produto)
    {
        abort_if(Gate::denies('produto_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = Auth::user();

        $task_platforms = $user->task_platforms->pluck('id');

        $produto->load('marca','parceiro','vantagens','categorias');

        $links = $produto->links()->whereIn('platform_id',$task_platforms)->get();

        $marcas = Marca::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $parceiros = Parceiro::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vantagens = Vantagem::all()->pluck('descricao', 'id');

        $categorias = Categoria::all()->pluck('nome', 'id');

        $platforms = $user->task_platforms->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.produtos.edit', compact('produto','marcas','parceiros','vantagens','categorias','platforms','links'));
    }

    public function update(UpdateProdutoRequest $request, Produto $produto)
    {
       // ddd($request->input('categorias', []));
        $produto->update($request->all());
        $produto->vantagens()->sync($request->input('vantagens', []));
        $produto->categorias()->sync($request->input('categorias', []));

        if ($request->file('imagem')) {

            $this->validate($request, [
                'imagem' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $image = $request->file('imagem');

            $imageContent = file_get_contents($image);

            $destinationPath = public_path('/images/produtos');

            $input['imagename'] = $this->retira_acentos(Str::slug($produto->descricao,'-')).'-'.$produto->id.'.'.$image->getClientOriginalExtension();

            $image->move($destinationPath, $input['imagename']); 
        
            $produto->imagem = $input['imagename'];
    
            $produto->save();

            $disk = Storage::disk('gcs');

            $disk->put('newtukofertas/produtos/'.$input['imagename'], $imageContent);

            $url_imagem = $disk->url('newtukofertas/produtos/'.$input['imagename']);

            $produto->url_imagem = $url_imagem;
    
            $produto->save();
    
        }

        $database = $this->database->database();
        $collectionReference = $database->collection('produtos');
        $documentReference = $collectionReference->document($produto->id);
        $snapshot = $documentReference->set($produto->toArray()); 

        return redirect()->route('admin.produtos.index');
    }

    public function show(Produto $produto)
    {
        abort_if(Gate::denies('produto_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = Auth::user();

        $task_platforms = $user->task_platforms->pluck('id');

        $produto->load('marca','parceiro','vantagens','categorias');

        $links = $produto->links()->whereIn('platform_id',$task_platforms)->get();

        $platforms = $user->task_platforms->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


        return view('admin.produtos.show', compact('produto','platforms','links'));
    }

    public function showproduto(String $uuid)
    {

        $produtoshow = LinkProduto::where('uuid',$uuid)->first()->produto;
        
        $produtoshow->load('marca','parceiro','vantagens','categorias');

        $produtoshow->increment('cliques');

        $valor_anterior = $produtoshow['valor_anterior'];
        $valor = $produtoshow['valor'];

        $percentual = 0;
        if ($valor_anterior != 0) {
            $percentual = (($valor - $valor_anterior) / $valor_anterior) * 100;
        }

        $isSecondaryLink = $produtoshow->links->where('status', 'S')->pluck('uuid')->contains($uuid);

        $produtoshow['type'] = 'produto';
        $produtoshow['valor_anterior'] = number_format($valor_anterior, 2, ',', '.');;
        $produtoshow['valor'] = number_format($valor, 2, ',', '.');;
        $produtoshow['percentual'] = number_format($percentual * -1, 2);
        $produtoshow['store_image'] = $produtoshow['parceiro']['imagem'];
        $produtoshow['url_produto'] = $isSecondaryLink 
        ? $produtoshow->links->firstWhere('status', 'S')->link 
        : ($produtoshow->links->firstWhere('status', 'P')->link ?? null);
        
        // Define o UUID para o link primário como padrão
        $produtoshow['uuid'] = $produtoshow->links->firstWhere('status', 'P')['uuid'] ?? null;
        
        $produtoshow['wished'] = Produto::getWished($produtoshow['id']);

        $categorias = Categoria::all();

        $marcas = Marca::all();

        $produtos = Produto::with('parceiro', 'links')->paginate(24)->toArray();
        $banners = $banners = Banner::all()->sortBy('posicao')->toArray();

        $items = array_fill(0, count($produtos) + count($banners), null);

        foreach ($banners as $banner) {
            $banner['type'] = 'banner';
            $items[$banner['posicao'] - 1] = $banner;
        }

        foreach ($produtos['data'] as $produto) {
            $valor_anterior = $produto['valor_anterior'];
            $valor = $produto['valor'];

            $percentual = 0;
            if ($valor_anterior != 0) {
                $percentual = (($valor - $valor_anterior) / $valor_anterior) * 100;
            }

            $produto['type'] = 'produto';
            $produto['valor_anterior'] = number_format($valor_anterior, 2, ',', '.');;
            $produto['valor'] = number_format($valor, 2, ',', '.');;
            $produto['percentual'] = number_format($percentual * -1, 2);
            $produto['store_image'] = $produto['parceiro']['imagem'];
            $produto['url_produto'] = $produto['links'][0]['link'];
            $produto['uuid'] = $produto['links'][0]['uuid'];
            $produto['wished'] = Produto::getWished($produto['id']);

            $posicao = array_search(null, $items);
            if ($posicao !== false) {
                $items[$posicao] = $produto;
            } else {
                $items[] = $produto;
            }
        }

        $items = array_values(array_filter($items));

        return view('produto', compact('produtoshow','produtos', 'categorias', 'marcas', 'banners', 'items'));
    }

    public function updatefirebase()
    {
        abort_if(Gate::denies('produto_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $produtos = Produto::all();

        foreach($produtos as $produto) {
            $database = $this->database->database();
            $collectionReference = $database->collection('produtos');
            $documentReference = $collectionReference->document($produto->id);
            $snapshot = $documentReference->set($produto->toArray()); 
        }

        return view('admin.produtos.index', compact('produtos'));
    }

    public function destroy(Produto $produto)
    {
        abort_if(Gate::denies('produto_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $produto->delete();

        $database = $this->database->database();
        $collectionReference = $database->collection('produtos');
        $documentReference = $collectionReference->document($produto->id)->delete();

        return back();
    }

    public function massDestroy(MassDestroyProdutoRequest $request)
    {
        Produto::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storelink(Request $request)
    {

        $linkProduto = LinkProduto::create($request->all());
        $linkProduto->uuid = Str::random(9);
        $linkProduto->save();

        if ($linkProduto->status == 'P') {
            LinkProduto::where('produto_id','=',$linkProduto->produto_id)
                ->where('id','<>',$linkProduto->id)
                ->update(['status'=>'S']);
        }

        return redirect()->route('admin.produtos.edit',$linkProduto->produto_id);

    }

    public function updatelink(Request $request, String $link_produto_id)
    {

        abort_if(Gate::denies('produto_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $linkProduto = LinkProduto::where('id','=',$link_produto_id)->first();
        $linkProduto->update($request->all());

        if ($linkProduto->status == 'P') {
            LinkProduto::where('produto_id','=',$linkProduto->produto_id)
                ->where('id','<>',$linkProduto->id)
                ->update(['status'=>'S']);
        }

        return redirect()->route('admin.produtos.edit',$linkProduto->produto_id);

    }

    public function destroylink(String $link_produto_id)
    {
        abort_if(Gate::denies('produto_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $linkProduto = LinkProduto::where('id','=',$link_produto_id)->first();
        $linkProduto->delete();

        return back();
    }

    public function linkproduto(String $uuid)
    {
        $url = LinkProduto::where('uuid',$uuid)->first();
        
        if ($url && $url->produto->cupom == '') {
            return redirect($url->link);
        } elseif ($url && $url->produto->cupom != '') {
            return redirect()->route('produto',$uuid);
        } else {
            return redirect()->route('home');
        }
    }

    public function linkplataformaproduto(String $uuid, String $plataforma)
    {
        
        return redirect()->route('produto',$uuid);

    }

}
