<?php
session_start();
if (isset($_SESSION["usuario"])) { # Redirección de usuario logueado
    header('Location: index.php');
}
date_default_timezone_set('America/Argentina/Buenos_Aires');

require("pdo.php");

$db = conexionADB("users_db");

$baseDeDatosDeUsuarios = traerUsuariosDeBBDD($db);

$baseDeDatosDeCiudades = traerCiudadesDeBBDD($db);

$baseDeDatosDeProvincias = traerProvinciasDeBBDD($db);

$baseDeDatosDeTiposDeDocumento = traerTiposDeDocumentoDeBBDD($db);
############################## PERSISTENCIA ##############################
$nombre = empty($_POST["nombre"]) ? "" : $_POST["nombre"];
$apellido = empty($_POST["apellido"]) ? "" : $_POST["apellido"];
$email = empty($_POST["email"]) ? "" : $_POST["email"];
$dia_de_nacimiento = empty($_POST["dia_de_nacimiento"]) ? "" : $_POST["dia_de_nacimiento"];
$mes_de_nacimiento = empty($_POST["mes_de_nacimiento"]) ? "" : $_POST["mes_de_nacimiento"];
$anio_de_nacimiento = empty($_POST["anio_de_nacimiento"]) ? "" : $_POST["anio_de_nacimiento"];
$numero_de_telefono = empty($_POST["numero_de_telefono"]) ? "" : $_POST["numero_de_telefono"];
$tipo_de_celular = isset($_POST["tipoTelefono"]) && $_POST["tipoTelefono"] == "cel" ? "checked" : "";
$tipoFijo = isset($_POST["tipoTelefono"]) && $_POST["tipoTelefono"] == "fijo" ? "checked" : "";
$numero_de_documento = empty($_POST["numero_de_documento"]) ? "" : $_POST["numero_de_documento"];
$tipos_de_documento = isset($_POST["tipos_de_documento"]) ? $_POST["tipos_de_documento"] : "";
$ciudad = empty($_POST["ciudad"]) ? "" : $_POST["ciudad"];
$provincia = isset($_POST["provincia"]) ? $_POST["provincia"] : "";
$codigo_postal = empty($_POST["codigo_postal"]) ? "" : $_POST["codigo_postal"];
$calle = empty($_POST["calle"]) ? "" : $_POST["calle"];
$altura = isset($_POST["altura"]) && $_POST["altura"] != "" ? $_POST["altura"] : "";
$piso = isset($_POST["piso"]) && $_POST["piso"] != "" ? $_POST["piso"] : "";
$departamento = isset($_POST["departamento"]) && $_POST["departamento"] != "" ? $_POST["departamento"] : "";
$tos = isset($_POST['tos']) ? "checked" : "";
$recordar = isset($_POST["recordar"]) ? "checked" : "";

############################## Funciones ##############################

function calcularEdad($dia, $mes, $anio) #Calcular edad
{
    $nacimiento = new DateTime($dia . $mes . $anio);
    $hoy = new DateTime('00:00:00');
    $diferencia = date_diff($nacimiento, $hoy);
    return $diferencia->format('%r%y');
}
 
############################## VALIDACIÓN ##############################

