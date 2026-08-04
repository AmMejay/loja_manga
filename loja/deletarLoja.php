<?php
require_once __DIR__ . '/../database.php';

$sql = "DELETE FROM loja WHERE id_loja = ?";
$stmt = $pdo->prepare($sql);   
$stmt->execute([$_GET['id']]);

$sql = "DELETE FROM pedido WHERE id_loja = ?"; 
$stmt = $pdo->prepare($sql);   
$stmt->execute([$_GET['id']]);


header("Location: listaLoja.php");
exit();