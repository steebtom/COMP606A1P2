-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 10, 2019 at 11:05 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsignup`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bid` int(10) NOT NULL,
  `usrid` int(11) NOT NULL,
  `msg` varchar(20) NOT NULL,
  `slot` varchar(10) NOT NULL,
  `bdate` varchar(16) NOT NULL,
  `descrip` varchar(200) NOT NULL,
  `info1` varchar(5) NOT NULL,
  `info2` varchar(5) NOT NULL,
  `btime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bid`, `usrid`, `msg`, `slot`, `bdate`, `descrip`, `info1`, `info2`, `btime`) VALUES
(10, 5, 'Massage 1', '09 AM', '2019-04-27', 'dfghjkvbn', 'yes', 'no', '2019-04-10 07:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usrid` int(11) NOT NULL,
  `uname` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `pwd` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usrid`, `uname`, `email`, `pwd`) VALUES
(3, 'user121', 'user121@gmail.com', '$2y$10$KV7dA2tqJLuPmv0jCdtLAOWZlgEAG7QompDaq/vdFIPeGbnOmpRam'),
(4, 'uwekfytkygweif', 'wefgkkg@gmail.com', '$2y$10$VLoeFk5v7pmyY6BUvUyffePtozfTX8EgEH2pmM/GNgxuqlSSv9wpW'),
(5, 'user123', 'user123@gmail.com', '$2y$10$JNci11KV4FXkIG4HyTbfRO7HsRVLA0VRo.It/A58PDZtKkKmKQf6q'),
(6, 'user', 'user@gmail.com', '$2y$10$f7thb0vVQlLkLpgN93rj5u4aQU/JEjnpGCQ4n/pRa8LJGDI2VlRdS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `foriegnkey` (`usrid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usrid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usrid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `foriegnkey` FOREIGN KEY (`usrid`) REFERENCES `users` (`usrid`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
