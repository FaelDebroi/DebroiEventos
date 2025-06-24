<?php

   include('conexao.php');

    if (isset($_GET['codigo'])) {
    
    $codigo = $_GET['codigo']; // codigo do link



    $Chacara_consulta = "SELECT  c.IdChacaras ,e.rua, e.bairro, e.cidade, es.Estados, ic.Banheiro, c.LocalizacaoUrlMaps, c.Nome, ic.Wifi, ic.piscina, ic.estacionamento, ic.valor, mg.caminho,ic.valor,ic.qtdMaxConvidados, ic.qtdMinConvidados,c.descricao
                    FROM endereco e
                    left JOIN chacaras c ON e.IdEndereco = c.IdEndereco
                    left JOIN estado es ON es.IdEstado = e.Estado_Id
                    left JOIN infochacaras ic ON ic.IdInfoChacaras = c.IdInfoChacaras
                    left JOIN imgchacaras mg ON mg.IdChacara = c.IdChacaras
                    WHERE c.IdChacaras = '$codigo'";

     $ChacaraImg_consulta = "SELECT img.caminho ,img.IdChacara
	                  FROM imgchacaras img 
                    WHERE img.IdChacara = '$codigo'"; 
    
    
     $ChacaraImg_result = mysqli_query($conecta, $ChacaraImg_consulta);

    // Cria o array
    $imagens = [];

      // Percorre os resultados e adiciona no array
    while ($linha = mysqli_fetch_assoc($ChacaraImg_result)) {
      $imagens[] = $linha;  // Cada linha é um array associativo: ['caminho' => ..., 'IdChacara' => ...]
    }

    $Chacara = mysqli_query($conecta, $Chacara_consulta);


    if(!$Chacara){
        die("falha na consulta ao banco de dados");
    }

    $Chacara_dados = mysqli_fetch_assoc($Chacara);
    
    } else {
        echo "Código não informado.";
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $Chacara_dados["Nome"]?></title>
    <link rel="stylesheet" href="../css/infoChacaras.css" />
</head>

<body>
    <header class="menu-fixo">
        <?php include 'menuBarra.php'; ?>
    </header>

    <main class="container">
        <h1><?php echo $Chacara_dados["Nome"]?></h1>
        <hr>
        <div class="gallery">
            <div class="imgGrande">
                <img src="<?php echo $Chacara_dados["caminho"]?>" alt="Foto principal">
            </div>
            <div class="imgPequena">
                <img src="<?php echo $imagens[0]['caminho']; ?>" alt="Foto extra 1">
                <img src="<?php echo $imagens[1]['caminho']; ?>" alt="Foto extra 2">
                <img src="<?php echo $imagens[2]['caminho']; ?>" alt="Foto extra 3">
                <img src="<?php echo $imagens[3]['caminho']; ?>" alt="Foto extra 4">
            </div>
        </div>

        <div class="buttons">
            <button class="visit">Agendar Visita</button>
            <button class="budget">Solicitar Orçamento</button>
        </div>

        <section class="info">
            <h2>Dados de interesse:</h2>
            <p>📍 Endereço:
                <?php echo $Chacara_dados["rua"] . ", " . $Chacara_dados["bairro"] ." | ".$Chacara_dados["cidade"] . " - " . $Chacara_dados["Estados"];?>
            </p>
            <ul class="features">
                <li>💰
                    <?php 
                    if (!empty($Chacara_dados["valor"])) {
                      echo $Chacara_dados["valor"];
                    } else {
                      echo "Valor A Definir";
                    }
                ?>
                </li>
                <li>🅿️ <?php 
                    if (!empty($Chacara_dados["estacionamento"])) {
                      echo "Possui ".$Chacara_dados["estacionamento"]." Vagas no local";
                    } else {
                      echo "Não possui estacionamento";
                    }
                ?></li>
                <li>👥 <?php 
                    if (!empty($Chacara_dados["estacionamento"])) {
                      echo "Acomoda ".$Chacara_dados["qtdMinConvidados"]." a ". $Chacara_dados["qtdMaxConvidados"]." convidados";
                    } else {
                      echo "Não Informado";
                    }
                ?></li>
                <li>📶
                    <?php 
                    if ($Chacara_dados["Wifi"] == 1) {
                      echo "Wifi no local";
                    } else {
                      echo "Não possui Wifi no local";
                    }
                    ?>
                </li>
                <li>🏊
                    <?php 
                    if ($Chacara_dados["piscina"] == 1) {
                      echo "Piscina no local";
                    } else {
                      echo "Não possui Piscina no local";
                    }
                    ?>
                </li>
                <li>🚻
                    <?php 
                    if ($Chacara_dados["Banheiro"] > 1) {
                      echo $Chacara_dados["Banheiro"]." banheiros no local";
                    } else {
                      echo "Não possui Banheiro no local";
                    }
                    ?>
                </li>
            </ul>

        </section>

        <section class="owner">
            <img src="../img/Chacarasimg/donaflor.jpeg" alt="Sandra Debroi">
            <div>
                <strong>Proprietária: Sandra Debroi</strong><br />
                +20 anos no mercado
            </div>
        </section>

        <section class="description">
            <h2>Informação:</h2>
            <p>
                <?php 
                    if (!empty($Chacara_dados["descricao"])) {
                      echo $Chacara_dados["descricao"];
                    } else {
                      echo "Não possui descricao ate o momento";
                    }
                    ?>
            </p>
        </section>
        <div class="mapa-container">

            <iframe src="<?php echo $Chacara_dados["LocalizacaoUrlMaps"]; ?>" width="100%" height="450"
                style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        <footer>
            <a href="#"><img src="https://img.icons8.com/color/48/internet--v1.png" /></a>
            <a href="#"><img src="https://img.icons8.com/fluency/48/instagram-new.png" /></a>
            <a href="#"><img src="https://img.icons8.com/fluency/48/facebook-new.png" /></a>
            <a href="https://w.app/debroieventos"><img src="https://img.icons8.com/color/48/whatsapp.png" /></a>
        </footer>
    </main>
</body>

</html>