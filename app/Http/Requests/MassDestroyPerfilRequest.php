<?php

namespace App\Http\Requests;

use App\Perfil;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPerfilRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('perfil_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:perfils,id',
        ];
    }
}
