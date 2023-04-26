<?php
    // Einbinden der Funktion aus inc/course_management_functions.php
    require_once('inc/course_management_functions.php');

    $filePath = 'files/courses.csv';

    // 1. Überprüfung ob POST Request -> wenn ja, dann sind x-Element im $_POST-Array enthalten
    if (count($_POST) > 0) {

        // 2. Daten aus Formular auslesen
        $formData = [
            'startDate' => $_POST['startDate'] ?? date('Y-m-d'),
            'courseNumber' => $_POST['courseNumber'] ?? '',
            'title' => $_POST['title'] ?? '',
            'location' => $_POST['location'] ?? '',
            'duration' => $_POST['duration'] ?? 0,
            'price' => $_POST['price'] ?? 0.0,
        ];

        // 3. Daten validieren
        // ToDo

        // 4. Daten sind ok -> Daten in Datei speichern
        writeToFile($filePath, $formData);
    }
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kursverwaltung</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Kursverwaltung</h1>

        <form action="course_management.php" method="post">
            <div class="form-field">
                <label for="startDate">Beginndatum</label>
                <input type="date" name="startDate" id="startDate" class="form-control" required>
            </div>

            <div class="form-field">
                <label for="courseNumber">Kursnummer</label>
                <input type="text" name="courseNumber" id="courseNumber" class="form-control" required>
            </div>

            <div class="form-field">
                <label for="title">Kurstitel</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="form-field">
                <label for="location">Kursort</label>
                <input type="text" name="location" id="location" class="form-control" required>
            </div>

            <div class="form-field">
                <label for="duration">Dauer</label>
                <input type="number" name="duration" id="duration" class="form-control" required>
            </div>

            <div class="form-field">
                <label for="price">Kosten</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01" required>
            </div>

            <button type="submit" class="btn btn-primary">Speichern</button>
        </form>

        <h2 class="mt-5">Kursübersicht</h2>
        <?php
            // Aufgabe: alle Kurse aus der Datei auslesen und in Form einer Tabelle anzeigen
            $courses = readCoursesFromFile($filePath);
        ?>

        <table class="table">
            <thead>
                <tr>
                    <th>Beginndatum</th>
                    <th>Kursnummer</th>
                    <th>Titel</th>
                    <th>Kursort</th>
                    <th>Dauer</th>
                    <th>Preis</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $course): ?>
                    <tr>
                        <td>
                            <?php echo $course['startDate'] ?>
                        </td>
                        <td>
                            <?php echo $course['courseNumber'] ?>
                        </td>
                        <td>
                            <?php echo $course['title'] ?>
                        </td>
                        <td>
                            <?php echo $course['location'] ?>
                        </td>
                        <td>
                            <?php echo $course['duration'] ?>
                        </td>
                        <td>
                            <?php echo $course['price'] ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>