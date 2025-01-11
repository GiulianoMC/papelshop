@extends('layouts.app')
@section('content')
    <class="row" id="corpo">


        <div class="col-lg-12" style="padding: 0">

            <div class="panel panel-default" style="margin-top: 0px; margin-bottom: -20px">
                <div class="panel-body">
                    <div class="HomeGrid" style="position: relative; background: white; left: 0px; margin: 0 auto;">
                        
                        <div class="Frame1171274928"
                            style=" width: 100%; justify-content: flex-start; align-items: center; gap: 16px; display: inline-flex; margin-top:30px; margin-bottom: 30px">
                            <div class="Frame113"
                                style=" flex: 1 1 0; height: 40px; justify-content: flex-start; align-items: center; gap: 10px; display: flex">
                            </div>
                            <!-- <a href="/list">
                                <div class="IconButton"
                                    style="margin-right: 10px;background: white; border-radius: 100px; justify-content: flex-start; align-items: flex-start; gap: 10px; display: flex">
                                    <div class="IcGrid"
                                        style="width: 24px; height: 24px; padding: 3.75px; justify-content: center; align-items: center; display: flex">
                                        <img src="{{ asset('images/iclisti837-6sq8.svg') }}"
                                            style="width: 36px; height: 36px; object-fit: contain;" />
                                    </div>
                                </div>
                            </a> -->
                        </div>

                        <div class="row text-center" style="margin-right: 0">
                            @foreach ($items as $key => $material)
                                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 itemGridCard"
                                    style="margin-bottom: 20px; height: 350px">
                                        <div class="material-home-grid-card">
                                            <img class="material-home-grid-image">
                                            <div class="material-home-grid-content">
                                                <form action="{{ route('material.show', ['id' => $material['id']]) }}" method="GET" style="text-decoration: none;">
                                                    <button type="submit" style="all: unset; cursor: pointer;">
                                                        <div class="material-home-grid-description">
                                                            <span>{{ $material['nome'] }}</span>
                                                        </div>
                                                        <div class="material-home-grid-details">
                                                            <div>
                                                                <span><strong>Categoria:</strong> 
                                                                    {{ $categorias->firstWhere('id', $material['categoria_id'])->nome ?? 'Não definida' }}
                                                                </span>
                                                            </div>
                                                            <div>
                                                                <span><strong>Marca:</strong> 
                                                                    {{ $marcas->firstWhere('id', $material['marca_id'])->nome ?? 'Não definida' }}
                                                                </span>
                                                            </div>
                                                            <div>
                                                                <span><strong>Preço: R</strong> {{ $material['preco'] }}</span>
                                                            </div>
                                                            <div>
                                                                <span><strong>Disponível:</strong> {{ $material['disponivel'] ? 'Sim' : 'Não' }}</span>
                                                            </div>
                                                            <div>
                                                                <span><strong>Descrição:</strong> {{ $material['descricao'] }}</span>
                                                            </div>
                                                        </div>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                </div>
                            @endforeach
                        </div>

                        @if($nextPage != null)

                        <div style="text-align: center">
                            <a href="{{ $nextPage }}">
                            Mais Produtos
                            </a>
                        </div>

                        @endif

                        <div class="Divider"
                            style="width: 100%; height: 0px; left: 80px; top: 2528px; border: 1px #F0F1F5 solid; margin:30px 0">
                        </div>
                        <div class="footerContainer"
                            style=" display:flex; justify-content:space-between; align-items:center; margin-bottom: 20px">

                            <div class="Social"
                                style=" left: 80px; top: 2560px; justify-content: flex-start; align-items: center; gap: 20px; display: inline-flex">
                            
                            </div>
                        </div>
            </div>
        </div>
        </class=>

        </div>
    @endsection
    @section('scripts')
        <script>
            function on(id) {
                document.getElementById(id).style.display = "block";
            }

            function off(id) {
                document.getElementById(id).style.display = "none";
            }
        </script>
        <script>
            function openSweep(conteudo) {
                const links = JSON.parse(conteudo);
                table = '<table>'
                for(let i = 0; i < links.length; i = i + 1 ) {
                    table += '<tr>'
                    table += '<td style="text-align: center;"">'
                    table += '<a href="'+links[i].link+'" target="_blank" autofocus">'+links[i].link+'</a>'
                    table += '</td>'
                    table += '</tr>'
                }
                table += '</table>'

                Swal.fire({
                            title: "<strong>Links</strong>",
                            html: table,
                            customClass: 'swal-wide'                           
                        });                
            }
        </script>

    @endsection

    <style>
        .modal-open {
            overflow: hidden;
            overflow-y: scroll;
            padding-right: 0 !important;
        }
    </style>
