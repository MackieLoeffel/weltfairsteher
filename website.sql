-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2016 at 07:05 PM
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
  `category` enum('food','energy','culture','climate-change','production','selfmade') COLLATE utf8_bin NOT NULL,
  `author` int(11) DEFAULT NULL,
  `author_time` datetime DEFAULT CURRENT_TIMESTAMP
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
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `teacher`) VALUES
(1, 'Die Sojapatronen', 3),
(2, 'Elektrokürbis', 4),
(3, 'Mc Do Not', 4);

-- --------------------------------------------------------

--
-- Table structure for table `leckerwissen`
--

CREATE TABLE `leckerwissen` (
  `id` int(11) NOT NULL,
  `link` text COLLATE utf8_bin NOT NULL,
  `title` text COLLATE utf8_bin NOT NULL,
  `category` enum('food','energy','culture','climate-change','production','other') COLLATE utf8_bin NOT NULL,
  `type` enum('article','video','other') COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `leckerwissen`
--

INSERT INTO `leckerwissen` (`id`, `link`, `title`, `category`, `type`) VALUES
(11, 'https://www.youtube.com/watch?v=iiDCNdsU4vI', 'Hagen Rether über Fleisch, Milch & Co [Kabarett]', 'food', 'video'),
(17, 'https://www.youtube.com/watch?v=zOAIOr18FFo', 'Freihandelsabkommen zwischen EU und Afrika', 'production', 'video'),
(18, 'https://news.utopia.de/ratgeber/diese-gruene-filme-sollte-jeder-gesehen-haben/?utm_source=Interessenten&utm_campaign=d3c906d3e5-Newsletter_Mo_15KW52_Interessenten&utm_medium=email&utm_term=0_af58dac727-d3c906d3e5-262279765', '15 Dokumentarfilme zu Nachhaltigkeit', 'food', 'article'),
(19, 'http://www.feelgreen.de/diese-seekuh-frisst-plastikmuell/id_76539278/index', 'Müllschiff soll Plastikmüll aus den Meeren fischen', 'climate-change', 'article'),
(20, 'https://www.facebook.com/gary.yourofsky/videos/886039734784609/', 'Methan - schlimmer als CO²?', 'climate-change', 'video'),
(21, 'http://www.klimaretter.info/forschung/nachricht/18133-landwirtschaft-ist-zweitgroesster-emittent', 'Landwirtschaft auf Rang 2 der größten Treibhausgasemittenten', 'climate-change', 'article'),
(22, 'https://news.utopia.de/ratgeber/12-bilder-die-zeigen-dass-mit-unserer-konsumkultur-etwas-nicht-stimmt/', '12 Bilder, die zeigen, dass mit unserer Konsumkultur etwas nicht stimmt', 'production', 'article'),
(23, 'http://www.feelgreen.de/klimawandel-anstieg-des-meeresspiegels-koennte-megastaedte-ueberfluten/id_76030018/index', 'Anstieg des Meeresspiegels könnte Megastädte überfluten', 'climate-change', 'article'),
(24, 'http://www.zdf.de/ZDFmediathek#/beitrag/video/2514628/Flucht-vor-dem-Klimawandel', 'Flucht vor dem Klimawandel (ZDF)', 'climate-change', 'video'),
(25, 'http://www.palettenbett.com/', 'Palettenmöbel selber bauen', 'production', 'other'),
(26, 'https://www.youtube.com/watch?v=lI0Xc2CWPjM', 'Konsum, Glück und Zeitknappheit', 'other', 'video'),
(27, 'http://de.yallahdeutschland.de/', 'Yallah Deutschland - Videoportal zu Flüchtlingen', 'culture', 'other'),
(28, 'http://www.erneuerbareenergien.de/erneuerbaren-anteil-steigt-2015-voraussichtlich-auf-33-prozent/150/434/91426/', 'Ökostrom-Anteil in Deutschland', 'energy', 'article'),
(29, 'https://www.youtube.com/watch?v=lmXAwTisSd0', 'Gründe, sich vegan zu ernähren', 'food', 'video'),
(30, 'http://www.vegan.eu/index.php/was_ist_vegan.html', 'Was ist vegan?', 'food', 'article'),
(31, 'http://www.wwf.de/2012/maerz/kampf-gegen-globale-wasserkrise/', 'Weltweite Wasserknappheit sorgt für Konflikte', 'energy', 'article'),
(32, 'http://www.globalisierung-fakten.de/folgen-der-globalisierung/krisen/wasserknappheit/', 'Fakten zu Wasserknappheit', 'energy', 'article'),
(33, 'http://ec.europa.eu/environment/pubs/pdf/factsheets/water_scarcity/de.pdf', 'Dürre in der EU', 'energy', 'article'),
(34, 'http://www.biorama.eu/', 'Biorama - Magazin für nachhaltigen Lebensstil', 'other', 'other'),
(35, 'http://www.degrowth.de/de/?', 'Degrowth - Antiwachstumsbewegung', 'culture', 'other'),
(36, 'http://www.klimaretter.info/', 'Klimaretter - Magazin zur Klima- und Energiewende', 'other', 'other');

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

-- --------------------------------------------------------

--
-- Table structure for table `suggested`
--

CREATE TABLE `suggested` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `class` int(11) DEFAULT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `suggested`
--

INSERT INTO `suggested` (`id`, `title`, `description`, `class`, `points`) VALUES
(2, 'dd', 'Challenge-Beschreibung', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `password` varchar(200) COLLATE utf8_bin NOT NULL,
  `email` varchar(30) COLLATE utf8_bin NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `email`, `role`) VALUES
(3, '$2y$10$u6F8pbGlu8.VQ2lcBwH4XeYKp1tsO.81Tj511n91Nat6.R.tsPZOO', 'a@b.de', 2),
(4, '$2y$10$VD8rg18PgyjWI8kuluGUJucrPrK85DtNGgpjW3IYVda1mjEPt765K', 'teacher@test.de', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `challenge`
--
ALTER TABLE `challenge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `teacher` (`teacher`);

--
-- Indexes for table `leckerwissen`
--
ALTER TABLE `leckerwissen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solved_challenge`
--
ALTER TABLE `solved_challenge`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `class_2` (`class`,`challenge`),
  ADD KEY `class` (`class`),
  ADD KEY `challenge` (`challenge`);

--
-- Indexes for table `suggested`
--
ALTER TABLE `suggested`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class` (`class`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
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
-- AUTO_INCREMENT for table `leckerwissen`
--
ALTER TABLE `leckerwissen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `solved_challenge`
--
ALTER TABLE `solved_challenge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `suggested`
--
ALTER TABLE `suggested`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `challenge`
--
ALTER TABLE `challenge`
  ADD CONSTRAINT `challenge_ibfk_1` FOREIGN KEY (`author`) REFERENCES `class` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`teacher`) REFERENCES `user` (`id`);

--
-- Constraints for table `solved_challenge`
--
ALTER TABLE `solved_challenge`
  ADD CONSTRAINT `solved_challenge_ibfk_1` FOREIGN KEY (`class`) REFERENCES `class` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `solved_challenge_ibfk_2` FOREIGN KEY (`challenge`) REFERENCES `challenge` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `suggested`
--
ALTER TABLE `suggested`
  ADD CONSTRAINT `suggested_ibfk_1` FOREIGN KEY (`class`) REFERENCES `class` (`id`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
