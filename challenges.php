<?php include "header.php"?>

<br>
<br>

<?php
$categories = ["food" => 'ERNÄHRUNG',
               "energy" => "WASSER & ENERGIE",
               "culture" => "KULTURELLE VIELFALT",
               "climate-change" => "KLIMAWANDEL",
               "production" => "WARENPRODUKTION"];
foreach($categories as $category => $desc) {
?>
    <div class=".abstand challenge-header <?= $category ?>">
        <?= $desc ?>
    </div>
<?php
}
// TODO: error handling
$challengeStmt = $db->prepare("SELECT * FROM challenge WHERE category=:category");
foreach($categories as $category => $desc) {
?>
    <div class=".abstand challenge-box">

        <?php
        $challengeStmt->execute(['category' => $category]);
        foreach($challengeStmt->fetchAll(PDO::FETCH_OBJ) as $row) {
        ?>
            <div class="<?= $row->category ?> challenge-points">
                <b><?= $row->points?></b>
            </div>
            <b><u><a onclick="return toggleMe('challenge-<?=$row->id?>')" href="javascript:void(0)" style="color: white"><?=$row->name?></a></u></b><br>
            <div  style="display:none;" class="dbox" id="challenge-<?=$row->id?>">
                <?= $row->description ?>
                <br>
                <?php if($row->author) { ?>
                    <div style="color: black;">Von:<b><?=$row->author?></b></div>
                <?php } ?>
            </div><br><br>
        <?php } ?>
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
            ?>
                <div class="selfmade-points">
                    <b><?= $row->points ?></b>
                </div>
                <b><u><a onclick="return toggleMe('challenge-<?=$row->id?>')" href="javascript:void(0)" style="color: white"><?=$row->name?></a></u></b><br>
                <div  style="display:none;" class="dbox" id="challenge-<?=$row->id?>">
                    <?= $row->description ?>
                    <br>
                    <?php if($row->author) { ?>
                        <div style="color: black;">Von:<b><?=$row->author?></b></div>
                    <?php } ?>
                </div><br><br>
            <?php } ?>
        </div>
    <?php } ?>
</div>

<?php include "footer.php"?>
