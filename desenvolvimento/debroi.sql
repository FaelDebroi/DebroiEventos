-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: debroieventos
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `agendamentovisita`
--

DROP TABLE IF EXISTS `agendamentovisita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agendamentovisita` (
  `IdAgendamentoVisita` int(11) NOT NULL AUTO_INCREMENT,
  `IdCliente` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Hora` time NOT NULL,
  `IdChacara` int(11) NOT NULL,
  `ConfirmacaoAgendamento` int(11) DEFAULT NULL,
  `Mensagem` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`IdAgendamentoVisita`),
  KEY `IdCliente` (`IdCliente`),
  KEY `IdChacara` (`IdChacara`),
  CONSTRAINT `agendamentovisita_ibfk_1` FOREIGN KEY (`IdCliente`) REFERENCES `cliente` (`IdCliente`),
  CONSTRAINT `agendamentovisita_ibfk_2` FOREIGN KEY (`IdChacara`) REFERENCES `chacaras` (`IdChacaras`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agendamentovisita`
--

LOCK TABLES `agendamentovisita` WRITE;
/*!40000 ALTER TABLE `agendamentovisita` DISABLE KEYS */;
INSERT INTO `agendamentovisita` VALUES (1,3,'2025-07-16','17:41:00',2,0,'teste'),(2,3,'2025-07-10','17:41:00',2,0,'teste'),(3,3,'2025-07-05','20:41:00',2,0,'teste'),(4,3,'2025-07-01','17:43:00',2,0,'tsete');
/*!40000 ALTER TABLE `agendamentovisita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chacaras`
--

DROP TABLE IF EXISTS `chacaras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chacaras` (
  `IdChacaras` int(11) NOT NULL AUTO_INCREMENT,
  `IdProprietario` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Descricao` varchar(500) NOT NULL,
  `IdInfoChacaras` int(11) NOT NULL,
  `IdEndereco` int(11) NOT NULL,
  `IdCorretor` int(11) NOT NULL,
  `LocalizacaoUrlMaps` varchar(1000) NOT NULL,
  PRIMARY KEY (`IdChacaras`),
  KEY `IdProprietario` (`IdProprietario`),
  KEY `IdInfoChacaras` (`IdInfoChacaras`),
  KEY `IdEndereco` (`IdEndereco`),
  KEY `IdCorretor` (`IdCorretor`),
  CONSTRAINT `chacaras_ibfk_1` FOREIGN KEY (`IdProprietario`) REFERENCES `proprietario` (`IdProprietario`),
  CONSTRAINT `chacaras_ibfk_2` FOREIGN KEY (`IdInfoChacaras`) REFERENCES `infochacaras` (`IdInfoChacaras`),
  CONSTRAINT `chacaras_ibfk_3` FOREIGN KEY (`IdEndereco`) REFERENCES `endereco` (`IdEndereco`),
  CONSTRAINT `chacaras_ibfk_4` FOREIGN KEY (`IdCorretor`) REFERENCES `corretor` (`IdCorretor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chacaras`
--

LOCK TABLES `chacaras` WRITE;
/*!40000 ALTER TABLE `chacaras` DISABLE KEYS */;
INSERT INTO `chacaras` VALUES (1,2,'Chacara fortaleza','O cenário escolhido para celebrar o casamento é fundamental para os noivos imaginarem e criarem a festa dos seus sonhos. Por isso, escolher o espaço demanda cuidado e atenção. A Chácara Fortaleza facilita o processo decisivo e oferece um ambiente tranquilo, irretocável, que pode ser adaptado a qualquer festa.\r\n\r\nEspaços e capacidade\r\n\r\nA Chácara Fortaleza possui uma área de 20 mil metros quadrados, sendo que o casarão em si ocupa 700 metros quadrados. Há 4 quartos, 5 banheiros, piscina semiolímp',1,1,2,'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d235108.80641256474!2d-47.41472411328121!3d-22.965870399999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c8c93f36c5dee5%3A0x1ab8483a31456599!2sCh%C3%A1cara%20fortaleza!5e0!3m2!1spt-BR!2sbr!4v1751769279888!5m2!1spt-BR!2sbr'),(2,2,'Chacara fortaleza','O cenário escolhido para celebrar o casamento é fundamental para os noivos imaginarem e criarem a festa dos seus sonhos. Por isso, escolher o espaço demanda cuidado e atenção. A Chácara Fortaleza facilita o processo decisivo e oferece um ambiente tranquilo, irretocável, que pode ser adaptado a qualquer festa.\r\n\r\nEspaços e capacidade\r\n\r\nA Chácara Fortaleza possui uma área de 20 mil metros quadrados, sendo que o casarão em si ocupa 700 metros quadrados. Há 4 quartos, 5 banheiros, piscina semiolímp',2,2,2,'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d235108.80641256474!2d-47.41472411328121!3d-22.965870399999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c8c93f36c5dee5%3A0x1ab8483a31456599!2sCh%C3%A1cara%20fortaleza!5e0!3m2!1spt-BR!2sbr!4v1751769279888!5m2!1spt-BR!2sbr');
/*!40000 ALTER TABLE `chacaras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `IdCliente` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Telefone` varchar(15) NOT NULL,
  `Senha` varchar(100) NOT NULL,
  `Cpf` varchar(11) NOT NULL,
  `Admin` int(1) DEFAULT NULL,
  PRIMARY KEY (`IdCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Rafinha Do grau','rafaeldebroi@gmail.com','19989222780','','42957040832',0),(2,'teste','rafael@gmail.com','32323232','familiasda','2147483647',1),(3,'SANDRA MARIA DEBROI','rafaeldebroi@gmail.com','19994750050','12345678','725848820',0),(4,'SANDRA MARIA DEBROI','sandradebroi@gmail.com','19989222780','123456789','725848820',0),(5,'Gustavinho do Grau','gustavo@gmail.com','19991121440','12345678','725848820',0);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contatoclientenaocadastrado`
--

DROP TABLE IF EXISTS `contatoclientenaocadastrado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contatoclientenaocadastrado` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Telefone` varchar(15) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Mensagem` varchar(550) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contatoclientenaocadastrado`
--

LOCK TABLES `contatoclientenaocadastrado` WRITE;
/*!40000 ALTER TABLE `contatoclientenaocadastrado` DISABLE KEYS */;
INSERT INTO `contatoclientenaocadastrado` VALUES (1,'Maria Oliveira','9876543210','maria.oliveira@example.com','Preciso de mais informações sobre as chácaras.'),(2,'Carlos Pereira','5551234567','carlos.pereira@example.com','Estou interessado em agendar uma visita.'),(3,'Ana Costa','4432109876','ana.costa@example.com','Quero saber se há chácaras com área para eventos.');
/*!40000 ALTER TABLE `contatoclientenaocadastrado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `corretor`
--

DROP TABLE IF EXISTS `corretor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `corretor` (
  `IdCorretor` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Cpf` bigint(20) NOT NULL,
  `Telefone` varchar(15) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Endereco` varchar(255) NOT NULL,
  `Descricao` varchar(550) DEFAULT NULL,
  PRIMARY KEY (`IdCorretor`),
  UNIQUE KEY `Cpf` (`Cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `corretor`
--

LOCK TABLES `corretor` WRITE;
/*!40000 ALTER TABLE `corretor` DISABLE KEYS */;
INSERT INTO `corretor` VALUES (1,'Joao da Silva',12345678901,'(11) 91234-5678','joao.silva@gmail.com','Rua das Flores, 123 - São Paulo, SP','Proprietário de imóveis comerciais.'),(2,'Maria Oliveira',98765432100,'(21) 99876-5432','maria.oliveira@hotmail.com','Av. Atlântica, 456 - Rio de Janeiro, RJ','Especializada em administração de propriedades rurais.'),(3,'Carlos Pereira',11223344556,'(31) 91234-8765','carlos.pereira@yahoo.com','Rua Minas Gerais, 789 - Belo Horizonte, MG','Responsável por locação de imóveis residenciais.'),(4,'Ana Souza',55667788900,'(41) 99888-7766','ana.souza@outlook.com','Av. Paraná, 321 - Curitiba, PR','Proprietária de empreendimentos turísticos.'),(5,'Roberto Lima',99887766554,'(61) 99333-4455','roberto.lima@empresa.com','SQN 302 Bloco B, Brasília, DF','Investidor e gestor de patrimônio imobiliário.');
/*!40000 ALTER TABLE `corretor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `endereco` (
  `IdEndereco` int(11) NOT NULL AUTO_INCREMENT,
  `Cep` bigint(20) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `Estado_Id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  PRIMARY KEY (`IdEndereco`),
  KEY `Estado_Id` (`Estado_Id`),
  CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`Estado_Id`) REFERENCES `estado` (`IdEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (1,13040,'Rua Pedro De Abreu','Parque Figueira ','Campinas',26,161),(2,13040,'Rua Pedro De Abreu','Parque Figueira ','Campinas',26,161);
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado` (
  `IdEstado` int(11) NOT NULL AUTO_INCREMENT,
  `Estados` varchar(100) NOT NULL,
  PRIMARY KEY (`IdEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'AC'),(2,'AL'),(3,'AP'),(4,'AM'),(5,'BA'),(6,'CE'),(7,'DF'),(8,'ES'),(9,'GO'),(10,'MA'),(11,'MT'),(12,'MS'),(13,'MG'),(14,'PA'),(15,'PB'),(16,'PR'),(17,'PE'),(18,'PI'),(19,'RJ'),(20,'RN'),(21,'RS'),(22,'RO'),(23,'RR'),(24,'SC'),(25,'SE'),(26,'SP'),(27,'TO');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imgchacaras`
--

DROP TABLE IF EXISTS `imgchacaras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imgchacaras` (
  `Idimg` int(11) NOT NULL AUTO_INCREMENT,
  `idChacara` int(11) DEFAULT NULL,
  `caminho` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Idimg`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imgchacaras`
--

LOCK TABLES `imgchacaras` WRITE;
/*!40000 ALTER TABLE `imgchacaras` DISABLE KEYS */;
INSERT INTO `imgchacaras` VALUES (1,53,'chacara1.jpg'),(2,53,'florips.jpg'),(3,53,'chacara2.jpg'),(4,53,'fortaleza.jpg'),(5,53,'chacara3.jpg'),(6,1,'chacara1.jpg'),(7,1,'florips.jpg'),(8,1,'chacara2.jpg'),(9,1,'fortaleza.jpg'),(10,1,'chacara3.jpg'),(11,1,'chacara1.jpg'),(12,1,'florips.jpg'),(13,1,'chacara2.jpg'),(14,1,'fortaleza.jpg'),(15,1,'chacara3.jpg'),(16,2,'chacara1.jpg'),(17,2,'florips.jpg'),(18,2,'chacara2.jpg'),(19,2,'fortaleza.jpg'),(20,2,'chacara3.jpg');
/*!40000 ALTER TABLE `imgchacaras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `infochacaras`
--

DROP TABLE IF EXISTS `infochacaras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `infochacaras` (
  `IdInfoChacaras` int(11) NOT NULL AUTO_INCREMENT,
  `qtdMaxConvidados` int(11) NOT NULL,
  `qtdMinConvidados` int(11) NOT NULL,
  `Valor` varchar(100) NOT NULL,
  `Wifi` tinyint(1) NOT NULL,
  `Piscina` tinyint(1) NOT NULL,
  `Banheiro` int(11) NOT NULL,
  `Estacionamento` int(11) NOT NULL,
  PRIMARY KEY (`IdInfoChacaras`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `infochacaras`
--

LOCK TABLES `infochacaras` WRITE;
/*!40000 ALTER TABLE `infochacaras` DISABLE KEYS */;
INSERT INTO `infochacaras` VALUES (1,500,50,'5000',1,1,3,50),(2,500,50,'5000',1,1,3,50);
/*!40000 ALTER TABLE `infochacaras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proprietario`
--

DROP TABLE IF EXISTS `proprietario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proprietario` (
  `IdProprietario` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Cpf` bigint(20) NOT NULL,
  `Telefone` varchar(15) NOT NULL,
  `Email` varchar(255) NOT NULL,
  PRIMARY KEY (`IdProprietario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proprietario`
--

LOCK TABLES `proprietario` WRITE;
/*!40000 ALTER TABLE `proprietario` DISABLE KEYS */;
INSERT INTO `proprietario` VALUES (1,'Carlos Oliveira',12345678901,'(11) 91234-5678','carlos.oliveira@gmail.com'),(2,'Fernanda Souza',98765432100,'(21) 99876-5432','fernanda.souza@hotmail.com'),(3,'Juliana Lima',11223344556,'(31) 91234-8765','juliana.lima@yahoo.com');
/*!40000 ALTER TABLE `proprietario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-07-06 19:01:23
