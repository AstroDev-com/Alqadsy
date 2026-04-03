-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03 أبريل 2026 الساعة 15:52
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.0.30


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u746187910_alqadsy`
--

-- --------------------------------------------------------

--
-- بنية الجدول `cache`
--

CREATE TABLE `cache` (
  `key` varchar(191) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(191) NOT NULL,
  `owner` varchar(191) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ابواب مداخل', 'ابواب مداخل', 'images/categories/aboab-mdakhl-1775069708.jpg', '1', '2026-04-01 21:55:08', '2026-04-01 21:55:08'),
(2, 'ابواب مداخل اكمبند', 'ابواب مداخل اكمبند', 'images/categories/aboab-mdakhl-akmbnd-1775205659.jpg', '1', '2026-04-03 11:40:59', '2026-04-03 11:40:59'),
(3, 'ابواب مداخل لليزر', 'ابواب مداخل لليزر', 'images/categories/aboab-mdakhl-llyzr-1775205772.jpg', '1', '2026-04-03 11:42:53', '2026-04-03 11:42:53'),
(4, 'بوابات طراز جديد', 'بوابات طراز جديد', 'images/categories/boabat-traz-gdyd-1775205875.jpg', '1', '2026-04-03 11:44:36', '2026-04-03 11:44:36'),
(5, 'سلاليم منوعه', 'سلاليم منوعه', 'images/categories/slalym-mnoaah-1775205988.jpg', '1', '2026-04-03 11:46:28', '2026-04-03 11:46:28'),
(6, 'شبابيك منوعه', 'شبابيك منوعه', 'images/categories/shbabyk-mnoaah-1775206070.jpg', '1', '2026-04-03 11:47:50', '2026-04-03 11:47:50');

-- --------------------------------------------------------

--
-- بنية الجدول `conversations`
--

CREATE TABLE `conversations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `conversation_participants`
--

