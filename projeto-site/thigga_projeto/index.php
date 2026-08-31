<?php

require_once "config/conexao.php";




$sqlCategorias = "
    SELECT
        id,
        nome,
        descricao
    FROM categorias
    ORDER BY nome ASC
    LIMIT 4
";

$stmtCategorias = $pdo->query($sqlCategorias);

$categorias = $stmtCategorias->fetchAll(
    PDO::FETCH_ASSOC
);



$sqlProdutos = "
    SELECT
        p.id,
        p.nome,
        p.descricao,
        p.preco,
        p.imagem,
        c.nome AS categoria

    FROM produtos p

    LEFT JOIN categorias c
        ON p.categoria_id = c.id

    ORDER BY p.id DESC

    LIMIT 8
";

$stmtProdutos = $pdo->query($sqlProdutos);

$produtos = $stmtProdutos->fetchAll(
    PDO::FETCH_ASSOC
);

?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="description"
        content="THIGGA Artigos Esportivos — produtos esportivos, performance e estilo."
    >

    <title>
        THIGGA — Artigos Esportivos
    </title>


  
    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700;800&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >



    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >




    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >

    <link
        rel="stylesheet"
        href="assets/css/responsive.css"
    >

</head>


<body>




<header class="site-header">

    <div class="container navbar">



        <a
            href="index.php"
            class="logo"
        >

            <span class="logo-icon">
                🏮
            </span>

            <span class="logo-text">
                THIGGA
            </span>

        </a>


        

        <nav class="main-menu">

            <a
                href="index.php"
                class="active"
            >
                Início
            </a>

            <a href="produtos.php">
                Produtos
            </a>

            <a href="categorias.php">
                Categorias
            </a>

            <a href="sobre.php">
                Sobre
            </a>

            <a href="contato.php">
                Contato
            </a>

        </nav>


     

        <div class="header-actions">

            <a
                href="produtos.php"
                class="search-button"
                title="Pesquisar produtos"
            >

                <i class="fa-solid fa-magnifying-glass"></i>

            </a>


            <a
                href="produtos.php"
                class="cart-button"
                title="Ver produtos"
            >

                <i class="fa-solid fa-bag-shopping"></i>

            </a>

        </div>



        <button
            class="menu-toggle"
            id="menuToggle"
            type="button"
            aria-label="Abrir menu"
        >

            <i class="fa-solid fa-bars"></i>

        </button>


    </div>

</header>




<section class="hero">

    <div class="hero-overlay"></div>


    <div class="container hero-content">


        <div class="hero-text">


            <span class="hero-subtitle">

                PERFORMANCE • ESTILO • TRADIÇÃO

            </span>


            <h1>

                SUPERE
                <span>SEUS LIMITES.</span>

            </h1>


            <p>

                Artigos esportivos para quem não aceita
                ficar parado.

            </p>


            <div class="hero-buttons">

                <a
                    href="produtos.php"
                    class="btn btn-primary"
                >

                    VER PRODUTOS

                    <i class="fa-solid fa-arrow-right"></i>

                </a>


                <a
                    href="categorias.php"
                    class="btn btn-secondary"
                >

                    CATEGORIAS

                </a>

            </div>


        </div>


        <div class="hero-decoration">

            <span>
                龍
            </span>

        </div>


    </div>

</section>




<section class="categories-section">

    <div class="container">


        <div class="section-header">

            <span class="section-subtitle">
                EXPLORE
            </span>

            <h2>
                CATEGORIAS
            </h2>

            <p>
                Encontre o equipamento certo para sua jornada.
            </p>

        </div>



        <div class="categories-grid">


            <?php if (count($categorias) > 0): ?>


                <?php foreach ($categorias as $categoria): ?>

                    <a
                        href="produtos.php?categoria=<?php echo $categoria['id']; ?>"
                        class="category-card"
                    >


                        <div class="category-icon">

                            <i class="fa-solid fa-dumbbell"></i>

                        </div>


                        <div class="category-info">

                            <h3>

                                <?php

                                echo htmlspecialchars(
                                    $categoria["nome"]
                                );

                                ?>

                            </h3>


                            <p>

                                <?php

                                echo htmlspecialchars(
                                    $categoria["descricao"] ?? ""
                                );

                                ?>

                            </p>


                            <span class="category-link">

                                Explorar

                                <i class="fa-solid fa-arrow-right"></i>

                            </span>

                        </div>


                    </a>

                <?php endforeach; ?>


            <?php else: ?>


                <p class="empty-message">

                    Nenhuma categoria cadastrada.

                </p>


            <?php endif; ?>


        </div>

    </div>

</section>




