<?php

// use estagio.php\Database\App\Database;
include ("../database.php");

use App\Database\Database;




$database = new Database();
$users = $database->getUserData();

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
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Senha</th>
                        <th>Data de nascimento</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users as $index => $user ) {
                        echo "<tr>";
                        echo "<td>" . $index . "</td>";
                        echo "<td>" . $user->usuario . "</td>";
                        echo "<td>" . $user->email . "</td>";
                        echo "<td>" . $user->senha . "</td>";
                        echo "<td>" . $user->nascimento . "</td>";
                        echo "<td style='padding: 1rem'> <a href='updateUserHtml.php?update=$index'>Editar</a> | <a href='deleteUser.php?delete=$index'>Deletar</a> </td>";
                        echo "<tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>