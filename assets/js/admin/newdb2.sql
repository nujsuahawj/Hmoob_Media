-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2021 at 09:33 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newdb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `home_1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download_1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download_2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download_3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `home_1`, `home_2`, `download_1`, `download_2`, `download_3`, `blog_1`, `blog_2`, `blog_3`, `mobile`) VALUES
(1, '<img src=\"https://via.placeholder.com/728x90\">', '<img src=\"https://via.placeholder.com/728x90\">', '<div class=\"col-auto d-none d-md-flex\">\n<img src=\"https://via.placeholder.com/728x90\"/>\n</div>\n<div class=\"col-auto d-flex d-md-none\">\n<img src=\"https://via.placeholder.com/300x280\"/>\n</div>', '<div class=\"col-auto d-none d-md-flex\">\n<img src=\"https://via.placeholder.com/300x600\">\n</div>\n<div class=\"col-auto d-flex d-md-none\">\n<img src=\"https://via.placeholder.com/300x280\"/>\n</div>', '<div class=\"col-auto d-none d-md-flex\">\n<img src=\"https://via.placeholder.com/728x90\"/>\n</div>\n<div class=\"col-auto d-flex d-md-none\">\n<img src=\"https://via.placeholder.com/300x280\"/>\n</div>', '<div class=\"col-auto d-none d-md-flex\">\n<img src=\"https://via.placeholder.com/728x90\"/>\n</div>\n<div class=\"col-auto d-flex d-md-none\">\n<img src=\"https://via.placeholder.com/300x280\"/>\n</div>', '<img src=\"https://via.placeholder.com/300x280\">', '<div class=\"col-auto d-none d-md-flex\">\n<img src=\"https://via.placeholder.com/728x90\"/>\n</div>\n<div class=\"col-auto d-flex d-md-none\">\n<img src=\"https://via.placeholder.com/300x280\"/>\n</div>', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `amazons3`
--

CREATE TABLE `amazons3` (
  `id` int(11) NOT NULL,
  `aws_access_key_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aws_secret_access_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aws_default_region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aws_bucket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aws_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amazons3`
--

INSERT INTO `amazons3` (`id`, `aws_access_key_id`, `aws_secret_access_key`, `aws_default_region`, `aws_bucket`, `aws_url`) VALUES
(1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `api`
--

CREATE TABLE `api` (
  `id` int(11) NOT NULL,
  `google_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_clientid` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_clientsecret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_reurl` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api`
--

INSERT INTO `api` (`id`, `google_key`, `google_secret`, `facebook_clientid`, `facebook_clientsecret`, `facebook_reurl`) VALUES
(1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `backblaze`
--

CREATE TABLE `backblaze` (
  `id` int(11) NOT NULL,
  `b2_bucket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b2_account_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b2_application_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b2_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `backblaze`
--

