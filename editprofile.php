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

if($_POST){

  //Tomo lo recibido y lo guardo sin espacios
  $email = trim($_POST["email"]);
  $password = trim($_POST["password"]);
  $passwordConfirm = trim($_POST["passwordConfirm"]);
  $profilePicture = $_FILES["profilePicture"];

if($password != $passwordConfirm){
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
      header('Location: signin.php');
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
    <link rel="stylesheet" href="css/editprofile.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <title>Food Season - Edit Profile</title>
  </head>
  <body>
    <?php include("partials/header.php") ?>
    <div class="container">
      <br>
        <h1 style="margin-top:60px;">Editar perfil</h1>
      <br>
      	<hr>
    	<div class="row">
          <div class="col-12">
            <div class="text-center">
              <img src="img\profiledefault.png" class="avatar" alt="avatar">
                <br>
              <div class="form-group">
                <br>
                <br>
              <input name="profilePicture" type="file" value="">
              <?= $errorPicture ?>
             </div>
            </div>
<br>
<br>
            <div class="formulario">
           <form action="editprofile.php" method="post" class="form-editprofile" enctype="multipart/form-data">
             <div class="form-group">
               <label for="username"><h4>Tu nombre de usuario es:</h4></label>
              <h4><?= $_SESSION['username'] ?> </h4>
             </div>

            <div class="form-group">
              <label for="email"><h4>Ingresa tu nuevo email:</h4></label>
             <input name="email" type="text" class="form-control" placeholder="Email" value="<?=$email?>">
             <?= $errorEmail ?>
            </div>

            <div class="form-group">
              <label for="password"><h4>Ingresa tu nueva contraseña:</h4></label>
             <input type="password" class="form-control" name="password" placeholder="Contraseña" value="<?=$password?>">
             <?= $errorPassword ?>
            </div>
             <div class="form-group">
               <label for="passwordConfirm"><h4>Confirma tu nueva contraseña:</h4></label>
             <input type="password" class="form-control" name="passwordConfirm" placeholder="Confirmar contraseña" value= "<?=$passwordConfirm?>">
            </div>
            <br>
            <br>
            <button class="btn btn-warning" style="width:30%; margin:auto; color:white;" type="submit" name="submit">Guardar cambios</button>
           </form>

            </div>

          </div>
      </div>
    </div>
    <hr>
  </section>
