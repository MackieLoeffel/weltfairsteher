<?php
include __DIR__."/include.php";

check_access(ADMIN);

list($m, $points, $description) = apiCheckParams("milestone", "points", "description");
$description = trim($description);

apiCheck(dbExists("SELECT id FROM milestone WHERE id = :id", ["id" => $m]),
         "Unbekannte Etappe");

if($points) {
    apiCheck(ctype_digit($points), "Punkte müssen eine Zahl sein");
    apiCheck(!dbExists("SELECT id FROM milestone WHERE points = :p", ["p"=>$points]),
             "Punkte schon vorhanden");
}

apiAction(function() use($m, $points, $description) {
    if($points) {
        dbExecute("UPDATE milestone SET points = :points WHERE id = :id",
                  ["points" => $points, "id" => $m]);
    }
    if($description) {
        dbExecute("UPDATE milestone SET description = :description WHERE id = :id",
                  ["description" => $description, "id" => $m]);
    }
});
?>
