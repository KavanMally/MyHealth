-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: my_health
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

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
  `dbday` int(8) NOT NULL,
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
INSERT INTO `DOCTOR` VALUES (1,'Wu',1011990,'pediatrics','Ben'),(2,'Yang',2141995,'physician','Chris'),(3,'Fields',8111994,'surgeon','Sarah'),(4,'Lispen',11151989,'therapist','Blake'),(5,'Bell',10311998,'Pharmacy Technician','Elizabeth'),(6,'Janes',234,'Child Practician','Jesse');
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
  `pBday` int(8) NOT NULL,
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
INSERT INTO `PATIENT` VALUES (1,'Cecil',9141993,'Mexican',23,'M','N','Gonzales'),(2,'Isabel',7161996,'English',20,'F','Y','Garner'),(3,'Tyler',4011994,'German',22,'M','Y','Robbins'),(4,'Carla',6171986,'German',30,'F','N','Rogers'),(5,'John',2354,'Asian',30,NULL,'N','Doe'),(6,'Jane',23523,'African',28,'F','N','Doe'),(7,'Chris',-1994,'Asian',20,'M','N','Yang');
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
INSERT INTO `VACCINES` VALUES (1,'Y','Y','Y','Y','Y'),(2,'Y','N','Y','Y','Y'),(3,'N','N','N','N','N'),(4,'N','N','Y','Y','Y');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `VISITS`
--

LOCK TABLES `VISITS` WRITE;
/*!40000 ALTER TABLE `VISITS` DISABLE KEYS */;
INSERT INTO `VISITS` VALUES (1,1,2,'60',100,12,110,50,150,100,130,150,100,2,90,'2016-12-30');
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

-- Dump completed on 2016-12-11 22:41:50
