<?php
include __DIR__."/../include/access.php";

check_access(ADMIN);

$errors = [];
if(!isset($_POST['class'])) {
    echo json_encode(["Falsche Parameter!"]);
    exit();
}

$class = $_POST['class'];

$statement = $db->prepare("SELECT id FROM class WHERE id = :class");
$result = $statement->execute(['class' => $class]);

if($statement->fetch() === false) {
    array_push($errors, "Klasse existiert nicht!");
}

echo json_encode($errors);
if(!empty($errors)) {
    exit();
}

$statement = $db->prepare("DELETE FROM class WHERE id = :class");
$result = $statement->execute(['class' => $class]);
?>
