@extends('layouts.layoutAdmin')@section('contenido')    <div class="container">        <div class="row">            <div class="col-md-6" align="center">                <h1>Categorías</h1>                <a href="categorias/create" class="btn btn-info">Nueva categoría</a>                <table class="table table-hover table-bordered table-striped">                    <thead class="thead-dark">                    <tr>                        <th scope="col">#</th>                        <th>Nombre</th>                        <th>Grupo</th>                        <th>Acción</th>                    </tr>                    </thead>                    <tbody>                    @foreach($categorias as $categoria)                        <tr>                            <th scope="row">{{  $categoria->id  }}</th>                            <td>                                {{  $categoria->nombre  }}                            </td>                            <td>                                {{  $categoria->id_grupo  }}                            </td>                            <td>                                <a href="{{  route('categorias.edit', $categoria->id)  }}" class="btn btn-warning">                                    Editar                                </a>                                <form style="display: inline" method="POST" action="{{  route('categorias.destroy', $categoria->id)  }}">                                    {!!  csrf_field()  !!}                                    {!!  method_field('DELETE')  !!}                                    <button class="btn btn-danger" type="submit">Eliminar</button>                                </form>                            </td>                        </tr>                    @endforeach                    </tbody>                </table>            </div>            <div class="col-md-6" align="center">                <h1>Grupos de Categorías</h1>                <a href="categorias/create" class="btn btn-info">Nuevo grupo</a>                <table class="table table-hover table-bordered table-striped">                    <thead class="thead-dark">                    <tr>                        <th scope="col">#</th>                        <th>Nombre</th>                        <th>Acción</th>                    </tr>                    </thead>                    <tbody>                    @foreach($grupos as $grupo)                        <tr>                            <th scope="row">{{  $grupo->id  }}</th>                            <td>                                {{  $grupo->nombre  }}                            </td>                            <td>                                <a href="{{  route('categorias.edit', $grupo->id)  }}" class="btn btn-warning">                                    Editar                                </a>                                <form style="display: inline" method="POST" action="{{  route('categorias.destroy', $grupo->id)  }}">                                    {!!  csrf_field()  !!}                                    {!!  method_field('DELETE')  !!}                                    <button class="btn btn-danger" type="submit">Eliminar</button>                                </form>                            </td>                        </tr>                    @endforeach                    </tbody>                </table>            </div>        </div>    </div>@stop