-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 24 2016 г., 19:10
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `category_id`, `type_id`, `name`) VALUES
(1, NULL, 2, 'Программирование'),
(2, 1, NULL, 'Серверное программирование'),
(4, 1, NULL, 'Клиентское программирование'),
(5, 1, NULL, 'Desktop'),
(6, NULL, 2, 'Дизайн'),
(7, NULL, 3, 'Медицина'),
(8, 6, NULL, 'Веб-дизайн'),
(9, 6, NULL, 'Векторная графика'),
(10, 7, NULL, 'Фармацефтика'),
(15, NULL, 3, 'Программирование'),
(16, 15, NULL, 'Desktop'),
(17, NULL, 7, 'Программирование'),
(18, NULL, 8, 'Вязание'),
(19, NULL, 8, 'Электроника'),
(20, NULL, 7, 'Радиотехника'),
(21, 17, NULL, 'Desktop'),
(22, 18, NULL, 'Вязание спицами'),
(23, 18, NULL, 'Вязание крючком'),
(24, 19, NULL, 'Автоэлектроника'),
(25, 20, NULL, 'Радиосвязь'),
(26, 20, NULL, 'Телевидение');

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
  `land` char(40) DEFAULT NULL,
  `sity` char(40) DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `image` char(80) DEFAULT NULL,
  `about` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Данные пользователя' AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `dossier`
--

INSERT INTO `dossier` (`id`, `name`, `andername`, `surname`, `email`, `land`, `sity`, `phone`, `image`, `about`) VALUES
(1, 'Василий', 'Васильевич', 'Василевский', 'vasea@mail.ru', 'Беларусь', 'Минск', 2222222, 'смсмс', 'Привет мир!'),
(2, 'Алла', 'Сергеевна', 'Сусик', 'alla@gmail.com', 'Беларусь', 'Минск', 155156, 'photoTest.png', 'Александр Сергеевич Пушкин родился 26 мая 1799 года в Москве в дворянской помещичьей семье (отец его был майор в отставке) в день праздника Вознесения.\nВ тот же день у императора Павла родилась внучка, в честь которой во всех церквах шли молебны и гудели колокола. Так, по случайному совпадению день рождения русского гения был ознаменован всеобщим народным ликованием. Символично и место рождения поэта г. Москва - самое сердце русской жизни, России.\nБудущего поэта крестили 8 июня в церкви Богоявления в Елохове.\nОтец Пушкина Сергей Львович и мать Надежда Осиповна, урожденная Ганнибал, были дальними родственниками. Пылкие страсти, руководившие предками как по отцовской, так и по материнской линии, оказали свое влияние и на Пушкина.\nСемья (кроме Александра, были еще дети Ольга и Л');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `education`
--

