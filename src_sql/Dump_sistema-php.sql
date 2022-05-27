CREATE DATABASE  IF NOT EXISTS `sistema-php` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sistema-php`;
-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: sistema-php
-- ------------------------------------------------------
-- Server version	8.0.21

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
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `idCliente` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cpf` bigint NOT NULL,
  `rg` bigint NOT NULL,
  `dataNascimento` date NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'fulano',45465,465465,'2022-03-12'),(2,'9999',999,9999,'2022-03-29'),(4,'fulano',45465,465465,'2022-03-12'),(6,'fulano',45465,465465,'2022-03-12'),(7,'fulano',45465,465465,'2022-03-12'),(8,'fulano',45465,465465,'2022-03-12'),(9,'fulano',45465,465465,'2022-03-12'),(10,'fulano',45465,465465,'2022-03-12'),(11,'fulano',45465,465465,'2022-03-12'),(12,'fulano',45465,465465,'2022-03-12'),(13,'fulano',45465,465465,'2022-03-12'),(14,'fulano',45465,465465,'2022-03-12'),(15,'fulano',45465,465465,'2022-03-12'),(16,'fulano',45465,465465,'2022-03-12'),(17,'fulano',45465,465465,'2022-03-12'),(18,'fulano',45465,465465,'2022-03-12'),(19,'fulano',45465,465465,'2022-03-12'),(20,'fulano',45465,465465,'2022-03-12'),(21,'fulano',45465,465465,'2022-03-12'),(22,'fulano',45465,465465,'2022-03-12'),(25,'fulano',45465,465465,'2022-03-12'),(26,'fulano',45465,465465,'2022-03-12'),(27,'fulano',45465,465465,'2022-03-12'),(29,'fulano',45465,465465,'2022-03-12'),(32,'333',333,333,'2022-03-31'),(33,'jailton de Araujo Santos',8096036599,554854,'2005-06-16');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `endereco` (
  `idEndereco` int NOT NULL AUTO_INCREMENT,
  `idCliente` int NOT NULL,
  `cep` int NOT NULL,
  `logradouro` varchar(60) NOT NULL,
  `complemento` varchar(40) NOT NULL,
  `bairro` varchar(40) NOT NULL,
  `cidade` varchar(35) NOT NULL,
  `numero` int NOT NULL,
  `uf` varchar(3) NOT NULL,
  PRIMARY KEY (`idEndereco`),
  KEY `fk_endereco_cliente` (`idCliente`),
  CONSTRAINT `fk_endereco_cliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (1,1,1153000,'Rua Vitorino Carmilo','Acolá','Barra Funda','São Paulo',32,'SP'),(2,2,48800000,'999','999','99','Monte Santo',9999,'BA'),(4,4,1153000,'Rua Vitorino Carmilo','Acolá','Barra Funda','São Paulo',32,'SP'),(6,6,1153000,'Rua Vitorino Carmilo','Acolá','Barra Funda','São Paulo',32,'SP'),(7,7,1153000,'Rua Vitorino Carmilo','Acolá','Barra Funda','São Paulo',32,'SP'),(8,8,1153000,'Rua Vitorino Carmilo','Acolá','Barra Funda','São Paulo',32,'SP'),(9,9,1153000,'Rua Vitorino Carmilo','Acolá','Barra Funda','São Paulo',32,'SP'),(10,10,1153000,'Rua Vitorino Carmilo','Acolá','Barra Funda','São Paulo',32,'SP'),(11,11,1153000,'Rua Vitorino Carmilo','Acolá','Barra Funda','São Paulo',32,'SP'),(12,12,1153000,'Rua Vitorino Carmilo','Acolá','Barra Funda','São Paulo',32,'SP'),(13,13,1153000,'Rua Vitorino Carmilo','Acolá','Barra Funda','São Paulo',32,'SP'),(14,14,1153000,'Rua Vitorino Carmilo','Acolá','Barra Funda','São Paulo',32,'SP'),(15,15,1153000,'Rua Vitorino Carmilo','Acolá','Barra Funda','São Paulo',32,'SP'),(16,16,1153000,'Rua Vitorino Carmilo','Acolá','Barra Funda','São Paulo',32,'SP'),(17,17,1153000,'Rua Vitorino Carmilo','Acolá','Barra Funda','São Paulo',32,'SP'),(18,18,1153000,'Rua Vitorino Carmilo','Acolá','Barra Funda','São Paulo',32,'SP'),(19,19,1153000,'Rua Vitorino Carmilo','Acolá','Barra Funda','São Paulo',32,'SP'),(20,20,1153000,'Rua Vitorino Carmilo','Acolá','Barra Funda','São Paulo',32,'SP'),(21,21,1153000,'Rua Vitorino Carmilo','Acolá','Barra Funda','São Paulo',32,'SP'),(22,22,1153000,'Rua Vitorino Carmilo','Acolá','Barra Funda','São Paulo',32,'SP'),(25,25,1153000,'Rua Vitorino Carmilo','Acolá','Barra Funda','São Paulo',32,'SP'),(26,26,1153000,'Rua Vitorino Carmilo','Acolá','Barra Funda','São Paulo',32,'SP'),(27,27,1153000,'Rua Vitorino Carmilo','Acolá','Barra Funda','São Paulo',32,'SP'),(29,29,1153000,'Rua Vitorino Carmilo','Acolá','Barra Funda','São Paulo',32,'SP'),(32,32,48500000,'333','333','333','Euclides da Cunha',333,'BA'),(33,33,48800000,'povoado mandassaia','Zona rural','sem bairro','Monte Santo',23,'BA');
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idusuario` int NOT NULL AUTO_INCREMENT,
  `login` varchar(40) NOT NULL,
  `senha` varchar(30) NOT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  UNIQUE KEY `senha_UNIQUE` (`senha`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'admin','12345');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-18 23:32:34
