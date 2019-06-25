@extends('templates.layout')

@section('title', 'Login')

@section('content')
<div class="container" id="div-principal-login">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2 col-sm-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="{{ route('login') }}" aria-label="Login" method="POST" id="">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-3 control-label">E-Mail</label>
                                <div class="col-md-6 col-sm-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Informe seu E-mail" autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif                                    
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-3 control-label">Password</label>
                                <div class="col-md-6 col-sm-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Informe sua Senha">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember"> Lembrar-me</label>
                                </div>
                             </div>

                            <div class="form-group row">
                                <div class="col-md-8 col-md-offset-3 col-sm-8 col-sm-offset-3">
                                    <button type="submit" class="btn btn-primary">Logar</button>
                                    <a class="btn btn-link" href="{{ route('password.request') }}">Esqueceu sua Senha?</a>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8 col-md-offset-3 col-sm-8 col-sm-offset-3" id="div-error-login">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection