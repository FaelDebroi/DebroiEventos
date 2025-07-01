<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="../css/CriandoUsuario.css">
</head>

<body>
    <header class="menu-fixo">
        <?php include 'menuBarra.php'; ?>
    </header>
    <div class="form-container">
        <h2>Cadastro de Usuário</h2>
        <form action="processar_cadastro.php" method="POST">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" required>

            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required>

            <label for="telefone">Telefone</label>
            <input type="tel" id="telefone" name="telefone" required>

            <label for="cpf">CPF</label>
            <input type="text" id="cpf" name="cpf" required>

            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" required>

            <label for="confirmar_senha">Confirme a Senha</label>
            <input type="password" id="confirmar_senha" name="confirmar_senha" required>

            <div class="admin-checkbox">
                <div class="radio-option">
                    <input type="radio" id="admin" name="tipo_usuario" value="admin" required>
                    <label for="admin">Administrador</label>
                </div>
                <div class="radio-option">
                    <input type="radio" id="UserComum" name="tipo_usuario" value="comum" required>
                    <label for="UserComum">Usuário Comum</label>
                </div>
            </div>




            <button type="submit">Cadastrar</button>
        </form>
    </div>

</body>

</html>