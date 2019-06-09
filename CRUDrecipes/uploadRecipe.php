<?php
include '../partials/conexion.php';
//Defino variables vacias
$title = '';
$recipe = '';


//Tomo los datos que recibo por post y los guardo en variables
if($_POST){
  $title = $_POST['title'];
  $recipe = $_POST['recipe'];

//preparo la consulta que inserta datos en la tabla, la ejecuto y me guardo el valor del id en una variable
  $stmt = $dataBase->prepare("INSERT INTO recipes (Title, RecipeBody) VALUES (?,?)");
  $stmt->execute(["$title", "$recipe"]);
  $id = $dataBase->lastInsertId();

//si recibo una foto para la Receta
  if(isset($_FILES["recipePicture"])){
   //guardo el nombre del archivo
   $pictureName = $_FILES["recipePicture"]["name"];
   //guardo el nombre temporal del archivo
   $origen = $_FILES["recipePicture"]["tmp_name"];
   //uso la informacion del path que es la url, para tomar y guardar la extension
   $ext = pathinfo($pictureName,PATHINFO_EXTENSION);

  $destino = "";
  $destino = $destino."recipePictures/";
//genero la ruta donde guardo el archivo, acá falta que username se tome desde $_SESSION
  $destino = $destino."usernameRecipePicture".$id.".".$ext;
//guardo el archivo con esta funciongma
  move_uploaded_file($origen,$destino);
  }
//redirijo al post que se corresponde con esta ultima receta
  header('location:post.php?id='.$id);
  // var_dump($id);



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
     <link rel="stylesheet" href="../css/editprofile.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
     <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
     <title>Food Season - Subir receta</title>
   </head>
   <body>
     <?php include("../partials/header.php") ?>
     <div class="container">
       <br>
         <h1 style="margin-top:60px;">Publicar receta</h1>
       <br>
       	<hr>

             <div class="formulario">
            <form action="" method="post" class="form-uploadrecipe" enctype="multipart/form-data">

             <div class="form-group">
               <label for="title"><h4>Título:</h4></label>
              <input name="title" type="text" class="form-control" placeholder="Título" value="">
             </div>

             <div class="form-group">
               <input name="recipePicture" type="file" value="">
             </div>

             <div class="form-group">
               <label for="recipe"><h4>Receta:</h4></label>
              <textarea type="text" class="form-control" name="recipe" placeholder="Redactá acá tu receta..." value="" style="height:200px;"></textarea>
             </div>

             <button class="btn btn-warning" style="width:30%; margin:auto; color:white;" type="submit" name="submit">Subir</button>
            </form>

             </div>

           </div>
       </div>
     </div>
     <hr>
   </section>
