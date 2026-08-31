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

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Categorias | THIGGA</title>

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
        <a href="categorias.php" class="active">Categorias</a>
        <a href="sobre.php">Sobre</a>
        <a href="contato.php">Contato</a>
    </nav>

</div>

</header>



<section class="hero" style="min-height:280px;">

<div class="container hero-content">

    <div class="hero-text">

        <span class="hero-subtitle">EXPLORE</span>

        <h1>NOSSAS <span>CATEGORIAS</span></h1>

        <p>Escolha a categoria ideal para encontrar seu próximo equipamento esportivo.</p>

    </div>

</div>

</section>



<section class="categories-section">

<div class="container">

    <div class="section-header">

        <span class="section-subtitle">THIGGA</span>

        <h2>CATEGORIAS DISPONÍVEIS</h2>

        <p>Todas as categorias cadastradas pelo sistema administrativo.</p>

    </div>

    <div class="categories-grid">

        <?php if(count($categorias) > 0): ?>

            <?php foreach($categorias as $categoria): ?>

                <a href="produtos.php?categoria=<?php echo $categoria['id']; ?>" class="category-card">

                    <div class="category-icon">

                        <?php

                        switch(strtolower($categoria["nome"])){

                            case "roupas":
                                echo '<i class="fa-solid fa-shirt"></i>';
                                break;

                            case "calçados":
                                echo '<i class="fa-solid fa-shoe-prints"></i>';
                                break;

                            case "acessórios":
                                echo '<i class="fa-solid fa-baseball-cap"></i>';
                                break;

                            case "equipamentos":
                                echo '<i class="fa-solid fa-dumbbell"></i>';
                                break;

                            default:
                                echo '<i class="fa-solid fa-basketball"></i>';

                        }

                        ?>

                    </div>

                    <div class="category-info">

                        <h3><?php echo htmlspecialchars($categoria["nome"]); ?></h3>

                        <p><?php echo htmlspecialchars($categoria["descricao"]); ?></p>

                        <span class="category-link">

                            Ver produtos
                            <i class="fa-solid fa-arrow-right"></i>

                        </span>

                    </div>

                </a>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="empty-products">

                <i class="fa-solid fa-folder-open"></i>

                <h3>Nenhuma categoria encontrada</h3>

                <p>Cadastre categorias no painel administrativo.</p>

            </div>

        <?php endif; ?>

    </div>

</div>

</section>



<section class="cta-section">

<div class="container cta-content">

    <span class="cta-symbol">龍</span>

    <h2>ENCONTRE O PRODUTO <span>PERFEITO</span></h2>

    <p>Cada categoria foi criada para facilitar sua busca.</p>

    <a href="produtos.php" class="btn btn-primary">

        VER CATÁLOGO

        <i class="fa-solid fa-arrow-right"></i>

    </a>

</div>

</section>



<footer class="site-footer">

<div class="container footer-grid">

    <div class="footer-brand">

        <h2 class="logo-text">THIGGA</h2>

        <p>Força • Disciplina • Performance</p>

    </div>

    <div class="footer-column">

        <h3>Navegação</h3>

        <a href="index.php">Início</a>

        <a href="produtos.php">Produtos</a>

        <a href="sobre.php">Sobre</a>

        <a href="contato.php">Contato</a>

    </div>

    <div class="footer-column">

        <h3>Contato</h3>

        <p>contato@thigga.com</p>

        <p>(11) 99999-9999</p>

        <p>São Paulo - SP</p>

    </div>

</div>

<div class="footer-bottom">

    <p>© <?php echo date("Y"); ?> THIGGA Artigos Esportivos</p>

</div>

</footer>

</body>
</html>