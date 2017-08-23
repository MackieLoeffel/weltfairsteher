<?php
include __DIR__."/config.php";

define("TEACHER", 1);
define("ADMIN", 2);

$loginSite = rel2abs("login.php", "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);

function may_access($level) {
    global $_SESSION;
    return isset($_SESSION["role"]) && $_SESSION["role"] >= $level;
}

function check_access($level) {
    global $loginSite;
    if(!may_access($level)) {
        header('Location: '.$loginSite);
        exit();
    }
}

function check_access_api($level) {
    if(!may_access($level)) {
        http_response_code(401);
        exit();
    }
}
?>
