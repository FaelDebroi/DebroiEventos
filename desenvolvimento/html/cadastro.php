<?php

include('conexao.php');


//Criar Verificacao se Cpf


// insercao no banco
if (
    isset(
    $_POST["nome"],
    $_POST["email"],
    $_POST["telefone"],
    $_POST["cpf"],
    $_POST["senha"]
)
) {

    $nome = $_POST["nome"];
    $Email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $cpf = $_POST["cpf"];
    $senha = $_POST["senha"];
    $Whatsapp = $_POST["WhatsApp"];

    //limpando cpf
    $cpfLimpo = preg_replace('/\D/', '', $_POST['cpf']);
    echo "<script>Console.log('$cpfLimpo');</script>";

    $CpfBancoSql = "select * from usuario c where c.Cpf = '$cpf' ";
    $CpfBanco = mysqli_query($conecta, $CpfBancoSql);

    if (mysqli_num_rows($CpfBanco) > 0) {
        echo "<script>alert('CPF já cadastrado!'); window.history.back();</script>";
        exit;
    }

    $nomeUserBancoSql = "select * from usuario c where c.Nome ='$nome'";
    $nomeusuario = mysqli_query($conecta, $nomeUserBancoSql);

    if (mysqli_num_rows($nomeusuario) > 0) {
        echo "<script>alert('Nome de usuario ja cadastrado!'); window.history.back();</script>";
        exit;
    }

    $EmailBancoSql = "select * from usuario c where c.Email ='$Email'";
    $EmailBanco = mysqli_query($conecta, $EmailBancoSql);

    if (mysqli_num_rows($EmailBanco) > 0) {
        echo "<script>alert('EMail de usuario ja cadastrado!'); window.history.back();</script>";
        exit;
    }


    $inserir = "INSERT INTO usuario (Nome, Email, telefone, Senha, Cpf, Admin,zap) 
            VALUES ('$nome', '$Email', '$telefone', '$senha', '$cpfLimpo', '0','$Whatsapp')";

    $operacao_inserir = mysqli_query($conecta, $inserir);

    if (!$operacao_inserir) {
        die("Falha na inserçao");
    } else {
        header("location:login.php");
    }
}
?>



<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Debroi Eventos</title>
    <link rel="stylesheet" href="../css/cadastro.css">
</head>

<body>


    <div class="container">
        <div class="logo">
            <img src="../img/logoDebroi.png" alt="Logo Debroi Eventos">
        </div>
        <h2>Crie sua Conta</h2>
        <form id="cadastro-form" onsubmit="return validarTudo()" method="post">
            <div class="form-row">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" placeholder="Digite seu nome" required>
                </div>

                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" placeholder="Digite seu email" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" placeholder="Digite sua senha" minlength="8" maxlength="30"
                        required>
                </div>
                <div class="form-group">
                    <label for="confirmar-senha">Confirme a senha:</label>
                    <input type="password" name="confirmar_senha" placeholder="Confirme sua senha" minlength="8"
                        maxlength="30" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" name="telefone" placeholder="Digite seu telefone" required>
                </div>
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf" placeholder="Digite seu CPF" required maxlength="14">
                </div>
            </div>
            <div style="display: flex; align-items: center; gap: 5px;">
                <input type="checkbox" id="WhatsApp" name="WhatsApp" value="1">
                <label for="WhatsApp">Voce possui WhatsApp nesse numero?</label>
            </div>

            <button type="submit">Cadastrar</button>
        </form>
        <p>Já tem conta? <a href="login.php">Faça login</a></p>
    </div>

    <script src="../js/cadastro.js"></script>
</body>

</html>