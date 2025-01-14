<?php
session_start();
$feedback = $_SESSION['feedback'] ?? false;
unset($_SESSION['feedback']);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <form action="createUser.php" method="post">
            <input type="text" id="name" name="name" placeholder="Seu nome">
            <input type="password" id="senha" name="senha" placeholder="Sua senha">
            <input type="email" id="email" name="email" placeholder="Seu email">
            <input type="submit" value="enviar dados">

        </form>
    </div>
    <?php

    if ($feedback != false) {
        echo "<p>$feedback</p>";

    }

    ?>
    </div>
</body>

</html>