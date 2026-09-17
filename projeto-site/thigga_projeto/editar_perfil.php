<?php

session_start();

require_once "config/conexao.php";



if (!isset($_SESSION["cliente_id"])) {
    header("Location: login.php");
    exit;
}


$idCliente = (int) $_SESSION["cliente_id"];

$erro = "";
$sucesso = "";



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

$stmt->execute([
    ":id" => $idCliente
]);

$cliente = $stmt->fetch(PDO::FETCH_ASSOC);


if (!$cliente) {

    session_unset();
    session_destroy();

    header("Location: login.php");
    exit;
}



if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = trim($_POST["nome"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $telefone = trim($_POST["telefone"] ?? "");
    $cidade = trim($_POST["cidade"] ?? "");
    $endereco = trim($_POST["endereco"] ?? "");


    if ($nome === "" || $email === "") {

        $erro = "Preencha o nome e o e-mail.";

    }


    

    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $erro = "Digite um endereço de e-mail válido.";

    }

    else {


        $sqlEmail = "
            SELECT id
            FROM clientes
            WHERE email = :email
            AND id != :id
            LIMIT 1
        ";

        $stmtEmail = $pdo->prepare($sqlEmail);

        $stmtEmail->execute([
            ":email" => $email,
            ":id" => $idCliente
        ]);


        if ($stmtEmail->fetch()) {

            $erro = "Este e-mail já está sendo utilizado por outra conta.";

        }

        else {


            $sqlUpdate = "
                UPDATE clientes
                SET
                    nome = :nome,
                    email = :email,
                    telefone = :telefone,
                    cidade = :cidade,
                    endereco = :endereco
                WHERE id = :id
            ";

            $stmtUpdate = $pdo->prepare($sqlUpdate);

            $atualizou = $stmtUpdate->execute([

                ":nome" => $nome,
                ":email" => $email,
                ":telefone" => $telefone,
                ":cidade" => $cidade,
                ":endereco" => $endereco,
                ":id" => $idCliente

            ]);


            if ($atualizou) {

             

                $_SESSION["cliente_nome"] = $nome;

                $sucesso = "Dados atualizados com sucesso!";


        

                $cliente["nome"] = $nome;
                $cliente["email"] = $email;
                $cliente["telefone"] = $telefone;
                $cliente["cidade"] = $cidade;
                $cliente["endereco"] = $endereco;

            }

            else {

                $erro = "Não foi possível atualizar seus dados.";

            }
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

    <title>Editar Perfil | THIGGA</title>


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

        <a
            href="index.php"
            class="logo"
        >

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



<section class="perfil-hero">

    <div class="container">

        <span class="perfil-subtitulo">
            MINHA CONTA
        </span>

        <h1>
            EDITAR
            <span>PERFIL</span>
        </h1>

        <p>
            Atualize suas informações pessoais
            cadastradas na THIGGA.
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

                <a href="perfil.php">

                    <i class="fa-solid fa-user"></i>

                    Minha conta

                </a>


                <a
                    href="editar_perfil.php"
                    class="active"
                >

                    <i class="fa-solid fa-pen"></i>

                    Editar perfil

                </a>


                <a href="#">

                    <i class="fa-solid fa-lock"></i>

                    Alterar senha

                </a>


                <a href="#">

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
                    CONFIGURAÇÕES
                </span>

                <h2>
                    Editar meus dados
                </h2>

                <p>
                    Faça as alterações desejadas
                    e clique em salvar.
                </p>

            </div>



       

            <?php if ($erro !== ""): ?>

                <div class="perfil-mensagem perfil-erro">

                    <i class="fa-solid fa-circle-exclamation"></i>

                    <?php
                    echo htmlspecialchars($erro);
                    ?>

                </div>

            <?php endif; ?>



       

            <?php if ($sucesso !== ""): ?>

                <div class="perfil-mensagem perfil-sucesso">

                    <i class="fa-solid fa-circle-check"></i>

                    <?php
                    echo htmlspecialchars($sucesso);
                    ?>

                </div>

            <?php endif; ?>



      

            <form
                method="POST"
                action="editar_perfil.php"
                class="perfil-form"
            >


       
                <div class="perfil-form-group">

                    <label for="nome">

                        <i class="fa-solid fa-user"></i>

                        Nome completo

                    </label>


                    <input
                        type="text"
                        id="nome"
                        name="nome"
                        value="<?php echo htmlspecialchars($cliente["nome"]); ?>"
                        maxlength="100"
                        required
                    >

                </div>



                <div class="perfil-form-group">

                    <label for="email">

                        <i class="fa-solid fa-envelope"></i>

                        E-mail

                    </label>


                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="<?php echo htmlspecialchars($cliente["email"]); ?>"
                        maxlength="150"
                        required
                    >

                </div>



                <!-- TELEFONE -->

                <div class="perfil-form-group">

                    <label for="telefone">

                        <i class="fa-solid fa-phone"></i>

                        Telefone

                    </label>


                    <input
                        type="text"
                        id="telefone"
                        name="telefone"
                        value="<?php echo htmlspecialchars($cliente["telefone"] ?? ""); ?>"
                        maxlength="30"
                        placeholder="(11) 99999-9999"
                    >

                </div>



                <!-- CIDADE -->

                <div class="perfil-form-group">

                    <label for="cidade">

                        <i class="fa-solid fa-city"></i>

                        Cidade

                    </label>


                    <input
                        type="text"
                        id="cidade"
                        name="cidade"
                        value="<?php echo htmlspecialchars($cliente["cidade"] ?? ""); ?>"
                        maxlength="100"
                        placeholder="Sua cidade"
                    >

                </div>



                <!-- ENDEREÇO -->

                <div class="perfil-form-group perfil-form-full">

                    <label for="endereco">

                        <i class="fa-solid fa-location-dot"></i>

                        Endereço

                    </label>


                    <input
                        type="text"
                        id="endereco"
                        name="endereco"
                        value="<?php echo htmlspecialchars($cliente["endereco"] ?? ""); ?>"
                        maxlength="255"
                        placeholder="Rua, número, bairro..."
                    >

                </div>



                <!-- BOTÕES -->

                <div class="perfil-form-buttons">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >

                        <i class="fa-solid fa-floppy-disk"></i>

                        Salvar alterações

                    </button>


                    <a
                        href="perfil.php"
                        class="btn btn-secondary"
                    >

                        <i class="fa-solid fa-arrow-left"></i>

                        Cancelar

                    </a>

                </div>


            </form>


        </div>

    </div>

</section>



<script src="assets/js/script.js"></script>


</body>

</html>