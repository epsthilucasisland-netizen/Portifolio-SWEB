<?php require_once 'includes/header.php'; ?>

<h2>Cadastrar Produto Aurudo</h2>

<form action="salvar.php" method="POST">

    <input type="text" name="nome" placeholder="Nome do produto" required>

    <input type="text" name="fabricante" placeholder="Fabricante" required>

    <input type="number" step="0.01" name="preco" placeholder="Preço" required>

    <input type="number" name="estoque" placeholder="Estoque" required>

    <button class="btn btn-salvar" type="submit">
        Salvar
    </button>

</form>

<?php require_once 'includes/footer.php'; ?>