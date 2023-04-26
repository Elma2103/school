<?php
    $errorMessages = [];

    if (count($_POST) > 0) {
        $username = $_POST['username'] ?? 'Mauzi';
    }

    // Überprüfung ob eine Datei mit dem Bezeichner avatar hochgeladen wurde
    if (isset($_FILES['avatar'])) {

        // Pfad, wo die Datei temporär abgelegt wurde
        $filePath = $_FILES['avatar']['tmp_name'];
        // Dateigröße ermitteln
        $fileSize = filesize($filePath);
        // Dateityp (MIME-Type) ermitteln
        $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
        $fileType = finfo_file($fileInfo, $filePath);

        // Überprüfen der Dateigröße
        if ($fileSize === 0) {
            $errorMessages[] = 'Die hochgeladene Datei ist leer.';
        } else if ($fileSize > (5 * 1024 * 1024)) {
            $errorMessages[] = 'Die hochgeladene Datei ist zu groß (max. 5 MB).';
        }

        // Überprüfen des Dateityps
        $allowedTypes = [
            'image/jpeg' => 'jpg',
            'image/gif' => 'gif',
            'image/png' => 'png'
        ];

        //if (!in_array($fileType, $allowedTypes)) {
        if (!isset($allowedTypes[$fileType])) {
            $errorMessages[] = "Das Dateiformat $fileType wird nicht unterstützt";
        }

        // wenn keine Fehlermeldungen zuvor aufgetreten sind, dann legen wir die Datei im gewünschten Pfad ab
        if (count($errorMessages) === 0) {
            $fileName = basename($_FILES['avatar']['name']);
            $fileExtension = $allowedTypes[$fileType];
            $targetDirectory = __DIR__ . '/uploads/';

            $newFilePath = $targetDirectory . $fileName;

            // Überprüfen, ob die Datei bereits existiert
            if (file_exists($newFilePath)) {
                // wenn sie bereits existiert, wird vor dem Dateinamen noch der aktuelle Zeitstempel (Unix-Timestamp) eingefügt
                $newFilePath = $targetDirectory . time(). '_' . $fileName;
            }

            // Kopieren der Datei vom temporären Verzeichnis ins Zielverzeichnis
            if (!copy($filePath, $newFilePath)) {
                $errorMessages[] = 'Beim Hochladen der Datei ist ein Fehler aufegetreten.';
            }

            // Löschen der temporären Datei
            unlink($filePath);
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <h1>File Upload</h1>

    <?php 
        if (count($_POST) > 0 && count($errorMessages) === 0) {
            echo '<p>Die Datei wurde erfolgreich hochgeladen</p>';
        } else {
            foreach ($errorMessages as $errorMessage) {
                echo "<p>$errorMessage</p>";
            }
        }
    ?>

    <form action="file_upload.php" method="post" enctype="multipart/form-data">
        <div class="form-field">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
        </div>

        <div class="form-field">
            <label for="avatar">Avatar</label>
            <input type="file" name="avatar" id="avatar">
        </div>

        <button type="submit">Upload</button>
    </form>
</body>
</html>