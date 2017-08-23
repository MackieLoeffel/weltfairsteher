<?php
include __DIR__."/include.php";

check_access_api(ADMIN);

list($name, $teacher) = apiCheckParams("name", "teacher");
$name = trim($name);

apiCheck(strlen($name) != 0, "Bitte einen Namen angeben.");
apiCheck(strlen($name) < 90, "Der Klassenname ist zu lang.");
apiCheck(!dbExists("SELECT id FROM class WHERE name = :name", ['name' => $name]),
         "Dieser Klassenname ist bereits vergeben.");
apiCheck(dbExists("SELECT id FROM user WHERE id = :id", ['id' => $teacher]),
         "Unbekannter Lehrer");

apiAction(function() use($name, $teacher, $db) {
    $statement = $db->prepare("INSERT INTO class (name, teacher) VALUES (:name, :teacher)");
    $result = $statement->execute(['name' => $name,
                                   'teacher' => $teacher]);
});
?>
