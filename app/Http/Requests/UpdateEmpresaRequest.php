<?php

namespace App\Http\Requests;

use App\Empresa;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateEmpresaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('empresa_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'empresa_id'   => [
                'required',
            ],
        ];
    }
}
