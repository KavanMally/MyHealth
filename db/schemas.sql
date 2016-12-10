-- MySQL dump 10.13  Distrib 5.5.53, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: EECS341_Project2
-- ------------------------------------------------------
-- Server version	5.5.53-0ubuntu0.14.04.1

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
-- Table structure for table `DOCTOR`
--

DROP TABLE IF EXISTS `DOCTOR`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DOCTOR` (
  `did` int(10) NOT NULL,
  `dLastName` varchar(20) DEFAULT NULL,
  `dbday` date DEFAULT NULL,
  `field` varchar(20) DEFAULT NULL,
  `dFirstName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DOCTOR`
--

LOCK TABLES `DOCTOR` WRITE;
/*!40000 ALTER TABLE `DOCTOR` DISABLE KEYS */;
INSERT INTO `DOCTOR` VALUES (1,'Wu','0000-00-00','pediatrics','Ben'),(2,'Yang','0000-00-00','physician','Chris'),(3,'Fields','0000-00-00','surgeon','Sarah'),(4,'Lispen','0000-00-00','therapist','Blake'),(5,'Bell','0000-00-00','Pharmacy Technician','Elizabeth');
/*!40000 ALTER TABLE `DOCTOR` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `HABITS`
--

DROP TABLE IF EXISTS `HABITS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `HABITS` (
  `hID` int(10) NOT NULL,
  `hExercise` varchar(20) DEFAULT NULL,
  `hMeal` varchar(20) DEFAULT NULL,
  `hSnacks` varchar(20) DEFAULT NULL,
  `hSleep` int(2) DEFAULT NULL,
  `hSmoke` char(1) DEFAULT NULL,
  `hAlcohol` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`hID`),
  CONSTRAINT `chk_key` FOREIGN KEY (`hID`) REFERENCES `PATIENT` (`pID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `HABITS`
--

LOCK TABLES `HABITS` WRITE;
/*!40000 ALTER TABLE `HABITS` DISABLE KEYS */;
INSERT INTO `HABITS` VALUES (1,'Some','4 meals per day','occaisional',5,'N','Moderation'),(2,'None','2 meals/day','4 times a day',8,'N','weekends'),(3,'14 hours/week','3 meals','when hungry',7,'N','raging'),(4,'couch potato','3 meals','everytime',14,'Y','everytime');
/*!40000 ALTER TABLE `HABITS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PATIENT`
--

DROP TABLE IF EXISTS `PATIENT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PATIENT` (
  `pID` int(10) NOT NULL,
  `pFirstName` varchar(20) DEFAULT NULL,
  `pBday` date DEFAULT NULL,
  `pDem` varchar(20) DEFAULT NULL,
  `pAge` int(3) DEFAULT NULL,
  `pGender` char(1) DEFAULT NULL,
  `pMarital` char(1) DEFAULT NULL,
  `pLastName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`pID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PATIENT`
--

LOCK TABLES `PATIENT` WRITE;
/*!40000 ALTER TABLE `PATIENT` DISABLE KEYS */;
INSERT INTO `PATIENT` VALUES (1,'Cecil','0000-00-00','Mexican',23,'M','N','Gonzales'),(2,'Isabel','0000-00-00','English',20,'F','Y','Garner'),(3,'Tyler','0000-00-00','German',22,'M','Y','Robbins'),(4,'Carla','0000-00-00','German',30,'F','N','Rogers');
/*!40000 ALTER TABLE `PATIENT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `VACCINES`
--

DROP TABLE IF EXISTS `VACCINES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `VACCINES` (
  `rid` int(10) NOT NULL,
  `rTdep` char(1) DEFAULT NULL,
  `rFlu` char(1) DEFAULT NULL,
  `rHPV` char(1) DEFAULT NULL,
  `rHepB` char(1) DEFAULT NULL,
  `rHepA` char(1) DEFAULT NULL,
  PRIMARY KEY (`rid`),
  CONSTRAINT `chk_rid` FOREIGN KEY (`rid`) REFERENCES `PATIENT` (`pID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `VACCINES`
--

LOCK TABLES `VACCINES` WRITE;
/*!40000 ALTER TABLE `VACCINES` DISABLE KEYS */;
INSERT INTO `VACCINES` VALUES (1,'Y','Y','Y','Y','Y'),(2,'Y','N','Y','Y','Y'),(4,'N','N','Y','Y','Y');
/*!40000 ALTER TABLE `VACCINES` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `VISITS`
--

DROP TABLE IF EXISTS `VISITS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `VISITS` (
  `vID` int(10) NOT NULL AUTO_INCREMENT,
  `pID` int(10) NOT NULL,
  `did` int(10) NOT NULL,
  `height` varchar(10) DEFAULT NULL,
  `weight` int(3) DEFAULT NULL,
  `waist` int(3) DEFAULT NULL,
  `bp` int(4) DEFAULT NULL,
  `pulse` int(4) DEFAULT NULL,
  `cholesteral` int(6) DEFAULT NULL,
  `ldc_chol` int(6) DEFAULT NULL,
  `mdl_chol` int(6) DEFAULT NULL,
  `triglycerides` int(6) DEFAULT NULL,
  `glucose` int(6) DEFAULT NULL,
  `creatinine` int(6) DEFAULT NULL,
  `GFR` int(6) DEFAULT NULL,
  `vDate` date DEFAULT NULL,
  PRIMARY KEY (`vID`),
  KEY `pID` (`pID`),
  KEY `did` (`did`),
  CONSTRAINT `VISITS_ibfk_1` FOREIGN KEY (`pID`) REFERENCES `PATIENT` (`pID`),
  CONSTRAINT `VISITS_ibfk_2` FOREIGN KEY (`did`) REFERENCES `DOCTOR` (`did`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `VISITS`
--

LOCK TABLES `VISITS` WRITE;
/*!40000 ALTER TABLE `VISITS` DISABLE KEYS */;
/*!40000 ALTER TABLE `VISITS` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-10 14:12:48
