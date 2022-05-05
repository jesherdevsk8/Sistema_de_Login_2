<?php

// inicia a sessao
session_start();

// importar o arquivo de seguranca
include('../lib/seguranca.php');

// importar o arquivo de conexao com o banco de dados
include('../config/config.php');

// protege o login
protegeLogin();

// cria a data atual
$data_atual = date("Y-m-d");

// recebe os dados do formulario
$nome           = $_POST['nome'];
$logradouro     = $_POST['logradouro'];
$numero         = $_POST['numero'];
$cep            = $_POST['cep'];
$cidade         = $_POST['cidade'];
$bairro         = $_POST['bairro'];
$telefone       = $_POST['telefone'];
$estado         = $_POST['estado'];
$id_cliente     = $_POST['id_cliente'];


// query de consulta
$sql = "SELECT * FROM clientes WHERE email = :email AND id_cliente != :id_cliente";
$consulta = $PDO->prepare($sql);
$consulta->bindParam(':email', $email);
$consulta->bindParam('id_cliente', $id_cliente);
$result = $consulta->execute();

// numero de linhas da consulta
$numero_linhas = $consulta->rowCount();


// sql com os nomes identicos do banco de dados
$sql    = "UPDATE clientes SET nome = :nome, logradouro = :logradouro, numero = :numero, cep = :cep, cidade = :cidade, bairro = :bairro, telefone = :telefone, estado = :estado WHERE id_cliente = :id_cliente";
$stmt   = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':logradouro', $logradouro);
$stmt->bindParam(':numero', $numero);
$stmt->bindParam(':cep', $cep);
$stmt->bindParam(':cidade', $cidade);
$stmt->bindParam(':bairro', $bairro);
$stmt->bindParam(':telefone', $telefone);
$stmt->bindParam(':estado', $estado);
$stmt->bindParam(':id_cliente', $id_cliente);
$result = $stmt->execute();

// checa se foi realizada a operacao com o banco de dados
if(!$result){
    header("Location: ../exibirMensagem.php?mensagem=erro-sql&pagina=visualizarCliente&tipo=danger");
    exit;
}else{
	header("Location: ../exibirMensagem.php?mensagem=ok-editarCliente&pagina=visualizarCliente&tipo=success");
    exit;
}


?>
