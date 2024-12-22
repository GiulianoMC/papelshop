@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.material.title_singular') }}
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.material.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $material->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.material.fields.nome') }}
                                    </th>
                                    <td>
                                        {{ $material->nome }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.material.fields.marca') }}
                                    </th>
                                    <td>
                                        @php
                                            $marcaNome = $marcas->where('id', $material->marca_id)->first()->nome ?? 'Marca não definida';
                                        @endphp
                                        {{ $marcaNome }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.material.fields.categoria') }}
                                    </th>
                                    <td>
                                        @php
                                            $categoriaNome = $categorias->where('id', $material->categoria_id)->first()->nome ?? 'Categoria não definida';
                                        @endphp
                                        {{ $categoriaNome }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.material.fields.preco') }}
                                    </th>
                                    <td>
                                        {{ $material->preco }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.material.fields.descricao') }}
                                    </th>
                                    <td>
                                        {{ $material->descricao }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.material.fields.data_compra') }}
                                    </th>
                                    <td>
                                        {{ \Carbon\Carbon::parse($material->data_compra)->format('d/m/Y') }} 
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.material.fields.disponivel') }}
                                    </th>
                                    <td>
                                        {{ $material->disponivel ? trans('global.yes') : trans('global.no') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
