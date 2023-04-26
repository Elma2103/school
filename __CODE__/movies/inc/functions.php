<?php


function readMoviesFromFile($filePath, $delimiter = DEFAULT_DELIMITER) {
    $movies = [];

    // Wenn es die Datei gibt
    if (is_file($filePath)) {
        // Datei zum Lesen öffnen
        $handle = fopen($filePath, 'r');

        while ( !feof($handle) ) {
            // Lesen einer Zeile aus der Datei
            $line = fgets($handle);

            // Zeile anhand Trennzeichen auf mehrere Array-Elemente aufsplitten
            $columns = explode($delimiter, $line);

            if (count($columns) == 7) {
                $movies[] = [
                    'id' => $columns[0],
                    'title' => $columns[1],
                    'duration' => $columns[2],
                    'genre' => $columns[3],
                    'year' => $columns[4],
                    'image' => $columns[5],
                    'description' => $columns[6]
                ];
            }
        }

        // Datei schließen
        fclose($handle);
    }

    return $movies;
}

function addMovieToFile($movieData, $filePath) {
    // Wenn es die Datei gibt
    if (is_file($filePath)) {
        // Datei zum Lesen und Schreiben öffnen und ans automatisch ans Ende der Datei springen
        $handle = fopen($filePath, 'a+');

        $newLine = $movieData['id'] . DEFAULT_DELIMITER . $movieData['title'] . DEFAULT_DELIMITER .
                $movieData['duration'] . DEFAULT_DELIMITER . $movieData['genre'] . DEFAULT_DELIMITER . 
                $movieData['year'] . DEFAULT_DELIMITER . $movieData['image'] . DEFAULT_DELIMITER . 
                $movieData['description'] . "\n";

        // neue Zeile in die Datei schreiben
        fputs($handle, $newLine);

        // Datei schließen
        fclose($handle);
    }
}

function writeMoviesToFile($movies, $filePath) {
    // Wenn es die Datei gibt
    if (is_file($filePath)) {
        // Datei zum Schreiben öffnen wobei der gesamte Inhalt der Datei überschrieben wird
        $handle = fopen($filePath, 'w');

        // Alle Movies in die Datei schreiben
        foreach ($movies as $movie) {
            $newLine = $movie['id'] . DEFAULT_DELIMITER . $movie['title'] . DEFAULT_DELIMITER .
                    $movie['duration'] . DEFAULT_DELIMITER . $movie['genre'] . DEFAULT_DELIMITER . 
                    $movie['year'] . DEFAULT_DELIMITER . $movie['image'] . DEFAULT_DELIMITER . 
                    $movie['description'] . "\n";

            // neue Zeile in die Datei schreiben
            fputs($handle, $newLine);
        }

        // Datei schließen
        fclose($handle);
    }
}

function getMovieById($searchMovieId, $filePath) {
    // hole alle Movies aus der Datei
    $movies = readMoviesFromFile($filePath);

    // Durchlaufen aller Movies, bis das gesuchte gefunden wurde
    foreach ($movies as $movie) {
        // Vergleich ob beim aktuell Movie die ID gleich der gesuchten movieId ist
        if ($movie['id'] == $searchMovieId) {
            // Rückgabe des Movie-Elements
            return $movie;
        }
    }

    // Wenn kein Movie gefunden wurde, dann geben wir "null" zurück
    return null;
}

function deleteMovieById($deleteMovieId, $filePath) {
    // hole alle Movies aus der Datei
    $movies = readMoviesFromFile($filePath);

    // Durchlaufen aller Movies, bis das gesuchte gefunden wurde
    foreach ($movies as $key => $movie) {
        // Vergleich ob beim aktuell Movie die ID gleich der gesuchten movieId ist
        if ($movie['id'] == $deleteMovieId) {
            // Löschen des Array-Elements im Array
            unset($movies[$key]);
        }
    }

    // das Array in der Datei speichern
    writeMoviesToFile($movies, $filePath);
}