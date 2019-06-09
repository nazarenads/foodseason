<?php
include 'partials/conexion.php';

//vuelvo a guardar el id que me llega por get en una variable
$id = $_GET['id'];
//traigo la receta que quiero editar desde la base de datos y la almaceno en variables
$consultaRecetas = $dataBase->prepare("SELECT Title, RecipeBody FROM recipes WHERE id = ?");
$consultaRecetas->execute([$id]);
$receta = $consultaRecetas->fetch(PDO::FETCH_ASSOC);
$title = $receta['Title'];
$recipeBody = $receta ['RecipeBody'];

//si el usuario envía modificaciones por post entonces actualizo el dato en la base de datos
if($_POST){
$title = $_POST['title'];
$recipeBody = $_POST['recipe'];
$stmt = $dataBase->prepare("UPDATE recipes SET Title=?, RecipeBody=? WHERE id =?");
$stmt->execute(["$title", "$recipeBody", "$id"]);
header('location:post.php?id='.$id);
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
    <title>Food Season - Editar receta</title>
  </head>
  <body>
    <?php include("partials/header.php") ?>
    <div class="container">
      <br>
        <h1 style="margin-top:60px;">Editar receta</h1>
      <br>
       <hr>

            <div class="formulario">
           <form action="" method="post" class="form-uploadrecipe" enctype="multipart/form-data">

            <div class="form-group">
              <label for="title"><h4>Título:</h4></label>
             <input name="title" type="text" class="form-control" value="<?= $title ?>">
            </div>

            <div class="form-group">
              <label for="recipe"><h4>Receta:</h4></label>
             <textarea type="text" class="form-control" name="recipe" style="height:200px;"><?=$recipeBody?></textarea>
            </div>

          <button class="btn btn-warning" style="width:30%; margin:auto; color:white;" type="submit" name="submit">Guardar</button>
           </form>

            </div>

          </div>
      </div>
    </div>
    <hr>
  </section>
