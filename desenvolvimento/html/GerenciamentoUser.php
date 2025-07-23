<?php
session_start();
include('conexao.php');

//consultas 
$ConsultaSQL = "select * from usuario;";
$clientes = mysqli_query($conecta, $ConsultaSQL);

if (!$clientes) {
    die("falha na consulta ao banco de dados");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gerenciador de Usuários</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f6f8;
        }

        h1 {
            margin-top: 150px;
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        tr:hover {
            background-color: #f1f7ff;
        }

        .actions button {
            margin-right: 5px;
            padding: 6px 12px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            color: white;
            font-weight: bold;
        }

        .edit-btn {
            background-color: #28a745;
        }

        .delete-btn {
            background-color: #dc3545;
        }

        .create-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 20px;
            display: block;
            margin-left: auto;
            /* margin-right: auto; */
        }

        .create-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <header>
        <?php include 'menuBarra.php'; ?>
    </header>

    <div class="TudoviewUser">
        <h1>Gerenciador de Usuários</h1>
        <button class="create-btn">Criar Usuário</button>
        <table>
            <thead>
                <tr>
                    <th>IdCliente</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Senha</th>
                    <th>CPF</th>
                    <th>Admin</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Cliente cadastrado -->
                <?php while ($cliente = mysqli_fetch_assoc($clientes)) { // percorre todos os nomes ?>
                    <tr>
                        <td><?php echo $cliente["IdCliente"]; ?></td>
                        <td><?php echo $cliente["Nome"]; ?></td>
                        <td><?php echo $cliente["Email"]; ?></td>
                        <td><?php echo $cliente["Telefone"]; ?></td>
                        <td><?php echo $cliente["Senha"]; ?></td>
                        <td><?php echo $cliente["Cpf"]; ?></td>

                        <td>
                            <?php
                            if ($cliente["Admin"] == 1) {
                                echo "admin";
                            } else {
                                echo "usuário comum";
                            }
                            ?>
                        </td>


                        <td class="actions">
                            <button class="edit-btn">Editar</button>
                            <button class="delete-btn">Deletar</button>
                        </td>
                    </tr>
                <?php } ?>




            </tbody>
        </table>
    </div>
</body>

</html>