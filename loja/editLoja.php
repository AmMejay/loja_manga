<?php
require_once __DIR__ . '/../database.php';

$sql = "SELECT * FROM loja WHERE id_loja = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_GET['id']]);
$loja = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Loja</title>
</head>
<body>
    <h1>Editar Loja</h1>
    <form action="processar_edicao_loja.php" method="post">
        <input type="hidden" name="id_loja" value="<?= $loja['id_loja'] ?>">

        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" id="endereco" value="<?= htmlspecialchars($loja['lugar']) ?>" required>

        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>