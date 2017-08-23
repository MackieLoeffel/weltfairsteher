<?php
include __DIR__."/include.php";

check_access_api(ADMIN);

list($lw, $link, $title, $type, $category) = apiCheckParams(
    "lw", "link", "title", "type", "category");

apiCheck(dbExists("SELECT id FROM leckerwissen WHERE id = :id", ["id" => $lw]),
         "Ungültiges Leckerwissen");
if($category) {
    apiCheck($category == "other" || array_filter($categories, function($cat) use ($category) { return $cat->name === $category; }),
             "Ungültige Kategorie");
}
if($type) {
    apiCheck(array_filter($leckerwissenTypes,
                          function($t) use ($type) { return $t["name"] === $type; }),
             "Ungültiger Typ");
}
apiAction(function() use($lw, $link, $title, $type, $category) {
    if($link) {
        dbExecute("UPDATE leckerwissen SET link = :link WHERE id = :id",
                  ["id" => $lw,
                   "link" => $link]);
    }
    if($title) {
        dbExecute("UPDATE leckerwissen SET title = :title WHERE id = :id",
                  ["id" => $lw,
                   "title" => $title]);
    }
    if($category) {
        dbExecute("UPDATE leckerwissen SET category = :category WHERE id = :id",
                  ["id" => $lw,
                   "category" => $category]);
    }
    if($type) {
        dbExecute("UPDATE leckerwissen SET type = :type WHERE id = :id",
                  ["id" => $lw,
                   "type" => $type]);
    }
});
?>
