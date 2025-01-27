<?php
session_start();
global $pdo;
require "../conexao.php";

$id = $_POST["id"];

$name = $_POST["name"];
$breed = $_POST["breed"];


$validate = [];


if (strlen($name)< 4) {
    $validate[] = "Nome deve ter no minimo 4 caracteres";
}

if (Strlen($breed)< 4 ) {
    $validate[] = "Raça deve ter no minimo 4 caracteres";
}

if (!empty($validate)) {
    $_SESSION["errors"] = $validate;
    header("location:updatePetHtml.php?id=" . $id);
    exit();
}


$sql = "UPDATE pet SET name = :name, breed = :breed WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $id,);
$stmt->bindParam(":name", $name);
$stmt->bindParam(":breed", $breed);
$stmt->execute();

$sql = "SELECT * FROM pet WHERE id= :id";
$statement = $pdo->prepare($sql);
$statement->bindParam(":id", $id);
$statement->fetch();

$_SESSION["success"] = true;

header("location:updatePetHtml.php?id=$id");
?>