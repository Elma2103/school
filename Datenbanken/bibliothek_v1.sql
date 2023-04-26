-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 29. Mrz 2023 um 20:09
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
(2, 2, 2, '2023-03-05', '2023-03-15'),
(3, 2, 1, '2023-03-16', '2023-03-22'),
(4, 1, 2, '2023-02-25', '2023-03-01');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `buecher`
--

CREATE TABLE `buecher` (
  `IDBuch` int(10) UNSIGNED NOT NULL,
  `ISBN` varchar(32) NOT NULL,
  `Titel` varchar(128) NOT NULL,
  `Verlag` varchar(64) DEFAULT NULL,
  `Autor` varchar(64) NOT NULL,
  `Erscheinungsdatum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `buecher`
--

INSERT INTO `buecher` (`IDBuch`, `ISBN`, `Titel`, `Verlag`, `Autor`, `Erscheinungsdatum`) VALUES
(1, '978-1-4778-2235-7', 'Der Lebkuchenmann / Jack ', 'Edition M', 'J.A. Konrath', '2014-06-03'),
(2, '978-3-404-17812-4', 'Die Säulen der Erde', 'Lübbe', 'Ken Follett', '2019-04-01');

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
-- Indizes für die Tabelle `buecher`
--
ALTER TABLE `buecher`
  ADD PRIMARY KEY (`IDBuch`);

--
-- Indizes für die Tabelle `kunden`
--
ALTER TABLE `kunden`
  ADD PRIMARY KEY (`IDKunde`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `ausleihe`
--
ALTER TABLE `ausleihe`
  MODIFY `IDAusleihe` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `ausleihe`
--
ALTER TABLE `ausleihe`
  ADD CONSTRAINT `ausleihe_ibfk_1` FOREIGN KEY (`FIDBuch`) REFERENCES `buecher` (`IDBuch`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ausleihe_ibfk_2` FOREIGN KEY (`FIDKunde`) REFERENCES `kunden` (`IDKunde`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
