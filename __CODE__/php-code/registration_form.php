<?php

    // Überprüfen ob, das Formular mit einem POST-Request abgesendet wurde
    // if ($_SERVER['REQUEST_METHOD'] == 'POST')

    // Überprüfen ob, das Formular abgesendet wurde -> Daten im $_POST vorhanden sein
    if (count($_POST) > 0) {

        // Inhalte vom $_POST Array ausgeben
        //var_dump($_POST);

        // Inhalte aus dem $_POST Array in Variablen speichern
        $salutation = $_POST['salutation'] ?? '';
        $firstName = $_POST['firstName'] ?? '';
        $lastName = $_POST['lastName'] ?? '';
        $email = $_POST['email'] ?? '';
        $birthday = $_POST['birthday'] ?? '';
        $payment = $_POST['payment'] ?? '';
        $interests = $_POST['interests'] ?? [];
        $message = $_POST['message'] ?? '';
        $secretToken = $_POST['secretToken'] ?? '';

        // weitere ToDos:
        // 1. Validierung der eingegebenen Daten
        // 2. Daten speichern
        // 3. Erfolgseite/Abschlussseite weiterleiten
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrierungsformular</title>
</head>
<body>
    <h1>Registrierungsformular</h1>

    <form action="registration_form.php" method="POST">
        <div class="form-field">
            <label for="salutation">Anrede</label>
            <select name="salutation" id="salutation" required>
                <option value=""></option>
                <option value="d">Divers</option>
                <option value="f">Frau</option>
                <option value="h">Herr</option>
            </select>
        </div>

        <div class="form-field">
            <label for="first-name">Vorname</label>
            <input type="text" name="firstName" id="first-name" required>
        </div>
        <div class="form-field">
            <label for="last-name">Nachname</label>
            <input type="text" name="lastName" id="last-name" required>
        </div>
        <div class="form-field">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="form-field">
            <label for="birthday">Geburtstag</label>
            <input type="date" name="birthday" id="birthday">
        </div>

        <div class="form-field">
            <label>Zahlungsweise</label><br>
            <input type="radio" name="payment" id="payment1" value="paypal">
            <label for="payment1">PayPal</label><br>
            <input type="radio" name="payment" id="payment2" value="credit-card">
            <label for="payment2">Kreditkarte</label><br>
            <input type="radio" name="payment" id="payment3" value="cash">
            <label for="payment3">Barzahlung</label>
        </div>

        <div class="form-field">
            <label for="interests">Interessen</label><br>
            <input type="checkbox" name="interests[]" id="interests1" value="sports">
            <label for="interests1">Sport</label><br>
            <input type="checkbox" name="interests[]" id="interests2" value="travelling">
            <label for="interests2">Reisen</label><br>
            <input type="checkbox" name="interests[]" id="interests3" value="climbing">
            <label for="interests3">Klettern</label>
        </div>

        <div class="form-field">
            <label for="message">Anmerkung</label><br>
            <textarea name="message" id="message" rows="10"></textarea>
        </div>

        <input type="hidden" name="secretToken" value="lkdsjflafdjoaisdu908f09wfu789s789s">

        <button type="submit">Registireren</button>
    </form>
</body>
</html>