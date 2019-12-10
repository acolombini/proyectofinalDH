<?php
session_start();

if (isset($_SESSION["usuario"])) { # Redirección de usuario logueado
    header('Location: index.php');
    exit();
}

# Persistencia
$email = empty($_POST["email"]) ? "" : $_POST["email"];
$recordar = empty($_POST["recordar"]) ? "" : "checked";

# Funciones
function usuariosdb() # Obtener base de datos de usuario
{
    $dbget = file_get_contents("db/usuarios.json");
    return json_decode($dbget, true);
}

function emailsRegistrados($db) # Obtener listado de mails
{
    return array_column(array_column($db, 'cuenta'), 'email');
}


if ($_POST) {

    # Iniciando arrays y declarando variables
    $errores = 0;
    $password = empty($_POST["password"]) ? "" : $_POST["password"];
    $db = usuariosdb();

    ############################## VALIDACIÓN ##############################
    if (empty($email)) { # Error de email vacío
        $errores++;
        $emailerror = "Por favor ingresa tu email!";
    } elseif (!empty($email)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { # Error de email incorrecto (formato)
            $errores++;
            $emailerror = "El email no es válido!";
        } elseif (empty($password)) { # Error de contraseña vacía (corto acá si no hay contraseña)
            $errores++;
            $passerror = "Por favor ingresa una contraseña!";
        } elseif (in_array($email, emailsRegistrados($db))) { # Comprobando si email existe en la base de datos

            $usuario = $db[array_search($email, emailsRegistrados($db))]; # Obteniendo array de usuario actual
            $dbpassword = $usuario["cuenta"]["password"]; # Obteniendo contraseña del usuario en la base de datos

            if (!($password == password_verify($password, $dbpassword))) { # Comparando contraseña ingresada con contraseña en la base de datos
                $errores++;
                $passerror = "La contraseña es incorrecta!"; # Error cuando la contraseña no es correcta
            }
        } else {
            $errores++;
            $emailerror = "Ese email no existe!"; # Error de email no existente
        }
    }
    if (empty($password)) {
        $errores++;
        $passerror = "Por favor ingresa una contraseña!"; # Error de contraseña vacía
    }

    ############### COMPROBACIÓN DE LOGIN ###############
    if ($errores == 0) {

        ### Cookies ###
        if (!empty($_POST["recordar"])) { # Seteando cookie por 1 semana

            # Array de cookie
            $cookiedata = [
                "email" => $usuario["cuenta"]["email"],
                "password" => $password
            ];
            setcookie("usuario", json_encode($cookiedata), time() + 604800); # Seteando cookie por 1 semana
        }
        #/// Fin de Cookies ///

        $_SESSION["usuario"] = $usuario; # Escribiendo la sesión
        header('Location: index.php'); # Redirección a index.php
        exit();
    }
    #////////////// Fin de COMPROBACIÓN DE LOGIN //////////////

    ############################## LOGIN POR COOKIES ##############################
} else {
    if (isset($_COOKIE["usuario"])) {
        $cookiedata = json_decode($_COOKIE["usuario"], true); # Obteniendo array de cookie
        if (!empty($cookiedata["email"]) && !empty($cookiedata["password"])) { # Comprobando que la cookie tenga datos
            $cookieemail = $cookiedata["email"]; # Email en cookie
            $cookiepass = $cookiedata["password"]; # Contraseña en cookie
            $db = usuariosdb(); # Obteniendo array de la base de datos de usuarios
            if (in_array($cookieemail, emailsRegistrados($db))) {
                $usuario = $db[array_search($cookieemail, emailsRegistrados($db))]; # Obteniendo array de usuario
                if (password_verify($cookiepass, $usuario["cuenta"]["password"])) {
                    setcookie("usuario", json_encode($cookiedata), time() + 604800); # Renovando cookie por 1 semana más
                    $_SESSION["usuario"] = $usuario; # Escribiendo la sesión
                    header('Location: index.php'); # Redirección a index.php
                    exit();
                }
            }
        }
    }
}

#///////////////////////// FIN PHP /////////////////////////
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = 'Iniciar sesión';
    include 'php/head.php';
    ?>
</head>

<body>
    <div class="container-fluid m-0 p-0 bg-sky">
        <header>
        <?php require 'php/header.php'; ?>
        </header>

        <main>
            <div class="container mx-auto my-2 py-2 bg-transparent">
                <!-- a partir de aca va el contenido de la pagina -->


                <!-- Row de login-->
                <div class="row no-gutter justify-content-center bg-transparent">

                    <!-- Panel de login -->
                    <div class="col-10  col-lg-7  bg-transparent shadow">

                        <!-- Contenido de login-->
                        <div class="row login align-items-center justify-content-center bg-transparent">


                            <div class="px-4 px-md-0">
                                <h3 class="display-4 text-center text-md-left">Hola de nuevo!</h3>
                                <p class="text-muted mb-4 text-center text-md-left pl-md-1">Inicia sesión para no perderte nada.
                                </p>

                                <!-- Formulario de login-->
                                <form id="log_form" action="login.php" method="POST">
                                    <div class="d-flex flex-column">
                                        <div class="form-group mb-3">
                                            <input id="inputEmail" type="text" name="email" value="<?= $email ?>" placeholder="Dirección de correo" autofocus="" class="form-control border-0 shadow px-4">
                                            <label class="position-absolute text-danger" for="inputEmail"><?= empty($emailerror) ? "" : $emailerror; ?></label>
                                        </div>
                                        <div class="form-group mb-3 mt-3">
                                            <input id="inputPassword" type="password" name="password" placeholder="Contraseña" class="form-control border-0 shadow px-4 text-primary">
                                            <label class="position-absolute text-danger" for="inputPassword"><?= empty($passerror) ? "" : $passerror; ?></label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2 mt-3">
                                            <input name="recordar" id="customCheck1" type="checkbox" value="si" <?= $recordar ?> class="custom-control-input">
                                            <label for="customCheck1" class="custom-control-label">Recordarme</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block mb-2 shadow">Iniciar sesión</button>
                                    </div>
                                </form>
                                <!-- Fin Formulario de login-->

                                <a href="register.php" class="btn btn-info btn-block mb-2 shadow text-white">Registrarse</a>
                            </div>
                            <!-- Fin Contenido de login-->

                        </div>
                        <!-- Fin Panel de ogin -->

                    </div>
                    <!-- Fin Row de login-->

                </div>

                <!-- hasta aca va el contenido de la pagina -->
            </div>
        </main>

        <?php include 'php/footer.php'; ?>

    </div>
    <!--fin container principal-->

    <?php require 'php/scripts.php'; ?>

</body>

</html>