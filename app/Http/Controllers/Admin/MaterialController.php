<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMaterialRequest;
use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;
use App\Material;
use App\Categoria;
use App\Marca;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MaterialController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('material_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $materiais = Material::with('categorias', 'marcas')->get();
    
        return view('admin.materiais.index', compact('materiais'));
    }

    public function create()
    {
        abort_if(Gate::denies('material_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categorias = Categoria::all();

        $marcas = Marca::all();

        return view('admin.materiais.create', compact('categorias', 'marcas'));
    }

    public function store(StoreMaterialRequest $request)
    {

        // Inicializa o array de dados com todos os campos do request
        $data = $request->all();

        //dd($data);

        // Verifica se há imagem no formulário
        if ($request->hasFile('imagem')) {
            // Obtém o conteúdo binário da imagem
            $image = $request->file('imagem');
            $data['imagem'] = file_get_contents($image);
        }

        // Cria o material
        Material::create($data);

        return redirect()->route('admin.materiais.index');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('material_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $material = Material::find($id);
        if (!$material) {
            return redirect()->route('admin.materiais.index')->with('error', 'Material não encontrado');
        }
        $categorias = Categoria::all();

        $marcas = Marca::all();

        return view('admin.materiais.edit', compact('material', 'categorias', 'marcas'));
    }

    public function update(UpdateMaterialRequest $request, $id)
    {

        $material = Material::find($id);

        // Obtém os dados do request
        $data = $request->all();
        // Verifica se uma nova imagem foi enviada
        if ($request->hasFile('imagem')) {
            $image = $request->file('imagem');
            $data['imagem'] = file_get_contents($image); // Converte a imagem para binário
        } else {
            // Garante que a imagem não seja sobrescrita se nenhuma nova for enviada
            unset($data['imagem']);
        }

        // Atualiza o material
        $material->update($data);

       

        // Redireciona para a lista de materiais
        return redirect()->route('admin.materiais.index');
    }



    public function show($id)
    {
        abort_if(Gate::denies('material_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $material = Material::find($id);
        if (!$material) {
            return redirect()->route('admin.materiais.index')->with('error', 'Material não encontrado');
        }
        
        $categorias = Categoria::all();

        $marcas = Marca::all();

        return view('admin.materiais.show', compact('material', 'categorias', 'marcas'));
    }
    public function destroy(Material $material)
    {
        abort_if(Gate::denies('material_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $material->delete();

        return back();
    }

    public function massDestroy(MassDestroyMaterialRequest $request)
    {
        Material::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function showmaterial(int $id)
    {
        // Buscar o material pelo ID
        $materialShow = Material::findOrFail($id);

        // Carregar relações necessárias
        $materialShow->load('marcas', 'categorias');

        // Conversão da imagem do material em Base64
        $imagemBlob = $materialShow->imagem; // Certifique-se de que o campo 'imagem' está correto
        $imagemBase64 = $imagemBlob ? 'data:image/png;base64,' . base64_encode($imagemBlob) : null;

        // Formatar valores para exibição
        $material = [
            'id' => $materialShow->id,
            'nome' => $materialShow->nome,
            'marca_id' => $materialShow->marca_id,
            'categoria_id' => $materialShow->categoria_id,
            'preco' => number_format($materialShow->preco, 2, ',', '.'),
            'descricao' => $materialShow->descricao,
            'data_compra' => $materialShow->data_compra,
            'disponivel' => $materialShow->disponivel,
            'imagem' => $imagemBase64
        ];

        // Carregar categorias e marcas para exibição geral
        $categoria = Categoria::find($materialShow->categoria_id);
        $marca = Marca::find($materialShow->marca_id);

        // Mandar também sugestões de materiais
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $materiais = Material::with('marcas', 'categorias')
            ->inRandomOrder()
            ->paginate(4)
            ->toArray();

        $items = array_fill(0, count($materiais['data']), null);

        foreach ($materiais['data'] as $materialSug) {
            try {
                $preco = $materialSug['preco'];
                $descricao = $materialSug['descricao'];
                $data_compra = $materialSug['data_compra'];
                $disponivel = $materialSug['disponivel'];
                
                // Conversão da imagem em Base64 para materiais sugeridos
                $imagemBlob = $materialSug['imagem']; // Certifique-se de que o campo 'imagem' está correto
                $imagemBase64 = $imagemBlob ? 'data:image/png;base64,' . base64_encode($imagemBlob) : null;

                $materialSug['preco'] = number_format($preco, 2, ',', '.');
                $materialSug['data_compra'] = \Carbon\Carbon::parse($data_compra)->format('d/m/Y');
                $materialSug['disponivel'] = $disponivel ? 'Sim' : 'Não';
                $materialSug['imagem'] = $imagemBase64;

                $posicao = array_search(null, $items);
                if ($posicao !== false) {
                    $items[$posicao] = $materialSug;
                } else {
                    $items[] = $materialSug;
                }
            } catch (\Exception $e) {
                continue;
            }
        }

        return view('material', compact('material', 'categoria', 'marca', 'materiais', 'categorias', 'marcas', 'items'));
    }

}
