<?php
require_once "config/conexao.php";

if(isset($_POST["cadastrar"])){

$senha = password_hash(
$_POST["senha"],
PASSWORD_DEFAULT
);

$sql = $pdo->prepare(
"INSERT INTO clientes
(nome,email,senha,telefone,cidade)
VALUES (?,?,?,?,?)"
);

$sql->execute([
$_POST["nome"],
$_POST["email"],
$senha,
$_POST["telefone"],
$_POST["cidade"]
]);

header("Location: login.php");
exit;

}
?>