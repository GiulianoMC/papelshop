@extends('layouts.admin')
@section('content')
<div class="content">
    {{-- @include('layouts.mapa') --}}

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.marca.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.marcas.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="nome">{{ trans('cruds.pessoa.fields.nome') }}*</label>
                            <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome', isset($pessoa) ? $pessoa->nome : '') }}" required>
                            @if($errors->has('nome'))
                                <p class="help-block">
                                    {{ $errors->first('nome') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.marca.fields.nome_helper') }}
                            </p>
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
