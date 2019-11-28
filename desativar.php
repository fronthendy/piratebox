<?php
include_once('header.php');
?>
<div class="container">
  <?php $produto = getProduto(); ?>


  <form method="post" class="col-6">
    <legend>Desativar produto</legend>
    <input type="hidden" name="produto_id" readonly value="<?= $produto['id'] ?>">
    <div class="form-group">
      <label for="nome">nome</label>
      <input type="text" name="nome" id="nome" readonly class="form-control" value="<?= $produto['nome'] ?>">
    </div>
    <div class="form-group">
      <label for="descricao">Descrição</label>
      <textarea name="descricao" id="descricao" readonly class="form-control" rows="5"><?= $produto['descricao'] ?></textarea>
    </div>
    <div class="form-group">
      <label for="preco">Preço</label>
      <input type="text" name="preco" id="preco" readonly class="form-control" value="<?= $produto['preco'] ?>">
    </div>
    <div class="form-group">
      <label for="categoria_id">Categoria</label>
      <select name="categoria_id" id="categoria_id" readonly class="form-control" value="<?= $produto['categoria_id'] ?>">
        <option selected disabled>Escolha uma opção</option>
        <?php
        foreach (getCategorias() as $categoria) {
          if ($categoria['id'] == $produto['categoria_id']) {
            echo "<option value='$categoria[id]' selected>$categoria[nome]</option>";
          } else {
            echo "<option value='$categoria[id]'>$categoria[nome]</option>";
          }
        }
        ?>
      </select>
    </div>
    <button name="desativar_produto" class="btn btn-danger">Desativar</button>
    <a href="index.php" class="btn btn-default">Voltar para lista</a>
  </form>
</div>
<?php
include_once('footer.php');
?>