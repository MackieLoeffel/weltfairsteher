<?php include "include/header.php";
?>

<div  style="
margin-left: 1%;
float: left;
width: 100%;
margin-left: 0%;
margin-top: -15px;
margin-right: 0%;
margin-bottom: 5px;
">


  <section  class="sectionbg" >
   <img src="challenge-banner.png" tag="world" width="100%" alt="world"
 height="auto">


<!--
 <img src="weihnachts-challenges-banner.png" tag="x-mas" width="100%" alt="weihnachts-challenges"
height="auto">
-->
        </div>
        <!--
        NEW CHALLENGE-Navigation
        -->


        <span style="width: 100%; font-size: 15.5pt;">
        <a href="#food" class="indexlink" style="color: white; margin-left: 1%; background-color: #FCC156;"><span data-title="Ernährung">Ernährung</span></a>
        <a href="#water" class="indexlink" style="color: white; background-color: #3A7EFC; margin-left: -0.3%"><span data-title="Wasser&Ressourcen">Wasser&Ressourcen</span></a>
        <a href="#culture" class="indexlink" style="color: white; background-color: #7761C5;margin-left: -0.3%"><span data-title="Soziale Verantwortung">Soziale Verantwortung</span></a>
        <a href="#climate-change" class="indexlink" style="color: white; background-color: #1B5A0A; margin-left: -0.3%"><span data-title="Klimawandel">Klimawandel</span></a>
        <a href="#production" class="indexlink" style="color: white; background-color: #CC4321; margin-left: -0.3%"><span data-title="Produktion&Konsum">Produktion&Konsum</span></a>
        <a href="#energy" class="indexlink" style="color: white; background-color: #10B3B3; margin-left: -0.3%"><span data-title="Energie&Mobilität">Energie&Mobilität</span></a>
        <a href="#selfmade" class="indexlink" title="Entwickelt eigene Challenges und lasst sie von der Lehrkraft vorschlagen - auch unabhängig von den Kategorien."
         style="color: black; background-color: white; margin-left: -0.3%"><span data-title="Eigenkreationen">Eigenkreationen</span></a>
        <span><a href="/challenge-all.zip" class="indexlink" style="color: white; background-color: #E84B82;">
          <span data-title="Alle PDF´s ↓">Alle PDF´s ↓</span></a></span>


        </span>


        <br><br>
        <br>
        <br>
        <br>




<div class="container" style="width: 100%; margin-right: 1%;">

