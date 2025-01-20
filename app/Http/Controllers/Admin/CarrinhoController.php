<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Carrinho;
use App\Categoria;
use App\Marca;
use App\Material;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        // Obtém o valor do cookie
        $userId = auth()->id();
    
        // Se o cookie não existir, redireciona para a página de login
        if (!$userId) {
            return redirect('/login');
        }
    
        // Busca os materiais relacionados aos itens do carrinho do usuário logado
        $materiais = Carrinho::where('user_id', $userId)
            ->with('material')  // Carrega os materiais relacionados
            ->get()
            ->pluck('material');  // Extrai os materiais da coleção
    
        // Conversão das imagens dos materiais em Base64 e inclui a quantidade
        $materiais = $materiais->map(function ($material) use ($userId) {
            try {
                // Recupera a quantidade do carrinho
                $quantidade = Carrinho::where('user_id', $userId)
                    ->where('material_id', $material->id)
                    ->value('quantidade');
    
                // Recupera a imagem do material
                $imagemBlob = $material->imagem;
                $imagemBase64 = $imagemBlob ? 'data:image/png;base64,' . base64_encode($imagemBlob) : null;
                // Formata os valores
                $material->preco_formatado = number_format($material->preco * $quantidade, 2, ',', '.');  // Ajusta o preço de acordo com a quantidade
                $material->data_compra_formatada = \Carbon\Carbon::parse($material->data_compra)->format('d/m/Y');
                $material->disponivel_formatado = $material->disponivel ? 'Sim' : 'Não';
                $material->imagem = $imagemBase64;
                $material->quantidade = $quantidade;  // Adiciona a quantidade
    
                return $material;
            } catch (\Exception $e) {
                return $material; // Retorna o material sem alterações em caso de erro
            }
        });
    
        $categorias = Categoria::all();
        $marcas = Marca::all();
    
        // Calcula o total do preço dos materiais (multiplicado pela quantidade)
        $precoMateriais = $materiais->sum(function ($material) {
            return $material->preco * $material->quantidade;
        });
    
        // Retorna a visão com os produtos encontrados, a quantidade e o total do preço formatado
        return view('carrinho', compact('materiais', 'categorias', 'marcas', 'precoMateriais'));
    }
     
     
     

    public function adicionarAoCarrinho($materialId, Request $request)
    {
        $userId = auth()->id();
        $quantidade = $request->input('quantidade'); 

        //dd($quantidade);

        if($userId == null){
            return response()->view('auth.login', ['error' => 'Precisa se logar para adicionar item ao carrinho.']);

        }

        $material = Material::find($materialId);

        if (!$material) {
            return redirect()->back()->with('error', 'Material não encontrado.');
        }

        $itemNoCarrinho = Carrinho::where('material_id', $materialId)
                                ->where('user_id', $userId)
                                ->first();

        if ($itemNoCarrinho) {
            return redirect()->route('carrinho')->with('info', 'Este material já está no seu carrinho.');
        }

        Carrinho::create([
            'quantidade' => $quantidade,
            'material_id' => $materialId,
            'user_id' => $userId
        ]);

        return redirect()->route('carrinho')->with('success', 'Material adicionado ao carrinho!');
    }

    public function removerDoCarrinho($materialId)
    {
        $userId = auth()->id();

        $item = Carrinho::where('material_id', $materialId)
                        ->where('user_id', $userId)
                        ->first();

        if ($item) {
            $item->delete();
            return redirect()->route('carrinho')->with('success', 'Item removido do carrinho com sucesso!');
        }

        return redirect()->route('carrinho')->with('error', 'Item não encontrado no carrinho.');
    }
}
    