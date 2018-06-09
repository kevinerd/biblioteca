<!DOCTYPE html><html lang="es">    <head>        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">        {!! Html::style('/components/bootstrap/dist/css/bootstrap.css') !!}        {!! Html::script('/components/bootstrap/dist/js/bootstrap.min.js') !!}        {!! Html::style('/css/app.css') !!}        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />        <link rel="icon" href="/favicon.ico" type="image/x-icon">        <title>Biblioteca</title>    </head>    <body>        <header>            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">                <div class="col-md-4">                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">                        <a class="navbar-brand" href="{{  route('site.home')  }}">Biblioteca</a>                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">                            <li class="nav-item active">                                <a class="nav-link" href="{{  route('site.home')  }}">Inicio<span class="sr-only">(current)</span></a>                            </li>                            <li class="nav-item">                                <a class="nav-link" href="{{  route('mensajes.create')  }}">Contacto</a>                            </li>                        </ul>                    </div>                </div>                <div class="col-md-4">                    <form class="form-inline my-2 my-lg-0">                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">                        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>                    </form>                </div>                <div class="col-md-4" align="right">                    {{ Form::open( array('route'=>'ingreso.login', 'method'=>'get', 'onsubmit'=>'return true;', "style" => "margin:0px;")) }}                        <button class="btn btn-primary" type="submit">Ingresar</button>                    {{  Form::close()  }}                </div>            </nav>        </header>        @yield('contenido')    </body></html>