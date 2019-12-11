<?php 
session_start();

if (isset($_SESSION["usuario"])) {
    session_destroy();
    setcookie('usuario', '', time()-3600, '/');
    header('Location: ../index.php');
    exit();
} else {
    header('Location: ../index.php'); # Redirección a index.php
}
?>