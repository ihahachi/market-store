-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 01 sep. 2018 à 00:40
-- Version du serveur :  10.1.25-MariaDB
-- Version de PHP :  7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `eurl_degros_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_categorie` int(10) UNSIGNED NOT NULL,
  `id_marque` int(10) UNSIGNED NOT NULL,
  `depot_id` int(10) UNSIGNED DEFAULT NULL,
  `ref` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lot` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix_achat` decimal(9,2) DEFAULT NULL,
  `prix_gros` decimal(9,2) DEFAULT NULL,
  `prix_demigros` decimal(9,2) DEFAULT NULL,
  `prix_client` decimal(9,2) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `quantite_min` int(11) DEFAULT NULL,
  `unite` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `id_categorie`, `id_marque`, `depot_id`, `ref`, `nom`, `lot`, `prix_achat`, `prix_gros`, `prix_demigros`, `prix_client`, `quantite`, `quantite_min`, `unite`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 2, 3, 3, 'BER 08 P', 'BER 08 P', NULL, NULL, '250.00', '280.00', '240.00', 117, 3, 'PIC', '2018-08-30 22:03:07', '2018-08-30 21:03:07', NULL),
(6, 1, 3, 1, 'BER 16P', 'BER 16P', NULL, NULL, '125.00', '135.00', '110.00', 65, NULL, 'PIC', '2018-08-28 20:01:13', '2018-08-28 19:01:13', NULL),
(7, 1, 1, 1, 'BER 24P', 'BER 24P', NULL, NULL, '250.00', '300.00', '200.00', 20, 10, 'PIC', '2018-08-28 23:10:31', '2018-08-28 22:10:31', NULL),
(8, 1, 1, 1, 'BER 32', 'BER 32 P', NULL, NULL, '1100.00', '1125.00', '1005.00', 101, 3, 'PIC', '2018-08-30 20:22:49', '2018-08-30 19:22:49', NULL),
(9, 1, 1, 1, 'BARRE 300 G', 'BARRE 300 G', NULL, NULL, '125.00', '140.00', '120.00', 105, 10, 'PIC', '2018-08-31 10:25:19', '2018-08-31 09:25:19', NULL),
(10, 1, 1, 1, 'BARRE 600 G', 'BARRE 600 G', NULL, NULL, '350.00', '330.00', '300.00', 14, NULL, 'PIC', '2018-08-31 10:25:29', '2018-08-31 09:25:29', NULL),
(11, 1, 1, 1, 'BARRE 1800 G', 'BARRE 1800 G', NULL, NULL, '220.00', '200.00', '195.00', 6, 10, 'PIC', '2018-08-28 22:53:02', '2018-08-28 21:53:02', NULL),
(12, 1, 1, 1, 'MINI BARRE 75 G', 'MINI BARRE 75 G', NULL, NULL, '450.00', '420.00', '400.00', 197, 5, 'PIC', '2018-08-28 23:14:02', '2018-08-28 22:14:02', NULL),
(13, 1, 1, 1, 'MINI BAAR AROM 75 G', 'MINI BAAR AROM 75 G', NULL, NULL, '230.00', '210.00', '200.00', -10, 5, 'PIC', '2018-08-28 23:14:30', '2018-08-28 22:14:30', NULL),
(14, 1, 1, 1, 'MINI BARRE 150 G', 'MINI BARRE 150 G', NULL, NULL, '100.00', '95.00', '90.00', 0, NULL, 'PIC', '2018-08-28 17:45:23', '2018-08-28 16:45:23', NULL),
(15, 1, 1, 1, 'MINI BARRE AROM 150 G', 'MINI BARRE AROM 150 G', NULL, NULL, '400.00', '350.00', '320.00', 0, NULL, 'PIC', '2018-08-28 17:45:51', '2018-08-28 16:45:51', NULL),
(18, 5, 4, 2, 'CARRES BAQUETTE 06', 'CARRES BAQUETTE 06', NULL, NULL, '180.00', '200.00', '150.00', 0, 3, 'PIC', '2018-08-28 23:16:59', '2018-08-28 22:16:59', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `bon_entres`
--

CREATE TABLE `bon_entres` (
  `id` int(10) UNSIGNED NOT NULL,
  `ref` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_` date DEFAULT NULL,
  `vendeur_id` int(10) UNSIGNED NOT NULL,
  `montant_total` decimal(9,2) DEFAULT '0.00',
  `montant_versement` decimal(9,2) DEFAULT '0.00',
  `cradit_sortie` decimal(9,2) DEFAULT '0.00',
  `cradit_entree` decimal(9,2) DEFAULT '0.00',
  `ecart` decimal(9,2) DEFAULT '0.00',
  `observation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bon_entres`
--

INSERT INTO `bon_entres` (`id`, `ref`, `date_`, `vendeur_id`, `montant_total`, `montant_versement`, `cradit_sortie`, `cradit_entree`, `ecart`, `observation`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BE00001/2018', '2018-08-31', 6, '20000.00', '5000.00', '14205.00', '45000.00', '150.00', 'Rien', '2018-08-30 23:00:00', '2018-08-30 23:00:00', NULL),
(2, 'BE0002/2018', '2018-09-01', 1, '0.00', '120457.00', '45000.00', '2000.00', '0.00', NULL, '2018-08-31 13:37:24', '2018-08-31 13:37:24', NULL),
(3, 'BE0003/2018', '2018-09-01', 9, '0.00', '75600.00', '4500.00', '0.00', '0.00', NULL, '2018-08-31 15:14:50', '2018-08-31 15:14:50', NULL),
(4, 'BE0004/2018', '2018-09-02', 6, '0.00', '45200.00', '2500.00', '0.00', '0.00', NULL, '2018-08-31 19:18:26', '2018-08-31 19:18:26', NULL),
(5, 'BE0005/2018', '2018-09-04', 5, '26185.00', '5000.00', '1000.00', '0.00', '-1500.00', NULL, '2018-08-31 20:43:35', '2018-08-31 21:14:39', NULL),
(6, 'BE0006/2018', '2018-08-31', 8, '250.00', '14000.00', '2000.00', '0.00', '0.00', NULL, '2018-08-31 20:56:44', '2018-08-31 21:09:07', NULL),
(7, 'BE0007/2018', '2018-08-25', 5, '1000.00', '1000.00', '0.00', '0.00', '-500.00', NULL, '2018-08-31 21:15:23', '2018-08-31 21:16:27', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `bon_sorties`
--

CREATE TABLE `bon_sorties` (
  `id` int(10) UNSIGNED NOT NULL,
  `ref` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_` date NOT NULL,
  `vendeur_id` int(10) UNSIGNED NOT NULL,
  `observation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bon_sorties`
--

INSERT INTO `bon_sorties` (`id`, `ref`, `date_`, `vendeur_id`, `observation`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'BS0009/2018', '2018-08-27', 5, 'Rien', '2018-08-24 14:03:26', '2018-08-24 14:03:26', NULL),
(11, 'BS00010/2018', '2018-08-27', 1, 'Rien', '2018-08-24 14:03:41', '2018-08-27 08:03:19', NULL),
(12, 'BS00011/2018', '2018-08-27', 1, 'Rien', '2018-08-24 14:03:55', '2018-08-27 08:03:19', NULL),
(13, 'BS00012/2018', '2018-08-24', 6, 'Rien', '2018-08-24 14:07:01', '2018-08-27 07:06:06', NULL),
(14, 'BS00013/2018', '2018-08-28', 8, 'Rien', '2018-08-24 15:34:39', '2018-08-26 13:06:38', NULL),
(15, 'BS00014/2018', '2018-08-26', 9, 'Rien', '2018-08-26 07:09:58', '2018-08-28 22:18:35', NULL),
(16, 'BS00012/2018', '2018-08-26', 6, 'Rien', '2018-08-26 12:02:48', '2018-08-27 07:06:12', NULL),
(17, 'BS00012/2018', '2018-08-26', 6, 'Rien', '2018-08-26 12:25:14', '2018-08-27 07:06:14', NULL),
(18, 'BS00017/2018', '2018-08-27', 6, 'Rien', '2018-08-26 12:26:00', '2018-08-27 07:06:18', NULL),
(20, 'BS00019/2018', '2018-08-26', 6, 'Rien', '2018-08-26 12:47:33', '2018-08-27 07:06:23', NULL),
(22, 'BS00021/2018', '2018-08-28', 9, 'Rien', '2018-08-28 16:33:24', '2018-08-28 22:18:35', NULL),
(23, 'BS00022/2018', '2018-08-29', 1, 'Rien', '2018-08-28 20:57:33', '2018-08-28 20:57:33', NULL),
(24, 'BS00023/2018', '2018-08-30', 8, 'Rien', '2018-08-30 19:07:50', '2018-08-30 19:07:50', NULL),
(25, 'BS00024/2018', '2018-08-31', 9, 'Rien', '2018-08-31 09:25:04', '2018-08-31 09:25:04', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Formage', NULL, NULL, NULL),
(2, 'Lait', NULL, NULL, NULL),
(3, 'Pate', '2018-08-23 23:00:00', NULL, NULL),
(4, 'Jus', NULL, NULL, NULL),
(5, 'Chouco', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_vendeur` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `decharges`
--

CREATE TABLE `decharges` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bon_entre_id` int(10) UNSIGNED NOT NULL,
  `montant` decimal(9,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `decharges`
--

INSERT INTO `decharges` (`id`, `nom`, `bon_entre_id`, `montant`, `created_at`, `updated_at`) VALUES
(2, 'Gasoil', 4, '1000.00', '2018-08-31 19:39:47', '2018-08-31 19:39:47'),
(3, 'Ftoure', 4, '300.00', '2018-08-31 19:39:58', '2018-08-31 19:39:58'),
(4, 'Avance', 4, '2500.00', '2018-08-31 19:40:10', '2018-08-31 19:40:10'),
(6, 'Service maintenance', 2, '5000.00', '2018-08-31 19:40:49', '2018-08-31 19:40:49'),
(7, 'Décharge', 2, '1500.00', '2018-08-31 19:40:59', '2018-08-31 19:40:59'),
(9, 'Avance', 2, '4000.00', '2018-08-31 19:44:28', '2018-08-31 19:44:28'),
(10, 'Service maintenance', 5, '1500.00', '2018-08-31 21:14:36', '2018-08-31 21:14:36'),
(11, 'Gasoil', 7, '500.00', '2018-08-31 21:16:23', '2018-08-31 21:16:23'),
(12, 'Ftoure', 7, '300.00', '2018-08-31 21:23:37', '2018-08-31 21:23:37');

-- --------------------------------------------------------

--
-- Structure de la table `deposes`
--

CREATE TABLE `deposes` (
  `id` int(10) UNSIGNED NOT NULL,
  `date_` date NOT NULL,
  `id_client` int(10) UNSIGNED NOT NULL,
  `depose` decimal(9,2) NOT NULL,
  `recette` decimal(9,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `depots`
--

CREATE TABLE `depots` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `depots`
--

INSERT INTO `depots` (`id`, `nom`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Depot 01 ', 'cite A', NULL, NULL, NULL),
(2, 'Depot 02', '', NULL, NULL, NULL),
(3, 'Depot 03', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `details`
--

CREATE TABLE `details` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_article` int(10) UNSIGNED NOT NULL,
  `bon_sortie_id` int(10) UNSIGNED NOT NULL,
  `quantite` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `details`
--

INSERT INTO `details` (`id`, `id_article`, `bon_sortie_id`, `quantite`, `created_at`, `updated_at`, `deleted_at`) VALUES
(25, 6, 11, 100, '2018-08-24 14:04:12', '2018-08-27 08:03:19', NULL),
(26, 7, 11, 250, '2018-08-24 14:04:19', '2018-08-27 08:03:19', NULL),
(27, 9, 11, 25, '2018-08-24 14:04:27', '2018-08-27 08:03:19', NULL),
(28, 5, 11, 25, '2018-08-24 14:04:36', '2018-08-27 08:03:19', NULL),
(29, 8, 11, 100, '2018-08-24 14:04:47', '2018-08-27 08:03:19', NULL),
(31, 8, 12, 150, '2018-08-24 14:34:46', '2018-08-27 08:03:19', NULL),
(33, 9, 12, 24, '2018-08-24 14:35:03', '2018-08-27 08:03:19', NULL),
(34, 7, 14, 50, '2018-08-24 15:34:53', '2018-08-26 13:06:38', NULL),
(38, 11, 15, 45, '2018-08-26 07:10:33', '2018-08-28 22:18:35', NULL),
(39, 8, 15, 50, '2018-08-26 07:10:39', '2018-08-28 22:18:35', NULL),
(40, 13, 15, 120, '2018-08-26 07:10:44', '2018-08-28 22:18:35', NULL),
(42, 10, 15, 80, '2018-08-26 07:11:07', '2018-08-28 22:18:35', NULL),
(43, 12, 15, 200, '2018-08-26 07:11:21', '2018-08-28 22:18:35', NULL),
(44, 14, 15, 80, '2018-08-26 07:11:31', '2018-08-28 22:18:35', NULL),
(45, 12, 15, 80, '2018-08-26 07:57:22', '2018-08-28 22:18:35', NULL),
(46, 6, 15, 80, '2018-08-26 08:25:29', '2018-08-28 22:18:35', NULL),
(47, 7, 15, 50, '2018-08-26 08:25:36', '2018-08-28 22:18:35', NULL),
(48, 9, 15, 120, '2018-08-26 08:25:52', '2018-08-28 22:18:35', NULL),
(49, 7, 11, 50, '2018-08-26 08:48:26', '2018-08-27 08:03:19', NULL),
(50, 10, 11, 80, '2018-08-26 08:48:33', '2018-08-27 08:03:19', NULL),
(51, 10, 11, 120, '2018-08-26 08:48:39', '2018-08-27 08:03:19', NULL),
(52, 14, 11, 11, '2018-08-26 08:49:10', '2018-08-27 08:03:19', NULL),
(54, 10, 16, 50, '2018-08-26 12:02:57', '2018-08-27 07:06:11', NULL),
(55, 13, 16, 120, '2018-08-26 12:03:02', '2018-08-27 07:06:11', NULL),
(56, 7, 17, 33, '2018-08-26 12:25:26', '2018-08-27 07:06:14', NULL),
(57, 10, 17, 21, '2018-08-26 12:25:30', '2018-08-27 07:06:14', NULL),
(58, 11, 17, 22, '2018-08-26 12:25:33', '2018-08-27 07:06:14', NULL),
(59, 9, 18, 80, '2018-08-26 12:26:10', '2018-08-27 07:06:17', NULL),
(61, 12, 18, 60, '2018-08-26 12:26:18', '2018-08-27 07:06:17', NULL),
(62, 18, 18, 50, '2018-08-26 12:26:24', '2018-08-27 07:06:17', NULL),
(69, 8, 12, 10, '2018-08-28 12:42:00', '2018-08-28 12:42:00', NULL),
(77, 11, 22, 6, '2018-08-28 16:34:01', '2018-08-28 22:18:35', NULL),
(78, 7, 22, 80, '2018-08-28 16:34:30', '2018-08-28 22:18:35', NULL),
(81, 8, 23, 2, '2018-08-28 20:59:53', '2018-08-28 20:59:53', NULL),
(82, 11, 23, 3, '2018-08-28 21:53:02', '2018-08-28 21:53:02', NULL),
(84, 10, 14, 12, '2018-08-28 22:10:42', '2018-08-28 22:10:42', NULL),
(85, 18, 14, 25, '2018-08-28 22:10:57', '2018-08-28 22:10:57', NULL),
(86, 8, 18, 40, '2018-08-28 22:16:41', '2018-08-28 22:16:41', NULL),
(87, 18, 18, 25, '2018-08-28 22:16:59', '2018-08-28 22:16:59', NULL),
(88, 8, 14, 10, '2018-08-30 19:22:49', '2018-08-30 19:22:49', NULL),
(89, 9, 24, 100, '2018-08-30 19:24:44', '2018-08-30 19:24:44', NULL),
(90, 9, 23, 25, '2018-08-30 20:05:31', '2018-08-30 20:05:31', NULL),
(91, 9, 25, 25, '2018-08-31 09:25:19', '2018-08-31 09:25:19', NULL),
(92, 10, 25, 35, '2018-08-31 09:25:29', '2018-08-31 09:25:29', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `edetails`
--

CREATE TABLE `edetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_article` int(10) UNSIGNED NOT NULL,
  `bon_entre_id` int(10) UNSIGNED NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix_vent` decimal(9,2) DEFAULT '0.00',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `edetails`
--

INSERT INTO `edetails` (`id`, `id_article`, `bon_entre_id`, `quantite`, `prix_vent`, `type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 7, 2, 100, '10.00', 'DEMI', NULL, '2018-08-31 14:36:01', '2018-08-31 14:36:01'),
(4, 8, 3, 20, '10.00', 'DEMI', NULL, '2018-08-31 15:15:18', '2018-08-31 15:15:18'),
(5, 8, 3, 5, '10.00', 'RETOUR', NULL, '2018-08-31 15:15:32', '2018-08-31 15:15:32'),
(14, 5, 4, 1, '250.00', 'GROS', NULL, '2018-08-31 20:06:04', '2018-08-31 20:06:04'),
(15, 5, 4, 1, '280.00', 'DEMI', NULL, '2018-08-31 20:06:26', '2018-08-31 20:06:26'),
(16, 5, 4, 1, '240.00', 'CLIENT', NULL, '2018-08-31 20:06:34', '2018-08-31 20:06:34'),
(17, 5, 4, 1, '0.00', 'RETOUR', NULL, '2018-08-31 20:06:46', '2018-08-31 20:06:46'),
(18, 5, 4, 1, '0.00', 'PERDU', NULL, '2018-08-31 20:07:04', '2018-08-31 20:07:04'),
(20, 5, 4, 2, '250.00', 'GROS', NULL, '2018-08-31 20:22:57', '2018-08-31 20:22:57'),
(21, 5, 5, 2, '250.00', 'GROS', NULL, '2018-08-31 20:43:51', '2018-08-31 20:43:51'),
(22, 5, 5, 2, '280.00', 'DEMI', NULL, '2018-08-31 20:44:04', '2018-08-31 20:44:04'),
(24, 8, 5, 25, '1005.00', 'CLIENT', NULL, '2018-08-31 20:54:57', '2018-08-31 20:54:57'),
(25, 5, 6, 1, '250.00', 'GROS', NULL, '2018-08-31 20:56:53', '2018-08-31 20:56:53'),
(28, 5, 7, 4, '250.00', 'GROS', NULL, '2018-08-31 21:15:54', '2018-08-31 21:15:54'),
(29, 7, 7, 10, '250.00', 'GROS', NULL, '2018-08-31 21:21:17', '2018-08-31 21:21:17');

-- --------------------------------------------------------

--
-- Structure de la table `lots`
--

CREATE TABLE `lots` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

CREATE TABLE `marques` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `marques`
--

INSERT INTO `marques` (`id`, `nom`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Safina', NULL, NULL, NULL),
(2, 'Loya', NULL, NULL, NULL),
(3, 'Berbère', '2018-08-23 23:00:00', NULL, NULL),
(4, 'Twisco', NULL, NULL, NULL),
(5, 'Amila', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_08_21_215343_create_article_table', 1),
(4, '2018_08_21_215445_create_bon_sorite_table', 1),
(5, '2018_08_21_215536_create_categorie_table', 1),
(6, '2018_08_21_215559_create_client_table', 1),
(7, '2018_08_21_215627_create_depose_table', 1),
(8, '2018_08_21_215726_create_depot_table', 1),
(9, '2018_08_21_215758_create_detail_bs_table', 1),
(10, '2018_08_21_215815_create_lot_table', 1),
(11, '2018_08_21_215836_create_marque_table', 1),
(12, '2018_08_21_215859_create_vendeur_table', 1),
(13, '2018_08_22_145001_update_articles_table', 1),
(14, '2018_08_22_150526_update_bon_sorites_table', 1),
(15, '2018_08_22_150830_update_clients_table', 1),
(16, '2018_08_22_151106_update_deposes_table', 1),
(17, '2018_08_22_151304_update_detail_bss_table', 1),
(19, '2018_08_27_081621_create_stocks_table', 2),
(20, '2018_08_27_093241_update_stocks_table', 3),
(21, '2018_08_31_104343_create_bon_entres_table', 4),
(22, '2018_08_31_110156_create_decharges_table', 5),
(23, '2018_08_31_125800_create_edetails_table', 6);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `quantite` int(11) NOT NULL,
  `from_a` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `stocks`
--

INSERT INTO `stocks` (`id`, `type`, `article_id`, `quantite`, `from_a`, `observation`, `created_at`, `updated_at`) VALUES
(23, 'OUT', 8, 10, 'hachi', 'rein', '2018-08-28 12:34:11', '2018-08-28 12:34:11'),
(24, 'IN', 8, 60, 'hachi', 'rein', '2018-08-28 12:37:21', '2018-08-28 12:37:21'),
(25, 'PERDU', 8, 3, '/', 'rein', '2018-08-28 12:40:06', '2018-08-28 12:40:06'),
(26, 'OUT', 8, 10, 'Oussara', 'rein', '2018-08-28 12:50:19', '2018-08-28 12:50:19'),
(27, 'PERDU', 8, 2, 'csff', 'rein', '2018-08-28 12:50:36', '2018-08-28 12:50:36'),
(28, 'IN', 10, 120, 'hachi', 'rein', '2018-08-28 13:17:58', '2018-08-28 13:17:58'),
(29, 'IN', 11, 15, 'Command', 'Rien', '2018-08-28 16:25:38', '2018-08-28 16:25:38'),
(30, 'IN', 12, 200, 'Command', 'Rien', '2018-08-28 22:13:37', '2018-08-28 22:13:37'),
(31, 'PERDU', 12, 3, '/', 'Rien', '2018-08-28 22:14:02', '2018-08-28 22:14:02'),
(32, 'OUT', 13, 10, 'Hassi bah bah', 'Rien', '2018-08-28 22:14:30', '2018-08-28 22:14:30'),
(33, 'IN', 5, 60, 'Usine', NULL, '2018-08-30 21:02:00', '2018-08-30 21:02:00'),
(34, 'PERDU', 5, 3, 'Usine', 'Ta7ou', '2018-08-30 21:03:07', '2018-08-30 21:03:07');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vendeurs`
--

CREATE TABLE `vendeurs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vendeurs`
--

INSERT INTO `vendeurs` (`id`, `nom`, `tel`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'HAMZA', '0774123401', '2018-08-22 14:38:24', '2018-08-27 08:03:19', NULL),
(4, 'WALID', '0774123401', '2018-08-22 15:01:15', '2018-08-22 15:01:15', NULL),
(5, 'SALEM', '0779933838', '2018-08-23 11:21:24', '2018-08-23 11:21:24', NULL),
(6, 'IHA', '0774123401', '2018-08-23 23:35:50', '2018-08-26 13:55:38', NULL),
(7, 'MMM', '0778838855', '2018-08-23 23:47:18', '2018-08-26 11:57:54', NULL),
(8, 'FFFFFFFF', '0660513045', '2018-08-24 15:29:19', '2018-08-26 13:06:50', NULL),
(9, 'MAMON', '0778838851', '2018-08-25 15:41:03', '2018-08-28 22:18:35', NULL),
(10, 'TEST', '0000000000', '2018-08-26 13:08:56', '2018-08-26 13:54:47', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_id_categorie_foreign` (`id_categorie`),
  ADD KEY `articles_id_marque_foreign` (`id_marque`),
  ADD KEY `articles_id_depot_foreign` (`depot_id`);

--
-- Index pour la table `bon_entres`
--
ALTER TABLE `bon_entres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bon_entres_vendeur_id_foreign` (`vendeur_id`);

--
-- Index pour la table `bon_sorties`
--
ALTER TABLE `bon_sorties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bon_sorties_id_vendeur_foreign` (`vendeur_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_id_vendeur_foreign` (`id_vendeur`);

--
-- Index pour la table `decharges`
--
ALTER TABLE `decharges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `decharges_bon_entre_id_foreign` (`bon_entre_id`);

--
-- Index pour la table `deposes`
--
ALTER TABLE `deposes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deposes_id_client_foreign` (`id_client`);

--
-- Index pour la table `depots`
--
ALTER TABLE `depots`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_bs_id_bon_sortie_foreign` (`bon_sortie_id`),
  ADD KEY `detail_bs_id_article_foreign` (`id_article`);

--
-- Index pour la table `edetails`
--
ALTER TABLE `edetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `edetails_id_article_foreign` (`id_article`),
  ADD KEY `edetails_bon_entre_id_foreign` (`bon_entre_id`);

--
-- Index pour la table `lots`
--
ALTER TABLE `lots`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `marques`
--
ALTER TABLE `marques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_article_id_foreign` (`article_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `vendeurs`
--
ALTER TABLE `vendeurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `bon_entres`
--
ALTER TABLE `bon_entres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `bon_sorties`
--
ALTER TABLE `bon_sorties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `decharges`
--
ALTER TABLE `decharges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `deposes`
--
ALTER TABLE `deposes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `depots`
--
ALTER TABLE `depots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT pour la table `edetails`
--
ALTER TABLE `edetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `lots`
--
ALTER TABLE `lots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `marques`
--
ALTER TABLE `marques`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `vendeurs`
--
ALTER TABLE `vendeurs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_id_categorie_foreign` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `articles_id_depot_foreign` FOREIGN KEY (`depot_id`) REFERENCES `depots` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `articles_id_marque_foreign` FOREIGN KEY (`id_marque`) REFERENCES `marques` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `bon_entres`
--
ALTER TABLE `bon_entres`
  ADD CONSTRAINT `bon_entres_vendeur_id_foreign` FOREIGN KEY (`vendeur_id`) REFERENCES `vendeurs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `bon_sorties`
--
ALTER TABLE `bon_sorties`
  ADD CONSTRAINT `bon_sorties_id_vendeur_foreign` FOREIGN KEY (`vendeur_id`) REFERENCES `vendeurs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_id_vendeur_foreign` FOREIGN KEY (`id_vendeur`) REFERENCES `vendeurs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `decharges`
--
ALTER TABLE `decharges`
  ADD CONSTRAINT `decharges_bon_entre_id_foreign` FOREIGN KEY (`bon_entre_id`) REFERENCES `bon_entres` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `deposes`
--
ALTER TABLE `deposes`
  ADD CONSTRAINT `deposes_id_client_foreign` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `detail_bs_id_article_foreign` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_bs_id_bon_sortie_foreign` FOREIGN KEY (`bon_sortie_id`) REFERENCES `bon_sorties` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `edetails`
--
ALTER TABLE `edetails`
  ADD CONSTRAINT `edetails_bon_entre_id_foreign` FOREIGN KEY (`bon_entre_id`) REFERENCES `bon_entres` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `edetails_id_article_foreign` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
