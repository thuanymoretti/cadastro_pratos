<?php

include "../infra/conexao.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Usuários</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>

    <header>
        <h1>CRUD - Usuários</h1>
    </header>

    <main>

        <h2>Adicione um novo usuário!</h2>

       <form action="cadastrar.php" method="POST">

    <label for="nome">Nome:</label>
    <input type="text" name="nome">

    <br>

    <label for="email">Email:</label>
    <input type="email" name="email">

    <br>

    <button type="submit">Cadastrar</button>

</form>

    </main>

</body>

</html>