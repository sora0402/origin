-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-04-01 21:45:32
-- サーバのバージョン： 10.4.27-MariaDB
-- PHP のバージョン: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `whats_up`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `other_email` varchar(255) DEFAULT NULL,
  `body` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `other_email`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'お問い合わせテスト', '2023-04-01 12:08:51', '2023-04-01 12:08:51'),
(2, 1, 'otoiawase@otoiawase', 'お問い合わせテスト2', '2023-04-01 12:09:37', '2023-04-01 12:09:37');

-- --------------------------------------------------------

--
-- テーブルの構造 `diaries`
--

CREATE TABLE `diaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_feeling` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `diaries`
--

INSERT INTO `diaries` (`id`, `user_id`, `date`, `total_feeling`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-04-01', 0, NULL, '2023-04-01 11:08:04', '2023-04-01 12:11:39'),
(2, 2, '2023-04-01', 0, NULL, '2023-04-01 11:39:36', '2023-04-01 11:41:04');

-- --------------------------------------------------------

--
-- テーブルの構造 `diary_jobs`
--

CREATE TABLE `diary_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `diary_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `assessment` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `diary_jobs`
--

INSERT INTO `diary_jobs` (`id`, `user_id`, `diary_id`, `body`, `assessment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'テスト1ユーザー1', NULL, NULL, NULL),
(2, 1, 1, 'テスト2ユーザー1', 1, '2023-03-31 15:00:00', NULL),
(3, 1, 1, 'テスト3ユーザー1', 2, '2023-04-01 11:27:36', '2023-04-01 11:27:36'),
(4, 1, 1, 'テスト4ユーザー1', 3, '2023-04-01 11:27:36', '2023-04-01 11:27:36'),
(5, 1, 1, 'テスト5ユーザー1', NULL, '2023-04-01 11:27:36', '2023-04-01 11:27:36'),
(6, 1, 1, 'テスト6ユーザー1', 1, '2023-04-01 11:27:36', '2023-04-01 11:27:36'),
(7, 2, 2, 'test11user2', 1, '2023-04-01 11:44:04', '2023-04-01 11:44:04'),
(8, 2, 2, 'test12user2', 2, '2023-04-01 11:44:04', '2023-04-01 11:44:04'),
(9, 2, 2, 'test13user2', 3, '2023-04-01 11:44:04', '2023-04-01 11:44:04'),
(10, 2, 2, 'test14user2', NULL, '2023-04-01 11:44:04', '2023-04-01 11:44:04'),
(11, 2, 2, 'test15user2', 1, '2023-04-01 11:44:04', '2023-04-01 11:44:04'),
(12, 2, 2, 'test16user2', 2, '2023-04-01 11:44:04', '2023-04-01 11:44:04'),
(13, 2, 2, 'test16user2', 3, '2023-04-01 11:44:04', '2023-04-01 11:44:04');

-- --------------------------------------------------------

--
-- テーブルの構造 `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `diary_id` int(11) NOT NULL,
  `feeling` int(11) DEFAULT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `events`
--

INSERT INTO `events` (`id`, `user_id`, `diary_id`, `feeling`, `body`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 3, '怒', '2023-04-01 11:44:04', '2023-04-01 11:44:04'),
(2, 2, 2, 4, '喜', '2023-04-01 11:44:04', '2023-04-01 11:44:04'),
(3, 2, 2, 1, '哀', '2023-04-01 11:44:04', '2023-04-01 11:44:04'),
(4, 2, 2, 2, '楽', '2023-04-01 11:44:04', '2023-04-01 11:44:04');

-- --------------------------------------------------------

--
-- テーブルの構造 `failed_jobs`
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
-- テーブルの構造 `good_jobs`
--

CREATE TABLE `good_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `done_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `jobs`
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
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000001_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_100002_create_password_reset_tokens_table', 1),
(4, '2019_08_19_000003_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_03_13_094817_create_diaries_table', 1),
(7, '2023_03_13_094836_create_dairy_jobs_table', 1),
(8, '2023_03_13_094948_create_events_table', 1),
(9, '2023_03_13_095040_create_others_table', 1),
(10, '2023_03_13_095117_create_good_jobs_table', 1),
(11, '2023_03_13_095226_create_reports_table', 1),
(12, '2023_03_13_095308_create_contacts_table', 1),
(13, '2023_03_23_221255_create_sessions_table', 1),
(14, '2023_03_25_194101_create_jobs_table', 1),
(15, '2023_03_27_042507_change_diaries_table', 2),
(16, '2023_03_31_194532_change_contacts_table_column_tel', 3);

-- --------------------------------------------------------

--
-- テーブルの構造 `others`
--

CREATE TABLE `others` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `diary_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `others`
--

INSERT INTO `others` (`id`, `user_id`, `diary_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'テストテスト', '2023-04-01 11:44:04', '2023-04-01 11:44:04');

-- --------------------------------------------------------

--
-- テーブルの構造 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `personal_access_tokens`
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
-- テーブルの構造 `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `done_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `reports`
--

INSERT INTO `reports` (`id`, `to_user_id`, `from_user_id`, `done_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 6, '2023-04-01 12:02:41', '2023-04-01 12:02:41'),
(2, 2, 1, 13, '2023-04-01 12:03:01', '2023-04-01 12:03:01');

-- --------------------------------------------------------

--
-- テーブルの構造 `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `time_difference` int(11) NOT NULL DEFAULT 2,
  `last_login` datetime DEFAULT NULL,
  `share_mode` int(11) NOT NULL DEFAULT 0,
  `hide_share_mode` int(11) NOT NULL DEFAULT 0,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `time_difference`, `last_login`, `share_mode`, `hide_share_mode`, `role`, `email_verified_at`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'test1', 'test1@test1', '$2y$10$xBM2EAhbCPPa9MrksBPnZeirAxv.2LiJTWfQChYH72vp2mrsL7Svq', 2, '2023-04-01 21:11:39', 0, 0, 'user', NULL, NULL, NULL, '2023-04-01 11:07:01', '2023-04-01 12:11:39'),
(2, 'test2', 'test2@test2', '$2y$10$UdvrIrMInkaP6ylIjrlkUO..Kp/SIoTIlcNMVEINs1PHhlrQg6rrq', 2, '2023-04-01 20:41:04', 0, 0, 'user', NULL, NULL, NULL, '2023-04-01 11:36:00', '2023-04-01 11:41:04'),
(3, 'test3', 'test3@test3', '$2y$10$sGZR/d/os5o/pIOY3IdHkewSQKX3jaKFk8bNZzyIvBEJWD4HmGY/e', 2, NULL, 0, 0, 'admin', NULL, NULL, NULL, '2023-04-01 11:59:54', '2023-04-01 11:59:54');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `diaries`
--
ALTER TABLE `diaries`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `diary_jobs`
--
ALTER TABLE `diary_jobs`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- テーブルのインデックス `good_jobs`
--
ALTER TABLE `good_jobs`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `others`
--
ALTER TABLE `others`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- テーブルのインデックス `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- テーブルのインデックス `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- テーブルのインデックス `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルの AUTO_INCREMENT `diaries`
--
ALTER TABLE `diaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルの AUTO_INCREMENT `diary_jobs`
--
ALTER TABLE `diary_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- テーブルの AUTO_INCREMENT `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- テーブルの AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `good_jobs`
--
ALTER TABLE `good_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- テーブルの AUTO_INCREMENT `others`
--
ALTER TABLE `others`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
