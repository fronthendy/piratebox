<?php
include_once('database.php');

// echo "entrei no functions";
// var_dump($connection);

$usuarios = $connection->query('SELECT * FROM usuario');
$usuarios = $usuarios->fetchAll();

// echo "<pre>";
// var_dump($usuarios);
