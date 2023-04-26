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

// ggT - größter gemeinsamer Teiler von zwei Zahlen berechnen
function ggT($number1, $number2) {
    $min = min($number1, $number2);

    for ($i = $min; $i > 0; $i--) {
        if ($number1 % $i == 0 && $number2 % $i == 0) {
            return $i;
        }
    }
}

function convertMilesToKm($miles) {
    return $miles * 1.60934;
}

function convertInchesToCm($inches) {
    return $inches * 2.54;
}

function contains($haystack, $needle) {
    foreach ($haystack as $item) {
        if ($item == $needle) {
            return true;
        }
    }
    return false;
}

function countAppearances($needle, $haystack) {
    $cnt = 0;

    foreach ($haystack as $item) {
        if ($item == $needle) {
            $cnt++;
        }
    }

    return $cnt;
}

function isPrimeNumber(int $number) : bool {
    for ($i = 2; $i < $number / 2; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}

function calcGrossPrice($netPrice, $tax = 0.20, $discount = 0) {
    return ($netPrice - $netPrice * $discount) * (1 + $tax);
}

function calcMean(...$values) {
    $sum = 0;
    foreach ($values as $value) {
        $sum += $value;
    }
    return $sum / count($values);
}

function sortArray(&$elem) {
    for ($i = 0; $i < count($elem) - 1; $i++) {
        for ($j = $i + 1; $j < count($elem); $j++) {
            if ($elem[$i] > $elem[$j]) {
                $swap = $elem[$i];
                $elem[$i] = $elem[$j];
                $elem[$j] = $swap;
            }
        }
    }
}