-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 27, 2018 at 10:56 PM
-- Server version: 5.7.22-0ubuntu18.04.1
-- PHP Version: 7.2.5-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adklib`
--
CREATE DATABASE IF NOT EXISTS `adklib` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `adklib`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(4) NOT NULL,
  `description` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS FOR TABLE `books`:
--

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `isbn`, `year`, `description`, `cover`, `link`, `added_on`) VALUES
(1, 'Dddddddddd', '212', 1902, 'dsfgdfgdfsgdfsgdf assss ssssssssssssssssssss', NULL, NULL, '2018-06-26 21:29:59'),
(3, 'Charly', '123124', 2005, 'jghjghf hgfj gh jgh jghfjghjghjghj', NULL, NULL, '2018-06-27 13:10:57'),
(5, 'Zzzzzz sdsdf s', '6666', 2000, 'hgjgjhgjghj sad s fsdf ds', NULL, NULL, '2018-06-27 13:26:20'),
(6, 'jjjjjjjjjjjjjj', '77', 1978, 'dedededededed eded edededed ddede ', NULL, NULL, '2018-06-27 19:14:23');

-- --------------------------------------------------------

--
-- Table structure for table `mybooks`
--

DROP TABLE IF EXISTS `mybooks`;
CREATE TABLE IF NOT EXISTS `mybooks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS FOR TABLE `mybooks`:
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(15) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `users`:
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `joining_date`) VALUES
(1, 'admin', 'admin@expert.com', '$2y$10$XOt9NIveFTYix7IoRSBtmuMKsxAs/lnxC6iYAMECHWGZjDWTFy1qq', '2018-06-27 10:17:33');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
