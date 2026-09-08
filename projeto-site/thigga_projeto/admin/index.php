<?php

session_start();

require_once "../config/conexao.php";


if (isset($_SESSION['admin_id'])) {
    header("Location: dashboard.php");
    exit();
}

$erro = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"] ?? "");
    $senha = $_POST["senha"] ?? "";

    if (empty($email) || empty($senha)) {

        $erro = "Preencha todos os campos.";

    } else {

        $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

      
        if ($usuario && $senha === $usuario["senha"]) {

            $_SESSION["admin_id"] = $usuario["id"];
            $_SESSION["admin_nome"] = $usuario["nome"];
            $_SESSION["admin_email"] = $usuario["email"];

            header("Location: dashboard.php");
            exit();

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

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Administrativo | THIGGA</title>

    <link rel="stylesheet" href="../assets/css/admin.css">

    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

</head>

<body>

    <main class="login-container">

        <div class="login-box">

            <div class="login-logo">

                <h1>THIGGA</h1>

                <p>PAINEL ADMINISTRATIVO</p>

            </div>


            <?php if (!empty($erro)): ?>

                <div class="mensagem-erro">

                    <?php echo htmlspecialchars($erro); ?>

                </div>

            <?php endif; ?>


            <form method="POST" action="">

                <div class="campo">

                    <label for="email">
                        E-mail
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Digite seu e-mail"
                        required
                    >

                </div>


                <div class="campo">

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


                <button type="submit" class="botao-login">

                    ENTRAR

                </button>

            </form>


            <a href="../index.php" class="voltar">

           

            </a>

        </div>

    </main>


    <script src="../assets/js/admin.js"></script>

</body>

</html>