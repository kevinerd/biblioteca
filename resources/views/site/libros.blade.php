@extends('layouts.layout')@section('contenido')    <div class="container-fluid">        <div class="row">            @foreach($libros as $libro)                <div class="col-md-3">                    <div class="card" style="width: 18rem;" align="center">                        <img class="card-img-top tarjeta" src="../img/{{  $libro->thumb  }}" alt="Card image cap">                        <hr>                        <div class="card-body">                            <h5 class="card-title">{{  $libro->titulo  }}</h5>                            <a href="{{  route('site.libro', $libro->id)  }}" class="btn btn-primary">Más info</a>                        </div>                    </div>                </div>            @endforeach        </div>    </div>@endsection