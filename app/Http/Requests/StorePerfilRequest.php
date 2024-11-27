<?php

namespace App\Http\Requests;

use App\Perfil;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorePerfilRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('perfil_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'perfil' => [
                'min:5',
                'max:30',
                'required',
                'unique:perfils',
            ],
        ];
    }
}
