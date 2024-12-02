<?php
// Configuração da conexão com o banco de dados
$host = 'localhost';     // Nome do host (geralmente localhost)
$dbname = 'loja';        // Nome do banco de dados
$username = 'root';      // Usuário do banco de dados
$password = '';          // Senha do banco de dados (em branco no XAMPP)

try {
    // Estabelece a conexão com o banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configura para mostrar erros
} catch (PDOException $e) {
    // Em caso de erro na conexão, exibe a mensagem de erro
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>
