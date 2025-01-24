<?php
global $pdo;
require "../conexao.php";

$id = $_GET["id"];

$sql = "SELECT * FROM cliente where id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(["id" => $id]);
//var_dump($stmt->queryString);
$resultado = $stmt->fetch();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente - <?php echo $resultado["name"] ?></title>
</head>

<body>
    <div>
        <a href="readClienteHtml.php">Listar Clientes</a>
        <form action="update.php" method="post">
            <input type="text" id="name" name="name" placeholder="nome do cliente" value="<?php echo $resultado["name"] ?>">
            <input type="text" id="cpf" name="cpf" placeholder="cpf do cliente" value="<?php echo $resultado["cpf"] ?>">
            <input type="hidden" name="id" value="<?php echo $id ?>">

            <input type="submit" value="Editar">
        </form>
    </div>
</body>

</html>