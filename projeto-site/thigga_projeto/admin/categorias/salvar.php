<?php

require_once "../../config/auth.php";
require_once "../../config/conexao.php";




if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    header("Location: listar.php");
    exit();

}



$nome = trim($_POST["nome"] ?? "");

$descricao = trim($_POST["descricao"] ?? "");




if (empty($nome)) {

    die("
        <script>
            alert('Digite o nome da categoria.');
            window.history.back();
        </script>
    ");

}




$sqlVerificar = "
    SELECT id
    FROM categorias
    WHERE nome = :nome
    LIMIT 1
";

$stmtVerificar = $pdo->prepare($sqlVerificar);

$stmtVerificar->bindValue(
    ":nome",
    $nome
);

$stmtVerificar->execute();

$categoriaExistente = $stmtVerificar->fetch(
    PDO::FETCH_ASSOC
);


if ($categoriaExistente) {

    die("
        <script>
            alert('Essa categoria já está cadastrada.');
            window.history.back();
        </script>
    ");

}




try {

    $sql = "
        INSERT INTO categorias
        (
            nome,
            descricao
        )

        VALUES
        (
            :nome,
            :descricao
        )
    ";

    $stmt = $pdo->prepare($sql);


    $stmt->bindValue(
        ":nome",
        $nome
    );


    $stmt->bindValue(
        ":descricao",
        $descricao
    );


    $stmt->execute();




    header(
        "Location: listar.php?sucesso=1"
    );

    exit();


} catch (PDOException $erro) {

    die(
        "Erro ao cadastrar categoria: "
        . $erro->getMessage()
    );

}

?>