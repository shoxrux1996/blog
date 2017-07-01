-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 01 2017 г., 09:51
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
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shokhrukh', 'shohrux.shomaxmudov@gmail.com', '$2y$10$z9KIigw5y4WxoOl90Y3Y.O.kjQJzffw1jGbaK71WmeriScGQ9apjO', 'RFpCPcC6EgYg20Ze5uteloeBsH0PBhInMOt1o72U49vMzxw8KCJmE5KnjKBs', '2017-06-06 04:58:27', '2017-06-11 16:18:36'),
(2, 'Shox', '7shoxrux7@mail.ru', '$2y$10$ZycUjT3ZRxfPxf4oGvmoOuACtECHP38q0JIKju4fV22spbKxgV.Om', 'kjJg6sC5jpG7264BtOCEeU0ctDwjNwzweIk35mbxmp6hj9TZonMwYNCxlUOr', '2017-06-07 08:02:37', '2017-06-07 09:34:04'),
(3, 'Shokhrukh', 'shoxrux19960822@gmail.com', '$2y$10$VBNbr4/X6qa1gKhcREDWBuXyJKJjzvzLT5lt0dvpQZmtg.EIKMdrm', 'soG2eynK8IXaOM0IjwZL1q7OxbrZi7MgQeTJdkP9dJCKaDSPezOrIcvtsKRl', '2017-06-11 02:18:49', '2017-06-11 02:18:49');

-- --------------------------------------------------------

