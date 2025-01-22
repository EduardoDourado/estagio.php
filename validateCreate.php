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
    'nomefantasia' => $nomefantasia,
    'cnpj' => $cnpj,
    'razaosocial' => $razaosocial,

];

$sql = ("insert into empresa (nomefantasia,cnpj,razaosocial,criadoem,Atualizadoem) values ('$nomefantasia', '$cnpj' , '$razaosocial', now(), now())");
$statement= $pdo->prepare($sql);
$statement->execute($data);

$_SESSION["sucess"] = $Validate;
header("location:createHtml.php");
?>