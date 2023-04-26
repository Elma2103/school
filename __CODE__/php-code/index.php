<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hallo Welt!</title>
</head>
<body>
    <!-- HTML Kommentar ist im fertigen HTML Dokument ersichtlich -->
    <h1>Hallo Welt!</h1>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Provident, optio minus vero ipsa repudiandae consequatur minima similique nesciunt totam officiis recusandae excepturi, explicabo praesentium delectus laudantium magni amet commodi et!</p>
    
    <h2>PHP-Codesnippet 1</h2>
    <?php 
        echo '<p>hallo</p>';

        /*
            Mehrzeiliger Kommentar
            wichtig: dieser wird vom PHP Interpreter entfernt -> ist also nicht im HTML Dokument vorhanden
        */
    ?>
    
    <h2>PHP-Codesnippet 2</h2>
    <?php 
        // Ausgabe des aktuellen Datums samt Uhrzeit
        echo date('d.m.Y H:i:s'); 
    ?>

    <h2>PHP Variablen</h2>
    <?php
        $firstName = 'Max';
        $lastName = 'Mustermann';
        $fullName = $firstName . ' ' . $lastName;
        echo $fullName;  
    ?>

    <h2>Konstanten</h2>
    <?php
        // Definition einer Konstante
        // define('MWST', 20.0);
        const MWST = 20.0;

        $nettoPreis = 100;

        // Verwendung:
        $bruttoPreis = $nettoPreis + ($nettoPreis / 100 * MWST);

        echo $bruttoPreis;
    ?>

    <h2>Kontrollstrukturen</h2>
    <h3>if-then-else</h3>
    <?php
        $number1 = 10;
        $number2 = 20;

        if ($number2 > $number1) {
            echo "$number2 ist größer als $number1";
        } else if ($number2 == $number1) {
            echo "$number2 ist gleich groß wie $number1";
        } else {
            echo "$number2 ist kleiner als $number1";
        }


        $weekDay = 'Monday';

        if ('Sunday' == $weekDay) {
            echo "<p>heute ist Sonntag!</p>";
        }
    ?>

    <h3>Switch-Anweisung</h3>
    <?php
        $grade = random_int(1, 6);

        switch ($grade) {
            case 1:
                echo '<p>Sehr gut</p>';
                break;
            case 2:
                echo '<p>Gut</p>';
                break;
            case 3:
                echo '<p>Befriedigend</p>';
                break;
            case 4:
                echo '<p>Ausreichend</p>';
                break;
            case 5:
                echo '<p>Mangelhaft</p>';
                break;
            default:
                echo '<p>Ungenügend</p>';    
        }
    ?>

    <h2>Schleifen</h2>
    <h3>For-Schleife</h3>
    <?php 
        // Alle Zahlen von 1 bis 100 ausgeben
        for ($i = 1; $i <= 100; $i++) {
            echo "$i ";
        }
    ?>

    <h3>While-Schleife</h3>
    <?php
        $count = 200;
        while ($count <= 100) {
            echo "$count ";
            $count++;
        }
    ?>

    <h3>do-while-Schleife</h3>
    <?php
        $count = 200;
        do {
            echo "$count ";
            $count++;
        } while ($count <= 100);
    ?>

    <h3>Break-Statement</h3>
    <?php
        $budget = 50;
        $singlePrice = 7;
        $quantity = 1;

        while (true) {
            $totalPrice = $singlePrice * $quantity;

            if ($totalPrice > $budget) {
                break;
            }

            $quantity++;
        }

        echo "<p>" . $quantity - 1 . " Stück können um $budget gekauft werden.</p>";
    ?>

    <h3>Continue-Statement</h3>
    <?php
        $zaehler = 5;

        for ($nenner = -2; $nenner <= 2; $nenner++) {
            if ($nenner == 0) {
                echo "<p>Division durch 0 nicht möglich</p>";
                continue;
            }

            $result = $zaehler / $nenner;

            echo "<p>Ergebnis von $zaehler / $nenner = $result</p>";
        }
    ?>
</body>
</html>