<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/styles.css" defer>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>

<body>
    <header class="menu-fixo">
        <?php include 'menuBarra.php'; ?>
    </header>

    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="../img/Chacarasimg/fortaleza01.jpeg" alt="Paisagem bonita">
                <div class="texto-central">Bem Vindo<br>Debroi Eventos!</div>
            </div>
            <div class="swiper-slide"><img src="../img/florips.jpg" alt="Paisagem bonita">
                <div class="texto-central">Espaço <br>Dona Floripes </div>
            </div>
            <div class="swiper-slide"><img src="../img/recantodopirata.jpg" alt="Paisagem bonita">
                <div class="texto-central">Chácara <br>Recanto do Pirata</div>
            </div>
            <div class="swiper-slide"><img src="../img/primavera.jpg" alt="Paisagem bonita">
                <div class="texto-central">Chácara <br>Primavera Valinhos</div>
            </div>
            <div class="swiper-slide"><img src="../img/Giardino.jpg" alt="Paisagem bonita">
                <div class="texto-central">Giardino di Menis <br>Eventos</div>
            </div>
            <div class="swiper-slide"><img src="../img/fortaleza.jpg" alt="Paisagem bonita">
                <div class="texto-central">Chácara <br>Fortaleza Valinhos</div>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>


    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
    var swiper = new Swiper(".mySwiper", {
        cssMode: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
        },
        mousewheel: true,
        keyboard: true,
    });
    </script>
    <script src="../js/index.js"></script>
</body>

</html>