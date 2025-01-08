<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('panel.site_title') }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/all.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700&display=swap&subset=latin-ext" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    @yield('styles')
</head>
<style>
    html, body {
        height: 100%; 
        margin: 0; 
        display: flex;
        flex-direction: column;
    }

    body {
        display: flex;
        flex-direction: column;
        justify-content: space-between; 
    }
    .header, .footer {
            background-color: #2c88d9; 
            color: #fff;
        }
        .header {
            display: flex;
            justify-content: space-between; /* Mantém os elementos com o máximo de espaço possível entre eles */
            align-items: center; /* Alinha verticalmente o logo e o ícone */
            padding: 15px 15%; /* Adiciona um espaçamento de 30px nas laterais */
            width: 100%; /* Garante que ocupe toda a largura disponível */
            box-sizing: border-box; /* Inclui o padding no cálculo do tamanho do elemento */
        }

        .header .logo {
            max-width: 120px;
            height: auto;
        }

        .header .login-icon {
            display: flex;
            justify-content: flex-end; /* Garante que o ícone de login fique à direita */
            align-items: center;
        }

        .header .login-icon img {
            width: 40px;
            height: 40px;
        }
        .footer {
            margin-top: auto; 
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

        .login-icon-image {
            width: 40px; 
            height: 40px;
        }
</style>

<body class="hold-transition login-page">
    <header class="header text-white p-2 d-flex justify-content-between align-items-center">
        <!-- Logo que aponta para a rota / -->
        <a href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
        </a>

        <!-- Ícone de login como imagem -->
        <a href="/login" class="login-icon">
            <img src="{{ asset('images/login_icon.png') }}" alt="Login" class="login-icon-image">
        </a>
    </header>

    @yield('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    @yield('scripts')

    <footer class="footer mt-auto">
        <div class="container">
            <div class="row">
                <div class="col-md-2 text-start text-md-start">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid mb-2">
                </div>
                <div class="col-md-8 text-start">
                    <p>(19) 9999-9999</p>
                    <p>vendas@papelshop.com.br</p>
                    <p>Rua Diácono Jair de Oliveira, 1005 Santa Rosa
                    Piracicaba - SP</p>
                </div>
                <div class="col-md-2 text-center text-md-end">
                    <div class="social-icons">
                        <a href="https://www.instagram.com/sagratecnologia/" target="_blank">
                            <img src="{{ asset('images/instagram_icon.png') }}" alt="Instagram">
                        </a>
                        <a href="https://www.facebook.com" target="_blank">
                            <img src="{{ asset('images/facebook_icon.png') }}" alt="Facebook">
                        </a>
                        <a href="https://www.youtube.com" target="_blank">
                            <img src="{{ asset('images/youtube_icon.png') }}" alt="YouTube">
                        </a>
                    </div>
                    <br>
                    <p class="mt-2">Designed by Sagra Tecnologia</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>