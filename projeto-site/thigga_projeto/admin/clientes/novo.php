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

    <title>Novo Cliente | THIGGA</title>


  

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

        <a href="../categorias/listar.php">
            Categorias
        </a>

        <a href="listar.php">
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
            Novo Cliente
        </h1>

        <p>
            Cadastre um novo cliente no sistema.
        </p>

    </div>



  

    <form
        action="salvar.php"
        method="POST"
        class="form-admin"
    >


        <!-- NOME -->

        <div class="form-grupo">

            <label for="nome">
                Nome completo *
            </label>

            <input
                type="text"
                id="nome"
                name="nome"
                placeholder="Ex: João da Silva"
                maxlength="150"
                required
            >

        </div>



       

        <div class="form-grupo">

            <label for="email">
                E-mail *
            </label>

            <input
                type="email"
                id="email"
                name="email"
                placeholder="Ex: joao@email.com"
                maxlength="150"
                required
            >

        </div>




        <div class="form-grupo">

            <label for="telefone">
                Telefone
            </label>

            <input
                type="tel"
                id="telefone"
                name="telefone"
                placeholder="Ex: (11) 99999-9999"
                maxlength="20"
            >

        </div>



       

        <div class="form-grupo">

            <label for="cidade">
                Cidade
            </label>

            <input
                type="text"
                id="cidade"
                name="cidade"
                placeholder="Ex: São Paulo"
                maxlength="100"
            >

        </div>



       

        <div class="form-grupo">

            <label for="endereco">
                Endereço
            </label>

            <input
                type="text"
                id="endereco"
                name="endereco"
                placeholder="Ex: Rua das Flores, 100"
                maxlength="200"
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
                style="
                    border:none;
                    cursor:pointer;
                "
            >
                Cadastrar Cliente
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
    Cadastro de Clientes

</footer>



<script src="../../assets/js/admin.js"></script>

</body>

</html>