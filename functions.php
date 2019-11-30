<?php
//inclui conexão ao banco de dados
include_once('database.php');


$usuarios = $connection->query('SELECT * FROM usuario');
$usuarios = $usuarios->fetchAll();


//se form de login for enviado, faz validação
if (isset($_POST['action']) && $_POST['action'] == 'login') {

  $email = $_POST['email'];
  $senha = $_POST['senha'];

  //prepara a query para verificar usuario e senha de acordo com registro no banco
  $login = $connection->prepare("SELECT * FROM usuario WHERE email = :email AND senha = :senha");


  //atribui valor dos parametros
  $login->bindParam(':email', $email);
  $login->bindParam(':senha', $senha);


  //executa a query SQL
  $login->execute();


  //traz resultado da query como array associativo
  $users = $login->fetchAll(PDO::FETCH_ASSOC);

  //verifica se tem um usuario com email e senha correto
  if (count($users) >  0) {
    header('Location: index.php');
  } else {
    $erro = "acesso negado";
  }
}


//traz todos os produtos do banco de dados
function getProdutos()
{
  global $connection;
  $produtos = $connection->query('SELECT * FROM produto');
  $produtos = $produtos->fetchAll(PDO::FETCH_ASSOC);

  return $produtos;
}


// traz um produto de acordo com id passado no $_GET
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


// traz todas as categorias para preencher select de formularios
function getCategorias()
{
  global $connection;
  $categorias = $connection->query('SELECT * FROM categoria');
  $categorias = $categorias->fetchAll(PDO::FETCH_ASSOC);

  return $categorias;
}

// cadastro de produto
if (isset($_POST['action']) && $_POST['action'] == 'cadastrar-produto') {

  // pega os valores que o usuario digitou no formulario
  $nome = $_POST['nome'];
  $descricao = $_POST['descricao'];
  $preco = $_POST['preco'];
  $categoria_id = $_POST['categoria_id'];


  // valida se todos os campos foram preenchidos
  if ($nome != "" && $descricao != "" && $preco != "" && $categoria_id != "") {

    //prepara query
    $query = $connection->prepare("INSERT INTO produto (nome, descricao, preco, categoria_id) values (:nome, :descricao, :preco, :categoria_id)");

    //atribui valores dos parametros e executa query
    $resultado = $query->execute([
      ":nome" => $nome,
      ":descricao" => $descricao,
      ":preco" => $preco,
      ":categoria_id" => $categoria_id,
    ]);

    //redireciona para pagina inicial
    header('location: index.php');
  } else {
    $erro = "Preencha os campos corretamente!";
  }
}


// editar produto
if (isset($_POST['action']) && $_POST['action'] == 'editar-produto') {

  // pega os valores que o usuario digitou no formulario
  $id = $_POST['produto_id'];
  $nome = $_POST['nome'];
  $descricao = $_POST['descricao'];
  $preco = $_POST['preco'];
  $categoria_id = $_POST['categoria_id'];

  // valida se todos os campos foram preenchidos
  if ($nome != "" && $descricao != "" && $preco != "" && $categoria_id != "") {
    $query = $connection->prepare("UPDATE produto SET nome = :nome, descricao = :descricao, preco = :preco, categoria_id = :categoria_id WHERE id = :id");

    //atribui valores e executa query SQL
    $resultado = $query->execute([
      ":id" => $id,
      ":nome" => $nome,
      ":descricao" => $descricao,
      ":preco" => $preco,
      ":categoria_id" => $categoria_id,
    ]);

    // redireciona p/ pagina inicial
    header('location: index.php');
  } else {
    $erro = "Preencha os campos corretamente!";
  }
}


// desativar produto
if (isset($_POST['desativar_produto'])) {

  // verifica se tem o id do produto no $_GET
  if (isset($_POST['produto_id']) && $_POST['produto_id'] != "") {

    // prepara query para mudar status do produto de acordo com id
    $query = $connection->prepare("UPDATE produto SET status = 0 WHERE id = :id");

    //atribui valores e executa query
    $produtoEditado = $query->execute([
      ":id" => $_POST['produto_id']
    ]);
    header('location: index.php');
  } else {
    echo "<p class='alert alert-danger'>Preencha os campos corretamente!</p>";
  }
}
