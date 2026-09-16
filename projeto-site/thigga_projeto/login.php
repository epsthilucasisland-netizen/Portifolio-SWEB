<?php

session_start();

require_once "config/conexao.php";

$erro = "";
$sucesso = "";


// Se já estiver logado, vai para o perfil
if (isset($_SESSION["cliente_id"])) {

    header("Location: perfil.php");
    exit;

}


// Mensagem depois do cadastro
if (isset($_GET["cadastro"]) && $_GET["cadastro"] === "sucesso") {

    $sucesso = "Conta criada com sucesso! Agora faça seu login.";

}


// LOGIN
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"] ?? "");
    $senha = $_POST["senha"] ?? "";


    if (empty($email) || empty($senha)) {

        $erro = "Preencha o e-mail e a senha.";

    } else {

        $stmt = $pdo->prepare(
            "SELECT id, nome, email, senha
             FROM clientes
             WHERE email = ?
             LIMIT 1"
        );

        $stmt->execute([$email]);

        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);


        if (
            $cliente &&
            !empty($cliente["senha"]) &&
            password_verify($senha, $cliente["senha"])
        ) {

            // Proteção contra session fixation
            session_regenerate_id(true);


            // Salva os dados na sessão
            $_SESSION["cliente_id"] = $cliente["id"];

            $_SESSION["cliente_nome"] = $cliente["nome"];

            $_SESSION["cliente_email"] = $cliente["email"];


            // Vai para o perfil
            header("Location: perfil.php");
            exit;

        } else {

            $erro = "E-mail ou senha incorretos.";

        }

    }

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

    <title>Entrar | THIGGA</title>


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


        <nav class="main-menu">

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


    </div>

</header>



<main class="auth-page">


    <div class="auth-container">


        <p class="section-subtitle">
            BEM-VINDO DE VOLTA
        </p>


        <h1>
            ENTRAR
        </h1>


        <p class="auth-description">
            Entre na sua conta THIGGA.
        </p>



        <?php if (!empty($sucesso)): ?>

            <div class="auth-success">

                <?php
                echo htmlspecialchars($sucesso);
                ?>

            </div>

        <?php endif; ?>



        <?php if (!empty($erro)): ?>

            <div class="auth-error">

                <?php
                echo htmlspecialchars($erro);
                ?>

            </div>

        <?php endif; ?>



        <form
            method="POST"
            class="auth-form"
        >


            <div class="auth-field">


                <label for="email">
                    E-mail
                </label>


                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="seuemail@exemplo.com"
                    value="<?php echo htmlspecialchars($_POST["email"] ?? ""); ?>"
                    required
                >


            </div>



            <div class="auth-field">


                <label for="senha">
                    Senha
                </label>


                <input
                    type="password"
                    id="senha"
                    name="senha"
                    placeholder="Digite sua senha"
                    required
                >


            </div>



            <button
                type="submit"
                class="btn btn-primary auth-button"
            >

                ENTRAR

            </button>


        </form>



        <p class="auth-link">

            Ainda não possui uma conta?

            <a href="cadastro.php">
                Criar conta
            </a>

        </p>


        <p class="auth-link">

            <a href="index.php">
                ← Voltar para a página inicial
            </a>

        </p>


    </div>


</main>


<script src="assets/js/script.js"></script>


</body>

</html>