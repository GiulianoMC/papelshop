@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.pessoa.title') }}
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
                                        {{ trans('cruds.pessoa.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $pessoa->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.nome') }}
                                    </th>
                                    <td>
                                        {{ $pessoa->nome }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.cpfcnpj') }}
                                    </th>
                                    <td>
                                        {{ $pessoa->cpfcnpj }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $pessoa->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.fone') }}
                                    </th>
                                    <td>
                                        {{ $pessoa->fone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.celular') }}
                                    </th>
                                    <td>
                                        {{ $pessoa->celular }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.cep') }}
                                    </th>
                                    <td>
                                        {{ $pessoa->cep }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.logradouro') }}
                                    </th>
                                    <td>
                                        {{ $pessoa->logradouro }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.numero') }}
                                    </th>
                                    <td>
                                        {{ $pessoa->numero }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.bairro') }}
                                    </th>
                                    <td>
                                        {{ $pessoa->bairro }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.complemento') }}
                                    </th>
                                    <td>
                                        {{ $pessoa->complemento }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.cidade') }}
                                    </th>
                                    <td>
                                        {{ $pessoa->cidade }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.uf') }}
                                    </th>
                                    <td>
                                        {{ $pessoa->uf }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.tipo') }}
                                    </th>
                                    <td>
                                        {{ App\Pessoa::TIPO_RADIO[$pessoa->tipo] }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Perfil
                                    </th>
                                    <td>
                                        @foreach($pessoa->perfils as $id => $perfil)
                                            <span class="label label-info label-many">{{ $perfil->perfil }}</span>
                                        @endforeach
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
