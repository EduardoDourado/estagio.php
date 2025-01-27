<?php
global $pdo;
require "../conexao.php";


$name = $_POST["name"];
$breed = $_POST["breed"];
$clienteid = $_POST["cliente_id"];


$validate = [];

if (empty($name)) {
    $validate[] = "Nome é invalido, campo deve ser preenchido";
}
if (!$name >= 4) {
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
    header("createPetHtml.php?id=", $id);
}

$data = [
    'name' => $name,
    'breed' => $breed,
    'cliente_id' => $clienteid,
];

$sql = ("INSERT INTO pet (name,breed,created_at,updated_at, cliente_id) values (:name, :breed,now(),now(),:cliente_id)"); //nos values posso colocar qualque nome desde que esteja batendo com a sintaxe do objeto;
$stmt = $pdo->prepare($sql);
$stmt->execute($data);

$_SESSION["sucess"] = $validate;
header("location:readPetHtml.php");
?>
