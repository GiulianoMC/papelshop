@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.produto.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.produtos.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
                            <label for="descricao">{{ trans('cruds.produto.fields.descricao') }}*</label>
                            <input type="text" id="descricao" name="descricao" class="form-control" value="{{ old('descricao', isset($pessoa) ? $pessoa->descricao : '') }}" required>
                            @if($errors->has('descricao'))
                                <p class="help-block">
                                    {{ $errors->first('descricao') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.produto.fields.descricao_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('descricao_longa') ? 'has-error' : '' }}">
                            <label for="descricao_longa">{{ trans('cruds.produto.fields.descricao_longa') }}</label>
                            <textarea id="descricao_longa" name="descricao_longa" class="form-control ">{{ old('descricao_longa', isset($produto) ? $produto->descricao_longa : '') }}</textarea>
                            @if($errors->has('descricao_longa'))
                                <p class="help-block">
                                    {{ $errors->first('descricao_longa') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.produto.fields.descricao_longa_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('valor') ? 'has-error' : '' }}">
                            <label for="valor">{{ trans('cruds.produto.fields.valor') }}*</label>
                            <input type="number" id="valor" name="valor" class="form-control" value="{{ old('valor', isset($pessoa) ? $pessoa->valor : '') }}" step="0.01" required>
                            @if($errors->has('valor'))
                                <p class="help-block">
                                    {{ $errors->first('valor') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.produto.fields.valor_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('valor_anterior') ? 'has-error' : '' }}">
                            <label for="valor_anterior">{{ trans('cruds.produto.fields.valor_anterior') }}*</label>
                            <input type="number" id="valor_anterior" name="valor_anterior" class="form-control" value="{{ old('valor_anterior', isset($pessoa) ? $pessoa->valor_anterior : '') }}" step="0.01" required>
                            @if($errors->has('valor_anterior'))
                                <p class="help-block">
                                    {{ $errors->first('valor_anterior') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.produto.fields.valor_anterior_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('cupom') ? 'has-error' : '' }}">
                            <label for="cupom">{{ trans('cruds.produto.fields.cupom') }}</label>
                            <input type="text" id="cupom" name="cupom" class="form-control" value="{{ old('cupom', isset($produto) ? $produto->cupom : '') }}">
                            @if($errors->has('cupom'))
                                <p class="help-block">
                                    {{ $errors->first('cupom') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.produto.fields.cupom_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('texto_cupom') ? 'has-error' : '' }}">
                            <label for="texto_cupom">{{ trans('cruds.produto.fields.texto_cupom') }}</label>
                            <input type="text" id="texto_cupom" name="texto_cupom" class="form-control" value="{{ old('texto_cupom', isset($produto) ? $produto->texto_cupom : '') }}">
                            @if($errors->has('texto_cupom'))
                                <p class="help-block">
                                    {{ $errors->first('texto_cupom') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.produto.fields.texto_cupom_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('validade') ? 'has-error' : '' }}">
                            <label for="validade">{{ trans('cruds.produto.fields.validade') }}*</label>
                            <input type="number" id="validade" name="validade" class="form-control" value="{{ old('validade', isset($pessoa) ? $pessoa->validade : '') }}" required>
                            @if($errors->has('validade'))
                                <p class="help-block">
                                    {{ $errors->first('validade') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.produto.fields.validade_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.produto.fields.status') }}*</label>
                            @foreach(App\Produto::STATUS_RADIO as $key => $label)
                                <div>
                                    <input id="status_{{ $key }}" name="status" type="radio" value="{{ $key }}" {{ old('status', 'A') === (string)$key ? 'checked' : '' }} required>
                                    <label for="status_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('status'))
                                <p class="help-block">
                                    {{ $errors->first('status') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('marca_id') ? 'has-error' : '' }}">
                            <label for="marca">{{ trans('cruds.produto.fields.marca') }}</label>
                            <select name="marca_id" id="marca" class="form-control select2" required>
                                @foreach($marcas as $id => $marca)
                                    <option value="{{ $id }}" {{ (isset($produto) && $produto->marca ? $produto->marca->id : old('marca_id')) == $id ? 'selected' : '' }}>{{ $marca }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('marca_id'))
                                <p class="help-block">
                                    {{ $errors->first('marca_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('parceiro_id') ? 'has-error' : '' }}">
                            <label for="parceiro">{{ trans('cruds.produto.fields.parceiro') }}</label>
                            <select name="parceiro_id" id="parceiro" class="form-control select2" required>
                                @foreach($parceiros as $id => $parceiro)
                                    <option value="{{ $id }}" {{ (isset($produto) && $produto->parceiro ? $produto->parceiro->id : old('parceiro_id')) == $id ? 'selected' : '' }}>{{ $parceiro }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('parceiro_id'))
                                <p class="help-block">
                                    {{ $errors->first('parceiro_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('vantagens') ? 'has-error' : '' }}">
                            <label for="vantagens">{{ trans('cruds.produto.fields.vantagens') }}*
                                <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                            <select name="vantagens[]" id="vantagens" class="form-control select2" multiple="multiple" required>
                                @foreach($vantagens as $id => $vantagens)
                                    <option value="{{ $id }}" {{ (in_array($id, old('vantagens', [])) || isset($produto) && $produto->vantagens->contains($id)) ? 'selected' : '' }}>{{ $vantagens }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('vantagens'))
                                <p class="help-block">
                                    {{ $errors->first('vantagens') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.produto.fields.vantagens_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('categorias') ? 'has-error' : '' }}">
                            <label for="categorias">{{ trans('cruds.produto.fields.categorias') }}*
                                <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                            <select name="categorias[]" id="categorias" class="form-control select2" multiple="multiple" required>
                                @foreach($categorias as $id => $categorias)
                                    <option value="{{ $id }}" {{ (in_array($id, old('categorias', [])) || isset($produto) && $produto->categorias->contains($id)) ? 'selected' : '' }}>{{ $categorias }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('categorias'))
                                <p class="help-block">
                                    {{ $errors->first('categorias') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.produto.fields.categorias_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('imagem') ? 'has-error' : '' }}">
                            <label for="imagem">{{ trans('cruds.produto.fields.imagem') }}</label>
                            <input type="file" id="imagem" name="imagem" class="form-control" value="{{ old('imagem', isset($produto) ? $produto->imagem : '') }}">
                            @if($errors->has('imagem'))
                                <p class="help-block">
                                    {{ $errors->first('imagem') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.produto.fields.imagem_helper') }}
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