CREATE TABLE `conversation_participants` (
  `conversation_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED DEFAULT NULL,
  `receiver_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject` varchar(191) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `priority` enum('low','medium','high') NOT NULL DEFAULT 'medium',
  `status` enum('unread','read','archived') NOT NULL DEFAULT 'unread',
  `conversation_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_03_21_000002_create_settings_table', 1),
(5, '2025_04_14_094335_create_permission_tables', 1),
(6, '2025_04_18_054306_create_personal_access_tokens_table', 1),
(7, '2025_04_26_195850_create_notifications_table', 1),
(8, '2025_04_27_053527_create_conversations_table', 1),
(9, '2025_04_27_053528_create_conversation_participants_table', 1),
(10, '2025_04_28_create_messages_table', 1),
(11, '2025_06_25_164352_create_categories_table', 1),
(12, '2025_06_25_173859_create_products_table', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL DEFAULT 'AppModelsUser',
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL DEFAULT 'AppModelsUser',
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'AppModelsUser', 1),
(2, 'AppModelsUser', 2),
(3, 'AppModelsUser', 3);

-- --------------------------------------------------------

--
-- بنية الجدول `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(191) NOT NULL,
  `notifiable_type` varchar(191) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'view_dashboard', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20'),
(2, 'view_statistics', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20'),
(3, 'view_reports', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20'),
(4, 'view_users', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20'),
(5, 'create_users', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20'),
(6, 'edit_users', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20'),
(7, 'delete_users', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20'),
(8, 'restore_users', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20'),
(9, 'assign_user_roles', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20'),
(10, 'view_roles', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20'),
(11, 'create_roles', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20'),
(12, 'edit_roles', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20'),
(13, 'delete_roles', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20'),
(14, 'assign_role_permissions', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20'),
(15, 'view_permissions', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20'),
(16, 'view_categories', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20'),
(17, 'create_categories', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20'),
(18, 'edit_categories', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20'),
(19, 'delete_categories', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20'),
(20, 'view_products', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20'),
(21, 'create_products', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20'),
(22, 'edit_products', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20'),
(23, 'delete_products', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20'),
(24, 'view_settings', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20'),
(25, 'update_settings', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20');

-- --------------------------------------------------------

--
-- بنية الجدول `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT '1',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
(4, 'باب مداخل 1', 'تصميم مودرن فاخر', 'images/products/aboab-mdakhl-1-1775205551.jpg', '1', 1, '2026-04-03 11:39:12', '2026-04-03 11:49:16'),
(5, 'باب مداخل 2', 'لمسة كلاسيكية أنيقة', 'images/products/bab-mdakhl-2-1775206588.jpg', '1', 1, '2026-04-03 11:54:55', '2026-04-03 11:56:28'),
(6, 'باب مداخل 3', 'جودة عالية وإتقان', 'images/products/bab-mdakhl-3-1775206623.jpg', '1', 1, '2026-04-03 11:57:03', '2026-04-03 11:57:03'),
(7, 'باب مداخل 4', 'تفاصيل فنية مميزة', 'images/products/bab-mdakhl-4-1775206665.jpg', '1', 1, '2026-04-03 11:57:45', '2026-04-03 11:57:45'),
(8, 'باب مداخل 5', 'ألوان متناسقة وجذابة', 'images/products/bab-mdakhl-5-1775206686.jpg', '1', 1, '2026-04-03 11:58:06', '2026-04-03 11:58:06'),
(9, 'باب مداخل 6', 'طراز معماري حديث', 'images/products/bab-mdakhl-6-1775206710.jpg', '1', 1, '2026-04-03 11:58:30', '2026-04-03 11:58:30'),
(10, 'باب مداخل 7', 'متانة وقوة في التنفيذ', 'images/products/bab-mdakhl-7-1775206733.jpg', '1', 1, '2026-04-03 11:58:53', '2026-04-03 11:58:53'),
(11, 'باب مداخل 8', 'خامات مختارة بعناية', 'images/products/bab-mdakhl-8-1775206755.jpg', '1', 1, '2026-04-03 11:59:15', '2026-04-03 11:59:15'),
(12, 'باب مداخل 9', 'إبداع في التصميم', 'images/products/bab-mdakhl-9-1775206775.jpg', '1', 1, '2026-04-03 11:59:35', '2026-04-03 11:59:35'),
(13, 'باب مداخل 10', 'فخامة وأناقة ملكية', 'images/products/bab-mdakhl-10-1775206797.jpg', '1', 1, '2026-04-03 11:59:57', '2026-04-03 11:59:57'),
(14, 'باب مداخل 11', 'روعة في التنفيذ', 'images/products/bab-mdakhl-11-1775206820.jpg', '1', 1, '2026-04-03 12:00:20', '2026-04-03 12:00:20'),
(15, 'باب مداخل 12', 'مظهر عصري فريد', 'images/products/bab-mdakhl-12-1775206854.jpg', '1', 1, '2026-04-03 12:00:54', '2026-04-03 12:00:54'),
(16, 'باب مداخل 13', 'ابتكار وتميز دائم', 'images/products/bab-mdakhl-13-1775206935.jpg', '1', 1, '2026-04-03 12:02:15', '2026-04-03 12:02:15'),
(17, 'باب مداخل 14', 'دقة متناهية في التفاصيل', 'images/products/bab-mdakhl-14-1775206972.jpg', '1', 1, '2026-04-03 12:02:53', '2026-04-03 12:02:53'),
(18, 'باب مداخل 15', 'لمسات جمالية رائعة', 'images/products/bab-mdakhl-15-1775206990.jpg', '1', 1, '2026-04-03 12:03:10', '2026-04-03 12:03:10'),
(19, 'باب مداخل 16', 'تصميم هندسي متقن', 'images/products/bab-mdakhl-16-1775207062.jpg', '1', 1, '2026-04-03 12:04:22', '2026-04-03 12:04:22'),
(20, 'باب مداخل 17', 'طراز راقي وفخم', 'images/products/bab-mdakhl-17-1775207135.jpg', '1', 1, '2026-04-03 12:05:35', '2026-04-03 12:05:35'),
(21, 'باب مداخل 18', 'إطلالة عصرية جذابة', 'images/products/bab-mdakhl-18-1775207242.jpg', '1', 1, '2026-04-03 12:07:23', '2026-04-03 12:07:23'),
(22, 'باب مداخل 19', 'جودة استثنائية', 'images/products/bab-mdakhl-19-1775207309.jpg', '1', 1, '2026-04-03 12:08:30', '2026-04-03 12:08:30'),
(23, 'باب مداخل 20', 'فن وتصميم مبتكر', 'images/products/bab-mdakhl-20-1775211390.jpg', '1', 1, '2026-04-03 13:16:31', '2026-04-03 13:16:31'),
(24, 'باب مداخل 21', 'تصميم مودرن فاخر', 'images/products/bab-mdakhl-21-1775211417.jpg', '1', 1, '2026-04-03 13:16:57', '2026-04-03 13:16:57'),
(25, 'باب مداخل 22', 'لمسة كلاسيكية أنيقة', 'images/products/bab-mdakhl-22-1775211441.jpg', '1', 1, '2026-04-03 13:17:21', '2026-04-03 13:17:21'),
(26, 'باب مداخل 23', 'جودة عالية وإتقان', 'images/products/bab-mdakhl-23-1775211470.jpg', '1', 1, '2026-04-03 13:17:50', '2026-04-03 13:17:50'),
(27, 'باب مداخل 24', 'تفاصيل فنية مميزة', 'images/products/bab-mdakhl-24-1775211572.jpg', '1', 1, '2026-04-03 13:19:33', '2026-04-03 13:19:33'),
(28, 'باب مداخل 25', 'ألوان متناسقة وجذابة', 'images/products/bab-mdakhl-25-1775211607.jpg', '1', 1, '2026-04-03 13:20:07', '2026-04-03 13:20:07'),
(29, 'باب مداخل 26', 'طراز معماري حديث', 'images/products/bab-mdakhl-26-1775211735.jpg', '1', 1, '2026-04-03 13:22:16', '2026-04-03 13:22:16'),
(30, 'باب مداخل 27', 'متانة وقوة في التنفيذ', 'images/products/bab-mdakhl-27-1775211852.jpg', '1', 1, '2026-04-03 13:24:13', '2026-04-03 13:24:13'),
(31, 'باب مداخل اكمبند 1', 'تصميم مودرن فاخر', 'images/products/bab-mdakhl-akmbnd-1-1775214320.jpg', '1', 2, '2026-04-03 14:05:21', '2026-04-03 14:22:58'),
(32, 'باب مداخل اكمبند 2', 'لمسة كلاسيكية أنيقة', 'images/products/bab-mdakhl-akmbnd-2-1775214453.jpg', '1', 2, '2026-04-03 14:07:33', '2026-04-03 14:23:07'),
(33, 'باب مداخل اكمبند 3', 'جودة عالية وإتقان', 'images/products/bab-mdakhl-akmbnd-3-1775214539.jpg', '1', 2, '2026-04-03 14:08:59', '2026-04-03 14:23:20'),
(34, 'باب مداخل اكمبند 4', 'تفاصيل فنية مميزة', 'images/products/bab-mdakhl-akmbnd-4-1775214643.jpg', '1', 2, '2026-04-03 14:10:44', '2026-04-03 14:23:29'),
(35, 'باب مداخل اكمبند 5', 'ألوان متناسقة وجذابة', 'images/products/bab-mdakhl-akmbnd-5-1775214742.jpg', '1', 2, '2026-04-03 14:12:22', '2026-04-03 14:23:39'),
(36, 'باب مداخل اكمبند 6', 'طراز معماري حديث', 'images/products/bab-mdakhl-akmbnd-6-1775214883.jpg', '1', 2, '2026-04-03 14:14:43', '2026-04-03 14:23:48'),
(37, 'باب مداخل اكمبند 7', 'متانة وقوة في التنفيذ', 'images/products/bab-mdakhl-akmbnd-7-1775214976.jpg', '1', 2, '2026-04-03 14:16:17', '2026-04-03 14:23:55'),
(38, 'باب مداخل اكمبند 8', 'خامات مختارة بعناية', 'images/products/bab-mdakhl-akmbnd-8-1775215110.jpg', '1', 2, '2026-04-03 14:18:31', '2026-04-03 14:24:04'),
(39, 'باب مداخل اكمبند 9', 'إبداع في التصميم', 'images/products/bab-mdakhl-akmbnd-9-1775215563.jpg', '1', 2, '2026-04-03 14:26:03', '2026-04-03 14:26:03'),
(40, 'باب مداخل اكمبند 10', 'فخامة وأناقة ملكية', 'images/products/bab-mdakhl-akmbnd-10-1775215740.jpg', '1', 2, '2026-04-03 14:29:00', '2026-04-03 14:29:00'),
(41, 'ابواب مداخل 1', 'ابواب مداخل 1', 'images/products/aboab-mdakhl-1-1775224221.jpg', '1', 1, '2026-04-03 13:50:21', '2026-04-03 13:50:21');

-- --------------------------------------------------------

--
-- بنية الجدول `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20'),
(2, 'admin', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20'),
(3, 'user', 'web', 1, '2026-03-30 20:30:20', '2026-03-30 20:30:20');

-- --------------------------------------------------------

--
-- بنية الجدول `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(9, 1),
(10, 1),
(10, 2),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 2);

