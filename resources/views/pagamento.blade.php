@extends('layouts.app')

@section('styles')
    <style>
        html, body {
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 700;
            margin: 0;
        }
        .form-check-input {
            position: relative;
            width: 2rem; /* Aumenta o tamanho da caixa de seleção */
            height: 2rem; /* Aumenta o tamanho da caixa de seleção */
        }

        .texto {
            margin: 2px 10px 0;
            font-size: 1.5rem; /* Aumenta o tamanho da fonte */
        }

        .list-group-item {
            font-size: 1.5rem; /* Aumenta o tamanho da fonte das boxes */
            border-radius: 15px; /* Arredonda os cantos das boxes */
            padding: 20px 15px; /* Aumenta o padding para deixar as boxes mais espaçadas */
            height: 7rem;
        }

        .list-group{
            margin-top: 15px;
        }

        .box{
            height: 11rem !important;
        }

        .list-group-item span {
            font-size: 1.3rem; /* Aumenta o tamanho da fonte das boxes */
        }

        .card {
            border-radius: 15px; /* Arredonda o card do resumo */
            padding: 20px; /* Aumenta o padding do card */
        }

        .card-body span {
            font-size: 1.3rem; /* Aumenta o tamanho do texto do resumo */
        }

        .btn {
            font-size: 1.3rem; /* Aumenta o tamanho da fonte dos botões */
            border-radius: 12px; /* Arredondamento maior para os botões */
            padding: 15px; /* Aumenta o tamanho dos botões */
        }

        .btn-block {
            margin-bottom: 15px; /* Espaçamento entre os botões */
        }

        label{
            margin-top: 1rem;
        }

        h1{
            margin: 0px 10px;
        }

        .box-pix{
            background-color: #c4c1c0;
            border-radius: 3px;
            padding: 10px;
            margin-top: 20px;
            width: 100%;
            color:black;
        }

        .box-eco{
            margin-top: 20px;
            background-color: #70e640;
            border-radius: 3px;
            padding: 10px;
            width: 100%;
        }

        .box-eco span{
            color: black;
        }

        .botao{ 
            font-size: 1.8rem;
            font-weight: 700;
        }

        /* Estilos para o Modal de Carregamento e Barra de Progresso */
        .loading-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .loading-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
        }

        .progress-bar {
            width: 100%;
            background-color: #f3f3f3;
            border-radius: 10px;
            margin-top: 20px;
        }

        .progress-bar .progress {
            height: 20px;
            width: 0%;
            background-color: #2c88d9;
            border-radius: 10px;
        }

        .loading-message {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2c88d9;
            margin-bottom: 20px;
        }

        /* Estilos do Modal do Cartão */
        .card-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .card-modal-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            width: 80%;
            max-width: 500px;
        }

        .card-modal-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .card-modal-container button {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            background-color: #2c88d9;
            color: white;
            border: none;
        }

        .card-modal-container .cancel-btn {
            background-color: #f44336;
            margin-top: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <!-- Payment Methods -->
            <div class="col-md-8">
                <div class="d-flex align-items-center">
                    <i class="fas fa-shopping-basket fa-3x me-2"></i> <!-- Ícone aumentado -->
                    <h1>Forma de Pagamento</h1>
                </div>

                <div class="list-group">
                    <label class="list-group-item d-flex flex-column p-3 shadow-sm border rounded mb-3 box" style="position: relative;">
                        <!-- Parte superior com o checkbox à esquerda e o título PIX -->
                        <div class="d-flex align-items-center">
                            <input style="margin-right: 10px;" type="radio" id="pix" name="payment" class="form-check-input me-3" checked>
                            PIX
                        </div>

                        <!-- Linha abaixo do título, com posição absoluta -->
                        <hr style="position: absolute; top: 4.5rem; left: 0; right: 0; margin: 0;">

                        <!-- Texto explicativo abaixo da linha -->
                        <div style="margin-top: 25px;">
                            Até 20% de desconto com aprovação imediata que torna a expedição mais rápida do pedido.
                        </div>
                    </label>

                    <!-- Boleto Bancário -->
                    <label class="list-group-item d-flex align-items-center p-3 shadow-sm border rounded mb-3">
                        <input type="radio" id="boleto" name="payment" class="form-check-input me-3">
                        <div class="texto">BOLETO BANCÁRIO</div>
                    </label>
                    <!-- Cartão de Crédito -->
                    <label class="list-group-item d-flex align-items-center p-3 shadow-sm border rounded mb-3">
                        <input type="radio" id="credito" name="payment" class="form-check-input me-3">
                        <div class="texto">CARTÃO DE CRÉDITO</div>
                    </label>
                    <!-- Cartão de Débito -->
                    <label class="list-group-item d-flex align-items-center p-3 shadow-sm border rounded mb-3">
                        <input type="radio"  id="debito" name="payment" class="form-check-input me-3">
                        <div class="texto">CARTÃO DE DÉBITO</div>
                    </label>
                </div>
            </div>

            <!-- Summary -->
            <div class="col-md-4">
                <h3 class="mb-4">Resumo</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <span>Valor dos produtos:</span>
                            <span style="color:black">{{ $valorTotal }}</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Frete:</span>
                            <span style="color:black">{{ $valorFrete }}</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-3 box-pix valorPix">
                            <span>Valor à vista no <strong>PIX</strong>:</span>
                            <span><strong>{{ $valorPix }}</strong></span>
                        </div>
                        <div class="d-flex justify-content-between mb-3 box-eco valorPix">
                            <span>Você economizou:</span>
                            <span>{{ $economia }}</span>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="#" id="continueBtn" class="btn btn-primary btn-block mb-2 botao" style="background-color: #2c88d9;">Continuar</a>
                    <a href="{{ Route('carrinho') }}" class="btn btn-secondary btn-block botao" style="background-color:white; color: black">Voltar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Carregamento -->
    <div class="loading-modal" id="loadingModal">
        <div class="loading-container">
            <div class="loading-message">Processando seu pagamento...</div>
            <div class="progress-bar">
                <div class="progress"></div>
            </div>
        </div>
    </div>

    <!-- Modal para inserção do Cartão -->
    <div class="card-modal" id="cardModal">
        <div class="card-modal-container">
            <h4>Insira os dados do seu cartão</h4>
            <input type="text" id="cardNumber" placeholder="Número do Cartão" maxlength="16" required>
            <input type="text" id="cardHolder" placeholder="Nome no Cartão" required>
            <input type="text" id="cardExpiry" placeholder="Validade" required>
            <input type="text" id="cardCvc" placeholder="CVC" maxlength="3" required>
            <button id="submitCard" class="btn btn-primary">Enviar</button>
            <button id="cancelCard" class="btn btn-secondary cancel-btn">Cancelar</button>
        </div>
    </div>

    <script>


        document.getElementById('pix').addEventListener('change', function() {
            // Exibir as divs com a classe d-flex
            document.getElementsByClassName('valorPix')[0].classList.add('d-flex');
            document.getElementsByClassName('valorPix')[1].classList.add('d-flex');
            document.getElementsByClassName('valorPix')[0].style.display = 'block';
            document.getElementsByClassName('valorPix')[1].style.display = 'block';
        });

        document.getElementById('boleto').addEventListener('change', function() {
            // Ocultar as divs removendo a classe d-flex
            document.getElementsByClassName('valorPix')[0].classList.remove('d-flex');
            document.getElementsByClassName('valorPix')[1].classList.remove('d-flex');
            document.getElementsByClassName('valorPix')[0].style.display = 'none';
            document.getElementsByClassName('valorPix')[1].style.display = 'none';
        });

        document.getElementById('credito').addEventListener('change', function() {
            // Ocultar as divs removendo a classe d-flex
            document.getElementsByClassName('valorPix')[0].classList.remove('d-flex');
            document.getElementsByClassName('valorPix')[1].classList.remove('d-flex');
            document.getElementsByClassName('valorPix')[0].style.display = 'none';
            document.getElementsByClassName('valorPix')[1].style.display = 'none';
        });

        document.getElementById('debito').addEventListener('change', function() {
            // Ocultar as divs removendo a classe d-flex
            document.getElementsByClassName('valorPix')[0].classList.remove('d-flex');
            document.getElementsByClassName('valorPix')[1].classList.remove('d-flex');
            document.getElementsByClassName('valorPix')[0].style.display = 'none';
            document.getElementsByClassName('valorPix')[1].style.display = 'none';
        });




        document.getElementById('credito').addEventListener('click', function() {
            document.getElementById('cardModal').style.display = 'flex'; // Exibe o modal
        });

        document.getElementById('debito').addEventListener('click', function() {
            document.getElementById('cardModal').style.display = 'flex'; // Exibe o modal
        });

        document.getElementById('submitCard').addEventListener('click', function() {
            // Simula o envio dos dados
            document.getElementById('cardModal').style.display = 'none'; // Esconde o modal
        });

        document.getElementById('cancelCard').addEventListener('click', function() {
            document.getElementById('cardModal').style.display = 'none'; // Fecha o modal
        });

        document.getElementById('loadingModal').style.display = 'none';

        // Adicionando a animação de carregamento
        document.getElementById('continueBtn').addEventListener('click', function() {
            document.getElementById('loadingModal').style.display = 'flex'; // Exibe o modal de carregamento
            let progress = document.querySelector('.progress');
            let width = 0;
            let interval = setInterval(function() {
                if (width >= 100) {
                    clearInterval(interval);
                    document.getElementById('loadingModal').style.display = 'none';
                    
                } else {
                    width += 10;
                    progress.style.width = width + '%';
                }
            }, 500); // Progresso a cada 0.5s
        });
    </script>
@endsection
