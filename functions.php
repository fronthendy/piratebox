<?php
include_once('database.php');

$usuarios = $connection->query('SELECT * FROM usuario');
$usuarios = $usuarios->fetchAll();


if (isset($_POST['action']) && $_POST['action'] == 'login') {
  var_dump($_POST);

  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $login = $connection->prepare("SELECT * FROM usuario WHERE email = :email AND senha = :senha");

  $login->bindParam(':email', $email);
  $login->bindParam(':senha', $senha);

  $login->execute();

  $users = $login->fetchAll(PDO::FETCH_ASSOC);

  if (count($users) >  0) {
    header('Location: index.php');
  } else {
    echo "acesso negado";
  }
}

function getProdutos()
{
  global $connection;
  $produtos = $connection->query('SELECT * FROM produto');
  $produtos = $produtos->fetchAll(PDO::FETCH_ASSOC);

  return $produtos;
}
function getCategorias()
{
  global $connection;
  $categorias = $connection->query('SELECT * FROM categoria');
  $categorias = $categorias->fetchAll(PDO::FETCH_ASSOC);

  return $categorias;
}
