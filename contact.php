<?php 
session_start();
include 'php/checkCookies.php';

// Tomo datos de contact.json
$contactos = file_get_contents ("db/contact.json");
$arrayDeContactos = json_decode($contactos, true);
$datosDelContacto = [];
// Declaro variables para la persistencia
$nombre = "";
$apellido = "";
$email = "";
$mensajeDeConsulta = "";
$archivo = "";

//Array para la persistencia del select
$motivoConsulta = [
   "login" => "Login",
   "compras" => "Compras",
   "ventas" => "Ventas",
   "pagos" => "Pagos",
   "otros" => "Otros"
];

// Asignacion de numero de reclamo / consulta
if (isset($arrayDeContactos)){
   $id = end($arrayDeContactos);
$ultimoid = $id["numerodeconsulta"] + 1;

} else {
   $ultimoid = 1;
}
// Fin asignacion de numero de reclamo / consulta
if($_POST){
   $errores = [];

   if (empty($_POST["name"])){
      $errores ["nombre"] = "Debe ingresar su nombre.";
   }
   if (empty($_POST["apellido"])){
      $errores ["apellido"] = "Debe ingresar su apellido.";
   }
   if (strlen($_POST["email"])==0){
      $errores ["email"] = "Debe ingresar su email.";
   }
   if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)==false){
      $errores ["email"] = "El email ingresado es incorrecto.";
   }
   if (empty($_POST["motivoconsulta"])){
      $errores ["motivoconsulta"] = "Debe ingresar un motivo de consulta";
   }
   if (strlen($_POST["mensajeDeConsulta"])<50){
      $errores ["mensajeDeConsulta"] = "El mensaje de su consulta debe tener al menos 50 caracteres.";
   }
   if ($_FILES["archivodecontacto"]["error"] != 0){
      $errores["archivodecontacto"] = "Hubo un error en la carga del archivo. Por favor, inténtelo nuevamente.";
   } else {
      $ext = pathinfo($_FILES["archivodecontacto"]["name"], PATHINFO_EXTENSION);
      if ($ext != "pdf" && $ext != "jpg" && $ext != "jpeg" && $ext != "png"){
         $errores["archivodecontacto"] = "El formato del archivo es incorrecto.";
      } else {
         move_uploaded_file($_FILES["archivodecontacto"]["tmp_name"],"archivosdecontacto/" . $ultimoid . "." . $ext);
      }
   }
   
      if (!$errores){
         $datosDelContacto = [
            "numerodeconsulta" => $ultimoid,
            "nombre" => $_POST["name"],
            "apellido" => $_POST["apellido"],
            "email" => $_POST["email"],
            "motivoconsulta" => $_POST["motivoconsulta"],
            "mensajedeconsulta" => $_POST["mensajeDeConsulta"],
            "archivodecontacto" => "db/archivosdecontacto/" . $ultimoid . "." . $ext
         ];
         $arrayDeContactos [] = $datosDelContacto;


         $json = json_encode ($arrayDeContactos);
         file_put_contents ("db/contact.json", $json);
         header('Location: contact.php');
      exit;
   }
   // persistencia
   $nombre = $_POST["name"];
   $apellido = $_POST["apellido"];
   $email = $_POST["email"];
   $mensajeDeConsulta = $_POST["mensajeDeConsulta"];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = 'Contacto';
    include 'php/head.php';
    ?>
</head>

<body>
   <div class="container-fluid m-0 p-0 bg-sky">
      <header>
      <?php require 'php/header.php'; ?>
      </header>
      
      <main>
         <div class="container my-2 mx-auto py-2 row">
            <!-- a partir de aca va el contenido de la pagina -->          
            
            <form class="col-12 col-md-12 col-lg-6" method="POST" enctype="multipart/form-data">
               <h1>Contacto</h1>
               <div class="form-group">
                  <label for="nombre"> Nombre </label> <br> 
                  <input type="text" name="name" class="form-control" id="nombre" required value="<?= isset($errores["name"]) ? "" : $nombre ?>">
                  <?= isset($errores["nombre"])? "<span style='color: red;'>" . $errores["nombre"] . "</span>" . "<br>" : "" ?> <br>
                  <label for="apellido"> Apellido</label> <br>
                  <input type="text" name="apellido" class="form-control" id="apellido" required value="<?= isset($errores["apellido"]) ? "" : $apellido ?>"> 
                  <?= isset($errores["apellido"])? "<span style='color: red;'>" .  $errores["apellido"] . "</span>" . "<br>" : "" ?> <br>
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" id="email" required placeholder="ejemplo@ejemplo.com" value="<?= isset($errores["email"]) ? "" : $email ?>">
                  <?= isset($errores["email"])? "<span style='color: red;'>" .  $errores["email"] . "</span>" . "<br>" : "" ?> <br>
               </div>
               <div class="form-group">
                  <label for="motivoconsulta">Motivo de la consulta</label>
                  <select class="form-control" name="motivoconsulta" required id="motivoconsulta">
                     <?php 
                     foreach ($motivoConsulta as $dato => $valor) :?>
                        <?php if($_POST["motivoconsulta"]== $dato) : ?>
                        <option value="<?= $dato ?>" selected> <?= $valor ?> 
                     </option>
                     <?php else :?>
                        <option value="<?= $dato ?>"> <?= $valor ?> 
                     </option>
                        <?php endif;?>
                     <?php endforeach; ?>
                     
                  </select>
                  <?= isset($errores["motivoconsulta"])? "<span style='color: red;'>" .  $errores["motivoconsulta"] . "</span>" . "<br>" : "" ?> <br>
               </div>
               <div class="form-group">
                  <label for="mensajeDeConsulta">Mensaje</label>
                  <textarea class="form-control" required name="mensajeDeConsulta" id="mensajeDeConsulta" rows="3" placeholder="Describa el problema de la forma más detallada posible..."><?= isset($errores["mensajeDeConsulta"])? "" : $mensajeDeConsulta ?></textarea>
               <?= isset($errores["mensajeDeConsulta"])? "<span style='color: red;'>" .  $errores["mensajeDeConsulta"] . "</span>" . "<br>" : "" ?>
               </div>
               <div class="form-group">
                  <label for="archivodecontacto">Archivo Adjunto</label>
                  <input type="file" class="form-control-file" name="archivodecontacto" id="archivodecontacto">
                  <span>Formatos soportados: .jpg, .jpeg, .pdf, .png</span>
                  <?= isset($errores["archivodecontacto"])? "<span style='color: red;'>" . "<br>" . $errores["archivodecontacto"] . "</span>" . "<br>" : ""  ?>
               </div>
               <div>
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
            <a href="https://api.whatsapp.com/send?phone=5493413745048&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20..." class="float" target="_blank">
               <i class="fab fa-whatsapp my-float"></i>
            </a>
            
            
            <!-- hasta aca va el contenido de la pagina -->
         </div>
      </main>
      
      
      <?php include 'php/footer.php'; ?>
      
      
      
   </div><!--fin container principal-->
   
   <?php require 'php/scripts.php'; ?>
   
   
</body>

</html>