<?php
include __DIR__."/include.php";
check_access(TEACHER);

list($class, $title, $desc, $points, $suggested, $category) = apiCheckParams(
    "class", "title", "desc", "points", "suggested", "category");
$user = $_SESSION["user"];
$suggested = !!$suggested;
$title = trim($title);
$desc = trim($desc);

apiCheck(strlen($title) !== 0, "Titel darf nicht leer sein");
apiCheck(strlen($desc) !== 0, "Beschreibung darf nicht leer sein");
apiCheck(isAdmin() || dbExists("SELECT id FROM class WHERE id = :id AND teacher = :teacher", ["id" => $class, "teacher" => $user]), "Keine Berechtigung für diese Klasse");
apiCheck(!$suggested || dbExists("SELECT id FROM class WHERE id = :id", ["id" => $class]), "Ungültige Klasse");
apiCheck(isAdmin() || $suggested, "Keine Berechtigung");
apiCheck($suggested || array_filter($categories, function($cat) use ($category) { return $cat->name === $category; }), "Ungültige Kategorie");

apiAction(function() use ($title, $desc, $class, $points, $suggested, $category) {
    if($suggested) {
        dbExecute("INSERT INTO suggested (title, description, class, points) VALUES (:title, :desc, :class, :points)",
                  ["title" => $title,
                   "desc" => $desc,
                   "class" => $class,
                   "points" => $points]);
    } else {
        if(!dbExists("SELECT id FROM class WHERE id = :id", ["id" => $class])) {
            $class = NULL;
        }

        dbExecute("INSERT INTO challenge (name, description, author, points, category) VALUES (:title, :desc, :class, :points, :category)",
                  ["title" => $title,
                   "desc" => $desc,
                   "class" => $class,
                   "points" => $points,
                   "category" => $category]);
    }
});
?>
