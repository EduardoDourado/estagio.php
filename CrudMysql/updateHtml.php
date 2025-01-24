<?php
global $pdo;
require "../conexao.php";

$id = $_GET["id"];
$sql = "SELECT * FROM cliente where id= :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->fetch();

$nome = $_POST ["name"];
$cpf = $_POST["cpf"];

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
</head>

<body>
    <div>
        <form action="update.php" method="post">
            <input type="text" id="name" name="name" placeholder="nome do cliente" value="<?php echo $nome["name"] ?>">
            <input type="text" id="cpf" name="cpf" placeholder="cpf do cliente" value="<?php echo $cpf["cpf"] ?>">

            <input type="submit" value="Editar">
        </form>
    </div>
</body>

</html>