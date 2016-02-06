<?php
include __DIR__."/include.php";

check_access(ADMIN);

list($milestone) = apiCheckParams("milestone");

apiCheck(dbExists("SELECT id FROM milestone WHERE id = :milestone", ['milestone' => $milestone]),
         "Etappe existiert nicht!");

apiAction(function() use($milestone) {
    dbExecute("DELETE FROM milestone WHERE id = :milestone", ['milestone' => $milestone]);
});
?>
