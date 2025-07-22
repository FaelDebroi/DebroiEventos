<?php  
    include('conexao.php');
    session_start();
?>

<?php

    $usuario_id = $_SESSION["user_portal"];
    $AgendamentoSQl = " SELECT   c.Nome AS NomeUsuario, 
                        ch.Nome AS NomeChacara,
                        a.Data,
                        a.Hora, 
                        e.cep,
                        e.rua,
                        e.bairro,
                        e.cidade,
                        e.numero,
                        es.Estados
                        FROM usuario c
                        inner JOIN agendamentovisita a ON a.IdCliente = c.IdCliente
                        inner JOIN chacaras ch ON ch.IdChacaras = a.IdChacara
                        inner JOIN endereco e ON e.IdEndereco = ch.IdEndereco
                        INNER JOIN estado es ON es.IdEstado = e.Estado_Id 
                        where c.IdCliente = '$usuario_id';";
    
    $agendamentoConsulta = mysqli_query($conecta, $AgendamentoSQl);


    
    if(! $agendamentoConsulta){
        die("Não foi possivel visualizar os agendamentos");
    }

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Candidaturas</title>
    <link rel="stylesheet" href="../css/visitasCliente.css">
</head>

<body>
    <header class="menu-fixo">
        <?php include 'menuBarra.php'; ?>
    </header>

    <main class="lista-container">
        <ul class="lista-chacaras">

            <?php  

            if(!mysqli_num_rows($agendamentoConsulta) > 0){
                ?><h2 class="mensagem-erro"><strong>Você não tem visita!!</strong></h2><?php
            }
                while($agendamentoSolto = mysqli_fetch_assoc($agendamentoConsulta)){
                    
                   
            ?>
            <li class="chacara-item">
                <div class="info-principal">
                    <h2><strong>Nome do contratante: <?php echo $agendamentoSolto["NomeUsuario"]; ?></strong></h2>
                    <h2><strong>Nome do Espaco: <?php echo $agendamentoSolto["NomeChacara"]; ?></strong></h2>
                    <br>
                    <span class="data"><strong>Visita: <?php echo $agendamentoSolto["Data"]; ?></strong></span><br>
                    <span class="Horario"><strong>Horario: <?php echo $agendamentoSolto["Hora"]; ?></strong></span>
                </div>
                <p><strong>Localização:</strong>
                    <?php echo $agendamentoSolto["rua"] . ", " . $agendamentoSolto["bairro"] ." | ".$agendamentoSolto["cidade"] . " - " .$agendamentoSolto["Estados"];?>
                </p>
                <a href="#" class="botao">Cancelar</a>
            </li>
            <?php
            }
            ?>


        </ul>
    </main>
</body>

</html>