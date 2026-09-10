<?php

require_once "../../config/auth.php";
require_once "../../config/conexao.php";



$sql = "
    SELECT 
        produtos.id,
        produtos.nome,
        produtos.descricao,
        produtos.preco,
        produtos.estoque,
        categorias.nome AS categoria
    FROM produtos

    LEFT JOIN categorias
        ON produtos.categoria_id = categorias.id

    ORDER BY produtos.id DESC
";

$stmt = $pdo->query($sql);

$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Produtos | THIGGA</title>


    
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
            Produtos
        </h1>

        <p>
            Gerencie os produtos da loja THIGGA.
        </p>

    </div>



    <div style="margin-bottom:25px;">

        <a
            href="novo.php"
            class="btn-admin btn-novo"
        >
            + Novo Produto
        </a>

    </div>




    <div class="tabela-container">

        <table class="tabela">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Produto</th>

                    <th>Categoria</th>

                    <th>Preço</th>

                    <th>Estoque</th>

                    <th>Ações</th>

                </tr>

            </thead>


            <tbody>

                <?php if (count($produtos) > 0): ?>


                    <?php foreach ($produtos as $produto): ?>

                        <tr>

                           

                            <td>
                                <?php
                                echo $produto["id"];
                                ?>
                            </td>


                          

                            <td>

                                <?php
                                echo htmlspecialchars(
                                    $produto["nome"]
                                );
                                ?>

                            </td>



                            <td>

                                <?php

                                echo htmlspecialchars(
                                    $produto["categoria"]
                                    ?? "Sem categoria"
                                );

                                ?>

                            </td>


                       

                            <td>

                                R$

                                <?php

                                echo number_format(
                                    $produto["preco"],
                                    2,
                                    ",",
                                    "."
                                );

                                ?>

                            </td>



                            <td>

                                <?php
                                echo $produto["estoque"];
                                ?>

                            </td>



                            <td>

                                <a
                                    href="editar.php?id=<?php echo $produto['id']; ?>"
                                    class="btn-admin btn-editar"
                                >
                                    Editar
                                </a>


                                <a
                                    href="excluir.php?id=<?php echo $produto['id']; ?>"
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
                            style="text-align:center; padding:30px;"
                        >

                            Nenhum produto cadastrado.

                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>


</main>





<footer class="admin-footer">

    THIGGA Artigos Esportivos —
    Gerenciamento de Produtos

</footer>


<script src="../../assets/js/admin.js"></script>

</body>

</html>