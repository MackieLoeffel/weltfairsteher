<?php
include "include/header.php";
include "include/chart.php";
?>

<br>
<br>
<br>


<table class=".abstand" style="margin-left: 7px; color= white; margin-right= 14px;" cellspacing="0" cellpadding="20"> <thead style="color: white;"><tr> <th  style="text-align: center">Rang</th> <th style="text-align: center">Klassenname</th> <th style="text-align: center">Challenges</th> <th style="text-align: center">Kreativität</th> <th style="text-align: center">Punkte</th> </tr></thead>
    <tbody>
        <?php
        array_push($categories, new Category("selfmade", ""));

        function getCurrentPoints($c) {
            return end(array_values($c["points"]));
        }
        // classes is from chart.php
        usort($classes, function($a, $b) {
            return getCurrentPoints($b) - getCurrentPoints($a);
        });
        $rank = 0;
        $numStmt = $db->prepare("SELECT COALESCE(SUM(c.points), 0) AS count
FROM challenge as c
JOIN solved_challenge AS sc ON c.id = sc.challenge
WHERE c.category = :category AND sc.class = :class");
        foreach($classes as $class) {
            $rank += 1;
        ?>
        <tr class="table-row class-<?= e($class["id"])?>">
            <td style="color: white; text-align: center"><b><?= e($rank) ?></b></td>
            <td style="text-align: center"><?= e($class["name"]) ?></td>
            <td style="text-align: center">
                <div class="table-box">
                    <br>
                    <?php
                    $index = 0;
                    foreach($categories as $c) {
                        $numStmt->execute(["category" => $c->name,
                                           "class" => $class["id"]]);
                    ?>
                    <span class="table-number <?= e($c->name) ?>"
                          style="margin-left: <?= $index * 25 ?>px;">
                        <b><?= $numStmt->fetch(PDO::FETCH_OBJ)->count ?></b>
                    </span>
                  <?php $index += 1; } ?>
                </div>

                    <!--Anzahl bestandener Challenges pro Kategorie--></td>
            <td style="text-align: center"><?= e($class["creativity"]) ?></td>
            <td style="text-align: center"><b><?= e(getCurrentPoints($class))?></b></td> </tr>
        <?php } ?>
    </tbody>
</table>

<canvas id="chart" style="width: 50%; margin-left: 11%; margin-top: 25px; position: relative;"></canvas>
<script type="text/javascript">
 var chart = new LineChart(classes, document.getElementById("chart"));
</script>
<!--Liniendiagramm einfügen, das die gewählte Klasse highlighted: abszisse: 1. Tag bis heute  --  ordinate: punkte (0 bis max) -->
<div style="margin-left: 5px; margin-top: 25px; margin-right: 11%;
 color: white; font-size: 16px; width: auto; height: auto;
  float: right; background-color: #1BAB3F; text-align: center; position: relative;">
  <b style="color: black;">Punkte bis zum<br> nächsten Etappenziel:</b>

  <h1 style="color: black; ">19</h1>
</div>

<?php include "include/footer.php"?>
