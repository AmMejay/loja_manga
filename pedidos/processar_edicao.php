<?php
require_once __DIR__ . '/../database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo 'Acesso inválido.';
    exit;
}

$id_pedido = isset($_POST['id_pedido']) ? (int) $_POST['id_pedido'] : 0;
$id_manga = isset($_POST['id_manga']) ? (int) $_POST['id_manga'] : 0;
$id_loja = isset($_POST['id_loja']) ? (int) $_POST['id_loja'] : 0;
$ativo = isset($_POST['ativo']) ? (int) $_POST['ativo'] : 0;

if ($id_pedido <= 0 || $id_manga <= 0 || $id_loja <= 0) {
    echo 'Dados inválidos para edição.';
    exit;
}

$sql = "UPDATE pedido SET id_manga = ?, id_loja = ? WHERE id_pedido = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id_manga, $id_loja, $id_pedido]);

$sqlAtivo = "UPDATE manga SET ativo = ? WHERE id_manga = (SELECT id_manga FROM pedido WHERE id_pedido = ?)";
$stmtAtivo = $pdo->prepare($sqlAtivo);
if ($ativo === 1) {
    $stmtAtivo->execute([1, $id_pedido]);
} else {
    $stmtAtivo->execute([0, $id_pedido]);
}

header('Location: listaDevolucao.php');
