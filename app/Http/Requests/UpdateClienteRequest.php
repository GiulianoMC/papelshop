<?php

namespace App\Http\Requests;

use App\Cliente;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateClienteRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('cliente_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
