-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 10 2017 г., 18:20
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `cicms`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ci_links`
--

CREATE TABLE IF NOT EXISTS `ci_links` (
  `link_id` varchar(255) NOT NULL,
  `descr` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `clicks` int(11) DEFAULT '0',
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ci_pages`
--

CREATE TABLE IF NOT EXISTS `ci_pages` (
  `page_id` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` text,
  `date` int(11) DEFAULT NULL,
  `showed` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ci_pages`
--

INSERT INTO `ci_pages` (`page_id`, `title`, `text`, `date`, `showed`) VALUES
('index', 'Main page', '<p>Текст страницы</p>', 1442257410, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `ci_settings`
--

CREATE TABLE IF NOT EXISTS `ci_settings` (
  `param` varchar(100) NOT NULL DEFAULT '',
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`param`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ci_settings`
--

INSERT INTO `ci_settings` (`param`, `value`) VALUES
('cms_admin_login', 'admin'),
('cms_admin_pass', 'pass'),
('cms_per_page', '10');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
