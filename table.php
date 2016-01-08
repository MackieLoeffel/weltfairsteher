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
        function getCurrentPoints($c) {
            return end(array_values($c["points"]));
        }
        // classes is from chart.php
        usort($classes, function($a, $b) {
            return getCurrentPoints($b) - getCurrentPoints($a);
        });
        $rank = 0;
        foreach($classes as $class) {
            $rank += 1;
        ?>
        <tr class="table-row class-<?= $class["id"]?>">
            <td style="color: white; text-align: center"><b><?= $rank ?></b></td>
            <td style="text-align: center"><?= $class["name"] ?></td>
            <td style="text-align: center">
                <div class="table-box" style="background-color:#FCC156;">
                    <b>2</b>
                    <span class="table-number"
                          style="background-color:#3A7EFC;">
                        <b>1</b>
                    </span>
                    <span class="table-number"
                          style="background-color:#7761C5;
                                 margin-left: 50px;
                                 ">
                        <b>1</b>
                    </span>
                    <span class="table-number"
                          style="background-color:#1B5A0A;
                                 margin-left: 75px;
                                 ">
                        <b>1</b>
                    </span>
                    <span class="table-number"
                          style="background-color:#CC4321;
                                 margin-left: 100px;
                                 ">
                        <b>0</b>
                    </span>
                    <span class="table-number"
                          style="background-color:white;
                                 margin-left: 125px;
                                 ">
                        <b>1</b>
                    </span>

                    <!--Anzahl bestandener Challenges pro Kategorie--></td>
            <td style="text-align: center"><?= $class["creativity"] ?></td>
            <td style="text-align: center"><b><?= getCurrentPoints($class)?></b></td> </tr>
        <?php } ?>
    </tbody>
</table>

<canvas id="chart" ></canvas>
<script type="text/javascript">
 var chart = new LineChart(classes, document.getElementById("chart"));
</script>
<!--Liniendiagramm einfügen, das die gewählte Klasse highlighted: abszisse: 1. Tag bis heute  --  ordinate: punkte (0 bis max) -->

<?php include "include/footer.php"?>
