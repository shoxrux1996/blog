-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 30 2017 г., 16:05
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
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `title`, `text`, `client_id`, `category_id`, `type_id`, `created_at`, `updated_at`) VALUES
(34, 'dasdasdas dasd asd asd', 'asd asdas dsd asd asd a ds', 29, 23, 1, '2017-06-28 12:36:54', '2017-06-28 12:36:54'),
(35, 'das dasd as dasd asd as', 'dasd asd asd asd sa dasd as da dsad asd', 29, 26, 1, '2017-06-28 12:37:18', '2017-06-28 12:37:18'),
(36, 'dasdasdasd a das', 'd as asd asd asd asd asd', 29, 25, 1, '2017-06-29 01:14:39', '2017-06-29 01:14:39'),
(37, 'sadasdas das', 'as dadasdas das da', 29, 24, 1, '2017-06-29 11:34:06', '2017-06-29 11:34:06'),
(38, 'dasdasdasdasdsad', 'daskndakn dnaskdnasknd askndk nasdn as', 29, 23, 1, '2017-06-30 08:20:08', '2017-06-30 08:20:08'),
(39, 'dasda dasdasd', 'asdm asmd asmdm asdm asmd asmd masl dmasl', 29, 25, 1, '2017-06-30 08:28:55', '2017-06-30 08:28:55'),
(40, 'ad asdasasd sa', 'asd nasdkn askndkasndn aksn d', 29, 24, 1, '2017-06-30 08:32:51', '2017-06-30 08:32:51');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `questions_ibfk_2` (`category_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
