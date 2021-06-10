-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: localhost    Database: surveyengine
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
-- Table structure for table `entity_surveys`
--

DROP TABLE IF EXISTS `entity_surveys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entity_surveys` (
  `survey_id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_name` text NOT NULL,
  `survey_key` text NOT NULL,
  `survey_jsontext` text NOT NULL,
  `survey_user_id` int(11) NOT NULL,
  PRIMARY KEY (`survey_id`),
  KEY `survey_user_id` (`survey_user_id`),
  CONSTRAINT `entity_surveys_ibfk_1` FOREIGN KEY (`survey_user_id`) REFERENCES `entity_users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entity_surveys`
--

LOCK TABLES `entity_surveys` WRITE;
/*!40000 ALTER TABLE `entity_surveys` DISABLE KEYS */;
INSERT INTO `entity_surveys` VALUES (4,'Best Game Opinion','9176815904160270540605287858403055540601','{\"name\":\"Best Game Opinion\",\"desc\":\"Choose your opinion\",\"qArray\":[]}',4),(5,'default name','6304978475239186747642533984865948084293','{\"name\":\"default name\",\"desc\":\"default description\",\"qArray\":[]}',4),(6,'1','2440760069108274453303685926295010819937','{\"name\":\"1\",\"desc\":\"default description\",\"qArray\":[{\"cat\":\"ques0\",\"qstn\":\"1\",\"ans\":[\"2\",\"3\"],\"ansCount\":[0,1]},{\"cat\":\"ques1\",\"qstn\":\"3\",\"ans\":[\"2\",\"1\"],\"ansCount\":[0,1]}]}',4);
/*!40000 ALTER TABLE `entity_surveys` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entity_users`
--

LOCK TABLES `entity_users` WRITE;
/*!40000 ALTER TABLE `entity_users` DISABLE KEYS */;
INSERT INTO `entity_users` VALUES (1,'rlnguyen','Coolguy123','admin'),(2,'Rlic2','Coolerguy123','user'),(3,'asdf','asdf','user'),(4,'asdfasdf','asdfasdf','user');
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

-- Dump completed on 2021-06-09 19:06:12
