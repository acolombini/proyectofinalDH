<?php 
include_once("pdo.php");
$db = conexionADB("users_db");
$baseDeDatosDeUsuarios = traerUsuariosDeBBDD($db);

$arrayDeEmails = [];
foreach($baseDeDatosDeUsuarios as $usuario){
    $arrayDeEmails[] =  $usuario["email"];
}

if (isset($_COOKIE["email"])) {
    $cookiedata["email"] = $_COOKIE["email"]; # Obteniendo array de cookie
    $cookiedata["password"] = $_COOKIE["password"];
    if (!empty($cookiedata["email"]) && !empty($cookiedata["password"])) { # Comprobando que la cookie tenga datos
        $cookieemail = $cookiedata["email"]; # Email en cookie
        $cookiepass = $cookiedata["password"]; # Contraseña en cookie
        if (in_array($cookieemail, $arrayDeEmails)) {
                $usuario = $baseDeDatosDeUsuarios[array_search($cookieemail, $arrayDeEmails)]; # Obteniendo array de usuario actual
            if (password_verify($cookiepass, $usuario["password"])) {
                setcookie('email', $cookiedata["email"], time() + 604800, '/'); # Seteando cookie por 1 semana
                setcookie('password', $cookiedata["password"], time() + 604800, '/');
                $_SESSION["usuario"] = $usuario; # Escribiendo la sesión
            }
        }
    }
}
?>