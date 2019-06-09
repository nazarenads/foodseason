<?php

include 'partials/conexion.php';

$id = $_GET['id'];
$consultaRecetas = $dataBase->prepare("SELECT Title, RecipeBody, ID FROM recipes WHERE id = ?");
$consultaRecetas->execute([$id]);
$receta = $consultaRecetas->fetch(PDO::FETCH_ASSOC);

// var_dump($receta);
// echo "El titulo de la receta es ".$receta ["title"]."<br>"." El procedimiento es:".$receta[""];

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
    <title>Tu receta</title>
  </head>
  <body>
    <?php include("partials/header.php") ?>
    <div class="container">
      <article class="get">
    <h2>Tu receta</h2>
  <div class="container">
    <div class="card" style="margin-top:30px; width: 18rem;">
      <img class="card-img-top" src="archivos/usernameRecipePicture<?=$receta['ID']?>.jpg" alt="<?=$receta['Title']?>">
      <div class="card-body">
      <h5 class="card-title" style= "color: black;"><?= $receta['Title'] ?></h5>
      <p class="card-text" style= "color: black;"><?= $receta['RecipeBody']?></p>
      <a href="updateRecipe.php?id=<?=$receta['ID']?>" class="btn btn-warning" style="width:30%; margin:auto; color:white;">Editar</a>
      <a href="deleteRecipe.php?id=<?=$receta['ID']?>" class="btn btn-warning" style="width:30%; margin:auto; color:white;">Eliminar</a>
      </div>
    </div>


  </div>

</article>







    </div>
    <hr>
  </section>
