@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.categoria.title') }}
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
                                        {{ trans('cruds.categoria.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $categoria->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.categoria.fields.nome') }}
                                    </th>
                                    <td>
                                        {{ $categoria->nome }}
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
