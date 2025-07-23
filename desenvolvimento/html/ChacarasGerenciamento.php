<?php
session_start();
include('conexao.php');
$consultaChacaras = "select  
    c.IdChacaras, 
    c.Nome AS ChacaraNome, 
    p.nome AS ProprietarioNome, 
    ic.qtdMaxConvidados, 
    ic.qtdMinConvidados,
    ic.Valor,
    ic.Wifi, 
    ic.Banheiro,
    ic.Estacionamento,
    e.rua, 
    e.bairro, 
    e.cidade, 
    es.Estados AS NomeEstado
    from Chacaras c
    left join proprietario p on p.IdProprietario = c.IdProprietario
    left join infochacaras ic on ic.IdInfoChacaras = c.IdInfoChacaras
    left join endereco e on e.IdEndereco = c.IdEndereco
    left join estado es on es.IdEstado = e.Estado_Id";

$Chacaras = mysqli_query($conecta, $consultaChacaras);

if (!$Chacaras) {
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

        .actions .edit-btn,
        .actions .delete-btn {
            width: 80px;
            /* mesma largura */
            height: 30px;
            /* mesma altura */
            padding: 6px 0;
            /* vertical ajustado, horizontal zerado */
            font-size: 14px;
            border: none;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            display: inline-block;
            text-align: center;
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
            display: inline-block;
            text-align: center;
            text-decoration: none;
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
        <h1>Gerenciador de Chacaras</h1>
        <a href="CriacaoChacaras.php" class="create-btn">Criar Chácara</a>
        <table>
            <thead>
                <tr>
                    <th>IdChacara</th>
                    <th>Nome da Chacara</th>
                    <th>Nome do Proprietario</th>
                    <th>Qtd max convidados</th>
                    <th>Qtd min convidados</th>
                    <th>Valor</th>
                    <th>Wifi</th>
                    <th>Banheiros</th>
                    <th>Estacionamento</th>
                    <th>Localizacao</th>
                    <th>Acoes</th>
                </tr>
            </thead>
            <tbody>
                <!-- Cliente cadastrado -->
                <?php while ($chacara = mysqli_fetch_assoc($Chacaras)) { // percorre todos os nomes ?>

                    <tr>
                        <td><?php echo $chacara["IdChacaras"]; ?></td>
                        <td><?php echo $chacara["ChacaraNome"]; ?></td>
                        <td><?php echo $chacara["ProprietarioNome"]; ?></td>
                        <td><?php echo $chacara["qtdMaxConvidados"]; ?></td>
                        <td><?php echo $chacara["qtdMinConvidados"]; ?></td>
                        <td><?php echo $chacara["Valor"]; ?></td>
                        <td> <?php
                        if ($chacara["Wifi"] == 1) {
                            echo "Sim";
                        } else {
                            echo "Não";
                        }
                        ?></td>
                        <td><?php echo $chacara["Banheiro"]; ?></td>
                        <td><?php echo $chacara["Estacionamento"]; ?></td>
                        <td><?php echo $chacara["rua"] . ", " . $chacara["bairro"] . " | " . $chacara["cidade"] . " - " . $chacara["NomeEstado"]; ?>
                        </td>


                        <td class="actions">
                            <button class="edit-btn">Editar</button>
                            <button class="delete-btn" onclick="alert('Tem certeza que deseja deletar?')">Deletar</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>