<?php
require_once("../html/conexao.php");
session_start(); // Sempre no topo
require_once("../html/funcoes.php");
$etapa = 1; // Etapa inicial: mostrar campo de e-mail


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["email"])) {
        //ataques de SQL Injection ao usar a função mysqli_real_escape_string.
        $Email = mysqli_real_escape_string($conecta, $_POST["email"]);

        $ClienteSql = "SELECT * FROM usuario WHERE Email = '$Email'";
        $ConsultaClientes = mysqli_query($conecta, $ClienteSql);
        $Cliente = mysqli_fetch_assoc($ConsultaClientes);
        $_SESSION["idCliente"] = $Cliente["IdCliente"];

        if ($ConsultaClientes && mysqli_num_rows($ConsultaClientes) > 0) {
            // Gera o código aleatório com 6 dígitos
            $codigo = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
            $_SESSION["codigo_enviado"] = $codigo;
            $etapa = EnviarEmail($Email, $codigo);
        } else {
            echo "<script>alert('Esse email não é cadastrado.');</script>";
        }
    }

    // Etapa 2: Verifica o código enviado
    elseif (isset($_POST["codigo"])) {
        if ($_POST["codigo"] === $_SESSION["codigo_enviado"]) {
            $etapa = 3;
        } else {
            echo "<script>alert('Código incorreto!');</script>";
            $etapa = 2;
        }
    }

    if (isset($_POST["nova_senha"]) && isset($_POST["confirmar_senha"])) {
        if (isset($_SESSION["idCliente"])) {

            $idCliente = $_SESSION["idCliente"];
            $senha = $_POST["nova_senha"];
            $confirmar = $_POST["confirmar_senha"];

            if ($senha === $confirmar) {
                $alteracaoSenhaSql = "UPDATE usuario
                set Senha = '$senha'
                WHERE IdCliente = '$idCliente'; ";
                if (mysqli_query($conecta, $alteracaoSenhaSql)) {
                    // Limpa sessão após sucesso
                    session_unset();
                    session_destroy();
                    echo "<script>
                    alert('Senha atualizada com sucesso!!');
                    window.location.href = 'login.php';
                    </script>";
                    exit;
                } else {
                    echo "Erro ao atualizar: " . mysqli_error($conecta);
                }
            } else {
                echo "<script>alert('As senhas não são iguais.');</script>";
                $etapa = 3;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Recuperar Senha</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-image: url("../img/casamento2.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: bottom center;

            height: 100vh;
            margin: 0;
            padding: 0;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background-color: #ffffff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
        }

        h2 {
            text-align: center;
            color: #005f99;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }

        input[type="email"],
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #005f99;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #004b80;
        }
    </style>

</head>

<body>
    <header class="menu-fixo">
        <?php include 'menuBarra.php'; ?>
    </header>

    <div class="form-container">
        <?php if ($etapa === 1): ?>
            <h2>Recuperar Senha</h2>
            <form method="POST">
                <label for="email">Digite seu e-mail:</label>
                <input type="email" id="email" name="email" required placeholder="exemplo@email.com">
                <input type="submit" value="Enviar Código">
            </form>

        <?php elseif ($etapa === 2): ?>
            <h2>Digite o Código</h2>
            <form method="POST">
                <label for="codigo">
                    Código enviado para <?php echo htmlspecialchars($_SESSION["email"]); ?>:
                </label>
                <input type="text" id="codigo" name="codigo" required maxlength="6" placeholder="Ex: 123456">
                <input type="submit" value="Verificar Código">
            </form>

        <?php elseif ($etapa === 3): ?>
            <h2>Nova Senha</h2>
            <form method="POST">
                <label for="nova_senha">Nova Senha:</label>
                <input type="password" id="nova_senha" name="nova_senha" required>

                <label for="confirmar_senha">Confirmar Nova Senha:</label>
                <input type="password" id="confirmar_senha" name="confirmar_senha" required>

                <input type="submit" value="Alterar Senha">
            </form>
        <?php endif; ?>
    </div>


</body>

</html>