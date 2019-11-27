<?php

/* Persistencia */
$usuario = [
    "cuenta" => [
        "nombre" => empty($_POST["nombre"]) ? "" : $_POST["nombre"],
        "apellido" => empty($_POST["apellido"]) ? "" : $_POST["apellido"],
        "email" => empty($_POST["email"]) ? "" : $_POST["email"],
        "password" => ""
    ],
    "datos" => [
        "tel" => [
            "nro-tel" => empty($_POST["nro-tel"]) ? "" : $_POST["nro-tel"],
            "tipo-tel" => empty($_POST["tipo-tel"]) ? "" : $_POST["tipo-tel"]
        ],
        "doc" => [
            "nro-doc" => empty($_POST["nro-doc"]) ? "" : $_POST["nro-doc"],
            "tipo-doc" => empty($_POST["tipo-doc"]) ? "" : $_POST["tipo-doc"]
        ]
    ],
    "dires" => [
        0 => [
            "ciudad" => empty($_POST["ciudad"]) ? "" : $_POST["ciudad"],
            "cpostal" => empty($_POST["cpostal"]) ? "" : $_POST["ciudad"],
            "calle" => empty($_POST["calle"]) ? "" : $_POST["calle"],
            "nro-calle" => empty($_POST["nro-calle"]) ? "" : $_POST["nro-calle"],
            "piso" => empty($_POST["piso"]) ? "" : $_POST["piso"],
            "depto" => empty($_POST["depto"]) ? "" : $_POST["depto"]
        ]
    ]
];

