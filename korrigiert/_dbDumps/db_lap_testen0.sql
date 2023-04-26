-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 30. Jun 2022 um 12:31
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `db_lap_testen0`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_geschlechter`
--

CREATE TABLE `tbl_geschlechter` (
  `IDGeschlecht` int(10) UNSIGNED NOT NULL,
  `Bezeichnung` varchar(16) NOT NULL,
  `Kurzzeichen` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tbl_geschlechter`
--

INSERT INTO `tbl_geschlechter` (`IDGeschlecht`, `Bezeichnung`, `Kurzzeichen`) VALUES
(1, 'weiblich', 'w'),
(2, 'männlich', 'm'),
(3, 'divers', 'd');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_user`
--

CREATE TABLE `tbl_user` (
  `IDUser` int(10) UNSIGNED NOT NULL,
  `Emailadresse` varchar(32) NOT NULL,
  `Passwort` varchar(255) NOT NULL,
  `Vorname` varchar(32) DEFAULT NULL,
  `Nachname` varchar(32) DEFAULT NULL,
  `Geburtsdatum` date DEFAULT NULL,
  `FIDGeschlecht` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tbl_user`
--

INSERT INTO `tbl_user` (`IDUser`, `Emailadresse`, `Passwort`, `Vorname`, `Nachname`, `Geburtsdatum`, `FIDGeschlecht`) VALUES
(1, 'uwe.mutz@syne.at', '$2y$10$alsJ2sHez3rpZHm3yPpAr.DMQ..k8U2H1fyj8WeRCzgvg5SGWtvMi', NULL, 'Uwe', '1972-10-17', 2),
(2, 'silvia.mutz@syne.at', '$2y$10$v.Tyim7d/lHnWt4qWBv4QegHORCNAZoF9.M0.o7KwsqQ1fDCU9XmC', 'Silvia', 'Mutz', '1978-05-02', 1),
(3, 'test@syne.at', '$2y$10$aWMB5bCFb/w4VTbObnp5GuNUtXYimOvAYTbvTrkGu0w.2N4Vq1pUy', '', '', NULL, NULL),
(4, 'test2@syne.at', '$2y$10$6GaDlPxEBPhJdX1MbQXwduJnfma4.jf.cQo3WWBxkDqls6oiml2ey', NULL, NULL, NULL, NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tbl_geschlechter`
--
ALTER TABLE `tbl_geschlechter`
  ADD PRIMARY KEY (`IDGeschlecht`);

--
-- Indizes für die Tabelle `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`IDUser`),
  ADD KEY `FIDGeschlecht` (`FIDGeschlecht`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tbl_geschlechter`
--
ALTER TABLE `tbl_geschlechter`
  MODIFY `IDGeschlecht` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `IDUser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`FIDGeschlecht`) REFERENCES `tbl_geschlechter` (`IDGeschlecht`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
