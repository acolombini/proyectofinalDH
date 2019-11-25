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
      
      <!-- a partir de aca va el contenido de la pagina -->          
      <main class="registro">
         <div class="container my-2 mx-auto py-2 ">
            
            <!--<div class="text-left mb-3 pl-4">
               <a href="#"><i  class="fa fa-bell bg-transblack rounded-circle  p-2"></i> </a><span><b>Activar Notificaciones</b></span>
            </div>-->
            <!--formulario OBLIGATORIO -->
            <section class="ml-3 mr-3  ">
               <div class="container bg-transparent">
                  <form action="login.html" method="POST">
                     <div class=" shadow m-1 mb-3 p-4 bg-transblack" >
                        <h2 class="text-center mb-5">Obligatorio</h2>
                        <div class="bg-transparent container">
                           <div class="bg-transparent row">
                              <div class="bg-transparent col-12 col-md-6">
                                 <label class="mb-2" for="email">E-mail</label> 
                                 <input type="email" name="email" autofocus required class=" bg-light border-white p-1 px-4 col-12 mb-2 form-control shadow">
                                 <label for="clave" class="mb-2">Clave</label>
                                 <input type="password" name="clave" autofocus required class=" bg-light border-white  p-1 px-4 col-12 mb-2 form-control shadow">
                              </div>
                              <div class="bg-transparent col-12 col-md-6">
                                 <label for="nombre" class="mb-2">Nombre</label>
                                 <input type="text" name="nombre" autofocus required class=" bg-light border-white  p-1 px-4 col-12 mb-2 form-control shadow"> 
                                 <label for="apellido" class="mb-2">Apellido</label>
                                 <input type="text" name="apellido" autofocus required class=" bg-light border-white  p-1 px-4 col-12 mb-2 form-control shadow">
                              </div>
                           </div>
                           
                        </div>
                        
                     </div>
                     <!--formulario OPCIONAL -->
                     <div class="shadow m-1 mb-3 p-4 bg-transblack ">
                        <h2 class="text-center mb-5">Opcional</h2>
                        
                        <div class="container bg-transparent border-bottom border-dark mb-3 pb-3">
                           <label class="mb-2" for="tel">Teléfono</label> 
                           <div class="row bg-transparent align-items-baseline px-3">
                              
                              <input type="numbers" name="tel" autofocus placeholder="" class=" bg-light border-white  p-1 px-4 col-12 col-md-6 mb-2 form-control shadow">
                              <label class="mr-3 col" for="tipo-tel"> Celular </label>
                              <input class="mr-3 col" type="radio" name="tipo-tel" autofocus value="cel">
                              <label class="mr-3 col" for="tipo-tel"> Fijo </label>
                              <input class="mr-3 col" type="radio" name="tipo-tel" autofocus value="fijo">
                              <br>
                           </div>
                           
                        </div>
                        <div class="container bg-transparent border-bottom border-dark mb-3 pb-3">
                           <div class="row bg-transparent ">
                              <div class="col-12 col-md-6 bg-transparent">
                                 <label for="documento" class="mb-2">Documento</label>
                                 <input type="numbers" name="documento" autofocus placeholder="Número" class=" bg-light border-white  p-1 px-4 col-12 mb-2 form-control shadow">
                              </div>
                              <div class="col-12 col-md-6 bg-transparent">
                                 <label class="mb-2" for="tipo-documento">Tipo</label>
                                 <select class=" bg-light border-white  p-1 px-4 col-12 mb-2 form-control shadow" name="tipo-documento" id="tipo">
                                    <option value="DNI">DNI</option>
                                    <option value="DNI">DNI</option>
                                    <option value="DNI">DNI</option>
                                    <option value="DNI">DNI</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        
                        
                        <div class="container bg-transparent ">
                           <label for="direccion" class="mb-2">Dirección</label> <br>
                           
                           <div class="row bg-transparent">
                              <div class="col-12 col-md-6">
                                 
                                 <input type="text" name="direccion" autofocus class=" bg-light border-white  p-1 px-4 col-12 mb-2 form-control shadow" placeholder="Calle">
                                 <input type="text" name="direccion" autofocus class=" bg-light border-white  p-1 px-4 col-12 mb-2 form-control shadow " placeholder="Numero">  
                              </div>
                              
                              <div class="col-12 col-md-6">
                                 
                                 <input type="text" name="direccion" autofocus class=" bg-light border-white  p-1 px-4 col-12 mb-2 form-control shadow " placeholder="Piso">
                                 <input type="text" name="direccion" autofocus class=" bg-light border-white  p-1 px-4 col-12 mb-2 form-control shadow" placeholder="Departamento">
                              </div>
                           </div>
                           
                           
                           
                        </div>
                        <button class="btn-primary p-2  border-0 mt-3 ml-3">Registrarse</button>
                        
                        
                     </div>
                  </form>
               </div>
               
               
            </div>
         </main>
         <!-- hasta aca va el contenido de la pagina -->
         
         
         <?php
         include 'footer.php';
         ?>
         
         
         
      </div><!--fin container principal-->
      
      <?php
      include 'script.php';
      ?>
      
      
   </body>
   
   </html>