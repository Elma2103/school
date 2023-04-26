<?php
    require_once 'include/functions.php';

    $conn = getDBConnection();
    $selectedActor = null;

    // Sind Daten mit einem POST-Request abgesendet worden?
    if (count($_POST) > 0) {
        // 1. Daten aus dem Formular auslesen
        $firstName = trim($_POST['vorname'] ?? '');
        $lastName = trim($_POST['nachname'] ?? '');
        
        // intval wandelt eine Eingabe in einen Integer-Wert um
        $id = intval($_POST['id'] ?? 0);

        // 2. Daten validieren

        // 3. Daten in der Datenbank einfügen oder Datensatz in der Datenbank aktualisieren
        if ($id > 0) {
            $sql = "UPDATE schauspieler SET Vorname = '$firstName', Nachname = '$lastName' WHERE IDSchauspieler = $id";
        } else {
            $sql = "INSERT INTO schauspieler (Vorname, Nachname) VALUES ('$firstName', '$lastName')";
        }

        $result = mysqli_query($conn, $sql);

        // Weiterleitung
        header('Location: schauspieler.php');
    } else {
        // es muss ein GET Request sein
        $action = trim($_GET['action'] ?? '');
        $id = intval($_GET['id'] ?? 0);

        // Wenn die Löschen-Aktion aufgerufen wurde
        if ($action == 'delete') {
            $sql = "DELETE FROM schauspieler WHERE IDSchauspieler = $id";
            $result = mysqli_query($conn, $sql);
            
            // Weiterleitung
            header('Location: schauspieler.php');
        } else if ($action == 'edit') {
            $sql = "SELECT IDSchauspieler, Vorname, Nachname FROM schauspieler WHERE IDSchauspieler = $id";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $selectedActor = mysqli_fetch_assoc($result);
            }
        }
    }

    $sql = 'SELECT * FROM schauspieler';

    $result = mysqli_query($conn, $sql);

    $actors = [];

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $actors[] = $row;
        }
    }

    mysqli_close($conn);
?>

<?php 
    // HTML Head
    $pageTitle = 'Schauspieler';
    require_once 'include/header.php'; 
?>

<div class="container">
    <h1>Schauspieler</h1>

    <?php if (count($actors) > 0): ?>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($actors as $actor): ?>
                    <tr>
                        <td><?php echo $actor['IDSchauspieler']; ?></td>
                        <td><?php echo $actor['Vorname']; ?></td>
                        <td><?php echo $actor['Nachname']; ?></td>
                        <td class="text-end" style="width: 100px;">
                            <a href="schauspieler.php?action=edit&id=<?php echo $actor['IDSchauspieler']; ?>" 
                               title="bearbeiten"
                               class="link-secondary"><i class="fa-regular fa-pen-to-square fa-lg"></i></a>
                            <a href="schauspieler.php?action=delete&id=<?php echo $actor['IDSchauspieler']; ?>" 
                               title="löschen" 
                               class="link-danger ms-2"
                               onclick="return confirm('Wollen Sie dieses Element wirklich löschen');"><i class="fa-solid fa-trash fa-lg"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">
            Keine Schauspieler gefunden.
        </div>
    <?php endif; ?>

    <?php if ($selectedActor): ?>
        <h2>Schauspieler bearbeiten</h2>
        <form action="" method="post" class="row">
            <!-- Verstecktes Eingabefeld für die ID des Schauspielers, der bearbeitet werden soll -->
            <input type="hidden" name="id" value="<?php echo $selectedActor['IDSchauspieler']; ?>">

            <div class="col-auto">
                <label for="vorname" class="visually-hidden">Vorname</label>
                <input type="text" class="form-control" id="vorname" name="vorname" placeholder="Vorname" value="<?php echo $selectedActor['Vorname']; ?>" required>
            </div>
            <div class="col-auto">
                <label for="nachname" class="visually-hidden">Nachname</label>
                <input type="text" class="form-control" id="nachname" name="nachname" placeholder="Nachname" value="<?php echo $selectedActor['Nachname']; ?>" required>
            </div>
            <div class="col-auto">
                <button class="btn btn-primary">Speichern</button>
                <a href="schauspieler.php" class="btn btn-secondary">Abbrechen</a>
            </div>
        </form>
    <?php else: ?>
        <h2>Schauspieler hinzufügen</h2>
        <form action="" method="post" class="row">
            <div class="col-auto">
                <label for="vorname" class="visually-hidden">Vorname</label>
                <input type="text" class="form-control" id="vorname" name="vorname" placeholder="Vorname" required>
            </div>
            <div class="col-auto">
                <label for="nachname" class="visually-hidden">Nachname</label>
                <input type="text" class="form-control" id="nachname" name="nachname" placeholder="Nachname" required>
            </div>
            <div class="col-auto">
                <button class="btn btn-primary">Speichern</button>
            </div>
        </form>
    <?php endif; ?>
</div>

<?php
    // HTML Footer
    require_once 'include/footer.php';
?>