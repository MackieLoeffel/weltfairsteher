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


   <img src="challenge-banner.png" tag="world" width="100%" alt="world"
 height="auto">

        </div>

        <div  style="background-color:#1BAB3F; width: 98%; margin-top: 15px;
        margin-left: 1%; height: auto; font-size: 15px; color: white; padding: 10px;">
        <b style="font-size: 18px; float: left;">

        Allgemeine Hinweise</b> 	&#x2003;&#x2003;

          <a href="javascript:void(0)" onclick="return toggleArrow(this, '#challengeinfo')" style="background-color: white; margin-top: 10px;
           border: 2px solid white; border-radius: 30px;"

          ><i class="fa fa-arrow-down"></i></a><br>
<span id="challengeinfo" style="display:none; margin-left: 2%; margin-right: 2%; font-size: 13px; font-family: Amaranth; color: black;">
  <br><br>

  <span><a href="javascript:void(0)" onclick="return toggleArrow(this, '#workflowchallenge')" class="indexlink" style="color: white; font-size: 14px; background-color: #48BD73"><span data-title="Ablauf">Ablauf</span></a></span>
  <br>
  <span id="workflowchallenge" style="display:none;">
    Auf dieser Seite findet ihr alle Challenges,
    die ihr bei WeltFAIRsteher absolvieren könnt. In welcher Reihenfolge ihr versucht, Aufgaben zu lösen, ist im Grunde egal. Ebenso könnt ihr selbst entscheiden, wie viele
   Challenges ihr in die Tat umsetzt. Am besten klären eure Klassensprecher*innen mit euren Lehrkräften, welche Challenges in euren Unterricht integriert werden können.
   Außerdem könnt ihr selbst entscheiden, welche Challenges ihr eigenständig und zuhause erledigt.
</span><br>

<span><a href="javascript:void(0)" onclick="return toggleArrow(this, '#darstellungchallenge')" class="indexlink" style="color: white; font-size: 14px; background-color: #48BD73"><span data-title="Challenge-Handling">Challenge-Handling</span></a></span>
<br>
<span id="darstellungchallenge" style="display:none;">
Wenn ihr mehr Informationen zu einer Challenge wollt, so klickt auf den Titel und lest am besten auch die dazugehörige PDF-Datei,
die ihr jeweils herunterladen könnt. Wie viel Punkte ihr für eine
bestandene Challenge bekommt, könnt ihr an der Zahl neben dem Titel ablesen. Bei einigen Challenges gibt es eine Zusatzoption, also
eine kleine Aufgabe, die auf der Challenge aufbaut und mit Extrapunkten belohnt wird. Mögliche Extrapunkte sind mit einem "+" gekennzeichnet, also etwa so: <span style="background-color: #0F9C2E; color: white;">+4</span>.
Die sechs vorgegebenen Kategorien, aus denen ihr wählen könnt, sollen "Nachhaltigkeit" übrigens nicht umfassend abbilden. Wenn ihr eine Klasse in der Navigationsleiste auswählt, so seht ihr anhand der grünen Titel, welche
Challenges diese Klasse bereits absolviert hat.</span><br>

<span><a href="javascript:void(0)" onclick="return toggleArrow(this, '#kreativchallenge')" class="indexlink" style="color: white; font-size: 14px; background-color: #48BD73"><span data-title="Eigenkreationen">Eigenkreationen</span></a></span>
<br>
<span id="kreativchallenge" style="display:none;">Euch fehlt also eine Challenge? Wenn ihr selbst eine sinnvolle Idee habt, dann entwickelt daraus doch eine Eigenkreation
und lasst sie von eurer Lehrkraft im Lehrkraft-Bereich vorschlagen. Das geht auch unabhängig von den sechs Kategorien.</span><br>


<span><a href="javascript:void(0)" onclick="return toggleArrow(this, '#allpdfchallenge')" class="indexlink" style="color: white; font-size: 14px; background-color: #48BD73;"><span data-title="Alle PDFs auf einmal">Alle PDFs auf einmal</span></a></span>
<br>
<span id="allpdfchallenge" style="display:none;">
Möchtest du alle Challenge-PDFs in einem ZIP-Dokument herunterladen? <span><a href="/challenge-all.zip" class="indexlink" style="color: white; background-color: #E84B82;">
  <span data-title="hier downloaden">hier downloaden</span></a></span>
</span><br>

<span><a href="javascript:void(0)" onclick="return toggleArrow(this, '#teacherchallenge')" class="indexlink" style="color: white; font-size: 14px; background-color: #48BD73""><span data-title="Für Lehrkräfte">Für Lehrkräfte</span></a></span>
<span id="teacherchallenge" style="display:none;"><br>
Eingeloggte Lehrkräfte können auf dieser Seite außerdem jede Challenge als <i>abgeschlossen</i> markieren. Aber Vorsicht: Wenn die Challenge mitsamt Zusatzaufgabe abgeschlossen wurde,
so muss die Lehrkraft die Challenge im Lehrkraft-Bereich als <i>abgeschlossen</i> eintragen. Nachträglich können keine Extrapunkte mehr für eine Challenge geltend gemacht werden, die bereits
eingetragen wurde.</span><br><br>

