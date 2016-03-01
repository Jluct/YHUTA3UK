-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 01 2016 г., 20:00
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `information_id` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `lection` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `information`
--

CREATE TABLE IF NOT EXISTS `information` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `activ` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `information`
--

INSERT INTO `information` (`id`, `name`, `category_id`, `description`, `activ`) VALUES
(1, 'Вёрстка', 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur laoreet elit tellus, non tincidunt nulla ornare quis. Pellentesque volutpat aliquet dui quis lacinia. Morbi facilisis mauris ipsum, vitae blandit erat maximus eu. Maecenas tempor egestas volutpat. Sed pellentesque vitae arcu ut tincidunt. Pellentesque fringilla mi vel nibh tincidunt cursus. Cras congue ante eget porta condimentum. Sed dapibus neque sit amet orci pharetra, dignissim volutpat neque consequat. Sed sed mollis tortor. Maecenas finibus a sem a convallis. Fusce placerat ex at mi rhoncus ultrices. Suspendisse tristique augue sed urna sagittis, vehicula pulvinar purus eleifend. In et ultrices mauris. Donec porttitor massa vitae ipsum gravida sagittis. Nunc aliquam, sem eget luctus sollicitudin, tortor ante gravida metus, pharetra malesuada augue ipsum at nibh. Phasellus leo enim, sodales non fringilla ac, vehicula id turpis.', 1),
(2, 'JS для начинающих', 4, 'Vivamus vestibulum auctor velit, quis interdum lectus tempor et. Ut diam nibh, faucibus vitae pellentesque vitae, vulputate quis justo. Phasellus lobortis gravida nunc eu gravida. Fusce maximus est nec nibh aliquam, eu elementum arcu convallis. Pellentesque congue orci ut mollis congue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum sed justo a nibh vestibulum accumsan.', 1),
(3, 'Инженер', 2, 'Sed aliquam eu mauris ac egestas. Quisque nisi velit, pretium quis venenatis lobortis, eleifend vitae urna. Praesent vehicula, nunc a hendrerit rhoncus, tellus sapien dignissim arcu, dignissim consectetur ante lorem quis quam. Morbi nec arcu iaculis, lacinia nisi ac, congue sapien. Ut sit amet fermentum nisl. Suspendisse a enim varius nulla faucibus ultrices vitae vel quam. Pellentesque gravida erat at congue fringilla.', 1),
(4, 'Дизайн', 6, 'Integer condimentum euismod magna, a euismod nunc suscipit a. Duis tincidunt eleifend massa scelerisque sagittis. Quisque congue eget erat eget mattis. Cras varius pharetra ex at sollicitudin. In porttitor hendrerit metus, vitae varius metus blandit quis. Etiam pretium, erat eu pretium aliquam, risus dolor convallis libero, sed rutrum enim risus euismod velit. Praesent eu leo in diam tempus porta. Cras pellentesque sapien eu venenatis maximus. Cras euismod fermentum urna at ultrices. Aenean blandit, quam a lacinia vehicula, massa nulla semper orci, vitae tempus lorem ipsum in ligula. Aliquam commodo neque vel felis lobortis malesuada. Sed auctor lectus leo, id vehicula tellus blandit ac. Sed cursus est neque, quis rutrum lectus pharetra quis.', 1),
(5, 'Безопастность', 9, 'Mauris pretium dapibus imperdiet. Ut a quam lobortis, vehicula dui eu, condimentum felis. Vivamus at quam ut ligula semper malesuada eu nec libero. Praesent pulvinar, libero non interdum tincidunt, augue libero lobortis enim, vel rutrum nisl nisi eget purus. Donec id est in arcu ornare rutrum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam lacinia sed nulla rutrum ullamcorper. Sed eleifend quam ex, et dictum tellus placerat et. Nulla dignissim a magna quis ultrices. Cras dictum pellentesque massa eu maximus. Duis pretium tortor eget nunc finibus tempus.', 1),
(6, 'Серверное программирование', 2, 'Aliquam erat volutpat. Phasellus id orci a risus tristique aliquam. Etiam sagittis tempor luctus. Nam mi nunc, imperdiet ac consequat vel, ultrices eu mi. In vitae est a justo pharetra venenatis. In justo mauris, rhoncus eu enim euismod, pretium eleifend turpis. Nullam luctus augue ac congue ultrices. Nullam et condimentum mauris. Vivamus eu leo sed ligula vulputate maximus. In sit amet tristique magna. Phasellus finibus ullamcorper nisl vel dapibus. Maecenas sagittis massa in euismod varius. Vestibulum elementum turpis quis arcu commodo, sit amet bibendum nulla egestas. Integer feugiat libero quis urna porta mattis.', 1),
(7, 'Как писать на PHP и не сойти с ума', 2, 'Morbi vehicula lobortis odio. Vivamus porta risus id porttitor vestibulum. Aliquam id lectus nulla. Donec semper mi enim, porttitor pellentesque dui porttitor ut. Aenean ut enim fringilla, ullamcorper lectus id, convallis mauris. Proin sit amet egestas justo. Mauris dapibus tellus at pulvinar porta. Phasellus a lacus at augue auctor iaculis. Morbi congue fermentum dolor, et accumsan magna rhoncus vel. Sed vitae elit lorem. Proin gravida arcu eu odio pulvinar, nec vehicula mauris condimentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam molestie, elit eget imperdiet sagittis, risus nunc malesuada mi, nec porta orci lectus id dui. Vestibulum vitae rutrum magna.', 1),
(8, 'Задачи 1С', 5, 'Pellentesque vehicula lectus at leo mollis eleifend. Nunc efficitur ornare tellus, a auctor urna lobortis in. In feugiat, justo et fermentum efficitur, arcu nibh venenatis metus, at mollis justo lectus ac tellus. Vestibulum auctor in arcu ultricies condimentum. Aliquam erat volutpat. Aliquam erat volutpat. Maecenas condimentum varius purus a feugiat. Praesent tristique sem non molestie maximus. Nunc quis metus ex. Proin tristique ex sit amet magna feugiat, eget tempus nisi eleifend. Fusce at sollicitudin erat. Duis euismod in velit et cursus. Donec tempor rhoncus ipsum, vel efficitur urna placerat eu. Ut turpis elit, ultricies aliquam tellus eu, fermentum imperdiet magna. Nulla molestie tellus et nunc dictum tempor. Donec tempor elementum arcu sit amet fringilla.', 1),
(9, 'Ангулар', 4, 'Etiam convallis velit et metus sodales dictum. Quisque tristique efficitur eleifend. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque suscipit non augue vel pulvinar. Phasellus hendrerit sapien et gravida pretium. Nunc sit amet lectus semper, vulputate magna ut, ultricies velit. Curabitur non sagittis quam. Donec placerat quam non odio feugiat tincidunt. Suspendisse fringilla posuere risus, ut gravida enim efficitur aliquet. Nam laoreet, turpis varius rhoncus mollis, tortor lectus vulputate leo, eget ultrices metus sem a lorem. Duis mi ante, maximus at maximus sed, tristique nec nulla. Praesent blandit ex a accumsan efficitur.', 1),
(10, 'Sed ultricies tortor', 8, 'In dolor risus, posuere at ipsum et, bibendum consequat neque. Aenean dolor lectus, placerat a sapien blandit, sollicitudin lobortis ex. Duis tempus justo augue, eget mattis sapien vestibulum in. Curabitur a ante sit amet dolor aliquet egestas. Fusce volutpat vel leo at convallis. Aliquam erat volutpat. Donec ut malesuada nibh. Donec sit amet egestas urna. Maecenas eget ultricies mauris. Praesent blandit tincidunt urna, a scelerisque ex aliquam et. Praesent at sapien sit amet arcu condimentum rutrum. Phasellus quis diam ut nunc condimentum lacinia et quis libero. Nam eleifend libero lacus.', 1),
(11, 'blandit suscipit sed vitae eros.', 2, 'Sed sed sapien eget ante venenatis viverra vel at lectus. Ut sollicitudin orci vel congue interdum. Curabitur eu vestibulum ante. Phasellus porttitor interdum finibus. Aenean id lacus vel ipsum finibus efficitur. Maecenas efficitur volutpat volutpat. Aenean varius placerat nunc at volutpat. Praesent mollis mauris sed dictum porta. Pellentesque aliquam ligula felis, in pretium purus elementum non. Integer metus odio, ornare vitae ultricies in, luctus in odio. Nam porttitor sagittis nisi, id scelerisque ex fringilla at. Ut at dolor semper, aliquet mauris quis, malesuada nibh. Praesent et accumsan turpis. In hac habitasse platea dictumst.', 1),
(12, 'Mauris semper', 10, 'Ut malesuada sit amet libero ut pulvinar. Ut id lacinia nisi. Etiam tristique suscipit augue sed ultrices. Donec ac sagittis dui. Aliquam ornare nisi eu felis scelerisque condimentum. Quisque in diam metus. Cras tincidunt, purus ac vulputate efficitur, ligula ipsum consequat nibh, a hendrerit risus diam sed nisl. Sed sodales finibus lacus, ac bibendum nisl dapibus eget. Donec hendrerit dui non lacus varius, nec rhoncus sem rutrum. Morbi ac purus nec lorem porta egestas ut ut sem.', 1),
(13, 'Donec nec nibh nec', 10, 'Praesent accumsan consequat bibendum. Vivamus lectus dolor, sodales a placerat ut, congue quis ex. Ut et arcu velit. Suspendisse potenti. Aliquam erat volutpat. In hac habitasse platea dictumst. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis efficitur massa cursus arcu porttitor faucibus non ac purus. Morbi vitae tortor orci. Duis suscipit eros finibus, congue velit vitae, pretium ex. Aenean sit amet egestas nisl. Proin porttitor lectus orci, eget imperdiet est tristique non. Quisque eget risus a mi auctor fermentum. Nam congue sit amet mi quis facilisis.', 1),
(14, 'RedBean как средство для суицида', 2, 'Maecenas interdum ex sit amet lacinia finibus. Mauris quam enim, pulvinar eget eros nec, convallis euismod neque. Mauris felis elit, ullamcorper eget ipsum id, facilisis malesuada leo. Sed congue sapien nec quam tempus pulvinar. Pellentesque consequat lectus turpis, at bibendum nunc gravida et. Maecenas tellus risus, consectetur vel scelerisque vel, efficitur id quam. Suspendisse auctor risus augue, iaculis hendrerit orci porta placerat. Cras sagittis orci a volutpat condimentum. Vestibulum mollis ex massa. Aliquam in tristique tellus.', 1),
(15, '1C для начинающих', 16, 'Donec sed eleifend ante. Suspendisse id nibh leo. Maecenas eu ligula augue. Integer sodales justo non diam posuere, ut sollicitudin lacus feugiat. In eget dui enim. Nullam vel mi nec tellus rhoncus finibus. Aenean sed dictum felis, nec posuere leo. Quisque in congue turpis, ullamcorper porta ante. Morbi accumsan fringilla eros a semper.', 1);

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
-- Дамп данных таблицы `requirements`
--

INSERT INTO `requirements` (`id`, `education_id`, `requirements`) VALUES
(1, 2, 1);

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
-- Ограничения внешнего ключа таблицы `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `c_fk_type_type_id` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
