-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 12. Apr 2023 um 21:10
-- Server-Version: 10.4.27-MariaDB
-- PHP-Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `dvd_sammlung`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `film`
--

CREATE TABLE `film` (
  `IDFilm` int(10) UNSIGNED NOT NULL,
  `Titel` varchar(255) NOT NULL,
  `Laufzeit` int(3) UNSIGNED NOT NULL,
  `DolbyDigital` tinyint(1) NOT NULL DEFAULT 1,
  `FIDSprache` int(10) UNSIGNED DEFAULT NULL,
  `FIDGenre` int(10) UNSIGNED DEFAULT NULL,
  `FIDRegisseur` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `film`
--

INSERT INTO `film` (`IDFilm`, `Titel`, `Laufzeit`, `DolbyDigital`, `FIDSprache`, `FIDGenre`, `FIDRegisseur`) VALUES
(1, 'Django Unchained', 165, 1, 1, 2, 2),
(2, 'Der Super Mario Bros.', 92, 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `film_schauspieler`
--

CREATE TABLE `film_schauspieler` (
  `IDFilmSchauspiler` int(10) UNSIGNED NOT NULL,
  `FIDSchauspieler` int(10) UNSIGNED NOT NULL,
  `FIDFilm` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `film_schauspieler`
--

INSERT INTO `film_schauspieler` (`IDFilmSchauspiler`, `FIDSchauspieler`, `FIDFilm`) VALUES
(2, 1, 2),
(3, 2, 2),
(1, 3, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `genre`
--

CREATE TABLE `genre` (
  `IDGenre` int(10) UNSIGNED NOT NULL,
  `Bezeichnung` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `genre`
--

INSERT INTO `genre` (`IDGenre`, `Bezeichnung`) VALUES
(1, 'Animation'),
(2, 'Action'),
(3, 'Dramedy'),
(4, 'Comedy');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `regisseur`
--

CREATE TABLE `regisseur` (
  `IDRegisseur` int(10) UNSIGNED NOT NULL,
  `Vorname` varchar(32) NOT NULL,
  `Nachname` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `regisseur`
--

INSERT INTO `regisseur` (`IDRegisseur`, `Vorname`, `Nachname`) VALUES
(1, 'Steven', 'Spielberg'),
(2, 'Quantin', 'Tarentino');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `schauspieler`
--

CREATE TABLE `schauspieler` (
  `IDSchauspieler` int(10) UNSIGNED NOT NULL,
  `Vorname` varchar(32) NOT NULL,
  `Nachname` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `schauspieler`
--

INSERT INTO `schauspieler` (`IDSchauspieler`, `Vorname`, `Nachname`) VALUES
(1, 'Mario', 'Super'),
(2, 'Luigi', 'Super'),
(3, 'Christoph', 'Waltz'),
(4, 'Reese', 'Whiterspoon');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sprache`
--

CREATE TABLE `sprache` (
  `IDSprache` int(10) UNSIGNED NOT NULL,
  `Bezeichnung` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `sprache`
--

INSERT INTO `sprache` (`IDSprache`, `Bezeichnung`) VALUES
(1, 'Deutsch'),
(2, 'Englisch');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`IDFilm`),
  ADD KEY `FIDSprache` (`FIDSprache`,`FIDGenre`,`FIDRegisseur`),
  ADD KEY `FIDGenre` (`FIDGenre`),
  ADD KEY `FIDRegisseur` (`FIDRegisseur`);

--
-- Indizes für die Tabelle `film_schauspieler`
--
ALTER TABLE `film_schauspieler`
  ADD PRIMARY KEY (`IDFilmSchauspiler`),
  ADD KEY `FIDSchauspieler` (`FIDSchauspieler`,`FIDFilm`),
  ADD KEY `FIDFilm` (`FIDFilm`);

--
-- Indizes für die Tabelle `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`IDGenre`);

--
-- Indizes für die Tabelle `regisseur`
--
ALTER TABLE `regisseur`
  ADD PRIMARY KEY (`IDRegisseur`);

--
-- Indizes für die Tabelle `schauspieler`
--
ALTER TABLE `schauspieler`
  ADD PRIMARY KEY (`IDSchauspieler`);

--
-- Indizes für die Tabelle `sprache`
--
ALTER TABLE `sprache`
  ADD PRIMARY KEY (`IDSprache`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `film`
--
ALTER TABLE `film`
  MODIFY `IDFilm` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `film_schauspieler`
--
ALTER TABLE `film_schauspieler`
  MODIFY `IDFilmSchauspiler` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `genre`
--
ALTER TABLE `genre`
  MODIFY `IDGenre` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `regisseur`
--
ALTER TABLE `regisseur`
  MODIFY `IDRegisseur` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `schauspieler`
--
ALTER TABLE `schauspieler`
  MODIFY `IDSchauspieler` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `sprache`
--
ALTER TABLE `sprache`
  MODIFY `IDSprache` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`FIDGenre`) REFERENCES `genre` (`IDGenre`) ON DELETE SET NULL,
  ADD CONSTRAINT `film_ibfk_2` FOREIGN KEY (`FIDRegisseur`) REFERENCES `regisseur` (`IDRegisseur`) ON DELETE SET NULL,
  ADD CONSTRAINT `film_ibfk_3` FOREIGN KEY (`FIDSprache`) REFERENCES `sprache` (`IDSprache`) ON DELETE SET NULL;

--
-- Constraints der Tabelle `film_schauspieler`
--
ALTER TABLE `film_schauspieler`
  ADD CONSTRAINT `film_schauspieler_ibfk_1` FOREIGN KEY (`FIDFilm`) REFERENCES `film` (`IDFilm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `film_schauspieler_ibfk_2` FOREIGN KEY (`FIDSchauspieler`) REFERENCES `schauspieler` (`IDSchauspieler`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
