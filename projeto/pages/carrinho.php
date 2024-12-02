<?php
session_start();

// Verifica se o carrinho existe
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Se o produto for removido do carrinho
if (isset($_GET['remover'])) {
    $id_produto = $_GET['remover'];

    // Remover o produto do carrinho
    foreach ($_SESSION['carrinho'] as $key => $produto) {
        if ($produto['id'] == $id_produto) {
            unset($_SESSION['carrinho'][$key]);
        }
    }
}

// Exibição do carrinho
echo '<main><section><h1>Carrinho de Compras</h1>';

// Botão de voltar para os produtos
echo '<a href="produtos.php" style="display: inline-block; margin-bottom: 20px; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; font-size: 16px;">Voltar aos Produtos</a>';

echo '<ul style="display: flex; flex-wrap: wrap; gap: 20px;">';

foreach ($_SESSION['carrinho'] as $produto) {
    // Caminho para a imagem, assumindo que a imagem tenha o mesmo nome do id do produto
    $imagem_produto = $_SERVER['DOCUMENT_ROOT'] . "/assets/images/" . $produto['id'] . ".jpg"; // Caminho absoluto para testar
    
    // Verifica se a imagem realmente existe
    if (!file_exists($imagem_produto)) {
        $imagem_produto = $_SERVER['DOCUMENT_ROOT'] . "/assets/images/placeholder.jpg"; // Imagem de placeholder caso a imagem não exista
    }

    // Exibe os produtos no carrinho
    echo '<li style="border: 1px solid #ddd; padding: 15px; background-color: #f9f9f9; width: 220px; text-align: center; border-radius: 5px;">';
    echo '<img src="/assets/images/' . $produto['id'] . '.jpg" alt="' . $produto['nome'] . '" style="width: 100px; height: auto; margin-bottom: 10px;">';  // Exibe a imagem do produto
    echo '<p>' . $produto['nome'] . ' - R$' . number_format($produto['preco'], 2, ',', '.') . '</p>';
    echo '<a href="carrinho.php?remover=' . $produto['id'] . '" style="color: red; text-decoration: none;">Remover</a>';
    echo '</li>';
}

echo '</ul></section></main>';
?>
