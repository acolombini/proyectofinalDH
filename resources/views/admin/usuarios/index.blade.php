@extends('admin.layouts.layout')

@section('title', 'Administracion de Productos')

@section('content')

<div class="container mt-3">
    <div class="row panel-titulo">
        <h2>Usuarios Disponibles</h2>
    </div>

    <div class="row panel-detalles justify-content-center">
        <table id="listado" class="table table-bordered table-hover w-100">
            <thead>
                <tr>
                  <th>Nombre y Apellido</th>
                  <th>Email</th>
                  <th>Estado de Usuario</th>
                  <th>Tipo de Usuario</th>
                  <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="myTable">

                @forelse ($usuarios as $usuario)
                <tr>
                    <td>{{$usuario->getNombreCompleto()}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>{{$usuario->estado_de_usuario}}</td>
                    <td>{{$usuario->tipo_de_usuario->tipo}}</td>
                    <td>
                        <form action="{{route('usuarios.destroy', $usuario)}}" method="post" class="float-left">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Seguro que quiere borrar el usuario?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
