@extends('admin.layouts.layout')

@section('title', 'Administracion de Categorias')

@section('content')

<div class="container mt-3">
    <div class="row panel-titulo">
        <h2>Contactos</h2>
    </div>

    <div class="row panel-detalles justify-content-center">
        <table id="listado" class="table table-bordered table-hover w-100">
            <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Mensaje</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="myTable">

                @forelse ($contactos as $contacto)
                <tr class="{{$contacto->estado_de_contacto=="Finalizado"? "bg-success" : ""}} {{$contacto->estado_de_contacto=="En seguimiento"? "bg-warning" : ""}}">
                    <td>{{$contacto->nombre}}</td>
                    <td>{{$contacto->email}}</td>
                    <td>{{$contacto->mensaje}}</td>
                    <td>{{$contacto->estado_de_contacto}}</td>
                    <td> 
                        <form action="{{route('contacto.update', $contacto)}}" method="post" class="float-left">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="action" value="success">
                            <button type="submit" class="btn btn-success float-left" title="Marcar como finalizado" onclick="return confirm('Este formulario se marcará como finalizado.')"><i class="far fa-check-circle" aria-hidden="true"></i></button>
                        </form>

                        <form action="{{route('contacto.update', $contacto)}}" method="post" class="float-left">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="action" value="warning">
                            <button type="submit" class="btn btn-warning float-left" title="Marcar como en seguimiento" onclick="return confirm('Este formulario se marcará como en seguimiento.')"><i class="fas fa-exclamation" aria-hidden="true"></i></button>
                        </form>

                        <form action="{{route('contacto.destroy', $contacto)}}" method="post" class="float-left">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" title="Deshechar formulario de contacto" onclick="return confirm('Seguro que quiere borrar este formulario de contacto?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>


                    </td>
                </tr>
                @empty
                    <tr><td><h2>No hay formularios de contacto cargados</h2></td></tr>
                @endforelse

              </tbody>

          </table>
    </div>
</div>
@endsection
