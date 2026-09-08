<?php

require_once "../../config/auth.php";
require_once "../../config/conexao.php";



if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    header("Location: listar.php");
    exit();

}




$nome = trim($_POST["nome"] ?? "");

$email = trim($_POST["email"] ?? "");

$telefone = trim($_POST["telefone"] ?? "");

$cidade = trim($_POST["cidade"] ?? "");

$endereco = trim($_POST["endereco"] ?? "");




if (empty($nome)) {

    die("
        <script>
            alert('Digite o nome do cliente.');
            window.history.back();
        </script>
    ");

}


if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {

    die("
        <script>
            alert('Digite um e-mail válido.');
            window.history.back();
        </script>
    ");

}



$sqlVerificar = "
    SELECT id
    FROM clientes
    WHERE email = :email
    LIMIT 1
";

$stmtVerificar = $pdo->prepare($sqlVerificar);

$stmtVerificar->bindValue(
    ":email",
    $email
);

$stmtVerificar->execute();

$clienteExistente = $stmtVerificar->fetch(
    PDO::FETCH_ASSOC
);


if ($clienteExistente) {

    die("
        <script>
            alert('Já existe um cliente cadastrado com este e-mail.');
            window.history.back();
        </script>
    ");

}




try {

    $sql = "
        INSERT INTO clientes
        (
            nome,
            email,
            telefone,
            cidade,
            endereco
        )

        VALUES
        (
            :nome,
            :email,
            :telefone,
            :cidade,
            :endereco
        )
    ";

    $stmt = $pdo->prepare($sql);


    $stmt->bindValue(
        ":nome",
        $nome
    );


    $stmt->bindValue(
        ":email",
        $email
    );


    $stmt->bindValue(
        ":telefone",
        $telefone
    );


    $stmt->bindValue(
        ":cidade",
        $cidade
    );


    $stmt->bindValue(
        ":endereco",
        $endereco
    );


    $stmt->execute();


 

    header(
        "Location: listar.php?sucesso=1"
    );

    exit();


} catch (PDOException $erro) {

    die(
        "Erro ao cadastrar cliente: "
        . $erro->getMessage()
    );

}

?>