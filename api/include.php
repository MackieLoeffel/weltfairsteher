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


function checkMilestone($class, $action) {
    if(!$class) {
        $action();
        return;
    }
    $milestones = fetchAll("SELECT points FROM milestone ORDER BY points ASC");

    $startPoints = array_pop(calculatePoints($class)["points"]);
    $action();
    $endPoints = array_pop(calculatePoints($class)["points"]);


    $achieved = [];
    foreach($milestones as $stone) {
        if($stone->points > $endPoints) {
            break;
        }
        if($stone->points > $startPoints) {
            array_push($achieved, $stone->points);
        }
    }

    if(empty($achieved)) {
        return;
    }

    $classInfo = fetch("SELECT c.name, u.email FROM class AS c JOIN user AS u ON c.teacher = u.id");
    $n = "";
    if(count($achieved) > 1) {
        $n = "n";
    }

    foreach(fetchAll("SELECT email FROM user WHERE role = :admin", ["admin" => ADMIN]) as $admin) {
        own_mail($admin->email, "Etappe$n erreicht", "Guten Tag,\r\nDie Klasse \"$classInfo->name\" hat die Etappe$n " . implode(", ", $achieved) . " erreicht!\r\nDer Lehrer ist: $classInfo->email \r\n\r\nViele Grüße\r\nIhre Weltfairsteher-Website");
    }

    own_mail($classInfo->email, "Etappe$n erreicht", "Herzlichen Glückwunsch, Ihre  Klasse \"$classInfo->name\" hat bei weltfairsteher die Etappe$n " . implode(", ", $achieved) . " erreicht!\r\n");
}

?>
