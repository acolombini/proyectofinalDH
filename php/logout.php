<?php 
session_start();
if(isset($_COOKIE['email'])){
setcookie('email', '', time()-1, '/');
setcookie('pass', '', time()-1, '/');
}
if (isset($_SESSION["usuario"])) {
    session_destroy();
    header('Location: ../index.php');
    exit();
} else {
    header('Location: ../index.php'); # Redirección a index.php
}
?>