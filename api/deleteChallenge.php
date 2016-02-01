<?php
include __DIR__."/include.php";

check_access(ADMIN);

list($suggested, $challenge) = apiCheckParams("suggested", "challenge");

$table = $suggested ? "suggested" : "challenge";

apiCheck(dbExists("SELECT id FROM $table WHERE id = :challenge",
                  ['challenge' => $challenge]),
         "Challenge existiert nicht!");

apiAction(function() use($table, $challenge) {
    dbExecute("DELETE FROM $table WHERE id = :challenge",
              ['challenge' => $challenge]);
});
?>
