<?php

include "../infra/conexao.php";


// CADASTRAR USUÁRIO

if (isset($_POST["email"])) {

    $nome = $_POST["nome"];
    $email = $_POST["email"];

    if (empty($nome) || empty($email)) {
        die("Preencha todos os campos.");
    }

    $sql = "INSERT INTO usuarios (nome, email) VALUES (?, ?)";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ss", $nome, $email);
    $stmt->execute();

    header("Location: cadastro_usuario.php?sucesso=1");
    exit();
}


// CADASTRAR PRATO

if (isset($_POST["descricao"])) {

    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $categoria = $_POST["categoria"];
    $usuario_id = $_POST["usuario_id"];

    if (
        empty($nome) ||
        empty($descricao) ||
        empty($preco) ||
        empty($categoria) ||
        empty($usuario_id)
    ) {
        die("Preencha todos os campos.");
    }

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