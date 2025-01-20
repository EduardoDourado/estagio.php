<?php
$index = $_GET['update'];

session_start();
$errors = $_SESSION["errors"] ?? false;
unset($_SESSION["errors"]);

$sucess = $_SESSION["sucess"] ?? false;
unset($_SESSION["sucess"]);

use App\Database\Database;//root
include("../database.php");


$database = new Database();

$user = $database->getUserDataById($index);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cliente</title>
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
            <h2>Editar Usuarios</h2>
            <form action="updateUser.php?index=<?php echo $index ?>" method="post">
                <input type="text" id="usuario" name="usuario" placeholder="Seu nome de usuario" required
                    value="<?php echo $user->usuario ?>">

                <input type="password" id="senha" name="senha" placeholder="Sua senha" required
                    value="<?php echo $user->senha  ?>">

                    <input type="email" id="email" name="email" placeholder="Seu email" required
                        value="<?php echo $user->email ?>">

                <input type="text" id="nascimento" name="nascimento" placeholder="Seu nascimento" required
                    value="<?php echo $user->nascimento ?>">


                <input type="submit" value="Editar">

            </form>

</body>

</html>