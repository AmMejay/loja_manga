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
    // echo "Erro na conexão: " . $e->getMessage(); em API não pode usar echo pq o user não deve saber sobre a resposta.
    # melhor:

    # métodos: getMessage() , getCode() , getLine() e getFile().
    // $e->getMessage(); // Mensagem do erro
    // $e->getCode();    // Código do erro
    // $e->getFile();    // Arquivo onde ocorreu
    // $e->getLine();    // Linha do erro 
    // error_log($e->getMessage()); // O dev pode consultar o erro no log e o user não.
    
    http_response_code(500); // Erro 500 (Internal Server Error). 
    exit(json_encode([
        "Erro" => "Falha interna do servidor"     
    ]));
}