<?php
include "include/header.php"; ?>

  <section  class="sectionbg" style="background-color: #F2F2DA;">

  <?php

$showForm = true;
if(isset($_SESSION["user"])) {
    echo "Sie sind bereits angemeldet!";
    $showForm = false;
} else if(isset($_POST["email"]) && isset($_POST["password"])) {
    $userStmt = $db->prepare("SELECT id, role, password FROM user WHERE email = :email ");
    $userStmt->execute(["email" => $_POST["email"]]);
    $user = $userStmt->fetch(PDO::FETCH_OBJ);
    if($user === false || !password_verify($_POST["password"], $user->password)) {
        echo "Falsches Passwort oder falsche E-Mail-Adresse - Versuchen Sie´s nochmal. <br>";
    } else {
        $_SESSION["role"] = $user->role;
        $_SESSION["user"] = $user->id;
?>
    <b style="margin-left: 30%;"> Schön, dass Sie wieder da sind! In wenigen Augenblicken geht´s weiter... </b>
    <script type="text/javascript">
     setTimeout(function() {window.location = "teacher.php"}, 3*1000);
    </script>

    <?php
        $showForm = false;
    }
}
if($showForm) {
?>
        <div class="login" style="width: auto;
        margin-left: 25%;
        margin-right: 25%;
        margin-top: 0px;
        height: 125px;
        background-color: #6EDB95;">
            <form method="post">
                <p><input type="text" name="email" style="width: 100%;
                  text-align: center; margin-top: 5px;" value=""
                  placeholder="E-Mail-Adresse"></p>
                <p><input type="password" name="password" style="width: 100%;
                  text-align: center;" value=""
                  placeholder="Passwort"></p>
                <p class="submit" style="width: 26%;
                  margin-bottom: 5px; margin-left: 37%; margin-right: 37%;
                  text-align: center;"><input type="submit" name="commit"
                  value="Login"></p>  </form>
                  <span style="width: 26%; text-align: center; margin-left: 39%; margin-top:-17px;">
                    <a href="forgotPassword.php" alt="pw reset" style="color: grey; font-size: 9px;">Passwort vergessen?</a></span>
                </div>
<?php
}
?>
</section>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
include "include/footer.php";
?>
