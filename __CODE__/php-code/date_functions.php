<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datums-Funktionen</title>
</head>
<body>
    <h1>Datums-Funktionen</h1>
    <h2>date-Funktion</h2>
    <p>Datums-Formate sind hier ersichtlich <a href="https://www.php.net/manual/de/datetime.format.php" target="_blank">https://www.php.net/manual/de/datetime.format.php</a></p>
    <?php
        echo date('d.m.Y H:i:s');
    ?>

    <h2>time-Funktion</h2>
    <p>gibt die Anzahl der Sekunden seit dem 1.1.1970 zurück</p>
    <?php
        echo time();
    ?>

    <h3>Beispiele</h3>
    <h4>Zeitdifferen zwischen zwei Zeiten</h4>
    <?php
        $ts1 = microtime(true);
        usleep(mt_rand(1000000, 5000000));
        $ts2 = microtime(true);

        $difference = $ts2 - $ts1;
        echo "<p>Die Verarbeitung hat $difference Sekunden benötigt</p>";
    ?>

    <h4>Zeitpunkt in 30 Tagen</h4>
    <?php 
        $currentTimestamp = time();
        $currentTimestamp += 30 * 24 * 60 * 60;
        echo '<p>' . date('l, d.m.Y H:i:s', $currentTimestamp) . '</p>';
    ?>

    <h4>Tag in DE ausgeben</h4>
    <?php
        $germanWeekdays = [
            0 => 'Sonntag',
            1 => 'Montag',
            2 => 'Dienstag',
            3 => 'Mittwoch',
            4 => 'Donnerstag',
            5 => 'Freitag',
            6 => 'Samstag'
        ];

        echo "<p>Heute ist " . $germanWeekdays[date('w')] . '</p>';
    ?>

    <h4>Wochentag in einem Jahr</h4>
    <?php
        $ts = strtotime('+1 year');
        echo '<p>' . date('l, d.m.Y H:i:s', $ts) . '</p>';
    ?>


</body>
</html>