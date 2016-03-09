-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 09 2016 г., 18:03
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
-- Структура таблицы `education`
--

CREATE TABLE IF NOT EXISTS `education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `information_id` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `name` char(120) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `description` varchar(300) NOT NULL,
  `block` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `education`
--

INSERT INTO `education` (`id`, `information_id`, `number`, `name`, `parent`, `description`, `block`) VALUES
(2, 1, 1, 'Табличная вёрстка', 1, 'Табличная вёрстка описание', 1),
(3, 1, 2, 'Блочная вёрстка', 1, 'Блочная вёрстка описание', 1),
(5, 2, 1, 'Алгоритмизация', 4, 'Алгоритмизация описание', 1),
(6, 2, 1, 'DOM', 4, 'DOM описание', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
