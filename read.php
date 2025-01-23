<!-- <?php
global $pdo;
require "conexao.php";

$PDOStatement = $pdo->query("SELECT from empresas (nome_fantasia,cpnj,razao_social,criado_em,Atualizado_em) values ('$nomefantasia', '$cnpj' , '$razaosocial', now(), now())");
$results = $PDOStatement->fetchAll();
header("readHtml.php"); 
?> -->