-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 31 2022 г., 12:52
-- Версия сервера: 5.7.33
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mrsk`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `sfl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `login`, `password`, `sfl`) VALUES
(1, 'denisto', '044a23cadb567653eb51d4eb40acaa88', 'Ефимов Денис Эдуардович');

-- --------------------------------------------------------

--
-- Структура таблицы `archive`
--

CREATE TABLE `archive` (
  `id` int(11) NOT NULL,
  `car_brand` varchar(50) DEFAULT NULL,
  `car_number` varchar(50) DEFAULT NULL,
  `car_type` varchar(50) DEFAULT NULL,
  `declarer_sfl` text,
  `filing_date` date DEFAULT NULL,
  `filing_time` time DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `route` time DEFAULT NULL,
  `filing_address` text,
  `passengers_count` int(11) DEFAULT NULL,
  `driver_sfl` text,
  `order_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `archive`
--

INSERT INTO `archive` (`id`, `car_brand`, `car_number`, `car_type`, `declarer_sfl`, `filing_date`, `filing_time`, `return_date`, `route`, `filing_address`, `passengers_count`, `driver_sfl`, `order_status`) VALUES
(1, 'Lada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Lada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `passengers`
--

CREATE TABLE `passengers` (
  `id` int(11) NOT NULL,
  `car_brand` varchar(50) DEFAULT NULL,
  `car_number` varchar(50) DEFAULT NULL,
  `car_type` varchar(50) DEFAULT NULL,
  `declarer_sfl` text NOT NULL,
  `filing_date` date DEFAULT NULL,
  `filing_time` time DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `return_time` time DEFAULT NULL,
  `route` varchar(50) DEFAULT NULL,
  `filing_address` text,
  `passengers_count` int(11) DEFAULT NULL,
  `driver_sfl` text NOT NULL,
  `order_status` varchar(50) DEFAULT 'Ожидание...',
  `is_archive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `passengers`
--

INSERT INTO `passengers` (`id`, `car_brand`, `car_number`, `car_type`, `declarer_sfl`, `filing_date`, `filing_time`, `return_date`, `return_time`, `route`, `filing_address`, `passengers_count`, `driver_sfl`, `order_status`, `is_archive`) VALUES
(10, 'Renault', '2123', 'Легковой', 'rfe', '2022-10-25', '17:49:00', '2022-10-25', '17:49:00', 'fefe', 'fefe', 2, 'rfe', 'Ожидание...', 1),
(13, 'Renault', '2123', 'Легковой', 'rfe', '2022-10-25', '17:49:00', '2022-10-25', '17:49:00', 'fefe', 'feferr', 2, 'rfe', 'Ожидание...', 0),
(14, 'BMW', '2123', 'Легковой', 'rfe', '2022-10-25', '17:49:00', '2022-10-25', '17:49:00', 'fefe', 'feferr', 2, 'rfe', 'Ожидание...', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `archive`
--
ALTER TABLE `archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `passengers`
--
ALTER TABLE `passengers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
