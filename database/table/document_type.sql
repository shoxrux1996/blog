-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 04 2017 г., 08:18
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
-- Структура таблицы `document_type`
--

CREATE TABLE `document_type` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `document_type`
--

INSERT INTO `document_type` (`id`, `name`, `parent_id`) VALUES
(1, 'Регистрация бизнеса', NULL),
(2, 'Документы в суд', NULL),
(3, 'Жалоба на чиновника', NULL),
(4, 'Договоры и соглашения', NULL),
(5, 'Претензии потребителей', NULL),
(6, 'Другое', NULL),
(7, 'Регистрация ООО', 1),
(8, 'Внести изменения в учредительные документы', 1),
(9, 'Регистрации ИП', 1),
(10, 'Регистрации ТСЖ', 1),
(11, 'Другое', 1),
(12, 'Исковое заявление', 2),
(13, 'Отзыв на исковое заявление', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `document_type`
--
ALTER TABLE `document_type`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `document_type`
--
ALTER TABLE `document_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `document_type`
--
ALTER TABLE `document_type`
  ADD CONSTRAINT `document_type_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `document_type` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
