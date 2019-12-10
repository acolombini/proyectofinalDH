<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = 'Lista';
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
            
            
            <!-- breadcrumbs -->
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Nombre Categoria</li>
               </ol>
            </nav>
            
            <!-- fin breadcrumbs -->
            
            <!-- slider -->
            <h2 class="text-center font-weight-bold">Destacados</h2>
            
            <div id="carouselExampleCaptions" class="carousel slide my-4" data-ride="carousel">
               <ol class="carousel-indicators">
                  <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
               </ol>
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <a href="detalle-producto.html" target="_self">
                        <img src="https://via.placeholder.com/900x350?text=destacado 1" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                           <h5>Nombre Producto</h5>
                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, ab!.</p>
                        </div>
                     </a>
                  </div>
                  <div class="carousel-item">
                     <a href="detalle-producto.html" target="_self">
                        <img src="https://via.placeholder.com/900x350?text=destacado 2" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                           <h5>Nombre Producto</h5>
                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, ab!.</p>
                        </div>
                     </a>
                  </div>
                  <div class="carousel-item">
                     <a href="detalle-producto.html" target="_self">
                        <img src="https://via.placeholder.com/900x350?text=destacado 3" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                           <h5>Nombre Producto</h5>
                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, ab!.</p>
                        </div>
                     </a>
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
            <!-- fin slider -->
            
            <!-- tabla productos -->
            <h2 class="text-center font-weight-bold m-4">Nuestros Productos</h2>
            <div class="row">
               <!-- articulo -->
               <div class="col-lg-3 col-md-6 mb-4">
                  <div class="box">
                     <div class="card h-100">
                        <img class="d-block w-100" src="https://via.placeholder.com/700x400?text=foto producto">
                        <div class="card-body">
                           <h4 class="card-title">
                              <a href="#">Nombre Producto</a>
                           </h4>
                           <h5>$99.99</h5>
                           <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                        </div>
                        <div class="card-footer">
                           <a href="detalle-producto.html" target="_self"><button class="btn btn-primary" type="submit"> ver mas</button></a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- fin articulo -->
               <!-- articulo -->
               <div class="col-lg-3 col-md-6 mb-4">
                  <div class="box">
                     <div class="card h-100">
                        <img class="d-block w-100" src="https://via.placeholder.com/700x400?text=foto producto">
                        <div class="card-body">
                           <h4 class="card-title">
                              <a href="#">Nombre Producto</a>
                           </h4>
                           <h5>$99.99</h5>
                           <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                        </div>
                        <div class="card-footer">
                           <a href="detalle-producto.html" target="_self"><button class="btn btn-primary" type="submit"> ver mas</button></a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- fin articulo -->
               <!-- articulo -->
               <div class="col-lg-3 col-md-6 mb-4">
                  <div class="box">
                     <div class="card h-100">
                        <img class="d-block w-100" src="https://via.placeholder.com/700x400?text=foto producto">
                        <div class="card-body">
                           <h4 class="card-title">
                              <a href="#">Nombre Producto</a>
                           </h4>
                           <h5>$99.99</h5>
                           <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                        </div>
                        <div class="card-footer">
                           <a href="detalle-producto.html" target="_self"><button class="btn btn-primary" type="submit"> ver mas</button></a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- fin articulo -->
               <!-- articulo -->
               <div class="col-lg-3 col-md-6 mb-4">
                  <div class="box">
                     <div class="card h-100">
                        <img class="d-block w-100" src="https://via.placeholder.com/700x400?text=foto producto">
                        <div class="card-body">
                           <h4 class="card-title">
                              <a href="#">Nombre Producto</a>
                           </h4>
                           <h5>$99.99</h5>
                           <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                        </div>
                        <div class="card-footer">
                           <a href="detalle-producto.html" target="_self"><button class="btn btn-primary" type="submit"> ver mas</button></a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- fin articulo -->
               
               
               
               
               
               
               
               
            </div>
            <!-- tabla productos -->
            
            <!-- hasta aca va el contenido de la pagina -->
         </div>
      </main>
      
      
      <?php include 'php/footer.php'; ?>
      
      
      
   </div><!--fin container principal-->
   
   <?php require 'php/scripts.php'; ?>
   
</body>

</html>