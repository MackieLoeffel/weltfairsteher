<?php
include __DIR__."/include.php";

check_access(ADMIN);

list($teacher) = apiCheckParams("teacher");

apiCheck(dbExists("SELECT id FROM user WHERE id = :teacher AND role != :admin",
                  ['teacher' => $teacher, "admin" => ADMIN]),
         "Lehrer existiert nicht oder ist ein Admin");

apiCheck(!dbExists("SELECT id FROM class WHERE teacher = :id", ["id" => $teacher]),
         "Benutzer kann nur entfernt werden, wenn er keine Klassen mehr hat.");

apiAction(function() use($teacher, $db) {
    $statement = $db->prepare("DELETE FROM user WHERE id = :teacher");
    $result = $statement->execute(['teacher' => $teacher]);
    dbExecute("DELETE FROM forgot WHERE user = :id", ["id" => $id]);
});
?>
