<?php

session_start();
$password = $_POST["password"];
$email = $_POST["email"];
$usuario = $_POST["usuario"];

$Validate = [];


if (strlen($password) > 8)
    $Validate[] = "password must be at lest 8 characters long.";

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $Validate[] = "$email is a valid email adress";
    $_SESSION['feedback'] = "Email invalido.";
} else {
    $Validate[] = "$email is not a valid email adress";
}

if (!empty($Validate)) {
    echo "<ul>";
    foreach ($Validate as  $erros) {
        echo "<li>" . $erros . "<li>";
    }
} else {
    echo "Todos os dados estão validos!";
}
echo "</ul>";
?>
//header("location: index.php");