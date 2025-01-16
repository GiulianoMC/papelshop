@extends('layouts.app')
@section('styles')
<style>
   html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: bold;
            height: 100vh;
            margin: 0;
        }
        .content {
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .title {
            font-size: 24px;
            margin-bottom: 20px;
        }
        select, input[type="text"] {
            font-size: 18px;
            padding: 5px;
            margin: 10px 0;
        
        }
        #priceDisplay {
            margin-top: 20px;
            font-size: 20px;
        }
        .dimension-inputs {
            display: none;
            margin-top: 10px;
        }
        .dimension-inputs input {
            margin: 5px;
        }
        .header, .footer {
            background-color: #ea7a1f; 
            color: #fff;
        }
        .header {
            padding: 5px 0;
            text-align: center;
        }
        .header img {
            max-width: 80px; 
            height: auto;   
        }
        .footer {
            padding: 20px 0;
        }
        .footer .social-icons img {
            width: 25px;
            margin: 0 10px;
        }
        .footer img {
            max-width: 80px; 
            height: auto;   
        }
        .img-material {
            max-width: 220px; 
            max-height: 220px; 
            height: auto; 
            object-fit: contain; 
            margin: 0 auto;
        }
        .img-upload {
            max-width: 40px; 
            max-height: 40px; 
            height: auto; 
            object-fit: contain; 
            margin: 0 auto;
        }
        select option {
            font-weight: bold;
        }

        .upload-area {
            cursor: pointer; 
            position: relative; 
            text-align: left; 
        }
        .upload-area img {
            max-width: 80px;
            height: auto;
        }
        .upload-preview {
            display: none; 
            max-width: 100%;
            max-height: 200px;
            margin-top: 10px;
        }
        #fileInput {
            display: none; 
        }
        .square {
            width: 100%;
            height: 90px; 
            background-color: #C3CFD9;
            display: flex;
            justify-content: center;
            align-items: center;
            color: black;
            font-size: 24px;
        }

        .square img {
            margin-right: 10px; 
            max-height: 80%; 
        }

        .square-text {
            line-height: 1; 
        }
        .container-custom {
            max-width: 1100px;
            margin: 0 15%;
            padding: 20px;
        }

        .product-item img {
            width: 100px;
            height: 100px;
        }

        .product-item {
            border-bottom: 1px solid #ddd;
            padding: 16px 0;
        }

        .product-item:last-child {
            border-bottom: none;
        }

        .product-item p {
            margin-bottom: 0.02rem;
        }

        .product-item a {
            display: block;
            margin-top: 0.1rem;
        }

        .resumo, .entrega {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
        }

        .resumo h5, .entrega h5 {
            margin-bottom: 20px;
        }

	    .btn-pagamento {
            background-color: #2c88d9;
            color: white;
            width: 100%;
            font-size: 18px;
            font-weight: bold;
        }

        .valor-total {
            background-color: #C3CFD9; 
            padding: 20px; 
            border-radius: 0.25rem; 
            text-align: start;
        }

        .btn-continuar-comprando {
            background-color: #ffffff; 
            color: #2c88d9; 
            font-weight: bold;
            
        }

        .btn-continuar-comprando:hover {
            background-color: #f8f9fa; 
            color: #2c88d9; 
        }

        .row {
            display: flex;
        }

        .scrollable-container {
            flex: 1;
            overflow-y: auto;
        }

        #direita-container, .scrollable-container {
            height: 100%;
        }

        .custom-margin {
            margin-left: 1rem;
        }

        .price-bottom {
            margin-top: auto; 
        }
