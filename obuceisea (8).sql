-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 01 2016 г., 10:12
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
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) unsigned DEFAULT NULL,
  `type_id` int(11) unsigned DEFAULT NULL,
  `name` char(80) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_category_category` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- СВЯЗИ ТАБЛИЦЫ `category`:
--   `category_id`
--       `category` -> `id`
--   `type_id`
--       `type` -> `id`
--

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `category_id`, `type_id`, `name`) VALUES
(1, NULL, 2, 'Программирование'),
(2, 1, NULL, 'Серверное программирование'),
(4, 1, NULL, 'Клиентское программирование'),
(5, 1, NULL, 'Desktop'),
(6, NULL, 4, 'Дизайн'),
(7, NULL, 3, 'Медицина'),
(8, 6, NULL, 'Веб-дизайн'),
(9, 6, NULL, 'Векторная графика'),
(10, 7, NULL, 'Фармацептика'),
(15, NULL, 3, 'Программирование'),
(16, 15, NULL, 'Desktop');

-- --------------------------------------------------------

--
-- Структура таблицы `dossier`
--

CREATE TABLE IF NOT EXISTS `dossier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(40) NOT NULL,
  `andername` char(40) NOT NULL,
  `surname` char(40) NOT NULL,
  `email` char(80) NOT NULL,
  `land` char(40) NOT NULL,
  `sity` char(40) NOT NULL,
  `phone` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Данные пользователя' AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `dossier`
--

