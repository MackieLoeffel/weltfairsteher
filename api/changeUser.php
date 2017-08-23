<?php
include __DIR__."/include.php";

check_access_api(TEACHER);

list($user, $email, $password, $password2) = apiCheckParams(
    "user", "email", "password", "password2");

apiCheck(isAdmin() || $user === $_SESSION["user"], "Keine Berechtigung");
apiCheck(dbExists("SELECT id FROM user WHERE id = :id", ["id" => $user]),
         "Unbekannter Benutzer");

if($email) {
    apiCheck(filter_var($email, FILTER_VALIDATE_EMAIL), "Bitte eine gültige Email angeben.");
    apiCheck(!dbExists("SELECT id FROM user WHERE email = :email", ['email' => $email]),
             "Diese E-Mail-Adresse ist bereits vergeben.");
}
apiCheck($password == $password2, "Die Passwörter müssen übereinstimmen.");

apiAction(function() use($user, $password, $email) {

    if($email) {
        dbExecute("UPDATE user SET email = :email WHERE id = :id",
                  ["email" => $email, "id" => $user]);
    }
    if($password) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        dbExecute("UPDATE user SET password = :password WHERE id = :id",
                  ["password" => $password_hash, "id" => $user]);
    }
});
?>
