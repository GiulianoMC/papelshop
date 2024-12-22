@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.material.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route('admin.materiais.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="nome">{{ trans('cruds.material.fields.nome') }}*</label>
                            <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome', isset($material) ? $material->nome : '') }}" required>
                            @if($errors->has('nome'))
                                <p class="help-block">
                                    {{ $errors->first('nome') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.material.fields.nome_helper') }}
                            </p>
                        </div>

                        <div class="form-group {{ $errors->has('marca_id') ? 'has-error' : '' }}">
                            <label for="marca_id">{{ trans('cruds.material.fields.marca') }}*</label>
                            <select id="marca_id" name="marca_id" class="form-control" required>
                                @foreach($marcas as $marca)
                                    <option value="{{ $marca->id }}" {{ old('marca_id', isset($material) ? $material->marca_id : '') == $marca->id ? 'selected' : '' }}>
                                        {{ $marca->nome }}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->has('marca_id'))
                                <p class="help-block">
                                    {{ $errors->first('marca_id') }}
                                </p>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('categoria_id') ? 'has-error' : '' }}">
                            <label for="categoria_id">{{ trans('cruds.material.fields.categoria') }}*</label>
                            <select id="categoria_id" name="categoria_id" class="form-control" required>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ old('categoria_id', isset($material) ? $material->categoria_id : '') == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nome }}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->has('categoria_id'))
                                <p class="help-block">
                                    {{ $errors->first('categoria_id') }}
                                </p>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('preco') ? 'has-error' : '' }}">
                            <label for="preco">{{ trans('cruds.material.fields.preco') }}*</label>
                            <input type="number" step="0.01" id="preco" name="preco" class="form-control" value="{{ old('preco', isset($material) ? $material->preco : '') }}" required>
                            @if($errors->has('preco'))
                                <p class="help-block">
                                    {{ $errors->first('preco') }}
                                </p>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
                            <label for="descricao">{{ trans('cruds.material.fields.descricao') }}</label>
                            <textarea id="descricao" name="descricao" class="form-control">{{ old('descricao', isset($material) ? $material->descricao : '') }}</textarea>
                            @if($errors->has('descricao'))
                                <p class="help-block">
                                    {{ $errors->first('descricao') }}
                                </p>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('data_compra') ? 'has-error' : '' }}">
                            <label for="data_compra">{{ trans('cruds.material.fields.data_compra') }}*</label>
                            <input type="date" id="data_compra" name="data_compra" class="form-control" value="{{ old('data_compra', isset($material) ? $material->data_compra : '') }}" required>
                            @if($errors->has('data_compra'))
                                <p class="help-block">
                                    {{ $errors->first('data_compra') }}
                                </p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="disponivel">{{ trans('cruds.material.fields.disponivel') }}</label>

                            <!-- Campo escondido que envia '0' se o checkbox não for marcado -->
                            <input type="hidden" name="disponivel" value="0">

                            <!-- Checkbox que, se marcado, sobrescreve o valor do campo escondido para '1' -->
                            <input type="checkbox" id="disponivel" name="disponivel" value="1" {{ old('disponivel', isset($material) ? $material->disponivel : 0) ? 'checked' : '' }}>
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
