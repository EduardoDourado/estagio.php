<?php
global $pdo;
require "../conexao.php";

$id = $_GET["id"];



$sql = "DELETE FROM cliente WHERE id= :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id",$id);
$stmt->execute();
header("location:readClienteHtml.php");



?>
