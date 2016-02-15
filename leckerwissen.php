<?php include "include/header.php"?>

<br>
<br>
<?php
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
        foreach($leckerwissenTypes as $t) {
            $leckerStmt->execute(["category" => $c->name,
                                  "type" => $t["name"]]);

            if($first) {
                $first = false;
            } else {
                echo "<br>";
            }
        ?>
        <b><?= e($t["desc"]) ?></b><br>
        <?php foreach($leckerStmt->fetchAll(PDO::FETCH_OBJ) as $entry) {?>
            <a href="<?= e($entry->link) ?>" target="_blank">
                <font color="#00301B"><?= e($entry->title) ?></font>
            </a><br>
        <?php } ?>
<?php } ?>
    </div>
<?php } ?>

<!--
     BOOKLET DER ALTERNATIVEN DOWNLOAD
   -->

   <div style="float: left;
   margin-left: 7px; ">
    <a href="http://localhost/weltfairsteher/CHANGEeV_Booklet_der_Alternativen.pdf"
    target="_blank">
      <img src="Booklet-der-Alternativen.jpg" tag="booklet" alt="Booklet der Alternativen" width="18%" height="auto">
      </a>
   <div style="background-color:#1BAB3F; font-size: 17px; color: black; width: 18%; text-align: center; ">
     <a href="http://localhost/weltfairsteher/CHANGEeV_Booklet_der_Alternativen.pdf"
     target="_blank"><b style="color: white;"><i>Booklet der Alternativen</i><br></b>
     <b style="font-size: 15px; color: black; ">
      hier kostenlos herunterladen!</b></a>
           </div>
</div>

<!--
     ADD NEW LECKERWISSEN


to discuss:
- captcha einfuegen, um vor spam zu schuetzen
- leckerwissen vor dem hinzufuegen ueberpruefen, also an uns schicken, um sie
freizuschalten

to do:
hinweise entschaerfen, sodass schueler keine hemmnisse haben, leckerwissen
einzutragen

   -->


<div style="float: right; background-color:#1BAB3F;
font-size: 15px; margin-right: 15%; color: white; width: 50%; padding: 10px; position: relative;">
<b style="font-size: 18px;">Neues Leckerwissen hinzufügen:</b><br>

<span style="float: right; font-size: 11px; color: black; text-align: justify;">Bitte fügt nur thematisch passende Einträge ins Leckerwissen - Werbung, also
  Links zu Produkten oder Händlern, soll nicht ins Leckerwissen. Unpassende Einträge wird das Team
  von WeltFAIRsteher unankündigt und ohne offizielle Stellungnahme entfernen.
</span><br><br>
<form id="addLeckerwissen" action="javascript:void(0);" onsubmit="sendForm(this)" style="float: left;">
        <label for="bezeichnung" style="color: white; font-size: 13px;">
        <br>  Bezeichnung:
            <input type="text" name="title" size="20" max="200">
        </label>
        <br>
        <label for="link" style="color: white; font-size: 13px;">
          Link:
            <input type="url" name="link" style="margin-left: 47px;"
            size="20" max="200">
        </label><br>
        <span style="font-size: 13px; margin-right: 52px"><b>
          Art:</b></span>
        <select name="type" size="1">
            <?php foreach($leckerwissenTypes as $t) { ?>
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



        <input type="submit" value="Hinzufügen"
        style="background-color: green; font-size: 12px; float: right; width: 50px;">
        <!--<input type="button" value="Letzten Eintrag löschen" style="background-color: #52150D; font-size: 12px" onClick="()"> -->
    </form></div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

<?php include "include/footer.php"?>
