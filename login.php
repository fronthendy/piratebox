<?php require_once('header.php'); ?>
<main>
  <div class="container my-5">
    <div class="row">
      <div class="col-5">
        <h1>Login</h1>
        <form method="POST" class="my-5">
          <div class="form-group">
            <label for="email">email</label>
            <input type="email" name="email" id="email" class="form-control">
          </div>
          <div class="form-group">
            <label for="senha">senha</label>
            <input type="password" name="senha" id="senha" class="form-control">
          </div>
          <div class="form-group">
            <button class="btn btn-primary">Entrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
<?php require_once('footer.php'); ?>