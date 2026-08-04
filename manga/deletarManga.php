<?php

require_once __DIR__ . '/../database.php';

$id = $_GET['id'];


$sql = "DELETE FROM manga WHERE id_manga = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

$sql = "DELETE FROM pedido WHERE id_pedido = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header("Location: listaManga.php");
exit(); 