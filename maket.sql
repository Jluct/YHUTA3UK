-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 20 2016 г., 22:02
-- Версия сервера: 5.1.67-community-log
-- Версия PHP: 5.4.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `maket`
--

-- --------------------------------------------------------

--
-- Структура таблицы `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `courses_id` int(11) NOT NULL AUTO_INCREMENT,
  `courses_name` char(80) NOT NULL,
  `courses_status` int(11) NOT NULL,
  `courses_text` text NOT NULL,
  PRIMARY KEY (`courses_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `educations`
--

CREATE TABLE IF NOT EXISTS `educations` (
  `educations_id` int(11) NOT NULL AUTO_INCREMENT,
  `educations_name` varchar(120) NOT NULL,
  `educations_text` text NOT NULL,
  `educations_status` int(11) NOT NULL,
  PRIMARY KEY (`educations_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `educations`
--

INSERT INTO `educations` (`educations_id`, `educations_name`, `educations_text`, `educations_status`) VALUES
(1, 'Переподготовка', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0),
(2, 'Повышение квалификации', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)', 0),
(3, 'Первое высшее', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(50) NOT NULL,
  `image_signature` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`image_id`, `image_name`, `image_signature`) VALUES
(1, 'PhotoTest.png', NULL),
(2, 'imgTest.png', NULL),
(3, 'imageTest.png', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `lectures`
--

CREATE TABLE IF NOT EXISTS `lectures` (
  `lectures_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) NOT NULL,
  `lectures_number` int(11) NOT NULL,
  `lectures_name` varchar(120) NOT NULL,
  `lectures_material` text NOT NULL,
  PRIMARY KEY (`lectures_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- СВЯЗИ ТАБЛИЦЫ `lectures`:
--   `school_id`
--       `school` -> `school_id`
--

--
-- Дамп данных таблицы `lectures`
--

INSERT INTO `lectures` (`lectures_id`, `school_id`, `lectures_number`, `lectures_name`, `lectures_material`) VALUES
(1, 1, 1, 'Лекция 1', '<h1>Лекция 1</h1>'),
(2, 1, 2, 'Лекция 2', 'Лекция 2'),
(3, 2, 1, 'Лекция 1', 'Лекция 1');

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
(2, 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного пр', 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.', '2015-11-30 14:40:27', 'photoTest.png', 1),
(3, 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного пр', 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.', '2015-11-30 14:44:56', 'imgTest.png', 1),
(4, 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного пр', 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.', '2015-11-30 14:45:09', '', 1),
(5, 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного пр', 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.', '2015-11-30 14:45:40', 'photoTest.png', 1),
(6, 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного пр', 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.', '2015-11-30 14:45:50', 'photoTest.png', 1);

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
-- Структура таблицы `school`
--

CREATE TABLE IF NOT EXISTS `school` (
  `school_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(80) NOT NULL,
  PRIMARY KEY (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `school`
--

INSERT INTO `school` (`school_id`, `school_name`) VALUES
(1, 'Основы HTML'),
(2, 'Анимационная графика'),
(3, 'Серверное программирование'),
(4, 'Безопасность веб-приложений');

-- --------------------------------------------------------

--
-- Структура таблицы `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_image_number` int(11) DEFAULT NULL,
  `image_id` int(11) NOT NULL,
  `slider_begin` date DEFAULT NULL,
  `slider_end` date DEFAULT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_image_number`, `image_id`, `slider_begin`, `slider_end`) VALUES
(1, NULL, 1, NULL, NULL),
(2, NULL, 1, NULL, NULL),
(3, NULL, 1, NULL, NULL),
(4, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `specialty`
--

CREATE TABLE IF NOT EXISTS `specialty` (
  `specialty_id` int(11) NOT NULL AUTO_INCREMENT,
  `educations_id` int(11) NOT NULL,
  `specialty_name` varchar(120) NOT NULL,
  `specialty_text` text NOT NULL,
  PRIMARY KEY (`specialty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- СВЯЗИ ТАБЛИЦЫ `specialty`:
--   `educations_id`
--       `educations` -> `educations_id`
--

--
-- Дамп данных таблицы `specialty`
--

INSERT INTO `specialty` (`specialty_id`, `educations_id`, `specialty_name`, `specialty_text`) VALUES
(1, 1, 'Веб-дизайн и компьютерная графика', 'Повседневная практика показывает, что дальнейшее развитие различных форм деятельности позволяет оценить значение системы обучения кадров, соответствует насущным потребностям. Таким образом реализация намеченных плановых заданий в значительной степени обуславливает создание существенных финансовых и административных условий.\nТоварищи! начало повседневной работы по формированию позиции требуют определения и уточнения систем массового участия. Задача организации, в особенности же укрепление и развитие структуры в значительной степени обуславливает создание существенных финансовых и административных условий.'),
(2, 2, 'Программное обеспечение информационных систем', 'Задача организации, в особенности же дальнейшее развитие различных форм деятельности позволяет оценить значение систем массового участия. Таким образом сложившаяся структура организации требуют определения и уточнения новых предложений. С другой стороны укрепление и развитие структуры играет важную роль в формировании соответствующий условий активизации.'),
(3, 1, 'Компьютерная графика', 'Идейные соображения высшего порядка, а также рамки и место обучения кадров влечет за собой процесс внедрения и модернизации форм развития. Товарищи! начало повседневной работы по формированию позиции позволяет выполнять важные задания по разработке модели развития. Повседневная практика показывает, что консультация с широким активом влечет за собой процесс внедрения и модернизации форм развития.');

-- --------------------------------------------------------

--
-- Структура таблицы `specialty_school`
--

CREATE TABLE IF NOT EXISTS `specialty_school` (
  `specialty_school` int(11) NOT NULL AUTO_INCREMENT,
  `specialty_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  PRIMARY KEY (`specialty_school`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- СВЯЗИ ТАБЛИЦЫ `specialty_school`:
--   `school_id`
--       `school` -> `school_id`
--   `specialty_id`
--       `specialty` -> `specialty_id`
--

--
-- Дамп данных таблицы `specialty_school`
--

INSERT INTO `specialty_school` (`specialty_school`, `specialty_id`, `school_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 2, 4),
(5, 1, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `educations_id` int(11) NOT NULL,
  `specialty_id` int(11) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- СВЯЗИ ТАБЛИЦЫ `student`:
--   `educations_id`
--       `educations` -> `educations_id`
--   `specialty_id`
--       `specialty` -> `specialty_id`
--   `user_id`
--       `user` -> `user_id`
--

--
-- Дамп данных таблицы `student`
--

INSERT INTO `student` (`student_id`, `user_id`, `educations_id`, `specialty_id`) VALUES
(1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `student_school`
--

CREATE TABLE IF NOT EXISTS `student_school` (
  `student_lectures_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `scool_id` int(11) NOT NULL,
  `lectures_id` int(11) NOT NULL,
  `student_lectures_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`student_lectures_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- СВЯЗИ ТАБЛИЦЫ `student_school`:
--   `lectures_id`
--       `lectures` -> `lectures_id`
--   `scool_id`
--       `school` -> `school_id`
--   `student_id`
--       `student` -> `student_id`
--

--
-- Дамп данных таблицы `student_school`
--

INSERT INTO `student_school` (`student_lectures_id`, `student_id`, `scool_id`, `lectures_id`, `student_lectures_status`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 1, 2, 0);

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
-- СВЯЗИ ТАБЛИЦЫ `sub_menu`:
--   `menu_id`
--       `menu` -> `menu_id`
--

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
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_login` char(40) NOT NULL,
  `user_password` char(40) NOT NULL,
  `user_status` char(40) NOT NULL DEFAULT 'student',
  `user_block` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`user_id`, `user_login`, `user_password`, `user_status`, `user_block`) VALUES
(1, 'admin', '123456', 'admin', 0),
(2, 'vasea', '123456', 'student', 0),
(3, 'petea', '123456', 'lector', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user_data`
--

CREATE TABLE IF NOT EXISTS `user_data` (
  `user_data_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_data_name` char(40) NOT NULL,
  `user_data_surname` char(40) NOT NULL,
  `user_data_email` varchar(60) NOT NULL,
  `user_data_secret_w` char(40) NOT NULL,
  `user_data_secret_a` char(40) NOT NULL,
  `user_data_cantry` char(40) NOT NULL,
  `user_data_sity` char(40) NOT NULL,
  PRIMARY KEY (`user_data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- СВЯЗИ ТАБЛИЦЫ `user_data`:
--   `user_id`
--       `user` -> `user_id`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
