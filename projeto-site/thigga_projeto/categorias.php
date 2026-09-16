<?php

require_once "config/conexao.php";

$sql = "
    SELECT
        id,
        nome,
        descricao
    FROM categorias
    ORDER BY nome ASC
";

$stmt = $pdo->query($sql);

$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>

```
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Categorias | THIGGA</title>

<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/responsive.css">
```

</head>

<body>

<header class="site-header">

```
<div class="container navbar">

    <a href="index.php" class="logo">

        <img
            src="assets/img/logo.jpeg"
            alt="THIGGA"
            class="logo-img"
        >

    </a>


    <nav class="main-menu" id="mainMenu">

        <a href="index.php">Início</a>

        <a href="produtos.php">Produtos</a>

        <a href="categorias.php" class="active">
            Categorias
        </a>

        <a href="sobre.php">Sobre</a>

        <a href="contato.php">Contato</a>

    </nav>


    <div class="header-actions">

        <a href="produtos.php" class="search-button">
            🔎
        </a>

        <a href="produtos.php" class="cart-button">
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
```

</header>

<main>

<section class="hero">

```
<div class="hero-overlay"></div>

<div class="container hero-content">

    <div class="hero-text">

        <p class="hero-subtitle">
            ENCONTRE SEU ESTILO
        </p>

        <h1>
            NOSSAS
            <span>CATEGORIAS.</span>
        </h1>

        <p>
            Explore nossos produtos e encontre os equipamentos
            ideais para acompanhar sua evolução.
        </p>

    </div>

    <div class="hero-decoration">
        龍
    </div>

</div>
```

</section>

<section class="categories-section">

```
<div class="container">

    <div class="section-header">

        <p class="section-subtitle">
            EXPLORE
        </p>

        <h2>
            CATEGORIAS ESPORTIVAS
        </h2>

    </div>


    <?php if (!empty($categorias)): ?>

        <div class="categories-grid">

            <?php foreach ($categorias as $categoria): ?>

                <?php

                $imagemCategoria = "academia.jpg";

                switch (strtolower($categoria["nome"])) {

                    case "academia":
                        $imagemCategoria = "academia.jpg";
                        break;

                    case "acessórios":
                    case "acessorios":
                        $imagemCategoria = "acessórios.jpg";
                        break;

                    case "basquete":
                        $imagemCategoria = "basquete.jpg";
                        break;

                    case "corrida":
                        $imagemCategoria = "corrida.jpg";
                        break;

                }

                ?>


                <a
                    href="produtos.php?categoria=<?php echo $categoria['id']; ?>"
                    class="category-card"
                >

                    <div class="category-icon">

                        <img
                            src="assets/img/categorias/<?php echo htmlspecialchars($imagemCategoria); ?>"
                            alt="<?php echo htmlspecialchars($categoria['nome']); ?>"
                        >

                    </div>


                    <div class="category-info">

                        <h3>
                            <?php echo htmlspecialchars($categoria["nome"]); ?>
                        </h3>

                        <p>
                            <?php echo htmlspecialchars($categoria["descricao"]); ?>
                        </p>

                        <span class="category-link">
                            Ver produtos →
                        </span>

                    </div>

                </a>

            <?php endforeach; ?>

        </div>

    <?php else: ?>

        <p class="empty-message">
            Nenhuma categoria cadastrada.
        </p>

    <?php endif; ?>

</div>
```

</section>

<section class="cta-section">

```
<div class="container cta-content">

    <div class="cta-symbol">
        龍
    </div>

    <div>

        <p class="section-subtitle">
            ENCONTRE SEU EQUIPAMENTO
        </p>

        <h2>
            PRONTO PARA COMEÇAR?
        </h2>

    </div>

    <a href="produtos.php" class="btn btn-primary">
        Ver produtos
    </a>

</div>
```

</section>

</main>

<footer class="site-footer">

```
<div class="container footer-grid">

    <div class="footer-brand">

        <img
            src="assets/img/logo.jpeg"
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

        <a href="produtos.php">Academia</a>
        <a href="produtos.php">Acessórios</a>
        <a href="produtos.php">Basquete</a>
        <a href="produtos.php">Corrida</a>

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
```

</footer>

<script src="assets/js/script.js"></script>

</body>

</html>
