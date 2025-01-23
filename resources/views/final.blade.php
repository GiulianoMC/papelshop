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
        

</style>
@endsection
@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 100vh; background-color: #f8f9fa;">
    <div class="text-center p-5" style="max-width: 800px; background: #fff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <div class="mb-5">
            <img src="{{ asset('images/sucesso.png') }}" alt="Success" class="img-fluid" style="max-width: 150px;">
        </div>
        <h1 class="display-4 text-success font-weight-bold">PEDIDO RECEBIDO<br>COM SUCESSO!</h1>
        <p class="h2 my-4">Número da Solicitação: <strong># {{$orderNumber}}</strong></p>
        <p class="h3 mb-5">Aguarde o e-mail em sua caixa de entrada para validar o status do seu pedido.</p>
        <div class="mt-6">
            <a href="{{ route('/') }}" class="btn btn-primary btn-lg px-5 py-3" style="font-size: 2rem;"><strong>Voltar à Página Inicial</strong></a>
        </div>
    </div>
</div>
@endsection
