<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Debroi Eventos</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body class="login-bg">


    <div class="login-container">
        <div class="login-side">
            <div class="logo">
                <h1>Debroi Eventos<br><span>& Locações</span></h1>
            </div>
            <form id="login-form">
                <h2>Login</h2>
                <label for="email">E-mail:</label>
                <input type="email" id="email" placeholder="Digite seu e-mail" required>
                <label for="password">Senha:</label>
                <input type="password" id="password" placeholder="Digite sua senha" required>
                <button type="submit">Entrar</button>
                <p>Não tem conta? <a href="cadastro.html">Cadastre-se!</a></p>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Debroi Eventos. Todos os direitos reservados.</p>
    </footer>

    <script src="../js/login.js"></script>
</body>


</html>