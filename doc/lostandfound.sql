-- MySQL dump 10.13  Distrib 5.5.25, for osx10.6 (i386)
--
-- Host: localhost    Database: lostandfound
-- ------------------------------------------------------
-- Server version	5.5.25-log

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
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `code` char(2) COLLATE latin1_general_ci NOT NULL COMMENT 'Two-letter country code (ISO 3166-1 alpha-2)',
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'English country name',
  `full_name` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'Full English country name',
  `iso3` char(3) COLLATE latin1_general_ci NOT NULL COMMENT 'Three-letter country code (ISO 3166-1 alpha-3)',
  `number` smallint(3) unsigned zerofill NOT NULL COMMENT 'Three-digit country number (ISO 3166-1 numeric)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of item',
  `item_type_id` int(1) NOT NULL,
  `title` varchar(64) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'for example "red purse", "black belt", "green gucci shoes"',
  `description` text COLLATE latin1_general_ci COMMENT 'detailed description of item',
  `spot` varchar(128) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Name of place where item was found/lost',
  `street` varchar(128) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Street where item was found or lost (depending on type of item)',
  `city` varchar(128) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'city where item was lost/found',
  `zip` varchar(16) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'postcode',
  `country_id` int(11) DEFAULT NULL COMMENT 'id of country',
  `created` datetime DEFAULT NULL,
  `is_found` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_item_country` (`country_id`),
  KEY `fk_item_item_type1` (`item_type_id`),
  CONSTRAINT `fk_item_country` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_item_item_type1` FOREIGN KEY (`item_type_id`) REFERENCES `item_type` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (2,0,'Scarf','',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,2,'Girlfriend','',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_type`
--

DROP TABLE IF EXISTS `item_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_type`
--

LOCK TABLES `item_type` WRITE;
/*!40000 ALTER TABLE `item_type` DISABLE KEYS */;
INSERT INTO `item_type` VALUES (1,'Things'),(2,'People');
/*!40000 ALTER TABLE `item_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `first_name` varchar(64) COLLATE latin1_general_ci DEFAULT NULL,
  `last_name` varchar(64) COLLATE latin1_general_ci DEFAULT NULL,
  `company` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(254) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(254) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'HASH of password',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,1,'Jonathan','Doe 123',NULL,'demo@demo.com','demo',NULL),(2,1,'Joe','Blogs...',NULL,'test@google.com','test123',NULL),(3,0,'Peter','Oink...',NULL,'test@test.com','test',NULL),(4,0,'Armin','Van Burren',NULL,'','',NULL),(8,0,'Romans','Malinovskis',NULL,'r@agiletech.ie','123',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_item`
--

DROP TABLE IF EXISTS `user_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_item` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `action` enum('lost','found','left with') DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_item_user1` (`user_id`),
  KEY `fk_user_item_item1` (`item_id`),
  CONSTRAINT `fk_user_item_item1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_item_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_item`
--

LOCK TABLES `user_item` WRITE;
/*!40000 ALTER TABLE `user_item` DISABLE KEYS */;
INSERT INTO `user_item` VALUES (0,1,11,'lost','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `user_item` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-08-03  2:30:09
