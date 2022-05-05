<?php

// iniciar sessao
session_start();

include('lib/seguranca.php');

// importar o arquivo de conexao com o banco de dados
include('config/config.php');

// funcao que protege o login
protegeLogin();

// definição de timezone
date_default_timezone_set('America/Sao_Paulo');

$email          = $_SESSION['email'];
$administrador  = $_SESSION['administrador'];

// recebe o id do usuario que será deletado do banco de dados
$id_usuario = $_GET['id'];

// query de consulta
$sql = "SELECT * FROM usuarios WHERE id_usuario = :id_usuario";
$consulta = $PDO->prepare($sql);
$consulta->bindParam(':id_usuario', $id_usuario);
$result = $consulta->execute();
$rows = $consulta->fetch(PDO::FETCH_ASSOC);

$email          = $rows['email'];
$administrador  = $rows['administrador'];

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
                    <div class="panel-heading">Editar Usuário</div>
                    <div class="panel-body">
                        <!-- formulario -->
                        <form>
                            <div class="form-group">
                                <label>Endereço de e-mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $email ?>">
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
                                    <?php if($administrador == 's'): ?>
                                        <option value="n">Não</option>
                                        <option value="s" selected="">Sim</option>
                                    <?php elseif($administrador == 'n'): ?>
                                        <option value="n" selected="">Não</option>
                                        <option value="s">Sim</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <input type="hidden" id="id_usuario" name="id_usuario" value="<?= $id_usuario ?>">
                            <button type="button" class="btn btn-success" id="btn-enviar" name="btn-enviar">Editar</button>
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
    <script src="js/editarUsuario.js"></script>
  </body>
</html>