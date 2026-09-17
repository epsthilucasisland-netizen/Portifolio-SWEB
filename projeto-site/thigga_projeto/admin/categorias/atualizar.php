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

$descricao = trim($_POST["descricao"] ?? "");




if (!$id) {

    die("
        <script>
            alert('Categoria inválida.');
            window.location.href = 'listar.php';
        </script>
    ");

}




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
    AND id != :id
    LIMIT 1
";

$stmtVerificar = $pdo->prepare($sqlVerificar);

$stmtVerificar->bindValue(
    ":nome",
    $nome
);

$stmtVerificar->bindValue(
    ":id",
    $id,
    PDO::PARAM_INT
);

$stmtVerificar->execute();

$categoriaExistente = $stmtVerificar->fetch(
    PDO::FETCH_ASSOC
);


if ($categoriaExistente) {

    die("
        <script>
            alert('Já existe outra categoria com esse nome.');
            window.history.back();
        </script>
    ");

}




try {

    $sql = "
        UPDATE categorias

        SET
            nome = :nome,
            descricao = :descricao

        WHERE id = :id
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
        "Erro ao atualizar categoria: "
        . $erro->getMessage()
    );

}

?>