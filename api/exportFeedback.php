<?php
include __DIR__."/include.php";

check_access(ADMIN);

apiAction(function() {
    $csv = "Challenge; Spass; Integration; Dauer; Probleme\r\n";
    foreach(fetchAll("SELECT f.*, c.name  FROM feedback f JOIN challenge c ON f.challenge = c.id ") as $feedback) {
        $csv = $csv . "$feedback->name; $feedback->fun; $feedback->integration; $feedback->duration; $feedback->problems\r\n";
    }


    header('Content-Type: application/csv');

    //Use Content-Disposition: attachment to specify the filename
    header('Content-Disposition: attachment; filename=export.csv');

    //No cache
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');

    //Define file size
    header('Content-Length: ' . strlen($csv));

    ob_clean();
    flush();
    echo $csv;
});
?>
