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
        text-transform: uppercase;
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
                        <th>Id Cliente (nao cadastrado)</th>
                        <th>Nome do Cliente</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Mensagem</th>
                        <th>acoes</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Cliente cadastrado -->
                    <tr>
                        <td>1</td>
                        <td>Ana Silva</td>
                        <td>ana@example.com</td>
                        <td>(11) 98765-4321</td>
                        <td>123.456.789-00</td>
                        <td class="actions">
                            <button class="edit-btn">Editar</button>
                            <button class="delete-btn">Deletar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>