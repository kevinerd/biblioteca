@extends('layouts.layout')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card border-0 bg-light px-4 py-2">
                <form method="POST" action="{{ route('ingreso.login') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="email"><b>Correo electrónico: </b></label>

                            <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }} border-0" name="email" value="{{ old('email') }}" required autofocus placeholder="Ingresa tu email...">

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password"><b>Clave: </b></label>

                            <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }} border-0" name="password" required placeholder="Ingresa tu clave...">

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recuerdame
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">
                            Login
                        </button>

                        <div class="form-group mb-0">
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
