<?php
include __DIR__."/include.php";

list($challenge, $type) = apiCheckParams("challenge", "type");

$challengeRow = fetch("SELECT name FROM challenge WHERE id = :challenge",
                  ['challenge' => $challenge]);
apiCheck($challengeRow !== false, "Challenge existiert nicht!");
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

apiAction(function() use($file, $challengeRow, $type) {
    $filename = $challengeRow->name;
    // normalize filename
    // idea from http://stackoverflow.com/questions/2021624/string-sanitizer-for-filename
    $filename = mb_ereg_replace("(ä)", 'a', $filename);
    $filename = mb_ereg_replace("(ü)", 'u', $filename);
    $filename = mb_ereg_replace("(ö)", 'o', $filename);
    $filename = mb_ereg_replace("(Ä)", 'A', $filename);
    $filename = mb_ereg_replace("(Ü)", 'U', $filename);
    $filename = mb_ereg_replace("(Ö)", 'O', $filename);
    $filename = mb_ereg_replace("([^A-Za-z_0-9])", '', $filename);

    if($type === TEACHER_PDF)
    {
        $filename .= "_Lehrer";
    }

    // see http://stackoverflow.com/a/27805443
    header('Content-Type: application/pdf');

    //Use Content-Disposition: attachment to specify the filename
    header('Content-Disposition: attachment; filename=' . $filename . ".pdf");

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
