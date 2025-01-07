<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMarcaRequest;
use App\Http\Requests\StoreMarcaRequest;
use App\Http\Requests\UpdateMarcaRequest;
use App\Material;
use App\Categoria;
use App\Marca;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MarcaController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('categoria_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $marcas = Marca::all();
    
        return view('admin.marcas.index', compact('marcas'));
    }

    public function create()
    {
        abort_if(Gate::denies('categoria_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.marcas.create');
    }

    public function store(StoreMarcaRequest $request)
    {
        Marca::create($request->all());

        return redirect()->route('admin.marcas.index');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('categoria_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $marca = Marca::find($id);
        if (!$marca) {
            return redirect()->route('admin.marcas.index')->with('error', 'Marca não encontrada');
        }

        return view('admin.marcas.edit', compact('marca'));
    }

    public function update(UpdateMarcaRequest $request, Marca $marca)
    {
        $marca->update($request->all());

        return redirect()->route('admin.marcas.index');
    }

    public function show($id)
    {
        abort_if(Gate::denies('categoria_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $marca = Marca::find($id);
        if (!$marca) {
            return redirect()->route('admin.marcas.index')->with('error', 'Marca não encontrada');
        }

        return view('admin.marcas.show', compact('marca'));
    }
    public function destroy(Marca $marca)
    {
        abort_if(Gate::denies('categoria_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $marca->delete();

        return back();
    }

    public function massDestroy(MassDestroyMarcaRequest $request)
    {
        Marca::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
