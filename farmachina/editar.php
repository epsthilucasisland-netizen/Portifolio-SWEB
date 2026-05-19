<?php

require_once 'config/conexao.php';
require_once 'includes/header.php';

$id = $_GET['id'];

$sql = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
$sql->execute([$id]);

$produto = $sql->fetch(PDO::FETCH_ASSOC);
?>

<h2>Editar Produto cheio de aura</h2>

<form action="atualizar.php" method="POST">

    <input type="hidden" name="id" value="<?= $produto['id']; ?>">

    <input type="text"
           name="nome"
           value="<?= $produto['nome']; ?>"
           required>

    <input type="text"
           name="fabricante"
           value="<?= $produto['fabricante']; ?>"
           required>

    <input type="number"
           step="0.01"
           name="preco"
           value="<?= $produto['preco']; ?>"
           required>

    <input type="number"
           name="estoque"
           value="<?= $produto['estoque']; ?>"
           required>

    <button class="btn btn-salvar" type="submit">
        Atualizar aura
    </button>

</form>

<?php require_once 'includes/footer.php'; ?>