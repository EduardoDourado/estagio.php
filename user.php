<?php
session_start();
$errors = $_SESSION["errors"] ?? false;

unset($_SESSION["errors"]);
$sucess = $_SESSION["sucess"] ?? false;
unset($_SESSION["sucess"]);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <input type="text" id="name" name="name" placeholder="Seu nome">
            <input type="password" id="senha" name="senha" placeholder="Sua senha">
            <input type="email" id="email" name="email" placeholder="Seu email">
            <input type="submit" value="enviar dados">

        </form>
    </div>
    <?php

    // if ($feedback != false) {
    //     echo "<p>$feedback</p>";
    
    // }
    
    ?>
    </div>
</body>

</html>