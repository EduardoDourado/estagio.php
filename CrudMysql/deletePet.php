<?php
session_start();
global $pdo;
require "../conexao.php";

$id = $_GET["id"];

$sql = "SELECT pet.id FROM pet WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->execute(["id" => $id]);
$resultado = $stmt->fetch();


if ($resultado == false) {
    $_SESSION["error"]  = "ID do pet não encontrado";
    
    header("readPetHtml.php");
}

$sql = "DELETE FROM pet WHERE id= :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->execute();
header("location:readPetHtml.php");
