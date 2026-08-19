<?php

include "../infra/conexao.php";

$id = $_GET["id"];
$sql = "SELECT * FROM pratos WHERE id = $id";
$resultado = mysqli_query($conexao, $sql );

$prato =mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="pt-br">

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
        <h2>Editar Prato</h2>
        <form action="atualizar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $prato['id']; ?>">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?php echo $prato['nome']; ?>" required><br>

            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" required><?php echo $prato['descricao']; ?></textarea><br>

            <label for="preco">Preço:</label>
            <input type="number" step="0.01" name="preco" id="preco" value="<?php echo $prato['preco']; ?>" required><br>

            <label for="categoria">Categoria:</label>
            <input type="text" name="categoria" id="categoria" value="<?php echo $prato['categoria']; ?>" required><br>

            <input type="submit" value="Atualizar">
        </form>

    

<br>

<a href="../index.php">
    <button>Voltar para o início</button>
</a>

</body>

</html>