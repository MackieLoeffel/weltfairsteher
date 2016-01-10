<?php
include "include/header.php";

$showForm = true;
if(isset($_SESSION["user"])) {
    echo "already logged in!";
    $showForm = false;
} else if(isset($_POST["email"]) && isset($_POST["password"])) {
    $userStmt = $db->prepare("SELECT id, role, password FROM user WHERE email = :email ");
    $userStmt->execute(["email" => $_POST["email"]]);
    $user = $userStmt->fetch(PDO::FETCH_OBJ);
    if($user === false || !password_verify($_POST["password"], $user->password)) {
        echo "invalid email or password! <br>";
    } else {
        $_SESSION["role"] = $user->role;
        $_SESSION["user"] = $user->id;
?>
    <b> logged in, redirecting in 3 seconds... </b>
    <script type="text/javascript">
     setTimeout(function() {window.location = "teacher.php"}, 3*1000);
    </script>

    <?php
        $showForm = false;
    }
}
if($showForm) {
?>
        <div class="login">
            <form method="post">
                <p><input type="text" name="email" value="" placeholder="E-Mail-Adresse"></p>
                <p><input type="password" name="password" value="" placeholder="Passwort"></p>
                <p class="submit"><input type="submit" name="commit" value="Login" style="background-color: green";></p>
            </form></div>
<?php
}
?>
<?php
include "include/footer.php";
?>
