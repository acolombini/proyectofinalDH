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
        <div class="card-deck">
        <div class="owl-carousel owl-theme" id="sliderProductos">

          @foreach ($productos as $producto)
          <div class="card">
            <a href="/producto/{{$producto->id}}">
            <img class="card-img-top" src="/storage/product_poster/{{$producto->poster}}" width="100%" alt="Imágen del producto">
            <div class="card-body">
              <h5 class="card-title">{{$producto->getTitulo()}}</h5>
              <p class="card-text">{{$producto->descripcion}}</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
            </a>
          </div>
          @endforeach

            <div class="card">
              <img class="card-img-top" src="img/bearLogo.png" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
              </div>
            </div>

            <div class="card">
              <img class="card-img-top" src="img/bearLogo.png" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
              </div>
            </div>

            <div class="card">
              <img class="card-img-top" src="img/bearLogo.png" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
              </div>
            </div>
            <div class="card">
              <img class="card-img-top" src="img/bearLogo.png" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
              </div>
            </div>
            <div class="card">
              <img class="card-img-top" src="img/bearLogo.png" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
              </div>
            </div>

          </div>
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

      <div class="p-1 col-6 col-md-4 col-lg-3">
        <div class="card bg-dark text-white categoria">
          <img class="card-img" src="/img/bearLogo.png" alt="">
          <div class="card-img-overlay">
            <h4 class="card-title">Title</h4>
          </div>
        </div>
      </div>

      <div class="p-1 col-6 col-md-4 col-lg-3">
        <div class="card bg-dark text-white categoria">
          <img class="card-img" src="/img/bearLogo.png" alt="">
          <div class="card-img-overlay">
            <h4 class="card-title">Title</h4>
          </div>
        </div>
      </div>
      <div class="p-1 col-6 col-md-4 col-lg-3">
        <div class="card bg-dark text-white categoria">
          <img class="card-img" src="/img/bearLogo.png" alt="">
          <div class="card-img-overlay">
            <h4 class="card-title">Title</h4>
          </div>
        </div>
      </div>
      <div class="p-1 col-6 col-md-4 col-lg-3">
        <div class="card bg-dark text-white categoria">
          <img class="card-img" src="/img/bearLogo.png" alt="">
          <div class="card-img-overlay">
            <h4 class="card-title">Title</h4>
          </div>
        </div>
      </div>

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
