-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2016 at 06:21 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ppp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_ppps`
--

CREATE TABLE IF NOT EXISTS `admin_ppps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_ppps_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_ppps`
--

INSERT INTO `admin_ppps` (`id`, `nom`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'adminppp@mail.com', '$2a$04$R/Acr8wkwjn1fE2L5nxMCOR4g5LwYIAImki/k4ztfNfyPrxr30MRi', 'KYpBBPywBwtV53Lx0hxExFZKshrxGpoeLH0yHbZfMpkycH2Y19rhgp66p3Ao', NULL, '2016-05-04 13:46:04');

-- --------------------------------------------------------

--
-- Table structure for table `binomages`
--

CREATE TABLE IF NOT EXISTS `binomages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `moyenne` double(8,2) NOT NULL,
  `rang` int(11) NOT NULL,
  `filiere_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=42 ;

--
-- Dumping data for table `binomages`
--

INSERT INTO `binomages` (`id`, `created_at`, `updated_at`, `moyenne`, `rang`, `filiere_id`) VALUES
(34, '2016-05-04 13:36:11', '2016-05-04 14:06:25', 10.62, 0, 1),
(35, '2016-05-04 13:36:51', '2016-05-04 13:36:51', 0.00, 0, 1),
(36, '2016-05-04 13:38:56', '2016-05-04 13:38:56', 0.00, 0, 1),
(37, '2016-05-04 13:40:52', '2016-05-04 14:06:25', 11.08, 0, 1),
(38, '2016-05-04 13:41:17', '2016-05-04 14:06:25', 11.08, 0, 1),
(39, '2016-05-04 13:43:15', '2016-05-04 14:10:15', 10.62, 2, 1),
(40, '2016-05-04 13:43:27', '2016-05-04 14:10:15', 11.28, 1, 1),
(41, '2016-05-04 14:12:20', '2016-05-04 14:15:04', 10.22, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Système information ', '', NULL, NULL),
(2, 'Design ', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categorisations`
--

