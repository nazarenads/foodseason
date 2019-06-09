<?php
//Instanciaremos una nueva conexión a la base de datos a través de PDO.

$dsn = 'mysql:host=127.0.0.1;dbname=foodseasondb;port=3306';
$user='root';
$pass='';

$dataBase = new PDO($dsn, $user, $pass);
