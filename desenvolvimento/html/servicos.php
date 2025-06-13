<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços - Debroi Eventos</title>
    <link rel="stylesheet" href="../css/servicos.css">
</head>

<body>

    <header class="menu-fixo">
        <?php include 'menuBarra.php'; ?>
    </header>

    <section class="servicos">
        <h1>Nossos Serviços</h1>

        <div class="service">
            <h2>Buffet Completo</h2>
            <p>Oferecemos um buffet completo, com opções variadas e deliciosas para agradar a todos os gostos.
                Personalizamos o cardápio conforme a necessidade do seu evento.</p>
            <button onclick="showMore('buffet')">Saiba Mais</button>
            <div class="more-info" id="buffet">
                <ul>
                    <li>Cardápios Personalizados</li>
                    <li>Atendimento de Qualidade</li>
                    <li>Variedade de Opções</li>
                </ul>
            </div>
        </div>

        <div class="service">
            <h2>Locações</h2>
            <p>Oferecemos uma ampla gama de opções de locações para o seu evento, incluindo móveis, decoração,
                equipamentos e estruturas.</p>
            <button onclick="showMore('locacoes')">Saiba Mais</button>
            <div class="more-info" id="locacoes">
                <ul>
                    <li>Móveis e Decoração</li>
                    <li>Equipamentos de Áudio e Vídeo</li>
                    <li>Estruturas para Eventos</li>
                </ul>
            </div>
        </div>

        <div class="service">
            <h2>Organização de Eventos</h2>
            <p>Cuidamos de todos os detalhes do seu evento, do planejamento à execução, com a nossa equipe
                especializada.</p>
            <button onclick="showMore('organizacao')">Saiba Mais</button>
            <div class="more-info" id="organizacao">
                <ul>
                    <li>Planejamento Personalizado</li>
                    <li>Coordenação Completa</li>
                    <li>Fornecedores de Qualidade</li>
                </ul>
            </div>
        </div>

        <div class="service">
            <h2>Nossos Clientes</h2>
            <p>Temos a honra de atender a uma ampla gama de clientes que confiam em nossos serviços para seus eventos
                mais importantes.</p>
            <button onclick="showMore('clientes')">Saiba Mais</button>
            <div class="more-info" id="clientes">
                <p>Atendemos grandes empresas e eventos privados, garantindo sempre o mais alto padrão de qualidade e
                    satisfação.</p>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 Debroi Eventos. Todos os direitos reservados.</p>
    </footer>

    <script src="../js/servicos.js"></script>
</body>

</html>