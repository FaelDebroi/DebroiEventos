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



  //Insercoes
// Verifica se dados foram enviados via POST
if (!empty($_POST) && !empty($_FILES)){

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

    // imagens
    $img1 = $_FILES["imagem1"];
    $img2 = $_FILES["imagem2"];
    $img3 = $_FILES["imagem3"];
    $img4 = $_FILES["imagem4"];
    $img5 = $_FILES["imagem5"];

    


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

    // 4. inserir imagens 
    $pasta            = "uploads";
    $pasta_temporaria = $_FILES["imagem1"]["tmp_name"];
    $arquivo1          = $_FILES["imagem1"]["name"];
    move_uploaded_file($pasta_temporaria,"../img/" . $pasta . "/" . $arquivo1);
    $insertImg1 = "INSERT INTO imgchacaras (idChacara, caminho) VALUES ('$idChacara','$arquivo1');";
    mysqli_query($conecta, $insertImg1);

    $pasta_temporaria = $_FILES["imagem2"]["tmp_name"];
    $arquivo2          = $_FILES["imagem2"]["name"];
    move_uploaded_file($pasta_temporaria,"../img/" . $pasta . "/" . $arquivo2);
    $insertImg2 = "INSERT INTO imgchacaras (idChacara, caminho) VALUES ('$idChacara','$arquivo2');";
    mysqli_query($conecta, $insertImg2);


    $pasta_temporaria = $_FILES["imagem3"]["tmp_name"];
    $arquivo3          = $_FILES["imagem3"]["name"];
    move_uploaded_file($pasta_temporaria,"../img/" . $pasta . "/" .$arquivo3);
    $insertImg3 = "INSERT INTO imgchacaras (idChacara, caminho) VALUES ('$idChacara','$arquivo3');";
    mysqli_query($conecta, $insertImg3);


    $pasta_temporaria = $_FILES["imagem4"]["tmp_name"];
    $arquivo4          = $_FILES["imagem4"]["name"];
    move_uploaded_file($pasta_temporaria,"../img/" . $pasta . "/" . $arquivo4);
    $insertImg4 = "INSERT INTO imgchacaras (idChacara, caminho) VALUES ('$idChacara','$arquivo4');";
    mysqli_query($conecta, $insertImg4);


    $pasta_temporaria = $_FILES["imagem5"]["tmp_name"];
    $arquivo5          = $_FILES["imagem5"]["name"];
    move_uploaded_file($pasta_temporaria,"../img/" . $pasta . "/" . $arquivo5);
    $insertImg5 = "INSERT INTO imgchacaras (idChacara, caminho) VALUES ('$idChacara','$arquivo5');";
    mysqli_query($conecta, $insertImg5);
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
    <header class="menu-fixo">
        <?php //include 'menuBarra.php'; ?>
    </header>
    <br><br><br><br>


    <h2>Cadastro de Chácara</h2>
    <form method="POST" enctype="multipart/form-data">
        <label for="nome">Nome da Chácara</label>
        <input type="text" id="nome" name="nome" required>

        <label>Imagens da Chacara (5 arquivos)</label>
        <input type="file" name="imagem1" accept="image/*" required>
        <input type="file" name="imagem2" accept="image/*" required>
        <input type="file" name="imagem3" accept="image/*" required>
        <input type="file" name="imagem4" accept="image/*" required>
        <input type="file" name="imagem5" accept="image/*" required>

        <label for="valor">Valor da Locação (Se nao definir valor, sera como a definir com o cliente)</label>
        <input type="number" name="valor" id="valor" required>

        <label for="estacionamento">Quantidade de Vagas para estacionamento no local</label>
        <input type="number" name="estacionamento" id="estacionamento" required>

        <label for="min_convidados">Quantidade Mínima de Convidados</label>
        <input type="number" name="min_convidados" id="min_convidados" required>

        <label for="max_convidados">Quantidade Máxima de Convidados</label>
        <input type="number" name="max_convidados" id="max_convidados" required>

        <div class="checkbox-group">
            <label><input type="checkbox" name="wifi" value="Sim"> Wi-Fi no local</label>
            <label><input type="checkbox" name="piscina" value="Sim"> Piscina no local</label>
        </div>

        <label for="banheiros">Quantidade de Banheiros</label>
        <input type="number" name="banheiros" id="banheiros" required>

        <!-- Endereco -->

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
            <?php  
            while($estadoSolto = mysqli_fetch_assoc($estados)){ // percorre todos os nomes
             ?>
            <option value="<?php echo $estadoSolto["IdEstado"]; ?>"> <?php echo $estadoSolto["Estados"]; ?></option>
            <?php
              }
            ?>
        </select>


        <label for="corretor">Nome do Corretor:</label>

        <select name="corretor" id="corretor" required>
            <option value="">Selecione...</option>
            <?php  
             while($corretorSolto = mysqli_fetch_assoc($corretor)){ // percorre todos os nomes
             ?>
            <option value="<?php echo $corretorSolto["IdCorretor"]; ?>"> <?php echo $corretorSolto["Nome"]; ?></option>
            <?php
              }
            ?>
        </select>



        <label for="proprietario">Nome do Proprietário</label>
        <select name="proprietario" id="proprietario" required>
            <option value="">Selecione...</option>
            <?php  
            while($Linha = mysqli_fetch_assoc($Proprietario)){ // percorre todos os nomes
           
             ?>
            <option value="<?php echo $Linha["IdProprietario"]; ?>"> <?php echo $Linha["Nome"]; ?></option>

            <?php
              }
            ?>
        </select>

        <label for="descricao">Descrição da Chácara</label>
        <textarea name="descricao" id="descricao" rows="5" required></textarea>

        <label for="url_maps">URL da Localização no Google Maps</label>
        <input name="url_maps" id="url_maps" placeholder="https://maps.google.com/..." required>

        <button type="submit">Cadastrar Chácara</button>
    </form>


</body>

</html>