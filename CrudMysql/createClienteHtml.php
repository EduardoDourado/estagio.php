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
    <title>Cadastro de clientes</title>
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
            echo "Cadastrado com sucesso!";
        }
        ?>
    </div>
    <div>
        <h2>Cadastrar Clientes</h2>
        <a href="readClienteHtml.php">Listar Clientes</a>
        <form action="createCliente.php" method="post">
            <input type="text" id="name" name="name" placeholder="Nome do cliente" required>
            <input type="text" id="cpf" name="cpf" placeholder="cpf" required>

            <input type="submit" value="Cadastrar">
        </form>
    </div>
</body>

</html>