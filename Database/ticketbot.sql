-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2019 at 08:20 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketbot`
--

-- --------------------------------------------------------

--
-- Table structure for table `buytbl`
--

CREATE TABLE `buytbl` (
  `id` int(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Phone_no` int(20) NOT NULL,
  `From_st` varchar(20) NOT NULL,
  `To_st` varchar(20) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `Time` varchar(20) NOT NULL,
  `no_of_seats` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buytbl`
--

INSERT INTO `buytbl` (`id`, `Email`, `Phone_no`, `From_st`, `To_st`, `Date`, `Time`, `no_of_seats`) VALUES
(1, 'aa@cc.co', 123, 'dd', 'ee', 'de', 'ff', 0),
(2, 'dd', 0, 'dd', 'dd', 'dd', 'dd', 0),
(3, 'Email@gmail.com', 1111110000, 'Dhk', 'Raj', '9.11', '0 w', 0),
(4, '', 0, '', '', '', '', 0),
(5, '', 0, '', '', '', '', 0),
(6, 'ebejjsj@gmail.com', 192982882, 'dhaka', 'raj', '13/11/13', '9.10', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buytbl`
--
ALTER TABLE `buytbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buytbl`
--
ALTER TABLE `buytbl`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
