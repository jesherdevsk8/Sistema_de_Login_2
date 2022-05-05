$(document).ready(function() {

    // focus no campo e-mail
    $("#nome").focus();

    // inicia o evento de click do botão btn-enviar
    $('#btn-enviar-cliente').click(function() {

        $.post("include/ajax/cadastrarCliente.php", {
    
            nome: $("#nome").val(),
            logradouro: $("#logradouro").val(),
            numero: $("#numero").val(),
            cep: $("#cep").val(),
            cidade: $("#cidade").val(),
            bairro: $("#bairro").val(),
            telefone: $("#telefone").val(),
            estado: $("#estado").val()

        },
                            
        function(data) {
            
            if(data == "nome_branco"){  

                Swal.fire({
                    title: 'Erro!',
                    text: 'Nome Não Pode ficar em Branco!',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                    // timer: 2000
                })
            
            }else if(data == "logradouro_branco"){  

                Swal.fire({
                    title: 'Erro!',
                    text: 'Logradouro em branco.',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                    // timer: 2000
                })
              
            }else if(data == "numero_branco"){  

                Swal.fire({
                    title: 'Erro!',
                    text: 'Ocorreu um erro Numero em branco',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                    // timer: 2000
                })
              
            }else if(data == "cep_branco"){  

                Swal.fire({
                    title: 'Erro!',
                    text: 'Ocorreu um erro CEP em branco',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                    // timer: 2000
                })
              
            }else if(data == "cidade_branco"){  

                Swal.fire({
                    title: 'Erro!',
                    text: 'Ocorreu um erro CIDADE em branco',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                    // timer: 2000
                })
              
            }else if(data == "bairro_branco"){  

                Swal.fire({
                    title: 'Erro!',
                    text: 'Ocorreu um erro Bairro em branco',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                    // timer: 2000
                })

            }else if(data == "telefone_branco"){  

                Swal.fire({
                    title: 'Erro!',
                    text: 'Ocorreu um erro TELEFONE em branco',
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
                    window.location = 'cadastrarCliente.php';
                }, 3000);
            
            }
        
        })
    
    });

});