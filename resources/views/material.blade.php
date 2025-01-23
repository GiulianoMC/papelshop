@extends('layouts.app')
@section('content')
    <div class="col-lg-12" style="padding: 0">

            <div class="panel-body">
                <form action="{{ route('carrinho.adicionar', $material['id']) }}" method="POST">
                    @csrf
                    <div class="container-product" style="margin-top: 50px">
                        <div class="container-img-product">
                            <img class="img-product" src="{{ $material['imagem'] }}" alt="ImageI837" />
                        </div>
                        <div style="width: 100%">
                            <div class="tres_single-product-page-description-frame12">
                                <div class="tres_single-product-page-description-frame1171274930">
                                    <span class="tres_single-product-page-description-text082" style="font-size: 3em">
                                        <span>{{ $material['nome'] }}</span>
                                    </span>
                                </div>
                            </div>

                            <div style="display: flex; justify-content: space-between; padding-top: 10px; border-top: 1px solid #F0F1F5; margin-top: 10px">
                                <div class="tres_single-product-page-description-frame17">
                                    <span class="tres_single-product-page-description-text086" style="font-size: 3em">
                                        <span>R$ {{ $material['preco'] }}</span>
                                    </span>
                                </div>
                            </div>

                            <div style="display: flex; justify-content: space-between; padding-top: 10px; margin-top: 10px">
                                <div class="tres_single-product-page-description-frame17">
                                    <span class="tres_single-product-page-description-text002" style="font-size: 2em">
                                        <span>{{ $material['descricao'] }}</span>
                                    </span>
                                </div>
                            </div>

                            <div style="display: flex; justify-content: space-between; padding-top: 10px; margin-top: 10px">
                                <div class="tres_single-product-page-description-frame17">
                                    <span class="tres_single-product-page-description-text002" style="font-size: 1.5em">
                                        <span>Categoria: {{ $categoria['nome'] }}</span>
                                    </span>
                                </div>
                            </div>

                            <div style="display: flex; justify-content: space-between; padding-top: 10px; margin-top: 10px">
                                <div class="tres_single-product-page-description-frame17">
                                    <span class="tres_single-product-page-description-text002" style="font-size: 1.5em">
                                        <span>Marca: {{ $marca['nome'] }}</span>
                                    </span>
                                </div>
                            </div>

                            <div style="display: flex; align-items: center; padding-top: 10px; margin-top: 10px;">
                                <span class="tres_single-product-page-description-text002"><b>Quantidade:</b></span>
                                <div style="display: flex; align-items: center; gap: 5px; margin-left: 10px;">
                                <input type="number" name="quantidade" id="quantidade" value="1" min="1" style="width: 60px; text-align: center; font-size: 16px;" />
                                </div>
                            </div>

                            <button type="submit" class="tres_single-product-page-description-default-button">
                                <div class="tres_single-product-page-description-wrapper41">
                                    <span class="tres_single-product-page-description-text096">
                                        <span>Comprar o Material</span>
                                    </span>
                                    <img src="{{ asset('images/produto/icexternallinki837-y7no.svg') }}" alt="icexternallinkI837" class="tres_single-product-page-description-icexternallink" />
                                </div>
                            </button>
                        </div>
                    </div>
                </form>


                <div class="Divider"
                    style="width: 100%; height: 0px; left: 80px; top: 2528px; border: 1px #F0F1F5 solid; margin:40px 0">
                </div>

                <h1 style="font-size: 28px; font-weight: 700; margin: 30px 10%;">Você pode gostar</h1>
                <div class="row text-center" style="margin-right: 5%; margin-top: 10px; margin-left: 5%">
                            @foreach ($items as $key => $material)
                                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 itemGridCard" style="margin-bottom: 20px; height: 400px">
                                    <div class="material-home-grid-card">
                                        <img class="material-home-grid-image" src="{{ $material['imagem'] }}">
                                        <div class="material-home-grid-content">
                                            <a style="text-decoration: none;" href="/material/{{ $material['id'] }}">
                                                <div class="material-home-grid-description" style="font-size:1.50em;">
                                                    <span>{{ $material['nome'] }}</span>
                                                </div>
                                                <div class="material-home-grid-details">
                                                    <div style="font-size:1.10em;">
                                                        <span><strong>Categoria:</strong> 
                                                            {{ $categorias->firstWhere('id', $material['categoria_id'])->nome ?? 'Não definida' }}
                                                        </span>
                                                    </div>
                                                    <div style="font-size:1.10em;">
                                                        <span><strong>Marca:</strong> 
                                                            {{ $marcas->firstWhere('id', $material['marca_id'])->nome ?? 'Não definida' }}
                                                        </span>
                                                    </div>
                                                    <div style="font-size:1.10em;">
                                                        <span><strong>Descrição:</strong> {{ $material['descricao'] }}</span>
                                                    </div>
                                                    <hr>
                                                    <div style="font-size:1.65em;">
                                                        <span><strong>Preço: R$ {{ $material['preco'] }}</strong></span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
    </div>
@endsection
@section('scripts')

    <script>
        console.log*
        function on(id) {
            document.getElementById(id).style.display = "block";
        }

        function off(id) {
            document.getElementById(id).style.display = "none";
        }
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('button-back-home').addEventListener('click', function() {
                window.location.href = "/";
            });
        });
    </script>
@endsection