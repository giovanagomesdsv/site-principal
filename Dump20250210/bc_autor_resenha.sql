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
-- Table structure for table `autor_resenha`
--

DROP TABLE IF EXISTS `autor_resenha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autor_resenha` (
  `id_autor_resenha` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `pseudonimo` varchar(40) NOT NULL,
  `pontos` int(11) DEFAULT 10,
  `descricao` text NOT NULL,
  `path` varchar(255) NOT NULL,
  `endereco` varchar(70) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `instagram` varchar(80) DEFAULT NULL,
  `tiktok` varchar(80) DEFAULT NULL,
  `x_social` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id_autor_resenha`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autor_resenha`
--

LOCK TABLES `autor_resenha` WRITE;
/*!40000 ALTER TABLE `autor_resenha` DISABLE KEYS */;
INSERT INTO `autor_resenha` VALUES (11,'Giovana Gomes da Silva','Lizzy Bennet',10,'Elizabeth Bennet (Orgulho e Preconceito de Jane Austen) é uma leitora ávida que adora livros, usando-os como fonte de conhecimento e reflexão. Sua inteligência e curiosidade são traços marcantes de sua personalidade. Assim como Lizzy sou apaixonada por livros, acredito que tudo o que precisamos é de apenas um bom livro e meia hora de sossego que tudo se resolve.','67a1f9f1be751.jpg','Rua Deputado Romero Pereira, 33','Queiroz','SP','5514996910578','giovana.gomesds577@gmail.com','https://www.instagram.com/_giogds/','','');
/*!40000 ALTER TABLE `autor_resenha` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-10 19:07:16
