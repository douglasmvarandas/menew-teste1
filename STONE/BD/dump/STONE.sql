-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: localhost    Database: STONE
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.19-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `dados`
--

DROP TABLE IF EXISTS `dados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `telefone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dados`
--

LOCK TABLES `dados` WRITE;
/*!40000 ALTER TABLE `dados` DISABLE KEYS */;
INSERT INTO `dados` VALUES (1,'Cristiano Oliveira','965852301','britonano@gmail.com','rio de janeiro','RJ','funcionario'),(2,'Joyce Mendes','965852301','joycemendes@gmail.com','rio de janeiro','RJ','cliente'),(3,'Maria Mendes ','999999999','mariamendes@gmail.com','belo horizonte','MG','cliente'),(4,'Akilles Victor','888888888','akillesvictor@gmail.com','rio de janeiro','RJ','fornecedor'),(15,'Sandra Silva Brito de Oliveira','878787878','sandrabritoloira@gmail.com','florianopolis','SC','fornecedor'),(16,'Edson Veiga Silva','989898989','edveiga@gmail.com','sao paulo','RJ','cliente'),(17,'carlinhos','2342345223','carlinhosfuba@hotmail.com','rio de janeiro','RJ','cliente'),(19,'João Carlos ','323454312','jocasvk@hotmail.com','rio de janeiro','RJ','funcionario'),(20,'jennifer','123456789','jenny@hotmail.com','manaus','PB','fornecedor');
/*!40000 ALTER TABLE `dados` ENABLE KEYS */;
UNLOCK TABLES;
