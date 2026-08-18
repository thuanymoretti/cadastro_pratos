<?php

include "../infra/conexao.php";

$sql = "SELECT 
            pratos.id,
            pratos.nome,
            pratos.descricao,
            pratos.preco,
            pratos.categoria,
            usuarios.nome AS usuario
        FROM pratos
        INNER JOIN usuarios
        ON pratos.usuario_id = usuarios.id";

$resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Pratos cadastrados</title>

</head>

<body>

<h1>Pratos cadastrados</h1>

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

    <?php while ($prato = $resultado->fetch_assoc()) { ?>

        <tr>

            <td>
                <?= $prato["id"] ?>
            </td>

            <td>
                <?= $prato["nome"] ?>
            </td>

            <td>
                <?= $prato["descricao"] ?>
            </td>

            <td>
                R$ <?= number_format($prato["preco"], 2, ",", ".") ?>
            </td>

            <td>
                <?= $prato["categoria"] ?>
            </td>

            <td>
                <?= $prato["usuario"] ?>
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

    <?php } ?>

</table>

<br>

<a href="../index.php">
    <button>Voltar para o início</button>
</a>

</body>

</html>