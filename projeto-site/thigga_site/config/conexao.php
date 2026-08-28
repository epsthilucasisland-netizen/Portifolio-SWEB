<?php
// Configurações do banco de dados
$host = "localhost";
$banco = "thigga";
$usuario = "root";
$senha = "";

// Conexão usando PDO
try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$banco;charset=utf8",
        $usuario,
        $senha
    );

    // Exibe erros do banco durante o desenvolvimento
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $erro) {
    die("Erro na conexão com o banco de dados: " . $erro->getMessage());
}
?>
