<?php require_once('header.php'); ?>
<main>
  <div class="container my-5">
    <div class="row">
      <div class="col-6">
        <h3>Cadastrar novo produto</h3>
        <form method="post">
          <div class="form-group">
            <label for="nome">nome</label>
            <input type="text" name="nome" id="nome" class="form-control">
          </div>
          <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="5"></textarea>
          </div>
          <div class="form-group">
            <label for="preco">Preço</label>
            <input type="text" name="preco" id="preco" class="form-control">
          </div>
          <div class="form-group">
            <label for="categoria_id">Categoria</label>
            <select name="categoria_id" id="categoria_id" class="form-control">
              <option selected disabled>Escolha uma opção</option>
              <?php
              // traz categorias cadastrados no banco de dados 
              foreach (getCategorias() as $categoria) {
                echo "<option value='$categoria[id]'>$categoria[nome]</option>";
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <button class="btn btn-primary" name="action" value="cadastrar-produto">Enviar</button>
          </div>
          <?php

          // exibe mensagem de erro
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