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
    SELECT
        id,
        nome,
        descricao
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

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Editar Categoria | THIGGA</title>



    <link
        rel="stylesheet"
        href="../../assets/css/admin.css"
    >


    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet"
    >

</head>

<body>




<header class="admin-header">

    <div class="admin-logo">
        THIGGA
    </div>


    <nav class="admin-menu">

        <a href="../dashboard.php">
            Dashboard
        </a>

        <a href="../produtos/listar.php">
            Produtos
        </a>

        <a href="listar.php">
            Categorias
        </a>

        <a href="../clientes/listar.php">
            Clientes
        </a>

        <a href="../logout.php">
            Sair
        </a>

    </nav>

</header>





<main class="admin-container">


    <div class="admin-titulo">

        <h1>
            Editar Categoria
        </h1>

        <p>
            Altere as informações da categoria.
        </p>

    </div>




    <form
        action="atualizar.php"
        method="POST"
        class="form-admin"
    >


      

        <input
            type="hidden"
            name="id"
            value="<?php echo $categoria['id']; ?>"
        >


   

        <div class="form-grupo">

            <label for="nome">
                Nome da Categoria *
            </label>

            <input
                type="text"
                id="nome"
                name="nome"
                value="<?php echo htmlspecialchars($categoria['nome']); ?>"
                maxlength="100"
                required
            >

        </div>



       

        <div class="form-grupo">

            <label for="descricao">
                Descrição
            </label>

            <textarea
                id="descricao"
                name="descricao"
                maxlength="255"
            ><?php echo htmlspecialchars($categoria['descricao'] ?? ''); ?></textarea>

        </div>



     

        <div
            style="
                display:flex;
                gap:10px;
                flex-wrap:wrap;
                margin-top:25px;
            "
        >

            <button
                type="submit"
                class="btn-admin btn-novo"
                style="
                    border:none;
                    cursor:pointer;
                "
            >
                Salvar Alterações
            </button>


            <a
                href="listar.php"
                class="btn-admin btn-editar"
            >
                Cancelar
            </a>

        </div>


    </form>


</main>




<footer class="admin-footer">

    THIGGA Artigos Esportivos —
    Edição de Categorias

</footer>



<script src="../../assets/js/admin.js"></script>

</body>

</html>