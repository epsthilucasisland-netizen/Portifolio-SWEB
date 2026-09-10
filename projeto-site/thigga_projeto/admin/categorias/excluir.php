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
    SELECT id, nome
    FROM categorias
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

$categoria = $stmt->fetch(
    PDO::FETCH_ASSOC
);




if (!$categoria) {

    die("
        <script>
            alert('Categoria não encontrada.');
            window.location.href = 'listar.php';
        </script>
    ");

}




$sqlProdutos = "
    SELECT COUNT(*)
    FROM produtos
    WHERE categoria_id = :id
";

$stmtProdutos = $pdo->prepare($sqlProdutos);

$stmtProdutos->bindValue(
    ":id",
    $id,
    PDO::PARAM_INT
);

$stmtProdutos->execute();

$totalProdutos = $stmtProdutos->fetchColumn();




if ($totalProdutos > 0) {

    echo "
        <script>

            alert(
                'Não é possível excluir esta categoria porque existem '
                + '$totalProdutos produto(s) vinculado(s) a ela.\\n\\n'
                + 'Remova ou altere a categoria desses produtos primeiro.'
            );

            window.location.href = 'listar.php';

        </script>
    ";

    exit();

}




try {

    $sql = "
        DELETE FROM categorias
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
        "Erro ao excluir categoria: "
        . $erro->getMessage()
    );

}

?>