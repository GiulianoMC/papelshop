@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.empresa.title') }}
                    <a class="btn btn-default" href="{{ url()->previous() }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.empresa.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $empresa->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.empresa.fields.nome') }}
                                    </th>
                                    <td>
                                        {{ $empresa->pessoa->nome }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.cpfcnpj') }}
                                    </th>
                                    <td>
                                        {{ $empresa->pessoa->cpfcnpj }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.empresa.tipo') }}
                                    </th>
                                    <td>
                                        {{ App\Empresa::TIPO_RADIO[$empresa->tipo] }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $empresa->pessoa->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.fone') }}
                                    </th>
                                    <td>
                                        {{ $empresa->pessoa->fone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.celular') }}
                                    </th>
                                    <td>
                                        {{ $empresa->pessoa->celular }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.cep') }}
                                    </th>
                                    <td>
                                        {{ $empresa->pessoa->cep }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.logradouro') }}
                                    </th>
                                    <td>
                                        {{ $empresa->pessoa->logradouro }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.numero') }}
                                    </th>
                                    <td>
                                        {{ $empresa->pessoa->numero }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.bairro') }}
                                    </th>
                                    <td>
                                        {{ $empresa->pessoa->bairro }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.complemento') }}
                                    </th>
                                    <td>
                                        {{ $empresa->pessoa->complemento }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.cidade') }}
                                    </th>
                                    <td>
                                        {{ $empresa->pessoa->cidade }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.uf') }}
                                    </th>
                                    <td>
                                        {{ $empresa->pessoa->uf }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.tipo') }}
                                    </th>
                                    <td>
                                        {{ App\Pessoa::TIPO_RADIO[$empresa->pessoa->tipo] }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>

                    <ul class="nav nav-tabs">

                    </ul>
                    <div class="tab-content">

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
