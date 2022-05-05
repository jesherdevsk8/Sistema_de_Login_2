<?php

// inicia a sessao
session_start();

// checa se a sessao existe e se o usuario esta logado
if( (isset($_SESSION['login'])) && ($_SESSION['login'] == true) ){
    // se logado, redireciona para area administrativa
    header("Location: area-administrativa.php");
}

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tela de Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/estilo.css">
    </head>
  <body>

    <!-- container-fluid -->
    <div class="container-fluid">

        <!-- row do formulario de login -->
        <div class="row formulario-login">
            <div class="col-md-offset-2 col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">Formulário de Login</div>
                    <div class="panel-body">
                        <!-- formulario -->
                        <form>
                            <div class="form-group">
                                <label>Endereço de e-mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Senha</label>
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Password">
                            </div>
                            <button type="button" class="btn btn-success" name="btn-enviar" id="btn-enviar">Enviar</button>
                        </form>
                        <!-- /formulario -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /row do formulario de login -->

    </div>
    <!-- /container-fluid -->

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- adiciona o sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- adiciona o arquivo js que fara o AJAX -->
    <script src="js/verificaLogin.js"></script>
</body>
</html>