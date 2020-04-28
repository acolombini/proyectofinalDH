@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-danger@">
        {{ session('status') }}
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Producto') }}</div>

                <div class="card-body">
                    @if (isset($producto))
                        <span>Usted eligió el producto número {{$producto->id}} y estos son sus datos:</span>
                        <p><strong>Título: </strong>{{$producto->titulo}}</p>
                        
                        <strong>Imágen: </strong>
                        @if (isset($producto->poster))
                            <img src="/storage/product_poster/{{$producto->poster}}" width="100%" alt="Imágen del producto">
                        @else
                            No se ha encontrado una imágen para este producto
                        @endif

                        <p><strong>Categoría: </strong>{{$producto->categoria->getNombreCategoria()}}</p>

                        <p><strong>Descripción: </strong>{{$producto->descripcion}}</p>

                        <p><strong>Precio Unitario: </strong>${{$producto->precio_unitario}}</p>

                        <p><strong>Descuento: </strong> @if (isset($producto->descuento)) {{$producto->descuento}} @else "Este producto no está en promoción" @endif</p>
                        
                        <p><strong>Stock: </strong>{{$producto->stock}}</p>

                        <form action="" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$producto->id}}">
                            <button class="btn btn-danger" type="submit" id="buttonEliminar" disabled>Agregar al carrito</button>
                        </form>
                        @if (Auth::user()->tipo_de_usuario_id == 2)
                            <a href="/producto/admin/{{$producto->id}}">Ver como administrador</a>
                        @endif
                    @else
                    <p>No se encontró el producto número {{$id}}. Por favor, elija un producto del <a href="/productos">listado de productos</a>.</p>
                    @endif
                </div>
            </div>              
        </div>
    </div>
</div>

@endsection
