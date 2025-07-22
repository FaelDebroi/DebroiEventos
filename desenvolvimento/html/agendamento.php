<!-- Verificacao de Agendamentos se esta logado -->
<?php  
    include('conexao.php');
    session_start();
?>

<?php
   
    if (!isset($_SESSION["user_portal"])){
        header("Location: login.php");
        exit;
    }
 
    $codigo = $_GET['codigo']; 

    // consultas 
    $usuario_id = $_SESSION["user_portal"];
    $ClienteSQl = "select * from usuario c where c.IdCliente = '$usuario_id'";
    $ClienteConsulta = mysqli_query($conecta, $ClienteSQl);
    $Cliente = mysqli_fetch_assoc($ClienteConsulta);

    $ChacarasSql = "Select * From Chacaras c where c.Idchacaras ='$codigo'";
    $ChacarasConsulta = mysqli_query($conecta, $ChacarasSql);
    
   

    if(!$ChacarasConsulta && !$ClienteConsulta){
        die("falha na consulta ao banco de dados");
    }

    // insercao no banco
    
if (isset($_POST["email"],$_POST["telefone"],$_POST["data"],
    $_POST["time"],$_POST["Mensagem"])) {
    
    $data = $_POST["data"];
    $hora = $_POST["time"];
    $mensagem = $_POST["Mensagem"];

    $inserirSql = "INSERT INTO AgendamentoVisita (IdCliente, Data, Hora, IdChacara, ConfirmacaoAgendamento, Mensagem)
                        VALUES ('$usuario_id', '$data', '$hora', $codigo, 0, '$mensagem');";
    $operacao_inserir = mysqli_query($conecta, $inserirSql);

    if(!$operacao_inserir){
        die("Falha na inserçao");
    }else{
        header("location:InfoChacaras.php?codigo=$codigo");
    }

}
    
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento - Debroi Eventos</title>
    <link rel="stylesheet" href="../css/agendamento.css">
</head>

<body>
    <header>
        <?php include 'menuBarra.php'; ?>
    </header>
    <div class="background">
        <div class="form-container">
            <h2>Agendamento de visitas</h2>
            <form id="agendamento-form" method="post" action="">

                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>

                <label for="telefone">Telefone:</label>
                <input type="tel" id="telefone" name="telefone" placeholder="Digite seu telefone" required>

                <label for="data">Data:</label>
                <input type="date" id="data" name="data" required>

                <label for="horario">Horário:</label>
                <input type="time" id="time" name="time" required>

                <label for="mensagem">Mensagem:</label>
                <textarea id="mensagem" name="Mensagem" rows="4" placeholder="Digite sua mensagem"></textarea>

                <button type="submit">Enviar</button>
            </form>

        </div>
    </div>
    <!-- <script src="../js/agendamento.js"></script> -->
</body>

</html>