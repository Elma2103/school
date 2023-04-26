<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arbeiten mit Dateien</title>
</head>
<body>
    <h1>Arbeiten mit Dateien</h1>
    <h2>Counter</h2>
    <?php
        $file = 'files/counter.txt';

        // 0. Überprüfen ob die Datei existiert
        /*
            file_exists($filePath)... gibt true oder false zurück, je nachdem ob eine Datei existiert oder nicht
            is_file($filePath)... gibt true zurück, wenn der übergebene Pfad auch wirklich eine Datei ist
        */
        if (file_exists($file) && is_file($file)) {

            /* 
                Variante 1: 
                // 1. Counter (Inhalt) auslesen
                $counter = file_get_contents($file);

                // 2. Counter erhöhen
                $counter++;

                // 3. Counter in Datei schreiben
                file_put_contents($file, $counter);

                // 4. Counter ausgeben
                echo "<p>$counter</p>";
            */

            /*
                Variante 2:
            */
            // 1. Datei zum Lesen und Schreiben öffnen
            $handle = fopen($file, 'r+');

            // 2. Eine Zeile auslesen
            $counter = fgets($handle);

            // 3. Counter erhöhen
            $counter++;

            // 4. Positionszeiger an den Beginn der Datei zurücksetzen
            fseek($handle, 0);

            // 5. Counter in Datei schreiben
            fputs($handle, $counter);

            // 6. Datei schließen
            fclose($handle);

            // 7. Counter ausgeben
            echo "<p>$counter</p>";
        }
    ?>
</body>
</html>