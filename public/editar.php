<?php

include "../infra/conexao.php";

$id = $_GET["id"];

// "id = $id" substituído por "id = ?" pois impede que uma entrada do usuário seja interpretada como código SQL
$sql = "SELECT * FROM livros WHERE id = ?";

//prepara a consulta SQL antes de executá-la
$stmt = $conexao->prepare($sql);

//substituição do valor de "$i" no "i"
$stmt->bind_param("i", $id);

// Executa a consulta preparada.
$stmt->execute();

// Obtém o resultado da consulta.
$resultado = $stmt->get_result();

//transforma em uma array associativa para facilitar a manipulação
$livro =mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Livraria</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>
    <header>
        <h1>CRUD - Livraria</h1>
    </header>
    <main>
        <h2>Editando o livro <?php echo $livro["titulo"]?>!</h2>
        <form action="atualizar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $livro["id"]?>">

            <label for="titulo">Título:</label>
            <input type="text" name="titulo" value="<?php echo $livro["titulo"]?>">
            <br>
            <label for="autor">Autor:</label>
            <input type="text" name="autor" value="<?php echo $livro["autor"]?>">
            <br>
            <label for="ano">Ano de Publicação:</label>
            <input type="number" name="ano" value="<?php echo $livro["ano"]?>">
            <br>
            <button type="submit">Atualizar</button>
        </form>

    </main>
    <footer>

    </footer>


</body>

</html>