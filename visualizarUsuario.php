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
    <title>Visualizar de Usuário</title>
  </head>
  <body>
    
    <div class="container-fluid">

        <?php include('include/navbar.php'); ?>

        <!-- row do formulario de login -->
        <div class="row formulario-login">
            <div class="col-md-offset-2 col-md-8">
                <h2>Visualizar Usuários</h2>
                <br>
                <table class="table table-condensed table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>E-mail</th>
                            <th>Administrador</th>
                            <th>Dt. Cadastro</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            
                            $sql = "SELECT * FROM usuarios";
                            $consulta = $PDO->prepare($sql);
                            $result = $consulta->execute();
                    
                            while($rows = $consulta->fetch(PDO::FETCH_ASSOC)){
                    
                                $id_usuario     = $rows['id_usuario'];
                                $email          = $rows['email'];
                                $administrador  = $rows['administrador'];
                                $data_cadastro  = $rows['data_cadastro'];

                                if($administrador == "s"){
                                    $administrador_format = "Sim";
                                }else if($administrador == "n"){
                                    $administrador_format = "Não";
                                }

                                $data_cadastro_explode = explode("-", $data_cadastro);
                                $dia = $data_cadastro_explode[2];
                                $mes = $data_cadastro_explode[1];
                                $ano = $data_cadastro_explode[0];

                                $data_cadastro_format = $dia . '/' . $mes . '/' . $ano;

                        ?>
                                <tr>
                                    <td><?= $id_usuario ?></td>
                                    <td><?= $email ?></td>
                                    <td><?= $administrador_format ?></td>
                                    <td><?= $data_cadastro_format ?></td>
                                    <td>
                                        <a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Editar" href="editarUsuario.php?id=<?= $id_usuario ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                        <a class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Deletar" href="include/deletarUsuario.php?id=<?= $id_usuario ?>"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span></a>
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
    <script src="js/cadastrarCliente.js"></script>
  </body>
</html>