-- MySQL dump 10.13  Distrib 8.4.4, for Linux (x86_64)
--
-- Host: localhost    Database: db
-- ------------------------------------------------------
-- Server version	8.4.4

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acad_class_schedules`
--

DROP TABLE IF EXISTS `acad_class_schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `acad_class_schedules` (
  `id` tinyint DEFAULT NULL,
  `class_date` varchar(0) DEFAULT NULL,
  `start_time` varchar(5) DEFAULT NULL,
  `end_time` varchar(5) DEFAULT NULL,
  `prof_year_session_id` tinyint DEFAULT NULL,
  `lecture_type_id` tinyint DEFAULT NULL,
  `group_id` tinyint DEFAULT NULL,
  `subject_id` tinyint DEFAULT NULL,
  `teacher_id` tinyint DEFAULT NULL,
  `class_topic` varchar(63) DEFAULT NULL,
  `teaching_method` varchar(15) DEFAULT NULL,
  `tools_used` varchar(16) DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL,
  `updated_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acad_class_schedules`
--

LOCK TABLES `acad_class_schedules` WRITE;
/*!40000 ALTER TABLE `acad_class_schedules` DISABLE KEYS */;
INSERT INTO `acad_class_schedules` VALUES (4,'','13:00','14:00',1,10,14,46,3,'sddf','ffgg','sddfg','',''),(5,'','09:00','10:00',1,11,15,42,3,'sddf','ffgg','sddfg','',''),(6,'','09:00','10:00',2,10,14,50,4,'ddff','ffggg','dfggh','',''),(7,'','14:00','16:00',2,12,15,51,5,'sddf','ssdd','sdfg','',''),(8,'','10:00','11:00',2,10,14,51,4,'sddf','ssdd','sdfg','',''),(9,'','14:00','16:00',2,12,16,50,3,'Define Anaha, Enlist types of Anaha, Describe Adhmana and Atopa','Lecture and PPT','Book, Chart, PPT','','');
/*!40000 ALTER TABLE `acad_class_schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_staff`
--

DROP TABLE IF EXISTS `admin_staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_staff` (
  `id` tinyint DEFAULT NULL,
  `admin_staff_name` varchar(13) DEFAULT NULL,
  `gender_id` tinyint DEFAULT NULL,
  `admin_staff_email` varchar(15) DEFAULT NULL,
  `admin_staff_address` varchar(4) DEFAULT NULL,
  `admin_staff_photo` varchar(14) DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL,
  `updated_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_staff`
--

LOCK TABLES `admin_staff` WRITE;
/*!40000 ALTER TABLE `admin_staff` DISABLE KEYS */;
INSERT INTO `admin_staff` VALUES (1,'Dustidev Sahu',6,'admin@admin.com','ass','1746617978.png','',''),(3,'Kiran',7,'kiran@admin.com','ddff','1746669932.png','','');
/*!40000 ALTER TABLE `admin_staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attendences`
--

DROP TABLE IF EXISTS `attendences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attendences` (
  `id` tinyint DEFAULT NULL,
  `acad_class_schedule_id` tinyint DEFAULT NULL,
  `prof_year_session_student_id` tinyint DEFAULT NULL,
  `attendence_status` tinyint DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL,
  `updated_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendences`
--

LOCK TABLES `attendences` WRITE;
/*!40000 ALTER TABLE `attendences` DISABLE KEYS */;
INSERT INTO `attendences` VALUES (3,4,1,1,'',''),(4,4,2,0,'',''),(5,5,1,1,'',''),(6,6,3,1,'',''),(7,6,4,0,'',''),(8,7,3,1,'','');
/*!40000 ALTER TABLE `attendences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(44) DEFAULT NULL,
  `value` varchar(13) DEFAULT NULL,
  `expiration` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('laravel_cache_dds@ggmail.com|127.0.0.1:timer','i:1749968197;',1749968197),('laravel_cache_dds@ggmail.com|127.0.0.1','i:1;',1749968199);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(0) DEFAULT NULL,
  `owner` varchar(0) DEFAULT NULL,
  `expiration` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catagories`
--

DROP TABLE IF EXISTS `catagories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catagories` (
  `id` tinyint DEFAULT NULL,
  `parent_id` varchar(2) DEFAULT NULL,
  `full_name` varchar(76) DEFAULT NULL,
  `medium_name` varchar(13) DEFAULT NULL,
  `short_name` varchar(12) DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL,
  `updated_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catagories`
--

LOCK TABLES `catagories` WRITE;
/*!40000 ALTER TABLE `catagories` DISABLE KEYS */;
INSERT INTO `catagories` VALUES (1,'','BAMS Professional Years','Prof Yrs BAMS','BAMS','',''),(2,'','Gender','Gender','Sex','',''),(3,'1','First Professiional B.A.M.S','BAMS FIRST','1st  BAMS','',''),(4,'1','Second Professiional B.A.M.S','BAMS SECOND','2nd BAMS','',''),(5,'1','Third Professiional B.A.M.S','BAMS THIRD','3rd BAMS','',''),(6,'2','Male','Male','M','',''),(7,'2','Female','Female','F','',''),(8,'2','Trans Gender','Trans Gender','F','',''),(9,'','Lecture Type','LectTypes','LTs','',''),(10,'9','Lecture Hour Theory','LectTheory','LH','',''),(11,'9','Non Lecture Hour Theory','NLH Theory','NLHT','',''),(12,'9','Non Lecture Hour  Practical','NLH Practical','NLHP','',''),(13,'','Lecture Groups','LectGroups','LGs','',''),(14,'13','All Group','AllG','All','',''),(15,'13','Group A','GrpA','A','',''),(16,'13','Group B','SS','SS','',''),(17,'13','Group C','CC','CC','',''),(18,'13','Group D','SS','SS','',''),(19,'13','Group E','AA','AA','',''),(20,'13','Group F','AA','XX','',''),(21,'13','Group G','FF','FF','',''),(22,'13','Group H','QQ','WW','',''),(23,'','Terms','Terms','Terms','',''),(24,'23','First Term','1st Term','T1','',''),(25,'23','Second Term','2nd Term','T2','',''),(26,'23','Third Term','3rd Term','T3','',''),(27,'','Designations','Dsgn','Dsgn','',''),(28,'27','Professor, Class I','Professor','Professor','',''),(29,'27','Reader, Class I','Reader','Reader','',''),(30,'27','Lecturer, Class II','Lecturer','Lecturer','',''),(31,'27','ddff','ffg','ggg','',''),(32,'27','ddff','ffg','ggg','',''),(33,'27','ddff','ffg','ggg','',''),(34,'27','ddff','ffg','ggg','',''),(35,'27','ddff','ffg','ggg','',''),(36,'27','ddff','ffg','ggg','',''),(37,'27','ddff','ffg','ggg','',''),(38,'27','ddff','ffg','ggg','',''),(39,'27','ddff','ffg','ggg','',''),(40,'27','ddff','ffg','ggg','',''),(41,'','Subjects','Subjects','Subjects','',''),(42,'41','Sanksrit and Ayurved Itihas','AyUG SN & AI','AyUG SN & AI','',''),(43,'41','Padartha Vijnanam (Fundamental Principles of Ayurveda and Quantum Mechanics)','AyUG-PV','AyUG-PV','',''),(44,'41','Kriya Sharir (Human Physiology)','AyUG KS','AyUG KS','',''),(45,'41','Rachana Sharir (Human Anatomy)','AyUG-RS','AyUG-RS','',''),(46,'41','Samhita Adhyayan 1','AyUG-SA1','AyUG-SA1','',''),(47,'41','Rasashastra evam Bhaishajyakalpana','AyUG-RB','AyUG-RB','',''),(48,'41','Agad Tantra evam Vidhi Vaidyaka','AyUG-AT','AyUG-AT','',''),(49,'41','Samhita Adhyayan-2','AyUG-SA2','AyUG-SA2','',''),(50,'41','Dravyaguna Vigyan','AyUG-DG','AyUG-DG','',''),(51,'41','Roga Nidan evam Vikriti Vigyan','AyUG-RN','AyUG-RN','',''),(52,'41','Swasthavritta evam Yoga','AyUG-SW','AyUG-SW','',''),(53,'41','Kayachikitsa including Manasa Roga, Rasayana and Vajikarana','AyUG-KC','AyUG-KC','',''),(54,'41','Panchakarma &Upakarma','AyUG-PK','AyUG-PK','',''),(55,'41','Shalya Tantra','AyUG-ST','AyUG-ST','',''),(56,'41','Shalakya Tantra','AyUG-SL','AyUG-SL','',''),(57,'41','Prasuti Tantra evam Stree Roga','AyUG-PS','AyUG-PS','',''),(58,'41','Kaumarabhritya','AyUG-KB','AyUG-KB','',''),(59,'41','Samhita Adhyayan-3','AyUG-SA3','AyUG-SA3','',''),(60,'41','Atyaikachikitsa','AyUG-EM','AyUG-EM','',''),(61,'41','Research Methodology and Medical Statistics','AyUG-RM','AyUG-RM','',''),(62,'41','ss','ssd','ss','',''),(63,'41','ddf','dd','dd','',''),(64,'41','dd','dd','dd','',''),(65,'41','dd','dd','dd','',''),(66,'41','dd','dd','dd','',''),(67,'41','dd','dd','dd','',''),(68,'41','dd','dd','dd','',''),(69,'41','dd','dd','dd','',''),(70,'41','dd','dd','dd','','');
/*!40000 ALTER TABLE `catagories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` varchar(0) DEFAULT NULL,
  `uuid` varchar(0) DEFAULT NULL,
  `connection` varchar(0) DEFAULT NULL,
  `queue` varchar(0) DEFAULT NULL,
  `payload` varchar(0) DEFAULT NULL,
  `exception` varchar(0) DEFAULT NULL,
  `failed_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(0) DEFAULT NULL,
  `name` varchar(0) DEFAULT NULL,
  `total_jobs` varchar(0) DEFAULT NULL,
  `pending_jobs` varchar(0) DEFAULT NULL,
  `failed_jobs` varchar(0) DEFAULT NULL,
  `failed_job_ids` varchar(0) DEFAULT NULL,
  `options` varchar(0) DEFAULT NULL,
  `cancelled_at` varchar(0) DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL,
  `finished_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` varchar(0) DEFAULT NULL,
  `queue` varchar(0) DEFAULT NULL,
  `payload` varchar(0) DEFAULT NULL,
  `attempts` varchar(0) DEFAULT NULL,
  `reserved_at` varchar(0) DEFAULT NULL,
  `available_at` varchar(0) DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` tinyint DEFAULT NULL,
  `migration` varchar(57) DEFAULT NULL,
  `batch` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_03_02_100248_create_roles_table',1),(5,'2025_03_02_100259_create_permissions_table',1),(6,'2025_03_02_100309_create_role_user_table',1),(7,'2025_03_02_100322_create_permission_role_table',1),(9,'2025_03_03_044922_create_catagories_table',2),(10,'2025_03_16_144321_create_posts_table',3),(11,'2025_04_20_170650_create_student_admissions_table',4),(12,'2025_04_22_152705_create_prof_year_sessions_table',5),(14,'2025_04_23_054009_create_prof_year_session_students_table',6),(15,'2025_04_28_154539_create_teachers_table',7),(16,'2025_04_30_100828_create_acad_class_schedules_table',8),(17,'2025_05_01_114855_create_attendences_table',9),(18,'2025_05_06_144539_create_admin_staff_table',10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(0) DEFAULT NULL,
  `token` varchar(0) DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permission_role` (
  `id` tinyint DEFAULT NULL,
  `permission_id` tinyint DEFAULT NULL,
  `role_id` tinyint DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL,
  `updated_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (4,1,2,'',''),(6,1,1,'',''),(7,2,1,'',''),(8,3,1,'',''),(10,2,2,'',''),(11,9,2,'',''),(12,10,6,'',''),(13,11,1,'',''),(14,13,1,'',''),(15,10,1,'',''),(16,9,1,'',''),(17,4,1,'',''),(18,12,1,'',''),(20,14,5,'',''),(21,14,6,'','');
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` tinyint DEFAULT NULL,
  `permission_name` varchar(32) DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL,
  `updated_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'task_create','',''),(2,'task_edit','',''),(3,'task_destroy','',''),(4,'role_add','',''),(9,'catagories_manage','',''),(10,'acadClassSchedules_manage','',''),(11,'permissions_manage','',''),(12,'permissionsxx_manage','',''),(13,'posts_manage','',''),(14,'acadClassSchedules_view_download','','');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` tinyint DEFAULT NULL,
  `title` varchar(7) DEFAULT NULL,
  `content` varchar(32) DEFAULT NULL,
  `post_image` varchar(14) DEFAULT NULL,
  `catagory_id` tinyint DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL,
  `updated_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (3,'dff','<p>fggh</p>','1745241511.png',3,'',''),(5,'sdfgxxx','<p>ffggxxx</p>','1745241494.png',2,'',''),(6,'zzxxx','<p>zfdddd&nbsp; ccb cc&nbsp;</p>','1742318370.png',3,'','');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prof_year_session_students`
--

DROP TABLE IF EXISTS `prof_year_session_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prof_year_session_students` (
  `id` tinyint DEFAULT NULL,
  `prof_year_session_id` tinyint DEFAULT NULL,
  `student_id` tinyint DEFAULT NULL,
  `group_id` tinyint DEFAULT NULL,
  `student_roll_no` tinyint DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL,
  `updated_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prof_year_session_students`
--

LOCK TABLES `prof_year_session_students` WRITE;
/*!40000 ALTER TABLE `prof_year_session_students` DISABLE KEYS */;
INSERT INTO `prof_year_session_students` VALUES (1,1,5,15,1,'',''),(2,1,6,16,2,'',''),(3,2,5,15,1,'',''),(4,2,6,16,2,'','');
/*!40000 ALTER TABLE `prof_year_session_students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prof_year_sessions`
--

DROP TABLE IF EXISTS `prof_year_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prof_year_sessions` (
  `id` tinyint DEFAULT NULL,
  `prof_year_id` tinyint DEFAULT NULL,
  `start_date` varchar(0) DEFAULT NULL,
  `end_date` varchar(0) DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL,
  `updated_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prof_year_sessions`
--

LOCK TABLES `prof_year_sessions` WRITE;
/*!40000 ALTER TABLE `prof_year_sessions` DISABLE KEYS */;
INSERT INTO `prof_year_sessions` VALUES (1,3,'','','',''),(2,4,'','','','');
/*!40000 ALTER TABLE `prof_year_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_user` (
  `id` tinyint DEFAULT NULL,
  `role_id` tinyint DEFAULT NULL,
  `user_id` tinyint DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL,
  `updated_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1,1,'',''),(4,2,2,'',''),(5,6,4,'',''),(6,6,5,'',''),(7,6,6,'',''),(8,5,7,'',''),(9,7,8,'',''),(10,5,9,'',''),(11,5,10,'','');
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` tinyint DEFAULT NULL,
  `role_name` varchar(10) DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL,
  `updated_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin','',''),(2,'User','',''),(5,'Student','',''),(6,'Teacher','',''),(7,'AdminStaff','','');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(40) DEFAULT NULL,
  `user_id` tinyint DEFAULT NULL,
  `ip_address` varchar(9) DEFAULT NULL,
  `user_agent` varchar(125) DEFAULT NULL,
  `payload` text,
  `last_activity` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('xt7gkvTuUxYo1aRLqm9COpxLefJqDIQuxxiEsxGV',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQjBLMWxBVXBkRWNISEdWNzZtNFppMnZJakhTb3ZGVHo1WlJ4N3A5QiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcm9sZVBlcm1pc3Npb25zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1751278710),('8wEreNJtNbDEA3aOSJdSE0fmGQaWkPAeMgcCtFda',4,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:140.0) Gecko/20100101 Firefox/140.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiejNNV1BWTGZaQ2R6aDVaak50S1NWd2diMkxaaXBOQTdlcVJHaFc5VSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcGVybWlzc2lvbnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O30=',1751278711),('xdWNTJeMmlLX00Llyl8DsLPRQqpU1ZDRZ06h03lK',9,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoieklZRWVvb2czckh4eUx3ZTlVdjY2UFZnMDBseVZQRmpFYURINjNMdyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjU0OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvc3R1ZGVudFVwY29taW5nQWNhZGVtaWNTY2hlZHVsZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo5O30=',1751278722),('Iue4RX7TNCzxGxm1EYTDc9U0lv1TAq88lXXdEiIR',9,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiN2hrUnZrcGVVMGZMQmEweHl0cUlFTzZKbTNraFNFV2h1WmVudG91aCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdHVkZW50VXBjb21pbmdBY2FkZW1pY1NjaGVkdWxlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjk7fQ==',1751335569),('u2TDJkVXYojIWDZ3RGhAZz4KE5TzGFtGc5vUIcx6',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYk5QazFrOVJYcFVVQW53amVxWHVwR05hMjZBTzlwbnB5WjJEdW1rQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yb2xlUGVybWlzc2lvbnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1751335568),('Lc0FoQrwyKEXudkFHYzJurn0Y7nKYvGY2EFes3yJ',4,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:140.0) Gecko/20100101 Firefox/140.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVFRBVGZ1cFZYTno3SWxsblVkbjN4QjRKczBEb0RCMnRLYmdMNzl4ZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hY2FkQ2xhc3NTY2hlZHVsZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O30=',1751337629),('DQxnxQTKP0GW9PIBeGR7kpM9ubb1Sk4PDnKSk5GQ',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoia1RiejRGaHlvMDVodk95OFpnbURJMXJwaGwwTUo1M3NvOTF1NUVqVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hY2FkQ2xhc3NTY2hlZHVsZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1751389120);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sqlite_sequence`
--

DROP TABLE IF EXISTS `sqlite_sequence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sqlite_sequence` (
  `name` varchar(26) DEFAULT NULL,
  `seq` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sqlite_sequence`
--

LOCK TABLES `sqlite_sequence` WRITE;
/*!40000 ALTER TABLE `sqlite_sequence` DISABLE KEYS */;
INSERT INTO `sqlite_sequence` VALUES ('migrations',18),('users',10),('roles',7),('permissions',14),('role_user',11),('permission_role',21),('catagories',70),('posts',6),('student_admissions',15),('prof_year_sessions',2),('prof_year_session_students',4),('teachers',5),('acad_class_schedules',9),('attendences',8),('admin_staff',3);
/*!40000 ALTER TABLE `sqlite_sequence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_admissions`
--

DROP TABLE IF EXISTS `student_admissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student_admissions` (
  `id` tinyint DEFAULT NULL,
  `admsession` varchar(8) DEFAULT NULL,
  `name` varchar(14) DEFAULT NULL,
  `gender` tinyint DEFAULT NULL,
  `email` varchar(17) DEFAULT NULL,
  `admorderno` varchar(8) DEFAULT NULL,
  `admorderdate` varchar(0) DEFAULT NULL,
  `leaveorderno` varchar(0) DEFAULT NULL,
  `leaveorderdate` varchar(0) DEFAULT NULL,
  `leavereason` varchar(0) DEFAULT NULL,
  `student_photo` varchar(14) DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL,
  `updated_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_admissions`
--

LOCK TABLES `student_admissions` WRITE;
/*!40000 ALTER TABLE `student_admissions` DISABLE KEYS */;
INSERT INTO `student_admissions` VALUES (5,'2023-24','Ramlal Pradhan',6,'dds@gmail.com','ddff','','','','','1745248524.png','',''),(6,'2023-24','Shyamlal Sahu',6,'dds2@gmail.com','dfg','','','','','1745417369.png','',''),(7,'2023-24','Jyotsna Patel',7,'dds3@gmail.com','sdfgvvvv','','','','','1745417413.png','',''),(14,'2024-255','Trushna patel',6,'trushna@gmail.com','sddfg','','','','','','',''),(15,'2024-255','Hemal Joshi',6,'hemal@gmail.com','sddfg','','','','','','','');
/*!40000 ALTER TABLE `student_admissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teachers` (
  `id` tinyint DEFAULT NULL,
  `teacher_name` varchar(10) DEFAULT NULL,
  `gender_id` tinyint DEFAULT NULL,
  `teacher_code` varchar(6) DEFAULT NULL,
  `designation_id` tinyint DEFAULT NULL,
  `subject_id` tinyint DEFAULT NULL,
  `teacher_email` varchar(16) DEFAULT NULL,
  `teacher_photo` varchar(14) DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL,
  `updated_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers`
--

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` VALUES (3,'Dr Anilss',6,'ddff2s',28,42,'tch41@tch.com','1745943245.png','',''),(4,'Dr. Sandip',6,'ddff2',29,58,'sandip@admin.com','1746667083.png','',''),(5,'Palak',7,'ddff',29,47,'palak@admin.com','1746667557.png','','');
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` tinyint DEFAULT NULL,
  `name` varchar(14) DEFAULT NULL,
  `email` varchar(16) DEFAULT NULL,
  `email_verified_at` varchar(0) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `remember_token` varchar(10) DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL,
  `updated_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@admin.com','','$2y$12$wYWiWvlEZ659Jq67hE0CfO/RLx98AnTruZTzGk1OxYzkMg6SH51RC','','',''),(2,'User','user@user.com','','$2y$12$71I1YDpDC1nyYN3sc/S6reLWW8H6T.mbwgGOlSL3YkKgWc2n72ux6','','',''),(3,'Test User','test@example.com','','$2y$12$igoPs4aM1PJnz2.ER2qKlukDQUypshveLAmil8KVJmbLqH1aB37Cu','mEnuU1eDyW','',''),(4,'Dr Anilss','tch41@tch.com','','$2y$12$.oZ4/0HSMjjUjmF7XfooS.8NX8iWH9k6s3cMAhpBO8zMHAUpNkH3.','','',''),(5,'Dr. Sandip','sandip@admin.com','','$2y$12$jO/vmSpNA3FL041Los.FZO76RFLtdG23hBMvIdLQY0ckRW6kZmvS6','','',''),(6,'Palak','palak@admin.com','','$2y$12$i8d5y3W37g.XKTwfp.DBi.QHyNh5BURYb6CsA2OTBtl7iQZIiOdOG','','',''),(7,'Jyotsna Patel','dds3@gmail.com','','$2y$12$epJ86Mjc8w5tYvqgmp/nquAyl.mH8CR2LPqdq6pChshBD/mHmhhcC','','',''),(8,'Kiran','kiran@admin.com','','$2y$12$CirnvNKCF8cx91fQNIry/uuxHTzNv.0nLghsZiCMOtTfYga9n4fES','','',''),(9,'Shyamlal Sahu','dds2@gmail.com','','$2y$12$eLZ8P4ETMEw90Qqqv30aEudrZo3Saa/iow59chOv/bKApXuddqpYa','','',''),(10,'Ramlal Pradhan','dds@gmail.com','','$2y$12$rGZA0UIvcFsTQRI59Sb2XOKPQdA5Fc9pSqeSHDCq5do.tkvY7fXmK','','','');
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

-- Dump completed on 2025-04-11 13:30:08
