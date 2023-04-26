<?php

function writeToFile($filePath, $data) {
    // Existiert die Datei bzw. ist es eine Datei
    if (is_file($filePath)) {
        // Datei öffnen
        $handle = fopen($filePath, 'a+');

        // Array in einen String umwandeln + Zeilenumbruch am Ende anfügen
        $newLine = implode(';', $data) . "\n";

        // Datensatz am Ende der Datei einfügen (darum auch Modus 'a+' zuvor angegeben)
        fputs($handle, $newLine);

        // Datei schließen
        fclose($handle);
    }
}

function readCoursesFromFile($filePath) {
    $courses = [];

    // Überprüfe, ob Datei existiert
    if (is_file($filePath)) {
        // Datei öffnen
        $handle = fopen($filePath, 'r');    

        // Daten aus der Datei auslesen
        while ( !feof($handle) ) {
            // Zeile auslesen
            $line = fgets($handle);

            // Zeile anhand des ; aufteilen -> Array von 6 Elementen zurück
            $lineParts = explode(';', $line);

            // Wenn in der Zeile genau 6 Spalten sind
            if (count($lineParts) == 6) {
                $courseData = [
                    'startDate' => $lineParts[0],
                    'courseNumber' => $lineParts[1],
                    'title' => $lineParts[2],
                    'location' => $lineParts[3],
                    'duration' => $lineParts[4],
                    'price' => $lineParts[5],
                ];

                // Kursdaten der aktuellen Zeile zum Kursarray hinzufügen
                $courses[] = $courseData;
            }
        }

        // Datei schließen
        fclose($handle);
    }

    return $courses;
}