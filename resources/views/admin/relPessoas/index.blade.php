@extends('layouts.relatorio')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.relPessoa.title') }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="table-responsive">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-Pessoa nowrap">
                                <thead>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.pessoa.fields.id') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.pessoa.fields.nome') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.pessoa.fields.cpfcnpj') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.pessoa.fields.email') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.pessoa.fields.fone') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.pessoa.fields.celular') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.pessoa.fields.tipo') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.pessoa.fields.perfil') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pessoas as $key => $pessoa)
                                        <tr data-entry-id="{{ $pessoa->id }}">
                                            <td>
                                                {{ $pessoa->id ?? '' }}
                                            </td>
                                            <td>
                                                {{ $pessoa->nome ?? '' }}
                                            </td>
                                            <td>
                                                {{ $pessoa->cpfcnpj ?? '' }}
                                            </td>
                                            <td>
                                                {{ $pessoa->email ?? '' }}
                                            </td>
                                            <td>
                                                {{ $pessoa->fone ?? '' }}
                                            </td>
                                            <td>
                                                {{ $pessoa->celular ?? '' }}
                                            </td>
                                            <td>
                                                {{ App\Pessoa::TIPO_RADIO[$pessoa->tipo] ?? '' }}
                                            </td>
                                            <td>
                                                @foreach($pessoa->perfils as $key => $item)
                                                    <span class="label label-info label-many">{{ $item->perfil }}</span>
                                                @endforeach
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
  $('.datatable-Pessoa:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection

