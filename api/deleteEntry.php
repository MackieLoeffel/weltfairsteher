<?php
include __DIR__."/include.php";

check_access(ADMIN);

list($id, $table) = apiCheckParams("id", "table");

// user has special rules (can't delete admin)
if(in_array($table, ["challenge", "class", "leckerwissen", "milestone", "suggested", "solved_challenge"])) {
    apiCheck(dbExists("SELECT id FROM $table WHERE id = :id", ['id' => $id]),
             "Eintrag existiert nicht!");
} else {
    apiAddError("Ungültiger Tabellenname");
}

apiAction(function() use($id, $table) {
    dbExecute("DELETE FROM $table WHERE id = :id", ['id' => $id]);
});
?>
