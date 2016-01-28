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
          <!-- PUNKTE BIS ZUR NÄCHSTEN ETAPPE (wie könnte man das kürzer umschreiben? "nächste Etappe in"? "Etappenabstand"?)
          <td  class="etappe-box" style="color: white; background-color: #3A44C9; width: 20px; height: auto;
    border-radius:20px; font-size: 16px; font-width: bold; text-align: center;"><?= e($class["etappe"])?></td>

          -->
            <td style="text-align: center"><b><?= e(getCurrentPoints($class))?></b></td> </tr>
        <?php } ?>
    </tbody>
</table>
<!--
<div style="margin-left: 14px; margin-top: 25px; margin-right: 25px;
 color: white; font-size: 16px; width: auto; height: auto;
  float: left; background-color: #1BAB3F; text-align: center; position: relative;">
  <h3 style="color: black;">Erklärung des <br> Diagramms:</h3>

  <b style="color: black;">X-Achse:</b>
  <br>
   Zeitlicher Verlauf <br>
   von 04. Oktober 2016 <br>
   (Beginn von WeltFAIRsteher) <br>
   bis heute.<br>
    <b style="color: black;">Y-Achse:</b> <br>
    Anzahl der erreichten Punkte.<br>
      <b style="color: black;">Farben:</b> <br>
  Die Klasse, die du <br>
  ganz oben rechts auswählst, <br>
  wird in Rot angezeigt.
</div>
-->
<div id="chart" style="width: 50%; margin-top: 25px; margin-left: 25%; position: relative;"></canvas>
<script type="text/javascript">
 $('document').ready(function() {
     var chart = new LineChart("chart");
 });
</script></div>
<!--Liniendiagramm einfügen, das die gewählte Klasse highlighted: abszisse: 1. Tag bis heute  -  ordinate: punkte (0 bis max) -->


<?php include "include/footer.php"?>
