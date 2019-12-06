<?php
session_start();
date_default_timezone_set('America/Argentina/Buenos_Aires');

if (isset($_SESSION["usuario"])) { # Redirección de usuario logueado
    header('Location: index.php');
}

############################## PERSISTENCIA ##############################
$nombre = empty($_POST["nombre"]) ? "" : $_POST["nombre"];
$apellido = empty($_POST["apellido"]) ? "" : $_POST["apellido"];
$email = empty($_POST["email"]) ? "" : $_POST["email"];
$nac_d = empty($_POST["nac_d"]) ? "" : $_POST["nac_d"];
$nac_m = empty($_POST["nac_m"]) ? "" : $_POST["nac_m"];
$nac_a = empty($_POST["nac_a"]) ? "" : $_POST["nac_a"];
$nro_tel = empty($_POST["nro_tel"]) ? "" : $_POST["nro_tel"];
$tipo_cel = isset($_POST["tipo_tel"]) && $_POST["tipo_tel"] == "cel" ? "checked" : "";
$tipo_fijo = isset($_POST["tipo_tel"]) && $_POST["tipo_tel"] == "fijo" ? "checked" : "";
$nro_doc = empty($_POST["nro_doc"]) ? "" : $_POST["nro_doc"];
$tipo_doc = isset($_POST["tipo_doc"]) ? $_POST["tipo_doc"] : "";
$ciudad = empty($_POST["ciudad"]) ? "" : $_POST["ciudad"];
$provincia = isset($_POST["provincia"]) ? $_POST["provincia"] : "";
$cpostal = empty($_POST["cpostal"]) ? "" : $_POST["cpostal"];
$calle = empty($_POST["calle"]) ? "" : $_POST["calle"];
$nro_calle = isset($_POST["nro_calle"]) && $_POST["nro_calle"] != "" ? $_POST["nro_calle"] : "";
$nro_piso = isset($_POST["nro_piso"]) && $_POST["nro_piso"] != "" ? $_POST["nro_piso"] : "";
$depto = isset($_POST["depto"]) && $_POST["depto"] != "" ? $_POST["depto"] : "";
$tos = isset($_POST['tos']) ? "checked" : "";

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

############################## Funciones ##############################

function edad($dia, $mes, $anio) #Calcular edad
{
    $nac = new DateTime($dia . $mes . $anio);
    $hoy = new DateTime('00:00:00');
    $dif = date_diff($nac, $hoy);
    return $dif->format('%r%y');
}

function usuariosdb() # Obtener base de datos de usuario
{
    $dbget = file_get_contents("db/usuarios.json");
    return json_decode($dbget, true);
}

function emailsRegistrados($db) # Obtener listado de mails
{
    return array_column(array_column($db, 'cuenta'), 'email');
}

############################## VALIDACIÓN ##############################