if ($_POST) {
    $usuario = [
        "nombre" => "",
        "apellido" => "",
        "email" => "", 
        "fecha_de_nacimiento" => "",
        "pass" => "",
        "numero_de_telefono" => "",
        "numero_de_documento" => "",
        "tipos_de_documento" => "",
        "provincia" => "",
        "ciudad" => "",
        "codigo_postal" => "",
        "calle" => "",
        "altura" => "",
        "piso" => "",
        "departamento" => "",
    ];

    # Iniciando arrays y variables
    $errores = [];
    $pass = empty($_POST["pass"]) ? "" : $_POST["pass"];

    ############### OBLIGATORIO ###############
    # Checkeando el campo de nombre
    if (empty($nombre)) { # Error de nombre vacío
        $errores["nombre"] = "Por favor, ingresa tu nombre.";
    } elseif (!preg_match("/^.{1,50}$/u", $nombre)) { # Error de caracteres mínimos/máximos
        $errores["nombre"] = "El nombre no debe contener más 50 caracteres!";
    } elseif (!preg_match("/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸ' ]*$/", $nombre)) { # Error de caracteres no permitidos
        $errores["nombre"] = "El nombre contiene caracteres no permitidos!";
    } else { # Success!!
        $usuario["nombre"] = trim(preg_replace("/ {2,}/", " ", strtolower($nombre))); # Paso todo a minúsculas, reemplazo múltiples espacios por uno solo y trimeo los extremos
    }

    # chequeando el campo de apellido
    if (empty($apellido)) { # Error de apellido vacío
        $errores["apellido"] = "Por favor, ingresa tu apellido";
    } elseif (!preg_match("/^.{1,50}$/u", $apellido)) { # Error de caracteres mínimos/máximos
        $errores["apellido"] = "Este campo no debe contener más de 50 caracteres";
    } elseif (!preg_match("/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸ' ]*$/", $apellido)) { # Error de caracteres no permitidos
        $errores["apellido"] = "Este campo contiene caracteres no permitidos.";
    } else { # Success!!
        $usuario["apellido"] = trim(preg_replace("/ {2,}/", " ", strtolower($apellido))); # Paso todo a minúsculas, reemplazo múltiples espacios por uno solo y trimeo los extremos
    }

    # Checkeando el campo de email
    if (empty($email)) { # Error de email vacío
        $errores["email"] = "Por favor, ingresa tu email";
    } elseif (!empty($email)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { # Error de email incorrecto
            $errores["email"] = "El email es incorrecto!";
        } /*elseif (in_array($email, emailsRegistrados($db))) { # Error de email ya registrado
            $errores["email"] = "Ese email ya ha sido registrado. <a href=login.php> Loguearme </a>.";
        } */else { # Success!!
            $usuario["email"] = trim(strtolower($email)); #Paso email a minúsculas y trimeo
        }
    }

    # Checkeando el campo de fecha de nacimiento + calculando edad
    if (empty($dia_de_nacimiento)) {
        $errores["fecha_de_nacimiento"] = "Por favor ingresa tu fecha de nacimiento.";
    } elseif (!preg_match("/^(0[1-9]|[12][0-9]|3[01])$/", $dia_de_nacimiento)) { # Error de formato incorrecto = días 
        $errores["fecha_de_nacimiento"] = "El formato o la fecha no son válidos!";
    }
    if (empty($mes_de_nacimiento)) {
        $errores["fecha_de_nacimiento"] = "Por favor ingresa tu fecha de nacimiento!";
    } elseif (!preg_match("/^(0[1-9]|1[0-2])$/", $mes_de_nacimiento)) { # Error de formato incorrecto = meses
        $errores["fecha_de_nacimiento"] = "El formato o la fecha no son válidos!";
    }
    if (empty($anio_de_nacimiento)) {
        $errores["fecha_de_nacimiento"] = "Por favor ingresa tu fecha de nacimiento!";
    } elseif (!preg_match("/^(19[3-9]\d|20[0-4]\d|2050)$/", $anio_de_nacimiento)) { # Error de formato incorrecto = años
        $errores["fecha_de_nacimiento"] = "El formato o la fecha no son válidos!";
    }

    if (empty($errores["fecha_de_nacimiento"])) {
        if (!checkdate($mes_de_nacimiento, $dia_de_nacimiento, $anio_de_nacimiento)) { # Error si la fecha existe en el calendario
            $errores["fecha_de_nacimiento"] = "La fecha de nacimiento no existe!";
        } elseif (intval(calcularEdad($anio_de_nacimiento, $mes_de_nacimiento, $dia_de_nacimiento)) < 0) { # Error si el usuario tiene una fecha de nacimiento posterior
            $errores["fecha_de_nacimiento"] = "La fecha de nacimiento no puede ser posterior al día de hoy.";
        } elseif (intval(calcularEdad($anio_de_nacimiento, $mes_de_nacimiento, $dia_de_nacimiento)) < 18) { # Error si el usuario no es mayor de edad
            $errores["fecha_de_nacimiento"] = "Para registrarte debes tener al menos 18 años.";
        } else { # Success!
            $usuario["fecha_de_nacimiento"] = $anio_de_nacimiento . "-" . $mes_de_nacimiento . "-" . $dia_de_nacimiento;
        }
    }


    # Checkeando el campo de contraseña
    if (empty($_POST["pass"])) { # Error de contraseña vacía
        $errores["pass"] = "Por favor, ingresa una contraseña.";
    } elseif (!empty($_POST["pass"])) {
        if (strlen($_POST["pass"]) <= 8) { # Error de caracteres mínimos
            $errores["pass"] = "La contraseña debe contener 8 caracteres como mínimo.";
        } elseif ($_POST["pass"] >= 64) { # Error de caracteres máximos
            $errores["pass"] = "La contraseña no debe contener más de 64 caracteres.";
        } elseif (!preg_match("#[0-9]+#", $_POST["pass"])) { # Error cuando no hay números
            $errores["pass"] = "La contraseña debe contener por lo menos un número.";
        } elseif (!preg_match("#[A-Z]+#", $_POST["pass"])) { # Error cuando no hay mayúsculas
            $errores["pass"] = "La contraseña debe contener por lo menos una mayúscula.";
        } elseif (!preg_match("#[a-z]+#", $_POST["pass"])) { # Error cuando no hay minúsculas
            $errores["pass"] = "La contraseña debe contener por lo menos una letra minúscula.";
        } elseif ($_POST["pass"] != $_POST["confirmar_pass"]) { # Error cuando las contraseñas no coinciden
            $errores["pass"] = "Las contraseñas ingresadas no coinciden.";
        } else { # Success!!
            $usuario["pass"] = password_hash($_POST["pass"], PASSWORD_DEFAULT);
        }
    }

    # Términos y condiciones
    if (empty($_POST["tos"])) {
        $errores["terminos_y_condiciones"] = "Debes aceptar los términos y condiciones!";
    }

    ############### OPCIONAL ###############
    ######### Avatar #########
    if ($_FILES['avatar']['size'] != 0) { # Comprobando si se subió el archivo
        $type = exif_imagetype($_FILES['avatar']['tmp_name']); # Tipo de imagen
        if ($_FILES["avatar"]["error"] != 0) { # Error de subida
            $errores["avatar"] = "Hubo un error de carga. Intentalo nuevamente.";
        } elseif ($_FILES['avatar']['size'] >= 5242881) { # Error de tamaño máximo (5mb)
            $errores["avatar"] = "El archivo debe ser menor a 5mb.";
        } elseif ($type == false) { # Comprobando si es una imagen
            $errores["avatar"] = "No es una imagen!";
        } elseif (in_array(image_type_to_extension($type), ['.jpeg', '.jpg', '.png'])) { # Se convierte el tipo de imagen a extensión y se comprueba si es correcta
            $ext = image_type_to_extension($type);
            $imagename = "avatar_" . $usuario["id"] . $ext; # Nombre de la imagen
            $usuario["avatar"] = "$imagename"; # Guardando nombre de la imagen en array
            move_uploaded_file($_FILES["avatar"]["tmp_name"], "db/avatars/$imagename"); # Guardando imagen
        } else { # Error si la imagen no es el formato correcto
            $errores["avatar"] = "El formato de imágen debe ser jpg, jpeg o png.";
        }
    }

    ######### Datos #########
    # Número de teléfono
    
    if (!empty($numero_de_telefono)) { 
        if (empty($_POST["numero_de_telefono"])) { # Error si el checkbox de "tipoTelefono" está vacío
            $errores["numero_de_telefono"] = "Por favor, ingresa tu número de teléfono.";
        } elseif (!preg_match('/^(?:(?:00)?549?)?0?(?:11|[2368]\d)(?:(?=\d{0,2}15)\d{2})??\d{8}$/D', $numero_de_telefono)) { # Fuente de este regex: https://es.stackoverflow.com/a/136406
            $errores["numero_de_telefono"] = "El número ingresado no es válido."; # Error si el regex no da match
        } else { # Success!
            $usuario["numero_de_telefono"] = $_POST["numero_de_telefono"];
        }
    }
    
    # Documento
    
    if (empty($numero_de_documento)) { 
        $errores["numero_de_dni"] = "Por favor, ingresa tu documento.";
    } elseif (!preg_match('/^[0-9]{7,8}$/', $numero_de_documento)) { # Error si el regex no da match
        $errores["numero_de_dni"] = "El documento ingresado no es válido.";
    } else {
        $usuario["numero_de_dni"] = $numero_de_documento;
    }
    if (empty($tipos_de_documento)) { # Error si el checkbox de "tipos_de_documento" está vacío
        $errores["tipos_de_documento"] = "Por favor, ingresa el tipo de documento.";
    } else { # Success!
        $usuario["tipos_de_documento"] = $tipos_de_documento;
        }
        
    

    ######### Direcciones #########
    # Ciudad

    if(empty($ciudad)) {
        $errores["ciudad"] = "Por favor, seleccione su ciudad.";        
    } else {
        $usuario["ciudad"] = $ciudad;
    }
    
    if (empty($provincia)){
        $errores["provincia"] = "Por favor, seleccione su provincia.";
    } else {
        $usuario["provincia"] = $provincia; # Success!
    }

    # Código postal
    /*
    if (!empty($codigo_postal)) {
        $errores["codigo_postal"] = "Por favor, ingrese su código postal.";
        } elseif (!preg_match('/^[0-9]{4}$/', $codigo_postal)) { # Error si el regex no da match
            $errores["codigo_postal"] = "El código postal ingresado no es válido.";
        } else { # Success!
            $usuario["codigo_postal"] = $codigo_postal;
        }
    */

    # Calle
    if (empty($calle)) { # Se comprueba si se ingresa una calle
        $errores["calle"] = "Por favor, ingresá una dirección.";
    } elseif (strlen($calle) > 90) { # Error de caracteres mínimos/máximos
            $errores["calle"] = "La dirección no debe contener más de 90 caracteres";
        } elseif (!preg_match("/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸ' ]*$/", $calle)) { # Error de caracteres no permitidos
            $errores["calle"] = "La dirección contiene caracteres no permitidos.";
        } else { # Success!
            $usuario["calle"] = strtolower($calle);
        }

    # Piso
    if (!empty($piso)) { # Se comprueba sólo si se ingresa el número de piso
        if (!preg_match('/^[0-9]{1,3}$/', $piso)) { # Error si el regex no da match
            $errores["piso"] = "El piso ingresado no es válido.";
        } else { # Success!
            $usuario["piso"] = $piso;
        }
    }

    # Departamento
    if (!empty($departamento)) { # Se comprueba sólo si se ingresa un departamento
        if (!preg_match('/^[a-zA-Z0-9]{1,16}$/', $departamento)) { # Error si el regex no da match
            $errores["departamento"] = "El departamento ingresado no es válido.";
        } else { # Success!
            $usuario["departamento"] = strtolower($departamento);
        }
    }

    ############### ESCRITURA DE ARCHIVOS ###############
    if (!$errores) {
        if (!empty($_POST["recordar"])) { # Seteando cookie por 1 semana

            # Array de cookie
            $cookiedata = [
                "email" => $usuario["email"],
                "pass" => $usuario["pass"]
            ];
            setcookie("email", $cookiedata["email"], time() + 604800, '/');
            setcookie("pass", $cookiedata["pass"], time() + 604800, '/'); # Seteando cookie por 1 semana
        }
        $query=$db->prepare("INSERT INTO users VALUES (DEFAULT, :nombre, :apellido, :telefono, :documento, :email, :fecha_de_nacimiento, :domicilio, :ciudad_id, :pass, DEFAULT, :tipos_de_dni_id, DEFAULT)");
        $query->bindValue("nombre", $usuario["nombre"]);
        $query->bindValue("apellido",$usuario["apellido"]);
        $query->bindValue("telefono", $usuario["numero_de_telefono"]);
        $query->bindValue("documento", $usuario["numero_de_dni"]); 
        $query->bindValue("email", $usuario["email"]);
        $query->bindValue("fecha_de_nacimiento", $usuario["fecha_de_nacimiento"]);
        $query->bindValue("domicilio", $usuario["calle"]); 
        $query->bindValue("ciudad_id",$usuario["ciudad"]); //codigo postal
        $query->bindValue("pass", $usuario["pass"]);
        $query->bindValue("tipos_de_dni_id", $usuario["tipos_de_documento"]);
        $query->execute();

    }
} else {
    if (isset($_COOKIE["email"])) {
        $cookiedata["email"] = $_COOKIE["email"]; # Obteniendo array de cookie
        $cookiedata["password"] = $_COOKIE["password"];
        if (!empty($cookiedata["email"]) && !empty($cookiedata["password"])) { # Comprobando que la cookie tenga datos
            $cookieemail = $cookiedata["email"]; # Email en cookie
            $cookiepass = $cookiedata["password"]; # Contraseña en cookie
            if (in_array($cookieemail, $arrayDeEmails)) {
                $usuario = $baseDeDatosDeUsuarios[array_search($cookieemail, $usuario)]; # Obteniendo array de usuario actual
                if (password_verify($cookiepass, $usuario["password"])) {
                    setcookie('email', $cookiedata["email"], time() + 604800, '/'); # Seteando cookie por 1 semana
                    setcookie('password', $cookiedata["password"], time() + 604800, '/');
                    $_SESSION["usuario"] = $usuario; # Escribiendo la sesión
                    header('Location: index.php'); # Redirección a index.php
                    exit();
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = 'Registro';
    include 'php/head.php';
    ?>
</head>

<body>
    <div class="container-fluid m-0 p-0 bg-sky">
        <header>
            <?php require 'php/header.php'; ?>
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
                                                <input type="text" name="nombre" id="nombreid" value="<?= $nombre ?>" class="py-1 px-3 form-control shadow <?= empty($errores["nombre"]) ? '' : 'is-invalid' ?>" placeholder="Nombre..." autofocus>
                                                <div class="invalid-feedback position-absolute">
                                                    <?= empty($errores["nombre"]) ? "" : $errores["nombre"]; ?>
                                                </div>
                                            </div>
                                            <div class="w-100 ml-md-3 form-group mb-4 mb-md-3">
                                                <label for="apellido" class="mb-2">Apellido</label>
                                                <input type="text" name="apellido" id="apellido" value="<?= $apellido ?>" class=" py-1 px-3 form-control shadow <?= empty($errores["apellido"]) ? '' : 'is-invalid' ?>" placeholder="Apellido..">
                                                <div class="invalid-feedback position-absolute">
                                                    <?= empty($errores["apellido"]) ? "" : $errores["apellido"]; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap mb-2">
                                            <div class="w-100 mr-md-3 form-group mb-4 mb-md-3">
                                                <label for="email" class="mb-2">E-mail</label>
                                                <input type="text" name="email" id="email" value="<?= $email ?>" class=" py-1 px-3 form-control shadow <?= empty($errores["email"]) ? '' : 'is-invalid' ?>" placeholder="email@example.com">
                                                <div class="invalid-feedback position-absolute">
                                                    <?= empty($errores["email"]) ? "" : $errores["email"]; ?>
                                                </div>
                                            </div>
                                            <div class="w-100 ml-md-3 form-group mb-4 mb-md-3" id="errornac">
                                                <label for="dia_de_nacimiento" class="mb-2">Fecha de nacimiento</label>
                                                <div class="w-100 d-flex">
                                                    <input type="text" name="dia_de_nacimiento" id="dia_de_nacimiento" value="<?= $dia_de_nacimiento ?>" class="py-1 px-3 form-control shadow text-center <?= empty($errornacd) ? '' : 'is-invalid' ?>" placeholder="dd">
                                                    <input type="text" name="mes_de_nacimiento" id="mes_de_nacimiento" value="<?= $mes_de_nacimiento ?>" class="py-1 px-3 mx-3 form-control shadow text-center <?= empty($errornacm) ? '' : 'is-invalid' ?>" placeholder="mm">
                                                    <input type="text" name="anio_de_nacimiento" id="anio_de_nacimiento" value="<?= $anio_de_nacimiento ?>" class=" py-1 px-3 form-control shadow text-center <?= empty($errornaca) ? '' : 'is-invalid' ?>" placeholder="aaaa">
                                                    <div class="d-block invalid-feedback position-absolute mt-4 pt-3">
                                                        <?= empty($errores["fecha_de_nacimiento"]) ? "" : $errores["fecha_de_nacimiento"] ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap mb-2">
                                            <div class="w-100 mr-md-3 form-group mb-4 mb-md-3">
                                                <label for="pass" class="mb-2">Contraseña</label>
                                                <input type="password" name="pass" id="pass" class="w-100 py-1 px-3 form-control shadow <?= empty($errores["pass"]) ? '' : 'is-invalid' ?> <?= empty($errorconfirmar_pass) ? '' : 'is-invalid' ?>" placeholder="Contraseña...">
                                                <div class="invalid-feedback position-absolute">
                                                    <?= empty($errores["pass"]) ? "" : $errores["pass"]; ?>
                                                </div>
                                                <div class="invalid-feedback position-absolute">
                                                    <?= empty($errores["confirmar_pass"]) ? "" : $errores["confirmar_pass"]; ?>
                                                </div>
                                            </div>
                                            <div class="w-100 ml-md-3 form-group mb-4 mb-md-3">
                                                <label for="confirmar_pass" class="mb-2 d-flex flex-nowrap">Confirmar contraseña</label>
                                                <input type="password" name="confirmar_pass" id="confirmar_pass" class="w-100 py-1 px-3 form-control shadow <?= empty($errores["pass"]) ? '' : 'is-invalid' ?> <?= empty($errorconfirmar_pass) ? '' : 'is-invalid' ?>" placeholder="Contraseña...">
                                                <div class="invalid-feedback position-absolute">
                                                    <?= empty($errores["confirmar_pass"]) ? "" : $errores["confirmar_pass"]; ?>
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
                                        <label class="fas fa-caret-square-up fa-2x mb-0 <?= empty($errores["avatar"]) ? 'text-white' : 'text-danger' ?>" for="avatar" id="avatarijq" style="cursor:pointer;"></label>
                                        <label class="flex-nowrap mb-0 text-white" for="avatar" id="avatarjq" style="cursor:pointer;"><span>subir avatar</span></label>
                                        <input style="opacity:0; position:absolute; z-index:-1;" name="avatar" id="avatar" class="invisible d-flex" type="file">
                                        <label class="text-center text-danger"><?= empty($errores["avatar"]) ? "" : $errores["avatar"]; ?></label>
                                    </div>
                                    <h5>Contacto</h5>
                                </div>
                                <div class="container bg-transparent border-bottom border-dark mb-3 pb-3">
                                    <div class="bg-transparent d-flex flex-column">
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap mb-2" id="errortel">
                                            <div class="w-100 mr-md-3 form-group mb-4 mb-md-3">
                                                <label class="mb-2 mr-md-3" for="numero_de_telefono">Teléfono</label>
                                                <input type="text" name="numero_de_telefono" id="numero_de_telefono" value="<?= $numero_de_telefono ?>" class="py-1 px-3 form-control shadow <?= empty($errores["telefono"]) ? '' : 'is-invalid' ?>" placeholder="Número...">
                                                <div class="invalid-feedback position-absolute">
                                                    <?= empty($errores["telefono"]) ? "" : $errores["telefono"]; ?>
                                                </div>
                                            </div>
                                            <!--
                                            <div class="d-flex flex-wrap justify-content-around d-md-block text-md-left ml-md-3 w-100 align-self-end">
                                                <div class="custom-control custom-radio mt-1 mt-md-0 mb-md-1 form-group">
                                                    <input type="radio" name="tipoTelefono" id="tipo-cel" value="cel" class="custom-control-input <?= empty($errortipotel) ? '' : 'is-invalid' ?>" <?= $tipo_de_celular ?>>
                                                    <label class="custom-control-label" id="radio1jq" for="tipo-cel">Celular</label>
                                                </div>
                                                <div class="custom-control custom-radio mt-1 mt-md-0 form-group mb-md-2">
                                                    <input type="radio" name="tipoTelefono" id="tipo-fijo" value="fijo" class="custom-control-input <?= empty($errortipotel) ? '' : 'is-invalid' ?>" <?= $tipoFijo ?>>
                                                    <label class="custom-control-label" id="radio2jq" for="tipo-fijo">Fijo</label>
                                                </div>
                                            </div>-->
                                        </div>
                                    </div>
                                </div>

                                <div class="container bg-transparent border-bottom border-dark mb-3 pb-3">
                                    <h5 class="text-center mx-auto mb-3">Documentación</h5>
                                    <div class="bg-transparent d-flex flex-column">
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap mb-2" id="errordoc">
                                            <div class="w-100 mr-md-3 form-group mb-4 mb-md-3">
                                                <label for="numero_de_documento" class="mb-2">Documento</label>
                                                <input type="text" name="numero_de_documento" id="numero_de_documento" value="<?= $numero_de_documento ?>" class="py-1 px-3 form-control shadow <?= empty($errores["numero_de_documento"]) ? '' : 'is-invalid' ?>" placeholder="Número...">
                                                <div class="invalid-feedback position-absolute">
                                                    <?= empty($errores["numero_de_documento"]) ? "" : $errores["numero_de_documento"]; ?>
                                                </div>
                                            </div>
                                            <div class="w-100 ml-md-3 form-group mb-4 mb-md-3">
                                                <label class="mb-2" for="tipos_de_documento">Tipo de documento</label>
                                                <select name="tipos_de_documento" id="tipos_de_documento" class="py-1 px-3 form-control shadow <?= empty($errores["tipos_de_documento"]) ? '' : 'is-invalid' ?>">
                                                    <!-- Dropdown de documentos -->
                                                    <?php foreach($baseDeDatosDeTiposDeDocumento as $tipoDeDocumento) :?>
                                                        <option value="<?= $tipoDeDocumento["id"] ?>" id="tipos_de_documento"><?= $tipoDeDocumento["tipo"] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="invalid-feedback position-absolute">
                                                    <?= empty($errores["tipos_de_documento"]) ? "" : $errores["tipos_de_documento"]; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container bg-transparent">
                                    <h5 class="text-center mx-auto mb-3">Dirección</h5>
                                    <div class="bg-transparent d-flex flex-column">
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap mb-2">
                                            <div class="w-100 ml-md-3 d-md-flex">
                                                <div class="w-100 mr-md-2 form-group mb-4 mb-md-3">
                                                    <label class="mb-2" for="provincia">Provincia</label>
                                                    <select name="provincia" id="provincia" class="w-100 py-1 px-3 form-control shadow <?= empty($errores["provincia"]) ? '' : 'is-invalid' ?>">
                                                    <option selected disabled> Seleccione una provincia... </option>    
                                                    <?php foreach ($baseDeDatosDeProvincias as $datosDeProvincia => $provincia) : ?>
                                                            <option value="<?=$provincia["id"]?>"><?=$provincia["nombre"]?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="invalid-feedback position-absolute">
                                                        <?= empty($errores["provincia"]) ? "" : $errores["provincia"]; ?>
                                                    </div>
                                                </div>
                                                <div class="w-100 mr-md-3 form-group mb-4 mb-md-3">
                                                <label class="mb-2" for="ciudad">Ciudad</label>
                                                <select name="ciudad" id="ciudad" class="py-1 px-3 form-control shadow">
                                                    <option value="default" disabled selected> Seleccione una ciudad...</option>
                                                <?php foreach($baseDeDatosDeCiudades as $ciudad):?>
                                                    <option value="<?=$ciudad["id"]?>"><?=$ciudad["nombre"]?></option>
                                                <?php endforeach;?>
                                                </select>                                                
                                                <div class="invalid-feedback position-absolute">
                                                    <?= empty($errores["ciudad"]) ? "" : $errores["ciudad"]; ?>
                                                </div>
                                                </div>
                                                <!--
                                                <div class="w-100 ml-md-2 form-group mb-4 mb-md-3">
                                                    <label class="mb-2" id="codigo_postal" for="codigo_postal">Código postal</label>
                                                    <input type="text" name="codigo_postal" id="codigo_postal" value="<?= $codigo_postal ?>" class="w-100 py-1 px-3 form-control shadow <?= empty($errores["codigo_postal"]) ? '' : 'is-invalid' ?>" placeholder="Código...">
                                                    <div class="invalid-feedback position-absolute">
                                                        <?= empty($errores["codigo_postal"]) ? "" : $errores["codigo_postal"]; ?>
                                                    </div>
                                                </div>
                                                -->
                                            </div>
                                        </div>
                                        <div class="w-100 d-flex flex-wrap flex-md-nowrap form-group mb-2">
                                            <div id="errorcalle" class="w-100 mr-md-3 d-md-flex">
                                                <div class="w-100 mr-md-2 form-group mb-4 mb-md-3">
                                                    <label class="mb-2" for="calle">Calle</label>
                                                    <input type="text" name="calle" id="calle" value="<?= $calle ?>" class="w-100 py-1 px-3 form-control shadow <?= empty($errores["calle"]) ? '' : 'is-invalid ' ?>" placeholder="Calle...">
                                                    <div class="invalid-feedback position-absolute">
                                                        <?= empty($errores["calle"]) ? "" : $errores["calle"]; ?>
                                                    </div>
                                                    <div class="d-none d-md-block invalid-feedback position-absolute <?= empty($errores["altura"]) ? '' : 'mt-4' ?>">
                                                        <?= empty($errores["altura"]) ? "" : $errores["altura"]; ?>
                                                    </div>
                                                </div>
                                                <div class="w-100 ml-md-2 form-group mb-4 mb-md-3">
                                                    <label class="mb-2" for="altura">Altura</label>
                                                    <input type="text" name="altura" id="altura" value="<?= $altura ?>" class="w-100 py-1 px-3 form-control shadow <?= empty($errores["altura"]) ? '' : 'is-invalid' ?>" placeholder="Número..">
                                                    <div class="invalid-feedback d-md-none position-absolute">
                                                        <?= empty($errores["altura"]) ? "" : $errores["altura"]; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-100 ml-md-3 d-md-flex">
                                                <div class="w-100 mr-md-2 form-group mb-4 mb-md-3">
                                                    <label class="mb-2" for="piso">Piso</label>
                                                    <input type="text" name="piso" id="piso" value="<?= $piso ?>" class="py-1 px-3 form-control shadow <?= empty($errores["piso"]) ? '' : 'is-invalid' ?>" placeholder="Número...">
                                                    <div class="invalid-feedback position-absolute">
                                                        <?= empty($errores["piso"]) ? "" : $errores["piso"]; ?>
                                                    </div>
                                                    <div class="d-none d-md-block invalid-feedback position-absolute <?= empty($errores["piso"]) ? '' : 'mt-4' ?>">
                                                        <?= empty($errores["departamento"]) ? "" : $errores["departamento"]; ?>
                                                    </div>
                                                </div>
                                                <div class="w-100 ml-md-2 form-group">
                                                    <label class="mb-2" for="departamento">Departamento</label>
                                                    <input type="text" name="departamento" id="departamento" value="<?= $departamento ?>" class="w-100 py-1 px-3 form-control shadow <?= empty($errores["departamento"]) ? '' : 'is-invalid' ?>" placeholder="Departamento...">
                                                    <div class="invalid-feedback d-md-none position-absolute">
                                                        <?= empty($errores["departamento"]) ? "" : $errores["departamento"]; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column mt-3 w-100">
                                    <div class="w-100 d-flex">
                                        <button type="submit" class="btn-primary p-2 border-0 w-50 mx-auto">Registrarse</button>
                                    </div>
                                    <div class="custom-control custom-checkbox mt-2 ml-2">
                                        <input type="checkbox" class="custom-control-input" name="recordar" id="recordar" value="si" <?= $recordar ?>>
                                        <label for="recordar" class="custom-control-label">Recordarme</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ml-2 form-group mb-4 mb-md-3">
                                        <input type="checkbox" class="custom-control-input form-control <?= empty($errortos) ? '' : 'is-invalid' ?>" name="tos" id="tos" value="aceptado" <?= $tos ?>>
                                        <label for="tos" class="custom-control-label tos mt-2 <?= empty($errortos) ? '' : 'text-danger' ?>">Acepto los <a href="" data-toggle="modal" data-target="#opentos">terminos y condiciones</a> del sitio.</label>
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

                                        <p>Certain areas of this Website are restricted from being access by you and 4 osos may further restrict access by you to any areas of this Website, at any time, in absolute discretion. Any user ID and pass you may have for this Website are confidential and you must maintain confidentiality as well.</p>

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

        <?php include 'php/footer.php'; ?>

    </div>
    <!--fin container principal-->

    <!-- Script de validación por js de bootstrap -->

    <?php require 'php/scripts.php'; ?>
</body>

</html>