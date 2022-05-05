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
    <title>Cadastro de Usuário</title>
  </head>
  <body>
    
    <div class="container-fluid">

        <?php include('include/navbar.php'); ?>

        <!-- row do formulario de login -->
        <div class="row formulario-login">
            <div class="col-md-offset-2 col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">Cadastrar Usuário</div>
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
                            <div class="form-group">
                                <label>Confirmar Senha</label>
                                <input type="password" class="form-control" id="conf_senha" name="conf_senha" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label>Administrador</label>
                                <select class="form-control" name="administrador" id="administrador">
                                  <option value="n">Não</option>
                                  <option value="s">Sim</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-success" name="btn-enviar" id="btn-enviar">Cadastrar</button>
                        </form>
                        <!-- /formulario -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /row do formulario de login -->
    
        <?php include('include/footer.php'); ?>

    </div>

    <!-- Scripts JS -->
    <?php include('include/scripts.php'); ?>
    <script src="js/cadastrarUsuario.js"></script>
  </body>
</html>