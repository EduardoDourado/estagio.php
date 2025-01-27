<?php
session_start();
global $pdo;
require "../conexao.php";

$errors = $_SESSION["errors"] ?? false;
unset($_SESSION["errors"]);

$sucess = $_SESSION["success"] ?? false;
unset($_SESSION["success"]);

$id = $_GET["id"];

$sql = "SELECT * FROM pet where id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(["id" => $id]);
//var_dump($stmt->queryString);
$resultado = $stmt->fetch();

$sql = "SELECT cliente.name, cliente.id FROM cliente";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pet - <?php echo $resultado["name"] ?></title>
</head>

<body>
<div id="error">
        <?php
        if ($errors != false) {
            echo "<ul>";
            foreach ($errors as $error) {
                echo "<li>" . $error . "<li>";
            }
            echo "<ul>";
        }
        if ($sucess != false) {
            echo "Atualizado com sucesso!";
        }
        ?>
    <div>
        <a href="readPetHtml.php">Listar Pets</a>
        <form action="updatePet.php" method="post">
            <input type="text" id="name" name="name" placeholder="nome do pet" value="<?php echo $resultado["name"] ?>">
            <input type="text" id="breed" name="breed" placeholder="raça do pet" value="<?php echo $resultado["breed"] ?>">
            <input type="hidden" name="id" value="<?php echo $id ?>">

            <select name="cliente_id">
            <?php
            foreach ($results as  $cliente) {
                if($cliente["id"] == $resultado["cliente_id"])
              {
                echo "<option value='".$cliente['id']."' selected>" . $cliente['name']."</option>";
              }else {
                echo "<option value='".$cliente['id']."'>" . $cliente['name']."</option>";
              }

            }
           
            ?>
            </select>

            <input type="submit" value="Editar">
        </form>
    </div>
</body>

</html>