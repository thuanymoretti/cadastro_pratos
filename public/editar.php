<?php

include "../infra/conexao.php";

$id = $_GET["id"];

// "id = $id" substituído por "id = ?" pois impede que uma entrada do usuário seja interpretada como código SQL
$sql = "SELECT * FROM prato WHERE id = ?";

//prepara a consulta SQL antes de executá-la
$stmt = $conexao->prepare($sql);

//substituição do valor de "$i" no "i"
$stmt->bind_param("i", $id);

// Executa a consulta preparada.
$stmt->execute();

// Obtém o resultado da consulta.
$resultado = $stmt->get_result();

//transforma em uma array associativa para facilitar a manipulação
$prato =mysqli_fetch_assoc($resultado);

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
        <h1>CRUD - Pratos</h1>
    </header>
    <main>
        <h2>Editando o prato <?php echo $prato["prato"]?>!</h2>
        <form action="atualizar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $prato["id"]?>">

            <label for="usuario">Usuário:</label>
            <input type="text" name="usuario" value="<?php echo $prato["usuario"]?>">
            <br>
            <label for="prato">Prato:</label>
            <input type="text" name="prato" value="<?php echo $prato["prato"]?>">
            <br>
            
            <button type="submit">Atualizar</button>
        </form>

    </main>
    <footer>

    </footer>


</body>

</html>