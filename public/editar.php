<?php

include "../infra/conexao.php";

$id = $_GET["id"];

// Busca o prato
$sql = "SELECT * FROM pratos WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();
$prato = mysqli_fetch_assoc($resultado);

// Busca os usuários
$usuarios = mysqli_query($conexao, "SELECT * FROM usuarios ORDER BY nome");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Prato</title>

    <link rel="stylesheet" href="../style/style.css">
</head>

<body>

<header>
    <h1>CRUD - Pratos</h1>
</header>

<main>

    <h2>Editar Prato</h2>

    <form action="atualizar.php" method="POST">

        <input type="hidden" name="id" value="<?= $prato['id'] ?>">

        <label for="nome">Nome:</label>
        <input
            type="text"
            name="nome"
            id="nome"
            value="<?= htmlspecialchars($prato['nome']) ?>"
            required
        >

        <br>

        <label for="descricao">Descrição:</label>
        <textarea
            name="descricao"
            id="descricao"
            required
        ><?= htmlspecialchars($prato['descricao']) ?></textarea>

        <br>

        <label for="preco">Preço:</label>
        <input
            type="number"
            step="0.01"
            name="preco"
            id="preco"
            value="<?= $prato['preco'] ?>"
            required
        >

        <br>

        <label for="categoria">Categoria:</label>
        <input
            type="text"
            name="categoria"
            id="categoria"
            value="<?= htmlspecialchars($prato['categoria']) ?>"
            required
        >

        <br>

        <label for="usuario_id">Usuário:</label>

        <select name="usuario_id" id="usuario_id" required>

            <?php while ($usuario = mysqli_fetch_assoc($usuarios)) { ?>

                <option
                    value="<?= $usuario['id'] ?>"
                    <?= ($usuario['id'] == $prato['usuario_id']) ? 'selected' : '' ?>
                >
                    <?= htmlspecialchars($usuario['nome']) ?>
                </option>

            <?php } ?>

        </select>

        <br><br>

        <input type="submit" value="Atualizar">

    </form>

    <br>

    <a href="../index.php">
        <button type="button">Voltar para o início</button>
    </a>

</main>

</body>

</html>