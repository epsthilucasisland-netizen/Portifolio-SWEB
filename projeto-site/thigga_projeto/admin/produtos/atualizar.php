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

$preco = $_POST["preco"] ?? "";

$estoque = $_POST["estoque"] ?? "";

$categoria_id = filter_input(
    INPUT_POST,
    "categoria_id",
    FILTER_VALIDATE_INT
);

$imagem = trim($_POST["imagem"] ?? "");



if (!$id) {

    die("
        <script>
            alert('Produto inválido.');
            window.location.href = 'listar.php';
        </script>
    ");

}




if (
    empty($nome) ||
    $preco === "" ||
    $estoque === "" ||
    !$categoria_id
) {

    die("
        <script>
            alert('Preencha todos os campos obrigatórios.');
            window.history.back();
        </script>
    ");

}




if (!is_numeric($preco) || $preco < 0) {

    die("
        <script>
            alert('Digite um preço válido.');
            window.history.back();
        </script>
    ");

}



if (!is_numeric($estoque) || $estoque < 0) {

    die("
        <script>
            alert('Digite um estoque válido.');
            window.history.back();
        </script>
    ");

}




try {

    $sql = "
        UPDATE produtos

        SET
            nome = :nome,
            descricao = :descricao,
            preco = :preco,
            estoque = :estoque,
            imagem = :imagem,
            categoria_id = :categoria_id

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
        ":preco",
        $preco
    );

    $stmt->bindValue(
        ":estoque",
        $estoque
    );

    $stmt->bindValue(
        ":imagem",
        $imagem
    );

    $stmt->bindValue(
        ":categoria_id",
        $categoria_id,
        PDO::PARAM_INT
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
        "Erro ao atualizar produto: "
        . $erro->getMessage()
    );

}

?>