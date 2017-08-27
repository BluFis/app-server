-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017-08-27 13:19:14
-- 服务器版本： 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `password` varchar(60) NOT NULL,
  `level` int(30) DEFAULT NULL,
  `score` int(30) DEFAULT NULL,
  `tryTimes` int(30) DEFAULT NULL,
  `lastLogin` datetime DEFAULT NULL,
  `rank` int(30) DEFAULT NULL,
  `timeSpent` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `level`, `score`, `tryTimes`, `lastLogin`, `rank`, `timeSpent`) VALUES
(15, '123123123', '123123123', '213123123', NULL, NULL, NULL, '2017-08-26 00:00:00', NULL, NULL),
(16, '123213', '12312312', '21312321331', NULL, NULL, NULL, '2017-08-26 00:00:00', NULL, NULL),
(17, '2w1ww21w', '21ww12w12w2', '1w21w21w12w21', NULL, NULL, NULL, '2017-08-26 00:00:00', NULL, NULL),
(19, '', '', '', NULL, NULL, NULL, '2017-08-26 00:00:00', NULL, NULL),
(20, 'wqeqwrqwr', 'qweqe', '', NULL, NULL, NULL, '2017-08-26 00:00:00', NULL, NULL),
(21, '2w3e4r', '1q2w3e', '1q2w3e', NULL, NULL, NULL, '2017-08-26 00:00:00', NULL, NULL),
(22, 'peter', '1q2w3e@sina.com', '1q2w3e', NULL, NULL, NULL, '2017-08-27 00:00:00', NULL, NULL),
(23, '1q2w3e4r2', 'dwdwneijcn2wi@sina.com', '1q2w3e4r\n', 12, 3244, 34, '2017-08-27 11:26:30', NULL, '"32:90"'),
(24, '12', '121', '1212\n', 0, 0, 0, NULL, NULL, '00:00'),
(25, '""', '""', '""\n', 0, 0, 0, NULL, NULL, '00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
