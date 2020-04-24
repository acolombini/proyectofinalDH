@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Listado de Productos') }}</div>

                <div class="card-body">
                    <ul>

                        @forelse ($productos as $producto)
                            <li>{{$producto['titulo']}}</li>
                        @empty
                            No hay productos
                        @endforelse

                    </ul>
                </div>
            </div>
            <a href="ingresarProducto"><button class="btn btn-primary mt-3">Ingresar un Producto Nuevo</button></a>              
        </div>
    </div>
</div>
@endsection
