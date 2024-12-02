<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

include('includes/db.php');
$email = $_SESSION['usuario'];
$sql = "SELECT * FROM compras WHERE usuario_email = '$email'";
$result = $conn->query($sql);
?>
<?php include('includes/header.php'); ?>
<main>
    <h1>Histórico de Compras</h1>
    <?php while ($compra = $result->fetch_assoc()) { ?>
        <div>
            <p>Compra realizada em: <?php echo $compra['data']; ?></p>
            <p>Valor total: R$ <?php echo $compra['valor_total']; ?></p>
        </div>
    <?php } ?>
</main>
<?php include('includes/footer.php'); ?>

