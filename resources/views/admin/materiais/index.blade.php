@extends('layouts.admin')
@section('content')
<div class="content">
    @can('produto_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.produtos.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.produto.title_singular') }}
                </a>
                <a class="btn btn-warning" href="{{ route("admin.produtos.updatefirebase") }}">
                    {{ trans('global.updatefirebase') }} - {{ trans('cruds.produto.title') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.produto.title_singular') }} {{ trans('global.list') }}
                    <div class="row" style="margin-top: 15px">
                        <div class="col-lg-12">
                            <input type="text" id="searchDescricao" class="form-control" placeholder="Pesquisar por descrição">
                        </div>
                        <div class="col-lg-3">
                            <select id="filterCupom" class="form-control">
                                <option value="">Filtrar por cupom</option>
                                <option value="com">Com cupom</option>
                                <option value="sem">Sem cupom</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <select id="filterLojaParceira" class="form-control">
                                <option value="">Filtrar por Loja Parceira</option>
                                @php
                                    $lojasUnicas = [];
                                @endphp
                                @foreach($produtos as $produto)
                                    @if($produto->parceiro && $produto->parceiro->pessoa)
                                        @php
                                            $lojaNome = explode('.', $produto->parceiro->pessoa->nome)[0]; // Pega o nome antes do ponto
                                        @endphp
                                        @if(!in_array($lojaNome, $lojasUnicas)) // Verifica se o nome já foi adicionado
                                            <option value="{{ $lojaNome }}">{{ $lojaNome }}</option>
                                            @php
                                                $lojasUnicas[] = $lojaNome; // Adiciona o nome ao array
                                            @endphp
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <select id="filterMarca" class="form-control">
                                <option value="">Filtrar por marca</option>
                                @php
                                    $marcas = [];
                                    foreach ($produtos as $produto) {
                                        if ($produto->marca) {
                                            $marcas[$produto->marca->id] = $produto->marca->nome;
                                        }
                                    }
                                @endphp
                                @foreach($marcas as $marcaNome)
                                    <option value="{{ $marcaNome }}">{{ $marcaNome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <select id="filterCategoria" class="form-control">
                                <option value="">Filtrar por categoria</option>
                                @php
                                    $categorias = [];
                                    foreach ($produtos as $produto) {
                                        foreach ($produto->categorias as $categoria) {
                                            $categorias[$categoria->id] = $categoria->nome;
                                        }
                                    }
                                @endphp
                                @foreach($categorias as $categoriaNome)
                                    <option value="{{ $categoriaNome }}">{{ $categoriaNome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Parceiro">
                            <thead>
                                <tr>
                                    <th width="12">

                                    </th>
                                    <th>
                                        {{ trans('cruds.produto.fields.imagem') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.produto.fields.descricao') }}
                                    </th>    
                                    <th>
                                        {{ trans('cruds.produto.fields.status') }}
                                    </th> 
                                    <th>
                                        {{ trans('cruds.produto.fields.parceiro') }}
                                    </th>  
                                    <th>
                                        {{ trans('cruds.produto.fields.marca') }}
                                    </th>  
                                    <th>
                                        {{ trans('cruds.produto.fields.categorias') }}
                                    </th>                                        
                                    <th>
                                        {{ trans('cruds.produto.fields.vantagens') }}
                                    </th>   
                                    <th id="sortClicks" style="cursor: pointer;">
                                        {{ trans('cruds.produto.fields.cliques') }}
                                        <span id="sortIndicator">⇅</span>
                                    </th>
                                    <th>
                                        {{ trans('cruds.produto.fields.cupom') }}
                                    </th>                                  
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($produtos as $key => $produto)
                                    <tr data-entry-id="{{ $produto->id }}">
                                        <th onclick="window.location.href = '{{ route('admin.produtos.edit', $produto->id) }}'">
                                            {{ $produto->id ?? '' }}
                                        </th>
                                        <td onclick="window.location.href = '{{ route('admin.produtos.edit', $produto->id) }}'">
                                            @if ($produto->imagem)
                                                <img width="50" src = "{{ asset('/images/produtos/'.$produto->imagem) }}" />
                                            @else
                                                <img width="50" src = "{{ asset('/images/avatar.png') }}" />                               
                                            @endif
                                        </td>
                                        <td onclick="window.location.href = '{{ route('admin.produtos.edit', $produto->id) }}'">
                                            {{ $produto->descricao ?? '' }}
                                        </td>  
                                        <td onclick="window.location.href = '{{ route('admin.produtos.edit', $produto->id) }}'">
                                            {{ App\Produto::STATUS_RADIO[$produto->status] ?? '' }}
                                        </td>  
                                        <td onclick="window.location.href = '{{ route('admin.produtos.edit', $produto->id) }}'">
                                            {{ $produto->parceiro->pessoa->nome ?? '' }}
                                        </td>  
                                        <td onclick="window.location.href = '{{ route('admin.produtos.edit', $produto->id) }}'">
                                            {{ $produto->marca->nome ?? '' }}
                                        </td>    
                                        <td onclick="window.location.href = '{{ route('admin.produtos.edit', $produto->id) }}'">
                                            @foreach($produto->categorias as $key => $item)
                                                <span class="label label-info label-many">{{ $item->nome }}</span>
                                            @endforeach
                                        </td>  
                                        
                                        <td onclick="window.location.href = '{{ route('admin.produtos.edit', $produto->id) }}'">
                                            @foreach($produto->vantagens as $key => $item)
                                                <span class="label label-info label-many">{{ $item->descricao }}</span>
                                            @endforeach
                                        </td>    
                                        <td onclick="window.location.href = '{{ route('admin.produtos.edit', $produto->id) }}'">
                                            {{ $produto->cliques ?? '' }}
                                        </td>  
                                        <td onclick="window.location.href = '{{ route('admin.produtos.edit', $produto->id) }}'">
                                            {{ $produto->cupom ?? '' }}
                                        </td>                                 
                                        <td>
                                            @can('produto_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.produtos.show', $produto->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('produto_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.produtos.edit', $produto->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('produto_delete')
                                                <form action="{{ route('admin.produtos.destroy', $produto->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

document.getElementById('searchDescricao').addEventListener('keyup', function() {
        var searchValue = this.value.toLowerCase();
        var table = document.querySelector('.table tbody');
        var rows = table.querySelectorAll('tr');

        // Itera sobre cada linha da tabela
        rows.forEach(function(row) {
            var descricaoCell = row.cells[2]; 
            var descricao = descricaoCell.textContent.toLowerCase();

            if (descricao.indexOf(searchValue) > -1) {
                row.style.display = '';  
            } else {
                row.style.display = 'none'; 
            }
        });
    });

    document.getElementById('filterCategoria').addEventListener('change', function() {
    var selectedCategoria = this.value.toLowerCase();
    var table = document.querySelector('.table tbody');
    var rows = table.querySelectorAll('tr');

    rows.forEach(function(row) {
        var categoriaCell = row.cells[6]; // Coluna de categorias
        var categorias = Array.from(categoriaCell.querySelectorAll('.label-many')).map(function(label) {
            return label.textContent.toLowerCase();
        });

        if (categorias.includes(selectedCategoria) || selectedCategoria === "") {
            row.style.display = '';  // Mostra a linha
        } else {
            row.style.display = 'none';  // Esconde a linha
        }
    });
});

document.getElementById('filterMarca').addEventListener('change', function() {
    var selectedMarca = this.value.toLowerCase();
    var table = document.querySelector('.table tbody');
    var rows = table.querySelectorAll('tr');

    rows.forEach(function(row) {
        var marcaCell = row.cells[5]; // Coluna de marca
        var marca = marcaCell.textContent.toLowerCase();

        if (marca.indexOf(selectedMarca) > -1 || selectedMarca === "") {
            row.style.display = '';  // Mostra a linha
        } else {
            row.style.display = 'none';  // Esconde a linha
        }
    });
});

document.getElementById('filterCupom').addEventListener('change', function() {
    var selectedCupom = this.value;
    var table = document.querySelector('.table tbody');
    var rows = table.querySelectorAll('tr');

    rows.forEach(function(row) {
        var cupomCell = row.cells[9]; // Assumindo que a coluna do cupom é a oitava (ajuste se necessário)
        var hasCupom = cupomCell.textContent.trim() !== ''; // Verifica se o cupom é nulo ou vazio

        if ((selectedCupom === "com" && hasCupom) || 
            (selectedCupom === "sem" && !hasCupom) || 
            selectedCupom === "") {
            row.style.display = '';  // Mostra a linha
        } else {
            row.style.display = 'none';  // Esconde a linha
        }
    });
});

document.getElementById('filterLojaParceira').addEventListener('change', function() {
    var selectedLoja = this.value.toLowerCase();
    var table = document.querySelector('.table tbody');
    var rows = table.querySelectorAll('tr');

    rows.forEach(function(row) {
        var lojaCell = row.cells[4]; // Coluna de parceiro, ajuste se necessário
        var lojaNome = lojaCell.textContent.trim();
        var lojaAntesPonto = lojaNome.split('.')[0].toLowerCase(); // Pega o nome antes do ponto

        if (lojaAntesPonto.indexOf(selectedLoja) > -1 || selectedLoja === "") {
            row.style.display = '';  // Mostra a linha
        } else {
            row.style.display = 'none';  // Esconde a linha
        }
    });
});

    document.getElementById('sortClicks').addEventListener('click', function () {
        var table = document.querySelector('.table tbody');
        var rows = Array.from(table.querySelectorAll('tr'));
        var currentOrder = this.dataset.order || 'desc'; // Ordem inicial é descrescente

        // Determinar a nova ordem
        var newOrder = currentOrder === 'desc' ? 'asc' : 'desc';
        this.dataset.order = newOrder;

        // Atualizar indicador visual
        var sortIndicator = document.getElementById('sortIndicator');
        sortIndicator.textContent = newOrder === 'asc' ? '↑' : '↓';

        // Ordenar as linhas
        rows.sort(function (rowA, rowB) {
            var clicksA = parseInt(rowA.cells[8].textContent.trim()) || 0; // Coluna de cliques (ajuste o índice se necessário)
            var clicksB = parseInt(rowB.cells[8].textContent.trim()) || 0;

            return newOrder === 'asc' ? clicksA - clicksB : clicksB - clicksA;
        });

        // Reordenar a tabela
        rows.forEach(function (row) {
            table.appendChild(row); // Reinsere na ordem correta
        });
    });

</script>
@endsection
