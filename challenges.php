<?php include "include/header.php";

function printChallenge($row) {
    global $db;
    # finc classes for challenge
    $classStmt = $db->prepare("SELECT cl.id FROM challenge as c
JOIN solved_challenge as sc ON c.id=sc.challenge
JOIN class as cl ON cl.id = sc.class
WHERE c.id = :id");
    $classStmt->execute(['id' => $row->id]);
?>
    <div class="<?= e($row->category) ?> challenge-points">
        <b><?= e($row->points)?></b>
    </div>
    <b><u><a class="<?php
                    foreach($classStmt->fetchAll(PDO::FETCH_OBJ) as $classRow) {
                        echo "class-" . $classRow->id;
                    }
                    ?>
                    challenge-title"
             onclick="return toggleMe('challenge-<?=e($row->id)?>')"
             href="javascript:void(0)" ><?=e($row->name)?></a></u></b><br>
    <div style="display:none;" class="dbox" id="challenge-<?=e($row->id)?>">
        <?= e($row->description) ?>
        <br>
        <?php if($row->author) { ?>
            <div style="color: black;">Von:<b><?=e($row->author)?></b></div>
        <?php } ?>
    </div><br><br>
<?php
}

?>

<br>
<br>

<?php
foreach($categories as $c) {
?>
    <div class=".abstand challenge-header <?= e($c->name) ?>">
        <?= e($c->title) ?>
    </div>
<?php
}
// TODO: error handling
$challengeStmt = $db->prepare("SELECT c.id, c.name, c.description, c.points, c.category, cl.name AS author
FROM challenge as c
LEFT JOIN class as cl ON cl.id = c.author
WHERE category=:category");
foreach($categories as $c) {
?>
    <div class=".abstand challenge-box">
        <?php
        $challengeStmt->execute(['category' => $c->name]);
        foreach($challengeStmt->fetchAll(PDO::FETCH_OBJ) as $row) {
            printChallenge($row);
        }
        ?>
    </div>
<?php } ?>


<div class="selfmade-whole">
    Selfmade-Challenges
</div>
<div class="selfmade-box">
    <?php
    // create as many columns as categories
    $cols = [];
    foreach($categories as $c) {
        array_push($cols, []);
    }

    $challengeStmt->execute(['category' => "selfmade"]);

    // try to fill the columns as equal as possible
    $index = 0;
    foreach($challengeStmt->fetchAll(PDO::FETCH_OBJ) as $row) {
        array_push($cols[$index], $row);
        $index = ($index + 1) % count($cols);
    }

    foreach($cols as $col) {
    ?>
        <div class=".abstand selfmade-col">
            <?php
            foreach($col as $row) {
                printChallenge($row);
            }
            ?>
        </div>
    <?php } ?>
</div>

<?php include "include/footer.php"?>
