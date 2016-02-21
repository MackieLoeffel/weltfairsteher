<?php include "include/header.php"?>

<br>
<br>
<?php
array_push($categories, new Category("other", "Weiteres"));
$leckerStmt = $db->prepare("SELECT link, title FROM leckerwissen
WHERE category = :category AND type = :type");
foreach($categories as $c) {
?>

<div class="container">
<div class="row">

    <div class="leckerwissen-header <?= e($c->name) ?>" class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
        <?= e($c->title) ?></div>

    <div class="leckerwissen-box" class="col-xs-12 col-sm-6 col-md-6 col-lg-4" style="padding: 1%;">
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
        <b style="font-family: Titillium Web;"><?= e($t["desc"]) ?></b><br>
        <?php foreach($leckerStmt->fetchAll(PDO::FETCH_OBJ) as $entry) {?>
            <a href="<?= e($entry->link) ?>" target="_blank">
                <font color="#00301B"><?= e($entry->title) ?></font>
            </a><br>
        <?php } ?>
<?php } ?>
    </div>
<?php } ?>
</div>
</div>
<?php


?>

<!--
     BOOKLET DER ALTERNATIVEN DOWNLOAD
   -->

   <div style="float: left;
   margin-left: 7px; ">
    <a href="http://localhost/weltfairsteher/CHANGEeV_Booklet_der_Alternativen.pdf"
    target="_blank">
      <img src="Booklet-der-Alternativen.jpg" tag="booklet" alt="Booklet der Alternativen" width="25%" height="auto">
      </a>
   <div style="background-color:#1BAB3F; font-size: 17px; color: black; width: 25%; text-align: center; ">
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
font-size: 15px; margin-right: 15%; color: white; width: 25%; padding: 10px; position: relative;">
<b style="font-size: 18px; text-align: center;">Neues Leckerwissen hinzufügen:</b><br>

<span style="float: right; font-size: 11px; color: black; text-align: justify; font-family: Titillium Web;">Bitte fügt nur thematisch passende Einträge ins Leckerwissen - Werbung, also
  Links zu Produkten oder Händlern, soll nicht ins Leckerwissen. Unpassende Einträge wird das Team
  von WeltFAIRsteher unankündigt und ohne offizielle Stellungnahme entfernen.
</span><br><br>
<form id="addLeckerwissen" action="javascript:void(0);" onsubmit="sendForm(this)" style="float: left;">
        <label for="bezeichnung" style="color: white; font-size: 13px;">
        <br>  Bezeichnung:<br>
            <input type="text" name="title" size="20" max="200">
        </label>
        <br>
        <label for="link" style="color: white; font-size: 13px;">
          Link:<br>
            <input type="url" name="link" style=""
            size="20" max="200">
        </label><br>
        <span style="font-size: 13px; margin-right: 52px"><b>
          Art:</b></span><br>
        <select name="type" size="1" style="color: black;">
            <?php foreach($leckerwissenTypes as $t) { ?>
                <option value="<?=e($t["name"])?>"><?= e($t["desc"]) ?>
                </option>
            <?php } ?>
        </select>
        </span>
        <br>
        <span style="font-size: 13px; margin-right: 13px"><b>
          Kategorie:</b></span><br>
                <select name="category" size="1" style="color: black;">
                    <?php foreach($categories as $c) { ?>
                        <option value="<?=e($c->name)?>">
                          <?=e($c->title)?></option>
                    <?php } ?>
                </select>
        </span>


<br>
        <input type="submit" value="Hinzufügen"
        style="background-color: green; font-size: 12px; margin-left: auto; margin-right: auto; width: auto;">
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
