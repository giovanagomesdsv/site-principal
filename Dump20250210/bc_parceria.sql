CREATE DATABASE  IF NOT EXISTS `bc` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `bc`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bc
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
-- Table structure for table `parceria`
--

DROP TABLE IF EXISTS `parceria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parceria` (
  `cnpj` varchar(18) NOT NULL,
  `rg` varchar(15) DEFAULT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `endereco` varchar(70) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `instagram` varchar(80) DEFAULT NULL,
  `tiktok` varchar(80) DEFAULT NULL,
  `x_social` varchar(80) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cnpj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parceria`
--

LOCK TABLES `parceria` WRITE;
/*!40000 ALTER TABLE `parceria` DISABLE KEYS */;
INSERT INTO `parceria` VALUES ('00.623.904/0001-73','','livraria-encanto','$2y$10$nnoxaQKraV93O7rAFn4p6ODW0drLnHqoSQkINEe7A2ysOrS7Co7xi','Livraria Encanto','Praça Maria do Carmo da Silva, 786','Praia Grande','SP','84981338723','livrariaencanto@gmail.com','https://www.instagram.com/livrariaencanto/','https://www.tiktok.com/@livraria_encantada','','67a1f4dc384fe.jpg'),('1','67.976.666-2','ADMgomes','$2y$10$d2HrY3sXmM0fhue/S3RK.etJ5jeErv4wstAUJtip3alXtMCUBVaoG','Giovana Gomes','','','','','','','','',''),('23.693.012/0001-98','','oceano-livros','$2y$10$FyFqugL5XBe3u0sDTPS5kOTDO/VhHa8Bc3Pvx9D17KBqe8bxDOyMW','Distribuidora Oceano de Livros','Rua Geralda Ferreira Cardoso, 78','Araxá','MG','5511914486420','distribuidoraoceano@gmail.com','https://www.instagram.com/oceano.livros/','','','67a1f757efee5.jpg'),('90.245.164/0001-54','','pag-coloridas','$2y$10$HMRZlgz87Lr7PfDcy/FcP.njktudbHV6Vrx1udAA8t8HUO74iFmFW','Livraria Páginas Coloridas','Praça Doutor Luiz Gualda Júnior','Praça Doutor Luiz Gualda Júnio','RJ','11982766985','pag.coloridas@gjmail.com','https://www.instagram.com/apaginalivrarias/','https://www.tiktok.com/@livrariapaginas','','67a1f8fcdbebe.jpg');
/*!40000 ALTER TABLE `parceria` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-10 19:07:15
