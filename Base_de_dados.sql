-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05-Jan-2017 às 22:15
-- Versão do servidor: 5.7.11
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `Course_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `inst_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `courses`
--

INSERT INTO `courses` (`id`, `Course_name`, `inst_id`, `created_at`, `updated_at`) VALUES
(1, 'Engenharia Informatica', 1, NULL, NULL),
(2, 'Engenharia Electrónica ', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `course_discipline`
--

CREATE TABLE `course_discipline` (
  `course_id` int(10) UNSIGNED NOT NULL,
  `discp_id` int(10) UNSIGNED NOT NULL,
  `inst_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `course_discipline`
--

INSERT INTO `course_discipline` (`course_id`, `discp_id`, `inst_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(1, 2, 1, NULL, NULL),
(1, 3, 1, NULL, NULL),
(1, 4, 1, NULL, NULL),
(1, 5, 1, NULL, NULL),
(2, 6, 1, NULL, NULL),
(2, 5, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplines`
--

CREATE TABLE `disciplines` (
  `id` int(10) UNSIGNED NOT NULL,
  `discp_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `disciplines`
--

INSERT INTO `disciplines` (`id`, `discp_name`, `created_at`, `updated_at`) VALUES
(1, 'ACR', NULL, NULL),
(2, 'Dis', NULL, NULL),
(3, 'GSR', NULL, NULL),
(4, 'HCSE', NULL, NULL),
(5, 'Web Social', NULL, NULL),
(6, 'Circuitos Electronicos', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `discipline_user`
--

CREATE TABLE `discipline_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_inst` int(10) UNSIGNED NOT NULL,
  `udiscp_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `discipline_user`
--

INSERT INTO `discipline_user` (`user_id`, `user_inst`, `udiscp_id`, `created_at`, `updated_at`) VALUES
(23, 1, 1, NULL, NULL),
(20, 1, 5, NULL, NULL),
(20, 1, 1, NULL, NULL),
(22, 1, 1, NULL, NULL),
(21, 1, 1, NULL, NULL),
(20, 1, 4, NULL, NULL),
(20, 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `data_fim` datetime(6) NOT NULL,
  `m_limit` int(11) NOT NULL,
  `discp_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `nome`, `data_fim`, `m_limit`, `discp_id`, `created_at`, `updated_at`, `password`) VALUES
(18, 'Duarte_acr', '2017-01-06 00:00:00.000000', 2, 1, '2017-01-04 18:46:34', '2017-01-04 18:46:34', 'acr'),
(17, 'Leo_acr', '2017-01-06 00:00:00.000000', 2, 1, '2017-01-04 18:42:23', '2017-01-04 18:42:23', 'acr');

-- --------------------------------------------------------

--
-- Estrutura da tabela `group_user`
--

CREATE TABLE `group_user` (
  `group_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `gu_inst_id` int(10) UNSIGNED NOT NULL,
  `gu_discp_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `group_user`
--

INSERT INTO `group_user` (`group_id`, `user_id`, `gu_inst_id`, `gu_discp_id`) VALUES
(18, 22, 1, 1),
(17, 21, 1, 1),
(17, 20, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `institutions`
--

CREATE TABLE `institutions` (
  `id` int(10) UNSIGNED NOT NULL,
  `inst_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `institutions`
--

INSERT INTO `institutions` (`id`, `inst_name`, `country`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Universidade da Madeira', 'Portugal', 1, NULL, NULL),
(2, 'Francisco Franco', 'Portugal', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(26, '2014_10_12_000000_create_users_table', 1),
(27, '2014_10_12_100000_create_password_resets_table', 1),
(28, '2016_12_20_002412_create_institution_table', 1),
(29, '2016_12_20_133103_create_course_table', 1),
(30, '2016_12_22_020622_create_disciplines_table', 2),
(31, '2016_12_23_005635_add_course_to_users', 3),
(33, '2016_12_21_235251_group', 4),
(34, '2016_12_22_000303_create_group_user_pivot_table', 4),
(46, '2016_12_22_222206_student_grades', 5),
(47, '2016_12_23_034819_user_has_many_discplines', 5),
(48, '2016_12_26_024910_create_users_disciplines_tables', 5),
(49, '2016_12_26_032511_rename_disciplines_users_table_to_discipline_user', 5),
(50, '2016_12_26_162157_change_groups_columns', 6),
(51, '2016_12_26_214406_Create_Group_User_Pivot_Table', 7),
(58, '2016_12_28_011618_add_profile_roles_to_users', 8),
(59, '2016_12_28_012922_create_profile_tables', 8),
(60, '2016_12_29_112500_group_user_table_gu_discp_id', 9),
(61, '2016_12_30_013758_primary_keys_has_many_tables', 10),
(62, '2017_01_03_025952_group_table_change', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Lider', NULL, NULL),
(2, 'Criativo ', NULL, NULL),
(3, 'Comunicador ', NULL, NULL),
(4, 'Bastidor', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `students_grades`
--

CREATE TABLE `students_grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `work_done` int(11) NOT NULL,
  `work_comprehension` int(11) NOT NULL,
  `quality_work` int(11) NOT NULL,
  `cooperation` int(11) NOT NULL,
  `commitment` int(11) NOT NULL,
  `efficiency` int(11) NOT NULL,
  `utilizadores_idUser` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `students_grades`
--

INSERT INTO `students_grades` (`id`, `work_done`, `work_comprehension`, `quality_work`, `cooperation`, `commitment`, `efficiency`, `utilizadores_idUser`, `created_at`, `updated_at`) VALUES
(1, 5, 5, 5, 5, 5, 5, 15, '2017-01-02 02:46:47', '2017-01-02 02:46:47'),
(2, 5, 5, 5, 5, 5, 5, 14, '2017-01-03 01:17:03', '2017-01-03 01:17:03'),
(3, 1, 1, 1, 1, 1, 1, 15, '2017-01-03 01:17:52', '2017-01-03 01:17:52'),
(4, 2, 2, 2, 2, 2, 2, 15, '2017-01-03 01:18:14', '2017-01-03 01:18:14'),
(5, 1, 4, 2, 5, 3, 2, 15, '2017-01-04 05:30:12', '2017-01-04 05:30:12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `inst_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `profile_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `inst_id`, `remember_token`, `created_at`, `updated_at`, `course_id`, `type`, `profile_id`) VALUES
(23, 'FilipeProff', 'FilipeProff@gmail.com', '$2y$10$kMyXzq4/Y9jPmO6.PAB/HOl0OewtKfQUyOFeSnCaV1ACqOmLVjgbe', 1, 'jNc2zBLh3oq0WaJ7ZLELkZsV6BLekbxT9VggnA1FxFLncgBZC6tohYAuTXpI', '2017-01-04 18:50:58', '2017-01-04 19:51:12', 1, 'prof', 3),
(21, 'Jorgec', 'jorgec@gmail.com', '$2y$10$5YapEDkKUkWBpp5ggjQrY.i6a3PhX/TcTZenyzPx5Sc2vPCyo1Uw6', 1, 'cVHl60WFehapvUBFcm0f9zCZXtwirlQiVtuCD8yuPSfHhqqc6zbJO5gglNmd', '2017-01-04 18:44:10', '2017-01-04 18:45:10', 1, 'user', 4),
(22, 'Duarte', 'duarte@gmail.com', '$2y$10$CL0lJhiYjkaeVfCZz6Ih1Oe0ltKjMRhrHpFt/3xMt5nK/HmKmoZ/a', 1, 'zpSuRYVDwf6pJO50HvtyBwd49Lmi2i8rflptG0gYDlpIjdWBKsnWQK5RPlYj', '2017-01-04 18:45:51', '2017-01-04 18:50:11', 1, 'user', 3),
(20, 'LeonelFreitas', 'leocf@gmail.com', '$2y$10$PGOklzT05ANz5MDoBRQi..2yYODf/zYm2RQGXH9muZANrnOSzWo6q', 1, '65XoVir2dqFnQ9RfVX4MMB59h21N07vHjsfyGgerJiMHbSsoxKW6nJhivIdB', '2017-01-04 18:41:17', '2017-01-04 23:24:34', 1, 'user', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_course_name_unique` (`Course_name`),
  ADD KEY `courses_inst_id_foreign` (`inst_id`);

--
-- Indexes for table `course_discipline`
--
ALTER TABLE `course_discipline`
  ADD PRIMARY KEY (`course_id`,`discp_id`,`inst_id`),
  ADD KEY `course_discipline_discp_id_foreign` (`discp_id`),
  ADD KEY `course_discipline_inst_id_foreign` (`inst_id`);

--
-- Indexes for table `disciplines`
--
ALTER TABLE `disciplines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `disciplines_discp_name_unique` (`discp_name`);

--
-- Indexes for table `discipline_user`
--
ALTER TABLE `discipline_user`
  ADD PRIMARY KEY (`user_id`,`user_inst`,`udiscp_id`),
  ADD KEY `disciplines_users_user_inst_foreign` (`user_inst`),
  ADD KEY `disciplines_users_udiscp_id_foreign` (`udiscp_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_discp_id_foreign` (`discp_id`);

--
-- Indexes for table `group_user`
--
ALTER TABLE `group_user`
  ADD PRIMARY KEY (`group_id`,`user_id`,`gu_inst_id`),
  ADD KEY `group_user_gu_inst_id_foreign` (`gu_inst_id`),
  ADD KEY `group_user_group_id_index` (`group_id`),
  ADD KEY `group_user_user_id_index` (`user_id`),
  ADD KEY `group_user_gu_discp_id_foreign` (`gu_discp_id`);

--
-- Indexes for table `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `institutions_inst_name_unique` (`inst_name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_grades`
--
ALTER TABLE `students_grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_grades_utilizadores_iduser_foreign` (`utilizadores_idUser`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_inst_id_foreign` (`inst_id`),
  ADD KEY `users_course_id_foreign` (`course_id`),
  ADD KEY `users_profile_id_foreign` (`profile_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `disciplines`
--
ALTER TABLE `disciplines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `institutions`
--
ALTER TABLE `institutions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `students_grades`
--
ALTER TABLE `students_grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
