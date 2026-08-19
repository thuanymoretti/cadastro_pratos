<?php

include "../infra/conexao.php";

$tipo = $_POST["tipo"] ?? "";


/* CADASTRAR USUÁRIO */

if ($tipo == "usuario") {

    $nome = $_POST["nome"];
    $email = $_POST["email"];

    $sql = "INSERT INTO usuarios (nome, email)
            VALUES (?, ?)";

    $stmt = $conexao->prepare($sql);

    $stmt->bind_param("ss", $nome, $email);

    $stmt->execute();

    header("Location: cadastro_usuario.php?sucesso=1");
    exit();
}


/* CADASTRAR PRATO */

if ($tipo == "prato") {

    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $categoria = $_POST["categoria"];
    $usuario_id = $_POST["usuario_id"];

    $sql = "INSERT INTO pratos
            (nome, descricao, preco, categoria, usuario_id)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);

    $stmt->bind_param(
        "ssdsi",
        $nome,
        $descricao,
        $preco,
        $categoria,
        $usuario_id
    );

    $stmt->execute();

    header("Location: cadastrar_pratos.php?sucesso=1");
    exit();
}

?>