<?php include('includes/header.php'); ?>
<main>
    <h1>Finalizar Compra</h1>
    <form method="POST">
        <input type="text" name="endereco" placeholder="Endereço de entrega" required><br>
        <input type="text" name="metodo_pagamento" placeholder="Método de pagamento" required><br>
        <button type="submit">Confirmar Compra</button>
    </form>
</main>
<?php include('includes/footer.php'); ?>
