<?php include "include/header.php";?>

<section  class="sectionbg" style="background-color: #F2F2DA;">
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

<span id="challenge-nav" style="width: 100%; font-size: 15.5pt; align: center; position: fixed; z-index: 9999; margin-top: -5px;">
    <a href="#foodaa" class="indexlink" style="color: white; margin-left: 1%; background-color: #FCC156;"><span data-title="Ernährung">Ernährung</span></a>
    <a href="#wateraa" class="indexlink" style="color: white; background-color: #3A7EFC; margin-left: -0.3%"><span data-title="Wasser&Ressourcen">Wasser&Ressourcen</span></a>
    <a href="#cultureaa" class="indexlink" style="color: white; background-color: #7761C5;margin-left: -0.3%"><span data-title="Soziale Verantwortung">Soziale Verantwortung</span></a>
    <a href="#climate-changeaa" class="indexlink" style="color: white; background-color: #1B5A0A; margin-left: -0.3%"><span data-title="Klimawandel">Klimawandel</span></a>
    <a href="#productionaa" class="indexlink" style="color: white; background-color: #CC4321; margin-left: -0.3%"><span data-title="Produktion&Konsum">Produktion&Konsum</span></a>
    <a href="#energyaa" class="indexlink" style="color: white; background-color: #10B3B3; margin-left: -0.3%"><span data-title="Energie&Mobilität">Energie&Mobilität</span></a>
    <a href="#selfmadeaa" class="indexlink" title="Entwickelt eigene Challenges und lasst sie von der Lehrkraft vorschlagen - auch unabhängig von den Kategorien."
       style="color: black; background-color: white; margin-left: -0.3%"><span data-title="Eigenkreationen">Eigenkreationen</span></a>
    <span><a href="/challenge-all.zip" class="indexlink" style="color: white; background-color: #E84B82;">
        <span data-title="Alle PDF´s ↓">Alle PDF´s ↓</span></a></span>
</span>
<!--
     <img src="weihnachts-challenges-banner.png" tag="x-mas" width="100%" alt="weihnachts-challenges"
     height="auto">
   -->
<br><br><br><br>
<div style="color: black;">Aufgrund von Wartungsarbeiten sind die Challenges kurzzeitig nicht abrufbar. Wir bitten dies zu entschuldigen.</div>
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

<div class="<?= e($row->category) ?>" style="height: 240px; width: 15px; float: left; z-index: 7; position: absolute;"></div>





  <a href="javascript:void(0)" >
    <?php if($row->picture) { ?>
  <img src="/challenge-bilder/<?=e($row->name)?>.jpg" onClick="javascript:openDiv ('<?=e($row->name)?>')"  tag="challenge-1" width="97%" alt="world" height="240px" style="position: relative;  z-index: 5; margin-left: 15px; margin-bottom: 25px;">
  </img>
  <?php }
  else {
    ?>
    <img src="challenge-1.jpg" onClick="javascript:openDiv ('<?=e($row->name)?>')"  tag="challenge-1" width="97%" alt="world" height="240px" style="position: relative;  z-index: 5; margin-left: 15px; margin-bottom: 25px;">
    </img>

 <?php } ?>
  </a>





  <div id="<?=e($row->name)?>" hidden="true" >

<img src="/challenge-bilder/challenge-bild-overlay2.png" id="<?=e($row->name)?>"
 alt="challenge-inhalt-background" style="position: absolute; width: 95%; height: 240px; z-index: 6; margin-top: -5px;"></img>

<a href="javascript:void(0)" >
    <img src="<?=e($challengeImage)?>" onClick="javascript:openDiv ('challenge-overlay-<?=e($row->id)?>')"  tag="challenge-1" width="97%" alt="world" height="240px" style="position: relative;  z-index: 5; margin-left: 15px; margin-bottom: 25px;">
  </img>
</a>

