<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePessoaRequest;
use App\Http\Requests\UpdatePessoaRequest;
use App\Http\Resources\Admin\PessoaResource;
use App\Pessoa;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PessoaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pessoa_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PessoaResource(Pessoa::with(['perfils'])->get());
    }

    public function store(StorePessoaRequest $request)
    {
        $pessoa = Pessoa::create($request->all());
        $pessoa->perfils()->sync($request->input('perfils', []));

        return (new PessoaResource($pessoa))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Pessoa $pessoa)
    {
        abort_if(Gate::denies('pessoa_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PessoaResource($pessoa->load(['perfils']));
    }

    public function update(UpdatePessoaRequest $request, Pessoa $pessoa)
    {
        $pessoa->update($request->all());
        $pessoa->perfils()->sync($request->input('perfils', []));

        return (new PessoaResource($pessoa))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Pessoa $pessoa)
    {
        abort_if(Gate::denies('pessoa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pessoa->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
