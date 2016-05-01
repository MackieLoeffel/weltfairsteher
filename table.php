<?php
include "include/header.php";
include "include/chart.php";
?>

<br>
<br>
<br>
<div  style="
margin-left: 0%;
float: left;
width: 100%;
margin-right: 0%;

margin-top: -75px;

margin-bottom: 10px;
">


   <img src="table-banner.png" tag="kompass" width="100%" alt="kompass"
 height="auto">

        </div>
<br>
<span style="width: auto; height: auto; margin-left: 33%; margin-right: auto; margin-bottom: 5px; background-color: yellow; color: black;">
  Die erwähnten Klassen sind Beispielklassen</span>


<table class="abstaende" style="color= white; width: 98%;" cellspacing="0" cellpadding="20">
  <thead  style="color: white;"><tr> <th class="table-head">
    Rang</th> <th class="table-head">
      Klassenname</th> <th class="table-head visible-lg">



        Challenges</th> <th class="table-head">
          Kreativität</th> <th class="table-head">
       Punkte</th>
      <th class="table-head">Nächste Etappe in</th>
  </tr></thead>
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
        $numStmt = $db->prepare("SELECT COUNT(sc.challenge) AS count
FROM challenge as c
JOIN solved_challenge AS sc ON c.id = sc.challenge
WHERE c.category = :category AND sc.class = :class");
        foreach($classes as $class) {
            $rank += 1;
        ?>
        <tr class="table-row class-<?= e($class["id"])?>" >
            <td class="table-lines" style="color: white; text-align: center; font-family: Titillium Web;"><b><?= e($rank) ?></b></td>
            <td class="table-lines" style="text-align: center"><?= e($class["name"]) ?></td>
            <td  class="table-lines visible-lg" >
                <div class="table-box"  style="text-align: center; margin-left: 10%; margin-top: 18px; font-family: Titillium Web;">
                    <br>
                    <?php
                    $index = 0;
                    foreach($categories as $c) {
                        $numStmt->execute(["category" => $c->name,
                                           "class" => $class["id"]]);
                    ?>
                    <span class="table-number <?= e($c->name) ?>"
                          style="margin-left: <?= $index * 20 ?>px;">
                        <b><?= $numStmt->fetch(PDO::FETCH_OBJ)->count ?></b>
                    </span>
                  <?php $index += 1; } ?>
                </div>

            </td>
            <td class="table-lines" style="text-align: center;"><?= e($class["creativity"]) ?></td>
            <td class="table-lines" style="text-align: center"><b><?= e(getCurrentPoints($class))?></b></td>
            <td  class="table-lines" class="milestone-box" style="text-align: center">
                <?php
                // min defaults to 0, if there is no row
                $mstone = fetch("SELECT MIN(points) as p FROM milestone WHERE points > :points", ["points" => getCurrentPoints($class)])->p - getCurrentPoints($class);
                echo e($mstone > 0 ? $mstone : "---");
                ?></td>
        </tr>
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
<div id="chart" class="abstaende" style="width: 98%; margin-top: 25px; position: relative;"></canvas>
<script type="text/javascript">
 $('document').ready(function() {
     var chart = new LineChart("chart");
 });
</script></div>
<!--Liniendiagramm einfügen, das die gewählte Klasse highlighted: abszisse: 1. Tag bis heute  -  ordinate: punkte (0 bis max) -->


<?php include "include/footer.php"?>
