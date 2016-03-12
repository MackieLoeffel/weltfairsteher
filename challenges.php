<?php include "include/header.php";
?>


<span style="width: auto; height: auto; margin-left: 35%; margin-right: auto; margin-bottom: 30px; background-color: yellow; color: black;">
  Die Challenges sind noch nicht vollzählig.</span>
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


    <div class="<?= e($row->category) ?> challenge-points" >
        <b style="font-family: Titillium Web;"><?= e($row->points)?></b>
    </div>
    <b><u><a class="<?= $classes ?> challenge-title"
             onclick="return toggleMe('challenge-<?=e($row->id)?>')"
             href="javascript:void(0)"
             style="font-family: Titillium Web;"><?=e($row->name)?></a></u></b><br>
    <div style="display:none;" class="dbox" id="challenge-<?=e($row->id)?>">
        <?= e($row->description) ?>
        <br>
        <?php if($row->author) { ?>
            <div style="color: black; font-family: Titillium Web;">Von:<b><?=e($row->author)?></b></div>
        <?php
        }
        // pdfs
        if(file_exists(getPDFPath($row->id, PUPIL_PDF))) {?>
            <div>
                <a href="#" onclick="downloadPDF(<?= e($row->id)?>, '<?=e(PUPIL_PDF)?>')" style="color: black; font-family: Titillium Web;"><b>Download:</b> Materialdatei [PDF]</a>
            </div>
        <?php
        }
        if(isLoggedIn() && file_exists(getPDFPath($row->id, TEACHER_PDF))) {?>
            <div>
                <a href="#" onclick="downloadPDF(<?= e($row->id)?>, '<?=e(TEACHER_PDF)?>')" style="color: black; font-family: Titillium Web;"><b>Download:</b> Hinweise für Lehrkraft [PDF]</a>
            </div>
        <?php } ?>
    </div>
    <?php if(isLoggedIn()) {?>
        <div class="solve-link <?= $classes ?>" >
            <a href="#" onclick="callApi('solveChallenge', {'class': selectedClass, 'challenge': <?= e($row->id)?>})" style="color: black; font-family: Titillium Web;">Challenge abschließen!</a>
        </div>


    <?php } ?>
    <br><br>
<?php } ?>

<br>
<br>
<div class="container" style="width: 100%; margin-right: 1%;">
    <?php
$challengeStmt = $db->prepare("SELECT c.id, c.name, c.description, c.points, c.category, cl.name AS author
FROM challenge as c
LEFT JOIN class as cl ON cl.id = c.author
WHERE category=:category");

    $i = 0;
    define("NUM_COLS", 3);
    foreach($categories as $c) {
        if($i % NUM_COLS == 0 ) { ?>
        <div class="row">
    <?php } ?>
    <div class="col-xs-12 col-md-4 col-lg-4">
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
    Selfmade-Challenges
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
    <div class="col-xs-12 col-md-4 col-lg-4">
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
<?php include "include/footer.php" ?>
