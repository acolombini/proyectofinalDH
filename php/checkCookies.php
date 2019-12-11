<?php 
function usuariosdb() # Obtener base de datos de usuario
{
    $dbget = file_get_contents("db/usuarios.json");
    return json_decode($dbget, true);
}

function emailsRegistrados($db) # Obtener listado de mails
{
    return array_column(array_column($db, 'cuenta'), 'email');
}

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
            }
        }
    }
}
?>