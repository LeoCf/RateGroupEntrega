-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28-Dez-2016 às 01:23
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
(1, 2, 1, NULL, NULL);

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
(4, 'HCSE', NULL, NULL);

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
(2, 1, 1, NULL, NULL),
(13, 1, 1, NULL, NULL),
(15, 1, 1, NULL, NULL),
(4, 1, 3, NULL, NULL),
(1, 1, 2, NULL, NULL),
(15, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` int(11) NOT NULL,
  `data_fim` int(11) NOT NULL,
  `m_limit` int(11) NOT NULL,
  `discp_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `nome`, `data_fim`, `m_limit`, `discp_id`, `created_at`, `updated_at`) VALUES
(1, 139, 3, 3, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `group_user`
--

CREATE TABLE `group_user` (
  `group_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `gu_discp_id` int(10) UNSIGNED NOT NULL,
  `gu_inst_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `group_user`
--

INSERT INTO `group_user` (`group_id`, `user_id`, `gu_discp_id`, `gu_inst_id`) VALUES
(1, 13, 1, 1),
(1, 15, 1, 1);

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
(51, '2016_12_26_214406_Create_Group_User_Pivot_Table', 7);

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
  `course_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `inst_id`, `remember_token`, `created_at`, `updated_at`, `course_id`) VALUES
(3, 'rob', 'stark@gmail.com', '$2y$10$UVptp4QNekpw.I6vqf2JxebJpuGRgdAT0E.LxyjndGQMgWfl3gkyW', 1, NULL, '2016-12-21 12:51:07', '2016-12-21 12:51:07', 0),
(2, 'John', 'fsdfsadf@gmail.com', '$2y$10$TgLCYDEBnvHNGVWCUf9JfemOjYr58IIJhZNHitF/4/oPf2A99CCRa', 1, NULL, '2016-12-21 12:47:37', '2016-12-21 12:47:37', 0),
(4, 'robs', 'starsk@gmail.com', '$2y$10$Pztmk.7nIyzBEJGz34/GoOVQFdDUSGCPbpYshAhjjOJfVTAY.ibma', 1, NULL, '2016-12-21 12:52:12', '2016-12-21 12:52:12', 0),
(5, 'ee', 'starsk@gmail.coms', '$2y$10$zb0QDfMepqVdlwAm/tjCguqgMHFHHhce0ea7aIWOr5EZmZ.8q7FbS', 0, NULL, '2016-12-21 12:58:04', '2016-12-21 12:58:04', 0),
(6, 'fdsasdf', 'fsdffsd@gmail.comx', '$2y$10$HRQDBEGaXwCaHoUdZ7uWD.T/fquGXUN2rPCyPeihett130J17U1Mu', 1, NULL, '2016-12-22 00:25:57', '2016-12-22 00:25:57', 0),
(7, 'fdsasdfx', 'fsdffsssd@gmail.comx', '$2y$10$ER/uaNJbiMXTqxFrwDWJJOQLqzXyikeiEMMahk9HIpau2eBlwAWSi', 1, NULL, '2016-12-22 00:26:47', '2016-12-22 00:26:47', 0),
(8, 'testefinals', 'funcionacrls@gmail.com', '$2y$10$YO4w.CRY7b5WSbp4dvPIjeVzaF5zFq6zMuVtQy4raxtWhVmuNIOMG', 1, NULL, '2016-12-22 00:43:14', '2016-12-22 00:43:14', 0),
(9, 'testesporcariua', 'testeporcaria@gmail.com', '$2y$10$NWEGtSMCegn1DHMY2QGvduK9Y3rkSVC0Pf0Iafy0RB1/54Mn2CreS', 1, NULL, '2016-12-22 00:44:17', '2016-12-22 00:44:17', 0),
(10, 'LeonelFreitas', 'ldin916@live.com.pt', '$2y$10$l.ojrl3OSG0zZnAifLzbSeeeeC.zdwWxRGBqhIU2s1qgDKEuWdiG2', 1, 'Z5AtpZZYSKBPW0sMOzqxQ1GAu80T8acNB94APN94aNR1OS609e0DLXlmUrr2', '2016-12-22 00:55:16', '2016-12-23 00:43:42', 0),
(11, 'Leonelx', 'x@gmail.com', '$2y$10$LwDJhJgo1VcZtbi7qG01/.iwx9QPEZfL.A8YmmUexJxCeGUkp63IC', 2, 'lgoAy6yEn2J1YOW9akgMv1hRMUk1lCG1fZziYXgUiSwBOyQV6lAmoyTGFYqx', '2016-12-23 00:48:05', '2016-12-23 00:52:04', 0),
(12, 'curso', 'ldin916@live.coxm.pt', '$2y$10$yK74Ne.m/Uc373pneq3M3.ijZSFNUaU7SeuVifRvGhHwruSe60EbS', 1, 'afaDeSzK21KncpEXJaEa5P2S1kZUv8hCs0WZ4aikyp3vnedHxesHfv0dzFSG', '2016-12-23 00:52:26', '2016-12-23 01:03:12', 0),
(13, 'curso3', 'password@gmail.com', '$2y$10$2bblpqTlgGyxXf8c1RuN3.vxPCZb9qXkZ76dN99hDsoIeGc0KOdK.', 1, NULL, '2016-12-23 01:18:04', '2016-12-23 01:18:04', 1),
(14, 'leonelFreitas', 'Ldin619@hotmail.com', '$2y$10$/u9rjUbTHVPYWliEmTU02Oh6ex3XgwcIrU007WzhxuRihboCD5Mx2', 1, NULL, '2016-12-24 02:17:19', '2016-12-24 02:17:19', 1),
(15, 'testes', 'testes@gmail.com', '$2y$10$LImOHxE22tfwxR4OI0.DqeuFAhnnjhSxod4h5I2ngSr2oPqiv/A9e', 1, 'uPv6G267IUvfenyAKG22ft7mlyWen54DK5FoTwpRmKymPJqV8O7hbZh8giUA', '2016-12-26 00:41:18', '2016-12-27 02:55:47', 1);

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
  ADD KEY `course_discipline_course_id_foreign` (`course_id`),
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
  ADD KEY `disciplines_users_user_id_foreign` (`user_id`),
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
  ADD PRIMARY KEY (`group_id`,`user_id`,`gu_discp_id`,`gu_inst_id`),
  ADD KEY `group_user_gu_discp_id_foreign` (`gu_discp_id`),
  ADD KEY `group_user_gu_inst_id_foreign` (`gu_inst_id`),
  ADD KEY `group_user_group_id_index` (`group_id`),
  ADD KEY `group_user_user_id_index` (`user_id`);

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
  ADD KEY `users_course_id_foreign` (`course_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `institutions`
--
ALTER TABLE `institutions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `students_grades`
--
ALTER TABLE `students_grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
