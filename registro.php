<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php'; ?>
</head>

<body>
    <div class="container-fluid m-0 p-0 bg-sky">
        <header>
            <?php include 'header.php'; ?>
        </header>

        <!-- a partir de aca va el contenido de la pagina -->
        <main class="registro">
            <div class="container my-2 mx-auto py-2 ">

                <!--<div class="text-left mb-3 pl-4">
               <a href="#"><i  class="fa fa-bell bg-transblack rounded-circle  p-2"></i> </a><span><b>Activar Notificaciones</b></span>
            </div>-->
                <!--formulario OBLIGATORIO -->
                <section class="ml-3 mr-3  ">
                    <div class="container bg-transparent">
                        <form action="login.html" method="POST">
                            <div class=" shadow m-1 mb-3 p-4 bg-transblack">
                                <h2 class="text-center mb-5">Obligatorio</h2>
                                <div class="bg-transparent container">
                                    <div class="bg-transparent d-flex flex-column">
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap">
                                            <div class="w-100 mr-md-3">
                                                <label for="nombre" class="mb-2">Nombre</label>
                                                <input type="text" name="nombre" class="bg-light border-white p-1 px-4 mb-2 form-control shadow" autofocus required>
                                            </div>
                                            <div class="w-100 ml-md-3">
                                                <label for="apellido" class="mb-2">Apellido</label>
                                                <input type="text" name="apellido" class="bg-light border-white p-1 px-4 mb-2 form-control shadow" required>
                                            </div>
                                        </div>
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap">
                                            <div class="w-100 mr-md-3">
                                                <label for="email" class="mb-2">E-mail</label>
                                                <input type="email" name="email" class="bg-light border-white p-1 px-4 mb-2 form-control shadow" required>
                                            </div>
                                            <div class="w-100 ml-md-3">
                                                <label for="password" class="mb-2">Contraseña</label>
                                                <input type="password" name="password" class="bg-light border-white p-1 px-4 mb-2 form-control shadow" required>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <!--formulario OPCIONAL -->
                            <div class="shadow m-1 mb-3 p-4 bg-transblack ">
                                <h2 class="text-center mb-5">Opcional</h2>

                                <div class="container bg-transparent border-bottom border-dark mb-3 pb-3">
                                    <div class="bg-transparent d-flex flex-column">
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap">
                                            <div class="w-100 mr-md-3">
                                                <label class="mb-2 mr-md-3" for="tel">Teléfono</label>
                                                <input type="number" name="tel" placeholder="Número de teléfono" class="bg-light border-white p-1 px-4 mb-2 form-control shadow">
                                            </div>
                                            <div class="text-center text-md-left ml-md-3 w-100 align-self-end mb-2">
                                                <label class="mr-1" for="tipo-tel"> Celular </label>
                                                <input class="mr-3 align-middle" type="radio" name="tipo-tel" value="cel">
                                                <label class="mr-1" for="tipo-tel"> Fijo </label>
                                                <input class="align-middle" type="radio" name="tipo-tel" value="fijo">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container bg-transparent border-bottom border-dark mb-3 pb-3">
                                    <div class="bg-transparent d-flex flex-column">
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap">
                                            <div class="w-100 mr-md-3">
                                                <label for="documento" class="mb-2">Documento</label>
                                                <input type="number" name="documento" placeholder="Número" class=" bg-light border-white  p-1 px-4 mb-2 form-control shadow">
                                            </div>
                                            <div class="w-100 ml-md-3">
                                                <label class="mb-2" for="tipo-documento">Tipo</label>
                                                <select class=" bg-light border-white  p-1 px-4 mb-2 form-control shadow" name="tipo-documento" id="tipo">
                                                    <option value="DNI">DNI</option>
                                                    <option value="DNI">DNI</option>
                                                    <option value="DNI">DNI</option>
                                                    <option value="DNI">DNI</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container bg-transparent">
                                    <div class="bg-transparent d-flex flex-column">
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap">
                                            <div class="w-100 mr-md-3">
                                                <label for="direccion" class="mb-2">Dirección</label>
                                                <input type="text" name="calle" class=" bg-light border-white p-1 px-4 mb-2 form-control shadow" placeholder="Calle">
                                            </div>
                                            <div class="w-100 ml-md-3 align-self-md-end">
                                                <input type="number" name="numero" class="bg-light border-white p-1 px-4 mb-2 form-control shadow" placeholder="Numero">
                                            </div>
                                        </div>
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap">
                                            <div class="w-100 mr-md-3">
                                                <input type="number" name="piso" class="bg-light border-white p-1 px-4 mb-2 form-control shadow" placeholder="Piso">
                                            </div>
                                            <div class="w-100 ml-md-3">
                                                <input type="text" name="depto" class="bg-light border-white p-1 px-4 mb-2 form-control shadow" placeholder="Departamento">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn-primary p-2  border-0 mt-3 ml-3">Registrarse</button>
                            </div>
                        </form>
                    </div>


            </div>
        </main>
        <!-- hasta aca va el contenido de la pagina -->


        <?php include 'footer.php'; ?>



    </div>
    <!--fin container principal-->

    <?php include 'script.php'; ?>


</body>

</html>