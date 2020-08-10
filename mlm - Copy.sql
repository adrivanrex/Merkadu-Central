-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2019 at 11:51 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kwarta`
--

-- --------------------------------------------------------

--
-- Table structure for table `affiliate`
--

CREATE TABLE `affiliate` (
  `id` int(11) NOT NULL,
  `sponsor` varchar(255) NOT NULL,
  `awardedUser` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `id` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`id`, `username`, `balance`) VALUES
(23, 'rexadrivan', 40),
(24, 'country', 3),
(25, 'country1', 3),
(26, 'country12', 3),
(27, 'country123', 3),
(28, 'rexadrivan1', 3),
(29, 'rex22222', 3),
(30, 'country11', 3),
(31, 'country112', 3),
(32, 'country2', 1),
(33, 'country111', 10),
(34, 'rex123', 4),
(35, 'rex11', 20),
(36, 'rexadrivan1', 3),
(37, 'rexadrivan1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `banneduser`
--

CREATE TABLE `banneduser` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `lastBalance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banneduser`
--

INSERT INTO `banneduser` (`id`, `username`, `lastBalance`) VALUES
(1, 'rexadrivan1', 0),
(2, 'rexadrivan', 7),
(3, 'rexadrivan', 10);

-- --------------------------------------------------------

--
-- Table structure for table `cashout`
--

CREATE TABLE `cashout` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cashoutMoney` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paypal`
--

CREATE TABLE `paypal` (
  `id` int(11) NOT NULL,
  `paymentId` varchar(225) NOT NULL,
  `token` varchar(225) NOT NULL,
  `PayerID` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paypal`
--

INSERT INTO `paypal` (`id`, `paymentId`, `token`, `PayerID`, `username`, `amount`) VALUES
(4, 'PAYID-LXHG64I04S50332HL348815P', '', '', 'hello', 10),
(5, 'PAYID-LXHHZDY1PV64858TS2746444', '', '', 'adrivanrex', 10),
(6, 'PAYID-LXHH2XQ9GL39541LL131435W', '', '', 'adrivanrex', 10),
(7, 'PAYID-LXHH3XY6KA83264BD305540X', '', '', 'hello5', 10),
(8, 'PAYID-LXHTUCA57T898153V677960D', '', '', 'test', 10),
(9, 'PAYID-LXHTWQA29W52402VS278110G', '', '', '', 10),
(10, 'PAYID-LXKLTEI2N862614YL634691B', '', '', 'country111', 10),
(11, 'PAYID-LXKL2OQ9E924231J15921645', '', '', 'rex123', 29),
(12, 'PAYID-LXKMKPQ71D989626T3407946', '', '', 'rex11', 20);

-- --------------------------------------------------------

--
-- Table structure for table `playbets`
--

