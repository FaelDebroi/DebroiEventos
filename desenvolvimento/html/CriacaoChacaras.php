<?php
// Funcoes
    function AlterarNome($arquivo){

    $extensao  = strrchr($arquivo,".");
    $alfabeto  = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    $tamanho   = 12;
    $letra     = "";
    $resultado = ""; 

    for($i =1 ; $i < $tamanho; $i ++){
        $letra = substr($alfabeto,rand(0,strlen($alfabeto)-1),1);
        $resultado .= $letra;
    }

    $agora = getdate();
    $codigo_ano = $agora["year"]."_". $agora["yday"];
    return $resultado. "_". "$Nome". "_".$codigo_ano.$extensao;
    }

?>

<?php   
  include('conexao.php');
  include('Segurancagerenciamento.php'); ?>

<?php
    //pesquisas
    $proprietarioSQL = "Select * From proprietario";
    $estadosSQl = "Select * from estado";
    $corretorSQL = "Select * from corretor";

    $estados = mysqli_query($conecta,$estadosSQl);
    $Proprietario = mysqli_query($conecta,$proprietarioSQL);
    $corretor = mysqli_query($conecta,$corretorSQL);

    if(!$Proprietario && !$estados && !$corretor){
        die("falha na consulta ao banco de dados");
    }

    $array_erro = array(
        UPLOAD_ERR_OK => "Sem erro.",
        UPLOAD_ERR_INI_SIZE => "O arquivo enviado excede o limite definido na diretiva upload_max_filesize do php.ini.",
        UPLOAD_ERR_FORM_SIZE => "O arquivo excede o limite definido em 45kb no formulário HTML",
        UPLOAD_ERR_PARTIAL => "O upload do arquivo foi feito parcialmente.",
        UPLOAD_ERR_NO_FILE => "Nenhum arquivo foi enviado.",
        UPLOAD_ERR_NO_TMP_DIR => "Pasta temporária ausente.",
        UPLOAD_ERR_CANT_WRITE => "Falha em escrever o arquivo em disco.",
        UPLOAD_ERR_EXTENSION => "Uma extensão do PHP interrompeu o upload do arquivo."
    ); 

  //Insercoes
