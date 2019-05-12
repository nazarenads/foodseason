<?php
//Defino variables vacías para cada campo a completar
$email = "";
$username = "";
$password = "";
$passwordConfirm = "";
//Defino variables para cada error posible
$errorUsername = "";
$errorEmail = "";
$errorPassword = "";
$errorPicture = "";
$hayErrores = false;

//Si llega algo por POST
if ($_POST) {
//persistencia
  $email = $_POST["email"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $passwordConfirm = $_POST["passwordConfirm"];

}

if($_POST){

  //Tomo lo recibido y lo guardo sin espacios
  $username = trim($_POST["username"]);
  $email = trim($_POST["email"]);
  $password = trim($_POST["password"]);
  $passwordConfirm = trim($_POST["passwordConfirm"]);
  $profilePicture = $_FILES["profilePicture"];

  //Valido cada dato
  if($username == ""){
    $errorUsername = "Completá tu nombre de usuario!";
    $hayErrores = true;
  }
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errorEmail = "El email que ingresaste no es válido";
    $hayErrores = true;
  }
  if($password == ""){
    $errorPassword = "Completá tu contraseña!";
    $hayErrores = true;
  }
  else if (strlen($password)<4)
    {
      $errorPassword = "Tu contraseña debe tener al menos 4 caracteres!";
      $hayErrores = true;
    }else if($password != $passwordConfirm){
      $errorPassword = "Las contraseñas que ingresaste no coinciden!";
      $hayErrores = true;
    }

  //Si recibo una foto de perfil

  if(isset($_FILES["profilePicture"])){
      //si el dato de error es OK...
    if($_FILES["profilePicture"]["error"] === UPLOAD_ERR_OK){
      //guardo el nombre del archivo
      $pictureName = $_FILES["profilePicture"]["name"];
      //guardo el nombre temporal del archivo
      $origen = $_FILES["profilePicture"]["tmp_name"];
      //uso la informacion del path que es la url, para tomar y guardar la extension
      $ext = pathinfo($pictureName,PATHINFO_EXTENSION);

      $destino = "";
      $destino = $destino."archivos/";
      //genero la ruta donde guardo el archivo
      $destino = $destino.$username."fotodeperfil.".$ext;

      //guardo el archivo con esta funcion
      move_uploaded_file($origen,$destino);
      $errorPicture = "Subiste tu foto con éxito!";
      }
    }else{
        $errorPicture = "Ups! Hubo un error al subir tu foto";
        $hayErrores = true;
    }

// Si no hay ningún error guardo los datos validados en un array asociativo
    if(!$hayErrores){
      $userArray = [
      "username"=> $username,
      "email"=> $email,
      "profilePicture" => $username."profilePicture.".$ext,
      "password" => password_hash($password, PASSWORD_DEFAULT)];
      $userJson = json_encode($userArray);
      file_put_contents('usuarios.json',$userJson);
      header('Location:http://google.com');
    }




}





?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <title>Food Season - Registrarse</title>
  </head>
  <body>
    <?php include("partials/header.php") ?>

    <section class="register" id="register">
          <div class="container">
           <div class="formulario">


    		  <form action="signup.php" method="post" class="form-signup" enctype="multipart/form-data">

    		   <h3 class="form-signup-heading">¡Registrate!</h3>
    		   <div class="form-group">
    		    <input name="email" type="text" class="form-control" placeholder="Email" value="<?=$email?>">
            <?= $errorEmail ?>
    		   </div>
    		   <div class="form-group">
    		    <input name="username" type="text" class="form-control" placeholder="Usuario" value="<?=$username?>">
            <?= $errorUsername ?>
           </div>
            <div class="form-group">
    		    <input name="profilePicture" type="file" value="">
            <?= $errorPicture ?>
    		   </div>
    		   <div class="form-group">
    		    <input type="password" class="form-control" name="password" placeholder="Contraseña" value="<?=$password?>">
            <?= $errorPassword ?>
           </div>
            <div class="form-group">
    		    <input type="password" class="form-control" name="passwordConfirm" placeholder="Confirmar contraseña" value= "<?=$passwordConfirm?>">
    		   </div>
    		   <button class="btn btn-warning" style="width:100%" type="submit" name="submit">Enviar</button>
    		   <br/><br>
    		   <a class="btn btn-light" href="signin.php" role="button">¿Ya tenés una cuenta?</a>
    		   <a class="btn btn-light" href="#" role="button">¿Te olvidaste tu contraseña?</a>

          </form>

           </div>
         </div>
  </section>
