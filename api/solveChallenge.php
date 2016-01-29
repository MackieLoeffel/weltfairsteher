<?php
include __DIR__."/include.php";

check_access(TEACHER);

list($class, $challenge) = apiCheckParams("class", "challenge");
$user = $_SESSION["user"];

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

apiAction(function() use($class, $challenge) {
    dbExecute("INSERT INTO solved_challenge (class, challenge, at) VALUES (:class, :challenge, NOW())", ["class" => $class, "challenge" => $challenge]);
});
?>
