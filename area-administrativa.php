<?php

// iniciar sessao
session_start();

include('lib/seguranca.php');

// funcao que protege o login
protegeLogin();

// definição de timezone
date_default_timezone_set('America/Sao_Paulo');

$email          = $_SESSION['email'];
$administrador  = $_SESSION['administrador'];

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <?php include('include/header.php'); ?>
    <title>Área Administrativa</title>
  </head>
  <body>
    
    <div class="container-fluid">
            
        <!-- Login realizado corretamente -->
        <?php include('include/area-administrativa.php'); ?>        

        <?php include('include/footer.php'); ?>

    </div>
    
    <!-- Scripts JS -->
    <?php include('include/scripts.php'); ?>
  </body>
</html>