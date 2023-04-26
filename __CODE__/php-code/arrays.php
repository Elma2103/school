<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
</head>

<body>
    <h1>Arrays</h1>
    <p>Datentyp, der es erlaubt, mehrere Werte in einer Variable abzulegen.</p>

    <h2>numerische indiziertes Arrays</h2>
    <?php
        $cities = ['Wien', 'Linz', 'Graz', 'Innsbruck'];

        // Ausgabe von Linz (Element mit dem Index 1)
        echo "<p>Index 1: $cities[1]</p>";

        // Durchlaufen aller Array-Elemente, wobei bei jedem Durchlauf der aktuelle Index in die Variable $index und der aktuelle Wert in die Variable $city gespeichert wird
        foreach ($cities as $index => $city) {
            echo "Index $index: $city<br>";
        }

        echo "<br><br>";

        // Ändern eines Wertes an einem bestimmten Index
        $cities[0] = 'Graz';
        $cities[2] = 'Wien';

        // Durchlaufen aller Array-Elemente (ohne Index)
        foreach ($cities as $city) {
            echo "$city<br>";
        }

        echo "<br><br>";

        // Hinzufügen von Elementen
        $cities[] = 'Salzburg'; // Element an der letzten Stelle einfügen
        $cities[6] = 'Klagenfurt'; // Element an einem bestimmten Index einfügen oder ersetzen
        $cities[] = 'Eisenstadt';

        foreach ($cities as $index => $city) {
            echo "Index $index: $city<br>";
        }

        echo "<br><br>";

        // Elemente löschen
        unset($cities[6]);

        foreach ($cities as $index => $city) {
            echo "Index $index: $city<br>";
        }
    ?>

    <h2>assoziative Arrays</h2>
    <p>hier kann ein eigener Schlüssel anstatt des standard-Index verwendet werden.</p>
    <?php
        $capitalCities = [
            'Austria' => 'Linz',
            'Germany' => 'Berlin',
            'France' => 'Paris'
        ];

        // Hauptstadt von Germany ausgeben
        echo "<p>" . $capitalCities['Germany'] . "</p>";

        // Durchlaufen aller Array-Elemente, wobei bei jedem Durchlauf der aktuelle Index (Land) in die Variable $index und der aktuelle Wert in die Variable $city gespeichert wird
        foreach ($capitalCities as $index => $city) {
            echo "Index $index: $city<br>";
        }

        echo "<br><br>";

        // Ändern eines Wertes an einem bestimmten Index
        $capitalCities['Austria'] = 'Vienna';

        // Hinzufügen von Elementen
        $capitalCities['Italy'] = 'Rome';
        $capitalCities['UK'] = 'London';

        foreach ($capitalCities as $index => $city) {
            echo "Index $index: $city<br>";
        }

        echo "<br><br>";

        // Elemente löschen
        unset($capitalCities['Germany']);
        
        $capitalCities = array_flip($capitalCities);

        foreach ($capitalCities as $index => $city) {
            echo "Index $index: $city<br>";
        }
    ?>

    <h2>mehrdimensionale Arrays</h2>
    <?php
        $progLangs = [
            ['PHP', 8.2, 'plattformunabhängig'],
            ['JAVA', 17, 'plattformunabhängig'],
            ['C#', 12, 'Windows'],
        ];

        echo '<table>
                <thead>
                    <tr>
                        <th>Index1</th>
                        <th>Index2</th>
                        <th>Wert</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($progLangs as $index1 => $progLang) {
            foreach ($progLang as $index2 => $value) {
                echo "<tr>
                        <td>$index1</td>
                        <td>$index2</td>
                        <td>$value</td>
                      </tr>";
            }
        }

        echo '</tbody></table>';

        // wie kann ich auf die Version der Programmiersprache Java zugreifen?
        echo $progLangs[1][1];


        $progLangs = [
            'PHP' => [
                'name' => 'PHP',
                'version' => 8.2,
                'plattform' => 'plattformunabhängig',
            ],
            'JAVA' => [
                'name' => 'JAVA',
                'version' => 17,
                'plattform' => 'plattformunabhängig'
            ],
            'C#' => [
                'name' => 'C#',
                'version' => 12,
                'plattform' => 'Windows'
            ]
        ];

        echo '<table>
                <thead>
                    <tr>
                        <th>Index1</th>
                        <th>Index2</th>
                        <th>Wert</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($progLangs as $index1 => $progLang) {
            foreach ($progLang as $index2 => $value) {
                echo "<tr>
                        <td>$index1</td>
                        <td>$index2</td>
                        <td>$value</td>
                      </tr>";
            }
        }

        echo '</tbody></table>';

        // wie kann ich auf die Version der Programmiersprache Java zugreifen?
        echo $progLangs['PHP']['version'];
    ?>

    <h2>Beispiele mit numerischen Arrays</h2>
    <h3>Array mit 10 Zufallszahlen (1-100) befüllen</h3>
    <?php
        $numbers = [];

        for ($i = 0; $i < 10; $i++) {
            $numbers[] = random_int(1, 100);
        }

        foreach ($numbers as $number) {
            echo "$number ";
        }
    ?>

    <h3>Array aufsteigend sortieren</h3>
    <?php
        sort($numbers);

        foreach ($numbers as $number) {
            echo "$number ";
        }
    ?>

    <h3>Array absteigend sortieren</h3>
    <?php
        rsort($numbers);

        foreach ($numbers as $number) {
            echo "$number ";
        }
    ?>

    <h3>Doppelte Werte aus dem Array entfernen</h3>
    <?php
        $uniqueNumbers = array_unique($numbers);

        foreach ($uniqueNumbers as $number) {
            echo "$number ";
        }
    ?>

    <h3>Anzahl der Elemente im Array</h3>
    <?php
        echo count($numbers);
    ?>

    <h3>Summe aller Elemente im Array</h3>
    <?php
        echo array_sum($numbers);
    ?>
</body>

</html>