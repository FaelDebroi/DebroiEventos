<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco ="debroieventos";
    $conecta = mysqli_connect($servidor,$usuario,$senha,$banco);

    if(mysqli_connect_errno()){
    die("Conexao falhou" . mysqli_connect_errno());
    }


    //verificacao de usuario atual 
    if(!empty($_SESSION["user_portal"])){
        $user  = "select * from usuario c where c.IdCliente ='{$_SESSION["user_portal"]}'";
        $acesso = mysqli_query($conecta, $user);

        if(!$acesso){
            die("falha na consulta ao banco");
        }

        $informacaoUser = mysqli_fetch_assoc($acesso);
    }else{
        $informacaoUser = "";
    }

?>