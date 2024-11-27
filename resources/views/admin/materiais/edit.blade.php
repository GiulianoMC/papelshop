@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.produto.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.produtos.update", [$produto->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
                            <label for="descricao">{{ trans('cruds.produto.fields.descricao') }}*</label>
                            <input type="text" id="descricao" name="descricao" class="form-control" value="{{ old('descricao', isset($produto) ? $produto->descricao : '') }}" required>
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
                            <input type="number" id="valor" name="valor" class="form-control" value="{{ old('valor', isset($produto) ? $produto->valor : '') }}" step="0.01" required>
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
                            <input type="number" id="valor_anterior" name="valor_anterior" class="form-control" value="{{ old('valor_anterior', isset($produto) ? $produto->valor_anterior : '') }}" step="0.01" required>
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
                            <input type="number" id="validade" name="validade" class="form-control" value="{{ old('validade', isset($produto) ? $produto->validade : '') }}" required>
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
                        <div>
                        @if ($produto->imagem)
                            <img width="100" src = "{{ asset('/images/produtos/'.$produto->imagem) }}" />
                        @else
                            <img width="100" src = "{{ asset('/images/avatar.png') }}" />                               
                        @endif
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
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    @can('produto_create')
                        <div style="margin-bottom: 10px;" class="row">
                            <div class="col-lg-12">
                                <a data-toggle="modal" id="showButton" data-target="#mediumModal" class="btn btn-success">
                                    {{ trans('global.add') }} {{ trans('cruds.produto.fields.link') }}
                                </a>                            
                            </div>
                        </div>
                    @endcan
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatableTask">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.produto.fields.platform') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.produto.fields.link_status') }}
                                    </th> 
                                    <th>
                                        {{ trans('cruds.produto.fields.link') }}
                                    </th>  
                                    <th>
                                        {{ trans('cruds.produto.fields.link_externo') }}
                                    </th>  
                                    <th>
                                        {{ trans('cruds.produto.fields.link_chat') }}
                                    </th>                                                                       
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($links as $key => $link)
                                    <tr data-entry-id="{{ $link->id }}">
                                        <td>
                                            <select size="1" id="row-platform{{ $link->id }}"
                                                name="row-platform{{ $link->id }}">
                                                @foreach ($platforms as $id => $platform)
                                                    <option value="{{ $id ?? '' }}"
                                                        @if ($id == $link->platform->id) {{ 'selected="selected"' }} @endif>
                                                        {{ $platform ?? '' }}</option>
                                                @endforeach
                                            </select>
                                        </td>  
                                        <td>
                                            <select size="1" id="row-status{{ $link->id }}"
                                                name="row-status{{ $link->id }}">
                                                @foreach (App\LinkProduto::STATUS_RADIO as $key => $label)
                                                    <option value="{{ $key ?? '' }}"
                                                        @if ($key == $link->status) {{ 'selected="selected"' }} @endif>
                                                        {{ $label ?? '' }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" id="row-link{{ $link->id }}"
                                                name="row-link{{ $link->id }}" value="{{ $link->link ?? '' }}" size="70">
                                        </td>
                                        <td>
                                            <a href="{{ env('APP_URL', 'http://127.0.0.1:8000') }}/link/{{ $link->uuid ?? '' }}" target="_blank">
                                            {{ env('APP_URL', 'http://127.0.0.1:8000') }}/link/{{ $link->uuid ?? '' }}
                                            </a>
                                        </td> 
                                        <td>
                                            <a href="{{ env('APP_URL', 'http://127.0.0.1:8000') }}/link/{{ $link->uuid ?? '' }}/{{ $link->platform->name ?? '' }}" target="_blank">
                                            {{ env('APP_URL', 'http://127.0.0.1:8000') }}/link/{{ $link->uuid ?? '' }}/{{ $link->platform->name ?? '' }}
                                            </a>
                                        </td>                                                                              
                                        <td>
                                            @can('produto_edit')
                                                <form id="form{{ $link->id }}" action="{{ route('admin.produtos.updatelink', $link->id) }}" method="POST"
                                                    style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="link" id="link" value="">
                                                    <input type="hidden" name="platform_id" id="platform_id" value="">
                                                    <input type="hidden" name="status" id="status" value="">
                                                    <button class="btn btn-xs btn-info" onclick="Salvar{{ $link->id }}();"><i
                                                            class="fa-fw fa fa-save"></i></button>
                                                </form>
                                            @endcan

                                            @can('produto_delete')
                                                <form action="{{ route('admin.produtos.destroylink', $link->id) }}" method="POST"
                                                    onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                    style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button class="btn btn-xs btn-danger"><i
                                                            class="fa-fw fa fa-trash"></i></button>
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
        $(function() {
            $.extend(true, $.fn.dataTable.defaults, {
                order: [
                    [1, 'desc']
                ],
                pageLength: 10,
            });

            $('.datatableTask').DataTable({
                buttons: dtButtons
            })

            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })
    </script>
    <script>
        @foreach ($produto->links as $key => $link)
        function Salvar{{ $link->id }}() {
            document.forms["form{{ $link->id }}"].elements.link.value = document.getElementById('row-link{{ $link->id }}').value
            document.forms["form{{ $link->id }}"].elements.platform_id.value = document.getElementById('row-platform{{ $link->id }}').value
            document.forms["form{{ $link->id }}"].elements.link.value = document.getElementById('row-link{{ $link->id }}').value
            document.forms["form{{ $link->id }}"].elements.status.value = document.getElementById('row-status{{ $link->id }}').value
        }
        @endforeach
    </script>

<!-- medium modal -->
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="mediumBody" style="overflow-y: auto;">
                <div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ trans('global.create') }} {{ trans('cruds.produto.fields.link') }}
                        </div>
                        <div class="panel-body">
        
                            <form action="{{ route("admin.produtos.storelink") }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="produto_id" id="produto_id" value="{{ $produto->id }}">
                                <div class="form-group {{ $errors->has('platform_id') ? 'has-error' : '' }}">
                                    <label for="platform">{{ trans('cruds.produto.fields.platform') }}*</label>
                                    <select name="platform_id" id="platform" class="form-control select2" required>
                                        @foreach($platforms as $id => $platform)
                                            <option value="{{ $id }}" >{{ $platform }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('platform_id'))
                                        <p class="help-block">
                                            {{ $errors->first('platform_id') }}
                                        </p>
                                    @endif
                                </div>  
                                <div class="form-group {{ $errors->has('tipo') ? 'has-error' : '' }}">
                                    <label>{{ trans('cruds.produto.fields.link_status') }}*</label>
                                    @foreach(App\LinkProduto::STATUS_RADIO as $key => $label)
                                        <div>
                                            <input id="status_{{ $key }}" name="status" type="radio" value="{{ $key }}" {{ old('status', 'P') === (string)$key ? 'checked' : '' }} required>
                                            <label for="status_{{ $key }}">{{ $label }}</label>
                                        </div>
                                    @endforeach
                                    @if($errors->has('status'))
                                        <p class="help-block">
                                            {{ $errors->first('status') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
                                    <label for="link">{{ trans('cruds.produto.fields.link') }}*</label>
                                    <input type="text" id="link" name="link" class="form-control" value="" required>
                                    @if($errors->has('link'))
                                        <p class="help-block">
                                            {{ $errors->first('link') }}
                                        </p>
                                    @endif
                                    <p class="helper-block">
                                        {{ trans('cruds.produto.fields.link_helper') }}
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
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
@endsection


