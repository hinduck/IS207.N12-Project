-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2022 at 04:56 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'quia ut', 'quia-ut', '2022-11-19 01:29:23', '2022-11-19 01:29:23'),
(2, 'neque neque', 'neque-neque', '2022-11-19 01:29:23', '2022-11-19 01:29:23'),
(3, 'consequatur doloremque', 'consequatur-doloremque', '2022-11-19 01:29:23', '2022-11-19 01:29:23'),
(4, 'sapiente et', 'sapiente-et', '2022-11-19 01:29:23', '2022-11-19 01:29:23'),
(5, 'et qui', 'et-qui', '2022-11-19 01:29:23', '2022-11-19 01:29:23'),
(6, 'quas et', 'quas-et', '2022-11-19 01:29:23', '2022-11-19 01:29:23'),
(7, 'praesentium ut', 'praesentium-ut', '2022-11-19 01:30:51', '2022-11-19 01:30:51'),
(8, 'deserunt autem', 'deserunt-autem', '2022-11-19 01:30:51', '2022-11-19 01:30:51'),
(9, 'magni voluptatibus', 'magni-voluptatibus', '2022-11-19 01:30:51', '2022-11-19 01:30:51'),
(10, 'labore repudiandae', 'labore-repudiandae', '2022-11-19 01:30:51', '2022-11-19 01:30:51'),
(11, 'qui voluptas', 'qui-voluptas', '2022-11-19 01:30:51', '2022-11-19 01:30:51'),
(12, 'nulla est', 'nulla-est', '2022-11-19 01:30:51', '2022-11-19 01:30:51'),
(13, 'minus eos', 'minus-eos', '2022-11-19 01:32:31', '2022-11-19 01:32:31'),
(14, 'pariatur laborum', 'pariatur-laborum', '2022-11-19 01:32:31', '2022-11-19 01:32:31'),
(15, 'aut sit', 'aut-sit', '2022-11-19 01:32:31', '2022-11-19 01:32:31'),
(16, 'reiciendis et', 'reiciendis-et', '2022-11-19 01:32:31', '2022-11-19 01:32:31'),
(17, 'vel reiciendis', 'vel-reiciendis', '2022-11-19 01:32:31', '2022-11-19 01:32:31'),
(18, 'pariatur fuga', 'pariatur-fuga', '2022-11-19 01:32:31', '2022-11-19 01:32:31'),
(19, 'et sed', 'et-sed', '2022-11-19 01:33:26', '2022-11-19 01:33:26'),
(20, 'libero non', 'libero-non', '2022-11-19 01:33:26', '2022-11-19 01:33:26'),
(21, 'minus id', 'minus-id', '2022-11-19 01:33:26', '2022-11-19 01:33:26'),
(22, 'sint aut', 'sint-aut', '2022-11-19 01:33:26', '2022-11-19 01:33:26'),
(23, 'dolorem ullam', 'dolorem-ullam', '2022-11-19 01:33:26', '2022-11-19 01:33:26'),
(24, 'fuga nesciunt', 'fuga-nesciunt', '2022-11-19 01:33:26', '2022-11-19 01:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Hiền Đức', 'ducnguyen06112002@gmail.com', '0937811400', 'hey kid.', '2022-11-25 10:00:11', '2022-11-25 10:00:11');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('fixed','percent') COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(8,2) NOT NULL,
  `cart_value` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expiry_date` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `value`, `cart_value`, `created_at`, `updated_at`, `expiry_date`) VALUES
(1, 'OFF100', 'fixed', '100.00', '1000.00', '2022-11-23 02:52:04', '2022-11-23 04:35:50', '2022-11-24'),
(3, 'OFF20P', 'percent', '20.00', '1200.00', '2022-11-23 02:54:37', '2022-11-23 02:54:37', '2022-11-23'),
(4, 'OFF30P', 'percent', '30.00', '1500.00', '2022-11-23 04:27:29', '2022-11-23 04:32:36', '2022-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_categories`
--

CREATE TABLE `home_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sel_categories` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_products` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_categories`
--

INSERT INTO `home_categories` (`id`, `sel_categories`, `no_of_products`, `created_at`, `updated_at`) VALUES
(1, '1,5,10', 6, '2022-11-21 07:50:54', '2022-11-21 01:05:31');

-- --------------------------------------------------------

