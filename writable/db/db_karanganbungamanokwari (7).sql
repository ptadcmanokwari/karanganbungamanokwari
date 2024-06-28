-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2024 at 08:01 PM
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
(64, '::1', 'kampret@gmail.com', 4, '2024-06-27 23:57:15', 1),
(65, '::1', 'erwin@gmail.com', 5, '2024-06-28 02:54:47', 1),
(66, '::1', 'erwin@gmail.com', 5, '2024-06-28 03:14:02', 1),
(67, '::1', 'erwin@gmail.com', 5, '2024-06-28 06:50:51', 1),
(68, '::1', 'erwin@gmail.com', 5, '2024-06-28 14:59:37', 1);

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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(5) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file_name`, `created_at`, `updated_at`) VALUES
(1, '1719577912_6bfdf7ecf27e6d275dbe.jpg', NULL, NULL),
(2, '1719578270_1a14092798dfe3da7499.jpg', NULL, NULL),
(3, '1719578430_7abdd48c766dcda3180e.jpg', NULL, NULL),
(4, '1719578694_fb0dc40884b0f8aceb7e.jpg', NULL, NULL),
(5, '1719580179_285eb0ec1ae7474f4a00.jpg', NULL, NULL),
(6, '1719580395_d960f66acf8266cf07e7.jpg', NULL, NULL),
(7, '1719580447_16c8f34d37b30cd3dcf0.jpg', NULL, NULL),
(8, '1719580448_b172010555f4b7237085.jpg', NULL, NULL),
(9, '1719580647_46a115c8470ca3fc1d01.jpg', NULL, NULL),
(10, '1719580867_0b180007845af967f442.jpg', NULL, NULL),
(11, '1719585621_ac9a284679312a829001.jpg', NULL, NULL),
(12, '1719585896_b7515839550095efc7dc.jpg', NULL, NULL),
(13, '1719586198_c987219e367b010813ec.jpg', NULL, NULL);

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
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1719030807, 1),
(2, '2023-06-28-100000', 'App\\Database\\Migrations\\CreateImagesTable', 'default', 'App', 1719576674, 2);

-- --------------------------------------------------------

--
-- Table structure for table `t_gallery`
--

CREATE TABLE `t_gallery` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_show_home` int(1) NOT NULL,
  `kategori` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_gallery`
--

INSERT INTO `t_gallery` (`id`, `img`, `is_active`, `is_show_home`, `kategori`) VALUES
(128, '1719591403_e47b8187a10aafba58c7.jpg', 0, 0, 'Bunga A'),
(129, '1719591429_caf3cd76b4a5f9ceafec.jpg', 0, 0, ''),
(130, '1719591453_6b4d58ae79b2c5a4add1.jpg', 0, 0, 'Bunga B'),
(131, '1719591480_fdf7e1b36f328d3933f5.jpg', 0, 0, 'Bunga C'),
(132, '1719591497_125860a071bd6e65e102.jpg', 0, 0, 'Bunga D'),
(133, '1719591520_2a0236a7a7f75c323f62.jpg', 0, 0, 'Bunga E'),
(134, '1719591891_1de40e7348865351fc27.jpg', 0, 0, 'Bunga A'),
(135, '1719592062_1f406af0c53c3e70b4d5.jpg', 0, 0, 'Bunga A'),
(136, '1719592129_a03a1e6ea26a1b4e87bf.jpg', 0, 0, 'Bunga B'),
(137, '1719592317_b9ebecf2b8ddcea9c856.jpg', 0, 0, 'Bunga C'),
(138, '1719592488_234763d60fe6cc9fbaa6.jpg', 0, 0, 'Bunga D'),
(139, '1719592618_242126bb5da9025586a6.jpg', 0, 0, 'Bunga E'),
(140, '1719592860_06128fa5b3de47bce799.jpg', 0, 0, 'Bunga B'),
(141, '1719593479_cf9cb412e9a04d262d63.jpg', 0, 0, 'Bunga B'),
(142, '1719593549_8a11a0bbd44a73089604.jpg', 0, 0, 'Laptop'),
(143, '1719593610_05bf4d3ee48006d61d76.jpg', 0, 0, 'Bunga C'),
(146, '1719594703_f822199851fe380397b4.jpg', 1, 1, ''),
(147, '1719594703_36a123845c25ffa60056.jpg', 1, 1, ''),
(148, '1719594703_34f4b0fa7b2dd681e4ce.jpg', 1, 1, ''),
(149, '1719594703_87dd754d81f59f974d36.jpg', 1, 1, ''),
(150, '1719594703_083ba6ae469b25fe0918.jpg', 1, 1, ''),
(151, '1719594972_84c2339fd6dad0caa87b.jpg', 1, 1, ''),
(152, '1719594972_9d1a4ccc95e65f0728b2.jpg', 1, 1, ''),
(153, '1719594972_d8367b8c6a221db99762.jpg', 1, 1, ''),
(155, '1719595175_9d3acbf6653bd2fdf9a7.jpg', 1, 1, 'Sekolah Saja'),
(156, '1719595429_7032fa41240229190795.webp', 1, 1, ''),
(157, '1719595430_4fe60c579479c3798993.webp', 1, 1, ''),
(158, '1719595430_d33b4e734f3fb3756805.webp', 1, 1, ''),
(159, '1719595430_33565dc1bfdf838dcf57.jpg', 1, 1, ''),
(160, '1719595430_0e0b40a7c121104e323c.jpg', 1, 1, ''),
(161, '1719595430_d1cb45cee8b407cf7ec4.webp', 1, 1, ''),
(162, '1719595430_04c0f56515976ae7f39f.png', 1, 1, ''),
(163, '1719595431_028a5931b24d2e8e5eef.jpg', 1, 1, ''),
(164, '1719595431_25ecd694e19d81a3fbc4.jpeg', 1, 1, ''),
(165, '1719595677_0287dfda2c0bbc5f6b80.jpg', 1, 1, ''),
(166, '1719595800_7f74c0c3bf0313884342.jpg', 1, 1, ''),
(167, '1719595800_cf27e530fecb8068dfa2.jpg', 1, 1, ''),
(168, '1719595800_67f86821b6ce31982b62.webp', 1, 1, ''),
(169, '1719595800_ae7beb5d40185db076b3.jpg', 1, 1, ''),
(170, '1719595800_26438d0e41b27dcc012a.jpg', 1, 1, ''),
(171, '1719595957_0d17e43f6623cfe0a79f.jpg', 1, 1, 'dfdsf sdfdsf'),
(172, '1719595984_f556182ee930906d1e05.jpg', 1, 1, ''),
(173, '1719595984_caaea185adedf35a2ea7.jpg', 1, 1, ''),
(174, '1719595985_01decb60e0103c22655d.jpg', 1, 1, ''),
(175, '1719595985_1b406d9e926cf8d0511d.webp', 1, 1, ''),
(176, '1719596181_1e5688238a1d8e816e3d.webp', 1, 1, 'sdasd asdsad'),
(177, '1719596181_2a1e5d364ca3bf5b0364.webp', 1, 1, 'sdasd asdsad'),
(178, '1719596213_4c4234cbc65291247def.webp', 1, 1, 'Laptop XXXX'),
(179, '1719596213_64f30190729a4af022c2.jpeg', 1, 1, 'Laptop XXXX'),
(180, '1719596213_3b18d04230ada984306d.jpg', 1, 1, 'Laptop XXXX'),
(181, '1719596214_3dbb656af0d2ffe4e973.jpg', 1, 1, 'Laptop XXXX'),
(182, '1719596214_99df2789b871074a10ca.jpg', 1, 1, 'Laptop XXXX'),
(183, '1719596214_e993c050c720e44df28c.jpg', 1, 1, 'Laptop XXXX'),
(184, '1719596214_b9e049a7c34a07bd18d0.png', 1, 1, 'Laptop XXXX');

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
(49, 'Bunga Papan Ukuran 2M x 1.5M', '1719594047_11435fe90d30034178ff.jpg', 'Rp. 5.000.000', 1);

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
(22, 'text-welcome', 'Jadikan setiap momen berharga dengan karangan bunga istimewa dari kami. Kami selalu berinovasi dan berkreasi untuk menciptakan rangkaian bunga yang menarik dan berkesan bagi Anda. Berikut ini beberapa jenis produk dan jasa yang kami tawarkan, segera pesan dan kami siap untuk melayani Anda.'),
(23, 'text-testimonials', 'Beri tahu kami apa yang Anda rasakan, beri tahu yang lain tentang pengalaman Anda. Berikut penilaian-penilaian dari customer kami. Kami senang mendengar dari Anda dan berharap dapat membantu Anda.');

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
(32, 'asdasd', 'sadasd', '1719567600_d942ec322d77a7e7bb1d.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_testimoni`
--

CREATE TABLE `t_testimoni` (
  `id` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_testimoni`
--

INSERT INTO `t_testimoni` (`id`, `gambar`, `is_active`) VALUES
(8, '1719566116_220e31ca8e3ee707ae67.jpg', 1),
(9, '1719566116_bc75b798c2f0e9b67c74.jpg', 1),
(10, '1719566116_f67cb4b683fc9459eb21.jpeg', 1),
(11, '1719566386_9033b68222d8502a5f4d.jpg', 1),
(12, '1719566386_ba632a7435cd80b651ad.jpg', 1),
(13, '1719566386_8a0b486c985ff602fac0.jpeg', 1);

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
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

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
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_gallery`
--
ALTER TABLE `t_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `t_products`
--
ALTER TABLE `t_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `t_settings`
--
ALTER TABLE `t_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `t_slider`
--
ALTER TABLE `t_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `t_testimoni`
--
ALTER TABLE `t_testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
