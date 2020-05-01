@extends('layouts.app')

@section('content')
<main>
    <section id="bannerPrincipal">
      <div class="jumbotron jumbotron-fluid d-flex flex-column justify-content-around banner-home-img">
        <div class="container text-center banner-home-texto">

          <h1 class="display-3">4 Osos <br> Games Store</h1>
        </div>
      </div>
    </section>

  <section id="destacados">

    <div class="container my-3">
      <h2 class="text-center my-3 font-weight-bolder">Nuestros destacados</h2>
       <div class="owl-carousel owl-theme" id="sliderProductos">
            @forelse ($productos as $producto)

            <div class="product-card">
                <div class="product-header">
                    <img src="{{$producto->poster ? '/storage/product_poster/'.$producto->poster : asset('img/defaultgamecardimage.png') }}" alt="">
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
                            <label>Cagoria</label>
                            <span>{{$producto->categoria->nombre_categoria}}</span>
                        </div><!--screen-->

                    </div>
                </div><!--product-content-->
            </div><!--product-card-->
            @empty
                no hay productos disponibles
            @endforelse
        </div>
    </div>
  </section>

  <section id="quienesomos">
    <div class="container-fluid quienessomos-img py-5">
      <div class="container quienesomos-texto ">
      <h2>Quienes somos?</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores animi iusto quasi adipisci dignissimos soluta nulla tenetur consequatur necessitatibus voluptates provident dolorem porro vel consectetur hic, et dicta? Voluptatibus, voluptatum?
        Dolor enim, provident rerum repudiandae eaque, praesentium aliquid, assumenda magni numquam quos itaque. Temporibus, porro, cum animi eligendi vel consequatur, harum officiis maxime quo ea blanditiis dolore aliquam ipsum repellendus!
        Laboriosam, officia. Quidem delectus rem assumenda quibusdam est, similique, corporis aliquam minus excepturi tenetur dignissimos, maiores ducimus blanditiis atque beatae tempore deserunt mollitia dolorem qui nisi. Nesciunt voluptas facere perferendis.
        Veritatis consectetur reprehenderit aliquam nisi quaerat accusamus nihil pariatur animi provident delectus rem mollitia excepturi aperiam impedit, iure odit commodi illum adipisci, blanditiis, accusantium repellat voluptatibus! Cumque accusamus nostrum recusandae.
        Eaque, aliquam recusandae. Veniam cupiditate mollitia fugiat, quaerat debitis deleniti non odit porro quisquam beatae eum impedit possimus distinctio sint esse sapiente! Ipsam qui quibusdam eligendi perferendis vitae laudantium sed.
        </p>
      </div>
    </div>

  </section>

  <section id="categorias">
    <div class="container my-3">
      <h2 class="text-center my-3 font-weight-bolder">Categorias</h2>
        <div class="container">
          <div class="row">
              @forelse ($categorias as $categoria)
              
              <div class="p-1 col-6 col-md-4 col-lg-3">
                <div class="card bg-dark text-white categoria">
                  <img class="card-img" src="/storage/product_poster/{{$categoria->productos->get(1)->poster}}" alt="imagen categoria">
                  <div class="card-img-overlay">
                    <h4 class="card-title">{{$categoria->nombre_categoria}}</h4>
                  </div>
                </div>
              </div>
              @empty
                  no hay categorias :(
              @endforelse
          </div>
        </div>
    </div>
  </section>


  <section id="otraseccion">
    <div class="container-fluid quienessomos-img py-5">
      <div class="container quienesomos-texto ">
      <h2>Quienes somos?</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores animi iusto quasi adipisci dignissimos soluta nulla tenetur consequatur necessitatibus voluptates provident dolorem porro vel consectetur hic, et dicta? Voluptatibus, voluptatum?
        Dolor enim, provident rerum repudiandae eaque, praesentium aliquid, assumenda magni numquam quos itaque. Temporibus, porro, cum animi eligendi vel consequatur, harum officiis maxime quo ea blanditiis dolore aliquam ipsum repellendus!
        Laboriosam, officia. Quidem delectus rem assumenda quibusdam est, similique, corporis aliquam minus excepturi tenetur dignissimos, maiores ducimus blanditiis atque beatae tempore deserunt mollitia dolorem qui nisi. Nesciunt voluptas facere perferendis.
        Veritatis consectetur reprehenderit aliquam nisi quaerat accusamus nihil pariatur animi provident delectus rem mollitia excepturi aperiam impedit, iure odit commodi illum adipisci, blanditiis, accusantium repellat voluptatibus! Cumque accusamus nostrum recusandae.
        Eaque, aliquam recusandae. Veniam cupiditate mollitia fugiat, quaerat debitis deleniti non odit porro quisquam beatae eum impedit possimus distinctio sint esse sapiente! Ipsam qui quibusdam eligendi perferendis vitae laudantium sed.
        </p>
      </div>
    </div>
  </section>




  </main>
@endsection
