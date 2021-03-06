<?php include "include/header.php";
?>
<script src="js/challenges.js"></script>

  <section  class="sectionbgc" style="background-color: #F2F2DA;">
<!--
<div  style="
margin-left: 1%;
float: left;
width: 100%;
margin-left: 0%;
margin-top: -15px;
margin-right: 0%;
margin-bottom: 5px;
">


   <img src="challenge-banner.png" tag="world" width="100%" alt="world"
 height="auto">



        </div>
      -->


<!--
<div  style="font-size: 15.5pt;  align: center; width: 100%; z-index: 9999; margin-top: 20px;">
    <a href="#foodaa" style="color: white; margin-left: 5px;"><img src="symbols/symbol-food2.png" alt="Ernährung" title="Ernährung" width="70px" class="sonnenblume"></a>
    <a href="#wateraa" style="color: white; margin-left: 5px; "><img src="symbols/symbol-water2.png" alt="Wasser&Ressourcen" title="Wasser&Ressourcen" width="70px" class="sonnenblume"></a>
    <a href="#cultureaa" style="color: white; margin-left: 5px"><img src="symbols/symbol-culture2.png" alt="Soziale Verantwortung" title="Soziale Verantwortung" width="70px" class="sonnenblume"></a>
    <a href="#climate-changeaa" style="color: white; margin-left: 13px"><img src="symbols/symbol-climate-change2.png" alt="Klimawandel" title="Klimawandel" width="70px" class="sonnenblume"></a>
    <a href="#productionaa" style="color: white; margin-left: 17px"><img src="symbols/symbol-production2.png" alt="Produktion&Konsum" title="Produktion&Konsum" width="70px" class="sonnenblume"></a>
    <a href="#energyaa" style="color: white; margin-left: 16px"><img src="symbols/symbol-energy2.png" alt="Energie&Mobilität" title="Energie&Mobilität" width="70px" class="sonnenblume"></a>
    <a href="#selfmadeaa"  title="Entwickelt eigene Challenges und lasst sie von der Lehrkraft vorschlagen - auch unabhängig von den Kategorien."
       style="margin-left: 5px"><img src="symbols/symbol-selfmade2.png" alt="Eigenkreationen" title="Eigenkreationen" width="70px" class="sonnenblume"></a>
    <span><a href="/challenge-all.zip" class="indexlink" style="color: white; background-color: #E84B82; margin-left: 20px;">
        <span data-title="Alle PDF´s ↓">Alle PDF´s ↓</span></a></span>

</div>

     <img src="weihnachts-challenges-banner.png" tag="x-mas" width="100%" alt="weihnachts-challenges"
     height="auto">
   -->

<section style="position: fixed; width: 10%; z-index: 9999; margin-left: 10px;" class="challenge_sidebar">

