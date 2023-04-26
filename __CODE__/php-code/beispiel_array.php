<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beispiel: Mehrdimensionale Arrays</title>
</head>
<body>
    <h2>Beispiel: Mehrdimensionale Arrays</h1>
    <h3>Kennzeichen und dazgehörige Städte</h2>

    <?php
        $licencePlates = [
            'HH' => 'Hamburg',
            'B' => 'Berlin',
            'S' => 'Stuttgart',
            'F' => 'Frankfurt am Main'
        ];

        echo '<table>
                <thead>
                    <tr>
                        <th>Kennzeichen</th>
                        <th>Stadt</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($licencePlates as $code => $city) {
            echo "<tr>
                    <td>$code</td>
                    <td>$city</td>
                  </tr>";
        }

        echo '</tbody></table>';
        ?>
    
    <h2>Beispiel: Mehrdimensionale Arrays</h1>
    
    <h3>Länder und ihre Daten</h3>
    <?php
        $countries = [
            'Japan' => [
                'contry' => 'Japan',
                'capitalCity' => 'Tokio',
                'language' => 'Japanisch',
                'currency' => 'Yen'
            ],
            'Niederlande' => [
                'contry' => 'Niederlande',
                'capitalCity' => 'Amsterdam',
                'language' => 'Niederländisch',
                'currency' => 'Euro'
            ],
            'Polen' => [
                'contry' => 'Polen',
                'capitalCity' => 'Warschau',
                'language' => 'Polnisch',
                'currency' => 'Zloty'
            ],
            'Indien' => [
                'contry' => 'Indien',
                'capitalCity' => 'Neu Delhi',
                'language' => 'Indisch',
                'currency' => 'Rupie'
            ]
        ];

        echo '<table>
                <thead>
                    <tr>
                        <th>Land</th>
                        <th>Hauptstadt</th>
                        <th>Sprache</th>
                        <th>Währung</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($countries as $country) {
            // echo "<tr>
            //     <td>" . $country['contry'] . "</td>
            //     <td>" . $country['capitalCity'] . "</td>
            //     <td>" . $country['language'] . "</td>
            //     <td>" . $country['currency'] . "</td>
            // </tr>";

            echo "<tr>";

            foreach ($country as $key => $value) {
                echo "<td>$value</td>";
            }

            echo "</tr>";
        }

        echo '</tbody></table>';

        echo '<br><br>';

        $countries = [
            'countries' => ['Japan', 'Niederlande', 'Polen', 'Indien', 'Island'],
            'capitalCities' => ['Tokio', 'Amsterdam', 'Warschau', 'Neu Delhi', 'Reykjavik'],
            'languages' => ['Japanisch', 'Niederländisch', 'Polnisch', 'Indisch', 'Isländisch'],
            'currencies' => ['Yen', 'Euro', 'Zloty', 'Rupien', 'Krone'],
        ];

        echo '<table>
                <thead>
                    <tr>
                        <th>Land</th>
                        <th>Hauptstadt</th>
                        <th>Sprache</th>
                        <th>Währung</th>
                    </tr>
                </thead>
                <tbody>';

        $countCountries = count($countries['countries']);
        for ($i = 0; $i < $countCountries; $i++) {
            echo "<tr>
                <td>" . $countries['countries'][$i] . "</td>
                <td>" . $countries['capitalCities'][$i] . "</td>
                <td>" . $countries['languages'][$i] . "</td>
                <td>" . $countries['currencies'][$i] . "</td>
            </tr>";
        }

        echo '</tbody></table>';
    ?>
</body>
</html>