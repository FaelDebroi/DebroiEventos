<?php
include('conexao.php');
//funcoes
function mostrarAviso($numero)
{
    $array_erro = array(
        UPLOAD_ERR_OK => "Sem erro.",
        UPLOAD_ERR_INI_SIZE => "O arquivo enviado excede o limite definido na diretiva upload_max_filesize do php.ini.",
        UPLOAD_ERR_FORM_SIZE => "O arquivo excede o limite definido em 200kb no formulário HTML",
        UPLOAD_ERR_PARTIAL => "O upload do arquivo foi feito parcialmente.",
        UPLOAD_ERR_NO_FILE => "Nenhum arquivo foi enviado.",
        UPLOAD_ERR_NO_TMP_DIR => "Pasta temporária ausente.",
        UPLOAD_ERR_CANT_WRITE => "Falha em escrever o arquivo em disco.",
        UPLOAD_ERR_EXTENSION => "Uma extensão do PHP interrompeu o upload do arquivo."
    );

    return $array_erro[$numero];
}


function CriarChacara($Imgs, $conecta, $POST): string
{

    // Criacao da infochacaras para chacara
    $max_convidados = $POST["max_convidados"];
    $min_convidados = $POST["min_convidados"];
    $valor = $POST["valor"];
    $banheiros = $POST["banheiros"];
    $estacionamento = $POST["estacionamento"];

    //criacao da informacao endereco
    $cep = $POST["cep"];
    $rua = $POST["rua"];
    $bairro = $POST["bairro"];
    $cidade = $POST["cidade"];
    $estado = $POST["estado"];
    $numero = $POST["numero"];

    //criacao da chacara
    $idProprietario = $POST["proprietario"];
    $Nome = $POST["nome"];
    $desc = $POST["descricao"];
    $IdCorretor = $POST["corretor"];
    $LocUrlMaps = $POST["url_maps"];


    if (!empty($POST["wifi"])) {
        $wifi = 1;
    } else {
        $wifi = 0;
    }

    if (!empty($POST["piscina"])) {
        $piscina = 1;
    } else {
        $piscina = 0;
    }

    // 1. Inserir em infochacaras
    $inserirInfoChacaras = "INSERT INTO infochacaras (qtdMaxConvidados, qtdMinConvidados, Valor, Wifi, Piscina,
        Banheiro,Estacionamento)
        VALUES ('$max_convidados', ' $min_convidados', '$valor', '$wifi', '$piscina', '$banheiros','$estacionamento')";

    if (mysqli_query($conecta, $inserirInfoChacaras)) {
        $idInfo = mysqli_insert_id($conecta); // Pega ID de infochacaras
    } else {
        return "Erro ao inserir em infochacaras: " . mysqli_error($conecta);
    }


    // 2. Inserir em endereco
    $inserirEndereco = "INSERT INTO endereco (Cep, rua, bairro, cidade, Estado_Id, numero) VALUES
        ('$cep', '$rua', '$bairro', '$cidade', '$estado', '$numero');";

    if (mysqli_query($conecta, $inserirEndereco)) {
        $idEndereco = mysqli_insert_id($conecta); // Pega ID de endereco
    } else {
        return ("Erro ao inserir em infochacaras: " . mysqli_error($conecta));
    }

    // 3. Inserir em chacaras com os IDs obtidos
    $CriacaoChacaras = " INSERT INTO chacaras (IdProprietario, Nome, Descricao, IdInfoChacaras, IdEndereco,
        IdCorretor,LocalizacaoUrlMaps)
        VALUES ('$idProprietario','$Nome','$desc','$idInfo','$idEndereco','$IdCorretor','$LocUrlMaps');";


    if (mysqli_query($conecta, $CriacaoChacaras)) {
        $idChacara = mysqli_insert_id($conecta); // Pega ID de Chacara
    } else {
        return "Erro ao inserir em chacaras: " . mysqli_error($conecta);
    }

    // // 4. inserir imagens
    $contador = 1;
    foreach ($Imgs as $Img) {


        $pasta_temporaria = $Img["tmp_name"];
        $arquivo_nome = alterarNome($Img, $_POST, $contador++);
        $pasta = "uploads/";

        // mover arquivo para pasta destino (exemplo)
        if (move_uploaded_file($pasta_temporaria, "../img/" . $pasta . $arquivo_nome)) {
            $insertImg = "INSERT INTO imgchacaras (idChacara, caminho) VALUES ('$idChacara','$arquivo_nome');";

            // Executa a query - assumindo $conecta já conectado
            mysqli_query($conecta, $insertImg) or die(mysqli_error($conecta));
            header("location:gerenciamento.php");
        } else {
            return "Erro ao enviar o arquivo $arquivo_nome <br>";
        }
    }

    return "Chácara criada com sucesso!";
}

//Gerar nome unico
function alterarNome($Img, $POST, $contador)
{

    $nomeOriginal = $POST["nome"]; // por exemplo: Chácara São João #1

    $nomeSemEspaco = str_replace(' ', '', $nomeOriginal);
    $nomeFinal = preg_replace('/[^a-zA-Z0-9]/', '', $nomeSemEspaco);

    $extensao = strtolower(pathinfo($Img["name"], PATHINFO_EXTENSION));

    return "Img" . $nomeFinal . "_" . $contador . "." . $extensao;
}

?>