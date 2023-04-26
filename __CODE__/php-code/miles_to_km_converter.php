<?php
    $errorMessage = '';
    $miles = $_GET['miles'] ?? 0;
    $result = '';

    function convertMilesToKm($miles) {
        return $miles * 1.60934;
    }

    if ($miles) {
        if (is_numeric($miles)) {

            $result = '<p>' . $miles . ' Meilen sind ' . convertMilesToKm($miles) . ' Kilometer</p>';
        } else {
            $errorMessage = 'Geben Sie bitte ein Zahl ein!';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Miles2KM Converter</title>
</head>
<body>
    <h1>Miles2KM Converter</h1>

    <form action="miles_to_km_converter.php" method="GET">
        <label for="miles">Miles</label>
        <input type="text" name="miles" id="miles" required>
        <button type="submit">convert</button>
    </form>
    <?php
        if ($errorMessage) {
            echo "<p class='error-msg'>$errorMessage</p>";
        } else {
            echo $result;
        }
    ?>
</body>
</html>