@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.empresa.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Empresa">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.empresa.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empresa.fields.nome') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.cpfcnpj') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empresa.tipo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empresa.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empresa.fields.fone') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empresa.fields.tipo') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($empresas as $key => $empresa)
                                    <tr data-entry-id="{{ $empresa->id }}">
                                        <th>

                                        </th>
                                        <td>
                                            {{ $empresa->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $empresa->pessoa->nome ?? '' }}
                                        </td>
                                        <td>
                                            {{ $sacado->pessoa->cpfcnpj ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Empresa::TIPO_RADIO[$empresa->tipo] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $empresa->pessoa->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $empresa->pessoa->fone ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Pessoa::TIPO_RADIO[$empresa->pessoa->tipo] ?? '' }}
                                        </td>
                                        <td>
                                            @can('empresa_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.empresas.show', $empresa->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  $('.datatable-Empresa:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