<br>
<div class="icon-container">
  <!--  <span>Wechsle zwischen den Kategorien
  </span>  -->

      <p><a href="#foodaa">
        <img src="symbols/Icons/symbol-food.png" alt="Ernährung" title="Ernährung" width="60px" class="sonnenblume"></a><br>
      </p>
      <p><a href="#wateraa">
        <img src="symbols/Icons/symbol-water.png" alt="Wasser&Ressourcen" title="Wasser&Ressourcen" width="60px" style="margin-top: 5px;" class="sonnenblume"></a><br>
      </p>
      <p><a href="#cultureaa">
        <img src="symbols/Icons/symbol-culture.png" alt="Soziale Verantwortung" title="Soziale Verantwortung" width="60px" style="margin-top: 5px;" class="sonnenblume"></a><br>
      </p>
      <p><a href="#climate-changeaa">
        <img src="symbols/Icons/symbol-climate-change.png" alt="Klimawandel" title="Klimawandel" width="60px" style="margin-top: 5px;" class="sonnenblume"></a><br>
      </p>
      <p><a href="#productionaa">
        <img src="symbols/Icons/symbol-production.png" alt="Produktion&Konsum" title="Produktion&Konsum" width="60px" style="margin-top: 5px;" class="sonnenblume"></a><br>
      </p>
      <p><a href="#energyaa">
        <img src="symbols/Icons/symbol-energy.png" alt="Energie&Mobilität" title="Energie&Mobilität" width="60px" style="margin-top: 5px;" class="sonnenblume"></a><br>
      </p>
      <p><a href="#selfmadeaa"  title="Entwickelt eigene Challenges und lasst sie von der Lehrkraft vorschlagen - auch unabhängig von den Kategorien.">
         <img src="symbols/Icons/symbol-selfmade.png" alt="Eigenkreationen" title="Eigenkreationen" width="60px" style="margin-top: 5px;" class="sonnenblume"></a><br>
      </p>
      <br><span><a href="/challenge-all.zip" class="indexlink" style="color: white; background-color: #E84B82; font-size: 15pt; margin-left: 5px; margin-top: 30px;">
          <span data-title="speichern">Alle PDF</span></a></span>
          <br>
          <br>
          <form method="POST">
              <select id="class-select" name="klasse" size="1" style="color: black; margin-left: -65px; font-size: 12pt;">
                  <option value="default">Wähle eine Klasse</option>
                  <?php
                  $classStmt = $db->prepare("SELECT id, name FROM class");
                  $classStmt->execute();
                  foreach($classStmt->fetchAll(PDO::FETCH_OBJ) as $row) {
                  ?>
                      <option value="<?= e($row->id) ?>"><?= e($row->name) ?></option>
                  <?php } ?>
              </select>
          </form>

</div>


</section>

<section style="position: static; width: 90%; margin-left: 10%;">

<script type="text/javascript">
 function openDiv(id) {
     document.getElementById(id).hidden = false;
 }
</script>

