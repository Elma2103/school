-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 29. Mrz 2023 um 21:08
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
-- Datenbank: `bibliothek`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ausleihe`
--

CREATE TABLE `ausleihe` (
  `IDAusleihe` int(10) UNSIGNED NOT NULL,
  `FIDBuch` int(10) UNSIGNED NOT NULL,
  `FIDKunde` int(10) UNSIGNED NOT NULL,
  `Ausleihdatum` date NOT NULL,
  `Rueckgabedatum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `ausleihe`
--

INSERT INTO `ausleihe` (`IDAusleihe`, `FIDBuch`, `FIDKunde`, `Ausleihdatum`, `Rueckgabedatum`) VALUES
(1, 1, 1, '2023-03-02', NULL),
(4, 1, 2, '2023-02-25', '2023-03-01');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `autoren`
--

CREATE TABLE `autoren` (
  `IDAutor` int(10) UNSIGNED NOT NULL,
  `Vorname` varchar(32) NOT NULL,
  `Nachname` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `autoren`
--

INSERT INTO `autoren` (`IDAutor`, `Vorname`, `Nachname`) VALUES
(1, 'J.A. ', 'Konrath'),
(2, 'J.R.R.', 'Tolkien');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `buch_autor`
--

CREATE TABLE `buch_autor` (
  `FIDBuch` int(10) UNSIGNED NOT NULL,
  `FIDAutor` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `buch_autor`
--

INSERT INTO `buch_autor` (`FIDBuch`, `FIDAutor`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `buecher`
--

CREATE TABLE `buecher` (
  `IDBuch` int(10) UNSIGNED NOT NULL,
  `ISBN` varchar(32) NOT NULL,
  `Titel` varchar(128) NOT NULL,
  `FIDVerlag` int(10) UNSIGNED DEFAULT NULL,
  `Autor` varchar(64) NOT NULL,
  `Erscheinungsdatum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `buecher`
--

INSERT INTO `buecher` (`IDBuch`, `ISBN`, `Titel`, `FIDVerlag`, `Autor`, `Erscheinungsdatum`) VALUES
(1, '978-1-4778-2235-7', 'Der Lebkuchenmann / Jack ', 1, '1,2', '2014-06-03');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunden`
--

CREATE TABLE `kunden` (
  `IDKunde` int(10) UNSIGNED NOT NULL,
  `Vorname` varchar(32) NOT NULL,
  `Nachname` varchar(32) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `Telefonnummer` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `kunden`
--

INSERT INTO `kunden` (`IDKunde`, `Vorname`, `Nachname`, `Email`, `Telefonnummer`) VALUES
(1, 'John', 'Doe', 'john@doe.com', '06641111111'),
(2, 'Jane', 'Doe', 'jane@doe.com', '06642222222');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `verlaege`
--

CREATE TABLE `verlaege` (
  `IDVerlag` int(10) UNSIGNED NOT NULL,
  `Name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `verlaege`
--

INSERT INTO `verlaege` (`IDVerlag`, `Name`) VALUES
(1, 'Edition M');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `ausleihe`
--
ALTER TABLE `ausleihe`
  ADD PRIMARY KEY (`IDAusleihe`),
  ADD KEY `FIDBuch` (`FIDBuch`,`FIDKunde`),
  ADD KEY `ausleihe_ibfk_2` (`FIDKunde`);

--
-- Indizes für die Tabelle `autoren`
--
ALTER TABLE `autoren`
  ADD PRIMARY KEY (`IDAutor`);

--
-- Indizes für die Tabelle `buch_autor`
--
ALTER TABLE `buch_autor`
  ADD PRIMARY KEY (`FIDBuch`,`FIDAutor`),
  ADD KEY `FIDAutor` (`FIDAutor`);

--
-- Indizes für die Tabelle `buecher`
--
ALTER TABLE `buecher`
  ADD PRIMARY KEY (`IDBuch`),
  ADD KEY `FIDVerlag` (`FIDVerlag`),
  ADD KEY `FIDVerlag_2` (`FIDVerlag`);

--
-- Indizes für die Tabelle `kunden`
--
ALTER TABLE `kunden`
  ADD PRIMARY KEY (`IDKunde`);

--
-- Indizes für die Tabelle `verlaege`
--
ALTER TABLE `verlaege`
  ADD PRIMARY KEY (`IDVerlag`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `ausleihe`
--
ALTER TABLE `ausleihe`
  MODIFY `IDAusleihe` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `autoren`
--
ALTER TABLE `autoren`
  MODIFY `IDAutor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `buecher`
--
ALTER TABLE `buecher`
  MODIFY `IDBuch` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `kunden`
--
ALTER TABLE `kunden`
  MODIFY `IDKunde` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `verlaege`
--
ALTER TABLE `verlaege`
  MODIFY `IDVerlag` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `ausleihe`
--
ALTER TABLE `ausleihe`
  ADD CONSTRAINT `ausleihe_ibfk_1` FOREIGN KEY (`FIDBuch`) REFERENCES `buecher` (`IDBuch`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ausleihe_ibfk_2` FOREIGN KEY (`FIDKunde`) REFERENCES `kunden` (`IDKunde`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `buch_autor`
--
ALTER TABLE `buch_autor`
  ADD CONSTRAINT `buch_autor_ibfk_1` FOREIGN KEY (`FIDAutor`) REFERENCES `autoren` (`IDAutor`),
  ADD CONSTRAINT `buch_autor_ibfk_2` FOREIGN KEY (`FIDBuch`) REFERENCES `buecher` (`IDBuch`);

--
-- Constraints der Tabelle `buecher`
--
ALTER TABLE `buecher`
  ADD CONSTRAINT `buecher_ibfk_1` FOREIGN KEY (`FIDVerlag`) REFERENCES `verlaege` (`IDVerlag`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