// Verifica se dados foram enviados via POST
    $MensagemError ="";
   
   
    if (!empty($_POST) && !empty($_FILES) && $MensagemError == ""){

    $Imgs = [$_FILES["imagem1"], $_FILES["imagem2"], $_FILES["imagem3"], $_FILES["imagem4"], $_FILES["imagem5"]]; 

    foreach ($Imgs as $Img) {
    if ($Img["error"] != 0) { 
        $MensagemError = "Erro no arquivo imagem " . ($key + 1) . ": " . $array_erro[$Img["error"]];
        break; 
    }

         // Verifica o tipo do arquivo
    if (
        $Img["type"] === "image/jpeg" || 
        $Img["type"] === "image/jpg" || 
        $Img["type"] === "image/png"
    ) {
        $tipo =  $Img["type"];
        echo "<pre>";
        print_r($Img);
        echo "</pre>";
        echo $tipo;
        echo "teste 1";
      
    } else {
        $MensagemError = "Aceitamos somente jpeg, jpg e png!";
        break; 
    }
    }

   

     if (empty($MensagemError)) {
    // Criacao da infochacaras para chacara
    $max_convidados = $_POST["max_convidados"];
    $min_convidados = $_POST["min_convidados"];
    $valor = $_POST["valor"];
    $banheiros = $_POST["banheiros"];
    $estacionamento = $_POST["estacionamento"];

     //criacao da informacao endereco
    $cep = $_POST["cep"];
    $rua = $_POST["rua"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $numero = $_POST["numero"];

    //criacao da chacara
    $idProprietario = $_POST["proprietario"];
    $Nome = $_POST["nome"];
    $desc = $_POST["descricao"];
    $IdCorretor = $_POST["corretor"];
    $LocUrlMaps = $_POST["url_maps"];


    if(!empty($_POST["wifi"])){
        $wifi = 1;
    }else{
        $wifi = 0;
    }

     if(!empty($_POST["piscina"])){
        $piscina = 1;
    }else{
        $piscina= 0;
    }

    // 1. Inserir em infochacaras
    $inserirInfoChacaras= " INSERT INTO infochacaras (qtdMaxConvidados, qtdMinConvidados, Valor, Wifi, Piscina, Banheiro, Estacionamento) 
    VALUES ('$max_convidados', ' $min_convidados', '$valor', '$wifi', '$piscina', '$banheiros','$estacionamento')";

    if (mysqli_query($conecta, $inserirInfoChacaras)) {
        $idInfo = mysqli_insert_id($conecta); // Pega ID de infochacaras
    } else {
        die("Erro ao inserir em infochacaras: " . mysqli_error($conecta));
    }   


    // 2. Inserir em endereco
    $inserirEndereco= "INSERT INTO endereco (Cep, rua, bairro, cidade, Estado_Id, numero) VALUES 
    ('$cep', '$rua', '$bairro', '$cidade', '$estado', '$numero');";

    if (mysqli_query($conecta, $inserirEndereco)) {
        $idEndereco = mysqli_insert_id($conecta); // Pega ID de endereco
    } else {
        die("Erro ao inserir em infochacaras: " . mysqli_error($conecta));
    }   

    // 3. Inserir em chacaras com os IDs obtidos
    $CriacaoChacaras = "  INSERT INTO chacaras (IdProprietario, Nome, Descricao, IdInfoChacaras, IdEndereco, IdCorretor, LocalizacaoUrlMaps)
    VALUES ('$idProprietario','$Nome','$desc','$idInfo','$idEndereco','$IdCorretor','$LocUrlMaps');";


    if (mysqli_query($conecta, $CriacaoChacaras)) {
        $idChacara = mysqli_insert_id($conecta); // Pega ID de Chacara
    } else {
        die("Erro ao inserir em chacaras: " . mysqli_error($conn));
    }

    // // 4. inserir imagens 

    foreach ($Imgs as $Img) {
       

    $pasta_temporaria = $Img["tmp_name"];
    $arquivo_nome     = $Img["name"];
    $pasta           = "uploads/";

     // mover arquivo para pasta destino (exemplo)
        if (move_uploaded_file($pasta_temporaria, "../img/" . $pasta . $arquivo_nome)) {
            echo "Arquivo $arquivo_nome enviado com sucesso!<br>";
            $insertImg = "INSERT INTO imgchacaras (idChacara, caminho) VALUES ('$idChacara','$arquivo_nome');";
            
            // Executa a query - assumindo $conecta já conectado
             mysqli_query($conecta, $insertImg) or die(mysqli_error($conecta));
             header("location:gerenciamento.php");
        } else {
            echo "Erro ao enviar o arquivo $arquivo_nome.<br>";
        }
        }
    }
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
        <?php //include 'menuBarra.php'; ?>
    </header>

    <br><br><br><br>


    <h2>Cadastro de Chácara</h2>
    <form method="POST" enctype="multipart/form-data">
        <label for="nome">Nome da Chácara</label>
        <input type="text" id="nome" name="nome">

        <label>Imagens da Chácara (5 arquivos)</label>


        <?php if (!empty($MensagemError)) { ?>
        <div style="color: red; font-weight: bold; margin-bottom: 8px;">
            <?= htmlspecialchars($MensagemError) ?>
        </div>
        <?php } ?>


        <input type="hidden" name="MAX_FILE_SIZE" value="45000" />
        <input type="file" name="imagem1" accept="image/*" required>
        <input type="file" name="imagem2" accept="image/*">
        <input type="file" name="imagem3" accept="image/*">
        <input type="file" name="imagem4" accept="image/*">
        <input type="file" name="imagem5" accept="image/*">

        <label for="valor">Valor da Locação</label>
        <input type="number" name="valor" id="valor" placeholder="Deixe em branco para negociar com cliente">

        <label for="estacionamento">Vagas de Estacionamento</label>
        <input type="number" name="estacionamento" id="estacionamento" required>

        <label for="min_convidados">Mínimo de Convidados</label>
        <input type="number" name="min_convidados" id="min_convidados" required>

        <label for="max_convidados">Máximo de Convidados</label>
        <input type="number" name="max_convidados" id="max_convidados" required>

        <div class="checkbox-group">
            <label><input type="checkbox" name="wifi" value="Sim"> Wi-Fi no local</label>
            <label><input type="checkbox" name="piscina" value="Sim"> Piscina no local</label>
        </div>

        <label for="banheiros">Quantidade de Banheiros</label>
        <input type="number" name="banheiros" id="banheiros" required>

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
            <?php while($estadoSolto = mysqli_fetch_assoc($estados)){ ?>
            <option value="<?php echo $estadoSolto["IdEstado"]; ?>">
                <?php echo $estadoSolto["Estados"]; ?>
            </option>
            <?php } ?>
        </select>

        <label for="corretor">Nome do Corretor:</label>
        <select name="corretor" id="corretor" required>
            <option value="">Selecione...</option>
            <?php while($corretorSolto = mysqli_fetch_assoc($corretor)){ ?>
            <option value="<?php echo $corretorSolto["IdCorretor"]; ?>">
                <?php echo $corretorSolto["Nome"]; ?>
            </option>
            <?php } ?>
        </select>

        <label for="proprietario">Nome do Proprietário</label>
        <select name="proprietario" id="proprietario" required>
            <option value="">Selecione...</option>
            <?php while($Linha = mysqli_fetch_assoc($Proprietario)){ ?>
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