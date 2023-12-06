<?php
$hostname = 'mysql';
$username = 'root';
$password = '1234';
$dbname = 'tabela_cliente';

try {
    $pdo = new PDO('mysql:host=' . $hostname. ';dbname='. $dbname, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "conexão com sucesso";
}catch (PDOException $err){
    echo "erro na conexão" . $err->getMessage();
}
