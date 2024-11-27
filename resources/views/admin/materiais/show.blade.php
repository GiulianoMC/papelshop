@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.produto.title') }}
                    <a class="btn btn-default" href="{{ url()->previous() }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.produto.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $produto->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.produto.fields.descricao') }}
                                    </th>
                                    <td>
                                        {{ $produto->descricao }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.produto.fields.descricao_longa') }}
                                    </th>
                                    <td>
                                        {{ $produto->descricao_longa }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.produto.fields.cliques') }}
                                    </th>
                                    <td>
                                        {{ $produto->cliques }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.produto.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Produto::STATUS_RADIO[$produto->status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.produto.fields.parceiro') }}
                                    </th>
                                    <td>
                                        {{ $produto->parceiro->pessoa->nome }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.produto.fields.marca') }}
                                    </th>
                                    <td>
                                        {{ $produto->marca->nome }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.produto.fields.valor') }}
                                    </th>
                                    <td>
                                        {{ number_format($produto->valor,2,',','.') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.produto.fields.valor_anterior') }}
                                    </th>
                                    <td>
                                        {{ number_format($produto->valor_anterior,2,',','.') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.produto.fields.cupom') }}
                                    </th>
                                    <td>
                                        {{ $produto->cupom }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.produto.fields.texto_cupom') }}
                                    </th>
                                    <td>
                                        {{ $produto->texto_cupom }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.produto.fields.categorias') }}
                                    </th>
                                    <td>
                                        @foreach($produto->categorias as $key => $item)
                                                <span class="label label-info label-many">{{ $item->nome }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.produto.fields.vantagens') }}
                                    </th>
                                    <td>
                                        @foreach($produto->vantagens as $key => $item)
                                            <span class="label label-info label-many">{{ $item->descricao }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.produto.fields.imagem') }}
                                    </th>
                                    <td>
                                        @if ($produto->imagem)
                                            <img width="100" src = "{{ asset('/images/produtos/'.$produto->imagem) }}" />
                                        @else
                                            <img width="100" src = "{{ asset('/images/avatar.png') }}" />                               
                                        @endif
                                    </td>
                                </tr>                                
                            </tbody>
                        </table>
                        <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>

                    <ul class="nav nav-tabs">

                    </ul>
                    <div class="tab-content">

                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatableTask">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.produto.fields.platform') }}
                                    </th> 
                                    <th>
                                        {{ trans('cruds.produto.fields.link') }}
                                    </th> 
                                    <th>
                                        {{ trans('cruds.produto.fields.link_status') }}
                                    </th>  
                                    <th>
                                        {{ trans('cruds.produto.fields.link_externo') }}
                                    </th>  
                                    <th>
                                        {{ trans('cruds.produto.fields.link_chat') }}
                                    </th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($links as $key => $link)
                                    <tr data-entry-id="{{ $link->id }}">
                                        <td>
                                            {{ $link->platform->name ?? '' }}
                                        </td>  
                                        <td>
                                            {{ $link->link ?? '' }}
                                        </td> 
                                        <td>
                                            {{ $link->status ?? '' }}
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
