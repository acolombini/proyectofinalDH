<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = 'Modelo';
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
                  <div id="profilelp" class="mr-4 w-100">
                     <div class="list-group list-group-flush">
                        <button type="button"
                        class="list-group-item list-group-item-dark list-group-item-action text-center font-weight-bold">
                        Mi cuenta
                     </button>
                     <button type="button" class="list-group-item list-group-item-warning list-group-item-action">
                        Hola
                     </button>
                     <button type="button" class="list-group-item list-group-item-warning list-group-item-action">
                        Qué
                     </button>
                     <button type="button" class="list-group-item list-group-item-warning list-group-item-action">
                        Tal
                     </button>
                     <button type="button" class="list-group-item list-group-item-warning list-group-item-action">
                        ?
                     </button>
                     <button type="button" class="list-group-item list-group-item-warning list-group-item-action">
                        ?
                     </button>
                  </div>
               </div>
            </div>
            <!-- Fin Left panel desktop -->
            
            
            <!-- Avatar header y bottom panel -->
            <div class="col-12 col-lg-9">
               <div class="row no-gutters">
                  
                  <!-- Avatar header -->
                  <div class="col-lg-12">
                     <div class="no-gutters d-flex flex-column align-items-center justify-content-center flex-lg-row justify-content-lg-end flex-nowrap align-lg-baseline"
                     id="avatarprofile">
                     <span class="fa-stack fa-5x order-lg-3 mb-2 mr-lg-3 mb-lg-0 align-self-lg-center">
                        <i class="fa fas fa-circle fa-stack-2x text-secondary"></i>
                        <i class="fas fa-user fa-stack-1x text-white"></i>
                     </span>
                     <span class="nya nuni mr-lg-2">Nombre</span>
                     <span class="nya nuni">Apellido</span>
                  </div>
               </div>
               <!-- Fin Avatar header -->
               
               <!-- Bottom panel -->
               <div class="col-lg-12 flex-nowrap mt-lg-4" id="profilebp">
                  
                  <!-- Tabs Bottom panel desktop -->
                  <ul class="nav d-none d-lg-flex nav-tabs">
                     <li class="nav-item w-25 text-center roundedleft">
                        <a href="" data-target="#comprastab" data-toggle="tab"
                        class="nav-link small text-uppercase active">Mis compras</a>
                     </li>
                     <li class="nav-item w-25 text-center">
                        <a href="" data-target="#ventastab" data-toggle="tab"
                        class="nav-link small text-uppercase">Mis ventas</a>
                     </li>
                     <li class="nav-item w-25 text-center">
                        <a href="" data-target="#favtab" data-toggle="tab"
                        class="nav-link small text-uppercase">Favoritos</a>
                     </li>
                     <li class="nav-item w-25 text-center roundedright">
                        <a href="" data-target="#historytab" data-toggle="tab"
                        class="nav-link small text-uppercase">Historial</a>
                     </li>
                  </ul>
                  
                  <!-- Contenido tabs desktop -->
                  <div class="tab-content d-none d-lg-block">
                     <!-- Mis compras tab -->
                     <div id="comprastab" class="tab-pane fade active show">
                        <div class="list-group list-group-flush">
                           <button type="button"
                           class="list-group-item list-group-item-info list-group-item-action">
                           Producto en camino <br />
                           (acá se puede poner imágenes de los productos junto con el
                           precio, estado del envío, etc)
                        </button>
                        <button type="button"
                        class="list-group-item list-group-item-danger list-group-item-action">
                        Compra cancelada
                     </button>
                     <button type="button"
                     class="list-group-item list-group-item-success list-group-item-action">
                     Compra exitosa
                  </button>
                  <button type="button"
                  class="list-group-item list-group-item-success list-group-item-action">
                  Compra exitosa
               </button>
               <button type="button"
               class="list-group-item list-group-item-success list-group-item-action">
               Compra exitosa
            </button>
         </div>
      </div>
      <!-- Mis ventas tab -->
      <div id="ventastab" class="tab-pane fade">
         <div class="list-group list-group-flush">
            <button type="button"
            class="list-group-item list-group-item-info list-group-item-action">
            Producto en camino <br />
            (acá se puede poner imágenes de los productos junto con el
            precio, estado del envío, etc)
         </button>
         <button type="button"
         class="list-group-item list-group-item-danger list-group-item-action">
         Venta cancelada
      </button>
      <button type="button"
      class="list-group-item list-group-item-success list-group-item-action">
      Venta exitosa
   </button>
   <button type="button"
   class="list-group-item list-group-item-success list-group-item-action">
   Venta exitosa
