<?php

include "../infra/conexao.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário</title>
</head>

<body>

<h1>CRUD - Usuários</h1>

<?php if (isset($_GET["sucesso"])) { ?>
    <h2>Usuário cadastrado com sucesso!</h2>

    <a href="../index.php">
        <button>Voltar para o início</button>
    </a>

<?php } else { ?>

    <h2>Cadastre um novo usuário</h2>

    <form action="cadastrar.php" method="POST">

        Nome:
        <input type="text" name="nome" required>
        <br>
        
        <br>
        Email:
        <input type="email" name="email" required>
        <br>

        <br>
        <button type="submit">Cadastrar</button>

    </form>

    <br>

    <a href="../index.php">
        <button>Voltar para o início</button>
    </a>

<?php } ?>

</body>

</html>