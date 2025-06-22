-- phpMyAdmin SQL Dump
-- version 5.2.1-1.el8
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 23 2025 г., 05:04
-- Версия сервера: 8.0.41-32
-- Версия PHP: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `p514771_pets`
--

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_estonian_ci NOT NULL,
  `auth_key` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `errors` int NOT NULL,
  `code_email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `breed` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img_path` text NOT NULL,
  `date_created` date NOT NULL,
  `isblocked` tinyint(1) NOT NULL,
  `auth_key_hash` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `auth_key`, `errors`, `code_email`, `breed`, `color`, `description`, `img_path`, `date_created`, `isblocked`, `auth_key_hash`, `type`, `name`, `nickname`) VALUES
(1, 'ip557798@gmail.com', '$2y$10$g4Lpijf5/GZJNZFpLwzjzO3D7GM86p3rC7SQaLhZb9/hA9UNRyhBm', 'CtgpZlnlNfD7vzZ3ePRr', 0, '', 'golden retriver', 'gold', 'Hello! This is my profile', 'web/img/Proflie/67a72b69b5e23.jpeg', '2025-02-10', 0, '$2y$10$W8W2m48m.1XZXLrupwdtvezQl.CTZoqETzGDLn/1MIL.dBb1onsTW', 'dog', 'Tali', 'tali_dog'),
(37, 'jafjafjsj@gmail.com', '$2y$10$ozRrP91OYuveW0sg/pNzz.HgTDJOSIpKBxJGBwY2M32QBUdLcfeDu', 'yD0PsahJLNhkcdKk6ii7', 0, '', 'husky', 'White', 'I will publish some posts here', 'web/img/Proflie/659288af84a10.jpeg', '2025-02-12', 0, '$2y$10$Nty9GJy.Dn5wMwzCDgBPwuUu82wGszSHww0PuQKdzJ8hWdssnA8J2', 'dog', 'Mike', 'Mike_dog'),
(57, 'ip557799@gmail.com', '$2y$10$E6xr3VyrvxeHAbfGHuj4FO/dIcKQ8NdSuAX3sqgS.dDjZQIYQlcte', 'vdx0KFz1qtBKW9c9Oe9E', 0, '', 'golden retriver', 'Golden', 'This is my profile', 'web/img/Proflie/65ae01ecb48e0.jpeg', '2025-02-17', 0, '$2y$10$fOacD6YroXB.fN16lD1rre5MqK/5qNmOVhL6iwZAC2y8roVQW0Mkm', 'dog', 'Tali', 'tali_dog'),
(59, 'iliapevnev@sti.edu', '$2y$10$kISqtivl.ne4JOyUaEoMR.RftpzUcXv/AjczliMgvCGJIEk3wEAuK', 'PtqEit8z504TTqJ6S5bi', 0, '', 'golden retriver', 'Golden', 'This is my profile', 'web/img/Proflie/67cac27e43969.jpeg', '2025-03-07', 0, '$2y$10$Aj.NbXCapMbkDdvAliBYNOq57tOgFnY/0allu3a59VCuFYeb1Nh2W', 'dog', 'Mike', 'mikedog'),
(60, 'turtle_lover5798@gmail.com', '$2y$10$SPZs.bOnQ0klz9D8.lRLXORr958A3yEEhNDQ.EB3wDsadBH0348Yy', 'inwSmQpXO0VrAphssLuN', 0, '', 'no breed', 'Green', 'Turtle lover', 'web/img/Proflie/67cd257e6ab43.jpeg', '2025-03-09', 0, '$2y$10$tZQoC/DbKP8BnWLARw8vOu2wmprz1E76LFuykFqzQ5yGTptv/yS3q', 'turtle', 'Emily', 'Emily_turtle'),
(61, 'cats_lover5588@gmail.com', '$2y$10$oBdYPgtLtXNuZk1EELtoseTtvIfS9TUs.pPbf5ypWV8GzrXBdSKly', 'Iu3O0LqPe7GONVmYFDQw', 0, '', 'no breed', 'Orange', 'My vlog about cats', 'web/img/Proflie/67cd2d4bef68d.jpeg', '2025-03-09', 0, '$2y$10$.Rlx5Dex1k4p6vtOpSbAqevOfDzPZV1I6MB6T4gr/jC5CAOw1Tex6', 'cat', 'Jakson', 'Jakson_cat'),
(62, 'parrots_lover8899@gmail.com', '$2y$10$vardTpfmMO0wpkZ.nyd1Lur.Mf.ZhUgW8VITjY51rHWUGV4bpKy.y', 'gyfeRmTQdzEoIoywGyPH', 0, '', 'no breed', 'Red', 'My vlog about birds', 'web/img/Proflie/67cd2e5e6acb9.jpeg', '2025-03-09', 0, '$2y$10$/9fBnUjPszt3LLzWsI5lDOO/m463IKdgYSCkR1T.cpkKLkUa6Zvdu', 'bird', 'Harry', 'Harry_bird'),
(63, 'EspinuevaJm@gmail.com', '$2y$10$tlYKVHZlGeHocdlaEVvXmOuh74gdwI/fW2Ym4wqLMTOaZ5iG.wQZ.', 'PICHnqnXl7lhXuEzjT3N', 0, '', 'no breed', 'black', 'small', '', '2025-04-29', 0, '$2y$10$YR9O7Thn6naGEkhfFOrnherZcrOrSP7wbWN0A4SHxRAeLnqJVWeAi', 'dog', 'makki', 'tooo'),
(64, 'Espinuevamakmak@gmail.com', '$2y$10$k5mUMI.hrBZ70wxciO7PjuJLYWaj9ReBqB7cvEYMn7LRcyhzWP3mi', 'FfNCG65oDGvvK6SJ56to', 0, '', 'no breed', 'Black', 'Big', '', '2025-04-30', 0, '$2y$10$lkDHvoqr19Lk0wMFKea9ieWU7WKlrq74dDDvUus3wmatp1ruCdH5u', 'dog', 'Loffy', 'Lof'),
(65, 'petlover@gmail.com', '$2y$10$pN1QEMXzGEVYQ/yrSjfyyeytIYA2p94tiUYDnVZ1movNZuHnJTi2S', 'R8o2xZvFczQ2K4CYvnQx', 0, '', 'golden retriver', 'Gold', 'Hi! Welcome to my profile. I love pets', 'web/img/Proflie/68247db1d49d5.jpeg', '2025-05-14', 0, '$2y$10$SVN/fqnVuo.qnPMSe9Po/eZ5jAKBOjlP/x4rJW5/B0YKYVLCqHxZC', 'dog', 'Mike', 'Mike_dog');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
