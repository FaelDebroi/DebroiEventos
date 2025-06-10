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
        $contador = 1;
         while($contador <= 18){
          $contador++;
         ?>
             
        <div class="chacara">
            <div class="imgChacara">
                <img href="#" src="../img/chacaraprimaveira.jpg" class="imagemlogo">
            </div>
            <div class="divTextoChacara">
                <h1>Chácara Fortaleza Valinhos</h1>
                <div class="chacaraObservacoes">
                    <p><Strong>Localizacao:</Strong>"nova europa</p>
                    <p><strong>Atrativos:</strong> Piscina, Salão Coberto, Estacionamento.</p>
                    <p><strong>Valor:</strong>1500</p>
                </div>
            </div>
            <div class="divbtnChacara">
                <button class="btnSobre" id="idSobre">Sobre</button>
                <button class="btnChacara" id="Agendar visita">Agendar Visita</button>
            </div>
        </div>
        <?php }  ?>

    </div>

    <!-- Custom JS -->
    <script src="../js/chacaras.js"></script>

</body>

</html>