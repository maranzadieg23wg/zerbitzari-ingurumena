-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: 10.14.0.2    Database: mydatabase
-- ------------------------------------------------------
-- Server version	5.5.5-10.9.8-MariaDB-1:10.9.8+maria~ubu2204

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
-- Table structure for table `herria`
--

DROP TABLE IF EXISTS `herria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `herria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `izena` mediumtext DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `herria`
--

LOCK TABLES `herria` WRITE;
/*!40000 ALTER TABLE `herria` DISABLE KEYS */;
INSERT INTO `herria` VALUES (1,'Donostia'),(2,'Aizarna'),(3,'Bilbao');
/*!40000 ALTER TABLE `herria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `iragarpen_eguna`
--

DROP TABLE IF EXISTS `iragarpen_eguna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `iragarpen_eguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eguna` date DEFAULT NULL,
  `eguraldia` mediumtext DEFAULT NULL,
  `tenperatura_min` float DEFAULT NULL,
  `tenperatura_max` float DEFAULT NULL,
  `herria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `herria` (`herria`),
  CONSTRAINT `iragarpen_eguna_ibfk_1` FOREIGN KEY (`herria`) REFERENCES `herria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `iragarpen_eguna`
--

LOCK TABLES `iragarpen_eguna` WRITE;
/*!40000 ALTER TABLE `iragarpen_eguna` DISABLE KEYS */;
INSERT INTO `iragarpen_eguna` VALUES (1,'2024-11-11','Oskarbi',0,17.5,1),(2,'2024-10-11','Oskarbi',-10,200,2),(3,'2024-10-11','Hodei-gutxi',10.56,25.5,3),(4,'2024-11-12','Eguzkitzu',15,18.96,1);
/*!40000 ALTER TABLE `iragarpen_eguna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `iragarpena_orduko`
--

DROP TABLE IF EXISTS `iragarpena_orduko`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `iragarpena_orduko` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ordua` time DEFAULT NULL,
  `eguraldia` mediumtext DEFAULT NULL,
  `tenperatura` float DEFAULT NULL,
  `prezipitazioa` float DEFAULT NULL,
  `haizea_nondik` mediumtext DEFAULT NULL,
  `haizea-km/h` float DEFAULT NULL,
  `eguna` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `eguna` (`eguna`),
  CONSTRAINT `iragarpena_orduko_ibfk_1` FOREIGN KEY (`eguna`) REFERENCES `iragarpen_eguna` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `iragarpena_orduko`
--

LOCK TABLES `iragarpena_orduko` WRITE;
/*!40000 ALTER TABLE `iragarpena_orduko` DISABLE KEYS */;
INSERT INTO `iragarpena_orduko` VALUES (1,'10:30:00','Hodeitzu',50,0,'Ipar',50,1),(2,'11:00:00','Euritzu',10,50,'Hegoalde',200.42,1),(3,'10:30:00','Eguzkitzu',20,0,'Ipar-Hegoalde',2,2),(4,'10:30:00','Dana',10,500,'Ipar-Hegoalde',300,3),(5,'09:00:00','Ekaitza',5.36,35.2,'Hegoalde',60.5,4);
/*!40000 ALTER TABLE `iragarpena_orduko` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'mydatabase'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-11 11:06:13
