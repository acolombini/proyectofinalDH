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
         <div class="container my-2 mx-auto py-2 row">
            <!-- a partir de aca va el contenido de la pagina -->          
            
            <form class="col-12 col-md-12 col-lg-6">
               <h1>Contacto</h1>
               <div class="form-group">
                  <label for="nombre"> Nombre </label> <br> 
                  <input type="text" class="form-control" id="nombre" placeholder="" required>
                  <br>
                  <label for="apellido"> Apellido</label> <br>
                  <input type="text" class="form-control" id="apellido" placeholder="" required> <br>
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="ejemplo@ejemplo.com" required>
               </div>
               <div class="form-group">
                  <label for="exampleFormControlSelect1">Motivo de la consulta</label>
                  <select class="form-control" id="exampleFormControlSelect1" required>
                     
                     <option>Login</option>
                     <option>Compras</option>
                     <option>Ventas</option>
                     <option>Pago</option>
                     <option>Otros</option>
                  </select>
               </div>
               <div class="form-group">
                  <label for="exampleFormControlTextarea1">Mensaje</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Describa el problema de la forma más detallada posible..." required></textarea>
               </div>
               <div class="form-group">
                  <label for="exampleFormControlFile1">Archivo Adjunto</label>
                  <input type="file" class="form-control-file" id="exampleFormControlFile1">
               </div>
               <div class="col-auto my-1">
                  <button type="submit" class="btn btn-primary justify-content-center">Enviar</button>
                  <button type="reset" class="btn btn-secondary justify-content-center">Resetear</button>
               </div>
            </form>
            <div class="card col-lg-6 d-none d-lg-inline mt-5" style="width: 50rem">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.4522615026813!2d-60.64002428533246!3d-32.93906698092334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95b7aba38227104f%3A0x9fdf83d844878fe6!2sFundaci%C3%B3n%20Libertad!5e0!3m2!1ses-419!2sar!4v1572921257237!5m2!1ses-419!2sar" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
               <div class="card-body">
                  <h4 class="card-title">¿Dónde estamos?</h4>
                  <p class="card-text"> <i class="fas fa-map-marker-alt"></i> Mitre 170. Rosario, Santa Fe. </p>
                  <a href=tel:3413745048 class="btn btn-success"> <i class="fas fa-phone-square-alt"></i> Llamanos! </a>
                  <a href=email:ecommerce@ecommerce.com class="btn btn-primary"> <i class="far fa-envelope"></i> Envianos un Mail</a>
               </div>
            </div>
            <a href="https://api.whatsapp.com/send?phone=5493413745048&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Login." class="float" target="_blank">
               <i class="fab fa-whatsapp my-float"></i>
            </a>
            
            
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