</button>
<button type="button"
class="list-group-item list-group-item-success list-group-item-action">
Venta exitosa
</button>
</div>
</div>
<!-- Favoritos tab -->
<div id="favtab" class="tab-pane fade">
   <div class="list-group list-group-flush">
      <button type="button"
      class="list-group-item list-group-item-warning list-group-item-action">
      1
   </button>
   <button type="button"
   class="list-group-item list-group-item-warning list-group-item-action">
   2
</button>
<button type="button"
class="list-group-item list-group-item-warning list-group-item-action">
3
</button>
<button type="button"
class="list-group-item list-group-item-warning list-group-item-action">
4
</button>
<button type="button"
class="list-group-item list-group-item-warning list-group-item-action">
5
</button>
</div>
</div>
<!-- Historial tab -->
<div id="historytab" class="tab-pane fade">
   <div class="list-group list-group-flush">
      <button type="button"
      class="list-group-item list-group-item-primary list-group-item-action">
      1
   </button>
   <button type="button"
   class="list-group-item list-group-item-primary list-group-item-action">
   2
</button>
<button type="button"
class="list-group-item list-group-item-primary list-group-item-action">
3
</button>
<button type="button"
class="list-group-item list-group-item-primary list-group-item-action">
4
</button>
<button type="button"
class="list-group-item list-group-item-primary list-group-item-action">
5
</button>
</div>
</div>
</div>
<!-- Fin Contenido tabs desktop -->

<!-- Botones acordión bottom panel mobile -->
<div id="accordion" class="d-lg-none">
   
   <!-- Compras card -->
   <div class="card">
      <div class="card-header p-0" id="headingOne">
         <a class="d-flex py-3 pl-3 nuni collapsed" href="#collapseOne"
         data-toggle="collapse" aria-expanded="false" aria-controls="collapseOne">
         Compras
         <span class="flecha ml-auto mr-4 text-secondary">
            <span class="fas fa-angle-right align-middle"></span>
         </span>
      </a>
   </div>
   <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
   data-parent="#accordion">
   <div class="list-group list-group-flush">
      <button type="button"
      class="list-group-item list-group-item-info list-group-item-action">
      Producto en camino <br />
      (acá se puede poner imágenes de los productos junto con el
      precio, estado del envío, etc)
   </button>
   <button type="button"
   class="list-group-item list-group-item-danger list-group-item-action">
   Compra cancelada
</button>
<button type="button"
class="list-group-item list-group-item-success list-group-item-action">
Compra exitosa
</button>
<button type="button"
class="list-group-item list-group-item-success list-group-item-action">
Compra exitosa
</button>
<button type="button"
class="list-group-item list-group-item-success list-group-item-action">
Compra exitosa
</button>
</div>
</div>
</div>

<!-- Ventas -->
<div class="card">
   <div class="card-header p-0" id="headingTwo">
      <a class="d-flex py-3 pl-3 nuni collapsed" href="#collapseTwo"
      data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo">
      Ventas
      <span class="flecha ml-auto mr-4 text-secondary">
         <span class="fas fa-angle-right align-middle"></span>
      </span>
   </a>
</div>
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
data-parent="#accordion">
<div class="list-group list-group-flush">
   <button type="button"
   class="list-group-item list-group-item-info list-group-item-action">
   Producto en camino <br />
   (acá se puede poner imágenes de los productos junto con el
   precio, estado del envío, etc)
</button>
<button type="button"
class="list-group-item list-group-item-danger list-group-item-action">
Venta cancelada
</button>
<button type="button"
class="list-group-item list-group-item-success list-group-item-action">
Venta exitosa
</button>
<button type="button"
class="list-group-item list-group-item-success list-group-item-action">
Venta exitosa
</button>
<button type="button"
class="list-group-item list-group-item-success list-group-item-action">
Venta exitosa
</button>
</div>
</div>
</div>

<!-- Favoritos -->
<div class="card">
   <div class="card-header p-0" id="headingThree">
      <a class="d-flex py-3 pl-3 nuni collapsed" href="#collapseThree"
      data-toggle="collapse" aria-expanded="false" aria-controls="collapseThree">
      Favoritos
      <span class="flecha ml-auto mr-4 text-secondary">
         <span class="fas fa-angle-right align-middle"></span>
      </span>
   </a>
