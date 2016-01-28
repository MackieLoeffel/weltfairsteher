<?php
include __DIR__."/../include/access.php";

$errors = [];

function apiCheckParams(...$names) {
    global $_POST;
    $ret = [];
    foreach($names as $name) {
        if(!isset($_POST[$name])) {
            echo json_encode(["Falsche Parameter!"]);
            exit();
        }
        array_push($ret, $_POST[$name]);
    }

    return $ret;
}

function apiAddError($msg) {
    global $errors;
    array_push($errors, $msg);
}

function apiNoError() {
    global $errors;
    return empty($errors);
}

function apiCheck($condition, $msg) {
    if(!$condition) {
        apiAddError($msg);
    }
}

function apiAction($action) {
    global $errors;
    if(empty($errors)) {
        try {
            $action();
        } catch(PDOException $e) {
            if($e->errorInfo[0] === "23000") {
                apiAddError("Es existieren noch Verknüfungen.");
            } else {
                apiAddError($e->getMessage());
            }
        } catch(Exception $e) {
            apiAddError($e->getMessage());
        }
    }
    echo json_encode($errors);
}

?>
