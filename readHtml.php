<?php
global $pdo;
require "conexao.php";

$PDOStatement = $pdo->query("select from empresa (nome_fantasia,cpnj,razao_social,criado_em,Atualizado_em) values ('$nomefantasia', '$cnpj' , '$razaosocial', now(), now())");
$results = $PDOStatement->fetchAll();
$value = $results;
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar empresas</title>

</head>

<body>
    <div>
        <h2>Listagem de Empresas</h2>
        <a href="createHtml.php">Cadastrar Empresas</a>
        <table>
            <thead>
                <tr>
                    
                    <td>Nome Fantasia</td>
                    <td>CNPJ</td>
                    <td>Razão Social</td>
                </tr>
            </thead>
            <tbody>
                <?php
                echo "<tr>";
                echo "<td>" . $value . "<td>";
                echo "<tr>";

                ?>
            </tbody>
        </table>
    </div>
    <div>
        <form action="read.php" method="post">


        </form>
    </div>
</body>

</html>