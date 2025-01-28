<?php
session_start();
$error = $_SESSION["error"] ?? false;
unset($_SESSION["error"]);
global $pdo;
require "../conexao.php";


$PDOStatement = $pdo->query("SELECT pet.id, cliente.name as clientename, pet.name, pet.breed, pet.created_at, pet.updated_at  from cliente INNER JOIN pet on pet.cliente_id = cliente.id");
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
<?php
if ($error) {
    echo $error;
}


?>
    <div>
        <a href="createPetHtml.php">Cadastrar Pets</a>
        <table>
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>Raça</td>
                    <td>Criado_em</td>
                    <td>Atualizado_em</td>
                    <td>Nome Cliente</td>
                    <td>Ação</td>


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
                    echo "<td>" . $pet['clientename'] . "<td>";

                    echo "<td><a href='deletePet.php?id=" . $pet['id'] . "'>deletar</a> | <a href='updatePetHtml.php?id=" . $pet['id'] . "'>editar</a><td>";
                    echo "<tr>";
                }

                ?>
            </tbody>
        </table>
    </div>
</body>

</html>