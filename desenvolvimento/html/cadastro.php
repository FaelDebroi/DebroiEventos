<?php 

   include('conexao.php');

// insercao no banco
if(isset($_POST["nome"], $_POST["email"], 
    $_POST["telefone"], $_POST["cpf"], $_POST["senha"])){
        
    $nome      = $_POST["nome"];
    $Email     = $_POST["email"];
    $telefone  = $_POST["telefone"];
    $cpf       = $_POST["cpf"];
    $senha     = $_POST["senha"];

    //limpando cpf
    $cpfLimpo = preg_replace('/\D/', '', $_POST['cpf']); 

    print_r($cpfLimpo);


   $inserir = "INSERT INTO cliente (Nome, Email, telefone, Senha, Cpf) 
            VALUES ('$nome', '$Email', '$telefone', '$senha', '$cpfLimpo')";

    $operacao_inserir = mysqli_query($conecta, $inserir);
    
    if(!$operacao_inserir){
        die("Falha na inserçao");
    }else{
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
        <form id="cadastro-form" method="post" onsubmit="return verificarSenhas()">
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
                    <label for="telefone">Telefone:</label>
                    <input type="text" name="telefone" placeholder="Digite seu telefone" required>
                </div>
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf" placeholder="Digite seu CPF" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" placeholder="Digite sua senha" required>
                </div>
                <div class="form-group">
                    <label for="confirmar-senha">Confirme a senha:</label>
                    <input type="password" name="confirmar_senha" placeholder="Confirme sua senha" required>
                </div>
            </div>

            <button type="submit">Cadastrar</button>
        </form>
        <p>Já tem conta? <a href="login.php">Faça login</a></p>
    </div>

    <script src="../js/cadastro.js"></script>
</body>

</html>