</div>
<div id="collapseThree" class="collapse" aria-labelledby="headingThree"
data-parent="#accordion">
<div class="list-group list-group-flush">
   <button type="button"
   class="list-group-item list-group-item-warning list-group-item-action">
   1
</button>
<button type="button"
class="list-group-item list-group-item-warning list-group-item-action">
2
</button>
<button type="button"
class="list-group-item list-group-item-warning list-group-item-action">
3
</button>
<button type="button"
class="list-group-item list-group-item-warning list-group-item-action">
4
</button>
<button type="button"
class="list-group-item list-group-item-warning list-group-item-action">
5
</button>
</div>
</div>
</div>

<!-- Historial -->
<div class="card">
   <div class="card-header p-0" id="headingFour">
      <a class="d-flex py-3 pl-3 nuni collapsed" href="#collapseFour"
      data-toggle="collapse" aria-expanded="false" aria-controls="collapseFour">
      Historial
      <span class="flecha ml-auto mr-4 text-secondary">
         <span class="fas fa-angle-right align-middle"></span>
      </span>
   </a>
</div>
<div id="collapseFour" class="collapse" aria-labelledby="headingFour"
data-parent="#accordion">
<div class="list-group list-group-flush">
   <button type="button"
   class="list-group-item list-group-item-primary list-group-item-action">
   1
</button>
<button type="button"
class="list-group-item list-group-item-primary list-group-item-action">
2
</button>
<button type="button"
class="list-group-item list-group-item-primary list-group-item-action">
3
</button>
<button type="button"
class="list-group-item list-group-item-primary list-group-item-action">
4
</button>
<button type="button"
class="list-group-item list-group-item-primary list-group-item-action">
5
</button>
</div>
</div>
</div>

<!-- Mi cuenta -->
<div class="card">
   <div class="card-header p-0" id="headingFive">
      <a class="d-flex py-3 pl-3 nuni collapsed" href="#collapseFive"
      data-toggle="collapse" aria-expanded="false" aria-controls="collapseFive">
      Mi Cuenta
      <span class="flecha ml-auto mr-4 text-secondary">
         <span class="fas fa-angle-right align-middle"></span>
      </span>
   </a>
</div>
<div id="collapseFive" class="collapse" aria-labelledby="headingFive"
data-parent="#accordion">
<div class="list-group list-group-flush">
   <button type="button"
   class="list-group-item list-group-item-success list-group-item-action">
   Datos personales
</button>
<button type="button"
class="list-group-item list-group-item-success list-group-item-action">
Facturación
</button>
<button type="button"
class="list-group-item list-group-item-success list-group-item-action">
Direcciones
</button>
<button type="button"
class="list-group-item list-group-item-success list-group-item-action">
Cambiar contraseña
</button>
</div>
</div>
</div>

<!-- Más -->
<div class="card">
   <div class="card-header p-0" id="headingSix">
      <a class="d-flex py-3 pl-3 nuni collapsed" href="#collapseSix"
      data-toggle="collapse" aria-expanded="false" aria-controls="collapseSix">
      Más
      <span class="flecha ml-auto mr-4 text-secondary">
         <span class="fas fa-angle-right align-middle"></span>
      </span>
   </a>
</div>
<div id="collapseSix" class="collapse" aria-labelledby="headingSix"
data-parent="#accordion">
<div class="list-group list-group-flush">
   <button type="button"
   class="list-group-item list-group-item-info list-group-item-action">
   Reputación
</button>
<button type="button"
class="list-group-item list-group-item-info list-group-item-action">
Estadísticas
</button>
<button type="button"
class="list-group-item list-group-item-info list-group-item-action">
Reviews
</button>
<button type="button"
class="list-group-item list-group-item-danger list-group-item-action">
Reportar un problema
</button>
</div>
</div>
</div>

<!-- Salir -->
<div class="card">
   <div class="card-header p-0" id="headingSeven">
      <a class="d-flex py-3 pl-3 nuni" href="#salir">
         Salir
      </a>
   </div>
</div>

</div>
<!-- Botones acordión bottom panel mobile -->


</div>
<!-- Fin Bottom panel -->

</div>

<!-- Fin Avatar header y bottom panel -->
</div>
</div>


<!-- hasta aca va el contenido de la pagina -->
</div>
</main>


<?php include 'php/footer.php'; ?>



</div><!--fin container principal-->

<?php require 'php/scripts.php'; ?>

</body>

</html>