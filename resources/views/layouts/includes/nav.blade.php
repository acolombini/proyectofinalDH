<nav class="navbar navbar-expand-md navbar-dark bg-dark">

    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
     <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
         aria-expanded="false" aria-label="Toggle navigation">
       <!-- <span class="navbar-toggler-icon"></span> -->
       <div class="toggle-menu-btn" onclick="toggleMenuBtn(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
      </div>
     </button>

     <div class="collapse navbar-collapse" id="collapsibleNavId">
       <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
         <li class="nav-item">
           <a class="nav-link " href="{{route('home')}}">Inicio</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="{{route('faq.index')}}">FAQ</a>
         </li>
         <li class="nav-item">
          <a class="nav-link" href="{{route('contacto.index')}}">Contacto</a>
        </li>
         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Productos</a>
           <div class="dropdown-menu" aria-labelledby="dropdownId">
             <a class="dropdown-item" href="productos.php">Pagina Categoria</a>
             <a class="dropdown-item" href="producto.php">Pagina Producto</a>
           </div>
         </li>
         <li class="nav-item">
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->getNombreCompleto() }}
                            @if (isset(Auth::user()->avatar))
                            <img src="/storage/users_avatar/{{Auth::user()->avatar}}" style="border-radius: 50%; width: 40px; height: 40px;" alt="foto de perfil">
                            @endif
                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('user.edit') }}">
                                {{ __('Perfil') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </li>


       </ul>

       <a class="btn btn-outline-success mr-2" href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>

       <button class="btn btn-outline-success" onclick="cajaBusqueda()"><i class="fa fa-search" aria-hidden="true"></i></button>
     </div>

   </div>

   </nav>
