-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 12 2016 г., 17:06
-- Версия сервера: 5.1.67-community-log
-- Версия PHP: 5.4.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `obuceisea`
--

-- --------------------------------------------------------

--
-- Структура таблицы `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wisdom_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `discipline`
--

CREATE TABLE IF NOT EXISTS `discipline` (
  `discipline_id` int(11) NOT NULL AUTO_INCREMENT,
  `education_id` int(11) NOT NULL,
  PRIMARY KEY (`discipline_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `education`
--

CREATE TABLE IF NOT EXISTS `education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wisdom_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `education`
--

INSERT INTO `education` (`id`, `wisdom_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `lectures`
--

CREATE TABLE IF NOT EXISTS `lectures` (
  `lectures_id` int(11) NOT NULL AUTO_INCREMENT,
  `discipline_id` int(11) NOT NULL,
  PRIMARY KEY (`lectures_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `lesson`
--

CREATE TABLE IF NOT EXISTS `lesson` (
  `lesson_id` int(11) NOT NULL AUTO_INCREMENT,
  `courses_id` int(11) NOT NULL,
  PRIMARY KEY (`lesson_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` char(40) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`) VALUES
(1, 'Верхнее меню'),
(2, 'Главное меню'),
(3, 'Меню студента'),
(4, 'Меню модератора'),
(5, 'Меню категорий');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_item`
--

CREATE TABLE IF NOT EXISTS `menu_item` (
  `menu_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `menu_item_name` char(80) NOT NULL,
  `menu_item_url` char(80) NOT NULL,
  `menu_item_parent` int(11) NOT NULL DEFAULT '0',
  `menu_item_activ` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`menu_item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `menu_item`
--

INSERT INTO `menu_item` (`menu_item_id`, `menu_id`, `menu_item_name`, `menu_item_url`, `menu_item_parent`, `menu_item_activ`) VALUES
(1, 1, 'Главная', '?', 0, 1),
(2, 1, 'Новости', '?ctrl=news&action=News&page=1', 0, 1),
(3, 1, 'О нас', '?ctrl=page&action=Page&id=1', 0, 1),
(4, 2, 'Высшее образование', '?ctrl=wisdom&action=WisdomType&type=1', 0, 1),
(5, 2, 'Первое высшее образование', '?ctrl=wisdom&action=WisdomType&type=1&subtype=1', 4, 1),
(6, 2, 'Переподготовка', '?ctrl=wisdom&action=WisdomType&type=1&subtype=2', 4, 1),
(7, 2, 'Сокращённое обучение', '?ctrl=wisdom&action=WisdomType&type=1&subtype=3', 4, 1),
(8, 2, 'Курсы', '?ctrl=wisdom&action=WisdomType&type=2', 0, 1),
(9, 2, 'Сертифицированные', '?ctrl=wisdom&action=WisdomType&type=2&subtype=1', 8, 1),
(10, 2, 'Не сертифицированные', '?ctrl=wisdom&action=WisdomType&type=2&subtype=2', 8, 1),
(11, 2, 'Семинары', '?ctrl=wisdom&action=WisdomType&type=3', 0, 1),
(12, 2, 'Мастер-классы', '?ctrl=wisdom&action=WisdomType&type=3&subtype=1', 11, 1),
(13, 2, 'Доклады', '?ctrl=wisdom&action=WisdomType&type=3&subtype=2', 11, 1),
(14, 2, 'Библиотека', '#', 0, 1),
(15, 2, 'Статьи', '?ctrl=wisdom&action=WisdomType&type=3&subtype=3', 11, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_header` varchar(90) NOT NULL,
  `news_body` text NOT NULL,
  `news_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `news_img` varchar(80) NOT NULL,
  `user_id` int(11) NOT NULL,
  `news_activ` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `news_header`, `news_body`, `news_date`, `news_img`, `user_id`, `news_activ`) VALUES
(1, 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного пр', 'Сегодня во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.', '2015-11-30 12:44:27', 'images/photoTest.png', 1, 1),
(2, 'Phasellus blandit nisl ac commodo aliquam.', 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.', '2015-11-30 14:40:27', 'images/IMG_20151228_120826.jpg', 1, 2),
(3, 'Praesent semper dui condimentum, auctor velit vitae, sagittis sapien.', 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.', '2015-11-30 14:44:56', 'images/20151228_120827.jpg', 1, 3),
(4, 'Sed in odio ac odio elementum ullamcorper et quis metus.', 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.', '2015-11-30 14:45:09', 'images/20151228_115024.jpg', 1, 4),
(5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.', '2015-11-30 14:45:40', 'images/12_100229_1_96372.jpg', 1, 5),
(6, 'Sed molestie quam id sapien consequat, pellentesque fringilla arcu commodo.', 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.', '2015-11-30 14:45:50', 'images/12_100229_1_96370.jpg', 1, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(40) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`id`, `title`, `body`) VALUES
(1, 'О нас', '<h1>Мы молодцы</h1>'),
(2, 'Контакты', '<h1>Садовая 32Б,кв 50</h1>\r\n<h2>Спросить Коровьева<h2>');

-- --------------------------------------------------------

--
-- Структура таблицы `seminar`
--

CREATE TABLE IF NOT EXISTS `seminar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wisdom_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_login` char(40) NOT NULL,
  `user_password` char(40) NOT NULL,
  `user_status` char(40) NOT NULL,
  `user_block` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `user_login`, `user_password`, `user_status`, `user_block`) VALUES
(1, 'admin', '123', 'admin', 0),
(2, 'vasea', '123', 'student', 0),
(3, 'alla', '123', 'teacher', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user_data`
--

CREATE TABLE IF NOT EXISTS `user_data` (
  `user_data_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_data_name` char(40) NOT NULL,
  `user_data_andername` char(40) NOT NULL,
  `user_data_surname` char(40) NOT NULL,
  `user_data_email` char(80) NOT NULL,
  `user_data_land` char(40) NOT NULL,
  `user_data_sity` char(40) NOT NULL,
  `user_data_phone` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`user_data_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `user_data`
--

INSERT INTO `user_data` (`user_data_id`, `user_data_name`, `user_data_andername`, `user_data_surname`, `user_data_email`, `user_data_land`, `user_data_sity`, `user_data_phone`, `user_id`) VALUES
(1, 'Василий', 'Васильевич', 'Василевский', 'vasea@mail.ru', 'Беларусь', 'Минск', 222, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user_wisdom`
--

CREATE TABLE IF NOT EXISTS `user_wisdom` (
  `user_wisdom_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `wisdom_id` int(11) NOT NULL,
  PRIMARY KEY (`user_wisdom_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `wisdom`
--

CREATE TABLE IF NOT EXISTS `wisdom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wisdom_name` char(80) NOT NULL,
  `wisdom_student_count` int(11) NOT NULL,
  `wisdom_subtype_id` int(11) NOT NULL,
  `wisdom_category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Тип образования (Высшее,курс,лекция)' AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `wisdom`
--

INSERT INTO `wisdom` (`id`, `wisdom_name`, `wisdom_student_count`, `wisdom_subtype_id`, `wisdom_category_id`) VALUES
(1, 'Вёрстка и js', 1, 1, 0),
(2, 'Серверное программирование', 5, 2, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `wisdom_category`
--

CREATE TABLE IF NOT EXISTS `wisdom_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wisdom_category_name` char(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `wisdom_category`
--

INSERT INTO `wisdom_category` (`id`, `wisdom_category_name`) VALUES
(1, 'Программирование'),
(2, 'Дизайн');

-- --------------------------------------------------------

--
-- Структура таблицы `wisdom_subtype`
--

CREATE TABLE IF NOT EXISTS `wisdom_subtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wisdom_type_id` int(11) NOT NULL,
  `wisdom_subtype_name` char(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `wisdom_subtype`
--

INSERT INTO `wisdom_subtype` (`id`, `wisdom_type_id`, `wisdom_subtype_name`) VALUES
(1, 1, 'Первое высшее образование'),
(2, 1, 'Переподготовка'),
(3, 1, 'Сокращённое обучение'),
(4, 2, 'Сертифицированные'),
(5, 2, 'Не сертифицированные'),
(6, 3, 'Мастер-классы'),
(7, 3, 'Доклады'),
(8, 3, 'Статьи');

-- --------------------------------------------------------

--
-- Структура таблицы `wisdom_type`
--

CREATE TABLE IF NOT EXISTS `wisdom_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wisdom_type_name` char(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `wisdom_type`
--

INSERT INTO `wisdom_type` (`id`, `wisdom_type_name`) VALUES
(1, 'Высшее образование'),
(2, 'Курсы'),
(3, 'Семинары');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