--
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_sliders`
--

INSERT INTO `home_sliders` (`id`, `title`, `subtitle`, `price`, `link`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'ALAL', 'AL-AL-AL', '200000', 'http://localhost:8000/shop', '1669037132.jpg', 1, '2022-11-20 23:33:30', '2022-11-21 06:25:32'),
(4, 'Second slide demo', 'Second slide demo subtitle', '200000', 'http://localhost:8000/shop', '1669037083.jpg', 1, '2022-11-20 23:44:52', '2022-11-21 06:24:43');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_11_18_163136_create_sessions_table', 1),
(7, '2022_11_19_014445_create_categories_table', 2),
(8, '2022_11_19_080641_create_products_table', 2),
(9, '2022_11_21_040718_create_home_sliders_table', 3),
(10, '2022_11_21_074609_create_home_categories_table', 4),
(11, '2022_11_21_140406_create_sales_table', 5),
(12, '2022_11_23_012037_create_coupons_table', 6),
(13, '2022_11_23_104223_add_expiry_date_to_coupons_table', 7),
(14, '2022_11_23_113759_create_orders_table', 8),
(15, '2022_11_23_113814_create_order_items_table', 8),
(16, '2022_11_23_113833_create_shippings_table', 8),
(17, '2022_11_23_113845_create_transactions_table', 8),
(18, '2022_11_25_023746_add_delivered_canceled_date_to_orders_table', 9),
(19, '2022_11_25_144511_create_reviews_table', 10),
(20, '2022_11_25_145450_add_rstatus_to_order_items_table', 10),
(21, '2022_11_25_163130_create_contacts_table', 11),
(22, '2022_11_25_170600_create_settings_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ordered','delivered','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ordered',
  `is_shipping_different` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivered_date` date DEFAULT NULL,
  `canceled_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `subtotal`, `discount`, `tax`, `total`, `first_name`, `last_name`, `mobile`, `email`, `line1`, `line2`, `city`, `province`, `country`, `zip_code`, `status`, `is_shipping_different`, `created_at`, `updated_at`, `delivered_date`, `canceled_date`) VALUES
(3, 2, '490.00', '0.00', '102.90', '592.90', 'Duc', 'Nguyen', '0937811400', '20520450@gm.uit.edu.vn', 'test1', 'test2', 'Ho Chi Minh City', '12', 'Vietnam', '70000', 'canceled', 1, '2022-11-23 21:35:43', '2022-11-24 22:43:02', NULL, '2022-11-25'),
(13, 2, '425.00', '0.00', '89.25', '514.25', 'Duc', 'Nguyen', '0931222333', 'ducnh.hindu@gmail.com', 'test1', 'test2', 'Ho Chi Minh City', '12', 'Vietnam', '70050', 'delivered', 0, '2022-11-24 08:58:13', '2022-11-24 22:42:15', '2022-11-25', NULL),
(14, 2, '473.00', '0.00', '99.33', '572.33', 'Đức', 'Nguyễn', '0931222333', 'ducnh.hindu@gmail.com', 'demo1', 'demo2', 'Ho Chi Minh City', '12', 'Vietnam', '70000', 'canceled', 0, '2022-11-25 07:40:02', '2022-11-25 07:40:33', NULL, '2022-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rstatus` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `price`, `quantity`, `created_at`, `updated_at`, `rstatus`) VALUES
(3, 1, 3, '490.00', 1, '2022-11-23 21:35:43', '2022-11-23 21:35:43', 0),
(13, 2, 13, '425.00', 1, '2022-11-24 08:58:13', '2022-11-25 08:42:38', 1),
(14, 5, 14, '473.00', 1, '2022-11-25 07:40:02', '2022-11-25 07:40:02', 0);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `regular_price` decimal(8,2) DEFAULT NULL,
  `sale_price` decimal(8,2) DEFAULT NULL,
  `SKU` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_status` enum('in_stock','out_stock') COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 10,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `short_description`, `description`, `regular_price`, `sale_price`, `SKU`, `stock_status`, `featured`, `quantity`, `image`, `images`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'molestiae nam', 'molestiae-nam', 'In maiores nobis ipsum ducimus esse voluptatem repellat. Rerum fuga quis in quae saepe corporis deserunt. Et est eveniet quasi.', 'Magni sunt ea pariatur officiis voluptatem blanditiis possimus. Ut quas illo ab sunt id. Velit maxime quod dolor rerum ut inventore neque. Non qui nihil nobis neque libero amet. Sed nostrum at quis et dolorum. Quos enim vero fugit officiis at. Sint adipisci autem est eveniet. Totam ab veniam ab a. Occaecati explicabo nobis alias odit. Vel et quam numquam consequatur corporis odio. Officia alias corrupti exercitationem dolores.', '490.00', '430.00', 'DIGI135', 'in_stock', 0, 163, 'digital_1.jpg', NULL, 3, '2022-11-19 01:33:26', '2022-11-22 00:32:17'),
(2, 'mollitia optio', 'mollitia-optio', 'Quia aut quia quia voluptatem. Commodi quia modi facere qui ut necessitatibus ullam.', 'Ab molestiae libero id iusto sequi doloremque. Aliquam ullam ipsum aut quam illo veritatis. Et ut non aspernatur ut voluptates. Deserunt consequatur id soluta ullam et non officiis. Fuga distinctio repudiandae nihil voluptas. Incidunt voluptatibus delectus quo ut libero omnis eius. Voluptatum minima iure ut molestiae recusandae consequatur eos. Corporis at atque eum dolor qui maxime et. Voluptas aut ipsum maxime est. Dolore tempora est minima.', '425.00', '400.00', 'DIGI416', 'in_stock', 0, 187, 'digital_13.jpg', NULL, 5, '2022-11-19 01:33:26', '2022-11-22 00:32:34'),
(3, 'quo similique', 'quo-similique', 'Est ut architecto accusantium qui iusto. Sed ducimus amet et. Suscipit eos quis ut iure consequatur fugiat ducimus.', 'Officia error id eius nostrum et dolorum magnam. Eius nobis voluptatem consequatur vel in labore eaque. Consequatur qui aut cupiditate eos ex unde exercitationem. Aperiam quia cupiditate numquam ipsum. Rerum praesentium sed sapiente nostrum. Praesentium suscipit est omnis nobis voluptatem atque quis. Nesciunt recusandae voluptas delectus veniam. A nisi quae corrupti qui.', '94.00', '89.00', 'DIGI400', 'in_stock', 0, 106, 'digital_22.jpg', NULL, 2, '2022-11-19 01:33:26', '2022-11-22 00:34:05'),
(4, 'aut inventore', 'aut-inventore', 'Corporis fugit explicabo et consequuntur. Velit sunt repudiandae excepturi voluptas velit saepe labore culpa. Facilis iusto numquam minima iusto alias corrupti quam quas.', 'Labore voluptates sed nesciunt nam distinctio maxime. Distinctio provident vero natus distinctio quo qui fugiat. Aut dolores mollitia cum et dignissimos. Optio deleniti hic ut repellendus. Qui vero doloribus dolores assumenda voluptatum explicabo rem officiis. Ea sequi qui voluptatum. Sint vel qui repudiandae culpa. Autem sit esse dolor provident fugit molestias. Quidem qui odio labore eaque voluptatem ullam vero.', '103.00', NULL, 'DIGI389', 'in_stock', 0, 131, 'digital_18.jpg', NULL, 1, '2022-11-19 01:33:26', '2022-11-19 01:33:26'),
(5, 'consequatur similique', 'consequatur-similique', 'Praesentium et accusamus ex ducimus dicta temporibus reiciendis adipisci. Ullam vitae et molestias aut incidunt modi nam. Voluptates tenetur nostrum assumenda at alias.', 'Praesentium assumenda aut qui et maxime. Temporibus itaque non quasi id sapiente dolor rem. Laudantium voluptate commodi eos reprehenderit repellendus. Porro fugiat et tempore repudiandae et. Doloribus ipsum necessitatibus corrupti sint pariatur. Corporis magni et et vitae repellat et est. Quo officia temporibus accusantium consequatur aperiam. Debitis animi hic similique accusamus facilis est.', '473.00', NULL, 'DIGI306', 'in_stock', 0, 167, 'digital_8.jpg', NULL, 2, '2022-11-19 01:33:26', '2022-11-19 01:33:26'),
(6, 'aut quia', 'aut-quia', 'Est esse odit fugiat nulla. Sint occaecati vel illo ipsum. Ipsum pariatur enim et velit ipsa architecto.', 'Temporibus nostrum dolorum officiis. Eaque qui at sit odit nobis velit. Et quia ipsam aliquid enim quisquam. Rerum sit consequatur quia culpa laboriosam dolorem quibusdam. Repellendus asperiores molestias beatae cumque illo. Iusto quia officia est voluptatem dicta et nobis. Et non magni odio voluptas iste. Doloribus quia sunt quas voluptas. Ea expedita qui velit sunt vel quasi. Officia perferendis omnis soluta reiciendis veritatis.', '387.00', NULL, 'DIGI131', 'in_stock', 0, 143, 'digital_3.jpg', NULL, 5, '2022-11-19 01:33:26', '2022-11-19 01:33:26'),
(7, 'architecto est', 'architecto-est', 'Quis iusto eaque sint voluptatem laboriosam. Excepturi illo id quia aut. Inventore expedita earum fugiat officia rerum est voluptas.', 'Pariatur dolores pariatur ducimus dolor. Totam impedit quod et voluptatem corporis. Ea et non odio qui qui. Ea et molestias excepturi. Iusto quia eum reprehenderit deserunt quod nesciunt sequi. Culpa sint quas temporibus quis voluptas. Nihil aliquid nihil at et animi et. Eveniet sit quidem dolorum. Eum doloribus molestias aut sequi. Deserunt necessitatibus aut id doloremque sed eos. Nam ut sint sunt qui veniam.', '396.00', NULL, 'DIGI139', 'in_stock', 0, 168, 'digital_7.jpg', NULL, 5, '2022-11-19 01:33:26', '2022-11-19 01:33:26'),
(8, 'nihil et', 'nihil-et', 'Veritatis rem est sed. Accusantium qui sint sunt blanditiis magni ab. Fugiat fuga totam esse et molestiae corrupti sequi. Facere nisi veritatis ut fuga commodi.', 'In sed soluta et aliquam. Totam quia itaque tempore nam. Est est similique omnis ipsam quae quis dolorem. Consequatur blanditiis rerum nostrum aut dolore quia. Rerum ratione aut nostrum. Distinctio asperiores id esse ea qui accusantium modi. Quis odio voluptatem qui. Dolor error totam impedit aspernatur. Autem voluptatem et eos commodi sit consequatur. Amet voluptas qui nesciunt at laborum at possimus. Tempore adipisci quae non voluptatem nihil dolor.', '403.00', NULL, 'DIGI408', 'in_stock', 0, 193, 'digital_9.jpg', NULL, 4, '2022-11-19 01:33:26', '2022-11-19 01:33:26'),
(9, 'rem odio', 'rem-odio', 'Necessitatibus eum in suscipit repudiandae. Consequatur consectetur fuga aspernatur qui et minima iure voluptas. Ex fuga nostrum fugiat commodi consequatur consequatur.', 'Dolorem id a asperiores reiciendis error. Eos laborum dolor natus sunt eos quia. Inventore rerum non tempora dolor deleniti iste tempora. Qui rem nemo dolorem aut est sit est. Hic tenetur quis et ut eaque cumque. A ut accusantium temporibus velit harum. Et magni labore consequatur maxime voluptatem perspiciatis officia commodi. Possimus at vero illo id rerum.', '160.00', NULL, 'DIGI489', 'in_stock', 0, 161, 'digital_16.jpg', NULL, 3, '2022-11-19 01:33:26', '2022-11-19 01:33:26'),
(10, 'tempore error', 'tempore-error', 'Qui iusto sapiente aut alias. Sint culpa ipsam est enim minima.', 'Provident quo est incidunt non architecto. Explicabo velit beatae rem voluptatem corporis. Sapiente quia veniam omnis autem ea. Ut cum quia inventore. Recusandae fuga aliquid consectetur consectetur officia nesciunt. Perspiciatis sit modi non et. Sit doloremque omnis non tenetur quas quia. Ex assumenda sed distinctio nemo. Cupiditate ex aspernatur distinctio aut. Inventore ab molestiae eaque in omnis. Earum totam laudantium non et.', '440.00', NULL, 'DIGI455', 'in_stock', 0, 122, 'digital_20.jpg', NULL, 2, '2022-11-19 01:33:26', '2022-11-19 01:33:26'),
(11, 'omnis a', 'omnis-a', 'At ipsa distinctio voluptatem optio. Ut optio ipsam aperiam eaque voluptatem soluta. Non voluptates mollitia et odio consequatur. Consequatur expedita deserunt aliquam quos nisi sit fugiat.', 'Molestiae dolorem architecto suscipit et voluptatibus. Vel perspiciatis voluptate est fugiat soluta saepe quo consequatur. Magnam similique doloremque dolore est. Ea debitis voluptatibus cupiditate veritatis non sit culpa. Maxime recusandae hic aliquam nihil. Dolores velit voluptatibus aliquid alias neque. Voluptatum ut iure quia quod hic.', '466.00', NULL, 'DIGI281', 'in_stock', 0, 122, 'digital_17.jpg', NULL, 3, '2022-11-19 01:33:26', '2022-11-19 01:33:26'),
(12, 'cupiditate porro', 'cupiditate-porro', 'Placeat quaerat eius magnam ex neque. Quisquam qui nemo earum totam non. Eaque explicabo dolorem nisi. Consequatur commodi voluptatum quia voluptas voluptates sit.', 'Qui corrupti voluptatem aut est. Soluta saepe commodi explicabo inventore eaque. Mollitia unde sit sapiente ipsam vel aperiam. Quod distinctio assumenda enim cumque ipsa. Quis minus ducimus perspiciatis ullam sed. Deleniti voluptas mollitia possimus cum voluptas et. Odio cumque ut autem id delectus qui. Atque quos tempore optio sed ex molestiae eaque. Ducimus voluptas officia temporibus earum qui similique. Itaque doloribus minus ad harum est et ullam. Dolores numquam et dolorum omnis.', '340.00', NULL, 'DIGI235', 'in_stock', 0, 130, 'digital_4.jpg', NULL, 3, '2022-11-19 01:33:26', '2022-11-19 01:33:26'),
(13, 'atque dolorem', 'atque-dolorem', 'Voluptas omnis voluptas qui earum incidunt ut. Qui rerum qui delectus maxime nihil.', 'Et rerum exercitationem placeat veniam est at voluptatibus. Placeat et magnam aut sapiente aliquid eum reiciendis. Incidunt accusamus enim sint laudantium. Sint necessitatibus doloremque aut veniam laborum. Mollitia praesentium sint natus dolorem. Qui quaerat ipsam quidem eum et. Mollitia consequatur a illo qui. Quia minima sequi fugit similique aut quod magni. Sed ipsa aut dignissimos modi at. Nostrum animi quis hic et maxime repellendus minus.', '86.00', NULL, 'DIGI313', 'in_stock', 0, 168, 'digital_10.jpg', NULL, 5, '2022-11-19 01:33:26', '2022-11-19 01:33:26'),
(14, 'distinctio numquam', 'distinctio-numquam', 'Fugit non veritatis est magnam autem. Reprehenderit amet consectetur repellat ut sapiente doloribus pariatur qui. Molestiae quis error et non. Ex et qui dolor animi laborum fugiat quas.', 'Distinctio nam porro voluptas ad vel. Atque consequatur quos accusantium perspiciatis eum. Ut dolor consequatur animi recusandae. Facilis quasi magni consequatur enim suscipit dolorem. Sint adipisci sit alias minima est magni tenetur. Voluptas nisi omnis aperiam sunt natus. Commodi odit deserunt sed. Est fugiat ducimus illo animi expedita. Velit similique enim tempore atque provident cum debitis.', '400.00', NULL, 'DIGI314', 'in_stock', 0, 122, 'digital_5.jpg', NULL, 2, '2022-11-19 01:33:26', '2022-11-19 01:33:26'),
(15, 'voluptates maxime', 'voluptates-maxime', 'Cumque sunt sapiente ut numquam omnis delectus aut. Dolores doloremque ab quidem et. Incidunt nesciunt quae eos sunt et quod. Enim voluptatibus consequatur eaque fugiat quo.', 'Vel incidunt sapiente quidem. Ut eum quis harum a amet sit. Suscipit est ullam repellendus iste possimus nemo ex. Officiis molestias iure doloribus reiciendis. Qui labore architecto qui id. Quis libero praesentium commodi voluptatem maxime. Nostrum qui repudiandae non ut et facilis error nulla. Dolores consequatur rerum aut in.', '180.00', NULL, 'DIGI456', 'in_stock', 0, 199, 'digital_12.jpg', NULL, 1, '2022-11-19 01:33:26', '2022-11-19 01:33:26'),
(16, 'sequi enim', 'sequi-enim', 'Sunt et commodi dolores tempore expedita vel. Enim id ratione voluptatem nemo eaque corporis et. Quisquam nemo dolorum sint provident. Ut magnam veritatis labore voluptas.', 'Tempore molestiae itaque beatae qui et at esse atque. Aperiam nobis eum quae aut excepturi fugit non. Corporis autem a similique magni eum voluptate nihil. Officiis alias architecto quam eum. Dicta voluptate et fugiat quia necessitatibus sunt dignissimos. Tempora dolores reprehenderit rerum id consectetur voluptatem. Temporibus ex saepe deleniti tenetur soluta. Praesentium praesentium est enim quia saepe officiis aliquid aut.', '278.00', NULL, 'DIGI273', 'in_stock', 0, 169, 'digital_2.jpg', NULL, 5, '2022-11-19 01:33:26', '2022-11-19 01:33:26'),
(17, 'impedit ut', 'impedit-ut', 'Aut soluta ducimus atque ex atque debitis molestias. Ex distinctio quibusdam fugit blanditiis sed deleniti. Qui eius minus sed perspiciatis deserunt enim ut. Soluta quia quis fuga numquam vero.', 'Velit corrupti recusandae non quis ipsum. Laboriosam ullam eum ea nesciunt dolore. Quis sunt omnis voluptas quos molestiae ab voluptatem. Maiores non qui ut et quo soluta. Voluptatem quia quam explicabo blanditiis iure dolor voluptate et. Nulla eos aut occaecati expedita possimus voluptatem dolor eos.', '266.00', '230.00', 'DIGI189', 'in_stock', 0, 163, 'digital_14.jpg', NULL, 5, '2022-11-19 01:33:26', '2022-11-22 00:33:00'),
(18, 'eos beatae', 'eos-beatae', 'Hic nemo quaerat qui quia. Unde facere ipsum aliquid rem. Tempora et occaecati perferendis id est. Odio incidunt beatae quis illum delectus.', 'Necessitatibus rem incidunt ducimus et omnis. Voluptatibus et numquam nisi unde delectus placeat. Consectetur doloribus architecto iure omnis occaecati optio. Sint dolore et harum. Adipisci tenetur quisquam quia odit voluptatem corporis repellat. Quam velit velit aperiam. Cum est maiores unde eligendi excepturi voluptatum tempore. Labore quos non ut beatae sed architecto. Et in ab ea quis est veniam nostrum.', '372.00', NULL, 'DIGI262', 'in_stock', 0, 106, 'digital_15.jpg', NULL, 5, '2022-11-19 01:33:26', '2022-11-19 01:33:26'),
(19, 'accusamus aut', 'accusamus-aut', 'Et omnis molestiae dolores nihil quos mollitia veniam. Qui magnam odit quos assumenda blanditiis est. Necessitatibus ut eum quis sapiente libero. Repudiandae omnis enim minima quis ut impedit enim.', 'Et iste et ipsa eaque. Exercitationem quibusdam molestias optio dicta repellat vero et. Excepturi iusto exercitationem magni vitae eum accusantium atque. Iste non sunt numquam officiis nemo pariatur et. Architecto tenetur facilis repellendus. Id non odio recusandae labore error nisi. Distinctio quod nihil occaecati sequi vel delectus. Architecto voluptatem consequuntur laborum nostrum aut deleniti doloribus. Commodi mollitia exercitationem voluptas voluptate ut.', '333.00', '299.00', 'DIGI297', 'in_stock', 0, 111, 'digital_6.jpg', NULL, 3, '2022-11-19 01:33:26', '2022-11-22 00:33:20'),
(20, 'non itaque', 'non-itaque', 'Tenetur molestias reiciendis incidunt ut et id. Autem veritatis sequi et ad aliquam in. Omnis alias tempore repellat omnis ipsam deleniti velit sunt.', 'Similique at et eos reprehenderit aliquid quis amet ea. Ullam minima consequatur eligendi officiis. Cupiditate unde earum quia ducimus est voluptatem eum. Possimus explicabo sit quo porro deleniti. Nisi aut possimus eos. Voluptatem voluptas molestias rerum ut unde. Eos voluptate harum architecto soluta aliquid. Ut vitae temporibus porro nesciunt. Velit sed praesentium et distinctio harum sint reprehenderit. Commodi quam alias ea accusamus ut rerum. Expedita ipsa quo vel.', '411.00', NULL, 'DIGI282', 'in_stock', 0, 149, 'digital_19.jpg', NULL, 3, '2022-11-19 01:33:26', '2022-11-19 01:33:26'),
(21, 'a omnis', 'a-omnis', 'Soluta consequuntur labore aperiam qui sed. Aliquid voluptate dolor porro nemo itaque omnis illum. Et consectetur qui velit excepturi veritatis animi esse.', 'Omnis earum alias non tempore delectus delectus. Iste qui quod ea aut possimus et pariatur omnis. Enim et vel soluta tenetur quo pariatur provident. Consequatur quod minima vel voluptas dolorem ut mollitia quo. Quis alias quia esse consequuntur. Quia earum ab voluptatem ut est. Labore iste at qui eum distinctio qui dolor. Eius nam veniam natus non perspiciatis. Officia ut et non reiciendis deleniti non est unde. Soluta error voluptas suscipit officiis. Ipsam id quia animi eius est.', '310.00', NULL, 'DIGI364', 'in_stock', 0, 115, 'digital_21.jpg', NULL, 3, '2022-11-19 01:33:26', '2022-11-19 01:33:26'),
(22, 'corrupti fugiat', 'corrupti-fugiat', 'Facere nobis voluptatum rerum nesciunt. Omnis ut ut magni non dolorem in. Doloremque sint quod iusto.', 'Dolores velit vel dolorum. Vitae consequatur omnis saepe mollitia nobis. Non ut qui quod ipsum ea dolores. Reprehenderit dolores et id assumenda et nisi. Vitae dolor fugit quaerat perspiciatis accusamus. Aspernatur quis officiis animi ad. Autem dolorem nesciunt est eaque culpa. Facilis quod voluptatem deleniti. Aut quis est molestias atque sit porro. Quisquam qui et quia numquam ut eligendi cumque. Sed id aut in quibusdam occaecati aut.', '282.00', NULL, 'DIGI198', 'in_stock', 0, 135, 'digital_11.jpg', NULL, 3, '2022-11-19 01:33:26', '2022-11-19 01:33:26'),
(24, 'New test product 1', 'new-test-product-1', '<p><strong>New test product 1&nbsp;</strong>short description</p>', '<p><strong>New test product 1</strong>&nbsp;description</p>', '555.00', '650.00', 'DIGI434', 'in_stock', 0, 11, '1669542685.jpg', ',16695426850.jpg,16695426851.jpg', 5, '2022-11-27 02:51:25', '2022-11-27 02:51:25');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `rating`, `comment`, `order_item_id`, `created_at`, `updated_at`) VALUES
(1, 4, 'Nice products.', 13, '2022-11-25 08:42:38', '2022-11-25 08:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `sale_date`, `status`, `created_at`, `updated_at`) VALUES
(1, '2022-11-27 12:00:00', 1, NULL, '2022-11-22 01:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4IpFO9j2STj4xXZibPOgEcD2AsvhmPbuy8NQXQGY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.56', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVjBodVE2NG9CMkY2NVVsZVNoQU1DTVl2OXhXdnFYaEZkcllySkVCNCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1669552258),
('RxeUviQ8DNqDNppgFD4ysfJO9CDmhyBef8U9u5zz', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.56', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieVJvdWp1QUtCRmdvclB1VUl0d296VVZyTDZCbkJrbk1TWHg2NmxwRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9mb3Jnb3QtcGFzc3dvcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1669549224),
('SScxye65ihjbS3kX8rz33YzXJQZHgEeBxsz908N7', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.56', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiajdLaW9ia3pYNFE1SnBYWjN5NExhTVY4TEZ0VGVQTFVUMVFoemM1cyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fX0=', 1669544721),
('YJbsGxsn0iArU0wcN5TpdSD9z8ZFsSh94wwJJrCm', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.56', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiTXdMNlF4dHVUTk5Ca2c3dWplcHpmS3I5WUxrVzFHaHhOaUNPT0xoQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0L25ldy10ZXN0LXByb2R1Y3QtMSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJjYXJ0IjthOjE6e3M6NDoiY2FydCI7TzoyOToiSWxsdW1pbmF0ZVxTdXBwb3J0XENvbGxlY3Rpb24iOjI6e3M6ODoiACoAaXRlbXMiO2E6MTp7czozMjoiZWZiMjZlMmM2YWI2YmQ0ZDEzMjMyODg5MjM1MjJkNGUiO086MzI6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtIjo5OntzOjU6InJvd0lkIjtzOjMyOiJlZmIyNmUyYzZhYjZiZDRkMTMyMzI4ODkyMzUyMmQ0ZSI7czoyOiJpZCI7aTo0O3M6MzoicXR5IjtpOjE7czo0OiJuYW1lIjtzOjEzOiJhdXQgaW52ZW50b3JlIjtzOjU6InByaWNlIjtkOjEwMztzOjc6Im9wdGlvbnMiO086Mzk6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtT3B0aW9ucyI6Mjp7czo4OiIAKgBpdGVtcyI7YTowOnt9czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO31zOjQ5OiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AYXNzb2NpYXRlZE1vZGVsIjtzOjE4OiJBcHBcTW9kZWxzXFByb2R1Y3QiO3M6NDE6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQB0YXhSYXRlIjtpOjIxO3M6NDE6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBpc1NhdmVkIjtiOjA7fX1zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fX1zOjg6ImNoZWNrb3V0IjthOjQ6e3M6ODoiZGlzY291bnQiO2k6MDtzOjg6InN1YnRvdGFsIjtzOjY6IjEwMy4wMCI7czozOiJ0YXgiO3M6NToiMjEuNjMiO3M6NToidG90YWwiO3M6NjoiMTI0LjYzIjt9fQ==', 1669564312);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinterest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `phone`, `phone2`, `address`, `map`, `twitter`, `facebook`, `pinterest`, `instagram`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'ducnh.hindu@gmail.com', '0937811400', '0715619067', 'Trường Đại học Công nghệ Thông tin - ĐHQG TP.HCM', 'https://www.google.com/maps/brZ9YrGAWL4gfWQd7', '#', '#', '#', '#', '#', NULL, '2022-11-26 05:51:15');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `order_id`, `first_name`, `last_name`, `email`, `mobile`, `line1`, `line2`, `city`, `province`, `country`, `zip_code`, `created_at`, `updated_at`) VALUES
(3, 3, 'Duc', 'Nguyen', 'ducnh.hindu@gmail.com', '0931222333', 'demo1', 'demo2', 'Ho Chi Minh City', '12', 'Vietnam', '70050', '2022-11-23 21:35:43', '2022-11-23 21:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `mode` enum('cod','card','paypal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','declined','refunded') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `order_id`, `mode`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'cod', 'pending', '2022-11-23 21:35:43', '2022-11-23 21:35:43'),
(2, 2, 13, 'card', 'approved', '2022-11-24 08:58:17', '2022-11-24 08:58:17'),
(3, 2, 14, 'card', 'approved', '2022-11-25 07:40:05', '2022-11-25 07:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USR' COMMENT 'ADM for Admin and USR for User or Customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `utype`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$iXSztOs6B7/pwRNRZBLRRupwR8nPlGPP7p7/Euj2H2eILgn.Fsy..', NULL, NULL, NULL, NULL, NULL, NULL, 'ADM', '2022-11-18 09:48:20', '2022-11-18 09:48:20'),
(2, 'User', 'user@user.com', NULL, '$2y$10$ouL.E/kSIkbDOQXJE/nfo.LF7NV4kojh0wsqovBR9OUlvbsAmwike', NULL, NULL, NULL, NULL, NULL, NULL, 'USR', '2022-11-18 09:48:54', '2022-11-25 09:26:47'),
(4, 'Duc Nguyen', '20520450@gm.uit.edu.vn', NULL, '$2y$10$KQlk2jAZ5VWdAJMGbTr6eebQS/5XUwpCK2ktQlt/u7n.OJFbAMjIK', NULL, NULL, NULL, 'd7Dz0QHUN29PgUcauFCkykhcP9fCsa5r6zGFnIpERPAaPXhCcSpCJ7kSAaid', NULL, NULL, 'USR', '2022-11-27 05:14:22', '2022-11-27 05:30:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `home_categories`
--
ALTER TABLE `home_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_sliders`
--
ALTER TABLE `home_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_order_item_id_foreign` (`order_item_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shippings_order_id_foreign` (`order_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_order_id_foreign` (`order_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_categories`
--
ALTER TABLE `home_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_order_item_id_foreign` FOREIGN KEY (`order_item_id`) REFERENCES `order_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
