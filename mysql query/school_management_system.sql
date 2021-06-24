-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2021 at 06:58 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `class_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `class_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monday` int(11) NOT NULL,
  `tuesday` int(11) NOT NULL,
  `wednesday` int(11) NOT NULL,
  `thursday` int(11) NOT NULL,
  `friday` int(11) NOT NULL,
  `saturday` int(11) NOT NULL,
  `sunday` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `course_id`, `class_name`, `fee`, `start_time`, `end_time`, `start_date`, `end_date`, `class_type`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 8, 'Design Batch 1', 50000, '17:46:00', '20:46:00', '2020-12-01', '2020-12-30', 'weekday', 1, 1, 1, 1, 1, 0, 0, '2020-11-18 04:47:06', '2020-11-22 07:57:14', 4),
(2, 8, 'Design Batch 3', 50000, '19:50:00', '21:50:00', '2020-11-01', '2020-11-30', 'weekday', 1, 1, 1, 1, 0, 0, 0, '2020-11-18 04:50:49', '2020-11-22 08:07:59', 4),
(3, 11, 'Vue Basic Batch 1', 250000, '14:00:00', '17:00:00', '2021-01-01', '2021-01-30', 'weekend', 0, 0, 0, 0, 0, 1, 1, '2020-11-22 04:58:44', '2020-11-30 00:20:57', 4),
(6, 8, 'design Class', 134000, '14:21:00', '16:21:00', '2020-11-01', '2020-11-30', 'weekday', 1, 0, 1, 1, 1, 0, 0, '2020-11-30 00:21:37', '2020-11-30 01:24:11', 4),
(7, 14, 'Js Library Batch 1', 150000, '14:40:00', '15:40:00', '2020-11-01', '2020-11-30', 'weekend', 0, 0, 0, 0, 0, 1, 1, '2020-11-30 01:41:05', '2020-11-30 01:41:05', 4),
(9, 9, 'Laravel Advance Class', 55000, '13:29:00', '17:29:00', '2020-12-01', '2020-12-30', 'weekday', 1, 1, 1, 1, 0, 0, 0, '2020-12-06 00:29:52', '2020-12-06 00:29:52', 4),
(10, 17, 'Docker Batch 1', 170000, '15:07:00', '18:07:00', '2020-12-01', '2021-02-28', 'weekend', 0, 0, 0, 0, 0, 1, 1, '2020-12-06 02:07:56', '2020-12-06 02:07:56', 7),
(11, 18, 'Java Basic Batch 1', 150000, '15:08:00', '21:08:00', '2020-12-01', '2021-02-28', 'weekday', 0, 0, 1, 1, 1, 0, 0, '2020-12-06 02:09:15', '2020-12-06 02:09:15', 7),
(12, 19, 'Kotlin Batch 1', 50000, '14:27:00', '15:27:00', '2020-12-01', '2020-12-31', 'weekend', 0, 0, 0, 0, 0, 1, 1, '2020-12-25 01:27:39', '2020-12-25 01:27:39', 7);

-- --------------------------------------------------------

--
-- Table structure for table `class_students`
--

CREATE TABLE `class_students` (
  `class_student_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_students`
--

INSERT INTO `class_students` (`class_student_id`, `class_id`, `student_id`, `status`, `created_at`, `updated_at`, `teacher_id`) VALUES
(13, 11, 5, 2, '2020-12-17 07:29:06', '2020-12-23 06:32:42', 7),
(14, 1, 5, 1, '2020-12-17 07:39:02', '2020-12-17 07:39:02', 6),
(16, 10, 5, 1, '2020-12-17 08:55:30', '2020-12-23 06:34:25', 7),
(21, 9, 5, 2, '2020-12-21 11:23:32', '2020-12-21 11:34:19', 4),
(25, 10, 6, 4, '2020-12-21 11:40:32', '2020-12-23 06:31:32', 7),
(26, 11, 6, 1, '2020-12-21 11:40:44', '2020-12-23 06:33:34', 7),
(27, 9, 6, 3, '2020-12-21 11:41:10', '2020-12-21 11:45:57', 4),
(28, 10, 9, 2, '2020-12-23 06:45:50', '2020-12-23 06:58:36', 7);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `course_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_explanation` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_title`, `course_explanation`, `course_details`, `created_at`, `updated_at`, `user_id`) VALUES
(8, 'Web Design Advance IIII', 'Web Design Advance Course IIII', 'This is Web Design Advance Course IIII', '2020-11-17 08:20:00', '2020-11-22 05:53:44', 6),
(9, 'LARAVEL Advance', 'Laravel Advance Class', 'Laravel Advance Class for advance level', '2020-11-17 09:17:25', '2020-11-17 09:17:25', 4),
(10, 'Networking', 'This is networking class', 'This is networking CCNA basic class', '2020-11-18 03:15:15', '2020-11-18 03:15:15', 4),
(11, 'Vue Js', 'Vue jLibrary', 'Vue basic Course', '2020-11-22 04:55:48', '2020-11-22 04:55:48', 3),
(13, 'Python', 'Python Beginners Course', 'Python Basic Beginners Course', '2020-11-25 03:20:06', '2020-11-25 03:53:13', 4),
(14, 'Js Library', 'Js library Course Explanation', 'Js beginner Course Details', '2020-11-30 01:39:40', '2020-11-30 01:45:53', 6),
(15, 'Spring Boot', 'Spring Boot Course', 'Spring Boot Course Detail', '2020-11-30 01:50:22', '2020-11-30 01:50:22', 4),
(16, 'asda', 'asdad', 'asda', '2020-12-02 00:42:57', '2020-12-02 00:42:57', 3),
(17, 'Docker', 'Docker Course', 'Docker Basic Course', '2020-12-06 02:06:09', '2020-12-06 02:06:09', 7),
(18, 'Java basic', 'Java Basic Course', 'Java Basic for Beginners', '2020-12-06 02:08:40', '2020-12-06 02:08:40', 7),
(19, 'Kotlin', 'Kotlin Basic', 'Kotlin Basic Class', '2020-12-25 01:27:04', '2020-12-25 01:27:04', 7);

