<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCategoriaRequest;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Material;
use App\Categoria;
use App\Marca;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoriaController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('categoria_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $categorias = Categoria::all();
    
        return view('admin.categorias.index', compact('categorias'));
    }

    public function create()
    {
        abort_if(Gate::denies('categoria_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categorias.create');
    }

    public function store(StoreCategoriaRequest $request)
    {
        Categoria::create($request->all());

        return redirect()->route('admin.categorias.index');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('categoria_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $categoria = Categoria::find($id);
        if (!$categoria) {
            return redirect()->route('admin.categorias.index')->with('error', 'Categoria não encontrada');
        }

        return view('admin.categorias.edit', compact('categoria'));
    }

    public function update(UpdateCategoriaRequest $request, Categoria $categoria)
    {
        $categoria->update($request->all());

        return redirect()->route('admin.categorias.index');
    }

    public function show($id)
    {
        abort_if(Gate::denies('categoria_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $categoria = Categoria::find($id);
        if (!$categoria) {
            return redirect()->route('admin.categorias.index')->with('error', 'Categoria não encontrada');
        }

        return view('admin.categorias.show', compact('categoria'));
    }
    public function destroy(Categoria $categoria)
    {
        abort_if(Gate::denies('categoria_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoria->delete();

        return back();
    }

    public function massDestroy(MassDestroyCategoriaRequest $request)
    {
        Categoria::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
