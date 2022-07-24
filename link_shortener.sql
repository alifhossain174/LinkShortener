-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2022 at 05:12 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `link_shortener`
--

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_07_21_192459_create_u_r_l_s_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2022-07-24 02:39:58', '$2y$10$XjbUIxvRyi7zNPBw8r9uYuCaltUiV8bXLk2Piwx0h/cbA6dBr7Ry6', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `u_r_l_s`
--

CREATE TABLE `u_r_l_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `actual_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `generated_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `click` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `u_r_l_s`
--

INSERT INTO `u_r_l_s` (`id`, `actual_url`, `generated_url`, `click`, `created_at`, `updated_at`) VALUES
(86, 'https://baublemarts.com/super-smash-bros?s=hanes-5250&c=Black&p=FRONT', '1658597665', 0, NULL, NULL),
(87, 'https://gearsmartsy.com/the-lands-between', '1658598297', 0, NULL, NULL),
(88, 'https://baublemarts.com/darius-garland?s=hanes-5250&c=Black&p=FRONT', '1658598435', 0, NULL, NULL),
(89, 'https://baublemarts.com/litecoin?s=hanes-5250&c=Black&p=FRONT', '1658599623', 0, NULL, NULL),
(90, 'https://gearsmartsy.com/a-japanese-ramen?s=hanes-5250&c=White&p=FRONT', '1658599751', 0, NULL, NULL),
(91, 'https://gearsapez.com/bills-mafia?s=hanes-5250&c=Black&p=FRONT', '1658599972', 0, NULL, NULL),
(92, 'https://gearsapez.com/bills-mafia?s=hanes-5250&c=Black&p=FRONT', '1658599973', 0, NULL, NULL),
(93, 'https://gearsapez.com/bills-mafia?s=hanes-5250&c=Black&p=FRONT', '1658599974', 0, NULL, NULL),
(94, 'https://gearsapez.com/bills-mafia?s=hanes-5250&c=Black&p=FRONT', '1658599974', 0, NULL, NULL),
(95, 'https://baublemarts.com/help-me-stack-overflow?s=hanes-5250&c=Black&p=FRONT', '1658601153', 0, NULL, NULL),
(96, 'https://baublemarts.com/we-are-doing-butt-stuff', '1658601519', 0, NULL, NULL),
(97, 'https://baublemarts.com/i-dont-know-where-im-going-but-im-gay?s=hanes-5250&c=White&p=FRONT', '1658601544', 0, NULL, NULL),
(98, 'https://gearsapez.com/minnesota-vikings-fans?s=hanes-5250&c=Black&p=FRONT', '1658602097', 0, NULL, NULL),
(99, 'https://gearsmartsy.com/chicago', '1658602227', 0, NULL, NULL),
(100, 'https://gearsapez.com/la-rams-super-bowl-championship?s=hanes-5250&c=White&p=FRONT', '1658602252', 0, NULL, NULL),
(102, 'https://gearsapez.com/ebbets-field-1913?s=hanes-5250&c=Black&p=FRONT', '1658603657', 0, NULL, NULL),
(104, 'https://gearsmartsy.com/flat-mars-society', '1658604262', 0, NULL, NULL),
(105, 'https://gearsapez.com/polo-grounds?s=hanes-5250&c=Black&p=FRONT', '1658604263', 0, NULL, NULL),
(106, 'https://babulemarts.com/seinfeld-restaurant-art-print?s=poster-16x24-horizontal&c=White&p=FRONT', '1658604467', 0, NULL, NULL),
(107, 'https://gearsmartsy.com/elden-ring-1?rt=search&s=hanes-5250&c=White&p=FRONT', '1658605451', 0, NULL, NULL),
(108, 'https://gearsapez.com/asgard-university?s=hanes-5250&c=Black&p=FRONT', '1658606582', 0, NULL, NULL),
(109, 'https://baublemarts.com/we-will-never-forget-you-brent-green-bay-packers', '1658608163', 0, NULL, NULL),
(110, 'https://babulemarts.com/make-america-not-a-bunch?s=hanes-5250&c=Black&p=BACK', '1658608195', 0, NULL, NULL),
(111, 'https://baublemarts.com/the-great-ramen-wave-off-kanagawa?s=hanes-5250&c=White&p=FRONT', '1658608489', 0, NULL, NULL),
(112, 'https://gearsmartsy.com/stardew?s=hanes-5250&c=Black&p=FRONT', '1658608586', 0, NULL, NULL),
(113, 'https://baublemarts.com/cathulhu?s=hanes-5250&c=Black&p=FRONT', '1658610047', 0, NULL, NULL),
(114, 'https://babulemarts.com/rugby-mishmash-art-print', '1658610297', 0, NULL, NULL),
(115, 'https://gearsapez.com/i-will-be-watching-you-cat?s=hanes-5250&c=Black&p=FRONT', '1658611020', 0, NULL, NULL),
(116, 'https://gearsmartsy.com/scdp-1', '1658611117', 0, NULL, NULL),
(117, 'https://generator.bawin-bd.org', '1658612009', 0, NULL, NULL),
(118, 'https://kkphungry.com/never-underestimate-a-woman-who-understands-hockey-and-loves-avalanche-signatures-shirt', '1658612247', 0, NULL, NULL),
(119, 'https://baublemarts.com/cathulhu', '1658612378', 0, NULL, NULL),
(120, 'https://hkhungry.com/peaky-blinders-poster', '1658613167', 0, NULL, NULL),
(121, 'https://hkhungry.com/never-underestimate-a-woman', '1658613251', 0, NULL, NULL),
(122, 'https://hkhungry.com/never-underestimate-a-woman', '1658613255', 0, NULL, NULL),
(123, 'https://hkhungry.com/autism-its-not-a-disability-its-a-different-ability', '1658613549', 2, NULL, NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `u_r_l_s`
--
ALTER TABLE `u_r_l_s`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `u_r_l_s`
--
ALTER TABLE `u_r_l_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
