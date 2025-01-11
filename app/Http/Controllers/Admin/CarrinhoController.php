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

        // Se o cookie não existir, retorna uma resposta com nenhum produto
        if (!$userId) {
            return redirect('/login');
        }

        // Busca os materiais relacionados aos itens do carrinho do usuário logado
        $materiais = Carrinho::where('user_id', $userId)
            ->with('material') 
            ->get()
            ->pluck('material'); 

        $categorias = Categoria::All();
        $marcas = Marca::All();

        $precoMateriais = $materiais->sum('preco');


        // Retorna a visão com os produtos encontrados e o total do preço formatado
        return view('carrinho', compact('materiais', 'categorias', 'marcas', 'precoMateriais'));        
    }

    public function adicionarAoCarrinho($materialId)
    {
        $userId = auth()->id();

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
    