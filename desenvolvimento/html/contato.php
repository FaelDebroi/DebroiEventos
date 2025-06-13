<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/contato.css" defer>

</head>

<body>

    <!-- Menu Fixo -->
    <header class="menu-fixo">
        <?php include 'menuBarra.php'; ?>
    </header>

    <!-- Seção de Contato com Fundo -->
    <section class="contato">
        <div class="form-container">
            <h1>Contatos</h1>
            <form action="mailto:seuemail@dominio.com" method="post" enctype="text/plain">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="telefone">Telefone:</label>
                <input type="tel" id="telefone" name="telefone" required>

                <label for="mensagem">Mensagem:</label>
                <textarea id="mensagem" name="mensagem" rows="4" required></textarea>

                <label for="chacara">Chácara de Interesse:</label>
                <select id="chacara" name="chacara">
                    <option value="chacara1">Chácara 1</option>
                    <option value="chacara2">Chácara 2</option>
                    <option value="chacara3">Chácara 3</option>
                    <option value="chacara4">Chácara 4</option>
                </select>
                <div class="btnEnviarCtt">
                    <button type="submit">Enviar</button>
                </div>

            </form>
        </div>
    </section>

    <!-- <footer>
        <p>&copy; 2025 Debroi Eventos. Todos os direitos reservados.</p>
    </footer> -->

</body>

</html>