-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Май 13 2020 г., 18:20
-- Версия сервера: 5.6.38-log
-- Версия PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `steam_phoenix`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `text`, `img`, `created_at`, `updated_at`) VALUES
(1, 'The best online game is out now!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eius-mod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Lorem ipsum dolor sit amet, consecte-tur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.....', 'assets/img/blog/1.jpg', '2020-05-13 12:02:20', '2020-05-13 12:02:20'),
(2, 'The best online game is out now!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eius-mod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Lorem ipsum dolor sit amet, consecte-tur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.....', 'assets/img/blog/2.jpg', '2020-05-13 12:02:20', '2020-05-13 12:02:20'),
(3, 'The best online game is out now!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eius-mod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Lorem ipsum dolor sit amet, consecte-tur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.....', 'assets/img/blog/3.jpg', '2020-05-13 12:03:12', '2020-05-13 12:03:12'),
(4, 'The best online game is out now!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eius-mod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Lorem ipsum dolor sit amet, consecte-tur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.....', 'assets/img/blog/1.jpg', '2020-05-13 12:03:12', '2020-05-13 12:03:12');

-- --------------------------------------------------------

--
-- Структура таблицы `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `features`
--

INSERT INTO `features` (`id`, `title`, `text`, `img`, `created_at`, `updated_at`) VALUES
(1, 'The game you’ve been waiting for is out now', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquamet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vestibulum posuere porttitor justo id pellentesque. Proin id lacus feugiat, posuere erat sit amet, commodo ipsum. Donec pellentesque vestibulum metus...', 'assets/img/featured-bg.jpg', '2020-05-13 12:16:31', '2020-05-13 12:16:31');

-- --------------------------------------------------------

--
-- Структура таблицы `filters`
--

CREATE TABLE `filters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `filters`
--

INSERT INTO `filters` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Racing', '2020-05-13 14:41:39', '2020-05-13 14:41:39'),
(2, 'Shooters', '2020-05-13 14:41:39', '2020-05-13 14:41:39'),
(3, 'Strategy', '2020-05-13 14:41:39', '2020-05-13 14:41:39'),
(4, 'Online', '2020-05-13 14:41:39', '2020-05-13 14:41:39');

-- --------------------------------------------------------

--
-- Структура таблицы `intros`
--

CREATE TABLE `intros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `intros`
--

INSERT INTO `intros` (`id`, `category`, `title`, `text`, `created_at`, `updated_at`) VALUES
(1, 'Games', 'The best online game is out now!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida....', '2020-05-13 11:52:50', '2020-05-13 11:52:50'),
(2, 'Playstation', 'Top 5 best games in november', 'Ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum labore suspendisse ultrices gravida....', '2020-05-13 11:55:15', '2020-05-13 11:55:15'),
(3, 'Reviews', 'Get this game at a promo price', 'Sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida ncididunt ut labore....', '2020-05-13 11:55:48', '2020-05-13 11:55:48');

-- --------------------------------------------------------

--
-- Структура таблицы `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `submenu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `menus`
--

INSERT INTO `menus` (`id`, `name`, `alias`, `created_at`, `updated_at`, `submenu`) VALUES
(1, 'Home', 'home', '2020-05-13 09:44:55', '2020-05-13 09:44:55', NULL),
(2, 'Games', 'games', '2020-05-13 09:45:28', '2020-05-13 09:45:28', 'Game Single'),
(3, 'Reviews', 'reviews', '2020-05-13 09:45:49', '2020-05-13 09:45:49', NULL),
(4, 'News', 'news', '2020-05-13 09:46:05', '2020-05-13 09:46:05', NULL),
(5, 'Contacts', 'contacts', '2020-05-13 09:46:19', '2020-05-13 09:46:19', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2020_05_13_084151_create_table_intros', 1),
(5, '2020_05_13_084325_create_table_blogs', 1),
(7, '2020_05_13_084415_create_table_features', 1),
(8, '2020_05_13_085751_create_table_sliders', 1),
(9, '2020_05_13_084108_create_table_menus', 1),
(10, '2020_05_13_084353_create_table_videos', 1),
(11, '2020_05_13_143550_create_table_filters', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `text`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Game on!', 'Fusce erat dui, venenatis et erat in, vulputate dignissim lacus. Donec vitae tempus dolor,\r\nsit amet elementum lorem. Ut cursus tempor turpis.', 'assets/img/slider-bg-1.jpg', '2020-05-13 11:01:38', '2020-05-13 11:01:38'),
(2, 'Game on!', 'Fusce erat dui, venenatis et erat in, vulputate dignissim lacus. Donec vitae tempus dolor,\r\nsit amet elementum lorem. Ut cursus tempor turpis.', 'assets/img/slider-bg-2.jpg', '2020-05-13 11:47:35', '2020-05-13 11:47:35');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `promo_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `videos`
--

INSERT INTO `videos` (`id`, `title`, `text`, `promo_img`, `video_link`, `created_at`, `updated_at`) VALUES
(1, 'Promo video of the game', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.', 'assets/img/promo-bg.jpg', 'https://www.youtube.com/watch?v=Yi2eHPKjW9k', '2020-05-13 12:13:00', '2020-05-13 12:13:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `filters`
--
ALTER TABLE `filters`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `intros`
--
ALTER TABLE `intros`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menus`
--
ALTER TABLE `menus`
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
-- Индексы таблицы `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `filters`
--
ALTER TABLE `filters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `intros`
--
ALTER TABLE `intros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
