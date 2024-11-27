<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePerfilRequest;
use App\Http\Requests\UpdatePerfilRequest;
use App\Http\Resources\Admin\PerfilResource;
use App\Perfil;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PerfilApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('perfil_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PerfilResource(Perfil::all());
    }

    public function store(StorePerfilRequest $request)
    {
        $perfil = Perfil::create($request->all());

        return (new PerfilResource($perfil))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Perfil $perfil)
    {
        abort_if(Gate::denies('perfil_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PerfilResource($perfil);
    }

    public function update(UpdatePerfilRequest $request, Perfil $perfil)
    {
        $perfil->update($request->all());

        return (new PerfilResource($perfil))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Perfil $perfil)
    {
        abort_if(Gate::denies('perfil_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perfil->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
