@extends('layouts.admin')
@section('content')
<div class="content">
    @can('pessoa_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.pessoas.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.pessoa.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Pessoa', 'route' => 'admin.pessoas.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.pessoa.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Pessoa">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
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
                                        {{ trans('cruds.pessoa.fields.tipo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.pessoa.fields.perfil') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pessoas as $key => $pessoa)
                                    <tr data-entry-id="{{ $pessoa->id }}">
                                        <td>

                                        </td>
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
                                            {{ App\Pessoa::TIPO_RADIO[$pessoa->tipo] ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($pessoa->perfils as $key => $item)
                                                <span class="label label-info label-many">{{ $item->perfil }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @can('pessoa_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.pessoas.show', $pessoa->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('pessoa_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.pessoas.edit', $pessoa->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('pessoa_delete')
                                                <form action="{{ route('admin.pessoas.destroy', $pessoa->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
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
@can('pessoa_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pessoas.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

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
