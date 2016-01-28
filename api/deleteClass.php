<?php
include __DIR__."/include.php";

check_access(ADMIN);

list($class) = apiCheckParams("class");

apiCheck(dbExists("SELECT id FROM class WHERE id = :class", ['class' => $class]),
         "Klasse existiert nicht!");

apiAction(function() use($class, $db) {
    $statement = $db->prepare("DELETE FROM class WHERE id = :class");
    $result = $statement->execute(['class' => $class]);
});
?>
