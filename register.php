<?php
#session_start();

if (isset($_SESSION["usuario"])) { # Redirección de usuario logueado
    header('Location: index.php');
}

############################## DROPDOWNS ##############################
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

############################## VALIDACIÓN ##############################

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

    # Iniciando arrays
    $errores = [];
    $usuario = ["id" => 0];
    $dbget = file_get_contents("db/usuarios.json");
    $db = json_decode($dbget, true);
    $usuario["id"] = end($db)["id"] + 1; # Creando ID

    ############### OBLIGATORIO ###############
    # Checkeando el campo de nombre
    if (empty($_POST["nombre"])) { # Error de nombre vacío
        $errores[] = "Debes introducir tu nombre.<br>";
    } elseif (!preg_match("/^.{1,50}$/u", $_POST["nombre"])) { # Error de caracteres mínimos/máximos
        $errores[] = "El nombre debe contener un máximo de 50 caracteres.";
    } elseif (!preg_match("/^\pL+(?>[ ']\pL+)*$/u", $_POST["nombre"])) { # Error de caracteres no permitidos
        $errores[] = "El nombre contiene caracteres no permitidos.";
    } else { # Success!!
        $usuario["cuenta"]["nombre"] = strtolower($_POST["nombre"]);
    }

    # chequeando el campo de apellido
    if (empty($_POST["apellido"])) { # Error de apellido vacío
        $errores[] = "Debes introducir tu apellido.<br>";
    } elseif (!preg_match("/^.{1,50}$/u", $_POST["apellido"])) { # Error de caracteres mínimos/máximos
        $errores[] = "El apellido debe contener un máximo de 50 caracteres.";
    } elseif (!preg_match("/^\pL+(?>[ ']\pL+)*$/u", $_POST["apellido"])) { # Error de caracteres no permitidos
        $errores[] = "El apellido contiene caracteres no permitidos.";
    } else { # Success!!
        $usuario["cuenta"]["apellido"] = strtolower($_POST["apellido"]);
    }

    # Checkeando el campo de email
    if (empty($_POST["email"])) { # Error de email vacío
        $errores[] = "Debes introducir un email.<br>";
    } elseif (!empty($_POST["email"])) {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) { # Error de email incorrecto
            $errores[] = "El email es incorrecto.";
        } elseif (in_array($_POST["email"], array_column(array_column($db, 'cuenta'), 'email'))) { # Error de email ya registrado
            $errores[] = "Ese email ya ha sido registrado.<br>";
        } else { # Success!!
            $usuario["cuenta"]["email"] = strtolower($_POST["email"]);
        }
    }

    # Checkeando el campo de contraseña
    if (empty($_POST["password"])) { # Error de contraseña vacía
        $errores[] = "Por favor ingresa una contraseña!";
    } elseif (!empty($_POST["password"])) {
        if (strlen($_POST["password"]) <= 8) { # Error de caracteres mínimos
            $errores[] = "Tu contraseña debe contar con al menos 8 caracteres!";
        } elseif ($_POST["password"] >= 64) { # Error de caracteres máximos
            $errores[] = "Tu contraseña no debe contener más de 64 caracteres!";
        } elseif (!preg_match("#[0-9]+#", $_POST["password"])) { # Error cuando no hay números
            $errores[] = "Tu contraseña debe contar con al menos un número!";
        } elseif (!preg_match("#[A-Z]+#", $_POST["password"])) { # Error cuando no hay mayúsculas
            $errores[] = "Tu contraseña debe contar con al menos una letra en mayúsculas!";
        } elseif (!preg_match("#[a-z]+#", $_POST["password"])) { # Error cuando no hay minúsculas
            $errores[] = "Tu contraseña debe contar con al menos una letra en minúsculas!";
        } elseif ($_POST["password"] != $_POST["cpassword"]) { # Error cuando las contraseñas no coinciden
            $errores[] = "Las contraseñas no coinciden!";
        } else { # Success!!
            $usuario["cuenta"]["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
        }
    }

    # Términos y condiciones
    if (empty($_POST["tos"])) {
        $errores[] = "Debes aceptar los términos y condiciones del sitio!";
    }
    # Mayor de edad?
    if (empty($_POST["mayor"])) {
        $errores[] = "Debes aceptar que sos mayor de edad!";
    }

    ############### OPCIONAL ###############
    ######### Avatar #########
    if ($_FILES['avatar']['size'] != 0) { # Comprobando si se subió el archivo
        $type = exif_imagetype($_FILES['avatar']['tmp_name']); # Tipo de imagen
        if ($_FILES["avatar"]["error"] != 0) { # Error de subida
            $errores[] = "Hubo un error en la carga del avatar!";
        } elseif ($_FILES['avatar']['size'] >= 5242881) { # Error de tamaño máximo
            $errores[] = "La imagen no puede ser mayor a 5mb!";
        } elseif ($type == false) { # Comprobando si es una imagen
            $errores[] = "El archivo subido no es una imagen!";
        } elseif (in_array(image_type_to_extension($type), ['.jpeg', '.jpg', '.png'])) { # Se convierte el tipo de imagen a extensión y se comprueba si es correcta
            $ext = image_type_to_extension($type);
            $imagename = "avatar_" . $usuario["id"] . $ext; # Nombre de la imagen
            $usuario["avatar"] = "$imagename"; # Guardando nombre de la imagen en array
            move_uploaded_file($_FILES["avatar"]["tmp_name"], "db/avatars/$imagename"); # Guardando imagen
        } else { # Error si la imagen no es el formato correcto
            $errores[] = "La imagen tiene que ser jpg, jpeg o png!";
        }
    }

    ######### Datos #########
    # Número de teléfono
    if (!empty($_POST["nro-tel"])) { # Se comprueba sólo si se ingresa un número
        if (empty($_POST["tipo-tel"])) { # Error si el checkbox de "tipo-tel" está vacío
            $errores[] = "Debes ingresar el tipo de teléfono!";
        } elseif (!preg_match('/^(?:(?:00)?549?)?0?(?:11|[2368]\d)(?:(?=\d{0,2}15)\d{2})??\d{8}$/D', $_POST["nro-tel"])) { # Fuente de este regex: https://es.stackoverflow.com/a/136406
            $errores[] = "El número de teléfono no es válido!"; # Error si el regex no da match
        } else { # Success!
            $usuario["datos"]["nro-tel"] = $_POST["nro-tel"];
            $usuario["datos"]["tipo-tel"] = $_POST["tipo-tel"];
        }
    }

    # Documento
    if (!empty($_POST["nro-doc"])) { # Se comprueba sólo si se ingresa un documento
        if (empty($_POST["tipo-doc"])) { # Error si el checkbox de "tipo-doc" está vacío
            $errores[] = "Debes ingresar el tipo de documento!";
        } elseif (in_array($_POST["nro-doc"], array_column(array_column($db, 'datos'), 'nro-doc'))) { # Error documento ya registrado
            $errores[] = "Ese documento ya ha sido registrado.<br>";
        } elseif (!preg_match('/^[0-9]{7,8}$/', $_POST["nro-doc"])) { # Error si el regex no da match
            $errores[] = "El número de documento no es válido!";
        } else { # Success!
            $usuario["datos"]["nro-doc"] = $_POST["nro-doc"];
            $usuario["datos"]["tipo-doc"] = $_POST["tipo-doc"];
        }
    }

    ######### Direcciones #########
    # Provincia
    if (!empty($_POST["provincia"])) {
        $usuario["direcciones"]["provincia"] = $_POST["provincia"]; # Success!
    }

    # Ciudad
    if (!empty($_POST["ciudad"])) { # Se comprueba sólo si se ingresa una ciudad
        if (empty($_POST["provincia"])) { # Error si el checkbox "provincia" está vacío
            $errores[] = "Debes ingresar la provincia!";
        } elseif (!preg_match("/^.{2,90}$/u", $_POST["ciudad"])) { # Error de caracteres mínimos/máximos
            $errores[] = "La ciudad debe contener un máximo de 90!";
        } elseif (!preg_match("/^\pL+(?>[ ']\pL+)*$/u", $_POST["ciudad"])) { # Error de caracteres no permitidos
            $errores[] = "La ciudad contiene caracteres no permitidos!";
        } else { # Success!
            $usuario["direcciones"]["ciudad"] = strtolower($_POST["ciudad"]);
        }
    }

    # Código postal
    if (!empty($_POST["cpostal"])) { # Se comprueba sólo si se ingresa un código postal
        if (empty($_POST["provincia"])) { # Error si el checkbox "provincia" está vacío
            $errores[] = "Debes ingresar la provincia!";
        } elseif (!preg_match('/^[0-9]{4}$/', $_POST["cpostal"])) { # Error si el regex no da match
            $errores[] = "El código postal no es válido!";
        } else { # Success!
            $usuario["direcciones"]["cpostal"] = $_POST["cpostal"];
        }
    }

    # Calle
    if (!empty($_POST["calle"])) { # Se comprueba sólo si se ingresa una calle
        if (empty($_POST["ciudad"])) { # Error si no se rellena ciudad
            $errores[] = "Debes ingresar la ciudad!";
        } elseif (!(isset($_POST["nro-calle"]) && $_POST["nro-calle"] != "")) { # Error si no se rellena el número de calle
            $errores[] = "Debes ingresar el número de calle!";
        } elseif (!preg_match("/^.{1,90}$/u", $_POST["calle"])) { # Error de caracteres mínimos/máximos
            $errores[] = "La calle debe contener un máximo de 90 caracteres!";
        } elseif (!preg_match("/^\pL+(?>[ ']\pL+)*$/u", $_POST["calle"])) { # Error de caracteres no permitidos
            $errores[] = "La calle contiene caracteres no permitidos!";
        } else { # Success!
            $usuario["direcciones"]["calle"] = strtolower($_POST["calle"]);
        }
    }

    # Número de calle
    if (isset($_POST["nro-calle"]) && $_POST["nro-calle"] != "") { # Se comprueba sólo si se ingresa un número de calle
        if (empty($_POST["calle"])) { # Error si no se rellena calle
            $errores[] = "Debes ingresar la calle!";
        } elseif (!preg_match('/^[0-9]{1,6}[Bb]?$/', $_POST["nro-calle"])) { # Error si el regex no da match
            $errores[] = "El número de la calle no es válido!";
        } else { # Success!
            $usuario["direcciones"]["nro-calle"] = strtolower($_POST["nro-calle"]);
        }
    }

    # Piso
    if (isset($_POST["nro-piso"]) && $_POST["nro-piso"] != "") { # Se comprueba sólo si se ingresa el número de piso
        if (empty($_POST["calle"])) { # Error si no se rellena calle
            $errores[] = "Debes ingresar la calle!";
        } elseif (!(isset($_POST["depto"]) && $_POST["depto"] != "")) { # Error si no se rellena el departamento
            $errores[] = "Debes ingresar el departamento!";
        } elseif (!preg_match('/^[0-9]{1,3}$/', $_POST["nro-piso"])) { # Error si el regex no da match
            $errores[] = "El número del piso no es válido!";
        } else { # Success!
            $usuario["direcciones"]["nro-piso"] = $_POST["nro-piso"];
        }
    }

    # Departamento
    if (isset($_POST["depto"]) && $_POST["depto"] != "") { # Se comprueba sólo si se ingresa un departamento
        if (!(isset($_POST["nro-piso"]) && $_POST["nro-piso"] != "")) { # Error si no se rellena el número de piso
            $errores[] = "Debes ingresar el piso!";
        } elseif (!preg_match('/^[a-zA-Z0-9]{1,4}$/', $_POST["depto"])) { # Error si el regex no da match
            $errores[] = "El departamento no es válido!";
        } else { # Success!
            $usuario["direcciones"]["depto"] = strtolower($_POST["depto"]);
        }
    }


    ############### ESCRITURA DE ARCHIVOS ###############
    if (count($errores) == 0) {
        $db[] = $usuario; # Añadiendo usuario al array de usuarios
        $_SESSION["usuario"] = $usuario; # Añadiendo usuario a session
        $dbencoded = json_encode($db); # Transformando array de usuarios en json
        file_put_contents("db/usuarios.json", $dbencoded); # Escribiendo archivo json
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
                        <form action="register.php" method="POST" enctype="multipart/form-data">
                            <div class=" shadow m-1 mb-3 p-4 bg-transblack">
                                <!-- Errores php -->
                                <?php
                                if ($_POST) : ?>
                                    <ul id="regerror" class="text-white list-unstyled font-weight-bold">
                                        <?php if (count($errores) > 0) :
                                                foreach (array_unique($errores) as $error) : ?>
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
                                                <input type="text" name="nombre" id="nombre" value="<?= empty($_POST["nombre"]) ? "" : $_POST["nombre"] ?>" class="bg-light border-white py-1 px-3 mb-2 form-control shadow" placeholder="Nombre..." autofocus>
                                            </div>
                                            <div class="w-100 ml-md-3">
                                                <label for="apellido" class="mb-2">Apellido</label>
                                                <input type="text" name="apellido" id="apellido" value="<?= empty($_POST["apellido"]) ? "" : $_POST["apellido"] ?>" class=" bg-light border-white py-1 px-3 mb-2 form-control shadow" placeholder="Apellido..">
                                            </div>
                                        </div>
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap">
                                            <div class="w-100 mr-md-3">
                                                <label for="email" class="mb-2">E-mail</label>
                                                <input type="email" name="email" id="email" value="<?= empty($_POST["email"]) ? "" : $_POST["email"] ?>" class=" bg-light border-white py-1 px-3 mb-2 form-control shadow" placeholder="email@example.com">
                                            </div>
                                            <div class="w-100 ml-md-3 d-md-flex">
                                                <div class="mr-md-2 w-100">
                                                    <label for="password" class="mb-2">Contraseña</label>
                                                    <input type="password" name="password" id="password" class="w-100 bg-light border-white py-1 px-3 mb-2 form-control shadow" placeholder="Contraseña...">
                                                </div>
                                                <div class="ml-md-2 w-100">
                                                    <label for="cpassword" class="mb-2 d-flex flex-nowrap">Confirmar</label>
                                                    <input type="password" name="cpassword" id="cpassword" class="w-100 bg-light border-white py-1 px-3 mb-2 form-control shadow" placeholder="Confirmar...">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-checkbox mt-3">
                                            <input type="checkbox" class="custom-control-input" name="mayor" id="mayor" value="si" <?php if (isset($_POST['mayor'])) echo "checked"; ?>>
                                            <label class="custom-control-label" for="mayor">Soy mayor de 18 años.</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--formulario OPCIONAL -->
                            <div class="shadow m-1 mb-3 p-4 bg-transblack ">
                                <div class="d-flex flex-column flex-md-row mb-4">
                                    <div class="mr-auto mx-0 d-none d-md-flex invisible">
                                        <label for="avatar" class="text-white align-middle">subir avatar <i class="fas fa-caret-square-up text-white align-middle"></i></label>
                                    </div>
                                    <h2 class="text-center mx-auto">Opcional</h2>
                                    <div class="d-flex mx-auto ml-md-auto mx-md-0">
                                        <label class="text-white align-middle flex-nowrap" for="avatar" style="cursor:pointer;">subir avatar <i class="fas fa-caret-square-up text-white align-middle fa-2x"></i></label>
                                        <input style="opacity:0; position:absolute; z-index:-1;" name="avatar" id="avatar" class="invisible d-flex" type="file">
                                    </div>

                                </div>


                                <div class="container bg-transparent border-bottom border-dark mb-3 pb-3">
                                    <div class="bg-transparent d-flex flex-column">
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap">
                                            <div class="w-100 mr-md-3">
                                                <label class="mb-2 mr-md-3" for="nro-tel">Teléfono</label>
                                                <input type="text" name="nro-tel" id="nro-tel" value="<?= empty($_POST["nro-tel"]) ? "" : $_POST["nro-tel"] ?>" class="bg-light border-white py-1 px-3 mb-2 form-control shadow" placeholder="Número...">
                                            </div>
                                            <div class="d-flex flex-wrap justify-content-around d-md-block text-md-left ml-md-3 w-100 align-self-end">
                                                <div class="custom-control custom-radio mt-1 mt-md-0 mb-md-1">
                                                    <input type="radio" id="tipo-celular" name="tipo-tel" value="cel" class="custom-control-input" <?php if (isset($_POST['tipo-tel']) && $_POST['tipo-tel'] == "cel") echo "checked"; ?>>
                                                    <label class="custom-control-label" for="tipo-celular">Celular</label>
                                                </div>
                                                <div class="custom-control custom-radio mt-1 mt-md-0">
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
                                                    <option disabled selected value class="d-none"> Documento </option>
                                                    <!-- Dropdown de documentos -->
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
                                                        <option disabled selected value class="d-none"> Provincia </option>
                                                        <!-- Dropdown de provincias -->
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
                                                    <input type="text" name="cpostal" id="cpostal" value="<?= empty($_POST["cpostal"]) ? "" : $_POST["cpostal"] ?>" class="w-100 bg-light border-white py-1 px-3 mb-2 form-control shadow" placeholder="Código...">
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
                                                    <input type="text" name="nro-piso" id="nro-piso" value="<?= isset($_POST["nro-piso"]) && $_POST["nro-piso"] != "" ? $_POST["nro-piso"] : "" ?>" class="bg-light border-white py-1 px-3 mb-2 form-control shadow" placeholder="Número...">
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
                                        <input type="checkbox" class="custom-control-input" name="tos" id="tos" value="aceptado" <?php if (isset($_POST['tos'])) echo "checked"; ?>>
                                        <label for="tos" class="custom-control-label">Acepto los <a href="tos.php">terminos y condiciones</a> del sitio.</label>
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

    <!-- Script de validación por js de bootstrap -->
    <script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.0/dist/bootstrap-validate.js"></script>
    <?php include 'script.php'; ?>

</body>

</html>