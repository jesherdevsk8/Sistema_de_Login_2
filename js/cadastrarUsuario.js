$(document).ready(function() {

    // focus no campo e-mail
    $("#email").focus();

    // inicia o evento de click do botão btn-enviar
    $('#btn-enviar').click(function() {

        $.post("include/ajax/cadastrarUsuario.php", { 
    
            email: $("#email").val(),
            senha: $("#senha").val(),
            conf_senha: $("#conf_senha").val(),
            administrador: $("#administrador").val()

        },
                            
        function(data) {
            
            if(data == "email_branco"){  

                Swal.fire({
                    title: 'Erro!',
                    text: 'E-mail em branco',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                    // timer: 2000
                })
            
            }else if(data == "senha_branco"){  

                Swal.fire({
                    title: 'Erro!',
                    text: 'Senha em branco',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                    // timer: 2000
                })
    
            }else if(data == "senha_diferente"){  

                Swal.fire({
                    title: 'Erro!',
                    text: 'As senhas não conferem',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                    // timer: 2000
                })
            
            }else if(data == "email_igual"){  

                Swal.fire({
                    title: 'Erro!',
                    text: 'E-mail já cadastrado',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                    // timer: 2000
                })

            }else if(data == "erro_sql"){  

                Swal.fire({
                    title: 'Erro!',
                    text: 'Ocorreu um erro no banco de dados',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                    // timer: 2000
                })
              
            }else if(data == "ok"){
            
                Swal.fire({
                    title: 'Sucesso!',
                    text: 'Usuário cadastrado com sucesso. Aguarde...',
                    icon: 'success',
                    showConfirmButton: false,
                });

                setTimeout(function(){
                    window.location = 'cadastrarUsuario.php';
                }, 3000);
            
            }
        
        })
    
    });

});