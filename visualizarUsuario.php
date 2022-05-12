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
                <table id="tbl_visualizar" class="table table-condensed table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>E-mail</th>
                            <th>Administrador</th>
                            <th>Dt. Cadastro</th>
                            <th><center>Opções</center></th>
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
                                <tr id="<?= $id_usuario ?>">
                                    <td><?= $id_usuario ?></td>
                                    <td><?= $email ?></td>
                                    <td><?= $administrador_format ?></td>
                                    <td><?= $data_cadastro_format ?></td>
                                    <td>
                                        <center>
                                            <a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Editar" href="editarUsuario.php?id=<?= $id_usuario ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                        </center>
                                    </td>
                                </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                <a data-toggle="modal" data-target="#usuarios_deletar" class="btn btn-danger" id="deletar_usuarios">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Deletar selecionados
                </a>
            </div>
        </div>
        <!-- /row do formulario de login -->
    
        <?php include('include/footer.php'); ?>

    </div>

    <!-- Scripts JS -->
    <?php include('include/scripts.php'); ?>
    <script>
        $(document).ready(function() {

            // carrega a datable
            $('#tbl_visualizar').DataTable({
                responsive: true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                }
            });

            // deletar

            // seleciona a linha da tabela ao clicar e deixa com a classe danger
            $('#tbl_visualizar tbody').on('click', 'tr', function () {
                $(this).toggleClass('danger');
            });

            // ao clicar no botao de deletar, o codigo guarda os ids que estão com a classe danger e enviar os ids para o modal
            $('#deletar_usuarios').click(function () {

                var values = $('.danger').map(function () {
                    return this.id;
                }).get();

                $(this).attr("href", 'include/modal/usuariosDeletar.php?ids=' + values);

            });
        
            // limpa o cache do script
            $("#usuarios_deletar").on('hidden.bs.modal', function () {
                $(this).data('bs.modal', null);
            });

        });
    </script>
  </body>
</html>
<div id="usuarios_deletar" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

        </div>
    </div>
</div>