<?php
    require_once('inc/config.php');
    require_once('inc/functions.php');

    // ID des anzuzeigenden Movies aus GET Request ermitteln
    $movieId = intval($_GET['id'] ?? 0);
    // Movie aus Datei auslesen
    $movie = getMovieById($movieId, MOVIE_FILE_PATH);
?>

<?php
    require_once('inc/header.php');
?>

<div class="container">
    <?php if ($movie): ?>
        <h1><?php echo $movie['title']; ?></h1>
        <div class="row">
            <div class="col-4">
                <img src="<?php echo $movie['image']; ?>" alt="<?php echo $movie['title']; ?>" class="img-fluid">
            </div>
            <div class="col-8">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <td><?php echo $movie['id']; ?></td>
                    </tr>
                    <tr>
                        <th>Title</th>
                        <td><?php echo $movie['title']; ?></td>
                    </tr>
                    <tr>
                        <th>Laufzeit</th>
                        <td><?php echo $movie['duration']; ?></td>
                    </tr>
                    <tr>
                        <th>Genre</th>
                        <td><?php echo $movie['genre']; ?></td>
                    </tr>
                    <tr>
                        <th>Erscheinungsjahr</th>
                        <td><?php echo $movie['year']; ?></td>
                    </tr>
                    <tr>
                        <th>Beschreibung</th>
                        <td><?php echo $movie['description']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <?php else: ?>
            <h1>404 - Not found</h1>
        <div class="alert alert-danger">Movie not found!</div>
    <?php endif; ?>
    
    <div class="mt-3 mb-3">
        <a href="index.php">Zurück zur Übersicht</a>
    </div>
</div>

<?php
    require_once('inc/footer.php');
?>