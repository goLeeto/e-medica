-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2016 at 09:42 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medica`
--

-- --------------------------------------------------------

--
-- Table structure for table `diagnostifikim`
--

CREATE TABLE `diagnostifikim` (
  `id` int(11) NOT NULL,
  `personi` varchar(20) NOT NULL,
  `semundja` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnostifikim`
--

INSERT INTO `diagnostifikim` (`id`, `personi`, `semundja`) VALUES
(1, '1111111111', 'anemi'),
(2, '1111111111', 'test'),
(3, '1111111111', 'test'),
(4, '1111111112', 'lihqwriu'),
(5, '1111111112', 'oraldo'),
(6, '1111111112', 'mjeuiegqhlq');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `receiver` varchar(15) NOT NULL,
  `msg` varchar(100) NOT NULL,
  `sender` varchar(25) NOT NULL,
  `Emri` varchar(20) NOT NULL,
  `Mbiemri` varchar(20) NOT NULL,
  `lexuar` tinyint(1) NOT NULL,
  `new` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `receiver`, `msg`, `sender`, `Emri`, `Mbiemri`, `lexuar`, `new`) VALUES
(98, '111111111111111', 'test', '1111111111', 'Edison', 'biba', 1, 1),
(99, '111111111111111', 'test', '1111111111', 'Edison', 'biba', 1, 1),
(100, '111111111111111', 'test', '1111111111', 'Edison', 'biba', 1, 1),
(101, '111111111111111', 'hi', '1111111111', 'Edison', 'biba', 1, 1),
(102, '111111111111111', 'hello', '1111111111', 'Edison', 'biba', 1, 1),
(103, '111111111111111', 'test', '1111111111', 'Edison', 'biba', 1, 1),
(104, '111111111111111', 'test', '1111111111', 'Edison', 'biba', 1, 1),
(105, '1111111111', 'test doktori', '111111111111111', 'Doktori', 'Doktor', 0, 1),
(106, '111111111111111', 'test', '1111111111', 'Edison', 'biba', 1, 1),
(107, '1111111111', 'hey', '111111111111111', 'Doktori', 'Doktor', 0, 1),
(108, '1111111111', 'test ', '111111111111111', 'Doktori', 'Doktor', 0, 1),
(109, '1111111111', 'test', '111111111111111', 'Doktori', 'Doktor', 0, 1),
(110, '1111111111', 'hello how are you', '111111111111111', 'Doktori', 'Doktor', 0, 1),
(111, '1111111111', 'test', '111111111111111', 'Doktori', 'Doktor', 0, 1),
(112, '1111111111', 'test', '111111111111111', 'Doktori', 'Doktor', 0, 1),
(113, '111111111111111', 'test 1', '1111111111', 'Edison', 'biba', 1, 1),
(114, '1111111111', 'test doktori', '111111111111111', 'Doktori', 'Doktor', 0, 1),
(115, '111111111111111', 'test pacient', '1111111111', 'Edison', 'biba', 1, 1),
(116, '111111111111111', '123', '1111111111', 'Edison', 'biba', 1, 1),
(117, '111111111111111', 'test', '1111111111', 'Edison', 'biba', 1, 1),
(118, '111111111111111', 'test', '1111111111', 'Edison', 'biba', 1, 1),
(119, '1111111112', 'hi', '111111111111111', 'Doktori', 'Doktor', 0, 1),
(120, '111111111111111', 'test', '1111111111', 'Edison', 'biba', 1, 1),
(121, '1111111111', 'hi', '111111111111111', 'Doktori', 'Doktor', 0, 1),
(122, '111111111111111', 'hello', '1111111111', 'Edison', 'biba', 1, 1),
(123, '111111111111111', 'hi', '1111111111', 'Edison', 'biba', 1, 1),
(124, '111111111111111', 'edison', '1111111111', 'Edison', 'biba', 1, 1),
(125, '111111111111111', 'edison', '1111111111', 'Edison', 'biba', 1, 1),
(126, '111111111111111', 'hiii', '1111111111', 'Edison', 'biba', 1, 1),
(127, '1111111112', 'hey', '111111111111111', 'Doktori', 'Doktor', 0, 1),
(128, '1111111111', 'hey', '111111111111111', 'Doktori', 'Doktor', 0, 1),
(129, '111111111111111', 'test', '1111111111', 'Edison', 'biba', 1, 1),
(130, '111111111111111', 'hii', '1111111111', 'Edison', 'biba', 1, 1),
(131, '1111111111', 'hello', '111111111111111', 'Doktori', 'Doktor', 0, 1),
(132, '1111111111', 'ckemi', '111111111111111', 'Doktori', 'Doktor', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `titulli` varchar(20) NOT NULL,
  `permbajtja` varchar(100) NOT NULL,
  `pacient_username` varchar(15) NOT NULL,
  `doktori` varchar(15) NOT NULL,
  `ora` time NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `titulli`, `permbajtja`, `pacient_username`, `doktori`, `ora`, `data`) VALUES
