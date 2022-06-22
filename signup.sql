-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 03:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `signup`
--

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(5) NOT NULL,
  `expire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `codes`
--

INSERT INTO `codes` (`id`, `email`, `code`, `expire`) VALUES
(1, 'nnkumar2468@gmail.com', '10273', 1648122866),
(2, 'nnkumar2468@gmail.com', '39030', 1648123234),
(3, 'nnkumar2468@gmail.com', '63253', 1648123335),
(4, 'nnkumar2468@gmail.com', '76098', 1648123403),
(5, 'nnkumar2468@gmail.com', '82967', 1648124227),
(6, 'nnkumar2468@gmail.com', '41363', 1648124577),
(7, 'nnkumar2468@gmail.com', '84817', 1648124703),
(8, 'nnkumar2468@gmail.com', '70958', 1648124998),
(9, 'nnkumar2468@gmail.com', '95523', 1648125078),
(10, 'nkumarhatti@gmail.com', '41572', 1648125345),
(11, 'nkumarhatti@gmail.com', '80015', 1648125458),
(12, 'nkumarhatti@gmail.com', '12520', 1648126818),
(13, 'nkumarhatti@gmail.com', '17212', 1648126980),
(14, 'nkumarhatti@gmail.com', '29966', 1648127171),
(15, 'nkumarhatti@gmail.com', '80329', 1648127749),
(16, 'nkumarhatti@gmail.com', '79524', 1648128048),
(17, 'nnkumar2468@gmail.com', '64169', 1648131727),
(18, 'nnkumar2468@gmail.com', '72130', 1648131776);

-- --------------------------------------------------------

--
-- Table structure for table `company_databse`
--

CREATE TABLE `company_databse` (
  `id` int(10) UNSIGNED NOT NULL,
  `cname` varchar(20) NOT NULL,
  `cwebsite` varchar(50) NOT NULL,
  `cnum` int(10) NOT NULL,
  `caddress` varchar(100) NOT NULL,
  `ccity` varchar(50) NOT NULL,
  `cstate` varchar(15) NOT NULL,
  `ccountry` varchar(15) NOT NULL,
  `industrylist` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_databse`
--

INSERT INTO `company_databse` (`id`, `cname`, `cwebsite`, `cnum`, `caddress`, `ccity`, `cstate`, `ccountry`, `industrylist`) VALUES
(4, 'NA', '', 2147483647, 'git college first cross\r\nannapurna building', 'belgaum', 'Karnataka', 'India', 'Account'),
(5, 'capgemini', 'www.edu.com', 123456, 'home no 127 ward no 5, bhagyanagar', 'KOPPAL', 'Karnataka', 'India', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `secondname` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `firstname`, `secondname`, `password`, `create_datetime`) VALUES
(12, 'manoj@gmail.com', 'manoj', 'K', 'e10adc3949ba59abbe56e057f20f883e', '2022-03-23 11:50:58'),
(14, 'nkumarhatti@gmail.com', 'KUMAR', 'KUMAR', '69a329523ce1ec88bf63061863d9cb14', '2022-03-24 13:31:14'),
(15, 'nnkumar2468@gmail.com', 'Kumar', 'Kumar', '69a329523ce1ec88bf63061863d9cb14', '2022-03-24 15:15:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_databse`
--
ALTER TABLE `company_databse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `company_databse`
--
ALTER TABLE `company_databse`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
