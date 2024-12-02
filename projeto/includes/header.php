<!-- header.php -->
<?php 
// Inicia a sessão apenas se ainda não estiver ativa
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Começa a sessão
    
}


// Verifica se o usuário está logado

?>
<link rel="stylesheet" href="../assets/css/style.css">

<header>
    <h1>Minha Loja</h1>
    <nav>
        <ul>
            <li><a href="../pages/index.php">Home</a></li>
            <li><a href="../pages/produtos.php">Produtos</a></li>
            <li><a href="../pages/contato.php">Contato</a></li>

            <?php if (isset($_SESSION['usuario_id'])): ?>
                <!-- Exibe o nome do usuário logado e o link para logout -->
                <li><a href="#">Bem-vindo, <?= $_SESSION['usuario_nome'] ?>!</a></li>
                <li><a href="../pages/logout.php">Sair</a></li>
            <?php else: ?>
                <!-- Links de login e cadastro, apenas se o usuário não estiver logado -->
                <li><a href="../pages/login.php">Login</a></li>
                <li><a href="../pages/cadastro.php">Cadastro</a></li>
            <?php endif; ?>

            <li><a href="../pages/carrinho.php">Carrinho</a></li>
        </ul>
    </nav>
</header>
