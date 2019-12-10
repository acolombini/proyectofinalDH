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
                     <div class="list-group list-group-flush mb-4 bg-light">
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
                  <div class="list-group list-group-flush bg-light flex-grow-1">
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
               <div class="col-lg-12 mb-lg-4">
                  <div class="d-flex flex-column align-items-center justify-content-center flex-lg-row flex-nowrap bg-light"
                  id="avatarprofile">
                  <span class="order-lg-3 mb-2 mr-lg-5 mb-lg-0 align-self-lg-center">
                     <img src="img/user.png" alt="avatar">
                  </span>
                  
                  <!-- Filler para centrar nombre en desktop usando flexbox -->
                  <span class="d-none invisible d-lg-flex order-1 mb-2 ml-5 mb-0 align-self-lg-center">
                     <img src="img/user.png" alt="avatar">
                  </span>
                  
                  <div
                  class="d-flex flex-column order-lg-2 flex-lg-row align-self-lg-end mb-lg-5 mx-lg-auto">
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
                  <a href="" data-target="#comprastab" data-toggle="tab"
                  class="nav-link small text-uppercase active">
                  <i class="fas fa-shopping-bag"></i>
                  Mis compras
               </a>
            </li>
            <li class="nav-item w-25 text-center">
               <a href="" data-target="#ventastab" data-toggle="tab"
               class="nav-link small text-uppercase">
               <i class="fas fa-money-bill-wave"></i>
               Mis ventas
            </a>
         </li>
         <li class="nav-item w-25 text-center">
            <a href="" data-target="#favtab" data-toggle="tab"
            class="nav-link small text-uppercase">
            <i class="fas fa-heart"></i>
            Favoritos
         </a>
      </li>
      <li class="nav-item w-25 text-center">
         <a href="" data-target="#historytab" data-toggle="tab"
         class="nav-link small text-uppercase">
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
            <div
            class="d-flex justify-content-start align-items-center h-100 w-100 pl-2 pt-2">
            <a href="detalle-producto.html"><a href="detalle-producto.html"><img
               src="img/producto1.jpg" alt="producto"></a></a>
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
            <div
            class="d-flex justify-content-start align-items-center h-100 w-100 pl-2 pt-2">
            <a href="detalle-producto.html"><a href="detalle-producto.html"><img
               src="img/producto1.jpg" alt="producto"></a></a>
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
               <div
               class="d-flex justify-content-start align-items-center h-100 w-100 pl-2 pt-2">
               <a href="detalle-producto.html"><a href="detalle-producto.html"><img
                  src="img/producto1.jpg" alt="producto"></a></a>
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
                  <div
                  class="d-flex justify-content-start align-items-center h-100 w-100 pl-2 pt-2">
                  <a href="detalle-producto.html"><a href="detalle-producto.html"><img
                     src="img/producto1.jpg" alt="producto"></a></a>
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
                  <div
                  class="d-flex justify-content-start align-items-center h-100 w-100 pl-2 pt-2">
                  <a href="detalle-producto.html"><a href="detalle-producto.html"><img
                     src="img/producto1.jpg" alt="producto"></a></a>
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
                  <div
                  class="d-flex justify-content-start align-items-center h-100 w-100 pl-2 pt-2">
                  <a href="detalle-producto.html"><a href="detalle-producto.html"><img
                     src="img/producto1.jpg" alt="producto"></a></a>
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
                     <div
                     class="d-flex justify-content-start align-items-center h-100 w-100 pl-2 pt-2">
                     <a href="detalle-producto.html"><a href="detalle-producto.html"><img
                        src="img/producto1.jpg" alt="producto"></a></a>
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
                        <div
                        class="d-flex justify-content-start align-items-center h-100 w-100 pl-2 pt-2">
                        <a href="detalle-producto.html"><a href="detalle-producto.html"><img
                           src="img/producto1.jpg" alt="producto"></a></a>
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
                        <div
                        class="d-flex justify-content-start align-items-center h-100 w-100 pl-2 pt-2">
                        <a href="detalle-producto.html"><a href="detalle-producto.html"><img
                           src="img/producto1.jpg" alt="producto"></a></a>
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
                              <a href="detalle-producto.html"><img src="img/producto1.jpg"
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
                        <a href="detalle-producto.html"><img src="img/producto1.jpg"
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
                        <div class="d-flex flex-column pr-3">
                           <a href="detalle-producto.html"><img src="img/producto1.jpg"
                              alt="producto"></a>
                           </div>
                           <div class="d-flex flex-column pr-3">
                              <a href="detalle-producto.html"><img src="img/producto1.jpg"
                                 alt="producto"></a>
                              </div>
                              <div class="d-flex flex-column pr-3">
                                 <a href="detalle-producto.html"><img src="img/producto1.jpg"
                                    alt="producto"></a>
                                 </div>
                                 <div class="d-flex flex-column pr-3">
                                    <a href="detalle-producto.html"><img src="img/producto1.jpg"
                                       alt="producto"></a>
                                    </div>
                                    <div class="d-flex flex-column pr-3">
                                       <a href="detalle-producto.html"><img src="img/producto1.jpg"
                                          alt="producto"></a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              
                              <!-- Mi cuenta -->
                              <div class="card">
                                 <div class="card-header p-0" id="headingFive">
                                    <a class="d-flex py-3 pl-3 collapsed" href="#collapseFive"
                                    data-toggle="collapse" aria-expanded="false"
                                    aria-controls="collapseFive">
                                    Mi cuenta
                                    <span class="flecha ml-auto mr-4 text-secondary">
                                       <i class="fas fa-user-circle mr-1 align-middle"></i>
                                       <span class="fas fa-angle-right align-middle"></span>
                                    </span>
                                 </a>
                              </div>
                              <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                              data-parent="#accordion">
                              <div class="list-group list-group-flush">
                                 <button type="button"
                                 class="list-group-item list-group-item-success list-group-item-action">
                                 Mi perfil
                              </button>
                              <button type="button"
                              class="list-group-item list-group-item-success list-group-item-action">
                              Mis datos
                           </button>
                           <button type="button"
                           class="list-group-item list-group-item-success list-group-item-action">
                           Facturación
                        </button>
                        <button type="button"
                        class="list-group-item list-group-item-success list-group-item-action">
                        Direcciones
                     </button>
                  </div>
               </div>
            </div>
            
            <!-- Más -->
            <div class="card">
               <div class="card-header p-0" id="headingSix">
                  <a class="d-flex py-3 pl-3 collapsed" href="#collapseSix"
                  data-toggle="collapse" aria-expanded="false"
                  aria-controls="collapseSix">
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
      class="list-group-item list-group-item-info list-group-item-action">
      Seguridad
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



</div><!--fin container principal-->

<?php require 'php/scripts.php'; ?>


</body>

</html>