<?php

include "../infra/conexao.php";
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
        <h1>CRUD - Pratos</h1>
    </header>
    <main>
        <h2>Adicione um novo prato!</h2>
        <form action="public/cadastrar.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome">
            <br>
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao">
            <br>
            <label for="preco">Preço:</label>
            <input type="number" name="preco" step="0.01">
            <br>
            <label for="usuario_id">Usuário:</label>
            <select name="usuario_id">
                <?php while ($usuario = mysqli_fetch_assoc($usuarios)): ?>
                    <option value="<?= $usuario['id'] ?>"><?= $usuario['nome'] ?></option>
                <?php endwhile; ?>
            </select>
            <br>
            <button type="submit">Cadastrar</button>
        </form>