INSERT INTO `backblaze` (`id`, `b2_bucket`, `b2_account_id`, `b2_application_key`, `b2_url`) VALUES
(1, NULL, NULL, NULL, NULL);

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

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'storage', '2021-06-17 15:15:18', '2021-06-17 15:15:24'),
(3, 'offers', '2021-06-17 15:29:37', '2021-06-17 15:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `image`, `title`, `description`, `created_at`, `updated_at`) VALUES
(4, 'F43vBDgXFV.png', 'Unlimited storage', 'Lorem Ipsum is simply dummy text of the printing . Lorem Ipsum has been the industry\'s standard', '2021-06-17 22:16:26', '2021-06-17 22:17:36'),
(5, 'MEZ8PgdX6a.png', 'Fast upload', 'Lorem Ipsum is simply dummy text of the printing . Lorem Ipsum has been the industry\'s standard', '2021-06-17 22:20:01', '2021-06-17 22:20:01'),
(6, 'MFgKeKQE9d.png', 'Sharing option', 'Lorem Ipsum is simply dummy text of the printing . Lorem Ipsum has been the industry\'s standard', '2021-06-17 22:22:46', '2021-06-17 22:22:46'),
(7, '9nAVJMSCoe.png', 'Multiple uploads', 'Lorem Ipsum is simply dummy text of the printing . Lorem Ipsum has been the industry\'s standard', '2021-06-17 22:25:50', '2021-06-17 22:25:50'),
(8, '6Vj9iWYCwY.png', 'Manage files', 'Lorem Ipsum is simply dummy text of the printing . Lorem Ipsum has been the industry\'s standard', '2021-06-17 22:28:14', '2021-06-17 22:28:14'),
(9, 'nH7VwY6KoM.png', 'Files encrypted', 'Lorem Ipsum is simply dummy text of the printing . Lorem Ipsum has been the industry\'s standard', '2021-06-17 22:31:05', '2021-06-17 22:31:05');

-- --------------------------------------------------------

--
-- Table structure for table `home_settings`
--

CREATE TABLE `home_settings` (
  `id` int(11) NOT NULL DEFAULT 1,
  `hero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `center_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `center_button` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_settings`
--

INSERT INTO `home_settings` (`id`, `hero`, `center_text`, `center_button`) VALUES
(1, 'hero-bg.png', 'File sharing and storage made easy', 'Get started today');

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE `icons` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`id`, `icon_name`, `icon_path`, `created_at`, `updated_at`) VALUES
(1, 'png', 'png.png', '2021-06-15 21:51:28', '2021-06-15 21:51:28'),
(2, 'jpg', 'jpg.png', '2021-06-15 21:52:45', '2021-06-15 21:52:45'),
(3, 'apk', 'apk.png', '2021-06-15 21:56:15', '2021-06-15 21:56:15'),
(4, 'csv', 'csv.png', '2021-06-15 21:56:26', '2021-06-15 21:56:26'),
(5, 'doc', 'doc.png', '2021-06-15 21:56:38', '2021-06-15 21:56:38'),
(6, 'docx', 'docx.png', '2021-06-15 21:56:51', '2021-06-15 21:56:51'),
(7, 'gif', 'gif.png', '2021-06-15 21:57:00', '2021-06-15 21:57:00'),
(8, 'jpeg', 'jpeg.png', '2021-06-15 21:57:15', '2021-06-15 21:57:15'),
(9, 'm4a', 'm4a.png', '2021-06-15 21:58:01', '2021-06-15 21:58:01'),
(10, 'm4v', 'm4v.png', '2021-06-15 21:58:09', '2021-06-15 21:58:09'),
(11, 'mp3', 'mp3.png', '2021-06-15 21:58:19', '2021-06-15 21:58:19'),
(12, 'mp4', 'mp4.png', '2021-06-15 21:58:26', '2021-06-15 21:58:26'),
(13, 'pdf', 'pdf.png', '2021-06-15 21:58:33', '2021-06-15 21:58:33'),
(14, 'rar', 'rar.png', '2021-06-15 21:58:41', '2021-06-15 21:58:41'),
(15, 'txt', 'txt.png', '2021-06-15 21:58:50', '2021-06-15 21:58:50'),
(16, 'wav', 'wav.png', '2021-06-15 21:58:57', '2021-06-15 21:58:57'),
(17, 'wmv', 'wmv.png', '2021-06-15 21:59:06', '2021-06-15 21:59:06'),
(18, 'zip', 'zip.png', '2021-06-15 21:59:15', '2021-06-15 21:59:15'),
(19, 'xlsx', 'xlsx.png', '2021-06-15 21:59:24', '2021-06-15 21:59:24'),
(21, 'xlx', 'xlx.png', '2021-06-15 22:06:47', '2021-06-15 22:06:47');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2020_12_30_224009_create_messages_table', 1),
(8, '2021_01_04_210208_create_api_table', 1),
(9, '2021_01_04_220019_create_seo_table', 1),
(10, '2021_01_05_140402_create_pages_table', 1),
(14, '2014_10_12_000000_create_users_table', 2),
(15, '2021_01_03_212731_create_settings_table', 2),
(16, '2021_01_07_222755_create_amazons3_table', 2),
(18, '2021_01_13_121402_create_wasabi_table', 2),
(22, '2021_02_01_193704_create_uploads_table', 4),
(24, '2021_02_18_122507_create_backblaze_table', 5),
(25, '2021_06_15_214634_create_icons_table', 6),
(26, '2021_04_07_193819_create_posts_table', 7),
(27, '2021_04_07_194337_create_categories_table', 7),
(28, '2021_04_09_000247_add_short_description_to_posts_table', 7),
(29, '2021_06_17_163930_create_features_table', 8),
(30, '2021_06_17_204516_create_home_settings_table', 9),
(31, '2021_06_17_214715_add_waiting_time_to_settings_table', 10),
(32, '2021_06_18_171754_add_columns_to_settings_table', 11),
(33, '2021_01_08_014459_create_ads_table', 12),
(34, '2021_06_19_210851_create_reports_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `slug`, `title`, `image`, `content`, `short_description`, `category`, `created_at`, `updated_at`) VALUES
(1, '1623946575-lorem-ipsum-is-simply-dummy-text-of-the-printing-and-typesetting-industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'uiylGI1aBQAaflr.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 1, '2021-06-17 15:16:15', '2021-06-17 15:35:43'),
(2, '1623947159-lorem-ipsum-is-that-it-has-a-more-or-less-normal-distribution-of-letters', 'Lorem Ipsum is that it has a more-or-less normal distribution of letters', 'n4JWQeaLkQAlro1.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout', 1, '2021-06-17 15:25:59', '2021-06-17 15:25:59'),
(3, '1623947196-contrary-to-popular-belief,-lorem-ipsum-is-not-simply-random-text.-it-has-roots-in-a-piece-of-classical', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical', 'SoP1ui2QTikxxUO.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>', 'Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur', 1, '2021-06-17 15:26:36', '2021-06-17 15:26:36'),
(4, '1623947238-there-are-many-variations-of-passages-of-lorem-ipsum-available,-but-the-majority-have-suffered-alteration-in-some-form', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form', 'UYnl1IY4aaOlVmF.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form', 1, '2021-06-17 15:27:18', '2021-06-18 15:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `report_fileId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `report_reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `id` int(11) NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `seo_title`, `seo_description`, `seo_keywords`) VALUES
(1, 'File sharing and storage made easy', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_analytics` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_descritption` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `storage` int(11) NOT NULL DEFAULT 1,
  `max_filesize` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `onetime_uploads` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `waiting_time` int(11) NOT NULL DEFAULT 10,
  `addthis_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disqus_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `logo`, `favicon`, `site_analytics`, `home_heading`, `home_descritption`, `storage`, `max_filesize`, `onetime_uploads`, `created_at`, `updated_at`, `waiting_time`, `addthis_code`, `disqus_url`, `color_1`, `color_2`, `color_3`) VALUES
(1, 'hmong test', 'logo.png', 'favicon.ico', NULL, 'File sharing and storage made easy', 'Upload your Images, documents, music, and video in a single place and access them anywhere and share them everywhere.', 1, '1073741824', '5', '2021-02-01 19:57:00', '2021-10-25 07:31:28', 10, NULL, NULL, '#206bc4', '#0e2866', '#131313');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `main_filename` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` int(11) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `downloads` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` int(11) NOT NULL DEFAULT 2,
  `status` int(11) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `facebook_id`, `permission`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Admin', 'admin@gmail.com', 'default.png', NULL, 1, 1, NULL, '$2y$10$vP9V3Pd5CoxVBKZIxPnbz.Ls86zx1Kpgq2nqtfrljkiS7lzamZzLG', NULL, '2021-10-25 07:31:43', '2021-10-25 07:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `wasabi`
--

CREATE TABLE `wasabi` (
  `id` int(11) NOT NULL,
  `wasabi_access_key_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wasabi_secret_access_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wasabi_default_region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wasabi_bucket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wasabi_root` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wasabi`
--

INSERT INTO `wasabi` (`id`, `wasabi_access_key_id`, `wasabi_secret_access_key`, `wasabi_default_region`, `wasabi_bucket`, `wasabi_root`) VALUES
(1, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uploads_file_id_unique` (`file_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
