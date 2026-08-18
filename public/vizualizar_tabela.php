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
        <div>
            <h2>Pratos Cadastrados</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Usuário</th>
                    <th>Prato</th>
                
                    <th>Ações</th>
                </tr>
                <?php while ($prato = mysqli_fetch_assoc($pratos)) { ?>
                    <tr>
                        <td><?php echo $prato["id"] ?></td>
                        <td><?php echo $prato["usuario"] ?></td>
                        <td><?php echo $prato["prato"] ?></td>
                        
                        <td>
                            <a href="public/editar.php?id=<?php echo $prato["id"] ?>">Editar</a>
                            <a href="public/excluir.php?id=<?php echo $prato["id"] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>

    </main>
    <footer>

    </footer>


</body>

</html>