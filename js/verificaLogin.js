$(document).ready(function() {

    // focus no campo e-mail
    $("#email").focus();

    // inicia o evento de click do botão btn-enviar
    $('#btn-enviar').click(function() {

        $.post("include/ajax/verificaLogin.php", { 
    
            email: $("#email").val(),
            senha: $("#senha").val()

        },
                            
        function(data) {
            
            if(data == "erro"){  

                Swal.fire({
                    title: 'Erro!',
                    text: 'Login ou Senha incorretos',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                    // timer: 2000
                })

            }else if(data == "ok"){
            
                Swal.fire({
                    title: 'Sucesso!',
                    text: 'Login efetuado com sucesso. Aguarde...',
                    icon: 'success',
                    showConfirmButton: false,
                });

                setTimeout(function(){
                    window.location = 'area-administrativa.php';
                }, 2000);
            
            }
        
        })
    
    });

});