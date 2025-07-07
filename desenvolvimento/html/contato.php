<?php
  include('conexao.php');

  //consultas 
    $ConsultaSQL = "select nome, IdChacaras from Chacaras;";
    $Chacaras = mysqli_query($conecta,$ConsultaSQL);
    
    if(! $Chacaras){
        die("falha na consulta ao banco de dados");
    }

  //inserindo contatos

  if (isset($_POST["nome"],$_POST["email"],$_POST["telefone"],
    $_POST["mensagem"])) {

     // Exibindo os valores de cada campo enviado pelo formulário
    $nome = htmlspecialchars($_POST["nome"]);
    $email = htmlspecialchars($_POST["email"]);
    $telefone = htmlspecialchars($_POST["telefone"]);
    $mensagem = nl2br(htmlspecialchars($_POST["mensagem"]));
    
    $insertNovoContato = "INSERT INTO contatoclientenaocadastrado (Nome, Telefone, Email, Mensagem)
                          VALUES ('$nome','$telefone','$telefone','$mensagem')"; 
    
    $operacao_inserir = mysqli_query($conecta, $insertNovoContato);

    if(!$operacao_inserir){
        die("Falha na inserçao");
    }else{
        echo '<div id="notificacao" style="padding: 10px; background-color: #4CAF50; color: white; margin: 15px 0; border-radius: 4px; font-weight: bold; text-align: center; position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 9999; min-width: 200px; box-shadow: 0 0 10px rgba(0,0,0,0.2);">Enviamos Seu Contato, logo entraremos em Contato!!</div><script>setTimeout(() => { const notification = document.getElementById(\'notificacao\'); if(notification){ notification.style.transition = \'opacity 0.5s ease\'; notification.style.opacity = \'0\'; setTimeout(() => notification.remove(), 500); } }, 4000);</script>';
    }
    }

?>


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
            <form method="post">

                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="telefone">Telefone:</label>
                <input type="tel" id="telefone" name="telefone" required>

                <label for="mensagem">Mensagem:</label>
                <textarea id="mensagem" name="mensagem" rows="4" required></textarea>

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