INSERT INTO `education` (`id`, `information_id`, `number`, `name`, `parent`, `description`, `block`) VALUES
(2, 1, 1, 'Табличная вёрстка', NULL, 'Aliquam rutrum consequat luctus. Cras vel faucibus diam. Aliquam volutpat ipsum eu metus dictum, pharetra maximus odio pharetra. Phasellus metus ex, maximus ac mi ut, sodales convallis quam. Ut venenatis ut libero eu pulvinar. Aenean mi magna, luctus quis mollis vel, porttitor a nunc. In hac habitas', 1),
(3, 1, 2, 'Блочная вёрстка', NULL, 'Блочная вёрстка описание', 1),
(5, 2, 1, 'Алгоритмизация', NULL, 'Алгоритмизация описание', 1),
(6, 2, 1, 'DOM', NULL, 'DOM описание', 1),
(7, 1, 3, 'Адаптивная вёрстка', NULL, 'Адаптивная вёрстка описание', 1),
(8, 33, 1, 'Курс тест', NULL, 'рапрапрапрап', 0),
(9, 1, 4, 'Препроцессоры', NULL, 'Lorem ipsum и так далее', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `information`
--

CREATE TABLE IF NOT EXISTS `information` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `shortdescription` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activ` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Дамп данных таблицы `information`
--

INSERT INTO `information` (`id`, `name`, `category_id`, `description`, `shortdescription`, `activ`) VALUES
(1, 'Вёрстка', 8, '<p>Fusce sit amet fringilla risus. Quisque elit massa, dictum in risus nec, porta commodo nisi. Vestibulum dignissim felis vitae venenatis elementum. Aenean aliquam ac orci vitae pellentesque. Donec in sapien ut ex suscipit varius. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed laoreet lacus vel tempus eleifend. Proin vulputate sem eu tellus lobortis placerat eget eget ligula. Pellentesque lobortis finibus nibh, vitae mattis ipsum tempor eu. Proin sodales tellus rutrum risus gravida, a tristique tellus dapibus. Donec sed turpis lacus. Sed sit amet turpis ante. Vivamus luctus massa id lorem laoreet, non dignissim eros molestie.</p>\r\n', 'Suspendisse interdum augue non massa consequat tincidunt. Maecenas porta vitae dolor eget eleifend. Etiam cursus lacus id quam ultrices fermentum. Proin vehicula tortor nulla, ac malesuada nunc rhoncus quis.', 1),
(2, 'JS для начинающих', 4, 'Vivamus vestibulum auctor velit, quis interdum lectus tempor et. Ut diam nibh, faucibus vitae pellentesque vitae, vulputate quis justo. Phasellus lobortis gravida nunc eu gravida. Fusce maximus est nec nibh aliquam, eu elementum arcu convallis. Pellentesque congue orci ut mollis congue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum sed justo a nibh vestibulum accumsan.', 'Non ultra audeas, serpens callidissime, decipere humanum genus, Dei Ecclesiam persequi, ac Dei electos excutere et cribrare sicut triticum + . Imperat tibi Deus altissimus + , cui in magna tua superbia te similem haberi adhuc praesumis; qui omnes homines vult salvos fieri et ad agnitionem veritaris venire.', 1),
(3, 'Инженер', 2, 'Sed aliquam eu mauris ac egestas. Quisque nisi velit, pretium quis venenatis lobortis, eleifend vitae urna. Praesent vehicula, nunc a hendrerit rhoncus, tellus sapien dignissim arcu, dignissim consectetur ante lorem quis quam. Morbi nec arcu iaculis, lacinia nisi ac, congue sapien. Ut sit amet fermentum nisl. Suspendisse a enim varius nulla faucibus ultrices vitae vel quam. Pellentesque gravida erat at congue fringilla.', ' Imperat tibi Deus Pater + ; imperat tibi Deus Filius + ; imperat tibi Deus Spiritus Sanctus + . Imperat tibi majestas Christi, aeternum Dei Verbum, caro factum + , qui pro salute generis nostri tua invidia perditi, humiliavit semetipsum facfus hobediens usque ad mortem;', 1),
(4, 'Дизайн', 6, 'Integer condimentum euismod magna, a euismod nunc suscipit a. Duis tincidunt eleifend massa scelerisque sagittis. Quisque congue eget erat eget mattis. Cras varius pharetra ex at sollicitudin. In porttitor hendrerit metus, vitae varius metus blandit quis. Etiam pretium, erat eu pretium aliquam, risus dolor convallis libero, sed rutrum enim risus euismod velit. Praesent eu leo in diam tempus porta. Cras pellentesque sapien eu venenatis maximus. Cras euismod fermentum urna at ultrices. Aenean blandit, quam a lacinia vehicula, massa nulla semper orci, vitae tempus lorem ipsum in ligula. Aliquam commodo neque vel felis lobortis malesuada. Sed auctor lectus leo, id vehicula tellus blandit ac. Sed cursus est neque, quis rutrum lectus pharetra quis.', 'Ecclesiam suam aedificavit supra firmam petram, et portas inferi adversus eam nunquam esse praevalituras edixit, cum ea ipse permansurus omnibus diebus usque ad consummationem saeculi. Imperat tibi sacramentum Crucis + , omniumque christianae fidei Mysteriorum virtus +.', 1),
(5, 'Безопастность', 9, 'Mauris pretium dapibus imperdiet. Ut a quam lobortis, vehicula dui eu, condimentum felis. Vivamus at quam ut ligula semper malesuada eu nec libero. Praesent pulvinar, libero non interdum tincidunt, augue libero lobortis enim, vel rutrum nisl nisi eget purus. Donec id est in arcu ornare rutrum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam lacinia sed nulla rutrum ullamcorper. Sed eleifend quam ex, et dictum tellus placerat et. Nulla dignissim a magna quis ultrices. Cras dictum pellentesque massa eu maximus. Duis pretium tortor eget nunc finibus tempus.', 'Imperat tibi excelsa Dei Genitrix Virgo Maria + , quae superbissimum caput tuum a primo instanti immaculatae suae conceptionis in sua humilitate contrivit. Imperat tibi fides sanctorum Apostolorum Petri et Pauli, et ceterorum Apostolorum + . Imperat tibi Martyrum sanguis, ac pia Sanctorum et Sanctarum omnium intercessio +.', 1),
(6, 'Серверное программирование', 2, 'Aliquam erat volutpat. Phasellus id orci a risus tristique aliquam. Etiam sagittis tempor luctus. Nam mi nunc, imperdiet ac consequat vel, ultrices eu mi. In vitae est a justo pharetra venenatis. In justo mauris, rhoncus eu enim euismod, pretium eleifend turpis. Nullam luctus augue ac congue ultrices. Nullam et condimentum mauris. Vivamus eu leo sed ligula vulputate maximus. In sit amet tristique magna. Phasellus finibus ullamcorper nisl vel dapibus. Maecenas sagittis massa in euismod varius. Vestibulum elementum turpis quis arcu commodo, sit amet bibendum nulla egestas. Integer feugiat libero quis urna porta mattis.', 'Ergo, draco maledicte et omnis legio diabolica, adjuramus te per Deum + vivum, per Deum + verum, per Deum + sanctum, per Deum qui sic dilexit mundum, ut Filium suum unigenitum daret, ut omnes qui credit in eum non pereat, sed habeat vitam aeternam: cessa decipere humanas creaturas, eisque aeternae perditionis venenum propinare: desine Ecclesiae nocere, et ejus libertati laqueos injicere.', 1),
(7, 'Как писать на PHP и не сойти с ума', 2, 'Morbi vehicula lobortis odio. Vivamus porta risus id porttitor vestibulum. Aliquam id lectus nulla. Donec semper mi enim, porttitor pellentesque dui porttitor ut. Aenean ut enim fringilla, ullamcorper lectus id, convallis mauris. Proin sit amet egestas justo. Mauris dapibus tellus at pulvinar porta. Phasellus a lacus at augue auctor iaculis. Morbi congue fermentum dolor, et accumsan magna rhoncus vel. Sed vitae elit lorem. Proin gravida arcu eu odio pulvinar, nec vehicula mauris condimentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam molestie, elit eget imperdiet sagittis, risus nunc malesuada mi, nec porta orci lectus id dui. Vestibulum vitae rutrum magna.', 'Vade, satana, inventor et magister omnis fallaciae, hostis humanae salutis. Da locum Christo, in quo nihil invenisti de operibus tuis; da locum Ecclesiae uni, sanctae, catholicae, et apostolicae, quam Christus ipse acquisivit sanguine suo. Humiliare sub potenti manu Dei; contremisce et effuge, invocato a nobis sancto et terribili nomine Jesu, quem inferi tremunt, cui Virtutes caelorum et Potestates et Dominationes subjectae sunt', 1),
(8, 'Задачи 1С', 5, 'Pellentesque vehicula lectus at leo mollis eleifend. Nunc efficitur ornare tellus, a auctor urna lobortis in. In feugiat, justo et fermentum efficitur, arcu nibh venenatis metus, at mollis justo lectus ac tellus. Vestibulum auctor in arcu ultricies condimentum. Aliquam erat volutpat. Aliquam erat volutpat. Maecenas condimentum varius purus a feugiat. Praesent tristique sem non molestie maximus. Nunc quis metus ex. Proin tristique ex sit amet magna feugiat, eget tempus nisi eleifend. Fusce at sollicitudin erat. Duis euismod in velit et cursus. Donec tempor rhoncus ipsum, vel efficitur urna placerat eu. Ut turpis elit, ultricies aliquam tellus eu, fermentum imperdiet magna. Nulla molestie tellus et nunc dictum tempor. Donec tempor elementum arcu sit amet fringilla.', ' quem Cherubim et Seraphim indefessis vocibus laudant, dicentes: Sanctus, Sanctus, Sanctus Dominus Deus Sabaoth.\nV. Domine, exaudi orationem meam.\nR. Et clamor meus ad te veniat.\n[si fuerit saltem diaconus subjungat V. Dominus vobiscum.\nR. Et cum spiritu tuo.]', 1),
(9, 'Ангулар', 4, 'Etiam convallis velit et metus sodales dictum. Quisque tristique efficitur eleifend. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque suscipit non augue vel pulvinar. Phasellus hendrerit sapien et gravida pretium. Nunc sit amet lectus semper, vulputate magna ut, ultricies velit. Curabitur non sagittis quam. Donec placerat quam non odio feugiat tincidunt. Suspendisse fringilla posuere risus, ut gravida enim efficitur aliquet. Nam laoreet, turpis varius rhoncus mollis, tortor lectus vulputate leo, eget ultrices metus sem a lorem. Duis mi ante, maximus at maximus sed, tristique nec nulla. Praesent blandit ex a accumsan efficitur.', 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 6', 1),
(10, 'Sed ultricies tortor', 8, 'In dolor risus, posuere at ipsum et, bibendum consequat neque. Aenean dolor lectus, placerat a sapien blandit, sollicitudin lobortis ex. Duis tempus justo augue, eget mattis sapien vestibulum in. Curabitur a ante sit amet dolor aliquet egestas. Fusce volutpat vel leo at convallis. Aliquam erat volutpat. Donec ut malesuada nibh. Donec sit amet egestas urna. Maecenas eget ultricies mauris. Praesent blandit tincidunt urna, a scelerisque ex aliquam et. Praesent at sapien sit amet arcu condimentum rutrum. Phasellus quis diam ut nunc condimentum lacinia et quis libero. Nam eleifend libero lacus.', 'Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так. Его корни уходят в один фрагмент классической латыни 45 года н.э., то есть более двух тысячелетий назад. Ричард МакКлинток, профессор латыни из колледжа Hampden-Sydney, штат Вирджиния, взял одно из самых странных слов в Lorem Ipsum, "consectetur"', 1),
(11, 'blandit suscipit sed vitae eros.', 2, 'Sed sed sapien eget ante venenatis viverra vel at lectus. Ut sollicitudin orci vel congue interdum. Curabitur eu vestibulum ante. Phasellus porttitor interdum finibus. Aenean id lacus vel ipsum finibus efficitur. Maecenas efficitur volutpat volutpat. Aenean varius placerat nunc at volutpat. Praesent mollis mauris sed dictum porta. Pellentesque aliquam ligula felis, in pretium purus elementum non. Integer metus odio, ornare vitae ultricies in, luctus in odio. Nam porttitor sagittis nisi, id scelerisque ex fringilla at. Ut at dolor semper, aliquet mauris quis, malesuada nibh. Praesent et accumsan turpis. In hac habitasse platea dictumst.', 'Lorem Ipsum в разделах 1.10.32 и 1.10.33 книги "de Finibus Bonorum et Malorum" ("О пределах добра и зла"), написанной Цицероном в 45 году н.э. Этот трактат по теории этики был очень популярен в эпоху Возрождения. Первая строка Lorem Ipsum, "Lorem ipsum dolor sit amet..", происходит от одной из строк в разделе 1.10.32', 1),
(12, 'Mauris semper', 10, 'Ut malesuada sit amet libero ut pulvinar. Ut id lacinia nisi. Etiam tristique suscipit augue sed ultrices. Donec ac sagittis dui. Aliquam ornare nisi eu felis scelerisque condimentum. Quisque in diam metus. Cras tincidunt, purus ac vulputate efficitur, ligula ipsum consequat nibh, a hendrerit risus diam sed nisl. Sed sodales finibus lacus, ac bibendum nisl dapibus eget. Donec hendrerit dui non lacus varius, nec rhoncus sem rutrum. Morbi ac purus nec lorem porta egestas ut ut sem.', 'Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца.', 1),
(13, 'Donec nec nibh nec', 10, 'Praesent accumsan consequat bibendum. Vivamus lectus dolor, sodales a placerat ut, congue quis ex. Ut et arcu velit. Suspendisse potenti. Aliquam erat volutpat. In hac habitasse platea dictumst. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis efficitur massa cursus arcu porttitor faucibus non ac purus. Morbi vitae tortor orci. Duis suscipit eros finibus, congue velit vitae, pretium ex. Aenean sit amet egestas nisl. Proin porttitor lectus orci, eget imperdiet est tristique non. Quisque eget risus a mi auctor fermentum. Nam congue sit amet mi quis facilisis.', 'Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца. Также все другие известные генераторы Lorem Ipsum используют один и тот же текст, который они просто повторяют, пока не достигнут нужный объём.', 1),
(14, 'RedBean как средство для суицида', 2, 'Maecenas interdum ex sit amet lacinia finibus. Mauris quam enim, pulvinar eget eros nec, convallis euismod neque. Mauris felis elit, ullamcorper eget ipsum id, facilisis malesuada leo. Sed congue sapien nec quam tempus pulvinar. Pellentesque consequat lectus turpis, at bibendum nunc gravida et. Maecenas tellus risus, consectetur vel scelerisque vel, efficitur id quam. Suspendisse auctor risus augue, iaculis hendrerit orci porta placerat. Cras sagittis orci a volutpat condimentum. Vestibulum mollis ex massa. Aliquam in tristique tellus.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus posuere dapibus congue. Nam maximus pulvinar ex ut malesuada. Maecenas elementum purus vitae efficitur mattis. Duis facilisis commodo libero commodo ultrices. Fusce aliquet tincidunt faucibus. Praesent tristique sem nec maximus mattis. ', 1),
(15, '1C для начинающих', 16, 'Donec sed eleifend ante. Suspendisse id nibh leo. Maecenas eu ligula augue. Integer sodales justo non diam posuere, ut sollicitudin lacus feugiat. In eget dui enim. Nullam vel mi nec tellus rhoncus finibus. Aenean sed dictum felis, nec posuere leo. Quisque in congue turpis, ullamcorper porta ante. Morbi accumsan fringilla eros a semper.', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris eget interdum urna. Cras vulputate libero tortor. Sed et leo purus. Donec porttitor urna sed ante eleifend cursus. Sed molestie pellentesque neque, eget venenatis nulla mattis et. Duis commodo libero at diam porta, quis vulputate purus gravida.', 1),
(16, 'С,С++', 17, 'Идейные соображения высшего порядка, а также начало повседневной работы по формированию позиции играет важную роль в формировании позиций, занимаемых участниками в отношении поставленных задач. Таким образом сложившаяся структура организации позволяет оценить значение существенных финансовых и административных условий. Задача организации, в особенности же сложившаяся структура организации позволяет выполнять важные задания по разработке существенных финансовых и административных условий. Значимость этих проблем настолько очевидна, что укрепление и развитие структуры влечет за собой процесс внедрения и модернизации соответствующий условий активизации. С другой стороны сложившаяся структура организации играет важную роль в формировании существенных финансовых и административных условий.', 'Aliquam porttitor purus nec est feugiat, eu hendrerit nibh rhoncus. Nulla facilisi. Pellentesque ac mauris in orci finibus lobortis. Fusce auctor vulputate leo, mattis venenatis ipsum laoreet at. Donec gravida leo et quam efficitur pretium. Praesent in ex ac nibh pulvinar cursus a sed massa. ', 1),
(17, 'Ассемблер', 17, 'Равным образом постоянное информационно-пропагандистское обеспечение нашей деятельности играет важную роль в формировании позиций, занимаемых участниками в отношении поставленных задач. Значимость этих проблем настолько очевидна, что консультация с широким активом в значительной степени обуславливает создание соответствующий условий активизации. Задача организации, в особенности же консультация с широким активом играет важную роль в формировании форм развития.\r\n\r\nНе следует, однако забывать, что постоянный количественный рост и сфера нашей активности требуют определения и уточнения дальнейших направлений развития. Значимость этих проблем настолько очевидна, что укрепление и развитие структуры требуют определения и уточнения соответствующий условий активизации. Товарищи! постоянное информационно-пропагандистское обеспечение нашей деятельности представляет собой интересный эксперимент проверки дальнейших направлений развития.', 'Pellentesque augue urna, auctor vel ligula sit amet, laoreet imperdiet magna. Morbi ultricies, massa ut tincidunt finibus, est ex convallis nisl, cursus consequat eros libero nec turpis. Mauris sit amet hendrerit tellus, sed eleifend erat. Sed ex velit, scelerisque vel leo vitae, venenatis dapibus ex. Ut commodo velit nisi, eget ullamcorper justo hendrerit id.', 1),
(18, 'Простые узоры', 18, '<p>Проснувшись однажды утром после беспокойного сна, Грегор Замза обнаружил, что он у себя в постели превратился в страшное насекомое. Лежа на панцирнотвердой спине, он видел, стоило ему приподнять голову, свой коричневый, выпуклый, разделенный дугообразными чешуйками живот, на верхушке которого еле держалось готовое вот-вот окончательно сползти одеяло. Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами. «Что со мной случилось? » – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах.</p>', 'Nulla ut ex purus. In facilisis, ligula non pretium cursus, erat lorem rhoncus lorem, ac condimentum nisl diam id enim. Donec accumsan dolor nec nunc fermentum consequat.', 1),
(19, 'Сложные узоры', 18, '<p>Над столом, где были разложены распакованные образцы сукон – Замза был коммивояжером, – висел портрет, который он недавно вырезал из иллюстрированного журнала и вставил в красивую золоченую рамку. На портрете была изображена дама в меховой шляпе и боа, она сидела очень прямо и протягивала зрителю тяжелую меховую муфту, в которой целиком исчезала ее рука. Затем взгляд Грегора устремился в окно, и пасмурная погода – слышно было, как по жести подоконника стучат капли дождя – привела его и вовсе в грустное настроение.</p>', 'Praesent nec molestie mauris, nec hendrerit ipsum. Morbi dignissim sem diam, et interdum orci elementum at. In placerat et risus venenatis volutpat. Curabitur tempor, urna id volutpat pulvinar, libero ex fermentum massa, in mattis lectus libero id mi. Vestibulum vel enim vel magna congue venenatis vel nec est. Maecenas id lacinia orci. Morbi sed sapien id nisi dictum pharetra ut at nunc.', 1),
(20, 'Python', 21, '<p>«Хорошо бы еще немного поспать и забыть всю эту чепуху», – подумал он, но это было совершенно неосуществимо, он привык спать на правом боку, а в теперешнем своем состоянии он никак не мог принять этого положения. С какой бы силой ни поворачивался он на правый бок, он неизменно сваливался опять на спину. Закрыв глаза, чтобы не видеть своих барахтающихся ног, он проделал это добрую сотню раз и отказался от этих попыток только тогда, когда почувствовал какую-то неведомую дотоле, тупую и слабую боль в боку. «Ах ты, господи, – подумал он, – какую я выбрал хлопотную профессию! Изо дня в день в разъездах.</p>', ' Nulla ac purus ut nulla consequat vestibulum. Nam pellentesque purus at purus malesuada elementum. Ut erat diam, placerat a lorem sit amet, gravida bibendum sem. Donec cursus diam in orci consectetur consectetur. Cras imperdiet ut nisi ac volutpat. Vestibulum ut suscipit risus, ac semper felis. Praesent vitae nisl ante. Nullam velit elit, ornare quis congue fringilla, egestas auctor nisl.', 1),
(21, 'Вязание без спиц', 22, '<p>Деловых волнений куда больше, чем на месте, в торговом доме, а кроме того, изволь терпеть тяготы дороги, думай о расписании поездов, мирись с плохим, нерегулярным питанием, завязывай со все новыми и новыми людьми недолгие, никогда не бывающие сердечными отношения. Черт бы побрал все это! » Он почувствовал вверху живота легкий зуд; медленно подвинулся на спине к прутьям кровати, чтобы удобнее было поднять голову; нашел зудевшее место, сплошь покрытое, как оказалось, белыми непонятными точечками; хотел было ощупать это место одной из ножек, но сразу отдернул ее, ибо даже простое прикосновение вызвало у него, Грегора, озноб. Он соскользнул в прежнее свое положение.</p>', 'Nunc sollicitudin cursus sapien at tristique. Aliquam in enim sit amet quam convallis ultricies. Cras tempor augue vitae risus placerat commodo. Donec id tempus felis, sit amet fermentum dolor. Proin ut fringilla ligula. Vivamus eget euismod libero. Quisque interdum lacinia velit, imperdiet rhoncus enim pulvinar at.', 1),
(22, 'Радио своими руками', 25, 'Значимость этих проблем настолько очевидна, что консультация с широким активом требуют от нас анализа модели развития. С другой стороны дальнейшее развитие различных форм деятельности представляет собой интересный эксперимент проверки модели развития.\r\n<br>\r\nРавным образом начало повседневной работы по формированию позиции играет важную роль в формировании направлений прогрессивного развития. С другой стороны консультация с широким активом представляет собой интересный эксперимент проверки направлений прогрессивного развития.', 'In tempus ligula est, ac ultricies nisl varius at. Nullam pellentesque felis et volutpat vulputate. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 1),
(23, 'Тормозная система', 24, 'Товарищи! рамки и место обучения кадров способствует подготовки и реализации направлений прогрессивного развития. С другой стороны реализация намеченных плановых заданий в значительной степени обуславливает создание форм развития. Равным образом дальнейшее развитие различных форм деятельности представляет собой интересный эксперимент проверки соответствующий условий активизации. Задача организации, в особенности же дальнейшее развитие различных форм деятельности влечет за собой процесс внедрения и модернизации форм развития. Задача организации, в особенности же консультация с широким активом в значительной степени обуславливает создание направлений прогрессивного развития. Идейные соображения высшего порядка, а также новая модель организационной деятельности в значительной степени обуславливает создание системы обучения кадров, соответствует насущным потребностям.', 'Quisque sollicitudin ligula quis quam pharetra, ut aliquam velit vehicula. Aenean suscipit ligula ut scelerisque congue. Fusce consequat, ex et lacinia consequat, magna mi cursus nulla, id suscipit augue tellus ac urna. Nulla eget ante auctor, ultricies magna sit amet, egestas nisi. Mauris consequat pulvinar purus.', 1),
(24, 'Цифровое телевидение', 26, '<p>«От этого раннего вставания, – подумал он, – можно совсем обезуметь. Человек должен высыпаться. Другие коммивояжеры живут, как одалиски. Когда я, например, среди дня возвращаюсь в гостиницу, чтобы переписать полученные заказы, эти господа только завтракают. А осмелься я вести себя так, мои хозяин выгнал бы меня сразу. Кто знает, впрочем, может быть, это было бы даже очень хорошо для меня. Если бы я не сдерживался ради родителей, я бы давно заявил об уходе, я бы подошел к своему хозяину и выложил ему все, что о нем думаю. Он бы так и свалился с конторки!</p>', 'Morbi laoreet tincidunt blandit. Nulla aliquet sollicitudin tortor vel gravida. Vestibulum felis ex, fermentum sed metus in, aliquam vestibulum ipsum. Donec vitae laoreet turpis, eget lobortis odio. Praesent in sem dictum, placerat augue nec, posuere enim. Vivamus hendrerit suscipit mattis. Phasellus sodales ultricies condimentum.', 1),
(25, 'Проводная связь', 25, '<p>Странная у него манера – садиться на конторку и с ее высоты разговаривать со служащим, который вдобавок вынужден подойти вплотную к конторке из-за того, что хозяин туг на ухо. Однако надежда еще не совсем потеряна: как только я накоплю денег, чтобы выплатить долг моих родителей – на это уйдет еще лет пять-шесть, – я так и поступлю. Тут-то мы и распрощаемся раз и навсегда. А пока что надо подниматься, мой поезд отходит в пять». И он взглянул на будильник, который тикал на сундуке. «Боже правый! » – подумал он. Было половина седьмого, и стрелки спокойно двигались дальше, было даже больше половины, без малого уже три четверти. Неужели будильник не звонил?</p>', 'Proin pellentesque ullamcorper metus, a dapibus arcu fermentum facilisis. Cras elementum ac tortor porta tincidunt. Curabitur vel velit dui. Suspendisse hendrerit urna sed elit fringilla, sit amet hendrerit est gravida. In laoreet velit at urna ullamcorper malesuada. Quisque aliquet nibh lorem, et dapibus justo ullamcorper in. Proin eget justo non nibh tempor hendrerit ut sit amet nunc. ', 1),
(26, 'Навигация и система управления', 24, '<p>С кровати было видно, что он поставлен правильно, на четыре часа; и он, несомненно, звонил. Но как можно было спокойно спать под этот сотрясающий мебель трезвон? Ну, спал-то он неспокойно, но, видимо, крепко. Однако что делать теперь? Следующий поезд уходит в семь часов; чтобы поспеть на него, он должен отчаянно торопиться, а набор образцов еще не упакован, да и сам он отнюдь не чувствует себя свежим и легким на подъем. И даже поспей он на поезд, хозяйского разноса ему все равно не избежать – ведь рассыльный торгового дома дежурил у пятичасового поезда и давно доложил о его, Грегора, опоздании. Рассыльный, человек бесхарактерный и неумный, был ставленником хозяина. А что, если сказаться больным?</p>', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis a dictum magna, quis sagittis nulla. Maecenas diam erat, interdum quis interdum posuere, ultrices sit amet risus. Morbi tortor sapien, bibendum quis interdum non, pellentesque at risus. Praesent vitae hendrerit nunc, vitae varius nunc. Aenean nec tellus lobortis, tempus quam non, fringilla nisi. Nunc quis erat auctor, porta nisi vel, pretium felis.', 1),
(27, 'Передача ПАЛ сигнала', 26, '<p>Но это было бы крайне неприятно и показалось бы подозрительным, ибо за пятилетнюю свою службу Грегор ни разу еще не болел. Хозяин, конечно, привел бы врача больничной кассы и стал попрекать родителей сыном-лентяем, отводя любые возражения ссылкой на этого врача, по мнению которого все люди на свете совершенно здоровы и только не любят работать. И разве в данном случае он был бы так уж неправ? Если не считать сонливости, действительно странной после такого долгого сна, Грегор и в самом деле чувствовал себя превосходно и был даже чертовски голоден. Проснувшись однажды утром после беспокойного сна, Грегор Замза обнаружил, что он у себя в постели превратился в страшное насекомое.</p>', 'Etiam et malesuada metus, ac hendrerit est. Cras in gravida odio, pellentesque volutpat est. Donec consequat vitae libero eget porta. Aliquam erat volutpat. Proin semper malesuada lectus, vitae viverra justo accumsan quis. Cras ut felis magna. Pellentesque nec risus nec nisl vulputate fermentum in et tellus. Aenean ultrices pretium velit ac pellentesque. Donec sit amet leo malesuada, euismod metus vitae, pharetra ex.', 1),
(28, 'Вязание зимних изделий', 23, '<p>Лежа на панцирнотвердой спине, он видел, стоило ему приподнять голову, свой коричневый, выпуклый, разделенный дугообразными чешуйками живот, на верхушке которого еле держалось готовое вот-вот окончательно сползти одеяло. Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами. «Что со мной случилось? » – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах. Над столом, где были разложены распакованные образцы сукон – Замза был коммивояжером, – висел портрет, который он недавно вырезал из иллюстрированного журнала и вставил в красивую золоченую рамку.</p>', 'Donec ut est placerat, mattis elit a, congue lectus. Nullam maximus congue nulla, eget tincidunt libero vestibulum et. Mauris fringilla tortor ipsum, et pulvinar orci pharetra at. Mauris fringilla erat eu pulvinar mattis. Proin ut magna orci.\n\nDonec fringilla nunc tristique, varius purus in, condimentum lectus.', 1),
(29, 'Спутниковая коммуникация', 25, 'Не следует, однако забывать, что реализация намеченных плановых заданий способствует подготовки и реализации форм развития. Равным образом дальнейшее развитие различных форм деятельности в значительной степени обуславливает создание соответствующий условий активизации. Повседневная практика показывает, что постоянный количественный рост и сфера нашей активности представляет собой интересный эксперимент проверки дальнейших направлений развития. Задача организации, в особенности же постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет выполнять важные задания по разработке систем массового участия. Равным образом постоянное информационно-пропагандистское обеспечение нашей деятельности требуют от нас анализа форм развития. Значимость этих проблем настолько очевидна, что постоянное информационно-пропагандистское обеспечение нашей деятельности способствует подготовки и реализации дальнейших направлений развития.', 'Maecenas tincidunt magna turpis, et sollicitudin lectus posuere eget. Phasellus commodo velit id purus ultrices, non ultricies nisi bibendum. Donec facilisis euismod dapibus. Aliquam aliquam diam nulla, sit amet consectetur sem semper at. Suspendisse vitae neque risus. Sed sit amet laoreet nisi. Pellentesque commodo feugiat quam ut pretium. ', 1),
(30, 'AVR-C', 21, 'Идейные соображения высшего порядка, а также постоянное информационно-пропагандистское обеспечение нашей деятельности играет важную роль в формировании <strong>форм развития.</strong> Равным образом рамки и место обучения кадров позволяет оценить значение систем массового участия.\r\n<br>\r\nРазнообразный и богатый опыт начало повседневной работы по формированию позиции в значительной степени обуславливает создание систем массового участия. Идейные соображения высшего порядка, а также дальнейшее развитие различных форм деятельности обеспечивает широкому кругу (специалистов) участие в формировании дальнейших направлений развития. С другой стороны реализация намеченных плановых заданий способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Товарищи! постоянное информационно-пропагандистское обеспечение нашей деятельности требуют от нас анализа модели развития. Задача организации, в особенности же укрепление и развитие структуры играет важную роль в формировании модели развития.', ' Maecenas eget quam ut nisi semper sollicitudin vel a erat. In tellus augue, gravida et leo nec, congue tempor lectus. Fusce dapibus nunc nec ultricies sollicitudin. Integer pulvinar nisl in sagittis hendrerit. Quisque dolor dui, vehicula quis aliquam id, hendrerit quis elit.\n\nAliquam porttitor efficitur urna, non euismod tortor. Quisque laoreet vel leo ac vulputate.', 1),
(33, 'F# ', 16, '<h1>&nbsp;</h1>\r\n\r\n<div class="row two-col-left">\r\n<div class="col-md-3 col-sidebar">\r\n<h1>&nbsp;</h1>\r\n\r\n<h1><strong>&nbsp;HELLO!</strong></h1>\r\n\r\n<p><img src="http://placehold.it/300x250&amp;text=Image" /></p>\r\n</div>\r\n\r\n<div class="col-md-9 col-main">\r\n<h2><strong>Lorem ipsum</strong></h2>\r\n\r\n<p>Vivamus ut sapien libero. Donec ultricies nisi eget congue ornare. Nam molestie, sapien aliquet tincidunt molestie, leo quam interdum dolor, ut volutpat nisi sem vitae sem. Nam pellentesque nibh euismod, porta leo in, egestas magna. Donec molestie, diam vel pharetra lobortis, ipsum nibh imperdiet elit, at tempus lorem est nec justo. Aliquam non enim eget risus dapibus porta et a lorem. Integer tincidunt semper diam, blandit finibus ligula scelerisque quis. Aliquam libero ipsum, volutpat nec dictum et, finibus ultricies ligula. Curabitur sit amet elementum enim. In nec lacus nibh. Donec condimentum vehicula hendrerit. Praesent et risus tempor, tristique erat sed, vestibulum urna. Aenean ligula quam, tincidunt eget risus ut, bibendum consectetur risus.</p>\r\n\r\n<hr />\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n', 'F# для начинающих', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `information_user`
--

CREATE TABLE IF NOT EXISTS `information_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `information_id` int(11) DEFAULT NULL,
  `education_id` int(11) DEFAULT NULL,
  `lesson_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Дамп данных таблицы `information_user`
--

INSERT INTO `information_user` (`id`, `user_id`, `information_id`, `education_id`, `lesson_id`, `status`) VALUES
(1, 3, 1, NULL, NULL, NULL),
(2, 3, 2, NULL, NULL, NULL),
(3, 3, 3, NULL, NULL, NULL),
(4, 3, 12, NULL, NULL, NULL),
(5, 2, 1, NULL, NULL, NULL),
(9, 2, 1, 2, NULL, 1),
(10, 2, 1, NULL, 1, 1),
(11, 2, 1, NULL, 2, 1),
(12, 2, 12, NULL, NULL, 1),
(13, 2, 22, NULL, NULL, NULL),
(14, 3, 22, NULL, NULL, NULL),
(15, 2, 1, 3, NULL, 1),
(16, 2, 1, NULL, 3, 1),
(17, 2, 1, NULL, 4, 1),
(20, 3, 33, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `lesson`
--

CREATE TABLE IF NOT EXISTS `lesson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(120) NOT NULL,
  `description` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `number` int(11) NOT NULL,
  `block` int(11) NOT NULL DEFAULT '0',
  `education_id` int(11) DEFAULT NULL,
  `information_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `lesson`
--

INSERT INTO `lesson` (`id`, `name`, `description`, `text`, `number`, `block`, `education_id`, `information_id`) VALUES
(1, 'Таблицы', 'Vivamus in ante fringilla, lobortis arcu volutpat, malesuada risus. Aliquam leo purus, sodales at turpis eget, tincidunt lacinia augue. Cras ut ipsum velit. Cras tincidunt eros sodales, tincidunt mauris eu, tincidunt magna. Morbi ex mi, luctus vel rhoncus', '<div class="btgrid">\n<div class="row row-1">\n<div class="col col-md-6">\n<div class="content">\n<p>&nbsp;</p>\n\n<h2><strong>&nbsp; &nbsp;Lorem ipsum dolor sit amet</strong></h2>\n\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text.</p>\n\n<hr />\n<p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\n</div>\n</div>\n\n<div class="col col-md-6">\n<div class="content">\n<div class="row two-col">\n<div class="col-md-6 col-1">\n<p><img src="http://placehold.it/500x280&amp;text=Image" /></p>\n\n<p>Integer suscipit nisl non massa mattis, et mollis libero bibendum.</p>\n</div>\n\n<div class="col-md-6 col-2">\n<p><img src="http://placehold.it/500x280&amp;text=Image" /></p>\n\n<p>Quisque auctor ex lobortis pulvinar elementum.</p>\n</div>\n</div>\n\n<p>&nbsp;</p>\n</div>\n</div>\n</div>\n\n<div class="row row-2">\n<div class="col col-md-6">\n<div class="content">\n<ol>\n	<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>\n	<li>Curabitur at massa dignissim, porttitor augue sed, tempus eros.</li>\n	<li>Fusce a libero ut diam ullamcorper varius.</li>\n	<li>Ut pulvinar dui at ultricies pharetra.</li>\n	<li>Praesent congue orci a arcu faucibus finibus.</li>\n	<li>Nunc eget tortor quis purus rutrum mattis.</li>\n</ol>\n</div>\n</div>\n\n<div class="col col-md-6">\n<div class="content">\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\n</div>\n</div>\n</div>\n</div>\n\n<p>&nbsp;</p>\n', 1, 1, 2, 0),
(2, 'Вёрстка таблиц', 'Вёрстка таблиц описание', 'Вёрстка таблиц описание', 2, 1, 2, 0),
(3, 'Блоки', 'Блоки описание', 'Блоки описание', 1, 1, 3, 0),
(4, 'Вёрстка блоков', 'Вёрстка блоков описание', 'Вёрстка блоков описание', 2, 1, 3, 0),
(5, 'Понятие алгоритм', 'Понятие алгоритм описание', 'Понятие алгоритм описание', 1, 1, 5, 0),
(6, 'Цикл как элемент алгоритма', 'Цикл как элемент алгоритма описание', 'Цикл как элемент алгоритма описание', 2, 1, 5, 0),
(7, 'Построение веб-страницы', 'Построение веб-страницы описание', 'Построение веб-страницы описание', 1, 1, 6, 0),
(8, 'DOM и его особенности', 'DOM и его особенности описание', 'DOM и его особенности описание', 2, 1, 6, 0),
(9, 'Лекция 1', 'Лекция 1 описание', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel tincidunt nisl. Quisque dictum nec velit eu viverra. Donec gravida sed sem non euismod. Duis ut ipsum odio. Praesent ut tempor nisl. Maecenas ullamcorper cursus ligula, sit amet eleifend diam faucibus nec. Nunc at libero id libero tempus facilisis. Mauris vitae leo laoreet, venenatis ipsum ac, faucibus nibh. Curabitur ac tincidunt tortor. Nulla volutpat sagittis nibh ut convallis. Donec auctor turpis id viverra egestas. Duis velit magna, venenatis id lobortis et, finibus eget nisl. Maecenas odio orci, malesuada sed tortor et, fermentum congue ipsum. Suspendisse enim lorem, mattis quis turpis ac, malesuada volutpat ante. Ut a pretium tortor. Phasellus vitae neque sit amet odio suscipit viverra et nec tellus.', 1, 1, NULL, 22),
(10, 'Лекция 2', 'Лекция 2 описание', 'Etiam pretium, ipsum quis fermentum convallis, ipsum velit blandit nisi, vitae pretium neque tellus vel urna. Duis lectus lorem, fermentum in lacus vitae, consectetur malesuada lectus. Suspendisse luctus mauris sem, ac ultrices nulla eleifend nec. Nullam hendrerit purus quis justo ultricies tincidunt. In pellentesque ipsum id porttitor pretium. Aenean nec rutrum dui, fringilla egestas lectus. Nam efficitur, justo id sagittis vestibulum, enim justo molestie dolor, eu ullamcorper elit erat ac magna. Phasellus imperdiet nunc id lectus fringilla posuere. Cras vulputate nisl eu pulvinar malesuada. Nullam eu magna lectus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi convallis vel nulla vel dapibus. Ut tellus leo, euismod eleifend eros ut, tincidunt faucibus ipsum. Cras vestibulum eu sapien id ornare.', 2, 1, NULL, 22),
(11, 'Bootstrap основы', 'Bootstrap основы описание', 'Bootstrap основы описание', 1, 1, 7, 0),
(12, 'Bootstrap LESS', 'Bootstrap LESS описание', 'Bootstrap LESS описание', 2, 1, 7, 0),
(13, 'Транзисторы', 'Кратко о транзисторах на латыне. Почему на латыне ?..Что бы служба мёдом не казалась!', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec diam diam. Pellentesque venenatis sagittis metus eget hendrerit. Vestibulum vel elementum ante. Nulla aliquet iaculis justo id molestie. Donec et sagittis mauris. In eu iaculis lacus. Praesent vulputate velit eu fringilla egestas. Vivamus condimentum erat quis condimentum rutrum. Donec vitae placerat felis. Vivamus et tempus risus, vel aliquam turpis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec fringilla vehicula nibh vitae varius.</p>\r\n\r\n<hr />\r\n<p>Nulla congue, risus non fermentum lacinia, turpis nunc suscipit lorem, vitae posuere mauris quam sit amet nibh. Integer venenatis efficitur arcu id vestibulum. Integer enim ex, tincidunt a magna eget, tempus consequat mauris. Maecenas at imperdiet est. Nulla at semper augue. Praesent consequat suscipit tellus, non congue nulla posuere vitae. Etiam auctor velit in mi euismod interdum. Ut et varius nibh, et ultricies tortor. Cras laoreet aliquam lorem, nec molestie est maximus eu. Pellentesque aliquam sollicitudin enim non pretium. Cras feugiat ante tincidunt, lobortis ex vel, faucibus nisl. Proin et arcu nisl. Integer et libero eget dolor iaculis ultrices ut eget justo. Vivamus eget mi quis ipsum vehicula ullamcorper. Aenean hendrerit orci ut elit bibendum bibendum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>\r\n', 3, 0, NULL, 22);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` char(40) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`) VALUES
(1, 'Верхнее меню'),
(2, 'Главное меню'),
(3, 'Меню студента'),
(4, 'Меню модератора'),
(5, 'Меню категорий'),
(6, 'Просмотр'),
(7, 'Меню преподавателя'),
(8, 'Меню модерирования модуля'),
(9, 'Меню редактирование лекции');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Дамп данных таблицы `menu_item`
--

INSERT INTO `menu_item` (`menu_item_id`, `menu_id`, `menu_item_name`, `menu_item_url`, `menu_item_parent`, `menu_item_activ`) VALUES
(1, 1, 'Главная', '?', 0, 1),
(2, 1, 'Новости', '?ctrl=news&action=News&page=1', 0, 1),
(3, 1, 'О нас', '?ctrl=page&action=Page&id=1', 0, 1),
(4, 2, 'Комплексные курсы', '?ctrl=wisdom&action=WisdomType&type=1&page=1', 0, 1),
(5, 2, 'Многоуровневые комплексы', '?ctrl=wisdom&action=WisdomType&type=1&subtype=2&page=1', 4, 1),
(6, 2, 'Тематические комплексы', '?ctrl=wisdom&action=WisdomType&type=1&subtype=3&page=1', 4, 1),
(8, 2, 'Курсы', '?ctrl=wisdom&action=WisdomType&type=5&page=1', 0, 1),
(9, 2, 'Сертифицированные', '?ctrl=wisdom&action=WisdomType&type=5&subtype=7&page=1', 8, 1),
(10, 2, 'Не сертифицированные', '?ctrl=wisdom&action=WisdomType&type=5&subtype=8&page=1', 8, 1),
(11, 2, 'Семинары', '?ctrl=wisdom&action=WisdomType&type=6&page=1', 0, 1),
(12, 2, 'Мастер-классы', '?ctrl=wisdom&action=WisdomType&type=3&subtype=9&page=1', 11, 1),
(13, 2, 'Доклады', '?ctrl=wisdom&action=WisdomType&type=3&subtype=10&page=1', 11, 1),
(14, 2, 'Библиотека', '#', 0, 1),
(15, 2, 'Статьи', '?ctrl=wisdom&action=WisdomType&type=3&subtype=11&page=1', 11, 1),
(16, 3, 'Приступить', '?ctrl=cabinet&action=GetUserInformation&id=', 0, 1),
(17, 3, 'Отписаться', '?ctrl=cabinet&action=deleteUserInformation&id=', 0, 1),
(18, 6, 'Подробнее', '?ctrl=cabinet&action=GetUserInformation&id=', 0, 1),
(19, 7, 'Просмотр', '?ctrl=cabinet&action=GetUserInformation&id=', 0, 1),
(20, 7, 'Блокировка', '#', 0, 1),
(21, 7, 'Удалить', '#', 0, 1),
(22, 7, 'Редактировать', '?ctrl=teacher&action=EditWisdom&id=', 0, 1),
(23, 8, 'Редактировать', '?ctrl=teacher&action=EditWisdom&id=', 0, 1),
(24, 8, 'Блокировать', '#', 0, 1),
(25, 8, 'Удалить', '#', 0, 1),
(26, 9, 'Редактировать', '?ctrl=teacher&action=EditLesson', 0, 1),
(27, 9, 'Удалить', '#', 0, 1);

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
(1, 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного пр', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris fermentum tristique dui vel varius. Donec egestas arcu eu quam tincidunt, at consectetur turpis tincidunt. Nulla quam nunc, porta et sapien fringilla, condimentum elementum lorem. Integer venenatis dui vel lacus lacinia, nec rutrum tortor vehicula. Integer elementum odio ante, id laoreet mi suscipit sit amet. Etiam molestie ipsum et pulvinar ultricies. Cras felis augue, congue ut odio quis, interdum facilisis mi. Curabitur et augue malesuada, iaculis sem a, fermentum dui. Mauris egestas eget nisi eu mattis. Pellentesque fermentum bibendum lobortis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras ac neque felis.', '2015-11-30 12:44:27', 'images/photoTest.png', 1, 1),
(2, 'Phasellus blandit nisl ac commodo aliquam.', 'Morbi sit amet quam quis neque tempus venenatis. Morbi placerat pulvinar leo, quis commodo urna lobortis sit amet. Praesent ornare congue diam, aliquet vulputate purus congue ac. Praesent et tellus a magna finibus maximus non ut velit. Nunc id dolor diam. Curabitur vulputate auctor felis, quis euismod libero varius sed. Cras eget mollis erat. Sed massa tellus, fringilla ut libero et, tincidunt efficitur dui.', '2015-11-30 14:40:27', 'images/IMG_20151228_120826.jpg', 1, 1),
(3, 'Praesent semper dui condimentum, auctor velit vitae, sagittis sapien.', 'Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.', '2015-11-30 14:44:56', 'images/20151228_120827.jpg', 1, 1),
(4, 'Sed in odio ac odio elementum ullamcorper et quis metus.', 'Morbi commodo eu risus non tincidunt. Proin vitae felis ac nunc efficitur dictum vitae vel erat. Sed nec pellentesque ex. Proin commodo arcu non diam vulputate vestibulum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tempus a ipsum in imperdiet. Duis quis eros quis erat convallis rutrum. Ut metus lacus, pulvinar nec sem eget, finibus molestie eros. Suspendisse malesuada mi sit amet faucibus hendrerit. Suspendisse eleifend libero enim, quis gravida tellus pulvinar sed. Aenean consequat risus at sapien cursus semper. Cras quam ipsum, pulvinar at aliquam in, aliquam non ex.<br><br>\nPellentesque faucibus hendrerit arcu sit amet posuere. Morbi magna lorem, gravida vel sapien eu, ultrices rutrum justo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris molestie eleifend blandit. Phasellus porta massa vitae ex sollicitudin pretium. Cras ac mi urna. Cras non luctus sem, scelerisque feugiat ipsum. Vestibulum vitae consequat nulla.', '2015-11-30 14:45:09', 'images/20151228_115024.jpg', 1, 1),
(5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Morbi sapien libero, luctus ac nisi a, convallis pulvinar nisl. Donec ullamcorper ac enim a lacinia. Aliquam faucibus molestie tortor, eget luctus lectus vestibulum et. Proin faucibus elementum justo, nec hendrerit augue faucibus ut. Sed aliquet, massa id dignissim tincidunt, odio nulla congue turpis, sit amet laoreet eros sem cursus nisi. Nunc maximus blandit neque, ac fermentum lectus dapibus non. Ut in elit risus. Donec ultricies nunc in neque feugiat, quis laoreet quam pellentesque.', '2015-11-30 14:45:40', 'images/12_100229_1_96372.jpg', 1, 1),
(6, 'Sed molestie quam id sapien consequat, pellentesque fringilla arcu commodo.', 'Morbi commodo eu risus non tincidunt. Proin vitae felis ac nunc efficitur dictum vitae vel erat. Sed nec pellentesque ex. Proin commodo arcu non diam vulputate vestibulum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tempus a ipsum in imperdiet. Duis quis eros quis erat convallis rutrum. Ut metus lacus, pulvinar nec sem eget, finibus molestie eros. Suspendisse malesuada mi sit amet faucibus hendrerit. Suspendisse eleifend libero enim, quis gravida tellus pulvinar sed. Aenean consequat risus at sapien cursus semper. Cras quam ipsum, pulvinar at aliquam in, aliquam non ex.', '2015-11-30 14:45:50', 'images/12_100229_1_96370.jpg', 1, 1);

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
-- Структура таблицы `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questions` int(11) NOT NULL,
  `testing_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `requirements`
--

CREATE TABLE IF NOT EXISTS `requirements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `information_id` int(11) NOT NULL,
  `requirements` int(11) NOT NULL,
  `block` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Допуск к образованию по первому предмету' AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `requirements`
--

INSERT INTO `requirements` (`id`, `information_id`, `requirements`, `block`) VALUES
(1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `testing`
--

CREATE TABLE IF NOT EXISTS `testing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `information_id` int(11) NOT NULL,
  `education_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
(1, 'Комплекс курсов', NULL),
(2, 'Многоуровневые комплексы', 1),
(3, 'Тематические комплексы', 1),
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
  `dossier_id` int(11) NOT NULL,
  `login` char(40) NOT NULL,
  `password` char(40) NOT NULL,
  `status` char(40) NOT NULL,
  `block` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `dossier_id`, `login`, `password`, `status`, `block`) VALUES
(1, 0, 'admin', '123', 'admin', 0),
(2, 1, 'vasea', '12345', 'student', 0),
(3, 2, 'alla', '12345', 'teacher', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `variable`
--

CREATE TABLE IF NOT EXISTS `variable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questions_id` int(11) NOT NULL,
  `text` varchar(300) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
