<?php

namespace App\Http\Requests;

use App\Pessoa;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdatePessoaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pessoa_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nome'      => [
                'min:10',
                'max:100',
                'required',
            ],
            'cpfcnpj'       => [
                'min:11',
                'max:18',
            ],
            'tipo'      => [
                'required',
            ],
            'perfils.*' => [
                'integer',
            ],
            'perfils'   => [
                'required',
                'array',
            ],
        ];
    }
}
