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
-- Структура таблицы `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `file` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fileable_id` int(10) UNSIGNED NOT NULL,
  `fileable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `files`
--

INSERT INTO `files` (`id`, `file`, `path`, `fileable_id`, `fileable_type`, `created_at`, `updated_at`) VALUES
(60, '8.docx', '/answers/1498826784/', 3, 'yuridik\\Answer', '2017-06-30 07:46:24', '2017-06-30 07:46:24'),
(61, 'Doc1.docx', '/answers/1498826785/', 3, 'yuridik\\Answer', '2017-06-30 07:46:25', '2017-06-30 07:46:25'),
(62, 'U1510352 Shokhrukh Shomakhmudov     Gr.docx', '/answers/1498826785/', 3, 'yuridik\\Answer', '2017-06-30 07:46:25', '2017-06-30 07:46:25'),
(63, 'U1510352 Shokhrukh Shomakhmudov     Gr.docx', '/questions/1498829571/', 40, 'yuridik\\Question', '2017-06-30 08:32:51', '2017-06-30 08:32:51'),
(64, 'Ҳ.и. ДТС охирги 2015.doc', '/questions/1498829572/', 40, 'yuridik\\Question', '2017-06-30 08:32:52', '2017-06-30 08:32:52'),
(65, '002.jpg', '/clients/photo29/', 5, 'yuridik\\User', '2017-06-30 08:40:25', '2017-06-30 08:42:21'),
(66, '001.jpg', '/lawyers/photo7/', 6, 'yuridik\\User', '2017-06-30 08:46:02', '2017-06-30 08:47:09'),
(67, 'Test Farma.docx', '/answers/1498831094/', 4, 'yuridik\\Answer', '2017-06-30 08:58:14', '2017-06-30 08:58:14'),
(68, 'U1510352 Shokhrukh Shomakhmudov     Gr.docx', '/answers/1498831094/', 4, 'yuridik\\Answer', '2017-06-30 08:58:14', '2017-06-30 08:58:14'),
(69, 'Ҳ.и. ДТС охирги 2015.doc', '/answers/1498831094/', 4, 'yuridik\\Answer', '2017-06-30 08:58:14', '2017-06-30 08:58:14');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
