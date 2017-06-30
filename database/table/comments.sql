-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 30 2017 г., 16:04
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `commentable_id` int(10) UNSIGNED NOT NULL,
  `commentable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `comment`, `approved`, `blog_id`, `commentable_id`, `commentable_type`, `created_at`, `updated_at`) VALUES
(15, 'Shokhrukh', 1, 17, 7, 'yuridik\\Lawyer', '2017-06-30 01:38:21', '2017-06-30 01:38:21'),
(16, 'Hello everybody!', 1, 17, 7, 'yuridik\\Lawyer', '2017-06-30 01:55:49', '2017-06-30 01:55:49'),
(17, 'dasd as das dasd a asds', 1, 16, 7, 'yuridik\\Lawyer', '2017-06-30 02:04:58', '2017-06-30 02:04:58'),
(18, 'dasd as das dasd a asds', 1, 16, 7, 'yuridik\\Lawyer', '2017-06-30 02:05:30', '2017-06-30 02:05:30'),
(19, 'dasd as das dasd a asds', 1, 16, 7, 'yuridik\\Lawyer', '2017-06-30 02:06:44', '2017-06-30 02:06:44'),
(20, 'dasd as das dasd a asds', 1, 16, 7, 'yuridik\\Lawyer', '2017-06-30 02:06:50', '2017-06-30 02:06:50'),
(21, 'asd asdas dasd asd', 1, 15, 7, 'yuridik\\Lawyer', '2017-06-30 02:07:35', '2017-06-30 02:07:35'),
(22, 'qweknk nwknk wn nkq wq', 1, 18, 7, 'yuridik\\Lawyer', '2017-06-30 09:00:12', '2017-06-30 09:00:12');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_blog_id_foreign` (`blog_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
