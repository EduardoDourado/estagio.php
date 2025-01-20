<?php

session_start();
//$password = $_POST["senha"];
$nome = $_POST["name"];
$cpf = $_POST["cpf"];
$nascimento = $_POST["nascimento"];
$endereco = $_POST["endereco"];

use App\Database\Database;
include "Database.php";

$database = new Database();

// $cpf = $database->validaCpf($cpf);

$Validate = [];


if (strlen($nome) < 5)
    $Validate[] = "username must be at least 5 minimum characters long.";

// var_dump(dirname, path:__FILE__);
// if (($cpf)) {
//     $Validate[] = "$cpf is not a valid cpf";
//     // var_dump($cpf);
//     // exit();
// }

if (!empty($Validate)) {
    $_SESSION["errors"] = $Validate;
    header("location:user.php");
    exit();
}


// $bd = file_get_contents("bd.json");
// $bd = json_decode($bd, true);

// $bd["clients"][] = $client;

// $client = [
//     "name" => $client,
//     "cpf" => $cpf,
//     "nascimento" => $nascimento,
//     "endereco" => $endereco


// ];


// file_put_contents("bd.json", json_encode($bd, JSON_PRETTY_PRINT));

$_SESSION["sucess"] = "Client Registrated";
header('location:user.php')
    ?>