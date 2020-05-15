@extends('layouts.app')

@section('content')

<main>
    <!-- Page Content -->
    <div class="container">

            <nav class="my-2" aria-label="breadcrumb">
                <ol class="breadcrumb producto-bread">
                    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="/categoria/{{$producto->categoria->id}}">{{$producto->categoria->nombre_categoria}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$producto->getTitulo()}}</li>
                </ol>
            </nav>

            <h2 class="my-4 producto-titulo p-2 text-center">{{$producto->getTitulo()}}</h2>

            <div class="row">

      <div class="col-lg-3 order-1 order-md-1">
        <h2 class="mb-4 producto-titulo p-2 text-center">Juegos similares</h2>
        <div class="list-group lista-producto">
            @forelse ($producto->categoria->productos as $productos)
                <a href="/producto/{{$productos->id}}" class="list-group-item">{{$productos->getTitulo()}}</a>
            @empty
                No hay otros productos para esta categoría
            @endforelse
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9 order-0 order-md-0">
<!--product-card-->
        <div class="product-card mb-2">
            <div class="card-header">
                <img class="card-img-top img-fluid" src="{{$producto->poster ? '/storage/product_poster/' . $producto->poster : 'http://placehold.it/900x400'}}" alt="Imágen del Producto">
            </div>

            <div class="row justify-content-around align-items-center">
                <div class="card-body col-6 text-center">
                    <h3 class="card-title">{{$producto->getTitulo()}}</h3>
                    <h4>$ {{$producto->precio_unitario}}</h4>
                    <p class="card-text">{{$producto->descripcion}}</p>
                </div>
                <div class="info-section col-6 text-center">
                    <form action="/carrito" method="post">
                        @csrf
                        <input type="hidden" name="producto_id" value="{{$producto->id}}">
                        <input type="hidden" name="user_id" value="{{Auth::user() ? Auth::user()->id : ''}}">
                        <label>Añadir al carrito</label>
                        <button type="submit"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
            </div>
        <!-- /.card -->


      </div>
      <!-- /.col-lg-9 -->

    </div>

    </div>
    <!-- /.container -->
    </main>
@endsection
