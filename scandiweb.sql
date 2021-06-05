-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 05 2021 г., 18:08
-- Версия сервера: 5.6.41
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `scandiweb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` text NOT NULL,
  `id_type` int(5) NOT NULL,
  `type` text NOT NULL,
  `size` int(11) NOT NULL,
  `weight` varchar(11) NOT NULL,
  `height` varchar(11) NOT NULL,
  `width` varchar(11) NOT NULL,
  `length` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `price`, `id_type`, `type`, `size`, `weight`, `height`, `width`, `length`) VALUES
(1, 'JVC200123', 'Acme DISC', '1.00', 1, 'Size', 400, '0', '0', '', ''),
(2, 'JVC200124', 'Acme DISC 1', '2.00', 1, 'Size', 200, '0', '0', '', ''),
(3, 'GGWP0007', 'War and Peace', '20.00', 2, 'Weight', 0, '2', '0', '', ''),
(4, 'GGWP00071', 'War and Peace', '10.00', 2, 'Weight', 0, '1,5', '0', '', ''),
(5, 'TR120555', 'Chair', '40.00', 3, 'Dimension', 0, '0', '1,56', '0.3', '0.5'),
(6, 'TR120556', 'Table', '15.00', 3, 'Dimension', 0, '0', '0,56', '1.2', '0.2'),
(7, 'JVC213456', 'DISC', '2.00', 1, 'Size', 500, '0', '0', '', ''),
(8, 'GGWP0008', 'Book', '5.00', 2, 'Weight', 0, '3,8', '0', '', ''),
(9, 'TR965478', 'Chair', '13.50', 3, 'Dimension', 0, '0', '0.3', '0.4', '0.9'),
(10, 'GGW5874', 'Book', '4.25', 2, 'Weight', 0, '9,1', '0', '', ''),
(11, 'TRW', 'Table', '52.12', 3, 'Dimension', 0, '0', '1.3', '4.2', '6.3'),
(12, 'TR258963', 'Lamp', '23.23', 3, 'Dimension', 0, '0', '1.2', '5.0', '0.5');

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type`
--

INSERT INTO `type` (`id`, `category`) VALUES
(1, 'DVD'),
(2, 'Book'),
(3, 'Furniture');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
