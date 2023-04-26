<?php

require_once 'config.php';

// Erstellt eine Verbindung zur Datenbank und gibt diese zurück
function getDBConnection() {
    // Verbindung zur Datenbank aufbauen
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // Wenn keine Verbindung aufgebaut werden konnte
    if (!$conn) {
        // Fehlermeldung ausgeben und PHP Ausführung beenden
        die('Verbindung fehlgeschlagen: ' . mysqli_connect_error());
    }

    // Zeichkodierung für die Verbindung definieren
    mysqli_set_charset($conn, 'utf8mb4');

    // Rückgabe der Datenbankverbindung
    return $conn;
}