<?php
$bd = file_get_contents("bd.json");
$bd = json_decode($bd); //puxar dados do banco

session_start();
$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$nascimento = $_POST["nascimento"];
$endereco = $_POST["endereco"];

$Validate = [];

// if (!filter_var($email, FILTER_VALIDATE_EMAIL))
//     $Validate[] = "$email is not a valid email address";

if (strlen($nome) < 5)
    $Validate[] = "username must be at least 5 minimum characters long.";

if (!empty($Validate)) {
    $_SESSION["errors"] = $Validate;
    header("location:updateClienteHtml.php?update=$index");
    exit(); //mostrar os dados do usuario nos inputs
}

if (!isset($bd->Clientes[$index])) {
    $errors = "cliente não encontrado";
}


$client = [
    "nome" => $nome,
    "cpf" => $cpf,
    "nascimento" => $nascimento,
    "endereco" => $endereco,
];

$bd->clients[$index] = $client;

file_put_contents("bd.json", json_encode($bd, JSON_PRETTY_PRINT));

$_SESSION["sucess"] = "Cliente Atualizado";
header("location:updateClienteHtml.php?update=$index");
