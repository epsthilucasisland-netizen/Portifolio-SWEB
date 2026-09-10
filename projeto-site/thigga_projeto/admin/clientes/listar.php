<?php

require_once "../../config/auth.php";
require_once "../../config/conexao.php";




$sql = "
    SELECT
        id,
        nome,
        email,
        telefone,
        cidade
    FROM clientes
    ORDER BY id DESC
";

$stmt = $pdo->query($sql);

$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Clientes | THIGGA</title>




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
            Clientes
        </h1>

        <p>
            Gerencie os clientes cadastrados na THIGGA.
        </p>

    </div>



 

    <div style="margin-bottom:25px;">

        <a
            href="novo.php"
            class="btn-admin btn-novo"
        >
            + Novo Cliente
        </a>

    </div>



    

    <?php if (isset($_GET["sucesso"])): ?>

        <div class="mensagem-sucesso">

            Cliente cadastrado com sucesso!

        </div>

    <?php endif; ?>


    <?php if (isset($_GET["atualizado"])): ?>

        <div class="mensagem-sucesso">

            Cliente atualizado com sucesso!

        </div>

    <?php endif; ?>


    <?php if (isset($_GET["excluido"])): ?>

        <div class="mensagem-sucesso">

            Cliente excluído com sucesso!

        </div>

    <?php endif; ?>



 

    <div class="tabela-container">

        <table class="tabela">

            <thead>

                <tr>

                    <th>
                        ID
                    </th>

                    <th>
                        Nome
                    </th>

                    <th>
                        E-mail
                    </th>

                    <th>
                        Telefone
                    </th>

                    <th>
                        Cidade
                    </th>

                    <th>
                        Ações
                    </th>

                </tr>

            </thead>


            <tbody>


                <?php if (count($clientes) > 0): ?>


                    <?php foreach ($clientes as $cliente): ?>

                        <tr>


                        

                            <td>

                                <?php

                                echo $cliente["id"];

                                ?>

                            </td>



                            <td>

                                <?php

                                echo htmlspecialchars(
                                    $cliente["nome"]
                                );

                                ?>

                            </td>


                          

                            <td>

                                <?php

                                echo htmlspecialchars(
                                    $cliente["email"]
                                );

                                ?>

                            </td>



                            <td>

                                <?php

                                echo htmlspecialchars(
                                    $cliente["telefone"]
                                    ?? "-"
                                );

                                ?>

                            </td>


                          

                            <td>

                                <?php

                                echo htmlspecialchars(
                                    $cliente["cidade"]
                                    ?? "-"
                                );

                                ?>

                            </td>


                        
                            <td>


                                <a
                                    href="editar.php?id=<?php echo $cliente['id']; ?>"
                                    class="btn-admin btn-editar"
                                >

                                    Editar

                                </a>


                                <a
                                    href="excluir.php?id=<?php echo $cliente['id']; ?>"
                                    class="btn-admin btn-excluir"
                                >

                                    Excluir

                                </a>


                            </td>


                        </tr>

                    <?php endforeach; ?>


                <?php else: ?>


                    <tr>

                        <td
                            colspan="6"
                            style="
                                text-align:center;
                                padding:30px;
                            "
                        >

                            Nenhum cliente cadastrado.

                        </td>

                    </tr>


                <?php endif; ?>


            </tbody>

        </table>

    </div>


</main>





<footer class="admin-footer">

    THIGGA Artigos Esportivos —
    Gerenciamento de Clientes

</footer>



<script src="../../assets/js/admin.js"></script>

</body>

</html>