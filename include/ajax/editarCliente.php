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

// recebe os dados do formulario
$id_cliente     = $_POST['id_cliente'];
$nome           = $_POST['nome'];
$logradouro     = $_POST['logradouro'];
$numero         = $_POST['numero'];
$cep            = $_POST['cep'];
$cidade         = $_POST['cidade'];
$bairro         = $_POST['bairro'];
$telefone       = $_POST['telefone'];
$estado         = $_POST['estado'];

// email em branco
if($nome == ""){
    //header("Location: ../exibirMensagem.php?mensagem=CadUsu-email-branco&pagina=visualizarUsuario&tipo=danger");
    echo "nome_branco";
    exit;
}

// senha em branco
if($logradouro == ""){
    //header("Location: ../exibirMensagem.php?mensagem=CadUsu-senha-branco&pagina=visualizarUsuario&tipo=danger");
    echo "logradouro_branco";
    exit;
}

// verifica se as senhas sao diferentes
if($numero == ""){
    //header("Location: ../exibirMensagem.php?mensagem=senhas-diferentes&pagina=visualizarUsuario&tipo=danger");
    echo "numero_branco";
    exit;
}

if($cep == ""){
    echo "cep_branco";
    exit;
}

if($cidade == ""){
    echo "cidade_branco";
    exit;
}

if($bairro == ""){
    echo "bairro_branco";
    exit;
}

if($telefone == ""){
    echo "telefone_branco";
    exit;
}

if($estado == ""){
    echo "estado_branco";
    exit;
}

// query de consulta
$sql = "SELECT * FROM clientes WHERE id_cliente = :id_cliente";
$consulta = $PDO->prepare($sql);
$consulta->bindParam('id_cliente', $id_cliente);
$result = $consulta->execute();

// numero de linhas da consulta
$numero_linhas = $consulta->rowCount();


// sql com os nomes identicos do banco de dados
$sql    = "UPDATE clientes SET nome = :nome, logradouro = :logradouro, numero = :numero, cep = :cep, cidade = :cidade, bairro = :bairro, telefone = :telefone, estado = :estado WHERE id_cliente = :id_cliente";
$stmt   = $PDO->prepare($sql);
$stmt->bindParam(':id_cliente', $id_cliente);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':logradouro', $logradouro);
$stmt->bindParam(':numero', $numero);
$stmt->bindParam(':cep', $cep);
$stmt->bindParam(':cidade', $cidade);
$stmt->bindParam(':bairro', $bairro);
$stmt->bindParam(':telefone', $telefone);
$stmt->bindParam(':estado', $estado);
$result = $stmt->execute();

// checa se foi realizada a operacao com o banco de dados
if(!$result){
    // header("Location: ../exibirMensagem.php?mensagem=erro-sql&pagina=visualizarCliente&tipo=danger");
    echo "erro_sql";
    exit;
}else{
	// header("Location: ../exibirMensagem.php?mensagem=ok-editarCliente&pagina=visualizarCliente&tipo=success");
    echo "ok";
    exit;
}


?>
