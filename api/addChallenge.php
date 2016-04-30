<?php
include __DIR__."/include.php";
check_access(TEACHER);

list($class, $title, $desc, $points, $suggested, $category, $location) = apiCheckParams(
    "class", "title", "description", "points", "suggested", "category", "location");
$user = $_SESSION["user"];
$suggested = !!$suggested;
$title = trim($title);
$desc = trim($desc);

apiCheck(ctype_digit($points), "Punkte müssen eine Zahl sein");
apiCheck(strlen($title) !== 0, "Titel darf nicht leer sein");
apiCheck(strlen($desc) !== 0, "Beschreibung darf nicht leer sein");
apiCheck(isAdmin() || dbExists("SELECT id FROM class WHERE id = :id AND teacher = :teacher", ["id" => $class, "teacher" => $user]), "Keine Berechtigung für diese Klasse");
apiCheck(!$suggested || dbExists("SELECT id FROM class WHERE id = :id", ["id" => $class]), "Ungültige Klasse");
apiCheck(isAdmin() || $suggested, "Keine Berechtigung");
apiCheck($suggested || $category === "selfmade" || array_filter($categories, function($cat) use ($category) { return $cat->name === $category; }), "Ungültige Kategorie");
apiCheck(array_filter($locationTypes, function($lt) use ($location) { return $lt["name"] === $location; }), "Ungültige Location!");

apiAction(function() use ($title, $desc, $class, $points, $suggested, $category, $location) {
    if($suggested) {
        dbExecute("INSERT INTO suggested (title, description, class, points, location) VALUES (:title, :desc, :class, :points, :location)",
                  ["title" => $title,
                   "desc" => $desc,
                   "class" => $class,
                   "points" => $points,
                   "location" => $location]);

        foreach(fetchAll("SELECT email FROM user WHERE role = :admin", ["admin" => ADMIN]) as $admin) {
            mail($admin->email, "Challenge vorgeschlagen", "Es wurde eine neue Challenge vorgeschlagen.\r\n\r\nTitel: $title\r\nBeschreibung:\r\n$desc\r\n\r\nZum Ablehnen oder Bestätigen bitte auf www.weltfairsteher.de/admin.php gehen.", "FROM: kontakt@weltfairsteher.com");
        }

    } else {
        if(!dbExists("SELECT id FROM class WHERE id = :id", ["id" => $class])) {
            $class = NULL;
        }

        dbExecute("INSERT INTO challenge (name, description, author, points, category, author_time, location) VALUES (:title, :desc, :class, :points, :category, NOW(), :location)",
                  ["title" => $title,
                   "desc" => $desc,
                   "class" => $class,
                   "points" => $points,
                   "location" => $location,
                   "category" => $category]);
    }
});
?>
