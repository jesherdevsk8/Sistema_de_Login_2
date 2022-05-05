<?php

// definição de timezone
date_default_timezone_set('America/Sao_Paulo');

// pegar variavel de mensagem
$mensagem   = $_GET['mensagem'];
$pagina     = $_GET['pagina'];
$tipo       = $_GET['tipo'];

if($mensagem == "ok-cadastrarUsuario"){
  $msg = "Usuário cadastrado com sucesso!";
}else if($mensagem == "area-admin"){
  $msg = "Login ou senha incorretos!";
}else if($mensagem == "senhas-diferentes"){
  $msg = "Senhas diferentes!";
}else if($mensagem == "erro-sql"){
  $msg = "Ocorreu um erro na operação com o banco de dados!";
}else if($mensagem == "CadUsu-email-igual"){
  $msg = "E-mail já cadastrado!";
}else if($mensagem == "CadUsu-senha-branco"){
  $msg = "Senha em branco!";
}else if($mensagem == "CadUsu-email-branco"){
  $msg = "E-mail em branco!";
}else if($mensagem == "ok-deletarUsuario"){
  $msg = "Usuário deletado com sucesso!";
}else if($mensagem == "ok-editarUsuario"){
  $msg = "Usuário alterado com sucesso!";
}

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <?php include('include/header.php'); ?>
    <title>Mensagem!</title>
  </head>
  <body>
    
    <div class="container-fluid">
            
        <!-- Login não realizado -->
        <?php include('include/exibirMensagem.php'); ?>

        <?php include('include/footer.php'); ?>

    </div>
    
    <!-- Scripts JS -->
    <?php include('include/scripts.php'); ?>
  </body>
</html>