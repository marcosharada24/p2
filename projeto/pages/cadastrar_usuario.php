<!-- cadastrar_usuario.php -->
<?php
include('includes/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $endereco = $_POST['endereco'];

    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, endereco) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nome, $email, $senha, $endereco]);

    header('Location: login.php');  // Redireciona para a página de login
    exit;
}
?>
