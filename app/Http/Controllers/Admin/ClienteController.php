<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClienteRequest;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Cliente;
use App\Sacado;
use App\Operacao;
use App\Titulo;
use Illuminate\Support\Facades\Gate;
use PhpOffice\PhpSpreadsheet\Style\Conditional;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Carbon;

class ClienteController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('cliente_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientes = Cliente::all();

        $clientes->load('pessoa','gerente');

        return view('admin.clientes.index', compact('clientes'));
    }

    public function create()
    {
        abort_if(Gate::denies('cliente_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clientes.create', compact('perfils'));
    }

    public function store(StoreClienteRequest $request)
    {
        $cliente = Cliente::create($request->all());
        $cliente->perfils()->sync($request->input('perfils', []));

        return redirect()->route('admin.clientes.index');
    }

    public function edit(Cliente $cliente)
    {
        abort_if(Gate::denies('cliente_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cliente->load('team');

        return view('admin.clientes.edit', compact('cliente'));
    }

    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        $cliente->perfils()->sync($request->input('perfils', []));

        return redirect()->route('admin.clientes.index');
    }

    public function show(Cliente $cliente)
    {
        abort_if(Gate::denies('cliente_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cliente->load('team','pessoa','gerente');

        return view('admin.clientes.show', compact('cliente'));
    }

    public function destroy(Cliente $cliente)
    {
        abort_if(Gate::denies('cliente_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cliente->delete();

        return back();
    }

    public function massDestroy(MassDestroyClienteRequest $request)
    {
        Cliente::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

}
