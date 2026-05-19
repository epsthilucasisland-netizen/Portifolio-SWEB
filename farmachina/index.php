<?php
require_once 'config/conexao.php';
require_once 'includes/header.php';

$sql = $pdo->prepare("SELECT * FROM produtos");
$sql->execute();

$produtos = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Lista de Produtos</h2>

<div class="container">

<?php foreach($produtos as $produto): ?>

<div class="card">

    <h3><?= $produto['nome']; ?></h3>

    <p><strong>Fabricante 67:</strong> <?= $produto['fabricante']; ?></p>

    <p><strong>Preço 67:</strong> R$ <?= number_format($produto['preco'], 2, ',', '.'); ?></p>

    <p><strong>Estoque 67:</strong> <?= $produto['estoque']; ?></p>

    <a class="btn btn-editar" href="editar.php?id=<?= $produto['id']; ?>">
        Editar sem aura
    </a>

    <a class="btn btn-excluir"
       href="excluir.php?id=<?= $produto['id']; ?>"
       onclick="return confirm('Deseja excluir?')">
        Excluir betinha
    </a>

</div>

<?php endforeach; ?>

</div>

<?php require_once 'includes/footer.php'; ?>