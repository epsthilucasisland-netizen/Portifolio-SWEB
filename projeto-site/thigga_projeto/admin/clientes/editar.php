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
        email,
        telefone,
        cidade,
        endereco
    FROM clientes
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

$cliente = $stmt->fetch(
    PDO::FETCH_ASSOC
);




if (!$cliente) {

    die("
        <script>
            alert('Cliente não encontrado.');
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

    <title>Editar Cliente | THIGGA</title>




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
            Editar Cliente
        </h1>

        <p>
            Altere as informações do cliente.
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
            value="<?php echo $cliente['id']; ?>"
        >


        

        <div class="form-grupo">

            <label for="nome">
                Nome completo *
            </label>

            <input
                type="text"
                id="nome"
                name="nome"
                value="<?php echo htmlspecialchars($cliente['nome']); ?>"
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
                value="<?php echo htmlspecialchars($cliente['email']); ?>"
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
                value="<?php echo htmlspecialchars($cliente['telefone'] ?? ''); ?>"
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
                value="<?php echo htmlspecialchars($cliente['cidade'] ?? ''); ?>"
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
                value="<?php echo htmlspecialchars($cliente['endereco'] ?? ''); ?>"
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
    Edição de Clientes

</footer>



<script src="../../assets/js/admin.js"></script>

</body>

</html>