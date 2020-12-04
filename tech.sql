-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1,	'solved',	'2020-10-30 21:28:49',	'2020-10-30 21:28:49'),
(2,	'unsolved',	'2020-10-30 21:28:50',	'2020-10-30 21:28:50');

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int NOT NULL,
  `user_id` int NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_question_id_index` (`question_id`),
  KEY `comments_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `comments` (`id`, `question_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1,	4,	4,	'Kubernetes adalah sistem orkestrasi wadah sumber terbuka untuk mengotomatiskan penerapan, penskalaan, dan manajemen aplikasi komputer. Awalnya dirancang oleh Google dan sekarang dikelola oleh Cloud Native Computing Foundation',	'2020-11-03 05:44:41',	'2020-11-03 05:44:41'),
(6,	3,	4,	'tes tws',	'2020-11-25 12:06:11',	'2020-11-25 12:06:11'),
(7,	3,	6,	'tes tes',	'2020-11-25 12:06:38',	'2020-11-25 12:06:38'),
(8,	4,	4,	'hai',	'2020-11-28 00:42:22',	'2020-11-28 00:42:22'),
(9,	4,	4,	'hia zuki',	'2020-11-30 00:47:55',	'2020-11-30 00:47:55');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `hashtag_question`;
CREATE TABLE `hashtag_question` (
  `hashtag_id` bigint unsigned NOT NULL,
  `question_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`hashtag_id`,`question_id`),
  KEY `hashtag_question_question_id_foreign` (`question_id`),
  CONSTRAINT `hashtag_question_hashtag_id_foreign` FOREIGN KEY (`hashtag_id`) REFERENCES `hashtags` (`id`) ON DELETE CASCADE,
  CONSTRAINT `hashtag_question_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `hashtags`;
CREATE TABLE `hashtags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hashtag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `hashtags` (`id`, `hashtag`, `created_at`, `updated_at`) VALUES
(94,	'html ',	'2020-11-30 00:27:31',	'2020-11-30 00:27:31'),
(95,	'js ',	'2020-11-30 00:27:31',	'2020-11-30 00:27:31'),
(96,	'css $kubernetes ',	'2020-11-30 00:27:31',	'2020-11-30 00:27:31'),
(97,	'webdev ',	'2020-11-30 00:27:31',	'2020-11-30 00:27:31'),
(98,	'beginner',	'2020-11-30 00:27:32',	'2020-11-30 00:27:32'),
(99,	'samsul',	'2020-11-30 00:28:11',	'2020-11-30 00:28:11'),
(100,	'tes ',	'2020-11-30 00:51:06',	'2020-11-30 00:51:06'),
(101,	'css ',	'2020-11-30 00:51:06',	'2020-11-30 00:51:06'),
(102,	'wedev ',	'2020-11-30 00:51:06',	'2020-11-30 00:51:06'),
(103,	'sadsd',	'2020-11-30 00:51:07',	'2020-11-30 00:51:07');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2020_10_28_123543_create_questions_table',	1),
(5,	'2020_10_30_071656_create_categories_table',	1),
(6,	'2020_11_03_123304_create_comments_table',	2),
(7,	'2020_11_24_180824_create_saved_posts_table',	3),
(8,	'2020_11_28_084044_create_hashtags_table',	4),
(9,	'2020_11_29_015541_create_hashtag_question_table',	5),
(10,	'2020_11_29_022540_create_hashtag_question_table',	6),
(11,	'2020_11_29_023620_create_hashtag_questions_table',	7),
(12,	'2020_11_29_024242_create_hashtag_questions_table',	8),
(13,	'2020_11_29_024736_create_hashtag_questions_table',	9),
(14,	'2020_11_29_025627_create_hashtag_question_table',	10);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questions_user_id_index` (`user_id`),
  KEY `questions_category_id_index` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `questions` (`id`, `user_id`, `category_id`, `title`, `slug`, `question`, `created_at`, `updated_at`) VALUES
(3,	2,	2,	'bagaimana cara autentikasi react laravel menggunakan jwt',	'bagaimana-cara-autentikasi-react-laravel-menggunakan-jwt',	'saya kemaren belajar reactjs dan laravel tapi saya terkendala pada bagian autentikasi, disini saya mau bertanya bagaimana cara autentikasi reactjs dan laravel menggunakan jwt',	'2020-10-31 23:49:13',	'2020-10-31 23:49:13'),
(4,	2,	2,	'apa itu kubernetes',	'apa-itu-kubernetes',	'saya mau bertanya apa itu kubenrnetes dan fungsinya',	'2020-10-31 23:52:05',	'2020-10-31 23:52:05');

DROP TABLE IF EXISTS `saved_posts`;
CREATE TABLE `saved_posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `question_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `saved_posts_user_id_index` (`user_id`),
  KEY `saved_posts_question_id_index` (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'muhammad al farizzi',	'alfarizzi',	'malfarizzi13@gmail.com',	NULL,	'$2y$10$7/r.jNhDBInj6sKJdzx3suxjuh95MT7dYQ3xtAymLG5eKwC0jlSti',	NULL,	'2020-10-30 21:28:50',	'2020-10-30 21:28:50'),
(2,	'steve jobs',	'jobs',	'jobs@gmail.com',	NULL,	'$2y$10$Jo2pLpgHuzh235/NBK6qQe1LvrK/.LB9HHOAIAo/rgBX3XpKfW5Qy',	NULL,	'2020-10-30 21:28:51',	'2020-10-30 21:28:51'),
(3,	'eduardo saverin',	'saverin',	'saverin@gmail.com',	NULL,	'$2y$10$YuPlvXGeQHravg3.XB8Tg.eQnCeNVK9wACgwalHXlrWazsCZkXh92',	NULL,	'2020-10-30 21:28:51',	'2020-10-30 21:28:51'),
(4,	'mark zuckerberg',	'mark',	'mark@gmail.com',	NULL,	'$2y$10$t4m00z5il6PC5fOc7pD7BucdButd.xbFi/bMYdtICSFIzfhzEMQhG',	NULL,	'2020-10-30 21:28:51',	'2020-10-30 21:28:51'),
(5,	'richard',	'richard',	'richard@gmail.com',	NULL,	'$2y$10$89.lNKlan9ri2PXyfROFXecXXv30A22jNnDIiJEOVrZPWuBwOv9VO',	NULL,	'2020-10-30 21:28:51',	'2020-10-30 21:28:51'),
(6,	'dinesh',	'dinesh',	'dinesh@gmail.com',	NULL,	'$2y$10$7FiwftOxZkh/Mz3Q8noboOi4qOeSbXElOjV7R6xoZIpqWoD7uGTFm',	NULL,	'2020-10-30 21:28:51',	'2020-10-30 21:28:51'),
(7,	'gilfoyle',	'gilfoyle',	'gilfoyle@gmail.com',	NULL,	'$2y$10$AsYet2odM0LABX0Ja1ZNHOFZeAEI/4q2j0GfpdwHYbP7oJvCfc3WC',	NULL,	'2020-10-30 21:28:51',	'2020-10-30 21:28:51'),
(10,	'loculeqohy',	'hejic',	'nyzojox@mailinator.com',	NULL,	'Pa$$w0rd!',	NULL,	'2020-11-24 02:29:55',	'2020-11-24 02:29:55');

-- 2020-12-02 11:22:53
