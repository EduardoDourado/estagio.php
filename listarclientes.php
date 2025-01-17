<?php

use App\Database\Database;
include "Database.php";

$bd = file_get_contents("bd.json");
$bd = json_decode($bd);

$database = new Database();

// $users = $database->getUserData();
$client =  $database->getClientData()
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de User</title>
</head>

<body>
    <div>
        <h2>Listagem de usuarios</h2>
        <a href="user.php">Cadastrar um Usuario</a>
        <div class="usuarios">
            <table>
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Nome</th>
                        <th>Cpf</th>
                        <th>Nascimento</th>
                        <th>Endereço</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($bd->clients as $index => $client ) {
                        echo "<tr>";
                        echo "<td>" . $index . "</td>";
                        echo "<td>" . $client->nome . "</td>";
                        echo "<td>" . $client->cpf . "</td>";
                        echo "<td>" . $client->nascimento . "</td>";
                        echo "<td>" . $client->endereco . "</td>";
                        echo "<td style='padding: 1rem'> <a href='updateuserhtml.php?update=$index'>Editar</a> | <a href='deleteUser.php?delete=$index'>Deletar</a> </td>";
                        echo "<tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>