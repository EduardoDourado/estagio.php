<?php
session_start();
$senha = $_POST["senha"];
$email = $_POST["email"];
$usuario = $_POST["usuario"];
$nascimento = $_POST["nascimento"];
$index = $_GET['index'];

use App\Database\Database;
include "../database.php";

$database = new Database();


$Validate = [];

if (strlen($senha) < 8)
    $Validate[] = "password must be at lest 8 characters long.";

if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    $Validate[] = "$email is not a valid email address";

if (strlen($usuario) < 5)
    $Validate[] = "username must be at least 5 minimum characters long.";

if (!empty($Validate)) {
    $_SESSION["errors"] = $Validate;
    header("location:updateUserHtml.php?update=$index");
    exit();//mostrar os dados do usuario nos inputs
}

if (!isset($bd->users[$index])) {
    $errors = "usuario não encontrado";
}

$database->updateUser($usuario, $senha, $email, $nascimento, $index);

$_SESSION["sucess"] = "Usuario Atualizado";
header("location:updateUserHtml.php?update=$index");


?>