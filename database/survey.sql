-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 09:46 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `full_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `date_of_birth` date NOT NULL,
  `contact_num` int(10) NOT NULL,
  `fav_food` varchar(30) NOT NULL,
  `movies_rating` int(11) DEFAULT NULL,
  `radio_rating` int(11) DEFAULT NULL,
  `eat_out_rating` int(11) DEFAULT NULL,
  `watch_tv_rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`full_name`, `email`, `date_of_birth`, `contact_num`, `fav_food`, `movies_rating`, `radio_rating`, `eat_out_rating`, `watch_tv_rating`) VALUES
('Sanele Mtshali', 'sanelemtshalih@gmail.com', '2016-01-09', 629733557, 'Pizza, Pasta', 5, 4, 5, 5),
('John Alex', '22934525@live.dut.ac.za', '2010-01-09', 629733557, 'Other', 1, 1, 1, 2),
('QINISO NGIDI', 'qinisolungisani6@gmail.com', '2024-05-07', 617962201, 'Pizza, Pasta', 5, 2, 3, 3),
('Maps Mutanga', 'Mutanga78@gmail.com', '2002-12-29', 617962201, 'Pizza, Papawors', 5, 3, 5, 2),
('Bianca Nkosi', 'bianca@gmail.com', '2015-01-07', 617962201, 'Pizza, Pasta', 5, 3, 2, 3),
('Brian Steven', 'stevenbrian@gmail.com', '2013-12-30', 629733557, 'Other', 4, 3, 4, 3),
('Lucky Johnson', 'luck@gmail.com', '2018-05-06', 613712201, 'Pizza', 5, 1, 2, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
