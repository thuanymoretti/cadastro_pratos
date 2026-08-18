<?php

include "../infra/conexao.php";

$sql = "SELECT
            pratos.id,
            pratos.nome,
            pratos.descricao,
            pratos.preco,
            pratos.categoria,
            usuarios.nome AS usuario_nome
        FROM pratos
        INNER JOIN usuarios
        ON pratos.usuario_id = usuarios.id
        ORDER BY pratos.id DESC";

$resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CRUD - Pratos</title>

</head>

<body>

<header>

    <h1>Pratos cadastrados</h1>

</header>


    <table border="1">

    <table border="1">

        <tr>

            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Categoria</th>
            <th>Usuário</th>
            <th>Ações</th>

        </tr>

        <?php while ($prato = $resultado->fetch_assoc()): ?>

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
                    R$ <?= number_format($prato["preco"], 2, ",", ".") ?>
                </td>

                <td>
                    <?= htmlspecialchars($prato["categoria"]) ?>
                </td>

                <td>
                    <?= htmlspecialchars($prato["usuario_nome"]) ?>
                </td>

                <td>

                    <a href="./editar.php?id=<?= $prato["id"] ?>">
                     Editar
                 </a>

                    |

                    <a href="excluir.php?id=<?= $prato["id"] ?>">
                        Excluir
                    </a>

                </td>

            </tr>

        <?php endwhile; ?>

    </table>


    <a href="../index.php">
    <button type="button">Voltar para o início</button>
</a>

</main>

</body>

</html>