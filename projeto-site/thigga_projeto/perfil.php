<?php

session_start();

require_once "config/conexao.php";



if (!isset($_SESSION["cliente_id"])) {

    header("Location: login.php");
    exit;
}




$idCliente = (int) $_SESSION["cliente_id"];


$sql = "
    SELECT
        id,
        nome,
        email,
        telefone,
        cidade,
        endereco
    FROM clientes
    WHERE id = :id
    LIMIT 1
";


$stmt = $pdo->prepare($sql);

$stmt->bindValue(
    ":id",
    $idCliente,
    PDO::PARAM_INT
);

$stmt->execute();


$cliente = $stmt->fetch(PDO::FETCH_ASSOC);


if (!$cliente) {

    session_unset();
    session_destroy();

    header("Location: login.php");
    exit;
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

    <title>Minha Conta | THIGGA</title>

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


        <nav
            class="main-menu"
            id="mainMenu"
        >

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

        </nav>


        <div class="header-actions">

            <a
                href="produtos.php"
                class="search-button"
                title="Produtos"
            >
                <i class="fa-solid fa-magnifying-glass"></i>
            </a>


            <a
                href="#"
                class="cart-button"
                title="Carrinho"
            >
                <i class="fa-solid fa-cart-shopping"></i>
            </a>


            <a
                href="perfil.php"
                class="nav-user"
            >

                <i class="fa-solid fa-user"></i>

                <?php
                echo htmlspecialchars(
                    $cliente["nome"]
                );
                ?>

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



<main>


<section class="perfil-hero">

    <div class="container">

        <span class="perfil-subtitulo">
            MINHA CONTA
        </span>

        <h1>
            OLÁ,
            <span>
                <?php
                echo htmlspecialchars(
                    $cliente["nome"]
                );
                ?>
            </span>
        </h1>

        <p>
            Gerencie suas informações pessoais
            e sua conta THIGGA.
        </p>

    </div>

</section>



<section class="perfil-section">

    <div class="container perfil-grid">


        <aside class="perfil-menu">

            <div class="perfil-avatar">

                <i class="fa-solid fa-user"></i>

            </div>


            <h2>
                <?php
                echo htmlspecialchars(
                    $cliente["nome"]
                );
                ?>
            </h2>


            <p>
                <?php
                echo htmlspecialchars(
                    $cliente["email"]
                );
                ?>
            </p>


            <nav>

                <a
                    href="perfil.php"
                    class="active"
                >
                    <i class="fa-solid fa-user"></i>

                    Minha conta
                </a>


                <a href="editar_perfil.php">

                    <i class="fa-solid fa-pen"></i>

                    Editar perfil

                </a>


                <a href="editar_perfil.php">

                    <i class="fa-solid fa-lock"></i>

                    Alterar senha

                </a>


                <a href="editar_perfil.php">

                    <i class="fa-solid fa-bag-shopping"></i>

                    Meus pedidos

                </a>


                <a
                    href="logout.php"
                    class="perfil-sair"
                >

                    <i class="fa-solid fa-right-from-bracket"></i>

                    Sair

                </a>

            </nav>

        </aside>



        <div class="perfil-conteudo">


            <div class="perfil-titulo">

                <span>
                    INFORMAÇÕES
                </span>

                <h2>
                    Dados pessoais
                </h2>

                <p>
                    Confira as informações cadastradas
                    na sua conta.
                </p>

            </div>



            <div class="perfil-dados">


                <div class="perfil-dado">

                    <div class="perfil-dado-icon">

                        <i class="fa-solid fa-user"></i>

                    </div>

                    <div>

                        <span>Nome</span>

                        <strong>
                            <?php
                            echo htmlspecialchars(
                                $cliente["nome"]
                            );
                            ?>
                        </strong>

                    </div>

                </div>



                <div class="perfil-dado">

                    <div class="perfil-dado-icon">

                        <i class="fa-solid fa-envelope"></i>

                    </div>

                    <div>

                        <span>E-mail</span>

                        <strong>
                            <?php
                            echo htmlspecialchars(
                                $cliente["email"]
                            );
                            ?>
                        </strong>

                    </div>

                </div>



                <div class="perfil-dado">

                    <div class="perfil-dado-icon">

                        <i class="fa-solid fa-phone"></i>

                    </div>

                    <div>

                        <span>Telefone</span>

                        <strong>

                            <?php

                            echo !empty($cliente["telefone"])
                                ? htmlspecialchars($cliente["telefone"])
                                : "Não informado";

                            ?>

                        </strong>

                    </div>

                </div>



                <div class="perfil-dado">

                    <div class="perfil-dado-icon">

                        <i class="fa-solid fa-city"></i>

                    </div>

                    <div>

                        <span>Cidade</span>

                        <strong>

                            <?php

                            echo !empty($cliente["cidade"])
                                ? htmlspecialchars($cliente["cidade"])
                                : "Não informada";

                            ?>

                        </strong>

                    </div>

                </div>



                <div class="perfil-dado perfil-dado-grande">

                    <div class="perfil-dado-icon">

                        <i class="fa-solid fa-location-dot"></i>

                    </div>

                    <div>

                        <span>Endereço</span>

                        <strong>

                            <?php

                            echo !empty($cliente["endereco"])
                                ? htmlspecialchars($cliente["endereco"])
                                : "Não informado";

                            ?>

                        </strong>

                    </div>

                </div>


            </div>



            <div class="perfil-acoes">

                <a
                   href="editar_perfil.php"
                    class="btn btn-primary"
                >

                    <i class="fa-solid fa-pen"></i>

                    Editar meus dados

                </a>


                <a
                    href="logout.php"
                    class="btn btn-secondary"
                >

                    <i class="fa-solid fa-right-from-bracket"></i>

                    Sair da conta

                </a>

            </div>


        </div>


    </div>

</section>


</main>



<footer class="site-footer">

    <div class="container footer-bottom">

        <p>

            © <?php echo date("Y"); ?>

            THIGGA Artigos Esportivos.

            Todos os direitos reservados.

        </p>

    </div>

</footer>


<script src="assets/js/script.js"></script>


</body>

</html>