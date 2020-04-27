-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2020 at 05:12 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gledger`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `name`, `pass`) VALUES
(1, 'admin', 'Admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `ledger`
--

CREATE TABLE `ledger` (
  `id` int(11) NOT NULL,
  `sec_of_use` varchar(255) NOT NULL,
  `cost_amt` int(11) NOT NULL,
  `spend_by` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `yyyymm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ledger`
--

INSERT INTO `ledger` (`id`, `sec_of_use`, `cost_amt`, `spend_by`, `date`, `yyyymm`) VALUES
(1, 'Grocery', 1000, 'arman', '2020-04-21', 202004),
(2, 'Grocery', 500, 'sumon', '2020-04-22', 202004),
(3, 'Fruit', 200, 'sumon', '2020-04-22', 202004),
(4, 'Grocery', 12, 'arman', '2020-04-22', 202004),
(5, 'Grocery', 123, 'arman', '2020-04-22', 202004),
(6, 'Grocery', 123, 'arman', '2020-04-22', 202004),
(7, 'Grocery', 123, 'arman', '2020-04-22', 202004),
(10, 'Water', 15, 'arman', '2020-04-22', 202004),
(11, 'Grocery', 34, 'arman', '2020-04-22', 202004),
(12, 'Grocery', 45, 'arman', '2020-04-22', 202004),
(13, 'Coffee', 390, 'arman', '2020-04-01', 202004),
(14, 'Grocery', 1200, 'arman', '2020-04-22', 202004),
(15, 'Grocery', 1235, 'arman', '2020-04-22', 202004),
(16, 'Grocery', 123, 'arman', '2020-04-22', 202004),
(17, 'Grocery', 789, 'arman', '2020-04-22', 202004),
(18, 'Grocery', 2637, 'arman', '2020-04-22', 202004),
(19, 'Oil', 210, 'arman', '2020-04-22', 202004),
(20, 'Rise', 250, 'sumon', '2020-04-21', 202004),
(21, 'Meat', 550, 'sumon', '2020-04-16', 202004),
(22, 'Daily Goods', 560, 'sumon', '2020-04-21', 202004),
(23, 'Daily Goods', 450, 'sumon', '2020-04-22', 202004),
(24, 'Grocery', 230, 'sumon', '2020-04-09', 202004),
(25, 'Something', 100, 'sumon', '2020-04-10', 202004),
(26, 'Bics', 230, 'sumon', '2020-04-22', 202004),
(30, 'Grocery', 64, 'sumon', '2020-04-09', 202004),
(32, 'Gas', 350, 'sumon', '2020-04-17', 202004),
(33, 'Grocery', 120, 'sumon', '2020-04-11', 202004),
(34, 'Grocery', 350, 'sumon', '2020-04-22', 202004),
(35, 'Shopping', 1000, 'arman', '2020-04-23', 202004),
(36, 'Grocery', 56, 'arman', '2020-04-15', 202004),
(38, 'Grocery', 678, 'arman', '2020-04-23', 202004),
(39, 'Grocery', 564, 'arman', '2020-04-15', 202004),
(40, 'Grocery', 54, 'arman', '2020-04-07', 202004),
(41, 'Grocery', 564, 'arman', '2020-04-15', 202004),
(42, 'Grocery', 456, 'arman', '2020-04-15', 202004),
(43, 'Grocery', 67, 'arman', '2020-04-15', 202004),
(44, 'Grocery', 90, 'arman', '2020-04-06', 202004),
(45, 'Ramadan', 789, 'sumon', '2020-04-23', 202004),
(46, 'Grocery', 100, 'arman', '2020-04-08', 202004),
(47, 'Grocery', 35, 'arman', '2020-04-10', 202004),
(48, 'Grocery', 76, 'arman', '2020-04-21', 202004),
(49, 'Grocery', 78, 'arman', '2020-04-20', 202004);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `role` varchar(50) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `fullname`, `status`, `passwd`, `role`) VALUES
(1, 'arman', 'Arman Arif', '1', '202cb962ac59075b964b07152d234b70', 'user'),
(2, 'sumon', 'Dawdujjaman Sumon', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ledger`
--
ALTER TABLE `ledger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ledger`
--
ALTER TABLE `ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