--
-- Структура таблицы `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lawyer_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `answers`
--

INSERT INTO `answers` (`id`, `text`, `lawyer_id`, `question_id`, `created_at`, `updated_at`) VALUES
(3, 'dsasmd asm daksmdkasmdm asdas', 7, 34, '2017-06-30 07:46:24', '2017-06-30 07:46:24'),
(4, 'm sladmalsmd asmd masdml aslm da', 7, 34, '2017-06-30 08:58:14', '2017-06-30 08:58:14');

-- --------------------------------------------------------

--
-- Структура таблицы `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `likes` int(11) DEFAULT NULL,
  `dislikes` int(11) DEFAULT NULL,
  `lawyer_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `text`, `likes`, `dislikes`, `lawyer_id`, `created_at`, `updated_at`) VALUES
(15, 'dsasdasd', '<p>a<strong>dasd ads asd asdm asjd kasdk asnkdn asknd kasnk adsnkasn dk na</strong>sknd ksk</p>', NULL, NULL, 7, '2017-06-30 00:41:15', '2017-06-30 00:41:15'),
(16, 'dsasdasd', '<p>a<strong>dasd ads asd asdm asjd kasdk asnkdn asknd kasnk adsnkasn dk na</strong>sknd ksk</p>', NULL, NULL, 7, '2017-06-30 00:42:01', '2017-06-30 00:42:01'),
(17, 'dsasdasd', '<p>a<strong>dasd ads asd asdm asjd kasdk asnkdn asknd kasnk adsnkasn dk na</strong>sknd ksk</p>', NULL, NULL, 7, '2017-06-30 00:42:08', '2017-06-30 00:42:08'),
(18, 'asdasd asdsad asd a', '<h3 style=\"margin: 0px 0px 11px; padding: 0px; border: 0px; font-weight: normal; font-stretch: normal; font-size: 22px; line-height: 24px; font-family: Arial, sans-serif; vertical-align: baseline; word-wrap: break-word; color: #333333; clear: both; max-width: 560px;\">Отказ в предоставлении субсидии на приобретение жилья</h3>\r\n<p>&nbsp;</p>\r\n<div id=\"questionText_1682846\" class=\"quotable-question\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: inherit; font-weight: normal; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Arial, sans-serif; vertical-align: baseline; color: #464646; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">\r\n<div style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">\r\n<p style=\"margin: 0px 0px 6px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 20px; font-family: inherit; vertical-align: baseline; overflow: hidden; text-overflow: ellipsis; word-wrap: break-word; color: #333333;\">Доброго времени суток. В 1996 году, во время нахождения Крыма и Севастополя в составе Украины, участвовал в приватизации части квартиры в Севастополе в соответствии с законом Украины о приватизации, в 2000 году продал эту часть квартиры. В приватизации на территории РФ не участвовал. Сейчас, после входа Крыма и Севастополя в состав Российской Федерации, мне отказывают в предоставлении субсидии на приобретение жилья, ссылаясь на то, что я участвовал в приватизации, и свое право на получение жилой площади уже использовал.</p>\r\n<p style=\"margin: 0px 0px 6px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 20px; font-family: inherit; vertical-align: baseline; overflow: hidden; text-overflow: ellipsis; word-wrap: break-word; color: #333333;\">Правомерно ли это. Спасибо</p>\r\n</div>\r\n</div>', NULL, NULL, 7, '2017-06-30 08:59:50', '2017-06-30 08:59:50'),
(19, 'asddasd', '<h3 style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-size: 24px; font-weight: 400; margin-top: 45px; margin-bottom: 10px; color: #525252; font-family: \'Source Sans Pro\', sans-serif;\">Many To Many Relationships</h3>\r\n<h4 style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-size: 16px; margin-top: 35px; margin-bottom: 10px; color: #525252; font-family: \'Source Sans Pro\', sans-serif;\">Attaching / Detaching</h4>\r\n<p style=\"box-sizing: border-box; line-height: 1.7; margin: 10px 0px 20px; font-size: 14.5px; color: #525252; font-family: \'Source Sans Pro\', sans-serif;\">Eloquent also provides a few additional helper methods to make working with related models more convenient. For example, let\'s imagine a user can have many roles and a role can have many users. To attach a role to a user by inserting a record in the intermediate table that joins the models, use the&nbsp;<code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; color: #f4645f; border-radius: 3px; background: #f0f2f1; padding: 1px 5px; white-space: pre; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\">attach</code>&nbsp;method:</p>\r\n<pre class=\" language-php\" style=\"box-sizing: border-box; overflow: auto; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; margin-top: 10px; margin-bottom: 20px; background: rgba(238, 238, 238, 0.35); border-radius: 3px; padding: 10px; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\"><code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; vertical-align: middle;\"><span class=\"token variable\" style=\"box-sizing: border-box; color: #4ea1df;\">$user</span> <span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">=</span> <span class=\"token scope\" style=\"box-sizing: border-box; color: #da564a;\">App<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">\\</span>User<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">::</span></span><span class=\"token function\" style=\"box-sizing: border-box; color: #555555;\">find<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span></span><span class=\"token number\" style=\"box-sizing: border-box; color: #da564a;\">1</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">;</span>\r\n\r\n<span class=\"token variable\" style=\"box-sizing: border-box; color: #4ea1df;\">$user</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">-</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">&gt;</span><span class=\"token function\" style=\"box-sizing: border-box; color: #555555;\">roles<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span></span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">-</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">&gt;</span><span class=\"token function\" style=\"box-sizing: border-box; color: #555555;\">attach<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span></span><span class=\"token variable\" style=\"box-sizing: border-box; color: #4ea1df;\">$roleId</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">;</span></code></pre>\r\n<p style=\"box-sizing: border-box; line-height: 1.7; margin: 10px 0px 20px; font-size: 14.5px; color: #525252; font-family: \'Source Sans Pro\', sans-serif;\">When attaching a relationship to a model, you may also pass an array of additional data to be inserted into the intermediate table:</p>\r\n<pre class=\" language-php\" style=\"box-sizing: border-box; overflow: auto; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; margin-top: 10px; margin-bottom: 20px; background: rgba(238, 238, 238, 0.35); border-radius: 3px; padding: 10px; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\"><code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; vertical-align: middle;\"><span class=\"token variable\" style=\"box-sizing: border-box; color: #4ea1df;\">$user</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">-</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">&gt;</span><span class=\"token function\" style=\"box-sizing: border-box; color: #555555;\">roles<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span></span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">-</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">&gt;</span><span class=\"token function\" style=\"box-sizing: border-box; color: #555555;\">attach<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span></span><span class=\"token variable\" style=\"box-sizing: border-box; color: #4ea1df;\">$roleId</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">,</span> <span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">[</span><span class=\"token string\" style=\"box-sizing: border-box; color: #2e7d32;\">\'expires\'</span> <span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">=</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">&gt;</span> <span class=\"token variable\" style=\"box-sizing: border-box; color: #4ea1df;\">$expires</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">]</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">;</span></code></pre>\r\n<p style=\"box-sizing: border-box; line-height: 1.7; margin: 10px 0px 20px; font-size: 14.5px; color: #525252; font-family: \'Source Sans Pro\', sans-serif;\">Of course, sometimes it may be necessary to remove a role from a user. To remove a many-to-many relationship record, use the&nbsp;<code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; color: #f4645f; border-radius: 3px; background: #f0f2f1; padding: 1px 5px; white-space: pre; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\">detach</code>&nbsp;method. The&nbsp;<code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; color: #f4645f; border-radius: 3px; background: #f0f2f1; padding: 1px 5px; white-space: pre; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\">detach</code>&nbsp;method will remove the appropriate record out of the intermediate table; however, both models will remain in the database:</p>\r\n<pre class=\" language-php\" style=\"box-sizing: border-box; overflow: auto; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; margin-top: 10px; margin-bottom: 20px; background: rgba(238, 238, 238, 0.35); border-radius: 3px; padding: 10px; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\"><code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; vertical-align: middle;\"><span class=\"token comment\" style=\"box-sizing: border-box; color: #999999;\" spellcheck=\"true\">// Detach a single role from the user...\r\n</span><span class=\"token variable\" style=\"box-sizing: border-box; color: #4ea1df;\">$user</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">-</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">&gt;</span><span class=\"token function\" style=\"box-sizing: border-box; color: #555555;\">roles<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span></span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">-</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">&gt;</span><span class=\"token function\" style=\"box-sizing: border-box; color: #555555;\">detach<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span></span><span class=\"token variable\" style=\"box-sizing: border-box; color: #4ea1df;\">$roleId</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">;</span>\r\n<span class=\"token comment\" style=\"box-sizing: border-box; color: #999999;\" spellcheck=\"true\">\r\n// Detach all roles from the user...\r\n</span><span class=\"token variable\" style=\"box-sizing: border-box; color: #4ea1df;\">$user</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">-</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">&gt;</span><span class=\"token function\" style=\"box-sizing: border-box; color: #555555;\">roles<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span></span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">-</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">&gt;</span><span class=\"token function\" style=\"box-sizing: border-box; color: #555555;\">detach<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span></span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">;</span></code></pre>', NULL, NULL, 7, '2017-06-30 09:24:55', '2017-06-30 09:24:55');

-- --------------------------------------------------------

--
-- Структура таблицы `blog_tag`
--

CREATE TABLE `blog_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `blog_tag`
--

