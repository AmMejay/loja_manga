<?php
require_once __DIR__ . '/../database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo 'Acesso inválido. Use o formulário de compra.';
    exit;
}

if (!isset($_POST['id_manga']) || !isset($_POST['id_loja'])) {
    echo 'Dados de compra não enviados.';
    exit;
}

$id_manga = (int) $_POST['id_manga'];
$id_loja = (int) $_POST['id_loja'];

if ($id_manga <= 0 || $id_loja <= 0) {
    echo 'Dados de compra incompletos ou inválidos.';
    exit;
}

// Lógica para processar a compra
$sql = "INSERT INTO pedido (id_manga, id_loja) VALUES (?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    $id_manga,
    $id_loja
]);

header('Location: listaDevolucao.php');
?>