@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.frete.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.fretes.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('estado') ? 'has-error' : '' }}">
                            <label for="estado">{{ trans('cruds.frete.fields.estado') }}*</label>
                            <select id="estado" name="estado" class="form-control" required>
                                <option value="">Selecione o estado</option>
                                @foreach(trans('cruds.frete.fields.estados') as $sigla => $nome)
                                    <option value="{{ $sigla }}" {{ old('estado') == $sigla ? 'selected' : '' }}>
                                        {{ $nome }}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->has('estado'))
                                <p class="help-block">
                                    {{ $errors->first('estado') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('valor') ? 'has-error' : '' }}">
                            <label for="valor">{{ trans('cruds.frete.fields.valor') }}*</label>
                            <input type="text" id="valor" name="valor" class="form-control" value="{{ old('valor') }}" required>
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
