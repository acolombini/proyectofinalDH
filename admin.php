<?php
session_start();
include_once("php/checkCookies.php");
include_once("pdo.php");

if(!(isset($_SESSION["usuario"]))){
    header('Location: login.php');
};
if($_SESSION['usuario']['tipo_de_usuario_id'] != 2){
    header('Location: login.php');exit;
}

$db = conexionADB("users_db");

$categoriasDeProductos = traerCategoriasDeProductosDeBBDD($db);

$BBDDdeProductos= traerProductosDeBBDD($db);

$titulo = '';
$precio = '';
$descripcion = '';
$caracteristicas = '';
$categoria = '';

$errores = [];

$producto = [];

if ($_POST){

$titulo = empty($_POST["titulo"]) ? "" : $_POST["titulo"];
$precio = empty($_POST["precio"]) ? "" : $_POST["precio"];
$descripcion = empty($_POST["descripcion"]) ? "" : $_POST["descripcion"];
$caracteristicas = empty($_POST["caracteristicas"]) ? "" : $_POST["caracteristicas"];
//$categoria = empty($_POST["categoria"] ? "" : $_POST["categoria"]);
// $stock = empty($_POST["stock"]? "" : $_POST["stock"]);

    if(empty($titulo)){
        $errores["titulo"] = "El título no puede estar vacío.";
    } elseif (!preg_match("/^.{1,100}$/u", $titulo)) { # Error de caracteres mínimos/máximos
        $errores["titulo"] = "El titulo no debe contener más 100 caracteres!";
    } else { # Success!!
        $producto["titulo"] = trim(preg_replace("/ {2,}/", " ", strtoupper($titulo))); # reemplazo múltiples espacios por uno solo y trimeo los extremos
    }

    if(empty($descripcion)){
        $errores["descripcion"] = "La descripción no puede estar vacía.";
    } elseif (!preg_match("/^.{1,250}$/u", $descripcion)) { # Error de caracteres mínimos/máximos
        $errores["descripcion"] = "La descripcion no debe contener más 250 caracteres!";
    } else { # Success!!
        $producto["descripcion"] = $descripcion; 
    }

    if(empty($caracteristicas)){
        $errores["caracteristicas"] = "Las caracteristicas no pueden estar vacías.";
    } elseif (!preg_match("/^.{1,250}$/u", $caracteristicas)) { # Error de caracteres mínimos/máximos
        $errores["caracteristicas"] = "Las caracteristicas no deben contener más 250 caracteres!";
    } else { # Success!!
        $producto["caracteristicas"] = $caracteristicas; 
    }

    if(empty($precio)){
        $errores["precio"] = "El precio no puede estar vacío.";
    } elseif (!is_numeric($precio)){
        $errores["precio"] = "El precio debe ser un número.";
    } else {
        $producto["precio"] = $precio;
    }

    if(empty($_POST["categoria"])){
        $errores["categoria"] = "Por favor, selecciona una categoría.";
    } else {
        $producto["categoria"] = $_POST["categoria"];
    }

    if(empty($_POST["stock"])){
        $errores["stock"] = "El campo stock no puede estar vacío.";
    } elseif (!is_numeric($_POST["stock"])){
        $errores["stock"] = "El stock debe ser un número.";
    } else {
        $producto["stock"] = $_POST["stock"];
    }

    if(!$errores){
        $query=$db->prepare("INSERT INTO productos VALUES (DEFAULT, :titulo, :descripcion, :caracteristicas, :precio, :categoria_id, :stock, null)");
        $query->bindValue("titulo", $producto["titulo"]);
        $query->bindValue("descripcion",$producto["descripcion"]);
        $query->bindValue("caracteristicas", $producto["caracteristicas"]);
        $query->bindValue("precio", $producto["precio"]); 
        $query->bindValue("categoria_id", $producto["categoria"]);
        $query->bindValue("stock", $producto["stock"]);
        $query->execute();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = 'Perfil';
    include 'php/head.php';
    ?>
</head>

<body>
   <div class="container-fluid m-0 p-0 bg-sky">
      <header>
      <?php require 'php/header.php'; ?>
      </header>
      
      <main>
         <div class="container my-2 mx-auto py-2">
            <!-- a partir de aca va el contenido de la pagina -->
            
            <div class="row no-gutters">
               
               <!-- Left panel desktop -->
               <div class="d-none d-lg-flex col-3">
                  <div id="profilelp" class="mr-4 w-100 d-flex flex-column">
                     <div class="list-group list-group-flush mb-4 bg-light shadow-lg">
                        <button type="button"
                        class="list-group-item list-group-item-dark text-center font-weight-bold disabled bg-light">
                        Mi cuenta
                        <span class="d-block mt-2"></span>
                     </button>
                     <a href="#" class="list-group-item list-group-item-action bg-light">
                        Mi perfil
                     </a>
                     <a href="#" class="list-group-item list-group-item-action bg-light">
                        Mis datos
                     </a>
                     <a href="#" class="list-group-item list-group-item-action bg-light">
                        Facturación
                     </a>
                     <a href="#" class="list-group-item list-group-item-action bg-light">
                        Direcciones
                     </a>
                  </div>
                  <div class="list-group list-group-flush bg-light flex-grow-1 shadow-lg">
                     <button type="button"
                     class="list-group-item list-group-item-dark text-center font-weight-bold disabled bg-light">
                     Más
                     <span class="d-block mt-2"></span>
                  </button>
                  <a href="#" class="list-group-item list-group-item-action bg-light">
                     Reputación
                  </a>
                  <a href="#" class="list-group-item list-group-item-action bg-light">
                     Estadísticas
                  </a>
                  <a href="#" class="list-group-item list-group-item-action bg-light">
                     Reviews
                  </a>
                  <a href="#" class="list-group-item list-group-item-action bg-light">
                     Seguridad
                  </a>
                  <a href="#" class="list-group-item list-group-item-action text-danger bg-light">
                     Reportar un problema
                  </a>
               </div>
            </div>
         </div>
         <!-- Fin Left panel desktop -->
         
         
         <!-- Avatar header y bottom panel -->
         <div class="col-12 col-lg-9">
            <div class="row no-gutters">
               
               <!-- Avatar header -->
               <div class="col-lg-12 mb-lg-4 shadow-lg">
                  <div class="d-flex flex-column align-items-center justify-content-center flex-lg-row flex-nowrap bg-light"
                  id="avatarprofile">
                  <span class="order-lg-3 mb-2 mr-lg-5 mb-lg-0 align-self-lg-center">
                     <img src="img/user.png" alt="avatar" class="col-12"> 
                  </span>
                  
                  <!-- Filler para centrar nombre en desktop usando flexbox -->
                  <span class="d-none invisible d-lg-flex order-1 mb-2 ml-5 mb-0 align-self-lg-center">
                     <img src="img/user.png" alt="avatar">
                  </span>
                  
                  <div
                  class="d-flex flex-column order-lg-2 flex-lg-row align-self-lg-end mb-lg-5 mx-lg-auto">
                  <span class="nya mr-lg-2 mb-2 mb-lg-0"><?= $_SESSION['usuario']['nombre'] ." " . $_SESSION['usuario']['apellido']?></span>
               </div>
            </div>
         </div>
         <!-- Fin Avatar header -->
         
         <!-- Principio Bottom panel -->
         <!-- Tabs Bottom panel desktop -->
         <div class="col-lg-12 d-none d-lg-flex flex-nowrap" id="tabsbp">
            <ul class="nav nav-tabs w-100">
               <li class="nav-item w-25 text-center">
                  <a href="" data-target="#comprastab" data-toggle="tab"
                  class="nav-link small text-uppercase active pb-3">
                  <i class="fas fa-shopping-bag"></i>
                  Ingresar Producto
               </a>
            </li>
            <li class="nav-item w-25 text-center">
               <a href="" data-target="#ventastab" data-toggle="tab"
               class="nav-link small text-uppercase pb-3">
               <i class="fas fa-money-bill-wave"></i>
               Eliminar Producto
            </a>
         </li>
         <li class="nav-item w-25 text-center">
            <a href="" data-target="#favtab" data-toggle="tab"
            class="nav-link small text-uppercase pb-3">
            <i class="fas fa-heart"></i>
            Modificar Producto
         </a>
      </li>
      <li class="nav-item w-25 text-center">
         <a href="" data-target="#historytab" data-toggle="tab"
         class="nav-link small text-uppercase pb-3">
         <i class="fas fa-history"></i>
         Buscar Producto
      </a>
   </li>
</ul>
</div>

<!-- Bottom panel -->
<div class="col-lg-12 flex-nowrap scrollbar1 overflow-lg-auto" id="profilebp">
   
   <!-- Contenido tabs desktop -->
   <div class="tab-content d-none d-lg-block">
      
       <!-- Ingresar Producto tab -->
    <form action="admin.php" method="post">
    <div class="d-flex flex-column">
      <div class="form-group my-3">
          <input id="titulo" type="text" name="titulo" value="<?= $titulo ?>" placeholder="Titulo del producto" autofocus="" class="form-control border-0 shadow px-4"><?= isset($errores["titulo"])? "$errores[titulo]" : '' ?>
          <label class="position-absolute text-danger" for="titulo"></label>
        </div>
        <div class="form-group mb-3 mt-3">
            <input id="precio" type="text" name="precio" placeholder="Precio" value="<?=$precio ?>" class="form-control border-0 shadow px-4 text-primary"> <?= isset($errores["precio"])? "$errores[precio]" : '' ?>
            <label class="position-absolute text-danger" for="precio"></label>
        </div>
        <div class="form-group my-3">
          <input id="descripcion" type="text" name="descripcion" value="<?= $descripcion ?>" placeholder="Descripcion del producto" autofocus="" class="form-control border-0 shadow px-4"><?= isset($errores["descripcion"])? " $errores[descripcion]" : '' ?>
          <label class="position-absolute text-danger" for="descripcion"></label>
        </div>
        <div class="form-group my-3">
          <input id="caracteristicas" type="text" name="caracteristicas" value="<?= $caracteristicas ?>" placeholder="Caracteristicas del producto (usado, nuevo, medidas, etc.)" autofocus="" class="form-control border-0 shadow px-4"> <?= isset($errores["caracteristicas"])? "$errores[caracteristicas]" : '' ?>
          <label class="position-absolute text-danger" for="caracteristicas"></label>
        </div>
        <div class="form-group my-3">
          <select id="categoria" name="categoria" autofocus="" class="form-control border-0 shadow px-4">
              <option value="" selected disabled> Selecciona una categoria...</option>
              <?php foreach ($categoriasDeProductos as $categorias => $dato) :?>
                <option value="<?= $dato["id"] ?>"> <?= $dato["titulo"] ?></option>
              <?php endforeach;?>
            </select><?= isset($errores["categoria"])? "<br> $errores[categoria]" : '' ?>
        </div>
        <div class="form-group mb-3 mt-3">
            <input id="stock" type="text" name="stock" placeholder="Stock" value="<?= isset($_POST["stock"]) ? "$_POST[stock]" : ''?>" class="form-control border-0 shadow px-4 text-primary"> <?= isset($errores["stock"])? " $errores[stock]" : '' ?>
            <label class="position-absolute text-danger" for="stock"></label>
        </div>
        <div class="form-group my-3">
          <input id="foto" type="file" name="foto" value=""  autofocus="" class="form-control border-0 shadow px-4"> <?= isset($errores["foto"])? " $errores[foto]" : '' ?>
          <label class="position-absolute text-danger" for="foto"></label>
        </div>
        <button type="submit" class="btn btn-primary btn-block mb-2 shadow">Enviar producto</button>
        <button type="reset" class="btn btn-danger btn-block mb-2 shadow">Limpiar</button>
    </div>
    </form>
    <!-- Mis ventas tab -->
            <div id="ventastab" class="tab-pane fade">
               <div class="productodiv d-flex align-items-center bg-white shadow-lg">
                  <div
                  class="d-flex justify-content-start align-items-center h-100 w-100 pl-2 pt-2">
                  <a href="detalle-producto.html"><a href="detalle-producto.html"><img
                     src="https://steamcdn-a.akamaihd.net/steam/apps/1085660/capsule_184x69.jpg?t=1575996168" alt="producto"></a></a>
                     <div class="datosproducto d-flex flex-column w-100 pl-2 pt-2 text-left">
                        <span class="nombreproducto mt-auto">Nombre del producto</span>
                        <span class="precioycantidad">Precio x Cantidad</span>
                        <span class="estadoenvio mt-auto">Estado del envío</span>
                     </div>
                  </div>
                  <div class="botones d-flex flex-column ml-auto h-100 text-right mr-2">
                     <a href="#detalles" class="detallesproducto mb-auto">
                        Ver detalles
                        <i class="fas fa-info-circle text-info"></i>
                     </a>
                     <a href="#detalles" class="detallescomp my-auto">
                        Detalles del comprador
                        <i class="fas fa-user-alt"></i>
                     </a>
                     <a href="#reportarproblema" class="reportarprob mt-auto">
                        Reportar un problema
                        <i class="fas fa-exclamation-triangle text-danger"></i>
                     </a>
                  </div>
               </div>
               <div class="productodiv d-flex align-items-center bg-lightblue">
                  <div
                  class="d-flex justify-content-start align-items-center h-100 w-100 pl-2 pt-2">
                  <a href="detalle-producto.html"><a href="detalle-producto.html"><img
                     src="https://steamcdn-a.akamaihd.net/steam/apps/1085660/capsule_184x69.jpg?t=1575996168" alt="producto"></a></a>
                     <div class="datosproducto d-flex flex-column w-100 pl-2 pt-2 text-left">
                        <span class="nombreproducto mt-auto">Lorem ipsum dolor sit amet
                           consectetur adipisicing elit. Inventore, ad?</span>
                           <span class="precioycantidad">$25.000 x 1 unidad</span>
                           <span class="estadoenvio mt-auto">Recibido</span>
                        </div>
                     </div>
                     <div class="botones d-flex flex-column ml-auto h-100 text-right mr-2">
                        <a href="#detalles" class="detallesproducto mb-auto">
                           Ver detalles
                           <i class="fas fa-info-circle text-info"></i>
                        </a>
                        <a href="#detalles" class="detallescomp my-auto">
                           Detalles del comprador
                           <i class="fas fa-user-alt"></i>
                        </a>
                        <a href="#reportarproblema" class="reportarprob mt-auto">
                           Reportar un problema
                           <i class="fas fa-exclamation-triangle text-danger"></i>
                        </a>
                     </div>
                  </div>
                  <div class="productodiv d-flex align-items-center bg-white">
                     <div
                     class="d-flex justify-content-start align-items-center h-100 w-100 pl-2 pt-2">
                     <a href="detalle-producto.html"><a href="detalle-producto.html"><img
                        src="https://steamcdn-a.akamaihd.net/steam/apps/1085660/capsule_184x69.jpg?t=1575996168" alt="producto"></a></a>
                        <div class="datosproducto d-flex flex-column w-100 pl-2 pt-2 text-left">
                           <span class="nombreproducto mt-auto">Lorem ipsum dolor sit amet
                              consectetur adipisicing elit. In maiores assumenda veniam!
                              Neque, minima veniam.</span>
                              <span class="precioycantidad">$25.000 x 1 unidad</span>
                              <span class="estadoenvio mt-auto">Demorado</span>
                           </div>
                        </div>
                        <div class="botones d-flex flex-column ml-auto h-100 text-right mr-2">
                           <a href="#detalles" class="detallesproducto mb-auto">
                              Ver detalles
                              <i class="fas fa-info-circle text-info"></i>
                           </a>
                           <a href="#detalles" class="detallescomp my-auto">
                              Detalles del comprador
                              <i class="fas fa-user-alt"></i>
                           </a>
                           <a href="#reportarproblema" class="reportarprob mt-auto">
                              Reportar un problema
                              <i class="fas fa-exclamation-triangle text-danger"></i>
                           </a>
                        </div>
                     </div>
                     <div class="productodiv d-flex align-items-center bg-lightblue">
                        <div
                        class="d-flex justify-content-start align-items-center h-100 w-100 pl-2 pt-2">
                        <a href="detalle-producto.html"><a href="detalle-producto.html"><img
                           src="https://steamcdn-a.akamaihd.net/steam/apps/1085660/capsule_184x69.jpg?t=1575996168" alt="producto"></a></a>
                           <div class="datosproducto d-flex flex-column w-100 pl-2 pt-2 text-left">
                              <span class="nombreproducto mt-auto">Cámara digital 48mp</span>
                              <span class="precioycantidad">$25.000 x 1 unidad</span>
                              <span class="estadoenvio mt-auto">Cancelado</span>
                           </div>
                        </div>
                        <div class="botones d-flex flex-column ml-auto h-100 text-right mr-2">
                           <a href="#detalles" class="detallesproducto mb-auto">
                              Ver detalles
                              <i class="fas fa-info-circle text-info"></i>
                           </a>
                           <a href="#detalles" class="detallescomp my-auto">
                              Detalles del comprador
                              <i class="fas fa-user-alt"></i>
                           </a>
                           <a href="#reportarproblema" class="reportarprob mt-auto">
                              Reportar un problema
                              <i class="fas fa-exclamation-triangle text-danger"></i>
                           </a>
                        </div>
                     </div>
                  </div>
                  <!-- Favoritos tab -->
                  <div id="favtab" class="tab-pane fade">
                     <div class="favoritodiv d-flex align-items-center bg-white shadow-lg">
                        <div
                        class="d-flex justify-content-start align-items-center h-100 w-100 p-3">
                        <a href="detalle-producto.html"><a href="detalle-producto.html"><img
                           src="https://steamcdn-a.akamaihd.net/steam/apps/1085660/capsule_184x69.jpg?t=1575996168" alt="producto"></a></a>
                           <div class="datosproducto d-flex flex-column w-100 pl-2 pt-2 text-left">
                              <span class="nombreproducto mt-auto">Nombre del producto</span>
                              <span class="precioycantidad">Precio x Cantidad</span>
                           </div>
                        </div>
                        <div class="botones d-flex flex-column ml-auto h-100 text-right mr-2">
                           <a href="#eliminarfavorito" class="mb-auto ml-auto">
                              <i class="fas fa-heart-broken fa-3x text-danger"></i>
                           </a>
                        </div>
                     </div>
                  </div>
                  <!-- Historial tab -->
                  <div id="historytab" class="tab-pane fade shadow-lg pb-3 bg-pinky">
                     <h3 class="text-pinky text-white mx-auto pb-0 pt-2 w-100 text-center">Últimos 20 productos buscados... </h3>
                     <div class="historialdiv d-flex flex-column scrollbar1 my-2">
                        <div class="d-flex align-items-center">
                           <div class="d-flex pr-3 pl-3">
                              <a href="detalle-producto.html">
                                 <img src="https://steamcdn-a.akamaihd.net/steam/apps/1144110/capsule_184x69.jpg?t=1575677298"
                                 alt="producto">
                              </a>
                           </div>
                           <div class="d-flex flex-column pr-3">
                              <a href="detalle-producto.html">
                                 <img src="https://steamcdn-a.akamaihd.net/steam/apps/298610/capsule_184x69.jpg?t=1575565573"
                                 alt="producto">
                              </a>
                           </div>
                           <div class="d-flex flex-column pr-3">
                              <a href="detalle-producto.html">
                                 <img src="https://steamcdn-a.akamaihd.net/steam/apps/1180380/capsule_184x69.jpg?t=1575018122"
                                 alt="producto">
                              </a>
                           </div>
                           <div class="d-flex flex-column pr-3">
                              <a href="detalle-producto.html">
                                 <img src="https://steamcdn-a.akamaihd.net/steam/apps/1193900/capsule_184x69.jpg?t=1575059363"
                                 alt="producto">
                              </a>
                           </div>
                           <!-- <div class="d-flex flex-column pr-3">
                              <a href="detalle-producto.html">
                                 <img src="https://steamcdn-a.akamaihd.net/steam/apps/1193900/capsule_184x69.jpg?t=1575059363"
                                 alt="producto">
                              </a>
                           </div>
                           <div class="d-flex flex-column pr-3">
                              <a href="detalle-producto.html">
                                 <img src="https://steamcdn-a.akamaihd.net/steam/apps/1193900/capsule_184x69.jpg?t=1575059363"
                                 alt="producto">
                              </a>
                           </div>
                           <div class="d-flex flex-column pr-3">
                              <a href="detalle-producto.html">
                                 <img src="https://steamcdn-a.akamaihd.net/steam/apps/1180380/capsule_184x69.jpg?t=1575018122"
                                 alt="producto">
                              </a>
                           </div>
                           <div class="d-flex flex-column pr-3">
                              <a href="detalle-producto.html">
                                 <img src="https://steamcdn-a.akamaihd.net/steam/apps/1144110/capsule_184x69.jpg?t=1575677298"
                                 alt="producto">
                              </a>
                           </div>
                           <div class="d-flex flex-column pr-3">
                              <a href="detalle-producto.html">
                                 <img src="img/producto1.jpg"
                                 alt="producto">
                              </a>
                           </div>
                           <div class="d-flex flex-column pr-3">
                              <a href="detalle-producto.html">
                                 <img src="img/producto1.jpg"
                                 alt="producto">
                              </a>
                           </div>
                           <div class="d-flex flex-column pr-3">
                              <a href="detalle-producto.html">
                                 <img src="img/producto1.jpg"
                                 alt="producto">
                              </a>
                           </div>
                           <div class="d-flex flex-column pr-3">
                              <a href="detalle-producto.html">
                                 <img src="img/producto1.jpg"
                                 alt="producto">
                              </a>
                           </div>
                           <div class="d-flex flex-column pr-3">
                              <a href="detalle-producto.html">
                                 <img src="img/producto1.jpg"
                                 alt="producto">
                              </a>
                           </div>
                           <div class="d-flex flex-column pr-3">
                              <a href="detalle-producto.html">
                                 <img src="img/producto1.jpg"
                                 alt="producto">
                              </a>
                           </div>
                           <div class="d-flex flex-column pr-3">
                              <a href="detalle-producto.html">
                                 <img src="img/producto1.jpg"
                                 alt="producto">
                              </a>
                           </div>
                           <div class="d-flex flex-column pr-3">
                              <a href="detalle-producto.html">
                                 <img src="img/producto1.jpg"
                                 alt="producto">
                              </a>
                           </div>
                           <div class="d-flex flex-column pr-3">
                              <a href="detalle-producto.html">
                                 <img src="img/producto1.jpg"
                                 alt="producto">
                              </a>
                           </div>
                           <div class="d-flex flex-column pr-3">
                              <a href="detalle-producto.html">
                                 <img src="img/producto1.jpg"
                                 alt="producto">
                              </a>
                           </div>
                           <div class="d-flex flex-column pr-3">
                              <a href="detalle-producto.html">
                                 <img src="img/producto1.jpg"
                                 alt="producto">
                              </a>
                           </div>
                           <div class="d-flex flex-column pr-3">
                              <a href="detalle-producto.html">
                                 <img src="img/producto1.jpg"
                                 alt="producto">
                              </a>
                           </div>-->
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Fin Contenido tabs desktop -->
               
               <!-- Botones acordión de bottom panel mobile -->
               <div id="accordion" class="d-lg-none">
                  
                  <!-- Compras card -->
                  <div class="card">
                     <div class="card-header p-0" id="headingOne">
                        <a class="d-flex py-3 pl-3 collapsed" href="#collapseOne"
                        data-toggle="collapse" aria-expanded="false"
                        aria-controls="collapseOne">
                        Mis compras
                        <span class="flecha ml-auto mr-4 text-secondary">
                           <i class="fas fa-shopping-bag mr-1 align-middle"></i>
                           <span class="fas fa-angle-right align-middle"></span>
                        </span>
                     </a>
                  </div>
                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                  data-parent="#accordion">
                  <div class="productodiv d-flex flex-column">
                     <div class="d-flex justify-content-start w-100 mt-2 ml-2">
                        <a href="detalle-producto.html"><img src="img/producto1.jpg"
                           alt="producto"></a>
                           <div class="datosproducto d-flex flex-column w-100 h-100 ml-3">
                              <span class="nombreproducto mt-auto">Nombre del producto</span>
                              <span class="precioycantidad">Precio x Cantidad</span>
                              <span class="estadoenvio mt-auto">Estado del envío</span>
                           </div>
                        </div>
                        <div class="botones d-flex justify-content-around w-100 mt-auto mb-2">
                           <a href="#detalles"
                           class="detallesproducto btn btn-primary text-white">Ver
                           detalles</a>
                           <a href="#reportarproblema"
                           class="reportarprob btn btn-danger text-white">Reportar un
                           problema</a>
                        </div>
                     </div>
                     <div class="productodiv d-flex flex-column bg-success">
                        <div class="d-flex justify-content-start w-100 mt-2 ml-2">
                           <a href="detalle-producto.html"><img src="img/producto1.jpg"
                              alt="producto"></a>
                              <div
                              class="datosproducto d-flex flex-column w-100 h-100 ml-3 text-white">
                              <span class="nombreproducto mt-auto">Lorem ipsum dolor sit amet
                                 consectetur adipisicing elit. Inventore, ad?</span>
                                 <span class="precioycantidad">$25.000 x 1 unidad</span>
                                 <span class="estadoenvio mt-auto">Recibido</span>
                              </div>
                           </div>
                           <div class="botones d-flex justify-content-around w-100 mt-auto mb-2">
                              <a href="#detalles"
                              class="detallesproducto btn btn-primary text-white">Ver
                              detalles</a>
                              <a href="#reportarproblema"
                              class="reportarprob btn btn-danger text-white">Reportar un
                              problema</a>
                           </div>
                        </div>
                        <div class="productodiv d-flex flex-column bg-warning">
                           <div class="d-flex justify-content-start w-100 mt-2 ml-2">
                              <a href="detalle-producto.html"><img src="img/producto1.jpg"
                                 alt="producto"></a>
                                 <div
                                 class="datosproducto d-flex flex-column w-100 h-100 ml-3 text-white">
                                 <span class="nombreproducto mt-auto">Lorem ipsum dolor sit amet
                                    consectetur adipisicing elit. In maiores assumenda veniam!
                                    Neque, minima veniam.</span>
                                    <span class="precioycantidad">$25.000 x 1 unidad</span>
                                    <span class="estadoenvio mt-auto">Demorado</span>
                                 </div>
                              </div>
                              <div class="botones d-flex justify-content-around w-100 mt-auto mb-2">
                                 <a href="#detalles"
                                 class="detallesproducto btn btn-primary text-white">Ver
                                 detalles</a>
                                 <a href="#reportarproblema"
                                 class="reportarprob btn btn-danger text-white">Reportar un
                                 problema</a>
                              </div>
                           </div>
                           <div class="productodiv d-flex flex-column bg-danger">
                              <div class="d-flex justify-content-start w-100 mt-2 ml-2">
                                 <a href="detalle-producto.html"><img src="img/producto1.jpg"
                                    alt="producto"></a>
                                    <div
                                    class="datosproducto d-flex flex-column w-100 h-100 ml-3 text-white">
                                    <span class="nombreproducto mt-auto">Cámara digital 48mp</span>
                                    <span class="precioycantidad">$25.000 x 1 unidad</span>
                                    <span class="estadoenvio mt-auto">Cancelado</span>
                                 </div>
                              </div>
                              <div class="botones d-flex justify-content-around w-100 mt-auto mb-2">
                                 <a href="#detalles"
                                 class="detallesproducto btn btn-primary text-white">Ver
                                 detalles</a>
                                 <a href="#reportarproblema"
                                 class="reportarprob btn btn-warning text-white">Reportar un
                                 problema</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     
                     <!-- Ventas -->
                     <div class="card">
                        <div class="card-header p-0" id="headingTwo">
                           <a class="d-flex py-3 pl-3 collapsed" href="#collapseTwo"
                           data-toggle="collapse" aria-expanded="false"
                           aria-controls="collapseTwo">
                           Mis ventas
                           <span class="flecha ml-auto mr-4 text-secondary">
                              <i class="fas fa-money-bill-wave align-middle mr-1"></i>
                              <span class="fas fa-angle-right align-middle"></span>
                           </span>
                        </a>
                     </div>
                     <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                     data-parent="#accordion">
                     <div class="productodiv d-flex flex-column">
                        <div class="d-flex justify-content-start w-100 mt-2 ml-2">
                           <a href="detalle-producto.html"><img src="https://steamcdn-a.akamaihd.net/steam/apps/1085660/capsule_184x69.jpg?t=1575996168"
                              alt="producto"></a>
                              <div class="datosproducto d-flex flex-column w-100 h-100 ml-3">
                                 <span class="nombreproducto mt-auto">Nombre del producto</span>
                                 <span class="precioycantidad">Precio x Cantidad</span>
                                 <span class="estadoenvio mt-auto">Estado del envío</span>
                              </div>
                           </div>
                           <div class="botones d-flex justify-content-around w-100 mt-auto mb-2">
                              <a href="#detalles"
                              class="detallesproducto btn btn-primary text-white">Ver
                              detalles</a>
                              <a href="#reportarproblema"
                              class="reportarprob btn btn-danger text-white">Reportar un
                              problema</a>
                           </div>
                        </div>
                        <div class="productodiv d-flex flex-column bg-success">
                           <div class="d-flex justify-content-start w-100 mt-2 ml-2">
                              <a href="detalle-producto.html"><img src="https://steamcdn-a.akamaihd.net/steam/apps/1085660/capsule_184x69.jpg?t=1575996168"
                                 alt="producto"></a>
                                 <div
                                 class="datosproducto d-flex flex-column w-100 h-100 ml-3 text-white">
                                 <span class="nombreproducto mt-auto">Cámara digital 48mp</span>
                                 <span class="precioycantidad">$25.000 x 1 unidad</span>
                                 <span class="estadoenvio mt-auto">Recibido</span>
                              </div>
                           </div>
                           <div class="botones d-flex justify-content-around w-100 mt-auto mb-2">
                              <a href="#detalles"
                              class="detallesproducto btn btn-primary text-white">Ver
                              detalles</a>
                              <a href="#reportarproblema"
                              class="reportarprob btn btn-danger text-white">Reportar un
                              problema</a>
                           </div>
                        </div>
                        <div class="productodiv d-flex flex-column bg-warning">
                           <div class="d-flex justify-content-start w-100 mt-2 ml-2">
                              <a href="detalle-producto.html"><img src="https://steamcdn-a.akamaihd.net/steam/apps/1085660/capsule_184x69.jpg?t=1575996168"
                                 alt="producto"></a>
                                 <div
                                 class="datosproducto d-flex flex-column w-100 h-100 ml-3 text-white">
                                 <span class="nombreproducto mt-auto">Cámara digital 48mp</span>
                                 <span class="precioycantidad">$25.000 x 1 unidad</span>
                                 <span class="estadoenvio mt-auto">Demorado</span>
                              </div>
                           </div>
                           <div class="botones d-flex justify-content-around w-100 mt-auto mb-2">
                              <a href="#detalles"
                              class="detallesproducto btn btn-primary text-white">Ver
                              detalles</a>
                              <a href="#reportarproblema"
                              class="reportarprob btn btn-danger text-white">Reportar un
                              problema</a>
                           </div>
                        </div>
                        <div class="productodiv d-flex flex-column bg-danger">
                           <div class="d-flex justify-content-start w-100 mt-2 ml-2">
                              <a href="detalle-producto.html"><img src="https://steamcdn-a.akamaihd.net/steam/apps/1085660/capsule_184x69.jpg?t=1575996168"
                                 alt="producto"></a>
                                 <div
                                 class="datosproducto d-flex flex-column w-100 h-100 ml-3 text-white">
                                 <span class="nombreproducto mt-auto">Cámara digital 48mp</span>
                                 <span class="precioycantidad">$25.000 x 1 unidad</span>
                                 <span class="estadoenvio mt-auto">Cancelado</span>
                              </div>
                           </div>
                           <div class="botones d-flex justify-content-around w-100 mt-auto mb-2">
                              <a href="#detalles"
                              class="detallesproducto btn btn-primary text-white">Ver
                              detalles</a>
                              <a href="#reportarproblema"
                              class="reportarprob btn btn-warning text-white">Reportar un
                              problema</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  
                  <!-- Favoritos -->
                  <div class="card">
                     <div class="card-header p-0" id="headingThree">
                        <a class="d-flex py-3 pl-3 collapsed" href="#collapseThree"
                        data-toggle="collapse" aria-expanded="false"
                        aria-controls="collapseThree">
                        Favoritos
                        <span class="flecha ml-auto mr-4 text-secondary">
                           <i class="fas fa-heart mr-1 align-middle"></i>
                           <span class="fas fa-angle-right align-middle"></span>
                        </span>
                     </a>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                  data-parent="#accordion">
                  <div class="favoritodiv d-flex flex-column">
                     <div class="d-flex justify-content-start mt-2 ml-2">
                        <a href="detalle-producto.html"><img src="https://steamcdn-a.akamaihd.net/steam/apps/1085660/capsule_184x69.jpg?t=1575996168"
                           alt="producto"></a>
                           <span class="nombreproducto my-auto ml-2">Cámara digital 48mp</span>
                           <div
                           class="d-flex flex-column justify-content-end ml-auto mb-2 mr-2">
                           <a href="" class="mb-auto ml-auto"><i
                              class="fas fa-heart-broken fa-2x text-danger"></i>
                           </a>
                           <a href="#verproducto" class="btn btn-primary text-white">
                              Ver producto
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               
               <!-- Historial -->
               <div class="card">
                  <div class="card-header p-0" id="headingFour">
                     <a class="d-flex py-3 pl-3 collapsed" href="#collapseFour"
                     data-toggle="collapse" aria-expanded="false"
                     aria-controls="collapseFour">
                     Historial
                     <span class="flecha ml-auto mr-4 text-secondary">
                        <i class="fas fa-history mr-1 align-middle"></i>
                        <span class="fas fa-angle-right align-middle"></span>
                     </span>
                  </a>
               </div>
               <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
               data-parent="#accordion">
               <div class="historialdiv d-flex scrollbar1 align-items-center py-3">
                  <div class="d-flex flex-column pr-3 pl-3">
                     <a href="detalle-producto.html"><img src="img/producto1.jpg"
                        alt="producto"></a>
                     </div>
                     <div class="d-flex flex-column pr-3">
                        <a href="detalle-producto.html"><img src="img/producto1.jpg"
                           alt="producto"></a>
                        </div>
                    </div>
                    <!-- Fin Left panel desktop -->


                    <!-- Avatar header y bottom panel -->
                    <div class="col-12 col-lg-9">
                        <div class="row no-gutters">

                            <!-- Avatar header -->
                            <div class="col-lg-12 mb-lg-4">
                                <div class="d-flex flex-column align-items-center justify-content-center flex-lg-row flex-nowrap bg-light" id="avatarprofile">
                                    <span class="order-lg-3 mb-2 mr-lg-5 mb-lg-0 align-self-lg-center">
                                        <img src="img/user.png" alt="avatar">
                                    </span>

                                    <!-- Filler para centrar nombre en desktop usando flexbox -->
                                    <span class="d-none invisible d-lg-flex order-1 mb-2 ml-5 mb-0 align-self-lg-center">
                                        <img src="img/user.png" alt="avatar">
                                    </span>

                                    <div class="d-flex flex-column order-lg-2 flex-lg-row align-self-lg-end mb-lg-5 mx-lg-auto">
                                        <span class="nya mr-lg-2 mb-2 mb-lg-0">Nombre</span>
                                        <span class="nya">Apellido</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Fin Avatar header -->

                            <!-- Principio Bottom panel -->
                            <!-- Tabs Bottom panel desktop -->
                            <div class="col-lg-12 d-none d-lg-flex flex-nowrap" id="tabsbp">
                                <ul class="nav nav-tabs w-100">
                                    <li class="nav-item w-25 text-center">
                                        <a href="" data-target="#comprastab" data-toggle="tab" class="nav-link small text-uppercase active">
                                            <i class="fas fa-shopping-bag"></i>
                                            Mis compras
                                        </a>
                                    </li>
                                    <li class="nav-item w-25 text-center">
                                        <a href="" data-target="#ventastab" data-toggle="tab" class="nav-link small text-uppercase">
                                            <i class="fas fa-money-bill-wave"></i>
                                            Mis ventas
                                        </a>
                                    </li>
                                    <li class="nav-item w-25 text-center">
                                        <a href="" data-target="#favtab" data-toggle="tab" class="nav-link small text-uppercase">
                                            <i class="fas fa-heart"></i>
                                            Favoritos
                                        </a>
                                    </li>
                                    <li class="nav-item w-25 text-center">
                                        <a href="" data-target="#historytab" data-toggle="tab" class="nav-link small text-uppercase">
                                            <i class="fas fa-history"></i>
                                            Historial
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <!-- Bottom panel -->
                            <div class="col-lg-12 flex-nowrap scrollbar1 overflow-lg-auto" id="profilebp">

                                <!-- Contenido tabs desktop -->
                                <div class="tab-content d-none d-lg-block">

                                    <!-- Mis compras tab -->
                                    <div id="comprastab" class="tab-pane fade active show">

                                        <div class="productodiv d-flex align-items-center bg-white">
                                            <div class="d-flex justify-content-start align-items-center h-100 w-100 pl-2 pt-2">
                                                <a href="detalle-producto.html"><a href="detalle-producto.html"><img src="img/producto1.jpg" alt="producto"></a></a>
                                                <div class="datosproducto d-flex flex-column w-100 pl-2 pt-2 text-left">
                                                    <span class="nombreproducto mt-auto">Nombre del producto</span>
                                                    <span class="precioycantidad">Precio x Cantidad</span>
                                                    <span class="estadoenvio mt-auto">Estado del envío</span>
                                                </div>
                                            </div>
                                            <div class="botones d-flex flex-column ml-auto h-100 text-right mr-2">
                                                <a href="#detalles" class="detallesproducto">
                                                    Ver detalles
                                                    <i class="fas fa-info-circle text-info"></i>
                                                </a>
                                                <a href="#reportarproblema" class="reportarprob mt-auto">
                                                    Reportar un problema
                                                    <i class="fas fa-exclamation-triangle text-danger"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="productodiv d-flex align-items-center bg-success">
                                            <div class="d-flex justify-content-start align-items-center h-100 w-100 pl-2 pt-2">
                                                <a href="detalle-producto.html"><a href="detalle-producto.html"><img src="img/producto1.jpg" alt="producto"></a></a>
                                                <div class="datosproducto d-flex flex-column w-100 pl-2 pt-2 text-left">
                                                    <span class="nombreproducto mt-auto">Lorem ipsum dolor sit amet
                                                        consectetur adipisicing elit. Inventore, ad?</span>
                                                    <span class="precioycantidad">$25.000 x 1 unidad</span>
                                                    <span class="estadoenvio mt-auto">Recibido</span>
                                                </div>
                                            </div>
                                            <div class="botones d-flex flex-column ml-auto h-100 text-right mr-2">
                                                <a href="#detalles" class="detallesproducto">
                                                    Ver detalles
                                                    <i class="fas fa-info-circle text-info"></i>
                                                </a>
                                                <a href="#reportarproblema" class="reportarprob mt-auto">
                                                    Reportar un problema
                                                    <i class="fas fa-exclamation-triangle text-danger"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="productodiv d-flex align-items-center bg-warning">
                                            <div class="d-flex justify-content-start align-items-center h-100 w-100 pl-2 pt-2">
                                                <a href="detalle-producto.html"><a href="detalle-producto.html"><img src="img/producto1.jpg" alt="producto"></a></a>
                                                <div class="datosproducto d-flex flex-column w-100 pl-2 pt-2 text-left">
                                                    <span class="nombreproducto mt-auto">Lorem ipsum dolor sit amet
                                                        consectetur adipisicing elit. In maiores assumenda veniam!
                                                        Neque, minima veniam.</span>
                                                    <span class="precioycantidad">$25.000 x 1 unidad</span>
                                                    <span class="estadoenvio mt-auto">Demorado</span>
                                                </div>
                                            </div>
                                            <div class="botones d-flex flex-column ml-auto h-100 text-right mr-2">
                                                <a href="#detalles" class="detallesproducto">
                                                    Ver detalles
                                                    <i class="fas fa-info-circle text-info"></i>
                                                </a>
                                                <a href="#reportarproblema" class="reportarprob mt-auto">
                                                    Reportar un problema
                                                    <i class="fas fa-exclamation-triangle text-danger"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="productodiv d-flex align-items-center bg-danger">
                                            <div class="d-flex justify-content-start align-items-center h-100 w-100 pl-2 pt-2">
                                                <a href="detalle-producto.html"><a href="detalle-producto.html"><img src="img/producto1.jpg" alt="producto"></a></a>
                                                <div class="datosproducto d-flex flex-column w-100 pl-2 pt-2 text-left">
                                                    <span class="nombreproducto mt-auto">Cámara digital 48mp</span>
                                                    <span class="precioycantidad">$25.000 x 1 unidad</span>
                                                    <span class="estadoenvio mt-auto">Cancelado</span>
                                                </div>
                                            </div>
                                            <div class="botones d-flex flex-column ml-auto h-100 text-right mr-2">
                                                <a href="#detalles" class="detallesproducto">
                                                    Ver detalles
                                                    <i class="fas fa-info-circle text-info"></i>
                                                </a>
                                                <a href="#reportarproblema" class="reportarprob mt-auto">
                                                    Reportar un problema
                                                    <i class="fas fa-exclamation-triangle text-danger"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Mis ventas tab -->
                                    <div id="ventastab" class="tab-pane fade">
                                        <div class="productodiv d-flex align-items-center bg-white">
                                            <div class="d-flex justify-content-start align-items-center h-100 w-100 pl-2 pt-2">
                                                <a href="detalle-producto.html"><a href="detalle-producto.html"><img src="img/producto1.jpg" alt="producto"></a></a>
                                                <div class="datosproducto d-flex flex-column w-100 pl-2 pt-2 text-left">
                                                    <span class="nombreproducto mt-auto">Nombre del producto</span>
                                                    <span class="precioycantidad">Precio x Cantidad</span>
                                                    <span class="estadoenvio mt-auto">Estado del envío</span>
                                                </div>
                                            </div>
                                            <div class="botones d-flex flex-column ml-auto h-100 text-right mr-2">
                                                <a href="#detalles" class="detallesproducto mb-auto">
                                                    Ver detalles
                                                    <i class="fas fa-info-circle text-info"></i>
                                                </a>
                                                <a href="#detalles" class="detallescomp my-auto">
                                                    Detalles del comprador
                                                    <i class="fas fa-user-alt"></i>
                                                </a>
                                                <a href="#reportarproblema" class="reportarprob mt-auto">
                                                    Reportar un problema
                                                    <i class="fas fa-exclamation-triangle text-danger"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="productodiv d-flex align-items-center bg-success">
                                            <div class="d-flex justify-content-start align-items-center h-100 w-100 pl-2 pt-2">
                                                <a href="detalle-producto.html"><a href="detalle-producto.html"><img src="img/producto1.jpg" alt="producto"></a></a>
                                                <div class="datosproducto d-flex flex-column w-100 pl-2 pt-2 text-left">
                                                    <span class="nombreproducto mt-auto">Lorem ipsum dolor sit amet
                                                        consectetur adipisicing elit. Inventore, ad?</span>
                                                    <span class="precioycantidad">$25.000 x 1 unidad</span>
                                                    <span class="estadoenvio mt-auto">Recibido</span>
                                                </div>
                                            </div>
                                            <div class="botones d-flex flex-column ml-auto h-100 text-right mr-2">
                                                <a href="#detalles" class="detallesproducto mb-auto">
                                                    Ver detalles
                                                    <i class="fas fa-info-circle text-info"></i>
                                                </a>
                                                <a href="#detalles" class="detallescomp my-auto">
                                                    Detalles del comprador
                                                    <i class="fas fa-user-alt"></i>
                                                </a>
                                                <a href="#reportarproblema" class="reportarprob mt-auto">
                                                    Reportar un problema
                                                    <i class="fas fa-exclamation-triangle text-danger"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="productodiv d-flex align-items-center bg-warning">
                                            <div class="d-flex justify-content-start align-items-center h-100 w-100 pl-2 pt-2">
                                                <a href="detalle-producto.html"><a href="detalle-producto.html"><img src="img/producto1.jpg" alt="producto"></a></a>
                                                <div class="datosproducto d-flex flex-column w-100 pl-2 pt-2 text-left">
                                                    <span class="nombreproducto mt-auto">Lorem ipsum dolor sit amet
                                                        consectetur adipisicing elit. In maiores assumenda veniam!
                                                        Neque, minima veniam.</span>
                                                    <span class="precioycantidad">$25.000 x 1 unidad</span>
                                                    <span class="estadoenvio mt-auto">Demorado</span>
                                                </div>
                                            </div>
                                            <div class="botones d-flex flex-column ml-auto h-100 text-right mr-2">
                                                <a href="#detalles" class="detallesproducto mb-auto">
                                                    Ver detalles
                                                    <i class="fas fa-info-circle text-info"></i>
                                                </a>
                                                <a href="#detalles" class="detallescomp my-auto">
                                                    Detalles del comprador
                                                    <i class="fas fa-user-alt"></i>
                                                </a>
                                                <a href="#reportarproblema" class="reportarprob mt-auto">
                                                    Reportar un problema
                                                    <i class="fas fa-exclamation-triangle text-danger"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="productodiv d-flex align-items-center bg-danger">
                                            <div class="d-flex justify-content-start align-items-center h-100 w-100 pl-2 pt-2">
                                                <a href="detalle-producto.html"><a href="detalle-producto.html"><img src="img/producto1.jpg" alt="producto"></a></a>
                                                <div class="datosproducto d-flex flex-column w-100 pl-2 pt-2 text-left">
                                                    <span class="nombreproducto mt-auto">Cámara digital 48mp</span>
                                                    <span class="precioycantidad">$25.000 x 1 unidad</span>
                                                    <span class="estadoenvio mt-auto">Cancelado</span>
                                                </div>
                                            </div>
                                            <div class="botones d-flex flex-column ml-auto h-100 text-right mr-2">
                                                <a href="#detalles" class="detallesproducto mb-auto">
                                                    Ver detalles
                                                    <i class="fas fa-info-circle text-info"></i>
                                                </a>
                                                <a href="#detalles" class="detallescomp my-auto">
                                                    Detalles del comprador
                                                    <i class="fas fa-user-alt"></i>
                                                </a>
                                                <a href="#reportarproblema" class="reportarprob mt-auto">
                                                    Reportar un problema
                                                    <i class="fas fa-exclamation-triangle text-danger"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Favoritos tab -->
                                    <div id="favtab" class="tab-pane fade">
                                        <div class="favoritodiv d-flex align-items-center bg-white">
                                            <div class="d-flex justify-content-start align-items-center h-100 w-100 pl-2 pt-2">
                                                <a href="detalle-producto.html"><a href="detalle-producto.html"><img src="img/producto1.jpg" alt="producto"></a></a>
                                                <div class="datosproducto d-flex flex-column w-100 pl-2 pt-2 text-left">
                                                    <span class="nombreproducto mt-auto">Nombre del producto</span>
                                                    <span class="precioycantidad">Precio x Cantidad</span>
                                                </div>
                                            </div>
                                            <div class="botones d-flex flex-column ml-auto h-100 text-right mr-2">
                                                <a href="#eliminarfavorito" class="mb-auto ml-auto">
                                                    <i class="fas fa-heart-broken fa-3x text-danger"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Historial tab -->
                                    <div id="historytab" class="tab-pane fade">
                                        <h3 class="text-white mx-auto pb-0 pt-2 w-100 text-center">Últimos 20 productos buscados... </h3>
                                        <div class="historialdiv d-flex flex-column scrollbar1 my-2">
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex pr-3 pl-3">
                                                    <a href="detalle-producto.html">
                                                        <img src="img/producto1.jpg" alt="producto">
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-column pr-3">
                                                    <a href="detalle-producto.html">
                                                        <img src="img/producto1.jpg" alt="producto">
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-column pr-3">
                                                    <a href="detalle-producto.html">
                                                        <img src="img/producto1.jpg" alt="producto">
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-column pr-3">
                                                    <a href="detalle-producto.html">
                                                        <img src="img/producto1.jpg" alt="producto">
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-column pr-3">
                                                    <a href="detalle-producto.html">
                                                        <img src="img/producto1.jpg" alt="producto">
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-column pr-3">
                                                    <a href="detalle-producto.html">
                                                        <img src="img/producto1.jpg" alt="producto">
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-column pr-3">
                                                    <a href="detalle-producto.html">
                                                        <img src="img/producto1.jpg" alt="producto">
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-column pr-3">
                                                    <a href="detalle-producto.html">
                                                        <img src="img/producto1.jpg" alt="producto">
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-column pr-3">
                                                    <a href="detalle-producto.html">
                                                        <img src="img/producto1.jpg" alt="producto">
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-column pr-3">
                                                    <a href="detalle-producto.html">
                                                        <img src="img/producto1.jpg" alt="producto">
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-column pr-3">
                                                    <a href="detalle-producto.html">
                                                        <img src="img/producto1.jpg" alt="producto">
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-column pr-3">
                                                    <a href="detalle-producto.html">
                                                        <img src="img/producto1.jpg" alt="producto">
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-column pr-3">
                                                    <a href="detalle-producto.html">
                                                        <img src="img/producto1.jpg" alt="producto">
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-column pr-3">
                                                    <a href="detalle-producto.html">
                                                        <img src="img/producto1.jpg" alt="producto">
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-column pr-3">
                                                    <a href="detalle-producto.html">
                                                        <img src="img/producto1.jpg" alt="producto">
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-column pr-3">
                                                    <a href="detalle-producto.html">
                                                        <img src="img/producto1.jpg" alt="producto">
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-column pr-3">
                                                    <a href="detalle-producto.html">
                                                        <img src="img/producto1.jpg" alt="producto">
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-column pr-3">
                                                    <a href="detalle-producto.html">
                                                        <img src="img/producto1.jpg" alt="producto">
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-column pr-3">
                                                    <a href="detalle-producto.html">
                                                        <img src="img/producto1.jpg" alt="producto">
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-column pr-3">
                                                    <a href="detalle-producto.html">
                                                        <img src="img/producto1.jpg" alt="producto">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin Contenido tabs desktop -->

                                <!-- Botones acordión de bottom panel mobile -->
                                <div id="accordion" class="d-lg-none">

                                    <!-- Compras card -->
                                    <div class="card">
                                        <div class="card-header p-0" id="headingOne">
                                            <a class="d-flex py-3 pl-3 collapsed" href="#collapseOne" data-toggle="collapse" aria-expanded="false" aria-controls="collapseOne">
                                                Mis compras
                                                <span class="flecha ml-auto mr-4 text-secondary">
                                                    <i class="fas fa-shopping-bag mr-1 align-middle"></i>
                                                    <span class="fas fa-angle-right align-middle"></span>
                                                </span>
                                            </a>
                                        </div>
                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="productodiv d-flex flex-column">
                                                <div class="d-flex justify-content-start w-100 mt-2 ml-2">
                                                    <a href="detalle-producto.html"><img src="img/producto1.jpg" alt="producto"></a>
                                                    <div class="datosproducto d-flex flex-column w-100 h-100 ml-3">
                                                        <span class="nombreproducto mt-auto">Nombre del producto</span>
                                                        <span class="precioycantidad">Precio x Cantidad</span>
                                                        <span class="estadoenvio mt-auto">Estado del envío</span>
                                                    </div>
                                                </div>
                                                <div class="botones d-flex justify-content-around w-100 mt-auto mb-2">
                                                    <a href="#detalles" class="detallesproducto btn btn-primary text-white">Ver
                                                        detalles</a>
                                                    <a href="#reportarproblema" class="reportarprob btn btn-danger text-white">Reportar un
                                                        problema</a>
                                                </div>
                                            </div>
                                            <div class="productodiv d-flex flex-column bg-success">
                                                <div class="d-flex justify-content-start w-100 mt-2 ml-2">
                                                    <a href="detalle-producto.html"><img src="img/producto1.jpg" alt="producto"></a>
                                                    <div class="datosproducto d-flex flex-column w-100 h-100 ml-3 text-white">
                                                        <span class="nombreproducto mt-auto">Lorem ipsum dolor sit amet
                                                            consectetur adipisicing elit. Inventore, ad?</span>
                                                        <span class="precioycantidad">$25.000 x 1 unidad</span>
                                                        <span class="estadoenvio mt-auto">Recibido</span>
                                                    </div>
                                                </div>
                                                <div class="botones d-flex justify-content-around w-100 mt-auto mb-2">
                                                    <a href="#detalles" class="detallesproducto btn btn-primary text-white">Ver
                                                        detalles</a>
                                                    <a href="#reportarproblema" class="reportarprob btn btn-danger text-white">Reportar un
                                                        problema</a>
                                                </div>
                                            </div>
                                            <div class="productodiv d-flex flex-column bg-warning">
                                                <div class="d-flex justify-content-start w-100 mt-2 ml-2">
                                                    <a href="detalle-producto.html"><img src="img/producto1.jpg" alt="producto"></a>
                                                    <div class="datosproducto d-flex flex-column w-100 h-100 ml-3 text-white">
                                                        <span class="nombreproducto mt-auto">Lorem ipsum dolor sit amet
                                                            consectetur adipisicing elit. In maiores assumenda veniam!
                                                            Neque, minima veniam.</span>
                                                        <span class="precioycantidad">$25.000 x 1 unidad</span>
                                                        <span class="estadoenvio mt-auto">Demorado</span>
                                                    </div>
                                                </div>
                                                <div class="botones d-flex justify-content-around w-100 mt-auto mb-2">
                                                    <a href="#detalles" class="detallesproducto btn btn-primary text-white">Ver
                                                        detalles</a>
                                                    <a href="#reportarproblema" class="reportarprob btn btn-danger text-white">Reportar un
                                                        problema</a>
                                                </div>
                                            </div>
                                            <div class="productodiv d-flex flex-column bg-danger">
                                                <div class="d-flex justify-content-start w-100 mt-2 ml-2">
                                                    <a href="detalle-producto.html"><img src="img/producto1.jpg" alt="producto"></a>
                                                    <div class="datosproducto d-flex flex-column w-100 h-100 ml-3 text-white">
                                                        <span class="nombreproducto mt-auto">Cámara digital 48mp</span>
                                                        <span class="precioycantidad">$25.000 x 1 unidad</span>
                                                        <span class="estadoenvio mt-auto">Cancelado</span>
                                                    </div>
                                                </div>
                                                <div class="botones d-flex justify-content-around w-100 mt-auto mb-2">
                                                    <a href="#detalles" class="detallesproducto btn btn-primary text-white">Ver
                                                        detalles</a>
                                                    <a href="#reportarproblema" class="reportarprob btn btn-warning text-white">Reportar un
                                                        problema</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Ventas -->
                                    <div class="card">
                                        <div class="card-header p-0" id="headingTwo">
                                            <a class="d-flex py-3 pl-3 collapsed" href="#collapseTwo" data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo">
                                                Mis ventas
                                                <span class="flecha ml-auto mr-4 text-secondary">
                                                    <i class="fas fa-money-bill-wave align-middle mr-1"></i>
                                                    <span class="fas fa-angle-right align-middle"></span>
                                                </span>
                                            </a>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                            <div class="productodiv d-flex flex-column">
                                                <div class="d-flex justify-content-start w-100 mt-2 ml-2">
                                                    <a href="detalle-producto.html"><img src="img/producto1.jpg" alt="producto"></a>
                                                    <div class="datosproducto d-flex flex-column w-100 h-100 ml-3">
                                                        <span class="nombreproducto mt-auto">Nombre del producto</span>
                                                        <span class="precioycantidad">Precio x Cantidad</span>
                                                        <span class="estadoenvio mt-auto">Estado del envío</span>
                                                    </div>
                                                </div>
                                                <div class="botones d-flex justify-content-around w-100 mt-auto mb-2">
                                                    <a href="#detalles" class="detallesproducto btn btn-primary text-white">Ver
                                                        detalles</a>
                                                    <a href="#reportarproblema" class="reportarprob btn btn-danger text-white">Reportar un
                                                        problema</a>
                                                </div>
                                            </div>
                                            <div class="productodiv d-flex flex-column bg-success">
                                                <div class="d-flex justify-content-start w-100 mt-2 ml-2">
                                                    <a href="detalle-producto.html"><img src="img/producto1.jpg" alt="producto"></a>
                                                    <div class="datosproducto d-flex flex-column w-100 h-100 ml-3 text-white">
                                                        <span class="nombreproducto mt-auto">Cámara digital 48mp</span>
                                                        <span class="precioycantidad">$25.000 x 1 unidad</span>
                                                        <span class="estadoenvio mt-auto">Recibido</span>
                                                    </div>
                                                </div>
                                                <div class="botones d-flex justify-content-around w-100 mt-auto mb-2">
                                                    <a href="#detalles" class="detallesproducto btn btn-primary text-white">Ver
                                                        detalles</a>
                                                    <a href="#reportarproblema" class="reportarprob btn btn-danger text-white">Reportar un
                                                        problema</a>
                                                </div>
                                            </div>
                                            <div class="productodiv d-flex flex-column bg-warning">
                                                <div class="d-flex justify-content-start w-100 mt-2 ml-2">
                                                    <a href="detalle-producto.html"><img src="img/producto1.jpg" alt="producto"></a>
                                                    <div class="datosproducto d-flex flex-column w-100 h-100 ml-3 text-white">
                                                        <span class="nombreproducto mt-auto">Cámara digital 48mp</span>
                                                        <span class="precioycantidad">$25.000 x 1 unidad</span>
                                                        <span class="estadoenvio mt-auto">Demorado</span>
                                                    </div>
                                                </div>
                                                <div class="botones d-flex justify-content-around w-100 mt-auto mb-2">
                                                    <a href="#detalles" class="detallesproducto btn btn-primary text-white">Ver
                                                        detalles</a>
                                                    <a href="#reportarproblema" class="reportarprob btn btn-danger text-white">Reportar un
                                                        problema</a>
                                                </div>
                                            </div>
                                            <div class="productodiv d-flex flex-column bg-danger">
                                                <div class="d-flex justify-content-start w-100 mt-2 ml-2">
                                                    <a href="detalle-producto.html"><img src="img/producto1.jpg" alt="producto"></a>
                                                    <div class="datosproducto d-flex flex-column w-100 h-100 ml-3 text-white">
                                                        <span class="nombreproducto mt-auto">Cámara digital 48mp</span>
                                                        <span class="precioycantidad">$25.000 x 1 unidad</span>
                                                        <span class="estadoenvio mt-auto">Cancelado</span>
                                                    </div>
                                                </div>
                                                <div class="botones d-flex justify-content-around w-100 mt-auto mb-2">
                                                    <a href="#detalles" class="detallesproducto btn btn-primary text-white">Ver
                                                        detalles</a>
                                                    <a href="#reportarproblema" class="reportarprob btn btn-warning text-white">Reportar un
                                                        problema</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Favoritos -->
                                    <div class="card">
                                        <div class="card-header p-0" id="headingThree">
                                            <a class="d-flex py-3 pl-3 collapsed" href="#collapseThree" data-toggle="collapse" aria-expanded="false" aria-controls="collapseThree">
                                                Favoritos
                                                <span class="flecha ml-auto mr-4 text-secondary">
                                                    <i class="fas fa-heart mr-1 align-middle"></i>
                                                    <span class="fas fa-angle-right align-middle"></span>
                                                </span>
                                            </a>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                            <div class="favoritodiv d-flex flex-column">
                                                <div class="d-flex justify-content-start mt-2 ml-2">
                                                    <a href="detalle-producto.html"><img src="img/producto1.jpg" alt="producto"></a>
                                                    <span class="nombreproducto my-auto ml-2">Cámara digital 48mp</span>
                                                    <div class="d-flex flex-column justify-content-end ml-auto mb-2 mr-2">
                                                        <a href="" class="mb-auto ml-auto"><i class="fas fa-heart-broken fa-2x text-danger"></i>
                                                        </a>
                                                        <a href="#verproducto" class="btn btn-primary text-white">
                                                            Ver producto
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Historial -->
                                        <div class="card">
                                            <div class="card-header p-0" id="headingFour">
                                                <a class="d-flex py-3 pl-3 collapsed" href="#collapseFour" data-toggle="collapse" aria-expanded="false" aria-controls="collapseFour">
                                                    Historial
                                                    <span class="flecha ml-auto mr-4 text-secondary">
                                                        <i class="fas fa-history mr-1 align-middle"></i>
                                                        <span class="fas fa-angle-right align-middle"></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                                <div class="historialdiv d-flex scrollbar1 align-items-center py-3">
                                                    <div class="d-flex flex-column pr-3 pl-3">
                                                        <a href="detalle-producto.html"><img src="img/producto1.jpg" alt="producto"></a>
                                                    </div>
                                                    <div class="d-flex flex-column pr-3">
                                                        <a href="detalle-producto.html"><img src="img/producto1.jpg" alt="producto"></a>
                                                    </div>
                                                    <div class="d-flex flex-column pr-3">
                                                        <a href="detalle-producto.html"><img src="img/producto1.jpg" alt="producto"></a>
                                                    </div>
                                                    <div class="d-flex flex-column pr-3">
                                                        <a href="detalle-producto.html"><img src="img/producto1.jpg" alt="producto"></a>
                                                    </div>
                                                    <div class="d-flex flex-column pr-3">
                                                        <a href="detalle-producto.html"><img src="img/producto1.jpg" alt="producto"></a>
                                                    </div>
                                                    <div class="d-flex flex-column pr-3">
                                                        <a href="detalle-producto.html"><img src="img/producto1.jpg" alt="producto"></a>
                                                    </div>
                                                    <div class="d-flex flex-column pr-3">
                                                        <a href="detalle-producto.html"><img src="img/producto1.jpg" alt="producto"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Mi cuenta -->
                                        <div class="card">
                                            <div class="card-header p-0" id="headingFive">
                                                <a class="d-flex py-3 pl-3 collapsed" href="#collapseFive" data-toggle="collapse" aria-expanded="false" aria-controls="collapseFive">
                                                    Mi cuenta
                                                    <span class="flecha ml-auto mr-4 text-secondary">
                                                        <i class="fas fa-user-circle mr-1 align-middle"></i>
                                                        <span class="fas fa-angle-right align-middle"></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                                                <div class="list-group list-group-flush">
                                                    <button type="button" class="list-group-item list-group-item-success list-group-item-action">
                                                        Mi perfil
                                                    </button>
                                                    <button type="button" class="list-group-item list-group-item-success list-group-item-action">
                                                        Mis datos
                                                    </button>
                                                    <button type="button" class="list-group-item list-group-item-success list-group-item-action">
                                                        Facturación
                                                    </button>
                                                    <button type="button" class="list-group-item list-group-item-success list-group-item-action">
                                                        Direcciones
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Más -->
                                        <div class="card">
                                            <div class="card-header p-0" id="headingSix">
                                                <a class="d-flex py-3 pl-3 collapsed" href="#collapseSix" data-toggle="collapse" aria-expanded="false" aria-controls="collapseSix">
                                                    Más
                                                    <span class="flecha ml-auto mr-4 text-secondary">
                                                        <span class="fas fa-angle-right align-middle"></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                                                <div class="list-group list-group-flush">
                                                    <button type="button" class="list-group-item list-group-item-info list-group-item-action">
                                                        Reputación
                                                    </button>
                                                    <button type="button" class="list-group-item list-group-item-info list-group-item-action">
                                                        Estadísticas
                                                    </button>
                                                    <button type="button" class="list-group-item list-group-item-info list-group-item-action">
                                                        Reviews
                                                    </button>
                                                    <button type="button" class="list-group-item list-group-item-info list-group-item-action">
                                                        Seguridad
                                                    </button>
                                                    <button type="button" class="list-group-item list-group-item-danger list-group-item-action">
                                                        Reportar un problema
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Salir -->
                                        <div class="card">
                                            <div class="card-header p-0" id="headingSeven">
                                                <a class="d-flex py-3 pl-3" href="index.html">
                                                    Salir
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Fin Botones acordión de bottom panel mobile -->

                                </div>
                                <!-- Fin Bottom panel -->

                            </div>
                        </div>
                        <!-- Fin Avatar header y bottom panel -->

                    </div>


                    <!-- hasta aca va el contenido de la pagina -->
                </div>
            </div>
        </main>


        <?php include 'php/footer.php'; ?>



    </div>
    <!--fin container principal-->

    <?php require 'php/scripts.php'; ?>


</body>

</html>