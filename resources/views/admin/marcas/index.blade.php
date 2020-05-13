@extends('admin.layouts.layout')

@section('title', 'Administracion de Categorias')

@section('content')

<div class="container mt-3">
    <div class="row panel-titulo">
        <h2>Marcas ingresadas</h2>
    </div>
    <div class="row panel-agregarNuevo justify-content-center my-3">
        <a class="btn btn-primary" href="{{route('marcas.create')}}">Agregar nueva marca</a>
    </div>

    <div class="row panel-detalles justify-content-center">
        <table id="listado" class="table table-bordered table-hover w-100">
            <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="myTable">

                @forelse ($marcas as $marca)
                <tr>
                    <td><a href="/marca/{{$marca->id}}">{{$marca->nombre_marca}}</a></td>
                    <td>
                        <a class="btn btn-primary float-left" href="{{route('marcas.show', $marca->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a class="btn btn-success float-left" href="{{route('marcas.edit', $marca)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                        <form action="{{route('marcas.destroy', $marca)}}" method="post" class="float-left">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{$marca->id}}">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Está seguro que desea borrar esta marca? Los productos que hay en ella serán eliminados.')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>


                    </td>
                </tr>
                @empty
                    <tr><td><h2>No hay marcas cargadas</h2></td></tr>
                @endforelse



              </tbody>

          </table>
    </div>
  </div>

@endsection
