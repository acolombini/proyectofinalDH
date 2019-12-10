<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = 'Detalle';
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
            
            <div class="row">
               
               <!-- breadcrumbs -->
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                     <li class="breadcrumb-item"><a href="lista-productos.html">Nombre Categoria</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Nombre Producto</li>
                  </ol>
               </nav>
               <!-- fin breadcrumbs -->
               
               <div>
                  <div class="card mt-4">
                     <div id="carouselExampleCaptions" class="carousel slide my-4" data-ride="carousel">
                        <ol class="carousel-indicators">
                           <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                           <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                           <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                           <div class="carousel-item active">
                              <img src="https://via.placeholder.com/900x350?text=foto 1" class="d-block w-100" alt="...">
                           </div>
                           <div class="carousel-item">
                              <img src="https://via.placeholder.com/900x350?text=foto 2" class="d-block w-100" alt="...">
                           </div>
                           <div class="carousel-item">
                              <img src="https://via.placeholder.com/900x350?text=foto 3" class="d-block w-100" alt="...">
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
                     
                     <div class="card-body">
                        
                        <h3 class="card-title">Product Name</h3>
                        <h4>$24.99</h4>
                        
                        <div class="list-group d-flex flex-sm-column flex-md-row">
                           <li class="list-group-item list-group-item-action text-center">
                              <div class="number-input">
                                 <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" ></button>
                                 <input class="quantity" min="0" name="quantity" value="1" type="number">
                                 <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                              </div>
                           </li>
                           <a href="#" class="list-group-item list-group-item-action text-center"><i class="fa fa-cart-plus mr-1" aria-hidden="true"></i>Añadir al carrito</a>
                           <a href="#" class="list-group-item list-group-item-action text-center"><i class="fa fa-heart-o mr-1" aria-hidden="true"></i>Añadir a Favoritos</a>
                           <a href="cart.html" class="list-group-item list-group-item-action text-center"><i class="fa fa-shopping-cart mr-1" aria-hidden="true"></i>Comprar Ahora</a>
                        </div>
                     </div>
                  </div>
                  <!-- /.card -->
                  
                  
                  <!-- /.card -->
                  
                  <div class="card card-outline-secondary my-4">
                     
                     <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link active" id="home-tab" data-toggle="tab" href="#descripcion" role="tab" aria-controls="descripcion" aria-selected="true">Descripcion</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="profile-tab" data-toggle="tab" href="#informacion" role="tab" aria-controls="informacion" aria-selected="false">Informacion Adicional</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="contact-tab" data-toggle="tab" href="#comentarios" role="tab" aria-controls="comentarios" aria-selected="false">Comentarios</a>
                        </li>
                     </ul>
                     <div class="tab-content" id="myTabContent">
                        
                        <div class="tab-pane fade show active" id="descripcion" role="tabpanel" aria-labelledby="home-tab">
                           <div class="card-body">
                              <p>
                                 Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda nesciunt consequatur consequuntur rem repellat eaque, necessitatibus fugiat officiis. Porro illo fuga rem nostrum quos dolore recusandae asperiores ab labore inventore vel eveniet voluptas voluptate nobis magni, praesentium quod sequi voluptatum sapiente! Optio sunt vitae dicta quibusdam repudiandae fugit maxime iste nihil nulla nostrum nobis at numquam aspernatur velit molestiae veritatis cum, enim assumenda facere. Tempora reprehenderit, vel iure culpa excepturi mollitia quibusdam atque recusandae quam a quos modi. Commodi eum sunt veritatis neque eligendi, incidunt in vero accusamus, vitae quae qui quod! Debitis dicta voluptate adipisci iure quo minima blanditiis?
                              </p>
                           </div>
                        </div>
                        
                        
                        <div class="tab-pane fade" id="informacion" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="card-body">
                              <p>
                                 Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda nesciunt consequatur consequuntur rem repellat eaque, necessitatibus fugiat officiis. Porro illo fuga rem nostrum quos dolore recusandae asperiores ab labore inventore vel eveniet voluptas voluptate nobis magni, praesentium quod sequi voluptatum sapiente! Optio sunt vitae dicta quibusdam repudiandae fugit maxime iste nihil nulla nostrum nobis at numquam aspernatur velit molestiae veritatis cum, enim assumenda facere. Tempora reprehenderit, vel iure culpa excepturi mollitia quibusdam atque recusandae quam a quos modi. Commodi eum sunt veritatis neque eligendi, incidunt in vero accusamus, vitae quae qui quod! Debitis dicta voluptate adipisci iure quo minima blanditiis?
                              </p>
                           </div>
                        </div>
                        
                        <div class="tab-pane fade" id="comentarios" role="tabpanel" aria-labelledby="contact-tab">
                           <div class="card-body">
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                              <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                              <hr>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                              <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                              <hr>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                              <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                              <hr>
                              <a href="#" class="btn btn-success">Leave a Review</a>
                           </div>
                        </div>
                     </div>
                     
                     
                     
                  </div>
                  <!-- /.col-lg-9 -->
                  
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