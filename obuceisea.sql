-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 28 2016 г., 14:56
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
  `menu_type` int(11) NOT NULL DEFAULT '1',
  `menu_title` char(40) NOT NULL,
  `menu_url` varchar(80) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_type`, `menu_title`, `menu_url`) VALUES
(1, 2, 'Главная', '?index'),
(2, 2, 'О нас', '?ctrl=page&action=Page&id=1'),
(3, 2, 'Новости', '?ctrl=news&action=News'),
(4, 1, 'Высшее образование', '?ctrl=wisdom&action=WisdomType&type=education'),
(5, 2, 'Контакты', '?ctrl=page&action=Page&id=2'),
(6, 1, 'Курсы', '?ctrl=wisdom&action=WisdomType&type=course'),
(7, 1, 'Семминары', '?ctrl=wisdom&action=WisdomType&type=seminar'),
(8, 1, 'Школьникам', '?????');

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
-- Структура таблицы `sub_menu`
--

CREATE TABLE IF NOT EXISTS `sub_menu` (
  `sub_menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `sub_menu_title` char(40) NOT NULL,
  `sub_menu_url` varchar(80) NOT NULL,
  PRIMARY KEY (`sub_menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `sub_menu`
--

INSERT INTO `sub_menu` (`sub_menu_id`, `menu_id`, `sub_menu_title`, `sub_menu_url`) VALUES
(5, 4, 'Первое высшее образование', 'ctrl=wisdoms&action=WisdomType&type=education&id=1'),
(6, 4, 'Переподготовка', '#'),
(7, 4, 'Повышение квалификации', '#'),
(8, 6, 'Сертифицированные', '#'),
(9, 6, 'Не сертифицированные', '#'),
(10, 7, 'Мастер-класс', '#'),
(11, 7, 'Доклад', '#');

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
  `wisdom_subcategory_id` int(11) NOT NULL,
  `wisdom_subtype_id` int(11) NOT NULL,
  `wisdom_name` char(80) NOT NULL,
  `wisdom_student_count` int(11) NOT NULL,
  PRIMARY KEY (`wisdom_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Тип образования (Высшее,курс,лекция)' AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `wisdom`
--

INSERT INTO `wisdom` (`wisdom_id`, `wisdom_subcategory_id`, `wisdom_subtype_id`, `wisdom_name`, `wisdom_student_count`) VALUES
(1, 1, 0, 'Основы PHP', 1),
(2, 2, 0, 'Основы С#', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `wisdom_category`
--

CREATE TABLE IF NOT EXISTS `wisdom_category` (
  `wisdom_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `wisdom_category_name` char(80) NOT NULL,
  PRIMARY KEY (`wisdom_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `wisdom_category`
--

INSERT INTO `wisdom_category` (`wisdom_category_id`, `wisdom_category_name`) VALUES
(1, 'Программирование'),
(2, 'Дизайн'),
(3, 'Кройка и шитьё');

-- --------------------------------------------------------

--
-- Структура таблицы `wisdom_subcategory`
--

CREATE TABLE IF NOT EXISTS `wisdom_subcategory` (
  `wisdom_subcategory_id` int(11) NOT NULL AUTO_INCREMENT,
  `wisdom_subcategory_name` char(80) NOT NULL,
  `wisdom_category_id` int(11) NOT NULL,
  PRIMARY KEY (`wisdom_subcategory_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `wisdom_subcategory`
--

INSERT INTO `wisdom_subcategory` (`wisdom_subcategory_id`, `wisdom_subcategory_name`, `wisdom_category_id`) VALUES
(1, 'PHP', 1),
(2, 'C#', 1),
(3, 'Web-дизайн', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `wisdom_subtype`
--

CREATE TABLE IF NOT EXISTS `wisdom_subtype` (
  `wisdom_subtype_id` int(11) NOT NULL AUTO_INCREMENT,
  `wisdom_subtype_name` char(80) NOT NULL,
  `wisdom_type_id` int(11) NOT NULL,
  PRIMARY KEY (`wisdom_subtype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `wisdom_type`
--

CREATE TABLE IF NOT EXISTS `wisdom_type` (
  `wisdom_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `wisdom_type_name` char(80) NOT NULL,
  PRIMARY KEY (`wisdom_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
