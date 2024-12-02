<?php
session_start(); // Inicia a sessão

// Garantir que o carrinho existe na sessão
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Adicionar produto ao carrinho
if (isset($_GET['adicionar'])) {
    $id_produto = $_GET['adicionar'];
    $nome_produto = urldecode($_GET['nome']); // Usando urldecode para garantir que os espaços e caracteres especiais sejam decodificados corretamente
    $preco_produto = $_GET['preco'];

    // Verificar se o produto já está no carrinho
    $produto_existe = false;
    foreach ($_SESSION['carrinho'] as $produto) {
        if ($produto['id'] == $id_produto) {
            $produto_existe = true;
            break;
        }
    }

    // Se o produto não existir, adiciona ao carrinho
    if (!$produto_existe) {
        $_SESSION['carrinho'][] = [
            'id' => $id_produto,
            'nome' => $nome_produto,
            'preco' => $preco_produto
        ];
    }
}

include('../includes/header.php');
?>

<main>
    <h1>Produtos</h1>
    <div class="produtos-container">
        <!-- Produto 1 -->
        <div class="produto">
            <img src="../assets/images/produto1.png" alt="Produto 1">
            <h2>Camiseta Preta</h2>
            <p>Camiseta preta.</p>
            <!-- Botão "Adicionar ao Carrinho" com link dinâmico -->
            <a href="?adicionar=1&nome=Camiseta+Preta&preco=99.99">
                <button>Adicionar ao Carrinho</button>
            </a>
        </div>

        <!-- Produto 2 -->
        <div class="produto">
            <img src="../assets/images/produto2.png" alt="Produto 2">
            <h2>Camiseta Azul</h2>
            <p>Camiseta azul.</p>
            <!-- Botão "Adicionar ao Carrinho" com link dinâmico -->
            <a href="?adicionar=2&nome=Camiseta+Azul&preco=149.99">
                <button>Adicionar ao Carrinho</button>
            </a>
        </div>

        <!-- Produto 3 -->
        <div class="produto">
            <img src="../assets/images/produto3.png" alt="Produto 3">
            <h2>Camiseta Vermelha</h2>
            <p>Camiseta vermelha.</p>
            <!-- Botão "Adicionar ao Carrinho" com link dinâmico -->
            <a href="?adicionar=3&nome=Camiseta+Vermelha&preco=199.99">
                <button>Adicionar ao Carrinho</button>
            </a>
        </div>

        <!-- Produto 4 -->
        <div class="produto">
            <img src="../assets/images/produto4.png" alt="Produto 4">
            <h2>Camiseta Amarela</h2>
            <p>Camiseta amarela.</p>
            <!-- Botão "Adicionar ao Carrinho" com link dinâmico -->
            <a href="?adicionar=4&nome=Camiseta+Amarela&preco=249.99">
                <button>Adicionar ao Carrinho</button>
            </a>
        </div>
    </div>

    <!-- Exibir os produtos no carrinho -->
    <h2>Carrinho de Compras</h2>
    <ul>
        <?php foreach ($_SESSION['carrinho'] as $produto): ?>
            <li>
                <?php echo $produto['nome']; ?> - R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
            </li>
        <?php endforeach; ?>
    </ul>
</main>

<?php include('../includes/footer.php'); ?>
