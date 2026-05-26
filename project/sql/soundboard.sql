-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db_server
-- Erstellungszeit: 26. Mai 2026 um 13:33
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
(1, 'user', '../images/icons/light/User.svg', '$2y$10$5Nm46LopObic7cf39qUHL.27d9v0fFge.yDSmkfi60XPzlrN8gswm', '2026-04-28', '2026-04-28', 0),
(2, '2', '../images/icons/light/User.svg', '$2y$10$Phbaw4hSGrbYFmMfTZ9gPONzTbg1I15QCeOMOxIs9mdRXPHVLIbSC', '2026-05-05', '2026-05-05', 0),
(3, '4', '../images/icons/light/User.svg', '$2y$10$1iBkFteGa1f8mtx30432jODz7GV/RilUBsoiBAEU3V8lP868zmvYC', '2026-05-05', '2026-05-05', 0),
(5, '1', '../images/icons/light/User.svg', '$2y$10$GtFPbtc4t9pnFGlhEe/KH.0CLQYmPxum4PpBgDuFOt4hwUNLnxKCy', '2026-05-05', '2026-05-05', 0),
(6, '3', '../images/icons/light/User.svg', '$2y$10$eXf.fN0uNp3roUWBhdAHJOgmsvQwpBrb/BI6w33wOrvqldO4.8KLG', '2026-05-05', '2026-05-05', 0),
(7, '5', '../images/icons/light/User.svg', '$2y$10$lDtZ9bxfmWT3RYmw3OYXfO.kubq4.dsuoU1Ot4aLRRvF1TVmv6fgS', '2026-05-05', '2026-05-05', 0),
(8, '6', '../images/icons/light/User.svg', '$2y$10$1q7P25g7QV60Y1qO64Eva.NEhBq9DNvuonFcWdC7n6SjPwfExQ6l.', '2026-05-05', '2026-05-05', 0),
(9, '7', '../images/icons/light/User.svg', '$2y$10$DMXYFmy4sRaaC8qPZBvIbOuTUj354//RqG9m22iVFarIPlyc8QGI6', '2026-05-05', '2026-05-05', 0),
(10, '8', '../images/icons/light/User.svg', '$2y$10$n91aZWZPCa5X/uhEl7Itqeefq3p9oW2HySICRKFs7ALt/HgAbIy1G', '2026-05-05', '2026-05-05', 0),
(11, '9', '../images/icons/light/User.svg', '$2y$10$ibqODYyDUaNFSpQztenS8OpYnfYcSHbTgM0M.s87U7XqYYwTxsh6G', '2026-05-05', '2026-05-05', 0),
(12, '10', '../images/icons/light/User.svg', '$2y$10$uUwl2v1yxTUde4D4nLQtJej/65CXysXmgm69fwI0lG2MuTT62saoq', '2026-05-05', '2026-05-05', 0),
(13, '11', '../images/icons/light/User.svg', '$2y$10$woeVDSxySOLG5PQbjWzy6eiVy6KbDc2uXyr/NvFn31/tchJyUE4EW', '2026-05-05', '2026-05-05', 0),
(14, '15', '../uploads/14/WhatsApp Image 2026-05-22 at 23.06.45.jpeg', '$2y$10$cr3jnCXEWxtnyhpv8f/lBeBb/Pfy/gaXGwG4gzycOLVmVefkgGd9q', '2026-05-05', '2026-05-26', 0),
(15, '16', '../uploads/15/WhatsApp Image 2026-05-22 at 23.06.45.jpeg', '$2y$10$55ppyjEbVNF9LclYV744..yqPdxOwhj/1RGPEcX1Es8IWU5hMk/vW', '2026-05-26', '2026-05-26', 0),
(16, '17', '../uploads/16/Screenshot 2026-01-14 115341.png', '$2y$10$.IRF1v2f2Q83WdBa/zmBYOatxWRtacQ3YBcLBIzE3NkPTDzL7HqYe', '2026-05-26', '2026-05-26', 0);

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
  MODIFY `id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
