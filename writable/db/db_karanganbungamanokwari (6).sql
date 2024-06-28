-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2024 at 03:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_karanganbungamanokwari`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'kambingkuda', NULL, '2024-06-22 09:50:37', 0),
(2, '::1', 'kambingkuda@gmail.com', 3, '2024-06-22 09:50:58', 1),
(3, '::1', 'coba', NULL, '2024-06-22 15:56:08', 0),
(4, '::1', 'coba', NULL, '2024-06-22 15:56:14', 0),
(5, '::1', 'cobacoba', NULL, '2024-06-22 16:51:50', 0),
(6, '::1', 'kampret@gmail.com', 4, '2024-06-22 16:52:07', 1),
(7, '::1', 'emailsaja@gmail.com', NULL, '2024-06-24 14:31:29', 0),
(8, '::1', 'emailsaja@gmail.com', NULL, '2024-06-24 14:31:36', 0),
(9, '::1', 'erwin@gmail.com', 5, '2024-06-24 14:33:02', 1),
(10, '::1', 'erwin@gmail.com', 5, '2024-06-24 15:05:30', 1),
(11, '::1', 'erwin@gmail.com', 5, '2024-06-24 15:11:13', 1),
(12, '::1', 'erwin@gmail.com', 5, '2024-06-24 15:15:41', 1),
(13, '::1', 'erwin@gmail.com', 5, '2024-06-24 15:35:50', 1),
(14, '::1', 'erwin@gmail.com', 5, '2024-06-25 03:49:48', 1),
(15, '::1', 'sadsad', NULL, '2024-06-25 07:55:26', 0),
(16, '::1', 'erwin123', NULL, '2024-06-25 07:55:37', 0),
(17, '::1', 'erwin@gmail.com', 5, '2024-06-25 07:58:08', 1),
(18, '::1', 'erwin@gmail.com', 5, '2024-06-25 07:58:38', 1),
(19, '::1', 'erwin@gmail.com', 5, '2024-06-25 08:01:00', 1),
(20, '::1', 'erwin@gmail.com', 5, '2024-06-25 08:06:05', 1),
(21, '::1', 'erwin@gmail.com', 5, '2024-06-25 08:24:07', 1),
(22, '::1', 'erwin@gmail.com', 5, '2024-06-25 09:19:05', 1),
(23, '::1', 'erwin@gmail.com', 5, '2024-06-25 09:39:01', 1),
(24, '::1', 'erwin@gmail.com', 5, '2024-06-25 10:49:07', 1),
(25, '::1', 'erwin@gmail.com', 5, '2024-06-25 11:20:49', 1),
(26, '::1', 'kampret@gmail.com', 4, '2024-06-25 12:09:14', 1),
(27, '::1', 'kampret@gmail.com', 4, '2024-06-25 12:15:11', 1),
(28, '::1', 'kampret@gmail.com', 4, '2024-06-25 12:17:40', 1),
(29, '::1', 'kampret24', NULL, '2024-06-25 12:18:24', 0),
(30, '::1', 'kampret24', NULL, '2024-06-25 12:18:35', 0),
(31, '::1', 'kampret24', NULL, '2024-06-25 12:18:53', 0),
(32, '::1', 'sfdsf', NULL, '2024-06-25 12:19:53', 0),
(33, '::1', 'kampret24', NULL, '2024-06-25 12:20:01', 0),
(34, '::1', 'kampret24', NULL, '2024-06-25 12:20:09', 0),
(35, '::1', 'kampret@gmail.com', 4, '2024-06-25 12:20:25', 1),
(36, '::1', 'ptadcmanokwari', NULL, '2024-06-25 12:20:48', 0),
(37, '::1', 'kampret24', NULL, '2024-06-25 12:20:56', 0),
(38, '::1', 'kampret24', NULL, '2024-06-25 12:21:59', 0),
(39, '::1', 'kampret24', NULL, '2024-06-25 12:22:01', 0),
(40, '::1', 'kampret24', NULL, '2024-06-25 12:22:04', 0),
(41, '::1', 'kampret24', NULL, '2024-06-25 12:22:11', 0),
(42, '::1', 'erwin@gmail.com', 5, '2024-06-25 12:22:45', 1),
(43, '::1', 'erwin@gmail.com', 5, '2024-06-25 12:22:59', 1),
(44, '::1', 'kampret24', NULL, '2024-06-25 12:23:25', 0),
(45, '::1', 'kampret@gmail.com', 4, '2024-06-25 12:23:34', 1),
(46, '::1', 'kampret@gmail.com', 4, '2024-06-25 12:23:50', 1),
(47, '::1', 'kampret@gmail.com', 4, '2024-06-25 12:25:07', 1),
(48, '::1', 'kampret24', NULL, '2024-06-25 12:25:19', 0),
(49, '::1', 'kampret24', NULL, '2024-06-25 12:26:16', 0),
(50, '::1', 'kampret24', NULL, '2024-06-25 12:26:31', 0),
(51, '::1', 'kampret@gmail.com', 4, '2024-06-25 12:26:35', 1),
(52, '::1', 'kampret@gmail.com', 4, '2024-06-25 12:32:25', 1),
(53, '::1', 'kampret24', NULL, '2024-06-25 12:32:48', 0),
(54, '::1', 'kampret@gmail.com', 4, '2024-06-25 12:38:22', 1),
(55, '::1', 'kampret@gmail.com', 4, '2024-06-25 12:49:14', 1),
(56, '::1', 'kampret@gmail.com', 4, '2024-06-25 13:23:37', 1),
(57, '::1', 'kampret@gmail.com', 4, '2024-06-25 16:13:23', 1),
(58, '::1', 'kampret@gmail.com', 4, '2024-06-25 16:33:24', 1),
(59, '::1', 'kampret@gmail.com', 4, '2024-06-26 01:08:25', 1),
(60, '::1', 'kampret@gmail.com', 4, '2024-06-26 01:17:42', 1),
(61, '::1', 'kampret@gmail.com', 4, '2024-06-26 08:08:09', 1),
(62, '::1', 'kampret@gmail.com', 4, '2024-06-27 07:42:18', 1),
(63, '::1', 'kampret@gmail.com', 4, '2024-06-27 13:08:08', 1),
(64, '::1', 'kampret@gmail.com', 4, '2024-06-27 23:57:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1719030807, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_gallery`
--

