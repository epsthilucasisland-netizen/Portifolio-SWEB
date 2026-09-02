<?php

require_once "../config/auth.php";
require_once "../config/conexao.php";



$stmtProdutos = $pdo->query(
    "SELECT COUNT(*) FROM produtos"
);

$totalProdutos = $stmtProdutos->fetchColumn();




$stmtCategorias = $pdo->query(
    "SELECT COUNT(*) FROM categorias"
);

$totalCategorias = $stmtCategorias->fetchColumn();


$stmtClientes = $pdo->query(
    "SELECT COUNT(*) FROM clientes"
);

$totalClientes = $stmtClientes->fetchColumn();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Painel Administrativo | THIGGA</title>

    <link rel="stylesheet" href="../assets/css/admin.css">

    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet"
    >

</head>

<body>


<header class="admin-header">

    <div class="admin-logo">
        THIGGA
    </div>


    <nav class="admin-menu">

        <a href="dashboard.php">
            Dashboard
        </a>

        <a href="produtos/listar.php">
            Produtos
        </a>

        <a href="categorias/listar.php">
            Categorias
        </a>

        <a href="clientes/listar.php">
            Clientes
        </a>

        <a href="logout.php">
            Sair
        </a>

    </nav>

</header>




<main class="admin-container">


    <div class="admin-titulo">

        <h1>
            Painel Administrativo
        </h1>

        <p>
            Bem-vindo,
            <?php echo htmlspecialchars($_SESSION["admin_nome"]); ?>!
        </p>

    </div>





    <div class="dashboard-cards">


        <!-- PRODUTOS -->

        <div class="dashboard-card">

            <h3>
                Produtos cadastrados
            </h3>

            <div class="numero">
                <?php echo $totalProdutos; ?>
            </div>

            <a href="produtos/listar.php">
                Gerenciar produtos →
            </a>

        </div>


        <div class="dashboard-card">

            <h3>
                Categorias cadastradas
            </h3>

            <div class="numero">
                <?php echo $totalCategorias; ?>
            </div>

            <a href="categorias/listar.php">
                Gerenciar categorias →
            </a>

        </div>



    

        <div class="dashboard-card">

            <h3>
                Clientes cadastrados
            </h3>

            <div class="numero">
                <?php echo $totalClientes; ?>
            </div>

            <a href="clientes/listar.php">
                Gerenciar clientes →
            </a>

        </div>


    </div>



    <section style="margin-top:40px;">

        <div class="dashboard-card">

            <h3>
                Sobre o sistema
            </h3>

            <p style="margin-top:10px; color:#bbb;">

                Este é o painel administrativo da
                <strong style="color:#FFDE00;">
                    THIGGA Artigos Esportivos
                </strong>.

                <br><br>

                Através deste painel é possível
                cadastrar, visualizar, editar e excluir
                produtos, categorias e clientes.

            </p>

        </div>

    </section>


</main>





<footer class="admin-footer">

    THIGGA Artigos Esportivos —
    Painel Administrativo

</footer>


<script src="../assets/js/admin.js"></script>

</body>

</html>