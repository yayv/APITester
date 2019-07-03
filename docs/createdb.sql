-- MySQL dump 10.13  Distrib 5.7.26, for macos10.14 (x86_64)
--
-- Host: localhost    Database: ApiTester
-- ------------------------------------------------------
-- Server version	5.7.26

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
-- Table structure for table `API_Luckycat`
--

DROP TABLE IF EXISTS `API_Luckycat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `API_Luckycat` (
  `id` int(11) NOT NULL,
  `apiname` int(11) NOT NULL,
  `apiuri` int(11) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `API_Luckycat`
--

LOCK TABLES `API_Luckycat` WRITE;
/*!40000 ALTER TABLE `API_Luckycat` DISABLE KEYS */;
/*!40000 ALTER TABLE `API_Luckycat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CONF_Luckycat`
--

DROP TABLE IF EXISTS `CONF_Luckycat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CONF_Luckycat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option` char(64) NOT NULL,
  `value` text NOT NULL,
  `environment` char(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CONF_Luckycat`
--

LOCK TABLES `CONF_Luckycat` WRITE;
/*!40000 ALTER TABLE `CONF_Luckycat` DISABLE KEYS */;
/*!40000 ALTER TABLE `CONF_Luckycat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LOG_Luckycat`
--

DROP TABLE IF EXISTS `LOG_Luckycat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LOG_Luckycat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `testcaseid` int(11) NOT NULL,
  `request` text NOT NULL,
  `response` text NOT NULL,
  `result` char(255) NOT NULL,
  `runtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LOG_Luckycat`
--

LOCK TABLES `LOG_Luckycat` WRITE;
/*!40000 ALTER TABLE `LOG_Luckycat` DISABLE KEYS */;
/*!40000 ALTER TABLE `LOG_Luckycat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Projects`
--

DROP TABLE IF EXISTS `Projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectName` varchar(64) NOT NULL,
  `Owner` varchar(128) NOT NULL,
  `Desc` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Projects`
--

LOCK TABLES `Projects` WRITE;
/*!40000 ALTER TABLE `Projects` DISABLE KEYS */;
INSERT INTO `Projects` VALUES (1,'Luckycat','liuce','招财猫');
/*!40000 ALTER TABLE `Projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TESTCASE_Lucycat`
--

DROP TABLE IF EXISTS `TESTCASE_Lucycat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TESTCASE_Lucycat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `APIid` int(11) NOT NULL,
  `request` text NOT NULL,
  `response` text NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TESTCASE_Lucycat`
--

LOCK TABLES `TESTCASE_Lucycat` WRITE;
/*!40000 ALTER TABLE `TESTCASE_Lucycat` DISABLE KEYS */;
/*!40000 ALTER TABLE `TESTCASE_Lucycat` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-21 16:19:52
