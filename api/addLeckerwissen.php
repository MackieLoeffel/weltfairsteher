<?php
include __DIR__."/include.php";

//check_access(TEACHER);

list($link, $title, $type, $category, $captcha) = apiCheckParams(
    "link", "title", "type", "category", "captcha_code");

apiCheck(strlen($link) != 0, "Link darf nicht leer sein");
apiCheck(strlen($title) != 0, "Titel darf nicht leer sein");
apiCheck($category == "other" || array_filter($categories, function($cat) use ($category) { return $cat->name === $category; }),
         "Ungültige Kategorie");
apiCheck(array_filter($leckerwissenTypes,
                      function($t) use ($type) { return $t["name"] === $type; }),
         "Ungültiger Typ");
apiCheck($captcha === $_SESSION['captcha_spam'], "Der Captcha-Code war leider falsch!");

apiAction(function() use($link, $title, $type, $category) {
    dbExecute("INSERT INTO leckerwissen (link, title, type, category) VALUES (:link, :title, :type, :category)",
              ["link" => $link,
               "title" => $title,
               "type" => $type,
               "category" => $category]);
});
?>
