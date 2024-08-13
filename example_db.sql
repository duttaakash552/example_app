-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2024 at 08:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `example_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_posts`
--

CREATE TABLE `category_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `parent_category` varchar(50) DEFAULT NULL,
  `category_type` varchar(50) NOT NULL DEFAULT 'post',
  `image` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `updated_by` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_posts`
--

INSERT INTO `category_posts` (`id`, `name`, `slug`, `parent_category`, `category_type`, `image`, `description`, `status`, `updated_by`, `created_at`, `updated_at`) VALUES
(5, 'Uncategorized', 'uncategorized', NULL, 'post', 'category_1721217211.jpg', '<p>djdkjs&nbsp;<strong>fgdfgdf&nbsp;</strong>dfgdfgd</p>', 'active', 1, '2024-07-05 06:25:56', '2024-07-17 11:53:31'),
(6, 'House', 'house', '5', 'post', 'category_1721026158.jpg', '<p>Test <strong>Modification</strong></p>', 'active', 1, '2024-07-05 06:32:32', '2024-07-15 06:49:18'),
(7, 'Furniture', 'furniture', '6', 'post', 'category_1720423585.jpg', '<h2 style=\"margin: 0px 0px 10px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px; text-align: left; color: rgb(0, 0, 0); font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" id=\"isPasted\">Why do we use it?</h2><p style=\'margin: 0px 0px 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\'>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'active', 1, '2024-07-05 06:33:51', '2024-07-08 07:26:25'),
(8, 'Chair', 'chair', '7', 'post', 'category_1720423665.jpg', '<p>hkjhkj kjhjgj guytuty&nbsp;<span style=\"color: rgb(209, 72, 65);\">uytutyu tutyu</span> gjhgf</p>', 'active', 1, '2024-07-05 07:01:18', '2024-07-08 07:27:45'),
(9, 'Tool', 'tool', '7', 'post', 'category_1720423677.jpg', '<p>fdgdfdf dfhdfgdg dfbgdfg</p>', 'active', 1, '2024-07-05 07:44:29', '2024-07-08 07:27:57'),
(10, 'Blog', 'blog', NULL, 'post', NULL, NULL, 'active', 1, '2024-07-09 10:30:51', '2024-07-09 10:30:51'),
(11, 'Camden', 'camden', NULL, 'area', 'category_1721021514.jpg', NULL, 'active', 1, '2024-07-15 05:31:54', '2024-07-15 05:31:54'),
(14, 'Boston', 'boston', NULL, 'area', 'category_1721106094.jpg', 'test', 'active', 1, '2024-07-16 05:01:34', '2024-07-16 05:01:34'),
(15, 'fdgdfg', 'fdgdfg', '5', 'post', 'category_1721217233.jpg', '<p>zxcvxz</p>', 'active', 1, '2024-07-17 11:53:53', '2024-07-17 11:53:53');

-- --------------------------------------------------------

--
-- Table structure for table `category_post_tbls`
--

CREATE TABLE `category_post_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `post_id` int(10) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_post_tbls`
--

INSERT INTO `category_post_tbls` (`id`, `category_id`, `post_id`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 6, 0, 1, '2024-07-09 11:13:05', '2024-07-09 11:13:05'),
(5, 10, 0, 1, '2024-07-09 11:13:05', '2024-07-09 11:13:05'),
(12, 11, 0, 1, '2024-07-15 06:01:45', '2024-07-15 06:01:45'),
(13, 11, 0, 1, '2024-07-15 06:16:25', '2024-07-15 06:16:25'),
(14, 14, 0, 1, '2024-07-19 13:26:51', '2024-07-19 13:26:51'),
(15, 14, 0, 1, '2024-07-19 13:26:51', '2024-07-19 13:26:51'),
(16, 14, 0, 1, '2024-07-19 13:28:17', '2024-07-19 13:28:17'),
(17, 5, 0, 1, '2024-07-24 09:21:22', '2024-07-24 09:21:22'),
(31, 6, 0, 1, '2024-08-02 05:53:14', '2024-08-02 05:53:14'),
(32, 7, 0, 1, '2024-08-02 05:53:14', '2024-08-02 05:53:14'),
(33, 10, 0, 1, '2024-08-02 05:53:15', '2024-08-02 05:53:15'),
(34, 5, 0, 1, '2024-08-02 06:03:16', '2024-08-02 06:03:16'),
(35, 6, 0, 1, '2024-08-02 06:03:16', '2024-08-02 06:03:16'),
(42, 5, 30, 1, '2024-08-02 06:21:19', '2024-08-02 06:21:19'),
(43, 6, 30, 1, '2024-08-02 06:21:19', '2024-08-02 06:21:19'),
(44, 7, 30, 1, '2024-08-02 06:21:19', '2024-08-02 06:21:19'),
(47, 5, 32, 1, '2024-08-02 06:31:11', '2024-08-02 06:31:11'),
(48, 6, 32, 1, '2024-08-02 06:31:11', '2024-08-02 06:31:11'),
(49, 10, 32, 1, '2024-08-02 06:31:11', '2024-08-02 06:31:11'),
(52, 6, 14, 1, '2024-08-06 09:37:07', '2024-08-06 09:37:07'),
(53, 10, 14, 1, '2024-08-06 09:37:07', '2024-08-06 09:37:07');

-- --------------------------------------------------------

--
-- Table structure for table `contact_enquiries`
--

CREATE TABLE `contact_enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `phone` varchar(55) NOT NULL,
  `message` varchar(250) NOT NULL,
  `enquiry_type` varchar(55) NOT NULL,
  `page_link` varchar(255) NOT NULL,
  `page_title` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_enquiries`
--

INSERT INTO `contact_enquiries` (`id`, `name`, `email`, `phone`, `message`, `enquiry_type`, `page_link`, `page_title`, `created_at`, `updated_at`) VALUES
(1, 'gdfgdf', 'admin@gmail.com', '+445214562541', 'sdsd fgdf', 'Contact', '', '', '2024-07-19 06:34:10', '2024-07-19 06:34:10'),
(2, 'fdgdf gf', 'dfg@dgfdf.gdfgf', '+445201256541', 'sdsdg sgsdfg', 'Contact', '', '', '2024-07-19 06:39:32', '2024-07-19 06:39:32'),
(3, 'ggxcx dasfsd', 'sgdfg@dgdf.dggh', '+442514565215', 'dfgdfg dfgdf', 'Contact', '', '', '2024-07-19 07:06:05', '2024-07-19 07:06:05'),
(4, 'sdfsd', 'sdds@sdf.dgf', '+445214523425', 'gfhfg sfgf', 'Contact', '', '', '2024-07-24 06:55:53', '2024-07-24 06:55:53'),
(5, 'fdfgdf', 'fdgdf@fgdf.sdfg', '+445845265852', 'dfsdf sdfgfsg', 'Contact', '', '', '2024-07-30 06:23:53', '2024-07-30 06:23:53'),
(6, 'dfgfd', 'dfggd@dfgdf.gfh', '+448521025658', 'fgdfg dfbgdg', 'Contact', '', '', '2024-07-30 06:24:35', '2024-07-30 06:24:35'),
(7, 'dfgdfs', 'sdfs@ghfgh.gjj', '+448563259656', 'dgfhfh gfhf', 'Contact', '', '', '2024-08-13 00:20:21', '2024-08-13 00:20:21'),
(8, 'jhfyt', 'gtuy@hgfhg.hgfh', '+448521236589', 'gyuty iuyij', 'Contact Us', 'http://localhost/example-app/contact-us', 'Contact Us', '2024-08-13 00:29:49', '2024-08-13 00:29:49'),
(9, 'gdfgdf dfg', 'sfsd@sfdsgd.gfh', '+442514523652', 'dhfgh gjghj', 'Contact Us', 'http://localhost/example-app/contact-us', 'Contact Us', '2024-08-13 00:47:52', '2024-08-13 00:47:52'),
(10, 'dfgdf', 'fgdf@dgdgfh.ghj', '+441250365854', 'ghj ffghfg', 'Contact Us', 'http://localhost/example-app/contact-us', 'Contact Us', '2024-08-13 00:50:35', '2024-08-13 00:50:35');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
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
-- Table structure for table `medias`
--

CREATE TABLE `medias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(250) NOT NULL,
  `updated_by` int(10) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medias`
--

INSERT INTO `medias` (`id`, `image`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'media_11721039061.jpg', 1, 'deleted', '2024-07-15 04:54:21', '2024-07-15 04:54:21'),
(2, 'media_21721039061.jpg', 1, 'deleted', '2024-07-15 04:54:21', '2024-07-15 04:54:21'),
(3, 'media_31721039061.jpg', 1, 'deleted', '2024-07-15 04:54:21', '2024-07-15 04:54:21'),
(4, 'media_41721039061.jpg', 1, 'deleted', '2024-07-15 04:54:21', '2024-07-15 04:54:21'),
(5, 'media_51721039061.jpg', 1, 'deleted', '2024-07-15 04:54:21', '2024-07-15 04:54:21'),
(6, 'media_11721039081.jpg', 1, 'deleted', '2024-07-15 04:54:41', '2024-07-15 04:54:41'),
(7, 'media_11721041105.jpg', 1, 'active', '2024-07-15 05:28:25', '2024-07-15 05:28:25'),
(10, 'media_31721044480.jpg', 1, 'deleted', '2024-07-15 06:24:40', '2024-07-15 06:24:40'),
(11, 'media_11721044501.jpg', 1, 'active', '2024-07-15 06:25:01', '2024-07-15 06:25:01'),
(12, 'media_11721044556.jpg', 1, 'deleted', '2024-07-15 06:25:56', '2024-07-15 06:25:56'),
(15, 'media_11721048248.jpg', 1, 'active', '2024-07-15 07:27:28', '2024-07-15 07:27:28'),
(16, 'media_21721048248.jpg', 1, 'active', '2024-07-15 07:27:28', '2024-07-15 07:27:28'),
(17, 'media_31721048248.jpg', 1, 'active', '2024-07-15 07:27:28', '2024-07-15 07:27:28'),
(18, 'media_41721048249.jpg', 1, 'active', '2024-07-15 07:27:29', '2024-07-15 07:27:29'),
(19, 'media_51721048249.jpg', 1, 'active', '2024-07-15 07:27:29', '2024-07-15 07:27:29');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_07_03_093855_create_categories_table', 2),
(5, '2024_07_04_062740_create_roles_table', 3),
(6, '2024_07_04_091731_create_settings_table', 4),
(7, '2024_07_05_054358_create_category_posts_table', 5),
(8, '2024_07_05_113907_create_posts_table', 6),
(9, '2024_07_08_103036_create_templates_table', 7),
(10, '2024_07_08_104607_create_pages_table', 8),
(11, '2024_07_09_104505_create_category_post_tbls_table', 9),
(12, '2024_07_10_111141_create_contact_enquiries_table', 10),
(13, '2024_07_11_085654_create_widgets_table', 11),
(14, '2024_07_12_132303_create_menuses_table', 12),
(15, '2024_07_12_132552_create_menues_table', 13),
(16, '2024_07_15_071802_create_medias_table', 14),
(17, '2024_07_16_052604_create_post_meta_elements_table', 15),
(18, '2024_07_16_092211_create_post_metas_table', 16),
(19, '2024_07_16_134235_create_contact_forms_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(10) NOT NULL DEFAULT 0,
  `title` varchar(55) NOT NULL,
  `slug` varchar(55) NOT NULL,
  `template` int(10) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `ckeck_menu` enum('0','1') NOT NULL DEFAULT '0',
  `updated_by` int(10) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `disable_link` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `parent_id`, `title`, `slug`, `template`, `description`, `image`, `ckeck_menu`, `updated_by`, `status`, `disable_link`, `created_at`, `updated_at`) VALUES
(1, 0, 'About Us', 'about-us', 2, '<p>How can you make the most of this integral part of your marketing strategy? In this article, discover what makes an exceptional About Us page and find 25 examples to inspire your own page design and content.</p><p>[test]</p><p>&nbsp;What Makes A Great About Us Page? There is no definitive template for creating a great About Us page. However, I found four key components to making a compelling narrative with your brand story.</p><div>[faq]</div><p>Your Vision And Mission There is rarely a need to outright say, &ldquo;Our vision/mission is ____,&rdquo; but you ought to convey the purpose of your business in your About Us copy.</p><p>[test]</p>', 'page_1720510608.jpg', '1', 1, 'active', '0', '2024-07-09 07:36:48', '2024-07-19 06:29:58'),
(2, 1, 'Our Team', 'our-team', 2, '<p>This is dummy text</p>', 'page_1720766219.jpg', '1', 1, 'active', '0', '2024-07-12 06:36:59', '2024-07-19 04:53:04'),
(7, 1, 'Our Team 2', 'our-team-2', 1, '<section class=\"inner_banner\"><picture><img src=\"images/lasik-eye-surgery-banner.jpg\" class=\"img-fluid w-100 wow fadeIn img_banner fr-fic fr-dii\" data-wow-delay=\"0.3s\" alt=\"\"></picture><div class=\"banner_content\"><div class=\"container\"><div class=\"row\"><div class=\"col-xl-7 col-lg-9\"><span class=\"wow fadeInUp\" data-wow-delay=\"0.5s\">LASIK Eye Surgery</span></div></div></div></div></section><div><div class=\"fas fa-band-aid\"><br></div></div><section class=\"lasik_first\"><div class=\"container\"><div class=\"row justify-content-center\"><div class=\"col-lg-12\"><span>Laser In-Situ Keratomileusis or LASIK is a popular surgical procedure used for vision correction in the patients with long-sightedness, short-sightedness and astigmatism. Any patient with 90% of poor eyesight can undergo this safe procedure to obtain outstanding result in 48 hours.</span></div></div></div></section><section class=\"lasik_sec\"><div class=\"container\"><div class=\"row justify-content-between align-items-center\"><div class=\"col-xl-6 col-lg-6\"><h2 class=\"min_title wow fadeInUp\" data-wow-delay=\"0.2s\"><span>What involves in</span>LASIK Eye Surgery in New York?</h2><p>Our eyes can see objects because of access of light through the cornea (front part of eye). Cornea focuses the light on retina to send the information to brain through optic nerve for interpretation. If the object forms in front of the retina it leads to short-sightedness and if it focuses behind the retina it leads to long-sightedness.</p><p>LASIK uses a laser for correcting the corneal shape so that image forms on the retina directly enabling patients to see things without glasses or contact lenses. We at Vision Cure Clinic make use of modern day LASIK. It uses only laser for the procedure and no blade. The primary laser is femtosecond creates the thin flap and another laser, excimer laser corrects the prescription. Due to minimal incision it takes only a few minutes and enables fast recovery. Better prescription can be achieved within 48 hours.&nbsp; &nbsp;</p><p>Arrange an appointment with our ophthalmologist today!</p><a href=\"#\" class=\"btn min_btn wow fadeInUp\" data-wow-delay=\"0.7s\">Book Now <img src=\"images/right_arrow_white.png\" class=\"img-fluid fr-fic fr-dii\" alt=\"arrow\"></a></div><div class=\"col-xl-5 col-lg-6 mt-4 mt-lg-0 position-relative d-none d-md-block\"><picture class=\"wow fadeIn\" data-wow-delay=\"0.5s\"><img src=\"images/wha-iinvolves.jpg\" class=\"img-fluid w-100 fr-fic fr-dii\" alt=\"\"></picture> <picture class=\"wow fadeIn curcel_logo\" data-wow-delay=\"0.5s\"><img src=\"images/curcel_logo.png\" class=\"img-fluid fr-fic fr-dii\" alt=\"\"></picture></div></div></div></section><section class=\"our_various\"><div class=\"container\"><h2 class=\"min_title wow fadeInUp text-center mb-3 mb-md-4 mb-lg-5\" data-wow-delay=\"0.3s\">LASIK Eye Surgery Process</h2><div class=\"row\"><div class=\"col-lg-3 col-md-6 col-sm-6 mt-4\"><div class=\"eyesurgery_process\"><div class=\"eyesurgery_icon\"><img src=\"images/consultation-icon.png\" alt=\"Consultation\" class=\"fr-fic fr-dii\"></div><span>Consultation&nbsp;</span><p>Our ophthalmologist at Vision Cure Clinic will explain the procedure along with benefits and sets of risks. You can consider both risks and perks to make informed decision for your vision correction.</p></div></div><div class=\"col-lg-3 col-md-6 col-sm-6 mt-4\"><div class=\"eyesurgery_process\"><div class=\"eyesurgery_icon\"><img src=\"images/procedure-icon.png\" alt=\"Procedure\" class=\"fr-fic fr-dii\"></div><span>Procedure&nbsp;</span><p>LASIK is literally pain-free and needs around 10-15 minutes to finish. After applying anesthetic drop for numbing the eye, the surgeon uses femtosecond laser and excimer laser to create incision and corneal adjustment respectively. To keep the procedure accurate and safe, we use an advanced pupil tracking device. It makes the laser respond or stop if the eyes move. This is very helpful to reposition the eye in the end.</p></div></div><div class=\"col-lg-3 col-md-6 col-sm-6 mt-4\"><div class=\"eyesurgery_process\"><div class=\"eyesurgery_icon\"><img src=\"images/aftercare-icon.png\" alt=\"Aftercare\" class=\"fr-fic fr-dii\"></div><span>Aftercare&nbsp;</span><p>Temporary dryness is more likely to experience. Other short-lived side effects you may experience are reduced vision at night, glare and infection. Your ophthalmologist will prescribe eye drops to deal with infection and inflammation that moisturize the eye too. An ophthalmologist visit is must within 24-48 hours of the surgery.</p></div></div><div class=\"col-lg-3 col-md-6 col-sm-6 mt-4\"><div class=\"eyesurgery_process\"><div class=\"eyesurgery_icon\"><img src=\"images/recovery-icon.png\" alt=\"Recovery\" class=\"fr-fic fr-dii\"></div><span>Recovery&nbsp;</span><p>The recovery of LASIK is pretty fast and you will be instructed with a list of do&rsquo;s and don&rsquo;ts by our ophthalmologist. For example, you should not rub eyes, come in contact with water during the recovery and must protect eyes from dirt and dust.</p></div></div></div></div></section><section class=\"lasik_prepare\"><picture class=\"wow fadeIn d-none d-md-block\" data-wow-delay=\"0.4s\"><img src=\"images/prepare-for-lasik.jpg\" class=\"img-fluid w-100 preparelasik_bg fr-fic fr-dii\" alt=\"\"></picture><div class=\"lasik_in\"><div class=\"container\"><div class=\"row justify-content-end\"><div class=\"col-xl-6 col-lg-7 col-md-8\"><h2 class=\"min_title wow fadeInUp\" data-wow-delay=\"0.3s\">How Can You Prepare ForLASIK Surgery in The New York?</h2><p class=\"wow fadeInUp\" data-wow-delay=\"0.4s\">Before the procedure, you have to schedule an initial consultation with our ophthalmologist for assessment. During the appointment, your medical history and eye condition will be evaluated. You have to perform comprehensive tests like measurements of eye pressure, refraction, corneal mapping, corneal thickness and pupil dilation. Depending on your results, the ophthalmologist will arrange the appointment for LASIK.</p><p>You will be instructed not to put on gas permeable contact lenses for minimum 3 weeks prior to the assessment. Other kinds of lenses should be avoided 3 days before the eye exam. Carry your glasses along to the clinic for a check of your eye prescription. Eat a light meal and take all the medications on your LASIK surgery day.</p><p>Schedule a consultation with our ophthalmologist for your vision problem!</p><a href=\"#\" class=\"btn banner_find wow fadeInUp m-0\" data-wow-delay=\"0.5s\" data-bs-toggle=\"modal\" data-bs-target=\"#BookAppointment\">Book an Appointment <img src=\"images/right_arrow_white.png\" class=\"img-fluid fr-fic fr-dii\" alt=\"arrow\"></a></div></div></div></div></section><section class=\"benefits_lasik\"><div class=\"container\"><div class=\"row\"><div class=\"col-lg-6\"><h2 class=\"min_title wow fadeInUp\" data-wow-delay=\"0.3s\">What are The Benefits ofLASIK Eye Surgery?</h2><ul class=\"why_choose_list\"><li class=\"wow fadeInUp\" data-wow-delay=\"0.4s\">Improvement in vision is noticeable after 24 hours</li><li class=\"wow fadeInUp\" data-wow-delay=\"0.5s\">Fast recovery with high rate of success</li><li class=\"wow fadeInUp\" data-wow-delay=\"0.6s\">Minimal pain</li><li class=\"wow fadeInUp\" data-wow-delay=\"0.7s\">No need of bandages or stitches</li><li class=\"wow fadeInUp\" data-wow-delay=\"0.8s\">Adjustment is possible even after years of surgery for noticeable vision change due to aging</li><li class=\"wow fadeInUp\" data-wow-delay=\"0.9s\">Less dependency on spectacle and contact lens</li></ul></div><div class=\"col-lg-6 d-none d-lg-block\"><picture class=\"wow fadeIn d-none d-md-block\" data-wow-delay=\"0.4s\"><img src=\"images/benefits_lasik.jpg\" class=\"img-fluid w-100 fr-fic fr-dii\" alt=\"\"></picture></div></div></div></section><section class=\"side_effects_lasik text-center\"><div class=\"container\"><h2 class=\"min_title wow fadeInUp\" data-wow-delay=\"0.3s\">Potential Side Effects of LASIK Eye Surgery</h2><p>For the initial 24-48 hours of surgery, you are more likely to experience some slight discomfort and rare side effects including:</p><ul class=\"effects_list\"><li><p>Glare</p></li><li><p>Vision fluctuations</p></li><li><p>Eye dryness</p></li><li><p>Trouble to drive at night</p></li><li><p>Seeing halos around the objects</p></li></ul></div></section><section class=\"eye_sergery_unique\"><div class=\"container-fluid\"><div class=\"row\"><div class=\"col-xl-6 col-lg-6 d-none d-lg-block\"><picture class=\"wow fadeIn\" data-wow-delay=\"0.4s\"><img src=\"images/eyesergery_unique.jpg\" class=\"img-fluid w-100 fr-fic fr-dii\" alt=\"\"></picture></div><div class=\"col-xl-5 ps-xl-5 col-lg-6\"><h2 class=\"min_title wow fadeInUp\" data-wow-delay=\"0.3s\">What Makes Our LASIK Eye Surgery Unique?</h2><p class=\"wow fadeInUp\" data-wow-delay=\"0.4s\">Vision Cure Clinic is known for providing top-class surgery experience. Here&rsquo;s what makes our LASIK procedure unique:</p><ul class=\"why_choose_list\"><li class=\"wow fadeInUp\" data-wow-delay=\"0.4s\">Customized treatment- Every time, we create unique treatment plans for each patient by understanding their personal preference and visual requirements.</li><li class=\"wow fadeInUp\" data-wow-delay=\"0.5s\">Experienced ophthalmologists- Our clinic is run by the top ophthalmologists in the USA. Our anesthetists and nurses also have wealth of knowledge and experience.</li><li class=\"wow fadeInUp\" data-wow-delay=\"0.6s\">Cost-effective- Our LASIK surgery helps you to save money on contact lenses or glasses in the future.</li><li class=\"wow fadeInUp\" data-wow-delay=\"0.7s\">Remarkable result- Being the most efficient and safe, our ophthalmic consultant in New York can deliver 20/20 vision with LASIK surgery.</li><li class=\"wow fadeInUp\" data-wow-delay=\"0.8s\">Unusual prescription correction- We can address abnormal prescription or other conditions like presbyopia with LASIK giving beyond expected outcome.</li><li class=\"wow fadeInUp\" data-wow-delay=\"0.9s\">Advanced technology- We are equipped with most advanced technology to carry out the surgery with accuracy and precision.</li></ul><a href=\"#\" class=\"btn min_btn wow fadeInUp m-0\" data-wow-delay=\"0.5s\" data-bs-toggle=\"modal\" data-bs-target=\"#BookAppointment\">Book a Consultation <img src=\"images/right_arrow_white.png\" class=\"img-fluid fr-fic fr-dii\" alt=\"arrow\"></a></div></div></div></section><section class=\"side_effects_lasik technology_section text-center\"><div class=\"container\"><h2 class=\"min_title wow fadeInUp\" data-wow-delay=\"0.3s\">Our UniqueLASIK Eye Surgery Technology</h2><p>We at Vision Cure Clinic make use of faster laser to enhance safety and accuracy while completing the surgery in less time. Our LASIK eye surgery is all about wavefront-optimized, bladeless guided procedure that corrects your vision fast and conserves more eye tissue at the same time.</p><div class=\"row mt-2 mt-md-4\"><div class=\"col-md-6 mt-4\"><div class=\"technology_in\"><p>The Schwind Amaris 1050RS Excimer Laser- This German-made laser reshapes the cornea promoting tissue conservation up to 50% if compared to other available lasers in a short time.</p></div></div><div class=\"col-md-6 mt-4\"><div class=\"technology_in\"><p>The Ziemer Z-8 low energy Femtosecond laser- This Swiss-made laser is fast, accurate and precise in creating the flap giving minimal incision.</p></div></div></div></div></section><section class=\"lasik_prepare\"><picture class=\"wow fadeIn d-none d-md-block\" data-wow-delay=\"0.4s\"><img src=\"images/lasik_safe.jpg\" class=\"img-fluid w-100 prepare_bg fr-fic fr-dii\" alt=\"\"></picture><div class=\"lasik_in\"><div class=\"container\"><div class=\"row\"><div class=\"col-xl-6 col-lg-7 col-md-8\"><h2 class=\"min_title wow fadeInUp\" data-wow-delay=\"0.3s\">Is LASIK Completely Safe?</h2><p class=\"wow fadeInUp\" data-wow-delay=\"0.4s\">Millions of LASIK surgeries have been carried out successfully across the globe making it the most elective option to correct vision. The leverage of latest technology makes it more common to address diverse vision problems with least associated surgical risks. But alike other surgeries, some risks are involved with it. Our ophthalmologists have many years of experience to deal with various prescriptions and make the surgery successful.</p><h3>Laser Blended Vision</h3><p>LASIK is upgrading its version every day! Now, LASIK can treat presbyopia and patients with reading glass with this latest treatment option. It adjusts each eye prescription making one suitable for distant vision and another one for close vision. Brain slowly gets adapted to each eye to focus on various distances after the surgery.</p><h3>Bioptics</h3><p>If you have high prescription, then we can offer combined treatment called bioptics along with LASIK. Bioptics correct most refractive errors by using refractive lens exchange or implantable contact lenses. Z-LASIK will be used after the surgery to refine the remaining errors.</p><p>We have highly experienced and professional ophthalmologists and refractive surgeons in the New York to conduct bioptics as it needs expertise of multi-skilled surgeons.</p><p>If you need help for your vision correction and want to get it done by experienced ophthalmologists in the city then get in touch with us over the phone or online.</p><a href=\"#\" class=\"btn banner_find wow fadeInUp m-0\" data-wow-delay=\"0.5s\" data-bs-toggle=\"modal\" data-bs-target=\"#BookAppointment\">Book a Consultation <img src=\"images/right_arrow_white.png\" class=\"img-fluid fr-fic fr-dii\" alt=\"arrow\"></a></div></div></div></div></section>', 'page_1720778214.jpg', '1', 1, 'active', '0', '2024-07-12 09:56:54', '2024-08-07 06:32:24'),
(8, 0, 'Cms', 'cms', 2, '<p>This is cms page</p>', 'page_1720778272.jpg', '1', 1, 'active', '0', '2024-07-12 09:57:52', '2024-07-24 13:30:43'),
(9, 8, 'Test', 'test', 2, '<p>Hi</p>', 'page_1720778603.jpg', '1', 1, 'active', '0', '2024-07-12 10:03:23', '2024-07-12 10:03:23'),
(10, 0, 'Rolex', 'rolex', 1, '<p>This is watch</p>', 'page_1720778694.jpg', '1', 1, 'inactive', '1', '2024-07-12 10:04:54', '2024-08-07 05:50:24'),
(11, 0, 'Car', 'car', 2, '<p>Test</p>', 'page_1720780916.jpg', '1', 1, 'active', '0', '2024-07-12 10:41:56', '2024-07-12 10:41:56'),
(12, 1, 'Demo', 'demo', 1, '<p>fgdg</p>', 'page_1720854138.jpg', '1', 1, 'active', '0', '2024-07-12 13:18:55', '2024-07-13 07:57:53'),
(13, 1, 'gggf', 'gggf', 1, '<p>fgdg</p>', 'page_1720790522.jpg', '1', 1, 'deleted', '0', '2024-07-12 13:22:02', '2024-07-19 05:21:42'),
(14, 1, 'gggf', 'gggf', 1, '<p>fgdg</p>', 'page_1720790532.jpg', '1', 1, 'deleted', '0', '2024-07-12 13:22:12', '2024-07-19 05:21:57'),
(15, 1, 'abcg', 'abcg', 1, '<p>test</p>', 'page_1720791088.jpg', '1', 1, 'deleted', '0', '2024-07-12 13:31:28', '2024-07-19 05:22:31'),
(16, 11, 'vvxc', 'vvxc', 1, '<p>zxcxzc</p>', 'page_1720791139.jpg', '1', 1, 'deleted', '0', '2024-07-12 13:32:19', '2024-07-19 05:22:13'),
(17, 12, 'vgfhfg', 'vgfhfg', 1, '<p>dsfsd</p>', 'page_1720791165.jpg', '0', 1, 'deleted', '0', '2024-07-12 13:32:45', '2024-07-19 05:22:50'),
(18, 0, 'gfhfg', 'gfhfg', 2, '<p>gfhfgh</p>', 'page_1721366663.jpg', '0', 1, 'active', '0', '2024-07-12 13:42:32', '2024-07-19 05:24:23'),
(19, 0, 'India', 'india', 1, '<p>This is India</p>', 'page_1720855860.jpg', '1', 1, 'inactive', '1', '2024-07-13 07:31:00', '2024-08-07 05:45:36'),
(20, 19, 'West Bengal', 'west-bengal', 2, '<p>This is west bengal</p>', 'page_1720856016.jpg', '1', 1, 'inactive', '1', '2024-07-13 07:33:36', '2024-08-07 05:48:24'),
(21, 19, 'Kolkata', 'kolkata', 2, '<p>This is kolkata</p>', 'page_1720860111.jpg', '1', 1, 'active', '0', '2024-07-13 08:41:51', '2024-07-24 06:28:33'),
(22, 20, 'Barasat', 'barasat', 1, '<p>This is Barasat</p>', 'page_1720865710.jpg', '1', 1, 'inactive', '1', '2024-07-13 10:15:10', '2024-08-07 05:49:36'),
(23, 7, 'Our team 2 sub page', 'our-team-2-sub-page', 2, '<p>fsdfsd</p>', 'page_1720877427.jpg', '1', 1, 'active', '0', '2024-07-13 13:30:27', '2024-07-24 07:42:46'),
(24, 0, 'Home', 'home', 1, NULL, NULL, '0', 1, 'inactive', '0', '2024-07-23 12:05:20', '2024-07-23 12:05:41'),
(25, 0, 'Contact Us', 'contact-us', 1, NULL, NULL, '0', 1, 'inactive', '0', '2024-07-23 12:06:06', '2024-07-23 12:06:20'),
(26, 0, 'Thank You', 'thank-you', 1, NULL, NULL, '0', 1, 'inactive', '0', '2024-07-23 12:08:00', '2024-07-23 12:08:17'),
(27, 21, 'Sub Menu', 'sub-menu', 1, '<p>test</p>', NULL, '1', 1, 'active', '0', '2024-07-23 13:31:17', '2024-07-23 13:31:41'),
(29, 0, 'Test icon', 'test-icon', 1, '<section class=\"media-content sec_pdn inner_content text-center\"><div class=\"container\"><div class=\"android_services\"><div class=\"head text-center\"><h2>WHY CHOOSE US FOR <strong>WORDPRESS DEVELOPMENT</strong> SERVICES</h2><p>Being one of the best best wordpress development companies in India,Induji Technologies works with experienced designers and developers who bring out the best for small, mid-sized and big organizations all over the world. We have:</p></div></div><div class=\"row\"><div class=\"col-lg-3 col-md-4\"><div class=\"choose_item\"><div class=\"choose_item_text\"><h3>Coders with good experience in WP</h3></div><div class=\"cercle_item\"><i class=\"fa fa-code\"></i></div></div></div><div class=\"col-lg-3 col-md-4\"><div class=\"choose_item\"><div class=\"choose_item_text\"><h3>Customised themes, rich plugins and more</h3></div><div class=\"cercle_item\"><i class=\"fa fa-wrench\"></i></div></div></div><div class=\"col-lg-3 col-md-4\"><div class=\"choose_item\"><div class=\"choose_item_text\"><h3>Team to ensure perfection for CMS platform</h3></div><div class=\"cercle_item\"><i class=\"fa fa-folder-open\"></i></div></div></div><div class=\"col-lg-3 col-md-4\"><div class=\"choose_item\"><div class=\"choose_item_text\"><h3>Exclusive packages for your Wordpress</h3></div><div class=\"cercle_item\"><i class=\"fa fa-wordpress\"></i></div></div></div></div><p class=\"mt-4\">Whether it is a simple and corporate websites to ecommerce platform, we work with a wide range of industries. Being a reputed software development company, our concern is to see that clients get maximum return from CMS.</p><h4 class=\"upr_lne\">Obtain the best quote for your latest WordPress project</h4><a href=\"https://www.indujitechnologies.com/contact-us\" class=\"btn them_btn\">Don&rsquo;t Wait! Dial: 033-6451 0019</a></div></section>', NULL, '0', 1, 'deleted', '0', '2024-07-24 05:33:12', '2024-07-24 06:07:17'),
(30, 21, 'tes', 'tes', 1, '<p>zcvxzcv</p>', NULL, '1', 1, 'active', '0', '2024-07-24 06:51:31', '2024-07-24 06:51:31'),
(31, 0, '404', '404', 1, NULL, NULL, '0', 1, 'inactive', '0', '2024-07-24 09:16:05', '2024-07-24 09:16:27'),
(32, 20, 'dfsd', 'dfsd', 1, '<p>vfgdfg ghfh</p>', NULL, '1', 1, 'deleted', '0', '2024-07-24 12:29:42', '2024-07-24 12:42:31'),
(33, 20, 'dfsd', 'dfsd', 2, '<p>fgdfgdf</p>', 'page_1721825063.jpg', '1', 1, 'active', '0', '2024-07-24 12:43:01', '2024-07-24 12:44:23'),
(34, 0, 'Mail teamplate', 'mail-teamplate', 1, NULL, NULL, '0', 1, 'active', '0', '2024-08-13 05:39:25', '2024-08-13 05:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `post_type` varchar(10) NOT NULL DEFAULT 'post',
  `category` varchar(50) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `banner_image` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `slug`, `post_type`, `category`, `image`, `banner_image`, `description`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(14, 'What is Lorem Ipsum?', 'what-is-lorem-ipsum', 'post', '6,10', 'post_1721050137.jpg', 'banner_image_1720523585.jpg', '<p><strong style=\'margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\' id=\"isPasted\">Lorem Ipsum</strong><span style=\'color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\'>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span><span style=\'color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\'>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><span style=\'color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\'>[faq]</span></p>', 1, 'active', '2024-07-09 11:13:05', '2024-08-06 09:37:07'),
(16, 'Why do we use', 'why-do-we-use', 'post', '6,7,10', 'post_1720523694.jpg', 'banner_image_1720523694.jpg', '<p>Penile discharge is a common symptom that can occur in men of all ages. It refers to any abnormal fluid that is released from the penis. While it may be embarrassing or uncomfortable to discuss, it is important to seek medical attention if you experience <strong>penile discharge</strong>. This article aims to provide a comprehensive understanding of penile discharge, its causes, symptoms, and the importance of early diagnosis and treatment.<strong>&nbsp;</strong></p><h2>Penile Discharge Meaning</h2><p>Penile discharge is the abnormal release of fluid from the penis. It can vary in colour, consistency, and smell depending on the underlying cause. There are different types of penile discharge, including clear or white discharge, yellow or green discharge, and bloody discharge. It is important to note that not all penile discharge is abnormal. Normal discharge, known as smegma, is a combination of dead skin cells and natural oils that helps to keep the penis clean and lubricated.</p><h2>Penile Discharge Causes</h2><p>There are several potential causes of penile discharge, ranging from sexually transmitted infections (STIs) to urinary tract infections (UTIs). STIs such as&nbsp;<a href=\"https://www.stdcheck.london/gonorrhoea-testing\"><strong>gonorrhoea</strong></a> and&nbsp;<a href=\"https://www.stdcheck.london/chlamydia-testing\"><strong>chlamydia</strong></a> are common culprits of penile discharge. UTIs can also lead to discharge, as bacteria can enter the urethra and cause infection. Other causes include prostatitis, inflammation of the prostate gland; balanitis, inflammation of the head of the penis; allergies; and injury or trauma to the genital area.</p><h2>Symptoms to Look Out for</h2><ul><li><strong>Fiver:</strong> An increase in body temperature above the normal range of 36.5-37.5&deg;C</li><li><strong>Cough:&nbsp;</strong>A sudden, forceful expulsion of air from the lungs, often accompanied by a distinctive sound</li><li><strong>Shortness of breath:</strong> A feeling of not being able to get enough air into the lungs or having difficulty breathing</li><li><strong>Fatigue:</strong> A feeling of tiredness or exhaustion that can be physical, mental or both</li><li>Muscle or body aches, pain or discomfort in the muscles or body, often caused by inflammation or injury</li><li><strong>Loss of taste or smell:</strong> A sudden loss or reduction in the ability to taste or smell</li><li><strong>Sore throat:</strong> Pain or irritation in the throat, often accompanied by difficulty swallowing</li><li><strong>Headache:&nbsp;</strong>A pain or discomfort in the head, scalp or neck</li><li><strong>Chills:</strong> A feeling of coldness or shivering, often accompanied by fever</li><li><strong>Nausea or vomiting:</strong> A feeling of sickness or discomfort in the stomach, often accompanied by the urge to vomit</li></ul><p>In addition to penile discharge, there are other symptoms that may accompany this condition. These include pain or discomfort during urination or ejaculation, itching or burning sensation, and swelling or redness in the genital area. The colour, texture, and smell of the discharge can also provide clues about its underlying cause. It is important to pay attention to these symptoms and seek medical attention if they persist or worsen.</p><h2>When to Seek Medical Attention</h2><p>It is crucial to seek medical attention if you experience penile discharge. While it may be tempting to ignore or self-diagnose the issue, professional medical advice is necessary for an accurate diagnosis and appropriate treatment. It is necessary to seek immediate medical attention when there is discharge with severe pain, high fever, or blood in the urine. In less urgent cases, it is still important to schedule an appointment with a healthcare provider to address the issue promptly.</p><h2>The Importance of Early Diagnosis</h2><p>Early diagnosis of penile discharge can have numerous benefits. It allows for timely treatment, which can help alleviate symptoms and prevent complications. Delaying diagnosis and treatment can lead to the progression of underlying infections or conditions, potentially causing more severe symptoms and long-term damage. By seeking medical attention as soon as possible, individuals can take control of their health and improve their overall well-being.</p><h2>Testing and Diagnosis for Penile Discharge</h2><p>To diagnose the underlying cause of&nbsp;<strong>white penile discharge</strong>, a healthcare provider will typically perform a physical examination and order laboratory tests. During the physical examination, the healthcare provider will inspect the genital area for any signs of inflammation, swelling, or lesions. Laboratory tests may include urine analysis, blood tests, and swabs of the discharge for further analysis. In some cases, imaging tests such as ultrasound is advisable to evaluate urinary tract or prostate gland.</p><h2>Penile Discharge Treatment</h2><p>The treatment for penile discharge depends on its underlying cause. If the discharge occurs due to a bacterial infection, the GP may prescribe antibiotics to eliminate the infection. Antifungal medication may be used if a fungal infection is identified as the cause. Anti-inflammatory medication can help reduce inflammation and alleviate symptoms. In rare cases where surgical intervention is necessary, procedures such as drainage of abscesses or removal of obstructions may be performed.</p><h2>Preventing Penile Discharge</h2><p>Prevention is the key when it comes to&nbsp;<strong>clear penile discharge</strong>. Practising safe sex by using condoms and getting tested regularly for STIs can significantly reduce the risk of developing penile discharge. Good hygiene habits, such as washing the genital area with mild soap and water, can also help prevent infections. Regular check-ups with a healthcare provider are important for early detection and treatment of any potential issues.</p><h2>Coping with Penile Discharge</h2><p>Experiencing penile discharge can have an emotional impact on individuals. It is important to remember that this is a common medical issue, and seeking professional help is the best course of action. Coping strategies may include talking to a trusted friend or family member, seeking support from online communities or support groups, and practising self-care activities such as exercise, meditation, or engaging in hobbies that bring joy.</p><h2>Talking to Your Partner About Penile Discharge</h2><p>Open and honest communication with your partner about penile discharge is crucial for maintaining a healthy relationship. It is important to approach the conversation with empathy and understanding. Choose an appropriate time and place to discuss the issue and provide accurate information about&nbsp;<strong>whitish penile discharge</strong> and its causes. Reassure your partner that seeking medical attention is necessary for both your health and the health of your relationship.</p><h2>The Role of Sexual Health Education in Preventing Penile Discharge</h2><p>Sexual health education plays a vital role in preventing penile discharge. By providing accurate information about safe sex practices, STI prevention, and good hygiene habits, individuals can make informed decisions about their sexual health. Sexual health education should be accessible to people of all ages and should cover topics such as consent, contraception, <a href=\"https://www.stdcheck.london/\"><strong>STI testing</strong></a>, and the importance of regular check-ups with healthcare providers.</p><p>In conclusion, penile discharge is a common symptom you should not ignore. Seeking medical attention is crucial for accurate diagnosis and appropriate treatment. Understanding the causes, symptoms, and prevention strategies can help individuals take control of their sexual health and overall well-being. Remember, if you experience penile discharge, do not hesitate to reach out to a healthcare provider for guidance and support. Thanks.</p><p>[faq]</p>', 1, 'active', '2024-07-09 11:14:54', '2024-08-02 05:53:14'),
(18, 'Get visa in camden3', 'get-visa-in-camden3', 'area', '11,14', 'post_1721025506.jpg', 'banner_image_1721025506.jpg', '<p>This is camden post3</p>', 1, 'active', '2024-07-15 06:01:45', '2024-07-17 12:36:54'),
(19, 'True vide', 'true-vide', 'area', '11', 'area_1721024185.jpg', 'area_banner_image_1721024185.jpg', '<p>This is the vibe</p>', 1, 'active', '2024-07-15 06:16:25', '2024-07-15 06:16:25'),
(20, 'Boston', 'boston', 'area', '14', NULL, NULL, '<p>sfd dfgd</p>', 1, 'active', '2024-07-19 13:26:51', '2024-07-19 13:26:51'),
(21, 'Boston', 'boston-8qVPJ0', 'area', '14', NULL, NULL, '<p>sfd dfgd</p>', 1, 'active', '2024-07-19 13:26:51', '2024-07-19 13:26:51'),
(22, 'Welcome to Boston', 'welcome-to-boston', 'post', '14', 'post_1721395697.jpg', 'banner_image_1721395697.jpg', '<p>dsf dsf</p>', 1, 'active', '2024-07-19 13:28:17', '2024-07-19 13:28:17'),
(23, 'What is Lorem Ipsum?', 'what-is-lorem-ipsum-jd9Sol', 'area', '5', NULL, NULL, '<p>fghgf gfh</p>', 1, 'active', '2024-07-24 09:21:22', '2024-07-24 09:21:22'),
(25, 'rettg', 'rettg', 'post', '5', NULL, 'banner_image_1722409263.jpg', '<p>dggfh gfhgf</p>', 1, 'deleted', '2023-06-15 06:30:00', '2024-07-31 07:01:33'),
(26, 'dfgdf', 'dfgdf', 'post', '5,6,7', 'post_1722578478.jpg', 'banner_image_1722578478.jpg', '<p>retre dfgdf</p>', 1, 'active', '2024-08-01 06:30:00', '2024-08-02 06:01:18'),
(27, 'ghgfh', 'ghgfh', 'post', '6,7', 'post_1722578508.jpg', 'banner_image_1722578508.jpg', '<p>dgfhfg fghf</p>', 1, 'active', '2024-08-01 06:30:00', '2024-08-02 06:01:48'),
(28, 'dghfh', 'dghfh', 'post', '5,6', 'post_1722578596.jpg', 'banner_image_1722578596.jpg', '<p>dfgdf dfgdfg</p>', 1, 'active', '2024-08-01 06:30:00', '2024-08-02 06:03:16'),
(29, 'dfgdf', 'dfgdf-ZAXL8P', 'post', '6,7', 'post_1722578661.jpg', 'banner_image_1722578661.jpg', '<p>chgfh fggfjj</p>', 1, 'active', '2024-08-01 06:30:00', '2024-08-02 06:04:21'),
(30, 'the test post', 'the-test', 'post', '5,6,7', 'post_1722578762.jpg', 'banner_image_1722578762.jpg', '<p>fhjghjgh dfsdfs</p>', 1, 'active', '2024-08-01 06:30:00', '2024-08-02 06:21:19'),
(32, 'the test post', 'the-test-post', 'post', '5,6,10', 'post_1722579960.jpg', 'banner_image_1722579960.jpg', '<p>uiui</p>', 1, 'active', '2024-08-01 06:30:00', '2024-08-02 06:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `post_metas`
--

CREATE TABLE `post_metas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(10) NOT NULL,
  `meta_key` varchar(250) NOT NULL,
  `meta_value` text NOT NULL,
  `post_type` varchar(55) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_metas`
--

INSERT INTO `post_metas` (`id`, `post_id`, `meta_key`, `meta_value`, `post_type`, `created_at`, `updated_at`) VALUES
(5, 16, 'Test_Field', 'jgjhg kjkjg', 'post', NULL, NULL),
(9, 10, 'trresr_dfds', 'dffd df', 'page', NULL, NULL),
(12, 14, 'test_akd', 'sdjksd kj', 'post', NULL, NULL),
(14, 1, 'banner_header', 'The Header', 'page', NULL, NULL),
(16, 2, 'banner_header', 'This is our team', 'page', NULL, NULL),
(17, 14, 'ewrwe_rfds', 'dsfds sdfs', 'post', NULL, NULL),
(23, 18, 'gdfg_sfgf', 'gdfg dsfds', 'post', NULL, NULL),
(25, 34, 'mail_style', 'width:600px;border-spacing: 0; background: #00a1c5; padding: 20px;', 'page', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_meta_elements`
--

CREATE TABLE `post_meta_elements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `title` mediumtext DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `keywords` mediumtext DEFAULT NULL,
  `robots` mediumtext DEFAULT NULL,
  `revisit_after` mediumtext DEFAULT NULL,
  `og_locale` mediumtext DEFAULT NULL,
  `og_type` mediumtext DEFAULT NULL,
  `og_image` mediumtext DEFAULT NULL,
  `og_title` mediumtext DEFAULT NULL,
  `og_url` mediumtext DEFAULT NULL,
  `og_description` mediumtext DEFAULT NULL,
  `og_site_name` mediumtext DEFAULT NULL,
  `author` mediumtext DEFAULT NULL,
  `canonical` mediumtext DEFAULT NULL,
  `geo_region` mediumtext DEFAULT NULL,
  `geo_placename` mediumtext DEFAULT NULL,
  `geo_position` mediumtext DEFAULT NULL,
  `ICBM` mediumtext DEFAULT NULL,
  `thumbnail` text DEFAULT NULL,
  `post_type` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_meta_elements`
--

INSERT INTO `post_meta_elements` (`id`, `post_id`, `title`, `description`, `keywords`, `robots`, `revisit_after`, `og_locale`, `og_type`, `og_image`, `og_title`, `og_url`, `og_description`, `og_site_name`, `author`, `canonical`, `geo_region`, `geo_placename`, `geo_position`, `ICBM`, `thumbnail`, `post_type`, `created_at`, `updated_at`) VALUES
(1, 16, 'Title 2', 'Description 2', 'Keywords 2', 'Robots 2', 'Revisit After 2', 'Og Locale 2', 'Og Type 2', 'Og Image 2', 'Og Title 2', 'Og Url 2', 'Og Description 2', 'Og Site Name 2', 'Author 2', 'Canonical 2', 'Geo Region 2', 'Geo Placename  2', 'Geo Position 2', 'ICBM 2', NULL, 'post', NULL, NULL),
(5, 14, 'Title 6', 'Description 4', 'Keywords 4', 'Robots 4', 'Revisit After 4', 'Og Locale 4', 'Og Type 4', 'Og Image 4', 'Og Title 4', 'Og Url 4', 'Og Description 4', 'Og Site Name 4', 'Author 4', 'Canonical 4', 'Geo Region 4', 'Geo Placename  4', 'Geo Position 4', 'ICBM 4', NULL, 'post', NULL, NULL),
(6, 18, 'dfds llkh', 'dfsdf', 'asdas', 'ddafd,dasdf', 'dfadsf', 'vxcvxc', 'xzcxzc', 'xcvxcv', 'dsds', 'cfgdfg', 'ffsdf', 'dfgdf', 'ddsfs', 'xzcxzcv', 'xcvbcvb', 'xzczxc', 'zxczxcv', 'cvbcvb', NULL, 'post', NULL, NULL),
(8, 2, 'page title meta', 'description', 'Key', 'Robots', 'Revisit After', 'Og Locale', 'Og Type', 'Image', 'Og Title', 'url', 'Og Description', 'Og Site Name', 'Author', 'Canonical', 'Geo Region', 'Geo Placename', 'Geo Position', 'ICBM', NULL, 'page', NULL, NULL),
(9, 7, 'Title', 'Description Page', 'Keywords Page', 'Robots Page', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'page', NULL, NULL),
(10, 1, NULL, 'Description', NULL, NULL, 'Revisit After', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'page', NULL, NULL),
(11, 8, 'khgkjg khyi', 'iuytuitbo iyiuyi', NULL, NULL, NULL, NULL, NULL, NULL, 'khgkjg khyi', NULL, 'iuytuitbo iyiuyi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'page', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '2024-07-04 07:08:36', '2024-07-04 07:08:36'),
(2, 'Sub Admin', '2024-07-04 07:08:36', '2024-07-04 07:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('BJHnK3eaId7eGhnvUCfKJZzybEa3bYtHQ4ZSDotx', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoib1AzMjV4c25ONEt2MGFhWTFITmR0N0xpQWxDWVhmYTZSUkhjMk91USI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo2MToiaHR0cDovL2xvY2FsaG9zdC9leGFtcGxlLWFwcD9wPWJsb29kX3NhbXBsZV9hbmRfdXJpbmVfb3Jfc3dhYiI7fX0=', 1723530069),
('Bn05azFbFaWpulkLkzpLxqzucFvYzwV6I9zEGTqg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:129.0) Gecko/20100101 Firefox/129.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUVVjMzhlWnI5YzhHbG9vOTdiMWtSQ0V5VG1rVTlmQ3dNeXNBS25VNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzI6Imh0dHA6Ly9sb2NhbGhvc3QvZXhhbXBsZS1hcHAvY29udGFjdC11cz9wPWJsb29kX3NhbXBsZV9hbmRfdXJpbmVfb3Jfc3dhYiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1723528212),
('IR7d5nbpIjam2gNxVidYUEYSewUm1zMLm6L8auXa', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:129.0) Gecko/20100101 Firefox/129.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWXpEUzBGMjRXTndZd2RXU1p5Ym4ySGVTVXBwYVNsUmdqNnRRTGRINyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzI6Imh0dHA6Ly9sb2NhbGhvc3QvZXhhbXBsZS1hcHAvY29udGFjdC11cz9wPWJsb29kX3NhbXBsZV9hbmRfdXJpbmVfb3Jfc3dhYiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1723528212),
('lvCnaPAsO7kIuAIytQrYiGqeUMiZmxhq1PySG9FM', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:129.0) Gecko/20100101 Firefox/129.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYkp0dlpuajQ3ZnlMMzYwZTR6RlhUamZaRFllSHlnRFRCaEs0ck1aQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzE6Imh0dHA6Ly9sb2NhbGhvc3QvZXhhbXBsZS1hcHAvdGhhbmsteW91P3A9Ymxvb2Rfc2FtcGxlX2FuZF91cmluZV9vcl9zd2FiIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1723529555);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `tag_line` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `cc_email` varchar(255) DEFAULT NULL,
  `bcc_email` varchar(255) DEFAULT NULL,
  `logo_image` varchar(255) DEFAULT NULL,
  `original_logo_image` varchar(255) DEFAULT NULL,
  `fav_icon` varchar(255) DEFAULT NULL,
  `original_fav_icon` varchar(255) DEFAULT NULL,
  `updated_by` int(10) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `user_id`, `title`, `tag_line`, `phone`, `email`, `cc_email`, `bcc_email`, `logo_image`, `original_logo_image`, `fav_icon`, `original_fav_icon`, `updated_by`, `created_at`, `updated_at`) VALUES
(22, 1, 'STDCheck', NULL, '9632014581', 'contact@stdcheck.com', NULL, NULL, 'logo_1720681695.png', NULL, 'icon_1720681667.jpg', NULL, 1, '2024-07-04 13:39:38', '2024-07-24 10:49:09');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(55) NOT NULL,
  `type` varchar(55) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Default Template', 'Page', '2024-07-08 10:33:53', '2024-07-08 10:33:53'),
(2, 'Left Sidebar Page', 'Page', '2024-07-11 05:43:38', '2024-07-11 05:43:38'),
(3, 'Area Template', 'Area', '2024-07-15 05:12:20', '2024-07-15 05:12:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_regno` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_role` varchar(50) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) DEFAULT NULL,
  `updated_by` int(10) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `dob`, `company_name`, `company_regno`, `image`, `user_role`, `remember_token`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$Iv57qXZCcqKN1FoRwH8Ezebh3B7kvg.uukfJ.QrHIO/rnk2naEEde', '2023-08-15', 'STDcheck', NULL, '1721393492.jpg', '1,2', NULL, 1, '2024-07-03 12:50:16', '2024-07-31 06:53:21'),
(2, 'admin2', 'admin2@gmail.com', NULL, '$2y$12$M3DMC0.s4q/5k57IDHQs/OBVLw1Dw7SqReekloR2EH2R1SerzFuPa', '2000-09-08', 'fghjhk', 'gh54ghgf54gh', '', '1', NULL, 1, '2024-07-03 12:50:16', '2024-07-04 09:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE `widgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(55) NOT NULL,
  `description` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `widgets`
--

INSERT INTO `widgets` (`id`, `title`, `description`, `content`, `created_at`, `updated_at`) VALUES
(7, 'faq', 'This shortcode is used to add Faq', '<section class=\"faq\">\r\n	<div class=\"container\">\r\n\r\n		<h2 class=\"text-center\">FAQs on STD Testing:</h2>\r\n		<div class=\"accordion\" id=\"accordionExample\">\r\n			<div class=\"row panel-group\">\r\n				<div class=\"col-md-6\">\r\n					<div class=\"accordion-item panel-default\">\r\n\r\n						<h3 class=\"accordion-header\" id=\"headingOne\">\r\n							<button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseOne\">&nbsp;What are sexually transmited infections or STIs?&nbsp;</button>\r\n						</h3>\r\n						<div id=\"collapseOne\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">\r\n							<div class=\"accordion-body\">Sexually transmitted diseases or STDs, also known as sexually transmitted infections (STIs) or venereal diseases (VD), are infections that passes due to anal, oral and vaginal sex. Generally, STIs do not show any symptoms at the initial stage and hence, it is necessary to perform screening regularly.</div></div></div>\r\n					<div class=\"accordion-item panel-default\">\r\n\r\n						<h3 class=\"accordion-header\" id=\"headingTwo\">\r\n							<button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseTwo\">&nbsp;What STD tests are done?&nbsp;</button>\r\n						</h3>\r\n						<div id=\"collapseTwo\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">\r\n							<div class=\"accordion-body\">There are various options available for patients wishing to screen for STDs. Our packages offer the best combination of value and comprehensiveness &ndash; with options to screen for the most prevalent infections through to the full range of complete STD screening as well as specific testing for individual infections if you have any suspicions.</div></div></div>\r\n					<div class=\"accordion-item panel-default\">\r\n\r\n						<h3 class=\"accordion-header\" id=\"headingThree\">\r\n							<button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseThree\">&nbsp;When will get my STD tests results?&nbsp;</button>\r\n						</h3>\r\n						<div id=\"collapseThree\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">\r\n							<div class=\"accordion-body\">Our standard blood tests for HIV, Syphilis and Hepatitis have a turnaround time of 24 hours, and urine cultures for Chlamydia, Gonorrhoea, Mycoplasma, Trichomoniasis, Ureaplasma, Gardenerella and Herpes I &amp; II takes between 2 and 4 days to get accurate results.\r\n								<br>\r\n								<br>We also offer an expedited service with results within 4 hours for HIV, Syphilis, Hepatitis, Chlamydia and Gonorrhoea. Please note these tests incur an additional fee.</div></div></div>\r\n					<div class=\"accordion-item panel-default\">\r\n\r\n						<h3 class=\"accordion-header\" id=\"headingFour\">\r\n							<button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseFour\">&nbsp;Do sexually transmitted diseases go away?&nbsp;</button>\r\n						</h3>\r\n						<div id=\"collapseFour\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">\r\n							<div class=\"accordion-body\">Sometimes you can have an STD without showing any signs or symptoms. If left untreated or undetected the consequences may be severe. As such, it is recommended to undergo regular screening if you are sexually active. It is rare for bacterial infections to resolve themselves, but they can be cured if treated promptly. Other such as Herpes and HIV are not curable but their symptoms can be managed with appropriate medication.</div></div></div>\r\n					<div class=\"accordion-item panel-default\">\r\n\r\n						<h3 class=\"accordion-header\" id=\"headingFive\">\r\n							<button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseFive\">&nbsp;Is it possible to get an STD from kissing?&nbsp;</button>\r\n						</h3>\r\n						<div id=\"collapseFive\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">\r\n							<div class=\"accordion-body\">Yes, you can catch herpes by kissing someone on the mouth. There is also a very small risk of catching HIV by kissing someone who has a sore or cut in the mouth whilst you also have an open sore or cut in the mouth.</div></div></div>\r\n					<div class=\"accordion-item panel-default\">\r\n\r\n						<h3 class=\"accordion-header\" id=\"headingSix\">\r\n							<button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseSix\">&nbsp;How will I know if I am having an STD?&nbsp;</button>\r\n						</h3>\r\n						<div id=\"collapseSix\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">\r\n							<div class=\"accordion-body\">You need to get tested to know if you have any sexually transmitted disease. Many STDs do not show obvious symptoms. If you remain sexually active, then this includes anal and/or oral sex as well as vaginal intercourse. When the doctors ask this question, they want to know if you have had sex since your last screening that might expose you to an STD or pregnancy. STD tests are an important part of your routine check-up. Thus, if you have any serious concerns about an STD, it is advised to visit a doctor and get tested immediately.</div></div></div>\r\n					<div class=\"accordion-item panel-default\">\r\n\r\n						<h3 class=\"accordion-header\" id=\"headingSeven\">\r\n							<button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseSeven\">&nbsp;What are the symptoms of having STDs?&nbsp;</button>\r\n						</h3>\r\n						<div id=\"collapseSeven\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">\r\n							<div class=\"accordion-body\">Many STDs don&rsquo;t have any symptoms or show signs that are extremely mild to notice. However, if you have any of these symptoms, it is advised to consult with your doctor as you may have an STD.\r\n\r\n								<ul>\r\n									<li>None</li>\r\n									<li>Discharge or abnormal fluid that may be yellow or white from the penis or vagina.</li>\r\n									<li>Unexplained rash</li>\r\n									<li>Burning sensation at the time of urination.</li>\r\n									<li>Sores, blisters, bumps or warts in your genital area along with inner and outer lips, clitoris and vagina for women. However, in case of men, this includes testicles and penis.</li>\r\n								</ul>\r\n							</div></div></div>\r\n					<div class=\"accordion-item panel-default\">\r\n\r\n						<h3 class=\"accordion-header\" id=\"headingEight\">\r\n							<button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseEight\">&nbsp;How do I prevent getting an STD?&nbsp;</button>\r\n						</h3>\r\n						<div id=\"collapseEight\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">\r\n							<div class=\"accordion-body\">Several things can be done to lessen the chances of getting an STD.\r\n\r\n								<ul>\r\n									<li><strong>Stay faithful</strong> &ndash; When you have sex with one person whom you trust. Having intercourse with someone who is not infected means you will not get an STD from them and they too won&rsquo;t get it from you.</li>\r\n									<li><strong>Use condoms</strong> &ndash; Wear polyurethane or latex condoms as they provide proper protection against STDs when used in the right way every time you enjoy sex with your partner.</li>\r\n									<li><strong>Choose fewer partners</strong> &ndash; The more people you enjoy sex with, the greater will be your chances of getting an STD. If you have had sex with new partners, it is important to get tested.</li>\r\n									<li>Do not mix alcohol and drugs with sex. Getting drunk or high may affect your ability to take smart decisions related to sex.</li>\r\n									<li>It is suggested not to use IV street drugs and never share needles as many STDs get transmitted through blood.</li>\r\n									<li>Do not have sex as abstinence is the most effective way to prevent an STD.</li>\r\n								</ul>\r\n							</div></div></div>\r\n					<div class=\"accordion-item panel-default\">\r\n\r\n						<h3 class=\"accordion-header\" id=\"headingNine\">\r\n							<button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseNine\">&nbsp;Is it possible to get an STD if I am virgin?&nbsp;</button>\r\n						</h3>\r\n						<div id=\"collapseNine\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">\r\n							<div class=\"accordion-body\">It actually depends on how you treat yourself as a virgin. STDs may get transmitted due to anal and oral sex, but many people consider if they haven&rsquo;t had vaginal intercourse, they are still a virgin. Some STDs usually spread through intimate skin-to-skin contact though there is not any kind of penetration.</div></div></div>\r\n					<div class=\"accordion-item panel-default\">\r\n\r\n						<h3 class=\"accordion-header\" id=\"headingTen\">\r\n							<button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseTen\">&nbsp;How are condoms effective against all STDs?&nbsp;</button>\r\n						</h3>\r\n						<div id=\"collapseTen\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">\r\n							<div class=\"accordion-body\">Condoms are not completely effective but when used correctly every time, they can help to stay protected from STDs that spread due to body fluids such as &ndash; vaginal secretions or semen. They do not protect you against STDs that get transmitted due to skin-to-skin contact.</div></div></div>\r\n					<div class=\"accordion-item panel-default\">\r\n\r\n						<h3 class=\"accordion-header\" id=\"headingEleven\">\r\n							<button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseEleheadingEleven\">&nbsp;Can I get sexually transmitted disease more than once?&nbsp;</button>\r\n						</h3>\r\n						<div id=\"collapseEleheadingEleven\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">\r\n							<div class=\"accordion-body\">It is quite possible to get Herpes through kissing, but the chances are less with most STDs.</div></div></div>\r\n					<div class=\"accordion-item panel-default\">\r\n\r\n						<h3 class=\"accordion-header\" id=\"headingTwelve\">\r\n							<button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseEleheadingTwelve\">&nbsp;Can you detect an STD from a blood test?&nbsp;</button>\r\n						</h3>\r\n						<div id=\"collapseEleheadingTwelve\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">\r\n							<div class=\"accordion-body\">Most STDs can be tested with a blood test and urine sample. At STD Check London, our doctors check for the following STDs:\r\n\r\n								<ul>\r\n									<li>Gonorrhoea</li>\r\n									<li>Chlamydia</li>\r\n									<li>Syphilis</li>\r\n									<li>Herpes</li>\r\n									<li>HIV</li>\r\n									<li>Mycoplasma Genitalium</li>\r\n									<li>Hepatitis</li>\r\n								</ul>There are certain cases when the blood tests are not accurate as other kinds of testing. It might take one month or longer after getting exposed to some STIs for appropriate blood tests. For example, if HIV has been contracted, it may take almost 28 days to fewer months for the tests to detect the infection.</div></div></div>\r\n					<div class=\"accordion-item panel-default\">\r\n\r\n						<h3 class=\"accordion-header\" id=\"headingThirteen\">\r\n							<button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseEleheadingThirteen\">&nbsp;Do STD urine tests provide accurate results?&nbsp;</button>\r\n						</h3>\r\n						<div id=\"collapseEleheadingThirteen\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">\r\n							<div class=\"accordion-body\">Common way to get negative Gonorrhoea and Chlamydia tests would be by testing often after you had sex or by urinating soon when the test is done with urine. With Gonorrhoea, the results will be accurate just one week after exposure, however, with Chlamydia, most results are accurate just 2 weeks after the exposure.</div></div></div></div>\r\n				<div class=\"col-md-6\">\r\n					<div class=\"accordion-item panel-default\">\r\n\r\n						<h3 class=\"accordion-header\" id=\"headingFourteen\">\r\n							<button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseEleheadingFourteen\">&nbsp;What STDs can be cured?&nbsp;</button>\r\n						</h3>\r\n						<div id=\"collapseEleheadingFourteen\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">\r\n							<div class=\"accordion-body\">STDs that occur due to bacteria may be cured by taking antibiotics. Some bacterial STDs consist of &ndash;Gonorrhoea, Chlamydia, Mycoplasma Genitalium and Ureaplasma. STDs caused by viruses can be controlled, but not treated. In case you get a viral STD, you will have it always.</div></div></div>\r\n					<div class=\"accordion-item panel-default\">\r\n\r\n						<h3 class=\"accordion-header\" id=\"headingFifteen\">\r\n							<button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseEleheadingFifteen\">&nbsp;How much time will it take to get results from urine test for STDs?&nbsp;</button>\r\n						</h3>\r\n						<div id=\"collapseEleheadingFifteen\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">\r\n							<div class=\"accordion-body\">It usually requires 3 to 4 days to get the results from either a urine test or a swab for different STDs.</div></div></div>\r\n					<div class=\"accordion-item panel-default\">\r\n\r\n						<h3 class=\"accordion-header\" id=\"headingSeventeen\">\r\n							<button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseEleheadingSeventeen\">&nbsp;How much does it cost to get tested for different STDS?&nbsp;</button>\r\n						</h3>\r\n						<div id=\"collapseEleheadingSeventeen\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">\r\n							<div class=\"accordion-body\">With different health care centres, the costs might differ depending on the area to choose. The prices for different tests usually range between &pound;50 and &pound;1250.</div></div></div>\r\n					<div class=\"accordion-item panel-default\">\r\n\r\n						<h3 class=\"accordion-header\" id=\"headingSeventeen\">\r\n							<button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseEleheadingSeventeen\">&nbsp;Can sexually transmitted diseases go on their own?&nbsp;</button>\r\n						</h3>\r\n						<div id=\"collapseEleheadingSeventeen\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">\r\n							<div class=\"accordion-body\">Some STDs such as syphilis, HIV and hepatitis B may lead to some infections in your body. Sometimes, you may get an STD without any signs or symptoms. However, at other times, the symptoms might go away by themselves. Though you cannot treat some STDs, most of them can be treated when detected on time.</div></div></div>\r\n					<div class=\"accordion-item panel-default\">\r\n\r\n						<h3 class=\"accordion-header\" id=\"headingEighteen\">\r\n							<button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseEleheadingEighteen\">&nbsp;What are some signs of sexually transmitted infections?&nbsp;</button>\r\n						</h3>\r\n						<div id=\"collapseEleheadingEighteen\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">\r\n							<div class=\"accordion-body\">Some signs are irregular discharge from the penis, anus or vagina during urination, skin growths or lumps around the genitals or anus.</div></div></div>\r\n					<div class=\"accordion-item panel-default\">\r\n\r\n						<h3 class=\"accordion-header\" id=\"headingNineteen\">\r\n							<button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseEleheadingNineteen\">&nbsp;Is it possible to see your GP for STI testing?&nbsp;</button>\r\n						</h3>\r\n						<div id=\"collapseEleheadingNineteen\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">\r\n							<div class=\"accordion-body\">If you are having sexually transmitted infection or STI, it is advised to visit your nearest sexual health clinic in London. It is usually possible to treat STIs successfully, but you need to check the symptoms at an early stage.</div></div></div>\r\n					<div class=\"accordion-item panel-default\">\r\n\r\n						<h3 class=\"accordion-header\" id=\"headingTwenty\">\r\n							<button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseEleheadingTwenty\">&nbsp;What is a GUM clinic?&nbsp;</button>\r\n						</h3>\r\n						<div id=\"collapseEleheadingTwenty\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">\r\n							<div class=\"accordion-body\">A genitourinary medicine or GUM clinic is where you need to attend a session between the doctor and the patient. These are usually located at the health care centre or hospital that offers different sexual health services such as &ndash; contraception and contraception advice, testing as well as treating sexually transmitted infections. Certain STI include &ndash; chlamydia, syphilis, genital warts, gonorrhea and counselling for HIV and AIDS.</div></div></div>\r\n					<div class=\"accordion-item panel-default\">\r\n\r\n						<h3 class=\"accordion-header\" id=\"headingTwentyOne\">\r\n							<button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseEleheadingTwentyOne\">&nbsp;What is the work of a GUM clinic?&nbsp;</button>\r\n						</h3>\r\n						<div id=\"collapseEleheadingTwentyOne\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">\r\n							<div class=\"accordion-body\">Sexual health clinics usually provide different services such as treating and testing different sexually transmitted infections or STIs.</div></div></div>\r\n					<div class=\"accordion-item panel-default\">\r\n\r\n						<h3 class=\"accordion-header\" id=\"headingTwentyTwo\">\r\n							<button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseEleheadingTwentyTwo\">&nbsp;What do GUM clinics need to test for?&nbsp;</button>\r\n						</h3>\r\n						<div id=\"collapseEleheadingTwentyTwo\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">\r\n							<div class=\"accordion-body\">Performing necessary tests and treating sexually transmitted infections is confidential and most infections can be cured. A genitourinary medicine (GUM) clinic has some specialists who have done specialisation in sexual health. They help in conducting tests and treatments for different STIs.</div></div></div>\r\n					<div class=\"accordion-item panel-default\">\r\n\r\n						<h3 class=\"accordion-header\" id=\"headingTwentyThree\">\r\n							<button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseEleheadingTwentyThree\">&nbsp;Is it possible to get a disease after enjoying oral sex?&nbsp;</button>\r\n						</h3>\r\n						<div id=\"collapseEleheadingTwentyThree\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">\r\n							<div class=\"accordion-body\">Yes, it is quite possible to get an STD from receiving oral sex without using a condom. Herpes may spread easily from one partner to other at the time of oral sex as it gets transmitted through skin-to-skin contact and not fluids only. Others such as chlaymdia and gonorrhoea may cause infection to the throat.</div></div></div>\r\n					<div class=\"accordion-item panel-default\">\r\n\r\n						<h3 class=\"accordion-header\" id=\"headingTwentyFour\">\r\n							<button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseEleheadingTwentyFour\">&nbsp;Is it possible to treat STD completely?&nbsp;</button>\r\n						</h3>\r\n						<div id=\"collapseEleheadingTwentyFour\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">\r\n							<div class=\"accordion-body\">Bacterial STDs may get treated by taking antibiotics when the treatment starts early. Though you cannot treat viral STDs, you will be able to manage its symptoms with proper medications. There is a vaccine available against hepatitis B, however, it will not be of much help if you are suffering from this disease.</div></div></div>\r\n					<div class=\"accordion-item panel-default\">\r\n\r\n						<h3 class=\"accordion-header\" id=\"headingTwentyFive\">\r\n							<button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseEleheadingTwentyFive\">&nbsp;How can an STD start?&nbsp;</button>\r\n						</h3>\r\n						<div id=\"collapseEleheadingTwentyFive\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">\r\n							<div class=\"accordion-body\">STDs usually get transmitted through direct contact with infected body fluids such as &ndash; blood, semen or vaginal fluids. They may spread by contact with infected skin, mucous membranes and mouth sores. You might get exposed to infected body fluids and skin through oral, anal or vaginal sex.</div></div></div>\r\n					<div class=\"accordion-item panel-default\">\r\n\r\n						<h3 class=\"accordion-header\" id=\"headingTwentySix\">\r\n							<button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseEleheadingTwentySix\">&nbsp;How do you know if you are having an STD?&nbsp;</button>\r\n						</h3>\r\n						<div id=\"collapseEleheadingTwentySix\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">\r\n							<div class=\"accordion-body\">STD symptoms may range from mild to severe. Many women suspects an STD infection when there is an abnormal symptom in the genital region, such as rash, discharge, itching, pelvic or vaginal pain. The only way to know if you have an STD is to get tested on time.</div></div></div></div></div></div></div>\r\n</section>', '2024-07-11 07:03:02', '2024-07-11 07:03:02'),
(8, 'test', 'this is for test', 'Test content', '2024-07-11 07:03:51', '2024-07-11 07:03:51');

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
-- Indexes for table `category_posts`
--
ALTER TABLE `category_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_post_tbls`
--
ALTER TABLE `category_post_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_enquiries`
--
ALTER TABLE `contact_enquiries`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `medias`
--
ALTER TABLE `medias`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_metas`
--
ALTER TABLE `post_metas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_meta_elements`
--
ALTER TABLE `post_meta_elements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_posts`
--
ALTER TABLE `category_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `category_post_tbls`
--
ALTER TABLE `category_post_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `contact_enquiries`
--
ALTER TABLE `contact_enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT for table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `post_metas`
--
ALTER TABLE `post_metas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `post_meta_elements`
--
ALTER TABLE `post_meta_elements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
