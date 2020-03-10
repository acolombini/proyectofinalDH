<?php 
session_start();
include 'php/checkCookies.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = '4 Osos Store';
    include 'php/head.php';
    ?>
</head>

<body>
   <div class="container-fluid m-0 p-0 bg-sky">
      <header>
      <?php require 'php/header.php'; ?>
      </header>
      
      <!-- a partir de aca va el contenido de la pagina -->          
      <main>
         <div class="container my-2 mx-auto py-2 odibee">
            <!-- EMPIEZA SLIDER  -->         
            <h2 class="text-center font-weight-bold my-4 fsize-5">Destacados</h2> 
            <div class="mt-5 container p-0">
               <div class="offset-1 col-10 shadow-lg p-2">


                  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                     </ol>
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <img src="https://steamcdn-a.akamaihd.net/steam/subs/399175/header_586x192.jpg?t=1571158550" class="d-block w-100" alt="...">
                           <div class="carousel-caption d-none d-lg-block">
                              <h5></h5>
                              <p></p>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <img src="https://steamcdn-a.akamaihd.net/steam/bundles/1232/qp43hbepcejfyfs1/header_586x192.jpg?t=1471647732" class="d-block w-100" alt="...">
                           <div class="carousel-caption d-none d-lg-block">
                              <h5></h5>
                              <p></p>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <img src="https://steamcdn-a.akamaihd.net/steam/subs/401587/header_586x192.jpg?t=1574100600" class="d-block w-100" alt="...">
                           <div class="carousel-caption d-none d-lg-block">
                              <h5></h5>
                              <p></p>
                           </div>
                        </div>
                     </div>
                     <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                     </a>
                  </div>

               </div>
            </div>
            
            <!-- fin slider -->
            
            
            
            <!-- INICIO CATEGORIAS / Generos -->
            <section>
               <h2 class="font-weight-bold text-center my-4 fsize-5"> Tendencias </h2>
               <div class="row d-flex justify-content-around mx-2">
                  <div class="shadow-lg col-5 col-lg-3 mr-1 mb-5 p-1"> <a href="lista.php">
                     <img src="https://steamcdn-a.akamaihd.net/steam/apps/105600/header.jpg?t=1568058714" class="card-img-top w-100" alt="foto de la categoria">
                     
                  </a>
               </div>
               
               <div class="shadow-lg col-5 col-lg-3 mr-1 mb-5 p-1 shadow-lg"> <a href="lista.php">
                  <img src="https://steamcdn-a.akamaihd.net/steam/apps/47890/header.jpg?t=1573488449" class="card-img-top w-100" alt="foto de la categoria">
                  
               </a>
            </div>
            
            <div class="shadow-lg col-5 col-lg-3 mr-1 mb-5 p-1"> <a href="lista.php">
               <img src="https://steamcdn-a.akamaihd.net/steam/apps/24870/header.jpg?t=1573321343" class="card-img-top w-100" alt="foto de la categoria">
               
            </a>
         </div>
         
         <div class="shadow-lg col-5 col-lg-3 mr-1 mb-5 p-1"> <a href="lista.php">
            <img src="https://steamcdn-a.akamaihd.net/steam/apps/706220/header.jpg?t=1571868744" class="card-img-top w-100" alt="foto de la categoria">
            
         </a>
      </div>
      
      <div class="shadow-lg col-5 col-lg-3 mr-1 mb-5 d-1one d-lg-block p-1"> <a href="lista.php">
         <img src="https://steamcdn-a.akamaihd.net/steam/apps/107410/header.jpg?t=1561619799" class="card-img-top w-100" alt="foto de la categoria">
         
      </a>
   </div>
   
   <div class="shadow-lg col-5 col-lg-3 mr-1 mb-5 d-1one d-lg-block p-1"> <a href="lista.php">
      <img src="https://steamcdn-a.akamaihd.net/steam/apps/1097840/header_alt_assets_2.jpg?t=1574378095" class="card-img-top w-100" alt="foto de la categoria">
      
   </a>
</div>  
</div>
</section>
<!-- FIN CATEGORIAS -->

<!-- INICIO NOSOTROS -->
<section>
   <div class="mb-5 shadow-lg p-4">
      <h2 class="font-weight-bold text-center "> Pro Tip</h2>
      <div class="row text-center">
         <p class="col-12"> Un Gamer No Muere. <b>RESPAWNEA</b> </p>
      </div>
      <div class="d-flex justify-content-end">
         <a href=""><button type="button" class="btn shadow btn-primary">Ver Más</button></a>
      </div>
   </section>
   <!-- FIN NOSOTROS -->
   
   
   <!-- hasta aca va el contenido de la pagina -->
</div>
</main>


<?php include 'php/footer.php'; ?>



</div><!--fin container principal-->

<?php require 'php/scripts.php'; ?>

</body>

</html>