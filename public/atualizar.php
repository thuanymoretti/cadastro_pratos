<?php

include "../infra/conexao.php";

$id = $_POST["id"];
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$categoria = $_POST["categoria"];
$usuario_id = $_POST["usuario_id"];

$sql = "UPDATE pratos
        SET nome = ?,
            descricao = ?,
            preco = ?,
            categoria = ?,
            usuario_id = ?
        WHERE id = ?";

$stmt = $conexao->prepare($sql);

$stmt->bind_param(
    "ssdsii",
    $nome,
    $descricao,
    $preco,
    $categoria,
    $usuario_id,
    $id
);

$stmt->execute();

header("Location: visualizar_tabela.php");
exit();

?>