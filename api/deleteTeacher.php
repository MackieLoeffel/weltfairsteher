<?php
include __DIR__."/include.php";

check_access(ADMIN);

list($teacher) = apiCheckParams("teacher");

apiCheck(dbExists("SELECT id FROM user WHERE id = :teacher", ['teacher' => $teacher]),
         "Lehrer existiert nicht!");

apiFinalCheck();

$statement = $db->prepare("DELETE FROM user WHERE id = :teacher");
$result = $statement->execute(['teacher' => $teacher]);
?>
