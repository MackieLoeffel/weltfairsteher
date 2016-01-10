<?php
include "include/access.php";

check_access(ADMIN);
include "include/header.php";

# from http://www.php-einfach.de/experte/php-codebeispiele/loginscript/
$showFormular = true;
if(isset($_POST['email'])) {
    $error = false;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
        $error = true;
    }
    if(strlen($password) == 0) {
        echo 'Bitte ein Passwort angeben<br>';
        $error = true;
    }
    if($password != $password2) {
        echo 'Die Passwörter müssen übereinstimmen<br>';
        $error = true;
    }

    //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
    if(!$error) {
        $statement = $db->prepare("SELECT id FROM user WHERE email = :email");
        $result = $statement->execute(['email' => $email]);
        $user = $statement->fetch();

        if($user !== false) {
            echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
            $error = true;
        }
    }

    //Keine Fehler, wir können den Nutzer registrieren
    if(!$error) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $statement = $db->prepare("INSERT INTO user (email, password, role) VALUES (:email, :password, :role)");
        $result = $statement->execute(['email' => $email,
                                       'password' => $password_hash,
                                       'role' => TEACHER]);

        if($result) {
            echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
            $showFormular = false;
        } else {
            echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
        }
    }
}

if($showFormular) {
?>
    <form method="post">
        E-Mail:<br>
        <input type="email" size="40" maxlength="250" name="email"><br><br>

        Dein Passwort:<br>
        <input type="password" size="40"  maxlength="250" name="password"><br>

        Passwort wiederholen:<br>
        <input type="password" size="40" maxlength="250" name="password2"><br><br>

        <input type="submit" value="Abschicken">
    </form>

<?php
}
include "include/footer.php";
?>
