<?php
if (isset($_SESSION["usuario"])) : ?>
    <!-- <header > -->
    <!-- contenedor del header -->
    <div class="container-fluid m-0 p-0">
        <!-- contenedor navbar -->
        <nav class="navbar navbar-expand-lg navbar-light d-flex shadow bg-transparent-light">
            <div class="container">
                <!-- ecabezado de la navbar incluye logo o slogan y boton hamburguesa -->

                <!-- logo o slogan -->
                <a class="navbar-brand col-sm-2 col-3" href="index.php"><img src="img/logo.png" alt="" class="img-responsive col-12 col-md-10"></a>

                <!-- boton hamburguesa -->
                <button id="nav" type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle navbar-toggler" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="nav-collapse">
                        <span> <i class="fa fa-bars"></i></span>
                    </div>
                </button>



                <!-- aca va todo lo que se quiera inlcuir en la barra de menu -->
                <div id="navbarCollapse" class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-cuerpo nav navbar-nav row text-right">
                        <li class="nav-item p-0 ml-2 col active ">
                            <a class="nav-link" href="index.php">
                                Home
                            </a>
                        </li>
                        <li class="nav-item p-0 ml-2 col ">
                            <a href="faq.php" class="nav-link">FAQ</a>
                        </li>


                        <li class="nav-item p-0 ml-2 col  ">
                            <a href="contact.php" class="nav-link">Contacto</a>
                        </li>


                        <li class="nav-item p-0 ml-2 col dropdown ">
                            <a id="dropdownMenu1" href="lista.php" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                                Categoria
                            </a>
                            <ul aria-labelledby="dropdownMenu1" class="dropdown-menu border-0 shadow">
                                <li>
                                    <a href="lista.php" class="dropdown-item">
                                        Categoria#1
                                    </a>
                                </li>
                                <li>
                                    <a href="lista.php" class="dropdown-item">
                                        Categoria#2
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <!-- segundo nivel del menu-->
                                <li class="dropdown-submenu">
                                    <a id="dropdownMenu2" href="lista.php" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">
                                        Categoria#3
                                    </a>
                                    <ul aria-labelledby="dropdownMenu2" class="dropdown-menu border-0 shadow">
                                        <li>
                                            <a tabindex="-1" href="lista.php" class="dropdown-item">
                                                SubCategoria#1
                                            </a>
                                        </li>
                                        <!-- tercer nivel del menu-->
                                        <li class="dropdown-submenu">
                                            <a id="dropdownMenu3" href="lista.php" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">SubCategoria#2</a>
                                            <ul aria-labelledby="dropdownMenu3" class="dropdown-menu border-0 shadow">
                                                <li>
                                                    <a href="lista.php" class="dropdown-item">
                                                        SubSubCategoria#1
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- fin tercer nivel -->
                                        <li><a href="lista.php" class="dropdown-item">SubCategoria#3</a></li>
                                    </ul>
                                </li>
                                <!-- fin segundo nivel -->
                            </ul>
                        </li><!-- fin primer nivel -->

                        <!-- form busqueda -->
                        <li class="nav-item p-0 ml-3">
                            <form class="navbar-form form-inline justify-content-end">
                                <div class=" autofocus-group search-box searchbar row">
                                    <input class="form-control shadow col-9 " type="search" value="Buscar Productos" id="example-search-input">
                                    <span class="input-group-append col-3 p-0">
                                        <button class="btn shadow " type="button">
                                            <i class="fa fa-search">
                                            </i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </li>

                        <!-- botones de carrito y login -->
                        <li class="nav-item p-0 ml-2 col dropdown ">
                            <a id="dropdownMenu2" href="profile.php" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle d-flex flex-nowrap align-items-center">
                                <i class="fas fa-user mr-2"></i>
                                <span>Cuenta</span>
                            </a>
                            <ul aria-labelledby="dropdownMenu2" class="dropdown-menu border-0 shadow">
                                <li>
                                    <a href="profile.php" class="dropdown-item">
                                        Mi perfil
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="logout" class="dropdown-item">
                                        Salir
                                    </a>
                                </li>
                            </ul>
                        </li><!-- fin primer nivel -->
                        <li class="nav-item p-0 ml-2 col">
                            <a href="cart.php" class="nav-link d-flex flex-nowrap align-items-center">
                                <i class="fas fa-shopping-cart mr-2 align-middle"></i>
                                <span>Carrito</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div><!-- contenedor navbar -->
    <!--</header>-->
