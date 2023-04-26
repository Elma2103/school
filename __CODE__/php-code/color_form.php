<?php
    $color = $_GET['color'] ?? '#000000';
    $backgroundColor = $_GET['backgroundColor'] ?? '#ffffff';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color Form</title>
</head>
<body style="color: <?php echo $color; ?>; background-color: <?php echo $backgroundColor; ?>">
    <h1>Color Form</h1>
    <form action="color_form.php" method="GET">
        <div class="form-field">
            <label for="color">Schriftfarbe</label>
            <input type="color" name="color" id="color" value="<?php echo $color; ?>">
        </div>
        <div class="form-field">
            <label for="background-color">Hintergrundfarbe</label>
            <input type="color" name="backgroundColor" id="background-color" value="<?php echo $backgroundColor; ?>">
        </div>
        <button type="submit">change</button>
    </form>
</body>
</html>