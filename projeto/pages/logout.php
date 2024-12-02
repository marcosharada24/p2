<?php
// Inicia a sessão
session_start();

// Destrói todas as variáveis de sessão
session_unset();

// Destroi a sessão
session_destroy();

// Redireciona o usuário para a página inicial ou de login
header("Location: ../pages/index.php"); // ou ../pages/login.php, conforme necessário
exit;
?>
