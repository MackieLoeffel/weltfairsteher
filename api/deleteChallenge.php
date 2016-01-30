<?php
include __DIR__."/include.php";

check_access(ADMIN);

list($challenge) = apiCheckParams("challenge");

apiCheck(dbExists("SELECT id FROM challenge WHERE id = :challenge",
                  ['challenge' => $challenge]),
         "Challenge existiert nicht!");

apiAction(function() use($challenge) {
    dbExecute("DELETE FROM challenge WHERE id = :challenge",
              ['challenge' => $challenge]);
});
?>
