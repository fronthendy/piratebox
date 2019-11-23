<?php require_once('header.php'); ?>
<main>
  <div class="container my-5">
    <div class="row">
      <div class="col-6">
        <h3>Cadastrar novo produto</h3>
        <form>
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
            <label for="preco">Categoria</label>
            <select name="preco" id="preco" class="form-control">
              <option selected disabled>Escolha uma opção</option>
              <?php
              foreach (getCategorias() as $categoria) {
                echo "<option value='$categoria[id]'>$categoria[nome]</option>";
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <button class="btn btn-primary" name="action" value="cadastrar-produto">Enviar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
<?php require_once('footer.php'); ?>