@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.frete.title') }}
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
                                        {{ trans('cruds.frete.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $frete->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.frete.fields.estado') }}
                                    </th>
                                    <td>
                                        @php
                                            $estados = trans('cruds.frete.fields.estados');
                                        @endphp
                                        {{ $estados[$frete->estado] ?? $frete->estado }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.frete.fields.valor') }}
                                    </th>
                                    <td>
                                        {{ $frete->valor }}
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
