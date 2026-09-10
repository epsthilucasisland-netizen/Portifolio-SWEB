<?php
require_once "config/auth_cliente.php";
?>

<h1>
Bem-vindo,
<?=
$_SESSION["cliente_nome"];
?>
</h1>

<p>
Sua conta está conectada.
</p>

<a href="produtos.php">
Ver Produtos
</a>

<a href="logout.php">
Sair
</a>