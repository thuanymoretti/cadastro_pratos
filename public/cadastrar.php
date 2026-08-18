<?php

include "../infra/conexao.php";

if (isset($_POST["nome"]) && isset($_POST["email"])) {

    $nome = $_POST["nome"];
    $email = $_POST["email"];

    $sql = "INSERT INTO usuarios (nome, email) VALUES (?, ?)";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ss", $nome, $email);
    $stmt->execute();

    header("Location: cadastro_usuario.php");
    exit();

}

if (isset($_POST["usuarios"]) && isset($_POST["pratos"])) {

    $usuarios = $_POST["usuarios"];
    $pratos = $_POST["pratos"];

    $sql = "INSERT INTO usuarios (nome, email) VALUES (?, ?)";
    $sql = "INSERT INTO pratos (nome, descricao, preco, usuario_id)
        VALUES (?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ss", $usuarios, $pratos);
    $stmt->execute();

    header("Location: ../index.php");
    exit();

}

?>