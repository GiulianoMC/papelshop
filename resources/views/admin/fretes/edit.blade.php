@extends('layouts.admin')
@section('content')
<div class="content">
    {{-- @include('layouts.mapa') --}}

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.frete.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.fretes.update", [$fretes->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group {{ $errors->has('estado') ? 'has-error' : '' }}">
                            <label for="estado">{{ trans('cruds.frete.fields.estado') }}*</label>
                            <input type="text" id="estado" name="estado" class="form-control" value="{{ old('estado', isset($fretes) ? $fretes->estado : '') }}" required>
                            @if($errors->has('estado'))
                                <p class="help-block">
                                    {{ $errors->first('estado') }}
                                </p>
                            @endif
                        </div>  

                        <div class="form-group {{ $errors->has('valor') ? 'has-error' : '' }}">
                            <label for="valor">{{ trans('cruds.frete.fields.valor') }}*</label>
                            <input type="text" id="valor" name="valor" class="form-control" value="{{ old('valor', isset($fretes) ? $fretes->valor : '') }}" required>
                            @if($errors->has('valor'))
                                <p class="help-block">
                                    {{ $errors->first('valor') }}
                                </p>
                            @endif
                        </div>  

                        <div>
                            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
