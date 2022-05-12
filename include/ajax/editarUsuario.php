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
$data_atual = date("Y-m-d");

// recebe os dados do formulario
$email          = $_POST['email'];
$senha          = $_POST['senha'];
$conf_senha     = $_POST['conf_senha'];
$administrador  = $_POST['administrador'];
$id_usuario     = $_POST['id_usuario'];

// email em branco
if($email == ""){
    //header("Location: ../exibirMensagem.php?mensagem=CadUsu-email-branco&pagina=visualizarUsuario&tipo=danger");
    echo "email_branco";
    exit;
}

// senha em branco
if($senha == ""){
    //header("Location: ../exibirMensagem.php?mensagem=CadUsu-senha-branco&pagina=visualizarUsuario&tipo=danger");
    echo "senha_branco";
    exit;
}

// verifica se as senhas sao diferentes
if($senha != $conf_senha){
    //header("Location: ../exibirMensagem.php?mensagem=senhas-diferentes&pagina=visualizarUsuario&tipo=danger");
    echo "senha_diferente";
    exit;
}

// query de consulta
$sql = "SELECT * FROM usuarios WHERE email = :email AND id_usuario != :id_usuario";
$consulta = $PDO->prepare($sql);
$consulta->bindParam(':email', $email);
$consulta->bindParam(':id_usuario', $id_usuario);
$result = $consulta->execute();

// numero de linhas da consulta
$numero_linhas = $consulta->rowCount();

// confere se ja existe um email cadastrado
if($numero_linhas != 0){
    //header("Location: ../exibirMensagem.php?mensagem=CadUsu-email-igual&pagina=visualizarUsuario&tipo=danger");
    echo "email_igual";
    exit;
}

// criptografa a senha
$senha_criptografada = md5($senha);

// sql com os nomes identicos do banco de dados
$sql    = "UPDATE usuarios SET email = :email, senha = :senha, administrador = :administrador, data_cadastro = :data_cadastro WHERE id_usuario = :id_usuario";
$stmt   = $PDO->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':senha', $senha_criptografada);
$stmt->bindParam(':administrador', $administrador);
$stmt->bindParam(':data_cadastro', $data_atual);
$stmt->bindParam(':id_usuario', $id_usuario);
$result = $stmt->execute();

// checa se foi realizada a operacao com o banco de dados
if(!$result){
    //header("Location: ../exibirMensagem.php?mensagem=erro-sql&pagina=visualizarUsuario&tipo=danger");
    echo "erro_sql";
    exit;
}else{
	//header("Location: ../exibirMensagem.php?mensagem=ok-editarUsuario&pagina=visualizarUsuario&tipo=success");
    echo "ok";
    exit;
}


?>