-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 12:30 PM
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
-- Database: `product`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `imageid` int(8) NOT NULL,
  `name` varchar(30) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`imageid`, `name`, `image`) VALUES
(1, 'Nature Sunrise', 'boris-baldinger-eUFfY6cwjSU-unsplash.jpg'),
(2, 'Nature Sunrise', 'pexels-brakou-1723637.jpg'),
(3, 'Nature Parvat', 'pexels-eberhardgross-1624496.jpg'),
(4, 'Nature Parvat', 'pexels-eberhardgross-1366919.jpg'),
(5, 'Peacock', 'jairo-alzate-gvDJIt8j-Sc-unsplash.jpg'),
(6, 'Natural Greenery', 'pexels-frans-van-heerden-201846-1590511.jpg'),
(7, 'Jai Shri Krishna', 'henil-kajavadra-18WhfiUmYM8-unsplash.jpg'),
(8, 'Ganesh ji', 'mohnish-landge-EbZXeUtPKBc-unsplash.jpg'),
(9, 'Design Water', 'pexels-gabriel-peter-219375-719396.jpg'),
(10, 'Design Smoke', 'pexels-kovyrina-937980.jpg'),
(11, 'Design Fire', 'pexels-pixabay-207353.jpg'),
(12, 'Ganesh ji', 'sonika-agarwal-BFXXIqT0vh4-unsplash.jpg'),
(13, 'Ganesh ji', 'sonika-agarwal-o1go1RVs9F8-unsplash.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`imageid`),
  ADD KEY `imageid` (`imageid`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `imageid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
