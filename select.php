<?php
global $pdo;
require "conexao.php";

try {
    // $PDOStatement = $pdo->query("SELECT * FROM empresa");
    // $results = $PDOStatement->fetchAll();
    // var_dump($results);

    // $PDOStatement = $pdo->query("UPDATE empresa SET cpnj = 102458484 WHERE id = 1");
    // $results = $PDOStatement->execute();

    // $PDOStatement = $pdo->query("SELECT * FROM empresa");
    // $results = $PDOStatement->fetchAll();
    // var_dump($results);
    // exit();
    $PDOStatement = $pdo->query("SELECT * FROM empresa");
    $results = $PDOStatement->fetchAll();
    var_dump($results);

    $PDOStatement = $pdo->query("DELETE FROM empresa WHERE id = 4");
    $results = $PDOStatement->execute();

    $PDOStatement = $pdo->query("SELECT * FROM empresa");
    $results = $PDOStatement->fetchAll();
    var_dump($results);

    $PDOStatement = $pdo->query("insert into empresa (nome_fantasia, cpnj, razao_social, criado_em, atualizado_em) values ('shukarule', '102458484', 'shukaruleltda','2025-01-20 12:16:31','2025-01-20 12:16:31') ");
    $results = $PDOStatement->execute();
    var_dump($results);

    // $PDOStatement = $pdo->query("insert into empresa WHERE id = 2 values ()");
    // $results = $PDOStatement->execute();

    var_dump($results);
} catch (PDOException $e) {
    die($e->getMessage());
}

?>