-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2016 at 09:30 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `challenge`
--

CREATE TABLE `challenge` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `description` varchar(2000) COLLATE utf8_bin NOT NULL,
  `points` int(11) NOT NULL,
  `category` varchar(100) COLLATE utf8_bin NOT NULL,
  `author` int(11) DEFAULT NULL,
  `author_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `challenge`
--

INSERT INTO `challenge` (`id`, `name`, `description`, `points`, `category`, `author`, `author_time`) VALUES
(1, 'Bio-Frühstück', 'Organisiert ein Frühstück für die Klasse, das ausschließlich aus Bio- und, wenn möglich, Fairtrade-Produkten besteht. Präsentiert der Klasse anschließend einen Vergleich der Inhaltsstoffe und Preise mit den konventionellen Nicht-Bio-Produkten.', 4, 'food', NULL, NULL),
(3, 'Beispielchallenge', 'Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. ', 2, 'energy', NULL, NULL),
(4, 'Beispielchallenge', 'Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. ', 2, 'culture', NULL, NULL),
(5, 'Beispielchallenge', 'Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. ', 2, 'climate-change', NULL, NULL),
(6, 'Beispielchallenge', 'Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. ', 2, 'production', NULL, NULL),
(7, 'Bio-Frühstück2', 'Organisiert ein Frühstück für die Klasse, das ausschließlich aus Bio- und, wenn möglich, Fairtrade-Produkten besteht. Präsentiert der Klasse anschließend einen Vergleich der Inhaltsstoffe und Preise mit den konventionellen Nicht-Bio-Produkten.', 7, 'energy', NULL, NULL),
(8, 'SelfMade-Essen', 'Organisiert ein Frühstück für die Klasse, das ausschließlich aus Bio- und, wenn möglich, Fairtrade-Produkten besteht. Präsentiert der Klasse anschließend einen Vergleich der Inhaltsstoffe und Preise mit den konventionellen Nicht-Bio-Produkten.', 7, 'selfmade', 1, '2016-01-01 12:00:00'),
(9, 'SelfMade-Essen2', 'Organisiert ein Frühstück für die Klasse, das ausschließlich aus Bio- und, wenn möglich, Fairtrade-Produkten besteht. Präsentiert der Klasse anschließend einen Vergleich der Inhaltsstoffe und Preise mit den konventionellen Nicht-Bio-Produkten.', 1, 'selfmade', 2, '2016-01-04 12:17:00'),
(10, 'SelfMade-Essen3', 'Organisiert ein Frühstück für die Klasse, das ausschließlich aus Bio- und, wenn möglich, Fairtrade-Produkten besteht. Präsentiert der Klasse anschließend einen Vergleich der Inhaltsstoffe und Preise mit den konventionellen Nicht-Bio-Produkten.', 1, 'selfmade', 1, '2015-12-25 12:26:00'),
(11, 'SelfMade-Essen4', 'Organisiert ein Frühstück für die Klasse, das ausschließlich aus Bio- und, wenn möglich, Fairtrade-Produkten besteht. Präsentiert der Klasse anschließend einen Vergleich der Inhaltsstoffe und Preise mit den konventionellen Nicht-Bio-Produkten.', 1, 'selfmade', 1, '2015-12-28 00:00:00'),
(12, 'SelfMade-Essen5', 'Organisiert ein Frühstück für die Klasse, das ausschließlich aus Bio- und, wenn möglich, Fairtrade-Produkten besteht. Präsentiert der Klasse anschließend einen Vergleich der Inhaltsstoffe und Preise mit den konventionellen Nicht-Bio-Produkten.', 1, 'selfmade', 1, '2016-01-07 06:00:00'),
(13, 'SelfMade-Essen6', 'Organisiert ein Frühstück für die Klasse, das ausschließlich aus Bio- und, wenn möglich, Fairtrade-Produkten besteht. Präsentiert der Klasse anschließend einen Vergleich der Inhaltsstoffe und Preise mit den konventionellen Nicht-Bio-Produkten.', 1, 'selfmade', 2, '2016-01-05 12:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`) VALUES
(1, 'Die Sojapatronen'),
(2, 'Elektrokürbis'),
(3, 'Mc Do Not');

-- --------------------------------------------------------

--
-- Table structure for table `solved_challenge`
--

CREATE TABLE `solved_challenge` (
  `id` int(11) NOT NULL,
  `at` datetime NOT NULL,
  `class` int(11) NOT NULL,
  `challenge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `solved_challenge`
--

INSERT INTO `solved_challenge` (`id`, `at`, `class`, `challenge`) VALUES
(1, '2015-12-25 07:28:34', 1, 1),
(2, '2015-12-24 00:00:00', 1, 11),
(3, '2015-12-23 20:00:00', 2, 5),
(4, '2015-12-24 16:00:00', 3, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `challenge`
--
ALTER TABLE `challenge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solved_challenge`
--
ALTER TABLE `solved_challenge`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `challenge`
--
ALTER TABLE `challenge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `solved_challenge`
--
ALTER TABLE `solved_challenge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
