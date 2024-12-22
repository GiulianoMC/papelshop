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
        $material = Material::create($request->all());

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

    public function update(UpdateMaterialRequest $request, Material $material)
    {
        $material->update($request->all());

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
}
