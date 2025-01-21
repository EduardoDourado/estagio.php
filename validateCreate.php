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
var_dump($Validate);
exit();
if (!empty($Validate)) {
    $_SESSION["errors"] = $Validate;
    header("createHtml.php");
}


$PDOStatement = $pdo->query("insert into empresa (nome_fantasia,cpnj,razao_social,criado_em,Atualizado_em) values ('$nomefantasia', '$cnpj' , '$razaosocial', now(), now())");
$results = $PDOStatement->execute();
$_SESSION["sucess"] = $Validate;

header("createHtml.php");
?>