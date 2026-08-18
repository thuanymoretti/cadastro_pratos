<?php

include "../infra/conexao.php";

$sql = "SELECT * FROM usuarios ORDER BY nome";
$usuarios = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastrar Prato</title>

    <link rel="stylesheet" href="../style/style.css">

</head>

<body>

<header>

    <h1>CRUD - Pratos</h1>

</header>

<main>

<?php if (isset($_GET["sucesso"])) { ?>

    <h2>Prato cadastrado com sucesso!</h2>

    <a href="../index.php">
        <button>Voltar para o início</button>
    </a>

<?php } else { ?>

    <h2>Adicione um novo prato!</h2>

    <form action="cadastrar.php" method="POST">

        <label>Nome do Prato:</label>
        <input type="text" name="nome" required>

        <br>

        <label>Descrição:</label>
        <input type="text" name="descricao" required>

        <br>

        <label>Preço:</label>
        <input type="number" name="preco" step="0.01" min="0" required>

        <br>

        <label>Categoria:</label>

        <select name="categoria" required>

            <option value="">Selecione uma categoria</option>
            <option value="Entrada">Entrada</option>
            <option value="Prato Principal">Prato Principal</option>
            <option value="Sobremesa">Sobremesa</option>
            <option value="Bebida">Bebida</option>

        </select>

        <br>

        <label>Usuário:</label>

        <select name="usuario_id" required>

            <option value="">Selecione um usuário</option>

            <?php while ($usuario = $usuarios->fetch_assoc()) { ?>

                <option value="<?= $usuario["id"] ?>">
                    <?= htmlspecialchars($usuario["nome"]) ?>
                </option>

            <?php } ?>

        </select>

        <br>

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
