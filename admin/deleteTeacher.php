<?php
include __DIR__."/../include/access.php";

check_access(ADMIN);

$errors = [];
if(!isset($_POST['teacher'])) {
    echo json_encode(["Falsche Parameter!"]);
    exit();
}

$teacher = $_POST['teacher'];

$statement = $db->prepare("SELECT id FROM user WHERE id = :teacher");
$result = $statement->execute(['teacher' => $teacher]);

if($statement->fetch() === false) {
    array_push($errors, "Lehrer existiert nicht!");
}

echo json_encode($errors);
if(!empty($errors)) {
    exit();
}

$statement = $db->prepare("DELETE FROM user WHERE id = :teacher");
$result = $statement->execute(['teacher' => $teacher]);
?>
