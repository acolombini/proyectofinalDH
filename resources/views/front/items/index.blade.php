@extends('layouts.app')

@section('content')
<main class="mb-5">
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
                      <th>Descuento</th>
                      <th>Subtotal</th>
                      <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="myTable">
    
                    @forelse ($items as $item)
                    
                    <tr>
                        <td>{{$item->productos->titulo}}</a></td>
                        <td class="precio_unitario">{{$item->productos->precio_unitario}}</td>
                        <td class="cantidad">{{$item->cantidad_de_productos}}</td>
                        <td class="descuento">{{$item->productos->descuento}}%</td>
                        <td class="subtotal">{{($item->cantidad_de_productos * $item->productos->precio_unitario) - ($item->cantidad_de_productos * $item->productos->precio_unitario * ($item->productos->descuento / 100))}}</td>
                        <td>    
                            <form action="{{route('items.destroy', $item)}}" method="post" class="float-left">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{$item->id}}">
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
        @php
            $contador = 0;
            foreach ($items as $item) {
                $contador = $contador + ($item->cantidad_de_productos * $item->productos->precio_unitario) - ($item->cantidad_de_productos * $item->productos->precio_unitario * ($item->productos->descuento / 100));
            }
        @endphp
        <div class="contenedor-totales d-flex justify-content-end align-items-center">
            <span class="mr-5"> Total: ${{$contador}}</span>
            <button type="button" class="btn btn-success">Comprar Todo</button>
        </div>
      </div>
</main>
<script>
    window.onload = function(){
        let span = document.getElementById('total');
        let subtotales = [];
        subtotales.push(document.querySelectorAll('td.subtotal').textContent);

        function getSubtotales() {
        var subtotales = document.querySelectorAll('td.subtotal');
        return Array.map.call(subtotales, function(text) { return text.textContent; });
        }
        console.log(subtotales);
    } 
        

</script>
@endsection
