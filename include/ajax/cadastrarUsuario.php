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
$data_atual = date("Y-m-d") ;

// recebe os dados do formulario
$email          = $_POST['email'];
$senha          = $_POST['senha'];
$conf_senha     = $_POST['conf_senha'];
$administrador  = $_POST['administrador'];


// email em branco
if($email == ""){
    //header("Location: ../exibirMensagem.php?mensagem=CadUsu-email-branco&pagina=cadastrarUsuario&tipo=danger");
    echo "email_branco";
    exit;
}

// senha em branco
if($senha == ""){
    //header("Location: ../exibirMensagem.php?mensagem=CadUsu-senha-branco&pagina=cadastrarUsuario&tipo=danger");
    echo "senha_branco";
    exit;
}

// verifica se as senhas sao diferentes
if($senha != $conf_senha){
    //header("Location: ../exibirMensagem.php?mensagem=senhas-diferentes&pagina=cadastrarUsuario&tipo=danger");
    echo "senha_diferente";
    exit;
}

// criptografa a senha
$senha_criptografada = md5($senha);

// sql com os nomes identicos do banco de dados
$sql    = "INSERT INTO usuarios VALUES (null, :email, :senha, :administrador, :data_cadastro)";

$stmt   = $PDO->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':senha', $senha_criptografada);
$stmt->bindParam(':administrador', $administrador);
$stmt->bindParam(':data_cadastro', $data_atual);
$result = $stmt->execute();

// var_dump($stmt -> errorInfo());

// checa se foi realizada a operacao com o banco de dados
if(!$result){
    //header("Location: ../exibirMensagem.php?mensagem=erro-sql&pagina=cadastrarUsuario&tipo=danger");
    echo "erro_sql";
    exit;
}else{
	//header("Location: ../exibirMensagem.php?mensagem=ok-cadastrarUsuario&pagina=area-administrativa&tipo=success");
    echo "ok";
    exit;
}


?>