if ($_POST) {
    $errores = [];

    /*chequeando el campo de nombre*/
    if (!preg_match("/^.{2,26}$/u", $_POST["nombre"])) {
        $errores[] = "El nombre debe contener entre 2 y 26 caracteres.";
    } elseif (!preg_match("/^\pL+(?>[ ']\pL+)*$/u", $_POST["nombre"])) {
        $errores[] = "El nombre contiene caracteres no permitidos.";
    } else {
        $usuario["cuenta"]["nombre"] = strtolower($_POST["nombre"]);
    }

    /*chequeando el campo de apellido*/
    if (!preg_match("/^.{2,25}$/u", $_POST["apellido"])) {
        $errores[] = "El apellido debe contener entre 2 y 25 caracteres.";
    } elseif (!preg_match("/^\pL+(?>[ ']\pL+)*$/u", $_POST["apellido"])) {
        $errores[] = "El apellido contiene caracteres no permitidos.";
    } else {
        $usuario["cuenta"]["apellido"] = strtolower($_POST["apellido"]);
    }

    /*chequeando el campo de email*/
    if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $usuario["cuenta"]["email"] = $_POST["email"];
    } else {
        $errores[] = "El email es incorrecto.";
    }

    /*chequeando el campo de contraseña*/
    if (!empty($_POST["password"])) {
        if (strlen($_POST["password"]) <= 8) { /*Error de caracteres mínimos*/
            $errores[] = "Tu contraseña debe contar con al menos 8 caracteres!";
        } elseif ($_POST["password"] >= 64) { /*Error de caracteres máximos*/
            $errores[] = "Tu contraseña no debe contener más de 64 caracteres!";
        } elseif (!preg_match("#[0-9]+#", $_POST["password"])) { /*Error cuando no hay números*/
            $errores[] = "Tu contraseña debe contar con al menos un número!";
        } elseif (!preg_match("#[A-Z]+#", $_POST["password"])) { /*Error cuando no hay mayúsculas*/
            $errores[] = "Tu contraseña debe contar con al menos una letra en mayúsculas!";
        } elseif (!preg_match("#[a-z]+#", $_POST["password"])) { /*Error cuando no hay minúsculas*/
            $errores[] = "Tu contraseña debe contar con al menos una letra en minúsculas!";
        } elseif ($_POST["password"] != $_POST["cpassword"]) { /*Error cuando las contraseñas no coinciden*/
            $errores[] = "Las contraseñas no coinciden!";
        } else { /*Success!*/
            $usuario["cuenta"]["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
        }
    } elseif (empty($_POST["password"])) { /*Error de contraseña vacía*/
        $errores[] = "Por favor ingresa una contraseña!";
    } else { /*Error por si todo falla?*/
        $errores[] = "Por favor ingresa una contraseña!";
    }

    /*Términos y condiciones - Mayor de edad*/
    if (empty($_POST["tos"])) {
        $errores[] = "Debes aceptar los términos y condiciones del sitio!";
    }
    if (empty($_POST["mayor"])) {
        $errores[] = "Debes aceptar que sos mayor de edad!";
    }

    /*Escritura de arhivos cuando no hay errores*/
    if (count($errores) == 0) {
        $dbget = file_get_contents("db/usuarios.json");
        $dbdecoded = json_decode($dbget, true);
        $dbdecoded["usuarios"][] = $usuario;
        $dbencoded = json_encode($dbdecoded);
        $dbput = file_put_contents("db/usuarios.json", $dbencoded);
    }
}
?>

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
                        <form action="registro.php" method="POST">
                            <div class=" shadow m-1 mb-3 p-4 bg-transblack">

                                <!-- Errores php -->
                                <?php
                                if ($_POST) : ?>
                                    <ul id="regerror" class="text-white list-unstyled font-weight-bold">
                                        <?php if (count($errores) > 0) :
                                                foreach ($errores as $error) : ?>
                                                <li><?= "- " . $error ?></li>
                                        <?php endforeach;
                                            endif; ?>
                                    </ul>
                                <?php endif; ?>
                                <h2 class="text-center mb-5">Obligatorio</h2>
                                <div class="bg-transparent container">
                                    <div class="bg-transparent d-flex flex-column">
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap">
                                            <div class="w-100 mr-md-3">
                                                <label for="nombre" class="mb-2">Nombre</label>
                                                <input type="text" name="nombre" id="nombre" value="<?= $usuario["cuenta"]["nombre"] ?>" class="bg-light border-white p-1 px-4 mb-2 form-control shadow" autofocus required>
                                            </div>
                                            <div class="w-100 ml-md-3">
                                                <label for="apellido" class="mb-2">Apellido</label>
                                                <input type="text" name="apellido" id="apellido" value="<?= $usuario["cuenta"]["apellido"] ?>" class=" bg-light border-white p-1 px-4 mb-2 form-control shadow" required>
                                            </div>
                                        </div>
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap">
                                            <div class="w-100 mr-md-3">
                                                <label for="email" class="mb-2">E-mail</label>
                                                <input type="email" name="email" id="email" value="<?= $usuario["cuenta"]["email"] ?>" class=" bg-light border-white p-1 px-4 mb-2 form-control shadow" required>
                                            </div>
                                            <div class="w-100 ml-md-3 d-md-flex">
                                                <div class="mr-md-3">
                                                    <label for="password" class="mb-2">Contraseña</label>
                                                    <input type="password" name="password" id="password" class="bg-light border-white p-1 px-4 mb-2 form-control shadow" required>
                                                </div>
                                                <div class="ml-md-3">
                                                    <label for="cpassword" class="mb-2 d-flex flex-nowrap">Confirmar</label>
                                                    <input type="password" name="cpassword" id="cpassword" class="bg-light border-white p-1 px-4 mb-2 form-control shadow" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-checkbox mt-3">
                                            <input type="checkbox" class="custom-control-input" name="mayor" id="mayor" value="si" <?php if (isset($_POST['mayor'])) echo "checked"; ?> required>
                                            <label class="custom-control-label" for="mayor">Soy mayor de 18 años.</label>
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
                                                <label class="mb-2 mr-md-3" for="nro-tel">Teléfono</label>
                                                <input type="number" name="nro-tel" id="nro-tel" value="<?= $usuario["datos"]["tel"]["nro-tel"] ?>" class="bg-light border-white p-1 px-4 mb-2 form-control shadow" placeholder="Número de teléfono">
                                            </div>
                                            <div class="d-flex flex-wrap justify-content-around d-md-block text-md-left ml-md-3 w-100 align-self-end">
                                                <div class="custom-control custom-radio mb-md-1">
                                                    <input type="radio" id="tipo-celular" name="tipo-tel" value="cel" class="custom-control-input" checked>
                                                    <label class="custom-control-label" for="tipo-celular">Celular</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="tipo-fijo" name="tipo-tel" value="fijo" class="custom-control-input">
                                                    <label class="custom-control-label" for="tipo-fijo">Fijo</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container bg-transparent border-bottom border-dark mb-3 pb-3">
                                    <div class="bg-transparent d-flex flex-column">
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap">
                                            <div class="w-100 mr-md-3">
                                                <label class="mb-2" for="tipo-doc">Tipo</label>
                                                <select name="tipo-doc" id="tipo-doc" class="bg-light border-white p-1 px-4 mb-2 form-control shadow">
                                                    <option value="DNI">DNI</option>
                                                    <option value="DNI">DNI</option>
                                                    <option value="DNI">DNI</option>
                                                    <option value="DNI">DNI</option>
                                                </select>
                                            </div>
                                            <div class="w-100 ml-md-3">
                                                <label for="nro-doc" class="mb-2">Documento</label>
                                                <input type="number" name="nro-doc" id="nro-doc" value="<?= $usuario["datos"]["doc"]["nro-doc"] ?>" class="bg-light border-white p-1 px-4 mb-2 form-control shadow" placeholder="Número">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container bg-transparent">
                                    <div class="bg-transparent d-flex flex-column">
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap">
                                            <div class="w-100 mr-md-3">
                                                <label class="mb-2">Dirección</label>
                                                <input type="text" name="ciudad" value="<?= $usuario["dires"]["0"]["ciudad"] ?>" class="bg-light border-white p-1 px-4 mb-2 form-control shadow" placeholder="Ciudad">
                                            </div>
                                            <div class="w-100 ml-md-3 align-self-md-end">
                                                <input type="number" name="cpostal" value="<?= $usuario["dires"]["0"]["cpostal"] ?>" class="bg-light border-white p-1 px-4 mb-2 form-control shadow" placeholder="Código postal">
                                            </div>
                                        </div>
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap">
                                            <div class="w-100 mr-md-3">
                                                <input type="text" name="calle" value="<?= $usuario["dires"]["0"]["calle"] ?>" class=" bg-light border-white p-1 px-4 mb-2 form-control shadow" placeholder="Calle">
                                            </div>
                                            <div class="w-100 ml-md-3 align-self-md-end">
                                                <input type="number" name="nro-calle" value="<?= $usuario["dires"]["0"]["nro-calle"] ?>" class="bg-light border-white p-1 px-4 mb-2 form-control shadow" placeholder="Número de calle">
                                            </div>
                                        </div>
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap">
                                            <div class="w-100 mr-md-3">
                                                <input type="number" name="piso" value="<?= $usuario["dires"]["0"]["piso"] ?>" class="bg-light border-white p-1 px-4 mb-2 form-control shadow" placeholder="Piso">
                                            </div>
                                            <div class="w-100 ml-md-3">
                                                <input type="text" name="depto" value="<?= $usuario["dires"]["0"]["depto"] ?>" class="bg-light border-white p-1 px-4 mb-2 form-control shadow" placeholder="Departamento">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center ml-3 mt-3">
                                    <button class="btn-primary p-2 border-0 mr-3">Registrarse</button>
                                    <div class="custom-control custom-checkbox ml-2">
                                        <input type="checkbox" class="custom-control-input" name="tos" id="tos" value="aceptados" <?php if (isset($_POST['tos'])) echo "checked"; ?> required>
                                        <label class="custom-control-label" for="tos">Acepto los <a href="tos.php">terminos y condiciones</a> del sitio.</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


            </div>
        </main>
        <!-- hasta aca va el contenido de la pagina -->


        <?php include 'footer.php'; ?>



    </div>
    <!--fin container principal-->
    <script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.0/dist/bootstrap-validate.js"></script>
    <?php include 'script.php'; ?>


</body>

</html>