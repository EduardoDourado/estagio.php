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
    <title>Cadastro de Empresa</title>
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
            echo "Cadastrado com sucesso!";
        }
        ?>
    </div>
    <div>
        <h2>Cadastro de Empresa</h2>
        <form action="validateCreate.php" method="post">
            <input type="text" id="nome_fantasia" name="nome_fantasia" placeholder="O nome fantasia" >
            <input type="text" id="cnpj" name="cnpj" placeholder="O Cnpj">
            <input type="text" id="razao_social" name="razao_social" placeholder="A razão social">

            <input type="submit" value="Enviar Dados">

        </form>
    </div>
</body>

</html>