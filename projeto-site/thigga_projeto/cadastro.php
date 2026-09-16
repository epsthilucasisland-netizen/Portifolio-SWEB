<?php

session_start();

require_once "config/conexao.php";

$erro = "";
$sucesso = "";

if (isset($_SESSION["cliente_id"])) {
    header("Location: perfil.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = trim($_POST["nome"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $telefone = trim($_POST["telefone"] ?? "");
    $cidade = trim($_POST["cidade"] ?? "");
    $senha = $_POST["senha"] ?? "";
    $confirmarSenha = $_POST["confirmar_senha"] ?? "";

    if (
        empty($nome) ||
        empty($email) ||
        empty($senha) ||
        empty($confirmarSenha)
    ) {

        $erro = "Preencha todos os campos obrigatórios.";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $erro = "Digite um e-mail válido.";

    } elseif (strlen($senha) < 6) {

        $erro = "A senha precisa ter pelo menos 6 caracteres.";

    } elseif ($senha !== $confirmarSenha) {

        $erro = "As senhas não coincidem.";

    } else {

        $stmt = $pdo->prepare(
            "SELECT id FROM clientes WHERE email = ? LIMIT 1"
        );

        $stmt->execute([$email]);

        if ($stmt->fetch()) {

            $erro = "Já existe uma conta cadastrada com esse e-mail.";

        } else {

            $senhaHash = password_hash(
                $senha,
                PASSWORD_DEFAULT
            );

            $stmt = $pdo->prepare(
                "INSERT INTO clientes
                (nome, email, senha, telefone, cidade)
                VALUES (?, ?, ?, ?, ?)"
            );

            $stmt->execute([
                $nome,
                $email,
                $senhaHash,
                $telefone,
                $cidade
            ]);

            header("Location: login.php?cadastro=sucesso");
            exit;
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

    <title>Criar Conta | THIGGA</title>

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

            <a href="index.php">Início</a>
            <a href="produtos.php">Produtos</a>
            <a href="categorias.php">Categorias</a>
            <a href="sobre.php">Sobre</a>
            <a href="contato.php">Contato</a>

        </nav>

    </div>

</header>


<main class="auth-page">

    <div class="auth-container">

        <p class="section-subtitle">
            JUNTE-SE À THIGGA
        </p>

        <h1>CRIAR CONTA</h1>

        <p class="auth-description">
            Crie sua conta para aproveitar a experiência THIGGA.
        </p>


        <?php if (!empty($erro)): ?>

            <div class="auth-error">
                <?php echo htmlspecialchars($erro); ?>
            </div>

        <?php endif; ?>


        <form method="POST" class="auth-form">

            <div class="auth-field">

                <label for="nome">
                    Nome *
                </label>

                <input
                    type="text"
                    id="nome"
                    name="nome"
                    value="<?php echo htmlspecialchars($_POST["nome"] ?? ""); ?>"
                    required
                >

            </div>


            <div class="auth-field">

                <label for="email">
                    E-mail *
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="<?php echo htmlspecialchars($_POST["email"] ?? ""); ?>"
                    required
                >

            </div>


            <div class="auth-field">

                <label for="telefone">
                    Telefone
                </label>

                <input
                    type="text"
                    id="telefone"
                    name="telefone"
                    value="<?php echo htmlspecialchars($_POST["telefone"] ?? ""); ?>"
                >

            </div>


            <div class="auth-field">

                <label for="cidade">
                    Cidade
                </label>

                <input
                    type="text"
                    id="cidade"
                    name="cidade"
                    value="<?php echo htmlspecialchars($_POST["cidade"] ?? ""); ?>"
                >

            </div>


            <div class="auth-field">

                <label for="senha">
                    Senha *
                </label>

                <input
                    type="password"
                    id="senha"
                    name="senha"
                    minlength="6"
                    required
                >

            </div>


            <div class="auth-field">

                <label for="confirmar_senha">
                    Confirmar senha *
                </label>

                <input
                    type="password"
                    id="confirmar_senha"
                    name="confirmar_senha"
                    minlength="6"
                    required
                >

            </div>


            <button
                type="submit"
                class="btn btn-primary auth-button"
            >
                CRIAR CONTA
            </button>

        </form>


        <p class="auth-link">

            Já possui uma conta?

            <a href="login.php">
                Entrar
            </a>

        </p>

    </div>

</main>

<script src="assets/js/script.js"></script>

</body>
</html>