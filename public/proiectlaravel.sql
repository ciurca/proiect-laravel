-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 08:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proiectlaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bilete`
--

CREATE TABLE `bilete` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `eveniment_id` bigint(20) UNSIGNED NOT NULL,
  `tip` varchar(255) NOT NULL,
  `pret` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bilete_individuale`
--

CREATE TABLE `bilete_individuale` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bilet_id` bigint(20) UNSIGNED NOT NULL,
  `participant_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colaboratori`
--

CREATE TABLE `colaboratori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nume` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `descriere` text DEFAULT NULL,
  `poza` text DEFAULT NULL,
  `telefon` varchar(255) DEFAULT NULL,
  `tip` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `eveniment_id` bigint(20) UNSIGNED NOT NULL,
  `colaborator_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evenimente`
--

CREATE TABLE `evenimente` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organizator_id` bigint(20) UNSIGNED NOT NULL,
  `titlu` varchar(255) NOT NULL,
  `descriere` text NOT NULL,
  `data_inceput` datetime NOT NULL,
  `data_sfarsit` datetime NOT NULL,
  `locatie` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evenimente`
--

INSERT INTO `evenimente` (`id`, `organizator_id`, `titlu`, `descriere`, `data_inceput`, `data_sfarsit`, `locatie`, `created_at`, `updated_at`) VALUES
(10, 1, 'Untold 2024', 'fdsafsdf', '2023-12-10 00:00:00', '2023-12-16 00:00:00', 'Toplița', '2023-12-12 13:27:17', '2023-12-12 13:34:35'),
(11, 1, 'Conferința Națională de Turism din Nordul Harghitei', 'fsdafds', '2023-12-04 00:00:00', '2023-12-20 00:00:00', 'Toplița', '2023-12-12 13:27:30', '2023-12-12 13:27:30');

-- --------------------------------------------------------

--
-- Table structure for table `event_speaker`
--

CREATE TABLE `event_speaker` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `eveniment_id` bigint(20) UNSIGNED NOT NULL,
  `speaker_id` bigint(20) UNSIGNED NOT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_speaker`
--

INSERT INTO `event_speaker` (`id`, `eveniment_id`, `speaker_id`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 11, 14, '2023-12-22 08:40:00', '2023-12-22 08:40:00', '2023-12-13 04:44:23', '2023-12-13 04:44:23'),
(2, 11, 15, '2023-12-22 08:40:00', '2023-12-22 08:40:00', '2023-12-13 04:53:43', '2023-12-13 04:53:43'),
(3, 11, 16, '2023-12-22 08:40:00', '2023-12-22 08:40:00', '2023-12-13 04:54:48', '2023-12-13 04:54:48');

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
-- Table structure for table `istoric_comenzi`
--

CREATE TABLE `istoric_comenzi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bilet_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `cantitate` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_09_135315_create_participanti_table', 2),
(6, '2023_12_09_135700_create_organizatori_table', 2),
(7, '2023_12_09_135728_create_evenimente_table', 2),
(8, '2023_12_09_135751_create_speakers_table', 2),
(9, '2023_12_09_140542_create_bilete_table', 2),
(10, '2023_12_09_140606_create_bilete_individuale_table', 2),
(11, '2023_12_09_140627_create_istoric_comenzi_table', 2),
(12, '2023_12_09_140652_create_event_speaker_table', 3),
(13, '2023_12_09_140900_create_colaboratori_table', 4),
(14, '2023_12_09_141549_create_contracts_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `organizatori`
--

CREATE TABLE `organizatori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nume` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizatori`
--

