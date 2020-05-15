@extends('layouts.app')

@section('content')
<main>
    <div class="container">
    <div class="card-container">
        <h2 class="text-center py-3">Nuestros Productos</h2>
            <h4>Categorías</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                @forelse ($categorias as $categoria)
                    <li class="breadcrumb-item active" aria-current="page"><a href="categoria/{{$categoria->id}}">{{$categoria->nombre_categoria}}</a></li>
                @empty
                    No hay categorías.
                @endforelse
                </ol>
            </nav>
            <div class="justify-content-center pagination pagination-lg mt-3">
                {{$productos->links()}}
            </div>
            
            <div class="row justify-content-around">
            @forelse ($productos as $producto)
            <div class="product-card my-2 col-6 col-md-4 col-lg-3 ">
                <div class="product-header">
                    <img src="{{$producto->poster ? '/storage/product_poster/'.$producto->poster : asset('img/defaultgamecardimage.png') }}" alt="imagen del producto">
                </div><!--product-header-->
                <div class="product-content">
                    <div class="product-content-header">
                        <a href="/producto/{{$producto->id}}">
                            <h3 class="product-title">{{$producto->getTitulo()}}</h3>
                        </a>
                    </div>

                    <div class="product-info">
                        <div class="info-section">
                            <label>Precio</label>
                            <span>{{$producto->precio_unitario}}</span>
                        </div><!--date,time-->
                        <div class="info-section">
                            <label>Categoria</label>
                            <span>{{$producto->categoria->nombre_categoria}}</span>
                        </div><!--screen-->
                        <div class="info-section">
                          <form action="carrito" method="post">
                            @csrf
                            <input type="hidden" name="producto_id" value="{{$producto->id}}">
                            <input type="hidden" name="user_id" value="{{Auth::user() ? Auth::user()->id : ''}}">
                            <label>Add to Cart</label>
                            <button type="submit"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                          </form>
                        </div><!--screen-->
                    </div>
                </div><!--product-content-->
            </div><!--product-card-->
            @empty
                No hay productos disponibles
            @endforelse
        </div>
    </div>

        <div class="justify-content-center pagination pagination-lg mt-3">
            {{$productos->links()}}
        </div>

    </div>

</main>
@endsection
