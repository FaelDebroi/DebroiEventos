<?php
$etapa = 1;

// Simula envio do código (em um caso real, você geraria e enviaria por e-mail)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["email"])) {
        $email = $_POST["email"];

        // Aqui você geraria o código e enviaria por e-mail
        // Ex: mail($email, "Seu código", "Código: 123456");

        $codigo_enviado = "123456"; // simulação
        session_start();
        $_SESSION["codigo_verificacao"] = $codigo_enviado;
        $_SESSION["email"] = $email;
        $etapa = 2;
    } elseif (isset($_POST["codigo"])) {
        session_start();
        if ($_POST["codigo"] === $_SESSION["codigo_verificacao"]) {
            echo "<script>alert('Código verificado com sucesso! Redirecionando para redefinir senha...');</script>";
            // Aqui você redireciona ou mostra o formulário de nova senha
        } else {
            echo "<script>alert('Código incorreto!');</script>";
            $etapa = 2;
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
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #005f99, #009fe3);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #ffffff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
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
        input[type="text"] {
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
        <?php else: ?>
            <h2>Digite o Código</h2>
            <form method="POST">
                <label for="codigo">Código enviado para <?php echo htmlspecialchars($_SESSION["email"]); ?>:</label>
                <input type="text" id="codigo" name="codigo" required maxlength="6" placeholder="Ex: 123456">
                <input type="submit" value="Verificar Código">
            </form>
        <?php endif; ?>
    </div>

</body>

</html>