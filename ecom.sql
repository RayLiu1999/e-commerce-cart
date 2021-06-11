CREATE DATABASE  IF NOT EXISTS `ecom` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ecom`;
-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ecom
-- ------------------------------------------------------
-- Server version	5.7.28-log

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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET latin1 NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(45) CHARACTER SET latin1 NOT NULL,
  `quantity` int(11) NOT NULL,
  `image_url` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'MacBook Air','13.3 吋 Retina 顯示器/Apple M1 晶片/最多可達 16GB 記憶體/最多可達 2TB 儲存裝置/最長可達 18 小時電池使用時間/Touch ID','22000',10,'/ecommerce/public/img/macbook_air.jpg','2021-04-23 03:31:38','2021-04-23 06:08:00'),(2,'MacBook pro 13','13.3 吋 Retina 顯示器/Apple M1 晶片/最多可達 16GB 記憶體/最多可達 2TB 儲存裝置/最長可達 20 小時電池使用時間/觸控列和Touch ID','40000',0,'/ecommerce/public/img/macbook_pro13.jpg','2021-04-23 07:43:33','2021-05-01 09:38:12'),(3,'MacBook Pro 16','16 吋 Retina 顯示器/Intel Core i7 或 i9 處理器/最多可達 64GB 記憶體/最多可達 8TB 儲存裝置/最長可達 11 小時電池使用時間/觸控列和Touch ID','70000',3,'/ecommerce/public/img/macbook_pro16.jpg','2021-04-23 07:50:35','2021-04-23 07:50:35'),(4,'iPhone 12','超 Retina XDR 顯示器/6.1 吋 (對角線) 全螢幕 OLED 顯示器/2532 x 1170 像素，460 ppi 解析度/1200 萬像素雙相機系統：超廣角與廣角相機/透過原深感測相機進行臉部辨識','26900',0,'/ecommerce/public/img/iphone12.jpg','2021-04-23 07:53:23','2021-04-30 11:25:16'),(5,'iPhone 12 mini','超 Retina XDR 顯示器/5.4 吋 (對角線) 全螢幕 OLED 顯示器/2340 x 1080 像素，476 ppi 解析度/1200 萬像素雙相機系統：超廣角與廣角相機/透過原深感測相機進行臉部辨識','23900',10,'/ecommerce/public/img/iphone12_mini.jpg','2021-04-23 07:55:12','2021-04-23 07:55:12'),(6,'iPhone 12 Pro','超 Retina XDR 顯示器/6.1 吋 (對角線) 全螢幕 OLED 顯示器/2532 x 1170 像素，460 ppi 解析度/1200 萬像素雙相機系統：超廣角與廣角相機/透過原深感測相機進行臉部辨識','33900',5,'/ecommerce/public/img/iphone12_pro.jpg','2021-04-23 07:57:45','2021-04-23 07:57:45'),(7,'AirPods','波束成形雙麥克風/雙光學感測器/可使用 Qi 認證的充電器或 Lightning 連接器充電/充電一次，聆聽時間最長可達 5 小時/充電一次，通話時間最長可達 3 小時','4000',2,'/ecommerce/public/img/airpods.jpg','2021-04-23 07:59:47','2021-04-23 08:02:09'),(8,'AirPods 2','波束成形雙麥克風/雙光學感測器/H1 耳機晶片/可使用 Qi 認證的充電器或 Lightning 連接器充電/充電一次，聆聽時間最長可達 5 小時/充電一次，通話時間最長可達 3 小時','4500',3,'/ecommerce/public/img/airpods2.jpg','2021-04-23 08:03:24','2021-04-23 08:04:10'),(9,'AirPods Pro','主動式降噪/波束成形雙麥克風/抗汗抗水功能 (IPX4)/可使用 Qi 認證的充電器或 Lightning 連接器充電/充電一次，聆聽時間最長可達 4.5 小時 (在主動式降噪功能和通透模式均為關閉狀態時，最長可達 5 小時)','6000',1,'/ecommerce/public/img/airpods_pro.jpg','2021-04-23 08:05:33','2021-04-23 08:05:33');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Ray','123qwe@gmail.com','$2y$10$17covwOfHh2wXxUXk/.TqeJwV2ZzrlGry.HfdsB56Kj2M9JQo8T4W','2021-04-30 07:51:55','2021-04-30 07:51:55'),(2,'fdsfds','fdsfsd@gmail.com','$2y$10$LtBW4yK2czcWwFsypUP5vepreqdqQ5PGLhTzuNwUbwyUpYATqWwwm','2021-05-01 09:03:53','2021-05-01 09:03:53'),(3,'fdsffds','fdfkdso@gmail.com','$2y$10$ZubIjudqEvdxWMHudHULzemqWSEJSLjVHXMVcAiWFqKEsu4dgdfZq','2021-05-01 09:13:05','2021-05-01 09:13:05'),(4,'&#039;','123@123.ca','$2y$10$R1Tp0iCV/eKtkHCOUnMhK.gXNTRk/dgNLXCtCC97N6qCmvbrm149u','2021-05-01 09:19:36','2021-05-01 09:19:36');
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

-- Dump completed on 2021-05-01 17:59:55
