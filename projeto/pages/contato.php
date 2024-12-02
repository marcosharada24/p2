<?php include('../includes/header.php'); ?>
<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<main>
    <section class="contato">
        <h1>Entre em Contato</h1>

        <!-- Formulário de Contato -->
        <form action="#" method="POST">
            <div class="campo">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="campo">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="campo">
                <label for="mensagem">Mensagem:</label>
                <textarea id="mensagem" name="mensagem" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn-enviar">Enviar</button>
        </form>

        <!-- Redes Sociais -->
        <div class="redes-sociais">
            <h2>Siga-nos</h2>
            <ul>
                <li>
                    <a href="https://facebook.com" target="_blank">
                        <i class="fab fa-facebook-f"></i> Facebook
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com" target="_blank">
                        <i class="fab fa-twitter"></i> Twitter
                    </a>
                </li>
                <li>
                    <a href="https://youtube.com" target="_blank">
                        <i class="fab fa-youtube"></i> YouTube
                    </a>
                </li>
            </ul>
        </div>
    </section>
</main>

<?php include('../includes/footer.php'); ?>

