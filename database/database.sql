-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.5.4-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para teste_menew
CREATE DATABASE IF NOT EXISTS `teste_menew` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `teste_menew`;

-- Copiando estrutura para tabela teste_menew.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela teste_menew.categories: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Cliente', '2021-05-19 15:08:20', '2021-05-19 15:08:20', NULL),
	(2, 'Fornecedor', '2021-05-19 15:08:20', '2021-05-19 15:08:20', NULL),
	(3, 'Funcionário', '2021-05-19 15:08:20', '2021-05-19 15:08:20', NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Copiando estrutura para tabela teste_menew.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela teste_menew.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Copiando estrutura para tabela teste_menew.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela teste_menew.migrations: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2021_05_19_142925_create_categories_table', 1),
	(5, '2021_05_19_143726_create_states_table', 1),
	(6, '2021_05_19_144630_create_schedules_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Copiando estrutura para tabela teste_menew.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela teste_menew.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Copiando estrutura para tabela teste_menew.schedules
CREATE TABLE IF NOT EXISTS `schedules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `state_id` bigint(20) unsigned NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `schedules_user_id_foreign` (`user_id`),
  KEY `schedules_state_id_foreign` (`state_id`),
  KEY `schedules_category_id_foreign` (`category_id`),
  CONSTRAINT `schedules_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `schedules_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`),
  CONSTRAINT `schedules_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela teste_menew.schedules: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
INSERT INTO `schedules` (`id`, `name`, `telephone`, `email`, `city`, `user_id`, `state_id`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Renato da Conceição Maldonado', '(21) 97192-3716', 'mallldonado123@gmail.com', 'Niterói', 6, 1, 1, '2021-05-19 20:20:40', '2021-05-19 21:35:56', NULL),
	(2, 'Renato da Conceição Maldonado', '(21) 97192-3716', 'mallldonado@renato.com', 'Niterói', 6, 1, 2, '2021-05-19 20:21:39', '2021-05-19 21:40:44', '2021-05-19 21:40:44'),
	(3, 'Renato da Conceição Maldonado', '(21) 97192-3716', 'mallldonado@renato2.com', 'Niterói', 6, 1, 2, '2021-05-19 20:22:44', '2021-05-19 20:22:44', NULL);
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;

-- Copiando estrutura para tabela teste_menew.states
CREATE TABLE IF NOT EXISTS `states` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela teste_menew.states: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Rio de Janeiro', '2021-05-19 15:08:20', '2021-05-19 15:08:20', NULL),
	(2, 'São Paulo', '2021-05-19 15:08:20', '2021-05-19 15:08:20', NULL),
	(3, 'Porto Alegre', '2021-05-19 15:08:20', '2021-05-19 15:08:20', NULL),
	(4, 'Minas Gerais', '2021-05-19 15:08:20', '2021-05-19 15:08:20', NULL),
	(5, 'Paraíba', '2021-05-19 15:08:20', '2021-05-19 15:08:20', NULL);
/*!40000 ALTER TABLE `states` ENABLE KEYS */;

-- Copiando estrutura para tabela teste_menew.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela teste_menew.users: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Miss Abigale Herzog', 'misty10@example.net', '2021-05-19 15:08:20', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nmgmvbIJiALIBURrX2X7Eiw3Ru8DWlxn8gCp19Oqh5DSjQ3z2ren2UrzsDu3', '2021-05-19 15:08:20', '2021-05-19 15:08:20'),
	(2, 'Dameon Shanahan III', 'dtorp@example.org', '2021-05-19 15:08:20', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MYjA9WmRyQ', '2021-05-19 15:08:20', '2021-05-19 15:08:20'),
	(3, 'Delpha Streich', 'tbreitenberg@example.net', '2021-05-19 15:08:20', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kkU2H1ot5z', '2021-05-19 15:08:20', '2021-05-19 15:08:20'),
	(4, 'Ms. Reta Stroman', 'oreichel@example.net', '2021-05-19 15:08:20', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'RLkK9Iz0zv', '2021-05-19 15:08:20', '2021-05-19 15:08:20'),
	(5, 'Dr. Watson Von', 'schuster.daisy@example.net', '2021-05-19 15:08:20', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'wnS29quybe', '2021-05-19 15:08:20', '2021-05-19 15:08:20'),
	(6, 'renato', 'renato@renato.com', NULL, '$2y$10$wCJErxGQZXSsyTs3y2gTtOFyV4egBRkr94fg4W9IR1A4dcuGCltJy', NULL, '2021-05-19 16:41:42', '2021-05-19 16:41:42');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
