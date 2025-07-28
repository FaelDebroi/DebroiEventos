<?php
session_start();
include('conexao.php');

//consultas 
$AgendamentoSQl = " SELECT   
                        a.IdAgendamentoVisita,
                        c.IdCliente,
                        c.Nome AS NomeUsuario,
                        c.Telefone,
                        c.Email,
                        ch.Nome AS NomeChacara,
                        a.DataVisita,
                        a.DataFesta,
                        a.Hora, 
                        e.cep,
                        e.rua,
                        e.bairro,
                        e.cidade,
                        e.numero,
                        es.Estados
                        FROM usuario c
                        inner JOIN agendamentovisita a ON a.IdCliente = c.IdCliente
                        inner JOIN chacaras ch ON ch.IdChacaras = a.IdChacara
                        inner JOIN endereco e ON e.IdEndereco = ch.IdEndereco
                        INNER JOIN estado es ON es.IdEstado = e.Estado_Id ;";

$agendamentoConsulta = mysqli_query($conecta, $AgendamentoSQl);

if (!$agendamentoConsulta) {
    die("Não foi possivel visualizar os agendamentos");
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
            margin-top: 120px;
            /* Ajustei para não ficar muito distante do topo */
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            /* Ajustei o espaçamento entre a tabela e o título */
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
            padding: 12px 20px;
            /* Ajustei o padding para um botão mais "forte" */
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;

            font-weight: bold;
            margin-bottom: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            transition: background-color 0.3s ease;
            /* Adicionei uma transição suave */
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
        <h1>Gerenciador de Agendamentos</h1>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Id Agendamento</th>
                        <th>Id Cliente</th>
                        <th>Nome do Cliente</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Data de Visita</th>
                        <th>Horario de Visita</th>
                        <th>Nome Chacara</th>
                        <th>Data da festa</th>
                        <th>Localizacao</th>
                        <th>acoes</th>

                    </tr>
                </thead>
                <tbody>
                    <!-- Cliente cadastrado -->
                    <?php while ($Agendamento = mysqli_fetch_assoc($agendamentoConsulta)) { // percorre todos os nomes ?>
                        <tr>
                            <td><?php echo $Agendamento["IdAgendamentoVisita"]; ?></td>
                            <td><?php echo $Agendamento["IdCliente"]; ?></td>
                            <td><?php echo $Agendamento["NomeUsuario"]; ?></td>
                            <td><?php echo $Agendamento["Telefone"]; ?></td>
                            <td><?php echo $Agendamento["Email"]; ?></td>
                            <td><?php echo $Agendamento["DataVisita"]; ?></td>
                            <td><?php echo $Agendamento["Hora"]; ?></td>
                            <td><?php echo $Agendamento["NomeChacara"]; ?></td>
                            <td><?php echo $Agendamento["DataFesta"]; ?></td>
                            <td><?php echo $Agendamento["rua"] . ", " . $Agendamento["bairro"] . " | " . $Agendamento["cidade"] . " - " . $Agendamento["Estados"]; ?>
                            </td>
                            <td class="actions">
                                <button class="edit-btn">Editar</button>
                                <br>
                                <button class="delete-btn">Deletar</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>