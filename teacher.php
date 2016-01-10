<?php
include "include/access.php";
check_access(TEACHER);
include "include/header.php";


if(isset($_POST["class"]) && isset($_POST["challenge"])) {
    $checkStmt = $db->prepare("SELECT * FROM class WHERE id = :id AND teacher = :teacher");
    $checkStmt->execute(["id" => $_POST["class"], "teacher" => $_SESSION["user"]]);

    if($_SESSION["role"] > 1 || $checkStmt->fetch() !== false) {
        $scStmt = $db->prepare("SELECT * FROM solved_challenge WHERE class = :class AND challenge = :challenge");
        $scStmt->execute(["class" => $_POST["class"], "challenge" => $_POST["challenge"]]);

        if($scStmt->fetch() === false) {
            // race condition here
            $insertStmt = $db->prepare("INSERT INTO solved_challenge (class, challenge, at) VALUES (:class, :challenge, NOW())");
            $insertStmt->execute(["class" => $_POST["class"], "challenge" => $_POST["challenge"]]);
        }
    }
}

include "include/chart.php";
?>
<!--Liniendiagramm
   -->
<div style="margin-left: 14px; width: 400px; height: 221px; background-color: white; margin-top: 40px; float: left; position: absolute;">
    <canvas id="chart" ></canvas>
</div>
<script type="text/javascript">
 var chart = new LineChart(classes, document.getElementById("chart"));
</script>

<!-- Selfmade-Challenge vorschlagen
     evtl noch insofern ändern, dass nicht eine Beschreibung gefordert ist, sondern jenes formuliert werden muss, was auch wir für eine Challenge ausarbeiten (kategorie, punktzahl, einbettung...... gefahr: zu hohe hürde, eine eigene challenge zu formulieren)
   -->
<div
    style="margin-left: 14px;
           margin-top: 300px;
           float: left;
           background-color:#1BAB3F;
           width: 400px;
           height: auto;">

    <span style="margin-left: 14px;">
        <b>Selfmade-Challenge vorschlagen</b></span><br>
        <div style="margin-left: 14px">
            <textarea cols="50" row="1">Challenge-Titel</textarea>
        </div>
        <br>
        <div style="color: white; margin-left: 14px">
            <textarea cols="50" row=8";>Challenge-Beschreibung</textarea>

            <span style="font-size: 13px; color: black"><br>
                <b>Hilfestellung:</b>
            </span>
            <span style="font-size: 13px; color: white">Die Challenge-Beschreibung sollte --lorem ipsum dolor sit atmet und so weiter etc pp (Beschreibung der notwendigen Inhalte und evtl der Länge einer Challenge-Beschreibung) beinhalten.
            </span><br>

            <span style="font-size: 13px; color: black"><br>
                <b>Hinweis:</b>
            </span>
            <span style="font-size: 13px; color: white">
                Die vorgeschlagene Challenge wird nicht sofort hinzugefügt, sondern erst zur Prüfung an eine beauftragte Person geschickt.
            </span><br>
            <input type="submit" value="Abschicken" style="background-color:  green; margin-left: 258px;">
        </div>
</div>

<div class=".abstand teacher-challenge-box">
    <section class="container">
        <form action="logout.php" method="get">
            <input type="submit" value="Logout" style="background-color: #52150D; font-size: 11px;">
        </form>
        <!--Klasse wechseln, Logout
           -->
        <div class="teacher-challenge-box-inner">
            <b>Challenge eintragen:</b><br>
            <span style="margin-bottom: 4px; margin-top: 9px; font-size:13px; color: black">
                <form method="post">
                    <b>Klasse:</b>
                    <select name="class" id="class" size="1">
                        <?php
                        // select all unsolved challenges by this class
                        $challengeStmt = $db->prepare("
SELECT id, name FROM challenge
WHERE id NOT IN (
SELECT c.id
FROM challenge AS c
JOIN solved_challenge AS sc ON c.id = sc.challenge
WHERE sc.class = :class
GROUP BY c.id)");
                        $challenges = [];
                        if($_SESSION['role'] < 2) {
                            $classStmt = $db->prepare("SELECT id, name FROM class WHERE teacher = :teacher ");
                            $classStmt->execute(["teacher" => $_SESSION['user']]);
                        } else {
                            // admins are allowed to change everything
                            $classStmt = $db->prepare("SELECT id, name FROM class");
                            $classStmt->execute();
                        }
                        foreach($classStmt->fetchAll(PDO::FETCH_OBJ) as $class) {
                            $challengeStmt->execute(["class" => $class->id]);
                            $challenges[$class->id] = $challengeStmt->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                            <option value="<?=e($class->id)?>"><?=e($class->name)?></option>
                        <?php } ?>
                    </select><br>
                    <b>Challenge:</b>
                    <select name="challenge" id="challenges" size="1"> </select>
                    <br>
                    <input type="submit" value="eintragen" style="background-color: green"><br><br>
                </form>
                <script type="text/javascript">
                 var challenges = <?= json_encode($challenges); ?>;
                </script>
                <script src="js/teacher.js"></script>
            </span>
            <!--"Klasse wechseln" nur anzeigen, wenn ein Lehrer für mehrere Klassen verantwortlich ist. In der Auswahlliste nur die Klassen anzeigen, die mit dem Konto des Lehrers verbunden sind -->
        </div>


</div>

<?php include "include/footer.php"?>
