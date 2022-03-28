-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: localhost    Database: codatest
-- ------------------------------------------------------
-- Server version	8.0.28-0ubuntu0.20.04.3

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
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `lastname` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `photo` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'juani','luna','','','','2022-03-10 00:00:00','2022-03-26 02:06:05',0),(2,'tchami','bojac','','','','2022-03-25 12:32:21','2022-03-25 12:32:21',0),(3,'kungs','fisher','','','','2022-03-25 12:32:21','2022-03-25 12:32:21',0),(4,'aa','bb','','','','2022-03-26 02:20:58','2022-03-26 02:49:39',1),(5,'aa1','bb1','','','','2022-03-26 02:23:08','2022-03-26 02:23:08',0),(6,'hola','holaa','','','','2022-03-26 02:50:38','2022-03-26 02:50:38',0);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mia_active`
--

DROP TABLE IF EXISTS `mia_active`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mia_active` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `token` text,
  `status` int NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mia_active`
--

LOCK TABLES `mia_active` WRITE;
/*!40000 ALTER TABLE `mia_active` DISABLE KEYS */;
/*!40000 ALTER TABLE `mia_active` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mia_item_role`
--

DROP TABLE IF EXISTS `mia_item_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mia_item_role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` bigint DEFAULT NULL,
  `item_id` bigint DEFAULT NULL,
  `role_id` int DEFAULT NULL,
  `type` int NOT NULL DEFAULT '0',
  `permission_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mia_item_role`
--

LOCK TABLES `mia_item_role` WRITE;
/*!40000 ALTER TABLE `mia_item_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `mia_item_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mia_log`
--

DROP TABLE IF EXISTS `mia_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mia_log` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` bigint DEFAULT NULL,
  `type_id` int NOT NULL DEFAULT '0',
  `item_id` bigint NOT NULL DEFAULT '0',
  `data` text,
  `caption` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mia_log`
--

LOCK TABLES `mia_log` WRITE;
/*!40000 ALTER TABLE `mia_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `mia_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mia_permission`
--

DROP TABLE IF EXISTS `mia_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mia_permission` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mia_permission`
--

LOCK TABLES `mia_permission` WRITE;
/*!40000 ALTER TABLE `mia_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `mia_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mia_recovery`
--

DROP TABLE IF EXISTS `mia_recovery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mia_recovery` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `token` text,
  `status` int NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mia_recovery`
--

LOCK TABLES `mia_recovery` WRITE;
/*!40000 ALTER TABLE `mia_recovery` DISABLE KEYS */;
/*!40000 ALTER TABLE `mia_recovery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mia_role`
--

DROP TABLE IF EXISTS `mia_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mia_role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `parent_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mia_role`
--

LOCK TABLES `mia_role` WRITE;
/*!40000 ALTER TABLE `mia_role` DISABLE KEYS */;
INSERT INTO `mia_role` VALUES (1,'Admin',NULL),(2,'Editor',NULL);
/*!40000 ALTER TABLE `mia_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mia_role_access`
--

DROP TABLE IF EXISTS `mia_role_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mia_role_access` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `permission_id` int NOT NULL,
  `type` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mia_role_access`
--

LOCK TABLES `mia_role_access` WRITE;
/*!40000 ALTER TABLE `mia_role_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `mia_role_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mia_user`
--

DROP TABLE IF EXISTS `mia_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mia_user` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `photo` text,
  `phone` varchar(50) DEFAULT NULL,
  `facebook_id` varchar(100) DEFAULT NULL,
  `role` int NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  `password` varchar(200) DEFAULT NULL,
  `status` int DEFAULT '0',
  `is_notification` int NOT NULL DEFAULT '0',
  `caption` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mia_user`
--

LOCK TABLES `mia_user` WRITE;
/*!40000 ALTER TABLE `mia_user` DISABLE KEYS */;
INSERT INTO `mia_user` VALUES (1,'empty','','matias@agencycoda.com','','',NULL,2,'2021-07-27 12:32:21','2021-07-27 12:32:21',0,'$2y$10$giSRwmR8uCrRLRupj8GYT.riEOH1GdF7xfGpn7kM9OjAc1DZ0Trgy',0,0,NULL);
/*!40000 ALTER TABLE `mia_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `project` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `client_id` bigint DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `caption` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `project_user_idx` (`user_id`),
  CONSTRAINT `project_user` FOREIGN KEY (`user_id`) REFERENCES `mia_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (2,1,3,'titulo1','caption1','2022-03-26 03:09:41','2022-03-26 03:15:16',0);
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-28 17:51:32
