<?php

require_once "../../config/auth.php";
require_once "../../config/conexao.php";



$id = filter_input(
    INPUT_GET,
    "id",
    FILTER_VALIDATE_INT
);




if (!$id) {

    header("Location: listar.php");
    exit();

}




$sql = "
    SELECT id
    FROM produtos
    WHERE id = :id
    LIMIT 1
";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(
    ":id",
    $id,
    PDO::PARAM_INT
);

$stmt->execute();

$produto = $stmt->fetch(PDO::FETCH_ASSOC);




if (!$produto) {

    die("
        <script>
            alert('Produto não encontrado.');
            window.location.href = 'listar.php';
        </script>
    ");

}




try {

    $sql = "
        DELETE FROM produtos
        WHERE id = :id
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(
        ":id",
        $id,
        PDO::PARAM_INT
    );

    $stmt->execute();



    header(
        "Location: listar.php?excluido=1"
    );

    exit();


} catch (PDOException $erro) {

    die(
        "Erro ao excluir produto: "
        . $erro->getMessage()
    );

}

?>