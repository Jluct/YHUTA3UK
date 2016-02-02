-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 02 2016 г., 09:38
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
  `courses_id` int(11) NOT NULL AUTO_INCREMENT,
  `wisdom_id` int(11) NOT NULL,
  PRIMARY KEY (`courses_id`)
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
  `education_id` int(11) NOT NULL AUTO_INCREMENT,
  `wisdom_id` int(11) NOT NULL,
  PRIMARY KEY (`education_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `education`
--

INSERT INTO `education` (`education_id`, `wisdom_id`) VALUES
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `menu_item`
--

INSERT INTO `menu_item` (`menu_item_id`, `menu_id`, `menu_item_name`, `menu_item_url`, `menu_item_parent`, `menu_item_activ`) VALUES
(1, 1, 'Главная', '?', 0, 1),
(2, 1, 'Новости', '?ctrl=news&action=News', 0, 1),
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
(14, 2, 'Библиотека', '#', 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `moderator`
--

CREATE TABLE IF NOT EXISTS `moderator` (
  `moderator_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`moderator_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `moderator_wisdom`
--

CREATE TABLE IF NOT EXISTS `moderator_wisdom` (
  `lectures_moderator_id` int(11) NOT NULL AUTO_INCREMENT,
  `moderator_id` int(11) NOT NULL,
  `wisdom_id` int(11) NOT NULL,
  PRIMARY KEY (`lectures_moderator_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_header` varchar(90) NOT NULL,
  `news_body` text NOT NULL,
  `news_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `news_img` varchar(80) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`news_id`, `news_header`, `news_body`, `news_date`, `news_img`, `user_id`) VALUES
(1, 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного пр', 'Сегодня во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.', '2015-11-30 12:44:27', 'photoTest.png', 1),
(2, 'Phasellus blandit nisl ac commodo aliquam.', 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.', '2015-11-30 14:40:27', 'images/IMG_20151228_120826.jpg', 1),
(3, 'Praesent semper dui condimentum, auctor velit vitae, sagittis sapien.', 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.', '2015-11-30 14:44:56', 'images/20151228_120827.jpg', 1),
(4, 'Sed in odio ac odio elementum ullamcorper et quis metus.', 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.', '2015-11-30 14:45:09', 'images/20151228_115024.jpg', 1),
(5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.', '2015-11-30 14:45:40', 'images/12_100229_1_96372.jpg', 1),
(6, 'Sed molestie quam id sapien consequat, pellentesque fringilla arcu commodo.', 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.', '2015-11-30 14:45:50', 'images/12_100229_1_96370.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` char(40) NOT NULL,
  `page_body` text NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`page_id`, `page_title`, `page_body`) VALUES
(1, 'О нас', '<h1>Мы молодцы</h1>'),
(2, 'Контакты', '<h1>Садовая 32Б,кв 50</h1>\r\n<h2>Спросить Коровьева<h2>'),
(3, 'Контакты', '<h1>Садовая 32Б,кв 50</h1>\r\n<h2>Спросить Коровьева<h2>');

-- --------------------------------------------------------

--
-- Структура таблицы `seminar`
--

CREATE TABLE IF NOT EXISTS `seminar` (
  `seminar_id` int(11) NOT NULL AUTO_INCREMENT,
  `wisdom_id` int(11) NOT NULL,
  PRIMARY KEY (`seminar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`student_id`),
  KEY `student_id` (`student_id`),
  KEY `student_id_2` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `student_wisdom`
--

CREATE TABLE IF NOT EXISTS `student_wisdom` (
  `student_lectures_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `wisdom_id` int(11) NOT NULL,
  PRIMARY KEY (`student_lectures_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `wisdom`
--

CREATE TABLE IF NOT EXISTS `wisdom` (
  `wisdom_id` int(11) NOT NULL AUTO_INCREMENT,
  `wisdom_name` char(80) NOT NULL,
  `wisdom_student_count` int(11) NOT NULL,
  `wisdom_type` char(40) NOT NULL,
  PRIMARY KEY (`wisdom_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Тип образования (Высшее,курс,лекция)' AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `wisdom`
--

INSERT INTO `wisdom` (`wisdom_id`, `wisdom_name`, `wisdom_student_count`, `wisdom_type`) VALUES
(1, 'Вёрстка и js', 1, 'education'),
(2, 'Серверное программирование', 5, 'education');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
