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
        <h1>Serviços</h1>

        <div class="servicos-container">
            <div class="imagem-servico">
                <img src="../img/casamento.jpeg" alt="Casamento">
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

        <h2>Um pouco de nossos servicos</h2>
        <!-- imagens do servicos -->
        <div class="galeria-casamento">
            <a href="#img1"><img src="../img/casamento.jpeg" alt="Casamento 1"></a>
            <a href="#img2"><img src="../img/casamento.jpeg" alt="Casamento 2"></a>
            <a href="#img3"><img src="../img/casamento.jpeg" alt="Casamento 3"></a>
            <a href="#img1"><img src="../img/casamento.jpeg" alt="Casamento 1"></a>
            <a href="#img2"><img src="../img/casamento.jpeg" alt="Casamento 2"></a>
            <a href="#img3"><img src="../img/casamento.jpeg" alt="Casamento 3"></a>
            <a href="#img1"><img src="../img/casamento.jpeg" alt="Casamento 1"></a>
            <a href="#img2"><img src="../img/casamento.jpeg" alt="Casamento 2"></a>
            <!-- continue com os outros -->
        </div>

        <!-- Lightbox para cada imagem -->
        <div id="img1" class="lightbox">
            <a href="#"><img src="../img/casamento.jpeg" alt="Casamento 1"></a>
        </div>

        <div id="img2" class="lightbox">
            <a href="#"><img src="../img/casamento.jpeg" alt="Casamento 2"></a>
        </div>

        <div id="img3" class="lightbox">
            <a href="#"><img src="../img/casamento.jpeg" alt="Casamento 3"></a>
        </div>


        <div class="clientes">
            <h2>Nosso Clientes</h2>
            <p>Desde o começo, prezamos serviços de confiança e responsabilidade. Tivemos a honra de
                servir as primeiras empresas na escolha das seguintes propostas:</p>

            <div class="clientes-grid">
                <div class="cliente">
                    <img src="../img/japa.jpg" alt="Cliente 1">
                    <h3>Banco Beltran Ltda.</h3>
                    <p>Desde o começo, prezamos serviços de confiança e responsabilidade. Tivemos a honra de
                        servir as primeiras empresas na escolha das seguintes propostas:</p>

                </div>
                <div class="cliente">
                    <img src="../img/japa.jpg" alt="Cliente 2">
                    <h3>Mirando Digital</h3>
                    <p>Desde o começo, prezamos serviços de confiança e responsabilidade. Tivemos a honra de
                        servir as primeiras empresas na escolha das seguintes propostas:</p>

                </div>
                <div class="cliente">
                    <img src="../img/japa.jpg" alt="Cliente 3">
                    <h3>Parcima Valores Mobilitários</h3>
                    <p>Desde o começo, prezamos serviços de confiança e responsabilidade. Tivemos a honra de
                        servir as primeiras empresas na escolha das seguintes propostas:</p>
                </div>
                <div class="cliente">
                    <img src="../img/japa.jpg" alt="Cliente 3">
                    <h3>Parcima Valores Mobilitários</h3>
                    <p>Desde o começo, prezamos serviços de confiança e responsabilidade. Tivemos a honra de
                        servir as primeiras empresas na escolha das seguintes propostas:</p>
                </div>
            </div>
        </div>
    </section>

</body>

</html>