-- --------------------------------------------------------

--
-- بنية الجدول `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Fk7Z17dTsUaNu9NcaVQlqOVpOLMdDrx2MqlWmmuW', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiS2E3MTVIZlFwZEIwUWhnUWk3U1FyeDlQNFdaSElja2NTQmNTVHhwbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hci9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NjoibG9jYWxlIjtzOjI6ImFyIjtzOjU6InRoZW1lIjtzOjQ6ImRhcmsiO30=', 1775224301);

-- --------------------------------------------------------

--
-- بنية الجدول `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) NOT NULL,
  `value` text DEFAULT NULL,
  `group` varchar(191) NOT NULL DEFAULT 'general',
  `type` varchar(191) NOT NULL DEFAULT 'text',
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `description`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'ورشة القدسي', 'general', 'text', 'اسم الموقع', '2026-03-30 20:30:10', '2026-04-03 12:43:44'),
(2, 'site_description', 'ورشة القدسي', 'general', 'textarea', 'وصف الموقع', '2026-03-30 20:30:10', '2026-04-03 12:43:44'),
(3, 'site_logo', NULL, 'general', 'image', 'شعار الموقع', '2026-03-30 20:30:10', '2026-03-30 20:30:10'),
(4, 'contact_email', 'info@example.com', 'contact', 'email', 'البريد الإلكتروني للتواصل', '2026-03-30 20:30:10', '2026-03-30 20:30:10'),
(5, 'contact_phone', '779121779', 'contact', 'text', 'رقم الهاتف للتواصل', '2026-03-30 20:30:10', '2026-04-03 12:43:44'),
(6, 'facebook_url', 'https://facebook.com', 'social', 'url', 'رابط صفحة الفيسبوك', '2026-03-30 20:30:10', '2026-03-30 20:30:10'),
(7, 'twitter_url', 'https://twitter.com', 'social', 'url', 'رابط حساب تويتر', '2026-03-30 20:30:10', '2026-03-30 20:30:10'),
(8, 'instagram_url', 'https://instagram.com', 'social', 'url', 'رابط حساب انستغرام', '2026-03-30 20:30:10', '2026-03-30 20:30:10'),
(9, 'meta_description', 'مدونة شخصية', 'seo', 'textarea', 'وصف الموقع للمحركات البحثية', '2026-03-30 20:30:10', '2026-03-30 20:30:10'),
(10, 'meta_keywords', 'مدونة, مقالات, أخبار', 'seo', 'text', 'الكلمات المفتاحية للموقع', '2026-03-30 20:30:10', '2026-03-30 20:30:10');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `profile_image` varchar(191) DEFAULT NULL,
  `thumbnail` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT '1',
  `role` varchar(191) DEFAULT NULL,
  `phone_number` varchar(191) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `profile_image`, `thumbnail`, `status`, `role`, `phone_number`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'المدير العام', 'superadmin@gmail.com', NULL, '$2y$12$ph.TAvRUvK/fhgPkRWIkB.CeAQVO0ZEyGs0C0zAZYhdutl.s1jQkq', NULL, NULL, '1', NULL, NULL, NULL, '2026-03-30 20:30:23', '2026-03-30 20:30:23', NULL),
