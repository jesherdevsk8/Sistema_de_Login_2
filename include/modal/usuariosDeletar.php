<?php

// iniciar sessao
session_start();

// importa bibliotecas de seguranca
include('../../lib/seguranca.php');

// funcao que protege o login
protegeLogin();

// importa o arquivo de conexao com o banco de dados
include('../../config/config.php');

// definição de timezone
date_default_timezone_set('America/Sao_Paulo');

$email          = $_SESSION['email'];
$administrador  = $_SESSION['administrador'];

$ids_string     = $_GET['ids'];

// Grava ids dos usuarios selecionados em um array
$ids        = preg_split('@,@', $ids_string, NULL, PREG_SPLIT_NO_EMPTY);
$qtd_ids    = count($ids);

?>
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">
      <span aria-hidden="true">&times;</span>
      <span class="sr-only">Fechar</span>
    </button>
    <h4 class="modal-title"><strong>Deletar Usuários</strong></h4>
  </div>
  <div class="modal-body">

    <?php if($qtd_ids == 0): ?>
        
      <p>Nenhum usuário selecionado!</p>
   
    <?php else: ?>

        <p>Você tem certeza que deseja <strong>deletar</strong> estes usuários?</p>

        <div class="table-responsive">
          <table id="tbl_visualizar" class="table table-condensed table-hover">
            <tbody>

        <?php

              foreach ($ids as $value){
                
                $sql = "SELECT * FROM usuarios WHERE id_usuario = :value";
                $consulta = $PDO->prepare($sql);
                $consulta->bindParam(':value', $value);
                $result = $consulta->execute();
                $rows = $consulta->fetch(PDO::FETCH_ASSOC);
                $email = $rows['email'];

        ?>
              <tr>
                <td><strong><?= $email ?></strong></td>
              </tr>

        <?php

          }

        ?>
            </tbody>
          </table>
        </div>
        
    
    <?php endif ?>

    <br />
      
    <input type="hidden" id="ids" name="ids" value="<?= $ids_string; ?>" />

    <div class="modal-footer">
    
        <?php if($qtd_ids == 0): ?>
      
            <button type="button" class="btn btn-danger" name="btn-enviar" id="btn-enviar" disabled="">Deletar</button>
    
        <?php else: ?>
        
            <button type="button" class="btn btn-danger" name="btn-enviar" id="btn-enviar">Deletar</button>
    
        <?php endif ?>
        
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
    </div>
</div>
<script>
    $(document).ready(function() {

      $('#btn-enviar').click(function() {

        $.post("include/ajax/usuariosDeletar", { 

          ids: $("#ids").val()

        },
                                  
        function(data) {
                  
          if(data == "erro_sql"){  

            Swal.fire({
              title: 'Erro!',
              text: 'Ocorreu um erro no banco de dados',
              icon: 'error',
              confirmButtonText: 'Ok'
            })
                          
          }else if(data == "ok"){
                          
            Swal.fire({
              title: 'Sucesso!',
              text: 'Usuário(s) deletado(s) com sucesso. Aguarde...',
              icon: 'success',
              showConfirmButton: false,
            });

            setTimeout(function(){
              window.location = 'visualizarUsuario.php';
            }, 4500);

          }

        })

      });
    });
</script>
<?php //include('../requisicoes/req-parceiros_deletar.php'); ?>