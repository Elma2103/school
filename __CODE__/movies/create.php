<?php
    require_once('inc/config.php');
    require_once('inc/functions.php');

    if (count($_POST) > 0) {
        // Daten aus Formular auslesen
        $formData = [
            'id'            => $_POST['movieId'] ?? time(),
            'title'         => $_POST['movieTitle'] ?? '',
            'duration'      => intval($_POST['movieDuration'] ?? 0),
            'genre'         => $_POST['movieGenre'] ?? '',
            'year'          => intval($_POST['movieYear'] ?? date('Y')),
            'image'         => $_POST['movieImage'] ?? '',
            'description'   => $_POST['movieDescription'] ?? '',
        ];

        // Daten validieren
        // ToDo: Validation
        $isValid = true;

        // wenn Validierung der Daten ok war, dann sollen Daten in Datei gespeichert werden
        if ($isValid) {
            // Daten in der Datei speichern
            addMovieToFile($formData, MOVIE_FILE_PATH);

            // Weiterleitung auf die Übersicht
            header('Location: index.php');
        }
    }
?>

<?php
    require_once('inc/header.php');
?>

<div class="container">
    <h1>Create movie</h1>

    <form action="create.php" method="post">
        <div class="mb-3">
            <label for="movieId" class="form-label">ID</label>
            <input type="number" name="movieId" id="movieId" class="form-control">
        </div>

        <div class="mb-3">
            <label for="movieTitle" class="form-label">Titel</label>
            <input type="text" name="movieTitle" id="movieTitle" class="form-control">
        </div>

        <div class="mb-3">
            <label for="movieDuration" class="form-label">Laufzeit (in min)</label>
            <input type="number" name="movieDuration" id="movieDuration" class="form-control">
        </div>

        <div class="mb-3">
            <label for="movieGenre" class="form-label">Genre</label>
            <select name="movieGenre" id="movieGenre" class="form-control">
                <option value=""></option>
                <option value="Action">Action</option>
                <option value="Thriller">Thriller</option>
                <option value="Comedy">Comedy</option>
                <option value="Drama">Drama</option>
                <option value="Doku">Doku</option>
                <option value="Kinder">Kinder</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="movieYear" class="form-label">Erscheinungsjahr</label>
            <select name="movieYear" id="movieYear" class="form-control">
                <option value=""></option>
                
                <?php $currentYear = intval(date('Y')); ?>
                <?php for ($i = $currentYear; $i > 1900; $i--): ?>
                    <option value="<?php echo $i; ?>">
                        <?php echo $i; ?>
                    </option>
                <?php endfor; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="movieImage" class="form-label">Bild-URL</label>
            <input type="url" name="movieImage" id="movieImage" class="form-control">
        </div>

        <div class="mb-3">
            <label for="movieDescription" class="form-label">Beschreibung</label>
            <textarea name="movieDescription" id="movieDescription" class="form-control"></textarea>
        </div>

        <a href="index.php" class="btn btn-secondary">Abbrechen</a>
        <button type="submit" class="btn btn-primary">Speichern</button>
    </form>
</div>

<?php
    require_once('inc/footer.php');
?>