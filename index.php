<?php require_once('header.php'); ?>
<main>
  <div class="container my-5">
    <h3>Produtos <a href="criar.php" class="btn btn-primary">Adicionar novo</a></h3>
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
        <?php
        foreach (getProdutos() as $produto) {
          echo "<tr>";
          echo "<td>$produto[nome]</td>";
          echo "<td>$produto[preco]</td>";
          echo "<td>$produto[categoria_id]</td>";
          echo "<td>" . ($produto['status'] == 1 ? 'ativo' : 'inativo') . "</td>";
          echo "<td>
            <a href='editar.php?produto_id=$produto[id]' class='btn btn-secondary'>editar</a>
            <a href='desativar.php?produto_id=$produto[id]' class='btn btn-danger'>desativar</a>
            </td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</main>

<?php require_once('footer.php'); ?>