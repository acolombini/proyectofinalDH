<header>

    <div class="contenedor-header">
      <div class="top-container">
        <div class="parallax" id="particles-js"></div>
          <div class="contenedorLogo">
            <img src="{{ asset('img/logo.png') }}" alt="4OsosStore">

          </div>
      </div>

      <div id="miMenu">

        @include('layouts.includes.nav')

        <div id="cajaBusqueda" style="display: none;">
          <form action='{{route('busqueda')}}' method="post" class="my-2 my-lg-0">
            @csrf
            <input class="form-control mr-sm-2" type="text" name="buscar" placeholder="Buscar">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
          </form>
        </div>

        <div class="progress-container">
          <div class="progress-bar" id="myBar"></div>
        </div>
      </div>
    </div>


    </header>
