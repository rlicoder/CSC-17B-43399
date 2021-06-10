-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: localhost    Database: timelogger
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.18-MariaDB

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
-- Table structure for table `entity_sessions`
--

DROP TABLE IF EXISTS `entity_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entity_sessions` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `session_user_id` int(11) DEFAULT NULL,
  `session_start_time` datetime DEFAULT NULL,
  `session_end_time` datetime DEFAULT NULL,
  `session_subject` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entity_sessions`
--

LOCK TABLES `entity_sessions` WRITE;
/*!40000 ALTER TABLE `entity_sessions` DISABLE KEYS */;
INSERT INTO `entity_sessions` VALUES (1,4,'2021-06-06 19:03:43','2021-06-06 19:03:44','MAT-3'),(3,4,'2021-06-06 19:42:21','2021-06-06 19:42:22','CSC-17B'),(4,4,'2021-06-06 19:45:41','2021-06-06 19:45:41','MAT-3'),(5,4,'2021-06-06 19:45:41','2021-06-06 19:45:41','MAT-3'),(7,1,'2021-06-08 07:21:26','2021-06-08 07:21:27','MAT-3'),(9,1,'1111-11-11 11:11:11','1111-11-11 11:22:22','MAT-3'),(10,4,'1111-11-11 11:11:11','1111-11-11 11:22:22','PHYS-4A'),(11,4,'2021-06-09 15:31:59','2021-06-09 16:32:01','MAT-3'),(12,2,'1111-11-11 11:11:11','1111-11-11 11:22:22','MAT-3');
/*!40000 ALTER TABLE `entity_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entity_subject`
--

DROP TABLE IF EXISTS `entity_subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entity_subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entity_subject`
--

LOCK TABLES `entity_subject` WRITE;
/*!40000 ALTER TABLE `entity_subject` DISABLE KEYS */;
INSERT INTO `entity_subject` VALUES (1,'MAT-3'),(2,'PHYS-4A'),(3,'CSC-17B');
/*!40000 ALTER TABLE `entity_subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entity_users`
--

DROP TABLE IF EXISTS `entity_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entity_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(30) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_type` varchar(10) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entity_users`
--

LOCK TABLES `entity_users` WRITE;
/*!40000 ALTER TABLE `entity_users` DISABLE KEYS */;
INSERT INTO `entity_users` VALUES (1,'rlnguyen','Abc12345','admin'),(3,'useruser','Abc12345','user'),(4,'asdfasdf','asdfasdf','user');
/*!40000 ALTER TABLE `entity_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-09 19:05:59
