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
    SELECT *
    FROM produtos
    WHERE id = :id
    LIMIT 1
";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(":id", $id, PDO::PARAM_INT);

$stmt->execute();

$produto = $stmt->fetch(PDO::FETCH_ASSOC);




if (!$produto) {

    die("Produto não encontrado.");

}



$sqlCategorias = "
    SELECT *
    FROM categorias
    ORDER BY nome ASC
";

$stmtCategorias = $pdo->query($sqlCategorias);

$categorias = $stmtCategorias->fetchAll(
    PDO::FETCH_ASSOC
);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Editar Produto | THIGGA</title>


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

        <a href="listar.php">
            Produtos
        </a>

        <a href="../categorias/listar.php">
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
            Editar Produto
        </h1>

        <p>
            Altere as informações do produto.
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
            value="<?php echo $produto['id']; ?>"
        >



        <div class="form-grupo">

            <label for="nome">
                Nome do Produto *
            </label>

            <input
                type="text"
                id="nome"
                name="nome"
                value="<?php echo htmlspecialchars($produto['nome']); ?>"
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
            ><?php echo htmlspecialchars($produto['descricao'] ?? ''); ?></textarea>

        </div>



 

        <div class="form-grupo">

            <label for="preco">
                Preço *
            </label>

            <input
                type="number"
                id="preco"
                name="preco"
                value="<?php echo $produto['preco']; ?>"
                step="0.01"
                min="0"
                required
            >

        </div>



      

        <div class="form-grupo">

            <label for="estoque">
                Estoque *
            </label>

            <input
                type="number"
                id="estoque"
                name="estoque"
                value="<?php echo $produto['estoque']; ?>"
                min="0"
                required
            >

        </div>



     

        <div class="form-grupo">

            <label for="categoria_id">
                Categoria *
            </label>

            <select
                id="categoria_id"
                name="categoria_id"
                required
            >

                <option value="">
                    Selecione uma categoria
                </option>


                <?php foreach ($categorias as $categoria): ?>

                    <option
                        value="<?php echo $categoria['id']; ?>"

                        <?php

                        if (
                            $categoria['id']
                            == $produto['categoria_id']
                        ) {

                            echo "selected";

                        }

                        ?>
                    >

                        <?php

                        echo htmlspecialchars(
                            $categoria['nome']
                        );

                        ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>




        <div class="form-grupo">

            <label for="imagem">
                Nome da imagem
            </label>

            <input
                type="text"
                id="imagem"
                name="imagem"
                value="<?php echo htmlspecialchars($produto['imagem'] ?? ''); ?>"
                placeholder="Ex: camiseta.jpg"
            >

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
                style="border:none; cursor:pointer;"
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
    Edição de Produtos

</footer>


<script src="../../assets/js/admin.js"></script>

</body>

</html>