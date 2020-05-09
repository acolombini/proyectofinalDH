@extends('layouts.app')

@section('content')
<main>
    <div class="container">
    <div class="card-container">
        <div class="row">
            @forelse ($productos as $producto)
                <div class="col col-sm-6 col-md-4">
                    <div class="movie-card">
                        <div class="movie-header">
                            <img class="card-img-top" style="height: 60vh;" src="{{  $producto->poster ? '/storage/product_poster/'.$producto->poster : asset('img/defaultgamecardimage.png') }}"alt="Imágen del producto">
                            <div class="header-icon-container">
                                <a href="/producto/{{$producto->id}}">
                                    <i class="fa fa-search header-icon"></i>
                                </a>
                            </div>
                        </div><!--movie-header-->
                        <div class="movie-content">
                            <div class="movie-content-header">
                                <a href="/producto/{{$producto->id}}">
                                    <h3 class="movie-title">{{$producto->getTitulo()}}</h3>
                                </a>

                            </div>
                            <div class="movie-info">
                                <div class="info-section">
                                    <label>Categoria</label>
                                    <span>{{$producto->categoria->nombre_categoria}}</span>
                                </div>
                                <div class="info-section">
                                    <label>Precio</label>
                                    <span>$ {{$producto->precio_unitario}}</span>
                                </div>
                                <div class="info-section">
                                    <label>Descuento:</label>
                                    <span>{{$producto->descuento}}</span>
                                </div>
                                <div class="info-section">
                                    <label>Valoración:</label>
                                    <span>{{4.9}}</span>
                                </div>
                            </div>
                        </div><!--movie-content-->
                    </div><!--movie-card-->
                </div>
            @empty
                <h2>No Hay productos registrados</h2>
            @endforelse
        </div>
    </div>

        <div class="row">
            {{-- {{$productos->links()}} --}}
        </div>

    </div>

</main>
@endsection
