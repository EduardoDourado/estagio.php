<?php
global $pdo;
require "conexao.php";

$nome = $_POST['name'];
$breed = $_POST['breed'];


$validate = [];

if (empty($nome)) {
    $validate[] = "Nome é invalido, campo deve ser preenchido";
}
if (!$nome >= 4) {
    $validate[] = "Nome deve ter no minimo 4 caracteres";
}
if (empty($breed)) {
    $validate[] = "Raça é invalido, campo deve ser preenchido";
}
if (!$breed >= 4 ) {
    $validate[] = "Raça deve ter no minimo 4 caracteres";
}

if (!empty($validate)) {
    $_SESSION["errors"] = $validate;
    header("createClienteHtml.php");
}

$data = [
    'name' => $name,
    'breed' => $breed,
];

$sql = ("INSERT INTO cliente (name,breed,created_at,updated_at) values (:name, :breed,now(),now())"); //nos values posso colocar qualque nome desde que esteja batendo com a sintaxe do objeto;
$stmt = $pdo->prepare($sql);
$stmt->execute($data);

$_SESSION["sucess"] = $validate;
