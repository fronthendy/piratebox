<?php require_once('header.php'); ?>
<main>
  <div class="container my-5">
    <div class="row">
      <div class="col-5">
        <h1>Login</h1>
        <form method="POST" class="my-5">
          <div class="form-group">
            <label for="email">email</label>
            <input type="email" name="email" id="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="senha">senha</label>
            <input type="password" name="senha" id="senha" class="form-control" required>
          </div>
          <div class="form-group">
            <button class="btn btn-primary" name="action" value="login">Entrar</button>
          </div>
          <?php
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