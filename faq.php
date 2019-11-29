<!DOCTYPE html>
<html lang="en">

<head>
   <?php
   include 'head.php';
   ?>
</head>

<body>
   <div class="container-fluid m-0 p-0 bg-sky">
      <header>
         <?php
         include 'header.php';
         ?>
      </header>
      
      <main>
         <div class="container my-2 mx-auto py-2">
            <!-- a partir de aca va el contenido de la pagina -->
            
            
            
            <div class="row">
               <!-- DIV CONTENEDOR DE TODOS LOS COLAPSABLES E INDICE-->
               
               <!-- DIV INDICE-->
               <div id="indicefaq" class="col-sm-12 col-md-4 col-lg-4">
                  <h3> Índice </h3>
                  <ul class="list-group">
                     <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="#login"> Login </a>
                        <span class="badge badge-primary badge-pill">3</span>
                     </li>
                     <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="#envios"> Envíos </a>
                        <span class="badge badge-primary badge-pill">1</span>
                     </li>
                     <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="#pagos"> Pagos </a>
                        <span class="badge badge-primary badge-pill">2</span>
                     </li>
                  </ul>
               </div>
               <!-- FIN DIV INDICE-->
               
               <!-- INICIO COLAPSABLES -->
               <div class="accordion col-sm-12 col-md-8 col-lg-8" id="accordionExample">
                  <!-- CONTENEDOR COLAPSABLES-->
                  <h2> F.A.Q. </h2>
                  <div class="card">
                     <!-- PRIMER COLAPSABLE LOGIN-->
                     <h3 id="login"> Login </h3>
                     <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                              ¿Cómo me logueo? <i class="fas fa-chevron-down"></i>
                           </button>
                        </h2>
                     </div>
                     
                     <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                           Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                           <br>
                           <br>
                           <p> 
                              Calificá esta respuesta!
                              <br>
                              <a href=""><i class="far fa-thumbs-up"></i></a> <a href=""><i class="far fa-thumbs-down"></i></a> 
                           </p>
                        </div>
                        <div class="card-footer text-muted">
                           ¿Pudiste responder tu duda?
                           <br>
                           <a href="contact.php">¡Contactanos!</a>
                        </div>
                     </div>
                  </div> <!-- FIN PRIMER COLAPSABLE LOGIN-->
                  
                  <div class="card">
                     <!-- SEGUNDO COLAPSABLE LOGIN-->
                     <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              ¿Cómo me deslogueo? <i class="fas fa-chevron-down"></i>
                           </button>
                        </h2>
                     </div>
                     
                     <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                           Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                           <br>
                           <br>
                           <p> 
                              Calificá esta respuesta!
                              <br>
                              <a href=""><i class="far fa-thumbs-up"></i></a> <a href=""><i class="far fa-thumbs-down"></i></a> 
                           </p>
                        </div>
                        <div class="card-footer text-muted">
                           ¿Pudiste responder tu duda?
                           <br>
                           <a href="contact.php">¡Contactanos!</a>
                        </div>
                     </div>
                  </div> <!-- FIN SEGUNDO COLAPSABLE LOGIN-->
                  
                  <div class="card">
                     <!-- TERCER COLAPSABLE LOGIN-->
                     <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Olvidé mi contraseña <i class="fas fa-chevron-down"></i>
                           </button>
                        </h2>
                     </div>
                     
                     <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                           Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                           <br>
                           <br>
                           <p> 
                              Calificá esta respuesta!
                              <br>
                              <a href=""><i class="far fa-thumbs-up"></i></a> <a href=""><i class="far fa-thumbs-down"></i></a> 
                           </p>
                        </div>
                        <div class="card-footer text-muted">
                           ¿Pudiste responder tu duda?
                           <br>
                           <a href="contact.php">¡Contactanos!</a>
                        </div>
                     </div>
                  </div> <!-- FIN TERCER COLAPSABLE LOGIN-->
                  
                  
                  
                  <div class="card">
                     <!-- CUARTO COLAPSABLE-->
                     <h3 id="envios"> Envíos </h3>
                     <div class="card-header" id="headingFour">
                        <h2 class="mb-0">
                           <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                              ¿Cómo hago un envío? <i class="fas fa-chevron-down"></i>
                           </button>
                        </h2>
                     </div>
                     <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                        <div class="card-body">
                           Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                           <br>
                           <br>
                           <p> 
                              Calificá esta respuesta!
                              <br>
                              <a href=""><i class="far fa-thumbs-up"></i></a> <a href=""><i class="far fa-thumbs-down"></i></a> 
                           </p>
                        </div>
                        <div class="card-footer text-muted">
                           ¿Pudiste responder tu duda?
                           <br>
                           <a href="contact.php">¡Contactanos!</a>
                        </div>
                     </div>
                  </div> <!-- FIN CUARTO COLAPSABLE-->
                  
                  <div class="card">
                     <!-- QUINTO COLAPSABLE-->
                     <h3 id="pagos"> Pagos </h3>
                     <div class="card-header" id="headingFive">
                        <h2 class="mb-0">
                           <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                              ¿Cómo hago un pago? <i class="fas fa-chevron-down"></i>
                           </button>
                        </h2>
                     </div>
                     <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                        <div class="card-body">
                           Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                           <br>
                           <br>
                           <p> Calificá esta respuesta!
                              <br>
                              <a href=""><i class="far fa-thumbs-up"></i></a> <a href=""><i class="far fa-thumbs-down"></i></a> </p>
                           </div>
                           <div class="card-footer text-muted">
                              ¿Pudiste responder tu duda?
                              <br>
                              <a href="contact.php">¡Contactanos!</a>
                           </div>
                        </div>
                     </div> <!-- FIN QUINTO COLAPSABLE-->
                     
                     <div class="card">
                        <!-- SEXTO COLAPSABLE-->
                        <div class="card-header" id="headingSix">
                           <h2 class="mb-0">
                              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                 ¿Cómo recibo un pago? <i class="fas fa-chevron-down"></i>
                              </button>
                           </h2>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                           <div class="card-body">
                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                              <br>
                              <br>
                              <p> Calificá esta respuesta!
                                 <br>
                                 <a href=""><i class="far fa-thumbs-up"></i></a> <a href=""><i class="far fa-thumbs-down"></i></a> </p>
                              </div>
                              <div class="card-footer text-muted">
                                 ¿Pudiste responder tu duda?
                                 <br>
                                 <a href="contact.php">¡Contactanos!</a>
                              </div>
                           </div>
                        </div> <!-- FIN QUINTO COLAPSABLE-->
                        
                     </div> <!-- FIN CONTENEDOR COLAPSABLES-->
                     
                     <!-- FIN COLAPSABLES -->
                     <!-- hasta aca va el contenido de la pagina -->
                  </div>
               </main>
               
               
               <?php
               include 'footer.php';
               ?>
               
               
               
            </div><!--fin container principal-->
            
            <?php
            include 'script.php';
            ?>
            
            
         </body>
         
         </html>