-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Фев 11 2026 г., 16:02
-- Версия сервера: 5.7.39
-- Версия PHP: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `web_1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment_name` varchar(30) NOT NULL,
  `comment_content` varchar(300) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `comment_name`, `comment_content`, `post_id`) VALUES
(1, 'Vitālijs', 'Šis ir testa komentārs Pirmajam postam', 1),
(2, 'Andrejs', 'Šis ir testa komentārs Pirmajam postam222', 1),
(3, 'Andrejs', 'Šis ir testa komentārs Pirmajam postam222', 2),
(4, 'Vitālijs', 'Šis ir testa komentārs Pirmajam postam', 2),
(5, 'aaaa', 'bbbbbb', 1),
(6, '44444', 'asdaasdfsadasfdafad', 2),
(7, '44444', 'asdaasdfsadasfdafad', 2),
(8, 'aaaa', 'asdasd', 2),
(9, 'Andris', 'Te kaut kas ir', 1),
(10, 'J;anis', 'Vel viens komentārs', 1),
(11, 'Jānis', 'Komentārs', 2),
(12, 'andris', 'Tas pats, kas komentārs', 1),
(13, 'aaaa', 'hjlk hlkjh lkjh', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `menu_url` varchar(50) NOT NULL,
  `page_id` int(11) NOT NULL,
  `menu_icon` varchar(50) NOT NULL,
  `menu_enabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `menu_name`, `menu_url`, `page_id`, `menu_icon`, `menu_enabled`) VALUES
(1, 'Galvenā', 'main.php', 4, '<i class=\"bi bi-person-circle\"></i>', 1),
(2, 'Par mums', 'about.php', 1, '<i class=\"bi bi-person-vcard\"></i>', 1),
(3, 'Pakalpojumi', 'services.php', 3, '<i class=\"bi bi-person-circle\"></i>', 1),
(4, 'Kontakti', 'contacts.php', 2, '<i class=\"bi bi-person-circle\"></i>', 1),
(5, 'Personīgais kabinets', 'user.php', 1, '<i class=\"bi bi-person-fill-gear\"></i>', 0),
(6, 'Jaunumi', 'posts.php', 5, '<i class=\"bi bi-person-circle\"></i>', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `page_name` varchar(50) NOT NULL,
  `page_content` text NOT NULL,
  `page_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `page_content`, `page_date`, `user_id`) VALUES
(1, 'Par mums', '<p>te ir lapa par mums</p>', '2026-01-28 17:09:26', 1),
(2, 'Kontakti', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2176.667608327203!2d24.15889071228424!3d56.93736247343523!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46eecf2881ab3a2d%3A0x38f05fb5534b5b16!2zRWlyb3BhcyBUxIFsbcSBY8SrYmFzIGNlbnRycw!5e0!3m2!1slv!2slv!4v1769620091117!5m2!1slv!2slv\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2026-01-28 17:09:26', 1),
(3, 'Pakalpojumi', '\n<p>Te nāks mani pakalpojumi</p>', '2026-01-28 17:24:39', 1),
(4, 'Galvenā', '<h5>Te nāks galvenās lapas saturs</h5>', '2026-01-28 17:26:58', 1),
(5, 'Jaunumi', '', '2026-01-28 17:26:58', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `post_name` varchar(50) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `post_name`, `post_content`, `post_date`) VALUES
(1, 'Mācamies PHP', '<p>\r\nšodien mēs apgūstam PHP valodu\r\n</p>\r\n', '2026-02-04 16:31:38'),
(2, 'HTML un CSS', '<p>\r\nŠis tika apgūts mēnesi atpakaļ\r\n</p>', '2026-02-04 16:31:38');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_id` (`page_id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
