<?php
global $pdo;
require "conexao.php";
$id = $_GET["id"];
$nome_fantasia = $_POST['nome_fantasia'];
$cnpj = $_POST['cnpj'];
$razao_social = $_POST['razao_social'];

$sql = "UPDATE empresa SET nome_fantasia = :nome_fantasia, cnpj = :cnpj, razao_social = :razao_social WHERE id = :id";

$statement = $pdo->prepare($sql);
$statement->bindParam(":id", $id);
$statement->execute();

$sql = "SELECT * from empresas where id= :id";
$statement = $pdo->prepare($sql);
$statement->bindParam(":id", $id);
$statement->fetch();
header("location:readHtml.php");
