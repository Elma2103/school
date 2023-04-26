<?php
    $errorMessages = [];
    $email = '';
    $password = '';

    // sind Daten mittels Post-Request abgesendet worden?
    if (count($_POST) > 0) {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // Prüfen, ob es sich um eine korrekte E-Mail Adresse handelt
        // es wird nur das Format geprüft, nicht aber ob die E-Mail Adresse existiert
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMessages['email'] = 'Bitte geben Sie eine gültige E-Mail Adresse ein.';
        }

        // strlen... die Anzahl der Zeichen eines Textes/Strings
        if (strlen($password) < 10) {
            $errorMessages['password'] = 'Bitte geben Sie ein Passwort mit mind. 10 Zeichen ein.';
        }

        // TODO: Prüfen, ob die Daten korrekt sind (z.B. ob es den User in der Datenbank gibt)

        // Wenn keine Validierung aufgeschlagen ist, dann mache eine Weiterleitung
        if (count($errorMessages) == 0) {
            // Weiterleitung auf index.php
            header('Location: index.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Formular</title>
</head>
<body>
    <h1>Login Formular</h1>
    
    <form action="login_form.php" method="post">
        <div class="form-field">
            <label for="email">E-Mail</label>
            <input type="email" name="email" id="email" value="<?php echo $email; ?>" required>
            <?php
                if (isset($errorMessages['email'])) {
                    echo "<div class='error-msg'>" . $errorMessages['email'] . "</div>";
                }
            ?>
        </div>

        <div class="form-field">
            <label for="password">Passwort</label>
            <input type="password" name="password" id="password" value="<?php echo $password; ?>">
            <?php
                if (isset($errorMessages['password'])) {
                    echo "<div class='error-msg'>" . $errorMessages['password'] . "</div>";
                }
            ?>
        </div>

        <button type="submit">Login</button>
    </form>
</body>
</html>