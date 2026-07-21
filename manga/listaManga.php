<?php
require_once __DIR__ . '/../database.php';

$sql = "SELECT * FROM manga";
$stmt = $pdo->prepare($sql);
$pedidos = $stmt->execute();
$pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($pedidos);
// echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar Mangás</title>

    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Volume</th>
                <th>Gênero</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Comprar</th>
                <th>ativo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidos as $manga): ?>
                <tr>
                    <input type="hidden" name="id_manga" value="<?= $manga['id_manga'] ?>">
                    <td><?= $manga['nome'] ?></td>
                    <td><?= $manga['volume'] ?></td>
                    <td><?= $manga['genero'] ?></td>
                    <td><?= $manga['descricao'] ?></td>
                    <td>R$ <?= number_format($manga['preco'], 2, ',', '.') ?></td>
                    <td>
                        <a href="../pedidos/comprar.php?manga_id=<?= $manga['id_manga'] ?>">Comprar</a>
                    </td>
                    <td><?= $manga['ativo'] ? 'Sim' : 'Não' ?></td>
                    <td>
                        <a href="edit.php?id=<?= $manga['id_manga'] ?>">Editar</a>
                        <a href="delete.php?id=<?= $manga['id_manga'] ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br><br>
    <br><br>
</body>

</html>