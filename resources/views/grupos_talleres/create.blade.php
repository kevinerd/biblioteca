@extends('layouts.layoutAdmin')@section('contenido')    <div class="container">        <h1>Nueva categoría de talleres</h1>        {{  Form::open( array(            'route'=>'grupos_talleres.store',            'method'=>'post',            'onsubmit'=>'return true;',            "style" => "margin:0px;"            ))        }}        <div class="row">            <div class="col-md-4">                <div class="form-group">                    <label for="nombre"><b>Nombre:</b></label>                    <input type="text" name="nombre" class="form-control" placeholder="Ingrese el Nombre..." value="{{  old('nombre')  }}">                    {!!  $errors->first('nombre', '<span class="errors">:message</span>')  !!}                </div>            </div>        </div>        <button type="submit" class="btn btn-primary">Guardar</button>        {{  Form::close()  }}    </div>@stop