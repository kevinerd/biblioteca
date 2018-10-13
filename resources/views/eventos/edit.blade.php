@extends('layouts.layoutAdmin')@section('contenido')    <div class="container ficha">        <h1>Editar evento</h1>        <hr>        {{ Form::open(array('route'=> array('eventos.update', $evento->id), 'method'=>'post', 'onsubmit'=>'return true;', "style" => "margin:0px;")) }}        {!!  method_field('PUT')  !!}            <div class="row">                <div class="col-md-4">                    <div class="form-group">                        <label for="nombre"><b>Nombre:</b></label>                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre..." value="{{  $evento->nombre  }}">                            {{  $errors->first('nombre', '<span class=error>:message</span>')  }}                        </div>                    </div>                    <div class="col-md-4">                        <div class="form-group">                            <label for="fecha"><b>Fecha:</b></label>                            <input type="date" class="form-control" id="fecha" name="fecha" value="{{  $evento->fecha  }}">                            {{  $errors->first('fecha', '<span class=error>:message</span>')  }}                        </div>                    </div>                    <div class="col-md-4">                        <div class="form-group">                            <label for="hora"><b>Hora:</b></label>                            <input type="time" class="form-control" id="hora" name="hora" value="{{  $evento->hora  }}">                            {{  $errors->first('hora', '<span class=error>:message</span>')  }}                        </div>                    </div>                </div>                <div class="row">                    <div class="offset-2 col-md-4">                        <div class="form-group">                            <label for="id_grupo"><b>Categoría:</b></label>                            <select name="id_grupo" id="id_grupo" class="form-control">                                <option value="default">Selecciones una categoría...</option>                                @foreach($grupos as $grupo)                                    <option value="{{  $grupo->id  }}">{{  $grupo->nombre  }}</option>                                @endforeach                            </select>                        </div>                    </div>                    <div class="col-md-4">                        <div class="form-group">                            <label for="banner"><b>Banner publicitario: </b></label>                            <input type="file" id="banner" class="form-control" formenctype="multipart/form-data">                        </div>                    </div>                </div>                <div class="row">                    <div class="offset-2 col-md-8">                        <div class="form-group">                            <label for="descripcion"><b>Descripción del evento:</b></label>                            <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control" placeholder="Ingrese una descripción...">{{  $evento->descripcion  }}</textarea>                            {!!  $errors->first('descripcion', '<span class="errors">:message</span>')  !!}                        </div>                    </div>                </div>                <div class="row">                    <div class="col-md-12" align="center">                        <button class="btn btn-warning" type="submit">Modificar</button>                    </div>                </div>            {{  Form::close()  }}    </div>@stop