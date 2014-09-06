-- MySQL dump 10.14  Distrib 5.5.32-MariaDB, for Linux (i686)
--
-- Host: localhost    Database: toplist
-- ------------------------------------------------------
-- Server version	5.5.32-MariaDB

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
-- Table structure for table `lists`
--

DROP TABLE IF EXISTS `lists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lists` (
  `id` int(10) unsigned NOT NULL,
  `question_id` int(255) unsigned NOT NULL,
  `r0` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `r1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `r2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `r3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `r4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `r5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `r6` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `r7` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `r8` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `r9` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`,`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lists`
--

LOCK TABLES `lists` WRITE;
/*!40000 ALTER TABLE `lists` DISABLE KEYS */;
INSERT INTO `lists` VALUES (4,47,'dog','cat','bear','lion','elephant','rabbit','tree','fish','eagle','snake'),(4,48,'TopList','Reddit','Wikipedia','CS50','Facebook','Slickdeals','Quora','Google','Amazon','Bing'),(5,49,'Poptarts','Ramen','Soda','Nuts','Trailmix','Fruits','Candy','Chips','Pretzels','Nutella'),(6,47,'rabbit','dog','elephant','bat','gazelle','moose','goat','mouse','rat','cat'),(6,50,'Blue','Red','Black','White','Green','Orange','Purple','Yellow','Brown','Gray'),(7,47,'rabbit','dog','goat','cat','elephant','deer','moose','bird','snake','elk'),(7,53,'1','2','3','4','5','6','7','8','9','10');
/*!40000 ALTER TABLE `lists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `question_id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`question_id`),
  UNIQUE KEY `question` (`question`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (47,'Animals'),(50,'Colors'),(49,'Food Items for College'),(53,'Numbers'),(48,'Websites');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `responses`
--

DROP TABLE IF EXISTS `responses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `responses` (
  `question_id` int(255) unsigned NOT NULL,
  `response` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `frequency` int(255) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`question_id`,`response`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responses`
--

LOCK TABLES `responses` WRITE;
/*!40000 ALTER TABLE `responses` DISABLE KEYS */;
INSERT INTO `responses` VALUES (47,'bat',9),(47,'bear',8),(47,'bird',3),(47,'cat',16),(47,'deer',9),(47,'dog',26),(47,'eagle',2),(47,'elephant',20),(47,'elk',1),(47,'fish',3),(47,'gazelle',6),(47,'goat',12),(47,'lion',7),(47,'moose',9),(47,'mouse',3),(47,'penguin',6),(47,'rabbit',25),(47,'rat',2),(47,'snake',3),(47,'tree',4),(48,'Amazon',2),(48,'Bing',1),(48,'CS50',7),(48,'Facebook',6),(48,'Google',3),(48,'Quora',4),(48,'Reddit',9),(48,'Slickdeals',5),(48,'TopList',10),(48,'Wikipedia',8),(49,'Candy',4),(49,'Chips',3),(49,'Fruits',5),(49,'Nutella',1),(49,'Nuts',7),(49,'Poptarts',10),(49,'Pretzels',2),(49,'Ramen',9),(49,'Soda',8),(49,'Trailmix',6),(50,'Black',8),(50,'Blue',10),(50,'Brown',2),(50,'Gray',1),(50,'Green',6),(50,'Orange',5),(50,'Purple',4),(50,'Red',9),(50,'White',7),(50,'Yellow',3),(53,'1',10),(53,'10',1),(53,'2',9),(53,'3',8),(53,'4',7),(53,'5',6),(53,'6',5),(53,'7',4),(53,'8',3),(53,'9',2);
/*!40000 ALTER TABLE `responses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'test','$1$HD38RRGL$nGgZ20B9Ko73ulPE2WxXM/'),(2,'w5ngatang','$1$vHqbJJI1$HW7/C8IX3nlxGQy4OIpkg/'),(3,'w4ngatang','$1$38opkQ/w$T5ha/d7W6Uz60FOC9dP6k0'),(4,'W6ngatang','$1$8e/dpltv$3kNYecOMtU2EtipWjvFx21'),(5,'w3ngatang','$1$ITOPs/t4$MFY9OleclFxJ/1/cDL3yC1'),(6,'w2ngatang','$1$z8QypkiR$VhvVxiREuAlkQFJgs/v7m/'),(7,'w1ngatang','$1$7W76iR.n$0RlsuT22cIG2XwTr3Z0630');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-12-08 11:38:17
