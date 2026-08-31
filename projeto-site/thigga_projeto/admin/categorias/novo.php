<?php

require_once "../../config/auth.php";
require_once "../../config/conexao.php";

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Nova Categoria | THIGGA</title>


  

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
            Nova Categoria
        </h1>

        <p>
            Cadastre uma nova categoria para os produtos.
        </p>

    </div>



 

    <form
        action="salvar.php"
        method="POST"
        class="form-admin"
    >


       

        <div class="form-grupo">

            <label for="nome">
                Nome da Categoria *
            </label>

            <input
                type="text"
                id="nome"
                name="nome"
                placeholder="Ex: Roupas"
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
                placeholder="Digite uma breve descrição da categoria..."
                maxlength="255"
            ></textarea>

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
                Cadastrar Categoria
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
    Cadastro de Categorias

</footer>



<script src="../../assets/js/admin.js"></script>

</body>

</html>