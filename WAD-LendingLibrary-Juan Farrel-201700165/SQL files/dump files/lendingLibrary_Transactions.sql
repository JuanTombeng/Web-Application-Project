-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: 10.0.6.243    Database: lendingLibrary
-- ------------------------------------------------------
-- Server version	8.0.18

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
-- Table structure for table `Transactions`
--

DROP TABLE IF EXISTS `Transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Transactions` (
  `Assets_itemID` int(11) NOT NULL,
  `Contacts_ID` int(11) NOT NULL,
  `checkOutCondition` varchar(45) DEFAULT NULL,
  `checkOutNotes` varchar(45) DEFAULT NULL,
  `checkInDate` date DEFAULT NULL,
  `checkInCondition` varchar(45) DEFAULT NULL,
  `checkInNotes` varchar(45) DEFAULT NULL,
  `dueDate` date DEFAULT NULL,
  `checkOutDate` date DEFAULT NULL,
  KEY `fk_Transactions_Assets1_idx` (`Assets_itemID`),
  KEY `fk_Transactions_Contacts1_idx` (`Contacts_ID`),
  CONSTRAINT `fk_Transactions_Assets1` FOREIGN KEY (`Assets_itemID`) REFERENCES `Assets` (`itemID`),
  CONSTRAINT `fk_Transactions_Contacts1` FOREIGN KEY (`Contacts_ID`) REFERENCES `Contacts` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Transactions`
--

LOCK TABLES `Transactions` WRITE;
/*!40000 ALTER TABLE `Transactions` DISABLE KEYS */;
INSERT INTO `Transactions` VALUES (111,1,'Great','qqq','2019-12-10','Good','wwww','2019-12-31','2019-12-10'),(111,1,'Satisfactory','qqqq','2019-12-11','Good','www','2019-12-11','2019-12-11'),(111,1,'Good','qwertyuiop','2019-12-12','Great','test','2019-12-11','2019-12-11'),(111,1,'Great','test','2019-12-12','Satisfactory','test123','2019-12-13','2019-12-12'),(124,1,'Great','test1`24','2019-12-12','Good','test123','2019-12-20','2019-12-12'),(111,1,'Good','test1','2019-12-12','Good','test123','2019-12-12','2019-12-12'),(111,1,'Good','qqq','2019-12-12','Good','qqq','2019-12-12','2019-12-12'),(124,1,'Good','qqq','2019-12-12','Good','qqq','2019-12-12','2019-12-12');
/*!40000 ALTER TABLE `Transactions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-12 23:53:22
