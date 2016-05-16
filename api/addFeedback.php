<?php
include __DIR__."/include.php";

check_access(ADMIN);

list($challenge, $fun, $integration, $duration, $problems, $comment) = apiCheckParams("challenge", "fun", "integration", "duration", "problems", "comment");

apiCheck(ctype_digit($fun) && ctype_digit($integration) && ctype_digit($duration) && ctype_digit($problems), "Werte müssen Zahlen sein!");
apiCheck(dbExists("SELECT id FROM challenge WHERE id = :id", ['id' => $challenge]),
         "Unbekannte Challenge");

apiAction(function() use($challenge, $fun, $integration, $duration, $problems, $comment) {
    dbExecute("INSERT INTO feedback (challenge, fun, integration, duration, problems, comment) VALUES (:challenge, :fun, :integration, :duration, :problems, :comment)",
              ["challenge" => $challenge,
               "fun" => $fun,
               "integration" => $integration,
               "duration" => $duration,
               "problems" => $problems,
               "comment" => $comment]);
});
?>
