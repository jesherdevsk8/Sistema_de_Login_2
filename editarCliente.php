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
$id_cliente = $_GET['id'];

// query de consulta
$sql = "SELECT * FROM clientes WHERE id_cliente = :id_cliente";
$consulta = $PDO->prepare($sql);
$consulta->bindParam(':id_cliente', $id_cliente);
$result = $consulta->execute();
$rows = $consulta->fetch(PDO::FETCH_ASSOC);

// query preenchendo os input
$nome           = $rows['nome'];
$logradouro     = $rows['logradouro'];
$numero         = $rows['numero'];
$cep            = $rows['cep'];
$cidade         = $rows['cidade'];
$bairro         = $rows['bairro'];
$telefone       = $rows['telefone'];
$estado         = $rows['estado'];


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
            <div class="col-md-offset-4 col-md-4 col-xs-offset-2 col-xs-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">Editar Cliente</div>
                    <div class="panel-body">
                        <!-- formulario -->
                        <form>
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="nome" value="<?= $nome ?>">
                            </div>
                            <div class="form-group">
                                <label>Logradouro</label>
                                <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="logradouro" value="<?= $logradouro ?>">
                            </div>
                            <div class="form-group">
                                <label>Número</label>
                                <input type="text" class="form-control" id="numero" name="numero" placeholder="numero" value="<?= $numero ?>">
                            </div>
                            <div class="form-group">
                                <label>CEP</label>
                                <input type="text" class="form-control" id="cep" name="cep" placeholder="cep" value="<?= $cep ?>">
                            </div>
                            <div class="form-group">
                                <label>Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="cidade" value="<?= $cidade ?>">
                            </div>
                            <div class="form-group">
                                <label>Bairro</label>
                                <input type="text" class="form-control" id="bairro" name="bairro" placeholder="bairro" value="<?= $bairro ?>">
                            </div>
                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="telefone" value="<?= $telefone ?>">
                            </div>
                            <div class="form-group">
                                <label>Estado</label>
                                <select class="form-control" name="estado" id="estado" value="<?= $estado ?>">>
                                  <option value="Sao Paulo">Sao Paulo</option>
                                  <option value="Rio de Janeiro">Rio de Janeiro</option>
                                </select>
                            </div>
                            <input type="hidden" id="id_cliente" name="id_cliente" value="<?= $id_cliente ?>">                            
                            <button type="button" class="btn btn-success" id="btn-editar-cliente" name="btn-editar-cliente">Editar</button>
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
    <script src="js/editarCliente.js"></script>
  </body>
</html>