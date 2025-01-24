<?php
global $pdo;
require "../conexao.php";

$id = $_POST["id"];

$name = $_POST["name"];
$cpf = $_POST["cpf"];


$validate = [];

if (empty($name)) {
    $validate[] = "Nome é invalido, campo deve ser preenchido";
}
if (!$name >= 5) {
    $validate[] = "Nome deve ter no minimo 5 caracteres";
}
if (empty($cpf)) {
    $validate[] = "Cpf é invalido, campo deve ser preenchido";
}
if (!$cpf == 11) {
    $validate[] = "Cpf deve ter 11 caracteres";
}

if (!empty($validate)) {
    $_SESSION["errors"] = $validate;
    header("updateHtml.php?id=$id");
}

$sql = "UPDATE cliente SET name = :nome, cpf = :cpf WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $id,);
$stmt->bindParam(":nome", $name);
$stmt->bindParam(":cpf", $cpf);
$stmt->execute();

$sql = "SELECT * FROM CLIENTE WHERE id= :id";
$statement = $pdo->prepare($sql);
$statement->bindParam(":id", $id);
$statement->fetch();
$_SESSION["sucess"] = $validate;


header("location:updateHtml.php?id=$id");
