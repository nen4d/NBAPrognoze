-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2021 at 02:30 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nba`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `password` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`) VALUES
(1, '$2y$10$vTxT12IfZMnF6z1aRVJ6LeOY8WRM0NISuZJ6J3.Ga4fso3QZLCjPC');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `ime` varchar(40) NOT NULL,
  `lozinka` char(60) NOT NULL,
  `clanarina` date DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `lozinka`, `clanarina`, `status`) VALUES
(1, 'test3', 'test', '2021-01-14', 1),
(2, 'admin1', '$2y$10$rc696sMVGEgqm5o25atfpOOOdzEpUC9U.2eynoufyzw2w7NJnTUrW', '2021-02-03', 1),
(3, 'Topson', '', '2021-01-23', 1),
(4, 'ImePrez', '$2y$10$9t4voqkiFJI.cWQPcjclp.1yRfws6ZS8OClwNNvgOoOQ0H0iZzciu', '2021-01-29', 1),
(5, 'Imeprezime', '$2y$10$f0V.iKLzZ6aKaV7hnFyt/OhC0b8v6UZic9kbxu4wBWHWukLwPiftK', '2021-01-16', 1),
(6, 'John1', '$2y$10$niMEWMkAV49rjRXf2F0wSebJIbIxZuGRDB3lzYQW2..r.fdxvUv6m', '2021-01-16', 0),
(7, 'Topson1', '$2y$10$Di0RiaMCSmfMcnobDvJNr.mXkKr9rkCSGk9kxJoQAupJlU4OBgsP6', '2021-01-31', 1),
(8, 'testkorisnik', '$2y$10$mnE7PddjKdR/r59QGkhJc.clSJq3uyTqg8p4A8/hH3VruN.ytkD7G', '2021-01-23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `prognoze`
--

CREATE TABLE `prognoze` (
  `id` int(11) NOT NULL,
  `single` varchar(60) NOT NULL,
  `tip` varchar(60) NOT NULL,
  `granicabroj` text NOT NULL,
  `granica` text NOT NULL,
  `opis` text NOT NULL,
  `datum` date DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prognoze`
--

INSERT INTO `prognoze` (`id`, `single`, `tip`, `granicabroj`, `granica`, `opis`, `datum`, `status`) VALUES
(1, 'SINGLE 1', 'K. Irving', '23.5', 'ZmFyIGZhLW1pbnVzLXNxdWFyZQ==', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', '2021-01-13', 1),
(2, 'SINGLE 2', 'A. Gordon', '18.5', 'ZmFyIGZhLXBsdXMtc3F1YXJl', 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.', '2021-01-12', 1),
(3, 'SINGLE 3', 'K. Durant', '20.5', 'ZmFyIGZhLXBsdXMtc3F1YXJl', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', '2021-01-13', 1),
(4, 'SINGLE 4', 'D. Lillard', '28.5', 'ZmFyIGZhLW1pbnVzLXNxdWFyZQ==', 'll the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.', '2021-01-12', 1),
(5, 'SINGLE 5', 'R. Westbrook', '24.5', 'ZmFyIGZhLW1pbnVzLXNxdWFyZQ==', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', '2021-01-13', 1),
(6, 'SINGLE 6', 'K. Oladipo', '21.5', 'ZmFyIGZhLXBsdXMtc3F1YXJl', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', '2021-01-14', 1),
(7, 'SINGLE 7', '/', '/', 'ZmFyIGZhLW1pbnVzLXNxdWFyZQ==', '/', '2021-01-14', 0),
(8, 'SINGLE 8', '/', '/', 'ZmFyIGZhLXBsdXMtc3F1YXJl', '/', '2021-01-14', 0),
(9, 'SINGLE 9', '/', '/', 'ZmFyIGZhLW1pbnVzLXNxdWFyZQ==', '/', '2021-01-14', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prognoze`
--
ALTER TABLE `prognoze`
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
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prognoze`
--
ALTER TABLE `prognoze`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
