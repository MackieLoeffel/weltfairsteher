<?php
include "include/header.php";
define("EXPIRE_TIME", 24*60*60);

$forgotid = $_GET["forgotid"];
$userid = fetch("SELECT user, created_at FROM forgot WHERE id = :id", ["id" => $forgotid]);

$valid = true;
$delete = false;
if($userid === false) {
    $valid = false;
} else if(strtotime($userid->created_at) + EXPIRE_TIME < time()) {
    // expired
    $valid = false;
    $delete = true;
}

if($valid) {
    $delete = true;

    // log the user in
    $user = fetch("SELECT id, role FROM user WHERE id = :id", ["id" => $userid->user]);

    $_SESSION["role"] = $user->role;
    $_SESSION["user"] = $user->id;
    ?>
        <b style="margin-left: 30%;"> Jippie, Sie sind wieder da! In wenigen Augenblicken geht´s weiter... </b>
    <script type="text/javascript">
     setTimeout(function() {window.location = "teacher.php#changeUser"}, 1);
    </script>
    <?php
    } else {
    echo "Ungültiger Link!";
    }

    if($delete) {
    dbExecute("DELETE FROM forgot WHERE id = :id", ["id" => $forgotid]);
    }

    include "include/footer.php";
?>
