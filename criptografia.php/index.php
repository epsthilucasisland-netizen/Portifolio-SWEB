
<?php


$texto = $_POST["texto"] ?? "";


$md5 = "";
$sha256 = "";
$base64 = "";
$senhaHash = "";

if ($texto != "") {

   
    $md5 = md5($texto);

 
    $sha256 = hash("sha256", $texto);

  
    $base64 = base64_encode($texto);

    $senhaHash = password_hash($texto, PASSWORD_DEFAULT);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Criptografia no PHP</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header>

    <div class="container">

        <h1>Criptografia no PHP</h1>

        <nav>

            <a href="#inicio">Início</a>
            <a href="#md5">MD5</a>
            <a href="#sha256">SHA-256</a>
            <a href="#password">Password Hash</a>
            <a href="#base64">Base64</a>

        </nav>

    </div>

</header>


<main>

    <!-- INÍCIO -->

    <section id="inicio" class="hero">

        <div class="container">

            <h2>Criptografia no PHP</h2>

            <p>
                Este site apresenta alguns recursos de criptografia disponíveis no php
            </p>

            <p>
                Digite um texto abaixo para visualizar diferentes
                formas de processamento.
            </p>

            <form method="post">

                <input
                    type="text"
                    name="texto"
                    placeholder="Digite um texto..."
                    value="<?= htmlspecialchars($texto) ?>"
                >

                <button type="submit">
                    Demonstrar
                </button>

            </form>

        </div>

    </section>

    <?php if ($texto != "") { ?>

    <section class="resultados">

        <div class="container">

            <h2>Resultado da demonstração</h2>

            <div class="texto-original">

                <strong>Texto informado:</strong>

                <p>
                    <?= htmlspecialchars($texto) ?>
                </p>

            </div>

            <div class="card" id="md5">

                <h2>MD5</h2>

                <p>
                    O MD5 é uma função de hash que transforma
                    um texto em uma sequência de 32 caracteres.
                </p>

                <div class="resultado">

                    <?= $md5 ?>

                </div>

                <p class="observacao">
                     MD5 é considerado inseguro para aplicações
                    modernas que exigem proteção contra ataques.
                </p>

            </div>

            <div class="card" id="sha256">

                <h2>SHA-256</h2>

                <p>
                    SHA-256 é uma função de hash que gera um
                    resultado de 256 bits, normalmente representado
                    por 64 caracteres hexadecimais.
                </p>

                <div class="resultado">

                    <?= $sha256 ?>

                </div>

            </div>

            <div class="card" id="password">

                <h2>password_hash()</h2>

                <p>
                    A função password_hash() é utilizada
                    principalmente para armazenar senhas de
                    forma segura.
                </p>

                <div class="resultado">

                    <?= $senhaHash ?>

                </div>

                <p>
                    Para verificar uma senha, o PHP utiliza
                    a função <strong>password_verify()</strong>.
                </p>

            </div>

            <div class="card" id="base64">

                <h2>Base64</h2>

                <p>
                    Base64 não é criptografia. É uma forma de
                    codificação utilizada para representar dados
                    em texto.
                </p>

                <div class="resultado">

                    <?= $base64 ?>

                </div>

            </div>

        </div>

    </section>

    <?php } ?>

    <section class="explicacao">

        <div class="container">

            <h2>Hash x Criptografia</h2>

            <p>
                É importante entender que hash e criptografia
                não são a mesma coisa.
            </p>

            <div class="comparacao">

                <div>

                    <h3>Hash</h3>

                    <p>
                        O hash transforma uma informação em
                        outro valor e não deve ser utilizado
                        para recuperar o conteúdo original.
                    </p>

                    <p>
                        Exemplos:
                    </p>

                    <ul>
                        <li>MD5</li>
                        <li>SHA-256</li>
                        <li>password_hash()</li>
                    </ul>

                </div>


                <div>

                    <h3>Criptografia</h3>

                    <p>
                        A criptografia pode permitir que uma
                        informação seja protegida e posteriormente
                        recuperada utilizando uma chave.
                    </p>

                    <p>
                        Um exemplo seria o AES utilizando
                        a extensão OpenSSL do PHP.
                    </p>

                </div>

            </div>

        </div>

    </section>

</main>


<footer>

    <p>
       etecvav 2026- Lucas Souza/ Thiago maia
    </p>

</footer>

</body>

</html>
