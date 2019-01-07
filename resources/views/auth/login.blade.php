@extends('layouts.layout')

@section('contenido')
<div class="container" align="center">
    @if(session()->has('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h3>{{  session('info')  }}</h3>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-4">
            <img src="../img/logo2.jpg" class="rounded w-100" alt="logo-biblioteca">
        </div>
        <div class="col-md-4">
            <div class="card card-default">
                <div class="card-header"><b>Ingresa</b></div>
                <div class="card-body">
                    {{  Form::open( array(
                        'route'=>'login',
                        'method'=>'post',
                        'onsubmit'=>'return true;',
                        "style" => "margin:0px;"
                        ))
                    }}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email"><b>Correo electrónico: </b></label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password"><b>Clave: </b></label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recuérdame
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Ingresar
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    ¿Olvidaste tu contraseña?
                                </a>
                                <a class="btn btn-link" href="{{ route('site.register') }}">
                                    ¿No estás registrado?
                                </a>
                            </div>
                        </div>
                    {{  Form::close()  }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <img src="../img/logo2.jpg" class="rounded w-100" alt="logo-biblioteca">
        </div>
    </div>
</div>
@endsection
