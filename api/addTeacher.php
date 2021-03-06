<?php
include __DIR__."/include.php";

check_access_api(ADMIN);

list($email, $password, $password2) = apiCheckParams("email", "password", "password2");

apiCheck(strlen($email) != 0, "Die Emailadresse darf nicht leer sein.");
apiCheck(strlen($email) < 150, "Die Emailadresse ist zu lang.");
apiCheck(filter_var($email, FILTER_VALIDATE_EMAIL), "Bitte eine gültige Email angeben.");
apiCheck(strlen($password) != 0, "Bitte ein Passwort angeben.");
apiCheck($password == $password2, "Die Passwörter müssen übereinstimmen.");
apiCheck(!dbExists("SELECT id FROM user WHERE email = :email", ['email' => $email]),
         "Diese E-Mail-Adresse ist bereits vergeben.");

apiAction(function() use($password, $email, $db) {
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $statement = $db->prepare("INSERT INTO user (email, password, role) VALUES (:email, :password, :role)");
    $result = $statement->execute(['email' => $email,
                                   'password' => $password_hash,
                                   'role' => TEACHER]);
});
?>
