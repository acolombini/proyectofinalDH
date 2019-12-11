<?php
session_start();
include 'php/checkCookies.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = 'Carrito';
    include 'php/head.php';
    ?>
</head>

<body>
    <div class="container-fluid m-0 p-0 bg-sky">
        <header>
            <?php require 'php/header.php'; ?>
        </header>

        <!-- a partir de aca va el contenido de la pagina -->
        <main>
            <div class="container cart bg-transparent mb-5">
                <!--cart-->
                <form class="my-5 p-2 shadow-lg" action="#checkout" method="POST">
                    <div class="row d-flex align-items-baseline justify-content-around">
                        <h2 class="d-inline flex-fill mx-4"> My Cart Items </h2>
                        <h3 class="d-inline mx-4"> Total: <h2 class="d-inline mx-4"> $99999 </h2>
                        </h3>
                    </div>
                    <div class="row justify-content-between p-3">
                        <div class="col-8">
                            <!--cart producto 1-->
                            <div class="row bg-transblack rounded text-light shadow mb-4 p-2 bg-transparent-light">
                                <img class="col-4" src="https://steamcdn-a.akamaihd.net/steam/apps/524220/header.jpg?t=1562596376" alt="Producto">
                                <div class="col">
                                    <h3 class=""> Nombre del producto </h3>
                                    <div class="row align-items-baseline justify-content-end">
                                        <label class="mr-2" for="precio"> Precio | </label>
                                        <p> $ 12345</p>
                                    </div>

                                    <div class="row align-items-baseline justify-content-between">
                                        <label class="col-2 p-0" name="cantidad"> Cantidad </label>
                                        <select class="col-2" name="cantidad" id="cantidad">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                        <button class="btn btn-info shadow col-3" type="button">Remover</button>
                                        <button class="btn btn-info shadow col-3" type="button">Favorito</button>
                                    </div>

                                </div>
                            </div>
                            <!--cart producto 2-->
                            <div class="row bg-transblack rounded text-light shadow mb-4 p-2 bg-transparent-light">
                                <img class="col-4" src="https://steamcdn-a.akamaihd.net/steam/apps/730/header.jpg?t=1574134201" alt="Producto">
                                <div class="col">
                                    <h3 class=""> Nombre del producto </h3>
                                    <div class="row align-items-baseline justify-content-end">
                                        <label class="mr-2" for="precio"> Precio | </label>
                                        <p> $ 12345</p>
                                    </div>

                                    <div class="row align-items-baseline justify-content-between">
                                        <label class="col-2 p-0" name="cantidad"> Cantidad </label>
                                        <select class="col-2" name="cantidad" id="cantidad">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                        <button class="btn btn-info shadow col-3" type="button">Remover</button>
                                        <button class="btn btn-info shadow col-3" type="button">Favorito</button>
                                    </div>

                                </div>
                            </div>
                            <!--cart producto 3-->
                            <div class="row bg-transblack rounded text-light shadow mb-4 p-2 bg-transparent-light">
                                <img class="col-4" src="https://steamcdn-a.akamaihd.net/steam/apps/1150190/header.jpg?t=1574285310" alt="Producto">
                                <div class="col">
                                    <h3 class=""> Nombre del producto </h3>
                                    <div class="row align-items-baseline justify-content-end">
                                        <label class="mr-2" for="precio"> Precio | </label>
                                        <p> $ 12345</p>
                                    </div>

                                    <div class="row align-items-baseline justify-content-between">
                                        <label class="col-2 p-0" name="cantidad"> Cantidad </label>
                                        <select class="col-2" name="cantidad" id="cantidad">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                        <button class="btn btn-info shadow col-3" type="button">Remover</button>
                                        <button class="btn btn-info shadow col-3" type="button">Favorito</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--SUBMIT-->
                        <div class="col-3 border border-dark bg-lightblue shadow">
                            <div class="row justify-content-between align-items-baseline p-2">
                                <p>Cupones</p>
                                <button class="btn btn-info shadow" type="button">Aplicar cupón</button>
                            </div>
                            <div class="row justify-content-start p-2">
                                <h5> Detalle de Precio </h5>
                            </div>
                            <div class="row p-2">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores rerum, labore obcaecati minima perferendis harum sed maiores culpa cum consequatur </p>
                            </div>
                            <div class="row p-2 justify-content-between">
                                <span>Order Total -</span> <span> $ 123456789</span>
                            </div>
                            <div class="row p-2 justify-content-center">
                                <button class="btn btn-primary" type="submit">Ordenar Productos</button>
                            </div>

                        </div>

                    </div>





                </form>
                <!--CHECKOUT-->
                <div class="row p-2 m-0 bg-transparent-light shadow">
                    <div class="row m-2 py-4 justify-content-start border-bottom border-dark flex-fill" id="checkout">
                        <h3>Selecciona un método de pago</h3>
                    </div>
                    <div class="col-9">
                        <div class="row border-bottom border-dark flex-fill p-3 mb-4">
                            <h5>Tus tarjetas guardadas, de crédito y débito</h5>
                        </div>
                        <div class="row justify-content-between p-2">
                            <span>Visa</span> <Span>Termina en 0000</Span> <span>Nombre de la tarjeta</span> <span> fecha 0/0/0</span>
                        </div>
                        <div class="row p-2 align-items-baseline mb-4 border-bottom border-dark">
                            <input class="col-2" type="radio" name="metodo">
                            <label for="CVV"> CVV: </label>
                            <input class="col-2" type="number">
                        </div>
                        <!--Tarjeta 2-->
                        <div class="row justify-content-between p-2">
                            <span>Visa</span> <Span>Termina en 0000</Span> <span>Nombre de la tarjeta</span> <span> fecha 0/0/0</span>
                        </div>
                        <div class="row p-2 align-items-baseline mb-4 border-bottom border-dark">
                            <input class="col-2" type="radio" name="metodo">
                            <label for="CVV"> CVV: </label>
                            <input class="col-2" type="number">
                        </div>
                        <!--OTROS METODOS DE PAGO-->
                        <div class="row p-2 mt-2">
                            <h5> Otros métodos de pago </h5>
                        </div>
                        <div class="row p-2 align-items-baseline">
                            <input type="radio" name="metodo" id="">
                            <label class="mx-4" for="">Tarjeta de crédito</label>
                        </div>
                        <div class="row pl-5 align-items-baseline">
                            <img class="col-3 col-sm-2 col-lg-1 rounded" src="img/visa.png" alt="visa">
                            <img class="col-3 col-sm-2 col-lg-1 rounded" src="img/amexpress.jpg" alt="visa">
                            <img class="col-3 col-sm-2 col-lg-1 rounded" src="img/master.png" alt="visa">
                            <img class="col-3 col-sm-2 col-lg-1 rounded" src="img/paypal.png" alt="visa">
                        </div>

                        <div class="row p-2 align-items-baseline">
                            <input type="radio" name="metodo" id="">
                            <label class="mx-4" for="">Tarjeta de débito</label>
                        </div>
                        <div class="row p-2 pl-5">
                            <select class="shadow col-3 p-2" name="bank" id="bank">
                                <option value="bank1">bank1</option>
                            </select>
                        </div>
                        <div class="row p-2 align-items-baseline">
                            <input type="radio" name="metodo" id="">
                            <label class="mx-4" for=""> Net Banking </label>
                        </div>
                        <div class="row p-2 pl-5">
                            <select class="shadow col-3 p-2" name="bank" id="bank">
                                <option value="bank1">bank1</option>
                            </select>
                        </div>
                        <div class="row flex-fill border-top border-dark p-2"></div>
                        <div class="row p-2 align-items-baseline">
                            <input type="radio" name="metodo" id="">
                            <label class="mb-4 mx-4" for=""> Efectivo en el lugar de envío </label>
                        </div>

                    </div>
                    <!--SUBMIT-->
                    <div class="col p-3">
                        <div class="shadow">
                            <div class="row justify-content-center p-2 border border-bottom-0 border-dark bg-lightblue">
                            <button class="btn btn-info shadow flex-fill mb-4" type="submit">Continuar</button>

                            </div>
                            <div class="row p-5 text-center border border-top-0 border-dark bg-lightblue">
                                <p>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et quis quisquam voluptas cumque dolore delectus, perspiciatis tempore cupiditate numquam est totam

                                </p>
                            </div>
                        </div>
                        
                    </div>
                </div>


            </div>

        </main>

        <!-- hasta aca va el contenido de la pagina -->


        <?php include 'php/footer.php'; ?>



    </div>
    <!--fin container principal-->

    <?php require 'php/scripts.php'; ?>

</body>

</html>