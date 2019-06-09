<?php

include '../partials/conexion.php';

//vuelvo a guardar el id que me llega por get en una variable
$id = $_GET['id'];
//preparo la consulta para eliminar la receta y la ejecuto
$consultaRecetas = $dataBase->prepare("DELETE FROM Recipes WHERE id = ?");
$consultaRecetas->execute([$id]);
//borro el archivo de la foto que se subió junto con la Receta
unlink("recipePictures/usernameRecipePicture".$id.".jpg");

header('location:uploadRecipe.php');
 ?>
