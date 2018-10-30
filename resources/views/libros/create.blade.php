@extends('layouts.layoutAdmin')@section('contenido')    <div class="container ficha">        <h1>Nuevo libro</h1>        <hr>        {{  Form::open( array(            'route'=>'libros.store',            'method'=>'post',            'onsubmit'=>'return true;',            "style" => "margin:0px;"            ))        }}            <div class="row">                <div class="col-md-4">                    <div class="form-group">                        <label for="isbn"><b>ISBN:</b></label>                        <input type="text" name="isbn" id="isbn" class="form-control" placeholder="Ingrese el ISBN..." value="{{  old('isbn')  }}">                        {!!  $errors->first('isbn', '<span class="errors">:message</span>')  !!}                    </div>                </div>                <div class="col-md-4">                    <div class="form-group">                        <label for="titulo"><b>Título:</b></label>                        <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Ingrese el título..." value="{{  old('titulo')  }}">                        {!!  $errors->first('titulo', '<span class="errors">:message</span>')  !!}                    </div>                </div>                <div class="col-md-4">                    <div class="form-group">                        <label for="paginas"><b>Páginas:</b></label>                        <input type="int" name="paginas" id="paginas" class="form-control" placeholder="Ingrese el número de páginas..." value="{{  old('paginas')  }}">                        {!!  $errors->first('paginas', '<span class="errors">:message</span>')  !!}                    </div>                </div>            </div>            <div class="row">                <div class="col-md-4">                    <div class="form-group">                        <label for="id_autor"><b>Autor:</b></label>                        <select name="id_autor" id="id_autor" class="form-control">                            <option value="default">Seleccione un autor...</option>                            @foreach($autores as $autor)                                <option value="{{  $autor->id  }}">{{  $autor->nombre.' '.$autor->apellido  }}</option>                            @endForeach                        </select>                    </div>                </div>                <div class="col-md-4">                    <div class="form-group">                        <label for="edicion"><b>Edición:</b></label>                        <input type="text" name="edicion" id="edicion" class="form-control" placeholder="Ingrese la edición..." value="{{  old('edicion')  }}">                        {!!  $errors->first('edicion', '<span class="errors">:message</span>')  !!}                    </div>                </div>                <div class="col-md-4">                    <div class="form-group">                        <label for="id_grupo"><b>Categoría:</b></label>                        <select name="id_grupo" id="id_grupo" class="form-control">                            <option value="default">Seleccione una categoría...</option>                            @foreach($grupos as $grupo)                                <option value="{{  $grupo->id  }}">{{  $grupo->nombre  }}</option>                            @endForeach                        </select>                    </div>                </div>            </div>            <div class="row">                <div class="col-md-8">                    <div class="form-group">                        <label for="thumb"><b>Portada:</b></label>                        <input type="file" name="thumb" id="thumb" class="form-control" placeholder="Seleccione una portada...">                    </div>                </div>                <div class="col-md-2">                    <label for="checkDestacado"><b>Destacado: </b></label>                    <div id="checkDestacado">                        <div class="form-check form-check-inline">                            <input class="form-check-input" type="radio" name="destacado" id="checkDest1" value="1">                            <label class="form-check-label" for="checkDest1">Si</label>                        </div>                        <div class="form-check form-check-inline">                            <input class="form-check-input" type="radio" name="destacado" id="checkDest2" value="0">                            <label class="form-check-label" for="checkDest2">No</label>                        </div>                    </div>                </div>                <div class="col-md-2">                    <label for="checkSemanal"><b>Libro de la semana: </b></label>                    <div id="checkSemanal">                        <div class="form-check form-check-inline">                            <input class="form-check-input" type="radio" name="semanal" id="checkSem1" value="1">                            <label class="form-check-label" for="checkSem1">Si</label>                        </div>                        <div class="form-check form-check-inline">                            <input class="form-check-input" type="radio" name="semanal" id="checkSem2" value="0">                            <label class="form-check-label" for="checkSem2">No</label>                        </div>                    </div>                </div>            </div>            <div class="row">                <div class="offset-2 col-md-8">                    <div class="form-group">                        <label for="sipnosis"><b>Sipnosis:</b></label>                        <textarea name="sipnosis" id="sipnosis" cols="30" rows="5" class="form-control" placeholder="Escriba la sipnosis...">{{  old('sipnosis')  }}</textarea>                        {!!  $errors->first('sipnosis', '<span class="errors">:message</span>')  !!}                    </div>                </div>            </div>            <div class="row">                <div class="col-md-12" align="center">                    <button type="submit" class="btn btn-primary">Guardar</button>                </div>            </div>        {{  Form::close()  }}    </div>@stop