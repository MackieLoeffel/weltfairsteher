<?php
include __DIR__."/include.php";
check_access(TEACHER);

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

apiAction(function() use ($title, $desc, $class, $points, $suggested, $category, $location, $extrapoints) {
    if($suggested) {
        dbExecute("INSERT INTO suggested (title, description, class, points, location, extrapoints) VALUES (:title, :desc, :class, :points, :location, :extrapoints)",
                  ["title" => $title,
                   "desc" => $desc,
                   "class" => $class,
                   "points" => $points,
                   "location" => $location,
                   "extrapoints" => $extrapoints]);

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
