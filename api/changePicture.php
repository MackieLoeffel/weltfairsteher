<?php
include __DIR__."/include.php";

check_access_api(ADMIN);

list($challenge) = apiCheckParams("challenge");
$file = $_FILES["file"];

apiCheck(dbExists("SELECT id FROM challenge WHERE id = :challenge",
                  ['challenge' => $challenge]),
         "Challenge existiert nicht!");
$extension = pathinfo($file["name"], PATHINFO_EXTENSION);
apiCheck($extension === "png" || $extension === "jpg",
         "Nur png und jpg-Dateien erlaubt");
apiCheck($file["size"] < MAX_PDF_SIZE, "Datei zu groß!");

apiAction(function() use($challenge, $file) {
    move_uploaded_file($file["tmp_name"],
                       getPicturePath($challenge));
});
?>
