<?php
    $pageTitle = 'PHP Functions';

    // Einbinden des HTML Headers
    require_once('inc/header.php');

    // 1. Externe Funktionen einbinden
    require_once('inc/functions.php');

    printElement($pageTitle, 'h1');

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

    printElement(ggT(15, 87));

    $cities = ['Linz', 'Wien', 'Berlin', 'London', 'New York'];
    $search = 'München';

    if (contains($cities, $search)) {
        printElement("$search ist in Array enthalten.");
    } else {
        printElement("$search ist nicht in Array enthalten.");
    }

    $numbers = [5, 12, 44 ,6, 19, 5, 7, 6, 5, 12, 11, 3, 5];
    $search = 6;

    $cnt = countAppearances($search, $numbers);
    printElement("$search kommt im Array $cnt mal vor.");


    $number = 13;

    // Aufruf der Funktion
    $isPrime = isPrimeNumber($number);

    if ($isPrime) {
        printElement("$number ist eine Primzahl");
    } else {
        printElement("$number ist keine Primzahl");
    }


    $price = 100;
    $grossPrice = calcGrossPrice($price);
    printElement("der Bruttopreis von $price beträgt $grossPrice (20%)");

    $deGrossPrice = calcGrossPrice($price, 0.19);
    printElement("der Bruttopreis von $price beträgt $deGrossPrice (19%)");

    $carPrice = 25000;
    $carGrossPrice = calcGrossPrice(discount: 0.1, netPrice: $carPrice);
    printElement("der Bruttopreis von $carPrice beträgt $carGrossPrice (20%, 10% Rabatt)");

    $mean = calcMean(44, 11, 23,  99, 3);
    printElement($mean);

    $mean = calcMean(44, 11);
    printElement($mean);

    $mean = calcMean(44, 11, 23);
    printElement($mean);

    $numbers = [12, 7, 9, 3];
    printArray($numbers);
    sortArray($numbers);
    printArray($numbers);

    // Einbinden des HTML Footers
    require_once('inc/footer.php');