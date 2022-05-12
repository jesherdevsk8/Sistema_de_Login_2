<?php

// inicia a sessao
session_start();

// importar o arquivo de seguranca
include('../../lib/seguranca.php');

// importar o arquivo de conexao com o banco de dados
include('../../config/config.php');

// protege o login
protegeLogin();

// cria a data atual
date_default_timezone_set('America/Sao_Paulo');

// recebe os ids dos usuarios
$ids_string = $_POST['ids'];

// grava ids dos usuarios selecionados em um array
$ids        = preg_split('@,@', $ids_string, NULL, PREG_SPLIT_NO_EMPTY);
$qtd_ids    = count($ids);

foreach ($ids as $value){
	
	$sql = "DELETE FROM usuarios WHERE id_usuario = :value";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':value', $value);
	$result = $stmt->execute();

}

if(!$result){
    echo "erro_sql";
    exit;
}else{
	echo "ok";
}
		
?>