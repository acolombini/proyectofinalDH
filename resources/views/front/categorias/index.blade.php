@extends('layouts.app')

@section('content')
<main>
<div class="container">



    <nav class="my-2" aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$categoria->nombre_categoria}}</li>
        </ol>
    </nav>



    <div class="row">


        <div class="col-lg-3">

        <h2 class="my-4">Otras categorías</h2>
        <div class="list-group">
            @forelse ($otras_categorias as $otra_categoria)
                <a href="/categoria/{{$otra_categoria->id}}" class="list-group-item">{{$otra_categoria->nombre_categoria}}</a>
            @empty
                No hay categorías.
            @endforelse
        </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
        @if (count($categoria->productos) != 0)
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <a href="/productos/{{$categoria->productos->get(1)->id}}"><img class="d-block img-fluid" style="width: 100%; height: 50vh;" src="{{$categoria->productos->get(1)->poster ? '/storage/product_poster/' . $categoria->productos->get(1)->poster : 'http://placehold.it/700x400'}}" alt="Primer producto"></a>
            </div>
            <div class="carousel-item">
                <a href="/productos/{{$categoria->productos->get(2)->id}}"><img class="d-block img-fluid" style="width: 100%; height: 50vh;" src="{{$categoria->productos->get(2)->poster ? '/storage/product_poster/' . $categoria->productos->get(2)->poster : 'http://placehold.it/700x400'}}" alt='Segundo producto'></a>
            </div>
            <div class="carousel-item">
                <a href="/productos/{{$categoria->productos->get(3)->id}}"><img class="d-block img-fluid" style="width: 100%; height: 50vh;" src="{{$categoria->productos->get(3)->poster ? '/storage/product_poster/' . $categoria->productos->get(3)->poster : 'http://placehold.it/700x400'}}" alt="Tercer producto"></a>
            </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
        @endif

        <div class="row">
            @forelse ($categoria->productos as $producto)
            <div class="product-card col-6 col-md-4 col-lg-3 mx-2">
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
            </div>
            @empty
                No hay productos para esta categoría
            @endforelse
        </div>
        <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

    </div>
    <!-- /.container -->

</main>
@endsection
