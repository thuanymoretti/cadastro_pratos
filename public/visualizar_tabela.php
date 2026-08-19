<?php

include "../infra/conexao.php";

// usuários para colocar no filtro
$usuarios = mysqli_query(
    $conexao,
    "SELECT * FROM usuarios ORDER BY nome"
);

// Verifica se algum usuário foi selecionado
$usuario_id = $_GET["usuario_id"] ?? "";

// Se escolheu um usuário, mostra somente os pratos dele
if ($usuario_id != "") {

    $sql = "SELECT pratos.*, usuarios.nome AS usuario_nome
            FROM pratos
            INNER JOIN usuarios
            ON pratos.usuario_id = usuarios.id
            WHERE pratos.usuario_id = ?";

    $stmt = $conexao->prepare($sql);

    $stmt->bind_param("i", $usuario_id);

    $stmt->execute();

    $pratos = $stmt->get_result();

} else {

    // Se nenhum usuário foi escolhido, mostra todos os pratos
    $sql = "SELECT pratos.*, usuarios.nome AS usuario_nome
            FROM pratos
            INNER JOIN usuarios
            ON pratos.usuario_id = usuarios.id";

    $pratos = mysqli_query($conexao, $sql);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Pratos</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
<header>
    <h1>Gerenciar Pratos</h1>
    <link rel="stylesheet" href="../style/style.css">
</header>

<main>
    <h2>Pratos por usuário</h2>


    <!-- FILTRO -->
    <form method="GET">
        <label for="usuario_id">
            Escolha um usuário:
        </label>
        <select name="usuario_id" id="usuario_id">
            <!-- Opção para mostrar todos -->
            <option value="">
                Todos os usuários
            </option>

            <!-- Lista de usuários -->
            <?php while ($usuario = mysqli_fetch_assoc($usuarios)): ?>
                <option
                    value="<?= $usuario["id"] ?>"
                    <?= ($usuario_id == $usuario["id"]) ? "selected" : "" ?>>
                    <?= htmlspecialchars($usuario["nome"]) ?>
                </option>
            <?php endwhile; ?>
        </select>


        <button type="submit">
            Filtrar
        </button>

    </form>


    <br>
    <!-- TABELA -->
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Prato</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Usuário</th>
                <th>Ações</th>
            </tr>
        </thead>


        <tbody>
            <?php while ($prato = mysqli_fetch_assoc($pratos)): ?>
                <tr>

                    <td>
                        <?= $prato["id"] ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($prato["nome"]) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($prato["descricao"]) ?>
                    </td>

                    <td>
                        R$
                        <?= number_format(
                            $prato["preco"],
                            2, ",","." ) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($prato["usuario_nome"]) ?>
                    </td>

                    <td>

                        <a href="editar.php?id=<?= $prato["id"] ?>">
                            Editar
                        </a>
                        |
                        <a href="excluir.php?id=<?= $prato["id"] ?>">
                            Excluir
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>

    </table>
    <br>
    <a href="../index.php">
        <button type="button">
            Voltar para o início
        </button>
    </a>

</main>
</body>
</html>