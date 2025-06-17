<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Debroi Eventos</title>
    <link rel="stylesheet" href="../css/login.css" />
</head>

<body>
    <div class="login-wrapper">
        <!-- Lado da Imagem -->
        <div class="login-image">
            <img src="../img/chacarasimg/fortaleza.jpg" alt="Imagem de casamento" />
        </div>

        <!-- Lado do Formulário -->
        <div class="login-form-side">
            <div class="logo-area">
                <img src="../img/logoDebroi.png" alt="Logo Debroi Eventos" />
            </div>
            <form class="login-form">
                <h2>Login</h2>
                <label for="email">E-mail:</label>
                <input type="email" id="email" placeholder="Digite seu e-mail" required />

                <label for="password">Senha:</label>
                <input type="password" id="password" placeholder="Digite sua senha" required />

                <button type="submit">Confirmar</button>
                <p>Não tem conta? <a href="cadastro.html">Crie uma nova!</a></p>
            </form>
        </div>
    </div>
</body>

</html>