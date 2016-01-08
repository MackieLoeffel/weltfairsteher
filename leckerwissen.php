<?php include "include/header.php"?>

<br>
<br>
<?php
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
    <div class=".abstand leckerwissen-header <?= $c->name ?>">
        <?= $c->title ?>
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
        <b><?= $t["desc"] ?>:</b><br>
        <?php foreach($leckerStmt->fetchAll(PDO::FETCH_OBJ) as $entry) {?>
            <a href="<?= $entry->link ?>">
                <font color="#00301B"><?= $entry->title ?></font>
            </a><br>
        <?php } ?>
<?php } ?>
    </div>
<?php } ?>

<!--
     NEUES LECKERWISSEN HINZUFUEGEN
   -->


<div style="float: left; margin-top: 15px; background-color:#1BAB3F; font-size: 15px; margin-left: 7px; color: white; width: auto"><b>Neues Leckerwissen hinzufügen:</b>



    <form method="POST">
        <label for="bezeichnung" style="color: black;font-size: 13px;">Bezeichnung:
            <input type="text" id="bezeichnung" name="bezeichnung" size="20" max="200">
        </label>
        <br>
        <label for="link" style="color: black; font-size: 13px;">Link:
            <input type="url" id="link" name="link" style="margin-left: 47px;" size="20" max="200">
        </label><br>
        <span style="font-size: 13px; margin-right: 52px"><b>Art:</b></span>
        <select name="type" size="1">
            <option id="#" value="a">Artikel</option>
            <option id="#">Video</option>
            <option id="#">Sonstiges</option>
        </select>
        </span>
        <br>
        <span style="font-size: 13px; margin-right: 13px"><b>Kategorie:</b></span>
                <select name="lwkategorie" size="1">
                    <option id="#">Ernährung</option>
                    <option id="#">Wasser&Energie</option>
                    <option id="#">Kulturelle Vielfalt</option>
                    <option id="#">Klimawandel</option>
                    <option id="#">Warenproduktion</option>
                    <option id="#">Weiteres</option>
                </select>
        </span>



            <br><input type="submit" value="Hinzufügen" style="background-color: green; font-size: 12px"><input type="button" value="Letzten Eintrag löschen" style="background-color: #52150D; font-size: 12px" onClick="()">
    </form></div>
<?php include "include/footer.php"?>
