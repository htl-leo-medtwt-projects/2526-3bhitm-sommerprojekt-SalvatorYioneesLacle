-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db_server
-- Erstellungszeit: 26. Mai 2026 um 13:34
-- Server-Version: 9.6.0
-- PHP-Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `soundboard`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sounds`
--

CREATE TABLE `sounds` (
  `id` tinyint NOT NULL,
  `name` varchar(100) NOT NULL,
  `short_name` varchar(5) NOT NULL,
  `path` varchar(200) NOT NULL,
  `user_id` tinyint NOT NULL,
  `public` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `sounds`
--

INSERT INTO `sounds` (`id`, `name`, `short_name`, `path`, `user_id`, `public`) VALUES
(1, '1', '1', '../uploads/14/1.mp3', 14, 1),
(2, '2', '2', '../uploads/14/2.mp3', 14, 1),
(3, '3', '3', '../uploads/14/3.mp3', 14, 1),
(4, '4', '4', '../uploads/14/4.mp3', 14, 1),
(5, '5', '5', '../uploads/14/5.mp3', 14, 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `sounds`
--
ALTER TABLE `sounds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sounds_users_fk` (`user_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `sounds`
--
ALTER TABLE `sounds`
  MODIFY `id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `sounds`
--
ALTER TABLE `sounds`
  ADD CONSTRAINT `sounds_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
