<?php include "include/header.php"?>

<br>
<br>
<div class="container" style="width: 98%; margin-right: 1%;">


<div class="row">
   <div  class="col-xs-12 col-lg-4" style="height: 180px;
background-color: #1BAB3F;
margin-left: 2%;
   margin-top: 20px;
width: 30%;
   margin-bottom: 5px;


   color: black;
   ">
   <a href="/CHANGEeV_Booklet_der_Alternativen.pdf"
   target="_blank"><b style="color: black; margin-top: 12px;  font-size: 10px;">Kostenloser Download - <i style="color: white;  font-size: 10px;">Booklet der Alternativen</i><br>
   </b></a>
    <a href="/CHANGEeV_Booklet_der_Alternativen.pdf"
    target="_blank">
      <img src="Booklet-der-Alternativen.jpg" tag="booklet" width="100%" style="margin-top: 1px;" alt="Booklet der Alternativen"
    height="auto">
      </a>

           </div>
<br>

<div class="col-xs-12 col-lg-8" style="background-color:#1BAB3F; margin-top 25px; width: 63%;
margin-right: 2%; float: right; height: auto; font-size: 15px; color: white; padding: 10px;">
<b style="font-size: 18px; float: left;">Neues Leckerwissen hinzufügen</b>	&#x2003;&#x2003;

<a href="javascript:void(0)" onclick="return toggleMe('addLeckerwissen')" style="background-color: white; margin-top: 10px;
 border: 2px solid white; border-radius: 30px;"

><i class="fa fa-arrow-down"></i></a><br>






<form id="addLeckerwissen" action="javascript:void(0);" onsubmit="sendForm(this)" style="float: left; width: 100%; display:none;">
        <label for="bezeichnung" style="color: white; font-size: 13px;">
          Bezeichnung:<br>
            <input type="text" name="title" size="20" max="200" style="color: black;">
        </label>
        <span style="font-size: 13px; float: right;"><b style="float: right;">
          Art:</b><br>
        <select name="type" size="1" style="color: black;">
            <?php foreach($leckerwissenTypes as $t) { ?>
                <option value="<?=e($t["name"])?>"><?= e($t["desc"]) ?>
                </option>
            <?php } ?>
        </select></span>


        <br>
        <label for="link" style="color: white; font-size: 13px;">
          Link:<br>
            <input type="url" name="link"
            size="20" max="200"  style="color: black;">
        </label>

        <span style="font-size: 13px; float: right;"><b style="float: right;">
          Kategorie:</b><br>
                <select name="category" size="1" style="color: black;">
                    <?php foreach($categories as $c) { ?>
                        <option value="<?=e($c->name)?>">
                          <?=e($c->title)?></option>
                    <?php } ?>
                </select>
        </span><br><br>


            <img style="float: left;" src="captcha/captcha.php" alt="Captcha"
            title="Captcha - Bitte Zeichen in das Feld eingeben" width=140 height=40 />
    <input style="color: black;" type="text" name="captcha_code" size=10 />
<br>

    <b style="color: black; font-size: 11px; float: left; width: 75%; height: auto;">
      Bitte gib den angezeigten Code in das daneben stehende Feld ein,
      damit wir wissen, ob du ein Mensch bist.</b>
    <input type="submit" value="Hinzufügen"
    style="background-color: green; font-size: 12px;  float: right; width: auto;">
    <!--<input type="button" value="Letzten Eintrag löschen" style="background-color: #52150D; font-size: 12px" onClick="()"> -->
  </form>


<span style="font-size: 12px; color: black; text-align: justify; float: right; font-family: Titillium Web; margin-top: 10px;">
  Hier könnt ihr Links zu Artikel, Videos oder Sonstigem posten, die zum Thema <i>Nachhaltigkeit</i> passen. Öffnet dazu das Eingabefeld,
  indem ihr auf den Pfeil klickt.
  Bitte achtet darauf, <b>Werbung zu vermeiden</b>. Unpassende oder unangemessene Einträge sowie offensichtliche Werbung für konkrete Produkte oder
  Unternehmen werden unangekündigt entfernt.
  </span>

    </div>
</div>

<?php
array_push($categories, new Category("other", "Weiteres"));
$leckerStmt = $db->prepare("SELECT link, title FROM leckerwissen
WHERE category = :category AND type = :type");

$i = 0;
foreach($categories as $c) {
     if($i % 3 == 0 ) { ?>
    <div class="row">
      <?php } ?>

    <div class="col-xs-12 col-md-4 col-lg-4">
        <div class="leckerwissen-header <?= e($c->name) ?>"><?= e($c->title) ?></div>

        <div class="leckerwissen-box" style="padding: 1%;">
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
    </div>
    <?php
    if($i % 3 == 2 || $i == count($categories)-1) { ?>
    </div>
    <?php }
    $i++;
    }
?>
</div>

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
