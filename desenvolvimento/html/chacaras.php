<?php
    $servidor = "localhost";
    $usuario  = "root";
    $senha    = "";
    $banco    ="debroieventos";
    $conecta  = mysqli_connect($servidor,$usuario,$senha,$banco);

    if(mysqli_connect_errno()){
        die("Conexao falhou" . mysqli_connect_errno());
    }

    $Chacara_consulta = "SELECT  c.IdChacaras ,e.rua, e.bairro, e.cidade, es.Estados, c.Nome, ic.Wifi, ic.piscina,ic.estacionamento, ic.valor, mg.caminho
                        FROM endereco e
                        INNER JOIN chacaras c ON e.IdEndereco = c.IdEndereco
                        INNER JOIN estado es ON es.IdEstado = e.Estado_Id
                        INNER JOIN infochacaras ic ON ic.IdInfoChacaras = c.IdInfoChacaras
                        INNER JOIN imgchacaras mg ON mg.IdChacara= c.IdChacaras;";

    $Chacara = mysqli_query($conecta,$Chacara_consulta);

    if(!$Chacara){
        die("falha na consulta ao banco de dados");
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Fixo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="../css/chacaras.css">

</head>

<body>
    <header class="menu-fixo">
        <img href="#" src="../img/logoDebroi.png" class="imagemlogo">
        <nav class="menu-links">
            <a href="index.php"><b>Home</b></a>
            <a href="sobre.php"><b>Sobre</b></a>
            <a href="chacaras.php"><b>Chácaras</b></a>
            <a href="servicos.php"><b>Serviços</b></a>
            <a href="contato.php"><b>Contato</b></a>
            <a href="login.php"><b>Login</b></a>
        </nav>
    </header>



    <div class="container">
        <?php 
         while($Linha = mysqli_fetch_assoc($Chacara)){


            
            //atrativos
           $atrativos = [];

if ($Linha["Wifi"] == 1) {
    $atrativos[] = "Wifi";
}

if ($Linha["piscina"] == 1) {
    $atrativos[] = "Piscina";
}


// Junta todos os atrativos separados por vírgula
$Atrativos = implode(", ", $atrativos);

          
         ?>

        <div class="chacara">

            <div class="imgChacara">
                <img href="#" src="<?php echo $Linha["caminho"]?>" class="imagemlogo">
            </div>
            <div class="divTextoChacara">
                <h1><?php echo "Chácara: " . $Linha["Nome"] ?></h1>
                <div class="chacaraObservacoes">
                    <ul>
                        <li><Strong>Localizacao:</Strong><?php echo $Linha["rua"].",",$Linha["bairro"] 
                        ."<br> ",$Linha["cidade"] ."-",$Linha["Estados"]?>
                        </li>
                        <li><Strong>Atrativos: </Strong><?php echo $Atrativos ?></li>
                        <li><Strong>Valor: </Strong><?php echo $Linha["valor"]?></li>
                    </ul>

                </div>
            </div>
            <div class="divbtnChacara">
                <a href="InfoChacaras.php?codigo=<?php echo $Linha["IdChacaras"]?>">
                    <button class="btnSobre" id="idSobre">Sobre</button>
                </a>
                <button class="btnChacara" id="Agendar visita">Agendar Visita</button>
            </div>

        </div>
        <?php }  ?>

    </div>

    <!-- Custom JS -->
    <script src="../js/chacaras.js"></script>

</body>

</html>

<?php
    mysqli_close($conecta);
    ?>