CREATE TABLE `playbets` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playbets`
--

INSERT INTO `playbets` (`id`, `status`, `amount`, `balance`, `username`) VALUES
(1, 'WIN', 1000, 50, 'rexadrivan1'),
(2, 'WIN', 1000, 50, 'rexadrivan1'),
(3, 'WIN', 1000, 50, 'rexadrivan1'),
(4, 'WIN', 1000, 50, 'rexadrivan1'),
(5, 'WIN', 1000, 1050, 'rexadrivan1'),
(6, 'WIN', 1000, 50, 'rexadrivan1'),
(7, 'WIN', 1000, 150, 'rexadrivan1'),
(8, 'WIN', 1000, 50, 'rexadrivan1'),
(9, 'WIN', 1000, 1050, 'rexadrivan1'),
(10, 'WIN', 1000, 10, 'rexadrivan1'),
(11, 'WIN', 1000, 0, 'rexadrivan1'),
(12, 'WIN', 1000, 100, 'rexadrivan1'),
(13, 'WIN', 1000, 100, 'rexadrivan1'),
(14, 'WIN', 1000, 100, 'rexadrivan1'),
(15, 'WIN', 1000, 100, 'rexadrivan1'),
(16, 'WIN', 1000, 100, 'rexadrivan1'),
(17, 'WIN', 1000, 100, 'rexadrivan1'),
(18, 'WIN', 10, 100, 'rexadrivan1'),
(19, 'WIN', 10, 110, 'rexadrivan1'),
(20, 'WIN', 1, 120, 'rexadrivan1'),
(21, 'WIN', 1, 121, 'rexadrivan1'),
(22, 'LOSE', 1, 122, 'rexadrivan1'),
(23, 'WIN', 2, 3, 'rexadrivan'),
(24, 'LOSE', 1, 5, 'rexadrivan'),
(25, 'WIN', 2, 4, 'rexadrivan'),
(26, 'LOSE', 1, 6, 'rexadrivan'),
(27, 'LOSE', 1, 6, 'rexadrivan'),
(28, 'LOSE', 1, 6, 'rexadrivan'),
(29, 'WIN', 2, 5, 'rexadrivan'),
(30, 'LOSE', 5, 10, 'rexadrivan'),
(31, 'LOSE', 5, 5, 'rexadrivan'),
(32, 'LOSE', 10, 10, 'rexadrivan'),
(33, 'LOSE', 10, 100, 'rexadrivan'),
(34, 'LOSE', 10, 90, 'rexadrivan'),
(35, 'LOSE', 10, 80, 'rexadrivan'),
(36, 'LOSE', 10, 70, 'rexadrivan'),
(37, 'WIN', 20, 60, 'rexadrivan'),
(38, 'LOSE', 5, 80, 'rexadrivan'),
(39, 'LOSE', 5, 75, 'rexadrivan'),
(40, 'WIN', 10, 70, 'rexadrivan'),
(41, 'WIN', 10, 80, 'rexadrivan'),
(42, 'WIN', 20, 90, 'rexadrivan'),
(43, 'LOSE', 10, 110, 'rexadrivan'),
(44, 'LOSE', 10, 100, 'rexadrivan'),
(45, 'LOSE', 10, 90, 'rexadrivan'),
(46, 'LOSE', 10, 80, 'rexadrivan'),
(47, 'WIN', 10, 70, 'rexadrivan'),
(48, 'LOSE', 80, 80, 'rexadrivan'),
(49, 'LOSE', 10, 10, 'rexadrivan'),
(50, 'LOSE', 50, 50, 'rexadrivan'),
(51, 'LOSE', 10, 10, 'rexadrivan'),
(52, 'LOSE', 20, 20, 'rexadrivan'),
(53, 'LOSE', 5, 10, 'rexadrivan'),
(54, 'WIN', 20, 20, 'rexadrivan'),
(55, 'LOSE', 2, 3, 'country2'),
(56, 'WIN', 1, 1, 'country2'),
(57, 'LOSE', 1, 2, 'country2'),
(58, 'LOSE', 2, 3, 'country111'),
(59, 'WIN', 3, 3, 'rex123'),
(60, 'LOSE', 3, 6, 'rex123'),
(61, 'WIN', 29, 29, 'rex123'),
(62, 'LOSE', 29, 58, 'rex123'),
(63, 'LOSE', 15, 29, 'rex123'),
(64, 'LOSE', 7, 14, 'rex123'),
(65, 'WIN', 7, 7, 'rex123'),
(66, 'LOSE', 10, 14, 'rex123'),
(67, 'WIN', 3, 3, 'rex11'),
(68, 'LOSE', 6, 6, 'rex11');

-- --------------------------------------------------------

--
-- Table structure for table `topup`
--

CREATE TABLE `topup` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topup`
--

INSERT INTO `topup` (`id`, `username`, `amount`, `date`) VALUES
(1, 'rexadrivan1', 20, '2019-11-09 01:49:05'),
(2, 'rexadrivan1', 20, '2019-11-08 18:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `sentFrom` varchar(11) NOT NULL,
  `sendTo` varchar(11) NOT NULL,
  `price` int(11) NOT NULL,
  `recieverBalance` int(11) NOT NULL,
  `senderBalance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `username`, `sentFrom`, `sendTo`, `price`, `recieverBalance`, `senderBalance`) VALUES
(1, 'rexad', 'rexad', 'rexadr', 5, 0, 0),
(2, 'rexad', 'rexad', 'rexadr', 5, 100005, 99993),
(3, 'rexad', 'rexad', 'rexadr', 100, 100005, 99988),
(4, 'rexus332', 'rexus332', 'rexus4343', 22, 100000, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `username` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `countryName` varchar(255) NOT NULL,
  `countryContinent` varchar(255) NOT NULL,
  `countryCurrency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`username`, `firstName`, `middleName`, `lastName`, `id`, `countryName`, `countryContinent`, `countryCurrency`) VALUES
