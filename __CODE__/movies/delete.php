<?php
    require_once('inc/config.php');
    require_once('inc/functions.php');

    // ID des zu löschenden Movies aus GET Request ermitteln
    $movieId = intval($_GET['id'] ?? 0);
    
    // Movie löschen
    $movie = deleteMovieById($movieId, MOVIE_FILE_PATH);

    // Weiterleitung auf Übersichtsseite
    header('Location: index.php');
?>