<?php
require_once __DIR__ . '/../database.php';

$sql = "SELECT * FROM loja";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$lojas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Lojas</title>

    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1>Lista de Lojas</h1>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Lugar</th>
                <th>Comprar</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lojas as $loja): ?>
                <tr>
                    <td><?= $loja['id_loja'] ?></td>
                    <td><?= $loja['lugar'] ?></td>
                    <td><a href="../pedidos/comprar.php?id=<?= $loja['id_loja'] ?>">Comprar</a></td>
                    <td>
                        <a href="edit.php?id=<?= $loja['id_loja'] ?>">Editar</a>
                        <a href="delete.php?id=<?= $loja['id_loja'] ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>