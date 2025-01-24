<?php
global $pdo;
require "../conexao.php";

$id = $_GET["id"];
$nome = $_POST["name"];
$cpf = $_POST["cpf"];

$sql = "UPDATE cliente SET name = :nome, cpf = :cpf WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $id,);
$stmt->execute();

$sql = "SELECT * FROM CLIENTE WHERE id= :id";
$statement = $pdo->prepare($sql);
$statement->bindParam(":id", $id);
$statement->fetch();

header("location:updateHtml.php.php");
