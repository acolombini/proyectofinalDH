<?php
session_start();

# Dropdowns
$dropdowns = [
    "provincias" => [
        "PBA" => "Buenos Aires",
        "CA" => "Catamarca",
        "CH" => "Chaco",
        "CT" => "Chubut",
        "CB" => "Córdoba",
        "CR" => "Corrientes",
        "ER" => "Entre Ríos",
        "FO" => "Formosa",
        "JY" => "Jujuy",
        "LP" => "La Pampa",
        "LR" => "La Rioja",
        "MZ" => "Mendoza",
        "MI" => "Misiones",
        "NQ" => "Neuquén",
        "RN" => "Río Negro",
        "SA" => "Salta",
        "SJ" => "San Juan",
        "SL" => "San Luis",
        "SC" => "Santa Cruz",
        "SF" => "Santa Fe",
        "SE" => "Santiago del Estero",
        "TF" => "Tierra del Fuego",
        "TU" => "Tucumán"
    ],
    "documentos" => [
        "DNI" => "Documento Nacional de Identidad",
        "CI" => "Cédula de Identidad",
        "LC" => "Libreta Cívica",
        "LE" => "Libreta de Enrolamiento",
        "OTRO" => "Otro..."
    ]
];

# Validación
if ($_POST) {

    /* Estructura del array de usuario
    $usuario = [
        "id" => "",
        "cuenta" => [
            "nombre" => "", REQUERIDO
            "apellido" => "", REQUERIDO
            "email" => "", REQUERIDO
            "password" => "" REQUERIDO
        ],
        "datos" => [ SE GENERA SI RELLENAN DATOS EN LA SECCIÓN OPCIONAL
            "tel" => [
                "nro-tel" => "", OPCIONAL
                "tipo-tel" => "" REQUERIDO si se rellena "nro-tel"
            ],
            "doc" => [
                "nro-doc" => "", OPCIONAL
                "tipo-doc" => "" REQUERIDO si se rellena "nro-doc" (EL VALOR POR DEFECTO SIEMPRE SERÁ "DNI" CUANDO SE RELLENA "nro-doc")
            ]
        ],
        "direcciones" => [ SE GENERA SI RELLENAN DATOS EN LA SECCIÓN DE DIRECCIONES
            0 => [
                "provincia" => "", OPCIONAL - REQUERIDO si se rellenan "ciudad", "cpostal", "calle", "nro-calle", "nro-piso" y "depto"
                "ciudad" => "", OPCIONAL - REQUERIDO si se rellenan "cpostal", "calle", "nro-calle", "nro-piso" y "depto"
                "cpostal" => "", OPCIONAL - REQUERIDO si se rellena "calle", "cpostal", "nro-calle", "nro-piso" y "depto"
                "calle" => "", OPCIONAL - REQUERIDO si se rellenan "nro-calle", "nro-piso" y "depto"
                "nro-calle" => "", OPCIONAL - REQUERIDO si se rellena "calle", "nro-piso" y "depto"
                "nro-piso" => "", OPCIONAL - REQUERIDO si se rellena "depto"
                "depto" => "" OPCIONAL - REQUERIDO si se rellena "nro-piso"
            ]
        ]
    ];
    */

    # Iniciando array de errores
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
                        <form action="register.php" method="POST">
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
                                                <input type="text" name="nombre" id="nombre" value="<?= empty($_POST["nombre"]) ? "" : $_POST["nombre"] ?>" class="bg-light border-white py-1 px-3 mb-2 form-control shadow" placeholder="Nombre..." autofocus required>
                                            </div>
                                            <div class="w-100 ml-md-3">
                                                <label for="apellido" class="mb-2">Apellido</label>
                                                <input type="text" name="apellido" id="apellido" value="<?= empty($_POST["apellido"]) ? "" : $_POST["apellido"] ?>" class=" bg-light border-white py-1 px-3 mb-2 form-control shadow" placeholder="Apellido.." required>
                                            </div>
                                        </div>
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap">
                                            <div class="w-100 mr-md-3">
                                                <label for="email" class="mb-2">E-mail</label>
                                                <input type="email" name="email" id="email" value="<?= empty($_POST["email"]) ? "" : $_POST["email"] ?>" class=" bg-light border-white py-1 px-3 mb-2 form-control shadow" placeholder="email@example.com" required>
                                            </div>
                                            <div class="w-100 ml-md-3 d-md-flex">
                                                <div class="mr-md-2 w-100">
                                                    <label for="password" class="mb-2">Contraseña</label>
                                                    <input type="password" name="password" id="password" class="w-100 bg-light border-white py-1 px-3 mb-2 form-control shadow" placeholder="Contraseña..." required>
                                                </div>
                                                <div class="ml-md-2 w-100">
                                                    <label for="cpassword" class="mb-2 d-flex flex-nowrap">Confirmar</label>
                                                    <input type="password" name="cpassword" id="cpassword" class="w-100 bg-light border-white py-1 px-3 mb-2 form-control shadow" placeholder="Confirmar..." required>
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
                                                <input type="text" name="nro-tel" id="nro-tel" value="<?= empty($_POST["nro-tel"]) ? "" : $_POST["nro-tel"] ?>" class="bg-light border-white py-1 px-3 mb-2 form-control shadow" placeholder="Número...">
                                            </div>
                                            <div class="d-flex flex-wrap justify-content-around d-md-block text-md-left ml-md-3 w-100 align-self-end">
                                                <div class="custom-control custom-radio mb-md-1">
                                                    <input type="radio" id="tipo-celular" name="tipo-tel" value="cel" class="custom-control-input" <?php if (isset($_POST['tipo-tel']) && $_POST['tipo-tel'] == "cel") echo "checked"; ?>>
                                                    <label class="custom-control-label" for="tipo-celular">Celular</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="tipo-fijo" name="tipo-tel" value="fijo" class="custom-control-input" <?php if (isset($_POST['tipo-tel']) && $_POST['tipo-tel'] == "fijo") echo "checked"; ?>>
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
                                                <label class="mb-2" for="tipo-doc">Tipo de documento</label>
                                                <select name="tipo-doc" id="tipo-doc" class="bg-light border-white py-1 px-3 mb-2 form-control shadow">
                                                    <?php foreach ($dropdowns["documentos"] as $codigo => $documento) :
                                                        if (isset($_POST["tipo-doc"]) && $_POST["tipo-doc"] == $codigo) : ?>
                                                            <option value="<?= $codigo ?>" selected>
                                                                <?= $documento ?>
                                                            </option>
                                                        <?php else : ?>
                                                            <option value="<?= $codigo ?>">
                                                                <?= $documento ?>
                                                            </option>
                                                    <?php endif;
                                                    endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="w-100 ml-md-3">
                                                <label for="nro-doc" class="mb-2">Documento</label>
                                                <input type="text" name="nro-doc" id="nro-doc" value="<?= empty($_POST["nro-doc"]) ? "" : $_POST["nro-doc"] ?>" class="bg-light border-white py-1 px-3 mb-2 form-control shadow" placeholder="Número...">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container bg-transparent">
                                    <div class="bg-transparent d-flex flex-column">
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap">
                                            <div class="w-100 mr-md-3">
                                                <label class="mb-2">Ciudad</label>
                                                <input type="text" name="ciudad" value="<?= empty($_POST["ciudad"]) ? "" : $_POST["ciudad"] ?>" class="bg-light border-white py-1 px-3 mb-2 form-control shadow" placeholder="Ciudad...">
                                            </div>
                                            <div class="w-100 ml-md-3 d-md-flex">
                                                <div class="w-100 mr-md-2">
                                                    <label class="mb-2" id="provincia" for="tipo-doc">Provincia</label>
                                                    <select name="provincia" id="provincia" class="w-100 bg-light border-white py-1 px-3 mb-2 form-control shadow">
                                                        <?php foreach ($dropdowns["provincias"] as $codigo => $provincia) :
                                                            if (isset($_POST["provincia"]) && $_POST["provincia"] == $codigo) : ?>
                                                                <option value="<?= $codigo ?>" selected>
                                                                    <?= $provincia ?>
                                                                </option>
                                                            <?php else : ?>
                                                                <option value="<?= $codigo ?>">
                                                                    <?= $provincia ?>
                                                                </option>
                                                        <?php endif;
                                                        endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="w-100 ml-md-2">
                                                    <label class="mb-2" id="Código postal" for="cpostal">Código postal</label>
                                                    <input type="text" name="cpostal" id="cpostal" value="<?= empty($_POST["cpostal"]) ? "" : $_POST["cpostal"] ?>" class="w-100 bg-light border-white py-1 pl-4 pr-1 mb-2 form-control shadow" placeholder="Código...">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap">
                                            <div class="w-100 mr-md-3 d-md-flex">
                                                <div class="w-100 mr-md-2">
                                                    <label class="mb-2" id="calle" for="calle">Calle</label>
                                                    <input type="text" name="calle" id="calle" value="<?= empty($_POST["calle"]) ? "" : $_POST["calle"] ?>" class="w-100 bg-light border-white py-1 px-3 mb-2 form-control shadow" placeholder="Calle...">
                                                </div>
                                                <div class="w-100 ml-md-2">
                                                    <label class="mb-2" for="nro-calle">Número de calle</label>
                                                    <input type="text" name="nro-calle" id="nro-calle" value="<?= empty($_POST["nro-calle"]) ? "" : $_POST["nro-calle"] ?>" class="w-100 bg-light border-white py-1 px-3 mb-2 form-control shadow" placeholder="Número..">
                                                </div>
                                            </div>
                                            <div class="w-100 ml-md-3 d-md-flex">
                                                <div class="w-100 mr-md-2">
                                                    <label class="mb-2" for="nro-piso">Piso</label>
                                                    <input type="text" name="nro-piso" id="nro-piso" value="<?= empty($_POST["nro-piso"]) ? "" : $_POST["nro-piso"] ?>" class="bg-light border-white py-1 px-3 mb-2 form-control shadow" placeholder="Número...">
                                                </div>
                                                <div class="w-100 ml-md-2">
                                                    <label class="mb-2" for="depto">Departamento</label>
                                                    <input type="text" name="depto" id="depto" value="<?= empty($_POST["depto"]) ? "" : $_POST["depto"] ?>" class="w-100 bg-light border-white py-1 px-3 mb-2 form-control shadow" placeholder="Depto...">
                                                </div>
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