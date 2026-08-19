<?php

include "../infra/conexao.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastrar Usuário</title>

    <link rel="stylesheet" href="../style/style.css">

</head>

<body>

<header>

    <h1>CRUD - Usuários</h1>

</header>

<main>

<?php if (isset($_GET["sucesso"])) { ?>

    <h2>Usuário cadastrado com sucesso!</h2>

    <a href="../index.php">
        <button type="button">Voltar para o início</button>
    </a>

<?php } else { ?>

    <h2>Cadastre um novo usuário</h2>

    <form action="cadastrar.php" method="POST">

        <input type="hidden" name="tipo" value="usuario">

        <label for="nome">Nome:</label>

        <input
            type="text"
            name="nome"
            id="nome"
            required
        >

        <label for="email">Email:</label>

        <input
            type="email"
            name="email"
            id="email"
            required
        >

        <button type="submit">
            Cadastrar
        </button>

    </form>

    <br>

    <a href="../index.php">
        <button type="button">
            Voltar para o início
        </button>
    </a>

<?php } ?>

</main>

</body>

</html>