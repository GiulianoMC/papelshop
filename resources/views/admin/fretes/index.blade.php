@extends('layouts.admin')
@section('content')
<div class="content">
    @can('frete_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.fretes.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.frete.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.frete.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Parceiro">
                            <thead>
                                <tr>
                                    <th width="9"></th>
                                    <th>{{ trans('cruds.frete.fields.estado') }}</th>
                                    <th>{{ trans('cruds.frete.fields.valor') }}</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fretes as $key => $frete)
                                    <tr data-entry-id="{{ $frete->id }}">
                                        <th>{{ $frete->id ?? '' }}</th>
                                        <td>{{ $frete->estado ?? '' }}</td>
                                        <td>{{ $frete->valor ?? '' }}</td>
                                        <td>
                                            @can('frete_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.fretes.show', $frete->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('frete_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.fretes.edit', $frete->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('frete_delete')
                                                <form action="{{ route('admin.fretes.destroy', $frete->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  $('.datatable-Parceiro:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
