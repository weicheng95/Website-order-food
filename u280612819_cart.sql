-- MySQL dump 10.15  Distrib 10.0.20-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u280612819_cart
-- ------------------------------------------------------
-- Server version	10.0.20-MariaDB

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
-- Table structure for table `cart_items`
--

DROP TABLE IF EXISTS `cart_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart_items` (
  `order_no` int(5) NOT NULL AUTO_INCREMENT,
  `id` int(5) NOT NULL,
  `name` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `category` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(5) NOT NULL,
  `quantity` int(5) NOT NULL,
  PRIMARY KEY (`order_no`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_items`
--

/*!40000 ALTER TABLE `cart_items` DISABLE KEYS */;
INSERT INTO `cart_items` VALUES (10,3,'肉燥乾麵','noodle',60,1),(11,34,'紅茶','drink',25,1);
/*!40000 ALTER TABLE `cart_items` ENABLE KEYS */;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `username` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` char(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username_3` (`username`),
  KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES ('abcd1234','abcd1234','1922431414','sjkabvasjlf','123@gmail.com'),('admin','admin','989411111','高雄市楠梓區卓越路2號','admin@gmail.com'),('SuperBig','superr','075554321','高雄市楠梓區卓越路2號','SuperBig@gmail.com'),('tester','123456','0989415610','高雄市','test@gmail.com'),('leviathan','roger841016','981660330','火星','dddd@gmail.com');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;

--
-- Table structure for table `member_order`
--

DROP TABLE IF EXISTS `member_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member_order` (
  `username` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `order_no` int(5) NOT NULL,
  `name` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `id` int(11) NOT NULL,
  `category` char(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `username_2` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_order`
--

/*!40000 ALTER TABLE `member_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `member_order` ENABLE KEYS */;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `category` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (2,'意大利麵','noodle',150),(3,'肉燥乾麵','noodle',60),(4,'蝦仁蛋炒飯','rice',70),(5,'火雞肉飯','rice',50),(9,'牛肉炒飯','rice',80),(19,'蛋包飯','rice',80),(20,'咖哩飯','rice',70),(21,'雞排便當','rice',85),(22,'燒肉飯','rice',50),(30,'蔥燒牛肉麵','noodle',90),(31,'餛飩麵','noodle',60),(32,'陽春湯麵','noodle',40),(33,'榨菜肉絲麵','noodle',45),(34,'紅茶','drink',25),(36,'可樂','drink',20),(37,'綠茶','drink',25),(38,'青茶','drink',25),(39,'現榨柳橙汁','drink',35),(40,'珍珠鮮奶茶','drink',50);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-20 13:22:27
