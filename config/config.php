<?php

define('MYSQL_HOST','localhost:3307'); // local do banco de dados usb webserver
// define('MYSQL_HOST','localhost'); //local do banco de dados
define('MYSQL_USER','root'); // nome de usuario
define('MYSQL_PASSWORD','usbw'); // senha de usuario usb webserver
// define('MYSQL_PASSWORD',''); // senha de usuario
define('MYSQL_DB_NAME','3ds_pw3'); // nome do banco de dados

try{
    $PDO = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD);
}catch(PDOException $e){
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}

?>