<?php
include_once('database.php');

$usuarios = $connection->query('SELECT * FROM usuario');
$usuarios = $usuarios->fetchAll();


if (isset($_POST['action']) && $_POST['action'] == 'login') {

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
    $erro = "acesso negado";
  }
}

function getProdutos()
{
  global $connection;
  $produtos = $connection->query('SELECT * FROM produto');
  $produtos = $produtos->fetchAll(PDO::FETCH_ASSOC);

  return $produtos;
}

function getProduto()
{
  global $connection;
  if (isset($_GET['produto_id'])) {
    $query = $connection->prepare("SELECT * FROM produto WHERE id = :id");
    $produto = $query->execute([
      ":id" => $_GET['produto_id']
    ]);
    $produto = $query->fetch(PDO::FETCH_ASSOC);
    return $produto;
  } else {
    header('Location: index.php'); //se o id for invalido, redireciona para pagina inicial
  }
}

function getCategorias()
{
  global $connection;
  $categorias = $connection->query('SELECT * FROM categoria');
  $categorias = $categorias->fetchAll(PDO::FETCH_ASSOC);

  return $categorias;
}

if (isset($_POST['action']) && $_POST['action'] == 'cadastrar-produto') {
  $nome = $_POST['nome'];
  $descricao = $_POST['descricao'];
  $preco = $_POST['preco'];
  $categoria_id = $_POST['categoria_id'];

  if ($nome != "" && $descricao != "" && $preco != "" && $categoria_id != "") {
    $query = $connection->prepare("INSERT INTO produto (nome, descricao, preco, categoria_id) values (:nome, :descricao, :preco, :categoria_id)");
    $resultado = $query->execute([
      ":nome" => $nome,
      ":descricao" => $descricao,
      ":preco" => $preco,
      ":categoria_id" => $categoria_id,
    ]);
    header('location: index.php');
  } else {
    $erro = "Preencha os campos corretamente!";
  }
}

if (isset($_POST['action']) && $_POST['action'] == 'editar-produto') {
  $id = $_POST['produto_id'];
  $nome = $_POST['nome'];
  $descricao = $_POST['descricao'];
  $preco = $_POST['preco'];
  $categoria_id = $_POST['categoria_id'];

  if ($nome != "" && $descricao != "" && $preco != "" && $categoria_id != "") {
    $query = $connection->prepare("UPDATE produto SET nome = :nome, descricao = :descricao, preco = :preco, categoria_id = :categoria_id WHERE id = :id");
    $resultado = $query->execute([
      ":id" => $id,
      ":nome" => $nome,
      ":descricao" => $descricao,
      ":preco" => $preco,
      ":categoria_id" => $categoria_id,
    ]);
    header('location: index.php');
  } else {
    $erro = "Preencha os campos corretamente!";
  }
}

if (isset($_POST['desativar_produto'])) {
  if (isset($_POST['produto_id']) && $_POST['produto_id'] != "") {
    $query = $connection->prepare("UPDATE produto SET status = 0 WHERE id = :id");
    $produtoEditado = $query->execute([
      ":id" => $_POST['produto_id']
    ]);
    // header('location: index.php');
    var_dump($produtoEditado);
  } else {
    echo "<p class='alert alert-danger'>Preencha os campos corretamente!</p>";
  }
}
