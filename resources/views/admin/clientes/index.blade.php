@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.cliente.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Cliente">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.cliente.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cliente.fields.nome') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.cpfcnpj') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cliente.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cliente.fields.fone') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cliente.fields.tipo') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clientes as $key => $cliente)
                                    <tr data-entry-id="{{ $cliente->id }}">
                                        <th>

                                        </th>
                                        <td>
                                            {{ $cliente->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cliente->pessoa->nome ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cliente->pessoa->cpfcnpj ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cliente->pessoa->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cliente->pessoa->fone ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Pessoa::TIPO_RADIO[$cliente->pessoa->tipo] ?? '' }}
                                        </td>
                                        <td>
                                            @can('cliente_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.clientes.show', $cliente->id) }}">
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
  $('.datatable-Cliente:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
