@extends('layouts.admin')

@section('content')
<div class="content">
    @can('material_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.materiais.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.material.title_singular') }}
                </a>
            </div>
        </div>
    @endcan

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.material.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover datatable datatable-Material">
                            <thead>
                                <tr>
                                    <th width="10"></th>
                                    <th>{{ trans('cruds.material.fields.id') }}</th>
                                    <th>{{ trans('cruds.material.fields.nome') }}</th>
                                    <th>{{ trans('cruds.material.fields.marca') }}</th>
                                    <th>{{ trans('cruds.material.fields.categoria') }}</th>
                                    <th>{{ trans('cruds.material.fields.preco') }}</th>
                                    <th>{{ trans('cruds.material.fields.disponivel') }}</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($materiais as $material)
                                    <tr data-entry-id="{{ $material->id }}">
                                        <td></td>
                                        <td>{{ $material->id ?? '' }}</td>
                                        <td>{{ $material->nome ?? '' }}</td>
                                        <td>{{ $material->marca ?? '' }}</td>
                                        <td>{{ $material->categorias->nome ?? 'Categoria não disponível' }}</td>
                                        <td>{{ $material->preco ?? '' }}</td>
                                        <td>{{ $material->disponivel ? trans('global.yes') : trans('global.no') }}</td>
                                        <td>
                                            @can('material_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.materiais.show', $material->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('material_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.materiais.edit', $material->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('material_delete')
                                                <button class="btn btn-xs btn-danger deleteSingleButton" data-id="{{ $material->id }}">
                                                    {{ trans('global.delete') }}
                                                </button>
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
        @can('material_delete')
        let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('admin.materiais.massDestroy') }}",
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
                        data: { ids: ids, _method: 'DELETE' }
                    }).done(function () { location.reload() })
                }
            }
        }
        dtButtons.push(deleteButton)
        @endcan

        $.extend(true, $.fn.dataTable.defaults, {
            order: [[1, 'desc']],
            pageLength: 100,
        });
        $('.datatable-Material:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    })

    $('.deleteSingleButton').on('click', function () {
        var id = $(this).data('id');

        if (confirm('{{ trans('global.areYouSure') }}')) {
            $.ajax({
                headers: { 'x-csrf-token': '{{ csrf_token() }}' },
                method: 'POST',
                url: "{{ route('admin.materiais.massDestroy') }}",
                data: {
                    ids: [id],
                    _method: 'DELETE'
                },
                success: function () {
                    location.reload();
                },
                error: function () {
                    alert('Erro ao excluir o material.');
                }
            });
        }
    });
</script>
@endsection
