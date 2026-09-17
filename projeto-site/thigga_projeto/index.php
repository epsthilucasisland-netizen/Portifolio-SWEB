<?php

session_start();

require_once "config/conexao.php";


$sqlCategorias = "
    SELECT id, nome, descricao
    FROM categorias
    ORDER BY nome ASC
    LIMIT 4
";

$stmtCategorias = $pdo->query($sqlCategorias);
$categorias = $stmtCategorias->fetchAll(PDO::FETCH_ASSOC);


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
$produtos = $stmtProdutos->fetchAll(PDO::FETCH_ASSOC);




function imagemCategoria($nome)
{
    $nome = mb_strtolower(trim($nome), "UTF-8");

    $imagens = [
        "roupas"       => "academia.jpeg",
        "calçados"     => "corrida.jpeg",
        "calcados"     => "corrida.jpeg",
        "acessórios"   => "acessorios.jpeg",
        "acessorios"   => "acessorios.jpeg",
        "equipamentos" => "basquete.jpeg",
        "academia"     => "academia.jpeg",
        "basquete"     => "basquete.jpeg",
        "corrida"      => "corrida.jpeg"
    ];

    return $imagens[$nome] ?? "academia.jpeg";
}




function imagemProduto($produto)
{
    $imagemBanco = trim($produto["imagem"] ?? "");

    if ($imagemBanco !== "") {

        $caminho = __DIR__ . "/assets/img/" . $imagemBanco;

        if (file_exists($caminho)) {
            return $imagemBanco;
        }
    }


    $nome = mb_strtolower($produto["nome"] ?? "", "UTF-8");


    if (str_contains($nome, "camiseta")) {
        return "camiseta.jpeg";
    }

    if (
        str_contains($nome, "boné") ||
        str_contains($nome, "bone")
    ) {
        return "bone.jpeg";
    }

    if (
        str_contains($nome, "bola") ||
        str_contains($nome, "basquete")
    ) {
        return "nggaball.jpeg";
    }

    if (
        str_contains($nome, "squeeze") ||
        str_contains($nome, "garrafa")
    ) {
        return "squeezito.jpeg";
    }

    if (
        str_contains($nome, "luva")
    ) {
        return "luvagay.jpeg";
    }

    if (
        str_contains($nome, "bolsa") ||
        str_contains($nome, "mochila")
    ) {
        return "borsa.jpeg";
    }


    return "";
}

?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>THIGGA | Artigos Esportivos</title>

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

        <a href="index.php" class="logo">

            <img
                src="assets/img/logo.png"
                alt="THIGGA"
                class="logo-img"
            >

        </a>


        <nav class="main-menu" id="mainMenu">

            <a href="index.php" class="active">
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

            <a href="produtos.php" class="search-button">
                🔎
            </a>

            <a href="produtos.php" class="cart-button">
                🛒
            </a>


            <?php if (isset($_SESSION["cliente_id"])): ?>

                <a href="perfil.php" class="nav-user">

                    👤
                    <?php
                    echo htmlspecialchars(
                        $_SESSION["cliente_nome"]
                    );
                    ?>

                </a>

            <?php else: ?>

                <a href="login.php" class="nav-user">
                    👤 Entrar
                </a>

            <?php endif; ?>


            <button
                class="menu-toggle"
                id="menuToggle"
                type="button"
            >
                ☰
            </button>

        </div>

    </div>

</header>


<main>


<section class="hero">

    <div class="hero-overlay"></div>


    <div class="container hero-content">

        <div class="hero-text">

            <p class="hero-subtitle">
                PERFORMANCE • ESTILO • TRADIÇÃO
            </p>

            <h1>
                SUPERE
                <span>SEUS LIMITES.</span>
            </h1>

            <p>
                Equipamentos e artigos esportivos para quem
                busca performance, estilo e determinação.
            </p>


            <div class="hero-buttons">

                <a
                    href="produtos.php"
                    class="btn btn-primary"
                >
                    Ver produtos
                </a>

                <a
                    href="sobre.php"
                    class="btn btn-secondary"
                >
                    Conheça a THIGGA
                </a>

            </div>

        </div>

    </div>

</section>



<section class="categories-section">

    <div class="container">

        <div class="section-header">

            <p class="section-subtitle">
                ENCONTRE O QUE PRECISA
            </p>

            <h2>
                NOSSAS CATEGORIAS
            </h2>

        </div>


        <div class="categories-grid">

            <?php foreach ($categorias as $categoria): ?>

                <?php
                $imagem = imagemCategoria(
                    $categoria["nome"]
                );
                ?>

                <a
                    href="produtos.php?categoria=<?php echo (int)$categoria["id"]; ?>"
                    class="category-card"
                >

                    <div class="category-icon">

                        <img
                            src="assets/img/categorias/<?php echo htmlspecialchars($imagem); ?>"
                            alt="<?php echo htmlspecialchars($categoria["nome"]); ?>"
                        >

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
                                $categoria["descricao"]
                            );
                            ?>
                        </p>

                        <span class="category-link">
                            Ver produtos →
                        </span>

                    </div>

                </a>

            <?php endforeach; ?>

        </div>

    </div>

