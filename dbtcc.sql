CREATE DATABASE  IF NOT EXISTS `dbtcc` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `dbtcc`;
-- MariaDB dump 10.17  Distrib 10.4.11-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: dbtcc
-- ------------------------------------------------------
-- Server version	10.4.11-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `agendamento`
--

DROP TABLE IF EXISTS `agendamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agendamento` (
  `id_agendamento` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `barbearia` int(11) NOT NULL,
  `data_agendamento` date NOT NULL,
  `horario_agendamento` time NOT NULL,
  `valor_total` decimal(10,0) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'P' COMMENT 'F - finalizado | P - pendente | C - Cancelado',
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_agendamento`),
  KEY `fk_user_id` (`usuario`),
  KEY `fk_barbearia_id` (`barbearia`),
  CONSTRAINT `fk_barbearia_id` FOREIGN KEY (`barbearia`) REFERENCES `barbearia` (`barbearia_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_id` FOREIGN KEY (`usuario`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agendamento`
--

LOCK TABLES `agendamento` WRITE;
/*!40000 ALTER TABLE `agendamento` DISABLE KEYS */;
INSERT INTO `agendamento` VALUES (1,3,8,'2020-11-22','14:00:00',18,'F','2020-11-22 15:08:15'),(12,3,8,'2020-11-26','18:00:00',18,'F','2020-11-26 19:26:34'),(13,3,8,'2020-11-27','10:00:00',28,'F','2020-11-27 02:05:00'),(14,3,8,'2020-11-27','12:30:00',10,'F','2020-11-27 02:05:14'),(15,3,8,'2020-11-27','13:30:00',10,'F','2020-11-27 02:12:40'),(16,4,8,'2020-12-07','13:00:00',18,'F','2020-12-04 15:16:25'),(19,5,8,'2020-12-07','17:30:00',25,'F','2020-12-07 18:21:22'),(20,3,8,'2020-12-08','18:00:00',34,'P','2020-12-08 12:59:19');
/*!40000 ALTER TABLE `agendamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agendamento_servico`
--

DROP TABLE IF EXISTS `agendamento_servico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agendamento_servico` (
  `agendamento` int(11) NOT NULL,
  `servico` int(11) NOT NULL,
  KEY `fk_agendamento_servico` (`agendamento`),
  KEY `fk_servico_agendamento` (`servico`),
  CONSTRAINT `fk_agendamento_servico` FOREIGN KEY (`agendamento`) REFERENCES `agendamento` (`id_agendamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_servico_agendamento` FOREIGN KEY (`servico`) REFERENCES `servico` (`id_servico`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agendamento_servico`
--

LOCK TABLES `agendamento_servico` WRITE;
/*!40000 ALTER TABLE `agendamento_servico` DISABLE KEYS */;
INSERT INTO `agendamento_servico` VALUES (12,1),(13,1),(13,2),(14,2),(15,2),(16,1),(19,15),(20,15),(20,17);
/*!40000 ALTER TABLE `agendamento_servico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `barbearia`
--

DROP TABLE IF EXISTS `barbearia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barbearia` (
  `barbearia_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_dono` varchar(45) NOT NULL,
  `cpf_dono` varchar(45) NOT NULL,
  `email_dono` varchar(45) NOT NULL,
  `senha_dono` varchar(45) NOT NULL,
  `nome_barbearia` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `cep` varchar(45) NOT NULL,
  `cnpj` varchar(45) NOT NULL,
  `rua` varchar(45) NOT NULL,
  `num_bar` varchar(10) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `uf` varchar(45) NOT NULL,
  `horario_abertura` time DEFAULT NULL,
  `horario_fechamento` time DEFAULT NULL,
  `horario_abertura_final_semana` time DEFAULT NULL,
  `horario_fechamento_final_semana` time DEFAULT NULL,
  `imagem_barbearia` varchar(100) DEFAULT NULL,
  `sobre_barber` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`barbearia_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barbearia`
--

LOCK TABLES `barbearia` WRITE;
/*!40000 ALTER TABLE `barbearia` DISABLE KEYS */;
INSERT INTO `barbearia` VALUES (8,'Almeida','111.111.111-11','barbearia_almeida@hotmail.com','b400de1f64beb532d80982347ebb5989','Barbearia Almeida','(75) 98116-6233','44032-568','11.111.111/1111-11','Rua Professora Bertholina Carneiro','353 ','Campo Limpo','Feira de Santana','BA','08:00:00','19:00:00','08:00:00','19:00:00','https://i.ibb.co/FsLkzFB/almeida.png',NULL),(9,'Marcão','222.222.222-22','barbearia_marcao@hotmail.com','131adea421048c8644ed90e41b2fee77','Barbearia Sr. Marcão','(75) 99283-7999','44033-103','22.222.222/2222-22','Rua Desembarque','298','Campo Limpo','Feira de Santana','BA','08:00:00','18:00:00','08:00:00','18:00:00','https://i.ibb.co/6HYjDmG/ddddd.png',NULL),(10,'Guto ','333.333.333-33','guto_barbearia@gmail.com','25798ef6bed8c2875edf7121b9fcd18a','Guto Barbearia','(75) 99164-6434','44021-225','33.333.333/3333-33','Rua Arivaldo de Carvalho','54','Sobradinho','Feira de Santana','BA','09:00:00','19:00:00','09:00:00','19:00:00','https://i.ibb.co/GCwLwCw/guto.png',NULL),(11,'Siqueira','444.444.444-44','siqueira@gmail.com','45d0b1d56f056433c894563d4e20c89f','Barbearia Siqueira','(75) 98143-1976','44050-024','44.444.444/4444-44','Rua Intendente Abdon','7654','Queimadinha','Feira de Santana','BA','09:00:00','18:00:00','09:00:00','18:00:00','https://i.ibb.co/12vLvNq/siqueira.png',NULL),(12,'Matheus','555.555.555-55','matheus_cortes@gmail.com','e56b6eea9b0bc782bbb9ea6098ead641','Matheus Cortes','(75) 98143-7191','44028-279','55.555.555/5555-55','Rua Olhos Verdes','149 ','Gabriela','Feira de Santana','BA','08:00:00','19:20:00','08:00:00','19:30:00','https://i.ibb.co/GcPND7P/matheus-cortes.png',NULL),(13,'Figueredo','666.666.666-66','figueredo@hotmail.com','2fdc2b916cbaac14a0339f076a71111d','Barbearia Figueredo','(75) 98347-1670','44053-654','66.666.666/6666-66','Rua Gérson','11 ','Cidade Nova','Feira de Santana','BA',NULL,NULL,NULL,NULL,NULL,NULL),(14,'Primos','777.777.777-77','primos_barbershop@hotmail.com','8b4521bba5f609ca1b20530190f91c52','Primos Barber Shop','(75) 98245-8944','44021-225','77.777.777/7777-77','Rua Arivaldo de Carvalho','1299 ','Sobradinho','Feira de Santana','BA',NULL,NULL,NULL,NULL,NULL,NULL),(15,'Dielson','888.888.888-88','dielson@gmail.com','25f9e794323b453885f5181f1b624d0b','Dielson barbearia','(75) 99277-6848','44024-336','88.888.888/8888-88','Rua Paulo Afonso','74','Jardim Cruzeiro','Feira de Santana','BA',NULL,NULL,NULL,NULL,NULL,NULL),(16,'Allan','999.999.999-99','allan@hotmail.com','d41222a59835f1805e182164ddf470e1','Barbearia Allabarber','(75) 98120-4535','44059-720','99.999.999/9999-99','Rua Papagaio','80','Papagaio','Feira de Santana','BA',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `barbearia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servico`
--

DROP TABLE IF EXISTS `servico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servico` (
  `id_servico` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `preco` decimal(10,0) NOT NULL,
  `barbearia` int(11) NOT NULL,
  PRIMARY KEY (`id_servico`),
  KEY `fk_barbearia_servico` (`barbearia`),
  CONSTRAINT `fk_barbearia_servico` FOREIGN KEY (`barbearia`) REFERENCES `barbearia` (`barbearia_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servico`
--

LOCK TABLES `servico` WRITE;
/*!40000 ALTER TABLE `servico` DISABLE KEYS */;
INSERT INTO `servico` VALUES (1,'Corte de Cabelo',18,8),(2,'Corte de Barba',10,8),(15,'Cabelo e Barba',25,8),(17,'Sombracelha',9,8);
/*!40000 ALTER TABLE `servico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `data_de_nascimento` date NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'joao','(78) 97897-9878','2000-03-29','324.423.432-43','ewqewqe@asdasd.com','123456789'),(2,'teste','(42) 34234-3243','1999-03-31','343.434.343-43','asdasdsad@ajsdk.com','315eb115d98fcbad39ffc5edebd669c9'),(3,'Admin','(77) 88888-8888','2001-02-28','999.999.999-99','teste@teste.com','17003122b89ccb2a3d7d4970de0d91ae'),(4,'Testador','(75) 98887-7747','2000-07-04','565.656.565-65','testador@gmail.com','25f9e794323b453885f5181f1b624d0b'),(5,'Mateus','(23) 21353-4534','1999-12-10','325.454.365-46','mateus@gmail.com','25f9e794323b453885f5181f1b624d0b');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'dbtcc'
--
/*!50003 DROP PROCEDURE IF EXISTS `PROC_AGENDAMENTOS_BARBEARIA` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_AGENDAMENTOS_BARBEARIA`(
	IN id_barbearia INT
)
BEGIN
	select 
		agendamento.id_agendamento,
		agendamento.barbearia,
		agendamento.data_agendamento, 
		agendamento.horario_agendamento,
		agendamento.valor_total,
		agendamento.status,
		agendamento.data_criacao,
		group_concat(concat(" ", servico.nome)) as "nome_servico",
		user.nome as "nome_usuario"
	from agendamento_servico
	inner join agendamento
	on agendamento_servico.agendamento = agendamento.id_agendamento
	inner join servico
	on agendamento_servico.servico = servico.id_servico
	inner join user
	on agendamento.usuario = user.user_id
	where agendamento.barbearia=id_barbearia
	group by agendamento.id_agendamento;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROC_AGENDAMENTOS_USUARIO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_AGENDAMENTOS_USUARIO`(
	IN usuario INT
)
BEGIN
	SELECT 
		barbearia.nome_barbearia,
		agendamento.data_agendamento,
		agendamento.horario_agendamento,
		group_concat(concat(" ", servico.nome)) as "nome_servico",
		agendamento.valor_total,
		barbearia.rua,
		barbearia.num_bar,
		barbearia.bairro,
		barbearia.telefone
	FROM agendamento_servico
	INNER JOIN agendamento
	ON agendamento_servico.agendamento = agendamento.id_agendamento
	INNER JOIN barbearia
	ON agendamento.barbearia = barbearia.barbearia_id
	INNER JOIN servico
	ON agendamento_servico.servico = servico.id_servico
	WHERE agendamento.status = 'P' AND agendamento.usuario = usuario
    GROUP BY barbearia.nome_barbearia;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROC_DEL_SERVICO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_DEL_SERVICO`(
	IN servico INT,
    IN id_barbearia INT
)
BEGIN
	DELETE FROM servico 
    WHERE id_servico = servico and barbearia = id_barbearia;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROC_INS_AGENDAMENTO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_INS_AGENDAMENTO`(
	IN id_usuario INT,
    IN id_barbearia INT,
    IN data_agendamento_escolhida DATE,
    IN horario_agendamento_escolhido TIME,
    IN valor_total_escolhido DECIMAL
)
BEGIN
	INSERT INTO agendamento (
		usuario,
        barbearia,
        data_agendamento,
        horario_agendamento,
        valor_total,
        status
    ) VALUES (
		id_usuario,
        id_barbearia,
        data_agendamento_escolhida,
        horario_agendamento_escolhido,
        valor_total_escolhido,
        'P'
    );
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROC_INS_AGENDAMENTO_SERVICO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_INS_AGENDAMENTO_SERVICO`(
	IN id_agendamento INT,
    IN servico INT
)
BEGIN
	INSERT INTO agendamento_servico(
		agendamento,
        servico
    ) VALUES (
		id_agendamento,
        servico
    );
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROC_INS_SERVICO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_INS_SERVICO`(
	IN nome_servico VARCHAR(45),
    IN preco_servico DECIMAL,
    IN id_barbearia INT
)
BEGIN
	INSERT INTO servico (nome, preco, barbearia)
	VALUES (nome_servico, preco_servico, id_barbearia);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROC_LUCRO_TOTAL_DIA` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_LUCRO_TOTAL_DIA`(
	IN data_hoje DATE,
	IN id_barbearia INT
)
BEGIN
	select 
		sum(valor_total) as "lucro_total"
	from agendamento
	where data_agendamento = data_hoje
	and agendamento.barbearia = id_barbearia;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROC_PESQUISAR_BARBEARIAS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_PESQUISAR_BARBEARIAS`(
	in nome varchar(45),
    in cidade varchar(45),
    in horario time
)
BEGIN
	SELECT 
		barbearia_id,
		nome_barbearia,
		horario_abertura,
		horario_fechamento,
		horario_abertura_final_semana,
		horario_fechamento_final_semana,
		telefone,
		cidade,
        imagem_barbearia
	FROM barbearia
	WHERE nome_barbearia LIKE concat('%', nome, '%') AND 
		  cidade  LIKE concat('%', cidade, '%') AND
		  horario >= horario_abertura AND horario <= horario_fechamento
	LIMIT 16;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROC_SEL_BARBEARIA` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_SEL_BARBEARIA`(
	IN barbearia INT
)
BEGIN
	SELECT 
		nome_barbearia,
        telefone,
        rua,
        num_bar,
        bairro,
        cidade,
        uf
        cep, 
        horario_abertura,
        horario_fechamento, 
        horario_abertura_final_semana,
        horario_fechamento_final_semana
    FROM barbearia WHERE barbearia.barbearia_id = barbearia;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROC_SEL_CARD_BARBEARIAS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_SEL_CARD_BARBEARIAS`()
BEGIN
	SELECT 
		barbearia_id,
		nome_barbearia,
        horario_abertura,
        horario_fechamento,
        horario_abertura_final_semana,
        horario_fechamento_final_semana,
		telefone,
		cidade,
        imagem_barbearia
	FROM barbearia
    LIMIT 16;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROC_SEL_SERVICOS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_SEL_SERVICOS`(
	IN id_barbearia INT
)
BEGIN
	SELECT 
		id_servico,
		nome, 
        preco
	FROM servico
	WHERE barbearia = id_barbearia;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROC_SEL_USUARIO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_SEL_USUARIO`(IN usuario INT)
BEGIN
	SELECT * FROM user WHERE user.user_id = usuario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROC_SEL_VALOR_SERVICO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_SEL_VALOR_SERVICO`(
	IN nome_servico VARCHAR(45),
    IN id_barbearia INT
)
BEGIN
	SELECT preco
    FROM servico
    WHERE nome = nome_servico and barbearia = id_barbearia;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROC_SERVICO_MAIS_REQUISITADO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_SERVICO_MAIS_REQUISITADO`(
	IN data_atual DATE,
	IN id_barbearia INT
)
BEGIN
	select 
		servico.nome,
		count(servico.nome) as "quantidade"
	from agendamento_servico
	inner join agendamento
	on agendamento_servico.agendamento = agendamento.id_agendamento
	inner join servico
	on agendamento_servico.servico = servico.id_servico
	where data_agendamento = data_atual and agendamento.barbearia = id_barbearia
	group by servico.nome asc
    limit 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROC_TOTAL_SERVICOS_DIA` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_TOTAL_SERVICOS_DIA`(
	IN data_hoje DATE,
	IN id_barbearia INT
)
BEGIN
    select 
		count(*) as "quantidade"
	from agendamento
	where data_agendamento = data_hoje and agendamento.barbearia = id_barbearia;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROC_UP_USER` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_UP_USER`(
	IN usuario INT,
	IN nome_atualizado VARCHAR(45),
    IN telefone_atualizado VARCHAR(45),
    IN data_de_nascimento_atualizado DATE
)
BEGIN
	UPDATE user
    SET nome = nome_atualizado, 
		telefone = telefone_atualizado,
        data_de_nascimento = data_de_nascimento_atualizado
    WHERE user.user_id = usuario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-08 11:44:04
