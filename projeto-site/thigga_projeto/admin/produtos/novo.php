<?php

require_once "../../config/auth.php";
require_once "../../config/conexao.php";



$sql = "SELECT * FROM categorias ORDER BY nome ASC";

$stmt = $pdo->query($sql);

$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Novo Produto | THIGGA</title>


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
            Novo Produto
        </h1>

        <p>
            Cadastre um novo produto na loja.
        </p>

    </div>



  

    <form
        action="salvar.php"
        method="POST"
        class="form-admin"
    >


      

        <div class="form-grupo">

            <label for="nome">
                Nome do Produto *
            </label>

            <input
                type="text"
                id="nome"
                name="nome"
                placeholder="Ex: Camiseta Dragão"
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
                placeholder="Digite a descrição do produto..."
            ></textarea>

        </div>



     

        <div class="form-grupo">

            <label for="preco">
                Preço *
            </label>

            <input
                type="number"
                id="preco"
                name="preco"
                placeholder="0.00"
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
                placeholder="Quantidade disponível"
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
                placeholder="Ex: camiseta.jpg"
            >

            <small
                style="
                    display:block;
                    margin-top:7px;
                    color:#888;
                "
            >
                Digite o nome da imagem que estará
                na pasta assets/img/produtos/.
            </small>

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
                Cadastrar Produto
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
    Cadastro de Produtos

</footer>


<script src="../../assets/js/admin.js"></script>

</body>

</html>