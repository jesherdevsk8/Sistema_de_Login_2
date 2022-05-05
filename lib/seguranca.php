<?php

// funcao que verifica se o usuario esta logado
function protegeLogin(){

    if($_SESSION['login'] == false){
        header("Location: index.php");
    }

}

?>