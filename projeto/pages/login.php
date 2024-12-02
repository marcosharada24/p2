<?php
 
// Inicia a sessão apenas se ainda não estiver ativa
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Começa a sessão
}

include('../includes/header.php');
include('../includes/db.php');  // Conecta ao banco de dados

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verificar se ambos os campos foram preenchidos
    if (empty($email) || empty($senha)) {
        $erro = "Por favor, preencha todos os campos.";
    } else {
        // Consultar o banco de dados
        try {
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $usuario = $stmt->fetch();

            if ($usuario && password_verify($senha, $usuario['senha'])) {
                // Login bem-sucedido - Armazena dados na sessão
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['nome'];
                $_SESSION['usuario_email'] = $usuario['email'];

                // Redireciona para a página principal (ou qualquer página desejada)
                header('Location: ../index.php');
                exit;
            } else {
                $erro = "E-mail ou senha inválidos.";
            }
        } catch (PDOException $e) {
            $erro = "Erro ao acessar o banco de dados: " . $e->getMessage();
        }
    }
}
?>

<main>
    <section class="login">
        <h1>Login</h1>

        <!-- Exibir mensagens de erro -->
        <?php if (isset($erro)): ?>
            <div class="mensagem-erro"><?= $erro ?></div>
        <?php endif; ?>

        <!-- Imagem do usuário -->
        <div class="imagem-usuario">
            <img src="../assets/images/user.png" alt="Imagem de usuário">
        </div>

        <!-- Formulário de Login -->
        <form action="login.php" method="POST">
            <div class="campo">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="campo">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <button type="submit" class="btn-login">Entrar</button>
        </form>

        <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
    </section>
</main>

<?php include('../includes/footer.php'); ?>