(1, 'vizite', 'afidsajfklasd;fjas', '1111111111', '111111111111111', '00:00:00', '2016-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `semundje`
--

CREATE TABLE `semundje` (
  `id` int(11) NOT NULL,
  `emri` varchar(30) NOT NULL,
  `simptomat` varchar(200) NOT NULL,
  `pershkrimi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semundje`
--

INSERT INTO `semundje` (`id`, `emri`, `simptomat`, `pershkrimi`) VALUES
(1, 'Hippertension', 'Dridhje duarsh , marrje mendesh, humbje shikimi', 'hippertensioni eshte nje semundje qe shkakton ;salkfjsahippertensioni eshte nje semundje qe shkakton ;salkfjsa'),
(2, 'anemik', 'humbje vetedije, marrje mendesh, zverdhje sysh,humbje vetedije, marrje mendesh, zverdhje sysh', 'anemia eshte nje semundje e rrezikshme e cila kerkon qe i semuri te marre gjak gjate gjithe kohes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(15) NOT NULL,
  `Emri` varchar(15) NOT NULL,
  `Mbiemri` varchar(15) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `ditelindja` date NOT NULL,
  `gjinia` char(1) NOT NULL,
  `grupi_gjakut` varchar(3) NOT NULL,
  `adresa` varchar(50) NOT NULL,
  `doktori_familjes` varchar(20) NOT NULL,
  `kategoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `Emri`, `Mbiemri`, `Password`, `ditelindja`, `gjinia`, `grupi_gjakut`, `adresa`, `doktori_familjes`, `kategoria`) VALUES
('11111', 'admin', 'admin', '583b460b436f4e14d6bcbaf865f815d6', '0000-00-00', '', '', '', '111111111111112', 'admin'),
('1111111111', 'Edison', 'biba', '583b460b436f4e14d6bcbaf865f815d6', '0000-00-00', 'm', 'a+', 'tirane', '111111111111111', 'pacient'),
('111111111111111', 'Doktori', 'Doktor', '583b460b436f4e14d6bcbaf865f815d6', '0000-00-00', 'm', '', 'flakdsf', '', 'doktor'),
('111111111111112', 'Asllan', 'Tito', '583b460b436f4e14d6bcbaf865f815d6', '0000-00-00', '', '', '', '', 'doktor'),
('1111111112', 'Oraldo', 'Hoxhallari', '583b460b436f4e14d6bcbaf865f815d6', '0000-00-00', '', '', '', '111111111111111', 'pacient'),
('1111111113', 'Leli', 'Rrushi', '583b460b436f4e14d6bcbaf865f815d6', '0000-00-00', '', '', '', '111111111111111', 'pacient'),
('1111111114', 'User', 'Test', '583b460b436f4e14d6bcbaf865f815d6', '0000-00-00', 'm', '', 'Tirane', '111111111111111', 'pacient'),
('1234567890', 'Griselda', 'Shkembi', '9d2e64075dbec7ee824cbd5d0244d352', '0000-00-00', 'F', '', 'tirane', '', 'pacient');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diagnostifikim`
--
ALTER TABLE `diagnostifikim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semundje`
--
ALTER TABLE `semundje`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diagnostifikim`
--
ALTER TABLE `diagnostifikim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `semundje`
--
ALTER TABLE `semundje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