INSERT INTO `blog_tag` (`id`, `blog_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(19, 15, 4, NULL, NULL),
(20, 15, 5, NULL, NULL),
(21, 16, 4, NULL, NULL),
(22, 16, 5, NULL, NULL),
(23, 17, 4, NULL, NULL),
(24, 17, 5, NULL, NULL),
(25, 18, 1, NULL, NULL),
(26, 18, 6, NULL, NULL),
(27, 19, 1, NULL, NULL),
(28, 19, 3, NULL, NULL),
(29, 19, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `category_id`, `created_at`, `updated_at`) VALUES
(23, 'Perviy', NULL, '2017-06-24 12:43:12', '2017-06-24 12:43:12'),
(24, 'Vtoroy', 23, '2017-06-24 12:43:25', '2017-06-24 12:43:25'),
(25, 'Tretiy', 24, '2017-06-24 12:43:46', '2017-06-24 12:43:46'),
(26, 'Nedvijimost\'', NULL, '2017-06-25 12:19:20', '2017-06-25 12:19:20');

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `name`) VALUES
(1, 'Toshkent'),
(2, 'Buhoro'),
(3, 'Samarqand'),
(4, 'Navoi'),
(5, 'Andijon'),
(6, 'Farg\'ona');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'M'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `email`, `password`, `remember_token`, `confirmed`, `confirmation_code`, `user_id`, `created_at`, `updated_at`, `gender`) VALUES
(29, 'shohrux.shomaxmudov@gmail.com', '$2y$10$c31oOtQ0.Y6yFq5dk40mn.49VGa0jXIWwnIhW75nr1VAiSiuiGEnG', 'PMWbPfB23wxh1OwuHiSo10hAjJXb0Dq43CtxvUesUUOb8YmQvUw9TFXZqtIf', 1, NULL, 5, '2017-06-19 07:58:54', '2017-06-21 03:25:44', 'M'),
(30, 'shoxrux19960822@gmail.com', '$2y$10$XWLZtcctV03d/U4iz32Qku0HZ7bHiFBpBuzi09gWDZUCfgHUuN4xa', NULL, 1, NULL, 17, '2017-06-24 13:46:45', '2017-06-24 13:47:03', 'M');

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
(22, 'qweknk nwknk wn nkq wq', 1, 18, 7, 'yuridik\\Lawyer', '2017-06-30 09:00:12', '2017-06-30 09:00:12'),
(23, 'sdakns ksdnasdas', 1, 19, 7, 'yuridik\\Lawyer', '2017-06-30 09:25:09', '2017-06-30 09:25:09');

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

-- --------------------------------------------------------

--
-- Структура таблицы `lawyers`
--

CREATE TABLE `lawyers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'M',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lawyers`
--

INSERT INTO `lawyers` (`id`, `email`, `password`, `remember_token`, `confirmed`, `confirmation_code`, `user_id`, `gender`, `created_at`, `updated_at`) VALUES
(7, '7shoxrux7@mail.ru', '$2y$10$lbN82gahHmtFgORQCS6rhuGRlyPvC5dMe2N8JznZ3Zf5FntGSByT2', 'CPbAIjcOXjF36omR8Sm29uA1R45zJcj3KehDYbUyHQft8gfhwqLqrwdl6JPD', 1, NULL, 6, 'M', '2017-06-19 07:59:15', '2017-06-19 07:59:33'),
(8, 'temur@gmail.com', '$2y$10$fTdgy9He2defnVK0HUGSjOSSXK9n3MXhDA1nBkWK7UTw4MniFYTW6', NULL, 1, NULL, 15, 'M', '2017-06-24 13:43:49', '2017-06-24 13:45:09'),
(9, 'erkin@gmail.com', '$2y$10$Tnwe932wEdR7YfdKRPn1s.Cr4fqTUGrGpBehI8WWWUSWf0cOAALPm', 'zWbD9pFYq8wOoNlUnwNleusMcBWH1WB66EsitbidonfRFyAQ7MNTJlaAIMG4', 1, NULL, 16, 'M', '2017-06-24 13:44:28', '2017-06-24 13:45:02'),
(10, 'shoxrux@gmail.com', '$2y$10$IqQ//XyEn1Qt/H3Ugs8cUOrM3irluvqrNpkbB2I0.Otj3W2hRAeDC', NULL, 1, NULL, 18, 'M', '2017-06-24 13:47:59', '2017-06-24 13:48:03');

-- --------------------------------------------------------

--
-- Структура таблицы `lawyer_category`
--

CREATE TABLE `lawyer_category` (
  `id` int(11) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `lawyer_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `lawyer_category`
--

INSERT INTO `lawyer_category` (`id`, `category_id`, `lawyer_id`) VALUES
(3, 24, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2017_06_05_065123_create_blog_table', 2),
(6, '2014_10_12_100000_create_password_resets_table', 3),
(7, '2017_06_06_070628_create_admins_table', 3),
(8, '2017_06_08_111019_create_tags_table', 4),
(9, '2017_06_08_111912_create_blog_tag_table', 5),
(10, '2017_06_09_101452_create_clients_table', 6),
(11, '2017_06_10_095239_create_lawyers_table', 7),
(12, '2017_06_13_123256_create_comments_table', 8),
(13, '2017_06_17_165323_create_users_table', 9),
(14, '2017_06_22_084406_create_categories_table', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'shox', NULL, NULL),
(3, 'Yuridik', NULL, NULL),
(4, 'Lawyer', NULL, NULL),
(5, 'tema', '2017-06-13 06:45:25', '2017-06-13 06:45:25'),
(6, 'MVD', '2017-06-13 06:45:31', '2017-06-13 06:45:31'),
(7, 'qonun', '2017-06-13 06:45:42', '2017-06-13 06:45:42');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `notification` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `dateOfBirth`, `city_id`, `notification`, `phone`) VALUES
(5, 'Shoxrux', NULL, '1996-08-22', 1, NULL, NULL),
(6, 'Temur', NULL, '1996-09-19', 1, NULL, NULL),
(15, 'Tema', NULL, NULL, 3, NULL, NULL),
(16, 'Erkin', NULL, NULL, 5, NULL, NULL),
(17, 'Shox', NULL, NULL, 1, NULL, NULL),
(18, 'Shokhrukh', NULL, NULL, 1, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Индексы таблицы `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lawyer_id` (`lawyer_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Индексы таблицы `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lawyer_id` (`lawyer_id`);

--
-- Индексы таблицы `blog_tag`
--
ALTER TABLE `blog_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`),
  ADD KEY `post_tag_blog_id_foreign` (`blog_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `categories_ibfk_1` (`category_id`);

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `confirmation_code` (`confirmation_code`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_blog_id_foreign` (`blog_id`);

--
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lawyers`
--
ALTER TABLE `lawyers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lawyers_email_unique` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `lawyer_category`
--
ALTER TABLE `lawyer_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `lawyer_category_ibfk_2` (`lawyer_id`);

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
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `questions_ibfk_2` (`category_id`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `blog_tag`
--
ALTER TABLE `blog_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT для таблицы `lawyers`
--
ALTER TABLE `lawyers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `lawyer_category`
--
ALTER TABLE `lawyer_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`lawyer_id`) REFERENCES `lawyers` (`id`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Ограничения внешнего ключа таблицы `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`lawyer_id`) REFERENCES `lawyers` (`id`);

--
-- Ограничения внешнего ключа таблицы `blog_tag`
--
ALTER TABLE `blog_tag`
  ADD CONSTRAINT `post_tag_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Ограничения внешнего ключа таблицы `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Ограничения внешнего ключа таблицы `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `lawyers`
--
ALTER TABLE `lawyers`
  ADD CONSTRAINT `lawyers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `lawyer_category`
--
ALTER TABLE `lawyer_category`
  ADD CONSTRAINT `lawyer_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `lawyer_category_ibfk_2` FOREIGN KEY (`lawyer_id`) REFERENCES `lawyers` (`id`);

--
-- Ограничения внешнего ключа таблицы `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
