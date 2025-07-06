<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Serviços - Debroi Eventos</title>
    <link rel="stylesheet" href="../css/servicos.css">
</head>

<body>
    <header class="menu-fixo">
        <?php include 'menuBarra.php'; ?>
    </header>

    <section class="servicos">
        <h1 style="text-align: center">Serviços</h1>

        <div class="servicos-container">
            <div class="imagem-servico">
                <img src="../img/dona.jpeg" alt="Casamento">
            </div>

            <div class="itens-servicos">
                <div class="item">
                    <h2>Buffet Completo</h2>
                    <p>Buffet com cardápio personalizado do coquetel para todos os gostos.</p>
                    <a href="https://wa.me/5519992313281?text=Olá!%20Gostaria%20de%20consultar%20o%20cardápio%20do%20buffet%20completo."
                        target="_blank" class="whatsapp-btn">Consultar cardápio</a>
                </div>

                <div class="item">
                    <h2>Locação de Espaços</h2>
                    <p>Chácaras e salões em Campinas e região para eventos.</p>
                    <a href="chacaras.php" target="_blank" class="whatsapp-btn">Conhecer espaços</a>
                </div>
            </div>
        </div>

        <h2 style="text-align: center; margin-top: 10px">Um pouco de nossos servicos</h2>
        <!-- imagens do servicos -->


        <div class="galeria-casamento">
            <a href="#img1"><img src="../img/comida1.jpeg" alt="Miniatura 1"></a>
            <a href="#img2"><img src="../img/comida2.jpeg" alt="Miniatura 2"></a>
            <a href="#img3"><img src="../img/comida3.jpeg" alt="Miniatura 3"></a>
            <a href="#img4"><img src="../img/comida4.jpeg" alt="Miniatura 4"></a>
            <a href="#img5"><img src="../img/comida5.jpeg" alt="Miniatura 5"></a>
            <a href="#img6"><img src="../img/comida6.jpeg" alt="Miniatura 6"></a>
            <a href="#img7"><img src="../img/comida7.jpeg" alt="Miniatura 7"></a>
            <a href="#img8"><img src="../img/comida8.jpeg" alt="Miniatura 8"></a>
        </div>


        <div id="img1" class="lightbox">
            <a href="#" class="fechar" aria-label="Fechar">
                ×
            </a>

            <img src="../img/comida1.jpeg" alt="Casamento 1">
        </div>

        <div id="img2" class="lightbox">
            <a href="#" class="fechar" aria-label="Fechar">
                ×
            </a>

            <img src="../img/comida2.jpeg" alt="Casamento 2">
        </div>

        <div id="img3" class="lightbox">
            <a href="#" class="fechar" aria-label="Fechar">
                ×
            </a>

            <img src="../img/comida3.jpeg" alt="Casamento 3">
        </div>

        <div id="img4" class="lightbox">
            <a href="#" class="fechar" aria-label="Fechar">
                ×
            </a>

            <img src="../img/comida4.jpeg" alt="Casamento 4">
        </div>

        <div id="img5" class="lightbox">
            <a href="#" class="fechar" aria-label="Fechar">
                ×
            </a>

            <img src="../img/comida5.jpeg" alt="Casamento 1">
        </div>

        <div id="img6" class="lightbox">
            <a href="#" class="fechar" aria-label="Fechar">
                ×
            </a>

            <img src="../img/comida6.jpeg" alt="Casamento 2">
        </div>

        <div id="img7" class="lightbox">
            <a href="#" class="fechar" aria-label="Fechar">
                ×
            </a>

            <img src="../img/comida7.jpeg" alt="Casamento 3">
        </div>

        <div id="img8" class="lightbox">
            <a href="#" class="fechar" aria-label="Fechar">
                ×
            </a>

            <img src="../img/comida8.jpeg" alt="Casamento 4">
        </div>



        <div class="clientes">
            <h2>Nossos Clientes</h2>
            <p>Desde o começo, prezamos serviços de confiança e responsabilidade. Tivemos a honra de
                servir as primeiras empresas na escolha das seguintes propostas:</p>

            <div class="clientes-grid">
                <div class="cliente">
                    <img src="../img/cliente1.jpeg" alt="Cliente 1">
                    <h3>Banco Beltran Ltda.</h3>
                    <p>Desde o começo, prezamos serviços de confiança e responsabilidade. Tivemos a honra de
                        servir as primeiras empresas na escolha das seguintes propostas:</p>

                </div>
                <div class="cliente">
                    <img src="../img/cliente2.jpg" alt="Cliente 2">
                    <h3>Mirando Digital</h3>
                    <p>Desde o começo, prezamos serviços de confiança e responsabilidade. Tivemos a honra de
                        servir as primeiras empresas na escolha das seguintes propostas:</p>

                </div>
                <div class="cliente">
                    <img src="../img/cliente3.jpg" alt="Cliente 3">
                    <h3>Parcima Valores Mobilitários</h3>
                    <p>Desde o começo, prezamos serviços de confiança e responsabilidade. Tivemos a honra de
                        servir as primeiras empresas na escolha das seguintes propostas:</p>
                </div>
                <!-- Comentei porque n tinha mais clientes no canva, ass cleorbeth -->
                <!--<div class="cliente">
                    <img src="../img/japa.jpg" alt="Cliente 3">
                    <h3>Parcima Valores Mobilitários</h3>
                    <p>Desde o começo, prezamos serviços de confiança e responsabilidade. Tivemos a honra de
                        servir as primeiras empresas na escolha das seguintes propostas:</p>
                </div>-->
            </div>
        </div>
    </section>

</body>

</html>