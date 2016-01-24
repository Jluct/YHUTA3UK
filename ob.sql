-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 21 2016 г., 22:05
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
-- Структура таблицы `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_type` int(11) NOT NULL DEFAULT '1',
  `menu_title` char(40) NOT NULL,
  `menu_url` varchar(80) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_type`, `menu_title`, `menu_url`) VALUES
(1, 1, 'Главная', '?index'),
(2, 1, 'О нас', '?ctrl=page&action=Page&id=1'),
(3, 2, 'Высшее образование', '?ctrl=educations&action=AllEducations'),
(4, 2, 'Новости', '?ctrl=news&action=News'),
(5, 1, 'Контакты', '?ctrl=page&action=Page&id=2');

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
-- Структура таблицы `moderator_teaching`
--

CREATE TABLE IF NOT EXISTS `moderator_teaching` (
  `moderator_teaching_id` int(11) NOT NULL,
  `moderator_id` int(11) NOT NULL,
  `teaching_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `sub_menu`
--

INSERT INTO `sub_menu` (`sub_menu_id`, `menu_id`, `sub_menu_title`, `sub_menu_url`) VALUES
(1, 3, 'Переподготовка', '?ctrl=educations&action=Educations&id='),
(2, 3, 'Повышение квалификации', '?ctrl=educations&action=Educations&id='),
(3, 2, 'Учителя', 'qwerty'),
(4, 3, 'Первое высшее', '?ctrl=educations&action=Educations&id=');

-- --------------------------------------------------------

--
-- Структура таблицы `teaching`
--

CREATE TABLE IF NOT EXISTS `teaching` (
  `teaching_id` int(11) NOT NULL,
  `teaching_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
