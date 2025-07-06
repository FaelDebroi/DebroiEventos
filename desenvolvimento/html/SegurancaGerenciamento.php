<?php
  session_start();
    include('conexao.php');
    
if (
    isset($_SESSION["user_portal"]) && // Verifica se a sessão do usuário existe
    isset($informacaoUser["Admin"]) && // Verifica se a informação do usuário está carregada
    $informacaoUser["Admin"] == 1      // Verifica se o usuário é admin
) {
    // Acesso liberado -admim
} else {
    if(isset($_SESSION["user_portal"]) && $informacaoUser["Admin"] == 0){
        // usuario logado mas sem acesso
        header("Location: index.php");
        exit;
    }else{
        //  Acesso negado- sem usuario logado
        header("Location: logout.php");
        exit;
    }
}?>