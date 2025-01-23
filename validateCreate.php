<?php
global $pdo;
require "conexao.php";

$nomefantasia = $_POST["nome_fantasia"];
$cnpj = $_POST["cnpj"];
$razaosocial = $_POST["razao_social"];

$Validate = [];

if (strlen($nomefantasia < 5)) {
    $Validate[] = "quantidade minima de caracteres necessaria maior que cinco.";
}
if ($cnpj < 6) {
    $Validate[] = "quantidade minima de caracteres necessaria maior que seis";
}
if ($razaosocial < 5) {
    $Validate[] = "quantidade minima de caracteres necessaria maior que cinco";
}

if (!empty($Validate)) {
    $_SESSION["errors"] = $Validate;
    header("createHtml.php");
}

$data = [
    'nome_fantasia' => $nomefantasia,
    'cnpj' => $cnpj,
    'razao_social' => $razaosocial,

];

$sql = ("INSERT into empresa (nome_fantasia,cnpj,razao_social,criado_em,atualizado_em) values ('$nomefantasia', '$cnpj' , '$razaosocial', now(), now())");
$statement = $pdo->prepare($sql);
$statement->execute($data);

$_SESSION["sucess"] = $Validate;
header("location:createHtml.php");
