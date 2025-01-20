<?php

session_start();

$usuario = $_POST["usuario"];
$senha = $_POST["senha"];
$email = $_POST["email"];
$nascimento = $_POST["nascimento"];


use App\Database\Database;
include "../database.php";

$database = new Database();


$Validate = [];


if (strlen($usuario) < 5)
    $Validate[] = "username must be at least 5 minimum characters long.";



if (!empty($Validate)) {
    $_SESSION["errors"] = $Validate;
    header("location:user.php");
    exit();
}
// if (!$cpf = false) {
//    $Validate = $cpf;
// }
$database->saveUser($usuario, $senha, $email, $nascimento);



$_SESSION["sucess"] = "user Registrated";
header('location:user.php')
    ?>