<?php
include __DIR__."/include.php";

check_access(ADMIN);

list($points, $description) = apiCheckParams("points", "description");

apiCheck(strlen($description) !== 0, "Beschreibung darf nicht leer sein");
apiCheck(ctype_digit($points), "Punkte müssen eine Zahl sein");

apiAction(function() use($points, $description) {
    dbExecute("INSERT INTO milestone (points, description) VALUES (:points, :description)",
              ["points" => $points,
               "description" => $description]);
});
?>
