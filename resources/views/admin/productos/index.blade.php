@extends('admin.layouts.layout')

@section('title', 'Administracion de Productos')

@section('content')

<div class="container mt-3">
    <div class="row panel-titulo">
        <h2>Productos Disponibles</h2>
    </div>
    <div class="row panel-agregarNuevo justify-content-center my-3">
        <a class="btn btn-primary" href="{{route('productos.create')}}">Agregar Nuevo Producto</a>
    </div>

    <div class="row panel-detalles justify-content-center">
        <table id="listado" class="table table-bordered table-hover w-100">
            <thead>
                <tr>
                  <th>Titulo</th>
                  <th>Descripcion</th>
                  <th>Categoria</th>
                  <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="myTable">

                @forelse ($productos as $producto)
                <tr>
                    <td><a href="/producto/{{$producto->id}}">{{$producto->titulo}}</a></td>
                    <td>{{$producto->descripcion}}</td>
                    <td>{{$producto->categoria->nombre_categoria}}</td>
                    <td>
                        <a class="btn btn-primary float-left" href="{{route('productos.show', $producto->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a class="btn btn-success float-left" href="{{route('productos.edit', $producto)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                        <form action="{{route('productos.destroy', $producto)}}" method="post" class="float-left">
                            @csrf
                            @method('DELETE')
                            {{--  <input type="hidden" name="id" value="{{$producto->id}}">  --}}
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Seguro que quiere borrar el producto?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>


                    </td>
                </tr>
                @empty
                    <tr><td><h2>No hay Productos Cargados</h2></td></tr>
                @endforelse



              </tbody>

          </table>
    </div>
  </div>

@endsection
