<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Debroi Eventos</title>
    <link rel="stylesheet" href="/css/cadastro.css">
</head>

<body>
    <header>
        <?php include 'menuBarra.php'; ?>
    </header>
    <div class="container">
        <div class="cadastro-box">
            <div class="logo">
                <h1>Debroi Eventos<br><span>& Locações</span></h1>
            </div>
            <form id="cadastro-form">
                <h2>Crie sua Conta</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" placeholder="Digite seu nome" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" id="email" placeholder="Digite seu e-mail" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="telefone">Telefone:</label>
                        <input type="text" id="telefone" placeholder="Digite seu telefone">
                    </div>
                    <div class="form-group">
                        <label for="cpf">CPF:</label>
                        <input type="text" id="cpf" placeholder="Digite seu CPF">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" id="senha" placeholder="Digite sua senha" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmar-senha">Confirme a senha:</label>
                        <input type="password" id="confirmar-senha" placeholder="Confirme sua senha" required>
                    </div>
                </div>
                <button type="submit">Cadastrar</button>
            </form>
            <p>Já tem conta? <a href="login.html">Faça login</a></p>
        </div>
    </div>
    <script src="/js/cadastro.js"></script>
</body>

</html>