<?php
include __DIR__."/include.php";

check_access(ADMIN);

list($challenge, $type) = apiCheckParams("challenge", "type");
$file = $_FILES["file"];

apiCheck(dbExists("SELECT id FROM challenge WHERE id = :challenge",
                  ['challenge' => $challenge]),
         "Challenge existiert nicht!");
apiCheck(pathinfo($file["name"], PATHINFO_EXTENSION) === "pdf",
         "Nur pdf-Dateien erlaubt");
apiCheck($file["size"] < MAX_PDF_SIZE, "Datei zu groß!");
apiCheck($type === TEACHER_PDF || $type === PUPIL_PDF, "Ungütiger Typ");

apiAction(function() use($challenge, $file, $type) {
    move_uploaded_file($file["tmp_name"], getPDFPath($challenge, $type));
});
?>
