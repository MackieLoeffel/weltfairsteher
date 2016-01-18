<?php
include __DIR__."/../include/access.php";

check_access(ADMIN);

$errors = [];
if(!isset($_POST['name']) || !isset($_POST['teacher']) || !isset($_POST['class'])) {
    echo json_encode(["Falsche Parameter!"]);
    exit();
}

$name = trim($_POST['name']);
$teacher = $_POST['teacher'];
$class = $_POST['class'];

if(!dbExists("SELECT id FROM class WHERE id = :id", ["id" => $class])) {
    array_push($errors, "Klasse existiert nicht.");
}

if(!empty($name) && dbExists("SELECT id FROM class WHERE name = :name", ["name" => $name])) {
    array_push($errors, "Name ist bereits vorhanden.");
}

if($teacher >= 0 && !dbExists("SELECT id FROM user WHERE id = :id", ["id" => $teacher])) {
    array_push($errors, "Lehrer existiert nicht.");
}

echo json_encode($errors);
if(!empty($errors)) {
    exit();
}

if(!empty($name)) {
    dbExecute("UPDATE class SET name = :name WHERE id = :id ",
              ["name" => $name, "id" => $class]);
}
if($teacher >= 0) {
    dbExecute("UPDATE class SET teacher = :teacher WHERE id = :id ",
              ["teacher" => $teacher, "id" => $class]);
}
?>