<div id="challenge-overlay-<?=e($row->id)?>" hidden="true" >
    <img src="challenge-bilder/challenge-bild-overlay2.png" alt="challenge-inhalt-background" style="position: absolute; width: 95%; height: 240px; z-index: 6; margin-top: -5px;"></img>



  <div style="width: 97%; height: 260px; margin-top: -260px; position: relative; z-index: 8;">
      <div style="display: inline; float: left; height: 25x; margin-left: 35px; marign-top: 5px;">
          <?php
          $flowers = 2.5;
          if ($row->flower_count > 0) {
              $flowers = $row->flower_sum / $row->flower_count;
          }

          for($i = 0; $i < 5; $i++) {
              if ($flowers < $i + 0.25) {
                  $flower_image = "sonnenblume-bewertung-grau.png";
              } else if($flowers < $i + 0.75) {
                  $flower_image = "sonnenblume-bewertung-halb.png";
              } else {
                  $flower_image = "sonnenblume-bewertung.png";
              }
          ?>
          <img src="<?= e($flower_image) ?>" tag="bewertung" title="Gib eine Bewertung ab" width="25px" alt="Bewertung" height="auto" style="display:inline;"
               onclick="callApi('rateChallenge', {'challenge': <?= e($row->id)?>, 'rating': <?= e($i + 1) ?>}); alert('Die Challenge wurde mit <?= e($i + 1)?> Blumen bewertet.');"></img>
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


      <div class="dbox" style="color: white; font-size: 12pt; clear: right; text-align: center; font-family: Verdana;  margin-left: 25px; position: relative; max-height: 40%; overflow: auto;">
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

                  <br>  <span><a href="#" class="indexlinkB" onclick="downloadPDF(<?= e($row->id)?>, '<?=e(PUPIL_PDF)?>')" style="display: inline; color: white; float: left; margin-left: 10px; font-family: Titillium Web; font-size: 13px;   background-color: black"><span data-title="Mehr Infos"><b>Beschreibung [PDF]</b> </span></a></span>

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

      <span><a href="#" class="indexlinkB" style="display: inline; color: white; font-family: Titillium Web; font-size: 13px; background-color: black; margin-top: -5px; float: right;">
          <span data-title="einblenden"><b>Kommentare</b> </span></a></span>
        </div>
  </div>
</div>

<div class="<?= $classes ?> challenge-title " style="color: white; float: right; text-align: right; font-size: 16pt; font-family: Lobster; position: absolute;
  margin-top: -55px; height: 30px;  width: 95%; margin-right: 25px; z-index: 9; margin-bottom: 25px;"><?=e($row->name)?>&nbsp;&nbsp;
</div>

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
    define("NUM_COLS", 2);
    foreach($categories as $c) {
        if($i % NUM_COLS == 0 ) { ?>
        <div class="row">
    <?php } ?>
    <div class="col-xs-12 col-md-12 col-lg-6">
      <div id="<?= e($c->name) ?>aa" class="challenge-header <?= e($c->name) ?>" style="width: 100%; height:30px; margin-left: -0.1%; font-size: 18pt; font-family: Amaranth;">
    <?= e($c->title) ?>
</div>

            <?php
            $challengeStmt->execute(['category' => $c->name]);
            foreach($challengeStmt->fetchAll(PDO::FETCH_OBJ) as $row) {
                printChallenge($row);
            }
            ?>

    </div>
    <?php
    if($i % NUM_COLS == NUM_COLS-1 || $i == count($categories)-1) { ?>
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
    $challengeStmt->execute(['category' => "selfmade"]);

    $i = 0;
    $cols = $challengeStmt->fetchAll(PDO::FETCH_OBJ);
    foreach($cols as $col) {
        if($i % NUM_COLS == 0 ) {
    ?>
        <div class="row">
    <?php } ?>
    <div class="col-xs-12 col-md-12 col-lg-6">
        <div >
            <?php
            printChallenge($col);
            ?>
        </div>
    </div>
    <?php
    if($i % NUM_COLS == NUM_COLS-1 || $i == count($cols)-1) { ?>
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
<?php include "include/footer.php" ?>
