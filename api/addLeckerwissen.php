<?php
include __DIR__."/include.php";

//check_access(TEACHER);





list($link, $title, $type, $category) = apiCheckParams(
    "link", "title", "type", "category");

apiCheck(strlen($link) != 0, "Link darf nicht leer sein");
apiCheck(strlen($title) != 0, "Titel darf nicht leer sein");
apiCheck($category == "other" || array_filter($categories, function($cat) use ($category) { return $cat->name === $category; }),
         "Ungültige Kategorie");
apiCheck(array_filter($leckerwissenTypes,
                      function($t) use ($type) { return $t["name"] === $type; }),
         "Ungültiger Typ");



         //CAPTCHA_CODE
           // Ganz oben, vor irgendeiner Ausgabe: //
         session_start();

           // Bearbeiten des Formulars //
           if ($_POST['captcha_code'] == $_SESSION['captcha_spam']) {
             // Das Captcha wurde korrekt ausgefuellt //

             // [HIER] kann jetzt der PHP-Code hin, den vorher ohnehin genutzt hast, um das Formular zu verarbeiten.




apiAction(function() use($link, $title, $type, $category) {
    dbExecute("INSERT INTO leckerwissen (link, title, type, category) VALUES (:link, :title, :type, :category)",
              ["link" => $link,
               "title" => $title,
               "type" => $type,
               "category" => $category]);


             });



} else {
  // Captcha wurde falsch ausgefuellt, Fehler ausgeben. //
  echo 'Du hast den Captcha-Code falsch eingegeben!';
}
//CAPTCHA_CODE ENDE



?>
