<?php
session_start();
$errors = $_SESSION["errors"] ?? false;

unset($_SESSION["errors"]);
$sucess = $_SESSION["sucess"] ?? false;
unset($_SESSION["sucess"]);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Usuario</title>
</head>

<body>

    <div id="error" style="color: crimson;">
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
    </div>
    <div>
        <form action="createUser.php" method="post">
            <input type="text" id="usuario" name="usuario" placeholder="Seu nome de usuario">
            <input type="email" id="email" name="email" placeholder="Seu email">
            <input type="password" id="senha" name="senha" placeholder="sua senha">
            <input type="text" id="nascimento" name="nascimento" placeholder="data de nascimento">


            <input type="submit" value="enviar dados">
            <input type="submit" value="listar" action="listarUsers.php">
        </form>

    </div>
</body>

</html>