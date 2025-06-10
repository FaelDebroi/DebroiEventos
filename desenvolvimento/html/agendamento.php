<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento - Debroi Eventos</title>
    <link rel="stylesheet" href="/css/agendamento.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">Debroi Eventos</div>
        <ul>
             <a href="index.php"><b>Home</b></a>
            <a href="sobre.php"><b>Sobre</b></a>
            <a href="chacaras.php"><b>Chácaras</b></a>
            <a href="servicos.php"><b>Serviços</b></a>
            <a href="contato.php"><b>Contato</b></a>
            <a href="login.php"><b>Login</b></a>
        </ul>
    </nav>
    <div class="background">
        <div class="form-container">
            <h2>Agendamento de visitas</h2>
            <form id="agendamento-form">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" placeholder="Digite seu nome" required>
                <label for="email">E-mail:</label>
                <input type="email" id="email" placeholder="Digite seu e-mail" required>
                <label for="telefone">Telefone:</label>
                <input type="tel" id="telefone" placeholder="Digite seu telefone" required>
                <label for="data">Data:</label>
                <input type="date" id="data" required>
                <label for="horario">Horário:</label>
                <input type="time" id="horario" required>
                <label for="chacara">Chácara para visita:</label>
                <input type="text" id="chacara" placeholder="Digite o nome da chácara" required>
                <label for="mensagem">Mensagem:</label>
                <textarea id="mensagem" rows="4" placeholder="Digite sua mensagem"></textarea>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>
    <script src="../js/agendamento.js"></script>
</body>
</html>
