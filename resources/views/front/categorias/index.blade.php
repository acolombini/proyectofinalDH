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

        <h1 class="my-4">Shop Name</h1>
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
                <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <a href="/producto/{{$producto->id}}"><img class="card-img-top" style="width: 100%; height: 350px;" src="{{$producto->poster ? '/storage/product_poster/' . $producto->poster : 'http://placehold.it/700x400'}}" alt="imágen del producto"></a>
                    <div class="card-body">
                    <h4 class="card-title">
                        <a href="/producto/{{$producto->id}}">{{$producto->getTitulo()}}</a>
                    </h4>
                <h5>{{$producto->precio}}</h5>
                    <p class="card-text">{{$producto->descripcion}}</p>
                    </div>
                    <div class="card-footer">
                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                    </div>
                </div>
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
