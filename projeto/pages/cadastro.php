<?php
include('../includes/header.php');
include('../includes/db.php');  // Inclui a configuração de conexão com o banco

// Definir variáveis de erro e sucesso
$erro = "";
$sucesso = "";

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Receber os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Validar campos
    if (empty($nome) || empty($email) || empty($senha)) {
        $erro = "Todos os campos devem ser preenchidos!";
    } else {
        // Verificar se o email já existe
        try {
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $usuario = $stmt->fetch();

            if ($usuario) {
                $erro = "Este email já está registrado.";
            } else {
                // Inserir no banco de dados
                $senha_hash = password_hash($senha, PASSWORD_DEFAULT); // Criptografar a senha
                $sql_insert = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
                $stmt = $pdo->prepare($sql_insert);
                $stmt->execute([
                    'nome' => $nome,
                    'email' => $email,
                    'senha' => $senha_hash
                ]);
                $sucesso = "Cadastro realizado com sucesso!";
            }
        } catch (PDOException $e) {
            $erro = "Erro ao acessar o banco de dados: " . $e->getMessage();
        }
    }
}

?>

<main>
    <section class="cadastro">
        <h1>Cadastrar</h1>

        <!-- Exibir mensagens de erro ou sucesso -->
        <?php if ($erro): ?>
            <div class="mensagem-erro"><?= $erro ?></div>
        <?php endif; ?>

        <?php if ($sucesso): ?>
            <div class="mensagem-sucesso"><?= $sucesso ?></div>
        <?php endif; ?>

        <!-- Imagem do usuário -->
        <div class="imagem-usuario">
            <img src="../assets/images/user.png" alt="Imagem de usuário">
        </div>

        <!-- Formulário de Cadastro -->
        <form action="cadastro.php" method="POST">
            <div class="campo">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="campo">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="campo">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <button type="submit" class="btn-cadastro">Cadastrar</button>
        </form>

        <p>Já tem uma conta? <a href="login.php">Faça login</a></p>
    </section>
</main>

<?php include('../includes/footer.php'); ?>
