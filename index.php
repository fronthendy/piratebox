<?php require_once('header.php'); ?>
<main>
  <div class="container my-5">
    <h3>Produtos</h3>
    <table class="table">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Preço</th>
          <th>Categoria</th>
          <th>Status</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Halloween box</td>
          <td>R$45,00</td>
          <td>Temática</td>
          <td>Ativo</td>
          <td></td>
        </tr>
        <?php getProdutos(); ?>
      </tbody>
    </table>
  </div>
</main>

<?php require_once('footer.php'); ?>