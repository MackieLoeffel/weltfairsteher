<?php
include __DIR__."/include.php";
check_access_api(TEACHER);

list($class, $title, $desc, $points, $suggested, $category, $location, $extrapoints) = apiCheckParams(
    "class", "title", "description", "points", "suggested", "category", "location", "extrapoints");
$user = $_SESSION["user"];
$suggested = !!$suggested;
$title = trim($title);
$desc = trim($desc);
$extrapoints = trim($extrapoints);
if(!$extrapoints) {
    $extrapoints = null;
}

if($suggested) {
    list($suggested_category, $goals, $duration, $aid) = apiCheckParams("suggested_category", "goals", "duration", "aid");
    $allow_continuous_use = isset($_POST["allow_continuous_use"]);
    $dimensions = [];
    if(isset($_POST["dimensions"])) {
        $dimensions = $_POST["dimensions"];
    }
} else {
    $suggested_category = null;
    $goals = null;
    $duration = null;
    $aid = null;
    $allow_continuous_use = null;
    $dimensions = null;
}


apiCheck(ctype_digit($points), "Punkte müssen eine Zahl sein");
apiCheck(!$extrapoints || ctype_digit($extrapoints), "Extrapunkte müssen eine Zahl sein");
apiCheck(strlen($title) !== 0, "Titel darf nicht leer sein");
apiCheck(strlen($desc) !== 0, "Beschreibung darf nicht leer sein");
apiCheck(isAdmin() || dbExists("SELECT id FROM class WHERE id = :id AND teacher = :teacher", ["id" => $class, "teacher" => $user]), "Keine Berechtigung für diese Klasse");
apiCheck(!$suggested || dbExists("SELECT id FROM class WHERE id = :id", ["id" => $class]), "Ungültige Klasse");
apiCheck(isAdmin() || $suggested, "Keine Berechtigung");
apiCheck($suggested || $category === "selfmade" || array_filter($categories, function($cat) use ($category) { return $cat->name === $category; }), "Ungültige Kategorie");
apiCheck(array_filter($locationTypes, function($lt) use ($location) { return $lt["name"] === $location; }), "Ungültige Location!");

apiCheck(!$suggested || fetch("SELECT COUNT(*) AS count FROM (SELECT class FROM suggested UNION ALL SELECT author AS class FROM challenge) AS c WHERE c.class = :id", ["id" => $class])->count < MAX_SELFMADE_PER_CLASS,
         "Es sind maximal " . MAX_SELFMADE_PER_CLASS . " Eigenkreationen pro Klasse erlaubt.");

if($suggested) {
    apiCheckStringLength($desc, "Beschreibung", MIN_SELFMADE_DESCRIPTION_LENGTH, MAX_SELFMADE_DESCRIPTION_LENGTH);
    apiCheckStringLength($goals, "Die Challenge gilt als bestanden, wenn...", MIN_SELFMADE_GOALS_LENGTH, MAX_SELFMADE_GOALS_LENGTH);
    apiCheckStringLength($duration, "Aufwand/Geschätze Dauer", MIN_SELFMADE_DURATION_LENGTH, MAX_SELFMADE_DURATION_LENGTH);
    apiCheckStringLength($aid, "Benötigte Hilfsmittel/Quellen", MIN_SELFMADE_AID_LENGTH, MAX_SELFMADE_AID_LENGTH);
    apiCheck(count($dimensions) >= 1, "Es muss mindestens eine Dimension ausgewählt werden.");
}


apiAction(function() use ($title, $desc, $class, $points, $suggested, $category, $location, $extrapoints, $suggested_category, $goals, $duration, $aid, $allow_continuous_use, $dimensions) {
    global $db;
    if($suggested) {
        dbExecute("INSERT INTO suggested (title, description, class, points, location, extrapoints, suggested_category, goals, duration, aid, allow_continuous_use) VALUES (:title, :desc, :class, :points, :location, :extrapoints, :suggested_category, :goals, :duration, :aid, :allow_continuous_use)",
                  ["title" => $title,
                   "desc" => $desc,
                   "class" => $class,
                   "points" => $points,
                   "location" => $location,
                   "extrapoints" => $extrapoints,
                   "suggested_category" => $suggested_category,
                   "goals" => $goals,
                   "duration" => $duration,
                   "aid" => $aid,
                   "allow_continuous_use" => $allow_continuous_use
                  ]);
        $id = $db->lastInsertId();

        foreach($dimensions as $dim) {
            dbExecute("INSERT INTO suggested_dimension (suggested_id, dimension) VALUES (:id, :dimension)",
                      ["id" => $id,
                       "dimension" => $dim,
                      ]);
        }

        foreach(fetchAll("SELECT email FROM user WHERE role = :admin", ["admin" => ADMIN]) as $admin) {
            own_mail($admin->email, "Challenge vorgeschlagen", "Es wurde eine neue Challenge vorgeschlagen.\r\n\r\nTitel: $title\r\nBeschreibung:\r\n$desc\r\n\r\nZum Ablehnen oder Bestätigen bitte auf www.weltfairsteher.de/admin.php gehen.");
        }

    } else {
        if(!dbExists("SELECT id FROM class WHERE id = :id", ["id" => $class])) {
            $class = NULL;
        }

        checkMilestone($class, function() use ($title, $desc, $class, $points, $suggested, $category, $location, $extrapoints) {
            dbExecute("INSERT INTO challenge (name, description, author, points, category, author_time, location, extrapoints, flower_sum, flower_count) VALUES (:title, :desc, :class, :points, :category, NOW(), :location, :extrapoints, :flower_sum, :flower_count)",
                      ["title" => $title,
                       "desc" => $desc,
                       "class" => $class,
                       "points" => $points,
                       "location" => $location,
                       "category" => $category,
                       "extrapoints" => $extrapoints,
                       "flower_sum" => 0,
                       "flower_count" => 0]);
        });
    }
});
?>
