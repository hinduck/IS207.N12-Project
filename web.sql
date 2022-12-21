-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 21, 2022 lúc 06:21 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_attribute_id` bigint(20) UNSIGNED DEFAULT NULL,
  `value` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Menu điểm tâm', 'menu-diem-tam', '2022-12-20 01:18:49', '2022-12-20 01:18:49'),
(2, 'Menu chính', 'menu-chinh', '2022-12-20 01:20:01', '2022-12-20 01:20:01'),
(3, 'Menu đồ uống', 'menu-do-uong', '2022-12-20 01:20:06', '2022-12-20 01:20:06'),
(4, 'Menu ăn vặt', 'menu-an-vat', '2022-12-20 01:20:09', '2022-12-20 01:20:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` enum('fixed','percent') NOT NULL,
  `value` decimal(8,2) NOT NULL,
  `cart_value` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expiry_date` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `home_categories`
--

CREATE TABLE `home_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sel_categories` varchar(255) NOT NULL,
  `no_of_products` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `home_categories`
--

INSERT INTO `home_categories` (`id`, `sel_categories`, `no_of_products`, `created_at`, `updated_at`) VALUES
(1, '1,2,3', 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_11_19_014445_create_categories_table', 1),
(7, '2022_11_19_080641_create_products_table', 1),
(8, '2022_11_21_040718_create_home_sliders_table', 1),
(9, '2022_11_21_074609_create_home_categories_table', 1),
(10, '2022_11_21_140406_create_sales_table', 1),
(11, '2022_11_23_012037_create_coupons_table', 1),
(12, '2022_11_23_104223_add_expiry_date_to_coupons_table', 1),
(13, '2022_11_23_113759_create_orders_table', 1),
(14, '2022_11_23_113814_create_order_items_table', 1),
(15, '2022_11_23_113833_create_shippings_table', 1),
(16, '2022_11_23_113845_create_transactions_table', 1),
(17, '2022_11_25_023746_add_delivered_canceled_date_to_orders_table', 1),
(18, '2022_11_25_144511_create_reviews_table', 1),
(19, '2022_11_25_145450_add_rstatus_to_order_items_table', 1),
(20, '2022_11_25_163130_create_contacts_table', 1),
(21, '2022_11_25_170600_create_settings_table', 1),
(22, '2022_11_27_171434_create_shoppingcart_table', 1),
(23, '2022_11_28_081849_create_subcategories_table', 1),
(24, '2022_11_28_095732_add_subcategory_id_to_products_table', 1),
(25, '2022_11_28_122153_create_profiles_table', 1),
(26, '2022_11_28_165845_create_product_attributes_table', 1),
(27, '2022_11_28_182201_create_attribute_values_table', 1),
(28, '2022_11_29_072451_add_options_to_order_items_table', 1),
(29, '2022_12_07_094410_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `line1` varchar(255) NOT NULL,
  `line2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `status` enum('ordered','delivered','canceled') NOT NULL DEFAULT 'ordered',
  `is_shipping_different` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivered_date` date DEFAULT NULL,
  `canceled_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rstatus` tinyint(1) NOT NULL DEFAULT 0,
  `options` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `regular_price` decimal(8,2) DEFAULT NULL,
  `sale_price` decimal(8,2) DEFAULT NULL,
  `SKU` varchar(255) NOT NULL,
  `stock_status` enum('in_stock','out_stock') NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 10,
  `image` varchar(255) DEFAULT NULL,
  `images` text DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `short_description`, `description`, `regular_price`, `sale_price`, `SKU`, `stock_status`, `featured`, `quantity`, `image`, `images`, `category_id`, `created_at`, `updated_at`, `subcategory_id`) VALUES
(4, 'Cơm Cá Sốt Cà', 'com-ca-sot-ca', '<p><em><strong>C&aacute; sốt c&agrave; chua</strong></em> l&agrave; một m&oacute;n ăn d&acirc;n d&atilde; m&agrave; lại cực kỳ đưa cơm, nhất l&agrave; v&agrave;o những ng&agrave;y m&ugrave;a đ&ocirc;ng hay mưa ẩm v&agrave; cả những ng&agrave;y h&egrave; oi n&oacute;ng. Nước sốt c&agrave; chua k&egrave;m với thịt c&aacute; trộn đều ăn với cơm n&oacute;ng, th&ecirc;m một ch&eacute;n canh rau nhỏ l&agrave; đủ dinh dưỡng cho d&acirc;n văn ph&ograve;ng v&agrave; no dạ với những người lao động ch&acirc;n tay.</p>', '<p>C&aacute; chứa nhiều protein, nhiều loại c&aacute; chứa nhiều omega-3 rất tốt cho tim mạch, cơ thể. C&agrave; chua chứa nhiều vitamin v&agrave; kho&aacute;ng chất. M&oacute;n cơm c&aacute; sốt c&agrave; chua v&igrave; vậy cung cấp rất nhiều chất dinh dưỡng cần thiết.&nbsp;</p>', '39000.00', '34000.00', 'C-C-004', 'in_stock', 0, 24, '1671530465.jpg', ',16715304650.jpg,16715304651.jpg', 2, '2022-12-20 03:01:05', '2022-12-20 03:01:05', 1),
(6, 'Cà phê đen chai 200ml', 'ca-phe-den-chai-200ml', '<p><strong>C&Agrave; PH&Ecirc; ĐEN CHAI 200 ML</strong> - Đậm vị Cafe Việt.</p>', '<p>D&agrave;nh cho những người s&agrave;nh c&agrave; ph&ecirc;, <em><strong>c&agrave; ph&ecirc; đen BaoThu</strong></em> mang vị đắng đậm đ&agrave; truyền thống. Từng hạt c&agrave; ph&ecirc; được chắt lọc kỹ c&agrave;ng từ v&ugrave;ng nguy&ecirc;n liệu cao cấp <strong>Bảo Lộc &ndash; Cầu Đất,</strong> kết hợp với c&aacute;ch pha chế bằng phin thủ c&ocirc;ng, cho ra đời những giọt tinh chất c&agrave; ph&ecirc; hảo hạng đầy tinh tế. Mỗi ngụm c&agrave; ph&ecirc; đăng đắng &ecirc;m &aacute;i mượt m&agrave; chạm v&agrave;o vị gi&aacute;c, k&iacute;ch th&iacute;ch tối đa c&aacute;c gi&aacute;c quan ph&ugrave; hợp để bắt đầu một ng&agrave;y mới tr&agrave;n trề năng lượng.</p>', '28000.00', '25000.00', 'D-C-001', 'in_stock', 1, 50, '1671621491.jpg', ',16716214910.jpg', 3, '2022-12-21 04:18:11', '2022-12-21 04:18:11', 6),
(7, 'Cà phê Cold Brew 200ml', 'ca-phe-cold-brew-200ml', '<p><strong>ORIGINAL COLD BREW COFFEE 200 ML</strong> - Vị cafe thơm nhẹ nh&agrave;ng.</p>', '<p><strong>100% C&agrave; ph&ecirc; Arabica ủ lạnh.</strong> Rất ph&ugrave; hợp cho những người muốn thưởng thức vị c&agrave; ph&ecirc; truyền th&ocirc;ng kh&ocirc;ng lẫn tạp chất.</p>', '34000.00', '29000.00', 'D-C-002', 'in_stock', 0, 30, '1671621628.jpg', ',16716216280.jpg', 3, '2022-12-21 04:20:28', '2022-12-21 04:20:44', 6),
(8, 'MIẾN XÀO THỊT CUA', 'mien-xao-thit-cua', '<p>Thịt cua, miến, nước hầm xương heo, gừng, rau răm, nấm m&egrave;o, trứng g&agrave;, bột thịt g&agrave;, ti&ecirc;u đen, đường c&aacute;t, dầu ăn, h&agrave;nh phi, l&aacute; chuối, ng&ograve; r&iacute;, xương ống heo, củ sắn, h&agrave;nh t&acirc;y, bắp mỹ, c&agrave; rốt, h&agrave;nh t&iacute;m, hoa hồi, quế c&acirc;y.</p>', '<p>Miến x&agrave;o thịt cua trở n&ecirc;n đặc biệt khi từng sợi miến được l&agrave;m thủ c&ocirc;ng từ c&aacute;c vị đầu bếp t&agrave;i ba của BAOTHU Kitchen. Chọn lọc những hạt gạo chất lượng nhất của v&ugrave;ng đồng bằng s&ocirc;ng Hồng v&agrave; đồng bằng s&ocirc;ng Cửu Long, trải qua qu&aacute; tr&igrave;nh xử l&yacute; c&ocirc;ng phu từ ủ gạo, xay nhuyễn, tạo th&agrave;nh sợi nhỏ rồi phơi kh&ocirc; mang đến sợi miến gạo dẻo dai, vị thơm ngon, gi&agrave;u dinh dưỡng.</p>', '57000.00', '50000.00', 'DT-K-001', 'in_stock', 1, 60, '1671639387.jpg', ',16716393870.jpg', 1, '2022-12-21 09:16:27', '2022-12-21 09:17:15', 14),
(9, 'MÌ SOBA CÁ HỒI', 'mi-soba-ca-hoi', '<p>C&aacute; hồi, m&igrave; soba, nước tương, đường c&aacute;t, rượu ngọt &ndash; mirin, giấm gạo, dầu m&egrave;, tỏi l&ocirc;̣t, gừng củ, ti&ecirc;u đen, c&agrave; r&ocirc;́t, h&agrave;nh t&acirc;y, ớt chu&ocirc;ng, cải cầu vồng, cải b&oacute; x&ocirc;i, bắp cải t&iacute;m</p>', '<p>M&igrave; soba c&aacute; hồi tại BAOTHU được biến tấu từ những sợi m&igrave; l&agrave;m từ bột kiều mạch gi&agrave;u dinh dưỡng, biểu trưng cho sự trường thọ trong ẩm thực Nhật Bản. M&oacute;n ăn kết hợp giữa c&aacute; hồi phi l&ecirc; được xử l&yacute; tinh tế gi&uacute;p giữ trọn hương vị ngon ngọt thuần chất xen lẫn vị b&eacute;o mềm hấp dẫn.</p>', '58000.00', '51000.00', 'DT-K-002', 'in_stock', 0, 20, '1671639612.jpg', ',16716396120.jpg,16716396121.jpg', 1, '2022-12-21 09:20:12', '2022-12-21 09:20:12', 14),
(10, 'GỎI TAI HEO HOA CHUỐI', 'goi-tai-heo-hoa-chuoi', '<p>Ba rọi heo, tai heo, bắp chuối, c&agrave; rốt, dưa leo, h&agrave;nh t&acirc;y, ớt sừng, tỏi, rau răm, ng&ograve; r&iacute;, h&uacute;ng c&acirc;y,...</p>', '<p>Sử dụng nguy&ecirc;n liệu chuối t&acirc;y c&ugrave;ng tai heo quen thuộc, c&aacute;c đầu bếp BAOTHU Kitchen tạo n&ecirc;n sự kh&aacute;c biệt bằng phương ph&aacute;p luộc hoa chuối để lọc bỏ hết nhựa, tạo cảm gi&aacute;c dễ chịu v&agrave; an to&agrave;n khi ăn. Kết hợp c&ugrave;ng c&agrave; rốt, dưa leo, h&agrave;nh t&acirc;y, củ kiệu, m&oacute;n gỏi chuối tai heo mang m&agrave;u sắc bắt mắt v&agrave; những n&eacute;t chấm ph&aacute; đặc biệt trong hương vị.</p>', '39000.00', '30000.00', 'DT-K-003', 'in_stock', 1, 120, '1671639712.jpg', ',16716397120.jpg', 1, '2022-12-21 09:21:52', '2022-12-21 09:21:52', 14),
(11, 'PHỞ BÒ TÁI', 'pho-bo-tai', 'Thành phần chính của phở là bánh phở và nước dùng cùng với thịt bò hoặc thịt gà cắt lát mỏng', 'Phở là một món ăn truyền thống của Việt Nam, có nguồn gốc từ Nam Định, Hà Nội và được xem là một trong những món ăn tiêu biểu cho nền ẩm thực Việt Nam', '45000.00', '44999.00', 'DT-N-001', 'in_stock', 0, 1, '1671639785.jpg', ',16716397850.jpg', 1, '2022-12-21 09:23:05', '2022-12-21 09:23:05', 2),
(12, 'PHỞ BÒ NẠM GÂN', 'pho-bo-nam-gan', '<p>Th&agrave;nh phần ch&iacute;nh của phở l&agrave; b&aacute;nh phở v&agrave; nước d&ugrave;ng c&ugrave;ng với thịt b&ograve; hoặc thịt g&agrave; cắt l&aacute;t mỏng</p>', '<p>Phở l&agrave; một m&oacute;n ăn truyền thống của Việt Nam, c&oacute; nguồn gốc từ Nam Định, H&agrave; Nội v&agrave; được xem l&agrave; một trong những m&oacute;n ăn ti&ecirc;u biểu cho nền ẩm thực Việt Nam</p>', '45000.00', '43000.00', 'DK-N-002', 'in_stock', 0, 2, '1671639853.jpg', ',16716398530.jpg', 1, '2022-12-21 09:24:13', '2022-12-21 09:24:13', 2),
(13, 'PHỞ ĐẶC BIỆT', 'pho-dac-biet', 'Thành phần chính của phở là bánh phở và nước dùng cùng với thịt bò hoặc thịt gà cắt lát mỏng', 'Phở là một món ăn truyền thống của Việt Nam, có nguồn gốc từ Nam Định, Hà Nội và được xem là một trong những món ăn tiêu biểu cho nền ẩm thực Việt Nam', '55000.00', '50000.00', 'DK-N-003', 'in_stock', 0, 2, '1671639891.jpg', ',16716398910.jpg', 1, '2022-12-21 09:24:51', '2022-12-21 09:24:51', 2),
(14, 'BÁNH MÌ HEO QUAY', 'banh-mi-heo-quay', '<p>B&aacute;nh m&igrave; được t&ocirc;n vinh l&agrave; một trong những m&oacute;n ăn đường phố ngon nhất v&agrave; l&agrave; m&oacute;n sand-wich ngon nhất tr&ecirc;n thế giới.</p>', '<p>B&aacute;nh m&igrave; l&agrave; một thực phẩm chế biến từ bột m&igrave; từ ngũ cốc được nghiền ra trộn với nước, thường l&agrave; bằng c&aacute;ch nướng. Trong suốt qu&aacute; tr&igrave;nh lịch sử n&oacute; đ&atilde; được phổ biến tr&ecirc;n to&agrave;n thế giới v&agrave; l&agrave; một trong những loại thực phẩm nh&acirc;n tạo l&acirc;u đời nhất, v&agrave; rất quan trọng kể từ l&uacute;c ban đầu của ng&agrave;nh n&ocirc;ng nghiệp</p>', '23000.00', '20000.00', 'DK-B-001', 'in_stock', 1, 10, '1671639978.jpg', ',16716399780.jpg', 1, '2022-12-21 09:26:18', '2022-12-21 09:26:18', 11),
(15, 'BÁNH MÌ BÒ TIÊU CAY', 'banh-mi-bo-tieu-cay', 'Bánh mì được tôn vinh là một trong những món ăn đường phố ngon nhất và là món sand-wich ngon nhất trên thế giới.', 'Bánh mì là một thực phẩm chế biến từ bột mì từ ngũ cốc được nghiền ra trộn với nước, thường là bằng cách nướng. Trong suốt quá trình lịch sử nó đã được phổ biến trên toàn thế giới và là một trong những loại thực phẩm nhân tạo lâu đời nhất, và rất quan trọng kể từ lúc ban đầu của ngành nông nghiệp', '25000.00', '20000.00', 'DK-B-002', 'in_stock', 1, 10, '1671640025.jpg', ',16716400250.jpg', 1, '2022-12-21 09:27:05', '2022-12-21 09:27:05', 11),
(16, 'Cơm Thit Ba Chỉ Rim Sốt Đậu', 'com-thit-ba-chi-rim-sot-dau', '<p>Cơm thịt ba chỉ rim sốt đậu l&agrave; m&oacute;n ăn cực kỳ phổ biến trong bữa ăn h&agrave;ng ng&agrave;y của người d&acirc;n miền Bắc. Thịt lợn ba chỉ thuộc nh&oacute;m thịt đỏ được ti&ecirc;u thụ phổ biến nhất tr&ecirc;n to&agrave;n thế giới v&agrave; đặc biệt nhiều ở Việt Nam. C&oacute; h&agrave;m lượng protein cao, gi&agrave;u vitamin v&agrave; kho&aacute;ng chất, thịt lợn ba chỉ c&oacute; thể l&agrave; một bổ sung tuyệt vời cho một chế độ ăn uống l&agrave;nh mạnh.</p>', '<p>Giống như tất cả c&aacute;c loại thịt, thịt lợn chủ yếu được tạo th&agrave;nh từ protein. H&agrave;m lượng protein của thịt ba chỉ khi nấu ch&iacute;n khoảng 26% trọng lượng tươi. Khi kết hợp c&ugrave;ng đậu phụ th&igrave; h&agrave;m lượng protein của thịt lợn c&oacute; thể cao tới 89% khiến n&oacute; trở th&agrave;nh một trong những nguồn thực phẩm gi&agrave;u protein nhất. N&oacute; chứa tất cả 9 axit amin thiết yếu cần thiết cho sự ph&aacute;t triển v&agrave; duy tr&igrave; cơ thể của bạn.&amp;nbsp;Tr&ecirc;n thực tế, thịt l&agrave; một trong những nguồn cung cấp protein ho&agrave;n chỉnh nhất.&amp;nbsp;V&igrave; l&yacute; do n&agrave;y, ăn thịt lợn c&oacute; thể đặc biệt c&oacute; lợi cho những người tập thể h&igrave;nh, vận động vi&ecirc;n đang hồi phục, những người sau phẫu thuật. &nbsp;Đậu phụ l&agrave; một nguồn cung cấp protein dồi d&agrave;o v&agrave; cũng chứa tất cả 9 loại axit amin thiết yếu. N&oacute; cũng l&agrave; một nguồn thực vật qu&yacute; gi&aacute; của sắt, canxi v&agrave; c&aacute;c kho&aacute;ng chất mangan v&agrave; phốt pho. Ngo&agrave;i ra, trong đậu phụ cũng c&oacute; nhiều magi&ecirc;, đồng, kẽm v&agrave; vitamin B1. L&agrave; một loại thực phẩm tuyệt vời từ g&oacute;c độ dinh dưỡng v&agrave; sức khỏe, đậu phụ được cho l&agrave; cung cấp nhiều lợi &iacute;ch tương tự như đậu n&agrave;nh. Một khẩu phần 100g đậu phụ chứa:</p>\n<ul>\n<li>73 kcal.</li>\n<li>4,2g chất b&eacute;o.</li>\n<li>0,5g chất b&eacute;o b&atilde;o h&ograve;a.</li>\n<li>0,7g carbohydrate.</li>\n<li>8,1g protein.</li>\n</ul>', '58000.00', '50000.00', 'C-C-005', 'in_stock', 0, 29, '1671640318.jpg', ',16716403180.jpg,16716403181.jpg', 2, '2022-12-21 09:31:58', '2022-12-21 09:31:58', 1),
(17, 'CƠM CHIÊN THỊT CUA LÁ CẨM', 'com-chien-thit-cua-la-cam', '<p>Gạo Basmati, trứng g&agrave; (vỏ trứng cuộn), thịt cua, thanh cua, trứng c&aacute; chuồn, gi&aacute; sống, h&agrave;nh l&aacute;, gừng, bắp mỹ, l&aacute; cẩm, hạt n&ecirc;m heo, muối, đường c&aacute;t, dầu ăn, bột m&igrave;, trứng g&agrave;, ớt chu&ocirc;ng đỏ, ớt sừng xanh, ng&ograve; r&iacute;.</p>', '<p>Cơm chiên thịt cua l&aacute; cẩm l&agrave; m&oacute;n ăn đạt điểm tuyệt đối từ h&igrave;nh thức đến hương vị. Sử dụng nguy&ecirc;n liệu gạo Basmati Malika gi&agrave;u dinh dưỡng được nhập khẩu từ Ấn Độ gi&uacute;p hạt cơm lu&ocirc;n tơi xốp, kh&ocirc;ng bị d&iacute;nh. Kết hợp c&ugrave;ng l&aacute; cẩm, một loại thảo dược tốt cho sức khỏe v&agrave; tạo n&ecirc;n m&agrave;u t&iacute;m bắt mắt điểm xuyến với m&agrave;u trắng từ thịt cua tươi ngon v&agrave; m&agrave;u v&agrave;ng hấp dẫn của bắp mỹ. M&oacute;n ăn g&oacute;i cầu kỳ b&ecirc;n trong lớp trứng mỏng gi&uacute;p lưu giữ độ n&oacute;ng v&agrave; vị đậm đ&agrave; tuyệt hảo.</p>', '59000.00', '49000.00', 'C-C-006', 'out_stock', 1, 20, '1671640382.jpg', ',16716403820.jpg', 2, '2022-12-21 09:33:02', '2022-12-21 09:33:02', 1),
(18, 'CƠM CHIÊN HẢI SẢN BAOTHUFOOD', 'com-chien-hai-san-baothufood', 'Gạo basmati, Trứng gà, tôm, thanh cua, trứng cá chuồn, bắp hạt, cà rốt, đậu Hà Lan, hành lá, ớt sừng, tỏi, nghệ, mỡ gà, bột gạo, dầu hào', 'Cơm chiên hải sản TASTY mang đến hương vị đặc sắc khi dùng nguyên liệu chính là gạo Basmati - môt loại gạo Ấn Độ với những công dụng tuyệt vời cho sức khỏe, cộng hưởng vị ngọt tự nhiên của tôm tươi, thanh cua, trứng cua cùng các nguyên liệu và gia vị phong phú. Bên cạnh đó, lớp trứng bao phủ bên ngoài sẽ giúp lưu giữ độ nóng và hương vị món ăn được nguyên vẹn khi đến tay thực khách.', '59000.00', '49000.00', 'C-C-007', 'in_stock', 1, 21, '1671640423.jpg', ',16716404230.jpg', 2, '2022-12-21 09:33:43', '2022-12-21 09:33:43', 1),
(19, 'BA RỌI CHIÊN MẮM NGÒ', 'ba-roi-chien-mam-ngo', 'Thịt ba rọi rút sườn Ba Lan, bột chiên giòn, gạo thái, ngò rí, tỏi củ, sả cây, tắc, ớt sừng, dưa leo, ngò rí, ớt hiểm, thơm gọt, húng quế, húng lủi, lô lô xanh, lô lô tím, dầu ăn, đường cát, tương ớt, nước mắm, giấm gạo', 'Ba rọi chiên mắm ngò là sự sáng tạo được khơi nguồn từ món ba rọi chiên mắm vốn đã quen thuộc trong bữa cơm người Việt, giúp nâng tầm tinh túy ẩm thực dân gian và mang lại trải nghiệm hoàn toàn mới cho thực khách. Bằng cách xử lý tinh tế, miếng thịt ba rọi chiên giòn kết hợp cùng sốt nước mắm thơm thêm chút vị chua thanh nhẹ của tắc tươi, phảng phất mùi ngò rí tạo nên sự cân bằng tuyệt hảo. Món ăn sẽ tuyệt vời hơn khi thưởng thức kèm rau thơm và kim chi hấp dẫn.', '40000.00', '35000.00', 'C-A-001', 'in_stock', 1, 28, '1671640486.jpg', ',16716404860.jpg', 2, '2022-12-21 09:34:46', '2022-12-21 09:35:58', 15),
(20, 'SƯỜN HEO NƯỚNG BBQ TÁO ĐỎ', 'suon-heo-nuong-bbq-tao-do', '<p>Sườn tươi Việt Nam, củ sen, bột chi&ecirc;n gi&ograve;n, gia vị n&oacute;ng Ấn độ - Garam Masala, bột ngũ vị hương, bột ớt Paprika, bột tỏi, bột h&agrave;nh t&acirc;y.</p>', '<p>Sườn heo nướng BBQ t&aacute;o đỏ chinh phục mọi thực kh&aacute;ch với dẻ sườn nướng mềm, mọng nước b&ecirc;n trong kết hợp c&ugrave;ng sốt BBQ trứ danh của phương T&acirc;y v&agrave; t&aacute;o đỏ bao phủ b&ecirc;n ngo&agrave;i. Ch&iacute;nh v&igrave; vậy đ&atilde; tạo n&ecirc;n một m&oacute;n ăn c&oacute; m&agrave;u sắc bắt mắt, hương vị đậm đ&agrave; pha ch&uacute;t chua thanh nhẹ độc đ&aacute;o. C&agrave;ng th&uacute; vị hơn khi m&oacute;n ăn được kết hợp với củ sen chi&ecirc;n gi&ograve;n, x&oacute;c muối rong biển kiểu Nhật mang đến một loại snack đầy mới lạ, tốt cho sức khỏe ph&ugrave; hợp cho mọi lứa tuổi.</p>', '47000.00', '40000.00', 'C-A-002', 'in_stock', 0, 70, '1671640656.jpg', ',16716406560.jpg,16716406561.jpg', 2, '2022-12-21 09:37:36', '2022-12-21 09:37:36', 15),
(21, 'Salad Bò Nam Bộ', 'salad-bo-nam-bo', '<p>Thăn b&ograve;, h&uacute;ng quế, ng&ograve; gai, rau c&agrave;ng cua, l&aacute; c&oacute;c, l&aacute; quế vị, x&agrave; l&aacute;ch l&ocirc; l&ocirc; xanh, tắc, khế, c&agrave; ph&aacute;o, h&agrave;nh t&iacute;m, sả, ớt sừng, m&egrave; trắng, l&aacute; chanh th&aacute;i</p>', '<p>Salad b&ograve; Nam Bộ tại BAOTHU Kitchen l&agrave; m&oacute;n ăn v&ocirc; c&ugrave;ng đặc sắc với sự kết hợp tinh tế của nhiều nguy&ecirc;n liệu l&agrave;m khơi dậy vị gi&aacute;c của thực kh&aacute;ch. Những phần b&ograve; fillet cung cấp lượng protein cần thiết cho sức khỏe c&ugrave;ng những loại rau d&acirc;n d&atilde; v&agrave; mộc mạc như c&agrave;ng cua, l&aacute; quế tươi m&aacute;t. B&ecirc;n cạnh đ&oacute; c&ograve;n c&oacute; vị chua của nhiều loại tr&aacute;i c&acirc;y gi&agrave;u vitamin C như khế chua, tắc được c&acirc;n bằng bởi sự ngọt dịu của sốt salad đ&atilde; tạo n&ecirc;n một m&oacute;n ăn v&ocirc; c&ugrave;ng hấp dẫn.</p>', '35000.00', '31000.00', 'C-S-001', 'in_stock', 1, 20, '1671640734.jpg', ',16716407340.jpg', 2, '2022-12-21 09:38:54', '2022-12-21 09:38:54', 13),
(23, 'Gà Cuốn Lá Dứa', 'ga-cuon-la-dua', '<p>Đ&ugrave;i g&agrave;, l&aacute; dứa, x&agrave; l&aacute;ch l&ocirc; l&ocirc; xanh, x&agrave; l&aacute;ch l&ocirc; l&ocirc; t&iacute;m, c&agrave; chua bi, h&agrave;nh t&acirc;y t&iacute;m, đường c&aacute;t, ti&ecirc;u sọ trắng, bột bắp, bột chi&ecirc;n gi&ograve;n, bột năng, dầu m&egrave;, tỏi xay, ng&ograve; r&iacute;, nước tương, dầu ăn + Sốt chấm: m&egrave; trắng, đường thốt nốt, nước tương đậu n&agrave;nh, hắc x&igrave; dầu, dầu m&egrave; + Sốt x&agrave; l&aacute;ch: giấm trắng, muối, ti&ecirc;u đen, tỏi xay, h&agrave;nh t&iacute;m, đường c&aacute;t</p>', '<p>G&agrave; cuốn l&aacute; dứa l&agrave; m&oacute;n ăn mang phong vị ẩm thực Th&aacute;i Lan, đ&atilde; được c&aacute;c đầu bếp BAOTHU Kitchen biến tấu mang đầy mới mẻ v&agrave; ph&ugrave; hợp với khẩu vị người Việt. Thịt g&agrave; l&oacute;c xương, giữ nguy&ecirc;n da cắt miếng vừa ăn tẩm ướp suốt hơn 3 tiếng c&ugrave;ng c&aacute;c gia vị đặc trưng của Việt Nam như tỏi, dầu h&agrave;o, điều,...c&acirc;n chỉnh với tỷ lệ th&iacute;ch hợp. Th&ecirc;m điểm nhấn khi kết hợp m&ugrave;i thơm tự nhi&ecirc;n của l&aacute; dứa được trồng tại Đ&agrave; Lạt cuốn cẩn thận với g&agrave; v&agrave; chi&ecirc;n gi&ograve;n hấp dẫn. Kh&ocirc;ng chỉ dễ d&agrave;ng chi&ecirc;u đ&atilde;i vị gi&aacute;c m&oacute;n ăn c&ograve;n mang lại gi&aacute; trị dinh dưỡng cao, rất tốt cho tim mạch.</p>', '26000.00', '20000.00', 'C-N-002', 'in_stock', 1, 1000, '1671641188.jpg', ',16716411880.jpg', 2, '2022-12-21 09:46:28', '2022-12-21 09:46:28', 10),
(24, 'Ức Gà Đút Lò Phủ Lá Chanh', 'uc-ga-dut-lo-phu-la-chanh', 'Thịt ức gà, Thịt heo xay, giò sống, nấm mèo, nấm đông cô, tỏi, ớt sừng, phô mai Parmessan, lá chanh, ngũ vị hương, bột ớt cựa gà, bột hành tây, bột ngò, bột tỏi', 'Sử dụng phương pháp nướng cách thủy đặc biệt mang đến hương vị mới mẻ cho món Ức gà đút lò phủ lá chanh vừa giữ được sự mềm dai vừa thấm đều nước sốt hấp dẫn. Với thành phần ức gà giàu đạm, ít béo, kết hợp cùng lá chanh, lá dứa, thịt heo và các loại nấm tạo nên một món ăn đậm đà từ hương đến vị khi dùng kèm cơm trắng. Không chỉ thơm ngon, món ăn còn cung cấp dinh dưỡng phù hợp, là lựa chọn không thể bỏ qua của người ăn kiêng', '29000.00', '26000.00', 'C-N-003', 'in_stock', 1, 23, '1671641273.jpg', ',16716412730.jpg,16716412731.jpg', 2, '2022-12-21 09:47:53', '2022-12-21 09:47:53', 10),
(25, 'SỤN GÀ XÓC MUỐI TÂY NINH', 'sun-ga-xoc-muoi-tay-ninh', '<p>Sụn g&agrave;, muối T&acirc;y Ninh, trứng g&agrave;, sả, nghệ, l&aacute; chanh, ớt sừng, h&agrave;nh phi, tỏi phi, t&ocirc;m kh&ocirc;, ch&agrave; b&ocirc;ng heo, bột chi&ecirc;n x&ugrave;</p>', '<p>M&oacute;n sụn g&agrave; x&oacute;c muối T&acirc;y Ninh l&agrave; một m&oacute;n ăn vặt ho&agrave;n hảo với độ gi&ograve;n từ lớp bột b&ecirc;n ngo&agrave;i v&agrave; độ dai dai từ sụn g&agrave; b&ecirc;n trong. C&aacute;c đầu bếp TASTY Kitchen đ&atilde; s&aacute;ng tạo kh&eacute;o l&eacute;o khi kết hợp muối ớt T&acirc;y Ninh v&agrave; c&aacute;c gia vị hấp dẫn gi&uacute;p tạo n&ecirc;n một m&oacute;n ăn mới lạ với m&ugrave;i thơm c&ugrave;ng hương vị đậm đ&agrave;. M&oacute;n ăn được g&oacute;i gọn trong một chiếc tổ chim l&agrave;m bằng sả chi&ecirc;n, kh&ocirc;ng chỉ đẹp mắt m&agrave; thực kh&aacute;ch c&oacute; thể thưởng thức độ gi&ograve;n thơm, vị vừa ăn.</p>', '45000.00', '40000.00', 'C-N-001', 'in_stock', 0, 27, '1671641402.jpg', ',16716414020.jpg', 2, '2022-12-21 09:50:02', '2022-12-21 09:50:02', 10),
(27, 'CÀ PHÊ SỮA ĐÁ BAOTHU', 'ca-phe-sua-da-baothu', '<p>C&agrave; ph&ecirc; pha phin, sữa đặc, sữa b&eacute;o.</p>', '<p>C&agrave; ph&ecirc; sữa BAOTHU l&agrave; sự lựa chọn ho&agrave;n hảo cho những ai y&ecirc;u th&iacute;ch c&agrave; ph&ecirc; nhưng lại kh&ocirc;ng th&iacute;ch vị đắng nguy&ecirc;n bản của c&agrave; ph&ecirc; đen truyền thống. Hương vị c&agrave; ph&ecirc; mang dấu ấn s&aacute;ng tạo rất Việt Nam. C&aacute;i kh&eacute;o trong sự kết hợp giữa c&aacute;c nguy&ecirc;n liệu cao cấp: c&agrave; ph&ecirc; phin, sữa b&eacute;o v&agrave; sữa đặc cho ra đời một thức uống tr&ograve;n vị đắng, ngọt, b&ugrave;i. Vị ngọt thấm v&agrave;o đầu lưỡi, vị đắng lắng đọng nơi cuống họng vừa đủ để người thưởng thức tỉnh t&aacute;o suốt cả ng&agrave;y d&agrave;i.</p>', '20000.00', '18000.00', 'D-C-003', 'in_stock', 0, 60, '1671641607.jpg', ',16716416070.jpg', 3, '2022-12-21 09:53:27', '2022-12-21 09:53:27', 6),
(28, 'CÀ PHÊ ĐEN ĐÁ BAOTHU', 'ca-phe-den-da-baothu', 'Cà phê pha phin, đường', 'Dành cho những người sành cà phê, cà phê đen BAOTHU mang vị đắng đậm đà truyền thống. Từng hạt cà phê được chắt lọc kỹ càng từ vùng nguyên liệu cao cấp Bảo Lộc – Cầu Đất, kết hợp với cách pha chế bằng phin thủ công, cho ra đời những giọt tinh chất cà phê hảo hạng đầy tinh tế. Mỗi ngụm cà phê đăng đắng êm ái mượt mà chạm vào vị giác, kích thích tối đa các giác quan, phù hợp để bắt đầu một ngày mới tràn trề năng lượng.', '26000.00', '19000.00', 'D-C-004', 'in_stock', 0, 70, '1671641690.jpg', ',16716416900.jpg,16716416901.jpg', 3, '2022-12-21 09:54:50', '2022-12-21 09:54:50', 6),
(29, 'TRÀ SỮA BAOTHU', 'tra-sua-baothu', 'Trà đen, bột sữa tách béo, trân châu trắng.', 'Trà sữa BAOTHU được tạo nên từ 100% nguyên liệu Việt với hồn cốt là trà đen nổi tiếng vùng Lâm Hà, Lâm Đồng. Hương thơm đặc trưng của trà đen được hòa quyện với độ béo vừa phải của sữa, tạo nên vị ngọt thanh mà vẫn giữ được hậu vị trà đậm đà. Cuối cùng, thành phần không thể thiếu để tạo nên món trà sữa trứ danh là trân châu trắng ngọt ngào, dai dai giòn giòn, cân bằng lại vị chát nhẹ của trà. Tất cả tạo nên một hương vị vừa lạ vừa quen, thổi hồn Việt Nam vào một thức uống mang danh ngoại lai bấy lâu.', '30000.00', '25000.00', 'D-S-001', 'in_stock', 0, 70, '1671641740.jpg', ',16716417400.jpg', 3, '2022-12-21 09:55:40', '2022-12-21 09:56:40', 9),
(30, 'TRÀ SỮA LÀI HOA ĐẬU BIẾC BAOTHU', 'tra-sua-lai-hoa-dau-biec-baothu', 'Trà xanh hoa lài, trà hoa đậu biếc, trân châu trắng, bột sữa tách béo.', 'Nguyên liệu chính của thức uống là trà xanh hoa lài Đài Loan kết hợp cùng trà hoa đậu biếc được ngâm ủ cẩn thận để sản phẩm có vị đậm đà và hương thơm đặc trưng. Trà kết hợp cùng bột sữa tách béo và phần topping trân châu trắng dai giòn, mang đến một thức uống có hương vị ngọt thanh mà không quá béo ngậy. Món trà mang màu xanh tím tự nhiên vô cùng đẹp mắt, hơn nữa còn có tác dụng giúp đẹp da, ngăn ngừa lão hóa, tăng cường hệ miễn dịch và tốt cho sức khỏe tim mạch.', '30000.00', '29000.00', 'D-S-002', 'in_stock', 0, 70, '1671641786.jpg', ',16716417860.jpg', 3, '2022-12-21 09:56:26', '2022-12-21 09:56:26', 9),
(31, 'TRÀ OLOONG BƯỞI HỒNG 330ML', 'tra-oloong-buoi-hong-330ml', '<p>Vị tr&agrave; oolong đậm đ&agrave;, kết hợp c&ugrave;ng vị chua v&agrave; đắng nhẹ đặc trưng của bưởi đỏ.</p>', '<p>Tr&agrave; Oloong bưởi hồng tr&agrave; là m&ocirc;̣t trong những thức u&ocirc;́ng độc đ&aacute;o nhất trong menu trà hoa quả nh&agrave; BAOTHU. Hương vị th&acirc;n thuộc của tr&agrave; Oloong mang đ&ecirc;́n trải nghiệm đ&acirc;̀y mới lạ khi kết hợp với mứt bưởi hồng. Nhấp 1 ngụm tr&agrave; đ&ecirc;̉ từ từ cảm nh&acirc;̣n vị đắng nhẹ từ vỏ bưởi ngọt ngọt chua chua kh&oacute; cưỡng, c&ugrave;i bưởi v&agrave; tr&acirc;n ch&acirc;u trắng dai giòn hòa quy&ecirc;̣n mượt mà cùng vị ch&aacute;t dịu d&agrave;ng từ trà Oloong. Điểm nhấn của thức uống nằm ở topping c&ugrave;i bưởi v&agrave; t&eacute;p bưởi thật 100%, mang đ&ecirc;́n hương vị thanh mát thu&acirc;̀n tự nhi&ecirc;n.&nbsp;</p>', '46000.00', '46000.00', 'D-T-001', 'in_stock', 0, 90, '1671641935.jpg', ',16716419350.jpg', 3, '2022-12-21 09:58:55', '2022-12-21 09:58:55', 7),
(32, 'YAKULT THANH LONG', 'yakult-thanh-long', 'Trái sơ ri Gò Công mang trong mình vị chua ngọt dễ chịu cùng hàm lượng vitamin C gấp 34 lần chanh', 'Quyện vị cùng sơ ri là nước ép thanh long đỏ ngọt thanh, mang đến màu sắc bắt mắt và hương vị Việt Nam quen thuộc. Vừa dung hòa, vừa tạo điểm nhấn đặc biệt cho món nước ưa nhìn là sữa lên men yakult, với vị chua nhẹ thơm thơm, hỗ trợ hệ tiêu hóa, mang lại nhiều lợi ích cho sức khỏe', '23000.00', '20000.00', 'D-K-001', 'in_stock', 0, 90, '1671641992.jpg', ',16716419920.jpg', 3, '2022-12-21 09:59:52', '2022-12-21 09:59:52', 7),
(33, 'COCA COLA LON 320ML', 'coca-cola-lon-320ml', '<p>V&acirc;ng, đ&oacute; l&agrave; Cocacola.</p>', '<p>V&acirc;ng, đ&oacute; l&agrave; Cocacola.&nbsp;</p>\n<p>V&acirc;ng, đ&oacute; l&agrave; Cocacola.&nbsp;</p>\n<p>V&acirc;ng, đ&oacute; l&agrave; Cocacola.&nbsp;</p>\n<p>V&acirc;ng, đ&oacute; l&agrave; Cocacola.&nbsp;</p>\n<p>V&acirc;ng, đ&oacute; l&agrave; Cocacola.&nbsp;</p>\n<p>V&acirc;ng, đ&oacute; l&agrave; Cocacola.</p>', '10000.00', '10000.00', 'D-N-001', 'in_stock', 0, 100000, '1671642057.jpg', ',16716420570.jpg', 3, '2022-12-21 10:00:57', '2022-12-21 10:00:57', 8),
(34, 'Nước Ép Cam Thơm', 'nuoc-ep-cam-thom', 'Nước ép cam, nước ép thơm, nha đam', 'Tăng cường lớp lá chắn bảo vệ cơ thể bằng một cốc Nước ép cam thơm chua ngọt đầy ấn tượng tại TASTY Kitchen sẽ giúp đánh thức mọi giác quan trên cơ thể bạn, bừng tỉnh sau những ngày dài đầy mệt mỏi. Sự hoà quyện độc đáo đầy hấp dẫn từ những loại trái cây nhiệt đới như Thơm, Cam kết hợp cùng nha đam tươi mát nên một thức uống đầy sảng khoái.', '12000.00', '10000.00', 'D-E-001', 'in_stock', 0, 100000, '1671642099.jpg', ',16716420990.jpg', 3, '2022-12-21 10:01:39', '2022-12-21 10:02:15', 16),
(35, 'Detex Sơ ri Thanh Long', 'detex-so-ri-thanh-long', '<p>Nước &eacute;p cam, nước &eacute;p sơri thanh long, tr&acirc;n ch&acirc;u trắng.</p>', '<p>Detox sơ ri thanh long đ&aacute;nh thức mọi gi&aacute;c quan bằng vị chua dễ chịu của những tr&aacute;i sơ ri G&ograve; C&ocirc;ng, c&oacute; h&agrave;m lượng vitamin C gấp 34 lần chanh. Tiếp theo đ&oacute; l&agrave; sự tươi m&aacute;t lan tỏa trong khoang miệng, với nước &eacute;p cam đậm đ&agrave; c&ugrave;ng thanh long ngọt ng&agrave;o gi&agrave;u vitamin A. Tr&acirc;n ch&acirc;u trắng gi&ograve;n dai kh&oacute; cưỡng ho&agrave;n thiện bản giao hưởng của tr&aacute;i c&acirc;y nhiệt đới, mang lại một cơ thể khỏe mạnh, dẻo dai c&ugrave;ng sức hấp dẫn kh&ocirc;ng thể chối từ.</p>', '16000.00', '12000.00', 'D-E-002', 'in_stock', 1, 100, '1671642189.jpg', ',16716421890.jpg,16716421891.jpg', 3, '2022-12-21 10:03:09', '2022-12-21 10:03:09', 16),
(36, 'BÁNH CHUỐI HẤP', 'banh-chuoi-hap', '<p>B&aacute;nh chuối hấp l&agrave; một m&oacute;n ăn vặt d&acirc;n d&atilde; của nền ẩm thực Việt. C&aacute;c đầu bếp của BAOTHU đ&atilde; kh&eacute;o l&eacute;o kết hợp vị ngọt ng&agrave;o của những quả chuối sứ chín thơm lừng c&ugrave;ng nước cốt dừa b&eacute;o ngậy, nhấn nh&aacute; một ch&uacute;t hương rượu vodka đ&ecirc;̉ gia tăng sự độc đ&aacute;o trong hương vị từng miếng b&aacute;nh. L&agrave; sự giao thoa tinh tế giữa ẩm thực truyền thống v&agrave; hơi thở hiện đại, từng miếng b&aacute;nh chu&ocirc;́i dẻo dai được phủ một lớp nước cốt dừa thơm b&eacute;o, tuy giản dị song lại có sức h&acirc;́p d&acirc;̃n lạ lùng với các thực khách g&acirc;̀n xa.</p>', '<p>&nbsp;Thành ph&acirc;̀n :</p>\n<ul>\n<li>B&aacute;nh chuối: Chuối sứ ch&iacute;n, đường v&agrave;ng, muối Th&aacute;i, hương va-ni, rượu vodka, tinh dầu chuối, bột năng, dầu hạt cải, bột nếp, m&agrave;u v&agrave;ng thực phẩm</li>\n<li>Nước cốt dừa: nước cốt dừa, sữa đặc, đường c&aacute;t, bột năng, muối Th&aacute;i, l&aacute; dứa</li>\n<li>Trang tr&iacute;: đậu phộng, m&egrave; trắng, l&aacute; chuối</li>\n</ul>', '9000.00', '7500.00', 'V-B-001', 'in_stock', 0, 1890, '1671642294.jpg', NULL, 4, '2022-12-21 10:04:54', '2022-12-21 10:04:54', 4),
(37, 'Nha Đam Pha Lê', 'nha-dam-pha-le', '<p>L&agrave; m&oacute;n tr&aacute;ng miệng độc quyền của đầu bếp t&agrave;i năng BAOTHU. M&oacute;n ăn đ&atilde; c&oacute; vinh dự được thưởng thức v&agrave; đ&oacute;n nhận qua nhiều tổng thống, l&atilde;nh tụ quốc gia của nhiều nước. Nay xuất hiện tr&ecirc;n thực đơn của nh&agrave; h&agrave;ng BAOTHU với sứ mệnh n&acirc;ng tầm trải nghiệm ẩm thực của thực kh&aacute;ch. Từ dưỡng chất kỳ diệu của nha đam, m&oacute;n tr&aacute;ng miệng đem đến sự thanh m&aacute;t, nhẹ nh&agrave;ng c&oacute; t&aacute;c dụng l&agrave;m đẹp da, t&oacute;c v&agrave; v&oacute;c d&aacute;ng của ph&aacute;i đẹp. Ngo&agrave;i ra nha đam c&ograve;n bổ sung nước cho cơ thể, thanh nhiệt cho hệ ti&ecirc;u h&oacute;a, tăng cường hệ miễn dịch. Để đem đến bữa tiệc \"thị &amp; vị gi&aacute;c\" cho kh&aacute;ch h&agrave;ng, đầu bếp BAOTHU c&ograve;n kh&eacute;o l&eacute;o t&ocirc; điểm th&ecirc;m nhiều loại tr&aacute;i c&acirc;y nhiệt đới</p>', '<p>&nbsp;Thành ph&acirc;̀n :</p>\n<ul>\n<li>Nha đam.</li>\n<li>Bột rau c&acirc;u.</li>\n<li>Đường c&aacute;t.</li>\n<li>Sả.</li>\n<li>L&aacute; chanh th&aacute;i.</li>\n</ul>', '20000.00', '150000.00', 'V-C-002', 'in_stock', 1, 12, '1671642434.jpg', NULL, 4, '2022-12-21 10:07:14', '2022-12-21 10:07:14', 12),
(38, 'Cơm Đùi Gà Chiên', 'com-dui-ga-chien', '<p>Cơm đ&ugrave;i g&agrave; chi&ecirc;n l&agrave; m&oacute;n ăn cực k&igrave; tinh tế trong c&aacute;ch chế biến.</p>', '<p>M&oacute;n n&agrave;y rất được l&ograve;ng thực kh&aacute;ch nh&agrave; BaoThu Food bởi cơm ngon đạt độ săn tơi, đ&ugrave;i g&agrave; chi&ecirc;n thơm phức, đậm đ&agrave;, phần da gi&ograve;n gi&ograve;n. Mỗi suất đều c&oacute; dưa g&oacute;p v&agrave; một b&aacute;t nước d&ugrave;ng ăn k&egrave;m để đỡ ngấy. Bạn c&oacute; thể gọi th&ecirc;m đ&ugrave;i g&agrave; v&agrave; tr&agrave; đ&aacute; nếu muốn.</p>', '49000.00', '39000.00', 'C-C-003', 'in_stock', 0, 20, '1671642803.jpg', ',16716428030.jpg', 2, '2022-12-21 10:13:23', '2022-12-21 10:13:23', 1),
(39, 'Cơm Sườn Cốt Lết', 'com-suon-cot-let', '<p>Cơm sườn cốt lết l&agrave; một trong những m&oacute;n ăn b&igrave;nh d&acirc;n của ẩm thực Việt Nam rất ph&ugrave; hợp với thực đơn cơm trưa văn ph&ograve;ng. Thứ khiến cho người ta say m&ecirc; m&oacute;n n&agrave;y đến vậy ch&iacute;nh l&agrave; nhờ miếng thịt sườn cốt lết vừa thơm vừa mềm, ăn rất vừa miệng, nhất l&agrave; khi d&ugrave;ng k&egrave;m với thứ nước chấm chua chua cay cay thật đặc trưng, khiến bạn chỉ thấy no m&agrave; kh&ocirc;ng ch&aacute;n.</p>', '<p>Dễ để nhận ra suất cơm sườn cốt lết c&oacute; m&agrave;u sắc v&ocirc; c&ugrave;ng bắt mắt v&agrave; khơi gợi vi gi&aacute;c người ăn. Một suất cơm sườn cốt lết tại BAOTHU FOOD gồm c&oacute; sườn cốt lết, chả trứng ăn k&egrave;m với rau củ quả luộc thanh m&aacute;t. Điểm nhấn ch&iacute;nh m&agrave; suất cơm văn ph&ograve;ng sườn cốt lết ở BAOTHU FOOD tạo sự kh&aacute;c biệt l&agrave; thơm ngon v&agrave; đầy đặn cung cấp đủ năng lượng l&agrave;m việc cho cả những người lao động nặng nhọc, với những c&ocirc; g&aacute;i \"khảnh\" ăn v&agrave; thực hiện chế độ eat clean th&igrave; suất cơm n&agrave;y cũng ho&agrave;n to&agrave;n l&yacute; tưởng v&igrave; c&oacute; rất nhiều rau củ quả tươi ngon gi&uacute;p duy tr&igrave; v&oacute;c d&aacute;ng c&acirc;n đối.</p>', '60000.00', '50000.00', 'C-C-002', 'in_stock', 0, 20, '1671642945.jpg', ',16716429450.jpg', 2, '2022-12-21 10:15:45', '2022-12-21 10:15:45', 1),
(40, 'ORIGINAL COLD BREW COFFEE 200 ML', 'original-cold-brew-coffee-200-ml', '<p>Vị cafe thơm nhẹ nh&agrave;ng.</p>', '<p>100% C&agrave; ph&ecirc; Arabica ủ lạnh.</p>', '23000.00', '20000.00', 'D-C-002', 'in_stock', 0, 2, '1671643025.jpg', NULL, 3, '2022-12-21 10:17:05', '2022-12-21 10:17:05', 6),
(41, 'TRÀ OLOONG BƯỞI HỒNG', 'tra-oloong-buoi-hong', '<p>Vị tr&agrave; oolong đậm đ&agrave;, kết hợp c&ugrave;ng vị chua v&agrave; đắng nhẹ đặc trưng của bưởi đỏ.</p>', '<p>Tr&agrave; Oloong bưởi hồng tr&agrave; là m&ocirc;̣t trong những thức u&ocirc;́ng độc đ&aacute;o nhất trong menu trà hoa quả nh&agrave; BAOTHU. Hương vị th&acirc;n thuộc của tr&agrave; Oloong mang đ&ecirc;́n trải nghiệm đ&acirc;̀y mới lạ khi kết hợp với mứt bưởi hồng. Nhấp 1 ngụm tr&agrave; đ&ecirc;̉ từ từ cảm nh&acirc;̣n vị đắng nhẹ từ vỏ bưởi ngọt ngọt chua chua kh&oacute; cưỡng, c&ugrave;i bưởi v&agrave; tr&acirc;n ch&acirc;u trắng dai giòn hòa quy&ecirc;̣n mượt mà cùng vị ch&aacute;t dịu d&agrave;ng từ trà Oloong. Điểm nhấn của thức uống nằm ở topping c&ugrave;i bưởi v&agrave; t&eacute;p bưởi thật 100%, mang đ&ecirc;́n hương vị thanh mát thu&acirc;̀n tự nhi&ecirc;n.&nbsp;</p>', '20000.00', '18000.00', 'D-T-001', 'in_stock', 1, 102, '1671643117.jpg', NULL, 3, '2022-12-21 10:18:37', '2022-12-21 10:18:37', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cay', '2022-12-20 01:18:59', '2022-12-20 01:18:59'),
(2, 'Không Cay', '2022-12-20 01:19:09', '2022-12-20 01:19:09'),
(3, 'Ngọt', '2022-12-21 09:57:00', '2022-12-21 09:57:00'),
(4, 'Ít Ngọt', '2022-12-21 09:57:05', '2022-12-21 09:57:05'),
(5, 'Nhiều Đường', '2022-12-21 09:57:11', '2022-12-21 09:57:11'),
(6, 'Ít Đường', '2022-12-21 09:57:14', '2022-12-21 09:57:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `line1` varchar(255) DEFAULT NULL,
  `line2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `image`, `mobile`, `line1`, `line2`, `city`, `province`, `country`, `zip_code`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-21 04:36:19', '2022-12-21 04:36:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sales`
--

INSERT INTO `sales` (`id`, `sale_date`, `status`, `created_at`, `updated_at`) VALUES
(1, '2022-12-31 00:00:00', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1JFlt1KpQVXIIwWSdB7432WqifMuQMrD6mCxXwcA', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.46', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiWmNqV29ucTZUUTYxbExJY29jM1VGRUZCUkw0YTVVb2dVT1FsbzNmRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo1OiJ1dHlwZSI7czozOiJBRE0iO3M6NDoiY2FydCI7YToyOntzOjQ6ImNhcnQiO086Mjk6IklsbHVtaW5hdGVcU3VwcG9ydFxDb2xsZWN0aW9uIjoyOntzOjg6IgAqAGl0ZW1zIjthOjA6e31zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fXM6ODoid2lzaGxpc3QiO086Mjk6IklsbHVtaW5hdGVcU3VwcG9ydFxDb2xsZWN0aW9uIjoyOntzOjg6IgAqAGl0ZW1zIjthOjA6e31zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fX19', 1671643152);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `phone2` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `map` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `pinterest` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `email`, `phone`, `phone2`, `address`, `map`, `twitter`, `facebook`, `pinterest`, `instagram`, `youtube`, `created_at`, `updated_at`) VALUES
(1, '20520450@gm.uit.edu.vn', '0937811400', '', '01, Hàn Thuyên, KP6, P. Linh Trung, TP. Thủ Đức', '', '', '', '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `line1` varchar(255) NOT NULL,
  `line2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) NOT NULL,
  `instance` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shoppingcart`
--

INSERT INTO `shoppingcart` (`identifier`, `instance`, `content`, `created_at`, `updated_at`) VALUES
('admin@admin.com', 'cart', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2022-12-21 10:19:03', NULL),
('admin@admin.com', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2022-12-21 10:19:03', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `slug`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Cơm', 'com', 2, '2022-12-20 01:20:22', '2022-12-20 01:20:22'),
(2, 'Món nước', 'mon-nuoc', 1, '2022-12-20 01:20:37', '2022-12-20 01:20:37'),
(3, 'Món tráng miệng', 'mon-trang-mieng', 2, '2022-12-20 01:20:47', '2022-12-20 01:20:47'),
(4, 'Bánh', 'banh', 4, '2022-12-20 01:20:51', '2022-12-20 01:20:51'),
(5, 'Kem', 'kem', 4, '2022-12-20 01:20:55', '2022-12-20 01:20:55'),
(6, 'Cà phê', 'ca-phe', 3, '2022-12-20 01:21:00', '2022-12-20 01:21:00'),
(7, 'Trà', 'tra', 3, '2022-12-20 01:21:05', '2022-12-20 01:21:05'),
(8, 'Nước ngọt', 'nuoc-ngot', 3, '2022-12-20 01:21:10', '2022-12-20 01:21:10'),
(9, 'Trà sữa', 'tra-sua', 3, '2022-12-20 01:21:15', '2022-12-20 01:21:15'),
(10, 'Thức ăn nhanh', 'thuc-an-nhanh', 2, '2022-12-20 01:22:06', '2022-12-20 01:22:36'),
(11, 'Bánh mì', 'banh-mi', 1, '2022-12-20 01:22:22', '2022-12-20 01:22:22'),
(12, 'Chè', 'che', 4, '2022-12-20 02:20:41', '2022-12-20 02:20:41'),
(13, 'Salad', 'salad', 2, '2022-12-20 02:28:40', '2022-12-20 02:28:40'),
(14, 'Món khô', 'mon-kho', 1, '2022-12-21 09:17:02', '2022-12-21 09:17:02'),
(15, 'Đồ ăn', 'do-an', 2, '2022-12-21 09:35:17', '2022-12-21 09:35:17'),
(16, 'Nước ép', 'nuoc-ep', 3, '2022-12-21 10:01:55', '2022-12-21 10:01:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `mode` enum('cod','card','paypal') NOT NULL,
  `status` enum('pending','approved','declined','refunded') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `utype` varchar(255) NOT NULL DEFAULT 'USR' COMMENT 'ADM for Admin and USR for User or Customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `utype`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 'admin@admin.com', NULL, '$2y$10$i9Fg0KyKqEFO9foYR2qHTuAzr.h0vOTHsIwC/6sTZLe3WGX5CH5O.', NULL, NULL, NULL, NULL, NULL, NULL, 'ADM', '2022-12-20 00:37:47', '2022-12-20 00:37:47');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_values_product_attribute_id_foreign` (`product_attribute_id`),
  ADD KEY `attribute_values_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `home_categories`
--
ALTER TABLE `home_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `home_sliders`
--
ALTER TABLE `home_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`);

--
-- Chỉ mục cho bảng `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_order_item_id_foreign` (`order_item_id`);

--
-- Chỉ mục cho bảng `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shippings_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Chỉ mục cho bảng `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `home_categories`
--
ALTER TABLE `home_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD CONSTRAINT `attribute_values_product_attribute_id_foreign` FOREIGN KEY (`product_attribute_id`) REFERENCES `product_attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attribute_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_order_item_id_foreign` FOREIGN KEY (`order_item_id`) REFERENCES `order_items` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
