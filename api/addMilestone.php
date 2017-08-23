<?php
include __DIR__."/include.php";

check_access_api(ADMIN);

list($points, $description) = apiCheckParams("points", "description");
$description = trim($description);

apiCheck(ctype_digit($points), "Punkte müssen eine Zahl sein");
apiCheck(!dbExists("SELECT id FROM milestone WHERE points = :p", ["p"=>$points]),
         "Punkte schon vorhanden");
apiCheck(strlen($description) !== 0, "Beschreibung darf nicht leer sein");

apiAction(function() use($points, $description) {
    dbExecute("INSERT INTO milestone (points, description) VALUES (:points, :description)",
              ["points" => $points,
               "description" => $description]);
});
?>
