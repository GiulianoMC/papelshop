<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPessoaRequest;
use App\Http\Requests\StorePessoaRequest;
use App\Http\Requests\UpdatePessoaRequest;
use App\Indicante;
use App\Perfil;
use App\Pessoa;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PessoaController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('pessoa_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pessoas = Pessoa::all();

        return view('admin.pessoas.index', compact('pessoas'));
    }

    public function create()
    {
        abort_if(Gate::denies('pessoa_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perfil = Perfil::Find('2');

        $perfils = Perfil::all()->pluck('perfil', 'id');

        return view('admin.pessoas.create', compact('perfils'));
    }

    public function store(StorePessoaRequest $request)
    {
        $pessoa = Pessoa::create($request->all());
        $pessoa->perfils()->sync($request->input('perfils', []));

        return redirect()->route('admin.pessoas.index');
    }

    public function edit(Pessoa $pessoa)
    {
        abort_if(Gate::denies('pessoa_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perfil = Perfil::Find('2');

        $perfils = Perfil::all()->pluck('perfil', 'id');

        $pessoa->load('perfils', 'team');

        return view('admin.pessoas.edit', compact('pessoa', 'perfils'));
    }

    public function update(UpdatePessoaRequest $request, Pessoa $pessoa)
    {
        $pessoa->update($request->all());
        $pessoa->perfils()->sync($request->input('perfils', []));

        return redirect()->route('admin.pessoas.index');
    }

    public function show(Pessoa $pessoa)
    {
        abort_if(Gate::denies('pessoa_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pessoa->load('perfils', 'team');

        return view('admin.pessoas.show', compact('pessoa'));
    }

    public function destroy(Pessoa $pessoa)
    {
        abort_if(Gate::denies('pessoa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pessoa->delete();

        return back();
    }

    public function massDestroy(MassDestroyPessoaRequest $request)
    {
        Pessoa::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

}
