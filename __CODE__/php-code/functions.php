<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Functions</title>
</head>
<body>
    <h1>PHP Functions</h1>
    <?php
        // 1. Definition der Funktion
        function printElement($text, $elem = 'p', $class = '') {
            echo "<$elem class='$class'>$text</$elem>";
        }

        function addNumbers($number1, $number2) {
            $result = $number1 + $number2;
            return $result;
        }

        function generateRandomNumbers($numOfElems, $min = 1, $max = 100) {
            $numbers = [];

            for ($i = 0; $i < $numOfElems; $i++) {
                $numbers[] = random_int($min, $max);
            }

            return $numbers;
        }

        function printArray($array, $headerIndex = "Index", $headerValue = "Wert") {
            echo "<table>
                    <thead>
                        <tr>
                            <th>$headerIndex</th>
                            <th>$headerValue</th>
                        </tr>
                    </thead>
                    <tbody>";

            foreach ($array as $key => $value) {
                echo "<tr>
                        <td>$key</td>
                        <td>$value</td>
                    </tr>";
            }

            echo "</tbody></table>";
        }

        function jokerNumbers() {
            $numbers = [];

            for ($i = 0; $i < 6; $i++) {
                $numbers[] = random_int(0, 9);
            }

            return $numbers;
        }

        function lottoNumbers() {
            $numbers = [];

            while (count($numbers) < 6) {
                $randomNumber = random_int(1, 45);
                if (!in_array($randomNumber, $numbers)) {
                    $numbers[] = $randomNumber;
                }
            }

            sort($numbers);

            return $numbers;
        }


        // 2. Aufruf der Funktion
        printElement('Max Mustermann');
        printElement('Susi Musterfrau', 'h2');
        printElement('John Doe', 'h3', 'blue');

        $total = addNumbers(23.17, 44.32);
        printElement("Result: $total");

        $numbers = generateRandomNumbers(10);
        printArray($numbers);

        $cities = [
            'Austria' => 'Vienna',
            'Germany' => 'Berlin',
            'France' => 'Paris'
        ];
        printArray($cities, 'Land', 'Hauptstadt');

        // Jokerzahlen: 6 zufällige Zahlen zwischen 0 und 9
        printElement('Jokerzahlen', 'h2');
        $jokerNumbers = jokerNumbers();
        printArray($jokerNumbers);

        // Lottozahlen: 6 zufällige Zahlen zwischen 1 und 45, wobei keine Zahl doppelt vorkommen darf und die aufsteigend sortiert sein sollen
        printElement('Lottozahlen', 'h2');
        $lottoNumbers = lottoNumbers();
        printArray($lottoNumbers);

        // ggT - größter gemeinsamer Teiler von zwei Zahlen berechnen
        function ggT($number1, $number2) {
            $min = min($number1, $number2);

            for ($i = $min; $i > 0; $i--) {
                if ($number1 % $i == 0 && $number2 % $i == 0) {
                    return $i;
                }
            }
        }

        printElement(ggT(15, 87));

        function convertMilesToKm($miles) {
            return $miles * 1.60934;
        }
        
        function convertInchesToCm($inches) {
            return $inches * 2.54;
        }

        $cities = ['Linz', 'Wien', 'Berlin', 'London', 'New York'];
        $search = 'München';

        function contains($haystack, $needle) {
            foreach ($haystack as $item) {
                if ($item == $needle) {
                    return true;
                }
            }
            return false;
        }

        if (contains($cities, $search)) {
            printElement("$search ist in Array enthalten.");
        } else {
            printElement("$search ist nicht in Array enthalten.");
        }

        $numbers = [5, 12, 44 ,6, 19, 5, 7, 6, 5, 12, 11, 3, 5];
        $search = 6;

        function countAppearances($needle, $haystack) {
            $cnt = 0;

            foreach ($haystack as $item) {
                if ($item == $needle) {
                    $cnt++;
                }
            }

            return $cnt;
        }

        $cnt = countAppearances($search, $numbers);
        printElement("$search kommt im Array $cnt mal vor.");
    ?>
</body>
</html>