(2, 'المدير', 'admin@gmail.com', NULL, '$2y$12$Dtr9ljNCM0zm5f7dJRGdSeTvqQlP2W9M9hesmzb3HPVJdHSTnEpDa', NULL, NULL, '1', NULL, NULL, NULL, '2026-03-30 20:30:23', '2026-03-30 20:30:23', NULL),
(3, 'المستخدم', 'user@gmail.com', NULL, '$2y$12$54jnIJD0MYnPCubI3juJa.h0PQEaWqzyhStMzkU9/yqnSMCy3krci', NULL, NULL, '1', NULL, NULL, NULL, '2026-03-30 20:30:23', '2026-03-30 20:30:23', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversation_participants`
--
ALTER TABLE `conversation_participants`
  ADD PRIMARY KEY (`conversation_id`,`user_id`),
  ADD KEY `conversation_participants_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_sender_id_foreign` (`sender_id`),
  ADD KEY `messages_receiver_id_foreign` (`receiver_id`),
  ADD KEY `messages_conversation_id_foreign` (`conversation_id`),
  ADD KEY `messages_user_id_foreign` (`user_id`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- قيود الجداول المُلقاة.
--

--
-- قيود الجداول `conversation_participants`
--
ALTER TABLE `conversation_participants`
  ADD CONSTRAINT `conversation_participants_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `conversations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `conversation_participants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `conversations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
