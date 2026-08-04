<?php
require_once __DIR__ . '/../database.php';

$id_pedido = isset($_GET['id_pedido']) ? (int) $_GET['id_pedido'] : 0;

if ($id_pedido <= 0) {
    echo 'ID do pedido não informado.';
    exit;
}

$sqlPedido = "SELECT id_pedido, id_manga, id_loja FROM pedido WHERE id_pedido = ?";
$stmtPedido = $pdo->prepare($sqlPedido);
$stmtPedido->execute([$id_pedido]);
$pedido = $stmtPedido->fetch(PDO::FETCH_ASSOC);

if (!$pedido) {
    echo 'Pedido não encontrado.';
    exit;
}

$sqlMangas = "SELECT id_manga, nome FROM manga ORDER BY nome";
$stmtMangas = $pdo->prepare($sqlMangas);
$stmtMangas->execute();
$mangas = $stmtMangas->fetchAll(PDO::FETCH_ASSOC);

$sqlLojas = "SELECT id_loja, lugar FROM loja ORDER BY lugar";
$stmtLojas = $pdo->prepare($sqlLojas);
$stmtLojas->execute();
$lojas = $stmtLojas->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pedido</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h2>Editar Pedido</h2>

    <form action="processar_edicao.php" method="post">
        <input type="hidden" name="id_pedido" value="<?= $pedido['id_pedido'] ?>">

        <label for="id_manga">Manga:</label>
        <select name="id_manga" id="id_manga" required>
            <option value="">Selecione um manga</option>
            <?php foreach ($mangas as $manga): ?>
                <option value="<?= $manga['id_manga'] ?>" <?= $manga['id_manga'] == $pedido['id_manga'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($manga['nome']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="id_loja">Loja:</label>
        <select name="id_loja" id="id_loja" required>
            <option value="">Selecione uma loja</option>
            <?php foreach ($lojas as $loja): ?>
                <option value="<?= $loja['id_loja'] ?>" <?= $loja['id_loja'] == $pedido['id_loja'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($loja['lugar']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="ativo">Status:</label>
        <select name="ativo" id="ativo" required>
            <option value="1" <?= !empty($pedido['ativo']) ? 'selected' : '' ?>>Ativo</option>
            <option value="0" <?= empty($pedido['ativo']) ? 'selected' : '' ?>>Inativo</option>
        </select>

        <button type="submit">Salvar alterações</button>
    </form>

    <p><a href="listaDevolucao.php">Voltar para a lista</a></p>
</body>
</html>