('country123', '', '', '', 1, 'Afghanistan', 'AS', 'AFN'),
('rexadrivan1233', '', '', '', 2, 'Phil', 'PH', 'PHP'),
('rex22222', '', '', '', 3, 'Afghanistan', 'AS', 'AFN'),
('country11', '', '', '', 4, 'Philippines', 'AS', 'PHP'),
('country112', '', '', '', 5, 'Philippines', 'AS', 'PHP'),
('country2', '', '', '', 6, 'Philippines', 'AS', 'PHP'),
('country111', '', '', '', 7, 'Philippines', 'AS', 'PHP'),
('rex123', '', '', '', 8, 'Philippines', 'AS', 'PHP'),
('rex11', '', '', '', 9, 'Philippines', 'AS', 'PHP'),
('rexadrivan13', '', '', '', 10, 'Phil', 'PH', 'PHP'),
('rexadrivan12334', '', '', '', 11, 'Phil', 'PH', 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `reg_date` date NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `reg_time` time NOT NULL,
  `paypal` varchar(225) NOT NULL,
  `referalUsername` varchar(255) NOT NULL,
  `countryName` varchar(255) NOT NULL,
  `countryContinent` varchar(255) NOT NULL,
  `countryCurrency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `reg_date`, `ip_address`, `reg_time`, `paypal`, `referalUsername`, `countryName`, `countryContinent`, `countryCurrency`) VALUES
(30, '', '', '0000-00-00', '', '00:00:00', '', '', '', '', ''),
(31, '', '', '0000-00-00', '', '00:00:00', '', '', '', '', ''),
(32, '', '', '0000-00-00', '', '00:00:00', '', '', '', '', ''),
(33, '', '', '0000-00-00', '', '00:00:00', '', '', '', '', ''),
(34, 'rexadrivan222', 'rexadrivan', '2019-11-16', '127.0.0.1', '05:09:38', 'adrivanrex@gmail.com', '', '', '', ''),
(35, 'rexadrivan', 'rexadrivan', '2019-11-18', '127.0.0.1', '06:42:30', '\'', '', '', '', ''),
(36, 'country', 'rexadrivan', '2019-11-20', '127.0.0.1', '00:04:51', 'adrivanrex@gmail.com', 'none', '', '', ''),
(37, 'country1', 'rexadrivan', '2019-11-20', '127.0.0.1', '00:10:44', 'adrivanrex@gmail.com', 'none', 'Afghanistan', 'AS', 'AFN'),
(38, 'country12', 'rexadrivan', '2019-11-20', '127.0.0.1', '00:11:04', 'adrivanrex@gmail.com', 'none', 'Afghanistan', 'AS', 'AFN'),
(39, 'country123', 'rexadrivan', '2019-11-20', '127.0.0.1', '00:15:47', 'adrivanrex@gmail.com', 'none', 'Afghanistan', 'AS', 'AFN'),
(40, 'rexadrivan1233', 'rexadrivan', '2019-11-20', '127.0.0.1', '00:16:40', 'adrivanrex@gmail.com', 'test', 'Phil', 'PH', 'PHP'),
(41, 'rex22222', 'rexadrivan', '2019-11-20', '127.0.0.1', '00:17:23', 'rexadrivan@gmail.com', 'aasd', 'Afghanistan', 'AS', 'AFN'),
(42, 'country11', 'rexadrivan', '2019-11-20', '127.0.0.1', '04:00:42', 'adrivanrex@gmail.com', 'non', 'Philippines', 'AS', 'PHP'),
(43, 'country112', 'rexadrivan', '2019-11-20', '127.0.0.1', '04:03:04', 'adrivanrex@gmail.com', 'non', 'Philippines', 'AS', 'PHP'),
(44, 'country2', 'rexadrivan', '2019-11-20', '127.0.0.1', '04:10:29', 'adrivanrex@gmail.com', 'ccc', 'Philippines', 'AS', 'PHP'),
(45, 'country111', 'rexadrivan', '2019-11-20', '127.0.0.1', '04:46:58', 'adrivanrex@gmail.com', 'd', 'Philippines', 'AS', 'PHP'),
(46, 'rex123', 'rexadrivan', '2019-11-20', '127.0.0.1', '05:01:41', 'adrivanrex@gmail.com', 'nn', 'Philippines', 'AS', 'PHP'),
(47, 'rex11', 'rexadrivan', '2019-11-20', '127.0.0.1', '05:36:44', 'adrivanrex@gmail.com', 'non', 'Philippines', 'AS', 'PHP'),
(48, 'rexadrivan13', 'rexadrivan', '2019-11-20', '127.0.0.1', '09:59:44', 'adrivanrex@gmail.com', 'test', 'Phil', 'PH', 'PHP'),
(49, 'rexadrivan12334', 'rexadrivan', '2019-11-21', '127.0.0.1', '04:43:26', 'adrivanrex@gmail.com', 'test', 'Phil', 'PH', 'PHP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affiliate`
--
ALTER TABLE `affiliate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banneduser`
--
ALTER TABLE `banneduser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashout`
--
ALTER TABLE `cashout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paypal`
--
ALTER TABLE `paypal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playbets`
--
ALTER TABLE `playbets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `affiliate`
--
ALTER TABLE `affiliate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `banneduser`
--
ALTER TABLE `banneduser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cashout`
--
ALTER TABLE `cashout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paypal`
--
ALTER TABLE `paypal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `playbets`
--
ALTER TABLE `playbets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `topup`
--
ALTER TABLE `topup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