INSERT INTO `organizatori` (`id`, `nume`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Radu Ciurca', 'radu@gmail.com', 'untold', '2023-12-01 10:06:33', '$2y$10$fjcgLGN.yAwjiZWVHg2OG.f2L39KckGNOPFGfQadds1FW3qq.REUa', NULL, '2023-12-11 07:31:50', '2023-12-11 07:31:50'),
(2, 'bogddan', 'mega@image.ro', 'bogdan', NULL, '$2y$10$yEkTjjNbTbKHP2qKxfRdQ.C6wOBG61SUdfBAE8SgLs3McHAWxSOxC', NULL, '2023-12-11 07:59:07', '2023-12-11 07:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `participanti`
--

CREATE TABLE `participanti` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `nume` varchar(255) NOT NULL,
  `prenume` varchar(255) NOT NULL,
  `poza` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `telefon` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `speakers`
--

CREATE TABLE `speakers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nume` varchar(255) NOT NULL,
  `prenume` varchar(255) NOT NULL,
  `poza` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `telefon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `speakers`
--

INSERT INTO `speakers` (`id`, `nume`, `prenume`, `poza`, `email`, `telefon`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 'radu', 'c', NULL, 'radu@gmail.com', '0752776813', '2023-12-12 14:00:43', '2023-12-12 14:00:43', NULL),
(2, 'radu', 'c', NULL, 'radu@gmail.com', '0752776813', '2023-12-12 14:02:05', '2023-12-12 14:02:05', NULL),
(3, 'radu', 'c', NULL, 'radu@gmail.com', '0752776813', '2023-12-12 14:02:26', '2023-12-12 14:02:26', NULL),
(4, 'radu', 'c', NULL, 'radu@gmail.com', '0752776813', '2023-12-13 04:31:07', '2023-12-13 04:31:07', NULL),
(5, 'radu', 'c', NULL, 'radu@gmail.com', '0752776813', '2023-12-13 04:35:24', '2023-12-13 04:35:24', NULL),
(6, 'radu', 'c', NULL, 'radu@gmail.com', '0752776813', '2023-12-13 04:35:46', '2023-12-13 04:35:46', NULL),
(7, 'radu', 'c', NULL, 'radu@gmail.com', '0752776813', '2023-12-13 04:36:00', '2023-12-13 04:36:00', NULL),
(8, 'radu', 'c', NULL, 'radu@gmail.com', '0752776813', '2023-12-13 04:37:09', '2023-12-13 04:37:09', NULL),
(9, 'radu', 'c', NULL, 'radu@gmail.com', '0752776813', '2023-12-13 04:37:19', '2023-12-13 04:37:19', NULL),
(10, 'radu', 'c', NULL, 'radu@gmail.com', '0752776813', '2023-12-13 04:38:24', '2023-12-13 04:38:24', NULL),
(11, 'radu', 'c', NULL, 'radu@gmail.com', '0752776813', '2023-12-13 04:39:22', '2023-12-13 04:39:22', NULL),
(12, 'radu', 'c', NULL, 'radu@gmail.com', '0752776813', '2023-12-13 04:40:56', '2023-12-13 04:40:56', NULL),
(13, 'radu', 'c', NULL, 'radu@gmail.com', '0752776813', '2023-12-13 04:43:04', '2023-12-13 04:43:04', NULL),
(14, 'radu', 'c', NULL, 'radu@gmail.com', '0752776813', '2023-12-13 04:44:23', '2023-12-13 04:44:23', NULL),
(15, 'radu', 'c', NULL, 'radu@gmail.com', '0752776813', '2023-12-13 04:53:43', '2023-12-13 04:53:43', NULL),
(16, 'radu', 'c', NULL, 'radu@gmail.com', '0752776813', '2023-12-13 04:54:48', '2023-12-13 04:54:48', 1);

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Radu Ciurca', 'raduciurca@gmail.com', NULL, '$2y$10$dnpiiEf1TNfJiBVSDSjlo.2LI72ERdgy0PTZa4ACRwvnKy.Kfp/va', NULL, '2023-12-09 12:48:59', '2023-12-09 12:48:59'),
(2, 'Radu Ciurca', 'bogdan@gmail.com', NULL, '$2y$10$FxTuF4VzNA.RZN0DdcbYiuAMeWsk16vgsGSqvYlsMAu1sfuZpOFYS', NULL, '2023-12-09 12:51:12', '2023-12-09 12:51:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bilete`
--
ALTER TABLE `bilete`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bilete_eveniment_id_foreign` (`eveniment_id`);

--
-- Indexes for table `bilete_individuale`
--
ALTER TABLE `bilete_individuale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bilete_individuale_bilet_id_foreign` (`bilet_id`),
  ADD KEY `bilete_individuale_participant_id_foreign` (`participant_id`);

--
-- Indexes for table `colaboratori`
--
ALTER TABLE `colaboratori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `colaboratori_email_unique` (`email`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contracts_eveniment_id_foreign` (`eveniment_id`),
  ADD KEY `contracts_colaborator_id_foreign` (`colaborator_id`);

--
-- Indexes for table `evenimente`
--
ALTER TABLE `evenimente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evenimente_organizator_id_foreign` (`organizator_id`);

--
-- Indexes for table `event_speaker`
--
ALTER TABLE `event_speaker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_speaker_event_id_foreign` (`eveniment_id`),
  ADD KEY `event_speaker_speaker_id_foreign` (`speaker_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `istoric_comenzi`
--
ALTER TABLE `istoric_comenzi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `istoric_comenzi_bilet_id_foreign` (`bilet_id`),
  ADD KEY `istoric_comenzi_client_id_foreign` (`client_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizatori`
--
ALTER TABLE `organizatori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `organizatori_email_unique` (`email`),
  ADD UNIQUE KEY `organizatori_username_unique` (`username`);

--
-- Indexes for table `participanti`
--
ALTER TABLE `participanti`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `participanti_username_unique` (`username`),
  ADD UNIQUE KEY `participanti_email_unique` (`email`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `speakers`
--
ALTER TABLE `speakers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_created_by_col` (`created_by`);

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
-- AUTO_INCREMENT for table `bilete`
--
ALTER TABLE `bilete`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bilete_individuale`
--
ALTER TABLE `bilete_individuale`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colaboratori`
--
ALTER TABLE `colaboratori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evenimente`
--
ALTER TABLE `evenimente`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `event_speaker`
--
ALTER TABLE `event_speaker`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `istoric_comenzi`
--
ALTER TABLE `istoric_comenzi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `organizatori`
--
ALTER TABLE `organizatori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `participanti`
--
ALTER TABLE `participanti`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `speakers`
--
ALTER TABLE `speakers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bilete`
--
ALTER TABLE `bilete`
  ADD CONSTRAINT `bilete_eveniment_id_foreign` FOREIGN KEY (`eveniment_id`) REFERENCES `evenimente` (`id`);

--
-- Constraints for table `bilete_individuale`
--
ALTER TABLE `bilete_individuale`
  ADD CONSTRAINT `bilete_individuale_bilet_id_foreign` FOREIGN KEY (`bilet_id`) REFERENCES `bilete` (`id`),
  ADD CONSTRAINT `bilete_individuale_participant_id_foreign` FOREIGN KEY (`participant_id`) REFERENCES `participanti` (`id`);

--
-- Constraints for table `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_colaborator_id_foreign` FOREIGN KEY (`colaborator_id`) REFERENCES `colaboratori` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contracts_eveniment_id_foreign` FOREIGN KEY (`eveniment_id`) REFERENCES `evenimente` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `evenimente`
--
ALTER TABLE `evenimente`
  ADD CONSTRAINT `evenimente_organizator_id_foreign` FOREIGN KEY (`organizator_id`) REFERENCES `organizatori` (`id`);

--
-- Constraints for table `event_speaker`
--
ALTER TABLE `event_speaker`
  ADD CONSTRAINT `event_speaker_event_id_foreign` FOREIGN KEY (`eveniment_id`) REFERENCES `evenimente` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_speaker_speaker_id_foreign` FOREIGN KEY (`speaker_id`) REFERENCES `speakers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `istoric_comenzi`
--
ALTER TABLE `istoric_comenzi`
  ADD CONSTRAINT `istoric_comenzi_bilet_id_foreign` FOREIGN KEY (`bilet_id`) REFERENCES `bilete` (`id`),
  ADD CONSTRAINT `istoric_comenzi_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `participanti` (`id`);

--
-- Constraints for table `speakers`
--
ALTER TABLE `speakers`
  ADD CONSTRAINT `fk_created_by_col` FOREIGN KEY (`created_by`) REFERENCES `organizatori` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
