<?php
include "header.php";
include "chart.php";
?>

<br>
<br>
<br>


<table class=".abstand" style="margin-left: 7px; color= white; margin-right= 14px;" cellspacing="0" cellpadding="20"> <thead style="color: white;"><tr> <th  style="text-align: center">Rang</th> <th style="text-align: center">Klassenname</th> <th style="text-align: center">Challenges</th> <th style="text-align: center">Kreativität</th> <th style="text-align: center">Punkte</th> </tr></thead>
    <tbody>
        <?php
        $classStmt = $db->prepare("SELECT id, name FROM class");
        $classStmt->execute();
        foreach($classStmt->fetchAll(PDO::FETCH_OBJ) as $row) {
        ?>
        <tr>
            <td  style="color: white; text-align: center"><b>1</b></td>
            <td style="text-align: center"><?= $row->name ?></td>
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
            <td style="text-align: center"><!--1+(0,2*anzahlSelfmade-Challenges)-->1,4</td>
            <td style="text-align: center"><b><!--Punkte der bestandenen Challenges * Kreativität-->16,8</b></td> </tr>
        <?php } ?>
    </tbody>
</table>

<canvas id="chart" ></canvas>
<script type="text/javascript">
 var chart = new LineChart(classes, document.getElementById("chart"));
</script>
<!--Liniendiagramm einfügen, das die gewählte Klasse highlighted: abszisse: 1. Tag bis heute  --  ordinate: punkte (0 bis max) -->

<?php include "footer.php"?>
