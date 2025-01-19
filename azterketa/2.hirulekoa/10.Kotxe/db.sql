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
-- Table structure for table `jabeak`
--

DROP TABLE IF EXISTS `jabeak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jabeak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `DNI` varchar(9) NOT NULL,
  `izena` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jabeak`
--

LOCK TABLES `jabeak` WRITE;
/*!40000 ALTER TABLE `jabeak` DISABLE KEYS */;
INSERT INTO `jabeak` VALUES (1,'12345678R','Manex'),(2,'98765432T','Julen'),(3,'15975362G','Ivan'),(4,'35795126F','Ibai');
/*!40000 ALTER TABLE `jabeak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kotxeak`
--

DROP TABLE IF EXISTS `kotxeak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kotxeak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jabea_id` int(11) DEFAULT NULL,
  `matrikula` varchar(7) NOT NULL,
  `matrikulazio_data` date DEFAULT NULL,
  `itv` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jabea_id` (`jabea_id`),
  CONSTRAINT `kotxeak_ibfk_1` FOREIGN KEY (`jabea_id`) REFERENCES `jabeak` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kotxeak`
--

LOCK TABLES `kotxeak` WRITE;
/*!40000 ALTER TABLE `kotxeak` DISABLE KEYS */;
INSERT INTO `kotxeak` VALUES (1,1,'9989YDF','2022-12-12',1),(2,1,'9363BYY','2000-10-01',0),(3,2,'H1645JF','2015-05-09',1),(4,3,'CD75601','1984-04-05',0),(5,4,'CD06778','0192-01-01',1);
/*!40000 ALTER TABLE `kotxeak` ENABLE KEYS */;
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

-- Dump completed on 2024-11-18 12:28:42