if ($_POST) {

    /* Estructura del array de usuario
        $usuario = [
            "id" => "",
            "cuenta" => [
                "nombre" => "", REQUERIDO
                "apellido" => "", REQUERIDO
                "email" => "", REQUERIDO
                "nac" => "dd/mm/aaaa", REQUERIDO
                "password" => "" REQUERIDO
            ],
            "avatar" = "db/avatars/avatar_ID.png-jpg-jpeg", [ OPCIONAL - SE LLENA CON LA UBICACIÓN DE LA IMAGEN
            "datos" => [ SE GENERA SI RELLENAN DATOS EN LA SECCIÓN OPCIONAL
            "tel" => [
                "nro_tel" => "", OPCIONAL
                "tipo_tel" => "" REQUERIDO si se rellena "nro_tel"
            ],
            "doc" => [
                "nro_doc" => "", OPCIONAL
                "tipo_doc" => "" REQUERIDO si se rellena "nro_doc" (EL VALOR POR DEFECTO SIEMPRE SERÁ "DNI" CUANDO SE RELLENA "nro_doc")
                ]
            ],
            "direcciones" => [ SE GENERA SI RELLENAN DATOS EN LA SECCIÓN DE DIRECCIONES
            0 => [
                "ciudad" => "", OPCIONAL - REQUERIDO si se rellenan "cpostal", "calle", "nro_calle", "nro_piso" y "depto"
                "provincia" => "", OPCIONAL - REQUERIDO si se rellenan "ciudad", "cpostal", "calle", "nro_calle", "nro_piso" y "depto"
                "cpostal" => "", OPCIONAL - REQUERIDO si se rellena "calle", "cpostal", "nro_calle", "nro_piso" y "depto"
                "calle" => "", OPCIONAL - REQUERIDO si se rellenan "nro_calle", "nro_piso" y "depto"
                "nro_calle" => "", OPCIONAL - REQUERIDO si se rellena "calle", "nro_piso" y "depto"
                "nro_piso" => "", OPCIONAL - REQUERIDO si se rellena "depto"
                "depto" => "" OPCIONAL - REQUERIDO si se rellena "nro_piso"
                ]
                ]
            ];
            */

    # Iniciando arrays y variables
    $errores = 0;
    $usuario = ["id" => 0];
    $db = usuariosdb();
    $usuario["id"] = end($db)["id"] + 1; # Creando ID

    ############### OBLIGATORIO ###############
    # Checkeando el campo de nombre
    if (empty($nombre)) { # Error de nombre vacío
        $errores++;
        $errornombre = "Por favor ingresa tu nombre!";
    } elseif (!preg_match("/^.{1,50}$/u", $nombre)) { # Error de caracteres mínimos/máximos
        $errores++;
        $errornombre = "No debe contener más 50 caracteres!";
    } elseif (!preg_match("/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸ' ]*$/", $nombre)) { # Error de caracteres no permitidos
        $errores++;
        $errornombre = "Contiene caracteres no permitidos!";
    } else { # Success!!
        $usuario["cuenta"]["nombre"] = trim(preg_replace("/ {2,}/", " ", strtolower($nombre))); # Paso todo a minúsculas, reemplazo múltiples espacios por uno solo y trimeo los extremos
    }

    # chequeando el campo de apellido
    if (empty($apellido)) { # Error de apellido vacío
        $errores++;
        $errorapellido = "Por favor ingresa tu apellido!";
    } elseif (!preg_match("/^.{1,50}$/u", $apellido)) { # Error de caracteres mínimos/máximos
        $errores++;
        $errorapellido = "No debe contener más de 50 caracteres!";
    } elseif (!preg_match("/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸ' ]*$/", $apellido)) { # Error de caracteres no permitidos
        $errores++;
        $errorapellido = "Contiene caracteres no permitidos!";
    } else { # Success!!
        $usuario["cuenta"]["apellido"] = trim(preg_replace("/ {2,}/", " ", strtolower($apellido))); # Paso todo a minúsculas, reemplazo múltiples espacios por uno solo y trimeo los extremos
    }

    # Checkeando el campo de email
    if (empty($email)) { # Error de email vacío
        $errores++;
        $erroremail = "Por favor ingresa tu email!";
    } elseif (!empty($email)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { # Error de email incorrecto
            $errores++;
            $erroremail = "El email es incorrecto!";
        } elseif (in_array($email, emailsRegistrados($db))) { # Error de email ya registrado
            $errores++;
            $erroremail = "Ese email ya ha sido registrado!";
        } else { # Success!!
            $usuario["cuenta"]["email"] = trim(strtolower($email)); #Paso email a minúsculas y trimeo
        }
    }

    # Checkeando el campo de fecha de nacimiento + calculando edad
    if (empty($nac_d)) {
        $errornacd = "Por favor ingresa tu fecha de nacimiento!";
        $errornac = "Por favor ingresa tu fecha de nacimiento!";
    } elseif (!preg_match("/^(0[1-9]|[12][0-9]|3[01])$/", $nac_d)) { # Error de formato incorrecto = días 
        $errores++;
        $errornacd = "El formato es incorrecto!";
        $errornac = "El formato es incorrecto!";
    }
    if (empty($nac_m)) {
        $errornacm = "Por favor ingresa tu fecha de nacimiento!";
        $errornac = "El formato es incorrecto!";
    } elseif (!preg_match("/^(0[1-9]|1[0-2])$/", $nac_m)) { # Error de formato incorrecto = meses
        $errores++;
        $errornacm = "El formato es incorrecto!";
        $errornac = "El formato es incorrecto!";
    }
    if (empty($nac_a)) {
        $errornaca = "Por favor ingresa tu fecha de nacimiento!";
        $errornac = "Por favor ingresa tu fecha de nacimiento!";
    } elseif (!preg_match("/^(19[3-9]\d|20[0-4]\d|2050)$/", $nac_a)) { # Error de formato incorrecto = años
        $errores++;
        $errornaca = "El formato es incorrecto!";
        $errornac = "El formato es incorrecto!";
    }

    if (empty($errornacd) && empty($errornacm) && empty($errornaca)) {
        if (!checkdate($nac_m, $nac_d, $nac_a)) { # Error si la fecha existe en el calendario
            $errores++;
            $errornac = "La fecha de nacimiento no existe!";
        } elseif (intval(edad($nac_a, $nac_m, $nac_d)) < 0) { # Error si el usuario viene del futuro
            $errores++;
            $errornac = "Tenemos a un viajero del tiempo!";
        } elseif (intval(edad($nac_a, $nac_m, $nac_d)) < 18) { # Error si el usuario no es mayor de edad
            $errores++;
            $errornac = "No sos mayor de edad!";
        } else { # Success!
            $usuario["cuenta"]["nac"] = $nac_d . "-" . $nac_m . "-" . $nac_a;
        }
    }


    # Checkeando el campo de contraseña
    if (empty($_POST["password"])) { # Error de contraseña vacía
        $errores++;
        $errorpass = "Por favor ingresa una contraseña!";
    } elseif (!empty($_POST["password"])) {
        if (strlen($_POST["password"]) <= 8) { # Error de caracteres mínimos
            $errores++;
            $errorpass = "Debe contener 8 o más caracteres!";
        } elseif ($_POST["password"] >= 64) { # Error de caracteres máximos
            $errores++;
            $errorpass = "No debe contener más de 64 caracteres!";
        } elseif (!preg_match("#[0-9]+#", $_POST["password"])) { # Error cuando no hay números
            $errores++;
            $errorpass = "Debe contener 1 o más números!";
        } elseif (!preg_match("#[A-Z]+#", $_POST["password"])) { # Error cuando no hay mayúsculas
            $errores++;
            $errorpass = "Debe contener una o más letras mayúsculas!";
        } elseif (!preg_match("#[a-z]+#", $_POST["password"])) { # Error cuando no hay minúsculas
            $errores++;
            $errorpass = "Debe contener una o más letras minúsculas!";
        } elseif ($_POST["password"] != $_POST["cpassword"]) { # Error cuando las contraseñas no coinciden
            $errores++;
            $errorcpass = "Las contraseñas no coinciden";
        } else { # Success!!
            $usuario["cuenta"]["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
        }
    }

    # Términos y condiciones
    if (empty($_POST["tos"])) {
        $errores++;
        $errortos = "Debes aceptar los términos y condiciones!";
    }

    ############### OPCIONAL ###############
    ######### Avatar #########
    if ($_FILES['avatar']['size'] != 0) { # Comprobando si se subió el archivo
        $type = exif_imagetype($_FILES['avatar']['tmp_name']); # Tipo de imagen
        if ($_FILES["avatar"]["error"] != 0) { # Error de subida
            $errores++;
            $erroravatar = "Hubo un de carga!";
        } elseif ($_FILES['avatar']['size'] >= 5242881) { # Error de tamaño máximo (5mb)
            $errores++;
            $erroravatar = "Debe ser menor a 5mb!";
        } elseif ($type == false) { # Comprobando si es una imagen
            $errores++;
            $erroravatar = "No es una imagen!";
        } elseif (in_array(image_type_to_extension($type), ['.jpeg', '.jpg', '.png'])) { # Se convierte el tipo de imagen a extensión y se comprueba si es correcta
            $ext = image_type_to_extension($type);
            $imagename = "avatar_" . $usuario["id"] . $ext; # Nombre de la imagen
            $usuario["avatar"] = "$imagename"; # Guardando nombre de la imagen en array
            move_uploaded_file($_FILES["avatar"]["tmp_name"], "db/avatars/$imagename"); # Guardando imagen
        } else { # Error si la imagen no es el formato correcto
            $errores++;
            $erroravatar = "Debe ser jpg, jpeg o png!";
        }
    }

    ######### Datos #########
    # Número de teléfono
    if (!empty($nro_tel)) { # Se comprueba sólo si se ingresa un número
        if (empty($_POST["tipo_tel"])) { # Error si el checkbox de "tipo_tel" está vacío
            $errores++;
            $errortipotel = "Ingresa el tipo de teléfono!";
            $errortel = "Ingresa el tipo de teléfono!";
        } elseif (!preg_match('/^(?:(?:00)?549?)?0?(?:11|[2368]\d)(?:(?=\d{0,2}15)\d{2})??\d{8}$/D', $nro_tel)) { # Fuente de este regex: https://es.stackoverflow.com/a/136406
            $errores++;
            $errortel = "El número no es válido!"; # Error si el regex no da match
        } else { # Success!
            $usuario["datos"]["nro_tel"] = $nro_tel;
            $usuario["datos"]["tipo_tel"] = $_POST["tipo_tel"];
        }
    }

    # Documento
    if (!empty($nro_doc)) { # Se comprueba sólo si se ingresa un documento
        if (empty($tipo_doc)) { # Error si el checkbox de "tipo_doc" está vacío
            $errores++;
            $errortipodoc = "Ingresa el tipo de documento!";
            $errordoc = "Ingresa el tipo de documento!";
        } elseif (in_array($nro_doc, array_column(array_column($db, 'datos'), 'nro_doc'))) { # Error documento ya registrado
            $errores++;
            $errordoc = "Ya ha sido registrado!";
        } elseif (!preg_match('/^[0-9]{7,8}$/', $nro_doc)) { # Error si el regex no da match
            $errores++;
            $errordoc = "El documento no es válido!";
        } else { # Success!
            $usuario["datos"]["nro_doc"] = $nro_doc;
            $usuario["datos"]["tipo_doc"] = $tipo_doc;
        }
    }

    ######### Direcciones #########
    # Ciudad
    if (!empty($ciudad)) { # Se comprueba sólo si se ingresa una ciudad
        if (empty($provincia)) { # Error si el checkbox "provincia" está vacío
            $errores++;
            $errorprovincia = "Requerido!";
        } elseif (strlen($ciudad) > 90) { # Error de caracteres mínimos/máximos
            $errores++;
            $errorciudad = "No debe contener más de 90 caracteres!";
        } elseif (!preg_match("/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸ' ]*$/", $ciudad)) { # Error de caracteres no permitidos
            $errores++;
            $errorciudad = "Contiene caracteres no permitidos!";
        } else { # Success!
            $usuario["direcciones"]["ciudad"] = strtolower($ciudad);
        }
    }

    # Provincia
    if (!empty($provincia)) {
        $usuario["direcciones"]["provincia"] = $provincia; # Success!
    }

    # Código postal
    if (!empty($cpostal)) { # Se comprueba sólo si se ingresa un código postal
        if (empty($provincia)) { # Error si el checkbox "provincia" está vacío
            $errores++;
            $errorprovincia = "Requerido!";
        } elseif (!preg_match('/^[0-9]{4}$/', $cpostal)) { # Error si el regex no da match
            $errores++;
            $errorcpostal = "No es válido!";
        } else { # Success!
            $usuario["direcciones"]["cpostal"] = $cpostal;
        }
    }

    # Calle
    if (!empty($calle)) { # Se comprueba sólo si se ingresa una calle
        if (empty($ciudad)) { # Error si no se rellena ciudad
            $errores++;
            $errorciudad = "Debes ingresar la ciudad!";
        } elseif (empty($nro_calle)) { # Error si no se rellena el número de calle
            $errores++;
            $errornrocalle = "Debes ingresar el número!";
        } elseif (strlen($calle) > 90) { # Error de caracteres mínimos/máximos
            $errores++;
            $errorcalle = "No debe contener más de 90 caracteres!";
        } elseif (!preg_match("/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸ' ]*$/", $calle)) { # Error de caracteres no permitidos
            $errores++;
            $errorcalle = "La calle contiene caracteres no permitidos!";
        } else { # Success!
            $usuario["direcciones"]["calle"] = strtolower($calle);
        }
    }

    # Número de calle
    if (!empty($nro_calle)) { # Se comprueba sólo si se ingresa un número de calle
        if (empty($calle)) { # Error si no se rellena calle
            $errores++;
            $errorcalle = "Debes ingresar la calle!";
        } elseif (!preg_match('/^[0-9]{1,6}[Bb]?$/', $nro_calle)) { # Error si el regex no da match
            $errores++;
            $errornrocalle = "El número no es válido!";
        } else { # Success!
            $usuario["direcciones"]["nro_calle"] = strtolower($nro_calle);
        }
    }

    # Piso
    if (!empty($nro_piso)) { # Se comprueba sólo si se ingresa el número de piso
        if (empty($calle)) { # Error si no se rellena calle
            $errores++;
            $errorcalle = "Debes ingresar la calle!";
        } elseif (empty($depto)) { # Error si no se rellena el departamento
            $errores++;
            $errordepto = "Debes ingresar el departamento!";
        } elseif (!preg_match('/^[0-9]{1,3}$/', $nro_piso)) { # Error si el regex no da match
            $errores++;
            $errorpiso = "El número del piso no es válido!";
        } else { # Success!
            $usuario["direcciones"]["nro_piso"] = $nro_piso;
        }
    }

    # Departamento
    if (!empty($depto)) { # Se comprueba sólo si se ingresa un departamento
        if (empty($nro_piso)) { # Error si no se rellena el número de piso
            $errores++;
            $errorpiso = "Debes ingresar el piso!";
        } elseif (!preg_match('/^[a-zA-Z0-9]{1,16}$/', $depto)) { # Error si el regex no da match
            $errores++;
            $errordepto = "El departamento no es válido!";
        } else { # Success!
            $usuario["direcciones"]["depto"] = strtolower($depto);
        }
    }


    ############### ESCRITURA DE ARCHIVOS ###############
    if ($errores == 0) {
        array_push($db, $usuario); # Añadiendo usuario al array de usuarios
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
                <section class="ml-3 mr-3">
                    <div class="container bg-transparent">
                        <form id="reg_form" action="register.php" method="POST" enctype="multipart/form-data">
                            <div class="shadow m-1 mb-3 p-4 bg-transblack">
                                <h2 class="text-center mb-5">Obligatorio</h2>
                                <div class="bg-transparent container">
                                    <div class="bg-transparent d-flex flex-column">
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap mb-2">
                                            <div class="w-100 mr-md-3 form-group mb-4 mb-md-3">
                                                <label for="nombreid" class="mb-2">Nombre</label>
                                                <input type="text" name="nombre" id="nombreid" value="<?= $nombre ?>" class="py-1 px-3 form-control shadow <?= empty($errornombre) ? '' : 'is-invalid' ?>" placeholder="Nombre..." autofocus>
                                                <div class="invalid-feedback position-absolute">
                                                    <?= empty($errornombre) ? "" : $errornombre; ?>
                                                </div>
                                            </div>
                                            <div class="w-100 ml-md-3 form-group mb-4 mb-md-3">
                                                <label for="apellido" class="mb-2">Apellido</label>
                                                <input type="text" name="apellido" id="apellido" value="<?= $apellido ?>" class=" py-1 px-3 form-control shadow <?= empty($errorapellido) ? '' : 'is-invalid' ?>" placeholder="Apellido..">
                                                <div class="invalid-feedback position-absolute">
                                                    <?= empty($errorapellido) ? "" : $errorapellido; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap mb-2">
                                            <div class="w-100 mr-md-3 form-group mb-4 mb-md-3">
                                                <label for="email" class="mb-2">E-mail</label>
                                                <input type="text" name="email" id="email" value="<?= $email ?>" class=" py-1 px-3 form-control shadow <?= empty($erroremail) ? '' : 'is-invalid' ?>" placeholder="email@example.com">
                                                <div class="invalid-feedback position-absolute">
                                                    <?= empty($erroremail) ? "" : $erroremail; ?>
                                                </div>
                                            </div>
                                            <div class="w-100 ml-md-3 form-group mb-4 mb-md-3" id="errornac">
                                                <label for="nac" class="mb-2">Fecha de nacimiento</label>
                                                <div class="w-100 d-flex">
                                                    <input type="text" name="nac_d" id="nac_d" value="<?= $nac_d ?>" class="py-1 px-3 form-control shadow text-center <?= empty($errornacd) ? '' : 'is-invalid' ?>" placeholder="dd">
                                                    <input type="text" name="nac_m" id="nac_m" value="<?= $nac_m ?>" class="py-1 px-3 mx-3 form-control shadow text-center <?= empty($errornacm) ? '' : 'is-invalid' ?>" placeholder="mm">
                                                    <input type="text" name="nac_a" id="nac_a" value="<?= $nac_a ?>" class=" py-1 px-3 form-control shadow text-center <?= empty($errornaca) ? '' : 'is-invalid' ?>" placeholder="aaaa">
                                                    <div class="d-block invalid-feedback position-absolute mt-4 pt-3">
                                                        <?= empty($errornac) ? "" : $errornac ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap mb-2">
                                            <div class="w-100 mr-md-3 form-group mb-4 mb-md-3">
                                                <label for="password" class="mb-2">Contraseña</label>
                                                <input type="password" name="password" id="password" class="w-100 py-1 px-3 form-control shadow <?= empty($errorpass) ? '' : 'is-invalid' ?> <?= empty($errorcpass) ? '' : 'is-invalid' ?>" placeholder="Contraseña...">
                                                <div class="invalid-feedback position-absolute">
                                                    <?= empty($errorpass) ? "" : $errorpass; ?>
                                                </div>
                                                <div class="invalid-feedback position-absolute">
                                                    <?= empty($errorcpass) ? "" : $errorcpass; ?>
                                                </div>
                                            </div>
                                            <div class="w-100 ml-md-3 form-group mb-4 mb-md-3">
                                                <label for="cpassword" class="mb-2 d-flex flex-nowrap">Confirmar contraseña</label>
                                                <input type="password" name="cpassword" id="cpassword" class="w-100 py-1 px-3 form-control shadow <?= empty($errorpass) ? '' : 'is-invalid' ?> <?= empty($errorcpass) ? '' : 'is-invalid' ?>" placeholder="Contraseña...">
                                                <div class="invalid-feedback position-absolute">
                                                    <?= empty($errorcpass) ? "" : $errorcpass; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <!--formulario OPCIONAL -->
                            <div class="shadow m-1 p-4 bg-transblack">
                                <div class="d-flex flex-column text-center">
                                    <h2>Opcional</h2>
                                    <div class="d-flex flex-column mt-4 pb-3 mx-auto text-center">
                                        <label class="fas fa-caret-square-up fa-2x mb-0 <?= empty($erroravatar) ? 'text-white' : 'text-danger' ?>" for="avatar" id="avatarijq" style="cursor:pointer;"></label>
                                        <label class="flex-nowrap mb-0 text-white" for="avatar" id="avatarjq" style="cursor:pointer;"><span>subir avatar</span></label>
                                        <input style="opacity:0; position:absolute; z-index:-1;" name="avatar" id="avatar" class="invisible d-flex" type="file">
                                        <label class="text-center text-danger"><?= empty($erroravatar) ? "" : $erroravatar; ?></label>
                                    </div>
                                    <h5>Contacto</h5>
                                </div>
                                <div class="container bg-transparent border-bottom border-dark mb-3 pb-3">
                                    <div class="bg-transparent d-flex flex-column">
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap mb-2" id="errortel">
                                            <div class="w-100 mr-md-3 form-group mb-4 mb-md-3">
                                                <label class="mb-2 mr-md-3" for="nro_tel">Teléfono</label>
                                                <input type="text" name="nro_tel" id="nro_tel" value="<?= $nro_tel ?>" class="py-1 px-3 form-control shadow <?= empty($errortel) ? '' : 'is-invalid' ?>" placeholder="Número...">
                                                <div class="invalid-feedback position-absolute">
                                                    <?= empty($errortel) ? "" : $errortel; ?>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap justify-content-around d-md-block text-md-left ml-md-3 w-100 align-self-end">
                                                <div class="custom-control custom-radio mt-1 mt-md-0 mb-md-1 form-group">
                                                    <input type="radio" name="tipo_tel" id="tipo-cel" value="cel" class="custom-control-input <?= empty($errortipotel) ? '' : 'is-invalid' ?>" <?= $tipo_cel ?>>
                                                    <label class="custom-control-label" id="radio1jq" for="tipo-cel">Celular</label>
                                                </div>
                                                <div class="custom-control custom-radio mt-1 mt-md-0 form-group mb-md-2">
                                                    <input type="radio" name="tipo_tel" id="tipo-fijo" value="fijo" class="custom-control-input <?= empty($errortipotel) ? '' : 'is-invalid' ?>" <?= $tipo_fijo ?>>
                                                    <label class="custom-control-label" id="radio2jq" for="tipo-fijo">Fijo</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container bg-transparent border-bottom border-dark mb-3 pb-3">
                                    <h5 class="text-center mx-auto mb-3">Documentación</h5>
                                    <div class="bg-transparent d-flex flex-column">
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap mb-2" id="errordoc">
                                            <div class="w-100 mr-md-3 form-group mb-4 mb-md-3">
                                                <label for="nro_doc" class="mb-2">Documento</label>
                                                <input type="text" name="nro_doc" id="nro_doc" value="<?= $nro_doc ?>" class="py-1 px-3 form-control shadow <?= empty($errordoc) ? '' : 'is-invalid' ?>" placeholder="Número...">
                                                <div class="invalid-feedback position-absolute">
                                                    <?= empty($errordoc) ? "" : $errordoc; ?>
                                                </div>
                                            </div>
                                            <div class="w-100 ml-md-3 form-group mb-4 mb-md-3">
                                                <label class="mb-2" for="tipo_doc">Tipo de documento</label>
                                                <select name="tipo_doc" id="tipo_doc" class="py-1 px-3 form-control shadow <?= empty($errortipodoc) ? '' : 'is-invalid' ?>">
                                                    <option disabled selected value class="d-none"> Documento </option>
                                                    <!-- Dropdown de documentos -->
                                                    <?php foreach ($dropdowns["documentos"] as $tipo => $documento) :
                                                        if (!empty($tipo_doc) && $tipo_doc == $codigo) : ?>
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
                                        </div>
                                    </div>
                                </div>

                                <div class="container bg-transparent">
                                    <h5 class="text-center mx-auto mb-3">Dirección</h5>
                                    <div class="bg-transparent d-flex flex-column">
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap mb-2">
                                            <div class="w-100 mr-md-3 form-group mb-4 mb-md-3">
                                                <label class="mb-2">Ciudad</label>
                                                <input type="text" name="ciudad" id="ciudad" value="<?= $ciudad ?>" class="py-1 px-3 form-control shadow <?= empty($errortipodoc) ? '' : 'is-invalid' ?>" placeholder="Ciudad...">
                                                <div class="invalid-feedback position-absolute">
                                                    <?= empty($errorciudad) ? "" : $errorciudad; ?>
                                                </div>
                                            </div>
                                            <div class="w-100 ml-md-3 d-md-flex">
                                                <div class="w-100 mr-md-2 form-group mb-4 mb-md-3">
                                                    <label class="mb-2" id="provincia" for="tipo_doc">Provincia</label>
                                                    <select name="provincia" id="provincia" class="w-100 py-1 px-3 form-control shadow <?= empty($errorprovincia) ? '' : 'is-invalid' ?>">
                                                        <option disabled selected value class="d-none"> Provincia </option>
                                                        <!-- Dropdown de provincias -->
                                                        <?php foreach ($dropdowns["provincias"] as $codigo => $nombreprov) :
                                                            if (!empty($provincia) && $provincia == $codigo) : ?>
                                                                <option value="<?= $codigo ?>" selected>
                                                                    <?= $nombreprov ?>
                                                                </option>
                                                            <?php else : ?>
                                                                <option value="<?= $codigo ?>">
                                                                    <?= $nombreprov ?>
                                                                </option>
                                                        <?php endif;
                                                        endforeach; ?>
                                                    </select>
                                                    <div class="invalid-feedback position-absolute">
                                                        <?= empty($errorprovincia) ? "" : $errorprovincia; ?>
                                                    </div>
                                                </div>
                                                <div class="w-100 ml-md-2 form-group mb-4 mb-md-3">
                                                    <label class="mb-2" id="Código postal" for="cpostal">Código postal</label>
                                                    <input type="text" name="cpostal" id="cpostal" value="<?= $cpostal ?>" class="w-100 py-1 px-3 form-control shadow <?= empty($errorcpostal) ? '' : 'is-invalid' ?>" placeholder="Código...">
                                                    <div class="invalid-feedback position-absolute">
                                                        <?= empty($errorcpostal) ? "" : $errorcpostal; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap form-group mb-2">
                                            <div id="errorcalle" class="w-100 mr-md-3 d-md-flex">
                                                <div class="w-100 mr-md-2 form-group mb-4 mb-md-3">
                                                    <label class="mb-2" id="calle" for="calle">Calle</label>
                                                    <input type="text" name="calle" id="calle" value="<?= $calle ?>" class="w-100 py-1 px-3 form-control shadow <?= empty($errorcalle) ? '' : 'is-invalid ' ?>" placeholder="Calle...">
                                                    <div class="invalid-feedback position-absolute">
                                                        <?= empty($errorcalle) ? "" : $errorcalle; ?>
                                                    </div>
                                                    <div class="d-none d-md-block invalid-feedback position-absolute <?= empty($errorcalle) ? '' : 'mt-4' ?>">
                                                        <?= empty($errornrocalle) ? "" : $errornrocalle; ?>
                                                    </div>
                                                </div>
                                                <div class="w-100 ml-md-2 form-group mb-4 mb-md-3">
                                                    <label class="mb-2" for="nro_calle">Número de calle</label>
                                                    <input type="text" name="nro_calle" id="nro_calle" value="<?= $nro_calle ?>" class="w-100 py-1 px-3 form-control shadow <?= empty($errornrocalle) ? '' : 'is-invalid' ?>" placeholder="Número..">
                                                    <div class="invalid-feedback d-md-none position-absolute">
                                                        <?= empty($errornrocalle) ? "" : $errornrocalle; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-100 ml-md-3 d-md-flex">
                                                <div class="w-100 mr-md-2 form-group mb-4 mb-md-3">
                                                    <label class="mb-2" for="nro_piso">Piso</label>
                                                    <input type="text" name="nro_piso" id="nro_piso" value="<?= $nro_piso ?>" class="py-1 px-3 form-control shadow <?= empty($errorpiso) ? '' : 'is-invalid' ?>" placeholder="Número...">
                                                    <div class="invalid-feedback position-absolute">
                                                        <?= empty($errorpiso) ? "" : $errorpiso; ?>
                                                    </div>
                                                    <div class="d-none d-md-block invalid-feedback position-absolute <?= empty($errorpiso) ? '' : 'mt-4' ?>">
                                                        <?= empty($errordepto) ? "" : $errordepto; ?>
                                                    </div>
                                                </div>
                                                <div class="w-100 ml-md-2 form-group">
                                                    <label class="mb-2" for="depto">Departamento</label>
                                                    <input type="text" name="depto" id="depto" value="<?= $depto ?>" class="w-100 py-1 px-3 form-control shadow <?= empty($errordepto) ? '' : 'is-invalid' ?>" placeholder="Depto...">
                                                    <div class="invalid-feedback d-md-none position-absolute">
                                                        <?= empty($errordepto) ? "" : $errordepto; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column mt-4 w-100">
                                    <div class="w-100 d-flex">
                                        <button type="submit" class="btn-primary p-2 border-0 w-50 mx-auto">Registrarse</button>
                                    </div>
                                    <div class="custom-control custom-checkbox ml-2 form-group mb-4 mb-md-3">
                                        <input type="checkbox" class="custom-control-input form-control <?= empty($errortos) ? '' : 'is-invalid' ?>" name="tos" id="tos" value="aceptado" <?= $tos ?>>
                                        <label for="tos <?= empty($errortos) ? '' : 'text-danger' ?>" class="custom-control-label tos mt-2">Acepto los <a href="" data-toggle="modal" data-target="#opentos">terminos y condiciones</a> del sitio.</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="modal fade" id="opentos" tabindex="-1" role="dialog" aria-labelledby="TerminosyCondiciones" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title align" id="TerminosyCondiciones">Términos y condiciones <a href="tos.php" class="ml-2 btn btn-primary text-white">Ver en pantalla completa</a></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h2>Introduction</h2>

                                        <p>These Website Standard Terms and Conditions written on this webpage shall manage your use of our website, 4 osos accessible at 4osos.com.ar.</p>

                                        <p>These Terms will be applied fully and affect to your use of this Website. By using this Website, you agreed to accept all terms and conditions written in here. You must not use this Website if you disagree with any of these Website Standard Terms and Conditions.</p>

                                        <p>Minors or people below 18 years old are not allowed to use this Website.</p>

                                        <h2>Intellectual Property Rights</h2>

                                        <p>Other than the content you own, under these Terms, 4 osos and/or its licensors own all the intellectual property rights and materials contained in this Website.</p>

                                        <p>You are granted limited license only for purposes of viewing the material contained on this Website.</p>

                                        <h2>Restrictions</h2>

                                        <p>You are specifically restricted from all of the following:</p>

                                        <ul>
                                            <li>publishing any Website material in any other media;</li>
                                            <li>selling, sublicensing and/or otherwise commercializing any Website material;</li>
                                            <li>publicly performing and/or showing any Website material;</li>
                                            <li>using this Website in any way that is or may be damaging to this Website;</li>
                                            <li>using this Website in any way that impacts user access to this Website;</li>
                                            <li>using this Website contrary to applicable laws and regulations, or in any way may cause harm to the Website, or to any person or business entity;</li>
                                            <li>engaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this Website;</li>
                                            <li>using this Website to engage in any advertising or marketing.</li>
                                        </ul>

                                        <p>Certain areas of this Website are restricted from being access by you and 4 osos may further restrict access by you to any areas of this Website, at any time, in absolute discretion. Any user ID and password you may have for this Website are confidential and you must maintain confidentiality as well.</p>

                                        <h2>Your Content</h2>

                                        <p>In these Website Standard Terms and Conditions, "Your Content" shall mean any audio, video text, images or other material you choose to display on this Website. By displaying Your Content, you grant 4 osos a non-exclusive, worldwide irrevocable, sub licensable license to use, reproduce, adapt, publish, translate and distribute it in any and all media.</p>

                                        <p>Your Content must be your own and must not be invading any third-party’s rights. 4 osos reserves the right to remove any of Your Content from this Website at any time without notice.</p>

                                        <h2>Your Privacy</h2>

                                        <p>Please read Privacy Policy.</p>

                                        <h2>No warranties</h2>

                                        <p>This Website is provided "as is," with all faults, and 4 osos express no representations or warranties, of any kind related to this Website or the materials contained on this Website. Also, nothing contained on this Website shall be interpreted as advising you.</p>

                                        <h2>Limitation of liability</h2>

                                        <p>In no event shall 4 osos, nor any of its officers, directors and employees, shall be held liable for anything arising out of or in any way connected with your use of this Website whether such liability is under contract.  4 osos, including its officers, directors and employees shall not be held liable for any indirect, consequential or special liability arising out of or in any way related to your use of this Website.</p>

                                        <h2>Indemnification</h2>

                                        <p>You hereby indemnify to the fullest extent 4 osos from and against any and/or all liabilities, costs, demands, causes of action, damages and expenses arising in any way related to your breach of any of the provisions of these Terms.</p>

                                        <h2>Severability</h2>

                                        <p>If any provision of these Terms is found to be invalid under any applicable law, such provisions shall be deleted without affecting the remaining provisions herein.</p>

                                        <h2>Variation of Terms</h2>

                                        <p>4 osos is permitted to revise these Terms at any time as it sees fit, and by using this Website you are expected to review these Terms on a regular basis.</p>

                                        <h2>Assignment</h2>

                                        <p>The 4 osos is allowed to assign, transfer, and subcontract its rights and/or obligations under these Terms without any notification. However, you are not allowed to assign, transfer, or subcontract any of your rights and/or obligations under these Terms.</p>

                                        <h2>Entire Agreement</h2>

                                        <p>These Terms constitute the entire agreement between 4 osos and you in relation to your use of this Website, and supersede all prior agreements and understandings.</p>

                                        <h2>Governing Law & Jurisdiction</h2>

                                        <p>These Terms will be governed by and interpreted in accordance with the laws of the State of ar, and you submit to the non-exclusive jurisdiction of the state and federal courts located in ar for the resolution of any disputes.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


            </div>
        </main>
        <!-- hasta aca va el contenido de la pagina -->

        <?php include 'footer.php'; ?>

    </div>
    <!--fin container principal-->

    <!-- Script de validación por js de bootstrap -->

    <?php include 'script.php'; ?>
</body>

</html>