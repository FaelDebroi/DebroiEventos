<?php  
    include('conexao.php');
    session_start();
?>

<?php   
 $usuario_id = $_SESSION["user_portal"];
    $ClienteSQl = "select * from Cliente c where c.IdCliente = '$usuario_id'";
    $ClienteConsulta = mysqli_query($conecta, $ClienteSQl);
    $Cliente = mysqli_fetch_assoc($ClienteConsulta);
  
if (isset($_POST["nome"],$_POST["email"],$_POST["telefone"],
    $_POST["senha"],$_POST["cpf"])) {

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $senha = $_POST["senha"];
    $cpf = $_POST["cpf"];

   $alteracaoSql = "UPDATE Cliente SET Nome = '$nome', Email = '$email', Telefone = '$telefone', Senha = '$senha', 
    Cpf = '$cpf' WHERE IdCliente = '$usuario_id';";


    if (mysqli_query($conecta, $alteracaoSql)) {
 echo '<div id="notificacao" style="padding: 10px; background-color: #4CAF50; color: white; margin: 15px 0; border-radius: 4px; font-weight: bold; text-align: center; position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 9999; min-width: 200px; box-shadow: 0 0 10px rgba(0,0,0,0.2);">Dados atualizados com sucesso!</div><script>setTimeout(() => { const notification = document.getElementById(\'notificacao\'); if(notification){ notification.style.transition = \'opacity 0.5s ease\'; notification.style.opacity = \'0\'; setTimeout(() => notification.remove(), 500); } }, 4000);</script>';
} else {
        echo "Erro ao atualizar: " . mysqli_error($conecta);
    }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../css/Perfil.css" />

</head>

<body>
    <header class="menu-fixo">
        <?php include 'menuBarra.php'; ?>
    </header>

    <div class="perfil-container">

        <!-- Botão editar -->
        <button class="btn-editar" id="btnEditar">Editar Perfil</button>

        <!-- VISUALIZAÇÃO DO PERFIL -->
        <div id="visualizacao">
            <h2>Perfil do Usuário</h2>
            <div class="perfil-item"><strong data-icon="👤">Nome:</strong> <?php echo $Cliente["Nome"]?></div>
            <div class="perfil-item"><strong data-icon="📧">Email:</strong> <?php echo $Cliente["Email"]?></div>
            <div class="perfil-item"><strong data-icon="📞">Telefone:</strong> <?php echo $Cliente["Telefone"]?></div>
            <div class="perfil-item"><strong data-icon="🔒">Senha:</strong> <span class="senha">********</span></div>
            <div class="perfil-item"><strong data-icon="🆔">CPF:</strong> <?php echo $Cliente["Cpf"]?></div>
        </div>

        <!-- FORMULÁRIO DE EDIÇÃO -->
        <form id="formEdicao" style="display: none;" method="POST">
            <h2>Editar Perfil</h2>

            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="<?php echo $Cliente["Nome"]?>" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo $Cliente["Email"]?>" required>

            <label for="telefone">Telefone</label>
            <input type="tel" name="telefone" id="telefone" value="<?php echo $Cliente["Telefone"]?>" required>

            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" placeholder="Digite a nova senha">

            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf" value="<?php echo $Cliente["Cpf"]?>" required>

            <div style="display: flex; gap: 20px; margin-top: 30px;">
                <button type="submit">Salvar</button>
                <button type="button">Cancelar</button>
            </div>
        </form>
    </div>

    <!-- JS para alternar entre visualizar e editar -->
    <script>
    const btnEditar = document.getElementById("btnEditar");
    const visualizacao = document.getElementById("visualizacao");
    const formEdicao = document.getElementById("formEdicao");

    btnEditar.addEventListener("click", () => {
        visualizacao.style.display = "none";
        formEdicao.style.display = "block";
        btnEditar.style.display = "none";
    });

    function cancelarEdicao() {
        formEdicao.style.display = "none";
        visualizacao.style.display = "block";
        btnEditar.style.display = "inline-block";
    }
    </script>
</body>

</html>