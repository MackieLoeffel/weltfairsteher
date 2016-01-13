<?php include "include/header.php"?>

<br>
<br>
<?php

if(isset($_POST["link"])) {
    $link = $_POST["link"];
    $title = $_POST["title"];
    $type = $_POST["type"];
    $cat = $_POST["category"];
    $addStmt = $db->prepare("INSERT INTO leckerwissen (link, title, type, category) VALUES (:link, :title, :type, :category)");
    try {
        $addStmt->execute(["link" => $link,
                           "title" => $title,
                           "type" => $type,
                           "category" => $cat]);
    } catch(Exception $ex) {
        echo "Ungültige Daten!<br>";
    }
}

$types = [
    ['name' => 'article', "desc" => "Artikel"],
    ['name' => 'video', "desc" => "Videos"],
    ['name' => 'other', "desc" => "Sonstiges"],
];

array_push($categories, new Category("other", "Weiteres"));
$leckerStmt = $db->prepare("SELECT link, title FROM leckerwissen
WHERE category = :category AND type = :type");
foreach($categories as $c) {
?>
    <div class=".abstand leckerwissen-header <?= e($c->name) ?>">
        <?= e($c->title) ?>
    </div>
<?php
}
foreach($categories as $c) {
?>
    <div class=".abstand leckerwissen-box">
        <?php
        $first = true;
        foreach($types as $t) {
            $leckerStmt->execute(["category" => $c->name,
                                  "type" => $t["name"]]);

            if($first) {
                $first = false;
            } else {
                echo "<br>";
            }
        ?>
        <b><?= e($t["desc"]) ?>:</b><br>
        <?php foreach($leckerStmt->fetchAll(PDO::FETCH_OBJ) as $entry) {?>
            <a href="<?= e($entry->link) ?>" target="_blank">
                <font color="#00301B"><?= e($entry->title) ?></font>
            </a><br>
        <?php } ?>
<?php } ?>
    </div>
<?php } ?>

<!--
     ADD NEW LECKERWISSEN
   -->


<div style="float: left; margin-top: 15px; background-color:#1BAB3F;
font-size: 15px; margin-left: 7px; color: white; width: auto">
<b>Neues Leckerwissen hinzufügen:</b>
    <form method="POST">
        <label for="bezeichnung" style="color: black;font-size: 13px;">
          Bezeichnung:
            <input type="text" name="title" size="20" max="200">
        </label>
        <br>
        <label for="link" style="color: black; font-size: 13px;">
          Link:
            <input type="url" name="link" style="margin-left: 47px;"
            size="20" max="200">
        </label><br>
        <span style="font-size: 13px; margin-right: 52px"><b>
          Art:</b></span>
        <select name="type" size="1">
            <?php foreach($types as $t) { ?>
                <option value="<?=e($t["name"])?>"><?= e($t["desc"]) ?>
                </option>
            <?php } ?>
        </select>
        </span>
        <br>
        <span style="font-size: 13px; margin-right: 13px"><b>
          Kategorie:</b></span>
                <select name="category" size="1">
                    <?php foreach($categories as $c) { ?>
                        <option value="<?=e($c->name)?>">
                          <?=e($c->title)?></option>
                    <?php } ?>
                </select>
        </span>



        <br><input type="submit" value="Hinzufügen"
        style="background-color: green; font-size: 12px">
        <!--<input type="button" value="Letzten Eintrag löschen" style="background-color: #52150D; font-size: 12px" onClick="()"> -->
    </form></div>
<?php include "include/footer.php"?>
