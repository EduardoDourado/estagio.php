<?php
global $pdo;
require "../conexao.php";


$PDOStatement = $pdo->query("SELECT * from cliente");
$results = $PDOStatement->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <a href="createClienteHtml">Cadastrar Cliente</a>
        <table>
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>Cpf</td>
                    <td>Criado_em</td>
                    <td>Atualizado_em</td>
                </tr>
            </thead>
            <tbody method="post">
                <?php
                foreach ($results as $cliente) {
                    echo "<tr>";
                    echo "<td>" . $cliente['name'] . "<td>";
                    echo "<td>" . $cliente['cpf'] . "<td>";
                    echo "<td>" . $cliente['created_at'] . "<td>";
                    echo "<td>" . $cliente['updated_at'] . "<td>";
                    echo "<td><a href='delete.php?id=" . $cliente['id'] . "'>deletar</a> | <a href='updateHtml.php?id=" . $cliente['id'] . "'>editar</a><td>";
                    echo "<tr>";
                }

                ?>
            </tbody>
        </table>
    </div>
</body>

</html>