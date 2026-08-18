<?php

include "../infra/conexao.php";

$usuario = $_POST["usuario"];
$prato = $_POST["prato"];


$sql = "INSERT INTO prato (usuario,prato) VALUES ('$usuario','$prato')";

mysqli_query($conexao, $sql);

header("Location: ../index.php");
?>