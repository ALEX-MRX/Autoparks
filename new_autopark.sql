-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 06 2020 г., 08:34
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `new_autopark`
--

-- --------------------------------------------------------

--
-- Структура таблицы `autoparks`
--

CREATE TABLE `autoparks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `schedule` varchar(100) NOT NULL,
  `car` varchar(100) NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `autoparks`
--

INSERT INTO `autoparks` (`id`, `name`, `address`, `schedule`, `car`, `published_at`, `created_at`, `updated_at`) VALUES
(6, 'Западный', 'ул. Украинская', 'с 8-00 до 16-00', '56е654654', NULL, NULL, NULL),
(7, 'Mr. Emilio Gerlach III', '320 Alisa Squares Apt. 123\nEast Maidaborough, AZ 86572-3479', 'с 8:30-16:00', '586', '2020-07-03 12:30:08', '2020-07-03 12:30:08', '2020-07-03 12:30:08'),
(8, 'Julia Gottlieb', '5090 Gene Islands Apt. 657\nO\'Connerton, SD 20171', 'с 8:30-16:00', '85427051', '2020-07-03 12:30:11', '2020-07-03 12:30:11', '2020-07-03 12:30:11'),
(9, 'Asha Skiles', '82565 Willow Turnpike\nBrannonchester, SC 58029-3129', 'с 8:30-16:00', '5875', '2020-07-03 12:30:14', '2020-07-03 12:30:14', '2020-07-03 12:30:14'),
(10, 'Bernard Wehner', '11746 Lesch Causeway Suite 172\nDeckowberg, DC 35994-2931', 'с 8:30-16:00', '37298666', '2020-07-03 12:30:48', '2020-07-03 12:30:48', '2020-07-03 12:30:48'),
(11, 'Новый', 'ул Аганская', 'с 8-30 до 16-00', '90155', NULL, NULL, NULL),
(12, 'Лучик', 'ул. Пушкина', 'с 8-10 до 16-00', '432342543', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `cars`
--

CREATE TABLE `cars` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_driver` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `autopark` varchar(255) NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`id`, `name_driver`, `number`, `id_user`, `autopark`, `published_at`, `created_at`, `updated_at`) VALUES
(2, 'Willa Effertz', '545134581', 73687, 'Западный,Mr. Emilio Gerlach III,Julia Gottlieb,Asha Skiles,Bernard Wehner,Новый,Лучик', '2020-07-03 05:20:06', '2020-07-03 05:20:06', '2020-07-03 05:20:06'),
(11, 'Titus Beatty V', '6728', 62153588, 'Julia Gottlieb,Лучик', '2020-07-03 12:30:08', '2020-07-03 12:30:08', '2020-07-03 12:30:08'),
(12, 'Jon Green', '496312026', 8371272, 'Западный,Julia Gottlieb', '2020-07-03 12:30:11', '2020-07-03 12:30:11', '2020-07-03 12:30:11'),
(13, 'Maxwell Koelpin', '9', 797930, 'Asha Skiles,Julia Gottlieb', '2020-07-03 12:30:14', '2020-07-03 12:30:14', '2020-07-03 12:30:14'),
(14, 'Dino O\'Conner', '949', 7, 'Bernard Wehner', '2020-07-03 12:30:49', '2020-07-03 12:30:49', '2020-07-03 12:30:49'),
(15, 'Roman', '90155', 1, 'Новый', NULL, NULL, NULL),
(16, 'Alex', '4', 6, 'Западный,Mr. Emilio Gerlach III,Julia Gottlieb', NULL, NULL, NULL),
(17, 'Fill', '2e43256', 6, '', NULL, NULL, NULL),
(18, 'JJ', '432342543', 1, 'Лучик', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_28_114659_cars', 1),
(5, '2020_06_28_114712_autoparks', 1),
(6, '2020_06_28_121420_migration_name', 1),
(7, '2020_06_28_121924_users', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Manager', 'skripniks044@gmail.com', NULL, '$2y$10$B.YF.BdtfQ2bK/gwMZyyAu/fTCszQKQ4hCtpM494hy7yarHO97y.W', NULL, '2020-07-03 08:34:52', '2020-07-03 08:34:52'),
(2, 'Otilia Kihn', 'frederique70@example.net', '2020-07-03 12:30:08', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uac4KLwdTn', '2020-07-03 12:30:08', '2020-07-03 12:30:08'),
(3, 'Deron Conn', 'ncarter@example.net', '2020-07-03 12:30:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '49EdUVJv7q', '2020-07-03 12:30:11', '2020-07-03 12:30:11'),
(4, 'Simeon Ryan', 'dahlia43@example.org', '2020-07-03 12:30:14', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5JE4owA13D', '2020-07-03 12:30:14', '2020-07-03 12:30:14'),
(5, 'Mrs. Winnifred Gibson I', 'zstiedemann@example.com', '2020-07-03 12:30:49', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '4yQQLxTZJG', '2020-07-03 12:30:49', '2020-07-03 12:30:49'),
(6, 'Alex', 'skripniks2044@gmail.com', NULL, '$2y$10$dJ7iVq41vAcpYetTbMC8rucACaAfd9btRXv/SFvFvrA5RnhZ1/4zy', NULL, '2020-07-03 15:29:32', '2020-07-03 15:29:32');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `autoparks`
--
ALTER TABLE `autoparks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `autoparks`
--
ALTER TABLE `autoparks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
