<?php
    require_once('inc/config.php');
    require_once('inc/functions.php');

    $movies = readMoviesFromFile(MOVIE_FILE_PATH);
?>

<?php
    require_once('inc/header.php');
?>

<div class="container">
    <h1>Movie-Database</h1>

    <div class="mt-3 mb-3">
        <a href="create.php" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> add
        </a>
    </div>

    <?php if (count($movies) > 0): ?>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Duration</th>
                    <th>Year</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($movies as $movie): ?>
                    <tr>
                        <td><?php echo $movie['id']; ?></td>
                        <td>
                            <a href="details.php?id=<?php echo $movie['id']; ?>">
                                <?php echo $movie['title']; ?>
                            </a>
                        </td>
                        <td><?php echo $movie['duration']; ?></td>
                        <td><?php echo $movie['year']; ?></td>
                        <td>
                            <a href="delete.php?id=<?php echo $movie['id']; ?>" class="btn btn-danger" onclick="return confirm('Wollen sie dieses Movie wirklich löschen?');">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-primary">No movies found.</div>
    <?php endif; ?>
</div>

<?php
    require_once('inc/footer.php');
?>