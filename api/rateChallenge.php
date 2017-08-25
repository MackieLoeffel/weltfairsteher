<?php
include __DIR__."/include.php";

// check_access_api(TEACHER);

list($rating, $challenge) = apiCheckParams("rating", "challenge");

apiCheck(dbExists("SELECT id FROM challenge WHERE id = :id",
                  ["id" => $challenge]),
         "Ungültige Challenge");
apiCheck($rating >= 0 && $rating <= 5, "Rating muss zwischen 0 und 5 liegen!");

apiAction(function() use($rating, $challenge) {
    dbExecute("UPDATE challenge SET flower_count = flower_count + 1, flower_sum = flower_sum + :rating WHERE id = :challenge",
              ["rating" => $rating, "challenge" => $challenge]);
});
?>
