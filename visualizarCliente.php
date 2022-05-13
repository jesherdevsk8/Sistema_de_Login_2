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
                <table id="tbl_visualizar" class="table table-condensed table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>id_cliente</th>
                            <th>Nome</th>
                            <th>Logradouro</th>
                            <th>Num</th>
                            <th>CEP</th>
                            <th>Cidade</th>
                            <th>Bairro</th>
                            <th>Telefone</th>
                            <th>Estado</th>
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
                                <tr id="<?= $id_cliente ?>">
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
                                        <center>
                                            <a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Editar" href="editarCliente.php?id=<?= $id_cliente ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                        </center>
                                    </td>
                                </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                <a data-toggle="modal" data-target="#clientes_deletar" class="btn btn-danger" id="deletar_clientes">
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
            $('#deletar_clientes').click(function () {

                var values = $('.danger').map(function () {
                    return this.id;
                }).get();

                $(this).attr("href", 'include/modal/clientesDeletar.php?ids=' + values);

            });
        
            // limpa o cache do script
            $("#clientes_deletar").on('hidden.bs.modal', function () {
                $(this).data('bs.modal', null);
            });

        });
    </script>
  </body>
</html>
<div id="clientes_deletar" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

        </div>
    </div>
</div>