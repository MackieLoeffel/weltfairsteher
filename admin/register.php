<?php
include __DIR__."/../include/access.php";

check_access(ADMIN);

$errors = [];
if(!isset($_POST['email']) || !isset($_POST['password'] || !isset($_POST['password2'])) {
    echo json_encode(["Falsche Parameter!"]);
    exit();
}
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($errors, "Bitte eine gültige Email angeben.");
}
if(strlen($password) == 0) {
    array_push($errors, "Bitte ein Passwort angeben.");
}
if($password != $password2) {
    array_push($errors, "Die Passwörter müssen übereinstimmen.");
}

//Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
if(empty($errors)) {
    $statement = $db->prepare("SELECT id FROM user WHERE email = :email");
    $result = $statement->execute(['email' => $email]);
    $user = $statement->fetch();

    if($user !== false) {
        array_push($errors, "Diese E-Mail-Adresse ist bereits vergeben.");
    }
}


echo json_encode($errors);
if(!empty($errors)) {
    exit();
}


$password_hash = password_hash($password, PASSWORD_DEFAULT);

$statement = $db->prepare("INSERT INTO user (email, password, role) VALUES (:email, :password, :role)");
$result = $statement->execute(['email' => $email,
                               'password' => $password_hash,
                               'role' => TEACHER]);
?>