</section>



<section class="products-section">

    <div class="container">

        <div class="section-header">

            <p class="section-subtitle">
                DESTAQUES
            </p>

            <h2>
                PRODUTOS EM DESTAQUE
            </h2>

        </div>


        <?php if (!empty($produtos)): ?>

            <div class="products-grid">

                <?php foreach ($produtos as $produto): ?>

                    <?php
                    $imagem = imagemProduto($produto);
                    ?>

                    <article class="product-card">

                        <div class="product-image">

                            <?php if ($imagem !== ""): ?>

                                <img
                                    src="assets/img/<?php echo htmlspecialchars($imagem); ?>"
                                    alt="<?php echo htmlspecialchars($produto["nome"]); ?>"
                                    loading="lazy"
                                >

                            <?php else: ?>

                                <div class="product-placeholder">
                                    🏀
                                </div>

                            <?php endif; ?>


                            <span class="product-badge">
                                DESTAQUE
                            </span>

                        </div>


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
                                    $produto["descricao"]
                                );
                                ?>

                            </p>


                            <div class="product-price">

                                R$

                                <?php
                                echo number_format(
                                    $produto["preco"],
                                    2,
                                    ",",
                                    "."
                                );
                                ?>

                            </div>


                            <a
                                href="produtos.php"
                                class="product-button"
                            >
                                Ver produto
                            </a>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>

        <?php else: ?>

            <p class="empty-message">
                Nenhum produto cadastrado no momento.
            </p>

        <?php endif; ?>


        <div class="hero-buttons">

            <a
                href="produtos.php"
                class="btn btn-outline"
            >
                Ver todos os produtos
            </a>

        </div>

    </div>

</section>



<section class="about-preview">

    <div class="container about-grid">


        <div class="about-content">

            <p class="section-subtitle">
                SOBRE A THIGGA
            </p>

            <h2>
                FORÇA, DISCIPLINA E SUPERAÇÃO.
            </h2>

            <p>
                A THIGGA nasceu da união entre o universo
                esportivo e elementos da cultura chinesa,
                criando uma identidade marcada pela força,
                disciplina e determinação.
            </p>

            <p>
                Nosso objetivo é oferecer produtos esportivos
                que acompanhem cada pessoa em sua jornada
                de evolução.
            </p>

            <a
                href="sobre.php"
                class="btn btn-primary"
            >
                Conheça nossa história
            </a>

        </div>

    </div>

</section>



<section class="cta-section">

    <div class="container cta-content">

        <div class="cta-symbol">
            龍
        </div>

        <div>

            <p class="section-subtitle">
                SUA EVOLUÇÃO COMEÇA AGORA
            </p>

            <h2>
                ESTÁ PRONTO PARA SUPERAR SEUS LIMITES?
            </h2>

        </div>

        <a
            href="produtos.php"
            class="btn btn-primary"
        >
            Comprar agora
        </a>

    </div>

</section>


</main>



<footer class="site-footer">

    <div class="container footer-grid">

        <div class="footer-brand">

            <img
                src="assets/img/logo.png"
                alt="THIGGA"
                class="logo-img"
            >

            <p>
                Performance, estilo e tradição
                para quem não aceita limites.
            </p>

        </div>


        <div class="footer-column">

            <h3>Navegação</h3>

            <a href="index.php">Início</a>
            <a href="produtos.php">Produtos</a>
            <a href="categorias.php">Categorias</a>
            <a href="sobre.php">Sobre</a>
            <a href="contato.php">Contato</a>

        </div>


        <div class="footer-column">

            <h3>Categorias</h3>

            <a href="produtos.php">Roupas</a>
            <a href="produtos.php">Calçados</a>
            <a href="produtos.php">Acessórios</a>
            <a href="produtos.php">Equipamentos</a>

        </div>


        <div class="footer-column">

            <h3>Contato</h3>

            <p>contato@thigga.com</p>
            <p>(11) 99999-9999</p>
            <p>São Paulo - SP</p>

        </div>

    </div>


    <div class="container footer-bottom">

        <p>
            © <?php echo date("Y"); ?> THIGGA.
            Todos os direitos reservados.
        </p>

    </div>

</footer>


<script src="assets/js/script.js"></script>

</body>

</html>