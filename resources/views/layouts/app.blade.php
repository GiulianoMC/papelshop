<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('panel.site_title') }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/all.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
            justify-content: space-between; /* Centraliza os elementos horizontalmente */
            align-items: center; /* Centraliza os elementos verticalmente */

            width: 100%;
            position: relative; /* Necessário para alinhar corretamente */
        }

        .header .logo {
            max-width: 120px;
            height: auto;
            margin-left: 80%;
        }

         /* Centralizar logo e ícones para web view */
        @media (max-width: 768px) {
            .header .logo {
                max-width: 120px;
                height: auto;
                margin-left: -2%;
            }
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

        .header .login-icon a {
            text-decoration: none;
            background-color: #FFFFFF;
            
        }
        
        .footer {
            margin-top: auto; 
            padding: 20px 0;
            font-size: 1.5em;
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

<body class="hold-transition login-page" style="background-color: white;">
<header class="header text-white p-2 d-flex">
    <div class="d-flex align-items-center">
        <!-- Logo que aponta para a rota / -->
        <a href="{{ url('/') }}" style="margin-left: 20px">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
        </a>
    </div>

    <!-- Condição para exibir o nome da pessoa logada ou o link para login/cadastro -->
    @if (Auth::check())
        <!-- Quando o usuário está logado -->
        <div class="user-info d-flex align-items-center" style="height: 100%;margin-right: 5%;">
            <p style="color: white; margin: 0 30px 0 0; font-weight: bold; font-size: 15px;">
                <a href="{{ route('login') }}" style="text-decoration: none; color: white;">Bem-vindo(a), {{ Auth::user()->name }}!</a>
            </p>

            <!-- Ícone de carrinho -->
            @if (Route::currentRouteName() === '/')
                <a href="{{ route('carrinho') }}" class="me-3" style="text-decoration: none; color: white; margin-left: 20px; margin-right: 40px;">
                    <i class="fas fa-shopping-cart" style="font-size: 24px;"></i>
                </a>
            @endif

            <!-- Ícone de logout -->
            <a href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
               style="color: white; text-decoration: none;margin: 0 30px 0 0;">
                <i class="fas fa-sign-out-alt" style="font-size: 20px;"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

    @else
        <!-- Quando o usuário não está logado -->
        <a href="/login" class="login-icon d-flex align-items-center">
            <img src="{{ asset('images/login_icon.png') }}" alt="Login" class="login-icon-image">
            <p style="color: white; margin-left: 10px; margin-right: 70px;">Entre aqui ou <br>Cadastrar-se</p>
        </a>
    @endif
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