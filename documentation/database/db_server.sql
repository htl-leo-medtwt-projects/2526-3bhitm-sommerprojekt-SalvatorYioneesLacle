-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db_server
-- Erstellungszeit: 16. Jun 2026 um 05:37
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
CREATE DATABASE IF NOT EXISTS `soundboard` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `soundboard`;

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
(1, '1', '1', '../uploads/1/1.mp3', 1, 1),
(2, '2', '2', '../uploads/1/2.mp3', 1, 1),
(3, '3', '3', '../uploads/1/3.mp3', 1, 1),
(4, '4', '4', '../uploads/1/4.mp3', 1, 1),
(5, 'EEEHHH', 'EEE', '../uploads/1/EEEHHH.mp3', 1, 0),
(6, 'loud-thunder-192165', 'lou', '../uploads/1/loud-thunder-192165.mp3', 1, 0),
(7, 'war-horn-blast-14760', 'war', '../uploads/1/war-horn-blast-14760.mp3', 1, 0),
(8, 'danger-approaching-14740', 'dan', '../uploads/1/danger-approaching-14740.mp3', 1, 0),
(9, 'dramatic-horn-2', 'dra', '../uploads/1/dramatic-horn-2.mp3', 1, 0),
(17, 'bhvfb', 'bhv', '../uploads/1/bhvfb.mp3', 1, 1),
(18, '8967', '896', '../uploads/2/8967.mp3', 2, 1),
(19, 'knj', 'knj', '../uploads/2/knj.mp3', 2, 1),
(20, '5424jkh', '542', '../uploads/2/5424jkh.mp3', 2, 0),
(21, 'epic-horn-105102', 'epi', '../uploads/3/epic-horn-105102.mp3', 3, 0),
(22, '123', '123', '../uploads/3/123.mp3', 3, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` tinyint NOT NULL,
  `username` varchar(50) NOT NULL,
  `profile_picture` varchar(200) NOT NULL,
  `password_hash` varchar(64) NOT NULL,
  `signup_date` date NOT NULL,
  `last_login` date NOT NULL,
  `user_deleted` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `profile_picture`, `password_hash`, `signup_date`, `last_login`, `user_deleted`) VALUES
(1, '15', 'uploads/1/User.svg', '$2y$10$uSwLUV6.J/wgOer8UKk6.eMVqyzdQOUgl9ZaRZ9y2BmN6Sl3EwzfG', '2026-05-26', '2026-06-15', 0),
(2, '16', 'images/icons/light/User.svg', '$2y$10$cIOti3qNB5zcDm/SGKUZ8OMzQQq60kmysXMbvhRtlVVJjS99II1Ke', '2026-06-02', '2026-06-15', 0),
(3, 'salvator', 'uploads/3/soundboard.svg', '$2y$10$WSLPnfUWFVrUTIsiQprNnubzJeSPF0vHpx0Q8FN88jxzvak4DLUtG', '2026-06-16', '2026-06-16', 0);

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
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `sounds`
--
ALTER TABLE `sounds`
  MODIFY `id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
