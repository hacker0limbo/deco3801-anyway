-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 25, 2021 at 08:32 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deco3801`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`uID`, `username`, `password`, `email`, `gender`, `DOB`, `language`, `medicare_status`) VALUES
(4, '123', '$2y$10$F9kiq98EwYU12/lx49bDCuipcSQpd8fMcYXRRfFFOcQ1ZU8qOiDiO', '123@qq.com', '', '08-11-2021', 'Chinese', 'Visitor'),
(5, '234', '$2y$10$VSmrXimzgOEdBdkHQHdh0.N4Isg3C935KslpY4lppon11u5rSpDGO', '234@qq.com', '', '', '', ''),
(10, 'DemoUser', '$2y$10$rJVvagDcPuj1vgY9b7wGZO65r6sV1aHLZT5FYvNHeCGCouCnhnocC', 'crys7allll@gmail.com', '', '', '', ''),
(9, 'OnlineDoctor', '$2y$10$1uLaTRehqrWKdqw7MUCvy.V7EImR4p.QNJYXUTwRhKM3AzjqVYo7i', 'stephen.yin@outlook.com', '', '', '', ''),
(8, 'qwe', '$2y$10$ep/jovTFwLWQDf2LfhSsT.jr27XYq5WjDvMeGfZtg3vBNXSHOy1.2', 'qwe123@qq.com', 'Male', '11-10-2021', 'English', 'Visitor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `uID` (`uID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
