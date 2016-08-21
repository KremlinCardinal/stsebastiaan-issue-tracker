-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 21 aug 2016 om 20:54
-- Serverversie: 5.6.26
-- PHP-versie: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stsebastiaan_issue_tracker`
--
CREATE DATABASE IF NOT EXISTS `stsebastiaan_issue_tracker` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `stsebastiaan_issue_tracker`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `categories`
--

INSERT INTO `categories` (`id`, `cat_name`) VALUES
(1, 'keuken'),
(2, 'toiletten'),
(3, 'baan indoor'),
(4, 'baan outdoor'),
(5, 'materiaal'),
(6, 'overig');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `issues`
--

CREATE TABLE IF NOT EXISTS `issues` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT '',
  `description` text,
  `created_by` varchar(255) DEFAULT '' COMMENT 'FK - users.id',
  `created_on` varchar(255) DEFAULT '',
  `deadline` varchar(255) DEFAULT '',
  `supervisor` varchar(255) DEFAULT '' COMMENT 'FK - users.id',
  `assigned_to` varchar(255) DEFAULT '' COMMENT 'FK - users.id',
  `status` varchar(255) DEFAULT '' COMMENT 'FK - statusses.id',
  `last_edit` varchar(255) DEFAULT '',
  `category` varchar(255) DEFAULT '' COMMENT 'FK - categories.id'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `issues`
--

INSERT INTO `issues` (`id`, `title`, `description`, `created_by`, `created_on`, `deadline`, `supervisor`, `assigned_to`, `status`, `last_edit`, `category`) VALUES
(1, 'test_title', 'test_description', '1', '2016-08-21', '2016-12-21', '1', '1', '6', '2016-08-21', '1'),
(2, 'test_title 2', 'Dikke omschrijving zeg!', '1', '2016-08-21', '', '', '1', '1', '2016-08-21', '2');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `statusses`
--

CREATE TABLE IF NOT EXISTS `statusses` (
  `id` int(11) NOT NULL,
  `status_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `statusses`
--

INSERT INTO `statusses` (`id`, `status_name`) VALUES
(1, 'nieuw'),
(2, 'toegewezen'),
(3, 'opgepakt'),
(4, 'feedback'),
(5, 'afgerond'),
(6, 'gesloten');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `between_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `first_name`, `between_name`, `last_name`, `email`, `password`, `salt`) VALUES
(1, 'michiel', NULL, 'dijk', 'michiellof@gmail.com', '', '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `statusses`
--
ALTER TABLE `statusses`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT voor een tabel `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `statusses`
--
ALTER TABLE `statusses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
