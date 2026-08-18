<?php

include "infra/conexao.php";
$pratos = mysqli_query($conexao, "SELECT * FROM prato");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Pratos</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>
    <header>
        <h1>CRUD - Tela de inicio</h1>
    </header>
    <main>
        <h2>Adicione um novo prato!</h2>
        <form action="public/cadastrar.php" method="POST">

            <a href="public/cadastro_usuario.php">Cadastrar usuário</a>
            <br>

            <form action="public/cadastrar.php" method="POST">
            <a href="public/cadastrar_pratos.php">Cadastrar prato</a>
            <br>

            <form action="public/cadastrar.php" method="POST">
            <a href="public/vizualizar_tabela.php">Visualizar Tabela</a>
            <br>


        </form>
        

    </main>
    <footer>

    </footer>


</body>

</html>