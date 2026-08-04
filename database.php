<?php
$host    = 'localhost';
$dbname  = 'loja_manga';
$senha   = '';
$usuario = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset"; 

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       
    PDO::ATTR_EMULATE_PREPARES   => false,                 
];

try {
    //Cria a conexão:
    $pdo = new PDO($dsn, $usuario, $senha , $options);
} catch (PDOException $e) {
    
    http_response_code(500); // Erro 500 (Internal Server Error). 
    exit(json_encode([
        "Erro" => "Falha interna do servidor"     
    ]));
}