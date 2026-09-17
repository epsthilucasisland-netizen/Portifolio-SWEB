<?php

require_once "../../config/auth.php";
require_once "../../config/conexao.php";




if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    header("Location: listar.php");
    exit();

}



$id = filter_input(
    INPUT_POST,
    "id",
    FILTER_VALIDATE_INT
);

$nome = trim($_POST["nome"] ?? "");

$email = trim($_POST["email"] ?? "");

$telefone = trim($_POST["telefone"] ?? "");

$cidade = trim($_POST["cidade"] ?? "");

$endereco = trim($_POST["endereco"] ?? "");




if (!$id) {

    die("
        <script>
            alert('Cliente inválido.');
            window.location.href = 'listar.php';
        </script>
    ");

}



if (empty($nome)) {

    die("
        <script>
            alert('Digite o nome do cliente.');
            window.history.back();
        </script>
    ");

}




if (
    empty($email) ||
    !filter_var($email, FILTER_VALIDATE_EMAIL)
) {

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
    AND id != :id
    LIMIT 1
";

$stmtVerificar = $pdo->prepare($sqlVerificar);

$stmtVerificar->bindValue(
    ":email",
    $email
);

$stmtVerificar->bindValue(
    ":id",
    $id,
    PDO::PARAM_INT
);

$stmtVerificar->execute();

$clienteExistente = $stmtVerificar->fetch(
    PDO::FETCH_ASSOC
);


if ($clienteExistente) {

    die("
        <script>
            alert('Este e-mail já está sendo usado por outro cliente.');
            window.history.back();
        </script>
    ");

}



try {

    $sql = "
        UPDATE clientes

        SET
            nome = :nome,
            email = :email,
            telefone = :telefone,
            cidade = :cidade,
            endereco = :endereco

        WHERE id = :id
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


    $stmt->bindValue(
        ":id",
        $id,
        PDO::PARAM_INT
    );


    $stmt->execute();




    header(
        "Location: listar.php?atualizado=1"
    );

    exit();


} catch (PDOException $erro) {

    die(
        "Erro ao atualizar cliente: "
        . $erro->getMessage()
    );

}

?>