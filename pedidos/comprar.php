<?php
require_once __DIR__ . '/../database.php';

$checkColumnSql = "SELECT COUNT(*) FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'manga' AND COLUMN_NAME = 'ativo'";
$checkColumnStmt = $pdo->prepare($checkColumnSql);
$checkColumnStmt->execute();

if ((int) $checkColumnStmt->fetchColumn() === 0) {
    $pdo->exec("ALTER TABLE manga ADD COLUMN ativo BOOLEAN NOT NULL DEFAULT TRUE");
}

$sql = "SELECT id_manga, nome FROM manga WHERE COALESCE(ativo, 0) = 1 ORDER BY nome";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$mangas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
$sql2 = "SELECT * FROM loja";
$stmt2 = $pdo->prepare($sql2);
$stmt2->execute();
$lojas = $stmt2->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <form action="./processar_compra.php" method="post">
        <label for="cliente">Cliente: </label>
        <input type="text" name="cliente" id="cliente" required>

        <label for="id_manga">Manga:</label>
        <select name="id_manga" id="id_manga" required>
            <option value="">Selecione um manga</option>
            <?php if (empty($mangas)): ?>
                <option value="" disabled>Nenhum manga disponível para compra no momento</option>
            <?php else: ?>
                <?php foreach ($mangas as $manga): ?>
                    <option value="<?= $manga['id_manga'] ?>"><?= htmlspecialchars($manga['nome']) ?></option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>

        <label for="id_loja">Loja:</label>
        <select name="id_loja" id="id_loja" required>
            <option value="">Selecione uma loja</option>
            <?php foreach ($lojas as $loja): ?>
                <option value="<?= $loja['id_loja'] ?>"><?= $loja['lugar'] ?></option>
            <?php endforeach; ?>    
        </select>

        <button type="submit">Comprar</button>
    </form>
</body>
</html>