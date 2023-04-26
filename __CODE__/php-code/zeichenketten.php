<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zeichenketten-Funktionen</title>
</head>
<body>
    <h1>Zeichenketten-Funktionen</h1>

    <h2>printf - Formatierte Ausgabe</h2>
    <p>
        Eine Kommazahl soll 10 Stellig ausgegeben werden, wobei 2 Stellen nach dem Komma und 7 Stellen vor
        dem Komma angezeigt werden.
        Hat eine Zahl weniger als 7 STelle vor dem Komma, werden diese mit 0 aufgefüllt.
    </p>
    <?php
        $randomNumber = random_int(1, 4000) / 1000;
        printf("%010.2f", $randomNumber);
    ?>

    <h2>number_format - Einfache Formatierung für Zahlen</h2>
    <?php
        $randomNumber = random_int(1, 5000) / 100;
        echo number_format($randomNumber, 2, ',', '.');
    ?>

    <h2>Suche nach einem Teilstring</h2>
    <?php
        echo strstr('max.mustermann@musterfirma.at', 'mann') . '<br>';
        echo strstr('max.mustermann@musterfirma.at', 'mann', true) . '<br>';
        echo strstr('max.mustermann@musterfirma.at', 'Mann', true) . '<br>';
        echo stristr('max.mustermann@musterfirma.at', 'Mann', true) . '<br>';
    ?>

    <h2>Suche nach einem Zeichen</h2>
    <?php
        echo strchr('max.mustermann@musterfirma.at', '@') . '<br>';
        echo strchr('max.mustermann@musterfirma.at', '@', true) . '<br>';
        echo strrchr('max.mustermann@musterfirma.at', 'a') . '<br>';
    ?>

    <h2>Suche nach der Position eines Zeichens in einem Text</h2>
    <?php
        $haystack = 'susi.musterfrau@test.at';
        $needle = '@';
        $pos = strpos($haystack, $needle);
        echo $pos . ":" . $haystack[$pos] . "<br>";
    ?>

    <h2>Durchlaufen eines Strings mit einem Array</h2>
    <?php
        $text = "Hello world";

        for ($i = 0; $i < strlen($text); $i++) {
            echo "<div>$i: " . $text[$i] . "</div>";
        }
    ?>

    <h3>Beispiel SVN Prüfziffer</h3>
    <p>Schreibe eine Funktion, die eine Sozialversicherungsnummer überprüft und true oder false zurückgibt wenn sie gültig oder ungültig ist.</p>
    <ul>
        <li>SVN muss 10 Zeichen haben --> (strlen)</li>
        <li>jedes Zeichen muss eine Ziffer sein.</li>
        <li>
            Die Prüfziffer kann wie folgt errechnet werden:
            <ul>
                <li>
                    Jede einzelne Ziffer der Versicherungsnummer wird mit einer bestimmten Zahl multipliziert:<br>
                    - Laufnummer mit 3, 7, 9<br>
                    - Geburtsdatum mit 5, 8, 4, 2, 1, 6
                </li>
                <li>Die Prüfziffer errechnet sich aus dem Divisionsrest der Summe der einzelnen Produkte geteilt durch 11.</li>
                <li>Wenn der Divisionsrest 10 ergibt, so wird die Laufnummer um 1 erhöht und eine neue Berechnung durchgeführt.</li>
            </ul>
        </li>
    </ul>

    <?php
        $svn = "1237010180";

        function checkSvn($svn) {
            // Leerzeichen vorne und hinten abschneiden
            $svn = trim($svn);

            // Überprüfung ob die SVN nicht 10 Zeichen lang ist oder der Text kein nummerischer Wert ist
            if (strlen($svn) != 10 || !is_numeric($svn)) {
                return false;
            }

            $summe = $svn[0] * 3 + $svn[1] * 7 + $svn[2] * 9 + $svn[4] * 5 + $svn[5] * 8 + $svn[6] * 4 + $svn[7] * 2 + $svn[8] * 1 + $svn[9] * 6;
            $rest = $summe % 11;

            if ($rest == 10) {
                $runningNumber = $svn[0] * 100 + $svn[1] * 10 + $svn[2];
                $runningNumber++;

                // $runningNumber = 124
                $svn[2] = $runningNumber % 10; // => $svn[2] = 4;

                // $runningNumber = (124 - (124 % 10)) / 10
                // $runningNumber = (124 - (4)) / 10
                // $runningNumber = (120) / 10
                // $runningNumber = 12
                $runningNumber = ($runningNumber - ($runningNumber % 10)) / 10;

                // $runningNumber = 12
                $svn[1] = $runningNumber % 10; // => $svn[1] = 2;

                // $runningNumber = (12 - (12 % 10)) / 10
                // $runningNumber = (12 - (2)) / 10
                // $runningNumber = (10) / 10
                // $runningNumber = 1
                $runningNumber = ($runningNumber - ($runningNumber % 10)) / 10;

                $svn[0] = $runningNumber % 10;

                // 124 X 010180
                return checkSvn($svn);
            }

            return ($rest == $svn[3]);
        }


        if (checkSvn($svn)) {
            echo "<p>$svn ist eine gültige SVN</p>";
        } else {
            echo "<p>$svn ist keine gültige SVN</p>";
        }
    ?>

    <h2>Starts-width / ends-with</h2>
    <?php
        $url = 'www.wifi-ooe.at';

        if (!str_starts_with($url, 'https://') && !str_starts_with($url, 'http://')) {
            $url = 'https://' . $url;
        }

        function isWord($fileName) {
            /*if (str_ends_with($fileName, '.doc') || str_ends_with($fileName, '.docx')) {
                return true;
            }
            return false;*/

            return (str_ends_with($fileName, '.doc') || str_ends_with($fileName, '.docx'));
        }

        $fileName = 'test.pdf';
        if (isWord($fileName)) {
            echo "<p>$fileName ist ein Word-Dokument</p>";
        } else {
            echo "<p>$fileName ist kein Word-Dokument</p>";
        }
    ?>

    <h2>explode/implode Funktionen</h2>
    <p>
        <strong>explode</strong> Teilt einen String anhand eines Trennzeichens in ein Array auf.<br>
        <strong>implode</strong> verbindet mehrere Array-Elemente mit einem Trennzeichen zu einem String
    </p>
    <?php
        $fruits = ['Apples', 'Bananas', 'Peaches'];
        print_r($fruits);

        $fruitsString = implode(';', $fruits);

        echo "<p>$fruitsString</p>";

        $newFruits = explode(';', $fruitsString);
        print_r($newFruits);
    ?>
</body>
</html>