<span><a href="javascript:void(0)" onclick="return toggleArrow(this, '#symbolchallenge')" class="indexlink" style="color: white; font-size: 14px; background-color: #48BD73""><span data-title="Ortssymbol - Schule oder zuhause?">Ortssymbol - Schule oder zuhause?</span></a></span>
<br>
<span id="symbolchallenge" style="display:none;">
Die folgenden Symbole zeigen euch, wo, beziehungweise mit wem ihr eine Challenge absolviert. <br>
<br>
<div class="container" style="width: 100%;">
  <div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
<img src="symbols/school.png" alt="SCHULE" height="45px" width="45px">
<br><i><b>in der Schule, <br> aber ohne Lehrkraft</i></b><br></div>
  <div class="col-xs-4 col-sm-4 col-md-4">
<img src="symbols/teacher.png" alt="LEHRKRAFT" height="45px" width="45px"> <br><i><b>mit einer <br>Lehrkraft</b></i> <br></div>
  <div class="col-xs-4 col-sm-4 col-md-4">
<img src="symbols/home.png" alt="HAUS" height="45px" width="45px"><br> <i><b>zuhause</b></i> <br></div>
</div>
</div></span>
        </span></div>


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

<div class=" challenge-location" >
    <img src="symbols/<?= e($row->location) ?>.png" alt="<?= e($row->location)?>" height="35px" width="35px">
</div>
    <div class="<?= e($row->category) ?> challenge-points" >
        <b style="font-family: Titillium Web;"><?= e($row->points)?></b>
    </div>


    <u></b><span><a class="<?= $classes ?> challenge-title greenindexlink"
             onclick="return toggleMe('challenge-<?=e($row->id)?>')"
             href="javascript:void(0)"
             style="font-family: Lobster; font-size: 18px; background-color: #17A33A;"><span data-title="<?=e($row->name)?>"><?=e($row->name)?></span></a></span></u></b>
             <div style="font-family: Titillium Web; font-size: 11px; margin-left: 94%; margin-top: 3px; float: left; position: relative; background-color: #0F9C2E;">
               <?php if($row->extrapoints) {echo "+" . e($row->extrapoints);}?></div>

               <br>
    <div style="display:none;" class="dbox" id="challenge-<?=e($row->id)?>">
      <br>
        <?= e($row->description) ?>
        <br>
        <?php if($row->author) { ?>
            <div style="color: black; font-family: Titillium Web;">Von:<b><?=e($row->author)?></b></div>
        <?php
        }
        // pdfs
        if(file_exists(getPDFPath($row->id, PUPIL_PDF))) {?>
            <div>
                <span><a href="#" class="indexlink" onclick="downloadPDF(<?= e($row->id)?>, '<?=e(PUPIL_PDF)?>')" style="color: black; font-family: Titillium Web; font-size: 13px; background-color: #17A33A"><span data-title="Mehr Infos zur Aufgabe [PDF]"><b>Challenge-Beschreibung [PDF]</b> </span></a></span>
            </div>
        <?php
        }
        if(isLoggedIn() && file_exists(getPDFPath($row->id, TEACHER_PDF))) {?>
            <div>
                <span><a href="#" class="indexlink" onclick="downloadPDF(<?= e($row->id)?>, '<?=e(TEACHER_PDF)?>')" style="color: black; font-family: Titillium Web; font-size: 13px; background-color: #17A33A"><span data-title="Mehr Infos zur Aufgabe [PDF]"><b>Hinweise für Lehrkräfte [PDF]</b></span></a></span>
            </div>
        <?php } ?>
    </div>
    <?php if(isLoggedIn()) {?>
        <div class="solve-link <?= $classes ?>" >
            <a href="#" onclick="if(classNames[selectedClass] && confirm('Challenge \'<?=e($row->name)?>\' für Klasse \'' + classNames[selectedClass] + '\' abschließen (keine Extrapunkte)?'))callApi('solveChallenge', {'class': selectedClass, 'challenge': <?= e($row->id)?>})" style="color: black; font-family: Titillium Web;">Challenge abschließen!</a>
        </div>


    <?php } ?>
    <br><br>
<?php } ?>

<br>
<br>
<div class="container" style="width: 100%; margin-right: 1%;">
    <?php
$challengeStmt = $db->prepare("SELECT c.id, c.name, c.description, c.points, c.category, c.location, c.extrapoints, cl.name AS author
FROM challenge as c
LEFT JOIN class as cl ON cl.id = c.author
WHERE category=:category");

    $i = 0;
    define("NUM_COLS", 2);
    foreach($categories as $c) {
        if($i % NUM_COLS == 0 ) { ?>
        <div class="row">
    <?php } ?>
    <div class="col-xs-12 col-md-6 col-lg-6">
        <div class="challenge-header <?= e($c->name) ?>">
            <?= e($c->title) ?>
        </div>
        <div class="challenge-box">
            <?php
            $challengeStmt->execute(['category' => $c->name]);
            foreach($challengeStmt->fetchAll(PDO::FETCH_OBJ) as $row) {
                printChallenge($row);
            }
            ?>
        </div>
    </div>
    <?php
    if($i % NUM_COLS == NUM_COLS-1 || $i == count($categories)-1) { ?>
    </div>
    <?php
    }
    $i++;
    } ?>
</div>

<div class="selfmade-whole">
    Eigenkreationen
</div>
<div class="selfmade-box">
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
    <div class="col-xs-12 col-md-6 col-lg-6">
        <div class="challenge-box">
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

<?php include "include/footer.php" ?>
