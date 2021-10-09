-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2021-10-09 21:44:25
-- 服务器版本： 10.4.20-MariaDB
-- PHP 版本： 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `deco3801`
--

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `uID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `DOB` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL,
  `medicare_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`uID`, `username`, `password`, `email`, `gender`, `DOB`, `language`, `medicare_status`) VALUES
(4, '123', '$2y$10$F9kiq98EwYU12/lx49bDCuipcSQpd8fMcYXRRfFFOcQ1ZU8qOiDiO', '123@qq.com', 'Female', '11-11-2021', 'Chinese', 'Student'),
(5, '234', '$2y$10$VSmrXimzgOEdBdkHQHdh0.N4Isg3C935KslpY4lppon11u5rSpDGO', '234@qq.com', '', '', '', ''),
(8, 'qwe', '$2y$10$ep/jovTFwLWQDf2LfhSsT.jr27XYq5WjDvMeGfZtg3vBNXSHOy1.2', 'qwe123@qq.com', 'Male', '11-10-2021', 'English', 'Visitor');

--
-- 转储表的索引
--

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `uID` (`uID`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
