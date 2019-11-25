<!DOCTYPE html>
<html lang="en">

<head>
   <?php 
   include 'head.php';
   ?>
</head>

<body >
   <div class="container-fluid m-0 p-0 bg-sky">
      <header >
         <?php
         include 'header.php';
         ?>
      </header>
      
      <main>
         <div class="container mx-auto my-2 py-2 bg-transparent">
            <!-- a partir de aca va el contenido de la pagina -->          
            
            
            <!-- Row de login-->
            <div class="row no-gutter justify-content-center bg-transparent">
               
               <!-- Panel de login -->
               <div class="col-10  col-lg-7  bg-transparent shadow">
                  
                  <!-- Contenido de login-->
                  <div class="row login align-items-center justify-content-center bg-transparent">
                     
                     
                     <div class="px-4 px-md-0">
                        <h3 class="display-4 text-center text-md-left">Hola de nuevo!</h3>
                        <p class="text-muted mb-4 text-center text-md-left pl-md-1">Inicia sesión para no perderte nada.
                        </p>
                        
                        <!-- Formulario de login-->
                        <form action="profile.html" method="POST">
                           <div class="form-group mb-3">
                              <input id="inputEmail" type="email" placeholder="Dirección de correo" required=""
                              autofocus="" class="form-control border-0 shadow px-4">
                           </div>
                           <div class="form-group mb-3">
                              <input id="inputPassword" type="password" placeholder="Contraseña" required class="form-control border-0 shadow px-4 text-primary">
                           </div>
                           <div class="custom-control custom-checkbox mb-3">
                              <input id="customCheck1" type="checkbox" checked class="custom-control-input">
                              <label for="customCheck1" class="custom-control-label">Recordar contraseña</label>
                           </div>
                           <button type="submit" class="btn btn-primary btn-block mb-2 shadow">
                              Iniciar
                              sesión
                           </button>
                        </form>
                        <!-- Fin Formulario de login-->
                        
                        <a href="registro.php"
                        class="btn btn-info btn-block mb-2 shadow text-white">Registrarse</a>
                     </div>
                     <!-- Fin Contenido de login-->
                     
                  </div>
                  <!-- Fin Panel de ogin -->
                  
               </div>
               <!-- Fin Row de login-->
               
            </div>
            
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