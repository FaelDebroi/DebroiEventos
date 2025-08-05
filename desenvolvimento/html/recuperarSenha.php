<?php
session_start(); // Sempre no topo

require __DIR__ . '/../../vendor/autoload.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);



$etapa = 1; // Etapa inicial: mostrar campo de e-mail

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["email"])) {

        $email = $_POST["email"];
        $_SESSION["email"] = $email;

        // Gera o código aleatório com 6 dígitos
        $codigo = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $_SESSION["codigo_enviado"] = $codigo;

        // Configurações do PHPMailer (exemplo)
        try {
            // Configura o servidor SMTP - altere para seu servidor
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'debroieventosresponde@gmail.com';
            $mail->Password = 'bgun zpnr cbfv pewz';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Remetente
            $mail->setFrom('debroieventosresponde@gmail.com', 'DebroiEventos');

            // Destinatário
            $mail->addAddress($email);

            // Conteúdo
            $mail->isHTML(true);
            $mail->Subject = "Teste simples de envio do email via PHP";
            $mail->Body = "Olha esse é seu código: <b>$codigo</b>";
            $mail->AltBody = "Olha esse é seu código: $codigo";

            // Enviar e checar resultado
            $mail->send();

            echo "Email enviado para $email com sucesso!<br>";
            echo "Código enviado: $codigo";

            $etapa = 2; // Próxima etapa

        } catch (Exception $e) {
            echo "Erro ao enviar email: {$mail->ErrorInfo}";
        }
    }

    // Etapa 2: Verifica o código enviado
    elseif (isset($_POST["codigo"])) {
        if ($_POST["codigo"] === $_SESSION["codigo_enviado"]) {
            echo "<script>alert('Código verificado com sucesso! Redirecionando...');</script>";
            // Aqui você pode redirecionar ou mostrar o formulário de nova senha
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
            background-image: url("../img/casamento2.jpg");
            background-size: cover;
            /* Cobre toda a tela cortando o excesso */
            background-repeat: no-repeat;
            /* Não repete a imagem */
            background-position: bottom center;
            /* Mostra mais a parte de baixo da imagem */

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