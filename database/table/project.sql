-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 03 2017 г., 14:15
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
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `type`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shokhrukh', 'shohrux.shomaxmudov@gmail.com', 2, '$2y$10$z9KIigw5y4WxoOl90Y3Y.O.kjQJzffw1jGbaK71WmeriScGQ9apjO', 'tw9TUVE8w50w3RWaodWFerd0vMLsM4YPKt28oKL6GHdy3HoB1ruRaZ24Hebs', '2017-06-06 04:58:27', '2017-06-11 16:18:36'),
(2, 'Shox', '7shoxrux7@mail.ru', 0, '$2y$10$ZycUjT3ZRxfPxf4oGvmoOuACtECHP38q0JIKju4fV22spbKxgV.Om', 'kjJg6sC5jpG7264BtOCEeU0ctDwjNwzweIk35mbxmp6hj9TZonMwYNCxlUOr', '2017-06-07 08:02:37', '2017-06-07 09:34:04'),
(3, 'Shokhrukh', 'shoxrux19960822@gmail.com', 0, '$2y$10$VBNbr4/X6qa1gKhcREDWBuXyJKJjzvzLT5lt0dvpQZmtg.EIKMdrm', 'soG2eynK8IXaOM0IjwZL1q7OxbrZi7MgQeTJdkP9dJCKaDSPezOrIcvtsKRl', '2017-06-11 02:18:49', '2017-06-11 02:18:49');

-- --------------------------------------------------------

--
-- Структура таблицы `answers`
--

