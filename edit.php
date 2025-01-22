<?php
global $pdo;
require "conexao.php";
$id = $_GET["id"];
$sql = "update from empresa where id = :id";

$statement = $pdo->prepare($sql);
$statement->bindParam(":id", $id);
$statement->execute();


header("location:readHtml.php");

?>