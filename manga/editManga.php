<?php
require_once __DIR__ . '/../database.php';

$sql = "SELECT * FROM manga WHERE id_manga = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_GET['id']]);
$manga = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mangá</title>
</head>
<body>
    <h1>Editar Mangá</h1>
    <form action="processar_edicao.php" method="post">
        <input type="hidden" name="id_manga" value="<?= $manga['id_manga'] ?>">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($manga['nome']) ?>" required>

        <label for="volume">Volume:</label>
        <input type="number" name="volume" id="volume" value="<?= htmlspecialchars($manga['volume']) ?>" required>

        <label for="genero">Gênero:</label>
        <input type="text" name="genero" id="genero" value="<?= htmlspecialchars($manga['genero']) ?>" required>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" required><?= htmlspecialchars($manga['descricao']) ?></textarea>

        <label for="preco">Preço:</label>
        <input type="number" step="0.01" name="preco" id="preco" value="<?= htmlspecialchars($manga['preco']) ?>" required>

        <label for="ativo">Ativo:</label>
        <select name="ativo" id="ativo">
            <option value="1" <?= $manga['ativo'] ? 'selected' : '' ?>>Sim</option>
            <option value="0" <?= !$manga['ativo'] ? 'selected' : '' ?>>Não</option>
        </select>

        <button type="submit">Salvar Alterações</button>
</body>
</html>