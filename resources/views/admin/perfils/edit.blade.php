@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.perfil.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.perfils.update", [$perfil->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('perfil') ? 'has-error' : '' }}">
                            <label for="perfil">{{ trans('cruds.perfil.fields.perfil') }}*</label>
                            <input type="text" id="perfil" name="perfil" class="form-control" value="{{ old('perfil', isset($perfil) ? $perfil->perfil : '') }}" required>
                            @if($errors->has('perfil'))
                                <p class="help-block">
                                    {{ $errors->first('perfil') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.perfil.fields.perfil_helper') }}
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