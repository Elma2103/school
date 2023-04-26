-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 23. Okt 2020 um 11:34
-- Server-Version: 10.4.14-MariaDB
-- PHP-Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `videothek`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ausleihe`
--

CREATE TABLE `ausleihe` (
  `ausleihe_id` int(10) UNSIGNED NOT NULL,
  `kundennummer` int(10) UNSIGNED NOT NULL,
  `datentraeger_id` int(10) UNSIGNED NOT NULL,
  `ausleihdatum` datetime NOT NULL,
  `rueckgabedatum` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `ausleihe`
--

INSERT INTO `ausleihe` (`ausleihe_id`, `kundennummer`, `datentraeger_id`, `ausleihdatum`, `rueckgabedatum`) VALUES
(1, 1, 1, '2020-10-01 11:00:00', '2020-10-05 11:32:59'),
(2, 2, 1, '2020-10-12 11:00:00', NULL),
(3, 1, 2, '2020-10-01 11:00:00', NULL),
(4, 2, 3, '2020-10-13 11:33:54', '2020-10-19 11:33:54');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `datentraeger`
--

CREATE TABLE `datentraeger` (
  `datentraeger_id` int(10) UNSIGNED NOT NULL,
  `film_id` int(10) UNSIGNED NOT NULL,
  `datentraeger_typ_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `datentraeger`
--

