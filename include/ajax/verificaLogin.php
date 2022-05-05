<?php

// iniciar sessao
session_start();

// importa o arquivo de configuracao do banco de dados
include('../../config/config.php');

// recebendo dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// criptografa a senha
$senha_criptografada = md5($senha);

// query de consulta
$sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
$consulta = $PDO->prepare($sql);
$consulta->bindParam(':email', $email);
$consulta->bindParam(':senha', $senha_criptografada);
$result = $consulta->execute();

// numero de linhas da consulta
$numero_linhas = $consulta->rowCount();

if($numero_linhas == 0){

     // redirecionar para a pagina de erro
    //  header("Location: ../exibirMensagem.php?mensagem=area-admin&pagina=index&tipo=danger");
    echo "erro";
    exit;

}else{

    // varre os registros encontrados no banco de dados
    while($rows = $consulta->fetch(PDO::FETCH_ASSOC)){
        
        // guardar variaveis de sessao direto do banco de dados
        $_SESSION['email']          = $rows['email'];
        $_SESSION['administrador']  = $rows['administrador'];
        $_SESSION['login']          = true;
        
        // redirecionar para area administrativa
        // header("Location: ../area-administrativa.php");
        echo "ok";
        exit;
    }

}

?>