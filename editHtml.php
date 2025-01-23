<?php
global $pdo;
require "conexao.php";
$id = $_GET["id"];
$sql = "SELECT * from empresa where id= :id"; //mostrar os dados ja salvos
$statement = $pdo->prepare($sql);
$statement->bindParam(":id", $id);
$statement->fetch();

$nomefantasia = $empresa['nome_fantasia'];
$cnpj = $empresa['cnpj'];
$razaosocial = $empresa['razao_social'];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>
    <div>
        <h2>Editar Campos</h2>
        <form action="edit.php" method="post">
            <input type="text" id="nome_fantasia" name="nome_fantasia" value="<?php echo $nomefantasia  ?>">
            <input type="text" id="cnpj" name="cpnj" value="<?php echo $cnpj ?>">
            <input type="text" id="razao_social" name="razao_social" value="<?php echo $razaosocial ?>">

            <input type="submit" value="Editar">
        </form>

    </div>
</body>

</html>