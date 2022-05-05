$(document).ready(function() {

    // focus no campo e-mail
    $("#nome").focus();

    // inicia o evento de click do botão btn-enviar
    $('#btn-editar-cliente').click(function() {

        $.post("include/ajax/editarCliente.php", {

            nome: $("#nome").val(),
            logradouro: $("#logradouro").val(),
            numero: $("#numero").val(),
            cep: $("#cep").val(),
            cidade: $("#cidade").val(),
            bairro: $("#bairro").val(),
            telefone: $("#telefone").val(),
            estado: $("#estado").val(),
            id_cliente: $("#id_cliente").val()
        },

        function(data) {

            if(data == "nome_branco"){

                Swal.fire({
                    title: 'Erro!',
                    text: 'Nome em branco',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                    // timer: 2000
                })

            }else if(data == "logradouro_branco"){

                Swal.fire({
                    title: 'Erro!',
                    text: 'Logradouro em branco',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                    // timer: 2000
                })

            }else if(data == "numero_branco"){

                Swal.fire({
                    title: 'Erro!',
                    text: 'As senhas não conferem',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                    // timer: 2000
                })

            }else if(data == "cep_branco"){

                Swal.fire({
                    title: 'Erro!',
                    text: 'CEP em branco',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                    // timer: 2000
                })

            }else if(data == "cidade_branco"){

                Swal.fire({
                    title: 'Erro!',
                    text: 'Cidade em branco',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                    // timer: 2000
                })

            }else if(data == "bairro_branco"){

                Swal.fire({
                    title: 'Erro!',
                    text: 'bairro em branco',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                    // timer: 2000
                })

            }else if(data == "telefone_branco"){

                Swal.fire({
                    title: 'Erro!',
                    text: 'Telefone em branco',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                    // timer: 2000
                })

            }else if(data == "estado_branco"){

                Swal.fire({
                    title: 'Erro!',
                    text: 'Estado em branco',
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
                    text: 'Usuário editado com sucesso. Aguarde...',
                    icon: 'success',
                    showConfirmButton: false,
                });

                setTimeout(function(){
                    window.location = 'visualizarCliente.php';
                }, 3000);

            }

        })

    });

});