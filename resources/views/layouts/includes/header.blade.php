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
          <form action='productos/buscar' class="my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" name="buscador" placeholder="Buscar">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
          </form>
        </div>

        <div class="progress-container">
          <div class="progress-bar" id="myBar"></div>
        </div>
      </div>
    </div>


    </header>
