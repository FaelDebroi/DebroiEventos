<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato - Debroi Eventos</title>
    <link rel="stylesheet" href="../css/contato.css">
</head>
<body>

    <!-- Menu Fixo -->
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

                <button type="submit">Enviar</button>
            </form>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 Debroi Eventos. Todos os direitos reservados.</p>
    </footer>

</body>
</html>
