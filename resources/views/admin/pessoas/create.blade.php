@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.pessoa.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.pessoas.store") }}" method="POST" enctype="multipart/form-data">
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
                                {{ trans('cruds.pessoa.fields.nome_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('cpfcnpj') ? 'has-error' : '' }}">
                            <label for="cpfcnpj">{{ trans('cruds.pessoa.fields.cpfcnpj') }}</label>
                            <input type="text" id="cpfcnpj" name="cpfcnpj" class="form-control" value="{{ old('cpfcnpj', isset($pessoa) ? $pessoa->cpfcnpj : '') }}">
                            @if($errors->has('cpfcnpj'))
                                <p class="help-block">
                                    {{ $errors->first('cpfcnpj') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.pessoa.fields.cpf_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">{{ trans('cruds.pessoa.fields.email') }}</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($pessoa) ? $pessoa->email : '') }}">
                            @if($errors->has('email'))
                                <p class="help-block">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.pessoa.fields.email_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('fone') ? 'has-error' : '' }}">
                            <label for="fone">{{ trans('cruds.pessoa.fields.fone') }}</label>
                            <input type="fone" id="fone" name="fone" class="form-control" value="{{ old('fone', isset($pessoa) ? $pessoa->fone : '') }}">
                            @if($errors->has('fone'))
                                <p class="help-block">
                                    {{ $errors->first('fone') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.pessoa.fields.fone_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('celular') ? 'has-error' : '' }}">
                            <label for="celular">{{ trans('cruds.pessoa.fields.celular') }}</label>
                            <input type="celular" id="celular" name="celular" class="form-control" value="{{ old('celular', isset($pessoa) ? $pessoa->celular : '') }}">
                            @if($errors->has('celular'))
                                <p class="help-block">
                                    {{ $errors->first('celular') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.pessoa.fields.celular_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('cep') ? 'has-error' : '' }}">
                            <label for="cep">{{ trans('cruds.pessoa.fields.cep') }}</label>
                            <input type="cep" id="cep" name="cep" class="form-control" value="{{ old('cep', isset($pessoa) ? $pessoa->cep : '') }}">
                            @if($errors->has('cep'))
                                <p class="help-block">
                                    {{ $errors->first('cep') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.pessoa.fields.cep_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('logradouro') ? 'has-error' : '' }}">
                            <label for="logradouro">{{ trans('cruds.pessoa.fields.logradouro') }}</label>
                            <input type="logradouro" id="logradouro" name="logradouro" class="form-control" value="{{ old('logradouro', isset($pessoa) ? $pessoa->logradouro : '') }}">
                            @if($errors->has('logradouro'))
                                <p class="help-block">
                                    {{ $errors->first('logradouro') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.pessoa.fields.logradouro_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('numero') ? 'has-error' : '' }}">
                            <label for="numero">{{ trans('cruds.pessoa.fields.numero') }}</label>
                            <input type="numero" id="numero" name="numero" class="form-control" value="{{ old('numero', isset($pessoa) ? $pessoa->numero : '') }}">
                            @if($errors->has('numero'))
                                <p class="help-block">
                                    {{ $errors->first('numero') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.pessoa.fields.numero_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('bairro') ? 'has-error' : '' }}">
                            <label for="bairro">{{ trans('cruds.pessoa.fields.bairro') }}</label>
                            <input type="bairro" id="bairro" name="bairro" class="form-control" value="{{ old('bairro', isset($pessoa) ? $pessoa->bairro : '') }}">
                            @if($errors->has('bairro'))
                                <p class="help-block">
                                    {{ $errors->first('bairro') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.pessoa.fields.bairro_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('complemento') ? 'has-error' : '' }}">
                            <label for="complemento">{{ trans('cruds.pessoa.fields.complemento') }}</label>
                            <input type="complemento" id="complemento" name="complemento" class="form-control" value="{{ old('complemento', isset($pessoa) ? $pessoa->complemento : '') }}">
                            @if($errors->has('complemento'))
                                <p class="help-block">
                                    {{ $errors->first('complemento') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.pessoa.fields.complemento_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('cidade') ? 'has-error' : '' }}">
                            <label for="cidade">{{ trans('cruds.pessoa.fields.cidade') }}</label>
                            <input type="cidade" id="cidade" name="cidade" class="form-control" value="{{ old('cidade', isset($pessoa) ? $pessoa->cidade : '') }}">
                            @if($errors->has('cidade'))
                                <p class="help-block">
                                    {{ $errors->first('cidade') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.pessoa.fields.cidade_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('uf') ? 'has-error' : '' }}">
                            <label for="uf">{{ trans('cruds.pessoa.fields.uf') }}</label>
                            <input type="uf" id="uf" name="uf" class="form-control" value="{{ old('uf', isset($pessoa) ? $pessoa->uf : '') }}">
                            @if($errors->has('uf'))
                                <p class="help-block">
                                    {{ $errors->first('uf') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.pessoa.fields.uf_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('tipo') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.pessoa.fields.tipo') }}*</label>
                            @foreach(App\Pessoa::TIPO_RADIO as $key => $label)
                                <div>
                                    <input id="tipo_{{ $key }}" name="tipo" type="radio" value="{{ $key }}" {{ old('tipo', 'PF') === (string)$key ? 'checked' : '' }} required>
                                    <label for="tipo_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('tipo'))
                                <p class="help-block">
                                    {{ $errors->first('tipo') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('perfils') ? 'has-error' : '' }}">
                            <label for="perfil">{{ trans('cruds.pessoa.fields.perfil') }}*
                                <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                            <select name="perfils[]" id="perfils" class="form-control select2" multiple="multiple" required>
                                @foreach($perfils as $id => $perfil)
                                    <option value="{{ $id }}" {{ (in_array($id, old('perfils', [])) || isset($pessoa) && $pessoa->perfils->contains($id)) ? 'selected' : '' }}>{{ $perfil }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('perfils'))
                                <p class="help-block">
                                    {{ $errors->first('perfils') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.pessoa.fields.perfil_helper') }}
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
