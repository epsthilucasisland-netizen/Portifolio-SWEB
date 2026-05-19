<?php

require_once 'config/conexao.php';

$nome = $_POST['nome'];
$fabricante = $_POST['fabricante'];
$preco = $_POST['preco'];
$estoque = $_POST['estoque'];

$sql = $pdo->prepare("
    INSERT INTO produtos
    (nome, fabricante, preco, estoque)
    VALUES
    (?, ?, ?, ?)
");

$sql->execute([
    $nome,
    $fabricante,
    $preco,
    $estoque
]);

header("Location: index.php");