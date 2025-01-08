<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Categoria;
use App\Marca;
use App\Material;

class HomeController
{
    public function index()
    {
        
        return view('home');
    }

    public function home()
    {
        $user = auth()->user();
        $is_admin = false;

        if ($user) {
            $roles = $user->roles()->get() ?? null;
            if ($roles->contains('id', '1')) {
                $is_admin = true;
            }
        }

        $categorias = Categoria::all();
        $marcas = Marca::all();
        $materiais = Material::with('marcas', 'categorias')
            ->inRandomOrder()
            ->paginate(16)
            ->toArray();

        $items = array_fill(0, count($materiais['data']), null);

        foreach ($materiais['data'] as $material) {
            try {
                $preco = $material['preco'];
                $descricao = $material['descricao'];
                $data_compra = $material['data_compra'];
                $disponivel = $material['disponivel'];

                $material['preco'] = number_format($preco, 2, ',', '.');
                $material['data_compra'] = \Carbon\Carbon::parse($data_compra)->format('d/m/Y');
                $material['disponivel'] = $disponivel ? 'Sim' : 'Não';

                $posicao = array_search(null, $items);
                if ($posicao !== false) {
                    $items[$posicao] = $material;
                } else {
                    $items[] = $material;
                }
            } catch (\Exception $e) {
                continue;
            }
        }

        $items = array_values(array_filter($items));

        $nextPage = $materiais['next_page_url'];

        return view('cards', compact('materiais', 'categorias', 'marcas', 'items', 'nextPage', 'is_admin'));
    }
}