</style>
@endsection
@section('content')

    <div class="square">
        <img src="{{ asset('images/carrinho.png') }}" alt="Ícone de pagamento" width="40" height="40">
        <div class="square-text">Carrinho</div>
    </div>


    <div class="container-custom">
        <div class="row">
            
            <div class="col-md-8 d-flex flex-column" style="margin-bottom:30px;">
                <div class="border rounded overflow-hidden" style="position: relative;">
                    <div class="scrollable-container p-3 flex-grow-1" style="position: relative; z-index: 1;">

                        @php
                            function limitText($text, $limit = 30, $end = '...') {
                                if (strlen($text) <= $limit) {
                                    return $text;
                                }
                                return substr($text, 0, $limit) . $end;
                            }
                        @endphp

                        @foreach ($materiais as $material)
                            <div class="product-item mb-3">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="row align-items-center flex-grow-1">
                                        <div class="col-auto">
                                            <img src="{{ asset('images/') }}" alt="Produto" class="me-3" style="border-radius: 10px;">
                                        </div>
                                        <div class="col">
                                            <h4><strong>{{ $material->nome }}</strong></h4>
                                            <p>{{ $marcas->firstWhere('id', $material->marca_id)->nome ?? 'Marca não encontrada' }}</p>
                                            <p>{{ $categorias->firstWhere('id', $material->categoria_id)->nome ?? 'Categoria não encontrada' }}</p>
                                            @if($material->descricao != null)
                                                <p>Descrição: {{ limitText($material->descricao, 100) }}</p>
                                            @endif
                                        </div>
                                        <div class="col-auto">
                                            <p class="mb-0">Preço: <strong>R$ {{ $material->preco }}</strong></p>
                                        </div>
                                    </div>
                                    <form action="{{ route('carrinho.deletar', $material->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja remover este item do carrinho?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm p-0 mb-1" onclick=""><img src="{{ asset('images/icon_lixeira.png') }}" alt="Excluir" class="icon" style="max-width: 20px; max-height: 20px;"></button></div>
                                    </form>
                                </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <div id="direita-container" class=" d-flex flex-column">
            <div class="resumo border rounded p-3 flex-grow-1 bg-white">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/resumo.png') }}" alt="Ícone de pagamento" width="40" height="40" style="margin-right: 10px;">
                        <h5 class="mb-0 " style="font-weight:bold;">RESUMO</h5>
                    </div>
                    <br>
                    <p>Valor dos materiais: <strong>R$ {{ number_format($precoMateriais, 2, ',', '.') }}</strong></p>
                    <hr>
                    <p>Frete: <strong>R$ </strong></p>
                    <div class="valor-total d-flex align-items-center justify-content-center p-2 rounded">
                        <p class="mb-0">Valor total: <strong>R$ </strong></p>
                    </div>
                </div>
                <div class="entrega border rounded p-3 mt-4 bg-white">
                <div class="d-flex align-items-center">
                        <img src="{{ asset('images/caminhao.png') }}" alt="Ícone de pagamento" width="40" height="40" style="margin-right: 10px;">
                        <h5 class="mb-0" style="font-weight:bold;">ENTREGA</h5>
                    </div>
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" id="retiradaLoja">
                        <label class="form-check-label" for="retiradaLoja">
                            Retirada na loja
                        </label>
                    </div>
                    <div class="mt-3 d-flex align-items-center">
                    <div class="flex-grow-1 me-2">
                        <input type="text" class="form-control" id="cep" placeholder="Digite seu CEP">
                    </div>
                    <button type="button" id="buscarCep" class="btn p-0" style="border: none; background: none; padding: 0; margin-left:10px;">
                        <img src="{{ asset('images/loupe.png') }}" alt="Imagem" style="max-width: 30px; max-height: 30px; object-fit: cover; border: none; ">
                    </button>
                </div>
                <a href="https://buscacepinter.correios.com.br/app/endereco/index.php" target="_blank" class="d-block mt-2" style="color: #2c88d9;">Não lembro meu CEP</a>
                </div>
                <div class="mt-4">
                <a href="#" id="pagamentoBtn" style="text-decoration: none;">
                    <button class="btn btn-pagamento w-100 d-flex align-items-center justify-content-center">
                        PAGAMENTO
                    </button>
                </a>
                    <button class="btn btn-continuar-comprando w-100 mt-3" onclick = "Tela_Inicial()">Continuar comprando</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal HTML -->
    <div class="modal fade" id="cepModal" tabindex="-1" role="dialog" aria-labelledby="cepModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cepModalLabel">Informações do CEP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="logradouro">Logradouro</label>
                        <input type="text" class="form-control" id="logradouro" readonly>
                    </div>
                    <div class="form-group">
                        <label for="bairro">Bairro</label>
                        <input type="text" class="form-control" id="bairro" readonly>
                    </div>
                    <div class="form-group">
                        <label for="localidade">Cidade</label>
                        <input type="text" class="form-control" id="localidade" readonly>
                    </div>
                    <div class="form-group">
                        <label for="uf">UF</label>
                        <input type="text" class="form-control" id="uf" readonly>
                    </div>
                    <div class="form-group">
                        <label for="numero">Número</label>
                        <input type="number" class="form-control" id="numero" hint="Digite o número">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" id="salvarCep" class="btn btn-primary">Calcular Frete</button>
                </div>
            </div>
        </div>
    </div>
            
    
@endsection
@section('scripts')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>

        window.addEventListener('load', function() {
            
            var direitaContainer = document.getElementById('direita-container');
            var scrollableContainer = document.querySelector('.scrollable-container');

            if (direitaContainer && scrollableContainer) {
                scrollableContainer.style.height = direitaContainer.offsetHeight + 'px';
            }
        });

        function adjustScrollableContainerHeight() {
            var direitaContainer = document.getElementById('direita-container');
            var scrollableContainer = document.querySelector('.scrollable-container');

            if (direitaContainer && scrollableContainer) {
                scrollableContainer.style.height = direitaContainer.offsetHeight + 'px';
            }
        }


        window.addEventListener('load', adjustScrollableContainerHeight);
        window.addEventListener('resize', adjustScrollableContainerHeight);


        document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('buscarCep').addEventListener('click', function() {
            const cep = document.getElementById('cep').value.replace(/\D/g, ''); // Remove qualquer caractere não numérico

            if (cep.length === 8) {
                fetch(`https://viacep.com.br/ws/${cep}/json/`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.erro) {
                            alert('CEP não encontrado');
                        } else {
                            document.getElementById('logradouro').value = data.logradouro;
                            document.getElementById('bairro').value = data.bairro;
                            document.getElementById('localidade').value = data.localidade;
                            document.getElementById('uf').value = data.uf;

                            $('#cepModal').modal('show');
                        }
                    })
                    .catch(error => {
                        console.error('Erro ao buscar CEP:', error);
                    });
            } else {
                alert('CEP inválido');
            }
        });
    });

        document.getElementById('salvarCep').addEventListener('click', function() {
            var logradouro = document.getElementById('logradouro').value;
            var bairro = document.getElementById('bairro').value;
            var localidade = document.getElementById('localidade').value;
            var uf = document.getElementById('uf').value;
            var numero = document.getElementById('numero').value;

            if (numero) {
                $('#cepModal').modal('hide');
            }
        });

        document.getElementById('pagamentoBtn').addEventListener('click', function(event) {
            event.preventDefault(); // Evita o redirecionamento padrão

            var logradouro = document.getElementById('logradouro').value;
            var bairro = document.getElementById('bairro').value;
            var localidade = document.getElementById('localidade').value;
            var uf = document.getElementById('uf').value;
            var numero = document.getElementById('numero').value;
            var check = document.getElementById('retiradaLoja').checked;

        });


        function Tela_Inicial(){

            window.location.href = "{{ route('/') }}";

        }

    </script>
@endsection
