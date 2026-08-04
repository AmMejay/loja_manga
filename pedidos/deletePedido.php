<?php
require_once __DIR__ . '/../database.php';

if (!isset($_GET['id_pedido'])) {
    echo 'ID do pedido não informado.';
    exit;
}

$id_pedido = (int) $_GET['id_pedido'];

if ($id_pedido <= 0) {
    echo 'ID do pedido inválido.';
    exit;
}

$sql = "DELETE FROM pedido WHERE id_pedido = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id_pedido]);

header('Location: listaDevolucao.php');
exit;
