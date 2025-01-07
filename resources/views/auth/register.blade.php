@extends('layouts.app')
@section('content')
<div class="login-box">
<div class="register-box">
   

    <div class="login-box-body">
        
            <p class="login-box-msg">Crie novo usuário</p>

            <form method="post" action="{{ route('register') }}">
                @csrf

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <input id="name"
                           type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name') }}"
                           required
                           placeholder="Nome Completo">

                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email"
                           type="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="form-control"
                           required
                           placeholder="Email">

                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                   </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password"
                           type="password"
                           name="password"
                           class="form-control"
                           required
                           placeholder="Senha">

                    @if($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password_confirmation" 
                           type="password" 
                           name="password_confirmation" 
                           class="form-control" 
                           required 
                           placeholder="Redigite a senha">
                    
                    @if($errors->has('password'))
                    <p class="help-block">
                        {{ $errors->first('password_confirmation') }}
                    </p>
                @endif
                </div>

                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label><input type="checkbox" name="remember">  Concordo com os <a href="#">termos</label>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            {{ trans('global.register') }}
                        </button>
                    </div>
                </div>
            </form>

            <a href="{{ route('login') }}" class="text-center">Já sou usuário</a>
    </div><!-- /.card -->

    <!-- /.form-box -->
</div>
</div>
@endsection

@section('scripts')
<script>
    $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
@endsection