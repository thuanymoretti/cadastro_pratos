<?php

include "infra/conexao.php";
$pratos = mysqli_query($conexao, "SELECT * FROM pratos");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Pratos</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <header>
        <link rel="stylesheet" href="style/style.css">
    </header>
    <main>
        <h2>- Faça seu pedido! -</h2>
        <form action="public/cadastrar.php" method="POST">

            <a href="public/cadastro_usuario.php">Cadastrar Usuário</a>
            <br>

            <form action="public/cadastrar.php" method="POST">
            <a href="public/cadastrar_pratos.php">Cadastrar Prato</a>
            <br>

            <form action="public/cadastrar.php" method="POST">
            <a href="public/visualizar_tabela.php">Visualizar Tabela</a>
            <br>


        </form>
        

    </main>
    <footer>

    </footer>


</body>

</html>