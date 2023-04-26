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
-- Datenbank: `auftragsverwaltung`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `artikel`
--

CREATE TABLE `artikel` (
  `IDArtikel` int(10) UNSIGNED NOT NULL,
  `Bezeichnung` varchar(32) NOT NULL,
  `Preis` decimal(8,2) NOT NULL,
  `Lagerstand` float NOT NULL DEFAULT 0,
  `FIDArtikelgruppe` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `artikel`
--

INSERT INTO `artikel` (`IDArtikel`, `Bezeichnung`, `Preis`, `Lagerstand`, `FIDArtikelgruppe`) VALUES
(1, 'iPhone', '999.99', 10, 2),
(2, 'Ovomaltine', '9.99', 25, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `artikelgruppe`
--

CREATE TABLE `artikelgruppe` (
  `IDArtikelgruppe` int(10) UNSIGNED NOT NULL,
  `Bezeichnung` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `artikelgruppe`
--

INSERT INTO `artikelgruppe` (`IDArtikelgruppe`, `Bezeichnung`) VALUES
(1, 'Nahrungsmittel'),
(2, 'EDV-Geräte');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auftrag`
--

CREATE TABLE `auftrag` (
  `IDAuftrag` int(10) UNSIGNED NOT NULL,
  `Erstellt_am` datetime NOT NULL,
  `FIDKunde` int(10) UNSIGNED DEFAULT NULL,
  `FIDRechnung` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `auftrag`
--

INSERT INTO `auftrag` (`IDAuftrag`, `Erstellt_am`, `FIDKunde`, `FIDRechnung`) VALUES
(1, '2023-04-12 20:19:56', 1, 1),
(2, '2023-04-12 19:19:56', 2, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auftrag_artikel`
--

CREATE TABLE `auftrag_artikel` (
  `IDAuftrag_Artikel` int(10) UNSIGNED NOT NULL,
  `FIDAuftrag` int(10) UNSIGNED NOT NULL,
  `FIDArtikel` int(10) UNSIGNED NOT NULL,
  `Menge` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `auftrag_artikel`
--

INSERT INTO `auftrag_artikel` (`IDAuftrag_Artikel`, `FIDAuftrag`, `FIDArtikel`, `Menge`) VALUES
(1, 1, 1, 2),
(2, 2, 2, 10);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunde`
--

CREATE TABLE `kunde` (
  `IDKunde` int(10) UNSIGNED NOT NULL,
  `Vorname` varchar(32) NOT NULL,
  `Nachname` varchar(32) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `FIDKundengruppe` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `kunde`
--

INSERT INTO `kunde` (`IDKunde`, `Vorname`, `Nachname`, `Email`, `FIDKundengruppe`) VALUES
(1, 'Susi', 'Musterfrau', 'susi@musterfrau.at', 2),
(2, 'Max', 'Mustermann', 'max@mustermann.at', 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kundengruppe`
--

CREATE TABLE `kundengruppe` (
  `IDKundengruppe` int(10) UNSIGNED NOT NULL,
  `Bezeichnung` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `kundengruppe`
--

INSERT INTO `kundengruppe` (`IDKundengruppe`, `Bezeichnung`) VALUES
(1, 'Privatkunde'),
(2, 'Großkunde'),
(3, 'Händler');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rechnung`
--

CREATE TABLE `rechnung` (
  `IDRechnung` int(10) UNSIGNED NOT NULL,
  `Rechnungsdatum` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `rechnung`
--

INSERT INTO `rechnung` (`IDRechnung`, `Rechnungsdatum`) VALUES
(1, '2023-04-12 20:21:23'),
(2, '2023-04-12 20:21:33');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rechnung_zahlung`
--

CREATE TABLE `rechnung_zahlung` (
  `IDRechnung_Zahlung` int(10) UNSIGNED NOT NULL,
  `FIDRechnung` int(10) UNSIGNED NOT NULL,
  `FIDZahlung` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `rechnung_zahlung`
--

INSERT INTO `rechnung_zahlung` (`IDRechnung_Zahlung`, `FIDRechnung`, `FIDZahlung`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zahlung`
--

CREATE TABLE `zahlung` (
  `IDZahlung` int(10) UNSIGNED NOT NULL,
  `Datum` datetime NOT NULL,
  `Betrag` decimal(8,2) NOT NULL,
  `FIDKunde` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `zahlung`
--

INSERT INTO `zahlung` (`IDZahlung`, `Datum`, `Betrag`, `FIDKunde`) VALUES
(1, '2023-04-12 20:22:21', '500.00', 1),
(2, '2023-04-13 20:22:21', '499.99', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`IDArtikel`),
  ADD KEY `FIDArtikelgruppe` (`FIDArtikelgruppe`);

--
-- Indizes für die Tabelle `artikelgruppe`
--
ALTER TABLE `artikelgruppe`
  ADD PRIMARY KEY (`IDArtikelgruppe`);

--
-- Indizes für die Tabelle `auftrag`
--
ALTER TABLE `auftrag`
  ADD PRIMARY KEY (`IDAuftrag`),
  ADD KEY `FIDKunde` (`FIDKunde`,`FIDRechnung`),
  ADD KEY `FIDRechnung` (`FIDRechnung`);

--
-- Indizes für die Tabelle `auftrag_artikel`
--
ALTER TABLE `auftrag_artikel`
  ADD PRIMARY KEY (`IDAuftrag_Artikel`),
  ADD KEY `FIDAuftrag` (`FIDAuftrag`,`FIDArtikel`),
  ADD KEY `FIDArtikel` (`FIDArtikel`);

--
-- Indizes für die Tabelle `kunde`
--
ALTER TABLE `kunde`
  ADD PRIMARY KEY (`IDKunde`),
  ADD KEY `FIDKundengruppe` (`FIDKundengruppe`);

--
-- Indizes für die Tabelle `kundengruppe`
--
ALTER TABLE `kundengruppe`
  ADD PRIMARY KEY (`IDKundengruppe`);

--
-- Indizes für die Tabelle `rechnung`
--
ALTER TABLE `rechnung`
  ADD PRIMARY KEY (`IDRechnung`);

--
-- Indizes für die Tabelle `rechnung_zahlung`
--
ALTER TABLE `rechnung_zahlung`
  ADD PRIMARY KEY (`IDRechnung_Zahlung`),
  ADD KEY `FIDRechnung` (`FIDRechnung`,`FIDZahlung`),
  ADD KEY `FIDZahlung` (`FIDZahlung`);

--
-- Indizes für die Tabelle `zahlung`
--
ALTER TABLE `zahlung`
  ADD PRIMARY KEY (`IDZahlung`),
  ADD KEY `FIDKunde` (`FIDKunde`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `artikel`
--
ALTER TABLE `artikel`
  MODIFY `IDArtikel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `artikelgruppe`
--
ALTER TABLE `artikelgruppe`
  MODIFY `IDArtikelgruppe` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `auftrag`
--
ALTER TABLE `auftrag`
  MODIFY `IDAuftrag` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `auftrag_artikel`
--
ALTER TABLE `auftrag_artikel`
  MODIFY `IDAuftrag_Artikel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `kunde`
--
ALTER TABLE `kunde`
  MODIFY `IDKunde` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `kundengruppe`
--
ALTER TABLE `kundengruppe`
  MODIFY `IDKundengruppe` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `rechnung`
--
ALTER TABLE `rechnung`
  MODIFY `IDRechnung` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `rechnung_zahlung`
--
ALTER TABLE `rechnung_zahlung`
  MODIFY `IDRechnung_Zahlung` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `zahlung`
--
ALTER TABLE `zahlung`
  MODIFY `IDZahlung` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`FIDArtikelgruppe`) REFERENCES `artikelgruppe` (`IDArtikelgruppe`);

--
-- Constraints der Tabelle `auftrag`
--
ALTER TABLE `auftrag`
  ADD CONSTRAINT `auftrag_ibfk_1` FOREIGN KEY (`FIDKunde`) REFERENCES `kunde` (`IDKunde`) ON DELETE CASCADE,
  ADD CONSTRAINT `auftrag_ibfk_2` FOREIGN KEY (`FIDRechnung`) REFERENCES `rechnung` (`IDRechnung`) ON DELETE SET NULL;

--
-- Constraints der Tabelle `auftrag_artikel`
--
ALTER TABLE `auftrag_artikel`
  ADD CONSTRAINT `auftrag_artikel_ibfk_1` FOREIGN KEY (`FIDArtikel`) REFERENCES `artikel` (`IDArtikel`),
  ADD CONSTRAINT `auftrag_artikel_ibfk_2` FOREIGN KEY (`FIDAuftrag`) REFERENCES `auftrag` (`IDAuftrag`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `kunde`
--
ALTER TABLE `kunde`
  ADD CONSTRAINT `kunde_ibfk_1` FOREIGN KEY (`FIDKundengruppe`) REFERENCES `kundengruppe` (`IDKundengruppe`);

--
-- Constraints der Tabelle `rechnung_zahlung`
--
ALTER TABLE `rechnung_zahlung`
  ADD CONSTRAINT `rechnung_zahlung_ibfk_1` FOREIGN KEY (`FIDRechnung`) REFERENCES `rechnung` (`IDRechnung`) ON DELETE CASCADE,
  ADD CONSTRAINT `rechnung_zahlung_ibfk_2` FOREIGN KEY (`FIDZahlung`) REFERENCES `zahlung` (`IDZahlung`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `zahlung`
--
ALTER TABLE `zahlung`
  ADD CONSTRAINT `zahlung_ibfk_1` FOREIGN KEY (`FIDKunde`) REFERENCES `kunde` (`IDKunde`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
