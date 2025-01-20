<?
session_start();

$index = $_GET['delete'];
$bd = file_get_contents("bd.json");
$bd = json_decode($bd);

if (!isset($bd->users[$index])) {
    $_SESSION["errors"] = "indice não existe";
    header("location:listarusers.php");
    exit();
}

$updatedusers = array_splice($bd->users, $index, 0);
$bd->users = $updatedusers;


$users = file_put_contents("bd.json", json_encode($bd, JSON_PRETTY_PRINT));
header("location:listarUsers.php");
?>