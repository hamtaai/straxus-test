-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 12, 2015 at 06:46 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `TesztDB`
--
CREATE DATABASE IF NOT EXISTS `TesztDB` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `TesztDB`;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `sess_id` varbinary(128) NOT NULL,
  `sess_data` blob NOT NULL,
  `sess_time` int(10) unsigned NOT NULL,
  `sess_lifetime` mediumint(9) NOT NULL,
  PRIMARY KEY (`sess_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `roles` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `lastlogin` datetime NOT NULL,
  `loginattempts` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `roles`, `lastlogin`, `loginattempts`) VALUES
(1, 'Admin', '$2a$10$ZDcxNd3/D9i2MX4.YzYJBeQmcbwcm7UqHaG7t0cFDl6p9V3DkzM6G', 'ROLE_ADMIN', '2015-09-12 18:28:15', 0),
(2, 'User 1', '$2a$10$Y6VPb01hSlgEO70z6Xuusu2bdKcFaN4NytHaNi76popNEq025qcBa', 'ROLE_USER, ROLE_EDITOR', '2015-09-12 17:44:48', 0),
(3, 'User 2', '$2a$10$CQtJBLxBj0LVEsbLo8IggeGojcjNMwkEiFrMzdsR5ufYst25TZsgu', 'ROLE_EDITOR', '2015-09-12 11:44:29', 0),
(4, 'User 3', '$2a$10$jN3rWbmlYxXaj7Zw89fKWeC3ejX0spT3j1oEYB5Pp0Z3ygA0028V6', 'ROLE_USER', '2015-09-12 14:34:04', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
