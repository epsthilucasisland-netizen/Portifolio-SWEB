<?php

require_once "../../config/auth.php";
require_once "../../config/conexao.php";




$sql = "
    SELECT
        id,
        nome,
        descricao
    FROM categorias
    ORDER BY id DESC
";

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

    <title>Categorias | THIGGA</title>


  

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
            Categorias
        </h1>

        <p>
            Gerencie as categorias dos produtos da THIGGA.
        </p>

    </div>



 

    <div style="margin-bottom:25px;">

        <a
            href="novo.php"
            class="btn-admin btn-novo"
        >
            + Nova Categoria
        </a>

    </div>





    <?php if (isset($_GET["sucesso"])): ?>

        <div class="mensagem-sucesso">

            Categoria cadastrada com sucesso!

        </div>

    <?php endif; ?>


    <?php if (isset($_GET["atualizado"])): ?>

        <div class="mensagem-sucesso">

            Categoria atualizada com sucesso!

        </div>

    <?php endif; ?>


    <?php if (isset($_GET["excluido"])): ?>

        <div class="mensagem-sucesso">

            Categoria excluída com sucesso!

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
                        Descrição
                    </th>

                    <th>
                        Ações
                    </th>

                </tr>

            </thead>


            <tbody>


                <?php if (count($categorias) > 0): ?>


                    <?php foreach ($categorias as $categoria): ?>

                        <tr>


                            

                            <td>

                                <?php

                                echo $categoria["id"];

                                ?>

                            </td>


                          

                            <td>

                                <?php

                                echo htmlspecialchars(
                                    $categoria["nome"]
                                );

                                ?>

                            </td>


                         

                            <td>

                                <?php

                                echo htmlspecialchars(
                                    $categoria["descricao"] ?? ""
                                );

                                ?>

                            </td>


                            <!-- AÇÕES -->

                            <td>


                                <a
                                    href="editar.php?id=<?php echo $categoria['id']; ?>"
                                    class="btn-admin btn-editar"
                                >

                                    Editar

                                </a>


                                <a
                                    href="excluir.php?id=<?php echo $categoria['id']; ?>"
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
                            colspan="4"
                            style="
                                text-align:center;
                                padding:30px;
                            "
                        >

                            Nenhuma categoria cadastrada.

                        </td>

                    </tr>


                <?php endif; ?>


            </tbody>

        </table>

    </div>


</main>





<footer class="admin-footer">

    THIGGA Artigos Esportivos —
    Gerenciamento de Categorias

</footer>



<script src="../../assets/js/admin.js"></script>

</body>

</html>