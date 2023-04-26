<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suchformular</title>
</head>
<body>
    <h1>Suchformular</h1>
    <form action="search_form.php" method="GET">
        <label for="term">Suchbegriff</label>
        <input type="search" name="searchTerm" id="term">
        <button type="submit">Suchen</button>
    </form>

    <?php
        // Wenn das Formular abgesendet wurde, existiert im Get-Request ($_GET) auch ein Array-Element mit dem entsprechenden Schlüssel ("searchTerm")

        // Überprüfung, ob im GET-Request auch der Parameter "searchTerm" existiert
        if (isset($_GET['searchTerm'])) {
            $searchTerm = $_GET['searchTerm'];
            echo "Nach folgendem Begriff wurde gesucht: '$searchTerm'";
        }
    ?>
</body>
</html>