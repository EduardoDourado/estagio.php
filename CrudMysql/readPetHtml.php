<?php
global $pdo;
require "../conexao.php";


$PDOStatement = $pdo->query("SELECT * from pet");
$results = $PDOStatement->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pets</title>
</head>

<body>
    <div>
        <a href="createPetHtml.php">Cadastrar Pets</a>
        <table>
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>Raça</td>
                    <td>Criado_em</td>
                    <td>Atualizado_em</td>
                </tr>
            </thead>
            <tbody method="post">
                <?php
                foreach ($results as $pet) {
                    echo "<tr>";
                    echo "<td>" . $pet['name'] . "<td>";
                    echo "<td>" . $pet['breed'] . "<td>";
                    echo "<td>" . $pet['created_at'] . "<td>";
                    echo "<td>" . $pet['updated_at'] . "<td>";
                    echo "<td><a href='delete.php?id=" . $pet['id'] . "'>deletar</a> | <a href='updatePetHtml.php?id=" . $pet['id'] . "'>editar</a><td>";
                    echo "<tr>";
                }

                ?>
            </tbody>
        </table>
    </div>
</body>

</html>