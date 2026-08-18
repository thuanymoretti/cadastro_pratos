<?php

include "../infra/conexao.php";

$id = $_POST["id"];
$usuario = $_POST["usuario"];
$prato = $_POST["prato"];


$sql = "UPDATE prato SET prato='$prato',usuario='$usuario' WHERE id = '$id'";

mysqli_query($conexao, $sql);
header("Location: ../index.php");