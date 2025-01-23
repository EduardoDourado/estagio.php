<?php
global $pdo;
require "conexao.php";


$PDOStatement = $pdo->query("SELECT * from empresa");
$results = $PDOStatement->fetchAll();

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
                    <td>Criado_em</td>
                    <td>Atualizado_em</td>
                    <td>Ação</td>
                </tr>
            </thead>
            <tbody method="post">
                <?php
                foreach ($results as $empresa) {
                    echo "<tr>";
                    echo "<td>" . $empresa['nome_fantasia'] . "<td>";
                    echo "<td>" . $empresa['cnpj'] . "<td>";
                    echo "<td>" . $empresa['criado_em'] . "<td>";
                    echo "<td>" . $empresa['atualizado_em'] . "<td>";
                    echo "<td><a href='delete.php?id=" . $empresa['id']. "'>deletar</a> | <a href='edit.php?id=" . $empresa['id'] . "'>editar</a><td>";
                    echo "<tr>";
                }

                ?>
            </tbody>
        </table>

</body>

</html>