<?php else : ?>
    <!-- <header > -->
    <!-- contenedor del header -->
    <div class="container-fluid m-0 p-0">
        <!-- contenedor navbar -->
        <nav class="navbar navbar-expand-lg navbar-light d-flex shadow">
            <div class="container">
                <!-- ecabezado de la navbar incluye logo o slogan y boton hamburguesa -->

                <!-- logo o slogan -->
                <a class="navbar-brand col-sm-2 col-3" href="index.php"><img src="img/logo.png" alt="" class="img-responsive col-12 col-md-10"></a>

                <!-- boton hamburguesa -->
                <button id="nav" type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle navbar-toggler" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="nav-collapse">
                        <span> <i class="fa fa-bars"></i></span>
                    </div>
                </button>



                <!-- aca va todo lo que se quiera inlcuir en la barra de menu -->
                <div id="navbarCollapse" class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-cuerpo nav navbar-nav row text-right">
                        <li class="nav-item p-0 ml-2 col active ">
                            <a class="nav-link" href="index.php">
                                Home
                            </a>
                        </li>
                        <li class="nav-item p-0 ml-2 col ">
                            <a href="faq.php" class="nav-link">FAQ</a>
                        </li>


                        <li class="nav-item p-0 ml-2 col  ">
                            <a href="contact.php" class="nav-link">Contacto</a>
                        </li>


                        <li class="nav-item p-0 ml-2 col dropdown ">
                            <a id="dropdownMenu1" href="lista.php" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                                Categoria
                            </a>
                            <ul aria-labelledby="dropdownMenu1" class="dropdown-menu border-0 shadow">
                                <li>
                                    <a href="lista.php" class="dropdown-item">
                                        Categoria#1
                                    </a>
                                </li>
                                <li>
                                    <a href="lista.php" class="dropdown-item">
                                        Categoria#2
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <!-- segundo nivel del menu-->
                                <li class="dropdown-submenu">
                                    <a id="dropdownMenu2" href="lista.php" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">
                                        Categoria#3
                                    </a>
                                    <ul aria-labelledby="dropdownMenu2" class="dropdown-menu border-0 shadow">
                                        <li>
                                            <a tabindex="-1" href="lista.php" class="dropdown-item">
                                                SubCategoria#1
                                            </a>
                                        </li>
                                        <!-- tercer nivel del menu-->
                                        <li class="dropdown-submenu">
                                            <a id="dropdownMenu3" href="lista.php" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">SubCategoria#2</a>
                                            <ul aria-labelledby="dropdownMenu3" class="dropdown-menu border-0 shadow">
                                                <li>
                                                    <a href="lista.php" class="dropdown-item">
                                                        SubSubCategoria#1
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- fin tercer nivel -->
                                        <li><a href="lista.php" class="dropdown-item">SubCategoria#3</a></li>
                                    </ul>
                                </li>
                                <!-- fin segundo nivel -->
                            </ul>
                        </li><!-- fin primer nivel -->

                        <!-- form busqueda -->
                        <li class="nav-item p-0 ml-3">
                            <form class="navbar-form form-inline justify-content-end">
                                <div class=" autofocus-group search-box searchbar row">
                                    <input class="form-control shadow col-9 " type="search" value="Buscar Productos" id="example-search-input">
                                    <span class="input-group-append col-3 p-0">
                                        <button class="btn shadow " type="button">
                                            <i class="fa fa-search">
                                            </i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </li>

                        <!-- botones de carrito y login -->
                        <li class="nav-item p-0 ml-2 col ">
                            <a href="login.php" class="nav-link d-flex flex-nowrap align-items-center">
                                <i class="fas fa-user mr-2"></i>
                                <span>Cuenta</span>
                            </a>
                        </li>
                        <li class="nav-item p-0 ml-2 col ">
                            <a href="cart.php" class="nav-link d-flex flex-nowrap align-items-center">
                                <i class="fas fa-shopping-cart mr-2 align-middle"></i>
                                <span>Carrito</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div><!-- contenedor navbar -->
    <!--</header>-->
<?php endif; ?>