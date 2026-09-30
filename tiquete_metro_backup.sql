-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: tiquete-metro
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `metro_datos_personales_actual`
--

DROP TABLE IF EXISTS `metro_datos_personales_actual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `metro_datos_personales_actual` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `periodo` int(11) NOT NULL,
  `motivo` bigint(20) unsigned NOT NULL,
  `tipo_documento` bigint(20) unsigned NOT NULL,
  `documento` varchar(20) NOT NULL,
  `genero` bigint(20) unsigned NOT NULL,
  `cual_genero` varchar(45) DEFAULT NULL,
  `primer_nombre` text NOT NULL,
  `segundo_nombre` text DEFAULT NULL,
  `primer_apellido` text NOT NULL,
  `segundo_apellido` text DEFAULT NULL,
  `civica` varchar(20) DEFAULT NULL,
  `nombre_civica` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `edad` varchar(20) NOT NULL,
  `dirCampo1` bigint(20) unsigned DEFAULT NULL,
  `dirCampo2` varchar(20) DEFAULT NULL,
  `dirCampo3` varchar(20) DEFAULT NULL,
  `dirCampo4` bigint(20) unsigned DEFAULT NULL,
  `dirCampo5` varchar(20) DEFAULT NULL,
  `dirCampo6` varchar(20) DEFAULT NULL,
  `dirCampo7` bigint(20) unsigned DEFAULT NULL,
  `dirCampo8` varchar(20) DEFAULT NULL,
  `dirCampo9` text DEFAULT NULL,
  `direccion` longtext DEFAULT NULL,
  `municipio` bigint(20) unsigned NOT NULL,
  `comuna` bigint(20) unsigned DEFAULT NULL,
  `barrio` bigint(20) unsigned DEFAULT NULL,
  `OtroBarrio` varchar(200) DEFAULT NULL,
  `estrato` bigint(20) unsigned NOT NULL,
  `puntajeSisben` bigint(20) unsigned DEFAULT NULL,
  `discapacidad` bigint(20) unsigned NOT NULL,
  `tipo_discapacidad` varchar(45) DEFAULT NULL,
  `correo` text NOT NULL,
  `celular` text NOT NULL,
  `telefonoFijo` text DEFAULT NULL,
  `nivel_academico` bigint(20) unsigned NOT NULL,
  `fondo` bigint(20) unsigned NOT NULL,
  `semestre` int(11) DEFAULT NULL,
  `grado` bigint(20) unsigned DEFAULT NULL,
  `fecha_registro` varchar(20) NOT NULL,
  `acepta` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `estado_validacion` varchar(20) NOT NULL DEFAULT 'PENDIENTE',
  `decision_manual` tinyint(1) NOT NULL DEFAULT 0,
  `archivo_documento_identidad` varchar(255) DEFAULT NULL,
  `estado_archivo_identidad` varchar(20) DEFAULT NULL,
  `obs_archivo_identidad` text DEFAULT NULL,
  `archivo_servicios_publicos` varchar(255) DEFAULT NULL,
  `estado_archivo_servicios` varchar(20) DEFAULT NULL,
  `obs_archivo_servicios` text DEFAULT NULL,
  `archivo_tarjeta_civica` varchar(255) DEFAULT NULL,
  `estado_archivo_civica` varchar(20) DEFAULT NULL,
  `obs_archivo_civica` text DEFAULT NULL,
  `archivo_certificado_discapacidad` varchar(255) DEFAULT NULL,
  `estado_archivo_discapacidad` varchar(20) DEFAULT NULL,
  `obs_archivo_discapacidad` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `metro_datos_personales_actual_motivo_foreign` (`motivo`),
  KEY `metro_datos_personales_actual_tipo_documento_foreign` (`tipo_documento`),
  KEY `metro_datos_personales_actual_genero_foreign` (`genero`),
  KEY `metro_datos_personales_actual_dircampo1_foreign` (`dirCampo1`),
  KEY `metro_datos_personales_actual_dircampo4_foreign` (`dirCampo4`),
  KEY `metro_datos_personales_actual_dircampo7_foreign` (`dirCampo7`),
  KEY `metro_datos_personales_actual_municipio_foreign` (`municipio`),
  KEY `metro_datos_personales_actual_comuna_foreign` (`comuna`),
  KEY `metro_datos_personales_actual_barrio_foreign` (`barrio`),
  KEY `metro_datos_personales_actual_estrato_foreign` (`estrato`),
  KEY `metro_datos_personales_actual_puntajesisben_foreign` (`puntajeSisben`),
  KEY `metro_datos_personales_actual_discapacidad_foreign` (`discapacidad`),
  KEY `metro_datos_personales_actual_nivel_academico_foreign` (`nivel_academico`),
  KEY `metro_datos_personales_actual_fondo_foreign` (`fondo`),
  KEY `metro_datos_personales_actual_grado_foreign` (`grado`),
  CONSTRAINT `metro_datos_personales_actual_barrio_foreign` FOREIGN KEY (`barrio`) REFERENCES `t1_barrio` (`id`),
  CONSTRAINT `metro_datos_personales_actual_comuna_foreign` FOREIGN KEY (`comuna`) REFERENCES `t1_comuna` (`id`),
  CONSTRAINT `metro_datos_personales_actual_dircampo1_foreign` FOREIGN KEY (`dirCampo1`) REFERENCES `t1_tipo_via` (`id`),
  CONSTRAINT `metro_datos_personales_actual_dircampo4_foreign` FOREIGN KEY (`dirCampo4`) REFERENCES `t1_orientacion` (`id`),
  CONSTRAINT `metro_datos_personales_actual_dircampo7_foreign` FOREIGN KEY (`dirCampo7`) REFERENCES `t1_orientacion` (`id`),
  CONSTRAINT `metro_datos_personales_actual_discapacidad_foreign` FOREIGN KEY (`discapacidad`) REFERENCES `t1_discapacidad` (`id`),
  CONSTRAINT `metro_datos_personales_actual_estrato_foreign` FOREIGN KEY (`estrato`) REFERENCES `t1_estrato` (`id`),
  CONSTRAINT `metro_datos_personales_actual_fondo_foreign` FOREIGN KEY (`fondo`) REFERENCES `t1_fondo` (`id`),
  CONSTRAINT `metro_datos_personales_actual_genero_foreign` FOREIGN KEY (`genero`) REFERENCES `t1_genero` (`id`),
  CONSTRAINT `metro_datos_personales_actual_grado_foreign` FOREIGN KEY (`grado`) REFERENCES `t1_grado` (`id`),
  CONSTRAINT `metro_datos_personales_actual_motivo_foreign` FOREIGN KEY (`motivo`) REFERENCES `t1_motivo_diligenciar_formulario` (`id`),
  CONSTRAINT `metro_datos_personales_actual_municipio_foreign` FOREIGN KEY (`municipio`) REFERENCES `t1_municipio` (`id`),
  CONSTRAINT `metro_datos_personales_actual_nivel_academico_foreign` FOREIGN KEY (`nivel_academico`) REFERENCES `t1_nivel_academico` (`id`),
  CONSTRAINT `metro_datos_personales_actual_puntajesisben_foreign` FOREIGN KEY (`puntajeSisben`) REFERENCES `t1_sisben` (`id`),
  CONSTRAINT `metro_datos_personales_actual_tipo_documento_foreign` FOREIGN KEY (`tipo_documento`) REFERENCES `t1_tipo_documento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metro_datos_personales_actual`
--

LOCK TABLES `metro_datos_personales_actual` WRITE;
/*!40000 ALTER TABLE `metro_datos_personales_actual` DISABLE KEYS */;
INSERT INTO `metro_datos_personales_actual` VALUES (3,17,1,1,'1001663829',1,NULL,'luis','hernan','torres','machado','12312312','luis hernan torres machado','2001-04-03','25',5,'12','A',NULL,'93','A',NULL,'06','Segundo Piso','CALLE 12 A # 93 A 06 || Segundo Piso',10,7,88,NULL,2,1,2,NULL,'HERNASN@gmail.com','314556262',NULL,2,1,NULL,7,'2026-09-08 16:22:10','1',1,'PENDIENTE',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2026-09-07 23:34:56','2026-09-08 21:22:10'),(6,17,1,1,'1223334444',1,NULL,'lluuiiss','hheerrnnaann TEST','ttoorreess','mmaacchhaaddoo','11253352','LHTM','2001-04-03','25',5,'12','A',NULL,'93','A',NULL,'06','SEGUNDO PISO','CALLE 12 A # 93 A 06 || SEGUNDO PISO',10,7,98,NULL,2,5,2,NULL,'luisddfffgd@gmail.com','3331444455555','66666604444',4,7,10,NULL,'2026-09-08 16:49:32','1',3,'ACEPTADA',0,'documentos/1223334444_identidad.pdf','ACEPTADO',NULL,'documentos/1223334444_servicios.pdf','ACEPTADO',NULL,'documentos/1223334444_civica.pdf','ACEPTADO',NULL,NULL,NULL,NULL,'2026-09-08 21:49:32','2026-09-09 20:08:44');
/*!40000 ALTER TABLE `metro_datos_personales_actual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_09_04_195602_create_t1_motivo_diligenciar_formulario',1),(5,'2026_09_04_200848_create_t1_tipo_documento',1),(6,'2026_09_04_200849_create_t1_genero',1),(7,'2026_09_04_200849_create_t1_municipio',1),(8,'2026_09_04_200850_create_t1_comuna',1),(9,'2026_09_04_200850_create_t1_estrato',1),(10,'2026_09_04_200851_create_t1_fondo',1),(11,'2026_09_04_200851_create_t1_nivel_academico',1),(12,'2026_09_04_200852_create_t1_tipo_discapacidad',1),(13,'2026_09_04_200859_create_t1_barrio',1),(14,'2026_09_04_203138_create_t1_tipo_via',1),(15,'2026_09_04_203223_create_t1_orientacion',1),(16,'2026_09_04_203226_create_t1_sisben',1),(17,'2026_09_04_203236_create_t1_discapacidad',1),(18,'2026_09_04_203238_create_t1_grado',1),(19,'2026_09_04_204355_create_metro_datos_personales_actual',1),(20,'2026_09_04_215251_add_nivel_academico_id_to_t1_grado',1),(21,'2026_09_07_180502_create_t1_sino',2),(22,'2026_09_08_200558_add_revision_columns_to_metro_datos_personales_actual',3),(23,'2026_09_08_205032_add_decision_manual_to_metro_datos_personales_actual',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('bkoZSdaMWXNUukddHWdbEUa0XGxau1Twh23lGKms',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoidEtXeEFoVm9LeVg5UWZtQURaSkNRNXc5ODd0TUlrR2xRNnM3U2VrRiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbi1tZXRybyI7czo1OiJyb3V0ZSI7czoxMToibWV0cm8ubG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE0OiJjZWR1bGFfdXN1YXJpbyI7czoxMDoiMTAwMTY2MzgyOSI7czo4OiJlc19hZG1pbiI7YjoxO30=',1788974663),('EnAIeljNy5TzK16DXbBhSAUH1hUiRZKBB1eTAVQN',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoieHN0aUZBYng4Z1FvZ3lwcThsUmMyMW1XZGs3SENXMWl1YzVtM21oVyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbi1tZXRybyI7czo1OiJyb3V0ZSI7czoxMToibWV0cm8ubG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1788903651),('Kx6f8EneThvQZ4MLvIE7WNxKBpIZ3G3rrpz4bppQ',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUmlIOE8ydlJ5Z2o0YWpteGg2ME1CVmN6dWdqSkhzdHl2Q0VvQzk5WiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbi1tZXRybyI7czo1OiJyb3V0ZSI7czoxMToibWV0cm8ubG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1788973915),('MMch7d7BgOdHt5T1reIP6THdEVHL99ETQpkl0RV3',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; es-CO) WindowsPowerShell/5.1.26100.9168','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWlhieHh4MllwRFBIM0daUmxPV2h1SGFtMHhkam80MEZHemd3VVpuZSI7czo0OiJpbmZvIjtzOjY1OiJQb3IgZmF2b3IgaW5ncmVzYSB0dSBuw7ptZXJvIGRlIGRvY3VtZW50byBwYXJhIGFjY2VkZXIgYWwgcG9ydGFsLiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjE6e2k6MDtzOjQ6ImluZm8iO319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9pbmljaW8tbWV0cm8iO3M6NToicm91dGUiO3M6MTI6Im1ldHJvLmluaWNpbyI7fX0=',1788896731),('NbxxtG15fQBKtqazvfJwcROpFhmDkA6JkDndaZ9i',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; es-CO) WindowsPowerShell/5.1.26100.9168','YTozOntzOjY6Il90b2tlbiI7czo0MDoiWWl4dHZjdzFmOUlCdGlDZ0RKMzVPYklhSnJBVW9jbFl2ZjcwRWZjNiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbi1tZXRybyI7czo1OiJyb3V0ZSI7czoxMToibWV0cm8ubG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1788895795),('nZwQl92yWTd6NGThgxdeJ7UfK7ddwBSJdblbG1Ou',NULL,'127.0.0.1','curl/8.21.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiaElTTTE5RlM1M2NrbkNBaGdzWnNpVWNVbkZMVWIzZzlKaTVJb1ZRdiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sb2dpbi1tZXRybyI7czo1OiJyb3V0ZSI7czoxNzoiYWRtaW4ubWV0cm8ubG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1788974465),('PGGjGp5Tmx5zF8ws0Ed1GiMCqKnqh5X7bbhb7PDu',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRzJkUnd0SlZ6bnVkcGp0YmxoMFRXbE1Sdjc0cEVxa0xNT0RtQWFhOCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9zb2xpY2l0dWRlcy1tZXRyby9kYXRhIjtzOjU6InJvdXRlIjtzOjI4OiJhZG1pbi5tZXRyby5zb2xpY2l0dWRlcy5kYXRhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxNDoiY2VkdWxhX3VzdWFyaW8iO3M6MTA6IjEwMDE2NjM4MjkiO3M6ODoiZXNfYWRtaW4iO2I6MTt9',1788901889),('q2qwmx66QiGveWIVcRHnXC0KOWFm1O288whcAH8a',NULL,'127.0.0.1','curl/8.21.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMmdaYTNWNlNjT1BZbndOQkhRRlZ3SnR1a1BtbUtBc1NzVlRMRUJvUCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbi1tZXRybyI7czo1OiJyb3V0ZSI7czoxMToibWV0cm8ubG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1788973538),('xf1VM0dzI9qLsSUsvMUpL5Vrz6ee40ajTvtMCL08',NULL,'127.0.0.1','curl/8.21.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoienhQdkxaVVl4UHk2QUpKbXdtRkhOcTdPd1RzVExQaWdITXozaTBZVCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9sb2dpbi1tZXRybyI7czo1OiJyb3V0ZSI7czoxNzoiYWRtaW4ubWV0cm8ubG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1788973531),('YTj6vs55RjlFP7mRkFSTBLcEPZPk9UsZdSBdXxKa',NULL,'127.0.0.1','curl/8.21.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZmdDZkkzQ3BjOEZkeWlDeDQ1NjNtd3Q2RGRxYWlEcWRvNmJxMGdLNCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sb2dpbi1tZXRybyI7czo1OiJyb3V0ZSI7czoxNzoiYWRtaW4ubWV0cm8ubG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1788974604),('yvbN3qVAXJKGK3V5n8C9M8A0JIVooeX7kjcJbVOo',NULL,'127.0.0.1','curl/8.21.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZEFJM3gxdm0zTWZsdlNYUFUzbVM0V1lvUTdrTTU2bDlpQm1yaGhvMyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1788974261);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t1_barrio`
--

DROP TABLE IF EXISTS `t1_barrio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t1_barrio` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT '1',
  `comuna_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `t1_barrio_comuna_id_foreign` (`comuna_id`),
  CONSTRAINT `t1_barrio_comuna_id_foreign` FOREIGN KEY (`comuna_id`) REFERENCES `t1_comuna` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=254 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t1_barrio`
--

LOCK TABLES `t1_barrio` WRITE;
/*!40000 ALTER TABLE `t1_barrio` DISABLE KEYS */;
INSERT INTO `t1_barrio` VALUES (1,'Santo Domingo Savio N°1','1',1),(2,'Santo Domingo Savio N°2','1',1),(3,'Popular','1',1),(4,'Granizal','1',1),(5,'Moscú N°2','1',1),(6,'Villa Guadalupe','1',1),(7,'San Pablo','1',1),(8,'Aldea Pablo VI','1',1),(9,'La Esperanza N°2','1',1),(10,'El Compromiso','1',1),(11,'La Avanzada','1',1),(12,'Carpinelo','1',1),(13,'La Isla','1',2),(14,'El Playón de Los Comuneros','1',2),(15,'Pablo VI','1',2),(16,'La Frontera','1',2),(17,'La Francia','1',2),(18,'Andalucía','1',2),(19,'Villa del Socorro','1',2),(20,'Villa Niza','1',2),(21,'Moscú N°1','1',2),(22,'Santa Cruz','1',2),(23,'La Rosa','1',2),(24,'La Salle','1',3),(25,'Las Granjas','1',3),(26,'Campo Valdés N°2','1',3),(27,'Santa Inés','1',3),(28,'El Raizal','1',3),(29,'El Pomar','1',3),(30,'Manrique Central N°2','1',3),(31,'Manrique Oriental','1',3),(32,'Versalles N°1','1',3),(33,'Versalles N°2','1',3),(34,'La Cruz','1',3),(35,'Oriente','1',3),(36,'María Cano - Carambolas','1',3),(37,'San José La Cima N°1','1',3),(38,'San José La Cima N°2','1',3),(39,'Berlín','1',4),(40,'San Isidro','1',4),(41,'Palermo','1',4),(42,'Bermejal - Los Álamos','1',4),(43,'Moravia','1',4),(44,'Sevilla','1',4),(45,'San Pedro','1',4),(46,'Manrique Central N°1','1',4),(47,'Campo Valdés N°1','1',4),(48,'Las Esmeraldas','1',4),(49,'La Piñuela','1',4),(50,'Aranjuez','1',4),(51,'Brasilia','1',4),(52,'Miranda','1',4),(53,'Toscana','1',5),(54,'Las Brisas','1',5),(55,'Florencia','1',5),(56,'Tejelo','1',5),(57,'Boyacá','1',5),(58,'Héctor Abad Gómez','1',5),(59,'Belalcázar','1',5),(60,'Girardot','1',5),(61,'Tricentenario','1',5),(62,'Castilla','1',5),(63,'Francisco Antonio Zea','1',5),(64,'Alfonso López','1',5),(65,'Caribe','1',5),(66,'El Progreso','1',5),(67,'Santander','1',6),(68,'Doce de Octubre N°1','1',6),(69,'Doce de Octubre N°2','1',6),(70,'Pedregal','1',6),(71,'La Esperanza','1',6),(72,'San Martín de Porres','1',6),(73,'Kennedy','1',6),(74,'Picacho','1',6),(75,'Picachito','1',6),(76,'Mirador del Doce','1',6),(77,'Progreso N°2','1',6),(78,'El Triunfo','1',6),(79,'Cerro El Volador','1',7),(80,'San Germán','1',7),(81,'Facultad de Minas U. Nacional','1',7),(82,'La Pilarica','1',7),(83,'Bosques de San Pablo','1',7),(84,'Altamira','1',7),(85,'Córdoba','1',7),(86,'López de Mesa','1',7),(87,'El Diamante','1',7),(88,'Aures N°1','1',7),(89,'Aures N°2','1',7),(90,'Bello Horizonte','1',7),(91,'Villa Flora','1',7),(92,'Palenque','1',7),(93,'Robledo','1',7),(94,'Cucaracho','1',7),(95,'Fuente Clara','1',7),(96,'Santa Margarita','1',7),(97,'Olaya Herrera','1',7),(98,'Pajarito','1',7),(99,'Monteclaro','1',7),(100,'Nueva Villa de La Iguaná','1',7),(101,'Villa Hermosa','1',8),(102,'La Mansión','1',8),(103,'San Miguel','1',8),(104,'La Ladera','1',8),(105,'Batallón Girardot','1',8),(106,'Llanaditas','1',8),(107,'Los Mangos','1',8),(108,'Enciso','1',8),(109,'Sucre','1',8),(110,'El Pinal','1',8),(111,'Trece de Noviembre','1',8),(112,'La Libertad','1',8),(113,'Villatina','1',8),(114,'San Antonio','1',8),(115,'Las Estancias','1',8),(116,'Villa Turbay','1',8),(117,'La Sierra','1',8),(118,'Villa Lilliam','1',8),(119,'Juan Pablo II','1',9),(120,'Barrios de Jesús','1',9),(121,'Bombona N°2','1',9),(122,'Los Cerros El Vergel','1',9),(123,'Alejandro Echavarría','1',9),(124,'Barrio Caicedo','1',9),(125,'Buenos Aires','1',9),(126,'Miraflores','1',9),(127,'Cataluña','1',9),(128,'La Milagrosa','1',9),(129,'Gerona','1',9),(130,'El Salvador','1',9),(131,'Loreto','1',9),(132,'Asomadera N°1','1',9),(133,'Asomadera N°2','1',9),(134,'Asomadera N°3','1',9),(135,'Ocho de Marzo','1',9),(136,'Prado','1',10),(137,'Jesús Nazareno','1',10),(138,'El Chagualo','1',10),(139,'Estación Villa','1',10),(140,'San Benito','1',10),(141,'Guayaquil','1',10),(142,'Corazón de Jesús','1',10),(143,'Calle Nueva','1',10),(144,'Perpetuo Socorro','1',10),(145,'Barrio Colón','1',10),(146,'Las Palmas','1',10),(147,'Bomboná N°1','1',10),(148,'Boston','1',10),(149,'Los Ángeles','1',10),(150,'Villa Nueva','1',10),(151,'La Candelaria','1',10),(152,'San Diego','1',10),(153,'Carlos E. Restrepo','1',11),(154,'Suramericana','1',11),(155,'Naranjal','1',11),(156,'San Joaquín','1',11),(157,'Los Conquistadores','1',11),(158,'Bolivariana','1',11),(159,'Laureles','1',11),(160,'Las Acacias','1',11),(161,'La Castellana','1',11),(162,'Lorena','1',11),(163,'El Velódromo','1',11),(164,'Estadio','1',11),(165,'Los Colores','1',11),(166,'Cuarta Brigada','1',11),(167,'Florida Nueva','1',11),(168,'Ferrini','1',12),(169,'Calasanz','1',12),(170,'Los Pinos','1',12),(171,'La América','1',12),(172,'La Floresta','1',12),(173,'Santa Lucía','1',12),(174,'El Danubio','1',12),(175,'Campo Alegre','1',12),(176,'Santa Mónica','1',12),(177,'Barrio Cristóbal','1',12),(178,'Simón Bolívar','1',12),(179,'Santa Teresita','1',12),(180,'Calasanz Parte Alta','1',12),(181,'El Pesebre','1',13),(182,'Blanquizal','1',13),(183,'Santa Rosa de Lima','1',13),(184,'Los Alcázares','1',13),(185,'Metropolitano','1',13),(186,'La Pradera','1',13),(187,'Juan XXIII - La Quiebra','1',13),(188,'San Javier N°2','1',13),(189,'San Javier N°1','1',13),(190,'Veinte de Julio','1',13),(191,'Belencito','1',13),(192,'Betania','1',13),(193,'El Corazón','1',13),(194,'Las Independencias','1',13),(195,'Nuevos Conquistadores','1',13),(196,'El Salado','1',13),(197,'Eduardo Santos','1',13),(198,'Antonio Nariño','1',13),(199,'El Socorro','1',13),(200,'Barrio Colombia','1',14),(201,'Simesa','1',14),(202,'Villa Carlota','1',14),(203,'Castropol','1',14),(204,'Lalinde','1',14),(205,'Las Lomas N°1','1',14),(206,'Las Lomas N°2','1',14),(207,'Altos del Poblado','1',14),(208,'El Tesoro','1',14),(209,'Los Naranjos','1',14),(210,'Los Balsos N°1','1',14),(211,'San Lucas','1',14),(212,'El Diamante N°2','1',14),(213,'El Castillo','1',14),(214,'Los Balsos N°2','1',14),(215,'Alejandría','1',14),(216,'La Florida','1',14),(217,'El Poblado','1',14),(218,'Manila','1',14),(219,'Astorga','1',14),(220,'Patio Bonito','1',14),(221,'La Aguacatala','1',14),(222,'Santa María de Los Ángeles','1',14),(223,'Tenche','1',15),(224,'Trinidad','1',15),(225,'Santa Fé','1',15),(226,'Parque Juan Pablo II','1',15),(227,'Campo Amor','1',15),(228,'Noel','1',15),(229,'Cristo Rey','1',15),(230,'Guayabal','1',15),(231,'La Colina','1',15),(232,'El Rodeo','1',15),(233,'Fátima','1',16),(234,'Rosales','1',16),(235,'Belén','1',16),(236,'Granada','1',16),(237,'San Bernardo','1',16),(238,'Las Playas','1',16),(239,'Diego Echavarría','1',16),(240,'La Mota','1',16),(241,'La Hondonada','1',16),(242,'El Rincón','1',16),(243,'La Loma de Los Bernal','1',16),(244,'La Gloria','1',16),(245,'Altavista','1',16),(246,'La Palma','1',16),(247,'Los Alpes','1',16),(248,'Las Violetas','1',16),(249,'Las Mercedes','1',16),(250,'Nueva Villa de Aburrá','1',16),(251,'Miravalle','1',16),(252,'El Nogal - Los Almendros','1',16),(253,'Cerro Nutibara','1',16);
/*!40000 ALTER TABLE `t1_barrio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t1_comuna`
--

DROP TABLE IF EXISTS `t1_comuna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t1_comuna` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT '1',
  `municipio_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `t1_comuna_municipio_id_foreign` (`municipio_id`),
  CONSTRAINT `t1_comuna_municipio_id_foreign` FOREIGN KEY (`municipio_id`) REFERENCES `t1_municipio` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t1_comuna`
--

LOCK TABLES `t1_comuna` WRITE;
/*!40000 ALTER TABLE `t1_comuna` DISABLE KEYS */;
INSERT INTO `t1_comuna` VALUES (1,'1 - POPULAR','1',10),(2,'2 - SANTA CRUZ','1',10),(3,'3 - MANRIQUE','1',10),(4,'4 - ARANJUEZ','1',10),(5,'5 - CASTILLA','1',10),(6,'6 - DOCE DE OCTUBRE','1',10),(7,'7 - ROBLEDO','1',10),(8,'8 - VILLA HERMOSA','1',10),(9,'9 - BUENOS AIRES','1',10),(10,'10 - LA CANDELARIA','1',10),(11,'11 - LAURELES ESTADIO','1',10),(12,'12 - LA AMERICA','1',10),(13,'13 - SAN JAVIER','1',10),(14,'14 - EL POBLADO','1',10),(15,'15 - GUAYABAL','1',10),(16,'16 - BELEN','1',10);
/*!40000 ALTER TABLE `t1_comuna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t1_discapacidad`
--

DROP TABLE IF EXISTS `t1_discapacidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t1_discapacidad` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t1_discapacidad`
--

LOCK TABLES `t1_discapacidad` WRITE;
/*!40000 ALTER TABLE `t1_discapacidad` DISABLE KEYS */;
INSERT INTO `t1_discapacidad` VALUES (1,'SI','1'),(2,'NO','1');
/*!40000 ALTER TABLE `t1_discapacidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t1_estrato`
--

DROP TABLE IF EXISTS `t1_estrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t1_estrato` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t1_estrato`
--

LOCK TABLES `t1_estrato` WRITE;
/*!40000 ALTER TABLE `t1_estrato` DISABLE KEYS */;
INSERT INTO `t1_estrato` VALUES (1,'1','1'),(2,'2','1'),(3,'3','1'),(4,'4','1'),(5,'5','1'),(6,'6','1');
/*!40000 ALTER TABLE `t1_estrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t1_fondo`
--

DROP TABLE IF EXISTS `t1_fondo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t1_fondo` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t1_fondo`
--

LOCK TABLES `t1_fondo` WRITE;
/*!40000 ALTER TABLE `t1_fondo` DISABLE KEYS */;
INSERT INTO `t1_fondo` VALUES (1,'VISION4RIOS','1'),(2,'MATRICULA CERO','1'),(3,'FONDOS PREGRADO','1'),(4,'FONDOS POSGRADO','1'),(5,'MEJORES BACHILLERES','1'),(6,'MEJORES DEPORTISTAS','1'),(7,'@MEDELLIN','1');
/*!40000 ALTER TABLE `t1_fondo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t1_genero`
--

DROP TABLE IF EXISTS `t1_genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t1_genero` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t1_genero`
--

LOCK TABLES `t1_genero` WRITE;
/*!40000 ALTER TABLE `t1_genero` DISABLE KEYS */;
INSERT INTO `t1_genero` VALUES (1,'MASCULINO','1'),(2,'FEMENINO','1'),(3,'OTRO','1');
/*!40000 ALTER TABLE `t1_genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t1_grado`
--

DROP TABLE IF EXISTS `t1_grado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t1_grado` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT '1',
  `nivel_academico_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `t1_grado_nivel_academico_id_foreign` (`nivel_academico_id`),
  CONSTRAINT `t1_grado_nivel_academico_id_foreign` FOREIGN KEY (`nivel_academico_id`) REFERENCES `t1_nivel_academico` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t1_grado`
--

LOCK TABLES `t1_grado` WRITE;
/*!40000 ALTER TABLE `t1_grado` DISABLE KEYS */;
INSERT INTO `t1_grado` VALUES (1,'1','1',1),(2,'2','1',1),(3,'3','1',1),(4,'4','1',1),(5,'5','1',1),(6,'6','1',2),(7,'7','1',2),(8,'8','1',2),(9,'9','1',2),(10,'10','1',2),(11,'11','1',2),(12,'6','1',3),(13,'7','1',3),(14,'8','1',3),(15,'9','1',3),(16,'10','1',3),(17,'11','1',3);
/*!40000 ALTER TABLE `t1_grado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t1_motivo_diligenciar_formulario`
--

DROP TABLE IF EXISTS `t1_motivo_diligenciar_formulario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t1_motivo_diligenciar_formulario` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t1_motivo_diligenciar_formulario`
--

LOCK TABLES `t1_motivo_diligenciar_formulario` WRITE;
/*!40000 ALTER TABLE `t1_motivo_diligenciar_formulario` DISABLE KEYS */;
INSERT INTO `t1_motivo_diligenciar_formulario` VALUES (1,'SOLICITAR BENEFICIO','1'),(2,'ACTUALIZAR INFORMACIÓN','1');
/*!40000 ALTER TABLE `t1_motivo_diligenciar_formulario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t1_municipio`
--

DROP TABLE IF EXISTS `t1_municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t1_municipio` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t1_municipio`
--

LOCK TABLES `t1_municipio` WRITE;
/*!40000 ALTER TABLE `t1_municipio` DISABLE KEYS */;
INSERT INTO `t1_municipio` VALUES (1,'BARBOSA','1'),(2,'BELLO','1'),(3,'CALDAS','1'),(4,'COPACABANA','1'),(5,'ENVIGADO','1'),(6,'GIRARDOTA','1'),(7,'ITAGÜI','1'),(8,'LA ESTRELLA','1'),(9,'LA UNION','1'),(10,'MEDELLIN','1'),(11,'SABANETA','1');
/*!40000 ALTER TABLE `t1_municipio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t1_nivel_academico`
--

DROP TABLE IF EXISTS `t1_nivel_academico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t1_nivel_academico` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t1_nivel_academico`
--

LOCK TABLES `t1_nivel_academico` WRITE;
/*!40000 ALTER TABLE `t1_nivel_academico` DISABLE KEYS */;
INSERT INTO `t1_nivel_academico` VALUES (1,'PRIMARIA','1'),(2,'SECUNDARIA','1'),(3,'MEDIA','1'),(4,'SUPERIOR','1');
/*!40000 ALTER TABLE `t1_nivel_academico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t1_orientacion`
--

DROP TABLE IF EXISTS `t1_orientacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t1_orientacion` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t1_orientacion`
--

LOCK TABLES `t1_orientacion` WRITE;
/*!40000 ALTER TABLE `t1_orientacion` DISABLE KEYS */;
INSERT INTO `t1_orientacion` VALUES (1,'BIS','1'),(2,'ESTE','1'),(3,'NORTE','1'),(4,'OESTE','1'),(5,'SUR','1');
/*!40000 ALTER TABLE `t1_orientacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t1_sino`
--

DROP TABLE IF EXISTS `t1_sino`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t1_sino` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t1_sino`
--

LOCK TABLES `t1_sino` WRITE;
/*!40000 ALTER TABLE `t1_sino` DISABLE KEYS */;
INSERT INTO `t1_sino` VALUES (1,'SI','1'),(2,'NO','1');
/*!40000 ALTER TABLE `t1_sino` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t1_sisben`
--

DROP TABLE IF EXISTS `t1_sisben`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t1_sisben` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t1_sisben`
--

LOCK TABLES `t1_sisben` WRITE;
/*!40000 ALTER TABLE `t1_sisben` DISABLE KEYS */;
INSERT INTO `t1_sisben` VALUES (1,'A','1'),(2,'B','1'),(3,'C','1'),(4,'D','1'),(5,'NO ESTA EN SISBEN','1');
/*!40000 ALTER TABLE `t1_sisben` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t1_tipo_discapacidad`
--

DROP TABLE IF EXISTS `t1_tipo_discapacidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t1_tipo_discapacidad` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t1_tipo_discapacidad`
--

LOCK TABLES `t1_tipo_discapacidad` WRITE;
/*!40000 ALTER TABLE `t1_tipo_discapacidad` DISABLE KEYS */;
INSERT INTO `t1_tipo_discapacidad` VALUES (1,'FÍSICA','1'),(2,'SENSORIAL','1'),(3,'INTELECTUAL','1'),(4,'PSÍQUICA','1'),(5,'MÚLTIPLE','1');
/*!40000 ALTER TABLE `t1_tipo_discapacidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t1_tipo_documento`
--

DROP TABLE IF EXISTS `t1_tipo_documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t1_tipo_documento` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t1_tipo_documento`
--

LOCK TABLES `t1_tipo_documento` WRITE;
/*!40000 ALTER TABLE `t1_tipo_documento` DISABLE KEYS */;
INSERT INTO `t1_tipo_documento` VALUES (1,'CC','1'),(2,'TI','1'),(3,'RC','1'),(4,'PPT','1'),(5,'NES','1'),(6,'NUIP','1'),(7,'PAP','1'),(8,'PED','1'),(9,'CE','1');
/*!40000 ALTER TABLE `t1_tipo_documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t1_tipo_via`
--

DROP TABLE IF EXISTS `t1_tipo_via`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t1_tipo_via` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t1_tipo_via`
--

LOCK TABLES `t1_tipo_via` WRITE;
/*!40000 ALTER TABLE `t1_tipo_via` DISABLE KEYS */;
INSERT INTO `t1_tipo_via` VALUES (1,'AVENIDA','1'),(2,'AVENIDA CALLE','1'),(3,'AVENIDA CARRERA','1'),(4,'BULEVAR','1'),(5,'CALLE','1'),(6,'CARRERA','1'),(7,'CIRCULAR','1'),(8,'CIRCUNVALAR','1'),(9,'CTAS CORRIDAS','1'),(10,'DIAGONAL','1'),(11,'KILOMETRO','1'),(12,'PASAJE','1'),(13,'PASEO','1'),(14,'PEATONAL','1'),(15,'TRANSVERSAL','1'),(16,'TRONCAL','1'),(17,'VARIANTE','1'),(18,'VIA','1'),(19,'OTROS','1');
/*!40000 ALTER TABLE `t1_tipo_via` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Test User','test@example.com','2026-09-05 03:14:04','$2y$12$B.2AtXP0Ra7GUpCag6IsSOT8Wt2lWu2Wq3Ta/yN4ZqE3zAtKlsH3y','JIKJC7gn1Y','2026-09-05 03:14:04','2026-09-05 03:14:04');
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

-- Dump completed on 2026-09-09 14:23:53