INSERT INTO `datentraeger` (`datentraeger_id`, `film_id`, `datentraeger_typ_id`) VALUES
(1, 1, 1),
(2, 5, 1),
(3, 2, 1),
(4, 2, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `datentraeger_typ`
--

CREATE TABLE `datentraeger_typ` (
  `datentraeger_typ_id` int(10) UNSIGNED NOT NULL,
  `bezeichnung` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `datentraeger_typ`
--

INSERT INTO `datentraeger_typ` (`datentraeger_typ_id`, `bezeichnung`) VALUES
(1, 'DVD'),
(2, 'VHS');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `film`
--

CREATE TABLE `film` (
  `film_id` int(10) UNSIGNED NOT NULL,
  `titel` varchar(50) NOT NULL,
  `laufzeit` int(10) UNSIGNED NOT NULL,
  `kategorie_id` int(10) UNSIGNED NOT NULL,
  `tarif_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `film`
--

INSERT INTO `film` (`film_id`, `titel`, `laufzeit`, `kategorie_id`, `tarif_id`) VALUES
(1, 'Batman Begins', 140, 4, 1),
(2, 'Ocean’s Eleven', 117, 4, 2),
(5, 'Catch Me If You Can', 121, 7, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorie`
--

CREATE TABLE `kategorie` (
  `kategorie_id` int(10) UNSIGNED NOT NULL,
  `bezeichnung` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `kategorie`
--

INSERT INTO `kategorie` (`kategorie_id`, `bezeichnung`) VALUES
(1, 'Science Fiction'),
(2, 'Heimatfilm'),
(3, 'Kriegsfilm'),
(4, 'Komödie'),
(5, 'Action'),
(6, 'Drama'),
(7, 'Krimi');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunde`
--

CREATE TABLE `kunde` (
  `kundennummer` int(10) UNSIGNED NOT NULL,
  `vorname` varchar(45) NOT NULL,
  `nachname` varchar(45) NOT NULL,
  `strasse` varchar(45) DEFAULT NULL,
  `plz` int(10) UNSIGNED DEFAULT NULL,
  `ort` varchar(45) DEFAULT NULL,
  `pin` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `kunde`
--

INSERT INTO `kunde` (`kundennummer`, `vorname`, `nachname`, `strasse`, `plz`, `ort`, `pin`) VALUES
(1, 'Max', 'Mustermann', 'Tesetstraße 1', 1234, 'Testort', 'aaaa'),
(2, 'Susi', 'Musterfrau', 'Tesetstraße 2', 1234, 'Testort', 'bbbb');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `schauspieler`
--

CREATE TABLE `schauspieler` (
  `schauspieler_id` int(10) UNSIGNED NOT NULL,
  `vorname` varchar(45) NOT NULL,
  `nachname` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `schauspieler`
--

INSERT INTO `schauspieler` (`schauspieler_id`, `vorname`, `nachname`) VALUES
(1, 'George', 'Clooney'),
(2, 'Tom', 'Hanks'),
(3, 'Ben', 'Afflek'),
(4, 'Christian', 'Bale');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `schauspieler_has_film`
--

CREATE TABLE `schauspieler_has_film` (
  `schauspieler_id` int(10) UNSIGNED NOT NULL,
  `film_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `schauspieler_has_film`
--

INSERT INTO `schauspieler_has_film` (`schauspieler_id`, `film_id`) VALUES
(4, 1),
(1, 2),
(2, 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tarif`
--

CREATE TABLE `tarif` (
  `tarif_id` int(10) UNSIGNED NOT NULL,
  `bezeichnung` varchar(45) NOT NULL,
  `preis` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tarif`
--

INSERT INTO `tarif` (`tarif_id`, `bezeichnung`, `preis`) VALUES
(1, 'Aktion', '7.99'),
(2, 'Standard', '9.99'),
(3, 'Aktuell', '12.99');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `ausleihe`
--
ALTER TABLE `ausleihe`
  ADD PRIMARY KEY (`ausleihe_id`),
  ADD KEY `fk_kunde_has_datentraeger_datentraeger1_idx` (`datentraeger_id`),
  ADD KEY `fk_kunde_has_datentraeger_kunde1_idx` (`kundennummer`);

--
-- Indizes für die Tabelle `datentraeger`
--
ALTER TABLE `datentraeger`
  ADD PRIMARY KEY (`datentraeger_id`),
  ADD KEY `fk_datentraeger_film1_idx` (`film_id`),
  ADD KEY `fk_datentraeger_datentraeger_typ1_idx` (`datentraeger_typ_id`);

--
-- Indizes für die Tabelle `datentraeger_typ`
--
ALTER TABLE `datentraeger_typ`
  ADD PRIMARY KEY (`datentraeger_typ_id`);

--
-- Indizes für die Tabelle `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`film_id`),
  ADD KEY `fk_film_kategorie_idx` (`kategorie_id`),
  ADD KEY `fk_film_tarif1_idx` (`tarif_id`);

--
-- Indizes für die Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`kategorie_id`);

--
-- Indizes für die Tabelle `kunde`
--
ALTER TABLE `kunde`
  ADD PRIMARY KEY (`kundennummer`);

--
-- Indizes für die Tabelle `schauspieler`
--
ALTER TABLE `schauspieler`
  ADD PRIMARY KEY (`schauspieler_id`);

--
-- Indizes für die Tabelle `schauspieler_has_film`
--
ALTER TABLE `schauspieler_has_film`
  ADD PRIMARY KEY (`film_id`,`schauspieler_id`),
  ADD KEY `fk_schauspieler_has_film_film1_idx` (`film_id`),
  ADD KEY `fk_schauspieler_has_film_schauspieler1_idx` (`schauspieler_id`);

--
-- Indizes für die Tabelle `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`tarif_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `ausleihe`
--
ALTER TABLE `ausleihe`
  MODIFY `ausleihe_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `datentraeger`
--
ALTER TABLE `datentraeger`
  MODIFY `datentraeger_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `datentraeger_typ`
--
ALTER TABLE `datentraeger_typ`
  MODIFY `datentraeger_typ_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `film`
--
ALTER TABLE `film`
  MODIFY `film_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `kategorie_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `kunde`
--
ALTER TABLE `kunde`
  MODIFY `kundennummer` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `schauspieler`
--
ALTER TABLE `schauspieler`
  MODIFY `schauspieler_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `tarif`
--
ALTER TABLE `tarif`
  MODIFY `tarif_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `ausleihe`
--
ALTER TABLE `ausleihe`
  ADD CONSTRAINT `fk_kunde_has_datentraeger_datentraeger1` FOREIGN KEY (`datentraeger_id`) REFERENCES `datentraeger` (`datentraeger_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_kunde_has_datentraeger_kunde1` FOREIGN KEY (`kundennummer`) REFERENCES `kunde` (`kundennummer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `datentraeger`
--
ALTER TABLE `datentraeger`
  ADD CONSTRAINT `fk_datentraeger_datentraeger_typ1` FOREIGN KEY (`datentraeger_typ_id`) REFERENCES `datentraeger_typ` (`datentraeger_typ_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_datentraeger_film1` FOREIGN KEY (`film_id`) REFERENCES `film` (`film_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `fk_film_kategorie` FOREIGN KEY (`kategorie_id`) REFERENCES `kategorie` (`kategorie_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_film_tarif1` FOREIGN KEY (`tarif_id`) REFERENCES `tarif` (`tarif_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `schauspieler_has_film`
--
ALTER TABLE `schauspieler_has_film`
  ADD CONSTRAINT `fk_schauspieler_has_film_film1` FOREIGN KEY (`film_id`) REFERENCES `film` (`film_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_schauspieler_has_film_schauspieler1` FOREIGN KEY (`schauspieler_id`) REFERENCES `schauspieler` (`schauspieler_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
