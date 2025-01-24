<?php
global $pdo;
require "../conexao.php";

$name = $_POST['name'];
$cpf = $_POST['cpf'];



$validate = [];

if (empty($name)) {
    $validate[] = "Nome é invalido, campo deve ser preenchido";
}
if (!$name >= 5) {
    $validate[] = "Nome deve ter no minimo 5 caracteres";
}
if (empty($cpf)) {
    $validate[] = "Cpf é invalido, campo deve ser preenchido";
}
if (!$cpf == 11) {
    $validate[] = "Cpf deve ter 11 caracteres";
}

if (!empty($validate)) {
    $_SESSION["errors"] = $validate;
    header("createClienteHtml.php");
}

$data = [
    'name' => $name,
    'cpf' => $cpf,
];

$sql = ("INSERT INTO cliente (name,cpf,created_at,updated_at) values (:name, :cpf,now(),now())"); //nos values posso colocar qualque nome desde que esteja batendo com a sintaxe do objeto;
$stmt = $pdo->prepare($sql);
$stmt->execute($data);

$_SESSION["sucess"] = $validate;
header("location:createClienteHtml.php");
