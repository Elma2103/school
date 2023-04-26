<?php
function ta($in) {
	echo('<pre class="ta">');
	print_r($in);
	echo('</pre>');
}

$msg = "";

ta($_POST);
ta($_FILES);

if(count($_FILES)>0) {
	//es wurde ein Formular abgeschickt, wo zumindest die Möglichkeit bestand, Dateien mit hochzuladen
	
	$ts = time(); //Hilfsvariable mit dem Wert des aktuellen Timestamps
	$ok = mkdir("./" . $ts,0750) && mkdir("./" . $ts . "/image",0750) && mkdir("./" . $ts . "/docs",0750);
	
	if($ok) {
		// ---- Profilbild: ----
		$pic = $_FILES["PB"]; //Hilfsvariable
		if($pic["error"]==0) {
			//für dieses Uploadfeld ist während des Uploads kein Fehler aufgetreten --> die Datei aus dem temporären Verzeichnis nehmen und im Zielverzeichnis ablegen
			
			$whitelist = ["image/jpeg","image/gif","image/png","image/webp"]; //Liste der erlaubten Dateitypen (MIME- oder Content-Types) für das Profilbild
			
			if(in_array($pic["type"],$whitelist)) {
				//die hochgeladene Datei ist unserer Whitelist aufgelistet --> Datei speichern
				$ok = move_uploaded_file($pic["tmp_name"],"./" . $ts . "/image/" . $pic["name"]);
				if($ok) {
					$msg = '<p class="success">Vielen Dank usw.</p>';
				}
				else {
					$msg = '<p class="error">Leider war das Speichern Ihres Profilbildes nicht möglich...</p>';
				}
			}
			else {
				$msg = '<p class="error">Das Profilbild ist vom falschen Typen.</p>';
			}
		}
		else {
			$msg = '<p class="error">Leider ist beim Upload Ihres Profilbildes ein Fehler aufgetreten...</p>';
		}
		// ENDE Profilbild: ----
		
		// ---- Dokumente: ----
		$docs = $_FILES["Docs"]; //Hilfsvariable
		for($i=0; $i<count($docs["name"]); $i++) {
			if($docs["error"][$i]==0) {
				//für DIESE aktuelle Datei ist während des Uploads kein Fehler aufgetreten
				if($docs["type"][$i]=="application/pdf") {
					//die hochgeladene Datei ist vom richtigen Typen (PDF)
					$ok = move_uploaded_file($docs["tmp_name"][$i],"./" . $ts . "/docs/" . $docs["name"][$i]);
					if($ok) {
						$msg .= '<p class="success">Das Dokument ' . $docs["name"][$i] . ' wurde erfolgreich hochgeladen.</p>';
					}
					else {
						$msg .= '<p class="error">Das Dokument ' . $docs["name"][$i] . ' konnte leider nicht erfolgreich hochgeladen werden.</p>';
					}
				}
				else {
					$msg .= '<p class="error">Das Dokument ' . $docs["name"][$i] . ' ist vom falschen Typen. Wir brauchen ein PDF.</p>';
				}
			}
			else {
				$msg .= '<p class="error">Leider ist während des Uploads dieser Datei ein Fehler aufgetreten.</p>';
			}
		}
		// ENDE Dokumente: ----
	}
	else {
		$msg = '<p class="error">Leider ist beim Speichern Ihrer Daten ein Fehler aufgetreten (es konnten die Verzeichnisse nicht angelegt werden, aber das sagen wir dem User nicht). Bitte nehmen Sie Kontakt mit uns auf.</p>';
	}
}
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Kontaktformular</title>
		<meta charset="utf-8">
		<style>
		label, input, textarea {
			display:block;
			box-sizing:border-box;
		}
		form {
			max-width:40em:
			margin:auto;
		}
		
		.ta {
			background-color:#ffc;
			border:1px solid orange;
			padding:0.2em 0.5em;
			margin:0.5em 0px;
			border-left-width:0.5em;
			font-family:"Courier New", monospace;
			font-size:0.9em;
		}
		
		.success {
			border-left:3px solid green;
			font-style:italic;
			margin:0.5em 0px;
			padding-left:0.2em;
		}
		.error {
			border-left:3px solid red;
			font-weight:bold;
			margin:0.5em 0px;
			padding-left:0.2em;
		}
		</style>
	</head>
	<body>
		<?php echo($msg); ?>
		<form method="post" enctype="multipart/form-data">
			<label>
				Vorname:
				<input type="text" name="VN" required>
			</label>
			<label for="NN">Nachname:</label>
			<input type="text" name="NN" id="NN" required>
			<label>
				Emailadresse:
				<input type="email" name="E" required>
			</label>
			<label>
				Geb.-Datum:
				<input type="date" name="GD">
			</label>
			<label>
				Ihre Nachricht an uns:
				<textarea name="NR"></textarea>
			</label>
			<label>
				Profilbild:
				<input type="file" name="PB">
			</label>
			<label>
				Ihre Dokumente:
				<input type="file" name="Docs[]" multiple>
			</label>
			<input type="submit" value="abschicken">
			<!--<button type="submit">abschicken</button>-->
		</form>
	</body>
</html>