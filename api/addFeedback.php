<?php
include __DIR__."/include.php";

check_access(TEACHER);

list($challenge, $fun, $integration, $duration, $problems, $comment) = apiCheckParams("challenge", "fun", "integration", "duration", "problems", "comment");

apiCheck(ctype_digit($fun) && ctype_digit($integration) && ctype_digit($duration) && ctype_digit($problems), "Werte müssen Zahlen sein!");
$challengeRow = fetch("SELECT name FROM challenge WHERE id = :id", ["id" => $challenge]);
apiCheck($challengeRow !== false, "Unbekannte Challenge");

apiAction(function() use($challenge, $fun, $integration, $duration, $problems, $comment, $challengeRow) {
    dbExecute("INSERT INTO feedback (challenge, fun, integration, duration, problems, comment) VALUES (:challenge, :fun, :integration, :duration, :problems, :comment)",
              ["challenge" => $challenge,
               "fun" => $fun,
               "integration" => $integration,
               "duration" => $duration,
               "problems" => $problems,
               "comment" => $comment]);

    own_mail("kontakt@weltfairsteher.jetzt", "Neues Feedback", "Es ist ein neues Feedback für die Challenge " . e($challengeRow->name) . " eingegangen.\r\nGehe auf www.weltfairsteher.de/feedback.php zu anzeigen!");
});
?>