CREATE TABLE `answers` (
  `id` int(11) UNSIGNED NOT NULL,
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
(4, 'dashdhkashdkh', 7, 34, '2017-07-24 12:12:27', '2017-07-24 12:12:27'),
(5, 'dasdasdadasdasdasdasdasdasd asd asd as', 7, 34, '2017-07-24 12:12:45', '2017-07-24 12:12:45'),
(6, 'knsak dksnkdn askn dkasnkdn askndk nsknd ; ,as;das;,d ;as,d,; as;d, as;,d; as;d, aДобрый день. Наш дом попал в программу адресного расселения ветхого жилья. Квартира находится в очень хорошем районе, почти центр города.в частично благоустроенном двухквартирном доме (только центр. отопление), 36кв. м., 3 комнаты, по договору. Добрый день. Наш дом попал в программу адресного расселения ветхого жильяПравовед.ru — один из крупнейших сервисов по оказанию юридических услуг онлайн. Сайт ежемесячно посещают более 2 500 000 человек. Размещение рекламы на нашем сайте — это отличная возможность найти новых клиентов и вывести свой бизнес на новый уровень!\n', 7, 34, '2017-07-31 11:36:58', '2017-07-31 11:36:58');

-- --------------------------------------------------------

--
-- Структура таблицы `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `blog_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'lawyer',
  `lawyer_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `text`, `count`, `blog_type`, `lawyer_id`, `created_at`, `updated_at`) VALUES
(15, 'dsasdasd adas dasdasdas dasd  dasda das dasd asd as das d', '<p>a<strong>dasd ads asd asdm asjd kasdk asnkdn asknd kasnk adsnkasn dk na</strong>sknd ksk</p>', 3, 'lawyer', 7, '2017-06-30 00:41:15', '2017-07-28 13:07:46'),
(16, 'dsasdasdk dlkasld kla dlas', '<p>a<strong>dasd ads asd asdm asjd kasdk asnkdn asknd kasnk adsnkasn dk na</strong>sknd ksk</p>', 7, 'lawyer', 7, '2017-06-30 00:42:01', '2017-07-31 03:59:47'),
(18, 'asdasd asdsad asd a', '<h3 style=\"margin: 0px 0px 11px; padding: 0px; border: 0px; font-weight: normal; font-stretch: normal; font-size: 22px; line-height: 24px; font-family: Arial, sans-serif; vertical-align: baseline; word-wrap: break-word; color: #333333; clear: both; max-width: 560px;\">Отказ в предоставлении субсидии на приобретение жилья</h3>\r\n<p>&nbsp;</p>\r\n<div id=\"questionText_1682846\" class=\"quotable-question\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: inherit; font-weight: normal; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Arial, sans-serif; vertical-align: baseline; color: #464646; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">\r\n<div style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">\r\n<p style=\"margin: 0px 0px 6px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 20px; font-family: inherit; vertical-align: baseline; overflow: hidden; text-overflow: ellipsis; word-wrap: break-word; color: #333333;\">Доброго времени суток. В 1996 году, во время нахождения Крыма и Севастополя в составе Украины, участвовал в приватизации части квартиры в Севастополе в соответствии с законом Украины о приватизации, в 2000 году продал эту часть квартиры. В приватизации на территории РФ не участвовал. Сейчас, после входа Крыма и Севастополя в состав Российской Федерации, мне отказывают в предоставлении субсидии на приобретение жилья, ссылаясь на то, что я участвовал в приватизации, и свое право на получение жилой площади уже использовал.</p>\r\n<p style=\"margin: 0px 0px 6px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 20px; font-family: inherit; vertical-align: baseline; overflow: hidden; text-overflow: ellipsis; word-wrap: break-word; color: #333333;\">Правомерно ли это. Спасибо</p>\r\n</div>\r\n</div>', 0, 'lawyer', 7, '2017-06-30 08:59:50', '2017-06-30 08:59:50'),
(19, 'asddasd', '<h3 style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-size: 24px; font-weight: 400; margin-top: 45px; margin-bottom: 10px; color: #525252; font-family: \'Source Sans Pro\', sans-serif;\">Many To Many Relationships</h3>\r\n<h4 style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-size: 16px; margin-top: 35px; margin-bottom: 10px; color: #525252; font-family: \'Source Sans Pro\', sans-serif;\">Attaching / Detaching</h4>\r\n<p style=\"box-sizing: border-box; line-height: 1.7; margin: 10px 0px 20px; font-size: 14.5px; color: #525252; font-family: \'Source Sans Pro\', sans-serif;\">Eloquent also provides a few additional helper methods to make working with related models more convenient. For example, let\'s imagine a user can have many roles and a role can have many users. To attach a role to a user by inserting a record in the intermediate table that joins the models, use the&nbsp;<code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; color: #f4645f; border-radius: 3px; background: #f0f2f1; padding: 1px 5px; white-space: pre; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\">attach</code>&nbsp;method:</p>\r\n<pre class=\" language-php\" style=\"box-sizing: border-box; overflow: auto; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; margin-top: 10px; margin-bottom: 20px; background: rgba(238, 238, 238, 0.35); border-radius: 3px; padding: 10px; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\"><code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; vertical-align: middle;\"><span class=\"token variable\" style=\"box-sizing: border-box; color: #4ea1df;\">$user</span> <span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">=</span> <span class=\"token scope\" style=\"box-sizing: border-box; color: #da564a;\">App<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">\\</span>User<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">::</span></span><span class=\"token function\" style=\"box-sizing: border-box; color: #555555;\">find<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span></span><span class=\"token number\" style=\"box-sizing: border-box; color: #da564a;\">1</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">;</span>\r\n\r\n<span class=\"token variable\" style=\"box-sizing: border-box; color: #4ea1df;\">$user</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">-</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">&gt;</span><span class=\"token function\" style=\"box-sizing: border-box; color: #555555;\">roles<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span></span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">-</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">&gt;</span><span class=\"token function\" style=\"box-sizing: border-box; color: #555555;\">attach<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span></span><span class=\"token variable\" style=\"box-sizing: border-box; color: #4ea1df;\">$roleId</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">;</span></code></pre>\r\n<p style=\"box-sizing: border-box; line-height: 1.7; margin: 10px 0px 20px; font-size: 14.5px; color: #525252; font-family: \'Source Sans Pro\', sans-serif;\">When attaching a relationship to a model, you may also pass an array of additional data to be inserted into the intermediate table:</p>\r\n<pre class=\" language-php\" style=\"box-sizing: border-box; overflow: auto; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; margin-top: 10px; margin-bottom: 20px; background: rgba(238, 238, 238, 0.35); border-radius: 3px; padding: 10px; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\"><code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; vertical-align: middle;\"><span class=\"token variable\" style=\"box-sizing: border-box; color: #4ea1df;\">$user</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">-</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">&gt;</span><span class=\"token function\" style=\"box-sizing: border-box; color: #555555;\">roles<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span></span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">-</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">&gt;</span><span class=\"token function\" style=\"box-sizing: border-box; color: #555555;\">attach<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span></span><span class=\"token variable\" style=\"box-sizing: border-box; color: #4ea1df;\">$roleId</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">,</span> <span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">[</span><span class=\"token string\" style=\"box-sizing: border-box; color: #2e7d32;\">\'expires\'</span> <span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">=</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">&gt;</span> <span class=\"token variable\" style=\"box-sizing: border-box; color: #4ea1df;\">$expires</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">]</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">;</span></code></pre>\r\n<p style=\"box-sizing: border-box; line-height: 1.7; margin: 10px 0px 20px; font-size: 14.5px; color: #525252; font-family: \'Source Sans Pro\', sans-serif;\">Of course, sometimes it may be necessary to remove a role from a user. To remove a many-to-many relationship record, use the&nbsp;<code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; color: #f4645f; border-radius: 3px; background: #f0f2f1; padding: 1px 5px; white-space: pre; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\">detach</code>&nbsp;method. The&nbsp;<code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; color: #f4645f; border-radius: 3px; background: #f0f2f1; padding: 1px 5px; white-space: pre; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\">detach</code>&nbsp;method will remove the appropriate record out of the intermediate table; however, both models will remain in the database:</p>\r\n<pre class=\" language-php\" style=\"box-sizing: border-box; overflow: auto; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; margin-top: 10px; margin-bottom: 20px; background: rgba(238, 238, 238, 0.35); border-radius: 3px; padding: 10px; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\"><code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; vertical-align: middle;\"><span class=\"token comment\" style=\"box-sizing: border-box; color: #999999;\" spellcheck=\"true\">// Detach a single role from the user...\r\n</span><span class=\"token variable\" style=\"box-sizing: border-box; color: #4ea1df;\">$user</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">-</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">&gt;</span><span class=\"token function\" style=\"box-sizing: border-box; color: #555555;\">roles<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span></span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">-</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">&gt;</span><span class=\"token function\" style=\"box-sizing: border-box; color: #555555;\">detach<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span></span><span class=\"token variable\" style=\"box-sizing: border-box; color: #4ea1df;\">$roleId</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">;</span>\r\n<span class=\"token comment\" style=\"box-sizing: border-box; color: #999999;\" spellcheck=\"true\">\r\n// Detach all roles from the user...\r\n</span><span class=\"token variable\" style=\"box-sizing: border-box; color: #4ea1df;\">$user</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">-</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">&gt;</span><span class=\"token function\" style=\"box-sizing: border-box; color: #555555;\">roles<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span></span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">-</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">&gt;</span><span class=\"token function\" style=\"box-sizing: border-box; color: #555555;\">detach<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span></span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">;</span></code></pre>', 1, 'lawyer', 7, '2017-06-30 09:24:55', '2017-07-28 13:16:35'),
(21, 'ЫОВЛЛФВфв фвыы фвыфв ыфв ы фы ыф', '<div id=\"page-wrapper\">\r\n<ol class=\"breadcrumb\">\r\n<li class=\"active\">\r\n<h2 id=\"forms-horizontal\" style=\"box-sizing: border-box; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-weight: 500; line-height: 1.1; color: #333333; margin-top: 20px; margin-bottom: 10px; font-size: 30px;\">Horizontal form</h2>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;\">Use Bootstrap\'s predefined grid classes to align labels and groups of form controls in a horizontal layout by adding&nbsp;<code style=\"box-sizing: border-box; font-family: Menlo, Monaco, Consolas, \'Courier New\', monospace; font-size: 12.6px; padding: 2px 4px; color: #c7254e; background-color: #f9f2f4; border-radius: 4px;\">.form-horizontal</code>&nbsp;to the form (which doesn\'t have to be a&nbsp;<code style=\"box-sizing: border-box; font-family: Menlo, Monaco, Consolas, \'Courier New\', monospace; font-size: 12.6px; padding: 2px 4px; color: #c7254e; background-color: #f9f2f4; border-radius: 4px;\"></code></p>\r\n<form></form>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;\"><code style=\"box-sizing: border-box; font-family: Menlo, Monaco, Consolas, \'Courier New\', monospace; font-size: 12.6px; padding: 2px 4px; color: #c7254e; background-color: #f9f2f4; border-radius: 4px;\"></code>). Doing so changes&nbsp;<code style=\"box-sizing: border-box; font-family: Menlo, Monaco, Consolas, \'Courier New\', monospace; font-size: 12.6px; padding: 2px 4px; color: #c7254e; background-color: #f9f2f4; border-radius: 4px;\">.form-group</code>s to behave as grid rows, so no need for&nbsp;<code style=\"box-sizing: border-box; font-family: Menlo, Monaco, Consolas, \'Courier New\', monospace; font-size: 12.6px; padding: 2px 4px; color: #c7254e; background-color: #f9f2f4; border-radius: 4px;\">.row</code>.</p>\r\n<div class=\"bs-example\" style=\"box-sizing: border-box; position: relative; padding: 45px 15px 15px; margin: 0px 0px 15px; box-shadow: none; border-radius: 4px 4px 0px 0px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; border: 1px solid #dddddd;\" data-example-id=\"simple-horizontal-form\"><form class=\"form-horizontal\" style=\"box-sizing: border-box;\">\r\n<div class=\"form-group\" style=\"box-sizing: border-box; margin-bottom: 15px; margin-right: -15px; margin-left: -15px;\"><label class=\"col-sm-2 control-label\" style=\"box-sizing: border-box; display: inline-block; max-width: 100%; margin-bottom: 0px; font-weight: bold; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left; width: 140.906px; padding-top: 7px; text-align: right;\" for=\"inputEmail3\">Email</label>\r\n<div class=\"col-sm-10\" style=\"box-sizing: border-box; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left; width: 704.578px;\"><input id=\"inputEmail3\" class=\"form-control\" style=\"box-sizing: border-box; margin: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 1.42857; font-family: inherit; color: #555555; display: block; width: 674.578px; height: 34px; padding: 6px 12px; background-image: url(\'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC\'); border-radius: 4px; box-shadow: rgba(0, 0, 0, 0.075) 0px 1px 1px inset; transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out; background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; border: 1px solid #cccccc;\" autocomplete=\"off\" type=\"email\" placeholder=\"Email\" /></div>\r\n</div>\r\n<div class=\"form-group\" style=\"box-sizing: border-box; margin-bottom: 15px; margin-right: -15px; margin-left: -15px;\"><label class=\"col-sm-2 control-label\" style=\"box-sizing: border-box; display: inline-block; max-width: 100%; margin-bottom: 0px; font-weight: bold; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left; width: 140.906px; padding-top: 7px; text-align: right;\" for=\"inputPassword3\">Password</label>\r\n<div class=\"col-sm-10\" style=\"box-sizing: border-box; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left; width: 704.578px;\"><input id=\"inputPassword3\" class=\"form-control\" style=\"box-sizing: border-box; margin: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 1.42857; font-family: inherit; color: #555555; display: block; width: 674.578px; height: 34px; padding: 6px 12px; background-image: url(\'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC\'); border-radius: 4px; box-shadow: rgba(0, 0, 0, 0.075) 0px 1px 1px inset; transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out; background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; border: 1px solid #cccccc;\" autocomplete=\"off\" type=\"password\" placeholder=\"Password\" /></div>\r\n</div>\r\n<div class=\"form-group\" style=\"box-sizing: border-box; margin-bottom: 15px; margin-right: -15px; margin-left: -15px;\">\r\n<div class=\"col-sm-offset-2 col-sm-10\" style=\"box-sizing: border-box; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left; width: 704.578px; margin-left: 140.906px;\">\r\n<div class=\"checkbox\" style=\"box-sizing: border-box; position: relative; margin-top: 0px; margin-bottom: 0px; padding-top: 7px; min-height: 27px;\"><label style=\"box-sizing: border-box; display: inline-block; max-width: 100%; margin-bottom: 0px; min-height: 20px; padding-left: 20px; cursor: pointer;\"><input style=\"margin: 4px 0px 0px -20px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; font-family: inherit; padding: 0px; position: absolute;\" type=\"checkbox\" />Remember me</label></div>\r\n</div>\r\n</div>\r\n<div class=\"form-group\" style=\"box-sizing: border-box; margin-bottom: 15px; margin-right: -15px; margin-left: -15px;\">\r\n<div class=\"col-sm-offset-2 col-sm-10\" style=\"box-sizing: border-box; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left; width: 704.578px; margin-left: 140.906px;\"><button class=\"btn btn-default\" style=\"margin: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: 14px; line-height: 1.42857; font-family: inherit; color: #333333; overflow: visible; cursor: pointer; padding: 6px 12px; white-space: nowrap; vertical-align: middle; touch-action: manipulation; user-select: none; background-image: none; border-radius: 4px; background-color: #ffffff; border: 1px solid #cccccc;\" type=\"submit\">Sign in</button></div>\r\n</div>\r\n</form></div>\r\n<figure class=\"highlight\" style=\"box-sizing: border-box; margin: -16px 0px 15px; padding: 9px 14px; background-color: #f7f7f9; border: 1px solid #e1e1e8; border-radius: 0px 0px 4px 4px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;\"></figure>\r\n</li>\r\n</ol>\r\n</div>', 9, 'lawyer', 9, '2017-07-27 19:00:49', '2017-07-28 14:08:01'),
(22, ' SELECT * FROM  `games` LIMIT 30 , 30 \r\n', '<div id=\"page-wrapper\">\r\n        <ol class=\"breadcrumb\">\r\n            <li class=\"active\">\r\n                <i class=\"fa fa-dashboard\"></i> Панель\r\n            </li>\r\n        </ol>\r\n\r\n        <div class=\"container-fluid\">\r\n            <div class=\"row\">\r\n                <div class=\"col-lg-3 col-md-6\">\r\n                    <div class=\"panel panel-info\">\r\n                        <div class=\"panel-heading\">\r\n                            <div class=\"row\">\r\n                                <div class=\"col-xs-3\">\r\n                                    <i class=\"fa fa-users fa-5x\"></i>\r\n                                </div>\r\n                                <div class=\"col-xs-9 text-right\">\r\n                                    <div class=\"huge\">26</div>\r\n                                    <div>Новых пользователей!</div>\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                        <a href=\"#\">\r\n                            <div class=\"panel-footer\">\r\n                                <span class=\"pull-left\">Показать</span>\r\n                                <span class=\"pull-right\"><i class=\"fa fa-arrow-circle-right\"></i></span>\r\n                                <div class=\"clearfix\"></div>\r\n                            </div>\r\n                        </a>\r\n                    </div>\r\n                </div>\r\n                <div class=\"col-lg-3 col-md-6\">\r\n                    <div class=\"panel panel-success\">\r\n                        <div class=\"panel-heading\">\r\n                            <div class=\"row\">\r\n                                <div class=\"col-xs-3\">\r\n                                    <i class=\"fa fa-comments-o fa-5x\"></i>\r\n                                </div>\r\n                                <div class=\"col-xs-9 text-right\">\r\n                                    <div class=\"huge\">126</div>\r\n                                    <div>Новых комментарии!</div>\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                        <a href=\"#\">\r\n                            <div class=\"panel-footer\">\r\n                                <span class=\"pull-left\">Показать</span>\r\n                                <span class=\"pull-right\"><i class=\"fa fa-arrow-circle-right\"></i></span>\r\n                                <div class=\"clearfix\"></div>\r\n                            </div>\r\n                        </a>\r\n                    </div>\r\n                </div>\r\n                <div class=\"col-lg-3 col-md-6\">\r\n                    <div class=\"panel panel-danger\">\r\n                        <div class=\"panel-heading\">\r\n                            <div class=\"row\">\r\n                                <div class=\"col-xs-3\">\r\n                                    <i class=\"fa fa-newspaper-o fa-5x\"></i>\r\n                                </div>\r\n                                <div class=\"col-xs-9 text-right\">\r\n                                    <div class=\"huge\">126</div>\r\n                                    <div>Новых статьи!</div>\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                        <a href=\"#\">\r\n                            <div class=\"panel-footer\">\r\n                                <span class=\"pull-left\">Показать</span>\r\n                                <span class=\"pull-right\"><i class=\"fa fa-arrow-circle-right\"></i></span>\r\n                                <div class=\"clearfix\"></div>\r\n                            </div>\r\n                        </a>\r\n                    </div>\r\n                </div>\r\n                <div class=\"col-lg-3 col-md-6\">\r\n                    <div class=\"panel panel-warning\">\r\n                        <div class=\"panel-heading\">\r\n                            <div class=\"row\">\r\n                                <div class=\"col-xs-3\">\r\n                                    <i class=\"fa fa-question-circle-o fa-5x\"></i>\r\n                                </div>\r\n                                <div class=\"col-xs-9 text-right\">\r\n                                    <div class=\"huge\">126</div>\r\n                                    <div>Новых вопросов!</div>\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                        <a href=\"#\">\r\n                            <div class=\"panel-footer\">\r\n                                <span class=\"pull-left\">Показать</span>\r\n                                <span class=\"pull-right\"><i class=\"fa fa-arrow-circle-right\"></i></span>\r\n                                <div class=\"clearfix\"></div>\r\n                            </div>\r\n                        </a>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n            <div class=\"row\">\r\n                <div class=\"col-sm-12 border-gray\">\r\n                    <h4>Статистика вопросов</h4>\r\n                    <div id=\"questionsBar\" style=\"height: 250px;\">\r\n                    </div>\r\n                </div>\r\n            </div>\r\n            <div class=\"row border-gray\" id=\"donuts\">\r\n                <div class=\"col-sm-6\">\r\n                    <h4>Статистика пользователей</h4>\r\n                    <div id=\"usersDonut\" style=\"height: 250px;\">\r\n                    </div>\r\n                </div>\r\n                <div class=\"col-sm-6\">\r\n                    <h4>Количество бесплатных/платных вопросов</h4>\r\n                    <div id=\"questionsDonut\" style=\"height: 250px;\">\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>', 13, 'lawyer', 10, '2017-07-27 19:00:49', '2017-07-31 01:33:17'),
(23, 'The world\'s 50 most powerful blogs', '<div class=\"hide-on-mobile\" style=\"color: #333333; font-family: \'Guardian Text Egyptian Web\', Georgia, serif; font-size: medium; font-variant-ligatures: common-ligatures;\"><header class=\"content__head tonal__head tonal__head--tone-news\r\n    \r\n    \">\r\n<div class=\"content__header tonal__header\">\r\n<div class=\"gs-container\" style=\"position: relative; margin: 0px auto; max-width: 81.25rem; padding-left: 1.25rem; padding-right: 1.25rem; box-sizing: border-box;\">\r\n<div class=\"content__main-column u-cf\" style=\"max-width: 38.75rem; margin: auto 20rem auto 15rem; position: relative;\">\r\n<h1 class=\"content__headline\" style=\"margin: 0px; font-size: 2.25rem; line-height: 2.5rem; font-family: \'Guardian Egyptian Web\', \'Guardian Text Egyptian Web\', Georgia, serif; font-weight: normal; padding-top: 0.375rem; padding-bottom: 2.25rem;\">The world\'s 50 most powerful blogs</h1>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"tonal__standfirst u-cf\">\r\n<div class=\"gs-container\" style=\"position: relative; margin: 0px auto; max-width: 81.25rem; padding-left: 1.25rem; padding-right: 1.25rem; box-sizing: border-box;\">\r\n<div class=\"content__main-column\" style=\"max-width: 38.75rem; margin: auto 20rem auto 15rem; position: relative;\">\r\n<div class=\"content__standfirst\" style=\"font-size: 1.125rem; line-height: 1.375rem; font-family: \'Guardian Egyptian Web\', \'Guardian Text Egyptian Web\', Georgia, serif; margin-bottom: 0.375rem; color: #767676;\" data-link-name=\"standfirst\" data-component=\"standfirst\">From Prince Harry in Afghanistan to Tom Cruise ranting about Scientology and footage from the Burmese uprising, blogging has never been bigger. It can help elect presidents and take down attorney generals while simultaneously celebrating the minutiae of our everyday obsessions. Here are the 50 best reasons to log on&nbsp;<br /><br />Read Bobbie Johnson\'s blog on celebrity snooper Nick Denton&nbsp;<a class=\"u-underline\" style=\"background: transparent; touch-action: manipulation; color: #005689; cursor: pointer; border-bottom: 0.0625rem solid #dcdcdc; transition: border-color 0.15s ease-out; text-decoration-line: none !important;\" href=\"http://blogs.guardian.co.uk/digitalcontent/2008/03/nick_denton_and_the_observers.html\" data-link-name=\"in standfirst link\">here</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</header></div>\r\n<div class=\"content__main tonal__main tonal__main--tone-news\" style=\"color: #333333; font-family: \'Guardian Text Egyptian Web\', Georgia, serif; font-size: medium; font-variant-ligatures: common-ligatures;\">\r\n<div class=\"gs-container\" style=\"position: relative; margin: 0px auto; max-width: 81.25rem; padding-left: 1.25rem; padding-right: 1.25rem; box-sizing: border-box;\">\r\n<div class=\"content__main-column content__main-column--article js-content-main-column \" style=\"min-height: 17.25rem; max-width: 38.75rem; margin: auto 20rem auto 15rem; position: relative;\">\r\n<div class=\"js-score\">&nbsp;</div>\r\n<div class=\"js-sport-tabs football-tabs content__mobile-full-width\" style=\"margin-left: 0px; margin-right: 0px;\">&nbsp;</div>\r\n<div class=\"media-primary\" style=\"margin: 0px; position: relative;\">&nbsp;</div>\r\n<div class=\"content__meta-container js-content-meta js-football-meta u-cf\r\n    \r\n    \r\n    \r\n    \r\n    \r\n    \r\n    \" style=\"min-height: 2.25rem; position: absolute; margin-bottom: 1rem; top: 0px; margin-left: -15rem; width: 13.75rem;\">\r\n<div class=\"meta__extras  meta__extras--notice \" style=\"position: relative; clear: both; min-height: 2.8125rem; border: 0px;\">\r\n<div class=\"meta__social\" style=\"padding: 0px; box-sizing: border-box; border-top: 0.0625rem dotted #dfdfdf; min-height: 2.8125rem;\" data-component=\"share\">\r\n<ul class=\"social social--top js-social--top u-unstyled u-cf\" style=\"list-style: none; padding: 0.375rem 0px; margin: 0px; overflow-y: hidden; height: 2rem;\" data-component=\"social\">\r\n<li class=\"social__item social__item--facebook \" style=\"float: left; min-width: 2rem; padding: 0px 0.1875rem 0.375rem 0px; cursor: pointer;\" data-link-name=\"facebook\"></li>\r\n<li class=\"social__item social__item--twitter \" style=\"float: left; min-width: 2rem; padding: 0px 0.1875rem 0.375rem 0px; cursor: pointer;\" data-link-name=\"twitter\"></li>\r\n<li class=\"social__item social__item--email \" style=\"float: left; min-width: 2rem; padding: 0px 0.1875rem 0.375rem 0px; cursor: pointer;\" data-link-name=\"email\"></li>\r\n<li class=\"js-social__secondary social__item social__item--more js-social__item--more\" style=\"float: left; min-width: 2rem; padding: 0px 0.1875rem 0.375rem 0px; cursor: pointer;\"><button class=\"meta-button social-tray__button\" style=\"font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; margin: 0px; -webkit-font-smoothing: antialiased; overflow: visible; cursor: pointer; touch-action: manipulation; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; padding: 0px; border: 0px initial initial;\"><span class=\"u-h\" style=\"border: 0px !important; clip: rect(0px 0px 0px 0px) !important; height: 0.0625rem !important; margin: -0.0625rem !important; overflow: hidden !important; padding: 0px !important; position: absolute !important; width: 0.0625rem !important;\">View more sharing options</span></button></li>\r\n</ul>\r\n</div>\r\n<div class=\"meta__numbers\" style=\"padding-bottom: 0.1875rem; padding-top: 0.1875rem; position: static; right: 0px; top: 0px; border-top: 0.0625rem dotted #dfdfdf; height: 2.25rem;\">\r\n<div class=\"meta__number js-sharecount\" style=\"height: 36px; float: left; min-width: 0.9375rem;\" title=\"Facebook: 314\">\r\n<h3 class=\"sharecount__heading\" style=\"margin: 0px; font-size: 1rem; line-height: 1.5rem; font-weight: normal; height: 0.9375rem; position: relative; padding-left: 0.9375rem; padding-right: 0px; color: #767676;\"><span class=\"sharecount__text u-h\" style=\"border: 0px !important; clip: rect(0px 0px 0px 0px) !important; height: 0.0625rem !important; margin: -0.0625rem !important; overflow: hidden !important; padding: 0px !important; position: absolute !important; width: 0.0625rem !important;\">Shares</span></h3>\r\n<div class=\"sharecount__value sharecount__value--full\" style=\"font-size: 1.125rem; line-height: 1.125rem; font-family: \'Guardian Text Sans Web\', \'Helvetica Neue\', Helvetica, Arial, \'Lucida Grande\', sans-serif; font-weight: bold; letter-spacing: -0.0625rem; padding-top: 0.15rem; color: #767676;\">314</div>\r\n</div>\r\n<div class=\"u-h meta__number\" style=\"border-left: 0.0625rem solid #f1f1f1; height: 1px; float: left; min-width: 0.9375rem; border-top: 0px !important; border-right: 0px !important; border-bottom: 0px !important; border-image: initial !important; clip: rect(0px 0px 0px 0px) !important; overflow: hidden !important; position: absolute !important; width: 0.0625rem !important; padding: 0px !important 0px !important 0px !important 0.625rem; margin: -0.0625rem !important -0.0625rem !important -0.0625rem !important 0.625rem;\" data-discussion-id=\"/p/x3mct\" data-commentcount-format=\"content\" data-discussion-closed=\"true\">&nbsp;</div>\r\n</div>\r\n</div>\r\n<p class=\"byline\" style=\"margin-top: 0px; margin-bottom: 0px; font-size: 1rem; font-weight: bold; padding-top: 0.125rem; line-height: 1.375rem; color: #767676; clear: both; margin-right: 0px; border-top: 0.0625rem dotted #dfdfdf; box-sizing: border-box; padding-bottom: 0.75rem; min-height: 3rem;\" data-link-name=\"byline\" data-component=\"meta-byline\"><a class=\"tone-colour\" style=\"background: transparent; touch-action: manipulation; color: #005689; cursor: pointer; text-decoration-line: none;\" href=\"https://www.theguardian.com/profile/jessicaaldred\" rel=\"author\" data-link-name=\"auto tag link\">Jessica Aldred</a>, Amanda Astell,&nbsp;<a class=\"tone-colour\" style=\"background: transparent; touch-action: manipulation; color: #005689; cursor: pointer; text-decoration-line: none;\" href=\"https://www.theguardian.com/profile/rafaelbehr\" rel=\"author\" data-link-name=\"auto tag link\">Rafael Behr</a>,&nbsp;<a class=\"tone-colour\" style=\"background: transparent; touch-action: manipulation; color: #005689; cursor: pointer; text-decoration-line: none;\" href=\"https://www.theguardian.com/profile/laurencochrane\" rel=\"author\" data-link-name=\"auto tag link\">Lauren Cochrane</a>,&nbsp;<a class=\"tone-colour\" style=\"background: transparent; touch-action: manipulation; color: #005689; cursor: pointer; text-decoration-line: none;\" href=\"https://www.theguardian.com/profile/johnhind\" rel=\"author\" data-link-name=\"auto tag link\">John Hind</a>,&nbsp;<a class=\"tone-colour\" style=\"background: transparent; touch-action: manipulation; color: #005689; cursor: pointer; text-decoration-line: none;\" href=\"https://www.theguardian.com/profile/annapickard\" rel=\"author\" data-link-name=\"auto tag link\">Anna Pickard</a>,&nbsp;<a class=\"tone-colour\" style=\"background: transparent; touch-action: manipulation; color: #005689; cursor: pointer; text-decoration-line: none;\" href=\"https://www.theguardian.com/profile/laura-potter\" rel=\"author\" data-link-name=\"auto tag link\">Laura Potter</a>,&nbsp;<a class=\"tone-colour\" style=\"background: transparent; touch-action: manipulation; color: #005689; cursor: pointer; text-decoration-line: none;\" href=\"https://www.theguardian.com/profile/alicewignall\" rel=\"author\" data-link-name=\"auto tag link\">Alice Wignall</a>&nbsp;and&nbsp;<a class=\"tone-colour\" style=\"background: transparent; touch-action: manipulation; color: #005689; cursor: pointer; text-decoration-line: none;\" href=\"https://www.theguardian.com/profile/evawiseman\" rel=\"author\" data-link-name=\"auto tag link\">Eva Wiseman</a></p>\r\n<p class=\"content__dateline\" style=\"margin-top: 0px; margin-bottom: 0px; font-size: 0.75rem; line-height: 1rem; font-family: \'Guardian Text Sans Web\', \'Helvetica Neue\', Helvetica, Arial, \'Lucida Grande\', sans-serif; position: relative; color: #767676; box-sizing: border-box; padding-top: 0.125rem; padding-right: 0px; min-height: 3rem; padding-bottom: 0.75rem; border-top: 0.0625rem dotted #dfdfdf;\" aria-hidden=\"true\"><time class=\"content__dateline-wpd js-wpd content__dateline-wpd--modified\" style=\"cursor: pointer; display: inline-block;\" datetime=\"2008-03-09T12:09:00+0000\" data-timestamp=\"1205064540000\">Sunday 9 March 2008&nbsp;<span class=\"content__dateline-time\">12.09&nbsp;GMT</span></time><time class=\"content__dateline-lm js-lm u-h\" style=\"border: 0px !important; clip: rect(0px 0px 0px 0px) !important; height: 0.0625rem !important; margin: -0.0625rem !important; overflow: hidden !important; position: absolute !important; width: 0.0625rem !important; display: inline-block; padding: 0.125rem 0px !important 0px !important 0px !important;\" datetime=\"2008-03-09T12:09:00+0000\" data-timestamp=\"1205064540000\">First published on Sunday 9 March 2008&nbsp;<span class=\"content__dateline-time\">12.09&nbsp;GMT</span></time></p>\r\n</div>\r\n<div class=\"js-carrot\">&nbsp;</div>\r\n<hr class=\"content__hr hide-until-leftcol\" style=\"box-sizing: content-box; height: 0px; border-width: 0.0625rem 0px 0px; border-image: initial; margin: 0px; padding-top: 0.3125rem; border-color: #dfdfdf initial initial initial; border-style: dotted initial initial initial;\" />\r\n<div class=\"content__article-body from-content-api js-article__body\" style=\"word-wrap: break-word; position: relative;\" data-test-id=\"article-review-body\">\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px;\"><strong>The following apology was published in the Observer\'s For the record column, Sunday March 16 2008</strong></p>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px;\">The article below said \'Psychodwarf\' was Beppe Grillo\'s nickname for \'Mario Mastella, leader of the Popular-UDEUR centre-right party\', but it\'s actually his nickname for Silvio Berlusconi. Mastella\'s first name is Clemente and Popular-UDEUR was part of Romano Prodi\'s centre-left coalition. And Peter Rojas, not Ryan Block, founded Engadget and co-founded Gizmodo. Apologies.</p>\r\n<h2 style=\"margin: 1.6875rem 0px 0.0625rem; font-size: 1.25rem; line-height: 1.5rem; font-family: \'Guardian Egyptian Web\', \'Guardian Text Egyptian Web\', Georgia, serif;\">1. The Huffington Post</h2>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px;\">The history of political blogging might usefully be divided into the periods pre- and post-Huffington. Before the millionaire socialite Arianna Huffington decided to get in on the act, bloggers operated in a spirit of underdog solidarity. They hated the mainstream media - and the feeling was mutual.</p>\r\n<aside class=\"element element-rich-link element-rich-link--tag element--thumbnail element-rich-link--upgraded\" style=\"float: left; margin: 0.3125rem 1.25rem 0.75rem -15rem; clear: both; width: 13.75rem;\" data-component=\"rich-link-tag\" data-link-name=\"rich-link-tag\">\r\n<div class=\"rich-link tone-news--item \" style=\"background-color: #f6f6f6; margin: 0px; position: relative; overflow: hidden;\">\r\n<div class=\"rich-link__container\" style=\"position: relative;\">\r\n<div class=\"rich-link__image-container u-responsive-ratio\" style=\"width: 220px; padding-bottom: 132px; position: relative; overflow: hidden; transition: background-color 0.25s ease; background-color: rgba(0, 0, 0, 0.1);\"><img style=\"border: 0px; width: 220px; height: 132px; position: absolute; top: 0px; left: 0px;\" src=\"https://i.guim.co.uk/img/media/7742d0a10fab1214b77936efdb6e6e2d42c008b2/0_0_2083_1250/2083.jpg?w=460&amp;q=55&amp;auto=format&amp;usm=12&amp;fit=max&amp;s=a5ebba6b2a3ebbab092819f4977f04a7\" /></div>\r\n<div class=\"rich-link__header\" style=\"font-size: 1.25rem; line-height: 1.5rem; font-family: \'Guardian Egyptian Web\', \'Guardian Text Egyptian Web\', Georgia, serif; padding: 0.25rem 0.3125rem 0.5em; box-sizing: border-box; min-height: 2.25rem;\">\r\n<h1 class=\"rich-link__title\" style=\"margin: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; font-family: inherit; line-height: inherit; padding: 0px;\"><a class=\"rich-link__link\" style=\"background: transparent; touch-action: manipulation; color: inherit; cursor: pointer;\">Sign up to the Media Briefing: news for the news-makers</a></h1>\r\n</div>\r\n<div class=\"rich-link__read-more\" style=\"padding-left: 0.3125rem;\">\r\n<div class=\"rich-link__arrow\" style=\"display: inline-block;\">&nbsp;</div>\r\n&nbsp;\r\n<div class=\"rich-link__read-more-text\" style=\"font-size: 0.875rem; font-family: \'Guardian Egyptian Web\', \'Guardian Text Egyptian Web\', Georgia, serif; display: inline-block; height: 1.875rem; line-height: 1.625rem; padding-left: 0.125rem; vertical-align: top; color: #005689;\">Read more</div>\r\n</div>\r\n</div>\r\n</div>\r\n</aside>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px;\">Bloggers saw themselves as gadflies, pricking the arrogance of established elites from their home computers, in their pyjamas, late into the night. So when, in 2005, Huffington decided to mobilise her fortune and media connections to create, from scratch, a flagship liberal blog she was roundly derided. Who, spluttered the original bloggerati, did she think she was?</p>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px;\">But the pyjama purists were confounded. Arianna\'s money talked just as loudly online as off, and the Huffington Post quickly became one of the most influential and popular journals on the web. It recruited professional columnists and celebrity bloggers. It hoovered up traffic. Its launch was a landmark moment in the evolution of the web because it showed that many of the old rules still applied to the new medium: a bit of marketing savvy and deep pockets could go just as far as geek credibility, and get there faster.</p>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px;\">To borrow the gold-rush simile beloved of web pioneers, Huffington\'s success made the first generation of bloggers look like two-bit prospectors panning for nuggets in shallow creeks before the big mining operations moved in. In the era pre-Huffington, big media companies ignored the web, or feared it; post-Huffington they started to treat it as just another marketplace, open to exploitation. Three years on, Rupert Murdoch owns MySpace, while newbie amateur bloggers have to gather traffic crumbs from under the table of the big-time publishers.</p>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px;\"><strong>Least likely to post</strong>&nbsp;\'I\'m so over this story - check out the New York Times\'</p>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px;\"><a class=\"u-underline\" style=\"background: transparent; touch-action: manipulation; color: #005689; cursor: pointer; border-bottom: 0.0625rem solid #dcdcdc; transition: border-color 0.15s ease-out; text-decoration-line: none !important;\" href=\"http://www.huffingtonpost.com/\" data-link-name=\"in body link\">huffingtonpost.com</a></p>\r\n<h2 style=\"margin: 1.6875rem 0px 0.0625rem; font-size: 1.25rem; line-height: 1.5rem; font-family: \'Guardian Egyptian Web\', \'Guardian Text Egyptian Web\', Georgia, serif;\">2. Boing Boing</h2>\r\n<div id=\"dfp-ad--inline1\" class=\"js-ad-slot ad-slot ad-slot--inline ad-slot--inline1 ad-slot--rendered\" style=\"position: relative; z-index: 1010; overflow: initial; width: 18.75rem; margin: 0.25rem auto 0.75rem 1.25rem; min-width: 18.75rem; min-height: 17.125rem; text-align: center; background-color: #f6f6f6; float: right;\" data-link-name=\"ad slot inline1\" data-name=\"inline1\" data-mobile=\"1,1|2,2|300,250|fluid\" data-desktop=\"1,1|2,2|300,250|620,1|620,350|fluid\" data-google-query-id=\"CN-Z6JXsstUCFQaNGAodYgcFjQ\">\r\n<div class=\"ad-slot__label\" style=\"font-size: 0.75rem; line-height: 1.25rem; position: relative; height: 1.5rem; background-color: transparent; margin: 0px auto; padding: 0px 0.5rem; border-top: 0.0625rem solid #dfdfdf; color: #6e6e6e; text-align: left; box-sizing: border-box; font-family: \'Guardian Text Sans Web\', \'Helvetica Neue\', Helvetica, Arial, \'Lucida Grande\', sans-serif;\">Advertisement</div>\r\n<div id=\"google_ads_iframe_/59666047/theguardian.com/media/article/ng_0__container__\" class=\"ad-slot__content\" style=\"border: 0pt none; display: inline-block; width: 300px; height: 250px;\"><iframe id=\"google_ads_iframe_/59666047/theguardian.com/media/article/ng_0\" style=\"border-width: 0px; border-style: initial; vertical-align: bottom;\" title=\"3rd party ad content\" src=\"https://tpc.googlesyndication.com/safeframe/1-0-9/html/container.html\" name=\"\" width=\"300\" height=\"250\" frameborder=\"0\" marginwidth=\"0\" marginheight=\"0\" scrolling=\"no\" data-is-safeframe=\"true\"></iframe></div>\r\n</div>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px;\">Lego reconstructions of pop videos and cakes baked in the shape of iPods are not generally considered relevant to serious political debate. But even the most earnest bloggers will often take time out of their busy schedule to pass on some titbit of mildly entertaining geek ephemera. No one has done more to promote pointless, yet strangely cool, time-wasting stuff on the net than the editors of Boing Boing (subtitle: A Directory of Wonderful Things). It launched in January 2000 and has had&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 14, 'lawyer', 7, '2017-07-31 01:07:47', '2017-07-31 09:16:22');
INSERT INTO `blogs` (`id`, `title`, `text`, `count`, `blog_type`, `lawyer_id`, `created_at`, `updated_at`) VALUES
(24, 'It\'s the PCB, not captain Sana Mir, who\'s responsible for Women\'s WC performance', '<div class=\"template__header   modifier--open        \" style=\"box-sizing: border-box; position: relative;\">\r\n<div class=\"row  no-gutters\" style=\"box-sizing: border-box; margin-right: 0px; margin-left: 0px;\">\r\n<div class=\"col-12\" style=\"box-sizing: border-box; width: 819px; position: relative; min-height: 1px; padding-right: 0px; padding-left: 0px; float: left;\">\r\n<h2 class=\"story__title    size-ten  border--bottom    pb-3  mt-4\" style=\"box-sizing: border-box; padding: 0.18em 0px 0.45em; text-rendering: optimizeLegibility; color: #231f20; font-size: 31px; line-height: 36px; font-family: \'Playfair Display\'; overflow: hidden; letter-spacing: 0.3px; border-bottom: 1px solid #babcbe !important; margin: 18px !important 0px 0px 0px;\" data-layout=\"story\" data-id=\"1346514\"><a class=\"story__link\" style=\"box-sizing: border-box; text-decoration-line: none;\" href=\"https://www.dawn.com/news/1346514/its-the-pcb-not-captain-sana-mir-whos-responsible-for-womens-wc-performance\">It\'s the PCB, not captain Sana Mir, who\'s responsible for Women\'s WC performance</a></h2>\r\n<div class=\"row  no-gutters\" style=\"box-sizing: border-box; margin-right: 0px; margin-left: 0px;\">\r\n<div class=\"col-12  col-sm-6\" style=\"box-sizing: border-box; width: 409.5px; position: relative; min-height: 1px; padding-right: 0px; padding-left: 0px; float: left;\">\r\n<div class=\"    my-2  ml-sm-0  ml-1\" style=\"box-sizing: border-box; margin-left: 0px !important; margin-top: 9px !important; margin-bottom: 9px !important;\"><span class=\"story__byline      \" style=\"box-sizing: border-box; font-family: Arial; font-size: 13px; line-height: 26.3px;\"><a style=\"box-sizing: border-box; text-decoration-line: none;\" href=\"https://www.dawn.com/authors/6937/shahbano-aliani\">Shahbano Aliani</a></span><span class=\"story__time      \" style=\"box-sizing: border-box; font-size: 13px; overflow: hidden; font-family: Arial; line-height: 26.3px;\"><span class=\"timestamp--label\" style=\"box-sizing: border-box; color: inherit;\">Updated</span>&nbsp;July 21, 2017</span></div>\r\n</div>\r\n<div class=\"col-12  col-sm-6\" style=\"box-sizing: border-box; width: 409.5px; position: relative; min-height: 1px; padding-right: 0px; padding-left: 0px; float: left;\">\r\n<div class=\"mt-0  mb-2  mt-0  mt-sm-2 sm-mb-1  clearfix  social-container\" style=\"box-sizing: border-box; margin-top: 9px !important; margin-bottom: 9px !important; float: right;\">\r\n<div class=\"social    social--icon  social--black  social--flat  social--facebook    social--count  float-left    mr-1  \" style=\"box-sizing: border-box; float: left !important; margin-right: 4.5px !important; height: 30px; padding: 5px; min-width: 25px; background-repeat: no-repeat; background-position: 0px 50%; background-image: url(\'../../_img/icons/facebook--black--flat.png\');\" aria-hidden=\"true\"><a style=\"box-sizing: border-box; text-decoration-line: none; color: #4444aa; width: 38.6719px; min-height: 30px; margin-top: -5px; display: inline-block; outline: 0px;\" href=\"https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.dawn.com%2Fnews%2F1346514&amp;display=popup&amp;ref=plugin\" target=\"_blank\" rel=\"noopener\"><span style=\"box-sizing: border-box; display: block; text-align: center; color: #000000; margin-left: 15px; font-size: 12px;\" data-fb-count-url=\"https%3A%2F%2Fwww.dawn.com%2Fnews%2F1346514\">1118</span></a></div>\r\n<div class=\"social    social--icon  social--black  social--flat  social--twitter  float-left    mr-1  \" style=\"box-sizing: border-box; float: left !important; margin-right: 4.5px !important; height: 30px; padding: 5px; min-width: 25px; background-repeat: no-repeat; background-position: 0px 50%; background-image: url(\'../../_img/icons/twitter--black--flat.png\');\" aria-hidden=\"true\">&nbsp;</div>\r\n<div class=\"social  hidden-xs-down  social--print  social--flat  social--black  float-left    mr-1\" style=\"box-sizing: border-box; float: left !important; margin-right: 4.5px !important; height: 30px; padding: 5px; min-width: 25px; background-repeat: no-repeat; background-position: 0px 50%; background-image: url(\'../../_img/icons/print--black--flat.png\');\" aria-hidden=\"true\"><a style=\"box-sizing: border-box; text-decoration-line: none; color: #4444aa;\" href=\"https://www.dawn.com/news/print/1346514\">&nbsp;&nbsp;&nbsp;</a></div>\r\n<div class=\"social    social--email    social--icon  social--black  social--flat    float-left    mr-1\" style=\"box-sizing: border-box; float: left !important; margin-right: 4.5px !important; height: 30px; padding: 5px; min-width: 25px; background-repeat: no-repeat; background-position: 0px 50%; background-image: url(\'../../_img/icons/envelope--black--flat.png\');\" aria-hidden=\"true\">&nbsp;</div>\r\n<div class=\"social    social--comment    social--icon  social--black  social--flat  social--label  text--700  float-left    mr-1\" style=\"box-sizing: border-box; float: left !important; margin-right: 4.5px !important; font-weight: 700 !important; height: 30px; padding: 0px 5px 5px 25px; min-width: 25px; background-repeat: no-repeat; background-position: 0px 50%; line-height: 30px; font-size: 12px; background-image: url(\'../../_img/icons/comments--black--flat.png\');\" aria-hidden=\"true\"><a style=\"box-sizing: border-box; text-decoration-line: none; color: #444444; text-transform: uppercase; width: 14.75px; min-height: 30px; margin-top: -5px; display: inline-block; outline: 0px;\" href=\"https://www.dawn.com/news/1346514/its-the-pcb-not-captain-sana-mir-whos-responsible-for-womens-wc-performance#comments\">82</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"template__main   modifier--open        \" style=\"box-sizing: border-box; position: relative;\">\r\n<div class=\"row  no-gutters\" style=\"box-sizing: border-box; margin-right: 0px; margin-left: 0px;\">\r\n<div class=\"col-12\" style=\"box-sizing: border-box; width: 819px; position: relative; min-height: 1px; padding-right: 0px; padding-left: 0px; float: left;\">&nbsp;</div>\r\n<div class=\"col-12  col-sm-10  col-sm-offset-1\" style=\"box-sizing: border-box; width: 682.5px; position: relative; min-height: 1px; padding-right: 0px; padding-left: 0px; float: left; margin-left: 68.2344px;\">\r\n<div class=\"row  no-gutters\" style=\"box-sizing: border-box; margin-right: 0px; margin-left: 0px;\">\r\n<div class=\"col-12  col-sm-11\" style=\"box-sizing: border-box; width: 625.625px; position: relative; min-height: 1px; padding-right: 0px; padding-left: 0px; float: left;\">\r\n<div class=\"ml-0  ml-sm-6  px-0  px-sm-2\" style=\"box-sizing: border-box; margin-left: 36px !important; padding-right: 9px !important; padding-left: 9px !important;\">\r\n<div class=\"story__content      pt-4  \" style=\"box-sizing: border-box; padding-top: 18px !important; font-size: 1.28571rem; color: #252525;\">\r\n<h3 id=\"toc_0\" style=\"box-sizing: border-box; margin: 0px; padding: 0.5em 0px; text-rendering: optimizeLegibility; color: #000000; font-size: 19px; line-height: 27px; font-family: \'Playfair Display\'; letter-spacing: 0.3px;\">The farce</h3>\r\n<p class=\"\" style=\"box-sizing: border-box; margin: 0px 0px 1.25em; padding: 0px; line-height: 28px; font-family: Georgia; letter-spacing: 0.02px; color: #000000; font-size: 17.9999px;\">In what seems like a complete farce,&nbsp;<a style=\"box-sizing: border-box; color: #4444aa;\" href=\"https://www.dawn.com/news/1345898\">an unnamed source from PCB has told APP</a>&nbsp;that the captain of the Pakistani Women&rsquo;s Cricket Team, Sana Mir,&nbsp;<em style=\"box-sizing: border-box;\">is likely to lose captaincy as well as her place in the team after Pakistan\'s dismal performance in the ICC Women\'s World Cup in England</em>, saying: &ldquo;She [Sana] failed to lead Pakistan in a proper way. Her own performance too was not satisfactory.&rdquo;</p>\r\n<p class=\"\" style=\"box-sizing: border-box; margin: 0px 0px 1.25em; padding: 0px; line-height: 28px; font-family: Georgia; letter-spacing: 0.02px; color: #000000; font-size: 17.9999px;\">Ms. Shamsa Hashmi, Secretary Women&rsquo;s Wing, has also been&nbsp;<a style=\"box-sizing: border-box; color: #4444aa;\" href=\"https://www.dawn.com/news/1346167/pcb-reviews-budget-allocation-domestic-structure-of-womens-wing\">reported in the news</a>&nbsp;to have called the captain&rsquo;s performance as &ldquo;not very encouraging&rdquo;.</p>\r\n<h3 id=\"toc_1\" style=\"box-sizing: border-box; margin: 0px; padding: 0.5em 0px; text-rendering: optimizeLegibility; color: #000000; font-size: 19px; line-height: 27px; font-family: \'Playfair Display\'; letter-spacing: 0.3px;\">The facts</h3>\r\n<p class=\"\" style=\"box-sizing: border-box; margin: 0px 0px 1.25em; padding: 0px; line-height: 28px; font-family: Georgia; letter-spacing: 0.02px; color: #000000; font-size: 17.9999px;\">I followed all of Pakistan&rsquo;s matches and it is not true that their performance was &ldquo;dismal&rdquo;.</p>\r\n<p class=\"\" style=\"box-sizing: border-box; margin: 0px 0px 1.25em; padding: 0px; line-height: 28px; font-family: Georgia; letter-spacing: 0.02px; color: #000000; font-size: 17.9999px;\">First of all, ours is one of the youngest and least experienced teams who qualified for the World Cup. The qualification itself is an achievement for our team.</p>\r\n<p class=\"\" style=\"box-sizing: border-box; margin: 0px 0px 1.25em; padding: 0px; line-height: 28px; font-family: Georgia; letter-spacing: 0.02px; color: #000000; font-size: 17.9999px;\">They played against teams who had been playing for decades before our team was formed in the mid-90s; with facilities and resources many times those that were available to our women&rsquo;s cricket team.</p>\r\n<p class=\"\" style=\"box-sizing: border-box; margin: 0px 0px 1.25em; padding: 0px; line-height: 28px; font-family: Georgia; letter-spacing: 0.02px; color: #000000; font-size: 17.9999px;\">Even so, they almost beat South Africa, and restricted India to their lowest score of 169 runs in the tournament (in contrast India made 281 against England, ranked number 2; and 226 against Australia, ranked number 1).</p>\r\n<p class=\"\" style=\"box-sizing: border-box; margin: 0px 0px 1.25em; padding: 0px; line-height: 28px; font-family: Georgia; letter-spacing: 0.02px; color: #000000; font-size: 17.9999px;\">To teams who were better matched, Pakistan lost by small margins &ndash; to the West Indies, by 19 runs (D/L method) and to Sri Lanka by only 15 runs. The bowling and fielding ranged from brilliant to good in many of the matches; the batting, however, was weaker, made more brittle by Bismah Maroof&rsquo;s injury.</p>\r\n<p class=\"\" style=\"box-sizing: border-box; margin: 0px 0px 1.25em; padding: 0px; line-height: 28px; font-family: Georgia; letter-spacing: 0.02px; color: #000000; font-size: 17.9999px;\">Bismah Maroof&rsquo;s injury and replacement exposed the lack of depth in reserve players, which the top teams have and we do not. The batting also showed just how utterly ineffective the coaching had been.</p>\r\n<p class=\"\" style=\"box-sizing: border-box; margin: 0px 0px 1.25em; padding: 0px; line-height: 28px; font-family: Georgia; letter-spacing: 0.02px; color: #000000; font-size: 17.9999px;\">Diana Baig, who made her debut, shone among the younger players with her bowling and enthusiastic fielding.</p>\r\n<p class=\"\" style=\"box-sizing: border-box; margin: 0px 0px 1.25em; padding: 0px; line-height: 28px; font-family: Georgia; letter-spacing: 0.02px; color: #000000; font-size: 17.9999px;\">But the Pakistani star of the tournament, despite losing all the games, was the captain,&nbsp;<a class=\"story__link--external\" style=\"box-sizing: border-box; color: #4444aa; padding: 0px 12px 0px 0px; background-image: url(\'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAIAAAGuEPsmAAAAgElEQVQYlXWQyxHAIAhEbVLv0oZebCsWl2xYB2Ri3gVZPgLpVpKbNOd8bSnFA+8r54yQiGwaTe+dDw9eiiirW1ZC4c6SxhguFQUtgkS/1srcxK5QOfKSAMvPP0oE3c5JrbXdXUm2CCTsyYV5Bk/i3whgTh6DZXau0MmwkX9P9eUBgstUonKpVTIAAAAASUVORK5CYII=\'); background-position: 100% 0px; background-repeat: no-repeat;\" href=\"http://www.espncricinfo.com/pakistan/content/player/220668.html\" target=\"_blank\" rel=\"noopener\">Sana Mir</a>.</p>\r\n<blockquote style=\"box-sizing: border-box; hyphens: none; max-width: 70%; text-align: center; font-family: Merriweather, serif; font-size: 17.9999px; margin: 40px auto 70px !important; padding: 0px !important; border-left: none !important;\">\r\n<p class=\"\" style=\"box-sizing: border-box; margin: 0px 0px 1.25em; padding: 0px; line-height: 28px; font-style: italic; font-size: 24px; font-family: Georgia; letter-spacing: 0.02px; color: #000000;\">For the PCB to indicate that Sana Mir should lose her position in the team sounds at best like a bad joke. And at worst, a craven attempt to scapegoat the most valuable player.</p>\r\n</blockquote>\r\n<p class=\"\" style=\"box-sizing: border-box; margin: 0px 0px 1.25em; padding: 0px; line-height: 28px; font-family: Georgia; letter-spacing: 0.02px; color: #000000; font-size: 17.9999px;\">With an average of over 30 runs in 5 innings, Sana had the highest batting average and performed with the bat and the ball, even in games when the rest of the batting side collapsed like dominoes.</p>\r\n<p class=\"\" style=\"box-sizing: border-box; margin: 0px 0px 1.25em; padding: 0px; line-height: 28px; font-family: Georgia; letter-spacing: 0.02px; color: #000000; font-size: 17.9999px;\">Sana also took six catches, one of which was Nissan Play of the Day. She took the highest number of wickets (3), two catches and made the highest number of runs (45) against Australia &ndash; the top ranked team in the world. (In contrast the second highest batting score from Pakistan in that match was 21).</p>\r\n<p class=\"\" style=\"box-sizing: border-box; margin: 0px 0px 1.25em; padding: 0px; line-height: 28px; font-family: Georgia; letter-spacing: 0.02px; color: #000000; font-size: 17.9999px;\">Sana Mir&rsquo;s was the best and most consistent performance all around; the ICC statistics speak for that.</p>\r\n<hr style=\"box-sizing: content-box; height: 0px; margin: 18px 0px; padding: 0px; border-top: 0px; border-right: 0px; border-left: 0px; border-image: initial; border-bottom-style: solid; border-bottom-color: #bebebe; clear: both; font-family: Merriweather, serif; font-size: 17.9999px;\" /></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 4, 'lawyer', 7, '2017-07-31 02:09:36', '2017-07-31 02:35:31');

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
(21, 16, 4, NULL, NULL),
(25, 18, 1, NULL, NULL),
(26, 18, 6, NULL, NULL),
(27, 19, 1, NULL, NULL),
(28, 19, 3, NULL, NULL),
(29, 19, 6, NULL, NULL),
(30, 16, 1, NULL, NULL),
(31, 16, 3, NULL, NULL),
(32, 16, 6, NULL, NULL),
(33, 16, 8, NULL, NULL),
(34, 21, 3, NULL, NULL),
(35, 21, 4, NULL, NULL),
(36, 23, 1, NULL, NULL),
(37, 24, 6, NULL, NULL),
(38, 24, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `calls`
--

CREATE TABLE `calls` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `cost` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `calls`
--

INSERT INTO `calls` (`id`, `title`, `description`, `cost`, `client_id`, `status`, `approved`, `created_at`, `updated_at`) VALUES
(1, 'Check whether call create is working', 'Check whether call create is workingCheck whether call create is working', 5000, 29, 0, 1, '2017-07-28 07:14:51', '2017-07-28 07:14:51');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `category_id`, `text`, `created_at`, `updated_at`) VALUES
(23, 'Perviy', NULL, 'das dsad asd asd as asd', '2017-06-24 12:43:12', '2017-06-24 12:43:12'),
(24, 'Vtoroy', 23, 'dasdas das dasd asd as a', '2017-06-24 12:43:25', '2017-06-24 12:43:25'),
(25, 'Tretiy', 30, 'dasdasdas', '2017-06-24 12:43:46', '2017-06-24 12:43:46'),
(26, 'Nedvijimost\'', NULL, ' asdasd as das dasd asd as', '2017-06-25 12:19:20', '2017-06-25 12:19:20'),
(27, 'New Category 2', 31, 'asdkns akdnnas dnsand nasn dsknk dnasknd', '2017-07-14 13:33:59', '2017-07-14 13:33:59'),
(28, 'Гражданское право', NULL, '<h4 style=\"box-sizing: border-box; font-family: \'Open Sans\'; font-weight: 500; line-height: 1.1; color: #1f2746; margin-top: 10px; margin-bottom: 10px; font-size: 24px;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Консультация юриста по кредитным долгам</span></h4>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; font-family: \'Open Sans\'; color: #333333;\">Кредитование &mdash; это предоставление денежных средств и прочих активов, финансовыми учреждениями физическим и юридическим лицам на определённых условиях, фиксируемых договором. Главным требованием кредиторов при этом является своевременное погашение обязательств, а неплатёжеспособность лиц в данном случае &mdash; это ключевая проблема.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; font-family: \'Open Sans\'; color: #333333;\">Возникают и другие сложности: одним гражданам необходима помощь в получении кредита, другим заемщикам требуются ответы на вопросы как расплатиться по просроченным кредитным долгам, а кому-то нужны советы по предотвращению проблем.</p>\r\n<h4 style=\"box-sizing: border-box; font-family: \'Open Sans\'; font-weight: 500; line-height: 1.1; color: #1f2746; margin-top: 10px; margin-bottom: 10px; font-size: 24px;\">Бесплатные консультации юриста должникам и юридическая помощь в кредите с просрочками</h4>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; font-family: \'Open Sans\'; color: #333333;\">Во всех описанных обстоятельствах поможет разобраться хороший юрист по кредитам, он подскажет, как проще разрешить спорный вопрос при помощи закона. Важно знать, что своевременно предоставленная юридическая помощь должникам в таких делах &minus; это половина успеха. Опытный адвокат не только даст необходимые разъяснения по кредитной задолженности, а и сделает всё от него зависящее для уменьшения размера долга.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; font-family: \'Open Sans\'; color: #333333;\">Нужные специалисты есть на страницах онлайн-портала Правовед.RU. Юридическая консультация и практическая поддержка клиентов осуществляются бесплатно или за вознаграждение!</p>', '2017-07-14 13:36:27', '2017-07-29 05:54:44'),
(30, 'Недвижимость', NULL, 'лвфдыл вфлыдвлфыдл вдфылд влыфлвд флыдвл фыдлвдфлыд влыдфл вдлфы', NULL, NULL),
(31, 'Права личности', NULL, 'флыь влвл фвлфывл фылв лфывл фьыл вьфль лвфьыль фвль лфыьл ьлвь лвьфльв лфылв ьфыльвлфыл ', NULL, NULL),
(32, 'SADasdasd', NULL, '<p><span style=\"box-sizing: border-box; font-weight: bold; font-family: Verdana, Arial; font-size: 13.4px; text-align: center; background-color: #ccccdd;\">\"Lose Yourself\"</span><br style=\"box-sizing: border-box; font-family: Verdana, Arial; font-size: 13.4px; text-align: center; background-color: #ccccdd;\" /><br style=\"box-sizing: border-box; font-family: Verdana, Arial; font-size: 13.4px; text-align: center; background-color: #ccccdd;\" /></p>\r\n<div style=\"box-sizing: border-box; font-family: Verdana, Arial; font-size: 13.4px; text-align: center; background-color: #ccccdd;\">Look, if you had, one shot, or one opportunity<br style=\"box-sizing: border-box;\" />To seize everything you ever wanted. In one moment<br style=\"box-sizing: border-box;\" />Would you capture it, or just let it slip?<br style=\"box-sizing: border-box;\" />Yo<br style=\"box-sizing: border-box;\" /><br style=\"box-sizing: border-box;\" />His palms are sweaty, knees weak, arms are heavy<br style=\"box-sizing: border-box;\" />There\'s vomit on his sweater already, mom\'s spaghetti<br style=\"box-sizing: border-box;\" />He\'s nervous, but on the surface he looks calm and ready to drop bombs,<br style=\"box-sizing: border-box;\" />But he keeps on forgetting what he wrote down,<br style=\"box-sizing: border-box;\" />The whole crowd goes so loud<br style=\"box-sizing: border-box;\" />He opens his mouth, but the words won\'t come out<br style=\"box-sizing: border-box;\" />He\'s choking how, everybody\'s joking now<br style=\"box-sizing: border-box;\" />The clock\'s run out, time\'s up, over, blaow!<br style=\"box-sizing: border-box;\" />Snap back to reality. Oh, there goes gravity<br style=\"box-sizing: border-box;\" />Oh, there goes Rabbit, he choked<br style=\"box-sizing: border-box;\" />He\'s so mad, but he won\'t give up that<br style=\"box-sizing: border-box;\" />Easy, no<br style=\"box-sizing: border-box;\" />He won\'t have it, he knows his whole back\'s to these ropes<br style=\"box-sizing: border-box;\" />It don\'t matter, he\'s dope<br style=\"box-sizing: border-box;\" />He knows that but he\'s broke<br style=\"box-sizing: border-box;\" />He\'s so stagnant, he knows<br style=\"box-sizing: border-box;\" />When he goes back to his mobile home, that\'s when it\'s<br style=\"box-sizing: border-box;\" />Back to the lab again, yo<br style=\"box-sizing: border-box;\" />This whole rhapsody<br style=\"box-sizing: border-box;\" />He better go capture this moment and hope it don\'t pass him<br style=\"box-sizing: border-box;\" /><br style=\"box-sizing: border-box;\" /><em style=\"box-sizing: border-box;\">[Hook:]</em><br style=\"box-sizing: border-box;\" />You better lose yourself in the music, the moment<br style=\"box-sizing: border-box;\" />You own it, you better never let it go (go)<br style=\"box-sizing: border-box;\" />You only get one shot, do not miss your chance to blow<br style=\"box-sizing: border-box;\" />This opportunity comes once in a lifetime (yo)<br style=\"box-sizing: border-box;\" />You better lose yourself in the music, the moment<br style=\"box-sizing: border-box;\" />You own it, you better never let it go (go)<br style=\"box-sizing: border-box;\" />You only get one shot, do not miss your chance to blow<br style=\"box-sizing: border-box;\" />This opportunity comes once in a lifetime (yo)<br style=\"box-sizing: border-box;\" />(You better)<br style=\"box-sizing: border-box;\" /><br style=\"box-sizing: border-box;\" />The soul\'s escaping, through this hole that is gaping<br style=\"box-sizing: border-box;\" />This world is mine for the taking<br style=\"box-sizing: border-box;\" />Make me king, as we move toward a new world order<br style=\"box-sizing: border-box;\" />A normal life is boring, but superstardom\'s close to postmortem<br style=\"box-sizing: border-box;\" />It only grows harder, homie grows hotter<br style=\"box-sizing: border-box;\" />He blows. It\'s all over. These hoes is all on him<br style=\"box-sizing: border-box;\" />Coast to coast shows, he\'s known as the globetrotter<br style=\"box-sizing: border-box;\" />Lonely roads, God only knows<br style=\"box-sizing: border-box;\" />He\'s grown farther from home, he\'s no father<br style=\"box-sizing: border-box;\" />He goes home and barely knows his own daughter<br style=\"box-sizing: border-box;\" />But hold your nose \'cause here goes the cold water<br style=\"box-sizing: border-box;\" />His hoes don\'t want him no more, he\'s cold product<br style=\"box-sizing: border-box;\" />They moved on to the next schmoe who flows<br style=\"box-sizing: border-box;\" />He nose dove and sold nada<br style=\"box-sizing: border-box;\" />So the soap opera is told and unfolds<br style=\"box-sizing: border-box;\" />I suppose it\'s old partner, but the beat goes on<br style=\"box-sizing: border-box;\" />Da da dum da dum da da da da<br style=\"box-sizing: border-box;\" /><br style=\"box-sizing: border-box;\" /></div>', '2017-07-29 06:41:22', '2017-07-29 06:41:22'),
(33, 'Кредит', NULL, '<h2 style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-size: 30px; font-weight: 400; margin-top: 55px; margin-bottom: 15px; position: relative; color: #525252; font-family: \'Source Sans Pro\', sans-serif;\"><a style=\"box-sizing: border-box; color: #525252; text-decoration-line: none; background-color: transparent;\" href=\"https://laravel.com/docs/5.4/validation#conditionally-adding-rules\">Conditionally Adding Rules</a></h2>\r\n<h4 style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-size: 16px; margin-top: 35px; margin-bottom: 10px; color: #525252; font-family: \'Source Sans Pro\', sans-serif;\">Validating When Present</h4>\r\n<p style=\"box-sizing: border-box; line-height: 1.7; margin: 10px 0px 20px; font-size: 14.5px; color: #525252; font-family: \'Source Sans Pro\', sans-serif;\">In some situations, you may wish to run validation checks against a field&nbsp;<span style=\"box-sizing: border-box; font-weight: bold; -webkit-font-smoothing: antialiased;\">only</span>&nbsp;if that field is present in the input array. To quickly accomplish this, add the&nbsp;<code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; color: #f4645f; border-radius: 3px; background: #f0f2f1; padding: 1px 5px; white-space: pre; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\">sometimes</code>&nbsp;rule to your rule list:</p>\r\n<pre class=\" language-php\" style=\"box-sizing: border-box; overflow: auto; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; margin-top: 10px; margin-bottom: 20px; background: rgba(238, 238, 238, 0.35); border-radius: 3px; padding: 10px; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\"><code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; vertical-align: middle;\"><span class=\"token variable\" style=\"box-sizing: border-box; color: #4ea1df;\">$v</span> <span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">=</span> <span class=\"token scope\" style=\"box-sizing: border-box; color: #da564a;\">Validator<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">::</span></span><span class=\"token function\" style=\"box-sizing: border-box; color: #555555;\">make<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span></span><span class=\"token variable\" style=\"box-sizing: border-box; color: #4ea1df;\">$data</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">,</span> <span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">[</span>\r\n    <span class=\"token string\" style=\"box-sizing: border-box; color: #2e7d32;\">\'email\'</span> <span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">=</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">&gt;</span> <span class=\"token string\" style=\"box-sizing: border-box; color: #2e7d32;\">\'sometimes|required|email\'</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">,</span>\r\n<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">]</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">;</span></code></pre>', '2017-07-29 06:42:59', '2017-07-29 06:42:59');

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
(7, 'Farg\'ona');

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
  `isBlocked` tinyint(1) NOT NULL DEFAULT '0',
  `blockedTill` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'M'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `email`, `password`, `remember_token`, `confirmed`, `confirmation_code`, `user_id`, `isBlocked`, `blockedTill`, `created_at`, `updated_at`, `gender`) VALUES
(29, 'shohrux.shomaxmudov@gmail.com', '$2y$10$c31oOtQ0.Y6yFq5dk40mn.49VGa0jXIWwnIhW75nr1VAiSiuiGEnG', '00r547p8AbaXaP5fUMckHL3498g0iKPS2Og3P0U4RA3rReKszZjeVgod54tX', 1, NULL, 5, 0, NULL, '2017-06-19 07:58:54', '2017-06-21 03:25:44', 'M'),
(30, 'shoxrux19960822@gmail.com', '$2y$10$XWLZtcctV03d/U4iz32Qku0HZ7bHiFBpBuzi09gWDZUCfgHUuN4xa', 'e3UF2OxLcaJ4T5eGSALoUMyL9wErXsipvbSIQeJjUUSYKmGUQlYI2SDTVHfm', 1, NULL, 17, 0, '2017-07-27 07:02:47', '2017-06-24 13:46:45', '2017-07-27 07:02:53', 'M'),
(31, 'ulug@mail.ru', '$2y$10$w8lLR7lBBEBQaxRFrySreuRuyalLerteZJj8u3e7MiGA4JoSdx2aO', 'yZ7XTD81Xi7TiksEsJqjNMzvS4FJyh1adsrp551GQddKBMzwE9eJcmik9mir', 1, NULL, 19, 0, NULL, '2017-07-01 07:12:53', '2017-07-01 07:13:45', 'M');

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
(17, 'dasd as das dasd a asds', 1, 16, 7, 'yuridik\\Lawyer', '2017-06-30 02:04:58', '2017-06-30 02:04:58'),
(18, 'dasd as das dasd a asds', 1, 16, 7, 'yuridik\\Lawyer', '2017-06-30 02:05:30', '2017-06-30 02:05:30'),
(19, 'dasd as das dasd a asds', 1, 16, 7, 'yuridik\\Lawyer', '2017-06-30 02:06:44', '2017-06-30 02:06:44'),
(20, 'dasd as das dasd a asds', 1, 16, 7, 'yuridik\\Lawyer', '2017-06-30 02:06:50', '2017-06-30 02:06:50'),
(21, 'asd asdas dasd asd', 1, 15, 7, 'yuridik\\Lawyer', '2017-06-30 02:07:35', '2017-06-30 02:07:35');

-- --------------------------------------------------------

--
-- Структура таблицы `documents`
--

CREATE TABLE `documents` (
  `id` int(11) UNSIGNED NOT NULL,
  `sub_type_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `approved` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `documents`
--

INSERT INTO `documents` (`id`, `sub_type_id`, `title`, `description`, `payment_type`, `cost`, `client_id`, `status`, `approved`, `created_at`, `updated_at`) VALUES
(2, 7, 'dasdasdasd', 'asdsdasdada', 'about', 15000, 29, 0, 1, '2017-07-04 01:59:46', '2017-07-26 08:29:15');

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

-- --------------------------------------------------------

--
-- Структура таблицы `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `answer_id` int(10) UNSIGNED NOT NULL,
  `helped` tinyint(1) NOT NULL,
  `text` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `client_id`, `answer_id`, `helped`, `text`, `approved`, `created_at`, `updated_at`) VALUES
(1, 29, 4, 1, 'ad asdasdada', 1, '2017-07-31 13:00:25', '2017-07-31 13:00:25');

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
(65, 'punch-saitama.jpg', '/clients/photo29/', 5, 'yuridik\\User', '2017-06-30 08:40:25', '2017-08-03 04:45:57'),
(66, 'image_2017-07-20_14-37-31.png', '/lawyers/photo7/', 6, 'yuridik\\User', '2017-06-30 08:46:02', '2017-08-02 00:34:10'),
(67, 'Test Farma.docx', '/answers/1498831094/', 4, 'yuridik\\Answer', '2017-06-30 08:58:14', '2017-06-30 08:58:14'),
(68, 'U1510352 Shokhrukh Shomakhmudov     Gr.docx', '/answers/1498831094/', 4, 'yuridik\\Answer', '2017-06-30 08:58:14', '2017-06-30 08:58:14'),
(69, 'Ҳ.и. ДТС охирги 2015.doc', '/answers/1498831094/', 4, 'yuridik\\Answer', '2017-06-30 08:58:14', '2017-06-30 08:58:14'),
(70, 'Test Farma.docx', '/documents/1499151586/', 2, 'yuridik\\Document', '2017-07-04 01:59:46', '2017-07-04 01:59:46'),
(71, 'U1510352 Shokhrukh Shomakhmudov     Gr.docx', '/documents/1499151586/', 2, 'yuridik\\Document', '2017-07-04 01:59:46', '2017-07-04 01:59:46'),
(72, 'Assignment7.docx', '/questions/1500551549/', 43, 'yuridik\\Question', '2017-07-20 06:52:29', '2017-07-20 06:52:29'),
(73, 'Assignment7.docx', '/questions/1500551564/', 44, 'yuridik\\Question', '2017-07-20 06:52:44', '2017-07-20 06:52:44'),
(74, 'Assignment7.docx', '/questions/1500551687/', 45, 'yuridik\\Question', '2017-07-20 06:54:47', '2017-07-20 06:54:47'),
(75, '8.docx', '/documents/1500911644/', 3, 'yuridik\\Document', '2017-07-24 10:54:04', '2017-07-24 10:54:04'),
(76, 'Ҳ.и. ДТС охирги 2015.doc', '/documents/1500916149/', 4, 'yuridik\\Document', '2017-07-24 12:09:09', '2017-07-24 12:09:09'),
(77, 'Test Farma.docx', '/answers/1500916347/', 4, 'yuridik\\Answer', '2017-07-24 12:12:27', '2017-07-24 12:12:27'),
(78, 'U1510352 Shokhrukh Shomakhmudov     Gr.docx', '/answers/1500916347/', 4, 'yuridik\\Answer', '2017-07-24 12:12:27', '2017-07-24 12:12:27'),
(79, '8.docx', '/answers/1500916365/', 5, 'yuridik\\Answer', '2017-07-24 12:12:45', '2017-07-24 12:12:45'),
(80, '%2Fanswers%2F1498826784%2F8.docx', '/questions/1501249464/', 46, 'yuridik\\Question', '2017-07-28 08:44:24', '2017-07-28 08:44:24'),
(81, '%2Fanswers%2F1498826785%2FU1510352 Shokhrukh Shomakhmudov     Gr.docx', '/questions/1501249465/', 46, 'yuridik\\Question', '2017-07-28 08:44:25', '2017-07-28 08:44:25'),
(82, 'BODYBUILDINGPROGRAM.jpg', '/blogs/23/', 23, 'yuridik\\Blog', '2017-07-31 01:07:48', '2017-07-31 01:07:48'),
(83, 'famous-chefs-736x410.jpg', '/blogs/24/', 24, 'yuridik\\Blog', '2017-07-31 02:09:36', '2017-07-31 02:09:36'),
(84, '20229380_1267230186739961_9033556843811316698_n.jpg', '/awards/1501745638/', 7, 'yuridik\\Lawyer', '2017-08-03 02:33:58', '2017-08-03 02:33:58'),
(85, '20368814_334717976952531_8849245196499441500_o.jpg', '/awards/1501745660/', 7, 'yuridik\\Lawyer', '2017-08-03 02:34:20', '2017-08-03 02:34:20');

-- --------------------------------------------------------

--
-- Структура таблицы `lawyers`
--

CREATE TABLE `lawyers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fatherName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_status` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education_city_id` int(10) UNSIGNED NOT NULL,
  `university` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `graduation_year` year(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1',
  `isBlocked` tinyint(4) NOT NULL DEFAULT '0',
  `blockedTill` timestamp NULL DEFAULT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'M',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience_year` int(11) NOT NULL,
  `call_price` int(11) NOT NULL,
  `doc_price` int(11) NOT NULL,
  `profile_shown_price` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lawyers`
--

INSERT INTO `lawyers` (`id`, `email`, `password`, `fatherName`, `job_status`, `education_city_id`, `university`, `faculty`, `graduation_year`, `remember_token`, `confirmed`, `confirmation_code`, `user_id`, `type`, `isBlocked`, `blockedTill`, `gender`, `created_at`, `updated_at`, `company`, `position`, `experience_year`, `call_price`, `doc_price`, `profile_shown_price`, `about_me`) VALUES
(7, '7shoxrux7@mail.ru', '$2y$10$Jf7gFn/zNHxlaunz04u8J.M52.sG9PhFVHQIOn1EE/HclrLdC1Ka6', 'Yuldashevich', 'lawyer', 0, '', '', 0000, 'DsodY30d8xPLFBuLbtyyWkCdsfTa2JI86PwqsiCbSEs1sDZiNLGVggvovplT', 1, NULL, 6, 1, 0, NULL, 'M', '2017-06-19 07:59:15', '2017-08-03 01:51:37', 'OOO Juristic service', 'адвокат', 5, 15000, 20000, 'по договоренности', 'Я буду сильной всем назло, хоть будет трудно улыбаться. Жизнь не закончилась еще, жизнь начинает продолжаться!'),
(8, 'temur@gmail.com', '$2y$10$fTdgy9He2defnVK0HUGSjOSSXK9n3MXhDA1nBkWK7UTw4MniFYTW6', '', '0', 0, '', '', 0000, '214TRsfoBLjU5fZFle2wOmLCZK6a2r9hM6EFpCkqoLjQP3OEELVDIzyzElLP', 1, NULL, 15, 1, 0, NULL, 'M', '2017-06-24 13:43:49', '2017-06-24 13:45:09', '', '', 0, 0, 0, NULL, NULL),
(9, 'erkin@gmail.com', '$2y$10$Tnwe932wEdR7YfdKRPn1s.Cr4fqTUGrGpBehI8WWWUSWf0cOAALPm', '', '0', 0, '', '', 0000, 'ipg8cMIFpp9tqjmLFfLX5y1lRloaqj17WfLjMvZh5Mnfr5HLuNmtXVA5kR3r', 1, NULL, 16, 1, 0, '2017-08-03 19:00:00', 'M', '2017-06-24 13:44:28', '2017-07-30 15:03:10', '', '', 0, 0, 0, NULL, NULL),
(10, 'shoxrux@gmail.com', '$2y$10$IqQ//XyEn1Qt/H3Ugs8cUOrM3irluvqrNpkbB2I0.Otj3W2hRAeDC', '', '0', 0, '', '', 0000, NULL, 1, NULL, 18, 1, 0, NULL, 'M', '2017-06-24 13:47:59', '2017-06-24 13:48:03', '', '', 0, 0, 0, NULL, NULL);

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
(47, 23, 7),
(48, 33, 7),
(49, 26, 7),
(50, 30, 7);

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
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `typeable_id` int(10) UNSIGNED NOT NULL,
  `typeable_type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `amount`, `typeable_id`, `typeable_type`, `created_at`, `updated_at`) VALUES
(3, 5, 8000, 41, 'yuridik\\Question', '2017-07-20 05:32:42', '2017-07-20 05:32:42'),
(4, 5, 10000, 42, 'yuridik\\Question', '2017-07-20 05:41:42', '2017-07-20 05:41:42'),
(6, 5, 80000, 45, 'yuridik\\Question', '2017-07-20 06:54:47', '2017-07-20 06:54:47'),
(8, 5, 90000, 1, 'yuridik\\Document', '2017-07-26 08:20:07', '2017-07-26 08:20:07'),
(9, 5, 300000, 2, 'yuridik\\Document', '2017-07-26 08:29:15', '2017-07-26 08:29:15'),
(10, 5, 30000, 1, 'yuridik\\Document', '2017-07-26 14:32:54', '2017-07-26 14:32:54'),
(11, 5, 1000, 46, 'yuridik\\Question', '2017-07-28 08:44:25', '2017-07-28 08:44:25');

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
  `type` tinyint(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `solved` tinyint(1) NOT NULL DEFAULT '0',
  `approved` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `title`, `text`, `client_id`, `category_id`, `type`, `price`, `solved`, `approved`, `created_at`, `updated_at`) VALUES
(34, 'dasdasdas dasd asd asd', 'asd asdas dsd asd asd a ds', 29, 23, 1, 0, 0, 1, '2017-06-28 12:36:54', '2017-06-28 12:36:54'),
(35, 'das dasd as dasd asd as', 'dasd asd asd asd sa dasd as da dsad asd', 29, 26, 1, 0, 0, 1, '2017-06-28 12:37:18', '2017-06-28 12:37:18'),
(37, 'sadasdas das', 'as dadasdas das da', 29, 24, 1, 0, 0, 1, '2017-06-29 11:34:06', '2017-06-29 11:34:06'),
(41, 'shox', 'as asdas das das dasd as dasd', 29, 26, 2, 800, 0, 1, '2017-07-03 07:02:05', '2017-07-03 07:02:05'),
(45, 'Where to get driver licences from ???', 'dsadadasda d\r\n adasd asd\r\n as\r\nd \r\nasd as\r\nd \r\nas \r\nadsd', 29, 26, 2, 80000, 0, 1, '2017-07-20 06:54:47', '2017-07-20 06:54:47'),
(46, 'sdakd jaksjd ksjadj ksj', 'kasnmdk asnkdn asknd kasndk nask dnaskn dkasndkasnkdnaskdn kndkandknkdnkadaskdnksndknaskdnksndknakdnaskn', 29, 27, 1, 1000, 0, 1, '2017-07-28 08:44:24', '2017-07-28 08:44:24');

-- --------------------------------------------------------

--
-- Структура таблицы `requests`
--

CREATE TABLE `requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_id` int(10) UNSIGNED NOT NULL,
  `lawyer_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `until_at` timestamp NULL DEFAULT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(6, 'MVD', '2017-06-13 06:45:31', '2017-06-13 06:45:31'),
(7, 'qonun', '2017-06-13 06:45:42', '2017-06-13 06:45:42'),
(8, 'Hahaha', '2017-07-15 01:33:04', '2017-07-15 01:33:04');

-- --------------------------------------------------------

--
-- Структура таблицы `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `paycom_transaction_id` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `paycom_time` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `paycom_time_datetime` datetime NOT NULL,
  `create_time` datetime NOT NULL,
  `perform_time` datetime DEFAULT NULL,
  `cancel_time` datetime DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `state` tinyint(2) NOT NULL,
  `reason` tinyint(2) DEFAULT NULL,
  `receivers` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'JSON array of receivers',
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `transactions`
--

INSERT INTO `transactions` (`id`, `paycom_transaction_id`, `paycom_time`, `paycom_time_datetime`, `create_time`, `perform_time`, `cancel_time`, `amount`, `state`, `reason`, `receivers`, `user_id`) VALUES
(137, '7e1614a3272a7639b86db6fb', '1500529807042', '2017-07-20 05:50:07', '2017-07-20 05:57:43', '2017-07-20 05:57:57', '2017-07-20 05:58:03', 111111, -1, 2, NULL, 19),
(138, '7e1614c2341d286f2b531c2e', '1500534172465', '2017-07-20 07:02:52', '2017-07-20 07:10:50', '2017-07-20 07:10:50', NULL, 400000, 2, NULL, NULL, 5),
(142, '7e1614f1225321fb124e5142', '1500545917800', '2017-07-20 10:18:37', '2017-07-20 10:26:26', '2017-07-20 10:26:27', NULL, 9000000, 2, NULL, NULL, 5),
(143, '7e1614f13352b19988c03231', '1500545993689', '2017-07-20 10:19:53', '2017-07-20 10:27:34', '2017-07-20 10:27:36', NULL, 400000, 2, NULL, NULL, 19),
(144, '7sd7asd7as7d7s77sd7sd', '1255535633', '2017-07-20 15:55:53', '2017-07-20 00:00:00', NULL, NULL, 1000000, -1, 2, NULL, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `dateOfBirth` date DEFAULT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `notification` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `description`, `dateOfBirth`, `city_id`, `notification`, `phone`) VALUES
(5, 'Shoxrux', 'Shomaxmudov', '', '1996-08-22', 1, NULL, NULL),
(6, 'Erkin', 'Botirov', NULL, '1996-09-19', 1, NULL, NULL),
(15, 'Tema', NULL, NULL, NULL, 3, NULL, NULL),
(16, 'Erkin', NULL, NULL, NULL, 5, NULL, NULL),
(17, 'Shox', NULL, NULL, NULL, 1, NULL, NULL),
(18, 'Shokhrukh', NULL, NULL, NULL, 1, NULL, NULL),
(19, 'Ulug\'bek', NULL, NULL, NULL, NULL, NULL, NULL);

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
-- Индексы таблицы `calls`
--
ALTER TABLE `calls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `category_id` (`category_id`);

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
-- Индексы таблицы `documents`
--
ALTER TABLE `documents`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `sub_type_id` (`sub_type_id`),
  ADD KEY `documents_ibfk_1` (`client_id`);

--
-- Индексы таблицы `document_type`
--
ALTER TABLE `document_type`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Индексы таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedbacks_ibfk_1` (`client_id`),
  ADD KEY `answer_id` (`answer_id`);

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
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- Индексы таблицы `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requests_ibfk_1` (`document_id`),
  ADD KEY `requests_ibfk_2` (`lawyer_id`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT для таблицы `blog_tag`
--
ALTER TABLE `blog_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT для таблицы `calls`
--
ALTER TABLE `calls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT для таблицы `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `document_type`
--
ALTER TABLE `document_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT для таблицы `lawyers`
--
ALTER TABLE `lawyers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `lawyer_category`
--
ALTER TABLE `lawyer_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT для таблицы `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`lawyer_id`) REFERENCES `lawyers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `blog_tag`
--
ALTER TABLE `blog_tag`
  ADD CONSTRAINT `post_tag_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Ограничения внешнего ключа таблицы `calls`
--
ALTER TABLE `calls`
  ADD CONSTRAINT `calls_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

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
-- Ограничения внешнего ключа таблицы `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `documents_ibfk_2` FOREIGN KEY (`sub_type_id`) REFERENCES `document_type` (`id`);

--
-- Ограничения внешнего ключа таблицы `document_type`
--
ALTER TABLE `document_type`
  ADD CONSTRAINT `document_type_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `document_type` (`id`);

--
-- Ограничения внешнего ключа таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

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
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Ограничения внешнего ключа таблицы `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`lawyer_id`) REFERENCES `lawyers` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
