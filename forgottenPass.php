<?php
//Defino variables vacías para cada campo a completar
$username = "";
$secretAnswer="";

//Defino variables para cada error posible
$errorUsername = "";
$errorSecretAnswer = "";
$errorUsernameVerify = "";
$errorQuestionVerify = "";
$errorSecretAnswerVerify = "";
$hayErrores = false;
$hayErroresDeVerificacion = false;

//Recupero los datos del usuario guardados en Json y los paso a un array
$usuarioGuardadoJson = file_get_contents('usuarios.json');
$usuarioGuardadoEnArray = json_decode($usuarioGuardadoJson, true);

//Si recibo información por post

if($_POST){
  //Tomo lo recibido y lo guardo sin espacios
  $username = trim($_POST["username"]);
  $secretAnswer = trim($_POST["secretAnswer"]);

  //Valido cada dato
  if($username == ""){
    $errorUsername = "Completá tu nombre de usuario!";
    $hayErrores = true;
  }
  if($secretAnswer == ""){
    $errorPassword = "Completá tu respuesta secreta!";
    $hayErrores = true;
  }
  if ($_POST) {
  $selected_question= $_POST["question"];
  }

  // Si no hay ningún error compruebo que coincidan los datos ingresados con los almacenados
      if(!$hayErrores){

        if($username !== $usuarioGuardadoEnArray["username"]){
          $errorUsernameVerify = "El nombre de usuario que ingresaste es incorrecto";
          $hayErroresDeVerificacion = true;
        }
        if($selected_question !== $usuarioGuardadoEnArray["question"]){
          $errorQuestionVerify = "La pregunta seleccionada es incorrecta";
          $hayErroresDeVerificacion = true;
        }
        if(!password_verify($secretAnswer, $usuarioGuardadoEnArray["secretAnswer"])){
          $errorSecretAnswerVerify = "La respuesta secreta que ingresaste es incorrecta";
          $hayErroresDeVerificacion = true;
        }
        //Si los datos coinciden con los almacenados, redirijo al usuario
          if(!$hayErroresDeVerificacion){
          header('Location: recoverPass.php');
          }
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
    <link rel="stylesheet" href="css/stylesunified.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <title>Food Season - Recuperar contraseña</title>
  </head>
  <body class = "forgotten-recover-body">
    <?php include("partials/header.php") ?>

    <section class="register" id="login">
          <div class="container">
           <div class="formulario">


    		  <form action="forgottenPass.php" method="post" class="form-signup">
    		   <h3 class="form-signup-heading">¡Recuperemos tu contraseña!</h3>
    		   <div class="form-group">
    		    <input name="username" type="text" class="form-control" placeholder="Usuario" value="<?= $username ?>">
            <?= $errorUsername ?>
            <?= $errorUsernameVerify ?>
           </div>
           <div class="form-group">
             <select class="form-control" name="question" >
               <option selected>Selecciona una pregunta de seguridad</option>
               <option value="mascota">Nombre de tu primer mascota. </option>
               <option value="comida">Nombre de tu comida favorita.</option>
               <option value="infancia">Nombre de tu mejor amigo de la infancia.</option>
             </select>
             <?= $errorQuestionVerify ?>

           </div>
           <div class="form-group">
            <input type="password" class="form-control" name="secretAnswer" placeholder="Ingresa tu respuesta secreta" value= "<?=$secretAnswer?>">
            <?= $errorSecretAnswer ?>
            <?= $errorSecretAnswerVerify ?>
           </div>
    		   <button class="btn btn-warning" style="width:50%" id="submit" type="submit" name="subm">Recuperar contraseña</button>
    		   <br/><br>
    		   <a class="btn btn-light" href="signup.php" role="button">¿Todavía no tenés una cuenta?</a>

    		  </form>

           </div>
          </div>
    </section>



















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
