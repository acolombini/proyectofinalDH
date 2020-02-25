<?php 
function conexionADB($db_name){
    $dsn = "mysql:dbname=$db_name;host=127.0.0.1;port=3306";
    $username = "root";
    $password = "root";
    $opt = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    try {
        return new PDO ($dsn, $username, $password, $opt);
    } catch (\Exception $e) {
        echo "Error!!! " . $e->getMessage(); 
        exit;
    }
}

function traerUsuariosDeBBDD($db){
    $query=$db->prepare("SELECT * FROM users");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function traerCiudadesDeBBDD($db){
    $query=$db->prepare("SELECT * from ciudades");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function traerProvinciasDeBBDD($db){
    $query=$db->prepare("SELECT * from provincia");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function traerTiposDeDocumentoDeBBDD($db){
    $query=$db->prepare("SELECT * from tipo_de_dni");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
?>