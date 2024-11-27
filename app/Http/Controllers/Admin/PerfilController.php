<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPerfilRequest;
use App\Http\Requests\StorePerfilRequest;
use App\Http\Requests\UpdatePerfilRequest;
use App\Perfil;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PerfilController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('perfil_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perfils = Perfil::all();

        return view('admin.perfils.index', compact('perfils'));
    }

    public function create()
    {
        abort_if(Gate::denies('perfil_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perfils.create');
    }

    public function store(StorePerfilRequest $request)
    {
        $perfil = Perfil::create($request->all());

        return redirect()->route('admin.perfils.index');
    }

    public function edit(Perfil $perfil)
    {
        abort_if(Gate::denies('perfil_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perfils.edit', compact('perfil'));
    }

    public function update(UpdatePerfilRequest $request, Perfil $perfil)
    {
        $perfil->update($request->all());

        return redirect()->route('admin.perfils.index');
    }

    public function show(Perfil $perfil)
    {
        abort_if(Gate::denies('perfil_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perfils.show', compact('perfil'));
    }

    public function destroy(Perfil $perfil)
    {
        abort_if(Gate::denies('perfil_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perfil->delete();

        return back();
    }

    public function massDestroy(MassDestroyPerfilRequest $request)
    {
        Perfil::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
