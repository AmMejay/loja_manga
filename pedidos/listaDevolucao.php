<?php
require_once '../database.php';

$sql = "
SELECT
    pedido.id_pedido,
    manga.nome,
    loja.lugar,
    manga.cliente,
    manga.ativo
FROM pedido
JOIN manga ON pedido.id_manga = manga.id_manga
JOIN loja ON pedido.id_loja = loja.id_loja
";

$stmt = $pdo->prepare($sql);  
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pedidos</title>
  <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
  <h1>Lista de Pedidos</h1>

  <div class="table-container">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Cliente</th>
          <th>Nome</th>
          <th>Loja</th>
          <th>Situação</th>
          <th>Ações</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($result as $row): ?>
          <tr>
            <td><?= $row['id_pedido']; ?></td>
            <td><?= htmlspecialchars($row['cliente']); ?></td>
            <td><?= htmlspecialchars($row['nome']); ?></td>
            <td><?= htmlspecialchars($row['lugar']); ?></td>
            <td><?= $row['ativo'] ? 'Ativo' : 'Inativo'; ?></td>
            <td>
              <a href="editPedido.php?id_pedido=<?= $row['id_pedido']; ?>">Editar</a>
              <a href="deletePedido.php?id_pedido=<?= $row['id_pedido']; ?>">Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>

</html>