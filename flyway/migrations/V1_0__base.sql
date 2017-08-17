SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
) DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `teacher` int(11) NOT NULL
) DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `challenge` int(11) NOT NULL,
  `fun` int(11) NOT NULL,
  `integration` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `problems` int(11) NOT NULL,
  `comment` text COLLATE utf8_bin NOT NULL
) DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `forgot` (
  `id` varchar(40) COLLATE utf8_bin NOT NULL,
  `user` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `leckerwissen` (
  `id` int(11) NOT NULL,
  `link` text COLLATE utf8_bin NOT NULL,
  `title` text COLLATE utf8_bin NOT NULL,
  `category` enum('food','energy','culture','climate-change','production','other','water') COLLATE utf8_bin NOT NULL,
  `type` enum('article','video','other') COLLATE utf8_bin NOT NULL
) DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `milestone` (
  `id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL
) DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `solved_challenge` (
  `id` int(11) NOT NULL,
  `at` datetime NOT NULL,
  `class` int(11) NOT NULL,
  `challenge` int(11) NOT NULL,
  `extra` tinyint(1) NOT NULL
) DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `suggested` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `class` int(11) DEFAULT NULL,
  `points` int(11) NOT NULL,
  `location` enum('home','school','teacher') COLLATE utf8_bin NOT NULL,
  `extrapoints` int(11) DEFAULT NULL
) DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `password` varchar(200) COLLATE utf8_bin NOT NULL,
  `email` varchar(200) COLLATE utf8_bin NOT NULL,
  `role` int(11) NOT NULL
) DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

ALTER TABLE `challenge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`);

ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `teacher` (`teacher`);

ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `forgot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

ALTER TABLE `leckerwissen`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `milestone`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `points` (`points`);

ALTER TABLE `solved_challenge`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `class_2` (`class`,`challenge`),
  ADD KEY `class` (`class`),
  ADD KEY `challenge` (`challenge`);

ALTER TABLE `suggested`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class` (`class`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `challenge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `leckerwissen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `milestone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `solved_challenge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `suggested`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
