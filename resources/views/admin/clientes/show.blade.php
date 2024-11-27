@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.cliente.title') }}
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
                                        {{ trans('cruds.cliente.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $cliente->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cliente.fields.nome') }}
                                    </th>
                                    <td>
                                        {{ $cliente->pessoa->nome }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.cpfcnpj') }}
                                    </th>
                                    <td>
                                        {{ $cliente->pessoa->cpfcnpj }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $cliente->pessoa->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.fone') }}
                                    </th>
                                    <td>
                                        {{ $cliente->pessoa->fone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.celular') }}
                                    </th>
                                    <td>
                                        {{ $cliente->pessoa->celular }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.cep') }}
                                    </th>
                                    <td>
                                        {{ $cliente->pessoa->cep }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.logradouro') }}
                                    </th>
                                    <td>
                                        {{ $cliente->pessoa->logradouro }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.numero') }}
                                    </th>
                                    <td>
                                        {{ $cliente->pessoa->numero }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.bairro') }}
                                    </th>
                                    <td>
                                        {{ $cliente->pessoa->bairro }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.complemento') }}
                                    </th>
                                    <td>
                                        {{ $cliente->pessoa->complemento }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.cidade') }}
                                    </th>
                                    <td>
                                        {{ $cliente->pessoa->cidade }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.uf') }}
                                    </th>
                                    <td>
                                        {{ $cliente->pessoa->uf }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.tipo') }}
                                    </th>
                                    <td>
                                        {{ App\Pessoa::TIPO_RADIO[$cliente->pessoa->tipo] }}
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