CREATE TABLE `t_gallery` (
  `id` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_show_home` int(1) NOT NULL,
  `kategori` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_products`
--

CREATE TABLE `t_products` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `harga` varchar(45) NOT NULL,
  `is_popular` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_products`
--

INSERT INTO `t_products` (`id`, `nama`, `gambar`, `harga`, `is_popular`) VALUES
(21, 'Ucapan Happy Wedding', '1719474295_486d2e032e16f636abc2.jpg', '1.000.000', 1),
(22, 'Ucapan Selamat - uk. 200 x 110', '1719145654_7df481eeb93f601b2935.jpg', '1.500.000', 1),
(23, 'Ucapan Duka - uk. 90 x 60', '1719145663_41953fc9ad7461a2db86.jpg', '300.000', 0),
(24, 'Ucapan Selamat - uk. 244 x 122', '1719145673_e277de5476f3e4bd21bd.jpg', '2.000.000', 1),
(25, 'Ucapan Duka - uk. 244 x 122', '1719145683_eb9038613da1c4e2739b.jpg', '2.500.000', 0),
(26, 'Ucapan Duka - uk. 120 x 85', '1719145695_110cc570240f6bb4e830.jpg', '500.000', 0),
(27, 'Ucapan Selamat - uk. 155 x 110', '1719145706_eec945ea1446080627d3.jpg', '1.000.000', 1),
(28, 'Ucapan Duka - uk. 135 x 95', '1719145715_3f6a2c300c30c49a7419.jpg', '800.000', 1),
(43, 'Ucapan Selamat dan Sukses - uk. 100 x 200', '1719371797_4770a8d5d82126a55fbf.jpg', '200.000', 1),
(46, 'dewrerer', '1719374939_0833469ca23942bbacb5.png', '4343435345', 0),
(48, 'wereterdfgdfgd', '1719495022_51963b5157ebf9ec38ec.png', 'Rp. 1.500.000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_settings`
--

CREATE TABLE `t_settings` (
  `id` int(11) NOT NULL,
  `parameter` varchar(45) NOT NULL,
  `nilai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_settings`
--

INSERT INTO `t_settings` (`id`, `parameter`, `nilai`) VALUES
(1, 'site-title', 'Karangan Bunga Manokwari'),
(2, 'site-desc', 'Spesialis Bunga Papan Manokwari'),
(3, 'instagram', 'karangan_bunga_manokwari'),
(4, 'facebook', 'Karangan_Bunga_Manokwari'),
(5, 'whatsapp', '+6282199190971'),
(6, 'favicon', 'frontend/assets/img/settings/favicon_io/favicon.ico'),
(7, 'favicon-apple', 'frontend/assets/img/settings/favicon_io/apple-touch-icon.png'),
(8, 'logo', 'frontend/assets/img/settings/logokarbumanokwari.png'),
(9, 'alamat', 'Latando, Jl. Yos Sudarso, Kab. Manokwari, Papua Barat 98312'),
(10, 'website', 'https://karanganbungamanokwari.com'),
(11, 'text-tentang', 'Toko Karangan Bunga Manokwari berbagai macam karangan bunga atau papan ucapan kualitas terbaik dengan desain cantik serta bisa di-custom sesuai permintaan pemesan. Melayani pemesanan karangan bunga untuk berbagai kebutuhan, seperti acara Pernikahan/Wedding, Ulang Tahun, Anniversary, Pelantikan, Peresmian, Grand Opening,  HUT, dan acara lainnya.\r\n<br><br>\r\nTersedia berbagai ukuran dan warna bunga. Dengan tenaga perangkai yang andal dan terampil, kami selalu menjaga kualitas produk karangan bunga yang kami buat demi kepuasan dan kepercayaan customer. Toko Karangan Bunga Manokwari tidak hanya melayani customer di wilayah Manokwari, tetapi juga juga dapat mengirimkan bunga ke wilayah lain di Papua Barat.\r\n<br><br>\r\nKami siap melayani pemesanan 24 jam per 7 hari dan memberikan harga yang terbaik untuk Anda.'),
(12, 'text-produk', 'Kami menyediakan berbagai produk yang bisa Anda sesuaikan dengan kebutuhan. Kategori yang kami siapkan bervariasi. Anda dapat melihatnya di bawah ini!'),
(13, 'text-galeri', 'Berikut ini adalah galeri produk yang kami tawarkan untuk Anda. Kami siap melayani jika Anda memiliki permintaan khusus dalam mendesain bunga papan.'),
(14, 'text-kontak', 'Berikut ini adalah galeri produk yang kami tawarkan untuk Anda. Kami siap melayani jika Anda memiliki permintaan khusus dalam mendesain bunga papan.'),
(15, 'text-slider', 'Papan Bunga, Standing Flower, Bucket Bunga, Bunga Meja'),
(16, 'alamat1', 'Latando, Jl. Yos Sudarso, Kab. Manokwari, Papua Barat 98312'),
(17, 'alamat2', 'Jalan Poros Aimasi (Dekat Jembatan Aimasi) Distrik Prafi Kab. Manokwari'),
(18, 'gambartoko1', 'uploads/sistem/1719496622_86c67f19ab1953287db8.png'),
(19, 'gambartoko2', 'uploads/sistem/1719496618_07cc4eb11943bffe02d2.png'),
(20, 'linkalamat1', 'https://maps.app.goo.gl/4yjbmWPxmNBR5MVB9'),
(21, 'linkalamat2', 'https://maps.app.goo.gl/4yjbmWPxmNBR5MVB9'),
(22, 'text-welcome', 'Jadikan setiap momen berharga dengan karangan bunga istimewa dari kami. Kami selalu berinovasi dan berkreasi untuk menciptakan rangkaian bunga yang menarik dan berkesan bagi Anda. Berikut ini beberapa jenis produk dan jasa yang kami tawarkan, segera pesan dan kami siap untuk melayani Anda.');

-- --------------------------------------------------------

--
-- Table structure for table `t_slider`
--

CREATE TABLE `t_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `img` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_slider`
--

INSERT INTO `t_slider` (`id`, `title`, `subtitle`, `img`, `is_active`) VALUES
(28, '', '', '1719371513_1af4b44bcf82211083e4.png', 1),
(29, '', '', '1719371521_9ab312b60b4845607417.png', 1),
(30, '', '', '1719377156_d62dd62e7715712edde4.png', 0),
(31, '', '', '1719391571_f910b7df09fd0c6671d3.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_testimoni`
--

CREATE TABLE `t_testimoni` (
  `id` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sakarep@gmail.com', 'sakarep', '$2y$10$6LbuNN4zNY/0ZN9KpIJzZONCq2I9kYSl1h22cz97mwi46WkMfBrVG', NULL, NULL, NULL, '24615eda82c27a12af0e4cdc31be6167', NULL, NULL, 0, 0, '2024-06-22 09:44:12', '2024-06-22 09:44:12', NULL),
(2, 'sakarep09mu@gmail.com', 'sakarep99', '$2y$10$4gadZvaLaKGDFMfQFKEtVOjpBgzDuSC0HHojxltxMX9649gkgTzQm', NULL, NULL, NULL, 'a94f4496c83ccc3d3b838ab5fe3b6fc3', NULL, NULL, 0, 0, '2024-06-22 09:45:08', '2024-06-22 09:45:08', NULL),
(3, 'kambingkuda@gmail.com', 'cobacoba', '$2y$10$b/w3mc7T2wnDYrk28aPuNuq4K9rCaPryGuoTnszpGyqSb6coR4Jua', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-06-22 09:50:26', '2024-06-22 09:50:26', NULL),
(4, 'kampret@gmail.com', 'kampret2024', '$2y$10$aYs.uLnjEmxHrS/.s1R.NOaUl9TzwpiiPiNhk1NjSAU4xgXA393oa', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-06-22 16:34:34', '2024-06-22 16:34:34', NULL),
(5, 'erwin@gmail.com', 'erwin123', '$2y$10$mTBJjFQ7Taon5W1/j2ilY.3mX9j9o87018xlNG4W9d/d3Nr8ZXrVq', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-06-24 14:32:55', '2024-06-24 14:32:55', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_gallery`
--
ALTER TABLE `t_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_products`
--
ALTER TABLE `t_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_settings`
--
ALTER TABLE `t_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_slider`
--
ALTER TABLE `t_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_testimoni`
--
ALTER TABLE `t_testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_gallery`
--
ALTER TABLE `t_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `t_products`
--
ALTER TABLE `t_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `t_settings`
--
ALTER TABLE `t_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `t_slider`
--
ALTER TABLE `t_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `t_testimoni`
--
ALTER TABLE `t_testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
