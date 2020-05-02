@extends('admin.layouts.layout')

@section('title', 'Administracion de Categorias')

@section('content')

<div class="container mt-3">
    <div class="row panel-titulo">
        <h2>Categorias Disponibles</h2>
    </div>
    <div class="row panel-agregarNuevo justify-content-center my-3">
        <a class="btn btn-primary" href="{{route('categorias.create')}}">Agregar Nuevo categoria</a>
    </div>

    <div class="row panel-detalles justify-content-center">
        <table id="listado" class="table table-bordered table-hover w-100">
            <thead>
                <tr>
                  <th>Titulo</th>
                  <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="myTable">

                @forelse ($categorias as $categoria)
                <tr>
                    <td><a href="/categoria/{{$categoria->id}}">{{$categoria->nombre_categoria}}</a></td>
                    <td>
                        <a class="btn btn-primary float-left" href="{{route('categorias.show', $categoria->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a class="btn btn-success float-left" href="{{route('categorias.edit', $categoria)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                        <form action="{{route('categorias.destroy', $categoria)}}" method="post" class="float-left">
                            @csrf
                            @method('DELETE')
                            {{--  <input type="hidden" name="id" value="{{$categoria->id}}">  --}}
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Seguro que quiere borrar el categoria?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>


                    </td>
                </tr>
                @empty
                    <tr><td><h2>No hay categorias Cargados</h2></td></tr>
                @endforelse



              </tbody>

          </table>
    </div>
  </div>

@endsection
