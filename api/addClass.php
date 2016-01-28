<?php
include __DIR__."/../include/access.php";

check_access(ADMIN);

$errors = [];
if(!isset($_POST['name']) || !isset($_POST['teacher'])) {
    echo json_encode(["Falsche Parameter!"]);
    exit();
}

$name = trim($_POST['name']);
$teacher = $_POST['teacher'];

if(strlen($name) == 0) {
    array_push($errors, "Bitte einen Namen angeben.");
}

if(empty($errors)) {
    $statement = $db->prepare("SELECT id FROM class WHERE name = :name");
    $result = $statement->execute(['name' => $name]);

    if($statement->fetch() !== false) {
        array_push($errors, "Dieser Klassenname ist bereits vergeben.");
    }
}

if(empty($errors)) {
    $statement = $db->prepare("SELECT id FROM user WHERE id = :id");
    $result = $statement->execute(['id' => $teacher]);

    if($statement->fetch() === false) {
        array_push($errors, "Unbekannter Lehrer");
    }
}

echo json_encode($errors);
if(!empty($errors)) {
    exit();
}

$statement = $db->prepare("INSERT INTO class (name, teacher) VALUES (:name, :teacher)");
$result = $statement->execute(['name' => $name,
                               'teacher' => $teacher]);
?>
