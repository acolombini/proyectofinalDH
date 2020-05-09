@extends('layouts.app')

@section('content')

<main>
    <!-- Page Content -->
    <div class="container">
        
            <nav class="my-2" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="/categoria/{{$producto->categoria->id}}">{{$producto->categoria->nombre_categoria}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$producto->getTitulo()}}</li>
                </ol>
            </nav>
        
    <div class="row">
    
      <div class="col-lg-3">
        <h2 class="my-4">Otros productos similares</h2>
        <div class="list-group">
            @forelse ($producto->categoria->productos as $productos)
                <a href="/producto/{{$productos->id}}" class="list-group-item">{{$productos->getTitulo()}}</a>
            @empty
                No hay otros productos para esta categoría
            @endforelse
        </div>
      </div>
      <!-- /.col-lg-3 -->
    
      <div class="col-lg-9">
    
        <div class="card mt-4">
            <img class="card-img-top img-fluid" src="{{$producto->poster ? '/storage/product_poster/' . $producto->poster : 'http://placehold.it/900x400'}}" alt="Imágen del Producto">
            <div class="card-body">
            <h3 class="card-title">{{$producto->getTitulo()}}</h3>
            <h4>{{$producto->precio}}</h4>
            <p class="card-text">{{$producto->descripcion}}</p>
            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
            4.0 stars
          </div>
        <form action="/carrito" method="post">
            @csrf
            <input type="hidden" name="producto_id" value="{{$producto->id}}">
            <input type="hidden" name="user_id" value="{{Auth::user() ? Auth::user()->id : ''}}">
            <label>Añadir al carrito</label>
            <button type="submit"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
        </form>
        </div>
        <!-- /.card -->
    
        <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Product Reviews
          </div>
          <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <a href="#" class="btn btn-success">Leave a Review</a>
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