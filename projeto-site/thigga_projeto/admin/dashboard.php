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

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Painel Administrativo | THIGGA
    </title>

    <link
        rel="stylesheet"
        href="../assets/css/admin.css"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet"
    >

</head>

<body>


<header class="admin-header">

    <a
        href="dashboard.php"
        class="admin-brand"
    >

        <img
            src="../assets/img/logo.png"
            alt="THIGGA"
            class="admin-logo-img"
        >

        <div>

            <strong>THIGGA</strong>

            <span>
                ADMIN
            </span>

        </div>

    </a>


    <nav class="admin-menu">

        <a
            href="dashboard.php"
            class="active"
        >
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

        <a
            href="../logout.php"
            class="admin-sair"
        >
            Sair
        </a>

    </nav>

</header>



<main class="admin-container">


    <section class="admin-welcome">

        <div>

            <span class="admin-label">
                PAINEL ADMINISTRATIVO
            </span>

            <h1>
                Bem-vindo,
                <?php
                echo htmlspecialchars(
                    $_SESSION["admin_nome"]
                );
                ?>!
            </h1>

            <p>
                Gerencie os produtos, categorias e clientes
                da THIGGA em um só lugar.
            </p>

        </div>


        <div class="admin-symbol">
            龍
        </div>

    </section>



    <section class="dashboard-cards">


        <article class="dashboard-card">

            <div class="dashboard-card-icon">
                📦
            </div>

            <div>

                <span>
                    PRODUTOS
                </span>

                <div class="numero">
                    <?php echo $totalProdutos; ?>
                </div>

                <p>
                    Produtos cadastrados
                </p>

            </div>

            <a href="produtos/listar.php">
                Gerenciar produtos →
            </a>

        </article>



        <article class="dashboard-card">

            <div class="dashboard-card-icon">
                🏷️
            </div>

            <div>

                <span>
                    CATEGORIAS
                </span>

                <div class="numero">
                    <?php echo $totalCategorias; ?>
                </div>

                <p>
                    Categorias cadastradas
                </p>

            </div>

            <a href="categorias/listar.php">
                Gerenciar categorias →
            </a>

        </article>



        <article class="dashboard-card">

            <div class="dashboard-card-icon">
                👥
            </div>

            <div>

                <span>
                    CLIENTES
                </span>

                <div class="numero">
                    <?php echo $totalClientes; ?>
                </div>

                <p>
                    Clientes cadastrados
                </p>

            </div>

            <a href="clientes/listar.php">
                Gerenciar clientes →
            </a>

        </article>


    </section>



    <section class="admin-atalhos">

        <div class="admin-section-title">

            <span>
                GERENCIAMENTO
            </span>

            <h2>
                Acesso rápido
            </h2>

        </div>


        <div class="atalhos-grid">


            <a
                href="produtos/novo.php"
                class="atalho-card"
            >

                <div class="atalho-icon">
                    ＋
                </div>

                <div>

                    <h3>
                        Novo produto
                    </h3>

                    <p>
                        Cadastre um novo produto
                        no catálogo.
                    </p>

                </div>

            </a>



            <a
                href="categorias/novo.php"
                class="atalho-card"
            >

                <div class="atalho-icon">
                    ＋
                </div>

                <div>

                    <h3>
                        Nova categoria
                    </h3>

                    <p>
                        Adicione uma nova categoria
                        esportiva.
                    </p>

                </div>

            </a>



            <a
                href="clientes/novo.php"
                class="atalho-card"
            >

                <div class="atalho-icon">
                    ＋
                </div>

                <div>

                    <h3>
                        Novo cliente
                    </h3>

                    <p>
                        Cadastre um cliente
                        no sistema.
                    </p>

                </div>

            </a>


        </div>

    </section>



    <section class="admin-about">

        <div class="admin-about-symbol">
            龍
        </div>


        <div>

            <span class="admin-label">
                THIGGA
            </span>

            <h2>
                Sistema Administrativo
            </h2>

            <p>
                Este painel permite realizar o gerenciamento
                completo do site THIGGA através dos três
                CRUDs principais: produtos, categorias
                e clientes.
            </p>

            <p>
                Por aqui é possível cadastrar, visualizar,
                editar e excluir informações armazenadas
                no banco de dados.
            </p>

        </div>

    </section>


</main>



<footer class="admin-footer">

    <p>
        THIGGA Artigos Esportivos
        <span>•</span>
        Painel Administrativo
        <span>•</span>
        <?php echo date("Y"); ?>
    </p>

</footer>


<script src="../assets/js/admin.js"></script>

</body>

</html>