<?php require_once('header.php'); ?>
<main>
  <div class="container my-5">
    <div class="row">
      <div class="col-6">
        <h3>Editar produto</h3>
        <?php $produto = getProduto(); ?>

        <form method="post">
          <input type="hidden" name="produto_id" value="<?= $produto['id'] ?>">
          <div class="form-group">
            <label for="nome">nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?= $produto['nome'] ?>">
          </div>
          <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="5"><?= $produto['descricao'] ?></textarea>
          </div>
          <div class="form-group">
            <label for="preco">Preço</label>
            <input type="text" name="preco" id="preco" class="form-control" value="<?= $produto['preco'] ?>">
          </div>
          <div class="form-group">
            <label for="categoria_id">Categoria</label>
            <select name="categoria_id" id="categoria_id" class="form-control" value="<?= $produto['categoria_id'] ?>">
              <option selected disabled>Escolha uma opção</option>
              <?php

              //select com categorias cadastrados no banco de dados
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
          <div class="form-group">
            <button class="btn btn-primary" name="action" value="editar-produto">Enviar</button>
          </div>
          <?php

          // caso tenha erro exibe um alert
          if (isset($erro)) {
            echo "<div class='alert alert-danger'>";
            echo "<p class='m-0'>$erro</p>";
            echo "</div>";
          }
          ?>
        </form>
      </div>
    </div>
  </div>
</main>
<?php require_once('footer.php'); ?>