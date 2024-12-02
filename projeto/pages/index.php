<?php
// Inicia a sessão
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    // Se não estiver logado, redireciona para a página de login
    header('Location: login.php');
    exit;  // Certifique-se de que o código pare aqui
}

include('../includes/header.php');

// Lógica para adicionar produtos ao carrinho
if (isset($_POST['adicionar_ao_carrinho'])) {
    $produto_id = $_POST['produto_id'];
    $produto_nome = $_POST['produto_nome'];
    $produto_preco = $_POST['produto_preco'];
    
    // Adiciona o produto ao carrinho na sessão
    $produto = [
        'id' => $produto_id,
        'nome' => $produto_nome,
        'preco' => $produto_preco
    ];
    
    $_SESSION['carrinho'][] = $produto;  // Adiciona ao carrinho na sessão
}
?>

<main>
    <!-- Banner principal -->
    <section class="banner">
        <div class="banner-content">
            <h1>Bem-vindo à nossa loja, <?= $_SESSION['usuario_nome'] ?>!</h1>
            <p>Confira nossos produtos incríveis e aproveite as ofertas exclusivas!</p>
            <a href="../pages/produtos.php" class="btn-banner">Ver Produtos</a>
        </div>
    </section>

    <!-- Seção de destaques -->
    <section class="destaques">
        <h2>Produtos em Destaque</h2>
        <div class="produtos-container">
            <!-- Produto 1 -->
            <div class="produto">
                <img src="../assets/images/produto1.png" alt="Produto 1">
                <h3>Produto 1</h3>
                <p>Descrição do produto 1.</p>
                <p>Preço: R$ 100,00</p>
                <form action="index.php" method="POST">
                    <input type="hidden" name="produto_id" value="1">
                    <input type="hidden" name="produto_nome" value="Produto 1">
                    <input type="hidden" name="produto_preco" value="100">
                    <button type="submit" name="adicionar_ao_carrinho">Adicionar ao Carrinho</button>
                </form>
            </div>
            <!-- Produto 2 -->
            <div class="produto">
                <img src="../assets/images/produto2.png" alt="Produto 2">
                <h3>Produto 2</h3>
                <p>Descrição do produto 2.</p>
                <p>Preço: R$ 200,00</p>
                <form action="index.php" method="POST">
                    <input type="hidden" name="produto_id" value="2">
                    <input type="hidden" name="produto_nome" value="Produto 2">
                    <input type="hidden" name="produto_preco" value="200">
                    <button type="submit" name="adicionar_ao_carrinho">Adicionar ao Carrinho</button>
                </form>
            </div>
            <!-- Produto 3 -->
            <div class="produto">
                <img src="../assets/images/produto3.png" alt="Produto 3">
                <h3>Produto 3</h3>
                <p>Descrição do produto 3.</p>
                <p>Preço: R$ 300,00</p>
                <form action="index.php" method="POST">
                    <input type="hidden" name="produto_id" value="3">
                    <input type="hidden" name="produto_nome" value="Produto 3">
                    <input type="hidden" name="produto_preco" value="300">
                    <button type="submit" name="adicionar_ao_carrinho">Adicionar ao Carrinho</button>
                </form>
            </div>
            <!-- Produto 4 -->
            <div class="produto">
                <img src="../assets/images/produto4.png" alt="Produto 4">
                <h3>Produto 4</h3>
                <p>Descrição do produto 4.</p>
                <p>Preço: R$ 150,00</p>
                <form action="index.php" method="POST">
                    <input type="hidden" name="produto_id" value="4">
                    <input type="hidden" name="produto_nome" value="Produto 4">
                    <input type="hidden" name="produto_preco" value="150">
                    <button type="submit" name="adicionar_ao_carrinho">Adicionar ao Carrinho</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Seção do carrinho -->
    <section class="carrinho">
        <h2>Seu Carrinho</h2>
        <div class="produtos-carrinho">
            <?php if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0): ?>
                <ul>
                    <?php foreach ($_SESSION['carrinho'] as $produto): ?>
                        <li>
                            <strong><?= $produto['nome'] ?></strong> - R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <a href="carrinho.php" class="btn-carrinho">Ir para o Carrinho</a>
            <?php else: ?>
                <p>Seu carrinho está vazio.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Seção de informações -->
    <section class="informacoes">
        <h2>Sobre nossa loja</h2>
        <p>Na nossa loja, você encontra os melhores produtos com a qualidade que você merece. Oferecemos uma experiência única de compra, com um atendimento de excelência e uma navegação fácil e rápida.</p>
    </section>
</main>

<?php include('../includes/footer.php'); ?>
