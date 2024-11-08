-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2024 at 05:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music`
--

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `album` varchar(255) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `year` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `title`, `artist`, `album`, `genre`, `year`) VALUES
(1, 'Cherry On Top', 'BINI', 'Single', 'pop', 2024),
(2, 'Bed Chem', 'Sabrina Carpenter', 'Short n\' Sweet', 'pop', 2024),
(3, 'Moonlit Floor', 'LISA', 'Single', 'pop', 2024),
(4, 'The Alchemy', 'Taylor Swift', 'TTPD', 'pop', 2024),
(5, 'Sweater Weather', 'The Neighbourhood', 'I Love You.', 'pop', 2013),
(6, 'Senopati in the Rain', 'Jordan Susanto', 'Single', 'pop', 2024),
(7, 'Bubble Gum', 'Clairo', 'Single', 'pop', 2019),
(8, 'Used to Me', 'Luke Chiang', 'Single', 'pop', 2019),
(9, 'Casual', 'Chappell Roan', 'The Rise and Fall of a Midwest Princess', 'pop', 2023),
(10, 'Peaches & Cream', 'Noah Davis', 'Single', 'pop', 2022);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
