<?php require_once("../html/funcoes.php"); ?>

<?php
include('conexao.php');
include('Segurancagerenciamento.php');

//pesquisas
$proprietarioSQL = "Select * From proprietario";
$estadosSQl = "Select * from estado";
$corretorSQL = "Select * from corretor";

$estados = mysqli_query($conecta, $estadosSQl);
$Proprietario = mysqli_query($conecta, $proprietarioSQL);
$corretor = mysqli_query($conecta, $corretorSQL);

if (!$Proprietario && !$estados && !$corretor) {
    die("falha na consulta ao banco de dados");
}
?>

<?php

//Insercoes
// Verifica se dados foram enviados via POST
$MensagemError = "";


if (!empty($_POST) && !empty($_FILES) && $MensagemError == "") {

    $Imgs = [$_FILES["imagem1"], $_FILES["imagem2"], $_FILES["imagem3"], $_FILES["imagem4"], $_FILES["imagem5"]];

    foreach ($Imgs as $Img) {
        if ($Img["error"] != 0) {
            $MensagemError = "Erro no arquivo imagem : " . mostrarAviso($Img["error"]);
            break;
        }

        // Verifica o tipo do arquivo
        if (
            $Img["type"] === "image/jpeg" ||
            $Img["type"] === "image/jpg" ||
            $Img["type"] === "image/png"
        ) {
            if (!empty($MensagemError)) {
                echo "<div style='color:red;'>$MensagemError</div>";
            } else {


            }

        } else {
            $MensagemError = "Aceitamos somente jpeg, jpg e png!";
            break;
        }
    }

    //altere o nome das imagens


    $retornoCC = CriarChacara($Imgs, $conecta, $_POST);
    echo $retornoCC;


}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criacao de Chacaras</title>
    <link rel="stylesheet" href="../css/CriacaoChacaras.css">
</head>

<body>
    <header>
        <?php include 'menuBarra.php'; ?>
    </header>

    <br><br><br><br>


    <h2>Cadastro de Chácara</h2>
    <form method="POST" enctype="multipart/form-data">
        <label for="nome">Nome da Chácara (Nunca repetir o nome da chacara)</label>
        <input type="text" id="nome" name="nome">

        <label>Imagens da Chácara (5 arquivos)</label>


        <?php if (!empty($MensagemError)) { ?>
            <div style="color: red; font-weight: bold; margin-bottom: 8px;">
                <?= htmlspecialchars($MensagemError) ?>
            </div>
        <?php } ?>


        <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
        <input type="file" name="imagem1" accept="image/*" required>
        <input type="file" name="imagem2" accept="image/*">
        <input type="file" name="imagem3" accept="image/*">
        <input type="file" name="imagem4" accept="image/*">
        <input type="file" name="imagem5" accept="image/*">

        <label for="valor">Valor da Locação</label>
        <input type="number" name="valor" id="valor" min="0" step="0.01"
            placeholder="Deixe em branco para negociar com cliente">

        <label for="estacionamento">Vagas de Estacionamento</label>
        <input type="number" name="estacionamento" id="estacionamento" min="0" step="0.01" required>

        <label for="min_convidados">Mínimo de Convidados</label>
        <input type="number" name="min_convidados" id="min_convidados" min="0" step="0.01" required>

        <label for="max_convidados">Máximo de Convidados</label>
        <input type="number" name="max_convidados" id="max_convidados" min="0" step="0.01" required>

        <div class="checkbox-group">
            <label><input type="checkbox" name="wifi" value="Sim"> Wi-Fi no local</label>
            <label><input type="checkbox" name="piscina" value="Sim"> Piscina no local</label>
            <!-- Adicionar campo de futebol,Permitido animais,Ar-condicionado, Câmeras de segurança e etc  -->
        </div>

        <label for="banheiros">Quantidade de Banheiros</label>
        <input type="number" name="banheiros" id="banheiros" min="0" step="0.01" required>

        <!-- Endereço -->
        <label for="cep">CEP</label>
        <input type="text" name="cep" id="cep" required placeholder="00000-000">

        <label for="rua">Rua</label>
        <input type="text" name="rua" id="rua" required>

        <label for="numero">Número</label>
        <input type="text" name="numero" id="numero" required>

        <label for="bairro">Bairro</label>
        <input type="text" name="bairro" id="bairro" required>

        <label for="cidade">Cidade</label>
        <input type="text" name="cidade" id="cidade" required>

        <label for="estado">Estado</label>
        <select name="estado" id="estado" required>
            <option value="">Selecione...</option>
            <?php while ($estadoSolto = mysqli_fetch_assoc($estados)) { ?>
                <option value="<?php echo $estadoSolto["IdEstado"]; ?>">
                    <?php echo $estadoSolto["Estados"]; ?>
                </option>
            <?php } ?>
        </select>

        <label for="corretor">Nome do Corretor:</label>
        <select name="corretor" id="corretor" required>
            <option value="">Selecione...</option>
            <?php while ($corretorSolto = mysqli_fetch_assoc($corretor)) { ?>
                <option value="<?php echo $corretorSolto["IdCorretor"]; ?>">
                    <?php echo $corretorSolto["Nome"]; ?>
                </option>
            <?php } ?>
        </select>

        <label for="proprietario">Nome do Proprietário</label>
        <select name="proprietario" id="proprietario" required>
            <option value="">Selecione...</option>
            <?php while ($Linha = mysqli_fetch_assoc($Proprietario)) { ?>
                <option value="<?php echo $Linha["IdProprietario"]; ?>">
                    <?php echo $Linha["Nome"]; ?>
                </option>
            <?php } ?>
        </select>

        <label for="descricao">Descrição da Chácara</label>
        <textarea name="descricao" id="descricao" rows="5" required></textarea>

        <label for="url_maps">URL da Localização no Google Maps</label>
        <input name="url_maps" id="url_maps" placeholder="https://maps.google.com/..." required>

        <button type="submit">Cadastrar Chácara</button>
    </form>


</body>

</html>