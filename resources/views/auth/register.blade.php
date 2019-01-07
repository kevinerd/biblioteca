@extends('layouts.layout')

@section('contenido')
    <div class="container" align="center">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-register">
                    <div class="card-header"><b>Registrate</b></div>
                    <div class="card-body">
                        {{  Form::open( array(
                            'route'=>'register',
                            'method'=>'post',
                            'onsubmit'=>'return true;',
                            "style" => "margin:0px;"
                            ))
                        }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name"><b>Nombre: </b></label>
                                        <input id="name" type="text" class="form-control " name="name" value="{{ old('name') }}" placeholder="Ingrese nombre y apellido..." required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="documento"><b>DNI: </b> *SÓLO NÚMEROS</label>
                                        <input type="int" id="documento" name="documento" class="form-control {{ $errors->has('documento') ? ' is-invalid' : '' }}" placeholder="Ingrese su número de DNI..." value="{{  old('documento')  }}" required autofocus>
                                        @if ($errors->has('documento'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('documento') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="domicilio"><b>Dirección: </b></label>
                                        <input type="text" name="domicilio" id="domicilio" class="form-control {{ $errors->has('domicilio') ? ' is-invalid' : '' }}" placeholder="Ingrese su dirección..." value="{{  old('domicilio')  }}" required autofocus>
                                        @if ($errors->has('domicilio'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('domicilio') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telefono"><b>Teléfono: </b></label>
                                        <input type="text" name="telefono" id="telefono" class="form-control {{ $errors->has('telefono') ? ' is-invalid' : '' }}" placeholder="Ingrese su teléfono. SIN ESPACIOS" value="{{  old('telefono')  }}" required autofocus>
                                        @if ($errors->has('telefono'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('telefono') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fecha_nac"><b>Fecha de nacimiento: </b></label>
                                        <input type="date" id="fecha_nac" name="fecha_nac" class="form-control {{ $errors->has('fecha_nac') ? ' is-invalid' : '' }}" required autofocus>
                                        @if ($errors->has('fecha_nac'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('fecha_nac') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="email"><b>Correo electrónico:</b></label>
                                        <input type="email" name="email" id="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="ejemplo@mail.com" value="{{  old('email')  }}" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password"><b>Clave: </b></label>
                                        <input type="password" name="password" id="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Ingresar la clave..." value="{{  old('password')  }}">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_confirmation"><b>Confirmar Clave: </b></label>
                                        <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" placeholder="Reingresar la clave..." value="{{  old('password_confirmation')  }}">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" align="center">
                                    <button type="submit" class="btn btn-primary">
                                        Registrarme
                                    </button>
                                </div>
                            </div>
                        {{  Form::close()  }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