INSERT INTO `dossier` (`id`, `name`, `andername`, `surname`, `email`, `land`, `sity`, `phone`, `user_id`) VALUES
(1, 'Василий', 'Васильевич', 'Василевский', 'vasea@mail.ru', 'Беларусь', 'Минск', 222, 2),
(2, 'Алла', 'Сергеевна', 'Сусик', 'alla@gmail.com', 'Беларусь', 'Минск', 0, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `education`
--

CREATE TABLE IF NOT EXISTS `education` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `education_id` int(11) unsigned DEFAULT NULL,
  `information_id` int(11) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `name` char(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_education_education` (`education_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- СВЯЗИ ТАБЛИЦЫ `education`:
--   `information_id`
--       `information` -> `id`
--   `education_id`
--       `education` -> `id`
--

--
-- Дамп данных таблицы `education`
--

INSERT INTO `education` (`id`, `education_id`, `information_id`, `description`, `name`) VALUES
(1, NULL, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ex vel velit suscipit gravida ut sit amet nunc. Vestibulum sit amet volutpat neque, vel eleifend nibh. Ut eget imperdiet libero. Praesent eget arcu vulputate, porttitor sem ut, consequat lacus. Ut fermentum non magna at finibus. Sed semper ex nisl, nec pharetra diam dictum nec. Nunc malesuada lectus velit, id mollis lectus dignissim eu. Phasellus eget lorem a est placerat efficitur. Mauris quam mauris, facilisis vitae vulputate laoreet, ultricies at augue. Etiam non ullamcorper magna, et rhoncus lacus. Donec ultricies urna erat, non vulputate augue faucibus id. Nulla mi libero, eleifend sit amet nisl vitae, fermentum mollis urna. Cras rutrum scelerisque nibh, eget fringilla dolor euismod at. Vivamus tristique tincidunt ex. Donec convallis, nisl sed commodo pretium, nunc lorem dictum diam, eget bibendum justo massa in felis. Pellentesque tempor lorem ut massa posuere, vel scelerisque nibh consequat.', NULL),
(2, 1, NULL, 'Nam a justo in purus luctus vehicula. Integer vehicula tortor eu ex ultricies molestie. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut pretium scelerisque augue, quis placerat magna feugiat vel.', 'Математика'),
(3, NULL, 2, '	\r\nMedia heading\r\nCras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.', NULL),
(4, 3, NULL, 'requirement, meet the requirements, job requirements, meet requirements, additional requirements, basic requirements, quality requirements, capital requirements, operational requirements, design requirements, information requirements', 'Табличная вёрстка'),
(5, 1, NULL, 'In this example, a product can have multiple tags and every tag in the list can be associated with other products as well. The latter was not possible in the one-to-many relation. \r\n\r\nLike the own-list the name of the shared-list has to match the type of beans it contains. In the database, these assocations will be stored using a link table called ''product_tag''.', 'Физика');

-- --------------------------------------------------------

--
-- Структура таблицы `information`
--

CREATE TABLE IF NOT EXISTS `information` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) unsigned NOT NULL,
  `activ` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- СВЯЗИ ТАБЛИЦЫ `information`:
--   `category_id`
--       `category` -> `id`
--

--
-- Дамп данных таблицы `information`
--

INSERT INTO `information` (`id`, `name`, `category_id`, `activ`) VALUES
(1, 'Вёрстка', 8, 1),
(2, 'JS для начинающих', 4, 1),
(3, 'Инженер', 2, 1),
(4, 'Дизайн', 6, 1),
(5, 'Безопастность', 9, 1),
(6, 'Серверное программирование', 2, 1),
(7, 'Как писать на PHP и не сойти с ума', 2, 1),
(8, 'Задачи 1С', 5, 1),
(9, 'Ангулар', 4, 1),
(10, 'Sed ultricies tortor', 8, 1),
(11, 'blandit suscipit sed vitae eros.', 2, 1),
(12, 'Mauris semper', 10, 1),
(13, 'Donec nec nibh nec', 10, 1),
(14, 'RedBean как средство для суицида', 2, 1),
(15, '1C для начинающих', 16, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `information_user`
--

CREATE TABLE IF NOT EXISTS `information_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `information_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `information_user`
--

INSERT INTO `information_user` (`id`, `user_id`, `information_id`) VALUES
(1, 3, 1),
(2, 3, 2),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `lesson`
--

CREATE TABLE IF NOT EXISTS `lesson` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `number` int(11) unsigned DEFAULT NULL,
  `education_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- СВЯЗИ ТАБЛИЦЫ `lesson`:
--   `education_id`
--       `education` -> `id`
--

--
-- Дамп данных таблицы `lesson`
--

INSERT INTO `lesson` (`id`, `name`, `text`, `number`, `education_id`) VALUES
(1, 'Вводная лекция', 'Tells the bean to only access the list but not load its contents. Use this if you only want to add something to a list and you have no interest in retrieving its contents from the database.Tells the bean to only access the list but not load its contents. Use this if you only want to add something to a list and you have no interest in retrieving its contents from the database.', 1, 2),
(2, 'Основы чего-то', 'Fusce luctus mattis dui. Nunc et tempor dolor. Donec tempor libero id arcu pretium, vitae sagittis metus eleifend. Nulla porta nibh dui. Duis eget dolor vel ante gravida tincidunt id sodales tellus. Proin augue dui, pretium vitae maximus in, luctus vitae massa. Integer erat purus, hendrerit in fermentum quis, condimentum quis augue. Sed quis varius nibh, a ultrices dui. Duis ac mi quam. Fusce tempor dapibus erat, a blandit dui bibendum vitae.', 2, 2);

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
(4, 2, 'Высшее образование', '?ctrl=wisdom&action=WisdomType&type=1&page=1', 0, 1),
(5, 2, 'Первое высшее образование', '?ctrl=wisdom&action=WisdomType&type=1&subtype=2&page=1', 4, 1),
(6, 2, 'Переподготовка', '?ctrl=wisdom&action=WisdomType&type=1&subtype=3&page=1', 4, 1),
(7, 2, 'Сокращённое обучение', '?ctrl=wisdom&action=WisdomType&type=1&subtype=4&page=1', 4, 1),
(8, 2, 'Курсы', '?ctrl=wisdom&action=WisdomType&type=5&page=1', 0, 1),
(9, 2, 'Сертифицированные', '?ctrl=wisdom&action=WisdomType&type=2&subtype=7&page=1', 8, 1),
(10, 2, 'Не сертифицированные', '?ctrl=wisdom&action=WisdomType&type=2&subtype=8&page=1', 8, 1),
(11, 2, 'Семинары', '?ctrl=wisdom&action=WisdomType&type=6&page=1', 0, 1),
(12, 2, 'Мастер-классы', '?ctrl=wisdom&action=WisdomType&type=3&subtype=9&page=1', 11, 1),
(13, 2, 'Доклады', '?ctrl=wisdom&action=WisdomType&type=3&subtype=10&page=1', 11, 1),
(14, 2, 'Библиотека', '#', 0, 1),
(15, 2, 'Статьи', '?ctrl=wisdom&action=WisdomType&type=3&subtype=11&page=1', 11, 1);

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
  `activ` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `news_header`, `news_body`, `news_date`, `news_img`, `user_id`, `activ`) VALUES
(1, 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного пр', 'Сегодня во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.', '2015-11-30 12:44:27', 'images/photoTest.png', 1, 1),
(2, 'Phasellus blandit nisl ac commodo aliquam.', 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.', '2015-11-30 14:40:27', 'images/IMG_20151228_120826.jpg', 1, 1),
(3, 'Praesent semper dui condimentum, auctor velit vitae, sagittis sapien.', 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.', '2015-11-30 14:44:56', 'images/20151228_120827.jpg', 1, 1),
(4, 'Sed in odio ac odio elementum ullamcorper et quis metus.', 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.', '2015-11-30 14:45:09', 'images/20151228_115024.jpg', 1, 1),
(5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.', '2015-11-30 14:45:40', 'images/12_100229_1_96372.jpg', 1, 1),
(6, 'Sed molestie quam id sapien consequat, pellentesque fringilla arcu commodo.', 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.', '2015-11-30 14:45:50', 'images/12_100229_1_96370.jpg', 1, 1);

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
-- Структура таблицы `requirements`
--

CREATE TABLE IF NOT EXISTS `requirements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `education_id` int(11) NOT NULL,
  `requirements` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Допуск к образованию по первому предмету' AUTO_INCREMENT=2 ;

--
-- СВЯЗИ ТАБЛИЦЫ `requirements`:
--   `education_id`
--       `education` -> `id`
--   `requirements`
--       `education` -> `id`
--

--
-- Дамп данных таблицы `requirements`
--

INSERT INTO `requirements` (`id`, `education_id`, `requirements`) VALUES
(1, 2, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) COLLATE utf8_unicode_ci NOT NULL,
  `type_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_type_type` (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- СВЯЗИ ТАБЛИЦЫ `type`:
--   `type_id`
--       `type` -> `id`
--

--
-- Дамп данных таблицы `type`
--

INSERT INTO `type` (`id`, `name`, `type_id`) VALUES
(1, 'Высшее образование', NULL),
(2, 'Первое высшее', 1),
(3, 'Переподготовка', 1),
(4, 'Сокращённое обучение', 1),
(5, 'Курсы', NULL),
(6, 'Семинары', NULL),
(7, 'Сертифицированные', 5),
(8, 'Не сертифицированные', 5),
(9, 'Мастер-классы', 6),
(10, 'Доклады', 6),
(11, 'Статьи', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` char(40) NOT NULL,
  `password` char(40) NOT NULL,
  `status` char(40) NOT NULL,
  `block` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `status`, `block`) VALUES
(1, 'admin', '123', 'admin', 0),
(2, 'vasea', '123', 'student', 0),
(3, 'alla', '123', 'teacher', 0);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `c_fk_education_education_id` FOREIGN KEY (`education_id`) REFERENCES `education` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Ограничения внешнего ключа таблицы `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `c_fk_type_type_id` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
