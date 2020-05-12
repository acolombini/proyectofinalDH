@extends('layouts.app')

@section('content')
<main>
    <div class="container mt-3">
        <div class="row panel-titulo">
            <h2>Carrito</h2>
        </div>
        <div class="row panel-agregarNuevo justify-content-center my-3">
            <a class="btn btn-primary" href="{{route('home')}}">Volver al home</a>
        </div>
    
        <div class="row panel-detalles justify-content-center">
            <table id="listado" class="table table-bordered table-hover w-100">
                <thead>
                    <tr>
                      <th>Titulo</th>
                      <th>Precio Unitario</th>
                      <th>Cantidad</th>
                      <th>Subtotal</th>
                      <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="myTable">
    
                    @forelse ($items->productos as $item)
                    <tr>
                        <td>{{$item->titulo}}</a></td>
                        @php
                            dd($item)
                        @endphp
                        <td>{{$item->precio_unitario}}</td>
                        <td>Aca va la cantidad</td>
                        <td>Aca va el subtotal</td>
                        <td>
                            <a class="btn btn-primary float-left" href="#"><i class="fa fa-eye" aria-hidden="true"></i></a>
    
                            <form action="#" method="post" class="float-left">
                                @csrf
                                @method('DELETE')
                                {{--  <input type="hidden" name="id" value="{{{$item->productos->id}}">  --}}
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Seguro que quiere eliminar el producto del carrito?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
    
    
                        </td>
                    </tr>
                    @empty
                        <tr><td><h2>No hay productos en el carrito.</h2></td></tr>
                    @endforelse
    
    
    
                  </tbody>
    
              </table>
        </div>
      </div>
</main>
@endsection
