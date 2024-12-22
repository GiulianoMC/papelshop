<?php

namespace App\Http\Requests;

use App\Material;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateMaterialRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('material_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'preco' => [
                'required',
            ],
            'categoria_id' => [
                'required',
            ],
            'marca_id' => [
                'required',
            ],
            'nome' => [
                'required',
            ],
        ];
    }
}