<?php
function printChallenge($row) {
    global $db;
    # finc classes for challenge
    $classStmt = $db->prepare("SELECT cl.id FROM challenge as c
JOIN solved_challenge as sc ON c.id=sc.challenge
JOIN class as cl ON cl.id = sc.class
WHERE c.id = :id");

    $classStmt->execute(['id' => $row->id]);
    $classes = "";
    foreach($classStmt->fetchAll(PDO::FETCH_OBJ) as $classRow) {
        $classes = $classes . " class-" . e($classRow->id);
    }
?>






<div class="col-xs-12 col-md-6 col-lg-6" style="background-color: #1BAB3F; margin-top: 10px; height: 240px;">
  <!--
  element in der Farbe der Kategorie - außerdem: erste Challenge einer Kategorie empfängt den Link der Kategorie-Navigation
  bilder: 430x240px
  -->
<div class="<?= e($row->category) ?>" style="height: 240px; width: 15px; margin-left: -15px; float: left; z-index: 1;"></div>
<!--
challenge-bild
-->
<a href="javascript:void(0)" onclick="readOn('info', this);"><img src="challenge-1.jpg" tag="challenge-1" width="auto" alt="world" height="240px" ></img></a>
<div class="<?= $classes ?> challenge-title greenindexlink" style="color: black; font-size: 16pt; font-family: Lobster; position: relative;
  margin-bottom: -30px; height: 30px; background-color: #FFEDD6; width: 100%; z-index: 9"><?=e($row->name)?>
</div>


<div id="info" style="background-color: #1BAB3F; height: 240px; display:none;">

<div style="display: inline; float: right;  margin-top: 5px; margin-right: 40px;">
    <div class="<?= e($row->category) ?> challenge-points" >
          <span title="Punktzahl"><b style="font-family: Titillium Web; display:inline;"><?= e($row->points)?></b></span>
      </div>


 <?php if($row->extrapoints) { ?>
  <div title="Extrapunkte für Zusatzaufgabe" class="<?= e($row->category) ?> challenge-points" style="display: inline; text-align: center; margin-top: -5px;">
<?php
   echo "+" . e($row->extrapoints);?>
</div>
<?php }?>


<?php if($row->extrapoints) { ?>
<div class=" challenge-location" >
    <img src="symbols/<?= e($row->location) ?>.png" alt="<?= e($row->location)?>" height="30px" width="30px" title="Für Zuhause"
    style="display: inline; margin-top: -10px; margin-left: 10px;">
</div>
<?php }
else {
?>
<img src="symbols/<?= e($row->location) ?>.png" alt="<?= e($row->location)?>" height="30px" width="30px" title="Für Zuhause"
style="display: inline; margin-top: -10px; ">
<?php } ?>

</div>
<div class="dbox" style="color: #404040; font-size: 12pt; clear: right; font-family: Verdana;">
      <?= e($row->description) ?>

<br>
<div style="position: absolute; margin-bottom: 5px;">

  <?php if($row->author) { ?>
      <div style="color: black; font-family: Titillium Web;">Von: <b><?=e($row->author)?></b></div>
  <?php
  }
  // pdfs
  if(file_exists(getPDFPath($row->id, PUPIL_PDF))) {?>

          <span><a href="#" class="indexlink" onclick="downloadPDF(<?= e($row->id)?>, '<?=e(PUPIL_PDF)?>')" style="display: inline; color: black; font-family: Titillium Web; font-size: 13px; background-color: #17A33A"><span data-title="Mehr Infos"><b>Beschreibung [PDF]</b> </span></a></span>

  <?php
  }
  if(isLoggedIn() && file_exists(getPDFPath($row->id, TEACHER_PDF))) {?>

          <span><a href="#" class="indexlink" onclick="downloadPDF(<?= e($row->id)?>, '<?=e(TEACHER_PDF)?>')" style="display: inline; color: black; font-family: Titillium Web; font-size: 13px; background-color: #17A33A"><span data-title="für Lehrkräfte"><b>Beschreibung [PDF]</b></span></a></span>

  <?php } ?>
  </div>
  <?php if(isLoggedIn()) {?>
  <div class="solve-link <?= $classes ?>" >
    <span>  <a href="#" class="indexlink" onclick="if(classNames[selectedClass] && confirm('Challenge \'<?=e($row->name)?>\' für Klasse \'' + classNames[selectedClass] + '\' abschließen (keine Extrapunkte)?'))callApi('solveChallenge', {'class': selectedClass, 'challenge': <?= e($row->id)?>})" style="display: inline; color: black; font-family: Titillium Web; margin-left: 120px; font-size: 10pt;"><span data-title="ohne Zusatzpunkte">Als bestanden markieren ✔</span></a>
</span>  </div>


  <?php } ?>

<div style="float: right;">
<img src="sonnenblume-bewertung.png" tag="bewertung" title="Gib eine Bewertung ab" width="25px" alt="Bewertung" height="auto" style="display:inline;"></img>
<img src="sonnenblume-bewertung.png" tag="bewertung" title="Gib eine Bewertung ab" width="25px" alt="Bewertung" height="auto" style="display:inline;"></img>
<img src="sonnenblume-bewertung.png" tag="bewertung" title="Gib eine Bewertung ab" width="25px" alt="Bewertung" height="auto" style="display:inline;"></img>
<img src="sonnenblume-bewertung.png" tag="bewertung" title="Gib eine Bewertung ab" width="25px" alt="Bewertung" height="auto" style="display:inline;"></img>
<img src="sonnenblume-bewertung-grau.png" tag="bewertungGrau"title="Gib eine Bewertung ab"  width="25px" alt="BewertungGrau" height="auto" style="display:inline; clear: right;"></img>
</div>
</div></div>

<!--

<div style="margin-top: 2px; margin-bottom: 1px; color: #828282; background-color: #DEDEDE; height: 150px;">

//Kommentare (hover: Datum des Kommentars)
Bsp.: Tolle Challenge! Funktioniert am besten in 2er-Teams. Grüße aus dem Spessart!


</div>
<input type="text" size="33" maxlength="400" name="kommentar" style="display:inline; font-size: 9pt;" value="Kommentieren (Login erforderlich)" />
<input type="button" name="kommentarAbsenden" style="display:inline; background-color: green; color: white;" value="Hinzufügen" />
</div>
</div>
-->

</div>






<?php } ?>







    <?php
$challengeStmt = $db->prepare("SELECT c.id, c.name, c.description, c.points, c.category, c.location, c.extrapoints, cl.name AS author
FROM challenge as c
LEFT JOIN class as cl ON cl.id = c.author
WHERE category=:category");

    $i = 0;
    define("NUM_COLS", 2);
    foreach($categories as $c) {
if($i % NUM_COLS == 0 ) { ?>

  <div id="<?= e($c->name) ?>" class="challenge-header <?= e($c->name) ?>" style="width: 100%; height:30px; margin-left: -0.1%; font-size: 18pt; font-family: Amaranth;">
      <?= e($c->title) ?>
  </div>
  <div class="row">
  <?php }

          $challengeStmt->execute(['category' => $c->name]);

          foreach($challengeStmt->fetchAll(PDO::FETCH_OBJ) as $row) {



              printChallenge($row);
              if($i % NUM_COLS == NUM_COLS-1 || $i == count($categories)-1) { ?>
              </div>
              <?php
          }
      ?>















    <?php
    $i++;
    } ?>



  <!--
  eigenkreationen: muss noch integriert werden
  $challengeStmt->execute(['category' => "selfmade"]);

-->



</div>
</div>

</div>





<!--
NEW CHALLENGE-Design

<div class="container" style="width: 100%; margin-right: 1%; margin-top: 10px; height: 180px;">
<div class="col-xs-6 col-md-3 col-lg-3" style="background-color: #1BAB3F; height: 180px;">
<div style="height: 180px; width: 15px; margin-left: -15px; background-color: #CC4321; float: left; z-index: 1;"></div>
<img src="challenge-1.jpg" tag="challenge-1" width="auto" alt="world" height="180px"></img>
</div>
<div class="col-xs-6 col-md-6 col-lg-6" style="background-color: #1BAB3F; height: 180px; position: relative;">
<div style="color: #FFEDD6; font-size: 16pt; font-family: Lobster; display: inline;">Kaffee to go again</div>
<div style="display: inline; float: right;">
<div style="background-color: #CC4321; width: 20px; height: 20px; border-radius:40px;
color: white; font-size: 13pt; display:inline;">6</div>
<div style="background-color: #CC4321; color: white; font-size: 12pt; display: inline; text-align: center; margin-left: 1px; width: 20px; height: 20px;">+2</div>
<img src="/symbols/home.png" tag="ort" width="30px;" height="auto" alt="Ort" title="Für Zuhause" style="display: inline; margin-top: -10px;"></img>
</div>
<div style="color: #404040; font-size: 12pt; clear: right; font-family: Verdana;">
Stündlich werden in Deutschland mehr als 320.000 Kaffeebecher aus Pappe und Plastik weggeworfen. Mit der Energie, die zur Produktion der Kaffeebecher nötig ist, könnte man eine Stadt mit 100.000 Einwohnern durchgehend mit Energie versorgen! Helft mit, diese Verschwendung zu reduzieren.
<div style="position: absolute; margin-bottom: 5px;">
<a style="display: inline; background-color: green; color: white; font-size: 10pt; font-family: Amaranth; onclick="downloadPDF(<?= e($row->id)?>, '<?=e(PUPIL_PDF)?>')"">Beschreibung [PDF]</a>
<p style="display: inline; background-color: green; color: white; margin-left: 10px; font-size: 10pt; font-family: Amaranth;">als bestanden markieren ✔</p>

<img src="sonnenblume-bewertung.png" tag="bewertung" title="Gib eine Bewertung ab" width="25px" alt="Bewertung" height="auto" style="display:inline;"></img>
<img src="sonnenblume-bewertung.png" tag="bewertung" title="Gib eine Bewertung ab" width="25px" alt="Bewertung" height="auto" style="display:inline;"></img>
<img src="sonnenblume-bewertung.png" tag="bewertung" title="Gib eine Bewertung ab" width="25px" alt="Bewertung" height="auto" style="display:inline;"></img>
<img src="sonnenblume-bewertung.png" tag="bewertung" title="Gib eine Bewertung ab" width="25px" alt="Bewertung" height="auto" style="display:inline;"></img>
<img src="sonnenblume-bewertung-grau.png" tag="bewertungGrau"title="Gib eine Bewertung ab"  width="25px" alt="BewertungGrau" height="auto" style="display:inline; clear: right;"></img>

</div></div>
</div>
<div class="col-xs-6 col-md-3 col-lg-3" style="background-color: #1BAB3F; height: 180px;">

<div style="margin-top: 2px; margin-bottom: 1px; color: #828282; background-color: #DEDEDE; height: 150px;">

//Kommentare (hover: Datum des Kommentars)
Bsp.: Tolle Challenge! Funktioniert am besten in 2er-Teams. Grüße aus dem Spessart!


</div>
<input type="text" size="33" maxlength="400" name="kommentar" style="display:inline; font-size: 9pt;" value="Kommentieren (Login erforderlich)" />
<input type="button" name="kommentarAbsenden" style="display:inline; background-color: green; color: white;" value="Hinzufügen" />
</div>
</div>


</div>



END of NEW CHALLENGE Design
-->










<br><br>
<br>
<br>
<br><br><br>
<br>
<br>
<br><br><br>
<br>
<br>
<br><br><br>
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
</section>
<?php include "include/footer.php" ?>
