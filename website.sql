-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 07. Jun 2016 um 21:53
-- Server-Version: 10.1.9-MariaDB
-- PHP-Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `website`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `challenge`
--

CREATE TABLE `challenge` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `points` int(11) NOT NULL,
  `category` enum('food','energy','culture','climate-change','production','selfmade','water') COLLATE utf8_bin NOT NULL,
  `author` int(11) DEFAULT NULL,
  `author_time` datetime DEFAULT NULL,
  `location` enum('home','school','teacher') COLLATE utf8_bin NOT NULL,
  `extrapoints` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `challenge`
--

INSERT INTO `challenge` (`id`, `name`, `description`, `points`, `category`, `author`, `author_time`, `location`, `extrapoints`) VALUES
(1, 'Bio-Frühstück', 'Organisiert ein Frühstück für die Klasse, das ausschließlich aus Bio- und, wenn möglich, Fairtrade-Produkten besteht. Präsentiert der Klasse anschließend einen Vergleich der Inhaltsstoffe und Preise mit den konventionellen Nicht-Bio-Produkten.', 4, 'food', NULL, NULL, 'teacher', 8),
(3, 'Beispielchallenge', 'Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. ', 2, 'energy', NULL, NULL, 'home', NULL),
(4, 'Beispielchallenge', 'Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. ', 2, 'culture', NULL, NULL, 'home', NULL),
(5, 'Beispielchallenge', 'Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. ', 2, 'climate-change', NULL, NULL, 'home', NULL),
(6, 'Beispielchallenge', 'Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. ', 2, 'production', NULL, NULL, 'teacher', NULL),
(7, 'Bio-Frühstück2', 'Organisiert ein Frühstück für die Klasse, das ausschließlich aus Bio- und, wenn möglich, Fairtrade-Produkten besteht. Präsentiert der Klasse anschließend einen Vergleich der Inhaltsstoffe und Preise mit den konventionellen Nicht-Bio-Produkten.', 7, 'energy', NULL, NULL, 'home', NULL),
(8, 'SelfMade-Essen', 'Organisiert ein Frühstück für die Klasse, das ausschließlich aus Bio- und, wenn möglich, Fairtrade-Produkten besteht. Präsentiert der Klasse anschließend einen Vergleich der Inhaltsstoffe und Preise mit den konventionellen Nicht-Bio-Produkten.', 7, 'selfmade', 1, '2016-01-01 12:00:00', 'home', NULL),
(9, 'SelfMade-Essen2', 'Organisiert ein Frühstück für die Klasse, das ausschließlich aus Bio- und, wenn möglich, Fairtrade-Produkten besteht. Präsentiert der Klasse anschließend einen Vergleich der Inhaltsstoffe und Preise mit den konventionellen Nicht-Bio-Produkten.', 1, 'selfmade', 2, '2016-01-04 12:17:00', 'home', NULL),
(10, 'SelfMade-Essen3', 'Organisiert ein Frühstück für die Klasse, das ausschließlich aus Bio- und, wenn möglich, Fairtrade-Produkten besteht. Präsentiert der Klasse anschließend einen Vergleich der Inhaltsstoffe und Preise mit den konventionellen Nicht-Bio-Produkten.', 1, 'selfmade', 1, '2015-12-25 12:26:00', 'home', NULL),
(11, 'SelfMade-Essen4', 'Organisiert ein Frühstück für die Klasse, das ausschließlich aus Bio- und, wenn möglich, Fairtrade-Produkten besteht. Präsentiert der Klasse anschließend einen Vergleich der Inhaltsstoffe und Preise mit den konventionellen Nicht-Bio-Produkten.', 1, 'selfmade', 1, '2015-12-28 00:00:00', 'home', NULL),
(12, 'SelfMade-Essen5', 'Organisiert ein Frühstück für die Klasse, das ausschließlich aus Bio- und, wenn möglich, Fairtrade-Produkten besteht. Präsentiert der Klasse anschließend einen Vergleich der Inhaltsstoffe und Preise mit den konventionellen Nicht-Bio-Produkten.', 1, 'selfmade', 1, '2016-01-07 06:00:00', 'home', NULL),
(13, 'SelfMade-Essen6', 'Organisiert ein Frühstück für die Klasse, das ausschließlich aus Bio- und, wenn möglich, Fairtrade-Produkten besteht. Präsentiert der Klasse anschließend einen Vergleich der Inhaltsstoffe und Preise mit den konventionellen Nicht-Bio-Produkten.', 1, 'selfmade', 2, '2016-01-05 12:27:00', 'home', NULL),
(14, 'Wasser1', 'Wasser, Wasser, Wasser...', 1, 'water', NULL, '2016-01-30 20:42:40', 'school', NULL),
(15, 'Wasser2', 'gaaaanz viel Wasser!', 2, 'water', NULL, '2016-01-30 20:42:56', 'home', NULL),
(16, 'TestChallenge', 'Challenge-Beschreibungdasdasdsadas', 1, 'selfmade', NULL, '2016-04-30 21:59:40', 'teacher', NULL),
(17, 'TestChallenge', 'Challenge-Beschreibungdasdasdsadas', 1, 'selfmade', NULL, '2016-04-30 22:01:26', 'teacher', NULL),
(18, 'ddd', 'Challenge-Beschreibungdasdasdsadas', 1, 'selfmade', NULL, '2016-04-30 22:03:03', 'teacher', NULL),
(19, 'oioli', 'Challenge-Beschreibung', 1, 'selfmade', NULL, '2016-05-01 16:01:39', 'home', 6),
(20, 'aaaaaaaaaa', 'Challenge-Beschreibung', 1, 'selfmade', NULL, '2016-05-01 18:20:46', 'home', NULL),
(21, 'aaaaaaaaaa', 'Challenge-Beschreibung', 1, 'selfmade', 1, '2016-05-01 18:37:03', 'home', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `class`
--

INSERT INTO `class` (`id`, `name`, `teacher`) VALUES
(1, 'Die Sojapatronen', 3),
(2, 'Elektrokürbis', 4),
(3, 'Mc Do Not', 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `challenge` int(11) NOT NULL,
  `fun` int(11) NOT NULL,
  `integration` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `problems` int(11) NOT NULL,
  `comment` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `feedback`
--

INSERT INTO `feedback` (`id`, `challenge`, `fun`, `integration`, `duration`, `problems`, `comment`) VALUES
(1, 1, 1, 3, 1, 5, ''),
(2, 1, 1, 3, 1, 5, 'dasdsad'),
(3, 14, 1, 2, 3, 4, 'Hallo!"";"34'),
(4, 1, 1, 4, 4, 1, ''),
(5, 1, 1, 4, 4, 1, ''),
(6, 1, 1, 4, 4, 1, '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `forgot`
--

CREATE TABLE `forgot` (
  `id` varchar(40) COLLATE utf8_bin NOT NULL,
  `user` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `forgot`
--

INSERT INTO `forgot` (`id`, `user`, `created_at`) VALUES
('8d451a979817ba96df103ac1e8352484', 3, '2016-05-02 10:51:52'),
('9b451ea8bd3ff91fd20ad7e661b28bd8', 3, '2016-05-02 10:55:10');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `leckerwissen`
--

CREATE TABLE `leckerwissen` (
  `id` int(11) NOT NULL,
  `link` text COLLATE utf8_bin NOT NULL,
  `title` text COLLATE utf8_bin NOT NULL,
  `category` enum('food','energy','culture','climate-change','production','other','water') COLLATE utf8_bin NOT NULL,
  `type` enum('article','video','other') COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `leckerwissen`
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
(36, 'http://www.klimaretter.info/', 'Klimaretter - Magazin zur Klima- und Energiewende', 'other', 'other'),
(37, 'http://example.de', 'dasd', 'culture', 'video');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `milestone`
--

CREATE TABLE `milestone` (
  `id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `milestone`
--

INSERT INTO `milestone` (`id`, `points`, `description`) VALUES
(1, 10, 'Schon nicht schlecht'),
(2, 20, 'ziemlich krass');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `solved_challenge`
--

CREATE TABLE `solved_challenge` (
  `id` int(11) NOT NULL,
  `at` datetime NOT NULL,
  `class` int(11) NOT NULL,
  `challenge` int(11) NOT NULL,
  `extra` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `solved_challenge`
--

INSERT INTO `solved_challenge` (`id`, `at`, `class`, `challenge`, `extra`) VALUES
(1, '2015-12-25 07:28:34', 1, 1, 0),
(2, '2015-12-24 00:00:00', 1, 11, 0),
(3, '2015-12-23 20:00:00', 2, 5, 0),
(4, '2015-12-24 16:00:00', 3, 7, 0),
(5, '2016-01-31 13:19:45', 2, 15, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `suggested`
--

CREATE TABLE `suggested` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `class` int(11) DEFAULT NULL,
  `points` int(11) NOT NULL,
  `location` enum('home','school','teacher') COLLATE utf8_bin NOT NULL,
  `extrapoints` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `suggested`
--

INSERT INTO `suggested` (`id`, `title`, `description`, `class`, `points`, `location`, `extrapoints`) VALUES
(3, 'Hallo!', 'Challenge-Beschreibung', 2, 7, 'home', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `password` varchar(200) COLLATE utf8_bin NOT NULL,
  `email` varchar(200) COLLATE utf8_bin NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `password`, `email`, `role`) VALUES
(3, '$2y$10$u6F8pbGlu8.VQ2lcBwH4XeYKp1tsO.81Tj511n91Nat6.R.tsPZOO', 'a@b.de', 2),
(4, '$2y$10$CenkCYnbeP01VK5PMheAnuWC6HaqoukjkldCHCqkzSVmfCj7Av8UG', 'teacher@test.de', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `challenge`
--
ALTER TABLE `challenge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`);

--
-- Indizes für die Tabelle `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `teacher` (`teacher`);

--
-- Indizes für die Tabelle `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `forgot`
--
ALTER TABLE `forgot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indizes für die Tabelle `leckerwissen`
--
ALTER TABLE `leckerwissen`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `milestone`
--
ALTER TABLE `milestone`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `points` (`points`);

--
-- Indizes für die Tabelle `solved_challenge`
--
ALTER TABLE `solved_challenge`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `class_2` (`class`,`challenge`),
  ADD KEY `class` (`class`),
  ADD KEY `challenge` (`challenge`);

--
-- Indizes für die Tabelle `suggested`
--
ALTER TABLE `suggested`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class` (`class`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `challenge`
--
ALTER TABLE `challenge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT für Tabelle `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT für Tabelle `leckerwissen`
--
ALTER TABLE `leckerwissen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT für Tabelle `milestone`
--
ALTER TABLE `milestone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `solved_challenge`
--
ALTER TABLE `solved_challenge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT für Tabelle `suggested`
--
ALTER TABLE `suggested`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `challenge`
--
ALTER TABLE `challenge`
  ADD CONSTRAINT `challenge_ibfk_1` FOREIGN KEY (`author`) REFERENCES `class` (`id`) ON DELETE SET NULL;

--
-- Constraints der Tabelle `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`teacher`) REFERENCES `user` (`id`);

--
-- Constraints der Tabelle `forgot`
--
ALTER TABLE `forgot`
  ADD CONSTRAINT `forgot_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `solved_challenge`
--
ALTER TABLE `solved_challenge`
  ADD CONSTRAINT `solved_challenge_ibfk_1` FOREIGN KEY (`class`) REFERENCES `class` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `solved_challenge_ibfk_2` FOREIGN KEY (`challenge`) REFERENCES `challenge` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `suggested`
--
ALTER TABLE `suggested`
  ADD CONSTRAINT `suggested_ibfk_1` FOREIGN KEY (`class`) REFERENCES `class` (`id`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
