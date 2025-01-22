<?php 
global $pdo;
require "conexao.php";
$id = $_GET["id"];
$sql = "select * from empresa where id = :id";
$statement = $pdo->prepare($sql);
$statement->bindParam(":id",$id);
$statement->fetch();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
        <form action="edit.php">
            <input type="text" id="nome_fantasia" name="nome_fantasia" value="<?php echo $statement[$nomefantasia]  ?>">
            <input type="text" id="cnpj" name="cpnj" value="<?php echo $statement[$cnpj] ?>">
            <input type="text" id="razao_social" name="razao_social" value="<?php echo $statement[$razaosocial] ?>">

            <input type="submit" value="Editar"  >
        </form>

    </div>
</body>
</html>