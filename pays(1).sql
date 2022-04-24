-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 06:14 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pays`
--

-- --------------------------------------------------------

--
-- Table structure for table `bal`
--

CREATE TABLE `bal` (
  `usa` varchar(100) NOT NULL,
  `bal` varchar(100) NOT NULL,
  `spend` varchar(100) NOT NULL,
  `fee` varchar(100) NOT NULL,
  `bal_and_fee` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bal`
--

INSERT INTO `bal` (`usa`, `bal`, `spend`, `fee`, `bal_and_fee`) VALUES
('BCH-BB10294234', '122548', '0', '0', '6096'),
('BCH-FS10294243', '0', '0', '0', '0'),
('BCH-TM10294240', '0', '0', '0', '0'),
('BCH-ZW10294237', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `data_plan`
--

CREATE TABLE `data_plan` (
  `id` varchar(100) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `network` varchar(100) NOT NULL,
  `data_size` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_plan`
--

INSERT INTO `data_plan` (`id`, `plan`, `price`, `network`, `data_size`) VALUES
('airtel1.5', 'Airtel 1.5GB 1000 NGN', '1000', 'airtel', '1000'),
('airtel2gb', 'Airtel 2GB 1200 NGN', '1200', 'airtel', '1200'),
('etisalat1gb', 'Etisalat 1gb 1000 NGN 30Days', '1000', 'etisalat', '1000'),
('etisalat500mb', 'Etisalat 500MB 500 NGN 30Days', '500', 'etisalat', '500'),
('glo1.8gb', 'glo 1.8GB 1000 NGN', '1000', 'glo', '1000'),
('glo920mb', 'glo 920mb 500', '500', 'glo', '500'),
('mtn1gb', 'MTN 1GB 250 NGN 30Days', '250', 'mtn', '1000'),
('mtn2gb', 'MTN 1GB 500 NGN 30Days', '500', 'mtn', '2000'),
('mtn500mb', 'MTN 500MB 150 NGN 30Days', '150', 'mtn', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `mail` varchar(100) NOT NULL,
  `otp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`mail`, `otp`) VALUES
('07064299955', '9614'),
('a1@gmail.com', '1748'),
('adamuchindoo@gmail.com', '3288'),
('chindoboy01@gmail.com', '9144'),
('zah@z.com', '9384');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `usdt_to_naira` varchar(100) NOT NULL,
  `fee` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`usdt_to_naira`, `fee`) VALUES
('575', '10');

-- --------------------------------------------------------

--
-- Table structure for table `usa`
--

CREATE TABLE `usa` (
  `mail` varchar(100) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usa`
--

INSERT INTO `usa` (`mail`, `pass`, `id`) VALUES
('a1@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'BCH-ZW10294237'),
('adamuchindoo@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'BCH-TM10294240'),
('chindoboy01@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'BCH-FS10294243'),
('zah@z.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'BCH-BB10294234');

-- --------------------------------------------------------

--
-- Table structure for table `usdt_price`
--

CREATE TABLE `usdt_price` (
  `ngn` varchar(584) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usdt_price`
--

INSERT INTO `usdt_price` (`ngn`) VALUES
('584');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_info`
--

CREATE TABLE `wallet_info` (
  `id` varchar(100) NOT NULL,
  `wallet_ad` varchar(200) NOT NULL,
  `phr` varchar(500) NOT NULL,
  `legacy` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallet_info`
--

INSERT INTO `wallet_info` (`id`, `wallet_ad`, `phr`, `legacy`) VALUES
('BCH-BB10294234', 'bitcoincash:qz9vydhwjqghp6atd3e59pp4ft5uwmw8xg8mwch2zu', 'enjoy steel crunch honey mixture pupil mushroom tip object sock december film', '1DegujoicZ5EbjxarGgMYXy2ehiHhJX3Qs'),
('BCH-FS10294243', 'bitcoincash:qrk07r4c8h6wvyy7rv4uwded8x9l7yaj5yxkavm5v9', 'curve session practice maze cancel isolate snow trade move secret garage yellow', '1Nc81yhurSDpzrGzFRY9knyvfacFRWshzQ'),
('BCH-TM10294240', 'bitcoincash:qpu3keqt90k44t5egmrm4g5mwm3sxy2vns49prrsgx', 'cream grape social alarm twice october century soda oak tip miss transfer', '1C3MaMj1GDiLvatKLk3jjjshLM8eGiNtYw'),
('BCH-ZW10294237', 'bitcoincash:qr0s44q3pauaj3u0y0h8ptc9725dtyg76ygfdne2c2', 'fuel weird want common witness toddler grief bitter credit surge cute web', '1MLLf9ZUjZeLSPbXQyxb3RpzpN8RCDKfvs');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bal`
--
ALTER TABLE `bal`
  ADD PRIMARY KEY (`usa`);

--
-- Indexes for table `data_plan`
--
ALTER TABLE `data_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`mail`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`usdt_to_naira`);

--
-- Indexes for table `usa`
--
ALTER TABLE `usa`
  ADD PRIMARY KEY (`mail`);

--
-- Indexes for table `usdt_price`
--
ALTER TABLE `usdt_price`
  ADD PRIMARY KEY (`ngn`);

--
-- Indexes for table `wallet_info`
--
ALTER TABLE `wallet_info`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
