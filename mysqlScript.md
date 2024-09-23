```
-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 23-Set-2024 às 16:27
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `apiw5i`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Estudo', 1, '2024-09-21 21:04:41', '2024-09-21 21:04:41'),
(2, 'Trabalho', 1, '2024-09-21 21:04:51', '2024-09-21 21:04:51'),
(3, 'Vida Breno', 1, '2024-09-21 21:05:00', '2024-09-22 19:19:26'),
(4, 'treino', 1, '2024-09-22 04:33:11', '2024-09-22 04:33:11'),
(5, 'Leitura', 1, '2024-09-22 16:30:36', '2024-09-22 16:30:36'),
(6, 'Concurso PM', 1, '2024-09-22 16:35:31', '2024-09-22 16:35:31'),
(9, 'Concurso prefeitura simões filho', 1, '2024-09-22 16:43:50', '2024-09-22 16:43:50'),
(10, 'Concurso prefeitura simões filho', 1, '2024-09-22 16:45:00', '2024-09-22 16:45:00'),
(11, 'Concurso prefeitura simões filho', 1, '2024-09-22 16:45:36', '2024-09-22 16:45:36'),
(12, 'Concurso prefeitura simões filho', 1, '2024-09-22 16:46:16', '2024-09-22 16:46:16'),
(14, 'Inglês', 1, '2024-09-23 12:29:47', '2024-09-23 12:29:47');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '2024_09_18_211131_create_personal_access_tokens_table', 1),
(4, '2024_09_18_221924_create_categories_table', 1),
(5, '2024_09_18_223311_create_tasks_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(2, 'App\\Models\\User', 1, 'users', 'b0c8af28588ceac6f601c1727bc3112c414a2d8a5ba9df4ac3b33c91d8fbb1aa', '[\"*\"]', '2024-09-23 12:48:29', NULL, '2024-09-22 04:30:14', '2024-09-23 12:48:29'),
(4, 'App\\Models\\User', 1, 'users', 'e909ebb98f0712169158d7214ef942d0d749fed91f4325fbe6f7537fc72d88ac', '[\"*\"]', NULL, NULL, '2024-09-23 15:52:48', '2024-09-23 15:52:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `beggining` datetime DEFAULT NULL,
  `finishing` datetime DEFAULT NULL,
  `break_began` datetime DEFAULT NULL,
  `break_finished` datetime DEFAULT NULL,
  `total_time_task` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `category_id`, `name`, `description`, `status`, `beggining`, `finishing`, `break_began`, `break_finished`, `total_time_task`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Simulado', 'Simulado de matematica', 0, '2024-09-21 18:08:42', '2024-09-21 18:13:09', NULL, NULL, 267, '2024-09-21 21:06:26', '2024-09-21 21:13:09'),
(2, 2, 1, 'Simulado de geografia', 'atualizando campo', 0, '2024-09-21 18:08:13', '2024-09-21 18:13:23', NULL, NULL, 310, '2024-09-21 21:07:15', '2024-09-22 20:36:36'),
(3, 1, 1, 'Estudar gramatica', 'Estudar gramatica para o vestibular', 0, '2024-09-21 18:11:21', '2024-09-21 18:14:12', '2024-09-21 18:13:49', '2024-09-21 18:14:03', 171, '2024-09-21 21:11:04', '2024-09-21 21:14:12'),
(4, 1, 1, 'Estudar alemão', 'Estudar para viajar para aleamnha', 0, '2024-09-21 18:17:55', '2024-09-21 18:23:58', '2024-09-21 18:22:46', '2024-09-21 18:19:24', 364, '2024-09-21 21:17:09', '2024-09-21 21:23:58'),
(5, 1, 3, 'Passar tempo com mãe', 'tempo com mae', 0, '2024-09-21 16:38:29', '2024-09-21 16:39:54', '2024-09-21 16:39:23', '2024-09-21 16:39:37', 85, '2024-09-21 19:37:54', '2024-09-21 19:39:54'),
(7, 1, 4, 'Treino costas', 'Fortalecer costas para competição', 0, '2024-09-22 01:40:06', '2024-09-22 01:42:30', '2024-09-22 01:41:22', '2024-09-22 01:41:45', 145, '2024-09-22 04:39:17', '2024-09-22 04:42:31'),
(11, 1, 2, 'Treino peito', 'Fortalecer peito para competição', 1, '2024-09-22 18:11:01', '2024-09-22 18:30:27', '2024-09-22 18:21:04', '2024-09-22 18:34:08', 1166, '2024-09-22 21:10:46', '2024-09-22 21:34:08'),
(12, 1, 4, 'Treino biceps', 'Fortalecer biceps para competição', 0, '2024-09-22 21:37:28', '2024-09-22 21:55:39', NULL, NULL, 1091, '2024-09-23 00:31:49', '2024-09-23 00:55:39'),
(13, 3, 14, 'Assistir podcast', 'Assistir um podcast completo em inglês', 0, '2024-09-23 09:37:50', '2024-09-23 09:42:42', '2024-09-23 09:40:41', '2024-09-23 09:41:49', 293, '2024-09-23 12:36:23', '2024-09-23 12:42:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Breno', 'teste1@gmail.com', NULL, '$2y$12$bgCCni84vXKV8NODfLUe1.AjhCMxBN5TizfiKccfEDfcV77jEIkjG', NULL, '2024-09-21 21:03:58', '2024-09-21 21:03:58'),
(2, 'Joao', 'teste2@gmail.com', NULL, '$2y$12$gMrJposY6OE7Zz6LxwhC9ORRDPdNgXd2dpHPGL0evkIKT4kuQWuBW', NULL, '2024-09-21 21:04:14', '2024-09-21 21:04:14'),
(3, 'Lucas', 'teste5@gmail.com', NULL, '$2y$12$o9KRnH7PEk//SLMRuihdQeA432oM4xEuTC0B90njewy9b0kun/ZWi', NULL, '2024-09-23 12:23:50', '2024-09-23 12:23:50'),
(4, 'Lucas', 'teste6@gmail.com', NULL, '$2y$12$ZV5TwmAMbI0uKUg1032rtevxV5QDjRbMx6hIp8w3ZyOzXVLSv5SVe', NULL, '2024-09-23 12:34:52', '2024-09-23 12:34:52'),
(5, 'Junior', 'teste7@gmail.com', NULL, '$2y$12$5O7M3xcaevE.QZVVQz8a7uOjQOLWwiu0voiuwigiUc1AdN9bawzRK', NULL, '2024-09-23 14:19:42', '2024-09-23 14:19:42'),
(7, 'filipe', 'teste8@gmail.com', NULL, '$2y$12$C1aPKHXBn6bwvrbhTZ7o4.PRJMBXOpLnLYngJnnypFDAiy4RWsO8q', NULL, '2024-09-23 14:25:05', '2024-09-23 14:25:05');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Índices para tabela `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Índices para tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices para tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices para tabela `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_user_id_foreign` (`user_id`),
  ADD KEY `tasks_category_id_foreign` (`category_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

```