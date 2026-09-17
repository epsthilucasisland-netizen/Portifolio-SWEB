<?php

require_once "../../config/auth.php";
require_once "../../config/conexao.php";




if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    header("Location: listar.php");
    exit();

}




$nome = trim($_POST["nome"] ?? "");

$descricao = trim($_POST["descricao"] ?? "");

$preco = $_POST["preco"] ?? "";

$estoque = $_POST["estoque"] ?? "";

$categoria_id = $_POST["categoria_id"] ?? "";

$imagem = trim($_POST["imagem"] ?? "");



if (
    empty($nome) ||
    $preco === "" ||
    $estoque === "" ||
    empty($categoria_id)
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
            alert('Digite uma quantidade de estoque válida.');
            window.history.back();
        </script>
    ");

}



try {

    $sql = "
        INSERT INTO produtos
        (
            nome,
            descricao,
            preco,
            estoque,
            imagem,
            categoria_id
        )

        VALUES
        (
            :nome,
            :descricao,
            :preco,
            :estoque,
            :imagem,
            :categoria_id
        )
    ";

    $stmt = $pdo->prepare($sql);


    $stmt->bindValue(":nome", $nome);

    $stmt->bindValue(":descricao", $descricao);

    $stmt->bindValue(":preco", $preco);

    $stmt->bindValue(":estoque", $estoque);

    $stmt->bindValue(":imagem", $imagem);

    $stmt->bindValue(":categoria_id", $categoria_id);


    $stmt->execute();


   
    header("Location: listar.php?sucesso=1");

    exit();


} catch (PDOException $erro) {

    die(
        "Erro ao cadastrar produto: "
        . $erro->getMessage()
    );

}
?>