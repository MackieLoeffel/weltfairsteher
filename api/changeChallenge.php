<?php
include __DIR__."/include.php";
check_access(ADMIN);

list($c, $name, $desc, $points, $category) = apiCheckParams(
    "challenge", "name", "description", "points", "category");
$name = trim($name);
$desc = trim($desc);

apiCheck(dbExists("SELECT id FROM challenge WHERE id = :id", ["id" => $c]),
         "Ungültige Challenge");

if($points) {
    apiCheck(ctype_digit($points), "Punkte müssen eine Zahl sein");
}

if($category) {
    apiCheck(array_filter($categories, function($cat) use ($category) { return $cat->name === $category; }), "Ungültige Kategorie");
}


apiAction(function() use ($c, $name, $desc, $points, $category) {
    if($name) {
        dbExecute("UPDATE challenge SET name = :name WHERE id = :id",
                  ["id" => $c, "name" => $name]);
    }
    if($desc) {
        dbExecute("UPDATE challenge SET description = :desc WHERE id = :id",
                  ["id" => $c, "desc" => $desc]);
    }
    if($points) {
        dbExecute("UPDATE challenge SET points = :points WHERE id = :id",
                  ["id" => $c, "points" => $points]);
    }
    if($category) {
        dbExecute("UPDATE challenge SET category = :category WHERE id = :id",
                  ["id" => $c, "category" => $category]);
    }
});
?>
