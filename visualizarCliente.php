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

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <?php include('include/header.php'); ?>
    <title>Visualizar Clientes</title>
  </head>
  <body>
    
    <div class="container-fluid">

        <?php include('include/navbar.php'); ?>

        <!-- row do formulario de login -->
        <div class="row formulario-login">
            <div class="col-md-offset-2 col-md-8">
                <h2>Visualizar Clientes</h2>
                <br>
                <table class="table table-condensed table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>nome</th>
                            <th>logradouro</th>
                            <th>num</th>
                            <th>cep</th>
                            <th>cidade</th>
                            <th>bairro</th>
                            <th>telefone</th>
                            <th>estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            
                            $sql = "SELECT * FROM clientes";
                            $consulta = $PDO->prepare($sql);
                            $result = $consulta->execute();
                    
                            while($rows = $consulta->fetch(PDO::FETCH_ASSOC)){
                    
                                $id_cliente       = $rows['id_cliente'];
                                $nome             = $rows['nome'];
                                $logradouro       = $rows['logradouro'];
                                $numero           = $rows['numero'];
                                $cep              = $rows['cep'];
                                $cidade           = $rows['cidade'];
                                $bairro           = $rows['bairro'];
                                $telefone         = $rows['telefone'];
                                $estado           = $rows['estado'];


                        ?>
                                <tr>
                                    <td><?= $id_cliente ?></td>
                                    <td><?= $nome ?></td>
                                    <td><?= $logradouro ?></td>
                                    <td><?= $numero ?></td>
                                    <td><?= $cep ?></td>
                                    <td><?= $cidade ?></td>
                                    <td><?= $bairro ?></td>
                                    <td><?= $telefone ?></td>
                                    <td><?= $estado ?></td>
                                    <td>
                                        <a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Editar" href="editarCliente.php?id=<?= $id_cliente ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                        <a class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Deletar" href="include/deletarCliente.php?id=<?= $id_cliente ?>"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /row do formulario de login -->
    
        <?php include('include/footer.php'); ?>

    </div>

    <!-- Scripts JS -->
    <?php include('include/scripts.php'); ?>
    <script src="js/deletarCliente.js"></script>
  </body>
</html>