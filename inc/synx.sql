-- MySQL dump 10.13  Distrib 5.6.25, for osx10.10 (x86_64)
--
-- Host: localhost    Database: synx
-- ------------------------------------------------------
-- Server version	5.6.25

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
-- Table structure for table `Servers`
--

DROP TABLE IF EXISTS `Servers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Servers` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `ipi4` INT UNSIGNED,
  `ipv6` BINARY(16),
  `sshp` INT(3),
  `OS` varchar(255) DEFAULT NULL,
  `servername` varchar(120) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `md5` varchar(255) DEFAULT NULL,
  `fuser` varchar(30) DEFAULT NULL,
  `fpass` varchar(100) DEFAULT NULL,
  `fserver` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `backup` (`servername`,`id`,`date`)
) ENGINE=InnoDB AUTO_INCREMENT=2513 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `SPaths`;
CREATE TABLE `SPaths` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `servername` varchar(120) DEFAULT NULL,
  `path` varchar(999) DEFAULT NULL,
  PRIMARY KEY (`id`);
--
