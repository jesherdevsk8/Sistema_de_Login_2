<?php

define('MYSQL_HOST','mysql'); //local do banco de dados
define('MYSQL_USER','admin'); // nome de usuario
define('MYSQL_PASSWORD','senha@123'); // senha de usuario
define('MYSQL_DB_NAME','logindb'); // nome do banco de dados

try{
    $PDO = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD);
}catch(PDOException $e){
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}

?>