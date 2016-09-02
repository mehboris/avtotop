-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 24 2015 г., 01:01
-- Версия сервера: 5.5.25
-- Версия PHP: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `testua_site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `body` text NOT NULL,
  `img` varchar(254) NOT NULL,
  `link` varchar(256) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `body`, `img`, `link`, `created_date`, `user_id`) VALUES
(1, 'Porsche 911 GT3 RS проти Ferrari 458', 'Рідкісний момент. Швидкоплинний момент. Момент, коли Porsche 911 GT3 RS здається застарілим, безнадійно застарілим. Як?! Як машина із самою «чистої» керованістю без допоміжної електроніки, доступною для доріг загального користування може відчуватися старої, коли її в дію призводить новітній оппозітний 3.8-літровий мотор, потужністю 450 к.с., а шасі представляє собою, витвір інженерного мистецтва? А ось так. Ось так просто. Після Ferrari 458 Italia, GT3 здається застарілим.\r\n\r\nІ це не гіпербола: Ferrari 458 - не чергова допрацьована Berlinetta з новим V8. Це нова віха на шляху становлення Ferrari як виробника ультрасучасних машин. Це такий спорткар, який може те, що його однокласники - принаймні, більшість з них - навіть уві сні не бачили! Вона відчувається класово вище, якісно краще.\r\n\r\nВдосталь накатавшись на Ferrari, я, пересідаю в Porsche - куди ж ще. Тут встановлені опціонні адаптивні сидіння, але варто зробити застереження, що і стандартні «ковші» теж непогані. Перед водієм все звично і знайомо - блюдце тахометра і «полублюдца» інших приладів, зручний кермо трьохспиці і лаконічне торпедо без надмірностей. Все зроблено і підігнано дуже якісно, ​​органи управління розташовані інтуїтивно зрозуміло. Поскаржитися можна лише на те, що салон нуднуватий. Особливо це відчувається після феєрії салону Ferrari, але як би там не було: поворот самого простого ключа на Торпедо - і опозитна «шістка» оживає, агресивно ричачи з підвищенням обертів і галасуючи маховиком на холостих.\r\n\r\nНатиснувши на важенну педаль зчеплення до упору паралельно з гальмом, я кладу руку на зручний кулька важеля коробки передач, обшитий замшею, і включаю першу передачу (для цієї процедури потрібно докласти набагато більше зусиль, ніж у стандартному 911 Carrera). Відпускаю гальмо - і машина плавно починає рух.\r\n\r\nСаме в цей момент Porsche 911 GT3 відчувається чимось консервативним і несучасним в порівнянні з Ferrari 458 - начебто відбувається подорож у минуле, яке буяло трьома педалями і солідними важелями між двох сидінь. Хвала небесам, ще одна річ з минулого нікуди не поділася - класичний Поршевскій циферблат приладів. Він справляє враження частини серйозного автомобіля - на відміну від приладів Italia, які нагадують плід хворої фантазії 12-річного геймера: всюди TFT-дисплеї, безліч сенсорів і діаграм всього на світі ... Єдине ноу-хау в Porsche - це підказувач переключень у вигляді жовтої лампочки. А хіба потрібно ще щось?', 'event/porsch_vs_fer.jpg', 'porshevsfer.php', '2015-12-18 20:32:55', 1),
(2, 'іаві', 'аіваі', 'іваів', 'іваіва', '2015-12-18 20:57:23', 1),
(3, 'ййййййййй', 'ййййййййййй', 'ййййййй', 'ййй', '2015-12-18 20:57:23', 1),
(4, 'іаві', 'аіваі', 'іваів', 'іваіва', '2015-12-18 20:57:29', 1),
(5, 'ййййййййй', 'ййййййййййй', 'ййййййй', 'ййй', '2015-12-18 20:57:29', 1),
(40, 'ffff', 'ffff', '', 'ffff', '2015-12-20 19:26:58', 1),
(41, '', '', '', '', '2015-12-20 19:28:39', 1),
(42, '', '', '', '', '2015-12-20 19:38:36', 1),
(43, 'fdgdfg', 'gdfgdfg', '', 'fgdfgdf', '2015-12-20 19:42:08', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(255) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `icon_link` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `service`
--

INSERT INTO `service` (`id`, `p_name`, `lat`, `lng`, `icon_link`, `content`, `about`, `image`) VALUES
(1, 'MuscleGarage', 48.46336414, 35.0416714, 'icon/repair.png', '<img src=''img/MG.jpg''><h3>MuscleGarage <button onclick=''preview(0)''> >></button> </h3><button onclick=''way(0)''>GO!</button>', 'грфик роботи 24 години', 'img/MG.jpg'),
(2, 'VDavidich', 48.45528523, 35.0380075, 'icon/repair.png', '<img src=''img/VDavidich.jpg''><h3>VDavidich</h3><button onclick=''preview(1)''> >></button><button onclick=''way(1)''>GO!</button>', 'графік роботи з 9 до 18', 'img/VDavidich.jpg'),
(3, 'Maserati', 48.43566426, 35.05363941, 'icon/repair.png', '<img src=''img/Maserati.png''><h3>Maserati</h3><button onclick=''preview(2)''> >></button><button onclick=''way(2)''>GO!</button>', 'гваыы', 'img/Maserati.png'),
(4, 'Porsche', 48.46042941, 35.00797749, 'icon/repair.png', '<img src=''img/Porsche.png''><h3>Porsche</h3><button onclick=''preview(3)''> >></button><button onclick=''way(3)''>GO!</button>', 'dfd', 'img/Porsche.png'),
(5, 'Infiniti', 48.47448609, 35.02540112, 'icon/repair.png', '<img src=''img/Infiniti.png''><h3>Infiniti</h3><button onclick=''preview(4)''> >></button><button onclick=''way(4)''>GO!</button>', 'fsaf', 'img/Infiniti.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `car` text NOT NULL,
  `about` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `car`, `about`) VALUES
(1, 'admin@abc.com', 'Admin', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', ''),
(36, '111d1@fdfd.dfd', 'Mehboris', '698d51a19d8a121ce581499d7b701668', '111', '1'),
(37, 'nana@nana.com', '112121', '698d51a19d8a121ce581499d7b701668', '2121212', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
