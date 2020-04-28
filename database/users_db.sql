-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: localhost    Database: users_db
-- ------------------------------------------------------
-- Server version	5.7.24

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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2020_04_24_142124_create_products_table',2),(4,'2020_04_24_180548_add_poster_to_product',3),(5,'2020_04_25_123852_change_users_table',4),(6,'2020_04_25_181936_update_users_table',5),(7,'2020_04_25_183645_add_telefono_to_users_table',6),(8,'2020_04_25_183952_create_table_tipo_de_usuario',7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `titulo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio_unitario` int(11) NOT NULL,
  `descuento` tinyint(4) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'2020-04-24 18:32:02','2020-04-26 17:58:00','GTA Vice City','Primer juego de la saga GTA',200,5,30,'gpWpts8TmxvdlKoJDTz2azmZWCQ6QBCY76hNnOiS.jpeg'),(2,'2020-04-24 18:33:56','2020-04-26 17:59:20','GTA San Andreas','Segundo juego de la saga GTA',300,NULL,50,'CjApeutUhSfs9Hx21APT6YcbV1vZNfR9niMeXQM2.jpeg'),(3,'2020-04-24 18:46:16','2020-04-26 17:59:58','GTA III','Tercer juego de la saga GTA',150,NULL,10,'d9rCMkfHOT2fDbrxM6sSfuratLBr7K6JjFvGDr09.jpeg'),(4,'2020-04-24 18:52:26','2020-04-26 18:01:08','GTA IV','Cuarta entrega de la saga GTA',200,NULL,15,'XwRF0aL0q38unwfpEX7TQcfHJtmJbXlbkFsYT14b.jpeg'),(5,'2020-04-24 18:53:16','2020-04-26 18:02:10','GTA V','Quinta y última entrega de la saga GTA',500,NULL,300,'JxvyuEvy0hl86zzjZ5tIaR2yU8SuiLjEYCWXwy12.jpeg'),(6,'2020-04-24 18:56:27','2020-04-26 17:56:29','Dungeon Keeper II','Juego desarrollado por Bullfrog Productions en 1997',200,15,10,'AerlIcqo5lmilqIT2q68HINu8L6LrnzT6BDdA4ZH.jpeg'),(22,'2020-04-26 18:10:56','2020-04-26 18:10:56','Porro est et exercitationem totam.','Vel deserunt minus voluptates.',162,87,165,'0'),(23,'2020-04-26 18:10:56','2020-04-26 18:10:56','Quis eveniet.','Voluptatibus dicta ratione deserunt nesciunt.',868,35,440,'0'),(24,'2020-04-26 18:10:56','2020-04-26 18:10:56','Excepturi eum qui.','Error in autem et consequatur.',416,67,394,'0'),(25,'2020-04-26 18:10:56','2020-04-26 18:10:56','Et dolorem odit.','Aut qui aut qui facere voluptatem.',950,35,239,'0'),(26,'2020-04-26 18:10:56','2020-04-26 18:10:56','Ipsam fugiat odit.','Odit tempore et eveniet labore quia cum.',602,9,486,'0'),(27,'2020-04-26 18:10:56','2020-04-26 18:10:56','Molestias animi debitis.','Architecto aspernatur aut ipsam odit.',444,22,440,'0'),(28,'2020-04-26 18:10:56','2020-04-26 18:10:56','Praesentium quia ducimus.','Excepturi rerum consectetur aspernatur.',233,48,269,'0'),(29,'2020-04-26 18:10:56','2020-04-26 18:10:56','Voluptatum voluptatum rem quo.','Cupiditate velit non quo.',660,64,114,'0'),(30,'2020-04-26 18:10:56','2020-04-26 18:10:56','Et eum ullam.','Nam hic eum vitae ex.',659,41,195,'0'),(31,'2020-04-26 18:10:56','2020-04-26 18:10:56','Voluptas qui aut non.','Et est unde dignissimos temporibus.',462,89,248,'0'),(32,'2020-04-26 18:26:44','2020-04-26 18:26:44','Aliquid ullam necessitatibus.','Illo neque consequuntur rerum libero.',727,65,83,'0'),(33,'2020-04-26 18:26:44','2020-04-26 18:26:44','Autem voluptatem necessitatibus quibusdam.','Officiis consequatur soluta vel dignissimos.',369,65,126,'0'),(34,'2020-04-26 18:26:44','2020-04-26 18:26:44','Velit aut.','Quos ut voluptatibus laboriosam.',194,24,311,'0'),(35,'2020-04-26 18:26:45','2020-04-26 18:26:45','Ut quia iure.','Quo molestias totam eum deleniti cum.',81,60,122,'0'),(36,'2020-04-26 18:26:45','2020-04-26 18:26:45','Rerum ut eligendi.','Corrupti voluptatum iste molestiae atque.',276,95,289,'0'),(37,'2020-04-26 18:26:45','2020-04-26 18:26:45','Et nisi mollitia.','Animi corporis pariatur qui possimus.',876,36,446,'public/storage/product_poster\\acf5b5b1f2ba1641152065eee8cbf71b.jpg'),(38,'2020-04-26 18:26:45','2020-04-26 18:26:45','Non laborum numquam.','Officiis commodi odio et est numquam illo.',229,84,27,'0'),(39,'2020-04-26 18:26:45','2020-04-26 18:26:45','Dignissimos deserunt laudantium.','Perspiciatis debitis et eligendi.',906,32,172,'public/storage/product_poster\\ae4ba0580a8928ae5c40f45161dce730.jpg'),(40,'2020-04-26 18:26:45','2020-04-26 18:26:45','Voluptatem minima ex fugiat illo.','Consequuntur autem repellat neque aut ad placeat.',507,59,326,'0'),(41,'2020-04-26 18:26:45','2020-04-26 18:26:45','Assumenda modi rerum et.','Quis repudiandae aperiam eos rerum.',349,95,413,'0'),(42,'2020-04-26 18:30:26','2020-04-26 18:30:26','Quia ipsam eligendi aut.','Sit ducimus nobis eos aut porro blanditiis.',213,60,57,NULL),(43,'2020-04-26 18:30:26','2020-04-26 18:30:26','Et rerum possimus possimus.','Nihil harum doloremque quidem et.',552,90,209,NULL),(44,'2020-04-26 18:30:26','2020-04-26 18:30:26','Maxime reiciendis nihil beatae velit.','Vitae ducimus animi alias quis nisi eum ullam.',829,81,166,NULL),(45,'2020-04-26 18:30:26','2020-04-26 18:30:26','Error et pariatur repudiandae.','Velit consequatur aliquid ut aut dicta.',226,43,1,NULL),(46,'2020-04-26 18:30:26','2020-04-26 18:30:26','Qui dolorum facilis sed natus.','Temporibus earum excepturi ratione voluptates sed et.',916,7,361,NULL),(47,'2020-04-26 18:30:26','2020-04-26 18:30:26','Reiciendis ratione sit et.','Inventore ipsam et accusamus.',588,92,429,NULL),(48,'2020-04-26 18:30:26','2020-04-26 18:30:26','Velit amet ad.','Assumenda qui est quos assumenda sint placeat quidem.',853,18,126,NULL),(49,'2020-04-26 18:30:26','2020-04-26 18:30:26','Et nihil deserunt ut sit.','Eum perspiciatis placeat ut molestiae laudantium repudiandae.',662,99,249,NULL),(50,'2020-04-26 18:30:26','2020-04-26 18:30:26','Ut esse doloribus.','Porro impedit itaque nostrum aut reiciendis facilis.',700,65,450,NULL),(51,'2020-04-26 18:30:27','2020-04-26 18:30:27','Dolor magnam ratione.','Voluptas amet facere ipsa a eum.',12,14,490,NULL),(52,'2020-04-27 02:57:15','2020-04-27 02:57:15','Aut qui nihil vel est.','Et veniam earum in.',771,66,91,NULL),(53,'2020-04-27 02:57:15','2020-04-27 02:57:15','Voluptas omnis eligendi doloribus dolor.','In aut et eos.',375,6,324,NULL),(54,'2020-04-27 02:57:15','2020-04-27 02:57:15','Eaque dolorum qui numquam.','Velit illo voluptatibus aut dolorem dicta.',200,35,331,NULL),(55,'2020-04-27 02:57:15','2020-04-27 02:57:15','Id autem qui ut.','Est aperiam tempore veritatis sapiente fugiat.',184,31,267,NULL),(56,'2020-04-27 02:57:15','2020-04-27 02:57:15','Id ipsa ut.','Nostrum voluptatem voluptatem dolorem.',777,38,227,NULL),(57,'2020-04-27 02:57:15','2020-04-27 02:57:15','Consequatur ipsam excepturi praesentium.','Voluptas ab labore distinctio sunt ex deleniti.',24,24,385,NULL),(58,'2020-04-27 02:57:15','2020-04-27 02:57:15','Omnis sit aut.','A totam rem rerum itaque porro.',944,38,279,NULL),(59,'2020-04-27 02:57:15','2020-04-27 02:57:15','Repellendus ea et assumenda.','Facere cum dignissimos vel sunt.',321,1,213,NULL),(60,'2020-04-27 02:57:15','2020-04-27 02:57:15','Voluptas qui.','Minima deserunt dignissimos nam odit voluptates non.',259,7,376,NULL),(61,'2020-04-27 02:57:15','2020-04-27 02:57:15','Qui accusantium eaque.','Est quas enim quibusdam.',669,84,155,NULL),(62,'2020-04-27 02:57:21','2020-04-27 02:57:21','Similique rerum ea deleniti.','Quisquam nobis et blanditiis autem tempora.',248,13,8,NULL),(63,'2020-04-27 02:57:21','2020-04-27 02:57:21','Alias consequatur aut et.','Aliquid ipsum qui delectus eveniet culpa explicabo.',915,40,15,NULL),(64,'2020-04-27 02:57:21','2020-04-27 02:57:21','Dolor laborum possimus amet.','Dolor laudantium officiis qui hic animi.',106,100,429,NULL),(65,'2020-04-27 02:57:21','2020-04-27 02:57:21','Quia corporis in ea.','A ipsam possimus aspernatur eos omnis.',753,70,433,NULL),(66,'2020-04-27 02:57:21','2020-04-27 02:57:21','Ea voluptatem accusamus.','Aut voluptate tempora assumenda vel ut.',356,32,164,NULL),(67,'2020-04-27 02:57:21','2020-04-27 02:57:21','Rerum ipsa et.','Quis porro blanditiis molestiae quis et quo dolorem.',991,61,61,NULL),(68,'2020-04-27 02:57:21','2020-04-27 02:57:21','Fugit et quidem qui.','Voluptas similique harum amet quibusdam dolores architecto tempore.',999,23,432,NULL),(69,'2020-04-27 02:57:21','2020-04-27 02:57:21','Dignissimos quis delectus.','Quis ex tempora tenetur.',822,66,22,NULL),(70,'2020-04-27 02:57:21','2020-04-27 02:57:21','Officiis officia aliquid.','Pariatur eveniet delectus incidunt omnis voluptatem.',245,93,375,NULL),(71,'2020-04-27 02:57:22','2020-04-27 02:57:22','Ipsa sint culpa.','Nemo necessitatibus repellendus earum dolor earum.',778,71,153,NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_de_usuario`
--

DROP TABLE IF EXISTS `tipo_de_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_de_usuario` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_de_usuario`
--

LOCK TABLES `tipo_de_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_de_usuario` DISABLE KEYS */;
INSERT INTO `tipo_de_usuario` VALUES (1,'normal'),(2,'administrador');
/*!40000 ALTER TABLE `tipo_de_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_de_nacimiento` date DEFAULT NULL,
  `domicilio` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado_de_usuario` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `tipo_de_usuario_id` bigint(20) unsigned NOT NULL DEFAULT '1',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provincia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_de_documento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documento` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('2020-04-24 16:21:29','2020-04-26 17:35:35',1,'Ignacio','Martí','mfignacio97@hotmail.com',NULL,'$2y$10$iXRPMbOZbBD9ZZtWF5znWOfpa3AZq78s06G/tE33WizEF22F5Hvim',NULL,'1997-08-07','Primero de mayo 3383','activo',2,'N6H7k2s63kBnln7otzddkw440uO0kFifvIBKQUGm.jpeg','ROSARIO','Santa Fe','DNI','3413745048','40555658'),('2020-04-25 18:58:14','2020-04-25 18:58:14',2,'Sara','Casiello','sara.casiello@gmail.com',NULL,'$2y$10$1y1erCsipAg5J8iWYD0P3uYeBg8v8qAeROKO5Pr17DUs0KX0d1Ahe',NULL,NULL,NULL,'activo',1,NULL,NULL,NULL,NULL,NULL,NULL),('2020-04-25 22:10:53','2020-04-25 22:10:53',3,'Annabelle Stamm','Esther Feeney','jbogisich@example.org','2020-04-25 22:10:53','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','XuRJ4SeyIR',NULL,NULL,'activo',1,NULL,NULL,NULL,NULL,NULL,NULL),('2020-04-25 22:10:53','2020-04-25 22:10:53',4,'Emilie Goyette','Miss Dannie Pfannerstill I','streich.arne@example.net','2020-04-25 22:10:53','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','PWUMw7l76Y',NULL,NULL,'activo',1,NULL,NULL,NULL,NULL,NULL,NULL),('2020-04-25 22:10:53','2020-04-25 22:10:53',5,'Ms. Lia Powlowski III','Leanne Cronin I','ebba23@example.com','2020-04-25 22:10:53','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','5pvgcuuY2z',NULL,NULL,'activo',1,NULL,NULL,NULL,NULL,NULL,NULL),('2020-04-25 22:10:54','2020-04-25 22:10:54',6,'Carson Fadel II','Kayley Dicki PhD','jrau@example.org','2020-04-25 22:10:53','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','TNUP6H7mtl',NULL,NULL,'activo',1,NULL,NULL,NULL,NULL,NULL,NULL),('2020-04-25 22:10:54','2020-04-25 22:10:54',7,'Scot Yost','Graham Paucek I','braden.leffler@example.com','2020-04-25 22:10:53','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','9R0DmkIhay',NULL,NULL,'activo',1,NULL,NULL,NULL,NULL,NULL,NULL),('2020-04-25 22:10:54','2020-04-25 22:10:54',8,'Abbigail Wehner','Branson O\'Keefe','johnnie.fay@example.org','2020-04-25 22:10:53','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','r1Sn1RZ1Qh',NULL,NULL,'activo',1,NULL,NULL,NULL,NULL,NULL,NULL),('2020-04-25 22:10:54','2020-04-25 22:10:54',9,'Kristoffer Schulist','Dr. Forrest Bosco','gzieme@example.com','2020-04-25 22:10:53','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','G2JRYcFRcj',NULL,NULL,'activo',1,NULL,NULL,NULL,NULL,NULL,NULL),('2020-04-25 22:10:54','2020-04-25 22:10:54',10,'Tad Jast PhD','Kari Rogahn III','vgrimes@example.org','2020-04-25 22:10:53','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','FYkj2vXlzK',NULL,NULL,'activo',1,NULL,NULL,NULL,NULL,NULL,NULL),('2020-04-25 22:10:54','2020-04-25 22:10:54',11,'Rosario Reilly','Lucile Walter','spencer.jarret@example.net','2020-04-25 22:10:53','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','xCN5mo9doY',NULL,NULL,'activo',1,NULL,NULL,NULL,NULL,NULL,NULL),('2020-04-25 22:10:54','2020-04-25 22:10:54',12,'Lyric Haley','Alysha Terry','sylvia71@example.org','2020-04-25 22:10:53','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','TKzvZdResv',NULL,NULL,'activo',1,NULL,NULL,NULL,NULL,NULL,NULL),('2020-04-25 22:10:54','2020-04-25 22:10:54',13,'Prof. Montana Heaney','Hailee Grady','ivy74@example.com','2020-04-25 22:10:53','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','8PWGeESEYx',NULL,NULL,'activo',1,NULL,NULL,NULL,NULL,NULL,NULL),('2020-04-25 22:10:54','2020-04-25 22:10:54',14,'Prof. Alessandro Von','Makayla Wunsch','carlos.lindgren@example.org','2020-04-25 22:10:53','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','64YEs9OmZT',NULL,NULL,'activo',1,NULL,NULL,NULL,NULL,NULL,NULL),('2020-04-25 22:10:54','2020-04-25 22:10:54',15,'Eula Kulas','Shaylee Leuschke','kling.felix@example.com','2020-04-25 22:10:53','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Q4KcV08wj9',NULL,NULL,'activo',1,NULL,NULL,NULL,NULL,NULL,NULL),('2020-04-25 22:10:54','2020-04-25 22:10:54',16,'Mr. Mustafa Glover MD','Rogers Runte','heather77@example.net','2020-04-25 22:10:53','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','m2BMj9DEoy',NULL,NULL,'activo',1,NULL,NULL,NULL,NULL,NULL,NULL),('2020-04-25 22:10:54','2020-04-25 22:10:54',17,'Otilia Hirthe','Prof. Abigail Windler','upouros@example.com','2020-04-25 22:10:53','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','ONwOHHSlYP',NULL,NULL,'activo',1,NULL,NULL,NULL,NULL,NULL,NULL),('2020-04-25 22:10:54','2020-04-25 22:10:54',18,'Jean Corkery','Micah Ferry','dlittel@example.com','2020-04-25 22:10:53','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','3Lv0BlLEQO',NULL,NULL,'activo',1,NULL,NULL,NULL,NULL,NULL,NULL),('2020-04-25 22:10:54','2020-04-25 22:10:54',19,'Halie Mohr','Cade Johnston','corwin.elissa@example.net','2020-04-25 22:10:53','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','T03hdMxvn8',NULL,NULL,'activo',1,NULL,NULL,NULL,NULL,NULL,NULL),('2020-04-25 22:10:54','2020-04-25 22:10:54',20,'Nakia Graham','Carson Collier DVM','fmurray@example.net','2020-04-25 22:10:53','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','DNbUYEDSKe',NULL,NULL,'activo',1,NULL,NULL,NULL,NULL,NULL,NULL),('2020-04-25 22:10:54','2020-04-25 22:10:54',21,'Leo Simonis I','Demario Casper V','cullen.shields@example.com','2020-04-25 22:10:53','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','tJOTLmWln9',NULL,NULL,'activo',1,NULL,NULL,NULL,NULL,NULL,NULL),('2020-04-25 22:10:54','2020-04-25 22:10:54',22,'Maximillian Morar','Lulu Pouros','koelpin.hermina@example.com','2020-04-25 22:10:53','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','XwZhItSqY0',NULL,NULL,'activo',1,NULL,NULL,NULL,NULL,NULL,NULL),('2020-04-25 22:10:54','2020-04-25 22:10:54',23,'Anissa Zemlak','Maye Hill','lehner.dock@example.org','2020-04-25 22:10:53','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','7vf1J283mM',NULL,NULL,'activo',1,NULL,NULL,NULL,NULL,NULL,NULL),('2020-04-25 22:10:54','2020-04-25 22:10:54',24,'Ms. Mckayla Rogahn','Mrs. Corrine Cormier','elmore01@example.org','2020-04-25 22:10:53','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','EolSKJ6DrL',NULL,NULL,'activo',1,NULL,NULL,NULL,NULL,NULL,NULL),('2020-04-25 22:10:54','2020-04-25 22:10:54',25,'Elyssa Kunze','Adella Rosenbaum','jabernathy@example.com','2020-04-25 22:10:53','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Y3sJWceDxJ',NULL,NULL,'activo',1,NULL,NULL,NULL,NULL,NULL,NULL),('2020-04-25 22:10:54','2020-04-25 22:10:54',26,'Arjun Kiehn','Bethany Kub','marc.ryan@example.net','2020-04-25 22:10:53','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','k1J7ReKdVa',NULL,NULL,'activo',1,NULL,NULL,NULL,NULL,NULL,NULL),('2020-04-25 22:10:54','2020-04-25 22:10:54',27,'Doug Walter IV','Dangelo Lang','gleichner.esmeralda@example.org','2020-04-25 22:10:53','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','KmB4pwwgcX',NULL,NULL,'activo',1,NULL,NULL,NULL,NULL,NULL,NULL);
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

-- Dump completed on 2020-04-27 17:57:29
