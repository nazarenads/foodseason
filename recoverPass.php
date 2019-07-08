<?php
//Defino variables vacías para cada campo a completar
$password = "";
$passwordConfirm = "";
$errorPassword = "";
$hayErrores = false;

//Si llega algo por POST

if($_POST){

  //Tomo lo recibido y lo guardo sin espacios
  $password = trim($_POST["password"]);
  $passwordConfirm = trim($_POST["passwordConfirm"]);

  //Valido cada dato
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


// Si no hay ningún error guardo los datos validados en un array asociativo
    if(!$hayErrores){
      // $userArray = [
      // "username"=> $username,
      // "email"=> $email,
      // "profilePicture" => $username."profilePicture.".$ext,
      // "question" => $selected_question,
      // "secretAnswer" => password_hash($secretAnswer, PASSWORD_DEFAULT),
      // "password" => password_hash($password, PASSWORD_DEFAULT)];
      $json = file_get_contents('usuarios.json');
      $data = json_decode($json, true);
      $data['password'] = password_hash($password, PASSWORD_DEFAULT);
      $userJson = json_encode($data);
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
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <title>Food Season - Cambiar Contraseña</title>
  </head>
  <body class= "forgotten-recover-body">
    <?php include("partials/header.php") ?>

    <section class="register" id="register">
          <div class="container">
           <div class="formulario">
    		  <form action="recoverPass.php" method="post" class="form-signup" enctype="multipart/form-data">
    		   <h3 class="form-signup-heading">¡Crea una nueva contraseña!</h3>
    		   <div class="form-group">
    		    <input type="password" class="form-control" name="password" placeholder="Contraseña" value="<?=$password?>">
            <?= $errorPassword ?>
           </div>
            <div class="form-group">
    		    <input type="password" class="form-control" name="passwordConfirm" placeholder="Confirmar contraseña" value= "<?=$passwordConfirm?>">
    		   </div>
    		   <button class="btn btn-warning" style="width:100%" type="submit" name="submit">Cambiar contraseña</button>
    		   <br/><br>
    		   <a class="btn btn-light" href="signin.php" role="button">Ingresar a tu cuenta</a>

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
