<?php
include __DIR__."/config.php";

define("TEACHER", 1);
define("ADMIN", 2);

$loginSite = rel2abs("login.php", "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);

function check_access($level) {
    global $loginSite, $_SESSION;
    if(!isset($_SESSION["role"]) || $_SESSION["role"] < $level) {
        header('Location: '.$loginSite);
        exit();
    }
}
?>
