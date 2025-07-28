<?php include('conexao.php'); ?>
<?php
$Chacara_consulta = "SELECT  c.IdChacaras ,e.rua, e.bairro, e.cidade, es.Estados, c.Nome, ic.Wifi, ic.piscina,ic.estacionamento, ic.valor, mg.caminho, c.LocalizacaoUrlMaps
                        FROM endereco e
                        left JOIN chacaras c ON e.IdEndereco = c.IdEndereco
                        left JOIN estado es ON es.IdEstado = e.Estado_Id
                        left JOIN infochacaras ic ON ic.IdInfoChacaras = c.IdInfoChacaras
                        INNER JOIN (
                        SELECT *
                        FROM imgchacaras
                        GROUP BY IdChacara) mg ON mg.IdChacara = c.IdChacaras;";

$Chacara = mysqli_query($conecta, $Chacara_consulta);

if (!$Chacara) {
    die("falha na consulta ao banco de dados");
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Fixo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="../css/chacaras.css">

</head>

<body>
    <header class="menu-fixo">
        <?php include 'menuBarra.php'; ?>
    </header>
    <div class="container">
        <?php
        while ($Linha = mysqli_fetch_assoc($Chacara)) {

            //atrativos
            $atrativos = [];

            if ($Linha["Wifi"] == 1) {
                $atrativos[] = "Wifi";
            }

            if ($Linha["piscina"] == 1) {
                $atrativos[] = "Piscina";
            }


            // Junta todos os atrativos separados por vírgula
            $Atrativos = implode(", ", $atrativos);


            ?>

            <div class="chacara">
                <div class="imgChacara">
                    <?php if (!empty($Linha['caminho'])): ?>
                        <img src="../img/uploads/<?php echo $Linha['caminho']; ?>" class="imagemlogo"
                            alt="<?php echo $Linha['caminho']; ?>">
                    <?php else: ?>
                        <!-- img -->
                        <img src="../img/Chacarasimg/fortaleza.jpg" class="imagemlogo" alt="Logo padrão">
                    <?php endif; ?>
                </div>
                <div class="divTextoChacara">
                    <h1><?php echo "Chácara: " . $Linha["Nome"] ?></h1>
                    <div class="chacaraObservacoes">
                        <ul>
                            <li>
                                <strong>Localizacao:</strong>
                                <span class="cortar-texto">
                                    <?php echo $Linha["rua"] . ", " . $Linha["bairro"] . ", " . $Linha["cidade"] . "-" . $Linha["Estados"]; ?>
                                </span>
                            </li>
                            <li><Strong>Atrativos: </Strong><?php echo $Atrativos ?></li>
                            <li><Strong>Valor: </Strong><?php echo $Linha["valor"] ?></li>
                        </ul>
                    </div>
                </div>
                <div class="divbtnChacara">
                    <a href="InfoChacaras.php?codigo=<?php echo $Linha["IdChacaras"] ?>">
                        <button class="btnSobre" id="idSobre">Sobre</button>
                    </a>
                    <!-- passar o nome da chacara -->
                    <a href="agendamento.php?codigo=<?php echo $Linha["IdChacaras"] ?>">
                        <button class="btnAgendamento" id="Agendar visita">Agendar Visita</button>
                    </a>
                </div>

            </div>
        <?php } ?>

    </div>


    <script src="../js/chacaras.js"></script>


</body>


</html>

<?php
mysqli_close($conecta);
?>