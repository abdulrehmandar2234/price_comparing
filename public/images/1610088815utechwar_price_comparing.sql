-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 23, 2020 at 01:46 PM
-- Server version: 10.3.25-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utechwar_price_comparing`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `created_at`, `updated_at`) VALUES
(1, 'Coca Cola', NULL, NULL),
(2, 'Nivea', '2020-12-23 14:05:00', '2020-12-23 14:05:00'),
(3, 'Sanytol', '2020-12-23 14:23:56', '2020-12-23 14:23:56'),
(4, 'Linic', '2020-12-23 14:25:25', '2020-12-23 14:25:25'),
(5, 'Neoblanc', '2020-12-23 14:32:05', '2020-12-23 14:32:05'),
(6, 'Vileda', '2020-12-23 14:35:16', '2020-12-23 14:35:16'),
(7, 'Skip', '2020-12-23 14:37:59', '2020-12-23 14:37:59'),
(8, 'OMO', '2020-12-23 14:39:06', '2020-12-23 14:39:06'),
(9, 'Continent', '2020-12-23 16:46:50', '2020-12-23 16:46:50'),
(10, 'Redex', '2020-12-23 16:50:29', '2020-12-23 16:50:29'),
(11, 'Fevorina', '2020-12-23 17:47:18', '2020-12-23 17:47:18'),
(12, 'indisponivel', '2020-12-23 18:34:53', '2020-12-23 18:34:53'),
(13, 'Auchon', '2020-12-23 18:48:06', '2020-12-23 18:48:06'),
(14, 'MONCHIQUE', '2020-12-23 18:50:48', '2020-12-23 18:50:48'),
(15, 'FRISKIES', '2020-12-23 19:08:16', '2020-12-23 19:08:16'),
(16, 'froiz', '2020-12-23 19:50:29', '2020-12-23 19:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`,`image`, `category_name`, `created_at`, `updated_at` ) VALUES
(1,'image1', 'beverage', NULL, NULL),
(2,'image2', 'Beauty','2020-12-23 14:03:06', '2020-12-23 14:03:06'),
(3,'image3', 'Cleaning', '2020-12-23 14:33:24', '2020-12-23 14:34:19'),
(4,'image4', 'Sweet cream', '2020-12-23 17:49:37', '2020-12-23 17:49:37'),
(5,'image5', 'Chocolate', '2020-12-23 18:02:32', '2020-12-23 18:02:32'),
(6,'image16', 'bakery', '2020-12-23 18:30:55', '2020-12-23 18:30:55'),
(7, 'image17','Food', '2020-12-23 18:48:55', '2020-12-23 18:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `currency_exchanges`
--

CREATE TABLE `currency_exchanges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `USDEUR` double(8,2) NOT NULL,
  `EURUSD` double(8,2) NOT NULL,
  `USDGBP` double(8,2) NOT NULL,
  `GBPUSD` double(8,2) NOT NULL,
  `EURGBP` double(8,2) NOT NULL,
  `GBPEUR` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_13_001824_create_permission_tables', 1),
(10, '2020_10_18_120322_create_websites_table', 1),
(11, '2020_10_28_150404_create_search_websites_table', 1),
(12, '2020_10_29_155545_create_currency_exchanges_table', 1),
(13, '2020_11_04_130919_create_single_products_table', 1),
(14, '2020_11_11_083124_create_wishlists_table', 1),
(15, '2020_11_16_073648_create_my_accounts_table', 1),
(16, '2020_11_16_090624_create_sliders_table', 1),
(17, '2020_11_17_063857_create_carts_table', 1),
(18, '2020_12_03_093856_create_categories_table', 1),
(19, '2020_12_03_110754_create_brands_table', 1),
(20, '2020_12_03_133049_create_products_table', 1),
(21, '2020_12_03_133133_create_product_links_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `my_accounts`
--

CREATE TABLE `my_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('01f81d4da6c3699de47165729600e0b1c09e2811d2d517f0f95c8157193c7e7b788ccadb03091dfa', 5, 1, 'Personal Access Token', '[]', 0, '2020-12-19 02:04:41', '2020-12-19 02:04:41', '2020-12-26 07:04:41'),
('6cbff32e33e3f6a5e3300d2642a9439958793c07e25958c5d233e149f0eedb652ef8a5efc33916a8', 5, 1, 'MyApp', '[]', 0, '2020-12-19 02:02:38', '2020-12-19 02:02:38', '2021-12-19 07:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'p8xupfQWr2oOwlEX8jUWTYsNWkMi6iM0soYNJ9Oa', NULL, 'http://localhost', 1, 0, 0, '2020-12-19 02:02:14', '2020-12-19 02:02:14'),
(2, NULL, 'Laravel Password Grant Client', 'iY4zPNmXaU0cx285Gr2AyW1ak34UmMfsXQt4wT2K', 'users', 'http://localhost', 0, 1, 0, '2020-12-19 02:02:14', '2020-12-19 02:02:14');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-12-19 02:02:14', '2020-12-19 02:02:14');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2020-12-16 06:54:39', '2020-12-16 06:54:39'),
(2, 'role-create', 'web', '2020-12-16 06:54:39', '2020-12-16 06:54:39'),
(3, 'role-edit', 'web', '2020-12-16 06:54:39', '2020-12-16 06:54:39'),
(4, 'role-delete', 'web', '2020-12-16 06:54:39', '2020-12-16 06:54:39'),
(5, 'user-list', 'web', '2020-12-16 06:54:39', '2020-12-16 06:54:39'),
(6, 'user-create', 'web', '2020-12-16 06:54:39', '2020-12-16 06:54:39'),
(7, 'user-edit', 'web', '2020-12-16 06:54:39', '2020-12-16 06:54:39'),
(8, 'user-delete', 'web', '2020-12-16 06:54:39', '2020-12-16 06:54:39'),
(9, 'permission-list', 'web', '2020-12-16 06:54:39', '2020-12-16 06:54:39'),
(10, 'permission-create', 'web', '2020-12-16 06:54:39', '2020-12-16 06:54:39'),
(11, 'permission-edit', 'web', '2020-12-16 06:54:40', '2020-12-16 06:54:40'),
(12, 'permission-delete', 'web', '2020-12-16 06:54:40', '2020-12-16 06:54:40');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(1, 'Coca Cola Zero Lata', 1, 1, NULL, NULL),
(2, 'Champô para Homem Power Anticaspa', 2, 2, '2020-12-23 14:03:30', '2020-12-23 14:05:15'),
(3, 'Sanytol laundry disinfectant', 1, 3, '2020-12-23 14:24:13', '2020-12-23 14:24:13'),
(4, 'Champô para Homem Anticaspa Eficácia Ativa', 2, 4, '2020-12-23 14:26:29', '2020-12-23 14:26:29'),
(5, 'Champô para Homem Anticaspa Controlo de Oleosidade', 2, 4, '2020-12-23 14:27:14', '2020-12-23 14:27:14'),
(6, 'Champô para Homem Strong Power', 2, 2, '2020-12-23 14:28:15', '2020-12-23 14:28:15'),
(7, 'Gentle Multi-Spray', 3, 5, '2020-12-23 14:34:37', '2020-12-23 14:34:37'),
(8, 'Pano Suave Suave com Microfibras', 3, 6, '2020-12-23 14:35:47', '2020-12-23 14:35:47'),
(9, 'Tira Nódoas Oxigénio BioAtivo', 3, 7, '2020-12-23 14:38:11', '2020-12-23 14:38:11'),
(10, 'Lixívia + Detergente em Gel', 3, 5, '2020-12-23 14:38:45', '2020-12-23 14:38:45'),
(11, 'Laundry Detergent in Powder for Manual Wash', 3, 8, '2020-12-23 14:39:24', '2020-12-23 14:39:24'),
(12, 'Flowers Cleansing Cream', 2, 9, '2020-12-23 16:47:20', '2020-12-23 16:47:20'),
(13, 'Cleaning Air Conditioning', 3, 10, '2020-12-23 16:51:53', '2020-12-23 16:51:53'),
(14, 'Bleach Cleaning Cream', 3, 9, '2020-12-23 17:05:57', '2020-12-23 17:05:57'),
(15, 'Traditional Bleach', 3, 5, '2020-12-23 17:07:48', '2020-12-23 17:07:48'),
(16, 'Freshness Cleansing Cream Lemon', 2, 9, '2020-12-23 17:08:46', '2020-12-23 17:08:46'),
(17, 'Cleaning Vinegar', 3, 9, '2020-12-23 17:14:39', '2020-12-23 17:14:39'),
(18, 'Favorina® Speculoos Cream', 4, 11, '2020-12-23 17:49:55', '2020-12-23 17:49:55'),
(19, 'Favorina® Cookies with Spices', 5, 11, '2020-12-23 18:03:20', '2020-12-23 18:03:20'),
(20, 'Favorina® Bombons de Chocolate', 5, 11, '2020-12-23 18:04:08', '2020-12-23 18:04:08'),
(21, 'Favorina® Bolo Rei', 5, 11, '2020-12-23 18:05:30', '2020-12-23 18:05:30'),
(22, 'Barra Rústica', 6, 12, '2020-12-23 18:35:11', '2020-12-23 18:35:11'),
(23, 'Baguete', 6, 12, '2020-12-23 18:38:56', '2020-12-23 18:38:56'),
(24, 'Meat Ball House Kg Own manufacture', 6, 12, '2020-12-23 18:39:55', '2020-12-23 18:39:55'),
(25, 'Broa De Milho Amarelo Kg Fabrico Próprio', 6, 12, '2020-12-23 18:40:20', '2020-12-23 18:40:20'),
(26, 'Bola Tigre 50 Gr Fabrico Próprio', 6, 12, '2020-12-23 18:40:35', '2020-12-23 18:40:35'),
(27, 'Coca-Cola Soda Light', 1, 1, '2020-12-23 18:41:51', '2020-12-23 18:44:08'),
(28, 'Soda with Can Gas', 1, 1, '2020-12-23 18:44:21', '2020-12-23 18:44:21'),
(29, 'White Eggs Auchan', 7, 13, '2020-12-23 18:49:11', '2020-12-23 18:49:11'),
(30, 'Mineral Water Monchique', 1, 14, '2020-12-23 18:51:21', '2020-12-23 18:51:21'),
(31, 'Small Dog Snack', 7, 15, '2020-12-23 19:08:48', '2020-12-23 19:08:48'),
(32, 'Mimosa yogurt liquid strawberry', 7, 16, '2020-12-23 19:50:45', '2020-12-23 19:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `product_links`
--

CREATE TABLE `product_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_unit_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_updated` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_links`
--

INSERT INTO `product_links` (`id`, `website_id`, `product_id`, `product_link`, `product_price`, `product_unit`, `product_unit_price`, `product_discount`, `product_updated`, `product_image`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'https://comuniti.pt/pt/colas/4702-coca-cola-zero-lata-5449000131805.html', '0,99 €', '', '', '', '2020-12-16 11:55:07', 'coca-cola-zero-lata.jpg', NULL, '2020-12-16 06:55:09'),
(2, 2, 1, 'https://goodafter.com/pt/bebidas/5615-20525-coca-cola-zero-baunilha-33cl.html', '0,30 €', '', '', '-62%', '2020-12-16 11:55:11', 'coca-cola-zero-baunilha-33cl.jpg', NULL, '2020-12-16 06:55:13'),
(4, 1, 2, 'https://comuniti.pt/en/shampoo/3510-champo-para-homem-power-anticaspa-4005900019158.html', '€2.69', NULL, '', 'SAVE UP TO €2.04', '2020-12-23 09:41:23', 'champo-para-homem-power-anticaspa.jpg', '2020-12-23 14:41:13', '2020-12-23 14:41:24'),
(5, 1, 3, 'https://comuniti.pt/en/textil-and-shoeware-disinfacting/1670-desinfectante-para-roupa-8411660170309.html', '€7.69', NULL, '', 'SAVE UP TO €0.70', '2020-12-23 09:45:26', 'desinfectante-para-roupa.jpg', '2020-12-23 14:45:14', '2020-12-23 14:45:27'),
(6, 1, 4, 'https://comuniti.pt/en/shampoo/3248-champo-para-homem-anticaspa-eficacia-ativa-8717644417713.html', '€2.69', NULL, '', 'SAVE UP TO €1.80', '2020-12-23 11:29:02', 'champo-para-homem-anticaspa-eficacia-ativa.jpg', '2020-12-23 14:47:44', '2020-12-23 16:29:03'),
(7, 1, 5, 'https://comuniti.pt/en/shampoo/3249-champo-para-homem-anticaspa-controlo-de-oleosidade-8717644291627.html', '€2.69', NULL, '', 'SAVE UP TO €1.80', '2020-12-23 11:29:04', 'champo-para-homem-anticaspa-controlo-de-oleosidade.jpg', '2020-12-23 14:48:36', '2020-12-23 16:29:05'),
(9, 1, 8, 'https://comuniti.pt/en/cleaning-cloths-mops/555-pano-suave-duplo-8410435003019.html', '€2.64', NULL, '', 'SAVE UP TO €0.10', '2020-12-23 11:36:22', 'pano-suave-duplo.jpg', '2020-12-23 16:35:01', '2020-12-23 16:36:22'),
(10, 1, 6, 'https://comuniti.pt/en/shampoo/3250-champo-para-homem-strong-power-4005808255818.html', '€2.69', NULL, '', 'SAVE UP TO €2.04', '2020-12-23 11:39:57', 'champo-para-homem-strong-power.jpg', '2020-12-23 16:37:42', '2020-12-23 16:39:58'),
(11, 1, 9, 'https://comuniti.pt/en/stain-remover/6126-tira-nodoas-oxigenio-bioativo-8710847944420.html', '€5.99', NULL, '', '', '2020-12-23 11:39:59', 'tira-nodoas-oxigenio-bioativo.jpg', '2020-12-23 16:39:47', '2020-12-23 16:40:00'),
(12, 1, 10, 'https://comuniti.pt/en/lixivias/752-lixivia-gel-liquido-com-detergente-8001480109735.html', '€2.15', NULL, '', 'SAVE UP TO €0.70', '2020-12-23 11:41:36', 'lixivia-gel-liquido-com-detergente.jpg', '2020-12-23 16:40:56', '2020-12-23 16:41:37'),
(13, 1, 11, 'https://comuniti.pt/en/po/879-laundry-detergent-in-powder-for-manual-wash-8712561425858.html', '€4.99', NULL, '', 'SAVE UP TO €0.10', '2020-12-23 11:41:38', 'laundry-detergent-in-powder-for-manual-wash.jpg', '2020-12-23 16:41:29', '2020-12-23 16:41:39'),
(14, 4, 12, 'https://www.continente.pt/stores/continente/pt-pt/public/Pages/ProductDetail.aspx?ProductId=5490055(eCsf_RetekProductCatalog_MegastoreContinenteOnline_Continente)', '€  0,99', NULL, '', '', '2020-12-23 11:48:17', 'media.axd?resourceSearchType=2&resource=ProductId=5490055(eCsf$RetekProductCatalog$MegastoreContinenteOnline$Continente)&siteId=1&channelId=1&width=180&height=170&defaultOptions=1', '2020-12-23 16:48:08', '2020-12-23 16:48:18'),
(15, 4, 13, 'https://www.continente.pt/stores/continente/pt-pt/public/Pages/ProductDetail.aspx?ProductId=6911220(eCsf_RetekProductCatalog_MegastoreContinenteOnline_Continente)', '€  3,99', NULL, '', '', '2020-12-23 11:52:52', 'media.axd?resourceSearchType=2&resource=ProductId=6911220(eCsf$RetekProductCatalog$MegastoreContinenteOnline$Continente)&siteId=1&channelId=1&width=180&height=170&defaultOptions=1', '2020-12-23 16:52:36', '2020-12-23 16:52:54'),
(16, 1, 15, 'https://comuniti.pt/en/lixivias/486-lixivia-tradicional-8001480020535.html', '€3.39', NULL, '', 'SAVE UP TO €0.03', '2020-12-23 12:10:00', 'lixivia-tradicional.jpg', '2020-12-23 17:09:43', '2020-12-23 17:10:01'),
(17, 4, 14, 'https://www.continente.pt/stores/continente/pt-pt/public/Pages/ProductDetail.aspx?ProductId=4302667(eCsf_RetekProductCatalog_MegastoreContinenteOnline_Continente)', '€  0,99', NULL, '', '', '2020-12-23 12:12:31', 'media.axd?resourceSearchType=2&resource=ProductId=4302667(eCsf$RetekProductCatalog$MegastoreContinenteOnline$Continente)&siteId=1&channelId=1&width=180&height=170&defaultOptions=1', '2020-12-23 17:12:20', '2020-12-23 17:12:31'),
(18, 4, 16, 'https://www.continente.pt/stores/continente/pt-pt/public/Pages/ProductDetail.aspx?ProductId=4302665(eCsf_RetekProductCatalog_MegastoreContinenteOnline_Continente)', '€  0,99', NULL, '', '', '2020-12-23 12:53:28', 'media.axd?resourceSearchType=2&resource=ProductId=4302665(eCsf$RetekProductCatalog$MegastoreContinenteOnline$Continente)&siteId=1&channelId=1&width=180&height=170&defaultOptions=1', '2020-12-23 17:13:45', '2020-12-23 17:53:29'),
(19, 4, 17, 'https://www.continente.pt/stores/continente/pt-pt/public/Pages/ProductDetail.aspx?ProductId=6894108(eCsf_RetekProductCatalog_MegastoreContinenteOnline_Continente)', '€  0,79', NULL, '', '', '2020-12-23 12:53:29', 'media.axd?resourceSearchType=2&resource=ProductId=6894108(eCsf$RetekProductCatalog$MegastoreContinenteOnline$Continente)&siteId=1&channelId=1&width=180&height=170&defaultOptions=1', '2020-12-23 17:15:00', '2020-12-23 17:53:30'),
(22, 3, 22, 'https://www.auchan.pt/Frontoffice/produtos_frescos/padaria/pao_tradicional_e_broas/barra_rustica245_g/1039878/Auchan_Amadora', '€0,92', NULL, '', '', '2020-12-23 13:36:41', '001039878_112_88.jpg', '2020-12-23 18:36:30', '2020-12-23 18:36:42'),
(23, 6, 31, 'https://online.e-leclerc.pt/hipermercado-santa-maria-da-feira/snack-para-cao-pequeno', NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-23 19:14:41', '2020-12-23 19:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2020-12-16 06:54:40', '2020-12-16 06:54:40'),
(2, 'business', 'web', '2020-12-16 06:54:40', '2020-12-16 06:54:40');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `search_websites`
--

CREATE TABLE `search_websites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `list_node` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `search_url_node` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name_node` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_description_node` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price_node` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_unit_price_node` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_discount_node` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image_node` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_link_node` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `search_websites`
--

INSERT INTO `search_websites` (`id`, `website_url`, `website_logo`, `currency`, `list_node`, `search_url_node`, `product_name_node`, `product_description_node`, `product_price_node`, `product_unit_price_node`, `product_discount_node`, `product_image_node`, `product_link_node`, `created_at`, `updated_at`) VALUES
(1, 'https://comuniti.pt/en/', NULL, '', '', 'https://comuniti.pt/en/jolisearch?s=PRODUCT_NAME_SEARCH', '.c-product__name', '', '.c-product__price .price', '.c-product__price-perkg', '.c-product__card-section .c-badge__text', '.c-product__photo', '.card-section a', NULL, NULL),
(2, 'https://goodafter.com/pt/', NULL, '', '', 'https://goodafter.com/pt/pesquisa?controller=search&s=PRODUCT_NAME_SEARCH', '.product-box .product-name', '.validade-produto', '.product-box .product-info .content_price .price.new, .product-carousel-box .group-box .content_price .price.new', 'span.product-unit-price.sub', 'span.price-percent-reduction', '.product-box .preview .product-image img', '.product-image', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `single_products`
--

CREATE TABLE `single_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_id` bigint(20) UNSIGNED NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `list_node` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name_node` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_description_node` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price_node` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_unit_price_node` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_discount_node` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image_node` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `single_products`
--

INSERT INTO `single_products` (`id`, `website_logo`, `website_id`, `currency`, `list_node`, `product_name_node`, `product_description_node`, `product_price_node`, `product_unit_price_node`, `product_discount_node`, `product_image_node`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, '', '', '.c-product-details__name', '.c-product-details__brand', '.c-product__price .price', '.c-product-details__price-sm', '.c-title-save-scraper', '.MagicZoom>img, .mz-figure>img', NULL, NULL),
(2, NULL, 2, '', '', '.pb-right-column h2', '.product-variants', '.pb-right-column .content_prices .price.new', 'span.product-unit-price.sub', '.price-percent-reduction', '.js-qv-product-cover', NULL, NULL),
(4, '1608119906logo-auchan.png', 1, NULL, NULL, '.relative', NULL, '.product-detail .item-price', '.product-detail .product-item-quantity-price', NULL, '.product-detail .product-item-quantity-price', '2020-12-16 07:44:08', '2020-12-16 07:51:06'),
(5, NULL, 4, NULL, NULL, '.productTitle', NULL, '.updListPrice', NULL, NULL, '#smallProduct', '2020-12-23 16:22:55', '2020-12-23 16:22:55'),
(6, NULL, 5, NULL, NULL, '.attributebox__headline--h1', NULL, '.pricebox__price', NULL, NULL, '.img.lazyloaded', '2020-12-23 17:46:04', '2020-12-23 18:15:42'),
(7, NULL, 3, NULL, NULL, '.product-item-brand', NULL, '.item-price', NULL, NULL, '.img-full-width', '2020-12-23 18:29:32', '2020-12-23 18:29:32'),
(8, NULL, 6, NULL, NULL, '.detalhe_nome', NULL, '.div_preco', NULL, NULL, '.slick-slide img', '2020-12-23 19:13:59', '2020-12-23 19:13:59');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `btn_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `banner`, `image`, `title`, `sub_title`, `price`, `btn_text`, `link`, `created_at`, `updated_at`) VALUES
(1, 'images/img1.jpg', 'images/img1.png', 'The New Standard', 'UNDER FAVORABLE SMARTWATCHES', 50.00, 'Start Buying', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `activation_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `provider_id`, `avatar`, `active`, `activation_token`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin Testing', 'admin@app.com', NULL, '$2y$10$BRQm6JHKV2z9wO3dP4AECOzFxMErQ/mKomvhyD54Qp51rxq5w02i6', NULL, 'avatar.png', 0, NULL, NULL, '2020-12-16 06:54:40', '2020-12-16 06:54:40', NULL),
(2, 'Business Testing', 'business@app.com', NULL, '$2y$10$ul65lN830XlXzcLtRHk9KueCwjTEnXjl7Ve6FxctKCEMhBmA8B/ou', NULL, 'avatar.png', 0, NULL, NULL, '2020-12-16 06:54:40', '2020-12-16 06:54:40', NULL),
(3, 'Business Testing', 'user@app.com', NULL, '$2y$10$nJj7JXn6h.LP3I4PLlbfYuWu1V5xnvZKeh1yUTsK2IAVZMf.3YveW', NULL, 'avatar.png', 0, NULL, NULL, '2020-12-16 06:54:41', '2020-12-16 06:54:41', NULL),
(4, 'ali4', 'ios@gmail.ne', NULL, '$2y$10$kgiOaEdYS80xc97kTl.PeO1mY1xsB0YQWQaGst5uO0kH4N4m4M8e2', NULL, 'avatar.png', 0, NULL, NULL, '2020-12-19 02:01:16', '2020-12-19 02:01:16', NULL),
(5, 'Faisal', 'fk@gmail.ne', NULL, '$2y$10$mNudyYubZw4V675ZfCWJseggS1Gn1byHgMssVBqEzERppMS4ZDVua', NULL, 'avatar.png', 0, NULL, NULL, '2020-12-19 02:02:38', '2020-12-19 02:02:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE `websites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`id`, `website_name`, `website_url`, `website_logo`, `created_at`, `updated_at`) VALUES
(1, 'Comuniti', 'https://comuniti.pt/en/', '1605268801comunitipt-logo.jpg', NULL, NULL),
(2, 'GoodAfter', 'https://goodafter.com/pt/', 'goodafter-logo.jpg', NULL, NULL),
(3, 'Auchan', 'https://www.auchan.pt/Frontoffice/', '1608119906logo-auchan.png', '2020-12-16 06:57:07', '2020-12-16 06:58:26'),
(4, 'Continente', 'https://www.continente.pt/', '1608717524continente.PNG', '2020-12-23 14:58:44', '2020-12-23 14:59:01'),
(5, 'lidl', 'https://www.lidl.pt/', '1608726613lidllogo.png', '2020-12-23 17:29:44', '2020-12-23 17:30:13'),
(6, 'e-leclerc', 'https://www.e-leclerc.pt/', '1608732274logo.png', '2020-12-23 19:03:57', '2020-12-23 19:04:34'),
(7, NULL, 'https://www.froiz.pt/', '1608734793logo_froiz_portugal.png', '2020-12-23 19:46:33', '2020-12-23 19:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency_exchanges`
--
ALTER TABLE `currency_exchanges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `my_accounts`
--
ALTER TABLE `my_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_links`
--
ALTER TABLE `product_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `search_websites`
--
ALTER TABLE `search_websites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `single_products`
--
ALTER TABLE `single_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `single_products_website_id_foreign` (`website_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `currency_exchanges`
--
ALTER TABLE `currency_exchanges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `my_accounts`
--
ALTER TABLE `my_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_links`
--
ALTER TABLE `product_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `search_websites`
--
ALTER TABLE `search_websites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `single_products`
--
ALTER TABLE `single_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `single_products`
--
ALTER TABLE `single_products`
  ADD CONSTRAINT `single_products_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
