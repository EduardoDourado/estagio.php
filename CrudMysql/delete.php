<?php
session_start();
$errors = $_SESSION["errors"] ?? false;
unset($_SESSION["errors"]);
// $sucess = $_SESSION["sucess"] ?? false;
// unset($_SESSION["sucess"]);

global $pdo;
require "../conexao.php";


$id = $_GET["id"];

$sql = "SELECT pet.id FROM pet where cliente_id = :id";
$stmt = $pdo->prepare($sql);
$resultado = $stmt->execute(["id"=> $id]);

if ($resultado != false) {
  
   echo $_SESSION["errors"] = "Não é possivel deletar clientes com pets cadastrados";
   exit();
};




$sql = "DELETE FROM cliente WHERE cliente.id= :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id",$id);
$stmt->execute();
header("location:readClienteHtml.php");

?>
