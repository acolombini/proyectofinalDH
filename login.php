<?php
#session_start();

if (isset($_SESSION["usuario"])) { # Redirección de usuario logueado
    header('Location: index.php');
}

$dbget = file_get_contents("db/usuarios.json");
$db = json_decode($dbget, true);

if ($_POST) {

    # Iniciando arrays y declarando variables
    $errores = [];
    $dbget = file_get_contents("db/usuarios.json");
    $db = json_decode($dbget, true);


    ############################## VALIDACIÓN ##############################
    if (empty($_POST["email"])) { # Error de email vacío
        $errores[] = "Por favor ingresa tu email!";
    } elseif (!empty($_POST["email"])) {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) { # Error de email incorrecto (formato)
            $errores[] = "El email es incorrecto!";
        } elseif (empty($_POST["password"])) { # Error de contraseña vacía
            $errores[] = "Por favor ingresa una contraseña!";
        } elseif (in_array($_POST["email"], array_column(array_column($db, 'cuenta'), 'email'))) { # Email existe en la base de datos

            $usuario = $db[array_search($_POST["email"], array_column(array_column($db, 'cuenta'), 'email'))]; # Obteniendo array de usuario

            if (!($_POST["password"] == password_verify($_POST["password"], $usuario["cuenta"]["password"]))) { # Comparando contraseña ingresada con contraseña en db
                $errores[] = "La contraseña es incorrecta!"; # Error cuando la contraseña ingresada es incorrecta
            }
        } else {
            $errores[] = "Ese email no existe!"; # Error de email no existente
        }
    }
    if (empty($_POST["password"])) {
        $errores[] = "Por favor ingresa una contraseña!"; # Error de contraseña vacía
    }

    ############### COMPROBACIÓN DE LOGIN ###############
    if (count($errores) == 0) { 
        header('Location: index.php'); # Redirección a index
        $_SESSION["usuario"] = $usuario; # Escribiendo la sesión
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
                                    <div class="form-group mb-3">
                                        <input id="inputEmail" type="text" name="email" value="<?= empty($_POST["email"]) ? "" : $_POST["email"] ?>" placeholder="Dirección de correo" autofocus="" class="form-control border-0 shadow px-4">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input id="inputPassword" type="password" name="password" placeholder="Contraseña" class="form-control border-0 shadow px-4 text-primary">
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input id="customCheck1" type="checkbox" checked class="custom-control-input">
                                        <label for="customCheck1" class="custom-control-label">Recordar contraseña</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block mb-2 shadow">
                                        Iniciar
                                        sesión
                                    </button>
                                </form>
                                <!-- Fin Formulario de login-->

                                <a href="register.php" class="btn btn-info btn-block mb-2 shadow text-white">Registrarse</a>
                                
                                <!-- Errores php -->
                                <?php
                                if ($_POST) : ?>
                                    <ul id="logerror" class="text-white list-unstyled font-weight-bold">
                                        <?php if (count($errores) > 0) :
                                                foreach (array_unique($errores) as $error) : ?>
                                                <li><?= "- " . $error ?></li>
                                        <?php endforeach;
                                            endif; ?>
                                    </ul>
                                <?php endif; ?>
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

        <?php include 'footer.php'; ?>

    </div>
    <!--fin container principal-->

    <?php include 'script.php'; ?>

</body>

</html>