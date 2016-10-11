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
        <?php
        array_push($categories, new Category("selfmade", ""));

        function getCurrentPoints($c) {
            return end(array_values($c["points"]));
        }
        // classes is from chart.php
        usort($classes, function($a, $b) {
            return getCurrentPoints($b) - getCurrentPoints($a);
        });

        $numStmt = $db->prepare("SELECT COUNT(sc.challenge) AS count
      FROM challenge as c
      JOIN solved_challenge AS sc ON c.id = sc.challenge
      WHERE c.category = :category AND sc.class = :class");
//array_push($classes, $class);
        ?>
<br>
<br>
<!--
Wenn noch keine Klasse gewählt wurde, dann folgenden Text anzeigen: "Alle Klassen haben gemeinsam xxx Challenges absolviert. <br>
Wähle eine Klasse in der Navigationsleiste." << wenn Klasse gewählt wurde, dann diese Sätze ausblenden

-->
<div class="container" style="width: 98%;">
  <div class="row">

<div class="col-xs-12 col-sm-8 col-md-8" >

<b>Bestandene Challenges je Kategorie</b><br><br>
<!--Je Kategorie: Symbol -> Teil-transparenter Balken, dessen Breite die Anzahl der möglichen Challenges repräsentiert und darin ein
nicht transparenter Balken (Kategorie-Farbe), dessen Breite die Anzahl der bestandenen Challenges der Klasse repräsentiert. Ganz rechts im
teil-transparenten Balken steht bspw 5/9 für "5 von 9 Challenges dieser Kategorie bestanden". Beide Balken besitzen die gleiche Höhe von 30px.
Die Breite beträgt die Anzahl der Challenges der Kategorie mal 8%, bei Ernährung also 4 mal 8% = 32%. Diese Werte (Breite der Balken und Zahlen)
müssen automatisch erstellt werden, sodass auf Änderungen selbständig reagiert wird (v.a. bei den Eigenkreationen und der Kreativität von Vorteil)
-->
<div title="Ernährung"><img alt="Ernährung" src="symbols/symbol-ernaehrung.png" style="margin-right: 5%; margin-top: -8px; float: left;" width="10%;" height="auto;" tag="ernaehrung;"/>
<div class="ernaehrung-fortschritt" style="position: relative; height: 30px; margin-left: 11%; width: 32%;">
  <span style="float: right; font-size: 21px; color: white;">1/4</span>
<!-- Breite des folgenden div: bestandene Challenges/mögliche Challenges in Prozent; also dem Bruch der vorigen Zeile in Prozent
..muss noch geändert werden, sodass der Wert für jede Klasse und Kategorie berechnet wird!
-->
<div style="position: absolute; height: 30px; background-color: #FCC156; width: 25%;">

</div>

</div>
</div>
<br><br>


<div title="Wasser und Ressourcen"><img alt="Wasser und Ressourcen" src="symbols/symbol-water.png" style="margin-right: 5%; margin-top: -8px; float: left;" width="10%;" height="auto;" tag="water;"/>
<div class="water-fortschritt" style="position: relative; height: 30px; margin-left: 11%; width: 72%;">
  <span style="float: right; font-size: 21px; color: white;">2/9</span>

<div style="position: absolute; height: 30px; background-color: #3A7EFC; width: 22%;">

</div>

</div>
</div>
<br><br>




<div title="Soziale Verantwortung"><img alt="Soziale Verantwortung" src="symbols/symbol-social.png" style="margin-right: 5%; margin-top: -8px; float: left;" width="10%;" height="auto;" tag="social;"/>
<div class="social-fortschritt" style="position: relative; height: 30px; margin-left: 11%; width: 48%;">
  <span style="float: right; font-size: 21px; color: white;">4/6</span>

<div style="position: absolute; height: 30px; background-color: #7761C5; width: 67%;">

</div>

</div>
</div>
<br><br>









<div title="Klimawandel"><img alt="Klimawandel" src="symbols/symbol-climate.png" style="margin-right: 5%; margin-top: -8px; float: left;" width="10%;" height="auto;" tag="climate;"/>
<div class="climate-fortschritt" style="position: relative; height: 30px; margin-left: 11%; width: 40%;">
  <span style="float: right; font-size: 21px; color: white;">2/5</span>

<div style="position: absolute; height: 30px; background-color: #1B5A0A; width: 40%;">

</div>

</div>
</div>
<br><br>






<div title="Produktion und Konsum"><img alt="Produktion und Konsum" src="symbols/symbol-production.png" style="margin-right: 5%; margin-top: -8px; float: left;" width="10%;" height="auto;" tag="production;"/>
<div class="production-fortschritt" style="position: relative; height: 30px; margin-left: 11%; width: 56%;">
  <span style="float: right; font-size: 21px; color: white;">3/7</span>

<div style="position: absolute; height: 30px; background-color: #CC4321; width: 43%;">

</div>

</div>
</div>
<br><br>






<div title="Energie und Mobilität"><img alt="Energie und Mobilität" src="symbols/symbol-energy.png" style="margin-right: 5%; margin-top: -15px; float: left;" width="10%;" height="auto;" tag="energy;"/>
<div class="energy-fortschritt" style="position: relative; height: 30px; margin-left: 11%; width: 64%;">
  <span style="float: right; font-size: 21px; color: white;">3/8</span>

<div style="position: absolute; height: 30px; background-color: #10B3B3; width: 37%;">

</div>

</div>
</div>
<br><br>






<div title="Eigenkreationen"><img alt="Eigenkreationen" src="symbols/symbol-eigenkreation.png" style="margin-right: 5%; margin-top: -8px; float: left;" width="10%;" height="auto;" tag="selfmade;"/>
<div class="selfmade-fortschritt" style="position: relative; height: 30px; margin-left: 11%; width:12%;">
  <!--Minimum-Breite, wenn nur eine Challenge existiert: 12%
  -->
  <span style="float: right; font-size: 21px; color: white;">0/1</span>

<div style="position: absolute; height: 30px; background-color: white; width: 1%;">

</div>

</div>
</div>
<br><br>







</div>

<div class="col-xs-12 col-sm-4 col-md-4" >
<b><h2 style="color: white; float: left;"><?= e($class->name) ?></h2></b>
<br><br><br><br>



  <span title="Anzahl der Eigenkreationen"><b> Kreativität</b></span><br>

<div title="Fünf Eigenkreationen"><img alt="Kreativität" src="symbols/creativity-5.png" tag="creativity"
  style="float: left; margin-left: 15%;"/></div>

  <div style="clear: left;"></div><br><br>


<!-- Abhängig von Anzahl der Eigenkreationen soll eine andere Version des Sonnenblumenbildes angezeigt werden

 if ($class["creativity"]=='1') {echo(<span title="Keine Eigenkreation"><img alt="Kreativität" src="symbols/creativity-0.png" tag="creativity"  style="float: right; position: absolute;" /></span>);}
else if ($class["creativity"]=='1.1') {echo(<span title="Eine Eigenkreation"><img alt="Kreativität" src="symbols/creativity-1.png" tag="creativity"  style="float: right; position: absolute;" /></span>);}
else if ($class["creativity"]=='1.2') {echo(<span title="Zwei Eigenkreationen"><img alt="Kreativität" src="symbols/creativity-2.png" tag="creativity"  style="float: right; position: absolute;"/></span>);}
else if ($class["creativity"]=='1.3') {echo(<span title="Drei Eigenkreationen"><img alt="Kreativität" src="symbols/creativity-3.png" tag="creativity"  style="float: right; position: absolute;" /></span>);}
else if ($class["creativity"]=='1.4') {echo(<span title="Vier Eigenkreationen"><img alt="Kreativität" src="symbols/creativity-4.png" tag="creativity"  style="float: right; position: absolute;"/></span>);}
else {echo(<span title="Fünf Eigenkreationen"><img alt="Kreativität" src="symbols/creativity-5.png" tag="creativity"  style="float: right; position: absolute;"/></span>)};

?>
-->






  <b> Punkte bis zur nächsten Etappe </b><br><br>

<span style="font-size: 24px;
width: 40px;
height: 40px;
border-radius:40px;
margin-top: 0px;
margin-right: 0px;
margin-bottom: 0px;
margin-left: 0px;
text-align:center;
font-width: bold;
float: left;
color: white;
background-color: #05661D;">
21
<!--  <
    // min defaults to 0, if there is no row
    $mstone = fetch("SELECT MIN(points) as p FROM milestone WHERE points > :points", ["points" => getCurrentPoints($class)])->p - getCurrentPoints($class);
    echo e($mstone > 0 ? $mstone : "---");
    ?>

  -->
</span>
<br><br><br><br>


<span>
  <b>  Gesamtpunktzahl </b><br><br>
          <span style="font-size: 24px;
          width: 40px;
          height: 40px;
          border-radius:40px;
          margin-top: 0px;
          margin-right: 0px;
          margin-bottom: 0px;
          margin-left: 0px;
          text-align:center;
          font-width: bold;
          float: left;
          color: white;
background-color: #05661D;
          ">
79
<!--
              ?= e(getCurrentPoints($class))?>
            -->

</span>
</span>


</div>
</div>
</div>
<br><br><br>

<span class="indexlink" style="color: white; background-color: #05661D; margin-left: auto; margin-right: auto; display: block; text-align: center;" > <a onclick="return toggleMe('chart')"
href="javascript:void(0)" style="color: white;"><span data-title="Zeitlichen Verlauf anzeigen">
Zeitlichen Verlauf anzeigen
</span></a></span>

<div id="chart" class="abstaende" style="width: 68%; margin-top: 25px; position: relative; display: none;"></canvas>
<script type="text/javascript">
 $('document').ready(function() {
     var chart = new LineChart("chart");
 });
</script></div>
<!--Liniendiagramm einfügen, das die gewählte Klasse highlighted: abszisse: 1. Tag bis heute  -  ordinate: punkte (0 bis max) -->


<?php include "include/footer.php" ?>
