-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 31 aug 2016 om 12:13
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
  `cat_name` varchar(255) DEFAULT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `sort`) VALUES
(1, 'keuken', 1),
(2, 'toiletten', 2),
(3, 'baan indoor', 3),
(4, 'baan outdoor', 4),
(5, 'materiaal', 5),
(6, 'overig', 6),
(7, '-', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `issues`
--

CREATE TABLE IF NOT EXISTS `issues` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT '',
  `description` text,
  `created_by` varchar(255) DEFAULT NULL COMMENT 'FK - users.id',
  `created_on` varchar(255) DEFAULT NULL,
  `deadline` varchar(255) DEFAULT '-',
  `supervisor` varchar(255) DEFAULT '1' COMMENT 'FK - users.id',
  `assigned_to` varchar(255) DEFAULT '1' COMMENT 'FK - users.id',
  `status` varchar(255) DEFAULT '7' COMMENT 'FK - statusses.id',
  `last_edit` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT '7' COMMENT 'FK - categories.id'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `issues`
--

INSERT INTO `issues` (`id`, `title`, `description`, `created_by`, `created_on`, `deadline`, `supervisor`, `assigned_to`, `status`, `last_edit`, `category`) VALUES
(1, 'test_title', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.', '1', '2016-08-21', '2016-12-21', '1', '1', '1', '2016-08-21', '1'),
(2, 'test_title 2', 'Dikke omschrijving zeg!', '2', '2016-08-21', '-', '2', '2', '2', '2016-08-21', '2'),
(3, 'test_3', 'dikke test', '2', '2016-08-23', '-', '1', '1', '3', '2016-08-23', '3'),
(4, 'test_4', 'dikke test joh', '2', '2016-08-23', '-', '1', '1', '4', '2016-08-23', '4'),
(5, 'test_5', 'test_5 ding', '2', '2016-08-23', '-', '1', '1', '5', '2016-08-23', '5'),
(6, 'test_6', 'test_6 ding', '2', '2016-08-23', '-', '1', '1', '6', '2016-08-23', '6');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `statusses`
--

CREATE TABLE IF NOT EXISTS `statusses` (
  `id` int(11) NOT NULL,
  `status_name` varchar(255) DEFAULT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `statusses`
--

INSERT INTO `statusses` (`id`, `status_name`, `sort`) VALUES
(1, 'nieuw', 1),
(2, 'toegewezen', 2),
(3, 'opgepakt', 3),
(4, 'feedback', 4),
(5, 'afgerond', 5),
(6, 'gesloten', 6),
(7, '-', 0);

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
  `hash` varchar(255) DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `active` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `first_name`, `between_name`, `last_name`, `email`, `hash`, `level`, `active`) VALUES
(1, '-', NULL, NULL, NULL, NULL, 0, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT voor een tabel `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT voor een tabel `statusses`
--
ALTER TABLE `statusses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