<section class="products-section">

    <div class="container">


        <div class="section-header">

            <span class="section-subtitle">
                DESTAQUES
            </span>

            <h2>
                PRODUTOS EM ALTA
            </h2>

            <p>
                Confira alguns dos produtos disponíveis na THIGGA.
            </p>

        </div>



        <div class="products-grid">


            <?php if (count($produtos) > 0): ?>


                <?php foreach ($produtos as $produto): ?>


                    <article class="product-card">


                    

                        <div class="product-image">


                            <?php if (!empty($produto["imagem"])): ?>

                                <img
                                    src="assets/img/produtos/<?php echo htmlspecialchars($produto['imagem']); ?>"
                                    alt="<?php echo htmlspecialchars($produto['nome']); ?>"
                                >

                            <?php else: ?>

                                <div class="product-placeholder">

                                    <i class="fa-solid fa-shirt"></i>

                                </div>

                            <?php endif; ?>


                            <span class="product-badge">
                                DESTAQUE
                            </span>


                        </div>



                        <!-- INFORMAÇÕES -->

                        <div class="product-info">


                            <span class="product-category">

                                <?php

                                echo htmlspecialchars(
                                    $produto["categoria"] ?? "Esportivo"
                                );

                                ?>

                            </span>


                            <h3>

                                <?php

                                echo htmlspecialchars(
                                    $produto["nome"]
                                );

                                ?>

                            </h3>


                            <p>

                                <?php

                                echo htmlspecialchars(
                                    $produto["descricao"] ?? ""
                                );

                                ?>

                            </p>


                            <div class="product-bottom">


                                <strong class="product-price">

                                    R$

                                    <?php

                                    echo number_format(
                                        $produto["preco"],
                                        2,
                                        ",",
                                        "."
                                    );

                                    ?>

                                </strong>


                                <a
                                    href="produtos.php"
                                    class="product-button"
                                    title="Ver produto"
                                >

                                    <i class="fa-solid fa-arrow-right"></i>

                                </a>


                            </div>


                        </div>


                    </article>


                <?php endforeach; ?>


            <?php else: ?>


                <div class="empty-products">

                    <i class="fa-solid fa-box-open"></i>

                    <h3>
                        Nenhum produto cadastrado
                    </h3>

                    <p>
                        Em breve teremos novidades por aqui.
                    </p>

                </div>


            <?php endif; ?>


        </div>




        <div class="section-button">

            <a
                href="produtos.php"
                class="btn btn-outline"
            >

                VER TODOS OS PRODUTOS

                <i class="fa-solid fa-arrow-right"></i>

            </a>

        </div>


    </div>

</section>





<section class="about-preview">

    <div class="container about-grid">


        <div class="about-decoration">

            <div class="chinese-symbol">
                龍
            </div>

        </div>


        <div class="about-content">


            <span class="section-subtitle">
                SOBRE A THIGGA
            </span>


            <h2>

                NÃO APENAS
                <span>CHINA IN BOX.</span>

            </h2>


            <p>

                A THIGGA nasceu da união entre esporte,
                cultura urbana e a força da tradição chinesa.

            </p>


            <p>

                Nossa proposta é oferecer produtos que
                acompanhem quem busca performance, estilo
                e superação em todos os desafios.

            </p>


            <a
                href="sobre.php"
                class="btn btn-primary"
            >

                CONHEÇA A THIGGA

                <i class="fa-solid fa-arrow-right"></i>

            </a>


        </div>


    </div>

</section>





<section class="cta-section">

    <div class="container cta-content">


        <span class="cta-symbol">
            龍
        </span>


        <h2>
            PRONTO PARA
            <span>SUPERAR?</span>
        </h2>


        <p>
            Seu próximo desafio começa aqui.
        </p>


        <a
            href="produtos.php"
            class="btn btn-primary"
        >

            COMEÇAR AGORA

            <i class="fa-solid fa-arrow-right"></i>

        </a>


    </div>

</section>





<footer class="site-footer">

    <div class="container footer-grid">


        <!-- MARCA -->

        <div class="footer-brand">

            <a
                href="index.php"
                class="logo"
            >

                <span class="logo-icon">
                    🏮
                </span>

                <span class="logo-text">
                    THIGGA
                </span>

            </a>


            <p>

                Artigos esportivos para quem busca
                performance, estilo e superação.

            </p>


            <div class="social-links">

                <a
                    href="#"
                    aria-label="Instagram"
                >

                    <i class="fa-brands fa-instagram"></i>

                </a>


                <a
                    href="#"
                    aria-label="Facebook"
                >

                    <i class="fa-brands fa-facebook"></i>

                </a>


                <a
                    href="#"
                    aria-label="TikTok"
                >

                    <i class="fa-brands fa-tiktok"></i>

                </a>

            </div>

        </div>



      

        <div class="footer-column">

            <h3>
                Navegação
            </h3>

            <a href="index.php">
                Início
            </a>

            <a href="produtos.php">
                Produtos
            </a>

            <a href="categorias.php">
                Categorias
            </a>

            <a href="sobre.php">
                Sobre
            </a>

            <a href="contato.php">
                Contato
            </a>

        </div>




        <div class="footer-column">

            <h3>
                Categorias
            </h3>

            <a href="produtos.php">
                Roupas
            </a>

            <a href="produtos.php">
                Calçados
            </a>

            <a href="produtos.php">
                Acessórios
            </a>

            <a href="produtos.php">
                Equipamentos
            </a>

        </div>



   

        <div class="footer-column">

            <h3>
                Contato
            </h3>

            <p>
                <i class="fa-solid fa-envelope"></i>
                contato@thigga.com
            </p>

            <p>
                <i class="fa-solid fa-phone"></i>
                (11) 99999-9999
            </p>

            <p>
                <i class="fa-solid fa-location-dot"></i>
                São Paulo - SP
            </p>

        </div>


    </div>


    <div class="footer-bottom">

        <div class="container">

            <p>

                &copy;

                <?php echo date("Y"); ?>

                THIGGA Artigos Esportivos.

                Todos os direitos reservados.

            </p>

        </div>

    </div>

</footer>





<script src="assets/js/script.js"></script>

</body>

</html>