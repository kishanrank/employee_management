-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2022 at 06:14 PM
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
-- Database: `employee_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 =>  Disabled, 1 => Enabled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Development', 1, '2022-08-09 10:48:48', NULL),
(2, 'Sales', 1, '2022-08-09 10:48:48', NULL),
(3, 'Human Resource', 1, '2022-08-09 10:48:48', NULL),
(4, 'Finance', 1, '2022-08-09 10:48:48', NULL),
(5, 'Marketing', 1, '2022-08-09 10:48:48', NULL),
(6, 'Test Dept', 1, '2022-08-09 23:48:50', '2022-08-09 23:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `department_id`, `name`, `email`, `phone`, `dob`, `photo`, `salary`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Natus', 'hucyzok@mailinator.com', '1234512345', '1991-02-14', 'employee/VH3XjjVQ5d4XDE0XnPFdW0WWzq6TJ4wFpKeYne9u.jpg', '1232.00', 0, '2022-08-09 10:50:16', '2022-08-09 11:01:03'),
(3, 4, 'Natus 1', 'hucyzok1@mailinator.com', '1234512345', '1996-02-14', 'employee/VH3XjjVQ5d4XDE0XnPFdW0WWzq6TJ4wFpKeYne9u.jpg', '12505.00', 1, '2022-08-09 10:50:16', '2022-08-09 11:01:03'),
(4, 1, 'Natus2', 'hucyzok2@mailinator.com', '1234512222', '1996-02-14', 'employee/VH3XjjVQ5d4XDE0XnPFdW0WWzq6TJ4wFpKeYne9u.jpg', '12523.00', 1, '2022-08-09 10:50:16', '2022-08-09 11:01:03'),
(5, 2, 'Test 1', 'testhucyzok2@mailinator.com', '1234512222', '1996-05-14', 'employee/VH3XjjVQ5d4XDE0XnPFdW0WWzq6TJ4wFpKeYne9u.jpg', '98989.00', 1, '2022-08-09 10:50:16', '2022-08-09 11:01:03'),
(6, 5, 'Test 2', 'test2hucyzok2@mailinator.com', '1234512222', '2002-05-14', 'employee/VH3XjjVQ5d4XDE0XnPFdW0WWzq6TJ4wFpKeYne9u.jpg', '45000.00', 1, '2022-08-09 10:50:16', '2022-08-09 11:01:03'),
(7, 3, 'Natus d3', 'hucyzokd3@mailinator.com', '1234512345', '1994-02-14', 'employee/VH3XjjVQ5d4XDE0XnPFdW0WWzq6TJ4wFpKeYne9u.jpg', '1232.00', 1, '2022-08-09 10:50:16', '2022-08-09 11:01:03'),
(8, 4, 'Natus d4', 'hucyzok1d4@mailinator.com', '1234512345', '1997-02-14', 'employee/VH3XjjVQ5d4XDE0XnPFdW0WWzq6TJ4wFpKeYne9u.jpg', '45820.00', 1, '2022-08-09 10:50:16', '2022-08-09 11:01:03'),
(9, 1, ' d1', 'hucyzok2d1@mailinator.com', '1234512222', '1970-02-14', 'employee/VH3XjjVQ5d4XDE0XnPFdW0WWzq6TJ4wFpKeYne9u.jpg', '120000.00', 1, '2022-08-09 10:50:16', '2022-08-09 11:01:03'),
(10, 2, 'Test d2', 'testhucyzok2d2@mailinator.com', '1234512222', '1986-05-14', 'employee/VH3XjjVQ5d4XDE0XnPFdW0WWzq6TJ4wFpKeYne9u.jpg', '1111111.00', 1, '2022-08-09 10:50:16', '2022-08-09 11:01:03'),
(11, 5, 'Test d5', 'test2hucyzok2d5@mailinator.com', '1234512222', '1999-05-14', 'employee/VH3XjjVQ5d4XDE0XnPFdW0WWzq6TJ4wFpKeYne9u.jpg', '56000.00', 1, '2022-08-09 10:50:16', '2022-08-09 11:01:03');

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
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2022_08_08_165852_create_departments_table', 1),
(12, '2022_08_08_165918_create_employees_table', 1);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
  `role` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1 => Admin, 2 => Users',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Admin', 'admin@admin.com', NULL, '$2y$10$s2eQGtRNXPzPuNkExmoYj.BsqbtFuFoGrOM4XGBIRzJIYNNdb26.W', 1, NULL, '2022-08-09 10:48:48', '2022-08-09 10:48:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
