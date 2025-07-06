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
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento</title>
    <link rel="stylesheet" href="../css/Gerenciamento.css">

</head>

<body>
    <header class="menu-fixo">
        <?php include 'menuBarra.php'; ?>
    </header>
    <!-- Criacao de gerenciamento do admin-->
    <br><br><br><br>
    <h1>Gerenciamento do Admin</h1>


    <div class="admin-links">
        <a href="CriacaoChacaras.php">Criação de Chácara</a>
        <a href="alterar_chacara.php">Alteração de Chácara</a>
        <a href="CriacaoUsuario.php">Criação de Usuário</a>
        <a href="clientes.php">Visualizar todos os clientes</a>
        <a href="agendamentos.php">Agendamentos e contatos enviados</a>
    </div>


</body>

</html>