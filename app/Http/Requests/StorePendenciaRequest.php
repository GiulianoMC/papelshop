<?php

namespace App\Http\Requests;

use App\Pendencia;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorePendenciaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pendencia_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'pendencia_id'   => [
                'required',
            ],
        ];
    }
}
