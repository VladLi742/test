-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 27 2017 г., 02:30
-- Версия сервера: 5.5.57
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pizza`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dough`
--

CREATE TABLE `dough` (
  `id` int(11) NOT NULL,
  `ingredient` char(32) COLLATE utf8mb4_bin NOT NULL,
  `summary` text COLLATE utf8mb4_bin NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `dough`
--

INSERT INTO `dough` (`id`, `ingredient`, `summary`, `price`) VALUES
(1, 'Классика', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur risus ut erat dictum aliquam. Morbi non dapibus enim, ut blandit justo. Donec diam tortor, eleifend quis urna eget, fermentum ullamcorper nisl. Praesent eu suscipit mi. Quisque fringilla lacus feugiat, blandit nisl nec, ullamcorper mauris. Nam lacus arcu, pulvinar nec vestibulum ornare, porttitor vel lorem. In luctus ante et augue aliquam, at tempor metus efficitur. Donec tincidunt ante vitae est hendrerit imperdiet id at ante. Nullam rhoncus vitae sapien non sollicitudin. Phasellus a libero vehicula, vestibulum nisi vitae, sodales velit. Aenean finibus est eget nunc rhoncus, vitae imperdiet erat faucibus. In sodales velit vulputate metus commodo vulputate. Nulla faucibus est quis erat ultrices consectetur. Vivamus tempus tempor finibus. Suspendisse consequat vehicula turpis, quis tincidunt orci convallis sed.\r\n\r\nMauris sagittis in nibh ut condimentum. Quisque sit amet eros congue, dignissim est ut, faucibus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse dapibus ipsum vel elit pulvinar feugiat. Etiam tempus urna at tincidunt accumsan. Nulla dignissim libero dui, viverra accumsan ligula lobortis vitae. Curabitur odio felis, pulvinar vitae semper sit amet, porta eu ligula.', 100),
(2, 'Тонкое', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur risus ut erat dictum aliquam. Morbi non dapibus enim, ut blandit justo. Donec diam tortor, eleifend quis urna eget, fermentum ullamcorper nisl. Praesent eu suscipit mi. Quisque fringilla lacus feugiat, blandit nisl nec, ullamcorper mauris. Nam lacus arcu, pulvinar nec vestibulum ornare, porttitor vel lorem. In luctus ante et augue aliquam, at tempor metus efficitur. Donec tincidunt ante vitae est hendrerit imperdiet id at ante. Nullam rhoncus vitae sapien non sollicitudin. Phasellus a libero vehicula, vestibulum nisi vitae, sodales velit. Aenean finibus est eget nunc rhoncus, vitae imperdiet erat faucibus. In sodales velit vulputate metus commodo vulputate. Nulla faucibus est quis erat ultrices consectetur. Vivamus tempus tempor finibus. Suspendisse consequat vehicula turpis, quis tincidunt orci convallis sed.\r\n\r\nMauris sagittis in nibh ut condimentum. Quisque sit amet eros congue, dignissim est ut, faucibus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse dapibus ipsum vel elit pulvinar feugiat. Etiam tempus urna at tincidunt accumsan. Nulla dignissim libero dui, viverra accumsan ligula lobortis vitae. Curabitur odio felis, pulvinar vitae semper sit amet, porta eu ligula.', 115),
(3, 'Нью-Йорк', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur risus ut erat dictum aliquam. Morbi non dapibus enim, ut blandit justo. Donec diam tortor, eleifend quis urna eget, fermentum ullamcorper nisl. Praesent eu suscipit mi. Quisque fringilla lacus feugiat, blandit nisl nec, ullamcorper mauris. Nam lacus arcu, pulvinar nec vestibulum ornare, porttitor vel lorem. In luctus ante et augue aliquam, at tempor metus efficitur. Donec tincidunt ante vitae est hendrerit imperdiet id at ante. Nullam rhoncus vitae sapien non sollicitudin. Phasellus a libero vehicula, vestibulum nisi vitae, sodales velit. Aenean finibus est eget nunc rhoncus, vitae imperdiet erat faucibus. In sodales velit vulputate metus commodo vulputate. Nulla faucibus est quis erat ultrices consectetur. Vivamus tempus tempor finibus. Suspendisse consequat vehicula turpis, quis tincidunt orci convallis sed.\r\n\r\nMauris sagittis in nibh ut condimentum. Quisque sit amet eros congue, dignissim est ut, faucibus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse dapibus ipsum vel elit pulvinar feugiat. Etiam tempus urna at tincidunt accumsan. Nulla dignissim libero dui, viverra accumsan ligula lobortis vitae. Curabitur odio felis, pulvinar vitae semper sit amet, porta eu ligula.', 130),
(4, 'Неополитан', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur risus ut erat dictum aliquam. Morbi non dapibus enim, ut blandit justo. Donec diam tortor, eleifend quis urna eget, fermentum ullamcorper nisl. Praesent eu suscipit mi. Quisque fringilla lacus feugiat, blandit nisl nec, ullamcorper mauris. Nam lacus arcu, pulvinar nec vestibulum ornare, porttitor vel lorem. In luctus ante et augue aliquam, at tempor metus efficitur. Donec tincidunt ante vitae est hendrerit imperdiet id at ante. Nullam rhoncus vitae sapien non sollicitudin. Phasellus a libero vehicula, vestibulum nisi vitae, sodales velit. Aenean finibus est eget nunc rhoncus, vitae imperdiet erat faucibus. In sodales velit vulputate metus commodo vulputate. Nulla faucibus est quis erat ultrices consectetur. Vivamus tempus tempor finibus. Suspendisse consequat vehicula turpis, quis tincidunt orci convallis sed.\r\n\r\nMauris sagittis in nibh ut condimentum. Quisque sit amet eros congue, dignissim est ut, faucibus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse dapibus ipsum vel elit pulvinar feugiat. Etiam tempus urna at tincidunt accumsan. Nulla dignissim libero dui, viverra accumsan ligula lobortis vitae. Curabitur odio felis, pulvinar vitae semper sit amet, porta eu ligula.', 150),
(5, 'Сицилия', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur risus ut erat dictum aliquam. Morbi non dapibus enim, ut blandit justo. Donec diam tortor, eleifend quis urna eget, fermentum ullamcorper nisl. Praesent eu suscipit mi. Quisque fringilla lacus feugiat, blandit nisl nec, ullamcorper mauris. Nam lacus arcu, pulvinar nec vestibulum ornare, porttitor vel lorem. In luctus ante et augue aliquam, at tempor metus efficitur. Donec tincidunt ante vitae est hendrerit imperdiet id at ante. Nullam rhoncus vitae sapien non sollicitudin. Phasellus a libero vehicula, vestibulum nisi vitae, sodales velit. Aenean finibus est eget nunc rhoncus, vitae imperdiet erat faucibus. In sodales velit vulputate metus commodo vulputate. Nulla faucibus est quis erat ultrices consectetur. Vivamus tempus tempor finibus. Suspendisse consequat vehicula turpis, quis tincidunt orci convallis sed.\r\n\r\nMauris sagittis in nibh ut condimentum. Quisque sit amet eros congue, dignissim est ut, faucibus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse dapibus ipsum vel elit pulvinar feugiat. Etiam tempus urna at tincidunt accumsan. Nulla dignissim libero dui, viverra accumsan ligula lobortis vitae. Curabitur odio felis, pulvinar vitae semper sit amet, porta eu ligula.', 175),
(6, 'Чикаго', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur risus ut erat dictum aliquam. Morbi non dapibus enim, ut blandit justo. Donec diam tortor, eleifend quis urna eget, fermentum ullamcorper nisl. Praesent eu suscipit mi. Quisque fringilla lacus feugiat, blandit nisl nec, ullamcorper mauris. Nam lacus arcu, pulvinar nec vestibulum ornare, porttitor vel lorem. In luctus ante et augue aliquam, at tempor metus efficitur. Donec tincidunt ante vitae est hendrerit imperdiet id at ante. Nullam rhoncus vitae sapien non sollicitudin. Phasellus a libero vehicula, vestibulum nisi vitae, sodales velit. Aenean finibus est eget nunc rhoncus, vitae imperdiet erat faucibus. In sodales velit vulputate metus commodo vulputate. Nulla faucibus est quis erat ultrices consectetur. Vivamus tempus tempor finibus. Suspendisse consequat vehicula turpis, quis tincidunt orci convallis sed.\r\n\r\nMauris sagittis in nibh ut condimentum. Quisque sit amet eros congue, dignissim est ut, faucibus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse dapibus ipsum vel elit pulvinar feugiat. Etiam tempus urna at tincidunt accumsan. Nulla dignissim libero dui, viverra accumsan ligula lobortis vitae. Curabitur odio felis, pulvinar vitae semper sit amet, porta eu ligula.', 200);

-- --------------------------------------------------------

--
-- Структура таблицы `filling`
--

CREATE TABLE `filling` (
  `id` int(11) NOT NULL,
  `ingredient` char(32) COLLATE utf8mb4_bin NOT NULL,
  `summary` text COLLATE utf8mb4_bin NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `filling`
--

INSERT INTO `filling` (`id`, `ingredient`, `summary`, `price`) VALUES
(1, 'Мясная', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur risus ut erat dictum aliquam. Morbi non dapibus enim, ut blandit justo. Donec diam tortor, eleifend quis urna eget, fermentum ullamcorper nisl. Praesent eu suscipit mi. Quisque fringilla lacus feugiat, blandit nisl nec, ullamcorper mauris. Nam lacus arcu, pulvinar nec vestibulum ornare, porttitor vel lorem. In luctus ante et augue aliquam, at tempor metus efficitur. Donec tincidunt ante vitae est hendrerit imperdiet id at ante. Nullam rhoncus vitae sapien non sollicitudin. Phasellus a libero vehicula, vestibulum nisi vitae, sodales velit. Aenean finibus est eget nunc rhoncus, vitae imperdiet erat faucibus. In sodales velit vulputate metus commodo vulputate. Nulla faucibus est quis erat ultrices consectetur. Vivamus tempus tempor finibus. Suspendisse consequat vehicula turpis, quis tincidunt orci convallis sed.\r\n\r\nMauris sagittis in nibh ut condimentum. Quisque sit amet eros congue, dignissim est ut, faucibus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse dapibus ipsum vel elit pulvinar feugiat. Etiam tempus urna at tincidunt accumsan. Nulla dignissim libero dui, viverra accumsan ligula lobortis vitae. Curabitur odio felis, pulvinar vitae semper sit amet, porta eu ligula.', 100),
(2, 'Рыбная', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur risus ut erat dictum aliquam. Morbi non dapibus enim, ut blandit justo. Donec diam tortor, eleifend quis urna eget, fermentum ullamcorper nisl. Praesent eu suscipit mi. Quisque fringilla lacus feugiat, blandit nisl nec, ullamcorper mauris. Nam lacus arcu, pulvinar nec vestibulum ornare, porttitor vel lorem. In luctus ante et augue aliquam, at tempor metus efficitur. Donec tincidunt ante vitae est hendrerit imperdiet id at ante. Nullam rhoncus vitae sapien non sollicitudin. Phasellus a libero vehicula, vestibulum nisi vitae, sodales velit. Aenean finibus est eget nunc rhoncus, vitae imperdiet erat faucibus. In sodales velit vulputate metus commodo vulputate. Nulla faucibus est quis erat ultrices consectetur. Vivamus tempus tempor finibus. Suspendisse consequat vehicula turpis, quis tincidunt orci convallis sed.\r\n\r\nMauris sagittis in nibh ut condimentum. Quisque sit amet eros congue, dignissim est ut, faucibus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse dapibus ipsum vel elit pulvinar feugiat. Etiam tempus urna at tincidunt accumsan. Nulla dignissim libero dui, viverra accumsan ligula lobortis vitae. Curabitur odio felis, pulvinar vitae semper sit amet, porta eu ligula.', 150),
(3, 'Вегетарианская', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur risus ut erat dictum aliquam. Morbi non dapibus enim, ut blandit justo. Donec diam tortor, eleifend quis urna eget, fermentum ullamcorper nisl. Praesent eu suscipit mi. Quisque fringilla lacus feugiat, blandit nisl nec, ullamcorper mauris. Nam lacus arcu, pulvinar nec vestibulum ornare, porttitor vel lorem. In luctus ante et augue aliquam, at tempor metus efficitur. Donec tincidunt ante vitae est hendrerit imperdiet id at ante. Nullam rhoncus vitae sapien non sollicitudin. Phasellus a libero vehicula, vestibulum nisi vitae, sodales velit. Aenean finibus est eget nunc rhoncus, vitae imperdiet erat faucibus. In sodales velit vulputate metus commodo vulputate. Nulla faucibus est quis erat ultrices consectetur. Vivamus tempus tempor finibus. Suspendisse consequat vehicula turpis, quis tincidunt orci convallis sed.\r\n\r\nMauris sagittis in nibh ut condimentum. Quisque sit amet eros congue, dignissim est ut, faucibus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse dapibus ipsum vel elit pulvinar feugiat. Etiam tempus urna at tincidunt accumsan. Nulla dignissim libero dui, viverra accumsan ligula lobortis vitae. Curabitur odio felis, pulvinar vitae semper sit amet, porta eu ligula.', 200),
(4, 'Всё вместе!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur risus ut erat dictum aliquam. Morbi non dapibus enim, ut blandit justo. Donec diam tortor, eleifend quis urna eget, fermentum ullamcorper nisl. Praesent eu suscipit mi. Quisque fringilla lacus feugiat, blandit nisl nec, ullamcorper mauris. Nam lacus arcu, pulvinar nec vestibulum ornare, porttitor vel lorem. In luctus ante et augue aliquam, at tempor metus efficitur. Donec tincidunt ante vitae est hendrerit imperdiet id at ante. Nullam rhoncus vitae sapien non sollicitudin. Phasellus a libero vehicula, vestibulum nisi vitae, sodales velit. Aenean finibus est eget nunc rhoncus, vitae imperdiet erat faucibus. In sodales velit vulputate metus commodo vulputate. Nulla faucibus est quis erat ultrices consectetur. Vivamus tempus tempor finibus. Suspendisse consequat vehicula turpis, quis tincidunt orci convallis sed.\r\n\r\nMauris sagittis in nibh ut condimentum. Quisque sit amet eros congue, dignissim est ut, faucibus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse dapibus ipsum vel elit pulvinar feugiat. Etiam tempus urna at tincidunt accumsan. Nulla dignissim libero dui, viverra accumsan ligula lobortis vitae. Curabitur odio felis, pulvinar vitae semper sit amet, porta eu ligula.', 300);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` char(32) COLLATE utf8mb4_bin NOT NULL,
  `ingredient` text COLLATE utf8mb4_bin NOT NULL,
  `price` int(11) NOT NULL,
  `delivery_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `ingredient`, `price`, `delivery_time`) VALUES
(1, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `sause`
--

CREATE TABLE `sause` (
  `id` int(11) NOT NULL,
  `ingredient` char(32) COLLATE utf8mb4_bin NOT NULL,
  `summary` text COLLATE utf8mb4_bin NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `sause`
--

INSERT INTO `sause` (`id`, `ingredient`, `summary`, `price`) VALUES
(1, 'Томатный соус', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur risus ut erat dictum aliquam. Morbi non dapibus enim, ut blandit justo. Donec diam tortor, eleifend quis urna eget, fermentum ullamcorper nisl. Praesent eu suscipit mi. Quisque fringilla lacus feugiat, blandit nisl nec, ullamcorper mauris. Nam lacus arcu, pulvinar nec vestibulum ornare, porttitor vel lorem. In luctus ante et augue aliquam, at tempor metus efficitur. Donec tincidunt ante vitae est hendrerit imperdiet id at ante. Nullam rhoncus vitae sapien non sollicitudin. Phasellus a libero vehicula, vestibulum nisi vitae, sodales velit. Aenean finibus est eget nunc rhoncus, vitae imperdiet erat faucibus. In sodales velit vulputate metus commodo vulputate. Nulla faucibus est quis erat ultrices consectetur. Vivamus tempus tempor finibus. Suspendisse consequat vehicula turpis, quis tincidunt orci convallis sed.\r\n\r\nMauris sagittis in nibh ut condimentum. Quisque sit amet eros congue, dignissim est ut, faucibus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse dapibus ipsum vel elit pulvinar feugiat. Etiam tempus urna at tincidunt accumsan. Nulla dignissim libero dui, viverra accumsan ligula lobortis vitae. Curabitur odio felis, pulvinar vitae semper sit amet, porta eu ligula.', 60),
(2, 'Сырный соус', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur risus ut erat dictum aliquam. Morbi non dapibus enim, ut blandit justo. Donec diam tortor, eleifend quis urna eget, fermentum ullamcorper nisl. Praesent eu suscipit mi. Quisque fringilla lacus feugiat, blandit nisl nec, ullamcorper mauris. Nam lacus arcu, pulvinar nec vestibulum ornare, porttitor vel lorem. In luctus ante et augue aliquam, at tempor metus efficitur. Donec tincidunt ante vitae est hendrerit imperdiet id at ante. Nullam rhoncus vitae sapien non sollicitudin. Phasellus a libero vehicula, vestibulum nisi vitae, sodales velit. Aenean finibus est eget nunc rhoncus, vitae imperdiet erat faucibus. In sodales velit vulputate metus commodo vulputate. Nulla faucibus est quis erat ultrices consectetur. Vivamus tempus tempor finibus. Suspendisse consequat vehicula turpis, quis tincidunt orci convallis sed.\r\n\r\nMauris sagittis in nibh ut condimentum. Quisque sit amet eros congue, dignissim est ut, faucibus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse dapibus ipsum vel elit pulvinar feugiat. Etiam tempus urna at tincidunt accumsan. Nulla dignissim libero dui, viverra accumsan ligula lobortis vitae. Curabitur odio felis, pulvinar vitae semper sit amet, porta eu ligula.', 75);

-- --------------------------------------------------------

--
-- Структура таблицы `total_ingredient`
--

CREATE TABLE `total_ingredient` (
  `id` int(11) NOT NULL,
  `ingredient` text COLLATE utf8mb4_bin NOT NULL,
  `summary` text COLLATE utf8mb4_bin NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `total_ingredient`
--

INSERT INTO `total_ingredient` (`id`, `ingredient`, `summary`, `price`) VALUES
(1, 'Классика', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur risus ut erat dictum aliquam. Morbi non dapibus enim, ut blandit justo. Donec diam tortor, eleifend quis urna eget, fermentum ullamcorper nisl. Praesent eu suscipit mi. Quisque fringilla lacus feugiat, blandit nisl nec, ullamcorper mauris. Nam lacus arcu, pulvinar nec vestibulum ornare, porttitor vel lorem. In luctus ante et augue aliquam, at tempor metus efficitur. Donec tincidunt ante vitae est hendrerit imperdiet id at ante. Nullam rhoncus vitae sapien non sollicitudin. Phasellus a libero vehicula, vestibulum nisi vitae, sodales velit. Aenean finibus est eget nunc rhoncus, vitae imperdiet erat faucibus. In sodales velit vulputate metus commodo vulputate. Nulla faucibus est quis erat ultrices consectetur. Vivamus tempus tempor finibus. Suspendisse consequat vehicula turpis, quis tincidunt orci convallis sed.', 100),
(2, 'Тонкое', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur risus ut erat dictum aliquam. Morbi non dapibus enim, ut blandit justo. Donec diam tortor, eleifend quis urna eget, fermentum ullamcorper nisl. Praesent eu suscipit mi. Quisque fringilla lacus feugiat, blandit nisl nec, ullamcorper mauris. Nam lacus arcu, pulvinar nec vestibulum ornare, porttitor vel lorem. In luctus ante et augue aliquam, at tempor metus efficitur. Donec tincidunt ante vitae est hendrerit imperdiet id at ante. Nullam rhoncus vitae sapien non sollicitudin. Phasellus a libero vehicula, vestibulum nisi vitae, sodales velit. Aenean finibus est eget nunc rhoncus, vitae imperdiet erat faucibus. In sodales velit vulputate metus commodo vulputate. Nulla faucibus est quis erat ultrices consectetur. Vivamus tempus tempor finibus. Suspendisse consequat vehicula turpis, quis tincidunt orci convallis sed.', 115),
(3, 'Нью-Йорк', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur risus ut erat dictum aliquam. Morbi non dapibus enim, ut blandit justo. Donec diam tortor, eleifend quis urna eget, fermentum ullamcorper nisl. Praesent eu suscipit mi. Quisque fringilla lacus feugiat, blandit nisl nec, ullamcorper mauris. Nam lacus arcu, pulvinar nec vestibulum ornare, porttitor vel lorem. In luctus ante et augue aliquam, at tempor metus efficitur. Donec tincidunt ante vitae est hendrerit imperdiet id at ante. Nullam rhoncus vitae sapien non sollicitudin. Phasellus a libero vehicula, vestibulum nisi vitae, sodales velit. Aenean finibus est eget nunc rhoncus, vitae imperdiet erat faucibus. In sodales velit vulputate metus commodo vulputate. Nulla faucibus est quis erat ultrices consectetur. Vivamus tempus tempor finibus. Suspendisse consequat vehicula turpis, quis tincidunt orci convallis sed.', 130),
(4, 'Неополитан', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur risus ut erat dictum aliquam. Morbi non dapibus enim, ut blandit justo. Donec diam tortor, eleifend quis urna eget, fermentum ullamcorper nisl. Praesent eu suscipit mi. Quisque fringilla lacus feugiat, blandit nisl nec, ullamcorper mauris. Nam lacus arcu, pulvinar nec vestibulum ornare, porttitor vel lorem. In luctus ante et augue aliquam, at tempor metus efficitur. Donec tincidunt ante vitae est hendrerit imperdiet id at ante. Nullam rhoncus vitae sapien non sollicitudin. Phasellus a libero vehicula, vestibulum nisi vitae, sodales velit. Aenean finibus est eget nunc rhoncus, vitae imperdiet erat faucibus. In sodales velit vulputate metus commodo vulputate. Nulla faucibus est quis erat ultrices consectetur. Vivamus tempus tempor finibus. Suspendisse consequat vehicula turpis, quis tincidunt orci convallis sed.', 150),
(5, 'Сицилия', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur risus ut erat dictum aliquam. Morbi non dapibus enim, ut blandit justo. Donec diam tortor, eleifend quis urna eget, fermentum ullamcorper nisl. Praesent eu suscipit mi. Quisque fringilla lacus feugiat, blandit nisl nec, ullamcorper mauris. Nam lacus arcu, pulvinar nec vestibulum ornare, porttitor vel lorem. In luctus ante et augue aliquam, at tempor metus efficitur. Donec tincidunt ante vitae est hendrerit imperdiet id at ante. Nullam rhoncus vitae sapien non sollicitudin. Phasellus a libero vehicula, vestibulum nisi vitae, sodales velit. Aenean finibus est eget nunc rhoncus, vitae imperdiet erat faucibus. In sodales velit vulputate metus commodo vulputate. Nulla faucibus est quis erat ultrices consectetur. Vivamus tempus tempor finibus. Suspendisse consequat vehicula turpis, quis tincidunt orci convallis sed.', 175),
(6, 'Чикаго', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur risus ut erat dictum aliquam. Morbi non dapibus enim, ut blandit justo. Donec diam tortor, eleifend quis urna eget, fermentum ullamcorper nisl. Praesent eu suscipit mi. Quisque fringilla lacus feugiat, blandit nisl nec, ullamcorper mauris. Nam lacus arcu, pulvinar nec vestibulum ornare, porttitor vel lorem. In luctus ante et augue aliquam, at tempor metus efficitur. Donec tincidunt ante vitae est hendrerit imperdiet id at ante. Nullam rhoncus vitae sapien non sollicitudin. Phasellus a libero vehicula, vestibulum nisi vitae, sodales velit. Aenean finibus est eget nunc rhoncus, vitae imperdiet erat faucibus. In sodales velit vulputate metus commodo vulputate. Nulla faucibus est quis erat ultrices consectetur. Vivamus tempus tempor finibus. Suspendisse consequat vehicula turpis, quis tincidunt orci convallis sed.', 200),
(7, 'Томатный соус', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur risus ut erat dictum aliquam. Morbi non dapibus enim, ut blandit justo. Donec diam tortor, eleifend quis urna eget, fermentum ullamcorper nisl. Praesent eu suscipit mi. Quisque fringilla lacus feugiat, blandit nisl nec, ullamcorper mauris. Nam lacus arcu, pulvinar nec vestibulum ornare, porttitor vel lorem. In luctus ante et augue aliquam, at tempor metus efficitur. Donec tincidunt ante vitae est hendrerit imperdiet id at ante. Nullam rhoncus vitae sapien non sollicitudin. Phasellus a libero vehicula, vestibulum nisi vitae, sodales velit. Aenean finibus est eget nunc rhoncus, vitae imperdiet erat faucibus. In sodales velit vulputate metus commodo vulputate. Nulla faucibus est quis erat ultrices consectetur. Vivamus tempus tempor finibus. Suspendisse consequat vehicula turpis, quis tincidunt orci convallis sed.', 60),
(8, 'Сырный соус', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur risus ut erat dictum aliquam. Morbi non dapibus enim, ut blandit justo. Donec diam tortor, eleifend quis urna eget, fermentum ullamcorper nisl. Praesent eu suscipit mi. Quisque fringilla lacus feugiat, blandit nisl nec, ullamcorper mauris. Nam lacus arcu, pulvinar nec vestibulum ornare, porttitor vel lorem. In luctus ante et augue aliquam, at tempor metus efficitur. Donec tincidunt ante vitae est hendrerit imperdiet id at ante. Nullam rhoncus vitae sapien non sollicitudin. Phasellus a libero vehicula, vestibulum nisi vitae, sodales velit. Aenean finibus est eget nunc rhoncus, vitae imperdiet erat faucibus. In sodales velit vulputate metus commodo vulputate. Nulla faucibus est quis erat ultrices consectetur. Vivamus tempus tempor finibus. Suspendisse consequat vehicula turpis, quis tincidunt orci convallis sed.', 75),
(9, 'Мясная', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur risus ut erat dictum aliquam. Morbi non dapibus enim, ut blandit justo. Donec diam tortor, eleifend quis urna eget, fermentum ullamcorper nisl. Praesent eu suscipit mi. Quisque fringilla lacus feugiat, blandit nisl nec, ullamcorper mauris. Nam lacus arcu, pulvinar nec vestibulum ornare, porttitor vel lorem. In luctus ante et augue aliquam, at tempor metus efficitur. Donec tincidunt ante vitae est hendrerit imperdiet id at ante. Nullam rhoncus vitae sapien non sollicitudin. Phasellus a libero vehicula, vestibulum nisi vitae, sodales velit. Aenean finibus est eget nunc rhoncus, vitae imperdiet erat faucibus. In sodales velit vulputate metus commodo vulputate. Nulla faucibus est quis erat ultrices consectetur. Vivamus tempus tempor finibus. Suspendisse consequat vehicula turpis, quis tincidunt orci convallis sed.', 100),
(10, 'Рыбная', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur risus ut erat dictum aliquam. Morbi non dapibus enim, ut blandit justo. Donec diam tortor, eleifend quis urna eget, fermentum ullamcorper nisl. Praesent eu suscipit mi. Quisque fringilla lacus feugiat, blandit nisl nec, ullamcorper mauris. Nam lacus arcu, pulvinar nec vestibulum ornare, porttitor vel lorem. In luctus ante et augue aliquam, at tempor metus efficitur. Donec tincidunt ante vitae est hendrerit imperdiet id at ante. Nullam rhoncus vitae sapien non sollicitudin. Phasellus a libero vehicula, vestibulum nisi vitae, sodales velit. Aenean finibus est eget nunc rhoncus, vitae imperdiet erat faucibus. In sodales velit vulputate metus commodo vulputate. Nulla faucibus est quis erat ultrices consectetur. Vivamus tempus tempor finibus. Suspendisse consequat vehicula turpis, quis tincidunt orci convallis sed.', 150),
(11, 'Вегетарианская', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur risus ut erat dictum aliquam. Morbi non dapibus enim, ut blandit justo. Donec diam tortor, eleifend quis urna eget, fermentum ullamcorper nisl. Praesent eu suscipit mi. Quisque fringilla lacus feugiat, blandit nisl nec, ullamcorper mauris. Nam lacus arcu, pulvinar nec vestibulum ornare, porttitor vel lorem. In luctus ante et augue aliquam, at tempor metus efficitur. Donec tincidunt ante vitae est hendrerit imperdiet id at ante. Nullam rhoncus vitae sapien non sollicitudin. Phasellus a libero vehicula, vestibulum nisi vitae, sodales velit. Aenean finibus est eget nunc rhoncus, vitae imperdiet erat faucibus. In sodales velit vulputate metus commodo vulputate. Nulla faucibus est quis erat ultrices consectetur. Vivamus tempus tempor finibus. Suspendisse consequat vehicula turpis, quis tincidunt orci convallis sed.', 200),
(12, 'Всё вместе!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur risus ut erat dictum aliquam. Morbi non dapibus enim, ut blandit justo. Donec diam tortor, eleifend quis urna eget, fermentum ullamcorper nisl. Praesent eu suscipit mi. Quisque fringilla lacus feugiat, blandit nisl nec, ullamcorper mauris. Nam lacus arcu, pulvinar nec vestibulum ornare, porttitor vel lorem. In luctus ante et augue aliquam, at tempor metus efficitur. Donec tincidunt ante vitae est hendrerit imperdiet id at ante. Nullam rhoncus vitae sapien non sollicitudin. Phasellus a libero vehicula, vestibulum nisi vitae, sodales velit. Aenean finibus est eget nunc rhoncus, vitae imperdiet erat faucibus. In sodales velit vulputate metus commodo vulputate. Nulla faucibus est quis erat ultrices consectetur. Vivamus tempus tempor finibus. Suspendisse consequat vehicula turpis, quis tincidunt orci convallis sed.', 300);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dough`
--
ALTER TABLE `dough`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredient` (`ingredient`),
  ADD KEY `price` (`price`);

--
-- Индексы таблицы `filling`
--
ALTER TABLE `filling`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sause`
--
ALTER TABLE `sause`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `total_ingredient`
--
ALTER TABLE `total_ingredient`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dough`
--
ALTER TABLE `dough`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `filling`
--
ALTER TABLE `filling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `sause`
--
ALTER TABLE `sause`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `total_ingredient`
--
ALTER TABLE `total_ingredient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
