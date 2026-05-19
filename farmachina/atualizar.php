<?php

require_once 'config/conexao.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$fabricante = $_POST['fabricante'];
$preco = $_POST['preco'];
$estoque = $_POST['estoque'];

$sql = $pdo->prepare("
    UPDATE produtos
    SET nome = ?, fabricante = ?, preco = ?, estoque = ?
    WHERE id = ?
");

$sql->execute([
    $nome,
    $fabricante,
    $preco,
    $estoque,
    $id
]);

header("Location: index.php");