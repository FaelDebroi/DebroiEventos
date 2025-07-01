<?php
    
    include('conexao.php');

    session_start();

    if(isset($_POST["email"])){
        $email = $_POST["email"];
        $senha = $_POST["password"];

        $login  = "select * from cliente WHERE Email = '{$email}' and senha = '{$senha}'";

        $acesso = mysqli_query($conecta,$login);

        if(!$acesso){
            die("falha na consulta ao banco");
        }

        $informacao = mysqli_fetch_assoc($acesso);

        $msg = json_encode($informacao, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        
         if (!empty($informacao["IdCliente"])){
            $_SESSION["user_portal"] = $informacao["IdCliente"];

            //criar if para admin e usuario normal
                if($informacao["Admin"] == 1){
                    header("location:Gerenciamento.php");
                }else{
                    header("location:index.php");
                }
                    exit;
        }else {
            $msg = "<strong>Erro interno: ID do cliente não encontrado.</strong>";
        }
}
?>

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
        <header class="menu-fixo">
            <?php include 'menuBarra.php'; ?>
        </header>
        <!-- Lado da Imagem -->
        <div class="login-image">
            <img src="../img/chacarasimg/fortaleza.jpg" alt="Imagem de casamento" />
        </div>

        <!-- Lado do Formulário -->
        <div class="login-form-side">

            <div class="logo-area">
                <img src="../img/logoDebroi.png" alt="Logo Debroi Eventos" />
            </div>
            <form class="login-form" method="post">
                <h2>Login</h2>
                <label for="email">E-mail:</label>
                <input type="email" name="email" placeholder="Digite seu e-mail" required />

                <label for="password">Senha:</label>
                <input type="password" name="password" placeholder="Digite sua senha" required />

                <button type="submit">Confirmar</button>
                <p>Não tem conta? <a href="cadastro.php">Crie uma nova!</a></p>
                <?php if(isset($msg)){?>
                <p><?php echo $msg?></p>
                <?php  } ?>
            </form>
        </div>
    </div>
</body>

</html>