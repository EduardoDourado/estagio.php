<?php
$index = $_GET['update'];
// $bd = file_get_contents('bd.json');
// $bd = json_decode($bd);
// if (!isset($bd->users[$index])) {
//     header('location: listarusers.php');
// }
session_start();
$errors = $_SESSION["errors"] ?? false;
unset($_SESSION["errors"]);
$sucess = $_SESSION["sucess"] ?? false;
unset($_SESSION["sucess"]);
// $user = $bd->users[$index];

include("Database.php");
use App\Database\Database;

$database = new Database();
$user = $database->getUserDataById($index);
$client = $database->getClientDataById($index);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>

<body>
    <div id="error">
        <?php
        if ($errors != false) {
            echo "<ul>";
            foreach ($errors as $error) {
                echo "<li>" . $error . "<li>";
            }
            echo "</ul>";
        }
        if ($sucess != false) {
            echo "User successfully created";
        }
        ?>
        <div>
            <h2>Editar clientes</h2>
            <form action="updateuser.php?index=<?php echo $index ?>" method="post">
                <input type="text" id="name" name="name" placeholder="Seu nome" required
                    value="<?php echo $client->nome ?>">

                <input type="text" id="cpf" name="cpf" placeholder="Seu cpf" required
                value="<?php echo $client->cpf  ?>" >

                <input type="text" id="nascimento" name="nascimento" placeholder="Seu nascimento" required
                    value="<?php echo $client->nascimento ?>"> 

                    <input type="text" id="endereco" name="endereco" placeholder="Seu endereço" required
                    value="<?php echo $client->endereco ?>">

                  

                <input type="submit" value="enviar dados">

            </form>

</body>

</html>