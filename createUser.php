<?php
session_start();
$password = $_POST["password"];
$email = $_POST["email"];
$usuario = $_POST["usuario"];

if (strlen($password) > 8) 
echo"password must be at lest 8 characters long.";

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo"$email is a valid email adress";
    $_SESSION['feedback'] = "Email invalido.";

}else {
    echo "$email is not a valid email adress";
}



//header("location: index.php");


?>