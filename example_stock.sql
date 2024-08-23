-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2024 at 05:10 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `example_stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `date`, `status`) VALUES
(16, 'Android', '2024-08-17 18:59:21', 0),
(22, 'IOS', '2024-08-22 17:20:36', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `status`, `created_at`, `updated_at`, `date`) VALUES
(20, 'Phones', 1, NULL, NULL, '2024-08-17 08:13:00'),
(21, 'Computer', 0, NULL, NULL, '2024-08-17 08:13:44'),
(22, 'Moto', 1, NULL, NULL, '2024-08-17 09:53:04'),
(31, 'Testing', 1, NULL, NULL, '2024-08-22 17:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_08_15_160526_create_categories_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(2) NOT NULL,
  `customer` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `create_by` int(2) DEFAULT NULL,
  `date` varchar(200) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `orcode` varchar(100) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `customer`, `email`, `phone`, `create_by`, `date`, `status`, `orcode`, `location`, `address`) VALUES
(53, 'testing', 'admin@gmail.com', 'w2222', 20, '2024-08-21 05:22:21', 0, 'OR20240821052221', '2', 'SELECT `order`.*, COALESCE(SUM(product_order.total_price), 0) AS total_price, users.name FROM `order` LEFT JOIN  `product_order`  ON `order`.orcode = product_order.order_id JOIN users ON users.id=`order`.create_by  $search_condition GROUP BY `order`.orcode'),
(54, 'monika', 'test@gmail.com', '123456677', 20, '2024-08-22 13:03:29', 1, 'OR20240822130329', '6', 'ertyuioiuytrea');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  `subcategory_id` int(10) DEFAULT NULL,
  `brand_id` int(10) DEFAULT NULL,
  `featured_product` int(2) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `price` int(20) DEFAULT NULL,
  `compare_price` int(20) DEFAULT NULL,
  `barcode` int(20) DEFAULT NULL,
  `quantity` int(20) DEFAULT NULL,
  `date` varchar(200) DEFAULT NULL,
  `stock` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `status`, `category_id`, `subcategory_id`, `brand_id`, `featured_product`, `image`, `price`, `compare_price`, `barcode`, `quantity`, `date`, `stock`) VALUES
(69, '11', '22', 333, 444, 55, 66, 77, '5b395e6d4a829f437968240548aebc29cb84c162.jpg', 99, 10, 11, 12, '13', 7),
(70, '11', '22', 333, 444, 55, 66, 77, '5b395e6d4a829f437968240548aebc29cb84c162.jpg', 99, 10, 11, 12, '13', 7),
(71, 'ssssssss', '<p>sssssss</p>', 0, 21, 7, 16, 1, '5b395e6d4a829f437968240548aebc29cb84c162.jpg', 100, 444, 4152637, 77, '2024-08-21 10:21:59', 0),
(73, 'fffff', '<p>ffff</p>', 0, 21, 7, 17, 1, 'c97b910c1b217cc3a3cecc4edd7b3cb50f2e9d9a.jpg', 100, 444, 4152637, 33, '2024-08-21 10:43:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `id` int(10) NOT NULL,
  `order_id` varchar(100) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `total_price` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`id`, `order_id`, `title`, `price`, `quantity`, `total_price`) VALUES
(64, 'OR20240820164745', 'A5', 100, 1, 100),
(65, 'OR20240820164745', 'A3', 100, 1, 100),
(66, 'OR20240820164745', 'A1', 100, 1, 100),
(67, 'OR20240820164823', 'A2', 100, 1, 100),
(68, 'OR20240820164823', 'A4', 100, 1, 100),
(69, 'OR20240820164823', 'A5', 100, 1, 100),
(70, 'OR20240820164823', 'A3', 100, 1, 100),
(71, 'OR20240820164823', 'A1', 100, 1, 100),
(72, 'OR20240821052221', 'A2', 100, 1, 100),
(73, 'OR20240821052221', 'A4', 100, 2, 200),
(74, 'OR20240821052221', 'A5', 100, 3, 300),
(75, 'OR20240821052221', 'A3', 100, 4, 400),
(76, 'OR20240821052221', 'A1', 100, 5, 500),
(77, 'OR20240821052221', 'sssssss', 100, 6, 600),
(78, 'OR20240821052221', 'ssssssssssssss', 100, 7, 700),
(79, 'OR20240822130329', 'ssssssss', 100, 23, 2300),
(80, 'OR20240822130329', 'fffff', 100, 67, 6700);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(2) NOT NULL,
  `province_khmer` varchar(100) DEFAULT NULL,
  `province_english` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `province_khmer`, `province_english`) VALUES
(1, '	បន្ទាយមានជ័យ	', '	Banteay Meanchey		'),
(2, '	បាត់ដំបង	', '	Battambang		'),
(3, '	កំពង់ចាម	', '	Kampong Cham		'),
(4, '	កំពង់ឆ្នាំង	', '	Kampong Chhnang		'),
(5, '	កំពង់ស្ពឺ	', '	Kampong Speu		'),
(6, '	កំពង់ធំ	', '	Kampong Thom		'),
(7, '	កំពត	', '	Kampot		'),
(8, '	កណ្ដាល	', '	Kandal		'),
(9, '	កោះកុង	', '	Koh Kong		'),
(10, '	ក្រចេះ	', '	Kratie		'),
(11, '	មណ្ឌលគិរី	', '	Mondul Kiri		'),
(12, '	ភ្នំពេញ	', '	Phnom Penh		'),
(13, '	ព្រះវិហារ	', '	Preah Vihear		'),
(14, '	ព្រៃវែង	', '	Prey Veng		'),
(15, '	ពោធិ៍សាត់	', '	Pursat		'),
(16, '	រតនគិរី	', '	Ratanak Kiri		'),
(17, '	សៀមរាប	', '	Siemreap		'),
(18, '	ព្រះសីហនុ	', '	Preah Sihanouk		'),
(19, '	ស្ទឹងត្រែង	', '	Stung Treng		'),
(20, '	ស្វាយរៀង	', '	Svay Rieng		'),
(21, '	តាកែវ	', '	Takeo		'),
(22, '	ឧត្ដរមានជ័យ	', '	Oddar Meanchey		'),
(23, '	កែប	', '	Kep		'),
(24, '	ប៉ៃលិន	', '	Pailin		'),
(25, '	ត្បូងឃ្មុំ	', '	Tboung Khmum		');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(10) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `title`, `category_id`, `date`, `status`) VALUES
(1, 'Iphone 5', 20, '[value-4]', 0),
(2, 'Oppo', 20, '2024-08-17 08:40:12', 1),
(4, 'wwwwwwwwwww', 20, '2024-08-17 08:52:11', 1),
(5, 'sssssssss', 20, '2024-08-17 10:48:36', 1),
(6, 'jjjjjjjjjjj', 20, '2024-08-17 10:54:25', 1),
(7, 'sssssssss', 21, '2024-08-17 10:56:49', 0),
(8, 'ffffff', 20, '2024-08-17 11:04:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` int(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `date` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image`, `gender`, `address`, `role`, `phone`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `date`) VALUES
(19, 'wwwwwwwwwwwwwwwwwwwww', 'Male', '                    header(\"location:http://localhost/php/admin/admin/users.php?error=Create user sucessfull..\");', 1, '0123466', 'somveha', 'somveha.122@gmail.com', NULL, '$2y$10$fANF8Sr37gdNATm7/7SYx.Uc8Miek3AE3gDIdnjX5VpdA25VhxXzS', NULL, 0, '2024-08-21 05:14:32'),
(20, NULL, 'Male', 'http://localhost/php/admin/admin/users.php', 1, '0123466', 'admin', 'admin122@gmail.com', NULL, '$2y$10$0U45iSilLQU2DptCoVZwGebPQag3rahdCKAkpJltFtkDdoiRlmvge', NULL, 1, '2024-08-21 11:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `warhouse`
--

CREATE TABLE `warhouse` (
  `id` int(10) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `date` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `location` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warhouse`
--

INSERT INTO `warhouse` (`id`, `title`, `status`, `date`, `address`, `location`) VALUES
(7, 'testing1111111111', 0, '2024-08-22 17:57:48', 'address', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warhouse`
--
ALTER TABLE `warhouse`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `warhouse`
--
ALTER TABLE `warhouse`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
