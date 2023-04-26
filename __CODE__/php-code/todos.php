<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDos</title>
</head>
<body>
    <h1>ToDos</h1>
    <form action="todos.php" method="post">
        <label for="description">Beschreibung</label>
        <input type="text" name="description" id="description" required>
        <button type="submit">Anlegen</button>
    </form>
    
    <?php
        $toDos = [];
        $file = 'files/todos.txt';

        // Überprüfen ob die Datei existiert
        if (file_exists($file) && is_file($file)) {
            // Öffnen der Datei zum Lesen und Schreiben, wobei der Dateizeiger gleich ans Ende gestellt wird
            $handle = fopen($file, 'a+');

            // Schreibschutz anfordern
            flock($handle, LOCK_EX);

            // Einfügen eines neuen ToDos (nur wenn das Formular abgesendet wurde)
            if (count($_POST) > 0) {
                $description = $_POST['description'] ?? '';

                // Wenn die Description nicht leer ist, dann füge das ToDo zur Datei hinzu
                if (!empty($description)) {
                    $data = $description . "\n";   // \n ist eine neue Zeile (Zeilenumbruch)
                    fputs($handle, $data);
                }
            }

            // Schreibschutz freigeben
            flock($handle, LOCK_UN);
            
            // Leseschutz anfordern
            flock($handle, LOCK_SH);

            // Auslesen der Todos aus der Datei
            // Dateizeigen an den Beginn der Datei stellen
            fseek($handle, 0);            

            // Alle Zeilen aus der Datei auslesen (feof... Ende der Datei erreicht)
            while ( !feof($handle) ) {
                $row = fgets($handle);
                $toDos[] = $row;
            }

            // Leseschutz freigeben
            flock($handle, LOCK_UN);

            // Datei schließen
            fclose($handle);
        }
    ?>

    <?php if (count($toDos) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Beschreibung</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($toDos as $toDo): ?>
                    <tr>
                        <td><?php echo $toDo; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Keine ToDos gefunden.</p>
    <?php endif; ?>
    
</body>
</html>