CREATE TABLE IF NOT EXISTS `categorisations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ppp_id` int(10) unsigned NOT NULL,
  `categorie_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categorisations_ppp_id_foreign` (`ppp_id`),
  KEY `categorisations_categorie_id_foreign` (`categorie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `categorisations`
--

INSERT INTO `categorisations` (`id`, `ppp_id`, `categorie_id`, `created_at`, `updated_at`) VALUES
(1, 9, 1, '2016-03-22 08:05:02', '2016-03-22 08:05:02'),
(2, 9, 2, '2016-03-22 08:05:02', '2016-03-22 08:05:02'),
(3, 10, 1, '2016-03-22 08:10:29', '2016-03-22 08:10:29'),
(4, 10, 2, '2016-03-22 08:10:29', '2016-03-22 08:10:29'),
(5, 11, 1, '2016-03-22 08:11:03', '2016-03-22 08:11:03'),
(6, 11, 2, '2016-03-22 08:11:03', '2016-03-22 08:11:03'),
(7, 12, 1, '2016-03-22 08:13:25', '2016-03-22 08:13:25'),
(8, 12, 2, '2016-03-22 08:13:25', '2016-03-22 08:13:25'),
(9, 13, 1, '2016-03-22 13:46:58', '2016-03-22 13:46:58'),
(10, 13, 2, '2016-03-22 13:46:58', '2016-03-22 13:46:58'),
(11, 14, 1, '2016-03-26 11:17:45', '2016-03-26 11:17:45'),
(12, 15, 1, '2016-05-04 12:54:06', '2016-05-04 12:54:06');

-- --------------------------------------------------------

--
-- Table structure for table `choix`
--

CREATE TABLE IF NOT EXISTS `choix` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ppp_id` int(10) unsigned NOT NULL,
  `binom_id` int(10) unsigned NOT NULL,
  `rang_choix` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `choix`
--

INSERT INTO `choix` (`id`, `created_at`, `updated_at`, `ppp_id`, `binom_id`, `rang_choix`) VALUES
(1, '2016-04-30 08:41:06', '2016-04-30 08:41:06', 1, 25, 1),
(2, '2016-04-30 08:41:58', '2016-04-30 08:41:58', 1, 25, 1),
(3, '2016-04-30 08:41:58', '2016-04-30 08:41:58', 4, 25, 2),
(4, '2016-04-30 08:43:29', '2016-04-30 08:43:29', 1, 25, 1),
(5, '2016-04-30 08:43:29', '2016-04-30 08:43:29', 4, 25, 2),
(6, '2016-04-30 08:43:29', '2016-04-30 08:43:29', 9, 25, 3),
(7, '2016-04-30 08:43:29', '2016-04-30 08:43:29', 9, 25, 4),
(24, '2016-05-04 09:51:26', '2016-05-04 09:52:03', 14, 29, 1),
(25, '2016-05-04 09:51:27', '2016-05-04 09:51:27', 4, 29, 2),
(26, '2016-05-04 09:51:27', '2016-05-04 09:51:27', 9, 29, 3),
(27, '2016-05-04 09:51:27', '2016-05-04 09:51:27', 10, 29, 4);

-- --------------------------------------------------------

--
-- Table structure for table `criteres`
--

CREATE TABLE IF NOT EXISTS `criteres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note_min` double(8,2) NOT NULL,
  `note_max` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `criteres`
--

INSERT INTO `criteres` (`id`, `nom`, `note_min`, `note_max`, `created_at`, `updated_at`) VALUES
(2, 'Critere1', 2.00, 5.00, '2016-04-29 21:32:18', '2016-05-02 07:59:03'),
(4, 'Critere2', 0.00, 5.00, '2016-05-02 07:58:28', '2016-05-02 07:59:10'),
(5, 'Fadi', 0.00, 5.00, '2016-05-02 12:05:39', '2016-05-02 12:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `encadrements`
--

CREATE TABLE IF NOT EXISTS `encadrements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `professeur_id` int(10) unsigned NOT NULL,
  `note` double(8,2) unsigned NOT NULL,
  `binom_id` int(10) unsigned NOT NULL,
  `prof_id` int(10) unsigned NOT NULL,
  `ppp_id` int(10) unsigned NOT NULL,
  `soutenance_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `encadrements_professeur_id_foreign` (`professeur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `encadrements`
--

INSERT INTO `encadrements` (`id`, `created_at`, `updated_at`, `professeur_id`, `note`, `binom_id`, `prof_id`, `ppp_id`, `soutenance_id`) VALUES
(1, NULL, '2016-05-04 13:47:26', 1, 13.00, 40, 1, 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE IF NOT EXISTS `evaluations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `note` double(8,2) NOT NULL,
  `mention` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remarque` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `encadrement_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `evaluations_encadrement_id_foreign` (`encadrement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `evaluer`
--

CREATE TABLE IF NOT EXISTS `evaluer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `critere_id` int(10) unsigned NOT NULL,
  `evaluation_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evaluer_critere_id_foreign` (`critere_id`),
  KEY `evaluer_evaluation_id_foreign` (`evaluation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `filieres`
--

CREATE TABLE IF NOT EXISTS `filieres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `filieres`
--

INSERT INTO `filieres` (`id`, `nom`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Genie Logiciel', 'GL', NULL, NULL),
(2, 'Reseau Et Telecommunication', 'RT', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contenu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_03_07_182522_create_professeur_table', 1),
('2016_03_07_184604_create_module_table', 1),
('2016_03_07_185257_create_filiere_table', 1),
('2016_03_07_185602_create_option_table', 1),
('2016_03_07_185955_create_messages_table', 1),
('2016_03_07_190125_create_evaluation', 1),
('2016_03_07_190440_create_criteres_table', 1),
('2016_03_07_191309_create_encadrement_table', 1),
('2016_03_07_191544_create_ppp_table', 1),
('2016_03_07_191755_create_categories_table', 1),
('2016_03_07_193836_create_foreign_key', 1),
('2016_03_07_204831_create_ppp_join_table', 1),
('2016_03_07_205622_create_table_categorisation', 1),
('2016_03_12_183344_adding_remember_column_to_prof', 2),
('2016_03_13_195339_add_filiere_column_to_ppp', 3),
('2016_04_15_200807_created_binomage_table', 3),
('2016_04_15_201349_added_binom_id_column', 4),
('2016_04_18_215943_create_choix_table', 4),
('2016_04_19_100210_add_choix_columns', 4),
('2016_04_29_202032_create_admin_ppp_table', 5),
('2016_05_01_195747_added_moyenne_column_to_user', 6),
('2016_05_01_200227_add_column_binom_id_prof_id_to_encadrement', 7),
('2016_05_03_153101_create_login_column', 8),
('2016_05_03_153824_create_login_column_professeur', 9),
('2016_05_04_095126_create_soutenance_table', 10),
('2016_05_04_100342_add_soutenance_column', 11),
('2016_05_04_111108_add_rang_moyenne_column', 12);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `coeficient` double(8,2) NOT NULL,
  `planning` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `professeur_id` int(10) unsigned NOT NULL,
  `filiere_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `modules_professeur_id_foreign` (`professeur_id`),
  KEY `modules_filiere_id_foreign` (`filiere_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `nom`, `description`, `coeficient`, `planning`, `created_at`, `updated_at`, `professeur_id`, `filiere_id`) VALUES
(3, 'Complexite', 'Description', 0.00, 'vkopekvopzekvopzekvopkopk', '2016-03-07 21:38:27', '2016-03-07 21:38:27', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `filiere_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `options_filiere_id_foreign` (`filiere_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `nom`, `description`, `created_at`, `updated_at`, `filiere_id`) VALUES
(1, 'Systeme Financiers', 'Administration des systèmes financiers', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ppp`
--

CREATE TABLE IF NOT EXISTS `ppp` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `encadrement_id` int(10) unsigned DEFAULT NULL,
  `professeur_id` int(10) unsigned NOT NULL,
  `filiere_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ppp_encadrement_id_foreign` (`encadrement_id`),
  KEY `ppp_professeur_id_foreign` (`professeur_id`),
  KEY `ppp_filiere_id_foreign` (`filiere_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `ppp`
--

INSERT INTO `ppp` (`id`, `name`, `description`, `type`, `created_at`, `updated_at`, `encadrement_id`, `professeur_id`, `filiere_id`) VALUES
(1, 'Application Departement GIM', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '', NULL, '2016-04-21 08:12:01', 1, 1, 1),
(4, 'Test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '', '2016-03-21 10:41:04', '2016-04-21 08:12:10', NULL, 1, 1),
(9, 'Plateforme Chimie ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '', '2016-03-22 08:05:02', '2016-03-26 10:59:22', NULL, 1, 1),
(10, 'Sujet de Test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '', '2016-03-22 08:10:29', '2016-04-18 20:04:33', NULL, 1, 1),
(11, 'Subject ', 'Test', '', '2016-03-22 08:11:03', '2016-03-22 08:11:03', NULL, 1, 1),
(12, 'Subject ', 'Test', '', '2016-03-22 08:13:25', '2016-03-22 08:13:25', NULL, 1, 1),
(13, '', '', '', '2016-03-22 13:46:58', '2016-03-22 13:46:58', NULL, 1, 1),
(14, 'Departement', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '', '2016-03-26 11:17:45', '2016-03-26 11:17:45', NULL, 1, 1),
(15, 'Application De Test Crossplateforme', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '', '2016-05-04 12:54:06', '2016-05-04 12:54:06', NULL, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `professeurs`
--

CREATE TABLE IF NOT EXISTS `professeurs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `immatricule` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` int(11) NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `nationalite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `professeurs_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `professeurs`
--

INSERT INTO `professeurs` (`id`, `immatricule`, `nom`, `prenom`, `adresse`, `email`, `telephone`, `password`, `nationalite`, `created_at`, `updated_at`, `remember_token`, `login`) VALUES
(1, '12346546', 'dore', 'Mohamed', 'Adresse de test', 'romthani@gmail.com', 25824862, '$2y$10$Cq/ozUqcMuhvsRbXSogYke4cMmHt7H69CqlaLX5hvenxGYP8fK6Vm', 'Tunisienne', NULL, '2016-05-04 13:47:55', '5klRqaxKT4gT19bAOZrFOaFgS98dK14v2lgnSGJooj1bNXWIRGZKxyzRLy9k', 'mohamedromthani'),
(8, '222222222222222', 'Emir', 'Damergi', '', 'fadiabassi7@yahoo.com', 84545454, '$2y$10$dDtZVsDEJY.eFcJFwc11aO6YRz4QpoD2fWAzohOofPawjzkx6S8o.', '', '2016-05-03 19:49:12', '2016-05-04 13:49:38', 'xI3yDqQMGApUpVYrTzVniZV5LAcog4q0Hiey2jnZTnDffFXTBrF9Jy99fYJx', 'emirdamergi');

-- --------------------------------------------------------

--
-- Table structure for table `soutenances`
--

CREATE TABLE IF NOT EXISTS `soutenances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `professeur_id` int(10) unsigned DEFAULT NULL,
  `encadrement_id` int(10) unsigned DEFAULT NULL,
  `salle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `soutenances_professeur_id_foreign` (`professeur_id`),
  KEY `soutenances_encadrement_id_foreign` (`encadrement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `soutenances`
--

INSERT INTO `soutenances` (`id`, `professeur_id`, `encadrement_id`, `salle`, `date`, `created_at`, `updated_at`) VALUES
(16, 8, 1, '2B6', '2015-04-18 00:00:00', '2016-05-04 08:42:42', '2016-05-04 13:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cin` int(11) NOT NULL,
  `num_inscri` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `nationalite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `annee` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `filiere_id` int(10) unsigned NOT NULL,
  `option_id` int(10) unsigned DEFAULT NULL,
  `encadrement_id` int(10) unsigned DEFAULT NULL,
  `binom_id` int(10) unsigned DEFAULT NULL,
  `moyenne` double(8,2) unsigned NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_cin_unique` (`cin`),
  UNIQUE KEY `users_num_inscri_unique` (`num_inscri`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_filiere_id_foreign` (`filiere_id`),
  KEY `users_option_id_foreign` (`option_id`),
  KEY `users_encadrement_id_foreign` (`encadrement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=41 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `cin`, `num_inscri`, `email`, `password`, `nationalite`, `annee`, `remember_token`, `created_at`, `updated_at`, `filiere_id`, `option_id`, `encadrement_id`, `binom_id`, `moyenne`, `login`) VALUES
(8, 'Fadi', 'Amiral', 113605665, 1155521, 'abassifadi@gmail.com', '$2y$10$sVwQPWMKxli0BVehWcfmi.KuOVlJ.gs/ql.BtjPuHNjJ6ajoyYbhe', '', '', 'KN5Phethl50B1mfBSHWkhJuEeC9Jc5qVeEimCt9PZQZsl8EI1027B21dVBHC', NULL, '2016-05-04 14:10:48', 1, 1, 1, 39, 10.24, 'abassifadi'),
(10, 'Anagati', 'Akil', 265656, 546464, 'anagati@mail.wizz', '$2y$10$3mq7kotY2azVymmbyCoDjeCsHmjn0ODkUR5BKVjq2r.tPz/4WI2K2', 'lmvklmkvml', '2016', NULL, NULL, '2016-05-04 13:43:15', 1, 1, NULL, 39, 11.00, 'mohamedromthani'),
(13, 'Assel', 'Meher', 11223344, 1200122, 'meher@gmail.com', '$2y$10$bUPUitEtzZylcM9J.7xSouvQZFsSjQ6cukLFlO7PAOLx2x43tbUAC', 'Tunisienne', '2015', NULL, NULL, '2016-05-04 13:43:27', 1, 1, NULL, 40, 12.00, 'abassifadi'),
(15, 'Kallel', 'Wassim', 11223366, 130025, 'kallel@mail.com', '$2a$04$lN7DWqUQZAvhvjCVn/mxheywyU2vRsKAoKAJlcR8VRsM4nNaBrydi', 'Tunisienne', '2016', 'DayJ5UrqONtZsei3sJP3cQkxDKSTkCxiCv6hAucQ0FxdlQkAhFuMGqAdV4CN', NULL, '2016-05-04 13:43:27', 1, 1, 1, 40, 11.00, ''),
(24, 'Kais', 'Chemli', 113603142, 1200188, 'kaischemli@gmail.com', '$2y$10$ElKC/N/R9WpeQvSB/g2dy.CgjNpxp7yU901oroTDyxKWLkhU4m4u2', '', '', 'xaVvs8OeMvi5DxG3ZbTKiB0DOUonrH8I8vvc5fBuLBkzE03YdrDuoI7k7zo7', '2016-05-03 14:59:55', '2016-05-04 13:43:27', 1, NULL, NULL, 40, 10.84, 'kaischemli'),
(27, 'Farid', 'Abbess', 12151219, 565, 'abass2ifadi@gmail.com', '$2y$10$uNZTUfiqUnQTUEkOKli.te.MKgYiobxxkWzkIQGSXVVoWNGSZlyoy', '', '', 'gic3FXC04wInGhIqeSmtTJB84yItPQhgGt2YoQHfI3twhNSb3WrCfOmOD6hG', '2016-05-03 16:14:00', '2016-05-04 09:18:46', 1, NULL, NULL, 0, 10.25, 'abbessfadi'),
(39, 'Sirine', 'Fourati', 1275777, 45545, 'fadi@fldk.cml', '$2y$10$/aCbhAiVRTSZI0gThBf5s.hYwNZNy7PWWsvVYivGsYRC7ToB1Meyq', '', '', 'PR6zUvd3I8gz8Y2VIxeLm1MRpPbtrIJzObqPSGOHvHbuXz65rwv6XxuOywHq', '2016-05-04 13:34:37', '2016-05-04 14:12:20', 2, NULL, NULL, 41, 10.25, 'sirinefourati'),
(40, 'Wiem ', 'Ben Abdalah', 123023, 30022, 'wiem@mail.com1', '$2y$10$MJGC7CG1HX3v3KH1AOnMZ.Xwbtniy6xkGvDi6vLUCHCvHDS72MVmW', '', '', NULL, '2016-05-04 14:11:59', '2016-05-04 14:12:20', 2, NULL, NULL, 41, 10.20, 'wiemabdaah');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categorisations`
--
ALTER TABLE `categorisations`
  ADD CONSTRAINT `categorisations_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `categorisations_ppp_id_foreign` FOREIGN KEY (`ppp_id`) REFERENCES `ppp` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `encadrements`
--
ALTER TABLE `encadrements`
  ADD CONSTRAINT `encadrements_professeur_id_foreign` FOREIGN KEY (`professeur_id`) REFERENCES `professeurs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `evaluations_encadrement_id_foreign` FOREIGN KEY (`encadrement_id`) REFERENCES `encadrements` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `evaluer`
--
ALTER TABLE `evaluer`
  ADD CONSTRAINT `evaluer_critere_id_foreign` FOREIGN KEY (`critere_id`) REFERENCES `criteres` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `evaluer_evaluation_id_foreign` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `modules_filiere_id_foreign` FOREIGN KEY (`filiere_id`) REFERENCES `filieres` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `modules_professeur_id_foreign` FOREIGN KEY (`professeur_id`) REFERENCES `professeurs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_filiere_id_foreign` FOREIGN KEY (`filiere_id`) REFERENCES `filieres` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ppp`
--
ALTER TABLE `ppp`
  ADD CONSTRAINT `ppp_encadrement_id_foreign` FOREIGN KEY (`encadrement_id`) REFERENCES `encadrements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ppp_filiere_id_foreign` FOREIGN KEY (`filiere_id`) REFERENCES `filieres` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ppp_professeur_id_foreign` FOREIGN KEY (`professeur_id`) REFERENCES `professeurs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `soutenances`
--
ALTER TABLE `soutenances`
  ADD CONSTRAINT `soutenances_encadrement_id_foreign` FOREIGN KEY (`encadrement_id`) REFERENCES `encadrements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `soutenances_professeur_id_foreign` FOREIGN KEY (`professeur_id`) REFERENCES `professeurs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_encadrement_id_foreign` FOREIGN KEY (`encadrement_id`) REFERENCES `encadrements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_filiere_id_foreign` FOREIGN KEY (`filiere_id`) REFERENCES `filieres` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
