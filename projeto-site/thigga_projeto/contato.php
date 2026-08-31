<?php ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contato | THIGGA</title>

    <link rel="stylesheet" href="assets/css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>


<header class="site-header">

    <div class="container navbar">

        <a href="index.php" class="logo">
            <span class="logo-icon">🏮</span>
            <span class="logo-text">THIGGA</span>
        </a>

        <nav class="main-menu">

            <a href="index.php">Início</a>
            <a href="produtos.php">Produtos</a>
            <a href="categorias.php">Categorias</a>
            <a href="sobre.php">Sobre</a>
            <a href="contato.php" class="active">Contato</a>

        </nav>

    </div>

</header>



<!-- HERO -->

<section class="hero" style="min-height:300px;">

    <div class="container hero-content">

        <div class="hero-text">

            <span class="hero-subtitle">FALE CONOSCO</span>

            <h1>ENTRE EM <span>CONTATO</span></h1>

            <p>
                Tire dúvidas, envie sugestões ou fale com nossa equipe.
            </p>

        </div>

    </div>

</section>





<section class="about-preview">

    <div class="container about-grid">

        <!-- Informações -->

        <div class="about-content">

            <span class="section-subtitle">ATENDIMENTO</span>

            <h2>ESTAMOS PRONTOS PARA <span>AJUDAR</span></h2>

            <p>
                Nossa equipe atende clientes de todo o Brasil com rapidez e qualidade.
            </p>

            <br>

            <p><i class="fa-solid fa-envelope" style="color:#FFDE00;"></i> contato@thigga.com</p>

            <p><i class="fa-solid fa-phone" style="color:#FFDE00;"></i> (11) 99999-9999</p>

            <p><i class="fa-solid fa-location-dot" style="color:#FFDE00;"></i> São Paulo - SP</p>

            <p><i class="fa-solid fa-clock" style="color:#FFDE00;"></i> Segunda à Sexta • 09h às 18h</p>

        </div>


        <div class="category-card" style="display:block;">

            <h3 style="margin-bottom:20px; font-family:Orbitron;">Envie uma mensagem</h3>

            <form action="#" method="POST">

                <div style="margin-bottom:15px;">

                    <label>Nome</label>

                    <input
                        type="text"
                        name="nome"
                        required
                        style="width:100%; padding:12px; margin-top:6px; background:#222; border:1px solid #333; color:#fff; border-radius:4px;"
                    >

                </div>


                <div style="margin-bottom:15px;">

                    <label>E-mail</label>

                    <input
                        type="email"
                        name="email"
                        required
                        style="width:100%; padding:12px; margin-top:6px; background:#222; border:1px solid #333; color:#fff; border-radius:4px;"
                    >

                </div>


                <div style="margin-bottom:15px;">

                    <label>Assunto</label>

                    <input
                        type="text"
                        name="assunto"
                        style="width:100%; padding:12px; margin-top:6px; background:#222; border:1px solid #333; color:#fff; border-radius:4px;"
                    >

                </div>


                <div style="margin-bottom:20px;">

                    <label>Mensagem</label>

                    <textarea
                        name="mensagem"
                        rows="5"
                        required
                        style="width:100%; padding:12px; margin-top:6px; background:#222; border:1px solid #333; color:#fff; border-radius:4px; resize:vertical;"
                    ></textarea>

                </div>


                <button
                    type="submit"
                    class="btn btn-primary"
                    style="width:100%; border:none; cursor:pointer;"
                >
                    ENVIAR MENSAGEM
                </button>

            </form>

        </div>

    </div>

</section>




<section class="categories-section">

    <div class="container">

        <div class="section-header">

            <span class="section-subtitle">SIGA A THIGGA</span>

            <h2>REDES SOCIAIS</h2>

            <p>Fique por dentro de lançamentos e promoções.</p>

        </div>

        <div class="categories-grid">

            <div class="category-card">

                <div class="category-icon">
                    <i class="fa-brands fa-instagram"></i>
                </div>

                <div class="category-info">
                    <h3>Instagram</h3>
                    <p>@thigga.oficial</p>
                </div>

            </div>


            <div class="category-card">

                <div class="category-icon">
                    <i class="fa-brands fa-facebook-f"></i>
                </div>

                <div class="category-info">
                    <h3>Facebook</h3>
                    <p>THIGGA Sports</p>
                </div>

            </div>


            <div class="category-card">

                <div class="category-icon">
                    <i class="fa-brands fa-tiktok"></i>
                </div>

                <div class="category-info">
                    <h3>TikTok</h3>
                    <p>@thigga</p>
                </div>

            </div>


            <div class="category-card">

                <div class="category-icon">
                    <i class="fa-brands fa-whatsapp"></i>
                </div>

                <div class="category-info">
                    <h3>WhatsApp</h3>
                    <p>(11) 99999-9999</p>
                </div>

            </div>

        </div>

    </div>

</section>




<footer class="site-footer">

    <div class="container footer-grid">

        <div class="footer-brand">

            <h2 class="logo-text">THIGGA</h2>

            <p>
                Artigos esportivos inspirados em força, disciplina e superação.
            </p>

        </div>

        <div class="footer-column">

            <h3>Navegação</h3>

            <a href="index.php">Início</a>
            <a href="produtos.php">Produtos</a>
            <a href="categorias.php">Categorias</a>
            <a href="sobre.php">Sobre</a>

        </div>

        <div class="footer-column">

            <h3>Contato</h3>

            <p>contato@thigga.com</p>
            <p>(11) 99999-9999</p>
            <p>São Paulo - SP</p>

        </div>

    </div>

    <div class="footer-bottom">

        <p>
            © <?php echo date("Y"); ?> THIGGA Artigos Esportivos
        </p>

    </div>

</footer>

</body>
</html>