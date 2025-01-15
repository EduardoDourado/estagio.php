<?php

session_start();
$password = $_POST["senha"];
$email = $_POST["email"];
$usuario = $_POST["name"];

$Validate = [];


if (strlen($password) < 8)
    $Validate[] = "password must be at lest 8 characters long.";

if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    $Validate[] = "$email is not a valid email address";

if (strlen($usuario) < 5)
    $Validate[] = "username must be at least 5 minimum characters long.";

if (!empty($Validate)) {
    $_SESSION["errors"] = $Validate;
    header("location:user.php");
    exit();
}

$bd = file_get_contents("bd.json");
$bd = json_decode($bd, true);

$user = [
    "username" => $usuario,
    "password" => password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]),
    "email" => $email,
];

$bd["users"][] = $user;

file_put_contents("bd.json", json_encode($bd, JSON_PRETTY_PRINT));

$_SESSION["sucess"] = "User created";
header('location:user.php')
    ?>