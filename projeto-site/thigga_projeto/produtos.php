<?php

require_once "config/conexao.php";


$categoriaSelecionada = filter_input(
    INPUT_GET,
    "categoria",
    FILTER_VALIDATE_INT
);


$sqlCategorias = "
    SELECT id, nome
    FROM categorias
    ORDER BY nome ASC
";

$stmtCategorias = $pdo->query($sqlCategorias);

$categorias = $stmtCategorias->fetchAll(
    PDO::FETCH_ASSOC
);


if ($categoriaSelecionada) {

    $sql = "
        SELECT
            p.*,
            c.nome AS categoria
        FROM produtos p
        LEFT JOIN categorias c
            ON p.categoria_id = c.id
        WHERE p.categoria_id = :categoria
        ORDER BY p.nome
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(
        ":categoria",
        $categoriaSelecionada,
        PDO::PARAM_INT
    );

    $stmt->execute();

} else {

    $sql = "
        SELECT
            p.*,
            c.nome AS categoria
        FROM produtos p
        LEFT JOIN categorias c
            ON p.categoria_id = c.id
        ORDER BY p.id DESC
    ";

    $stmt = $pdo->query($sql);
}


$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);


function imagemProduto($produto)
{
    $imagemBanco = trim($produto["imagem"] ?? "");

    if ($imagemBanco !== "") {

        $arquivo = __DIR__ . "/assets/img/" . $imagemBanco;

        if (file_exists($arquivo)) {
            return $imagemBanco;
        }
    }


    $nome = mb_strtolower(
        $produto["nome"] ?? "",
        "UTF-8"
    );


    if (str_contains($nome, "camiseta")) {
        return "camiseta.jpeg";
    }

    if (
        str_contains($nome, "boné") ||
        str_contains($nome, "bone")
    ) {
        return "bon#U00e9.jpeg";
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

    if (str_contains($nome, "luva")) {
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

    <title>Produtos | THIGGA</title>

    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >

    <link
        rel="stylesheet"
        href="assets/css/responsive.css"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
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

            <a href="index.php">
                Início
            </a>

            <a
                href="produtos.php"
                class="active"
            >
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
            >
                🔎
            </a>

            <a
                href="produtos.php"
                class="cart-button"
            >
                🛒
            </a>

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



<section
    class="hero"
    style="min-height:280px;"
>

    <div class="hero-overlay"></div>

    <div class="container hero-content">

        <div class="hero-text">

            <p class="hero-subtitle">
                CATÁLOGO OFICIAL
            </p>

            <h1>
                NOSSOS
                <span>PRODUTOS</span>
            </h1>

            <p>
                Encontre roupas, calçados,
                acessórios e equipamentos esportivos.
            </p>

        </div>

    </div>

</section>



<section
    style="
        padding:40px 0;
        background:#151515;
    "
>

    <div class="container">

        <h2
            style="
                margin-bottom:20px;
                font-family:Orbitron;
            "
        >
            Filtrar por categoria
        </h2>


        <div
            style="
                display:flex;
                flex-wrap:wrap;
                gap:10px;
            "
        >

            <a
                href="produtos.php"
                class="btn btn-secondary"
            >
                Todos
            </a>


            <?php foreach ($categorias as $cat): ?>

                <a
                    href="produtos.php?categoria=<?php echo (int)$cat["id"]; ?>"
                    class="btn btn-outline"
                >
                    <?php
                    echo htmlspecialchars(
                        $cat["nome"]
                    );
                    ?>
                </a>

            <?php endforeach; ?>

        </div>

    </div>

</section>



<section class="products-section">

    <div class="container">

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

                                    <i class="fa-solid fa-shirt"></i>

                                </div>

                            <?php endif; ?>

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
                                    href="#"
                                    class="product-button"
                                >
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a>

                            </div>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>

        <?php else: ?>

            <div class="empty-products">

                <i class="fa-solid fa-box-open"></i>

                <h3>
                    Nenhum produto encontrado
                </h3>

                <p>
                    Nenhum produto cadastrado nesta categoria.
                </p>

            </div>

        <?php endif; ?>

    </div>

</section>



<footer class="site-footer">

    <div class="container footer-grid">

        <div class="footer-brand">

            <img
                src="assets/img/logo.png"
                alt="THIGGA"
                class="logo-img"
            >

            <p>
                Artigos esportivos inspirados em
                força, disciplina e superação.
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

        </div>

    </div>


    <div class="container footer-bottom">

        <p>
            © <?php echo date("Y"); ?>
            THIGGA Artigos Esportivos
        </p>

    </div>

</footer>


<script src="assets/js/script.js"></script>

</body>

</html>