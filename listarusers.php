<?php
$bd = file_get_contents("bd.json");
$bd = json_decode($bd);
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
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($bd->users as $index => $user) {
                        echo "<tr>";
                        echo "<td>" . $index . "</td>";
                        echo "<td>" . $user->username . "</td>";
                        echo "<td>" . $user->email . "</td>";
                        echo "<td style='padding: 1rem'> <a href='updateuser.php?update=$index'>Editar</a> | <a href='deleteUser.php?delete=$index'>Deletar</a> </td>";
                        echo "<tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>