<?php
function printChallenge($row) {
    global $db;
    # finc classes for challenge
    $classStmt = $db->prepare("SELECT cl.id FROM challenge as c
JOIN solved_challenge as sc ON c.id=sc.challenge
JOIN class as cl ON cl.id = sc.class
WHERE c.id = :id");

    $challengeImage = "challenge-bilder/challenge-" . $row->id . ".png";
    if (!file_exists($challengeImage)) {
        $challengeImage = "challenge-bilder/challenge-fallback.jpg";
    }

    $classStmt->execute(['id' => $row->id]);
    $classes = "";
    foreach($classStmt->fetchAll(PDO::FETCH_OBJ) as $classRow) {
        $classes = $classes . " class-" . e($classRow->id);
    }
?>

<script>window.flower_values[ <?= e($row->id) ?> ] = {
     count: <?= e($row->flower_count) ?>,
     sum: <?= e($row->flower_sum) ?>,
 }</script>

<div class="<?= e($row->category) ?>" style="height: 240px; width: 15px; float: left; z-index: 7; position: absolute;"></div>

<a href="javascript:void(0)" >
    <img src="<?=e($challengeImage)?>" onClick="javascript:openDiv ('challenge-overlay-<?=e($row->id)?>')"  tag="challenge-1" width="97%" alt="world" height="240px" style="position: relative;  z-index: 5; margin-left: 15px; margin-bottom: 25px;">
  </img>
</a>

<div id="challenge-overlay-<?=e($row->id)?>" hidden="true" >
    <img src="challenge-bilder/challenge-bild-overlay2.png" alt="challenge-inhalt-background" class="overlay-width" style="position: absolute; height: 240px; z-index: 6; margin-top: -5px; max-width: 97%;"></img>

  <div style="width: 97%; height: 260px; margin-top: -260px; position: relative; z-index: 8;">
      <div style="display: inline; float: left; height: 25x; margin-left: 35px; marign-top: 5px;">
          <?php
          for($i = 0; $i < 5; $i++) {
          ?>
          <img id="sonnenblume-<?= e($row->id)?>-<?= e($i) ?>"
               src="sonnenblume-bewertung-grau.png"
               class="sonnenblume sonnenblume-<?= e($row->id)?>"
               tag="bewertung"
               title="Gib eine Bewertung ab"
               width="25px" alt="Bewertung" height="auto" style="display:inline;"
               onclick="rateChallenge(<?= e($row->id)?>, <?= e($i + 1) ?>)"></img>
          <?php } ?>
      </div>

      <div style="display: inline; float: right;  margin-top: 5px; margin-right: 25px;">
          <div class="<?= e($row->category) ?> challenge-points" >
              <span title="Punktzahl"><b style="font-family: Titillium Web; display:inline;"><?= e($row->points)?></b></span>
          </div>

     <?php if($row->extrapoints) { ?>
         <div title="Extrapunkte für Zusatzaufgabe" class="<?= e($row->category) ?> challenge-points" style="display: inline; margin-top: -5px; float: right; margin-right: -31px;">
             <?php
             echo "+" . e($row->extrapoints);?>
         </div>
     <?php }?>

    <?php if($row->extrapoints) { ?>
        <div class=" challenge-location" >
            <img src="symbols/<?= e($row->location) ?>.png"
                 alt="<?= e($row->location)?>"
                 height="30px" width="30px"
                 title="<?= e($row->location)?>"
                 style="display: inline; margin-top: -5px; margin-left: -10px;">
        </div><br><br>
    <?php }
    else {
    ?>
        <img src="symbols/<?= e($row->location) ?>.png"
             alt="<?= e($row->location)?>"
             height="30px" width="30px"
             title="<?= e($row->location)?>"
             style="display: inline; margin-top: -5px; "></img><br><br>
    <?php } ?>
      </div>


      <div class="dbox" style="color: white; font-size: 12pt; clear: right; text-align: center; font-family: Verdana;  margin-left: 25px; position: relative; max-height: 45%; overflow: auto;">
          <?= e($row->description) ?>
      </div>

      <div class="dbox" style="color: white; font-size: 12pt; clear: right; text-align: center; font-family: Verdana;  margin-left: 25px; position: relative;">
          <div style="z-index: 15; margin-bottom: 5px;">

              <?php if($row->author) { ?>
                  <div style="color: white; font-family: Titillium Web;">Von: <b><?=e($row->author)?></b></div>
              <?php
              }
              // pdfs
              if(file_exists(getPDFPath($row->id, PUPIL_PDF))) {?>

                  <br>  <span><a href="#" class="indexlinkB" onclick="downloadPDF(<?= e($row->id)?>, '<?=e(PUPIL_PDF)?>')" style="display: inline; color: white; float: left; margin-left: 10px; font-family: Titillium Web; font-size: 13px;   background-color: black"><span data-title="Mehr Infos zum Download"><b>Beschreibung [PDF]</b> </span></a></span>

              <?php
              }
              if(isLoggedIn() && file_exists(getPDFPath($row->id, TEACHER_PDF))) {?>
                  <span><a href="#" class="indexlinkB" onclick="downloadPDF(<?= e($row->id)?>, '<?=e(TEACHER_PDF)?>')" style="display: inline; color: white; float: left; margin-left: -10px; font-family: Titillium Web; font-size: 13px;  background-color: black"><span data-title="für Lehrkräfte"><b>Beschreibung [PDF]</b></span></a></span>
              <?php } ?>
          </div>
          <?php if(isLoggedIn()) {?>
              <div class="solve-link <?= $classes ?>" >
                  <span>  <a href="#" class="indexlinkG" onclick="if(classNames[selectedClass] && confirm('Challenge \'<?=e($row->name)?>\' für Klasse \'' + classNames[selectedClass] + '\' abschließen (keine Extrapunkte)?'))callApi('solveChallenge', {'class': selectedClass, 'challenge': <?= e($row->id)?>})"
                             style="display: inline; color: white; float: left; font-family: Titillium Web; margin-left: 15px; margin-top: -5px; background-color: #44B365; font-size: 10pt;">
                      <span data-title="ohne Extrapunkte">Abschließen ✔</span></a>
                  </span>  </div>
      <?php } ?>


<!--
      <span><a href="#" class="indexlinkB" style="display: inline; color: white; font-family: Titillium Web; font-size: 13px; background-color: black; margin-top: -5px; float: right;">
          <span data-title="einblenden"><b>Kommentare</b> </span></a></span>

        -->

        </div>
  </div>
</div>

<div class=" " style="float: right; color: white; text-align: right; font-size: 16pt; font-family: Lobster; position: absolute;
  margin-top: -55px; height: 30px;  width: 95%; margin-right: 25px; z-index: 9; margin-bottom: 25px;"><?=e($row->name)?>&nbsp;&nbsp;
</div>
<!--
<img class="<?= e($classes) ?> challenge-class" alt="erfolgreich absolviert" title="erfolgreich absolviert"
src="symbols/haken.png" style="position: absolute; margin-top: 5px; margin-left: -35px; z-index: 99; width: 50px; height: 50px;"></img>
-->
<!--
<div style="margin-top: 2px; margin-bottom: 1px; color: #828282; background-color: #DEDEDE; height: 150px;">

//Kommentare (hover: Datum des Kommentars)
Bsp.: Tolle Challenge! Funktioniert am besten in 2er-Teams. Grüße aus dem Spessart!


</div>
<input type="text" size="33" maxlength="400" name="kommentar" style="display:inline; font-size: 9pt;" value="Kommentieren (Login erforderlich)" />
<input type="button" name="kommentarAbsenden" style="display:inline; background-color: green; color: white;" value="Hinzufügen" />

-->

<?php } ?>

<br>
<br>
<div class="container" style="width: 100%; margin-right: 1%;">
    <?php
$challengeStmt = $db->prepare("SELECT c.id, c.name, c.description, c.points, c.category, c.location, c.extrapoints, c.flower_count, c.flower_sum, cl.name AS author
FROM challenge as c
LEFT JOIN class as cl ON cl.id = c.author
WHERE category=:category");

    $i = 0;
    define("NUM_COLS", 1);
    foreach($categories as $c) { ?>

          <div id="<?= e($c->name) ?>aa" class="challenge-header <?= e($c->name) ?>" style="width: 100%; height:30px; margin-left: -0.1%; font-size: 18pt; font-family: Amaranth;">
          <?= e($c->title) ?>
          </div>

          <?php    if($i % NUM_COLS == 0 ) {?>
    <div class="row">
<?php } ?>



            <?php
              $challengeStmt->execute(['category' => $c->name]);
              foreach($challengeStmt->fetchAll(PDO::FETCH_OBJ) as $row) {
                ?>
                <div class="col-xs-12 col-md-6 col-lg-6">
                  <?php
                  printChallenge($row);
            ?>
            </div>
          <?php  }
              ?>



    <?php
    if($i % NUM_COLS == NUM_COLS-1 || $i == count($row)-1) { ?>
    </div>
    <?php
    }
    $i++;
    } ?>
</div>


  <span title="Entwickelt eigene Challenges und lasst sie von der Lehrkraft vorschlagen - auch unabhängig von den Kategorien.">
    <div id="selfmadeaa" class="challenge-header" style="width: 97%; margin-left: 1.5%; background-color: white; color: black; height:30px; font-size: 18pt; font-family: Amaranth;">
  Eigenkreationen
  </div>
</span>
<div >
  <div class="container" style="width: 100%; margin-right: 1%;">

    <?php
      define("NUM_COLS2", 2);

    $challengeStmt->execute(['category' => "selfmade"]);

    $i = 0;

    $cols = $challengeStmt->fetchAll(PDO::FETCH_OBJ);
    foreach($cols as $col) {
        if($i % NUM_COLS2 == 0 ) {
    ?>
        <div class="row">
    <?php } ?>
    <div class="col-xs-12 col-md-6 col-lg-6">
        <div >
            <?php
            printChallenge($col);
            ?>
        </div>
    </div>
    <?php
    if($i % NUM_COLS2 == NUM_COLS2-1 || $i == count($cols)-1) { ?>
        </div>
    <?php
    }
    $i++;
    }
  ?>



  </div>
</div>


</div>
<br>
<br>
<br>
<br>

</section>
</section>

<?php include "include/footer.php" ?>