-- --------------------------------------------------------

--
-- Table structure for table `course_requests`
--

CREATE TABLE `course_requests` (
  `course_request_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_request_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_request_details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_requests`
--

INSERT INTO `course_requests` (`course_request_id`, `student_id`, `course_request_title`, `course_request_details`, `created_at`, `updated_at`) VALUES
(9, 5, 'Memes Class', 'Class that teacher usage, tp!!', '2020-12-25 01:04:27', '2020-12-25 01:04:27'),
(10, 6, 'IOT practical Classses', 'Practical class that teaching how to', '2020-12-25 01:13:58', '2020-12-25 01:13:58'),
(11, 5, 'Odoo', 'oddo class', '2020-12-25 01:17:34', '2020-12-25 01:17:34'),
(12, 5, 'forex class', 'forex trading class', '2020-12-25 01:17:44', '2020-12-25 01:17:44'),
(13, 5, 'Sewing class', 'Sewing cotton class', '2020-12-25 01:17:57', '2020-12-25 01:17:57'),
(14, 5, 'Relation DB course', 'DB course', '2020-12-25 01:18:10', '2020-12-25 01:18:10'),
(15, 5, 'Ajax Class', 'Ajax Class Sesssion', '2020-12-25 01:18:26', '2020-12-25 01:18:26'),
(16, 5, 'React Native', 'React Native Basic', '2020-12-25 01:18:35', '2020-12-25 01:18:35'),
(17, 5, 'Kotlin', 'Kotlin Basic Class', '2020-12-25 01:18:46', '2020-12-25 01:18:46'),
(18, 5, 'Flutter', 'Flutter Class', '2020-12-25 01:18:54', '2020-12-25 01:18:54');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_11_11_102126_create_courses_table', 1),
(9, '2020_11_11_102235_create_sessions_table', 1),
(10, '2020_11_11_103633_create_classes_table', 1),
(11, '2020_11_11_104832_create_news_table', 1),
(12, '2020_11_11_105645_create_notifications_table', 1),
(13, '2020_11_11_105949_create_class_students_table', 1),
(14, '2020_11_11_110444_create_course_requests_table', 1),
(15, '2020_11_18_071938_change_column_name_classes_table_column_course_name_to_class_name', 2),
(16, '2020_11_22_104217_add_column_user_id_table_classes', 3),
(17, '2020_11_22_104356_add_column_user_id_table_courses', 3),
(18, '2020_12_06_064821_add_teacher_id_to_class_students_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `news_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_date` date NOT NULL,
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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('nCTF7HXiwzNzEXhdsFfsjYUkrjVfosWcUMv8KE5U', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiaWUwbklHR29jdHNCckZrMm1BNDhxQjVpZ0lpMno0cHh2RTg1UzJuSiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1609074273),
('Yge77G53IXrpoF1mQMgD6x0eq8asQrow9kC4RzsH', 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoia0R6SUJNZTZRU0RFT1BXQ0NYc0NpeExRZmxjNkEyWDhYenpyNllKNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly9sb2NhbGhvc3Qvc2Nob29sL3B1YmxpYy9hZG1pbi9zdHVkZW50TGlzdCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCR1ZWhxUUIzck5DdlBtUEVlNlNpSHRleFQ0WFpMejRSUmJFckZVQmpQOUNXaDF3TW5GR3BzUyI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkdWVocVFCM3JOQ3ZQbVBFZTZTaUh0ZXhUNFhaTHo0UlJiRXJGVUJqUDlDV2gxd01uRkdwc1MiO30=', 1609078853);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sithu\'s Team', 1, '2020-11-14 03:31:01', '2020-11-14 03:31:01'),
(2, 4, 'sithu\'s Team', 1, '2020-11-15 05:06:24', '2020-11-15 05:06:24'),
(3, 5, 'BMS\'s Team', 1, '2020-11-15 05:07:52', '2020-11-15 05:07:52'),
(4, 6, 'sithu\'s Team', 1, '2020-12-01 22:25:13', '2020-12-01 22:25:13'),
(5, 7, 'Daw\'s Team', 1, '2020-12-06 02:05:39', '2020-12-06 02:05:39'),
(6, 8, 'nyi\'s Team', 1, '2020-12-23 06:41:56', '2020-12-23 06:41:56'),
(7, 9, 'nyi\'s Team', 1, '2020-12-23 06:43:36', '2020-12-23 06:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number_one` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `town` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `gender`, `date_of_birth`, `phone_number_one`, `phone_number_two`, `region`, `town`, `address`, `status`, `role`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'admin@gmail.com', NULL, '$2y$10$uehqQB3rNCvPmPEe6SiHtexT4XZLz4RRbErFUBjP9CWh1wMnFGpsS', NULL, NULL, NULL, NULL, NULL, 'male', '1990/05/20', '09421077822', '094243232', 'yangon', 'yangon', 'no 433', '0', 'admin', '2020-11-15 04:40:25', '2020-11-15 04:40:25'),
(4, 'U Zaw Zaw', 'teacher@gmail.com', NULL, '$2y$10$iDkDNVzGuNwMWTHGkCIFF.Mb3iNG7VjlxbGM1bjUxivwrMVa8bDLm', NULL, NULL, NULL, NULL, NULL, 'male', '2020-11-30', '09000000000', '091111111111', 'Bgo', 'Pyay', 'no111111', '0', 'teacher', '2020-11-15 05:06:24', '2020-11-30 23:43:04'),
(5, 'BMS', 'student@gmail.com', NULL, '$2y$10$vllpxR3mlXE9ewaiuge3au0F.W9hec.TSOFuV2.98rN16XXBid17W', NULL, NULL, NULL, NULL, NULL, 'female', '2020-11-05', '0933333', '09222222', 'Mandalay', 'Mandalay', 'no 777', '0', 'student', '2020-11-15 05:07:52', '2020-11-15 05:07:52'),
(6, 'sithu', 'sithu@gmail.com', NULL, '$2y$10$ctsz42dv1EWDUD/OYdxapew5d1/wbaysSjzJmxZbCyDTR/k.5aHlS', NULL, NULL, NULL, NULL, NULL, 'male', '2020-12-01', '0988888', '09999999', 'Yangon', 'BoSunPat', 'Tarmwe', '0', 'student', '2020-12-01 22:25:13', '2020-12-01 22:25:13'),
(7, 'Daw Mya', 'teacher2@gmail.com', NULL, '$2y$10$XiD1oYqu8hBFhzWlBeBfuOUdsaA7VwXc0w4R/tCssVXHP50gx0zPG', NULL, NULL, NULL, NULL, NULL, 'female', '2020-12-01', '09575757557', '0945636378484', 'Mandalay', 'Pyay', 'Samehada Nation', '0', 'teacher', '2020-12-06 02:05:39', '2020-12-06 02:05:39'),
(9, 'nyi hein htet', 'famestar046@gmail.com', NULL, '$2y$10$X0s7hWp5RF3miIxxqt7Mg.H4xEjNQq40RhuRz0IIVeDZkQILWd5ei', NULL, NULL, NULL, NULL, NULL, 'male', '1995-02-03', '09968336565', '09975906123', 'Yangon', 'Insein', '944, Lower Mingalardone Road, Insein Tsp, Yangon', '0', 'student', '2020-12-23 06:43:36', '2020-12-23 06:43:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_students`
--
ALTER TABLE `class_students`
  ADD PRIMARY KEY (`class_student_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_requests`
--
ALTER TABLE `course_requests`
  ADD PRIMARY KEY (`course_request_id`);

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
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

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
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `class_students`
--
ALTER TABLE `class_students`
  MODIFY `class_student_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `course_requests`
--
ALTER TABLE `course_requests`
  MODIFY `course_request_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
