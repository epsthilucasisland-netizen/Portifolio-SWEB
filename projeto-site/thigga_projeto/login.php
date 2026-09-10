<?php
session_start();
require_once "config/conexao.php";

$erro = "";

if(isset($_POST["entrar"])){

$email = $_POST["email"];
$senha = $_POST["senha"];

$sql = $pdo->prepare(
"SELECT * FROM clientes WHERE email=?"
);

$sql->execute([$email]);

$cliente = $sql->fetch();

if(
$cliente &&
password_verify(
$senha,
$cliente["senha"]
)
){

$_SESSION["cliente_id"] = $cliente["id"];
$_SESSION["cliente_nome"] = $cliente["nome"];

header("Location: perfil.php");
exit;

}else{

$erro = "E-mail ou senha incorretos.";

}

}
?>