-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 24, 2021 at 09:26 AM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int NOT NULL AUTO_INCREMENT,
  `doctor_id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `index` (`doctor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `doctor_id`, `title`, `body`, `image`, `link`, `created_at`) VALUES
(2, 2, 'this is title ', 'this is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is body', NULL, '', '2021-03-24 06:45:44'),
(3, 1, 'this is title', 'this is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is bodythis is body', NULL, '', '2021-03-24 06:46:37'),
(4, 5, 'Hello From POST MAN', 'i am POST AMAN', 'aaaa', 'sssssssssssss', '2021-03-24 09:40:19'),
(5, 2, 'Hello From POST MAN', 'i am POST AMAN', 'aaaa', 'sssssssssssss', '2021-03-24 09:44:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
