<?php
include __DIR__."/include.php";

check_access(ADMIN);

list($name, $teacher, $class) = apiCheckParams("name", "teacher", "class");
$name = trim($name);

apiCheck(dbExists("SELECT id FROM class WHERE id = :id", ["id" => $class]), "Klasse existiert nicht.");

if(!empty($name)) {
    apiCheck(!dbExists("SELECT id FROM class WHERE name = :name", ["name" => $name]),
             "Name ist bereits vorhanden.");
}

if($teacher >= 0) {
    apiCheck(dbExists("SELECT id FROM user WHERE id = :id", ["id" => $teacher]),
             "Lehrer existiert nicht.");
}

apiFinalCheck();

if(!empty($name)) {
    dbExecute("UPDATE class SET name = :name WHERE id = :id ",
              ["name" => $name, "id" => $class]);
}
if($teacher >= 0) {
    dbExecute("UPDATE class SET teacher = :teacher WHERE id = :id ",
              ["teacher" => $teacher, "id" => $class]);
}
?>
