@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Listado de Productos') }}</div>

                <div class="card-body">
                    <form action="/productos/buscar" method="get">
                        <input id="buscador" type="search" name="buscador" placeholder="Ingrese un nombre para buscar...">
                        <input type="submit" value="Buscar">
                    </form>
                    <ul id="listado_productos">
                        @forelse ($productos as $producto)
                            <a href="/producto/{{$producto->id}}"><li>{{$producto->titulo}}</li></a>
                        @empty
                            No hay productos
                        @endforelse
                        {{$productos->appends(request()->input())->links()}}
                    </ul>
                </div>
            </div>
            @if (Auth::user()->tipo_de_usuario_id == 2)
                <a href="/ingresarProducto"><button class="btn btn-primary mt-3">Ingresar un Producto Nuevo</button></a>              
            @endif
        </div>
    </div>
</div>

<script>
    window.onload = function(){ 
        // Script para filtrar resultados mientras se escribe
        let nombreProductos = ("<?php for($i = 0; $i < count($nombreProductos); $i++) { echo $nombreProductos[$i]['titulo'] . "; ";} ?>");
        let idProductos = ("<?php for($i = 0; $i < count($nombreProductos); $i++) { echo $nombreProductos[$i]['id'] . "; ";} ?>");
        let nombreProducto = nombreProductos.split("; ");
        nombreProducto.pop();
        let idProducto = idProductos.split("; ");
        idProducto.pop();

        let buscador = document.getElementById('buscador');
        buscador.onchange = function(){
            let buscador = document.getElementById('buscador');
            let valorBuscador = buscador.value;

            let productosFiltrados = [];
                for (let i = 0; i < nombreProducto.length; i++) {
                    if (nombreProducto[i].includes(valorBuscador) || nombreProducto[i].includes(valorBuscador.toLowerCase()) || nombreProducto[i].includes(valorBuscador.toUpperCase())) {
                        productosFiltrados.push(nombreProducto[i])
                    }
                }
            ul = document.getElementById("listado_productos");
            ul.innerHTML = "";

            
            let contador = 0;
            let indiceProducto = 0;
            productosFiltrados.forEach(function(){
                indiceProducto = nombreProducto.indexOf(productosFiltrados[contador]);
                a = document.createElement("a");
                a.setAttribute("href", "/producto/" + idProducto[indiceProducto]);

                li = document.createElement("li");
                textoDelLi = document.createTextNode(productosFiltrados[contador]);
                li.append(textoDelLi);
                a.append(li);
                ul.append(a);

                contador++;
            });
        }
    }
</script>
@endsection
