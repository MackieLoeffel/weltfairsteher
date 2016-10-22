<?php
include __DIR__."/include.php";

check_access(TEACHER);

list($class, $challenge) = apiCheckParams("class", "challenge");
$user = $_SESSION["user"];
$extra = isset($_POST["extra"]);

apiCheck(dbExists(isTeacher() ?
                  "SELECT id FROM class WHERE id = :class AND teacher = :teacher" :
                  "SELECT id FROM class WHERE id = :class AND :teacher != -1", // dummy use of :teacher
                  ['class' => $class, "teacher" => $user]),
         "Ungültige Klasse");
apiCheck(dbExists("SELECT id FROM challenge WHERE id = :id",
                  ["id" => $challenge]),
         "Ungültige Challenge");
apiCheck(!dbExists("SELECT * FROM solved_challenge WHERE class = :class AND challenge = :challenge", ["class" => $class, "challenge" => $challenge]),
         "Challenge wurde von der Klasse schon gelöst");

apiCheck(!$extra || dbExists("SELECT id FROM challenge WHERE id = :id AND extrapoints IS NOT NULL", ["id" => $challenge]),
         "Kann keine Extrapunkte für Challenge ohne Extrapunkte setzen!");

apiAction(function() use($class, $challenge, $extra) {
    checkMilestone($class, function() use($class, $challenge, $extra) {
        dbExecute("INSERT INTO solved_challenge (class, challenge, extra, at) VALUES (:class, :challenge, :extra, NOW())", ["class" => $class, "challenge" => $challenge, "extra" => $extra ? 1 : 0]);
    });
});
?>
