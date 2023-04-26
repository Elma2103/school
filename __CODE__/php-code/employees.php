<?php
    // Verbindung zur Datenbank aufbauen
    $conn = mysqli_connect('localhost', 'root', '', 'employees');

    // Wenn keine Verbindung aufgebaut werden konnte
    if (!$conn) {
        // Fehlermeldung ausgeben und PHP Ausführung beenden
        die('Verbindung fehlgeschlagen: ' . mysqli_connect_error());
    }

    // Zeichkodierung für die Verbindung definieren
    mysqli_set_charset($conn, 'utf8mb4');

    // SQL Statement das die Datenbank ausführen soll
    $sql = 'SELECT * FROM employees ORDER BY last_name ASC, first_name ASC LIMIT 20';

    // Datenbanken anweisen, ein SQL Statement auszufüren
    $result = mysqli_query($conn, $sql);

    // leeres Array in das die Datensätze aus der Datenbank später eingefügt werden
    $employees = [];

    // War die Datenbank-Abfrage erfolgreich
    if ($result) {
        // das Ergebnis der Datenbank-Abfrage durchlaufen
        // es wird vor jedem Schleifdurchlauf ein Datensatz aus dem Abfrage-Ergebnis ausgelesen,
        // bis kein Datensatz mehr vorhanden ist
        while ($row = mysqli_fetch_assoc($result)) {
            // füge den aktuellen Datensatz (Zeile aus der Tabelle) in das $employees-Array hinzu
            $employees[] = $row;
        }
    }

    // Datenbank-Verbindung schließen
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Employees</h1>
        <!-- Wenn Employees im Array enthalten sind -->
        <?php if (count($employees) > 0): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>emp_no</th>
                        <th>first_name</th>
                        <th>last_name</th>
                        <th>gender</th>
                        <th>birth_date</th>
                        <th>hire_date</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Durchlaufen aller Employees im Array -->
                    <?php foreach ($employees as $employee): ?>
                        <tr>
                            <td><?php echo $employee['emp_no']; ?></td>
                            <td><?php echo $employee['first_name']; ?></td>
                            <td><?php echo $employee['last_name']; ?></td>
                            <td><?php echo $employee['gender']; ?></td>
                            <td><?php echo date('d.m.Y', strtotime($employee['birth_date'])); ?></td>
                            <td><?php echo date('d.m.Y', strtotime($employee['hire_date'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="alert alert-info">Kein Daten gefunden</p>
        <?php endif; ?>
    </div>
</body>
</html>