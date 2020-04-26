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
                            <a href="producto/{{$producto->id}}"><li>{{$producto->titulo}}</li></a>
                        @empty
                            No hay productos
                        @endforelse
                        {{$productos->links()}}
                    </ul>
                </div>
            </div>
            @if (Auth::user()->tipo_de_usuario_id == 2)
                <a href="/ingresarProducto"><button class="btn btn-primary mt-3">Ingresar un Producto Nuevo</button></a>              
            @endif
        </div>
    </div>
</div>

@endsection
