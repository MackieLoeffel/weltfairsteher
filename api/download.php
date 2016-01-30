<?php
include __DIR__."/include.php";

list($challenge, $type) = apiCheckParams("challenge", "type");
apiCheck(dbExists("SELECT id FROM challenge WHERE id = :challenge",
                  ['challenge' => $challenge]),
         "Challenge existiert nicht!");
if($type !== TEACHER_PDF && $type !== PUPIL_PDF) {
    apiAddError("Ungültiger Typ");
} else {
    if($type == TEACHER_PDF && !isLoggedIn()) {
        apiAddError("Nicht erlaubt!");
    } else {
        $file = getPDFPath($challenge, $type);
        apiCheck(file_exists($file), "Datei existiert nicht!");
    }
}

apiAction(function() use($file) {
    // see http://stackoverflow.com/a/27805443
    header('Content-Type: application/pdf');

    //Use Content-Disposition: attachment to specify the filename
    header('Content-Disposition: attachment; filename='.basename($file));

    //No cache
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');

    //Define file size
    header('Content-Length: ' . filesize($file));

    ob_clean();
    flush();
    readfile($file);
    exit;
});
?>
